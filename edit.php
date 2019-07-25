<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "SELECT * from resv where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>R.O & R.Sys | ADMIN #Edit Records</title>
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
        <a class="active" href="#">VIEW RESERVATION</a>
        <a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
      </div>
    </div>
    <div id="body">
	<div class="content">
	<div class="body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$ph =$_REQUEST['phone'];
$nt =$_REQUEST['nt'];
$tm =$_REQUEST['tm'];
$conf =$_REQUEST['conf'];
$update="update resv set  cname='".$name."', cphone='".$ph."', ntable='".$nt."', time='".$tm."', confirm='".$conf."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = " Order has been Updated Successfully. </br></br><a href='vres.php'>View Updated Record</a>";
echo '<p><center><font size=5 color=green>'.$status.'</font></center></p>';
}else {
?>
<div>
<center>
<form name="form" method="post" action=""> 
<center><b><h1>Edit Reservations</h1><hr></b></center>
<table>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<tr><td>Customer Name:</td><td><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['cname'];?>" /></td></tr>
<tr><td>Customer Phone No.</td><td><input type="text" name="phone" placeholder="Enter phonenumber" required value="<?php echo $row['cphone'];?>" /></td></tr>
<tr><td>No. of Tables Booked:</td><td><input type="text" name="nt" placeholder="Enter number of tables" required value="<?php echo $row['ntable'];?>" /></td></tr>
<tr><td>Customers' Arrival time:</td><td><input type="text" name="tm" placeholder="Enter arrival time" required value="<?php echo $row['time'];?>" /></td></tr>
<tr><td>Confirmed ?</td><td> <input type="text" name="conf" placeholder="confirm" required value="<?php echo $row['confirm'];?>" /></td></tr>
<tr><td></td><td><button name="submit" style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Update</button></td></tr>
</table>
</form>
<?php } ?>
</center>
</div>  
</div> 
</div>
</div>
    <div id="footer">
      </nav>
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
