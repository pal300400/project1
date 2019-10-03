$<?php
include_once("mysql-project-connection.php");
$uid=$_GET["uid"];
$pswd=$_GET["pswd"];
$mob=$_GET["mob"];
if (empty($uid)) 
    echo "Username is required";
else 
	if (empty($uid)) 
    echo "Username is required";

	$query="Insert into newproject values('$uid','$pswd','$mob')";
	$t=mysqli_query($dbcon,$query);
	
	$msg=mysqli_error($dbcon);
	if($msg=="")
		echo "Record Saved";
	else
		echo $msg; 



		
			

	

?>