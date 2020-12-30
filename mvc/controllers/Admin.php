<?php
// http://localhost/live/Home/Show/1/2
class Admin extends Controller {
    public function __construct ( ) {
        $giohang = $this->model("GioHangModel");
        
        // $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        
      }
    function KiemTraDangNhap() {
        $admin = $this->model("TaiKhoanAdminModel");
        echo 'Kiem tra dang nhap';
        if (isset($_POST['btnDangNhap'])) {
            $userName = $_POST['txtAdminUsername'];
            $pass = $_POST['txtAdminPass'];
            $kq = mysqli_num_rows($admin->KiemTraDangNhap($userName, $pass));
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["AdminLogin"] = $userName;
                    $url = URL . "Admin/TrangChu";
                    header("Location: $url");
                } else {
                    $_SESSION["admindangnhap"] = "That bai";
                    $url = URL . "Admin";
                    header("Location: $url");
                }
            }
        }
    }
    function DangXuat() {
        unset($_SESSION['AdminLogin']);
        $url = URL . 'Admin';
        header("Location: $url");
    }
    // Must have SayHi()
    function TrangChu() {
        CheckLogin();
        echo "Admin Home";
        $this->view("pagemaster_admin", ["Page" => "admin/trangquantri", "Mau" => "red", "SoThich" => ["A", "B", "C"]]);
    }
    function SayHi() {
        if(isset($_SESSION['AdminLogin'])){
            $this->view("pagemaster_admin", ["Page" => "admin/trangquantri", "Mau" => "red", "SoThich" => ["A", "B", "C"]]);
        }
        else{
            $this->view("pagemaster_admin_login", ["Page" => "admin/login", ]);
        }
       
    }
    function AddDanhMuc() {
        CheckLogin();
        echo "Admin Add";
        $this->view("pagemaster_admin", ["Page" => "admin/themdanhmuc", "Title" => 'Thêm Danh Mục', ]);
        if (isset($_POST["btnThemDanhMuc"]) && $_POST["txtTenDanhMuc"] != "") {
            $tendanhmuc = $_POST["txtTenDanhMuc"];
            $slug = $tendanhmuc;
            $slug = trim(mb_strtolower($slug));
            $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
            $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
            $slug = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $slug);
            $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
            $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
            $slug = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $slug);
            $slug = preg_replace('/(đ)/', 'd', $slug);
            $slug = preg_replace('/[^a-z0-9-\s]/', '', $slug);
            $slug = preg_replace('/([\s]+)/', '-', $slug);
            $danhmuc = $this->model("DanhMucModel");
            $number = mysqli_num_rows($danhmuc->TimDanhMucTheoTen($tendanhmuc));
            if ($number == 0) {
                if ($tendanhmuc != "") {
                    $kq = $danhmuc->ThemDanhMuc($tendanhmuc, $slug);
                    $_SESSION["thanhcong"] = "Thanhcong";
                } else {
                }
            } else {
                $_SESSION["thatbai"] = "That bai";
            }
            echo '<script>window.location = "/web_mvc/Admin/AddDanhMuc" </script>';
        }
    }
    function Danhmuc() {
        CheckLogin();
        echo "Admin Danh muc";
        $danhmuc = $this->model("DanhMucModel");
        $this->view("pagemaster_admin", ["Page" => "admin/danhmuc", "danhmuc" => $danhmuc->GetDanhMuc(), "Title" => 'Danh Sách Danh Mục', ]);
    }
    function SuaDanhMuc($madanhmuc) {
        CheckLogin();
        echo "Sua danh muc " . $madanhmuc;
        $danhmuc = $this->model("DanhMucModel");
        $this->view("pagemaster_admin", ["Page" => "admin/suadanhmuc", "danhmuc" => $danhmuc->TimDanhMucTheoID($madanhmuc), "Title" => 'Sửa Danh Mục', ]);
    }
    function XuLySuaDanhMuc($id) {
        CheckLogin();
        echo "Xu ly sua danh muc" . $id;
        if (isset($_POST["btnSuaDanhMuc"]) && $_POST["txtTenDanhMuc"] != "") {
            $tenDanhMucCanSua = $_POST["txtTenDanhMuc"];
            $slug = $tenDanhMucCanSua;
            $slug = trim(mb_strtolower($slug));
            $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
            $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
            $slug = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $slug);
            $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
            $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
            $slug = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $slug);
            $slug = preg_replace('/(đ)/', 'd', $slug);
            $slug = preg_replace('/[^a-z0-9-\s]/', '', $slug);
            $slug = preg_replace('/([\s]+)/', '-', $slug);
            $danhmuc = $this->model("DanhMucModel");
            $kq = $danhmuc->SuaDanhMuc($tenDanhMucCanSua, $slug, $id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Sửa danh mục thành công";
                } else {
                    $_SESSION["thatbai"] = "Sửa danh mục thất bại";
                }
            }
            $url = "/web_mvc/Admin/SuaDanhMuc/" . $id;
            header("Location: $url");
        }
    }
    function XoaDanhMuc($id) {
        CheckLogin();
        echo "Xoa danh muc " . $id;
        if (isset($_POST["btnXoaDanhMuc"])) {
            $danhmuc = $this->model("DanhMucModel");
            $kq = $danhmuc->XoaDanhMuc($id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Xóa danh mục thành công";
                } else {
                    $_SESSION["thatbai"] = "Xóa danh mục thất bại";
                }
            }
            $url = URL . "Admin/Danhmuc";
            header("Location: $url");
        }
    }
    function SanPham($a) {
        CheckLogin();
        echo $a;
        if ($a == "TatCa") {
            $sanpham = $this->model("SanPhamModel");
            $this->view("pagemaster_admin", ["Page" => "admin/sanpham_trangchu", "danhmuc" => $sanpham->DemSoLuongHangHoa(), "Title" => 'Danh Sách Sản Phẩm', ]);
        } else {
            $sanpham = $this->model("SanPhamModel");
            $this->view("pagemaster_admin", ["Page" => "admin/sanphamtheoloai", "sanpham" => $sanpham->GetSanPhamTheoLoai($a), "a" => $a, "TitleSP" => $sanpham->GetTenNhomHangHoa($a), ]);
        }
    }
    function ThemSanPham() {
        CheckLogin();
        echo "Admin Add San pham";
        $danhmuc = $this->model("DanhMucModel");
        $thuonghieu = $this->model("ThuongHieuModel");
        $this->view("pagemaster_admin", ["Page" => "admin/themsanpham", 
        "danhmuc" => $danhmuc->GetDanhMuc(), 
        "thuonghieu" => $thuonghieu->GetThuongHieu(), 
        "Title" => 'Thêm Sản Phẩm', 
        ]);
        if (isset($_POST["btnThemSanPham"])) {
            $tensanpham = $_POST["txtTenSanPham"];
            $loaisanpham = $_POST["slLoaiSanPham"];
            $thuonghieu = $_POST["slThuongHieu"];
            $giasanpham = $_POST["txtGiaSanPham"];
            $soluongsanpham = $_POST["txtSoLuongSanPham"];
            $hinhsanpham = $_FILES["txtHinhSanPham"]["name"];
            $dst = "./uploads/" . $hinhsanpham;
            //    echo '<script type="text/javascript">alert("' . $dst . '")</script>';
            move_uploaded_file($_FILES["txtHinhSanPham"]["tmp_name"], $dst);
            $sanpham = $this->model("SanPhamModel");
            $kq = $sanpham->ThemSanPham($tensanpham, $loaisanpham, $thuonghieu, $giasanpham, $soluongsanpham, $hinhsanpham);
            if (isset($kq)) {
                if ($kq >= 1) {
                    $_SESSION["thanhcong"] = "Thêm sản phẩm thành công";
                    echo "OK";
                } else {
                    $_SESSION["thatbai"] = "Thêm sản phẩm thất bại";
                    echo "Chua";
                }
            }
           
            echo '<script>window.location = "/web_mvc/Admin/SanPham/TatCa" </script>';
        } else {
            echo "Chua";
        }
       
        
    }
    function SuaSanPham($masanpham) {
        CheckLogin();
        $sanpham = $this->model("SanPhamModel");
        $danhmuc = $this->model("DanhMucModel");
        $thuonghieu = $this->model("ThuongHieuModel");
        $this->view("pagemaster_admin", ["Page" => "admin/suasanpham", 
        "sanpham" => $sanpham->TimSanPhamTheoID($masanpham), 
        "danhmuc" => $danhmuc->GetDanhMuc(), 
        "thuonghieu" => $thuonghieu->GetThuongHieu(), 
        "Title" => 'Sửa Sản Phẩm', 
        ]);
    }
    function XoaSanPham($id) {
        CheckLogin();
        if (isset($_POST["btnXoaSanPham"])) {
            $sanpham = $this->model("SanPhamModel");
            $kq = $sanpham->XoaSanPham($id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Xóa sản phẩm thành công";
                } else {
                    $_SESSION["thatbai"] = "Xóa sản phẩm thất bại";
                }
            }
            $url = URL . "Admin/SanPham/TatCa";
            header("Location: $url");
        }
    }
    function XuLySuaSanPham($id) {
        CheckLogin();
        $sanpham = $this->model("SanPhamModel");
        // $hinhChuaCapNhat=$row_sanpham['HINH'][1];
        // echo '<script type="text/javascript">alert("'.$hinhChuaCapNhat.'")</script>';
        if (isset($_POST["btnSuaSanPham"]) && $_POST["txtTenSanPham"] != "" && $_POST["txtGiaSanPham"] != "" && $_POST["txtSoLuongSanPham"] != "") {
            $tenSanPhamCanSua = $_POST["txtTenSanPham"];
            $nhomSanPhamCanSua = $_POST["slNhomSanPham"];
            $thuongHieuCanSua = $_POST["slThuongHieu"];
            $giaCanSua = $_POST["txtGiaSanPham"];
            $soLuongCanSua = $_POST["txtSoLuongSanPham"];
            $hinhCanSua = $_FILES["txtHinhSanPham"]["name"];
            // var_dump($hinhCanSua);
            $sanpham = $this->model("SanPhamModel");
            if ($hinhCanSua == '') {
                $kq = $sanpham->SuaSanPhamKhongThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua);
            } else {
                $dst = "./uploads/" . $hinhCanSua;
                move_uploaded_file($_FILES["txtHinhSanPham"]["tmp_name"], $dst);
                $kq = $sanpham->SuaSanPhamCoThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua, $hinhCanSua);
            }
            // $hinhCanSua=$_FILES["txtHinhSanPham"]["name"];
            // echo '<script type="text/javascript">alert("'.$hinhCanSua.'")</script>';
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Sửa sản phẩm thành công";
                } else {
                    $_SESSION["thatbai"] = "Sửa sản phẩm thất bại";
                }
            }
        } else {
            $_SESSION["thatbai"] = "Sửa sản phẩm thất bại";
        }
        $url = "/web_mvc/Admin/SanPham/TatCa";
        header("Location: $url");
    }
    function Thuonghieu() {
        CheckLogin();
        echo "Thuonghieu";
        $thuonghieu = $this->model("ThuongHieuModel");
        $this->view("pagemaster_admin", ["Page" => "admin/thuonghieu", "thuonghieu" => $thuonghieu->GetThuongHieu(), "Title" => 'Danh Sách Thương Hiệu', ]);
    }
    function ThemThuongHieu() {
        CheckLogin();
        $this->view("pagemaster_admin", ["Page" => "admin/themthuonghieu", "Title" => 'Thêm Thương Hiệu', ]);
        if (isset($_POST["btnThemThuongHieu"]) && $_POST["txtTenThuongHieu"] != "") {
            $tenthuonghieu = $_POST["txtTenThuongHieu"];
            $thuonghieu = $this->model("ThuongHieuModel");
            $number = mysqli_num_rows($thuonghieu->TimThuongHieuTheoTen($tenthuonghieu));
            if ($number == 0) {
                if ($tenthuonghieu != "") {
                    $kq = $thuonghieu->ThemThuongHieu($tenthuonghieu);
                    $_SESSION["thanhcong"] = "Thêm thương hiệu thành công";
                } else { 
                }
            } else {
                $_SESSION["thatbai"] = "Thêm thương hiệu thất bại";
            }
            echo '<script>window.location = "/web_mvc/Admin/ThemThuongHieu" </script>';
        }
    }
    function SuaThuongHieu($mathuonghieu) {
        CheckLogin();
        $thuonghieu = $this->model("ThuongHieuModel");
        $this->view("pagemaster_admin", ["Page" => "admin/suathuonghieu", "thuonghieu" => $thuonghieu->TimThuongHieuTheoID($mathuonghieu), "Title" => 'Sửa Thương Hiệu', ]);
    }
    function XuLySuaThuongHieu($id) {
        CheckLogin();
        if (isset($_POST["btnSuaThuongHieu"]) && $_POST["txtTenThuongHieu"] != "") {
            $tenThuongHieuCanSua = $_POST["txtTenThuongHieu"];
            $thuonghieu = $this->model("ThuongHieuModel");
            $kq = $thuonghieu->SuaThuongHieu($tenThuongHieuCanSua, $id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Sửa thương hiệu thành công";
                } else {
                    $_SESSION["thatbai"] = "Sửa thương hiệu thất bại";
                }
            }
            $url = "/web_mvc/Admin/SuaThuongHieu/" . $id;
            header("Location: $url");
        }
    }
    function XoaThuongHieu($id) {
        CheckLogin();
        echo "Xóa" . $id;
        if (isset($_POST["btnXoaThuongHieu"])) {
            $thuonghieu = $this->model("ThuongHieuModel");
            $kq = $thuonghieu->XoaThuongHieu($id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Xóa thương hiệu thành công";
                } else {
                    $_SESSION["thatbai"] = "Xóa thương hiệu thất bại";
                }
            }
            $url = URL . "Admin/Thuonghieu";
            header("Location: $url");
        }
    }
}
?>