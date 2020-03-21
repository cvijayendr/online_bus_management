<!DOCTYPE html>
<html>
	<head>
		<title>PAYMENT DETAILS</title>
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
	$rgno=$_REQUEST['REG_NO'];
	$cap=$_REQUEST['CAP'];
	$btype=$_REQUEST['TYPE'];
	$bsid=$_REQUEST['BUS_ID'];
	$name=$_REQUEST['NAME'];
	$age=$_REQUEST['AGE'];
	$sal=$_REQUEST['SAL'];
	$bid=$_REQUEST['BID'];
	$ahr=$_REQUEST['AHR'];
	$amin=$_REQUEST['AMIN'];
	$dhr=$_REQUEST['DHR'];
	$dmin=$_REQUEST['DMIN'];
	$src=$_REQUEST['SRC'];
	$dest=$_REQUEST['DST'];
	$amt=$_REQUEST['AMT'];
	$iord=$_REQUEST['IORD'];
	$per=$_REQUEST['PER'];
	$day=$_REQUEST['DAY'];
	$month=$_REQUEST['MONTH'];
	$year=$_REQUEST['YEAR'];
	if($rgno!=` ` && $cap!=` ` && $btype!=` `){
		$rgno=strtoupper($rgno);
		$btype=strtoupper($btype);
		$st="insert into BUS_DETAILS(REG_NO,CAPACITY,BUS_TYPE) values('$rgno','$cap','$btype');";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$st") or die("CANNOT EXECUTE" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("BUS DETAILS INSERTED SUCCESSFULLY");
			window.location.href='BUD.php';
		</script>
<?php
		mysql_close($db);
	}
	if($bsid!=` ` && $name!=` ` && $age!=` ` && $sal!=` `){
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$bus_det="select BUS_ID from BUS_DETAILS where BUS_ID IN (select BUS_ID from BUS_DETAILS where BUS_ID='$bsid');";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$bus_det") or die("CANNOT EXECUTE" .mysql_errno());
		$ck=mysql_num_rows($ex);		
		if($ck==0){
?>	
		<script type=text/javascript>
			alert("INVALID BUS ID");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		}
		else{
			$name=strtoupper($name);
			$st="insert into DRIVER_DETAILS(BUS_ID,DRIV_NAME,AGE,SALARY) values('$bsid','$name','$age','$sal');";
			$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$st") or die("CANNOT EXECUTE" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("DRIVER DETAILS INSERTED SUCCESSFULLY");
			window.location.href='DRD.php';
		</script>
<?php
			mysql_close($db);
		}
	}
	if($bid!=` ` && $ahr!='Select' && $amin!='Select' && $dhr!='Select' && $dmin!='Select' && $src!=` ` && $dest!=` ` && $amt!=` `){
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$bus_det="select BUS_ID from BUS_DETAILS where BUS_ID IN (select BUS_ID from BUS_DETAILS where BUS_ID='$bid');";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$bus_det") or die("CANNOT EXECUTE" .mysql_errno());
		$ck=mysql_num_rows($ex);		
		if($ck==0){
?>	
		<script type=text/javascript>
			alert("INVALID BUS ID");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		}
		else{
			$at=$ahr.":".$amin;
			$dt=$dhr.":".$dmin;
			$src=strtoupper($src);
			$dest=strtoupper($dest);
			$st="insert into SCHEDULE values('$bid','$at','$dt','$src','$dest','$amt');";
			$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$st") or die("CANNOT EXECUTE" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("SCHEDULE INSERTED SUCCESSFULLY");
			window.location.href='SD.php';
		</script>
<?php
			mysql_close($db);
		}
	}
	if($iord!='Select' && $per!=` `){
		if($iord=='INC'){
			if($per<=100)
				$sal_ch="update DRIVER_DETAILS SET SALARY=SALARY*(1+('$per'/100));";
			else	
				$sal_ch="update DRIVER_DETAILS SET SALARY=SALARY+'$per';";		
		}
		if($iord=='DEC'){
			if($per<=100)
				$sal_ch="update DRIVER_DETAILS SET SALARY=SALARY/(1+('$per'/100));";
			else	
				$sal_ch="update DRIVER_DETAILS SET SALARY=SALARY-'$per';";
		}
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$sal_ch") or die("CANNOT EXECUTE" .mysql_errno());
?>	
		<script type=text/javascript>
			alert("SALARY UPDATED SUCESSFULLY");
			window.location.href='DRD.php';
		</script>
<?php
		mysql_close($db);
	}
	if($day!='Select' && $month!='Select' && $year!='Select'){
		$date=$year."-".$month."-".$day;
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$pay_sum="select SUM(AMOUNT) as SUM from PAYMENT where DATE='$date';";
		$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
		$ex=mysql_db_query("ONLINE_BUS_REGISTRATION","$pay_sum") or die("CANNOT EXECUTE" .mysql_errno());
		$res=mysql_fetch_array($ex);
		if($res['SUM']==` `){
?>	
		<script type=text/javascript>
			alert("NO TRANSACTION ON THIS DATE");
			window.location.href='javascript:history.go(-1)';
		</script>
<?php
		}
		else{
			print "<center><h3>The Total Transaction on $date is ";
			print $res['SUM'];
			print "</h3></center>";
		}
		mysql_close($db);
	}
?>
			<footer>Copyright &copy; C&D.com</footer>
		</div>
	</body>
</html>
