<?php
//define('URL','/web_mvc/');
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}
$actual_link = $protocol.$_SERVER['HTTP_HOST'];
// echo "<script type='text/javascript'>alert('$actual_link');</script>";
// define('URL','http://localhost:1000/web_mvc/');
define('URL',$actual_link.'/web_mvc/');
//Dinh nghia so san pham hien thi
define('sosanpham_hienthi',8);
define('sosanpham_hienthi_admin',10);
?>