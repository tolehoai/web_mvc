<form action="GioHang/ThanhToan" method="POST" name="frmThanhToan">
    <div class="container-fluid">
        <div class="ajax"></div>
        <div class="body-content outer-top-xs">
            <div class="container-fluid">
                <div class="row ">
                    <div class="shopping-cart col-md-12">
                        <!--Start Shoping Form  -->

                        <div class="shopping-cart-table ">
                            <div class="table-responsive">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Tổng cộng</th>
                                            <th scope="col">Tình trạng đơn hàng</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <!-- /thead -->
                                    <?php
							while($row_giohang = mysqli_fetch_array($data["giohang"])){
                               
                        ?>
    <?php  if($row_giohang['tinhtrang_donhang']!=""){ ?>
                                    <tbody>
                                        <!-- Start form  -->

                                        <tr>

                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="/web_mvc/uploads/<?php echo $row_giohang['HINH'];?>" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'>
                                                    <a href="detail.html">
                                                        <?php echo $row_giohang['TENHH']; ?>
                                                    </a>
                                                </h4>


                                            </td>

                                            <td class="cart-product-quantity">

                                               
                                                <div class="soluong">
                                                    <span> <?php echo $row_giohang['so_luong']; ?></span>
                                                       
                                                </div>

                                              




                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price money">
                                                    <script>
                                                    var x = <?php echo $row_giohang['giohang_gia']; ?>;
                                                    x = x.toLocaleString('it-IT', {
                                                        style: 'currency',
                                                        currency: 'VND'
                                                    });
                                                    document.write(x);
                                                    </script>


                                                </span></td>
                                            <td class="cart-product-grand-total"><span
                                                    class="cart-grand-total-price money"
                                                    id="tongcong-<?php echo $row_giohang['MSHS'];?>"
                                                    tongcong="<?php echo $row_giohang['giohang_gia']*$row_giohang['so_luong']; ?>">
                                                    <script>
                                                    var x =
                                                        <?php echo $row_giohang['giohang_gia']*$row_giohang['so_luong'] ?>;
                                                    x = x.toLocaleString('it-IT', {
                                                        style: 'currency',
                                                        currency: 'VND'
                                                    });
                                                    // $("#tongcong-"+mahanghoa).html(x);
                                                    document.write(x);
                                                    </script>


                                                </span>
                                            </td>
                                            <input type="hidden" value="<?php echo $row_giohang['MSHS'];?>"
                                                name="masanpham[]">
                                            
                                                
                                            <td><?php echo $row_giohang['tinhtrang_donhang'] ?></td>
                                            <td class="romove-item">
                                            <?php if($row_giohang['tinhtrang_donhang']=="Chưa xữ lý"){?>
                                            
                                            <button type="button" class="btn btn-danger xoaDonHang" masanpham="<?php echo $row_giohang['MSHS'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <?php } ?>
                                            </td>
                                        </tr>

                                        <!-- End form -->






                                    </tbody>
                                    <?php } ?>
                                    <!-- /tbody -->
                                    <?php
                            
                        }
                    ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <a href="/web_mvc/"
                                                            class="btn btn-upper btn-primary outer-left-xs">Tiếp tục
                                                            mua
                                                            sắp</a>
                                                        <button class="btn btn-primary float-right">Cập nhật giỏ
                                                            hàng</button>
                                                    </span>
                                                </div>
                                                <!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- /table -->

                            </div>




                            
                        </div>
                        <!-- /.row -->

                        <!-- End Shoping Cart  -->

                    </div>
                </div>

            </div>
</form>