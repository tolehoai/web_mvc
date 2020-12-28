<?php
class ThuongHieuModel extends DB {
    public function GetSV() {
        return "Nguyen Van Teo";
    }
    public function Tong($n, $m) {
        return $n + $m;
    }
    public function GetThuongHieu() {
        $qr = "SELECT * FROM thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function ThemThuongHieu($name) {
        $qr = "INSERT INTO thuong_hieu (ma_thuong_hieu, ten_thuong_hieu)
        VALUES ('', '$name')";
        return mysqli_query($this->con, $qr);
    }
    public function TimThuongHieuTheoTen($str) {
        $qr = "Select * From thuong_hieu
        where ten_thuong_hieu='$str'";
        return mysqli_query($this->con, $qr);
    }
    public function TimThuongHieuTheoID($str) {
        $qr = "Select * From thuong_hieu
        where ma_thuong_hieu='$str'";
        return mysqli_query($this->con, $qr);
    }
    public function TimThuongHieuTheoSlug($str) {
        $qr = "Select * From thuong_hieu
        where slug='$str'";
        return mysqli_query($this->con, $qr);
    }
    public function SuaThuongHieu($name, $id) {
        $qr = "UPDATE thuong_hieu SET ten_thuong_hieu='$name' WHERE ma_thuong_hieu=$id";
        return mysqli_query($this->con, $qr);
    }
    public function XoaThuongHieu($id) {
        $qr = "DELETE FROM thuong_hieu
        WHERE ma_thuong_hieu = $id";
        return mysqli_query($this->con, $qr);
    }
}
?>