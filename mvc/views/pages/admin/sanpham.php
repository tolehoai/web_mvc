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
								<th>Hành động</th>
								<th>Hành động</th>

							</tr>
						</thead>
						<?php $i=1;?>
						<?php
							// while($row_danhmuc = mysqli_fetch_array($data["danhmuc"])){
								
							// 	$tenDanhMuc=$row_danhmuc['TENNHOM'];
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td>San pham</td>
								<td>
									abc
									


								</td>
								<td>
								abc
								</td>
							</tr>
						</tbody>
						<?php
						// $i++;
						// 	}
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