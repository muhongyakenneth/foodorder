<?php
include("auth.php"); ?>
<head>
<title>R.O & R.Sys | Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="background">
  <div class="page">
 <div id="header" style="background-color:black;padding-bottom:30px";>
	<div class="container-logo">
		<a href="index.html"><img src="images/logo-icafe.jpg " width="150" height="150" alt="" >
	  </div>
     <nav>
		<a href="home.php">PROFILE</a>
        <a href="addnew.php">ADD ITEMS</a>
        <a href="add.php">VIEW ITEMS</a>
        <a href="vres.php">VIEW RESERVATION</a>
        <a class="active" href="#">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
      </div>
    </div>
	<div id="body">
	<div class="content">
	<div class="body" style="width:100%;background-color:white; border-radius:5px; magin-rights:10px;padding-bottom:50px;padding-top:50px">
<div class="form">
<center><table style="color:maroon;width="90%;">
	<thead>
	<th color="maroon">Customer</th><th>Customer Phone No</th>
	<th>Food Name</th>
	<th>Food Price</th>
	<th>Number of orders</th>
	<th>Date</th>
	<th>PickUp/D Time</th>	
	<th>Delivery</th>
	<th>Address</th>
	<th>Confirm</th>
	<th>confirm Order</th>
	<th>Edit</th>
	<th>Delete</th>
	</thead>
<tbody>
<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<?php
$count=1;
$sel_query="Select * from forder ORDER by id desc ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr style="color:black;">
<td align="center"><?php echo $row["customer_name"]; ?></td>
<td align="center"><?php echo $row["Customer_no"]; ?></td>
<td align="center"><?php echo $row["fname"]; ?></td>
<td align="center"><?php echo $row["fprice"]; ?></td>
<td align="center"><?php echo $row["no_order"]; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>
<td align="center"><input type="time" value="<?php echo $row["time"]; ?>" readonly></td>
<td align="center"><?php echo $row["delivery"]; ?></td>
<td align="center"><?php echo $row["address"]; ?></td>
<td align="center"><?php echo $row["confirm"]; ?></td>
<td align="center">
<a href="conf.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Confirm</button></a>
</td>
<td align="center">
<a href="fedit.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Edit</button></a>
</td>
<td align="center">
<a href="fdelete.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Delete</button></a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
	</table></center>
    </div>
</div><br><br><br>	
    <center><div id="footer">
	
	<nav>
      
         <a href="index.html">Home</a>
         <a href="about.html">About</a>
         <a href="menu.html">Menu</a>
         <a href="beer.html">Ice-cream</a>
         <a href="contact.html">Contact Us</a>
		 </nav>
		 
          
      <center><p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p></center>
    </div></center>
  </div>
</div>
</body>
</html>

