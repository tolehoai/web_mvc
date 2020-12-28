<?php
// http://localhost/live/Home/Show/1/2
class TaiKhoan extends Controller {
    // Must have SayHi()
    function SayHi() {
        if (isset($_SESSION["userNameLogin"])) {
            $url = URL;
            header("Location: $url");
        }
        // Call Views
        $this->view("aoxau", ["Page" => "login", "Title" => 'Tài khoản', ]);
    }
    function DangKy() {
        $taikhoan = $this->model("TaiKhoanModel");
        $giohang = $this->model("GioHangModel");
        if (isset($_POST["btnDangKy"])) {
            $userName = $_POST['txtDangKyUsername'];
            $pass = $_POST['txtDangKyPass'];
            $fullName = $_POST['txtDangKyFullname'];
            $diaChi = $_POST['txtDangKyDiaChi'];
            $sdt = $_POST['txtDangKySDT'];
        }
        if (mysqli_num_rows($taikhoan->TimTaiKhoanTheoUsername($userName)) == 1) {
            echo "Khong them duoc";
            $_SESSION["DangKyThatBai"] = "That bai";
        } else {
            $kq = $taikhoan->ThemTaiKhoan($userName, $pass, $fullName, $diaChi, $sdt);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["DangKyThanhCong"] = "Thanhcong";
                    $giohang->ThemGioHang($userName);
                } else {
                    $_SESSION["DangKyThatBai"] = "That bai";
                }
            }
        }
        $url = URL . "TaiKhoan";
        header("Location: $url");
    }
    function DangNhap() {
        $taikhoan = $this->model("TaiKhoanModel");
        if (isset($_POST["btnDangNhap"])) {
            $userName = $_POST['txtDangNhapUsername'];
            $pass = $_POST['txtDangNhapPass'];
            $kq = mysqli_num_rows($taikhoan->KiemTraDangNhap($userName, $pass));
            if (isset($kq)) {
                if ($kq == 1) {
                    echo "Thanh cong";
                    $_SESSION["userNameLogin"] = $userName;
                    $url = URL;
                    header("Location: $url");
                } else {
                    $_SESSION["DangNhapThatBai"] = "That bai";
                    $url = URL . "TaiKhoan";
                    header("Location: $url");
                }
            }
        }
        // $url=URL."TaiKhoan";
        // header("Location: $url");
        
    }
    function DangXuat() {
        unset($_SESSION['userNameLogin']);
        $url = URL;
        header("Location: $url");
    }
}
?>