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
        $qr = "SELECT hang_hoa.SOLUONGHANG, hang_hoa.HINH, hang_hoa.TENHH,hang_hoa.GIA,hang_hoa.MOTAHH,hang_hoa.MOTA_NGAN,nhomhanghoa.TENNHOM,concat(nhomhanghoa.TENNHOM,' ',thuong_hieu.ten_thuong_hieu) as hanghoathuocnhom
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM
        AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu
        AND nhomhanghoa.nhomhanghoa_slug='$danhmuc' AND hang_hoa.MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function ThemSanPham($tensanpham, $loaisanpham, $thuonghieu, $giasanpham, $soluongsanpham, $hinhsanpham, $mota,$motangan) {
        $qr = "INSERT INTO hang_hoa (MSHS, MANHOM, MATHUONGHIEU, TENHH, GIA,SOLUONGHANG, SOLUONGNHAP, HINH, MOTAHH, MOTA_NGAN   )
        VALUES ('', '$loaisanpham', '$thuonghieu', '$tensanpham', '$giasanpham', '$soluongsanpham','$soluongsanpham', '$hinhsanpham','$mota','$motangan')";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamTheoLoai($loai) {
        $qr = "SELECT * from hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM = nhomhanghoa.MANHOM and nhomhanghoa_slug='$loai' and hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamTheoLoai_CoSoTrang($loai,$offset,$sosanpham_hienthi) {
        $qr = "SELECT * from hang_hoa JOIN nhomhanghoa
        WHERE hang_hoa.MANHOM = nhomhanghoa.MANHOM and nhomhanghoa_slug='$loai'
        LIMIT $offset,$sosanpham_hienthi";
        return mysqli_query($this->con, $qr);
    }
    public function GetSanPhamTheoLoai_TheoHang_CoSoTrang($loai,$hang, $offset,$sosanpham_hienthi) {
        $qr = "SELECT * from hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM = nhomhanghoa.MANHOM
        AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu AND thuong_hieu.slug='$hang'
        AND nhomhanghoa_slug='$loai'
        LIMIT $offset,$sosanpham_hienthi";
        return mysqli_query($this->con, $qr);
    }
    public function SuaSanPhamCoThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua, $hinhCanSua,$mota,$motangan) {
        $qr = "UPDATE hang_hoa SET MANHOM='$nhomSanPhamCanSua', MATHUONGHIEU='$thuongHieuCanSua', TENHH='$tenSanPhamCanSua',GIA=$giaCanSua, SOLUONGNHAP=SOLUONGNHAP+$soLuongCanSua,SOLUONGHANG=SOLUONGHANG+$soLuongCanSua, HINH='$hinhCanSua', MOTAHH='$mota', MOTA_NGAN='$motangan' WHERE MSHS=$id";
        return mysqli_query($this->con, $qr);
    }
    public function SuaSanPhamKhongThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua,$mota, $motangan) {
        $qr = "UPDATE hang_hoa SET MANHOM='$nhomSanPhamCanSua', MATHUONGHIEU='$thuongHieuCanSua', TENHH='$tenSanPhamCanSua',GIA=$giaCanSua, SOLUONGNHAP=SOLUONGNHAP+$soLuongCanSua,SOLUONGHANG=SOLUONGHANG+$soLuongCanSua,MOTAHH='$mota', MOTA_NGAN='$motangan' WHERE MSHS=$id";
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
    public function GetSanPhamTheoDanhMuc_Limit_8($madanhmuc) {
        $qr = "
        select *
                from hang_hoa
                WHERE MANHOM='$madanhmuc'
              
        ORDER BY `hang_hoa`.`MSHS` DESC
          LIMIT 0,8";
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
    public function GetSanPhamMoi() {
        $qr = "SELECT * FROM hang_hoa JOIN nhomhanghoa
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM
        ORDER BY hang_hoa.MSHS ASC
                LIMIT 5";
        return mysqli_query($this->con, $qr);
    }
    public function GetTenNhomHangHoa1($loai) {
        $qr = "SELECT nhomhanghoa.TENNHOM FROM `nhomhanghoa` WHERE nhomhanghoa.nhomhanghoa_slug='$loai'";
        return mysqli_query($this->con, $qr);
    }
    public function DemSanPham($loai) {
        $qr = "SELECT COUNT(hang_hoa.MSHS) as 'sl' from hang_hoa JOIN nhomhanghoa
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM AND nhomhanghoa.nhomhanghoa_slug='$loai'";
        return mysqli_query($this->con, $qr);
    }
    public function DemSanPhamTheoHang($loai,$hang) {
        $qr = "SELECT COUNT(hang_hoa.MSHS) as 'sl' from hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM AND nhomhanghoa.nhomhanghoa_slug='$loai' AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu and thuong_hieu.slug='$hang'";
        return mysqli_query($this->con, $qr);
    }
    public function TimKiemSanPham($noidung) {
        $qr = "SELECT *  FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu
        AND hang_hoa.TENHH LIKE '%$noidung%'
        "
        ;
        return mysqli_query($this->con, $qr);
    }
    
    public function DemSanPhamTimKiem($noidung) {
        $qr = "SELECT COUNT(*) sl 
        FROM hang_hoa JOIN nhomhanghoa JOIN thuong_hieu
        WHERE hang_hoa.MANHOM=nhomhanghoa.MANHOM AND hang_hoa.MATHUONGHIEU=thuong_hieu.ma_thuong_hieu 
        AND hang_hoa.TENHH LIKE '%$noidung%'";
        return mysqli_query($this->con, $qr);
    }
    
   
}
?>