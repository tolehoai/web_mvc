<?php
class TaiKhoanAdminModel extends DB {
    public function KiemTraDangNhap($username, $pass) {
        $qr = "SELECT * FROM `admin` WHERE `admin`.username='$username' AND `admin`.password='$pass'";
        return mysqli_query($this->con, $qr);
    }
}
?>