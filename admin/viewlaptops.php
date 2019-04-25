<?php
ob_start();
if(isset($_SESSION['admin']))
{
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Laptops</title>

</head>

<body>
<div class="scrolltable">
<br>
<form method="post" action="">
<input type="search" placeholder="Enter name.." name="sname" style="margin-left:400px;">
<input type="search" placeholder="Enter brand.." name="bname">
<input type="submit" value="Search" name="msearch">
</form>
<hr>
<br>
<!-------------search table code starts--------------------------->
<?php
if(isset($_POST['msearch']))
{
?>

<form method="post">
<input type="submit" name="dlt" class="dltbutton" value="Delete">
<table border="1" style="margin:auto; width:900px; text-align:center; table-layout:fixed; word-wrap:break-word;">

<tr>
<td>Laptop Name</td>
<td>Brand</td>
<td>Ram</td>
<td>Graphic Card</td>
<td>Display Type</td>
<td>Price</td>
<td>Image</td>
<td>Select</td>
<td>Delete</td>
<tr>	
	
<?php	
include("database.php");
$sname=$_POST['sname'];
$sbrand=$_POST['bname'];

$ssql=mysqli_query($dbb,"select * from addlaptop where name='$sname' || brand='$sbrand'") or die(mysql_error());
while($row=mysqli_fetch_array($ssql))
{
?>
<tr>
<td><?php echo $row['name'];  ?></td>
<td><?php echo $row['brand'];  ?></td>
<td><?php echo $row['ram'];  ?></td>
<td><?php echo $row['graphic'];  ?></td>
<td><?php echo $row['display'];  ?></td>
<td><?php echo $row['price'];  ?></td>
<td><img src="<?php echo $row['image'];  ?>" width="50" height="50"></td>
<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
<td><a href="viewlaptops.php?mid=<?php echo $row['id'];?>"><input type="button" value="delete"></a></td>

<tr>
<?php
}
?>
</table>
<input type="submit" name="dlt" class="dltbutton" value="Delete">
</form>
<?php
}
else
{
?>






<!-------------search table code ends--------------------------->

<!-------------Without search table starts------------------>
<form method="post">
<input type="submit" name="dlt" class="dltbutton" value="Delete">
<table border="1" style="margin:auto; width:900px; text-align:center;table-layout:fixed; word-wrap:break-word; ">

<tr>
<td>Laptop Name</td>
<td>Brand</td>
<td>Ram</td>
<td>Graphic Card</td>
<td>Display Type</td>
<td>Price</td>
<td>Image</td>
<td>Select</td>
<td>Delete</td>
<tr>

<?php
include("database.php");

$sql= mysqli_query($dbb,"select * from addlaptop") or die(mysql_error());
while($row=mysqli_fetch_array($sql))
{
?>

<tr>
<td><?php echo $row['name'];  ?></td>
<td><?php echo $row['brand'];  ?></td>
<td><?php echo $row['ram'];  ?></td>
<td><?php echo $row['graphic'];  ?></td>
<td><?php echo $row['display'];  ?></td>
<td><?php echo $row['price'];  ?></td>
<td><img src="<?php echo $row['image'];  ?>" width="50" height="50"></td>
<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
<td><a href="viewlaptops.php?mid=<?php echo $row['id'];?>"><input type="button" value="delete"></a></td>

<tr>



<?php
}
?>
</table>
<input type="submit" name="dlt" class="dltbutton" value="Delete">
</form>
<!-------------Without search table ends------------------>
<?php
}
?>

<!-------------delete button code starts------------------>

<?php
if(isset($_REQUEST['mid']))
{
	$mid=$_REQUEST['mid'];
	$dltbsql= mysqli_query($dbb,"delete from addlaptop where id='$mid'") or die(mysql_error());
	
	if($dltbsql)
	{
		header("location:homeforadmin.php?admin=viewlaptops");
	}
	else
	{
		echo "error occur";
	}
}
?>

<!-------------delete button code ends------------------->




<!--------------Checkbox Delete Code---------------------->
<?php
if(isset($_POST['dlt']))
{
$arr=$_POST['chk'];
$imp=implode(',',$arr);

$dsql=mysqli_query($dbb,"delete from addlaptop where id IN($imp)") or die(mysql_error());
 
 if($dsql)
	 {
		header("location:homeforadmin.php?admin=viewlaptops");
	 }
	 else
	 {
		echo "Error While Deleating"; 
	 }


}
?>
<!--------------Checkbox Delete Code ends----------------->
</div>
</body>
</html>
<?php
}
else
{
	header("location:index.php");	
}
?>