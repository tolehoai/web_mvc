<style>
	.product-img{
		width:200px;
	}
</style>
<!-- MAIN -->
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
				<?php
                if(isset($_SESSION["thanhcong"])){
                    echo'
                    <div class="alert alert-success" role="alert">
                  Xóa danh mục thành công
                  </div>
                    ';
                    session_destroy ();
                }
                if(isset($_SESSION["thatbai"])){
                    echo'
                    <div class="alert alert-danger" role="alert">
  Xóa danh mục không thành công
</div>
                    ';
                    session_destroy ();
                }
            ?>
					<h3 class="panel-title">Sản phẩm</h3>
					<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
				</div>

			</div>
			<!-- END OVERVIEW -->

			<!--BANG DANH MUC -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Bảng sản phẩm</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Hình ảnh</th>
								<th colspan="2" style="text-align:center;">Hành động</th>

							</tr>
						</thead>
						<?php $i=1;?>
						<?php
							while($row_sanpham = mysqli_fetch_array($data["sanpham"])){
								
		
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row_sanpham['TENHH'] ;?></td>
								<td>
									
								<img src="<?php echo URL ?>uploads/<?php echo $row_sanpham['HINH']?>" class="img-fluid product-img" alt="Anh san pham">
								</td>
								<td>
									<a href="<?php echo URL;?>Admin/SuaSanPham/<?php echo $row_hanghoa["MSHS"]?>"><button
											type="button" class="btn btn-primary w-100">Sửa</button></a>
											
									


								</td>
								<td>
								<button class="sub1 btn btn-danger xoa">Xóa</button>
								
									<div class="modal1">
									<form action="<?php echo URL;?>Admin/XoaDanhMuc/<?php echo $row_danhmuc['MANHOM']?>" method="POST" name="frmXoa" id="frmXoa">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Xác nhận xóa danh mục</h4>
													
													</button>
												</div>
												
													<div class="modal-body">
														<p>Bạn có xác nhận xóa danh mục <strong><?php echo $row_danhmuc['TENNHOM']?></strong></p>
													</div>
													<div class="modal-footer">
													<a href="http://localhost:8080/web_mvc/Admin/Danhmuc"><button type="button" class="btn btn-primary">Thôi không xóa nữa</button></a>
													<a href="<?php echo URL;?>Admin/XoaDanhMuc/<?php echo $row_danhmuc['MANHOM']?>"><button type="submit" name="btnXoaDanhMuc" class="btn btn-danger">Xóa luôn đi</button></a>
													</div>
												
												
											</div>
										</div>
									</form>
									</div>
								</td>
							</tr>
						</tbody>
						<?php
						$i++;
							}
						?>
					</table>
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
<script>
	$(document).ready(function () {
      $(".sub1").on("click", function () {
        // var el =$(this).siblings().hide(500);
        $(this).siblings().toggle("fast");
		
}

);
	

</script>

<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script
	src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>