<?php
include("auth.php"); ?>
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
     
        <a href="addnew.php">ADD ITEMS</a>
        <a href="add.php">VIEW ITEMS</a>
        <a href="vres.php">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
     </nav>
	 </div>
    </div>
    <div id="body">
	<div class="content">
	<div class="body">	
	<table>
	<th color="maroon">Names</th><th>Price</th><th>Number of Orders</th><th>Delivery</th><th>Address</th>
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
$sel_query="Select * from ordh ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["Item"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td><td align="center"><?php echo $row["orders"]; ?></td>
<td align="center"><?php echo $row["delivery"]; ?></td><td align="center"><?php echo $row["address"]; ?></td></tr>
<?php $count++; } ?>
</tbody>
</table>
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p>
    </div>
  </div>
</div>
</body>
</html>
