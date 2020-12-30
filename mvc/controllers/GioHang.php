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
        // $this->view("aodep", [
        //     "Page" => "noidung2", 
        //     "Title" =>"Giỏ hàng"
        //     ]);


        // $giohang->CapNhatSoLuongConLai();
        $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $giohang->CapNhatSoLuongConLai();
        
        echo "Thanh toan";

        //Cập nhật trạng thái đơn hàng
        // print_r($_POST);
        // exit();

       
    }
    function Xoa($masanpham){
        $giohang = $this->model("GioHangModel");
        echo "Xoa";

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
    }
}
?>