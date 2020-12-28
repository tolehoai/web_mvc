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
					<h3 class="panel-title">Danh mục</h3>
					<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
				</div>

			</div>
			<!-- END OVERVIEW -->

			<!--BANG DANH MUC -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Bảng danh mục</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên danh mục</th>
								<th colspan="2" style="text-align:center;">Hành động</th>

							</tr>
						</thead>
						<?php $i=1;?>
						<?php
							while($row_danhmuc = mysqli_fetch_array($data["danhmuc"])){
								
								$tenDanhMuc=$row_danhmuc['TENNHOM'];
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $tenDanhMuc ;?></td>
								<td>
									<a href="<?php echo URL;?>Admin/SuaDanhMuc/<?php echo $row_danhmuc["MANHOM"]?>"><button
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