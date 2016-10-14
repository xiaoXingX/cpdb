<?php
require_once('./config.php');
	// header("Content-type:text/html;charset=utf-8");
	$company=$_POST['company'];
	 
	  // $link=mysql_connect("127.0.0.1","root","");
   //            mysql_select_db('dh');
   //            mysql_query("set names 'utf8'");
	$sql="SELECT id,company_logo FROM `product` WHERE company=?";
	 $stmt=$pdo->prepare($sql);
	$stmt->execute(array($company));
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
 
 	// $result=mysql_query($sql,$link);
 	// $result=mysql_fetch_assoc($result);
 	$result=array('re' =>$result['id'],'company_logo' => $result['company_logo'] );
 	 
	$result = json_encode($result);
	echo  $result;
?>