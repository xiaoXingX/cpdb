<?php
require_once('./config.php');
	//header("Content-type:text/html;charset=utf-8");
	$product_type=$_POST['product_type'];

/*	$pdo=new PDO("mysql:host=localhost;dbname=dh","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$pdo->query("set names utf8");*/
	$sql="SELECT distinct company FROM `product` WHERE find_in_set(?, product_type) ORDER BY  convert(`product`.`company` using gbk)";
	 
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($product_type));
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

//使用Foreach遍历数组 同时使用urlencode处理 含有中文的字段
foreach ( $result as $key => $value ) {
    $newData[$key] = $value;
    $newData [$key] ['company'] = urlencode ( $value ['company'] );
     
}
$result=urldecode ( json_encode ( $newData ) );
echo $result;	 
	
?>