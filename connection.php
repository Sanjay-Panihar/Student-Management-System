<?php
$servername="localhost";
$username="root";
$password="";
$dbname="sms";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn==false)
{
	die ('Connection failed').mysqli_connect_error();
}


?>