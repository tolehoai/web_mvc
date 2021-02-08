<!-- ===========================================END MAIN=================================== -->


<!-- ============================================================= FOOTER ============================================================= -->


<div class="chitiet container-fluid">
    <div class="ajax"></div>
    <!-- Cot phai  -->
    <div class='row single-product'>
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar pt-3">


            <!-- ================================== TOP NAVIGATION : END ================================== -->

            <!-- ============================================== Sản phẩm mới ============================================== -->
            <div class="sidebar-widget hot-deals outer-bottom-xs" id="sanphammoi">
                <h3 class="section-title">Sản phẩm mới</h3>


                <!-- slider san pham moi  -->

                <div class="swiper-container w-100 h-auto">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
							while($row_sanpham_new = mysqli_fetch_array($data["sanphammoi"])){
                                $sanphamnew_ten=$row_sanpham_new['TENHH'];
                                $sanphamnew_hinh=$row_sanpham_new['HINH'];
                                $sanphamnew_gia=$row_sanpham_new['GIA'];
                                $sanphamnew_gia=number_format($sanphamnew_gia, 0, '', ',');
                                
                                echo '
                                <a href="'.URL.'SanPham/ChiTietSanPham/' . $row_sanpham_new['nhomhanghoa_slug'] . '/' . $row_sanpham_new['MSHS'] . '">
                                <div class="swiper-slide">
                                <img src="../../../uploads/'.$sanphamnew_hinh.'"
                                    class="img-fluid" alt="Responsive image">
                                <div class="product-info text-left m-t-20 new-product-info">
                                    <h3 class="name"><a href="'.URL.'SanPham/ChiTietSanPham/' . $row_sanpham_new['nhomhanghoa_slug'] . '/' . $row_sanpham_new['MSHS'] . '">'.$sanphamnew_ten.'</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price item1"> <span class="price"> '.$sanphamnew_gia.' đ </span> <span
                                            class="price-before-discount"></span> </div>
                                    <!-- /.product-price item1 -->
                                    <div class="cart clearfix animate-effect item">
                                        <div class="action">
                                            <div class="add-cart-button btn-group p-3">
                                                
                                            </div>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                </div>
                                </div>
                                </a>
                                ';
                            };
						
                        ?>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>






                <!-- /.product-info -->


                <!-- /.cart -->
            </div>

        </div>
        <!-- Cot phai  -->































































        <?php   $row_sanpham = mysqli_fetch_array($data["sanpham"]) ?>
        <!-- Cot trai  -->

        <div class='col-xs-12 col-sm-12 col-md-9 rht-col pt-3'>
            <div class="detail-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="duongdan">
                            <ul class="duongdan-list">
                                <li class="duongdan-list-item">
                                    <?php echo $row_sanpham['TENNHOM'];  ?>
                                </li>
                                <span> / </span>
                                <li class="duongdan-list-item">
                                    <?php echo $row_sanpham['hanghoathuocnhom'];  ?>
                                </li>
                                <span> / </span>
                                <li class="duongdan-list-item">
                                    <?php echo $row_sanpham['TENHH'];  ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 ">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <!-- image  -->
                            <img src="../../../uploads/<?php echo $row_sanpham['HINH'];  ?>" class="img-fluid"
                                alt="Responsive image">



                        </div>
                    </div>
                    <div class='col-sm-12 col-md-7 col-lg-7 product-info-block'>
                        <div class="product-info">
                            <h1 class="name"><?php echo $row_sanpham['TENHH'];  ?></h1>



                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="label">Trạng thái :</span>
                                            </div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="value"><?php 
                                                    if($row_sanpham['SOLUONGHANG']==0){
                                                        echo "Hết hàng";
                                                    }
                                                    else{
                                                        echo "Còn hàng";
                                                    }
                                                    ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.stock-container -->

                            <div class="description-container m-t-20">
                                <p><?php echo $row_sanpham['MOTA_NGAN'] ?>
                                </p>

                            </div><!-- /.description-container -->

                            <div class="price-container info-container m-t-30">
                                <div class="row">


                                    <div class="col-sm-6 col-xs-6">
                                        <div class="price-box">
                                            <span
                                                class="price"><?php echo number_format($row_sanpham['GIA'], 0, '', ',')."đ";  ?>
                                                ₫</span>
                                            <br>
                                            <span class="price-strike"><?php echo number_format($row_sanpham['GIA']*1.2, 0, '', ',')."đ";  ?>
                                                ₫</span>
                                        </div>
                                    </div>



                                </div><!-- /.row -->
                            </div><!-- /.price-container -->

                            <div class="quantity-container info-container">
                                <div class="row">


                                    <?php if($row_sanpham['SOLUONGHANG']>0){ ?>
                                    <div class="add-btn">
                                        <button class="btn btn-primary icon addCart"
                                            product_id="<?php echo $row_sanpham['MSHS'] ?>" data-toggle="dropdown"
                                            type="button" name="addCart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng </button>
                                    </div>
                                    


                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->






                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div>

            <div class="product-tabs ">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="section-title">Chi tiết</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">





                        <p class="text chitiet">
                            <?php echo $row_sanpham['MOTAHH'];  ?>


                        </p>





                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->
        <?php   } ?>
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->

        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

    </div><!-- /.col -->
    <!-- cot trai  -->
    <div class="clearfix"></div>
</div><!-- /.row -->
</div>