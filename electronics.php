<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Electronics</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
</head>

<body>

<!-----logo and nav over----->
<?php
include("topnav.php");
?>
<!-----logo and nav over----->
	<div class="titleforpage">
	<br>
	<br>
    <h2 class="nesmid1">Mobiles and Laptops</h2>
    
	</div>

<!-------------------------------------------------------------------->

<div class="middledivforelect">
<br>
<br>
<br>
<p class="eleintro">
Checkout Out Gadgets Mobile or Laptops In a Very Good Price Range.<br>
Please choose the catagory below: 
</p><br>
<p class="eleintro">
For Mobiles <a href="mobiles.php">Click Here..</a><br><br>

For Laptops <a href="laptops.php">Click Here..</a><br>
<br>
</p>

<div class="newitem"> 
<div style="width:74px; height:205px; background-color:#e8e8e8; float:left;" >
    <p style="font-size:18px; font-family:myfontbody;">New Mobiles</p></div>
        <div style="width:950px; height:205px; background-color:#e8e8e8; float:right;">
        <?php
		include('admin/database.php');
		$sql= mysqli_query($dbb,"select * from addmobiles order by id desc LIMIT 0,4") or die(mysqli_error());
		while($row=mysqli_fetch_array($sql))
		{
		?>
        
		<div class="showrecent">
        <?php 
		$id= $row['id'];
		$mm2= "admin/".$row['image'];
		
		echo $row['brand']; ?>&nbsp; 
		
		<?php
		echo $row['name'];
		echo "<a href='mobiledescription.php?url=$id'><img src='$mm2' width=230 height=190></a><br><br>";
        
		?>
        </div>
        	
		<?php	
			
		}
		?>
       
        </div>
</div>

<div class="newitem"> 
<div style="width:74px; height:205px; background-color:#e8e8e8; float:left;" >
    <p style="font-size:18px; font-family:myfontbody;">New Laptops</p></div>
        <div style="width:950px; height:205px; background-color:#e8e8e8; float:right;">
        <?php
		include('admin/database.php');
		$sql= mysqli_query($dbb,"select * from addlaptop order by id desc LIMIT 0,4") or die(mysql_error());
		while($row=mysqli_fetch_array($sql))
		{
		?>
        
		<div class="showrecent">
        <?php 
		$id= $row['id'];
		$mm2= "admin/".$row['image'];
		
		echo $row['brand']; ?>&nbsp; 
		
		<?php
		echo $row['name'];
		echo "<a href='laptopdescription.php?url=$id'><img src='$mm2' width=220 height=170></a><br><br>";
        
		?>
        </div>
        	
		<?php	
			
		}
		?>
        
        
        
        
        </div>
</div>

</div>

<!-------------------------------------------------------------------->


<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!------------------------->
</body>
</html>