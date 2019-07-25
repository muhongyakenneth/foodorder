<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];
$query = "SELECT * from forder where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>R.O & R.Sys | ADMIN #Edit Records</title>
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
$t =$_REQUEST['t'];
$d =$_REQUEST['d'];
$add =$_REQUEST['add'];
$conf =$_REQUEST['conf'];
$update="update forder set  Customer_no='".$name."', fname='".$ph."',address='".$add."',delivery='".$d."', fprice='".$nt."', no_order='".$tm."',time='".$t."', confirm='".$conf."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = " Order ($id) has been Updated Successfully. </br></br><a href='adhome.php'>View Updated Record</a>";
echo '<p><center><font size=5 color=green>'.$status.'</font></center></p>';
}else {
?>
<div>
<center>
<form name="form" method="post" action=""> 
<center><b><h1>Edit Orders</h1><hr></b></center>
<table>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<tr><td>Customer Phone No:</td><td><input type="text" name="name"  required value="<?php echo $row['Customer_no'];?>" /></td></tr>
<tr><td>Order Name</td><td><input type="text" name="phone"  required value="<?php echo $row['fname'];?>" /></td></tr>
<tr><td>Order Price:</td><td><input type="text" name="nt"  required value="<?php echo $row['fprice'];?>" /></td></tr>
<tr><td>Number of order(s):</td><td><input type="text" name="t" required value="<?php echo $row['time'];?>" /></td></tr>
<tr><td>Order Pickup Time:</td><td><input type="time" name="tm" required value="<?php echo $row['time'];?>" /></td></tr>
<tr><td>Delivery:</td><td><input type="text" name="d" value="<?php echo $row['delivery'];?>"></td></tr>
<tr><td>Delivery Address:</td><td><input type="text" name="add" value="<?php echo $row['address'];?>"></td></tr>
<tr><td>Confirmed ?</td><td> <input type="text" name="conf" required value="<?php echo $row['confirm'];?>" /></td></tr>
<tr><td></td><td><button name="submit" style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Update</button></td></tr>
</table>
</form>
<?php } ?>
</center>
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p>
    </div>
  </div>
</div>
</body>
</html>
