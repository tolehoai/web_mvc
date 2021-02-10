<!-- MAIN -->
<div class="main">
    <div class="ajax"></div>
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
                    <h3 class="panel-title">Đơn hàng</h3>
                   
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
                                <th>Mã đơn hàng</th>
                                <th>Chưa xữ lý</th>
                                <th>Đang xữ lý</th>
                                <th>Đã xữ lý</th>
                                
                               
                               



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
                                <td>
                                <a href="/web_mvc/Admin/ChiTietDonHang/<?php echo $row_donhang['ma_don_hang'] ?>"><?php echo $row_donhang['ma_don_hang'] ?></a>
                                </td>
                                
                               
                                
                            <td>
                                <?php  
                            
                                echo  $row_donhang["chua_xu_ly"];
                                ?>
                            </td>
                            <td>
                                <?php  
                                
                                echo  $row_donhang["dang_xu_ly"];
                                ?>
                            </td>
                            <td>
                                <?php  
                                
                                echo  $row_donhang["da_xu_ly"];
                                ?>
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


<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js">
</script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL; ?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>