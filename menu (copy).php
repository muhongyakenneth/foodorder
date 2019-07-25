<html>
<head>
<title>FOOD Ordering System | Menu</title>
<link href="css/style3.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/theme.css">
</head>
<body>
<div id="background">
  <div class="page">
   <div id="header">
      <ul class="navigation">
        <li><a class="active" href="food.html">OUR FOOD</a></li>
        <li><a href="beer.php">ICE-CREAM</a></li>
      </ul>
      <a id="logo" href="index.html"><img src="images/icafe.jpg" width="276" height="150" alt=""></a>
      <ul id="navigation">
        <li><a href="reservation.php">RESERVATION</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
      </ul>
    </div>
<section class="specialties" id="specialties">	
		<table id="body">
		<tr>
		<td>
		<div class="row">
			<div class="col-md-4">
				<div class="restmenuwrap">
					<table border='1'><tr><th><h3>APPETIZERS/starterz</h3></th><th><h3 >MAIN</h3></th><th><h3>DESSERTS</h3></th></tr>
						<tr><td><table>
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
$sel_query="Select * from tbl_users where userName='%ice%' or userName like '%cream%' or userName like '%beer%' or userName like '%starter%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["userName"]; ?> </td><td><font color="blue"><?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td><?php echo $row["itemd"]; ?> </td></tr>
<tr><td></td><td><a href="order.php?id=<?php echo $row["userid"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<?php $count++; } ?>
</table></td>	
				</div>
			</div>
			<td>
			<table>		
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
$sel_query="Select * from tbl_users where userName='fs%' or userName like '%fs%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["userName"]; ?></td><td> <font color="blue"><?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td>
<?php echo $row["itemd"]; ?></td></tr>
<tr><td></td><td><a href="order.php?id=<?php echo $row["userid"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<?php $count++; } ?>
</table>	
			</td>
			<td>
					<table>
							<div class="restitem clearfix">
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
$sel_query="Select * from tbl_users where userName='%cake%' or userName like '%cake%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["userName"]; ?></td><td><font color="blue"> <?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td>
<?php echo $row["itemd"]; ?></td></tr>
<tr><td></td><td><a href="order.php?id=<?php echo $row["userid"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<?php $count++; } ?>
</table></td></tr>	
				</table>
			</div>
			</td>
			</tr>
					</table>
		</div>
	</div>
	</section>
    <div id="footer"><center>
            <a href="index.html">Home</a> |
            <a href="about.html">About</a> |
            <a href="menu.php">Menu</a> |
            <a href="beer.php">Ice-cream</a>  |
            <a href="contact.html">Contact Us</a> 
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p></center></div>
  </div>
  </div>
</div>
</body>
</html>

