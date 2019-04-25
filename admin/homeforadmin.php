<?php
session_start();
if(isset($_SESSION['admin']))
{
	$idd = $_SESSION['admin_id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Backend</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
</head>

<body>
<div class="top">
<br><br>
<h1>Admin Panel</h1>

</div>

<div class="left">
<br>
<font class="welcome">Welcome:</font>&nbsp;<font class="adminname"><?php echo $_SESSION['admin'];?></font><br>
<a href="logout.php"><input type="button" value="LOGOUT" class="logout"></a><br>

<a href="homeforadmin.php"><input type="button" value="Home" class="btn0" style="margin-top:50px; "></a><br>
<br>
<a href="homeforadmin.php?admin=addmobiles"><input type="button" value="Add Mobiles" class="btn"  ></a><br>
<br>
<a href="homeforadmin.php?admin=addlaptop"><input type="button" value="Add Laptop" class="btn"></a><br>
<br>
<a href="homeforadmin.php?admin=viewmobiles"><input type="button" value="View Mobiles" class="btn2"></a><br>
<br>
<a href="homeforadmin.php?admin=viewlaptops"><input type="button" value="View Laptop" class="btn2"></a><br>
<br>
<a href="homeforadmin.php?admin=changepassword"><input type="button" value="Change Password" class="btn4"></a><br>
<br>
<a href="homeforadmin.php?admin=feedback"><input type="button" value="View Feedback" class="btn3"></a><br>
<br>

</div>

<div class="right">
<?php
if(isset($_REQUEST['admin']))
{
	$rt=$_REQUEST['admin'];
	if($rt=='addmobiles')
	{
		include("addmobiles.php");
	}
	elseif($rt=='addlaptop')
	{
		include("addlaptop.php");
	}
	elseif($rt=='changepassword')
	{
		include("changepassword.php");
	}
	elseif($rt=='viewmobiles')
	{
		include("viewmobiles.php");
	}
	elseif($rt=='viewlaptops')
	{
		include("viewlaptops.php");
	}
	elseif($rt=='feedback')
	{
		include("feedback.php");
	}
	
}
else
{
	?>
	<p class="txt">Admin Panel pages display in this Section..</p>
    <?php
}

?>

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