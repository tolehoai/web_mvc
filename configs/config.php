<?php
//define('URL','/web_mvc/');

$actual_link = 'http://'.$_SERVER['HTTP_HOST'];
// echo "<script type='text/javascript'>alert('$actual_link');</script>";
// define('URL','http://localhost:1000/web_mvc/');
define('URL',$actual_link.'/web_mvc/');
//Dinh nghia so san pham hien thi
define('sosanpham_hienthi',8);
define('sosanpham_hienthi_admin',10);
?>