<?php
$con = mysqli_connect("localhost","root","","soul");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_REQUEST['id'];

$query = "SELECT * from login where id='".$id."'"; 
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
<?php
if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];
		$userduty = $_POST['duty'];
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $row['image']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
		$update="update login set  username='".$username."', password='".$userjob."', image='".$userpic."', duty='".$userduty."' where id='".$id."'";
						
			if(mysqli_query($con, $update)){	
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='addstf.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
?>
<div>
<center>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">UserName.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $row['username']; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Password.</label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php echo $row['password']; ?>" required /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Duty.</label></td>
        <td><input class="form-control" type="text" name="duty" value="<?php echo $row['duty']; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Item image:</label></td>
        <td>
        	<p><img src="user_images/<?php echo $row['image']; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default" style='background-color:green; width: 100px; color:white; border-radius: 10px;'>
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="addstf.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>
</center>
</div>  
</div> 
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
