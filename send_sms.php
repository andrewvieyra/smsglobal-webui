<?php
require_once './configuration.php';
require_once './Constants.php';
global $url,$actions,$user,$password;
$smsObj->url=$url;
$smsObj->user=$user;
$smsObj->password=$password;
$smsObj->from=trim($_REQUEST['fromTxtBox']);
$smsObj->to=trim($_REQUEST['toTxtBox']);
$smsObj->msg=urlencode(trim($_REQUEST['msgTxtArea']));
$smsObj->deliveryMonth=trim($_REQUEST['deliveryMonthDrpDown'])!=='-1'?trim($_REQUEST['deliveryMonthDrpDown']):'';
$smsObj->deliveryDay=trim($_REQUEST['deliveryDayDrpDown'])!=='-1'?trim($_REQUEST['deliveryDayDrpDown']):'';
$smsObj->deliveryHour=trim($_REQUEST['deliveryHourDrpDown'])!=='-1'?trim($_REQUEST['deliveryHourDrpDown']):'';
$smsObj->deliveryMin=trim($_REQUEST['deliveryMinDrpDown'])!=='-1'?trim($_REQUEST['deliveryMinDrpDown']):'';
if($smsObj->deliveryMonth!=='' and $smsObj->deliveryDay!==''){
	if($smsObj->deliveryHour===''){
		$smsObj->deliveryHour='00';
	}
	if($smsObj->deliveryMin===''){
		$smsObj->deliveryMin='00';
	}
}
$errorMsg=isFormValidated($smsObj);
if(strlen($errorMsg)===0){
	$smsObj->deliveryTime=$smsObj->deliveryMonth?date('Y')."-$smsObj->deliveryMonth-$smsObj->deliveryDay $smsObj->deliveryHour:$smsObj->deliveryMin:00":'';
	$smsObj->deliveryTime=$smsObj->deliveryTime?urlencode($smsObj->deliveryTime):'';
	$sendSMSURL="$smsObj->url?action={$actions['sendsms']}&user=$smsObj->user&password=$smsObj->password&from=$smsObj->from&to=$smsObj->to&text=$smsObj->msg";
	if($smsObj->deliveryTime){
		$sendSMSURL.="&scheduledatetime=$smsObj->deliveryTime";
	}
	$response=file_get_contents($sendSMSURL);
	$response=parseResponse($response);
	if(is_array($response) and $response[0]==='success'){
		$response=urlencode($response[1]);
		header("location:./sms_status.php?response=$response");
		die();
	}
	else if(is_array($response) and $response[0]==='failure'){
		$response=urlencode($response[1]);
		header("location:./sms_status.php?response=$response");
		die();
	}
	if(is_array($response)){
		$errorMsg=$response[1];
	}
}
$errorMsg=urlencode($errorMsg);
header("location:./error_page.php?errorMsg=$errorMsg");
die();

function isFormValidated($smsObj){
	$alphaNumericRE='/^[0-9a-zA-Z]+$/';//Alpha Numeric Regular Expression
	$numericRE='/^[0-9]+$/';//Numeric Regular Expression
	$errorMsg='';
	$errorCount=1;
	if(empty($smsObj->url) or $smsObj->url==='' or is_null($smsObj->url)){
		$errorMsg.="$errorCount. SMS Global URL is missing. Kindly open configuration.php and edit the variable '$url'.<br>";
		$errorCount++;
	}
	if(empty($smsObj->user) or $smsObj->user==='' or is_null($smsObj->user)){
		$errorMsg.="$errorCount. Username used to send SMS is missing. Kindly open configuration.php and edit the variable '$user'.<br>";
		$errorCount++;
	}
	if(empty($smsObj->password) or $smsObj->password==='' or is_null($smsObj->password)){
		$errorMsg.="$errorCount. Password used to send SMS is missing. Kindly open configuration.php and edit the variable '$password'.<br>";
		$errorCount++;
	}
	if(empty($smsObj->from) or $smsObj->from==='' or is_null($smsObj->from)){
		$errorMsg.="$errorCount. From number is missing. Kindly provide From as a Alpha Numeric value.<br>";
		$errorCount++;
	}
	if(preg_match($alphaNumericRE,$smsObj->from)===0){
		$errorMsg.="$errorCount. From number must be Alpha Numeric. Kindly provide From as a Alpha Numeric value.<br>";
		$errorCount++;
	}
	if(empty($smsObj->to) or $smsObj->to==='' or is_null($smsObj->to)){
		$errorMsg.="$errorCount. To number is missing. Kindly provide To as a Numeric value.<br>";
		$errorCount++;
	}
	if(preg_match($numericRE,$smsObj->to)===0){
		$errorMsg.="$errorCount. To number must be Numeric. Kindly provide To as a Numeric value.<br>";
		$errorCount++;
	}
	if(empty($smsObj->msg) or $smsObj->msg==='' or is_null($smsObj->msg)){
		$errorMsg.="$errorCount. SMS Message is missing. Kindly provide Message.<br>";
		$errorCount++;
	}
	if(strlen($smsObj->msg)>800){
		$errorMsg.="$errorCount. SMS Message must be 800 Characters long. Kindly provide a Message contianing at most 800 Characters.<br>";
		$errorCount++;
	}
	if($smsObj->deliveryMonth==='' and $smsObj->deliveryDay==='' and $smsObj->deliveryHour==='' and $smsObj->deliveryMin===''){
		return $errorMsg;
	}
	if($smsObj->deliveryMonth===''){
		$errorMsg.="$errorCount. SMS Delivery Month is missing. Kindly provide SMS Delivery Month.<br>";
		$errorCount++;
	}
	if($smsObj->deliveryDay===''){
		$errorMsg.="$errorCount. SMS Delivery Day is missing. Kindly provide SMS Delivery Day.<br>";
		$errorCount++;
	}
	if($smsObj->deliveryHour===''){
		$errorMsg.="$errorCount. SMS Delivery Hour is missing. Kindly provide SMS Delivery Hour.<br>";
		$errorCount++;
	}
	if($smsObj->deliveryMin===''){
		$errorMsg.="$errorCount. SMS Delivery Minutes is missing. Kindly provide SMS Delivery Minutes.<br>";
		$errorCount++;
	}
	return $errorMsg;
}
function parseResponse($response){
	global $smsErrorCodes;
	if(preg_match('/^SMSGLOBAL DELAY MSGID:/',$response)===1){
		$response=array(0=>'success',1=>$response);
	}
	else if(preg_match('/^OK: 0;/',$response)===1){
		$pattern='/^OK: 0;/';
		$response=trim(preg_replace($pattern,'',$response));
		$response=array(0=>'success',1=>$response);
	}
	else if(preg_match('/^ERROR:/',$response)===1){
		$pattern='/^ERROR:/';
		$errorNo=extractErrorNumber($response);
		if($errorNo and array_key_exists($errorNo,$smsErrorCodes)){
			$response=$smsErrorCodes[$errorNo];
		}else{
			$response=trim(preg_replace($pattern,'',$response));
		}
		$response=array(0=>'failure',1=>$response);
	}
	else{
		$response=array(0=>'failure',1=>$response);
	}
	return $response;
}
function extractErrorNumber($response){
	$pattern='/[^0-9]/';
	return preg_replace($pattern,'',$response);
}
?>