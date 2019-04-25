<?php
ob_start();
if(isset($_SESSION['admin']))
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>feedback</title>

</head>

<body>
<div class="scrolltable">
<br>
<form method="post" action="">
<input type="search" placeholder="Enter name.." name="sname" style="margin-left:400px;">
<input type="search" placeholder="Enter email.." name="semail">
<input type="submit" value="Search" name="msearch">
</form>
<hr>

<!-------------search table code starts--------------------------->
<?php
if(isset($_POST['msearch']))
{
?>
<br>
<form method="post">
<input type="submit" name="dlt" class="dltbutton" value="Delete">
<table border="1" style="margin:auto; width:900px; text-align:center; table-layout:fixed; word-wrap:break-word;">

<tr>
<td>Name</td>
<td>Email</td>
<td>Feedback</td>
<td>Select</td>
<td>Delete</td>
<tr>	
	
<?php	
include("database.php");
$sname=$_POST['sname'];
$semail=$_POST['semail'];

$ssql=mysqli_query($dbb,"select * from feedback where name='$sname' || email='$semail'") or die(mysqli_error());
while($row=mysqli_fetch_array($ssql))
{
?>
<tr>
<td><?php echo $row['name'];  ?></td>
<td><?php echo $row['email'];  ?></td>
<td><?php echo $row['feedback'];  ?></td>
<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
<td><a href="feedback.php?mid=<?php echo $row['id'];?>"><input type="button" value="delete"></a></td>

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

<br>
<form method="post">

<table border="1" style="margin:auto; width:900px; text-align:center;">
<input type="submit" class="dltbutton" value="Delete" name="dlt">
<tr>
<td>Id</td>
<td>Name</td>
<td>Email</td>
<td>Feedback</td>
<td>Select</td>
<td>Delete</td>
</tr>
<?php
include("database.php");
 $sql= mysqli_query($dbb,"select * from feedback")or die(mysqli_error());
 
 while($row= mysqli_fetch_array($sql))
 {
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['feedback'];?></td>
<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="chk[]"></td>
<td><a href="feedback.php?mid=<?php echo $row['id']; ?>"><input type="button" value="delete" name="delete"></a></td>
</tr>
<?php
 }
?>

</table>
<input type="submit" value="Delete" class="dltbutton" name="dlt">
</form>

<!-------------delete button code starts------------------>

<?php
if(isset($_REQUEST['mid']))
{
	$mid=$_REQUEST['mid'];
	$dltbsql= mysqli_query($dbb,"delete from feedback where id='$mid'") or die(mysqli_error());
	
	if($dltbsql)
	{
		header("location:homeforadmin.php?admin=feedback");
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

$dsql=mysqli_query($dbb,"delete from feedback where id IN($imp)") or die(mysqli_error());
 
 if($dsql)
	 {
		header("location:homeforadmin.php?admin=feedback");
	 }
	 else
	 {
		echo "Error While Deleating"; 
	 }


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