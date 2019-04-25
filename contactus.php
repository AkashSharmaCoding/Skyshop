<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
</head>

<body>
<!-----logo and nav over----->
<?php
include("topnav.php");
?>
<!-----logo and nav over----->

<!-----Middle div starts----->
<div class="middle">
	<div class="midcont">
	<!--<br>
	<br>-->
   <!--	<h2 class="nesmid1">Contact Us</h2>-->
    <img src="img/contactus.jpg" style="width:1024px; height:170px;">
    </div>
    
    <div class="middledivpage">
    
    <div class="dtlleft">
       <br>

	<form method="post" role="form"  name="fbform" class="fbform"> 
    <label>Name</label><br>
    <input type="text" name="nn"  required class="inputfrm"><br><br>
	<label>Email(optional)</label><br>
    <input type="email" name="em" class="inputfrm"><br><br>
    <label>Feedback</label><br>
    <textarea rows="10" cols="40"  required name="fback" class="inputfb"></textarea><br><br>
    <input type="submit" name="sub" class="sub">
    </form>
      
	</div>
    
    <div class="dtlright">
    
     <?php
    include("admin/database.php");
	
    if(isset($_POST['sub']))
    {
	
    $name=		$_POST['nn'];
    $email=		$_POST['em'];
    $feedbackk=	$_POST['fback'];
	
   
    $sql= mysqli_query($dbb,"insert into feedback (name,email,feedback) values('$name','$email','$feedbackk')") 
    or die(mysqli_error());
    
        if($sql)
        {
			echo "<img src='img/thank-you-feedback-text.png' width='470px' height='200px'>";
        }
        else
        {
            echo "Error Occur..";
        }
    
    }
	
	
    ?>
   
    
    
    
    </div>
      
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