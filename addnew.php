<?php

	error_reporting( ~E_NOTICE ); 
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$type = $_POST['type'];
		
		$sql_code = "SELECT * FROM menu_items WHERE Menu_Item = '$type'";
		$result_code = $DB_con->query($sql_code);
		$row_code = $result_code -> fetch_array();
		
		$code = $row_code['Code'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$det =$_POST['det'];
		
		$imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];		
	
		if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$image = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 10000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
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
			$stmt = "INSERT INTO sub_menu(Item, itemdescription,Type,price,userPic) VALUES('$name','$det','$type','$price','$image')";
			$result_stmt = $DB_con->query($stmt);
			
			if($result_stmt)
			{
				$successMSG = "New Item Succesfully Added ...";
				header("refresh:3;add.php"); // redirects image view page after 3 seconds.
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
<title>R.O & R.Sys | ADD ITEMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="background">
  <div id="page">
  
    <div id="header">
	  <div class="container-logo">
		<img src="images/logo-icafe.jpg" width="150" height="150" alt="" >
	  </div>
	  <div class = "container-header">
      <nav>
		<a href="home.php">PROFILE</a>
		<a href="#">ADD ITEMS</a>
		<a href="add.php">VIEW ITEMS</a>
		<a href="vres.php">VIEW RESERVATION</a>
		<a href="adhome.php">VIEW ORDERS</a>
		<a href="report.php">REPORTS</a>
		<a href="index.html">LOGOUT</a>
      </nav>
	  </div>
    </div>
    <div id="body">
	<div class="content" style="background-color: white; color: black;">
	<div class="body">


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
	    
	<table style = "color: black; padding-left: 50px;">
	<center><h1 style = "padding-top: 15px; margin-top: 15px; ">ADD ITEM TO MENU<hr></h1></center>
	
	<tr>
    	<td><label>Type:</label></td>
        <td>
			
			<select class="form-control" type="text" name="type">
				<?php
					$sql = "SELECT * FROM menu_items";
					$result = $DB_con->query($sql);
					
					while ($row = $result -> fetch_array()){
					echo "
						<option>".$row['Menu_Item']."</option>
						
						";
					}
				?>
			</select>
		
		</td>
    </tr>
    <tr>
    	<td><label>Item Name:</label></td>
        <td><input type="text" name="name" placeholder="Enter Item Name" value="<?php echo $username; ?>" /></td>
    </tr>
	<tr>
    	<td><label>Item Description:</label></td>
        <td><textarea type="text" name="det" placeholder="Enter Item Details"></textarea></td>
    </tr>
    
    <tr>
    	<td><label>Price:</label></td>
        <td><input type="text" name="price" placeholder="Item Price"/></td>
    </tr>
    
    <tr>
    	<td><label>Item Image:</label></td>
        <td><input type="file" name="image" accept="image/*" /></td>
    </tr>
    </table>
	
	<div class = "button" style = "padding-left:550px; padding-bottom: 15px;">
    <button type="submit" name="btnsave">ADD</button>
    </div> 
    
</form>
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
      
			<p>Copyright &copy; 2018 <a href="#">ICAFE Restaurant</a> All rights reserved | <a target="_blank" href="http://www.icafe.com/">icafe.com</a></p>
    </div>
  </div>
</div>
</body>
</html>
