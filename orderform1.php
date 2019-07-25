<?php
$con = mysqli_connect("localhost","root","","soul");
$DB_con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "SELECT * from sub_menu where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<head>
<title>R.O & R.Sys | Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style3.css">
</head>
<body>
<div id="background">
  <div class="page">
     
	     <div id="header"style="background-color:black;padding-bottom:25px";>
         <div class="container-logo">
		 <img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	     </div>
	     <div class = "container-header">
          <nav>
        <a href="addnew.php">ADD ITEMS</a>
        <a href="add.php">VIEW ITEMS</a>
        <a href="vres.php">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
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
		<tr><td>Name:</td><td><input type="text" name="name" placeholder="input your name"></td></tr>
			
			<tr><td>Item Name:</td><td><input type="text" name="number" value="<?php echo $row['Item']; ?>" required readonly></td></tr>
			<tr><td>Item Price:</td><td><input type="text" name="table" value="<?php echo $row['price']; ?>" required readonly></td></tr>
			<tr><td>Item Pic</td><td><img src="user_images/<?php echo $row['userPic']; ?>" height="150" width="150" /></td></tr>
			<tr><td>Number of Orders.</td><td><input type='text' name="od" required></td></tr>
			<tr><td>Date:</td><td><input type='date' name="dt" required></td></tr>
<tr><td>Delivery:</td><td><select name="del" required><option>---Select an option---</option><option>Yes</option><option>No</option></select></td></tr>
			<tr><td>Delivery Address[yr addrss]:</td><td><input type="text" name="add" placeholder="your delivery address"></td></tr>
            <tr><td>Contact:</td><td><input type="text" name="contact" placeholder="your contact"></td></tr>

			
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
	    $name=$_POST['names'];
		$conta=$_POST['contact'];
		if(empty($username)){
			$errMSG = "Please Enter Item Name.";
		}	
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO ordh(names,Item,price,orders,date_delivery,delivery,address,contact) VALUES(:na,:uname,:ut,:ud,:udt,:up,:uadd,:co)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ut',$usert);
			$stmt->bindParam(':ud',$userd);
			$stmt->bindParam(':udt',$userdt);
			$stmt->bindParam(':up',$userp);
			$stmt->bindParam(':uadd',$useradd);
			$stmt->bindParam(':na',$name);
			$stmt->bindParam(':co',$conta);
			if($stmt->execute())
			{?>
			 <script>
				alert('Your order has been made');
				</script>
				<?php
				header("refresh:6,orh1.php");
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
     
          <nav>
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="menu.php">Menu</a>
            <a href="beer.php">Ice-cream</a>
            <a href="contact.html">Contact Us</a>
         </nav>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p></div>
  </div>
</div>
</body>
</html>