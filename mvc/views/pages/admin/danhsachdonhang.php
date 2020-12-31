<!-- MAIN -->
<div class="main">
<div class="ajax"></div>
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">

					<h3 class="panel-title">Đơn hàng</h3>
					<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
				</div>

			</div>
			<!-- END OVERVIEW -->

			<!--BANG DANH MUC -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách đơn hàng</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>STT
								
								</th>
								<th>Mã giỏ hàng</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th >Giá</th>
								<th>Tình trạng đơn hàng</th>
								<th colspan="4" class="text-center">Hành động</th>
								
								

							</tr>
						</thead>
						<div class="giohang"></div>
						<?php $i=1;?>
						<?php
							while($row_donhang = mysqli_fetch_array($data["donhang"])){
								
								
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row_donhang['ma_gio_hang']?></td>
								<td><?php echo $row_donhang['TENHH'] ;?></td>
								<td><?php echo $row_donhang['so_luong'] ;?></td>
								<td><?php echo number_format($row_donhang['giohang_gia']*$row_donhang['so_luong'], 0, '', ',')  ;?></td>
								<td><?php echo $row_donhang['tinhtrang_donhang'] ;?></td>
								<?php 
									if($row_donhang['tinhtrang_donhang']=="Chưa xữ lý"){
										echo '
										<td><button type="button" class="btn btn-warning chuaxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-light dangxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-light daxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đã xữ lý</button></td>
										<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
										';
									}
									if($row_donhang['tinhtrang_donhang']=="Đang xữ lý"){
										echo '
										<td><button type="button" class="btn btn-light chuaxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-info dangxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-light daxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đã xữ lý</button></td>
										<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
										';
									}
									if($row_donhang['tinhtrang_donhang']=="Đã xữ lý"){
										echo '
										<td><button type="button" class="btn btn-ligh chuaxulyt" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-light dangxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-success daxuly" masanpham="'.$row_donhang['MSHS'].'" magiohang="'.$row_donhang['ma_gio_hang'].'">Đã xữ lý</button></td>
										<td><button type="button" class="btn btn-danger "><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
										';
									}
								?>
								
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

$( document ).ready(function() {
	$(".chuaxuly").on("click", function () {
			
			var masanpham_update=$(this).attr("masanpham");
			var magiohang_update=$(this).attr("magiohang");
			console.log(masanpham_update);
			console.log(magiohang_update);
			$.post("/web_mvc/Ajax/Update_ChuaCapNhat", { masanpham: masanpham_update, magiohang: magiohang_update }, function (data) {
            $(".ajax").html(data);
            // alert(data);
          })

		});

		$(".donhang").ready(function () {
        
			$.post("/web_mvc/Ajax/Get_DonHang", , function (data) {
            $(".donhang").html(data);
            // alert(data);
          })
      })

});
	
	

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