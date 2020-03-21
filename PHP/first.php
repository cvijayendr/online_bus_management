<?php
	$aid=$_REQUEST['aid'];
	$tit=$_REQUEST['title'];
	$aut=$_REQUEST['author'];
	$edi=$_REQUEST['edn'];
	$pub=$_REQUEST['publ'];
	if($aid==` ` || $tit==` ` || $aut==` ` || $edi==` ` || $pub==` `){
		echo"ALL FIELDS ARE NOT ENETRED";
		exit;
	}
	$st="insert into BOOKS(AID,TITLE,AUTHOR,EDITION,PUBLISHER) values('$aid','$tit','$aut','$edi','$pub');";
	$db=mysql_connect("localhost","root","root") or die("CANNOT CONNECT TO MYSQL");
	$ex=mysql_db_query("BOOKS","$st") or die("CANNOT EXECUTE" .mysql_errno());
	print"DATA INSERTED SUCESSFULLY";
	mysql_close($mysql);	
?>
