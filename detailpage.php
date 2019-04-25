<?php
ob_start();

?>
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
    <h2 class="nesmid1">User Details</h2>
    
	</div>


<div class="middledivpage">
<?php
include("admin/database.php");

$idd=  $_REQUEST['product_id'];
$tblname=$_REQUEST['tablename'];
$quantity=$_REQUEST['quan'];

$sql=mysqli_query($dbb,"select * from $tblname where id='$idd' ") or die(mysql_error());
$row= mysqli_fetch_array($sql);
$product= $row['brand']." ".$row['name'];

 $price= $row['price'];

$dis=($price/100)*5;


$bstprice= $price-$dis;
 	

$total= $bstprice*$quantity;


	$grtotal= $total;
	
$img= "admin/".$row['image'];

?>

<div class="dtlleft">
<?php
if(isset($_POST['sub']))
{
$name= $_POST['n'];
$email= $_POST['e'];
$mobile= $_POST['m'];
$altmobile= $_POST['a'];
$city= $_POST['c'];
$state= $_POST['s'];
$postal= $_POST['p'];
$address= $_POST['tx'];

$sql = mysqli_query($dbb,"insert into shoppingdetails (name,email,mobile,altmobile,city,state,postalcode,address,productid) values('$name','$email','$mobile','$altmobile','$city','$state','$postal','$address','$idd')") or die(mysql_error());
		
		if($sql)
		{
		header("location:receipt.php");
		}
        else
        {
        echo "error";
        }
}
else
{
	
}
?>

<form class="f" action="" method="post"><br />
<label class="lblfordtl">NAME</label><br />
<input type="text"  name="n"  required="required" /><br /><br />
<label class="lblfordtl">EMAIL</label><br />
<input type="email" name="e"  required="required" /><br /><br />
<label class="lblfordtl">MOBILE NO</label><br />
<input type="text" name="m"  required="required" /><br /><br />
<label class="lblfordtl">AILTERNATE MOB NO</label> <br />
<input type="text" name="a"  required="required" /><br /><br />
<label class="lblfordtl">CITY</label>
<select name="c"  required="required" /><br /><br />
<option></option>
<option>Hamilton</option>
<option>Toronto</option>
<option>Mississauga</option>
<option>London</option>
<option>Guelph</option>
<option>Brampton</option>
<option>Kingston</option>
</select>  <br/><br />
<label class="lblfordtl">STATE</label>
<select name="s"  required="required" /><br /> 
<option></option>
<option>ON</option>
<option>AB</option>
<option>BC</option>
<option>NB</option>
</select><br /><br />
<label class="lblfordtl">POSTAL CODE</label><br />
<input type="text" name="p"  required="required" /><br /><br />
<label class="lblfordtl">ADDERSS</label><br />
<textarea cols="50" rows="10" name="tx"  required="required" />
</textarea><br /><br />

<input type="submit" value="submit" class="buynow"  name="sub" required />

</form>

</form>

</div>


<div class="dtlright">
<p style="text-align:center; font-size:36px; font-family:myfontbody;">Your Cart</p>
<hr>
<table border="1" width="350px" height="200px" rules="rows" style="table-layout:fixed; word-wrap:break-word;
 margin-left:70px; margin-top:50px;"> 
<tr>
<td><p class="showing">Product Name :</p></td>
<td><p class="showing"><?php echo $product; ?></p></td>
</tr>
<tr>
<td><p class="showing">Quantity :</p></td>
<td><p class="showing"><?php echo $quantity; ?></p></td>
</tr>
<tr>
<td><p class="showing">Price :</p></td>
<td><p class="showing"><?php echo $total; ?> $ </p></td>
</tr>

</table>
<br>
<br>
<hr>
<br>
<img src="<?php echo $img ?>" height="300px" width="300px" style=" margin-left:120px;">


</div>

</div>

<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!------------------------->
</body>
</html>