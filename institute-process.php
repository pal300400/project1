<?php
include_once("mysql-project-connection.php");

$uid=$_POST["txtuid"];
$institute=$_POST["txtins"];
$website=$_POST["txtweb"];
$cperson=$_POST["txtcper"];
$email=$_POST["email"];
$mobile=$_POST["txtmob"];
$estd=$_POST["txtestd"];
$address=$_POST["txtadds"];
$state=$_POST["state"];

if(isset($_POST["city"]))
   $city=$_POST["city"];
else
	$city="";

$zip=$_POST["txtzip"];
$details=$_POST["txtdetails"];


$btn=$_POST["btn"];
if($btn=="save")
{
		$orgName1=$_FILES["pik1"]["name"];
		$tmpName1=$_FILES["pik1"]["tmp_name"];
		move_uploaded_file($tmpName1,"uploads/".$orgName1);
	
	$orgName2=$_FILES["pik2"]["name"];
		$tmpName2=$_FILES["pik2"]["tmp_name"];
		move_uploaded_file($tmpName2,"uploads/".$orgName2);
	
	$orgName3=$_FILES["pik3"]["name"];
		$tmpName3=$_FILES["pik3"]["tmp_name"];
		move_uploaded_file($tmpName3,"uploads/".$orgName3);
		
	$query="insert into institutes values('$uid','$institute', '$website','$cperson','$email','$mobile', '$estd', '$address','$state','$city','$zip','$orgName1','$orgName2','$orgName3','$details')";


	mysqli_query($dbcon,$query);// execute query on table in database
	
	$msg=mysqli_error($dbcon);
	if($msg=="")
    	echo "Record Saved ";
	else
    	echo $msg;
	
}
else 
	if ($btn=="update")
	{
		$orgName1=$_FILES["pik1"]["name"];
		$tmpName1=$_FILES["pik1"]["tmp_name"];
		if(isset($_POST["pikname1"]))
  			$pikname1=$_POST["pikname1"];
		else
			$pikname1="";
	
		if($orgName1=="")
			$orgName1=$pikname1;
		move_uploaded_file($tmpName1,"uploads/".$orgName1);
	
	$orgName2=$_FILES["pik2"]["name"];
		$tmpName2=$_FILES["pik2"]["tmp_name"];
		
		if(isset($_POST["pikname2"]))
  			$pikname2=$_POST["pikname2"];
		else
			$pikname2="";
		
		if($orgName2=="")
			$orgName2=$pikname2;
		move_uploaded_file($tmpName2,"uploads/".$orgName2);
	
	$orgName3=$_FILES["pik1"]["name"];
		$tmpName3=$_FILES["pik2"]["tmp_name"];
		
		if(isset($_POST["pikname3"]))
  			$pikname3=$_POST["pikname3"];
		else
			$pikname3="";
		
		if($orgName3=="" )
			$orgName3=$pikname3;
		move_uploaded_file($tmpName3,"uploads/".$orgName3);
				
		$query="update institutes set institute='$institute', website='$website', cperson='$cperson', email='$email', mobile='$mobile', estd='$estd', address='$address', state='$state', city='$city', zip='$zip', pic1='$orgName1', pic2='$orgName2', pic3='$orgName3', details='$details' where uid='$uid'";
		
		mysqli_query($dbcon,$query);
		
		$msg=mysqli_error($dbcon);
	if($msg=="")
    	echo "Record Updated ";
	else
    	echo $msg;
	}
else
	if($btn="delete")
	{
		$query="delete from institutes where uid='$uid'";
		mysqli_query($dbcon,$query);
		
		$msg=mysqli_error($dbcon);
	if($msg=="")
    	echo "Record Deleted";
	else
    	echo $msg;
		
	}




?>
