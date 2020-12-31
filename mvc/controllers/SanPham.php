<?php
// http://localhost/live/Home/Show/1/2
class SanPham extends Controller {
    function ChiTietSanPham($loai, $id) {
        $sanpham = $this->model("SanPhamModel");
        $this->view("aoxau", 
        ["Page" => "chitiet", 
        "sanpham" => $sanpham->TimSanPhamTheoIDVaDanhMuc($loai, $id),
        "sanphammoi"=>$sanpham->GetSanPhamMoi(), 
        "SP_Title" => $sanpham->TimTenSanPhamTheoID($id), ]);
    }
}
?>