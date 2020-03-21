<!DOCTYPE html>
<html>
	<head>
		<title>PASSENGER DETAILS</title>
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
	$sr="select *from PASSENGER_DETAILS;";
	$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$sr") or die("CANNOT EXECUTE" .mysql_errno().":".mysql_error());
?>
<h1 align=center>PASSENGER DETAILS</h1> 
<center>
<table border=1 width="350">
	<tr>
		<th>BOOKING ID</th>
		<th>NAME</th>
		<th>ADDRESS</th>
		<th>PHONE NO</th>
		<th>AGE</th>
		<th>GENDER</th>
	</tr>
<?php
	while($res=mysql_fetch_array($ex)){
?>
	<tr align=center>
		<td><?php echo $res['BOOK_ID']?></td>
		<td><?php echo $res['PAS_NAME']?></td>
		<td><?php echo $res['PAS_ADDR']?></td>
		<td><?php echo $res['PAS_PHNO']?></td>
		<td><?php echo $res['PAS_AGE']?></td>
		<td><?php echo $res['PAS_GENDER']?></td>
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
