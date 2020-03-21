<!DOCTYPE html>
<html>
	<head>
		<title>DRIVER DETAILS</title>
		<style>
			div.container {
				width: 100%;
				border: 1px solid gray;
			}
			header, footer {
				padding: 1em;
				color: white;
				background-color: black;
				clear: left;
				text-align: center;
			}
		</style>
	</head>
	<body>
	<div class="container">
			<header>
			   <h1>ONLINE BUS REGISTRATION</h1>
			</header><br>
<?php
	$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL".mysql_error());
	$sr="select *from DRIVER_DETAILS;";
	$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$sr") or die("CANNOT EXECUTE" .mysql_errno().":".mysql_error());
?>
<h1 align=center>DRIVER DETAILS</h1> 
<center>
<table border=1 width="350">
	<tr>
		<th>DRIVER ID</th>
		<th>BUS ID</th>
		<th>DRIVER NAME</th>
		<th>AGE</th>
		<th>SALARY</th>
	</tr>
<?php
	while($res=mysql_fetch_array($ex)){
?>
	<tr align=center>
		<td><?php echo $res['DRIV_ID']?></td>
		<td><?php echo $res['BUS_ID']?></td>
		<td><?php echo $res['DRIV_NAME']?></td>
		<td><?php echo $res['AGE']?></td>
		<td><?php echo $res['SALARY']?></td>
	</tr>
<?php
	}
	mysql_close($db);
?>
				</table>
				</center><br><br><br>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
