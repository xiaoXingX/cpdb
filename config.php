<?php
header("Content-type:text/html;charset=utf-8");
$pdo=new PDO("mysql:host=localhost;dbname=kkxddata","root","123456",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)) or die('连接失败');
	 
	$pdo->query("set names utf8");
    var_dump('sdfgsdgsdfgfsg');
?>
