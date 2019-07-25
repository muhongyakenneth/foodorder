<?php
$con = mysqli_connect("localhost","root","","umu");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "DELETE FROM login WHERE id='$id'"; 
if($result = mysqli_query($con,$query)){
	echo"<center><font size=6 color=green> $id has been deleted</font></center>";
	header("refresh:2; addstf.php");
}else
{ echo"<center><font size=6 color=red> $id not deleted </font></center>";}
 
?>