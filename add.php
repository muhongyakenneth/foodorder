<html>
<head>
<title>FOOD Ordering System | Menu</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/theme.css">
</head>
<body>
<div id="background">
		  <div class="page">
		  <div id="header" style="background-color:black;padding-bottom:15px";>
			 <div class="container-logo">
		<img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
		  </div>
		  <center><nav>
		<a href="home.php">PROFILE</a>
        <a href="addnew.php">ADD ITEMS</a>
        <a class="active" href="#">VIEW ITEMS</a>
        <a href="vres.php">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
      </nav></center>
	  <div>
    </div>
<section class="specialties" id="specialties">	
		<table id="body">
		<tr>
		<td>
		<div class="row">
			<div class="col-md-4">
				<div class="restmenuwrap">
					<table border='1'><tr><th><h3>SNACKS/DESSERTS</h3></th><th><h3 >MAIN DISH</h3></th><th><h3>DRINKS</h3></th></tr>
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
$sel_query="Select * from sub_menu WHERE Type='Snacks' or Type like 'Salads' or Type like 'Desserts'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["Item"]; ?> </td><td><font color="blue"><?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td><?php echo $row["itemdescription"]; ?> </td></tr>
<tr><td></td><td><a href="editform.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Edit</button></a></td></tr>
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
$sel_query="Select * from sub_menu WHERE Type='Main Dish' or Type like 'Side Dish'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["Item"]; ?></td><td> <font color="blue"><?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td>
<?php echo $row["itemdescription"]; ?></td></tr>
<tr><td></td><td><a href="editform.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Edit</button></a></td></tr>
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
$sel_query="Select * from sub_menu WHERE Type='Drinks' or Type like 'Drinks'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><h5><?php echo $row["Item"]; ?></td><td><font color="blue"> <?php echo $row["price"]; ?>Shs</font></h5></td></tr>
<tr><td><img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/></td>
<td>
<?php echo $row["itemdescription"]; ?></td></tr>
<tr><td></td><td><a href="editform.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Edit</button></a></td></tr>
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe restaurant</p></center></div>
  </div>
  </div>
</div>
</body>
</html>

