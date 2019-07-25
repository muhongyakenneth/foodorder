<form method="post">
<table><tr><td><input type="text" placeholder="Enter_OrderID" name="id"></td>
<td><input type="text" placeholder="Enter_OrderPhoneNo" name="phone"></td>
<td><select name="conf"><option>--select an option--</option>
<option>Confirmed</option><option>Not Confirmed</option></select></td><td><button name="submit">Confirm</button></td></tr></table>
		<?php
		if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}

$n=$_POST['conf'];
$p=$_POST['id'];
$h=$_POST['phone'];
$sql = " update resv set confirm ='$n' where id='$p' or cphone='$h'";
if(mysqli_query($link, $sql)){
	echo"<center>successfully inserted</center>";	
}
			}
			?>
</form>
	