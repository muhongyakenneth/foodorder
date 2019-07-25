<html>
<head>
<title>R.O & R.Sys | ADMIN</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="background">
  <div class="page">
    <div id="header" style="background-color:black;padding-bottom:30px";>
	<div class="container-logo">
		<a href="index.html"><img src="images/logo-icafe.jpg " width="150" height="150" alt="" >
	  </div>
     <center><nav>
	 <a href="index.html">HOME</a>
        <a href="food.php">OUR FOOD</a>
        <a href="beer.php">ICE-CREAM</a>
        <a href="reservation.php">RESERVATION</a>
        <a href="contact.html">CONTACT US</a>
		</nav><center>
     </div>
    </div>
<?php
	$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not       
        $query1 = "SELECT * FROM `login` WHERE username='$username' and password='$password' and duty='staff'";
		$result1 = mysqli_query($con,$query1) or die(mysqli_error());
		$rows1 = mysqli_num_rows($result1);
        $query = "SELECT * FROM `login` WHERE username='$username' and password='$password' and duty='admin'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location: home.php"); // Redirect user to index.php
            }elseif($rows1==1){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location: home1.php"); // Redirect user to index.php
            }
			else{
				echo "<div id='body'><h3><center><font color=red size=6>Username/password is incorrect.</font></center></h3><br/><center><font color=maroon size=6>Click here to </font><a href='blog.php'><font color=blue size=7>Login</font></a></center></div>";
				}
    }
?>
 <div id="body">
       <div class="grid">
<center><form action="" method="post" name="login" class="form login">
<header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>
	  <div class="login__body">
	   <div class="form__field">
<input type="text" name="username" placeholder="Username" required />
</div><br>
 <div class="form__field">
<input type="password" name="password" placeholder="Password" required />
</div><br><br>
 <div class="form__field">
<input name="submit" type="submit" value="Login" />
</div>
</div>
</form></center>
 <div id="footer">
      <center><nav>
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="menu.html">Menu</a>
            <a href="beer.html">Ice-cream</a>
            <a href="contact.html">Contact Us</a>
          </nav></center>
     <center><p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved |Icafe</p></center>
    </div>
  </div>
</div>



</body>
</html>
