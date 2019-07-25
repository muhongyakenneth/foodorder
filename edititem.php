<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from resv where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
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
$submittedby = $_SESSION["username"];
$update="update resv set  cname='".$name."', cphone='".$ph."', ntable='".$nt."', time='".$tm."', confirm='".$conf."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "$submittedby your Record has been Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['cname'];?>" /></p>
<p><input type="text" name="phone" e" required value="<?php echo $row['cphone'];?>" /></p>
<p><input type="text" name="nt"  required value="<?php echo $row['ntable'];?>" /></p>
<p><input type="text" name="tm"  required value="<?php echo $row['time'];?>" /></p>
<p><input type="text" name="conf"  required value="<?php echo $row['confirm'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br /> <div id="footer">
      <ul>
        <li class="first">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="beer.html">Ice-cream</a></li>
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
