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
   <div id="header">
      <ul class="navigation">
        <li><a href="food.php">OUR FOOD</a></li>
        <li><a href="beer.php">ICE-CREAM</a></li>
      </ul>
      <a id="logo" href="index.html"><img src="images/icafe.jpg" width="276" height="203" alt=""></a>
      <ul id="navigation">
        <li><a href="reservation.php">RESERVATION</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
      </ul>
    </div>
<section class="specialties" id="specialties">	
		<table id="body" width="100%">
		<tr>
		<td>
		<div class="row">
			<div class="col-md-4">
				<div class="restmenuwrap">
		
					<h1 class="maincat notopmarg text-center"><center>Famous Beers<hr></center></h1>
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
$sel_query="Select * from tbl_users where userName='%beer%' or userName like '%starter%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<img style="border-radius:2000;" width="150" src="user_images/<?php echo $row['userPic']; ?>"class="rm-thumb"/>
<h5><?php echo $row["userName"]; ?> <font color="blue"><?php echo $row["price"]; ?>Shs</font></h5>
<p>
<?php echo $row["itemd"]; ?><a href="order.php?id=<?php echo $row["userid"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a>
	
</p>
<?php $count++; } ?>
</div>	
				</div>
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

