<?php

	error_reporting( ~E_NOTICE ); 
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];
		$userjob = $_POST['user_job'];
		$userduty = $_POST['duty'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($userjob)){
			$errMSG = "Please Enter Your Password.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 10000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = "INSERT INTO login(username,password,image,duty) VALUES('$username', '$userjob', '$userpic', '$userduty')";
			$result_stmt = $DB_con->query($stmt) or die($DB_con->error.__LINE__);
			
			if($result_stmt)
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:2;home.php"); // redirects image view page after 2 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<html>
<head>
<title>R.O & R.Sys | ADD user</title>
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
</head>
<body>
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	<center><h1>ADD User<hr></h1></center>
	
    <tr>
    	<td><label class="control-label">UserName(s):</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Enter UserName" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Password:</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Password" value="<?php echo $userjob; ?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Duty:</label></td>
        <td><input class="form-control" type="text" name="duty" placeholder="Enter Duty" value="<?php echo $userduty; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Item Img:</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr><td></td>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button></form>
		<a href="home.php"><button style='background-color:green; width: 100px; color:white; border-radius: 10px;'>Back</button></a>
        </td>
    </tr>
    
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
      <p>Copyright &copy; 2018 <a href="#">Restaurant Order and Reservation System</a> All rights reserved | Icafe</p>
    </div>
  </div>
</div>
</body>
</html>
