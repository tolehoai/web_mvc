<?php
// http://localhost/live/Home/Show/1/2
class Home extends Controller {
    // Must have SayHi()
    function SayHi() {
        $danhmuc = $this->model("DanhMucModel");
        $sanpham = $this->model("SanPhamModel");
        // echo $teo->GetSV();
        // Call Views
        $this->view("aoxau", ["Page" => "noidung1", 
        "danhmuc" => $danhmuc->GetDanhMucCoSanPham(), 
        "sanpham" => $sanpham->GetUniqueNhomHangHoa(), 
        ]);
    }
    function Show($a, $b) {
        echo "Home Show";
        // Call Models
        $teo = $this->model("SinhVienModel");
        // $tong = $teo->Tong($a, $b); // 3
        if ($a == "XuLy") {
            echo "Xu Ly, id=" . $b;
        }
        if ($a == "Them") {
            echo "Them, id=" . $b;
        }
        $teo = $this->model("SinhVienModel");
        echo $teo->GetSV();
        // Call Views
        // $this->view("aoxau", [
        //     "Page"=>"news",
        //     "Number"=>$tong,
        //     "Mau"=>"red",
        //     "SoThich"=>["A", "B", "C"],
        //     "SV" => $teo->SinhVien()
        // ]);
        $this->view("aoxau", ["Page" => "noidung", "Mau" => "red", "SoThich" => ["A", "B", "C"]]);
    }
    function SanPham() {
        $this->view("aoxau", ["Page" => "chitiet", ]);
    }
}
?>