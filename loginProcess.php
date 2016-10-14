<?php
 require_once('./config.php');
 
$username=htmlspecialchars($_POST['username']);
$password=htmlspecialchars($_POST['password']);
 
	$sql="select passwd from admin where username=?";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($username));
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	$data['passwd']=$data['passwd'];
if(md5($password)==$data['passwd']){
	session_start();
	$_SESSION['username']=$username;
    header("Location:product_list.php");
    exit();
}else{
    header("Location:login.php");
    exit();
}
 
  
  mysql_free_result($res);
  mysql_close($conn);