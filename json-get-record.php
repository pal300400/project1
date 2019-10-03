<?php
include_once("mysql-project-connection.php");
$uid=$_GET["uid"];
$query="select * from institutes where uid='$uid'";
$t=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($t))
{
	$ary[]=$row;
}
echo json_encode($ary);
?>