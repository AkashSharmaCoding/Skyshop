<?php
ob_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mobile Description</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">

<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.jqzoom1.0.1.js" type="text/javascript"></script>
<link href="css/jqzoom.css" rel="stylesheet" type="text/css" />
<script type="text/xml">
<!--
<oa:widgets>
  <oa:widget wid="2148522" binding="#myvalue" />
</oa:widgets>
-->
</script>
<script type="text/javascript">
// BeginOAWidget_Instance_2148522: #myvalue
$(document).ready(function(){
      var options ={
      zoomType: 'standard',
      zoomWidth: 250,		
      zoomHeight: 250,	
      xOffset: 10,	
      yOffset: 0,
      position: "center" ,
      lens:true, 
      lensReset : false,
      imageOpacity: 0.2,
      title : true,
      alwaysOn: false,
      showEffect: 'show',
      hideEffect: 'hide',
      fadeinSpeed: 'medium',
      fadeoutSpeed: 'medium',
      preloadImages :true,
      showPreload: true,
      preloadText : 'Loading zoom',
      preloadPosition : 'center'
      }
      $(".myvalue").jqzoom(options);
      
      });
// EndOAWidget_Instance_2148522
</script>


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
    <h2 class="nesmid1">Mobile Description</h2>
    
	</div>

<!-------------------------------------------------------------------->

<div class="middledivforelect">
<?php
include('admin/database.php');
$idd= $_REQUEST['url'];

$sql= mysqli_query($dbb,"select * from addmobiles where id='$idd' ") or die(mysqli_error());
$row= mysqli_fetch_array($sql);
$mm= "admin/".$row['image'];


?>
	<div class="leftdes">
    
    <a href="<?php echo $mm; ?>" class="myvalue" title="<?php echo $row['brand']; ?>">
    <img src="<?php echo $mm; ?>" width="260" height="270" style="margin-left:120px; 
 	border-radius:5px;" />
    
	<img src="<?php echo $mm; ?>" width="160" height="170" style="margin-left:10px; 
	margin-top:10px; border-radius:5px;" /></a>
	</a>
    
    
    
    </div>
    
    
    
    
    <div class="rightdes">
    <br>
    <center><font style="font-size:34px;"><?php echo $row['brand'];?> <?php echo $row['name'];?></font></center>
    <br>
    <hr>
    <br />
    
    <b><font size="+1">Price: <?php echo $row['price']; ?> $</font>
    <hr /><br>
    <b><font size="+1">Discount: 5%</font>
    <hr /><br>
    <b><font size="+2" color="#CC0000">Best Price:
    <?php
    $price= $row['price'];
    
    $dis=($price/100)*5;
    
    
        $bstprice= $price-$dis;
        echo $bstprice; 
    
    ?>/-</font>
    <br>
<br>
<?php
if(isset($_POST['sub']))
{
	$quantity= $_POST['quan'];
	header("location:cart.php?product_id=$idd&&quan=$quantity&&tablename=addmobiles");
}
?>
    <form method="post">
    <select name="quan">
    <option>Select Quantity</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    
    </select>
    <br><br>
    <center><input type="submit" value="Buy Now" name="sub" class="buynow"></center>
    </form>
    
    </div>



	<div class="bottomdes">
    <hr>
    <center><font  style="font-family:myfontbody; font-size:36px;"> PRODUCT DESCRIPTION</font></center>
<br>
<table class="tab" frame="box" rules="rows" bordercolor="#ccc">
<tr>
<td width="200">Brand Name</td>
<td width="20">:</td>
<td width="350"><?php echo $row['brand']; ?></td>
</tr>

<tr>
<td>Front Cam</td>
<td>:</td><td>5MP</td>
</tr>
<tr>
<td>Back Cam</td>
<td>:</td><td>15MP</td>
</tr>
<tr>
<td>Storage</td>
<td>:</td><td>32/64 GB</td>
</tr>
<tr>
<td>Ram</td>
<td>:</td><td>2GB</td>
</tr>
<tr>
<td>Processor</td>
<td>:</td><td>Octa Core</td>
</tr>
<tr>
<td>HeadPhone</td>
<td>:</td><td>Available</td>
</tr>
<tr>
<td>Charger</td>
<td>:</td><td>Included</td>
</tr>
<tr>
<td>Data Cable</td>
<td>:</td><td>Included</td>
</tr>

<td>Warrenty</td>
<td>:</td><td>1 Year</td>
</tr>
</table>
    
    
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