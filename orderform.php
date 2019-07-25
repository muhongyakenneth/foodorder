<?php
$con = mysqli_connect("localhost","root","","soul");
$DB_con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "SELECT * from sub_menu WHERE id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>FOOD Ordering System | Menu</title>
<meta charset="iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/theme.css">
</head>
<body>
<div id="background">
  <div class="page">
       <div id="header"style="background-color:black;padding-bottom:25px";>
        <center><div class="container-logo">
		 <img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	     </div></center>
	     <div class = "container-header">
	  
        <nav>
        <a class="active" href="orh.php">ADD ORDERS</a>
        <a href="vorh.php">VIEW ORDERS</a>
        <a href="report1.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
     </div>
    </div>
    <div id="body">
      <div class="content">
        <div class="body">
          <center><h2>Make orders<hr></h2>  </center>       
          <ul class="news">
            <li><table><tr><td>
			<form method="POST">
			<table>
			<tr><td>Item Name:</td><td><input type="text" name="number" value="<?php echo $row['Item']; ?>" required readonly></td></tr>
			<tr><td>Item Price:</td><td><input type="text" name="table" value="<?php echo $row['price']; ?>" required readonly></td></tr>
			<tr><td>Item Pic</td><td><img src="user_images/<?php echo $row['userPic']; ?>" height="150" width="150" /></td></tr>
			<tr><td>Number of Orders.</td><td><input type='text' name="od" required></td></tr>
			<tr><td>Date:</td><td><input type='date' name="dt" required></td></tr>
<tr><td>Delivery:</td><td><select name="del" required><option>---Select an option---</option><option>Yes</option><option>No</option></select></td></tr>
			<tr><td>Delivery Address[yr addrss]:</td><td><input type="text" name="add" placeholder="your delivery address"></td></tr>			
			<tr><td></td><td><button name='submit'>Order</button></td></tr>
			</table>
						<?php

	error_reporting( ~E_NOTICE ); 
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['submit']))
	{
		$username = $_POST['number'];
		$usert=$_POST['table'];
		$userd=$_POST['od'];
		$userdt=$_POST['dt'];
		$userp=$_POST['del'];
		$useradd=$_POST['add'];	
	
		if(empty($username)){
			$errMSG = "Please Enter Item Name.";
		}	
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = "INSERT INTO ordh VALUES('','$username','$usert','$userd','$userdt','$userp','$useradd')";
			
			if($res=mysqli_query($con,$stmt)){
			?>
			 
			 <script>
				alert('Your order has been made');
				</script>
				<?php
				header("refresh:6,orh.php");
			}
			else
			{
				$errMSG = "error while Making an order....";
			}
		}
	}
?>
			
			</td><td><table><tr><td>Money Paid:</td><td><input type="number" name="time" required></td></tr>
			<tr><td><font size='5' color='red'>BALANCE:</font></td><td> 
	<?php 
			if(isset($_POST['submit'])){
$first=$_POST['table']; 
$sec=$_POST['time']; 
$d=$_POST['od'];
$ans= ($sec - ($first * $d));
	echo"<input type='number' name='bal' value='$ans' readonly>";
}
?></td></tr>
			</table>
			</td></tr></table></form>
			</li>
          </ul>
        </div>
      </div>
    </div>
    <div id="footer">
      <ul>
        <li class="first">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="beer.php">Ice-cream</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </li>
      </ul>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p></div>
  </div>
</div>
</body>
</html>