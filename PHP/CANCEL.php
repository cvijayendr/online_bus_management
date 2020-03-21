<!DOCTYPE html>
<html>
	<head>
		<title>CANCEL BOOKING</title>
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
	$book_id=$_REQUEST['BOOK_ID'];
	$reason=$_REQUEST['REASON'];
	if($book_id==` `){
?>	
		<script type=text/javascript>
			alert("BOOKING ID IS MANDATORY");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}else{
		$q_bkid="select BOOK_ID from BOOKING_DETAILS;";
		$db=mysql_connect("localhost","root","root") or die("CANNOT OPEN MYSQL");
		$ft_bkid=mysql_db_query("ONLINE_BUS_REGISTRATION","$q_bkid") or die("CANNOT FETCH THE DETAILS" .mysql.errno());
		$ct=mysql_num_rows($ft_bkid);
		if($ct<=0){
?>	
		<script type=text/javascript>
			alert("DATABASE IS EMPTY");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		}else{
			$ck=false;			
			while($db_bkid=mysql_fetch_array($ft_bkid)){
				$ck_bkid=$db_bkid['BOOK_ID'];
				if($ck_bkid==$book_id){
					$ck=true;				
					break;
				}
			}
			if($ck==false){
?>	
		<script type=text/javascript>
			alert("INVALID BOOKING ID");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
			}else{
				$reason=strtoupper($reason);
				$res="insert into REASON values('$book_id','$reason');";
				$add_res=mysql_db_query("ONLINE_BUS_REGISTRATION","$res") or die("CANNOT ADD DETAILS" .mysql_errno());
				$del="delete from BOOKING_DETAILS where BOOK_ID='$book_id';";
				$del_bkid=mysql_db_query("ONLINE_BUS_REGISTRATION","$del") or die("CANNOT CANCEL THE BOOKING" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("CONFIRM CANCELLATION");
			alert("SUCCESSFULL CANCELLATION");
			window.location.href='CUSTOMER_MAIN.html';
		</script>
<?php		
			}
		}
		mysql_close($db);
	}
?>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
