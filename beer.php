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
  
			   <div id="header"style="background-color:black;padding-bottom: 25px;">
					<div class="container-logo">
	<a href="index.html"><img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
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
<section class="specialties" id="specialties">
		<table id="body" class="restmenuwrap" width="100%"><tr>
					<th><h1 ><center>ICE-CREAM<hr></center></h1></th></tr>
		<tr>
		<td>
				
		<table style="margin-left:80px; margin-right:30px; img-align:center;" width="85%">							
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
$sel_query="Select * from sub_menu WHERE Item='%ice%' or Item like '%cream%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["Item"]; ?></td><td><font color="blue"><?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td>
<?php echo $row["itemdescription"]; ?></td></tr><tr><td></td><td><a href="order.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a></td></tr>
<tr><td><hr></td><td><hr></td></tr>	
<?php $count++; } ?>	</table>
				
			</td>
			
			</tr>
					</table>
		</div>
	</div>
	</section>
    <div id="footer"><center>
	<nav>
            <a href="index.html">Home</a> |
            <a href="about.html">About</a> |
            <a href="menu.php">Menu</a> |
            <a href="beer.php">Ice-cream</a>  |
            <a href="contact.html">Contact Us</a> 
			</nav>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p></center></div>
  </div>
  </div>
</div>
</body>
</html>

