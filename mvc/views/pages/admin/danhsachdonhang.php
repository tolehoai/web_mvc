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
                                <th>Giá</th>
                                <th>Tình trạng đơn hàng</th>
                                <th colspan="4" class="text-center">Hành động</th>



                            </tr>
                        </thead>
                        <div class="giohang"></div>
                        <?php $i = 1; ?>
                        <?php
while ($row_donhang = mysqli_fetch_array($data["donhang"]))
{

?>

                        <tbody>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_donhang['ma_gio_hang'] ?></td>
                                <td><?php echo $row_donhang['TENHH']; ?></td>
                                <td><?php echo $row_donhang['so_luong']; ?></td>
                                <td><?php echo number_format($row_donhang['giohang_gia'] * $row_donhang['so_luong'], 0, '', ','); ?>
                                </td>
                                <td><?php echo $row_donhang['tinhtrang_donhang']; ?></td>
                                <?php
    if ($row_donhang['tinhtrang_donhang'] == "Chưa xữ lý")
    {
        echo '
										<td><button type="button" class="btn btn-warning chuaxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-light dangxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-light daxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đã xữ lý</button></td>
										<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
										';
    }
    if ($row_donhang['tinhtrang_donhang'] == "Đang xữ lý")
    {
        echo '
										<td><button type="button" class="btn btn-light chuaxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-info dangxuly btn-disabled" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-light daxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đã xữ lý</button></td>
										<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
										';
    }
    if ($row_donhang['tinhtrang_donhang'] == "Đã xữ lý")
    {
        echo '
										<td><button type="button" class="btn btn-ligh chuaxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Chưa xữ lý</button></td>
										<td><button type="button" class="btn btn-light dangxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đang xữ lý</button></td>
										<td><button type="button" class="btn btn-success daxuly" masanpham="' . $row_donhang['MSHS'] . '" magiohang="' . $row_donhang['ma_gio_hang'] . '">Đã xữ lý</button></td>
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
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination d-flex justify-content-center">
                            <li class="page-item"><a class="page-link"
                                    href="/web_mvc/Admin/DonHang/<?php echo $data["page_no"] - 1 ?>">Previous</a>
                            </li>
                            <?php
							$row_sl=mysqli_fetch_assoc($data["sl"]);
							$kq = $row_sl['sl'];
							$sotrang = ceil($kq / sosanpham_hienthi_admin);
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
                    <a class="page-link" href="/web_mvc/Admin/DonHang/'  . $counter . '">' . $counter . '
                    </a>
                </li>
                ';
        }
        else
        {
            echo '
                    <li class="page-item">
                    <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
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
                    <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
                    </a>
                </li>
           
           ';
            }
            else
            {
                echo '<li class="page-item">
           <a class="page-link" href="/web_mvc/Admin/DonHang/ ' . $counter . '">' . $counter . '
           </a>
       </li>';
            }
        }
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/DonHang/ ' . $second_last . '">' . $second_last . '
        </a>
    </li>';
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/DonHang/ ' . $sotrang . '">' . $sotrang . '
        </a>
    </li>';
    }

    elseif ($data["page_no"] > 4 && $data["page_no"] < $sotrang - 4)
    {
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/DonHang/1">1
        </a>
    </li>';
        echo ' <li class="page-item "> <a class="page-link" href="/web_mvc/Admin/DonHang/2">2
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
           <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
           </a>
       </li>
  ';
            }
            else
            {
                echo ' <li class="page-item">
           <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
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
       <a class="page-link" href="/web_mvc/Admin/DonHang/' . $second_last . '">' . $second_last . '
       </a>
   </li>';
        echo '<li class="page-item">
       <a class="page-link" href="/web_mvc/Admin/DonHang/' . $sotrang . '">' . $sotrang . '
       </a>
   </li>';
    }

    else
    {
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/DonHang/1">1
        </a>
    </li>';
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/Admin/DonHang/2">2
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
           <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
           </a>
       </li>';
            }
            else
            {
                echo '<li class="page-item">
           <a class="page-link" href="/web_mvc/Admin/DonHang/' . $counter . '">' . $counter . '
           </a>
       </li>';
            }
        }
    }
}
?>

















                            <li class="page-item"><a class="page-link"
                                    href="/web_mvc/Admin/DonHang/<?php echo $data["page_no"] + 1 ?>">Next</a>
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
$(document).ready(function() {

    //Chua xu ly
    $(".chuaxuly").on("click", function() {

        var masanpham_update = $(this).attr("masanpham");
        var magiohang_update = $(this).attr("magiohang");
        console.log(masanpham_update);
        console.log(magiohang_update);
        $.post("/web_mvc/Ajax/Update_ChuaCapNhat", {
            masanpham: masanpham_update,
            magiohang: magiohang_update
        }, function(data) {
            $(".ajax").html(data);
            // alert(data);
        })

    });
    //Dang xu ly
    $(".dangxuly").on("click", function() {

        var masanpham_update = $(this).attr("masanpham");
        var magiohang_update = $(this).attr("magiohang");
        console.log(masanpham_update);
        console.log(magiohang_update);
        $.post("/web_mvc/Ajax/Update_DangCapNhat", {
            masanpham: masanpham_update,
            magiohang: magiohang_update
        }, function(data) {
            $(".ajax").html(data);
            // alert(data);
        })

    });

    //Da xu ly
    $(".daxuly").on("click", function() {

        var masanpham_update = $(this).attr("masanpham");
        var magiohang_update = $(this).attr("magiohang");
        console.log(masanpham_update);
        console.log(magiohang_update);
        $.post("/web_mvc/Ajax/Update_DaCapNhat", {
            masanpham: masanpham_update,
            magiohang: magiohang_update
        }, function(data) {
            $(".ajax").html(data);
            // alert(data);
        })

    });





});
</script>

<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js">
</script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>
