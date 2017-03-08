<?php
require_once('./config.php');
	//header("Content-type:text/html;charset=utf-8");sdkjlfhjkwehrnrstm,n,msdn,
	$id=$_POST['id'];
	switch ($_POST) {
    case $value:
        $company=$_GET['company'];
                                                      	$machine_room=$_GET['machine_room'];
                                             	$product=$_GET['product'];
        break;

    default:
        break;
}
	/*$pdo=new PDO("mysql:host=localhost;dbname=dh","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$pdo->query("set names utf8");tewtssdfhgkjashlkedhqadbka*/
	$sql="SELECT * FROM `product` WHERE id=?";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($id));
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	$data['product_rprice']=urlencode ($data['product_rprice']);
	$data['product_reputation']=urlencode ($data['product_reputation']);
	$data['product_price']=urlencode ($data['product_price']);
	$data['backups']=urlencode ($data['backups']);
	$data['protect']=urlencode ($data['protect']);
	$data['heat_transfer']=urlencode ($data['heat_transfer']);
	$data['not_stop']=urlencode ($data['not_stop']);
	$data['free_record']=urlencode ($data['free_record']);
	$data['uncondition_refund']=urlencode ($data['uncondition_refund']);

	$result=array('product_rprice' => $data['product_rprice'], 'product_reputation' => $data['product_reputation'], 'product_price' => $data['product_price'], 'node' => $data['node'], 'band_width' => $data['band_width'],'disk' => $data['disk'],'memory' => $data['memory'],'CPU' => $data['CPU'],'rw_speed' => $data['rw_speed'],'backups' => $data['backups'],'protect' => $data['protect'],'heat_transfer' => $data['heat_transfer'],'not_stop' => $data['not_stop'],'hours' => $data['hours'],'free_record' => $data['free_record'],'uncondition_refund' => $data['uncondition_refund']);
	$result=urldecode ( json_encode ( $result ) );
	echo $result;
    $a=fsgjkgkjksfdhg;
    function b(){
        $b=array(12,54,323,465,45);
        foreach ($b as $va){
            $va=$va;
        }
    }
?>
