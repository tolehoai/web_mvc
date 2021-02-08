<?php
// http://localhost/live/Home/Show/1/2
class SanPham extends Controller {
    function SayHi(){
       
    }
    function ChiTietSanPham($loai, $id) {
        $sanpham = $this->model("SanPhamModel");
        
        $this->view("aoxau", 
        ["Page" => "chitiet", 
        "sanpham" => $sanpham->TimSanPhamTheoIDVaDanhMuc($loai, $id),
        "sanphammoi"=>$sanpham->GetSanPhamMoi(), 
        "SP_Title" => $sanpham->TimTenSanPhamTheoID($id), 
        ]);
    }
    function ThuongHieu($loai, $hang, $trang){
        if($trang<=0){
            $this->view("black_page", 
            ["Page" => "404", 
           
            ]);
        }
        else{
            $sosanpham_hienthi=sosanpham_hienthi;
            $sanpham = $this->model("SanPhamModel");
            $offset=($trang-1)*$sosanpham_hienthi;
            $this->view("aoxau", 
            ["Page" => "sanphamtheothuonghieu", 
            "sanpham" => $sanpham->GetSanPhamTheoLoai_TheoHang_CoSoTrang($loai,$hang,$offset,$sosanpham_hienthi),
            "sanpham1" => $sanpham->GetSanPhamTheoLoai_TheoHang_CoSoTrang($loai,$hang,$offset,$sosanpham_hienthi),
            "hang"=>$hang,
            "sl" => $sanpham->DemSanPhamTheoHang($loai,$hang),
            "Title_SP" => $sanpham->GetTenNhomHangHoa1($loai), 
            "page_no" => $trang,
            "loai" => $loai,
            
            ]);
        }
    }
    function DanhMuc($loai,$trang){
        if($trang<=0){
            $this->view("black_page", 
            ["Page" => "404", 
           
            ]);
        }
        else{
            $sosanpham_hienthi=sosanpham_hienthi;
            $sanpham = $this->model("SanPhamModel");
            $offset=($trang-1)*$sosanpham_hienthi;
            $this->view("aoxau", 
            ["Page" => "sanphamtheodanhmuc", 
            "sanpham" => $sanpham->GetSanPhamTheoLoai_CoSoTrang($loai,$offset,$sosanpham_hienthi),
            
            "sl" => $sanpham->DemSanPham($loai),
            "Title_SP" => $sanpham->GetTenNhomHangHoa1($loai), 
            "Title_SP1" => $sanpham->GetTenNhomHangHoa1($loai), 
            "page_no" => $trang,
            "loai" => $loai,
            
            ]);
        }
       
    }
    function TimKiem(){
        // print_r($_POST);
        // exit();
        if(isset($_POST['btnTimKiem'])){
            $noidung=$_POST['txtNoiDung'];
            $sanpham = $this->model("SanPhamModel");
            $this->view("aoxau", 
            ["Page" => "timkiemsanpham", 
            "sanpham_timkiem" => $sanpham->TimKiemSanPham($noidung),
            
            "Title" => "Tìm kiếm sản phẩm", 
           
            
            ]);
        }
        // else{
        //     $this->view("black_page", 
        //     ["Page" => "404", 
           
        //     ]);
        // }
        
    }
}
?>