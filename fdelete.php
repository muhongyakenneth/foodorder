<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "delete from forder WHERE id=$id"; 
if($result = mysqli_query($con,$query)){
	echo"<font color=green size=8>
		<center> Order Number $id has been Deleted</center>
		</font>";
	header("refresh:3;adhome.php");
}else{ die ( mysqli_error());}
?>