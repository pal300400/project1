<?php

include_once("mysql-project-connection.php");

$uid=$_POST["txtuid"];
$pswd=$_POST["txtpswd"];
$mob=$_POST["txtmob"];

$btn=$_POST["btn"];
if($btn=="SignUp")
{	
	$query="insert into newproject values('$uid','$pswd','$mob')";
	
	mysqli_query($dbcon,$query);// execute query on table in database
	
	$msg=mysqli_error($dbcon);
	if($msg=="")
    	echo "Record Saved ";
	else
    	echo $msg;
	
}
/*else 
	if ($btn=="Login")
	{
		
		$query="update profile2019 set pswd='$pswd', mob='$mob' where uid='$uid'";
		
		mysqli_query($dbcon,$query);
		
		$msg=mysqli_error($dbcon);
	if($msg=="")
    	echo "Record Updated ";
	else
    	echo $msg;
	}*/


?>