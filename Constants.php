<?php
$actions=array('sendsms'=>'sendsms');
$url='http://www.smsglobal.com.au/http-api.php';
$smsErrorCodes=array('400'=>'Send message timed-out.',
				  '401'=>'System temporary disabled.',
				  '402'=>'No response from SMSGlobal SMSC.',
				  '13'=>'ESME_RBINDFAIL � Can not Bind to MeX.',
				  '8'=>'ESME_RSYSERR - System Error.',
				  '1'=>'ESME_RINVMSGLEN Message Length is invalid.',
				  '2'=>'ESME_RINVCMDLEN Command Length is invalid.',
				  '3'=>'ESME_RINVCMDID Invalid Command ID.',
				  '4'=>'ESME_RINVBNDSTS Incorrect BIND.',
				  '5'=>'ESME_RALYBND ESME Already in Bound State.',
				  '10'=>'ESME_RINVSRCADR Invalid Source Address.',
				  '11'=>'ESME_RINVDSTADR Invalid Dest Addr.',
				  '12'=>'ESME_RINVMSGID Message ID is invalid.',
				  '13'=>'ESME_RBINDFAIL Bind Failed.',
				  '14'=>'ESME_RINVPASWD Invalid Password.',
				  '69'=>'ESME_RSUBMITFAIL Submit SM failed.',
				  '88'=>'ESME_RTHROTTLED Exceeded allowed message limits.',
				  '102'=>'Destination not covered or Unknown prefix.');
$postBackErrorCodes=array('0'=>'Unknown subscriber',
						'10'=>'Network time-out',
					    '100'=>'Facility not supported',
						'101'=>'Unknown subscriber',
						'102'=>'Facility not provided',
						'103'=>'Call barred',
						'104'=>'Operation barred',
						'105'=>'SC congestion',
						'106'=>'Facility not supported',
						'107'=>'Absent subscriber',
						'108'=>'Delivery fail',
						'109'=>'Sc congestion',
						'110'=>'Protocol error',
						'111'=>'MS not equipped',
						'112'=>'Unknown SC',
						'113'=>'SC congestion',
						'114'=>'Illegal MS',
						'115'=>'MS not a subscriber',
						'116'=>'Error in MS',
						'117'=>'SMS lower layer not provisioned',
						'118'=>'System fail',
						'512'=>'Expired',
						'513'=>'Rejected',
						'515'=>'No route to destination',
						'608'=>'System error',
						'610'=>'Invalid source address',
						'611'=>'Invalid destination address',
						'625'=>'Unknown destination');
$dlrStatusCodes=array('DELIVRD','ACCEPTD','EXPIRED','UNDELIV');
$postBackFileName="post_back.txt";
?>