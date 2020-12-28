<?php
class Ajax extends Controller {
    public $sanpham;
    public function __construct() {
        $this->sanpham = $this->model("SanPhamModel");
    }
    function SayHi() {
        echo "Ajax";
    }
    function GetSubMenu() {
        $sanpham = $this->model("SanPhamModel");
        $loaisanpham = $_POST['loaisanpham'];
        $ketqua = $sanpham->GetMenuTheoLoai($loaisanpham);
        $a = '';
        while ($row_sanpham = mysqli_fetch_array($ketqua)) {
            // $a.=$row_sanpham['ten_thuong_hieu'];
            $link = URL . "SanPham/" . $row_sanpham['nhomhanghoa_slug'] . "/" . $row_sanpham['slug'];
            echo '<li class="category-sub2-item "> <a href="' . $link . '">' . $row_sanpham['ten_thuong_hieu'] . '</a></li>';
        }
        // echo '<li class="category-sub2-item ">'.$a.'</li>';
        // echo $a;
        
    }
    function LaySanPhamTheoDanhMuc() {
        $sanpham = $this->model("SanPhamModel");
        $danhmuc = $_POST['danhmuc'];
        $tendanhmuc = $_POST['tendanhmuc'];
        $ketqua = $sanpham->GetSanPhamTheoDanhMuc($danhmuc);
        // echo $danhmuc;
        while ($row_sanpham = mysqli_fetch_array($ketqua)) {
            echo '<a href="./SanPham/ChiTietSanPham/' . $tendanhmuc . '/' . $row_sanpham['MSHS'] . '">
            <div class="col-md-3">
                                <div class="sanpham item1">
                                    <img src="./uploads/' . $row_sanpham['HINH'] . '"
                                        class="img-fluid" alt="Responsive image">
                                    <div class="product-info text-left m-t-20 new-product-info">
                                        <h6 class="name"><a href="detail.html">' . $row_sanpham['TENHH'] . '</a></h6>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price item1">
                                            <h5 class="price text-danger"> ' . $row_sanpham['GIA'] . ' </h5>
                                            <br>
                                            <form action="">
                                            <!-- ' . URL . 'GioHang/ThemVaoGioHang -->
                                            <!-- <a href="' . URL . 'GioHang/ThemVaoGioHang/' . $row_sanpham['MSHS'] . '"> -->
                                                <button class="btn btn-primary icon addCart" product_Id="'.$row_sanpham['MSHS'].'" data-toggle="dropdown"
                                                  type="button" name="addCart"> 
                                                    <i class="fa fa-shopping-cart"></i> 
                                                   Thêm vào giỏ hàng </button>
                                                  
                                            
                                            </a>
                                                <!-- <button class="btn btn-warning" type="button">Mua hàng</button> -->
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </a>
            
            ';
        }
    }

    function ThemVaoGioHang() {
        $masanpham = $_POST['masanpham'];
        // CheckLoginUser();
        // $giohang = $this->model("GioHangModel");
        // $userName = $_SESSION["userNameLogin"];
        // $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        // $maGioHang = $row['ma_gio_hang'];
        // echo "Them vao gio hang " . $maSP . " Cua tai khoan " . $userName;
        // echo " Ma gio hang " . $maGioHang;
        echo $masanpham;
    }
}
?>