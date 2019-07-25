<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "update resv set confirm ='Confirmed' WHERE id=$id"; 
if($result = mysqli_query($con,$query)){
	echo"<font color=green size=8>
		<center>'$id' Order has been Confirmed</center>
		</font>";
	header("refresh:3;vres.php");
}else{ die ( mysqli_error());}
?>