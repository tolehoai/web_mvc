<?php
class TaiKhoanModel extends DB {
    public function TimTaiKhoanTheoUsername($username) {
        $qr = "SELECT * FROM khachhang
        WHERE khachhang.USERNAME='$username'";
        return mysqli_query($this->con, $qr);
    }
    public function ThemTaiKhoan($username, $pass, $hoten, $diachi, $sdt) {
        $qr = "INSERT INTO `khachhang`( `USERNAME`, `password`, `HOTENKH`, `DIACHI`, `SODIENTHOAI`) 
        VALUES ('$username','$pass','$hoten','$diachi','$sdt')";
        return mysqli_query($this->con, $qr);
    }
    public function KiemTraDangNhap($username, $pass) {
        $qr = "SELECT *
        FROM khachhang
        WHERE khachhang.USERNAME='$username' AND khachhang.password='$pass'";
        return mysqli_query($this->con, $qr);
    }
    public function GetMSKH($username) {
        $qr = "SELECT khachhang.MSKH FROM khachhang WHERE khachhang.USERNAME='$username'";
        return mysqli_query($this->con, $qr);
    }
    public function CountMember() {
        $qr = "SELECT COUNT(USERNAME) as 'Number_Of_Member' FROM khachhang";
        return mysqli_query($this->con, $qr);
    }
}
?>