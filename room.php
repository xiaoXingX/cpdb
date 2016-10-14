<?php
require_once('./config.php');
	// header("Content-type:text/html;charset=utf-8");
	$room=$_POST['room'];
	$company=$_POST['company']; 
	$product_type=$_POST['product_type']; 
	/*$pdo=new PDO("mysql:host=localhost;dbname=dh","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$pdo->query("set names utf8");*/
	$sql="SELECT id,product,product_price FROM `product` WHERE company=? AND machine_room=? AND product_type=? ORDER BY `product`.`product` ASC";
	 
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($company,$room,$product_type));
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

//使用Foreach遍历数组 同时使用urlencode处理 含有中文的字段
foreach ( $result as $key => $value ) {
    $newData[$key] = $value;
    $newData [$key] ['product_price'] = urlencode ( $value ['product_price'] );
    $newData [$key] ['product'] = urlencode ( $value ['product'] );
     $newData [$key] ['id'] = urlencode ( $value ['id'] );
}
$result=urldecode ( json_encode ( $newData ) );
echo $result;	 
	
?>