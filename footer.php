<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
</head>

<body>


<div class="foot">

<div class="foot1">

<br>
<h1 style="color:#B8B8B8;">Stay Connected</h1>
<br>
&nbsp;&nbsp;&nbsp;
<img src="img/facebook.png" />
<img src="img/gmail.png" />
<img src="img/twitter.png" />

</div>

<div class="foot3">
<br>
<img src="img/IPMART-&-AWARD.png" style="width:380px; height:150px;"/>

</div>


<div class="foot2">
<br>

<h1 style="color:#B8B8B8;">User Reviews</h1>
<?php
include("admin/database.php");
$sql=mysqli_query($dbb,"select * from feedback") or die(mysqli_error());

?>
<div style="width:450px; height:100px;">
<marquee direction="left" behavior="scroll"  >
<br>
<br>
<?php
while($rr=mysqli_fetch_array($sql))
{
?>


<font style="font-size:30px; margin-left:40px; background-image:url(img/gold.jpg);
 height:50px; color:#4A4A4A;"><?php echo $rr['feedback']; ?> 
</font>
<strong style="color:#FFB01D; font-size:20px;"><?php echo $rr['name']; ?></strong>



<?php
}
?>
</marquee>
</div>	

</div>

</div>

</body>
</html>