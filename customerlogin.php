<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>About us</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
</head>

<body>
<!-----logo and nav over----->
<?php
include("topnav.php");
?>
<!-----logo and nav over----->


<!-----Middle div starts----->
<div class="middlecustomer">
	<div class="mid1">
	
     <img src="img/Customer-login_Webbanner.png" style="width:1024px; height:170px;">
    </div>
    
    <div class="midcustomer">

    
   <br>
    <form class="f" action="" method="post">
    <label class="lblfordtl">NAME:</label><br>
    <input type="text"  name="n"  required="required" /><br /><br />
    <label class="lblfordtl">EMAIL:</label><br>
    <input type="email" name="e"  required="required" /><br /><br />
    <label class="lblfordtl">MOBILE NO:</label><br>
    <input type="text" name="m"  required="required" /><br /><br />
    <label class="lblfordtl">CITY:</label><br>
    <input type="text" name="c"  required="required" /><br /><br />
    <label class="lblfordtl">STATE:</label><br>
    <input type="text" name="s"  required="required" /><br /> 
    <label class="lblfordtl">POSTAL CODE:</label><br>
    <input type="text" name="p"  required="required" /><br /><br />
    <label class="lblfordtl">ADDRESS:</label><br>
    <textarea cols="50" rows="10" name="tx"  required="required" />
    </textarea><br /><br />
    <label class="lblfordtl">Password:</label><br>
    <input type="password" name="p"  required="required" /><br /><br />
    <label class="lblfordtl">Input Password Again:</label><br>
    <input type="password" name="ap"  required="required" /><br /><br />
    
    
    <input type="submit" value="submit" class="buynow"  name="sub" required />

	</form>


    
    
    </div>
    <div class="rightcustomer">
    
        <?php
	include("admin/database.php");
	if(isset($_POST['sub']))
	{
		$name=$_POST['n'];
		$email=$_POST['e'];
		$mobile=$_POST['m'];
		$city=$_POST['c'];
		$state=$_POST['s'];
		$postal=$_POST['p'];
		$address=$_POST['tx'];
		$password=$_POST['p'];
		$apassword=$_POST['ap'];
		
		if($password!=$apassword)
		{
			echo "Password not match..";
		}
		else
		{
		$sql= mysqli_query($dbb,"insert into customer (name,city,state,phone,email,postal,address,password) values
		('$name','$city','$state','$mobile','$email','$postal','$address','$password')") or die(mysql_error());
		
		
		if($sql)
		{
			?>
			<script type="text/javascript">
			alert("You are signed in....");
			</script>
			<?php	
		}
		else
		{
			echo "not inserted";
		}
		
		
		}
	
		
		
	
	
	}
	
	
	
	?>
    
    
    </div>
	
</div>
<!-----Middle div ends----->






<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!----------------------------->
</body>
</html>