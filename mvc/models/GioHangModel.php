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
    public function LayThongTinGioHangTuMSHS($MSHS) {
        $qr = "SELECT *  FROM chi_tiet_gio_hang WHERE chi_tiet_gio_hang.MSHS=$MSHS";
        return mysqli_query($this->con, $qr);
    }
    public function ThemSanPhamVaoGioHang($masanpham, $magiohang, $gia) {
        $qr = "INSERT INTO `chi_tiet_gio_hang`(MSHS, ma_gio_hang, giohang_gia, so_luong) VALUES ('$masanpham','$magiohang',$gia,1) ON DUPLICATE KEY UPDATE so_luong=so_luong+1;";
        return mysqli_query($this->con, $qr);
    }
    public function GetGioHangTheoUser($userName) {
        $qr = "SELECT *
        FROM gio_hang JOIN chi_tiet_gio_hang JOIN hang_hoa
        WHERE gio_hang.ma_gio_hang=chi_tiet_gio_hang.ma_gio_hang AND chi_tiet_gio_hang.MSHS=hang_hoa.MSHS AND gio_hang.USERNAME='$userName'";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatSoLuong($soluong, $masanpham, $magiohang) {
        $qr = "UPDATE chi_tiet_gio_hang SET so_luong=$soluong WHERE MSHS=$masanpham AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatSoLuongConLai() {
        $qr = "UPDATE hang_hoa JOIN
        (SELECT chi_tiet_gio_hang.MSHS 'mahanghoa', sum(chi_tiet_gio_hang.so_luong) 'sl'
        FROM chi_tiet_gio_hang 
        GROUP BY chi_tiet_gio_hang.MSHS) a
        ON hang_hoa.MSHS=a.mahanghoa
        SET hang_hoa.SOLUONGHANG=hang_hoa.SOLUONGNHAP-(
            SELECT a.sl
            WHERE a.mahanghoa=hang_hoa.MSHS)";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatSoLuongConLaiTrongBangChiTietGioHang() {
        $qr = "UPDATE chi_tiet_gio_hang JOIN
        (
            SELECT hang_hoa.MSHS,hang_hoa.SOLUONGHANG
            FROM hang_hoa
        ) a
        ON chi_tiet_gio_hang.MSHS=a.MSHS
        SET chi_tiet_gio_hang.soluong_conlai=a.SOLUONGHANG
           ";
        return mysqli_query($this->con, $qr);
    }
    public function TinhTongGioHang($magiohang) {
        $qr = "SELECT sum(so_luong*giohang_gia) as tong FROM `chi_tiet_gio_hang`  WHERE ma_gio_hang='$magiohang' AND chi_tiet_gio_hang.tinhtrang_donhang LIKE ''";
        return mysqli_query($this->con, $qr);
    }
    public function GetGioHangTuMaGioHang_MaSanPham($magiohang,$masanpham) {
        $qr = "SELECT *
        FROM chi_tiet_gio_hang
        WHERE chi_tiet_gio_hang.ma_gio_hang='$magiohang'
        AND chi_tiet_gio_hang.MSHS='$masanpham'";
        return mysqli_query($this->con, $qr);
    }
    public function Hien_Thi_Gia_Va_So_Luong($magiohang) {
        $qr = "SELECT sum(so_luong) sl, sum(giohang_gia*so_luong) gia
        FROM chi_tiet_gio_hang
        WHERE chi_tiet_gio_hang.ma_gio_hang='$magiohang' AND tinhtrang_donhang LIKE ''";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatSoLuongLonNhat_GioHang_HangHoa($magiohang,$masanpham) {
        $qr = "UPDATE chi_tiet_gio_hang 
        SET chi_tiet_gio_hang.so_luong=chi_tiet_gio_hang.soluong_conlai
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function XoaSanPhamTuGioHang($magiohang,$masanpham) {
        $qr = "DELETE 
        FROM chi_tiet_gio_hang 
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function UpdateTinhTrangDonHang($magiohang,$masanpham) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET tinhtrang_donhang='Chưa xữ lý', show_in_cart='0'
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function UpdateTinhTrangDonHang_Show($magiohang,$masanpham) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET tinhtrang_donhang='', show_in_cart='1'
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function GetGioHang() {
        $qr = "SELECT * FROM chi_tiet_gio_hang JOIN hang_hoa
        WHERE chi_tiet_gio_hang.MSHS=hang_hoa.MSHS
        ORDER BY ma_gio_hang ASC";
        return mysqli_query($this->con, $qr);
    }
    public function GetGioHang_CoSoTrang($offset, $sosanpham_hienthi) {
        $qr = "SELECT * FROM chi_tiet_gio_hang JOIN hang_hoa
        WHERE chi_tiet_gio_hang.MSHS=hang_hoa.MSHS
        ORDER BY ma_gio_hang ASC
        LIMIT $offset,$sosanpham_hienthi";;
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatTrangThaiSanPham_MaGioHang_ChuaXuLy($masanpham,$magiohang) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET tinhtrang_donhang='Chưa xữ lý'
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatTrangThaiSanPham_MaGioHang_DangXuLy($masanpham,$magiohang) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET tinhtrang_donhang='Đang xữ lý'
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function CapNhatTrangThaiSanPham_MaGioHang_DaXuLy($masanpham,$magiohang) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET tinhtrang_donhang='Đã xữ lý'
        WHERE chi_tiet_gio_hang.MSHS='$masanpham' AND chi_tiet_gio_hang.ma_gio_hang='$magiohang'";
        return mysqli_query($this->con, $qr);
    }
    public function GetChiTietGioHangTuMaGioHang($magiohang) {
        $qr = "SELECT * FROM chi_tiet_gio_hang JOIN hang_hoa
        WHERE chi_tiet_gio_hang.ma_gio_hang='$magiohang'
        AND chi_tiet_gio_hang.MSHS=hang_hoa.MSHS";
        return mysqli_query($this->con, $qr);
    }
    public function DemGiohang() {
        $qr = "SELECT COUNT(*) as sl
        FROM chi_tiet_gio_hang";
        return mysqli_query($this->con, $qr);
    }
    public function UpdateThongTinThanhToan($hoten, $diachi, $sdt, $ghichu, $maGioHang) {
        $qr = "UPDATE chi_tiet_gio_hang
        SET
        hoten='$hoten',diachi='$diachi',sodienthoai='$sdt',ghichu='$chichu'
        WHERE chi_tiet_gio_hang.ma_gio_hang='$maGioHang'";
        return mysqli_query($this->con, $qr);
    }
   
}
?>