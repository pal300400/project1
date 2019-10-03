$<?php
include_once("mysql-project-connection.php");
$uid=$_GET["uid"];
$pswd=$_GET["pswd"];
$query="select * from newproject where uid='$uid'";
$t=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($t);
//echo $count;
if($count<=0)
	echo "Username or Password is wrong";
else
{
	while($row=mysqli_fetch_array($t))
		{
			if( $uid==$row['uid'] && $pswd==$row['pswd'])
				echo "Login Successful";
			else
				echo "Username or Password is wrong";
		}
}
		
			

	

?>