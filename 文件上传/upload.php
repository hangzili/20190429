<?php 
//接收文件上传使用    $_FILES[]; 全局变量
//如果接收其他的值正常使用$_POST接收就可以了
$size = $_FILES['uploads']['size'];
// var_dump($size);
$types = $_FILES['uploads']['type'];
$tmp_name = $_FILES['uploads']['tmp_name'];
$error = $_FILES['uploads']['error'];
// // $name = $_POST['aaa'];
// echo "<pre>";
// var_dump($file);
// var_dump($name);
/*
array(5) {
  ["name"]=>-------------------------------------->文件的名字
  string(11) "Image 1.png"
  ["type"]=>-------------------------------------->文件的类型 （MIME）
  string(9) "image/png"
  ["tmp_name"]=>---------------------------------->临时文件目录
  string(25) "E:\XMMMMM\tmp\phpF8D0.tmp"
  ["error"]=>------------------------------------->文件的错误号
  int(0)
  ["size"]=>-------------------------------------->文件的大小
  int(26496)   1000000
}
*/
//1.判断文件的大小
if($size > 100000){
	echo "上传的文件太大";
	exit();
}
//2.文件的类型   in_array
$images = array('image/png','image/jpg','image/jpeg');
if(!in_array($types,$images)){
	echo "文件格式不正确";
	exit();
}

//3.文件的错误号
switch($error){
	case 1:	
	case 2:	
	case 3:
	case 6:	
	case 7:
		echo "系统内部错误，请待会再试";
	break;
	case 4:
		echo "没有文件被上传";
	break;	
}







 ?>