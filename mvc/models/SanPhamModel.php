<?php
class SanPhamModel extends DB {
    public function GetSanPham() {
        $qr = "SELECT * FROM hang_hoa";
        return mysqli_query($this->con, $qr);
    }
    public function DemSoLuongHangHoa() {
        $qr = "Select TENHH,a.TENNHOM,count(MSHS) as SoLuong,a.MANHOM as MANHOMHANG
        FROM hang_hoa JOIN nhomhanghoa as a
        WHERE hang_hoa.MANHOM=a.MANHOM
        GROUP BY hang_hoa.MANHOM";
        return mysqli_query($this->con, $qr);
    }
    public function TimTenSanPhamTheoID($str) {
        $qr = "SELECT hang_hoa.TENHH
        FROM hang_hoa
        WHERE hang_hoa.MSHS=$str";
        return mysqli_query($this->con, $qr);
    }
    public function TimSanPhamTheoIDVaDanhMuc($danhmuc, $id) {
        $qr = "SELECT hang_hoa.HINH, hang_hoa.TENHH,hang_hoa.GIA,hang_hoa.MOTAHH,nhomhanghoa.TENNHOM,concat(nhomhanghoa.TENNHOM,' ',thuong_hieu.ten_thuong_hieu) as hanghoathuocnhom
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM
        AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu
        AND nhomhanghoa.nhomhanghoa_slug='$danhmuc' AND hang_hoa.MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function ThemSanPham($tensanpham, $loaisanpham, $thuonghieu, $giasanpham, $soluongsanpham, $hinhsanpham) {
        $qr = "INSERT INTO hang_hoa (MSHS, MANHOM, MATHUONGHIEU, TENHH, GIA, SOLUONGHANG, HINH, MOTAHH)
        VALUES ('', '$loaisanpham', '$thuonghieu', '$tensanpham', '$giasanpham', '$soluongsanpham', '$hinhsanpham','')";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamTheoLoai($loai) {
        $qr = "SELECT * from hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM = nhomhanghoa.MANHOM and nhomhanghoa_slug='$loai' and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function SuaSanPhamCoThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua, $hinhCanSua) {
        $qr = "UPDATE hang_hoa SET MANHOM='$nhomSanPhamCanSua', MATHUONGHIEU='$thuongHieuCanSua', TENHH='$tenSanPhamCanSua',GIA=$giaCanSua, SOLUONGHANG=$soLuongCanSua, HINH='$hinhCanSua' WHERE MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function SuaSanPhamKhongThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua) {
        $qr = "UPDATE hang_hoa SET MANHOM='$nhomSanPhamCanSua', MATHUONGHIEU='$thuongHieuCanSua', TENHH='$tenSanPhamCanSua',GIA=$giaCanSua, SOLUONGHANG=$soLuongCanSua WHERE MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function GetHinhBangID($id) {
        $qr = "SELECT HINH FROM hang_hoa WHERE MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function TimSanPhamTheoID($id) {
        $qr = "SELECT * FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu AND hang_hoa.MSHS='$id'";
        return mysqli_query($this->con, $qr);
    }
    public function XoaSanPham($id) {
        $qr = "DELETE FROM hang_hoa
        WHERE MSHS = $id";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamThuongHieu() {
        $qr = "SELECT DISTINCT nhomhanghoa_slug, slug, nhomhanghoa.TENNHOM, thuong_hieu.ten_thuong_hieu
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamTheoDanhMuc($madanhmuc) {
        $qr = "select *
        from hang_hoa
        WHERE MANHOM='$madanhmuc'";
        return mysqli_query($this->con, $qr);
    }
    public function GetUniqueThuongHieu() {
        $qr = "SELECT DISTINCT nhomhanghoa_slug
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function GetUniqueNhomHangHoa() {
        $qr = "SELECT DISTINCT  nhomhanghoa.TENNHOM, nhomhanghoa_slug, nhomhanghoa.MANHOM
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function GetMenu() {
        $qr = "SELECT *
        FROM (
        SELECT DISTINCT nhomhanghoa_slug, slug, nhomhanghoa.TENNHOM, thuong_hieu.ten_thuong_hieu
                FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
                WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu
        )a, (SELECT DISTINCT nhomhanghoa_slug
                FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
                WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu) b
        WHERE b.nhomhanghoa_slug=a.nhomhanghoa_slug";
        return mysqli_query($this->con, $qr);
    }
    public function GetMenuTheoLoai($id) {
        $qr = "SELECT *
        FROM (
        SELECT DISTINCT nhomhanghoa_slug, slug, nhomhanghoa.TENNHOM, thuong_hieu.ten_thuong_hieu
                FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
                WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu
        )a, (SELECT DISTINCT nhomhanghoa_slug
                FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
                WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu) b
        WHERE b.nhomhanghoa_slug=a.nhomhanghoa_slug and a.nhomhanghoa_slug='$id'";
        return mysqli_query($this->con, $qr);
    }
    public function GetTenNhomHangHoa($loai) {
        $qr = "SELECT nhomhanghoa.TENNHOM from nhomhanghoa 
        WHERE nhomhanghoa.nhomhanghoa_slug = '$loai'";
        return mysqli_query($this->con, $qr);
    }
}
?>