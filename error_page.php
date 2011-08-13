<html>
<head>
</head>
<body>
<form action="./index.php" method="post">
<div style="background-color:#999;width:240px;height:280px;font:Verdana, Geneva, sans-serif;font-size:12px;">
<?php
$errorMsg=urldecode(trim($_REQUEST['errorMsg']));
echo "The following error occured.<br>$errorMsg";
?>
<input type="submit" value="Back">
</div>
</form>
</body>
</html>