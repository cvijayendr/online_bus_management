<!DOCTYPE html>
<html>
	<head>
		<title> Make a Admin </title>
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
			marquee{
				background-color: lightgreen;
				height: 30px;
				font-size: 25px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header>
			   <h1>ONLINE BUS REGISTRATION</h1>
			</header><br>
<?php
	$name=$_REQUEST['NAME'];
	$aid=$_REQUEST['ID'];
	$npwd=$_REQUEST['NPWD'];
	$cpwd=$_REQUEST['CPWD'];
	if($name==` ` || $aid==` ` || $npwd==` ` || $cpwd==` `){
?>
	<script type=text/javascript>
		alert("ALL FIELDS ARE MANDATORY");
		window.location.href='javascript:history.go(-1)';
	</script>
<?php
	}
	if($npwd!=$cpwd){
?>
		<script type=text/javascript>
			alert("PASSWORD UNMATCHED");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}
	else{
		$name=strtoupper($name);
		$ad_qr="insert into ADMIN_LOGIN values('$aid','$npwd','$name');";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$ad_qr") or die("CANNOT EXECUTE" .mysql_errno());
?>
	<script type=text/javascript>
		alert("ADMIN ADDED SUCCESSFULLY");
		window.location.href='javascript:history.go(-1)';
	</script>
<?php
		mysql_close($db);	
	}
?>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
