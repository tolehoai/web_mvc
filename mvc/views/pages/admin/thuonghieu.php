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
					<h3 class="panel-title">Thương hiệu</h3>
					<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
				</div>

			</div>
			<!-- END OVERVIEW -->

			<!--BANG DANH MUC -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Bảng Thương hiệu</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên thương hiệu</th>
								<th colspan="2" style="text-align:center;">Hành động</th>

							</tr>
						</thead>
						<?php $i=1;?>
						<?php
							while($row_thuonghieu = mysqli_fetch_array($data["thuonghieu"])){
								
								
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row_thuonghieu['ten_thuong_hieu']; ;?></td>
								<td>
									<a href="<?php echo URL;?>Admin/SuaThuongHieu/<?php echo $row_thuonghieu["ma_thuong_hieu"]?>"><button
											type="button" class="btn btn-primary w-100">Sửa</button></a>
											
									


								</td>
								<td>
								<button class="sub1 btn btn-danger xoa">Xóa</button>
								
									<div class="modal1">
									<form action="<?php echo URL;?>Admin/XoaThuongHieu/<?php echo $row_thuonghieu['ma_thuong_hieu']?>" method="POST" name="frmXoa" id="frmXoa">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Xác nhận xóa thương hiệu</h4>
													
													</button>
												</div>
												
													<div class="modal-body">
														<p>Bạn có xác nhận xóa thương hiệu <strong><?php echo $row_thuonghieu['ten_thuong_hieu']?></strong></p>
													</div>
													<div class="modal-footer">
													<a href="/web_mvc/Admin/Thuonghieu"><button type="button" class="btn btn-primary">Thôi không xóa nữa</button></a>
													<a href="<?php echo URL;?>Admin/XoaThuongHieu/<?php echo $row_thuonghieu['ma_thuong_hieu']?>"><button type="submit" name="btnXoaThuongHieu" class="btn btn-danger">Xóa luôn đi</button></a>
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