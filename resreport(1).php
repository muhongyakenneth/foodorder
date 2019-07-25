<html>
<head>
<title>R.O & R.Sys | ADMIN</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
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
		<a href="#Report">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
     </div>
    </div>
    <div id="body">
	<div class="content">
	<div class="body">
	<table>
	<center><h1>Reservation Report<hr></h1></center>
	<form><button class="ui blue tiny button" onClick="javascript:window.print()">Print Report</button><a href="report.php"></form>|<button>Back</button></a>
	<th color="maroon">Number of tables</th><th>Date</th><th>Amount paid</th>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}
$sql = "SELECT cname,cphone,sum(ntable),date,time,(100000*sum(ntable)) FROM resv group by date";
if ($result = mysqli_query($link, $sql)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td><center>$row[2]</cente></td><td><center>$row[3]</cente></td><td><center>$row[5]</cente></td></tr>";
	}
	
}	
}
$sql1 = "SELECT sum(ntable),sum(100000*ntable) FROM resv";
if ($result = mysqli_query($link, $sql1)){
if (mysqli_num_rows($result) > 0){	
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td><center>TOTAL: $row[0]</cente></td><td></td><td><center>TOTAL: $row[1] /=</cente></td></tr>";
	}
	
}	
}else "ERROR:could not execute $sql. " . mysqli_error($link);

?>	
	</table>
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p>
    </div>
  </div>
</div>
</body>
</html>
