<?php  
//Tao ket noi toi DTB
$host = "localhost"; 
// tai khoan co so du lieu 
$user = "root";  
// mat khau
$pass = "";  
//ten database
$dtb ="admin_app";
$mysqli = new mysqli($host, $user, $pass, $dtb);
$mysqli->set_charset("utf8");

?>