<html>
<head>
<title>R.O & R.Sys | ADMIN</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<div id="background">
  <div class="page">
    <div id="header">
      <ul class="navigation">
        <li><a href="food.php">OUR FOOD</a></li>
        <li><a href="beer.php">ICE-CREAM</a></li>
      </ul>
      <a id="logo" href="index.html"><img src="images/logo7.jpg" width="276" height="203" alt=""></a>
      <ul id="navigation">
        <li><a href="reservation.php">RESERVATION</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
      </ul>
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
        $query = "SELECT * FROM `login` WHERE username='$username' and password='$password' and duty='staff'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location: home1.php"); // Redirect user to index.php
            }
			else{
				echo "<div id='body'><h3><center><font color=red size=6>Username/password is incorrect.</font></center></h3><br/><center><font color=maroon size=6>Click here to </font><a href='login.php'><font color=blue size=7>Login</font></a></center></div>";
				}
    }else{
?>
 <div id="body">
       <div class="grid">
<form action="" method="post" name="login" class="form login">
<header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>
	  <div class="login__body">
	   <div class="form__field">
<input type="text" name="username" placeholder="Username" required />
</div>
 <div class="form__field">
<input type="password" name="password" placeholder="Password" required />
</div>
 <div class="form__field">
<input name="submit" type="submit" value="Login" />
</div>
</div>
</form>
 <div id="footer">
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
<?php } ?>


</body>
</html>
