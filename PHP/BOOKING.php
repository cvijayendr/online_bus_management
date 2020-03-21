<!DOCTYPE html>
<html>
	<head>
		<title>TICKET BOOKING</title>
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
	$name=$_REQUEST['NAME'];
	$addr=$_REQUEST['ADDR'];
	$mnum=$_REQUEST['MOB_NUM'];
	$age=$_REQUEST['AGE'];
	$gend=$_REQUEST['GENDER'];
	$src=$_REQUEST['SOURCE'];
	$dest=$_REQUEST['DESTINATION'];
	$day=$_REQUEST['DAY'];
	$mon=$_REQUEST['MONTH'];
	$year=$_REQUEST['YEAR'];
	$pay=$_REQUEST['PAY'];
	if($name==` ` ||$addr==` ` ||$mnum==` ` ||$age==` ` ||$gend=="Select" ||$src=="Select" ||$dest=="Select" ||$day=="Select" ||$mon=="Select" ||$year=="Select"){
?>	
		<script type=text/javascript>
			alert("ALL FIELDS ARE MANDATORY");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}
	elseif($src==$dest){
?>	
		<script type=text/javascript>
			alert("SOURCE AND DESTINATION ARE SAME");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}
	elseif($pay=="No"){
?>	
		<script type=text/javascript>
			alert("AMOUNT NOT PAID");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
	}
	else{
		$src=strtoupper($src);
		$dest=strtoupper($dest);
		$bus_det="select * from SCHEDULE where FROM_PLACE='$src' AND TO_PLACE='$dest';";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$bus_det") or die("CANNOT EXECUTE" .mysql_errno());
		$ck=mysql_num_rows($ex);		
		if($ck==0){
?>	
		<script type=text/javascript>
			alert("SORRY!... NO BUSES FOUND INTHIS ROUTE");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		}else{
			$date=$year."-".$mon."-".$day;
			$res=mysql_fetch_array($ex);
			$bus_id=$res['BUS_ID'];
			$ariv_time=$res['ARRIVE_TIME'];
			$dept_time=$res['DEPART_TIME'];
			$amt=$res['AMOUNT'];
			$book_set="insert into BOOKING_DETAILS(BUS_ID,DATE,SOURCE,DESTINATION) values('$bus_id','$date','$src','$dest');";
			$add_book=mysql_db_query("ONLINE_BUS_REGISTRATION","$book_set") or die("CANNOT ADD DETAILS" .mysql_errno());
			$book_id="select BOOK_ID from BOOKING_DETAILS where BUS_ID='$bus_id' AND DATE='$date' AND SOURCE='$src' AND DESTINATION='$dest';";
			$req_book_id=mysql_db_query("ONLINE_BUS_REGISTRATION","$book_id") or die("CANNOT ADD DETAILS" .mysql_errno());
			$cr=mysql_num_rows($req_book_id);	
			for($i=0;$i<$cr;$i++)
				$tk_book_id=mysql_fetch_array($req_book_id);
			$book_id=$tk_book_id['BOOK_ID'];
			$name=strtoupper($name);
			$addr=strtoupper($addr);
			$pasen_set="insert into PASSENGER_DETAILS values('$book_id','$name','$addr','$mnum','$age','$gend');";
			$add_pasen=mysql_db_query("ONLINE_BUS_REGISTRATION","$pasen_set") or die("CANNOT ADD PASENGER DETAILS" .mysql_errno());
			$req_reg_num="select REG_NO from BUS_DETAILS where BUS_ID='$bus_id';";
			$ex_reg_num=mysql_db_query("ONLINE_BUS_REGISTRATION","$req_reg_num") or die("CANNOT RETRIVE BUS NUMBER " .mysql_errno());
			$get_reg_num=mysql_fetch_array($ex_reg_num);
			$reg_num=$get_reg_num['REG_NO'];	
			$addpay="insert into PAYMENT(BOOK_ID,DATE,AMOUNT) values('$book_id','$date','$amt');";
			$pay_amt=mysql_db_query("ONLINE_BUS_REGISTRATION","$addpay") or die("CANNOT ADD PAYMENT" .mysql_errno());
			print "BOOKING SUCESSFUL";?><br><?php
			print "TICKET NUMBER IS $book_id";?><br><?php
			print "BUS ID is $bus_id";?><br><?php
			print "BUS REGISTRATION NUMBER IS $reg_num";?><br><?php
			print "BUS ARRIVE TIME is $ariv_time";?><br><?php
			print "BUS DEPART TIME IS $dept_time";?><br><?php
			print "AMOUNT PAID IS $amt";?><br><?php
		}
		mysql_close($db);	
	}
?>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
