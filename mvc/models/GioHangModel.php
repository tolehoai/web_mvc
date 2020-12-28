<?php
class GiohangModel extends DB {
    public function ThemGioHang($userName) {
        $qr = "INSERT INTO `gio_hang`(`ma_gio_hang`, `USERNAME`) VALUES ('','$userName')";
        return mysqli_query($this->con, $qr);
    }
    public function LayMaGioHangTuUsername($userName) {
        $qr = "SELECT gio_hang.ma_gio_hang  FROM gio_hang WHERE gio_hang.USERNAME='$userName'";
        return mysqli_query($this->con, $qr);
    }
}
?>