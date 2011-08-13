<?php
require_once './Constants.php';
global $dlrStatusCodes,$postBackErrorCodes,$postBackFileName;
$msgid=trim($_REQUEST['msgid']);
$dlrStatus=trim($_REQUEST['dlrstatus']);
$dlrErr=trim($_REQUEST['dlr_err']);
$doneDate=trim($_REQUEST['donedate']);
if($msgid!=='' and $dlrStatus!=='' and $dlrErr!=='' and $doneDate!==''){
	$content="Msg Id : $msgid\n";
	if(strcasecmp($dlrStatus,$dlrStatusCodes[0])===0){
		$content.="Status : $dlrStatus\n-------------";
	}else if(array_key_exists($dlrErr,$postBackErrorCodes)){
		$content.="Status : {$postBackErrorCodes[$dlrErr]}\n-------------";
	}
	file_put_contents($postBackFileName,$content,FILE_APPEND);
}
?>