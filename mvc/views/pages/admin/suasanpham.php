<?php

?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->

    <div class="main-content">

        <div class="container-fluid">
            <!-- OVERVIEW -->

            <?php
                if(isset($_SESSION["thanhcong"])){
                    echo'
                    <div class="alert alert-success" role="alert">
                    '.$_SESSION["thanhcong"].'
                  </div>
                    ';
                    unset($_SESSION['thanhcong']);
                }
                if(isset($_SESSION["thatbai"])){
                    echo'
                    <div class="alert alert-danger" role="alert">
                    '.$_SESSION["thatbai"].'
</div>
                    ';
                    unset($_SESSION['thatbai']);
                }
            ?>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Sửa sản phẩm</h3>

                </div>

            </div>
            <!-- END OVERVIEW -->
            <?php
               while($row_sanpham = mysqli_fetch_array($data["sanpham"])){ 
            ?>
            
            <form action="<?php echo URL;?>Admin/XuLySuaSanPham/<?php echo $row_sanpham['MSHS']?>" method="POST"
                name="frmSuaSanPham" id="frmSuaSanPham" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="txtTenSanPham" aria-describedby="emailHelp"
                        placeholder="Nhập tên sản phẩm" value="<?php echo $row_sanpham['TENHH'] ?>">
                </div>
                <div class="form-group">
                    <label>Nhóm sản phẩm</label>
                    <select class="form-control" name="slNhomSanPham">
                        <?php
							while($row_danhmuc = mysqli_fetch_array($data["danhmuc"])){
								
								
							
						?>
                        <option name="vlLoaiSanPham" value="<?php echo $row_danhmuc['MANHOM'];?>"
                            <?php if($row_sanpham['TENNHOM']==$row_danhmuc['TENNHOM']){ echo "selected";} ?>>
                            <?php echo $row_danhmuc['TENNHOM'];?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="slThuongHieu">
                        <?php
							while($row_thuonghieu = mysqli_fetch_array($data["thuonghieu"])){
								
								
							
						?>

                        <option name="vlThuongHieu" value="<?php echo $row_thuonghieu['ma_thuong_hieu'];?>"
                            <?php if($row_sanpham['ma_thuong_hieu']==$row_thuonghieu['ma_thuong_hieu']){ echo "selected";} ?>>
                            <?php echo $row_thuonghieu['ten_thuong_hieu'];?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">

                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" name="txtGiaSanPham" aria-describedby="emailHelp"
                        placeholder="Nhập giá sản phẩm" value="<?php echo $row_sanpham['GIA'] ?>">
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm (Nhập thêm)</label>
                    <input type="text" class="form-control" name="txtSoLuongSanPham" aria-describedby="emailHelp"
                        placeholder="Nhập số lượng sản phẩm" value="<?php echo $row_sanpham['SOLUONGHANG'] ?>">
                </div>
                <div class="form-group">
                    <label>Chọn hình để tải lên</label>
                    <input type="file" class="form-control-file" name="txtHinhSanPham" value="<?php echo $row_sanpham['HINH']; ?>">
                </div>
                <div class="form-group">
                    <label>Mô tả sản ngắn </label>
                  <textarea name="txtMoTaNgan" id="txtMoTaNgan" cols="30" rows="10"><?php echo $row_sanpham['MOTA_NGAN'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm </label>
                  <textarea name="txtMoTa" id="txtMoTa" cols="30" rows="10"><?php echo $row_sanpham['MOTAHH'] ?></textarea>
                </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnSuaSanPham">Sửa sản phẩm</button>
                </div>
            </form>

        </div>
    </div>

    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/web_mvc/public/ckeditor/ckeditor.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script
    src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>
<script>
    // Yêu cầu CKEDITOR thay thế textarea đơn giản thành Bộ công cụ soạn thảo trực quan
    CKEDITOR.replace('txtMoTa');
    CKEDITOR.replace('txtMoTaNgan');
</script>
</body>

</html>