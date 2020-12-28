<?php
// http://localhost/live/Home/Show/1/2
class GioHang extends Controller {
    // Must have SayHi()
    function ThemVaoGioHang($maSP) {
        CheckLoginUser();
        $giohang = $this->model("GioHangModel");
        $userName = $_SESSION["userNameLogin"];
        $row = mysqli_fetch_assoc($giohang->LayMaGioHangTuUsername($userName));
        $maGioHang = $row['ma_gio_hang'];
        echo "Them vao gio hang " . $maSP . " Cua tai khoan " . $userName;
        echo " Ma gio hang " . $maGioHang;
    }
}
?>