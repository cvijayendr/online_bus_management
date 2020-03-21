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
		</style>
	</head>
	<body>
		<div class="container">
			<header>
		 		<h1>ONLINE BUS REGISTRATION</h1>
			</header><br>
<?php
	$req_tab=$_REQUEST['TABLES'];
	switch($req_tab){
		case 'Select':
?>	
		<script type=text/javascript>
			alert("Select Table to View");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
			break;
		case 'ADD': header("Location:ADD.php");
					break;
		case 'BOD': header("Location:BOD.php");
					break;
		case 'BUD': header("Location:BUD.php");
					break;
		case 'DRD': header("Location:DRD.php");
					break;
		case 'PSD': header("Location:PSD.php");
					break;
		case 'PTD': header("Location:PTD.php");
					break;
		case 'CR': header("Location:CR.php");
					break;
		case 'SD': header("Location:SD.php");
					break;
	}		
?>
		<footer>Copyright &copy; C&D.com</footer>
	</div>
	</body>
</html>
