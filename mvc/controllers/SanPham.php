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
    function DanhMuc($loai,$trang){
        $sosanpham_hienthi=sosanpham_hienthi;
        $sanpham = $this->model("SanPhamModel");
        $offset=($trang-1)*$sosanpham_hienthi;
        $this->view("aoxau", 
        ["Page" => "sanphamtheodanhmuc", 
        "sanpham" => $sanpham->GetSanPhamTheoLoai_CoSoTrang($loai,$offset,$sosanpham_hienthi),
        
        "sl" => $sanpham->DemSanPham($loai),
        "Title_SP" => $sanpham->GetTenNhomHangHoa1($loai), 
        "page_no" => $trang,
        "loai" => $loai,
        
        ]);
    }
}
?>