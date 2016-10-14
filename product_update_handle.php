<?php
require_once('./config.php');
			//header("Content-type:text/html;charset=utf-8");

      if(is_uploaded_file($_FILES['company_logo']['tmp_name']))
        {
           
          //把整个信息取出
          $fileInfo=$_FILES["company_logo"];
          if ($fileInfo) {
              //看看上传文件名
          $true_name=$fileInfo["name"];
          //文件大小,按照字节
          $file_size=$fileInfo["size"];
          
          //取出tmp_name
          $tem_name=$fileInfo["tmp_name"];
          
          $file_full_path=$_SERVER["DOCUMENT_ROOT"]."/cpdb/images/".$true_name;
          move_uploaded_file($tem_name,$file_full_path);
          $true_name='images/'.$true_name;
           } 
         
       }else{
            $true_name=$_POST['company_logo1'];

           }
  
			/*  $link=mysql_connect("127.0.0.1","root","");
              mysql_select_db('cpdb');
              mysql_query("set names 'utf8'");*/
              $id=$_POST['id'];
              $product_type=$_POST['product_type'];
              
              
              $product_rprice=$_POST['product_rprice'];
              $product_reputation=$_POST['product_reputation'];
              $company=$_POST['company'];
               
              $machine_room=$_POST['machine_room'];
              $product=$_POST['product'];
              $product_price=$_POST['product_price'];
              $node=$_POST['node'];
              $band_width=$_POST['band_width'];
              $disk=$_POST['disk'];
              $memory=$_POST['memory'];
              $CPU=$_POST['CPU'];
              $rw_speed=$_POST['rw_speed'];
              $backups=$_POST['backups'];
              $protect=$_POST['protect'];
              $heat_transfer=$_POST['heat_transfer'];
              $not_stop=$_POST['not_stop'];
              $hours=$_POST['hours'];
              $free_record=$_POST['free_record'];
              $uncondition_refund=$_POST['uncondition_refund'];
              $sql="UPDATE `product` SET  `company`='$company',`company_logo`='$true_name',`machine_room`='$machine_room',`product`='$product',`product_type`='$product_type',`product_rprice`='$product_rprice',`product_reputation`='$product_reputation',`product_price`='$product_price',`node`='$node',`band_width`='$band_width',`disk`='$disk',`memory`='$memory',`CPU`='$CPU',`rw_speed`='$rw_speed',`backups`='$backups',`protect`='$protect',`heat_transfer`='$heat_transfer',`not_stop`='$not_stop',`hours`='$hours',`free_record`='$free_record',`uncondition_refund`='$uncondition_refund' WHERE id='$id'";
             
              
               $result=$pdo->query($sql);
             
              if($result){
                echo "<script type='text/javascript'>alert('修改成功');window.location.href='./product_list.php';</script>";
                 
              }
?>