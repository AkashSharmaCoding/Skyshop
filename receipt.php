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
    <h2 class="nesmid1">Receipt</h2>
    
	</div>


<div class="middledivpage">
<?php 
include("admin/database.php");

$sql= mysqli_query($dbb,"select * from shoppingdetails order by id desc ") or die(mysqli_error());

$row= mysqli_fetch_array($sql);

 ?>
<br>
<br>
<div class="receipt">
<table  class="tablereceipt" rules="rows" >
<tr>
<td> Name :</td>
<td><?php echo $row['name']; ?></td>
</tr>
<tr>
<td>Email :</td>
<td><?php echo $row['email']; ?></td>
</tr>
<tr>
<td>Address :</td>
<td><?php echo $row['address']; ?></td>
</tr>
<tr>
<td>Order ID :</td>
<td><?php echo $row['productid']; ?></td>
</tr>
</table>

<button onclick="myFunction()" class="viewbtn">CONFIRM</button>


</div>


<script>
function myFunction() {
    var person = alert("THANKS FOR SHOPPING press Ctrl+P to print or save the receipt.");
    
  
}
</script></font>

</div>

<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!------------------------->
</body>
</html>