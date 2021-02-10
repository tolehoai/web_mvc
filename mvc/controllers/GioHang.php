<?php
// http://localhost/live/Home/Show/1/2

class GioHang extends Controller {
    // Must have SayHi()
    public function __construct ( ) {
        $giohang = $this->model("GioHangModel");
        // $giohang->CapNhatSoLuongConLai();
        $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        
      }
    function SayHi(){
        CheckLoginUser();
        $userName=$_SESSION["userNameLogin"];
        $giohang = $this->model("GioHangModel");
        $taikhoan = $this->model("TaiKhoanModel");
        $userName = $_SESSION["userNameLogin"];
        // $giohang->CapNhatSoLuongConLai();
        // $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        
        // echo "Gio hang";
        $this->view("aoxau", [
        "Page" => "noidung", 
        "giohang" => $giohang->GetGioHangTheoUser($userName), 
        "giohang1" =>$giohang->TinhTongGioHang($maGioHang),
        "Title" =>"Giỏ hàng"
        ]);
       
    }
    function ThemVaoGioHang($maSP) {

        CheckLoginUser();
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        // $giohang->CapNhatSoLuongConLai();
        // $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        echo "Them vao gio hang " . $maSP . " Cua tai khoan " . $userName;
        echo " Ma gio hang " . $maGioHang;
        $giohang->UpdateTinhTrangDonHang_Show($maGioHang,$maSP);
        
    }

    function CapNhat(){
        echo "Cập nhật";
        // $maSP="$_POST[]"
        // $giohang = $this->model("GioHangModel");
        // $userName = $_SESSION["userNameLogin"];
        // // $giohang->CapNhatSoLuongConLai();
        // // $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        // $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        // $maGioHang = $row['ma_gio_hang'];
        // echo "Them vao gio hang " . $maSP . " Cua tai khoan " . $userName;
        // echo " Ma gio hang " . $maGioHang;
        // print_r($_POST);

        // exit();

        // var_dump(implode(","),array_keys($_POST));exit();
    }

    function ThanhToan() {
        CheckLoginUser();
        $giohang = $this->model("GioHangModel");
        
        // var_dump($_POST);
        // exit();
        $this->view("aoxau", [
            "Page" => "thanhtoanthanhcong", 
            "Title" =>"Giỏ hàng"
            ]);


        // $giohang->CapNhatSoLuongConLai();
        $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $giohang->CapNhatSoLuongConLai();
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        echo "Thanh toan";
        // echo $maGioHang;
        //Di chuyen tu bang chi tiet gio hang sang bang chi tiet hoa don
        

        // Cập nhật trạng thái đơn hàng
        // var_dump($_POST);
        // exit(); 
        // $arrSoLuong=array();
        // $arrMaSanPham=array();
        // foreach($_POST['soluong'] as $item)
        // {
        //     array_push($arrSoLuong,$item);
        // }
        
        foreach($_POST['masanpham'] as $item)
        {
           $giohang->UpdateTinhTrangDonHang($maGioHang,$item);
        }
        // print_r($arrSoLuong);
        // print_r($arrMaSanPham);
        // exit();
        $hoten=$_POST['txtHoTen'];
        $diachi=$_POST['txtDiaChi'];
        $sdt=$_POST['txtSDT'];
        $ghichu=$_POST['txtGhiChu'];
        $giohang->UpdateThongTinThanhToan($hoten, $diachi, $sdt, $ghichu, $maGioHang);
        $giohang->DiChuyenGioHangSangDonHang_Insert($maGioHang);
        $giohang->DiChuyenGioHangSangDonHang_Update($maGioHang);
        $giohang->TaoMaDonHang();



       
    }
    function Xoa($masanpham){
        CheckLoginUser();
        $giohang = $this->model("GioHangModel");
        

        // var_dump($_POST);
        // exit();
        // 1.Xóa 
        // 2.Cập nhật lại số lượng trong bảng hàng hóa 
        // 3.Cập nhật lại số lượng có thể mua trong bảng chi tiết hàng hóa 

        //Xóa
        //Lấy được mã hàng hóa và mã giỏ hàng
        //Lấy mã hàng hóa từ biến POST


        //Lấy mã giỏ hàng
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        // echo $maGioHang;

        //Lấy mã sản phẩm
        // echo $masanpham;

        //Xóa sản phẩm của giỏ hàng

        $giohang->XoaSanPhamTuGioHang($maGioHang, $masanpham);

        // Cập nhật lại số lượng trong bảng hàng hóa 
        $giohang->CapNhatSoLuongConLai();

        //Cập nhật lại số lượng có thể mua trong bảng chi tiết hàng hóa 
        $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $url = "/web_mvc/GioHang/TinhTrangDonHang";
        header("Location: $url");
    }

    function TinhTrangDonHang(){
        CheckLoginUser();
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        $this->view("aoxau", [
            "Page" => "tinhtrang_donhang", 
            "Title" =>"Tình trạng đơn hàng",
            "giohang" => $giohang->GetChiTietGioHangTuMaGioHang($maGioHang), 
            ]);
    }
}
?>