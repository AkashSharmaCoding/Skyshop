<html>

<head>

<link rel="stylesheet" href="dec.css" type="text/css">

<style type="text/css">

caption

{

color:#CC6600;

margin-left:40px;

font:Arial, Helvetica, sans-serif;

}

table

{

margin-left:100px;

margin-top:30px;

}

table th

{

color:#CC6600;

}

table td

{

color:#FFFFFF;

text-align:center;

}

a

{

color:#9999FF;

}



</style>

</head>

<body bgcolor="#ECE5B6">

<div class="wrapper" style="margin-left:-50">



<div class="header">

<?php

include_once("header.php");

?>

</div>



	<div class="links">

	<h3>Welcome</h3>

	<?php

	

		$currentdate=date("l,d F Y");

	echo $currentdate;

	echo "<a href='logout.php'>"." "."|"." "."logout"."</a>";

	echo "<a href='welcome1.php' class='back'>"."<<"." "."Back"."</a>";

    ?>

	</div>

	<div id="line">



	</div>

	<div class="content">

<?php

include_once("config.php");

include_once("pager.php");
echo"</br>";
echo"</br>";
echo"</br>";
echo "<caption><b><center><font color=black size=6>Contact List</font></center></b></caption>";
echo "<table style='border:solid #FFFFFF 2px'>";

echo "<tr><th><font color=black>Name</th><th><font color=black>Email</th>
<th><font color=black>Phone</th><th><font color=black>Message</font></th></tr>";

$query="select * from contact";

$res=mysql_query($query);



$pagesize=5;

					$parameter='';

					$NoMake='';

					if($pagesize)

					$parameter.="&ps=".$pagesize;

					if(empty($_REQUEST["page"]))

						$_REQUEST["page"]=1;

	if(ExecPaging($query,$parameter,$pagesize))

						$rid=ExecPaging($query,$parameter,$pagesize,"response.php");

					else

						$NoMake=1;



						$num=count($rid);

						

      // $i=1;



	    if($NoMake=='') 

		{

 for($i=0;$i<$num;$i++)

      

//while($rid=mysql_fetch_array($res))

{

echo "<tr><td>".$rid[$i]['Name']."</td><td>".$rid[$i]['Email']."</td><td>".$rid[$i]['Phone']."</td><td>".$rid[$i]['Message']."</td><th><a href='response1.php?msg=".$rid[$i]['sno']."'>Response</a>"."</th></tr>";

}

echo "</table>";

echo "<p align='center'>".$pagelist."</p>"; }



?>

</div>

		

		        	<div id="line1">

		</div>

			<div class="footer">

			<?php

			include_once("footer.php");

			?>

			

			</div>

</div>			



</body>

</html>