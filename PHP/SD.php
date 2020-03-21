<!DOCTYPE html>
<html>
	<head>
		<title>SCHEDULE DETAILS</title>
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
	$sr="select *from SCHEDULE;";
	$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$sr") or die("CANNOT EXECUTE" .mysql_errno().":".mysql_error());
?>
<h1 align=center>SCHEDULE DETAILS</h1> 
<center>
<table border=1 width="350">
	<tr>
		<th>BUS ID</th>
		<th>ARRIVE TIME</th>
		<th>DEPART TIME</th>
		<th>SOURCE</th>
		<th>DESTINATION</th>
		<th>AMOUNT</th>
	</tr>
<?php
	while($res=mysql_fetch_array($ex)){
?>
	<tr align=center>
		<td><?php echo $res['BUS_ID']?></td>
		<td><?php echo $res['ARRIVE_TIME']?></td>
		<td><?php echo $res['DEPART_TIME']?></td>
		<td><?php echo $res['FROM_PLACE']?></td>
		<td><?php echo $res['TO_PLACE']?></td>
		<td><?php echo $res['AMOUNT']?></td>
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
