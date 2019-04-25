<?php
ob_start();
if(isset($_SESSION['admin']))
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Mobiles</title>
<link rel="stylesheet" type="text/css" href="styleforbend.css">
</head>

<body>
<div class="scrolltable">
<br>
<form method="post" action="">
<input type="search" placeholder="Enter name.." name="sname" style="margin-left:400px;">
<input type="search" placeholder="Enter brand.." name="bname">
<input type="submit" value="Search" name="msearch">
</form>
<!------------------searched mobile table with php-------------------->

<?php
include("database.php");
if(isset($_POST['msearch']))
{
	?>
<hr>
<br>
<br>
	<form method="post">
    <table border="1" style="margin:auto; width:900px; text-align:center;">
    <input type="submit" class="dltbutton" value="Delete" name="dlt">
    <tr>
    <td>Id</td>
    <td>Mobile Name</td>
    <td>Brand</td>
    <td>Price</td>
    <td>Photo</td>
    <td>Select</td>
    <td>Delete</td>
    </tr>
    
    <?php
	$sname= $_POST['sname'];
	$sbrand= $_POST['bname'];
	
	$searchsql= mysqli_query($dbb,"select * from addmobiles where name='$sname' || brand='$sbrand'") or die(mysql_error());
	
	while($row=mysql_fetch_array($searchsql))
	{
?>		
		
  <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['brand'];?></td>
    <td><?php echo $row['price'];?></td>
    <td><img src="<?php echo $row['image'];?>" width="50" height="50"></td>
    <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
  <td><a href="viewmobiles.php?mid=<?php echo $row['id']; ?>"><input type="button" value="delete" name="delete"></a></td>

    </tr>
	<?php
	$row++;
     }
    ?>
    </table>
     <input type="submit" class="dltbutton" value="Delete" name="dlt">
    </form> 
<?php
}
else
{
?>

<!------------------searched mobile table ends-------------------->


<!------------------without search table-------------------->
<hr>
<br>
<br>
<form method="post">

<table border="1" style="margin:auto; width:900px; text-align:center;">
<input type="submit" class="dltbutton" value="Delete" name="dlt">
<tr>
<td>Id</td>
<td>Mobile Name</td>
<td>Brand</td>
<td>Price</td>
<td>Photo</td>
<td>Select</td>
<td>Delete</td>
</tr>
<?php

 $sql= mysqli_query($dbb,"select * from addmobiles")or die(mysqli_error());
 
 while($row= mysqli_fetch_array($sql))
 {
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['brand'];?></td>
<td><?php echo $row['price'];?></td>
<td><img src="<?php echo $row['image'];?>" width="50" height="50"></td>
<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
<td><a href="viewmobiles.php?mid=<?php echo $row['id']; ?>"><input type="button" value="delete" name="delete"></a></td>
</tr>
<?php
 }
?>

</table>
<input type="submit" value="Delete" class="dltbutton" name="dlt">
</form>

<!----code for array delete begin --->
<?php
if(isset($_POST['dlt']))
{
	$arr=$_POST['chk'];
	$imp=implode(",",$arr);
	$dsql=mysqli_query($dbb,"delete from addmobiles where id IN($imp)") or die(mysql_error());
	
	 if($dsql)
	 {
		header("location:homeforadmin.php?admin=viewmobiles");
	 }
	 else
	 {
		echo "Error While Deleating"; 
	 }
}

?>
<?php
if(isset($_REQUEST['mid']))
{
	
$mid=$_REQUEST['mid'];
$dltsql= mysqli_query($dbb,"delete from addmobiles where id='$mid'") or die(mysqli_error());

	if($dltsql)
	{
		header("location:homeforadmin.php?admin=viewmobiles");
	}
	else
	{
		echo "error occur";
	}
	
}
else
{
	
}
?>
<!----code for delete ends --->
<?php

}
?>
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