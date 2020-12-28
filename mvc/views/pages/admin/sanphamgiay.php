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
                  Thêm danh mục thành công
                  </div>
                    ';
                    session_destroy ();
                }
                if(isset($_SESSION["thatbai"])){
                    echo'
                    <div class="alert alert-danger" role="alert">
  Thêm danh mục không thành công
</div>
                    ';
                    session_destroy ();
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
                <form action="http://localhost:8080/web_mvc/Admin/ThemSanPham" method="POST">
                <div class="form-group">
                    <label >Tên sản phẩm</label>
                    <input type="text" class="form-control" name="txtTenSanPham" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                    
                    <select class="form-control"name="slLoaiSanPham">
                    <?php
							while($row_danhmuc = mysqli_fetch_array($data["danhmuc"])){
								
								
							
						?>
                        <option  name="vlLoaiSanPham" value="<?php echo $row_danhmuc['MANHOM'];?>"><?php echo $row_danhmuc['TENNHOM'];?></option>
                    
                            <?php } ?>
                    </select>
                    
                    <label >Giá sản phẩm</label>
                    <input type="text" class="form-control" name="txtGiaSanPham"  aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm">
                    <label >Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="txtSoLuongSanPham" aria-describedby="emailHelp" placeholder="Nhập số lượng sản phẩm">
                    <label >Chọn hình để tải lên</label>
                    <input type="file" class="form-control-file" name="txtHinhSanPham">
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnThemSanPham">Thêm mới sản phẩm</button>
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
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script
	src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>