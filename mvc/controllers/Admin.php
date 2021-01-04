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
            $userName = addslashes($_POST['txtAdminUsername']);
            $pass = addslashes($_POST['txtAdminPass']);
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
            $tendanhmuc = addslashes($_POST["txtTenDanhMuc"]);
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
                    $_SESSION["thanhcong"] = "Thêm danh mục thành công";
                } else {
                }
            } else {
                $_SESSION["thatbai"] = "Thêm danh mục thất bại";
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
            $tenDanhMucCanSua = addslashes($_POST["txtTenDanhMuc"]);
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
                    $_SESSION["thatbai"] = "Xóa danh mục thất bại - Do quan hệ RESTRICT";
                }
            }
            $url = URL . "Admin/Danhmuc";
            header("Location: $url");
        }
    }
    function SanPham($a,$trang) {
        CheckLogin();
        echo $a;
        if ($a == "TatCa") {
            $sanpham = $this->model("SanPhamModel");
            $this->view("pagemaster_admin", ["Page" => "admin/sanpham_trangchu", "danhmuc" => $sanpham->DemSoLuongHangHoa(), "Title" => 'Danh Sách Sản Phẩm', ]);
        } else {
            $sosanpham_hienthi=5;
            $offset=($trang-1)*$sosanpham_hienthi;
            $sanpham = $this->model("SanPhamModel");
            $this->view("pagemaster_admin", 
            ["Page" => "admin/sanphamtheoloai", 
            "sanpham" => $sanpham->GetSanPhamTheoLoai_CoSoTrang($a,$offset,$sosanpham_hienthi), 
            "loai" => $a, 
            "TitleSP" => $sanpham->GetTenNhomHangHoa($a), 
            "page_no" => $trang,
            "sl" => $sanpham->DemSanPham($a),
            ]);

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
            $tensanpham = addslashes($_POST["txtTenSanPham"]);
            $loaisanpham = addslashes($_POST["slLoaiSanPham"]);
            $thuonghieu = addslashes($_POST["slThuongHieu"]);
            $giasanpham = addslashes($_POST["txtGiaSanPham"]);
            $soluongsanpham = addslashes($_POST["txtSoLuongSanPham"]);
            $mota = addslashes($_POST["txtMoTa"]);
            $motangan = addslashes($_POST["txtMoTaNgan"]);
            $hinhsanpham = addslashes($_FILES["txtHinhSanPham"]["name"]);
            $dst = "/web_mvc/uploads/" . $hinhsanpham;
            //    echo '<script type="text/javascript">alert("' . $dst . '")</script>';
            move_uploaded_file($_FILES["txtHinhSanPham"]["tmp_name"], $dst);
            $sanpham = $this->model("SanPhamModel");
            $kq = $sanpham->ThemSanPham($tensanpham, $loaisanpham, $thuonghieu, $giasanpham, $soluongsanpham, $hinhsanpham, $mota, $motangan);
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
            $row = mysqli_fetch_assoc($sanpham->GetHinhBangID($id));
            $hinhsanpham=$row['HINH'];
            // $dst = "/web_mvc/uploads/" . $hinhsanpham;
            // unlink('/web_mvc/uploads/'.$hinhsanpham);
            unlink(__DIR__ . '/../../uploads/'.$hinhsanpham);
            $kq = $sanpham->XoaSanPham($id);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Xóa sản phẩm thành công";
                } else {
                    $_SESSION["thatbai"] = "Xóa sản phẩm thất bại - Do quan hệ RESTRICT";
                }
            }
            $url = URL . "Admin/SanPham/TatCa/1";
            header("Location: $url");
        }
    }
    function XuLySuaSanPham($id) {
        CheckLogin();
        $sanpham = $this->model("SanPhamModel");
        // $hinhChuaCapNhat=$row_sanpham['HINH'][1];
        // echo '<script type="text/javascript">alert("'.$hinhChuaCapNhat.'")</script>';
        if (isset($_POST["btnSuaSanPham"]) && $_POST["txtTenSanPham"] != "" && $_POST["txtGiaSanPham"] != "" && $_POST["txtSoLuongSanPham"] != "") {
            $tenSanPhamCanSua = addslashes($_POST["txtTenSanPham"]);
            $nhomSanPhamCanSua = addslashes( $_POST["slNhomSanPham"]);
            $thuongHieuCanSua = addslashes($_POST["slThuongHieu"]);
            $giaCanSua = addslashes($_POST["txtGiaSanPham"]);
            $soLuongCanSua = addslashes($_POST["txtSoLuongSanPham"]);
            $hinhCanSua = addslashes($_FILES["txtHinhSanPham"]["name"]);
            $mota=addslashes($_POST['txtMoTa']);
            $motangan=addslashes($_POST['txtMoTaNgan']);
            // var_dump($hinhCanSua);
            $sanpham = $this->model("SanPhamModel");
            if ($hinhCanSua == '') {
                $kq = $sanpham->SuaSanPhamKhongThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua, $mota,$motangan);
            } else {
                $dst = "./uploads/" . $hinhCanSua;
                move_uploaded_file($_FILES["txtHinhSanPham"]["tmp_name"], $dst);
                $kq = $sanpham->SuaSanPhamCoThayDoiHinh($id, $tenSanPhamCanSua, $nhomSanPhamCanSua, $thuongHieuCanSua, $giaCanSua, $soLuongCanSua, $hinhCanSua, $mota,$motangan);
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
            $tenthuonghieu = addslashes($_POST["txtTenThuongHieu"]);
            $slug = $tenthuonghieu;
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
            $thuonghieu = $this->model("ThuongHieuModel");
            $number = mysqli_num_rows($thuonghieu->TimThuongHieuTheoTen($tenthuonghieu));
            if ($number == 0) {
                if ($tenthuonghieu != "") {
                    $kq = $thuonghieu->ThemThuongHieu($tenthuonghieu,$slug);
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
            $tenThuongHieuCanSua = addslashes($_POST["txtTenThuongHieu"]);
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
                    $_SESSION["thatbai"] = "Xóa thương hiệu thất bại - Do quan hệ RESTRICT";
                }
            }
            $url = URL . "Admin/Thuonghieu";
            header("Location: $url");
        }
    }
    function DonHang($trang){
        if($trang>0){
            $sosanpham_hienthi=10;
            $sanpham = $this->model("SanPhamModel");
            $offset=($trang-1)*$sosanpham_hienthi;
            echo "Đơn hàng";
            $donhang = $this->model("GioHangModel");
            $this->view("pagemaster_admin", 
            ["Page" => "admin/danhsachdonhang", 
            "donhang"=>$donhang->GetGioHang_CoSoTrang($offset, $sosanpham_hienthi),
            "Title" => 'Danh sách đơn hàng', 
            "page_no" => $trang,
            "sl" => $donhang->DemGioHang(),
            ]);
        }
        else{
            $this->view("black_page", 
            ["Page" => "admin/404", 
           
            ]);
        }
        
    }
    function XoaDonHang($masanpham, $magiohang){
        CheckLogin();
        $giohang = $this->model("GioHangModel");
        if(isset($_POST["btnXoaGioHang"])){
            echo $masanpham;
            echo $magiohang;
            
            $kq = $giohang->XoaSanPhamTuGioHang($magiohang, $masanpham);
            if (isset($kq)) {
                if ($kq == 1) {
                    $_SESSION["thanhcong"] = "Xóa giỏ hàng thành công";
                } else {
                    $_SESSION["thatbai"] = "Xóa giỏ hàng thất bại";
                }
            }
            $url = "/web_mvc/Admin/DonHang/1";
            header("Location: $url");
        }
       
           
    }


}
?>
