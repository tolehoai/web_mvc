<?php
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    
	<div class="main-content">
        
		<div class="container-fluid">
            <!-- OVERVIEW -->
            <?php
if (isset($_SESSION["thanhcong"])) {
    echo '
                    <div class="alert alert-success" role="alert">
                    '.$_SESSION["thanhcong"].'
                  </div>
                    ';
    unset($_SESSION['thanhcong']);
}
if (isset($_SESSION["thatbai"])) {
    echo '
                    <div class="alert alert-danger" role="alert">
                    '.$_SESSION["thatbai"].'
</div>
                    ';
    unset($_SESSION['thatbai']);
}
?>
            
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm sản phẩm</h3>
                    
				</div>
            
			</div>
            <!-- END OVERVIEW -->
            
            <div class="row">
                <div class="col-md-6">
                <form action="http://localhost:8080/web_mvc/Admin/ThemSanPham" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label >Tên sản phẩm</label>
                    <input type="text" class="form-control" name="txtTenSanPham" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label >Nhóm sản phẩm</label>
                    <select class="form-control"name="slLoaiSanPham">
                    <?php
while ($row_danhmuc = mysqli_fetch_array($data["danhmuc"])) {
?>
                        <option  name="vlLoaiSanPham" value="<?php echo $row_danhmuc['MANHOM']; ?>"><?php echo $row_danhmuc['TENNHOM']; ?></option>
                    
                            <?php
} ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Thương hiệu</label>
                    <select class="form-control"name="slThuongHieu">
                    <?php
while ($row_thuonghieu = mysqli_fetch_array($data["thuonghieu"])) {
?>
                        <option  name="vlThuongHieu" value="<?php echo $row_thuonghieu['ma_thuong_hieu']; ?>"><?php echo $row_thuonghieu['ten_thuong_hieu']; ?></option>
                    
                            <?php
} ?>
                    </select>
                </div>
                <div class="form-group">
                    
                    <label >Giá sản phẩm</label>
                    <input type="text" class="form-control" name="txtGiaSanPham"  aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                    <label >Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="txtSoLuongSanPham" aria-describedby="emailHelp" placeholder="Nhập số lượng sản phẩm">
                </div>    
                <div class="form-group">
                    <label >Chọn hình để tải lên</label>
                    <input type="file" class="form-control-file" name="txtHinhSanPham">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnThemSanPham">Thêm mới sản phẩm</button>
                </div>
                </form>
                </div>
            </div>
            
		</div>
    </div>
    
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script
	src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>