<?php
include("auth.php"); ?>
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
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
		</div>
      
    </div>
	<div id="body">
	<div class="content">
	<div class="body">
<div class="form">
<p><font color="green" size="10">Welcome <?php echo $_SESSION['username']; ?> </font><font size='6'>to Icafe restaurant Order and reservation system.</font></p>
<p>New User --> <a href="admreg.php"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Register</button></a>
</p>
<table>

					 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soul";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link){
	die("connection failed".connection_error());
}
$user=$_SESSION['password'];
$sql = "SELECT * FROM login where password ='$user'";
if ($result = mysqli_query($link, $sql)){
if (mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){
		?>
						<tr><td><ul class="navigation">
						<li>				
						
							<img src="user_images/<?php echo $row['image']; ?>" height="150" width="150" style="border-radius:2000px;"/></li>
											
						<li><h5><?php echo $_SESSION['username']; ?></h5></li>
						</ul></td><td>
						 
						<ul class="navigation">
						<li><a href="aedit.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Edit Profile</button></a></li>
						<li><a href="orh1.php"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Orderz @ hand</button></a></li>
						<li><a href="vorh1.php"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>VIEW orderz @ hand</button></a></li>
						<li><a href="addstf.php"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>View Staff</button></a></li>
						</ul></td></tr>
						<?php	
	}
	
}	
}else "ERROR:could not execute $sql. " . mysqli_error($link);
?>
</table>
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
          
        </li>
      </ul>
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p>
    </div>
  </div>
</div>
</body>
</html>

