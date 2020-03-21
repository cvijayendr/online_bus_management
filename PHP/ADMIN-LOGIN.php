<!DOCTYPE html>
<html>
	<head>
		<title> Admin Login</title>
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
			</header>
<?php
	$usn=$_REQUEST['USNM'];
	$pwd=$_REQUEST['PWD'];
	$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL".mysql_error());
	$sr="select *from ADMIN_LOGIN;";
	$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$sr") or die("CANNOT EXECUTE" .mysql_errno().":".mysql_error());
	while($res=mysql_fetch_array($ex)){
		if($res['USER_NAME']==$usn){
			if($res['PASSWORD']==$pwd){
?>
				<script type=text/javascript>
					alert("SUCESSFULL LOGIN");
					window.location.href='ADMIN_M_PAGE.html';
				</script>
<?php
			}
		}
	}
?>
				<script type=text/javascript>
					alert("INVALID USER");
					window.location.href='javascript:history.go(-1)';
				</script>
<?php
	mysql_close($db);
?>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
