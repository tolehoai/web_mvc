<?php
class DanhMucModel extends DB {
    public function GetSV() {
        return "Nguyen Van Teo";
    }
    public function Tong($n, $m) {
        return $n + $m;
    }
    public function GetDanhMuc() {
        $qr = "SELECT * FROM nhomhanghoa";
        return mysqli_query($this->con, $qr);
    }
    public function ThemDanhMuc($name, $slug) {
        $qr = "INSERT INTO nhomhanghoa (MANHOM, TENNHOM, nhomhanghoa_slug)
        VALUES ('', '$name','$slug')";
        return mysqli_query($this->con, $qr);
    }
    public function TimDanhMucTheoTen($str) {
        $qr = "Select * From nhomhanghoa
        where TENNHOM='$str'";
        return mysqli_query($this->con, $qr);
    }
    public function TimDanhMucTheoID($str) {
        $qr = "Select * From nhomhanghoa
        where MANHOM='$str'";
        return mysqli_query($this->con, $qr);
    }
    public function SuaDanhMuc($name, $slug, $id) {
        $qr = "UPDATE nhomhanghoa SET TENNHOM='$name', nhomhanghoa_slug='$slug' WHERE MANHOM=$id";
        return mysqli_query($this->con, $qr);
    }
    public function XoaDanhMuc($id) {
        $qr = "DELETE FROM nhomhanghoa
        WHERE MANHOM = $id";
        return mysqli_query($this->con, $qr);
    }
    public function GetDanhMucCoSanPham() {
        $qr = "select DISTINCT nhomhanghoa.MANHOM, nhomhanghoa.TENNHOM, nhomhanghoa.nhomhanghoa_slug
        from hang_hoa JOIN nhomhanghoa
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM";
        return mysqli_query($this->con, $qr);
    }
}
?>