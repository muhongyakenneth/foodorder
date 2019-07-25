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
        <a href="orh.php">ADD ORDERS</a>
        <a href="vorh.php">VIEW ORDERS</a>
		<a href="report1.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
		</nav>
      </div>
    </div>
	<div id="body">
	<div class="content">
	<div class="body">
<div class="form">
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
<p><font color="green" size="10">Welcome <?php echo $_SESSION['username']; ?> </font><font size='6'>to Icafe restaurant Order and reservation system.</font></p>
<p>Edit your profile --> <a href="hedit.php?id=<?php echo $row["id"]; ?>"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Edit</button></a>
</p>
<table>

						<tr><td><ul class="navigation">
						<li><img src="user_images/<?php echo $row['image']; ?>" height="150" width="150" style="border-radius:2000px;"/></li>
						<li><h5><?php echo $_SESSION['username']; ?></h5></li>
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Soul Gardens</p>
    </div>
  </div>
</div>
</body>
</html>

