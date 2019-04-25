<?php
session_start();
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login to the Backend</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
<script src="jquery/jquery-3.2.1.min.js"></script>
 <script src="jquery/jquery-ui.js"></script>
 

</head>

 <div class="shaker">
 <h1>Login</h1>
 <hr>
 <?php
 include("database.php");
 
 if(isset($_POST['sub']))
 {
 $name=     $_POST['nn'];
 $password= $_POST['pass'];
 
 $sql= mysqli_query($dbb,"select * from user where name='$name' and password='$password' ")or die(mysqli_error());
  $nr=mysqli_num_rows($sql);
  
  if($nr==0)
  {
	  ?>
	   			<div class="errorbox">
                 	  Invalid Login        
				 </div>
                  <script>
						$(document).ready(function() 
						{
							$(".shaker").effect("bounce",1000).effect("shake",1000);
							$(".errorbox").fadeOut(10000);    
						});
					</script>   
<?php
  }
  else
  {
	  			while($rr=mysqli_fetch_array($sql))
				{
				$_SESSION['admin'] = $rr['name'];
				$_SESSION['admin_id'] = $rr['id'];
				header("location:homeforadmin.php");
				}
	  
  }
 
 }
 ?>
 <br><br>
 <form action="" method="post" class="fillfrm">
            
 <font class="headings">Name:</font><br>
 <input type="text" name="nn" class="inp" required><br><br>
            
 <font class="headings">Password:</font><br>
 <input type="password" name="pass" class="inp" required><br><br>
            
 <input type="submit" value="login" name="sub" class="sub">
            
 </form>




</div>

<body>
</body>
</html>