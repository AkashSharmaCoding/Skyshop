<?php
if(isset($_SESSION['admin']))
{
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Mobiles</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
<script src="jquery/jquery-3.2.1.min.js"></script>
</head>

<body>
<br>
<br>
<div class="sameclassdiv">
<h1 class="topheading">Add Mobiles</h1>
<hr>

<?php
include('database.php');
if(isset($_POST['sub']))
{
	$mname=			$_POST['nn'];
	$mbrand=		$_POST['brand'];
	
	$mimage=		$_FILES['image']['name'];
	$mimage_t=		$_FILES['image']['tmp_name'];
	$path=			"mobile/".$mbrand."/".$mimage;
	
	
	$mprice=		$_POST['price'];
	
	if(!is_dir("mobile/".$mbrand))
	{
		mkdir("mobile/".$mbrand);
		move_uploaded_file("$mimage_t",$path);
	
	}
	else
	{
			move_uploaded_file("$mimage_t",$path);
	
	}
	
	$sql= mysqli_query($dbb,"insert into addmobiles(name,brand,image,price) values('$mname','$mbrand','$path',$mprice)") 
	or die(mysql_error());
	
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
else
{
	
}
?>
<br>
<form action="" method="post" enctype="multipart/form-data" name="form" class="sameclassform">

<label class="headings">Mobile Name</label><br>
<input type="text" name="nn" required><br><br>

<label class="headings">Mobile Brand</label><br>
<select name="brand" required>
<option></option>
<option>Apple</option>
<option>Samsung</option>
<option>Motorola</option>
<option>HTC</option>
<option>LG</option>
</select>
<br><br>
<label class="headings">Mobile Photo</label><br>
<input type="file" name="image" required><br><br>

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