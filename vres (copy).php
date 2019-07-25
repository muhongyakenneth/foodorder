<html>
<head>
<title>R.O & R.Sys | ADMIN</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="background">
  <div class="page">
	 <div id="header"style="background-color:black;padding-bottom:15px";>
      <div class="container-logo">
		<img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	  </div>
	  <div class = "container-header">
     <nav>
		<a href="home.php">PROFILE</a>
        <a href="addnew.php">ADD ITEMS</a>
        <a href="add.php">VIEW ITEMS</a>
        <a href="#">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
      </nav>
	  </div>
    </div>
    <div id="body">
	<div class="content">
	<div class="body">	
	<table style="color:black;">
	<th style="background-color=maroon;">Customer's Names</th><th>Customer Phone No</th><th>Number of tables</th><th>Date</th><th>Time</th><th>Confirm orders</th><th>Amount to be paid</th><th>Confirm</th><th>Edit</th><th>Delete</th>
<tbody >
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
$sel_query="Select *,(100000*ntable)Amount from resv ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td style="color:black";align="center"><?php echo $row["cname"]; ?></td>
<td align="center"><?php echo $row["cphone"]; ?></td><td align="center"><?php echo $row["ntable"]; ?></td><td align="center"><?php echo $row["date"]; ?></td>
<td align="center"><?php echo $row["time"]; ?></td><td align="center"><?php echo $row["confirm"]; ?></td>
<td align="center"><?php echo $row["Amount"]; ?></td>
<td align="center";style="color:blue";><a href="conf1.php?id=<?php echo $row["id"]; ?>">Confirmed</a></td>
<td align="center" style="color:blue";><style="color:black"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center">
<a href="delete
.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
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
