
    <!-- ===========================================END MAIN=================================== -->


    <!-- ============================================================= FOOTER ============================================================= -->


    <div class="chitiet container-fluid">

        <!-- Cot phai  -->
        <div class='row single-product'>
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar pt-3">


                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== Sản phẩm mới ============================================== -->
                <div class="sidebar-widget hot-deals outer-bottom-xs" id="sanphammoi">
                    <h3 class="section-title">Sản phẩm mới</h3>


                    <!-- slider san pham moi  -->

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://shopvnb.com/uploads/gallery/Mizuno%20Dynablitz%20-%20Den%20xanh.png"
                                    class="img-fluid" alt="Responsive image">
                                <div class="product-info text-left m-t-20 new-product-info">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price item1"> <span class="price"> $600.00 </span> <span
                                            class="price-before-discount">$800.00</span> </div>
                                    <!-- /.product-price item1 -->
                                    <div class="cart clearfix animate-effect item">
                                        <div class="action">
                                            <div class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Mua
                                                    hàng</button>
                                            </div>
                                        </div>
                                        <!-- /.action -->
                                    </div>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://shopvnb.com/uploads/gallery/Mizuno%20Dynablitz%20-%20Den%20xanh.png"
                                    class="img-fluid" alt="Responsive image">
                                <div class="product-info text-left m-t-20 new-product-info">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price item1"> <span class="price"> $600.00 </span> <span
                                            class="price-before-discount">$800.00</span> </div>
                                    <!-- /.product-price item1 -->
                                    <div class="cart clearfix animate-effect item">
                                        <div class="action">
                                            <div class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Mua
                                                    hàng</button>
                                            </div>
                                        </div>
                                        <!-- /.action -->
                                    </div>

                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="https://shopvnb.com/uploads/gallery/Mizuno%20Dynablitz%20-%20Den%20xanh.png"
                                    class="img-fluid" alt="Responsive image">
                                <div class="product-info text-left m-t-20 new-product-info">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price item1"> <span class="price"> $600.00 </span> <span
                                            class="price-before-discount">$800.00</span> </div>
                                    <!-- /.product-price item1 -->
                                    <div class="cart clearfix animate-effect item">
                                        <div class="action">
                                            <div class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Mua
                                                    hàng</button>
                                            </div>
                                        </div>
                                        <!-- /.action -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev1-icon" aria-hidden="true"><svg width="1em" height="1em"
                                    viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next1-icon" aria-hidden="true"><svg width="1em" height="1em"
                                    viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <!-- /.product-info -->


                    <!-- /.cart -->
                </div>

            </div>
            <!-- Cot phai  -->































































<?php   while($row_sanpham = mysqli_fetch_array($data["sanpham"])){ ?>
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
                                <img src="../../../uploads/<?php echo $row_sanpham['HINH'];  ?>"
                                    class="img-fluid" alt="Responsive image">



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
                                                    <span class="value">Còn hàng</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    <p>Một trong những sản phẩm đáng chờ nhất trong năm 2020 của Yonex đó là siêu phẩm
                                        tiếp theo của Astrox Series - Astrox 100 với 2 phiên bản Astrox 100 ZZ và Astrox
                                        100 ZX. Những hình ảnh ban đầu của Astrox 100 ZZ còn khá ít và được nhà sản xuất
                                        "thả xích" từ từ gây nhiều thu hút đến người hâm mô cầu lông trên toàn thế giới.
                                    </p>

                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-30">
                                    <div class="row">


                                        <div class="col-sm-6 col-xs-6">
                                            <div class="price-box">
                                                <span class="price"><?php echo $row_sanpham['GIA'];  ?> ₫</span>
                                                <span class="price-strike">4.428.000 ₫</span>
                                            </div>
                                        </div>



                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="qty">
                                            <span class="label">Số lượng :</span>
                                        </div>

                                        <div class="qty-count">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient" id="tangsoluong"><span
                                                                class="ir"><i class="icon fa fa-sort-asc"></i></span>
                                                        </div>
                                                        <div class="arrow minus gradient" id="giamsoluong"><span
                                                                class="ir"><i class="icon fa fa-sort-desc"></i></span>
                                                        </div>
                                                    </div>
                                                    <input type="text" value="1" name="soluong" id="soluong">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="add-btn">
                                            <a href="#" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> MUA HÀNG</a>
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
    
    