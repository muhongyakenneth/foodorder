
<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_GET['id'];
$query = "SELECT * from sub_menu where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

$errMSG = '';
?>

<html>
<head>
<title>R.O & R.Sys | ADD ITEMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="background">
  <div id="page">
  
    <div id="header">
	  <div class="container-logo">
		<img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	  </div>
	  <div class = "container-header">
      <nav>
	    <a href="index.html">HOME</a>
		<a href="food.php">OUR FOOD</a>
		<a href="beer.php">ICE-CREAM</a>
		<a href="reservation.php">RESERVE A TABLE</a>
		<a href="contact.html">CONTACT US</a>
      </nav>
	  </div>
    </div>
    <div id="body">
	<div class="content" style="background-color: white; color: black;">
	<div class="body">

	
	    
	<center><h1 style = "padding-top: 15px; margin-top: 15px; ">Order your Food<hr></h1></center>
	<p><?php echo $errMSG; ?></p>
	<table style = "color: black; padding-left: 50px;">
	<form method="POST" action="">
	<tr>
	<td>Names:</td>
	<td><input type="text" name="name" placeholder="Enter your names"></td>
	</tr>			
	
	<tr>
	<td>Item Name:</td>
	<td><input type="text" name="item" value="<?php echo $row['Item']; ?>" required readonly></td>
	</tr>
	
	<tr>
	<td>Item Price:</td>
	<td><input type="text" name="price" value="<?php echo $row['price']; ?>" required readonly></td>
	</tr>
			
	<tr>
	<td>Item Pic</td>
	<td><img src="user_images/<?php echo $row['userPic']; ?>" height="150" width="150" /></td>
	</tr>
	
	<tr>
	<td>Number of Orders</td>
	<td><input type='text' name="order_number" required></td>
	</tr>
	
	<tr>
	<td>Date:</td>
	<td><input type='date' name="delivery_date" required></td>
	</tr>
	
	<tr>
	<td>Delivery:</td>
	<td><select name="delivery_option" required>
			<option>---Select an option---</option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</td>
	</tr>
	
	<tr>
	<td>Delivery Address[yr addrss]:</td>
	<td><input type="text" name="address" placeholder="your delivery address"></td>
	</tr>

	<tr>
	<td>Contact:</td>
	<td><input type="text" name="phone" placeholder="Enter a phone number"></td>
	</tr>		
			
	<tr>
	<td></td>
	<td><button name='submit'>Order</button></td>
	</tr>
			
	</table>
	<?php
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$item=$_POST['item'];
		$price=$_POST['price'];
		$order_number=$_POST['order_number'];
		$delivery_date=$_POST['delivery_date'];
		$delivery_option=$_POST['delivery_option'];
		$address=$_POST['address'];	
		$phone=$_POST['phone'];
	
		if(empty($name)){
			$errMSG = "Please Enter your names.";
		}
		else
		{
			$stmt = "INSERT INTO ordh (names, item, price, orders, date_delivery, delivery, address, contact) VALUES('$name', '$item', '$price', '$order_number', '$delivery_date', '$delivery_option', '$address', '$phone')";
			$result = $con->query($stmt) or die ($con->error.__LINE__);
			if($result){
			echo"
			<script>
			alert('Your order has been made');</script>
			header('refresh:6,food.php')
			";
			}
			else
			{
				$errMSG = "error while Making an order....";
			}
		}
	}
?>

    
</form>
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
      
			<p>Copyright &copy; 2018 <a href="#">ICAFE Restaurant</a> All rights reserved | <a target="_blank" href="http://www.icafe.com/">icafe.com</a></p>
    </div>
  </div>
</div>
</body>
</html>
