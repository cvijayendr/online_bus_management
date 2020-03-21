<!DOCTYPE html>
<html>
	<head>
		<title> Admin View </title>
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
	$tab=$_REQUEST['TABLES'];
	$id=$_REQUEST['ID'];
	if($tab=='Select' || $id==` `){
?>	
		<script type=text/javascript>
			alert("All Fields Are Mandatory");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}
	switch($tab){
		case 'ADD': $qr="delete from ADMIN_LOGIN where USER_NAME='$id';";
					break;
		case 'BOD': $qr="delete from BOOKING_DETAILS where BOOK_ID='$id';";
					break;
		case 'BUD': $qr="delete from BUS_DETAILS where BUS_ID='$id';";
					break;
		case 'DRD': $qr="delete from DRIVER_DETAILS where DRIV_ID='$id';";
					break;
		case 'PSD': $qr="delete from PASSENGER_DETAILS where BOOK_ID='$id';";
					break;
		case 'PTD': $qr="delete from PAYMENT where PAY_ID='$id';";
					break;
		case 'CR': $qr="delete from REASON where BOOK_ID='$id';";
					break;
		case 'SD': $qr="delete from SCHEDULE where BUS_ID='$id';";
					break;
	}
	$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
	$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$qr") or die("CANNOT EXECUTE" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("CONFIRM DELETION");
			alert("DELETED SUCCESSFULLY");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		mysql_close($db);		
?>
?>
		<footer>Copyright &copy; C&D.com</footer>
	</div>
	</body>
</html>
