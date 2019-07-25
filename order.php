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
<html>
<head>
<title>R.O & R.Sys | Reservation</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="background">
  <div class="page">
     <div id="header"style="background-color:black;padding-bottom:25px";>
         <div class="container-logo">
		 <img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	     </div>
	     <div class = "container-header">
          <center><nav>
		  <a href="index.html">HOME</a>
        <a href="food.php">OUR FOOD</a>
        <a href="beer.php">ICE-CREAM</a>
         <a  href="reservation.php">RESERVATION</a>
        <a href="contact.html">CONTACT US</a>
	   
	   </nav></center>
	   <div>
      
    </div>
    <div id="body">
      <div class="content">
        <div class="body">
          <h2>Make your oders</h2>
          <ul>
            <li>
              <h4> Feel the VIP treatment through making your oders at anytime so that you and your loved ones enjoy your meals. </h4>
              <p> You can make your payements from any where you are in the country through our mobile money accounts.<br>
			  The mobile money reason should be your phone No. when your sending money.<br>
			  Your Order will be considered valid after we recieve your payements through our mobile money numbers. </p>
            </li>
          </ul>
          <ul class="news">
            <li>
			<form method="POST">
			<table>
			<tr><td>Customer Name.</td><td><input type="text" placeholder="User Name" name="nm" required></td></tr>
			<tr><td>Customer Phone No.</td><td><input type="text" placeholder="User_MM_Number" name="name" required></td></tr>
			<tr><td>Item Name:</td><td><input type="text" name="number" value="<?php echo $row['Item']; ?>" required readonly></td></tr>
			<tr><td>Item Price:</td><td><input type="text" name="table" value="<?php echo $row['price']; ?>" required readonly></td></tr>
			<tr><td>Item Pic</td><td><img src="user_images/<?php echo $row['userPic']; ?>" height="150" width="150" /></td></tr>
			<tr><td>Number of Orders.</td><td><input type="text" name="od" required></td></tr>
			<tr><td>Date:</td><td><input type="date" name="dt" required></td></tr>
			<tr><td>Pickup time:</td><td><input type="time" name="time" required></td></tr>
			<tr><td>Delivery:</td><td><select name="del" required><option>---Select an option---</option><option>Yes</option><option>No</option></select></td></tr>
			<tr><td>Delivery Address[yr addrss]:</td><td><input type="text" name="add" placeholder="your delivery address"></td></tr>
			<tr><td>Delivery time:</td><td><font bgcolor='grey'> 1 hr after making ur order</font></td></tr>
			<tr><td>Our M.M number:</td><td><input type="text" value="+2567823415345" readonly></td></tr>
			<tr><td>Make your payements thru:</td><td><textarea rows="3" cols="4" readonly required>Mobile Money No.+2567823415345     MM Name: Soul Gardens</textarea></td></tr>
			<tr><td></td><td><center><button name="submit">Order</center></button></td></tr>			
			</table>
			<?php

	if(isset($_POST['submit']))
	{$con=mysqli_connect("localhost","root","","soul");
		$nm = $_POST['nm'];
		$name = $_POST['name'];
		$userno=$_POST['number'];		
		$usert=$_POST['table'];
		$userd=$_POST['od'];
		$usertm=$_POST['time'];
		$userp=$_POST['del'];
		$useradd=$_POST['add'];
		$userdt=$_POST['dt'];	
	
		if(empty($username)){
			$errMSG = "Please Enter Item Name.";
		}	
		$qy="insert into forder values('','$nm','$name','$userno','$usert','$userd','$usertm','$userp','$useradd','','$userdt')";
		if($res=mysqli_query($con,$qy)){
			?>
			 <script>
				alert('Your order has been made');
				</script>
				<?php
				header("refresh:2,food.php");
			}
			else
			{
				$errMSG = "error while Making an order....";
			}
		}
	
?>
			
			</form>
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
         
     
      <p>Copyright &copy; 2018 <a href="#">Icafe Restaurant Order and Reservation System</a> All rights reserved | Icafe</p></div>
  </div>
</div>
</body>
</html>