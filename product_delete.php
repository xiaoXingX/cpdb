<?php
require_once('./config.php');
/*header("Content-type:text/html;charset=utf-8");
	  $db_link=mysql_connect("127.0.0.1","root","");
              mysql_select_db('dh');
              mysql_query("set names 'utf8'");*/
	$id = $_GET['id'];
	$sql = "delete from product where id=$id";
	if($pdo->query($sql)){
		echo "<script>alert('删除产品成功');window.location.href='product_list.php';</script>";
	}else{
		echo "<script>alert('删除产品失败');window.location.href='product_list.php';</script>";
	}
?>