<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acer</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
</head>

<body>

<!-----logo and nav over----->
<?php
include("topnav.php");
?>
<!-----logo and nav over----->
	<div class="titleforpage">
	<img src="img/acer_banner.jpg" style="width:1024px; height:150px;">
    
	</div>


<div class="middledivpage">

<!-------------------------------------------------------------------->
<?php
include("admin/database.php");
include("pager/pager.php");


$showsql = "select * from addlaptop where brand='acer' " or die(mysql_error());
$row=mysqli_query($dbb,$showsql);


$pagesize=6;

					$parameter='';

					$NoMake='';

					if($pagesize)

					$parameter.="&ps=".$pagesize;

					if(empty($_REQUEST["page"]))

						$_REQUEST["page"]=1;

	if(ExecPaging($showsql,$parameter,$pagesize))

						$rid=ExecPaging($showsql,$parameter,$pagesize,"samsung.php");

					else

						$NoMake=1;



						$num=count($rid);

						

      // $i=1;



	    if($NoMake=='') 

		{

 for($i=0;$i<$num;$i++)

      

//while($rid=mysql_fetch_array($res))

{
?>



<!-------------------------------------------------------------------->

<div class="box">
<img src="admin/<?php echo $rid[$i]['image'];?>" width="220" height="190" style="margin-left:50px; margin-top:10px;">
<hr>
<p class="forname"><?php echo $rid[$i]['brand'];?> <?php echo $rid[$i]['name']; ?></p> 
<p class="forprice">Price $<?php echo $rid[$i]['price'];   ?>/-</p>
<a href="laptopdescription.php?url= <?php echo $rid[$i]['id'] ?> ">
<center><input type="button" value="View" class="viewbtn"></center></a>

</div>

<?php
}
}
?>

	<hr>
</div>
 	<div class="pagerdiv">
	<?php echo "<p align='center' class='pagerbelow'>".$pagelist."</p>";?>   
	</div>






<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!------------------------->
</body>
</html>