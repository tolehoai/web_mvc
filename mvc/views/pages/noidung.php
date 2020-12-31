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
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <!-- /thead -->
                                    <?php
							while($row_giohang = mysqli_fetch_array($data["giohang"])){
						
                        ?>

                                <?php if($row_giohang['show_in_cart']=="1"){ ?>
                                    <tbody>
                                        <!-- Start form  -->
                                        
                                            <tr>

                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="detail.html">
                                                        <img src="./uploads/<?php echo $row_giohang['HINH'];?>" alt="">
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

                                                    <div class="tangsoluong"><span class="ir"><i
                                                                class="icon fa fa-sort-asc"></i></span></div>
                                                    <div class="soluong">
                                                        <input type="number"
                                                            value="<?php echo $row_giohang['so_luong']; ?>"
                                                            class="form-control  w-50 soluonghanghoa "
                                                            mahanghoa="<?php echo $row_giohang['MSHS'] ?>" min="0"
                                                            max="100000" name="soluong[]"
                                                            id="soluong_<?php echo $row_giohang['MSHS'] ?>">
                                                    </div>

                                                    <div class="giamsoluong"><span class="ir"><i
                                                                class="icon fa fa-sort-desc"></i></span></div>




                                                </td>
                                                <td class="cart-product-sub-total"><span
                                                        class="cart-sub-total-price money">
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
                                                <input type="hidden" value="<?php echo $row_giohang['MSHS'];?>" name="masanpham[]">
                                                <td class="romove-item">

                                                    <button type="button" class="btn btn-danger"><a
                                                            href="GioHang/Xoa/<?php echo $row_giohang['MSHS'];?>"
                                                            title="Xóa" class="icon"><i style="color:white;"
                                                                class="fa fa-trash-o"></i></a></button>
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




                            <div class="row">

                                <div class="col-md-6 col-sm-12 estimate-ship-tax">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="estimate-title">Thông tin cá nhân</span>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input m-3"
                                                            placeholder="Họ và tên" name="txtHoTen">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input m-3"
                                                            placeholder="Địa chỉ" name="txtDiaChi">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input m-3"
                                                            placeholder="Số điện thoại" name="txtSDT">
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input m-3"
                                                            placeholder="Ghi chú" name="txtGhiChu">
                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- /tbody -->
                                    </table>
                                    <!-- /table -->
                                </div>
                                <!-- /.estimate-ship-tax -->

                                <div class="col-md-6 col-sm-12 ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>

                                                    <div class="cart-grand-total">
                                                        Tổng cộng<span class="inner-left-md tongcong">
                                                            <script>
                                                            var x = <?php 
                                         $row1 = mysqli_fetch_assoc($data["giohang1"]);
                                        echo $row1['tong'];
                                        
                                        ?>;
                                                            x = x.toLocaleString('it-IT', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            });
                                                            // $("#tongcong-"+mahanghoa).html(x);
                                                            document.write(x);
                                                            </script>

                                                        </span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <!-- /thead -->
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="cart-checkout-btn pull-right">
                                                        <a href="GioHang/ThanhToan"><button type="submit"
                                                                class="btn btn-primary checkout-btn">TIẾN HÀNH THANH
                                                                TOÁN</button></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- /tbody -->

                                    </table>
                                    <!-- /table -->

                                </div>
                                <!-- /.cart-shopping-total -->
                            </div>
                            <!-- /.shopping-cart -->
                        </div>
                        <!-- /.row -->

                        <!-- End Shoping Cart  -->

                    </div>
                </div>

            </div>
</form>