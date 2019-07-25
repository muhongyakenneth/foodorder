<html>
<head>
<title>R.O & R.Sys | Reservation</title>
<meta charset="iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="background">
  <div class="page">
    <div id="header" style="background-color:black;padding-bottom:25px";>
     <div class="container-logo">
	<a href="index.html"><img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
		  </div>
		  <div class = "container-header">
		  <nav>
		            <a href="home.html">HOME</a>
					<a href="food.php">OUR FOOD</a>
					<a href="beer.php">ICE-CREAM</a>
					<a href="reservation.php">RESERVE A TABLE</a>
					<a href="contact.html">CONTACT US</a>
					</nav>
					</nav>
    </div>
    <div id="body">
      <div class="content">
        <div class="body">
          <h2>RESERVATION</h2>
          <ul>
            
              <h4> Feel the VIP treatment through making your reservations in time so that you and your loved ones enjoy your meals. </h4>
              <p> You can make your payements from any where you are in the country through our mobile money accounts.<br>
			  The mobile money reason should be your phone No. when your sending money. </p>
           
          </ul>
          <ul class="news">
            
			
			<form method="POST">
			<table cellspacing="3" style="color:black";>
			<tr><td>Customer's Names.</td><td><input type="text" name="name" required></td></tr>
			<tr><td>Customer Phone No.</td><td><input type="text" name="number" required></td></tr>
			<tr><td>Number of Tables.</td><td><select name="table" required><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option></select></td><td>each table @ 100,000/= (5 seater)</td></tr>
			<tr><td>Date</td><td><input type="date" name="dt" required></td></tr>
			<tr><td>Time</td><td><input type="time" name="time" required></td></tr>
			<tr><td>Purpose for reserving a table</td><td><input type="text" name="purpose" required></td></tr>
			<tr><td>Our M.M number:</td><td><input type="text" value="+2567823415345" readonly></td></tr>
			<tr><td>Make your payements thru:</td><td><textarea rows="3" cols="4" readonly required>Mobile Money No.+256705333454 Mobile Money Name:icafe</textarea></td></tr>
			<tr><td></td><td><center><button name="submit">Reserve</center></button></td></tr>			
			</table>
			<?php
			if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}
$n=$_POST['name'];
$no=$_POST['number'];
$t=$_POST['table'];
$dt=$_POST['dt'];
$tm=$_POST['time'];
$pp=$_POST['purpose'];


$sql = "INSERT INTO resv VALUES ('', '$n','$no','$t','$tm','','$dt','$pp')";
if(mysqli_query($link, $sql)){
	echo"<script>alert('Your Order has been received')</script>";
	header("refresh:2;index.html");
}
			}
?>
			</form>
			
          </ul>
        </div>
      </div>
    </div>
    <div id="footer">
      <ul>
        <li class="first">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="beer.php">Ice-cream</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </li>
      </ul>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p></div>
  </div>
</div>
</body>
</html>
