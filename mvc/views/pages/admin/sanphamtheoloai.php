<!-- MAIN -->
<style>
	.product-img {
		width: 300px;
	}

	.modal1 {
		display: none;
		position: relative;
		left: -550px;
	}

	.xoa {
		background-color: #d9534f;
		border-color: #d43f3a;
		color: white;
	}
</style>
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
					<h3 class="panel-title">Sản phẩm</h3>
				</div>

			</div>
			<!-- END OVERVIEW -->

			<!--BANG DANH MUC -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Bảng Sản phẩm</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Hình</th>
								<th>Thương hiệu</th>
								<th>Giá sản phẩm</th>
								<th>Số lượng</th>
								<th>Hành động</th>


							</tr>
						</thead>
						<?php $i=1;?>
						<?php
							while($row_sanpham = mysqli_fetch_array($data["sanpham"])){
								
								
							
						?>

						<tbody>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row_sanpham['TENHH']; ;?></td>

								<td>
									<img class="product-img"
										src="../../../../../web_mvc/uploads/<?php echo $row_sanpham['HINH'] ?>"
										alt="hinh anh">
								</td>
								<td>
									<?php echo $row_sanpham['ten_thuong_hieu'] ;?>
								</td>
								<td>
									<?php echo number_format($row_sanpham['GIA'], 0, '', ',') ."đ" ;?>
								</td>
								<td>
									<?php echo $row_sanpham['SOLUONGHANG'] ;?>
								</td>
								<td>
									<a href="<?php echo URL;?>Admin/SuaSanPham/<?php echo $row_sanpham["MSHS"]?>"><button
											type="button" class="btn btn-primary w-100">Sửa</button></a>




								</td>
								<td>
									<button class="sub1 btn btn-danger xoa">Xóa</button>
									<div class="modal1">
										<form
											action="<?php echo URL;?>Admin/XoaSanPham/<?php echo $row_sanpham['MSHS']?>"
											method="POST" name="frmXoa" id="frmXoa">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Xác nhận xóa sản phẩm</h4>

														</button>
													</div>

													<div class="modal-body">
														<p>Bạn có xác nhận xóa sản phẩm
															<strong><?php echo $row_sanpham['TENHH']?></strong></p>
													</div>
													<div class="modal-footer">
														<a
															href="/web_mvc/Admin/SanPham/<?php echo $data["a"]?>"><button
																type="button" class="btn btn-primary">Hủy bỏ</button></a>
														<a
															href="<?php echo URL;?>Admin/XoaSanPham/<?php echo $row_sanpham['MSHS']?>"><button
																type="submit" name="btnXoaSanPham"
																class="btn btn-danger">Xác nhận xóa</button></a>
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
					<nav aria-label="Page navigation example ">
                        <ul class="pagination d-flex justify-content-center">
                            <li class="page-item"><a class="page-link"
                                    href="/web_mvc/Admin/SanPham/<?php echo $data["loai"] ?>/<?php echo $data["page_no"] - 1 ?>">Previous</a>
                            </li>
                            <?php
							$row_sl=mysqli_fetch_assoc($data["sl"]);
							$kq = $row_sl['sl'];
							$sotrang = ceil($kq / 5);
							$second_last = $sotrang - 1;
							$i = 0;
							$adjacents = "2";
							?>



                            <?php
if ($sotrang <= 10)
{
    for ($counter = 1;$counter <= $sotrang;$counter++)
    {
        if ($counter == $data["page_no"])
        {
            echo '
                <li class="page-item active">
                    <a class="page-link" href="/web_mvc/Admin/SanPham/'  .$data["loai"].'/'.$counter . '">' . $counter . '
                    </a>
                </li>
                ';
        }
        else
        {
            echo '
                    <li class="page-item">
                    <a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'. $counter . '">' . $counter . '
                    </a>
                </li>
                    ';
        }
    }
}
elseif ($sotrang > 10)
{

    if ($data["page_no"] <= 4)
    {
        for ($counter = 1;$counter < 8;$counter++)
        {
            if ($counter == $data["page_no"])
            {
                echo '
           <li class="page-item active">
                    <a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $counter . '">' . $counter . '
                    </a>
                </li>
           
           ';
            }
            else
            {
                echo '<li class="page-item">
           <a class="page-link" href="/web_mvc/Admin/SanPham/ ' . $data["loai"].'/'.  $counter . '">' . $counter . '
           </a>
       </li>';
            }
        }
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';
        echo '<li class="page-item">
		<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $second_last . '">' . $second_last . '
		</a>
    </li>';
        echo '<li class="page-item">
		<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $sotrang . '">' . $sotrang . '
		</a>
    </li>';
    }

    elseif ($data["page_no"] > 4 && $data["page_no"] < $sotrang - 4)
    {
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/SanPham/1">1
        </a>
    </li>';
        echo ' <li class="page-item "> <a class="page-link" href="/web_mvc/Admin/SanPham/2">2
        </a>';
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';
        for ($counter = $data["page_no"] - $adjacents;$counter <= $data["page_no"] + $adjacents;$counter++)
        {
            if ($counter == $data["page_no"])
            {
                echo ' <li class="page-item active">
				<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $counter . '">' . $counter . '
				</a>
       </li>
  ';
            }
            else
            {
                echo ' <li class="page-item">
				<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $counter . '">' . $counter . '
				</a>
       </li>
  ';
            }
        }
        echo '<li class="page-item">
       <a class="page-link"">...
       </a>
   </li>';
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $second_last . '">' . $second_last . '
                    </a>
   </li>';
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $sotrang . '">' . $sotrang . '
                    </a>
   </li>';
    }

    else
    {
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/SanPham/'.$data["loai"].'/1">1
        </a>
    </li>';
        echo '<li class="page-item">
		<a class="page-link" href="/web_mvc/Admin/SanPham/'.$data["loai"].'/2">2
        </a>
    </li>';
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';

        for ($counter = $sotrang - 6;$counter <= $sotrang;$counter++)
        {
            if ($counter == $data["page_no"])
            {
                echo '<li class="page-item active">
				<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $counter . '">' . $counter . '
				</a>
       </li>';
            }
            else
            {
                echo '<li class="page-item">
				<a class="page-link" href="/web_mvc/Admin/SanPham/' . $data["loai"].'/'.  $counter . '">' . $counter . '
				</a>
       </li>';
            }
        }
    }
}
?>

















                            <li class="page-item"><a class="page-link"
                                    href="/web_mvc/Admin/SanPham/<?php echo $data["loai"] ?>/<?php echo $data["page_no"] + 1 ?>">Next</a>
                            </li>

                        </ul>
                        <div style='padding: 10px 20px 0px;' class="d-flex justify-content-center">
                            <strong>Trang <?php echo $data["page_no"] . " của " . $sotrang; ?></strong>
                        </div>

                    </nav>
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