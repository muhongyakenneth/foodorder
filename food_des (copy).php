<?php include 'dbconfig.php' ?>
<?php
	$type = $_GET['item'];
?>
<html>

<head>
<title>FOOD Ordering System | Menu</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="background">
	<div id="page">
	
		<div id="header">
		  <div class="container-logo">
			<a href="index.html"><img src="images/logo-icafe.jpg " width="150" height="150" alt="" >
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

		<div id="body"  style = "background-color: white;">
		<div class="wrapper">
		<div class = "wlcome">
		<h1>Here is the Menu of our Restaurant</h1>
		<p> Where quality matters , a home away from home restaurant.
		The good news are; make your bookings with just a click here @  ICAFE. </p>
		</div>
		</div>
		
		
		<div id = "menu_content">
		<div class = "list">
			<div class = "menu-header" style = "text-align: center; padding-top : 50px;">
			<?php 
				$sql = "SELECT * FROM menu_items";
				$result = $DB_con->query($sql);
				while ($row = $result -> fetch_array()){
					echo "
					
				<a href = 'food_des.php?item=".$row['Code']."'>
				<button>".$row['Menu_Item']."</button>
				</a>
					";
				}
				?>
			</div>
			<hr>
		</div>
		<div class = "menu_list">
			<table style = "margin-left: 50px; margin-right: 50px; border-bottom: 1px solid #000;" >
			<?php 
				$sql1 = "SELECT * FROM sub_menu WHERE Type = '$type'";
				$result1 = $DB_con->query($sql1);
				while ($row1 = $result1 -> fetch_array()){
					$sql2 = "SELECT * FROM menu_items WHERE Code = '$type'";
					$result2 = $DB_con->query($sql2);
					$row2 = $result2->fetch_array();
					echo "
				<tr>
				<td style = 'padding-right: 50px'><img style = 'border-radius: 2000px; width: 100px; height: 100px; 'src='user_images/".$row1['userPic']."'/></td>
				<td><h5 style = 'color : black;'>".$row1['Item']."</h5></td>
				<td><h5 style = 'color : black;'>".$row1['itemdescription']."</h5></td>
				<td><h5 style = 'color : black;'>".$row2['Menu_Item']."</h5></td>
				<td><h5 style = 'color : black;'>".$row1['price']."</h5></td>
				<td><a href='customer_order.php?id=".$row1["id"]."'><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Order</button></a></td>
				</tr>
				
					";
				}
				?>
			<table>
		</div>
		</div>
	  
		
		<table>
		
		</table>
		
	
	
	
	</div>
	
    <div id="footer">
          <nav>
			<a href="index.html">Home</a>
			<a href="about.html">About</a>
			<a href="menu.php">Menu</a>
			<a href="beer.php">Ice-cream</a>
			<a href="contact.html">Contact Us</a>
			<a href="blog.php">ADMIN LOGIN</a>
		  </nav>
      
			<p>Copyright &copy; 2018 <a href="#">ICAFE Restaurant</a> All rights reserved | <a target="_blank" href="http://www.icafe.com/">icafe.com</a></p>
    </div>
  </div>
  </div>
 
</body>
</html>

