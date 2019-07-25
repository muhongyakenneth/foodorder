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
	  <a href="home.php">PROFILE</a>
        <a href="addnew.php">ADD ITEMS</a>
        <a href="add.php">VIEW ITEMS</a>
        <a href="vres.php">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a class="active" href="#Report">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
      </div>
    </div>
	  <div id="body">
	<div class="content">
	<div class="body">
	<table>
	<center><h1>Sales Report<hr></h1></center>
<form><button class="ui blue tiny button" onClick="javascript:window.print()">Print Report</button><a href="report.php"></form>|<button>Back</button></a>
	<th color="maroon">Item</th><th>Number of orders</th><th>Date</th><th>Order Price</th>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}
$sql = "SELECT *,sum(no_order)nt,(fprice*sum(no_order))po FROM forder group by date";
if ($result = mysqli_query($link, $sql)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td><center>$row[fname]</cente></td><td><center>$row[nt]</cente></td><td><center>$row[date]</cente></td><td><center>$row[po]</center></td></tr>";
	}
	
}	
}
$sql1 = "SELECT sum(no_order),sum(fprice) FROM forder";
if ($result = mysqli_query($link, $sql1)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td><center></cente></td><td><center>TOTAL: $row[0] </cente></td><td></td><td><center>TOTAL: $row[1] /=</cente></td></tr>";
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
            <a href="beer.php">Ice-cream</a></li>
            <a href="contact.html">Contact Us</a></li>
          </nav>
      <p>Copyright &copy; 2018 <a href="#">Icafe Restaurant Order and Reservation System</a> All rights reserved | Icafe restaurant</p>
    </div>
  </div>
</div>
</body>
</html>

