<?php
if(isset($_SESSION['admin']))
{
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
<script src="jquery/jquery-3.2.1.min.js"></script>
 
</head>

<body>
<?php
include("database.php");
$sql=mysqli_query($dbb,"select * from user where id='$idd'") or die(mysql_error());
$rr=mysqli_fetch_array($sql);
$userpass=$rr['password'];
?>
<br><br>
<div class="sameclassdiv">
<h1 class="topheading">Change Password</h1>
<hr>
<br>

<?php
if(isset($_POST['sub']))
{
	$currentpass= $_POST['cpass'];
	$newpass=	  $_POST['npass'];
	$repass=	  $_POST['repass'];
	
	if($userpass!=$currentpass)
	{
		?>
		<div class="errorbox2">
		<?php
        echo "Old Password Not Match";
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
	elseif($newpass!=$repass)
	{
		?>
		<div class="errorbox2">
		<?php
        echo "Both New Password Not Match";
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
	else
	{
		$upd = mysqli_query($dbb,"update user SET password='$newpass' where id='$idd'") or die(mysqli_error());
		if($upd)
			{
				?>
                <div class="errorbox2">
                <?php
                echo "Password Changed.. Logout id..";
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
			else
			{
				echo "error occur";
			}
	}
}
else
{
	
}

?>

<form method="post" class="sameclassform">
<label class="headings">Current password:</label><br>
<input type="text" name="cpass"><br><br>

<label class="headings">New password:</label><br>
<input type="text" name="npass"><br><br>

<label class="headings">Re-Enter New Password:</label><br>
<input type="text" name="repass"><br><br>

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