<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
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
    <h2 class="nesmid1">Cart</h2>
    
	</div>


<div class="middledivpage">
<?php
include("admin/database.php");

$idd=  $_REQUEST['product_id'];
$tblname=$_REQUEST['tablename'];
$quantity=$_REQUEST['quan'];

$sql=mysqli_query($dbb,"select * from $tblname where id='$idd' ") or die(mysqli_error());
$row= mysqli_fetch_array($sql);
$product= $row['brand']." ".$row['name'];

 $price= $row['price'];

$dis=($price/100)*5;


$bstprice= $price-$dis;
 	

$total= $bstprice*$quantity;


	$grtotal= $total;
	
$img= "admin/".$row['image'];
?>

<table class="tab" bordercolor="#E6E6E6" border="1">
<tr>
<td width="30px" height="10px" >PRODUCT</td>
<td width="40px" height="10px">MODEL</td>
<td width="30px" height="10px">QUANTITY</td>
<td><font size="+1">DELIVERY INFO</td>
<td><center><font size="+1">PRICE</center></td>
<td><font size="+2" color="#CC0000">PAYABLE : $</td> 
</tr>
<tr>
<td> <img src="<?php echo $img; ?>" width=60 height="80"/></td>
<td width="50px" height="70px"><?php echo $row['name']; ?></td>
<td width="50px" height="70px"><center><?php echo $quantity; ?></center></td>
<td width="50px" height="70px"><font size="+1">standard delivery <br />
free...same day or next day</td>
<td width="50px" height="70px"><center><?php echo $bstprice; ?> $</center></td>
<td width="50px" height="70px"><center><?php echo $grtotal; ?> $</center></td> 
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>


</table>
<br>
<a href="<?php echo "detailpage.php?product_id=$idd&&quan=$quantity&&tablename=$tblname "?>">
<input type="submit" value="Proceed to payment" name="subcrt" class="buynow"></a>





</div>

<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!------------------------->
</body>
</html>