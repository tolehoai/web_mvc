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
            if($row_sanpham['SOLUONGHANG']==0){
                echo '<a href="./SanPham/ChiTietSanPham/' . $tendanhmuc . '/' . $row_sanpham['MSHS'] . '">
                <div class="col-md-3">
                                    <div class="sanpham item1">
                                        <img src="./uploads/' . $row_sanpham['HINH'] . '"
                                            class="img-fluid" alt="Responsive image">
                                        <div class="product-info text-left m-t-20 new-product-info">
                                            <h6 class="name"><a href="./SanPham/ChiTietSanPham/' . $tendanhmuc . '/' . $row_sanpham['MSHS'] . '">' . $row_sanpham['TENHH'] . '</a></h6>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price item1">
                                                <h5 class="price text-danger"> ' . number_format($row_sanpham['GIA'], 0, '', ',') . ' đ</h5>
                                                <br>
                                                <form action="">
                                                <!-- ' . URL . 'GioHang/ThemVaoGioHang -->
                                                <a href="" class="btn btn-danger disabled " tabindex="-1" aria-disabled="true" role="button" data-bs-toggle="button">Hết hàng</a>
                                                
                                                    <!-- <button class="btn btn-warning" type="button">Mua hàng</button> -->
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </a>
                
                ';}
                else{
                    echo '<a href="./SanPham/ChiTietSanPham/' . $tendanhmuc . '/' . $row_sanpham['MSHS'] . '">
            <div class="col-md-3">
                                <div class="sanpham item1">
                                    <img src="./uploads/' . $row_sanpham['HINH'] . '"
                                        class="img-fluid" alt="Responsive image">
                                    <div class="product-info text-left m-t-20 new-product-info">
                                        <h6 class="name"><a href="./SanPham/ChiTietSanPham/' . $tendanhmuc . '/' . $row_sanpham['MSHS'] . '">' . $row_sanpham['TENHH'] . '</a></h6>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price item1">
                                            <h5 class="price text-danger"> ' . number_format($row_sanpham['GIA'], 0, '', ',') . ' đ</h5>
                                            <br>
                                            <form action="">
                                            <!-- ' . URL . 'GioHang/ThemVaoGioHang -->
                                            <!-- <a href="' . URL . 'GioHang/ThemVaoGioHang/' . $row_sanpham['MSHS'] . '"> -->
                                                
                                                <button class="btn btn-primary icon addCart" product_Id="'.$row_sanpham['MSHS'].'" data-toggle="dropdown"
                                                  type="button" name="addCart"> 
                                                    <i class="fa fa-shopping-cart"></i> 
                                                   Thêm vào giỏ hàng </button>
                                                  
                                            
                                            <!--</a>-->
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
    }

    function ThemVaoGioHang() {
        $masanpham = $_POST['masanpham'];
        if(isset($_SESSION["userNameLogin"])){
            $giohang = $this->model("GioHangModel");
            $sanpham = $this->model("SanPhamModel");
            $userName = $_SESSION["userNameLogin"];
            $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
            $maGioHang = $row['ma_gio_hang'];
            $row_sanpham = mysqli_fetch_assoc($sanpham->TimSanPhamTheoID($masanpham));
            $giaSanPham = $row_sanpham['GIA'];
            // echo "Them vao gio hang " . $masanpham . " Cua tai khoan " . $userName;
            // echo " Ma gio hang " . $maGioHang;
            $giohang->ThemSanPhamVaoGioHang($masanpham, $maGioHang, $giaSanPham);
            echo "
            
                <script> 
                
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thêm vào giỏ hàng thành công',
                    showConfirmButton: false,
                    timer: 1000
                  })
                </script>
            ";
        }else{
            echo "
            <script>
            Swal.fire({
                // title: 'Bạn cần đăng nhập để Thêm vào giỏ hàng',
                // showCancelButton: true,
                // confirmButtonText: `Đăng nhập`,
                title: 'Yêu cầu đăng nhập',
            text: 'Bạn cần Đăng nhập để Thêm vào giỏ hàng',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FCCF14',
            confirmButtonText: '<a href=\"TaiKhoan\" style=\"color:white;\">Đăng nhập</a>',
            cancelButtonText: 'Hủy bỏ',
            closeOnConfirm: false,
            closeOnCancel: false
            })
            </script>
            ";
        }
        
    }

    function DiVaoGioHang() {
        
        if(isset($_SESSION["userNameLogin"])){
           echo"
                <script>
                    window.location.href = 'GioHang';
                </script>
           ";
        }else{
            echo "
            <script>
            Swal.fire({
                title: 'Yêu cầu đăng nhập',
                text: 'Bạn cần Đăng nhập để vào giỏ hàng',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FCCF14',
                confirmButtonText: '<a href=\"TaiKhoan\" style=\"color:white;\">Đăng nhập</a>',
                cancelButtonText: 'Hủy bỏ',
                closeOnConfirm: false,
                closeOnCancel: false
            })
            </script>
            ";
        }
        
    }

    function CapNhatSoLuong() {
        
       
        $soluong = $_POST['soluongcancapnhat'];
       
        $masanpham= $_POST['mahanghoa'];
       
        // $giohang->CapNhatSoLuongConLai($masanpham);
        $giohang = $this->model("GioHangModel");
        // echo $masanpham;

        $userName = $_SESSION["userNameLogin"];
       
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
       
        $kq_capnhat_sl=$giohang->CapNhatSoLuong($soluong, $masanpham, $maGioHang);

        // $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        
        $row_giohang=mysqli_fetch_assoc($giohang->LayThongTinGioHangTuMSHS($masanpham));
        $kq = $row_giohang['giohang_gia']*$row_giohang['so_luong'];
        
        echo number_format($kq, 0, '', ','); 
        echo " ₫";
        
        // $giohang = $this->model("GioHangModel");
       
        $giohang->CapNhatSoLuongConLaiTrongBangChiTietGioHang();
        $row_giohang_soluong = mysqli_fetch_assoc($giohang->GetGioHangTuMaGioHang_MaSanPham($maGioHang,$masanpham));
        if($row_giohang_soluong ['so_luong']-$row_giohang_soluong ['soluong_conlai']>0){
            $soluong="soluong_".$row_giohang_soluong ['MSHS'];
            $sl_conlai=$row_giohang_soluong ['soluong_conlai'];
            $sl=$row_giohang_soluong ['so_luong'];
            echo "
            <script>
                var str=  $masanpham;
                var sl = $sl_conlai;
                console.log(str);
                console.log( $(\"#soluong_\"+str));
                $(\"#soluong_\"+str).val(sl);
                console.log($sl_conlai);
                console.log($sl)
                console.log($maGioHang)
                $(\"#soluong_\"+str).attr(\"value\", $sl_conlai);
                Swal.fire({
                    icon: 'error',
                    title: 'Số lượng tối đa',
                    text: 'Chúng tôi chỉ có tối đa $sl_conlai sản phẩm này',
                    
                  })

            </script>
            ";
            $giohang->CapNhatSoLuongLonNhat_GioHang_HangHoa($maGioHang,$masanpham);
        }
        else{
            // echo "<script>alert($sl_conlai)</script>";
        }
        
    }
    
    function CapNhatThanhTien() {
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        $row = mysqli_fetch_assoc($giohang->TinhTongGioHang($maGioHang));
        $kq=$row['tong'];
        echo number_format($kq, 0, '', ','); 
        echo " ₫";
    }
    function HienThiSoLuong() {
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        $row_hienthi=mysqli_fetch_assoc($giohang->Hien_Thi_Gia_Va_So_Luong($maGioHang));
        $soluong=$row_hienthi['sl'];
        echo $soluong;
    }
    function HienThiGia() {
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        $row_hienthi=mysqli_fetch_assoc($giohang->Hien_Thi_Gia_Va_So_Luong($maGioHang));
        $gia=$row_hienthi['gia'];
        echo number_format($gia, 0, '', ','); 
        echo " ₫";
    }

    function Update_ChuaCapNhat() {
        $giohang = $this->model("GioHangModel");
        $masanpham=$_POST['masanpham'];
        $magiohang=$_POST['magiohang'];

        // echo $masanpham;
        $kq=$giohang->CapNhatTrangThaiSanPham_MaGioHang_ChuaXuLy($masanpham,$magiohang);
        // echo "
        //     <script>
        //         Swal.fire({
        //             position: 'center',
        //             icon: 'success',
        //             title: 'Your work has been saved',
        //             showConfirmButton: false,
        //             timer: 1000
        //         })
        //         setTimeout(function(){
        //             location.reload();
        //         }, 1200);
               
        //     </script>
        //     ";


        if($kq>=1){
            echo "
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thao tác thành công',
                    showConfirmButton: false,
                    timer: 1000
                })
                setTimeout(function(){
                    location.reload();
                }, 1200);
               
            </script>
            ";
        }
        else{
            echo "
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Thao tác thất bại',
                    showConfirmButton: false,
                    timer: 1000
                })
                setTimeout(function(){
                    location.reload();
                }, 1200);
               
            </script>
            ";
        }

    }
    function GetDonHang(){
        
    }



}

?>