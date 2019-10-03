<?php
include_once("mysql-project-connection.php");
$uid=$_GET["uid"];

$query="select * from newproject where uid='$uid'";
$t=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($t);
if($count==1)
	echo "$uid is not available";
else
	echo "$uid is available";
;


?>