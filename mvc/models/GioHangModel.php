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
    public function ThemSanPhamVaoGioHang($masanpham, $magiohang, $gia) {
        $qr = "INSERT INTO `chi_tiet_gio_hang`(MSHS, ma_gio_hang, gia, so_luong) VALUES ('$masanpham','$magiohang',$gia,1) ON DUPLICATE KEY UPDATE so_luong=so_luong+1;";
        return mysqli_query($this->con, $qr);
    }
}
?>