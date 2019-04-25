<?php
if(isset($_SESSION['admin']))
{
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Laptop</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
<script src="jquery/jquery-3.2.1.min.js"></script>
</head>

<body>

<br>
<br>
<div class="sameclassdiv">
<h1 class="topheading">Add Laptop</h1>
<hr>
<?php
include('database.php');
if(isset($_POST['sub']))
{
$name=			$_POST['nn'];
$brand=			$_POST['brand'];

$image=			$_FILES['image']['name'];
$image_temp=	$_FILES['image']['tmp_name'];
$path=			"laptop/".$brand."/".$image;

$ram=			$_POST['ram'];
$graphiccard=	$_POST['graphic'];
$displaytype=	$_POST['display'];
$price=			$_POST['price'];
	
	if(is_dir("laptop/".$brand))
	{
		move_uploaded_file("$image_temp",$path);
	}
	else
	{
		mkdir("laptop/".$brand);
		move_uploaded_file("$image_temp",$path);
	}
	
	$sql= mysqli_query($dbb,"insert into addlaptop(name,brand,image,ram,graphic,display,price) values('$name','$brand',
	'$path','$ram','$graphiccard','$displaytype','$price')") or die(mysql_error()); 
	
	
	if($sql)
	{
		?>
        <div class="successbox">
        <?php
		echo "data inserted";
		?>
        </div>
        <script>
						$(document).ready(function() 
						{
							$(".successbox").fadeOut(5000);    
						});
					</script>   
        <?php
	}
	else
	{
					?>
        <div class="errorbox2">
        <?php
		echo "error";
		?>
        </div>
        <script>
						$(document).ready(function() 
						{
							$(".errorbox2").fadeOut(5000);    
						});
					</script>   
        <?php

	}
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form" class="sameclassform">

<label class="headings">Laptop Name</label><br>
<input type="text" name="nn" required><br><br>

<label class="headings">Laptop Brand</label><br>
<select name="brand" required>
<option></option>
<option>Sony</option>
<option>Asus</option>
<option>HCL</option>
<option>DELL</option>
<option>ACER</option>
</select>
<br><br>
<label class="headings">Laptop Photo</label><br>
<input type="file" name="image" required><br><br>

<label class="headings">Ram</label><br>
<select name="ram" required>
<option></option>
<option>1GB</option>
<option>2GB</option>
<option>3GB</option>
<option>4GB</option>
<option>8GB</option>
</select><br><br>

<label class="headings">Graphic card type</label><br>
<select name="graphic" required>
<option></option>
<option>AMD</option>
<option>Nvidia</option>
</select><br><br>

<label class="headings">Display Type</label><br>
<input type="text" name="display" required><br><br>

<label class="headings">Price</label><br>
<input type="text" name="price" required><br><br>


<input type="submit" name="sub" class="sub">

</form>

</div>


</body>
</html>
<?php
}
else
{
	header("location:index.php");	
}
?>
