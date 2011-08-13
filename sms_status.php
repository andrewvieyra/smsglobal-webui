<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>SMSGlobal iSMS</title>

</head>

<body onload="setTimeout(function() { window.scrollTo(0, 1) }, 100);">

<div id="topbar" class="transparent">
<div id="title">SMSGlobal iSMS</div>
</div>
<div id="content">
<form action="./index.html" method="get">
<fieldset>

<center><span class="graytitle">SMS sent successfully!</span></center>
<br>
<br>
<span class="graytitle">
<?
$response=urldecode(trim($_REQUEST['response']));
echo $response;
?>
</span>

<br>
<br>
<br>
<ul class="pageitem">
<li class="button">
<input type="submit" value="Back">
</li>
</ul>

</fieldset>
</form>
</div>
<div id="footer">
	<a class="noeffect" href="http://www.andrewvieyra.com">Created by Andrew Vieyra</a></div>

</body>

</html>
