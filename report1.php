<html>
<head>
<title>R.O & R.Sys | ADMIN</title>
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
             <a href="orh.php">ADD ORDERS</a>
             <a href="vorh.php">VIEW ORDERS</a>
             <a href="report1.php">REPORTS</a>
		     <a href="index.html">LOGOUT</a>
		  </nav>
          </div>		  
          </div>
    <div id="body">
	<div class="content">
	<div class="body">
	<table>
	<center><h1>Order @ hand Report<hr></h1></center>
	<form><button class="ui blue tiny button" onClick="javascript:window.print()">Print Report</button></form>
	<th color="maroon">Item Name</th><th>Price for Each Item</th><th>Date</th><th>Number of orders</th><th>Amount Paid</th>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}
$sql = "select item, price,date_delivery,sum(orders)nt,(price*(sum(orders)))po from ordh group by date_delivery";
if ($result = mysqli_query($link, $sql)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td><center>$row[item]</center></td><td><center>$row[price]</center></td><td><center>$row[date_delivery]</center></td><td><center>$row[nt]</center></td><td><center>$row[po]</center></td></tr>";
	}
	
}	
}
$sql1 = "SELECT sum(orders),sum(price*orders) FROM ordh";
if ($result = mysqli_query($link, $sql1)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td></td><td></td><td></td><td><center>TOTAL: $row[0]</cente></td><td><center>TOTAL: $row[1] /=</cente></td></tr>";
	}
	
}	
}else "ERROR:could not execute $sql. " . mysqli_error($link);

?>	
	</table>
    </div>    
    <div id="footer">
      <nav>
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="menu.php">Menu</a>
            <a href="beer.php">Ice-cream</a>
            <a href="contact.html">Contact Us</a>
          </nav>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p>
    </div>
  </div>
</div>
</body>
</html>


