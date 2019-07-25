<?php
include("auth.php"); ?>
<head>
<title>R.O & R.Sys | Admin</title>
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
<div class="form">
<table>
	<th color="maroon">Staff ID</th><th>Staff Name</th><th>Password</th><th>Duty</th><th>Edit</th><th>Delete</th>
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
$sel_query="Select * from login  where duty ='staff' or duty ='sales man'ORDER by id desc ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td><td align="center"><input type="password" value="<?php echo $row["password"]; ?>" readonly></td>
<td align="center"><?php echo $row["duty"]; ?></td><td align="center"><a href="sedit.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Edit</button></a></td><td align="center">
<a href="deletest.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 60px; color:white; border-radius: 10px;'>Delete</button></a></td></tr>
<?php $count++; } ?>
</tbody>
	</table>
    </div>
</div>	
    <div id="footer">
      <nav>
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="menu.html">Menu</a>
            <a href="beer.html">Ice-cream</a>
            <a href="contact.html">Contact Us</a>
        </nav>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p>
    </div>
  </div>
</div>
</body>
</html>

