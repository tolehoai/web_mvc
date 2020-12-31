<div class="body-content outer-top-vs" id="top-banner-and-menu">
    <div class="container-fluid">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="category-list">
                        <ul class="category-sub1">
                            <!-- dùng php để thay thế sub1 và sub2 thành id-1 và id-2 để toggle  -->
                            <?php
                            while($row_sanpham = mysqli_fetch_array($data["sanpham"])){
                        
                            ?>
                            <li class="categogy-sub1-item">
                                <button type="button" class="btn btn-light w-100 sub1" class="sub1"
                                    loaisanpham="<?php echo $row_sanpham['nhomhanghoa_slug'];?>"><?php echo $row_sanpham['TENNHOM'];?></button>
                                <ul class="category-sub-2 " id="sub1-1">
                                    <div class="noidung-<?php echo $row_sanpham['nhomhanghoa_slug'] ?>">

                                    </div>
                                    <!-- <li class="category-sub2-item "></li> -->



                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <!-- ============================================== Sản phẩm mới ============================================== -->
               
                    <!-- slider san pham moi  -->
                    <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="https://shopvnb.com/uploads/gallery/Mizuno%20Dynablitz%20-%20Den%20xanh.png"
                              class="img-fluid" alt="Responsive image">
                            <div class="product-info text-left m-t-20 new-product-info">
                              <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price item1"> <span class="price"> $600.00 </span> <span
                                  class="price-before-discount">$800.00</span> </div>
                             
                              <div class="cart clearfix animate-effect item">
                                <div class="action">
                                  <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Mua hàng</button>
                                  </div>
                                </div>
                                
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
                             
                              <div class="cart clearfix animate-effect item">
                                <div class="action">
                                  <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Mua hàng</button>
                                  </div>
                                </div>
                               
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
                              
                              <div class="cart clearfix animate-effect item">
                                <div class="action">
                                  <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Mua hàng</button>
                                  </div>
                                </div>
                                
                              </div>
                        
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev1-icon" aria-hidden="true"><svg width="1em" height="1em"
                              viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                            </svg></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next1-icon" aria-hidden="true"><svg width="1em" height="1em"
                              viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg></span>
                          <span class="sr-only">Next</span>
                        </a>
                        </div> -->
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
                                <img src="../../../web_mvc/uploads/'.$sanphamnew_hinh.'"
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
                    <!-- /.product-info -->
                    <!-- /.cart -->
                
            </div>
            <!-- Cot phai  -->
            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div id="hero">
                    <!-- SLIDER -->
                    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100 img-fluid" src="https://shopvnb.com/uploads/slider/banner-1_1.jpg"
                              alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100 img-fluid" src="https://shopvnb.com/uploads/slider/shopvnb-banner-3_1.jpg"
                              alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100 img-fluid" src="https://shopvnb.com/uploads/slider/banner-2.jpg"
                              alt="Third slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100 img-fluid" src="https://shopvnb.com/uploads/slider/banner-3_1.jpg"
                              alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                        </div> -->
                    <!-- //SlIDER CUA swiper -->
                    <!-- Slider main container -->
                    <div class="swiper-container w-100 h-auto">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <img class="d-block w-100 img-fluid"
                                    src="https://shopvnb.com/uploads/slider/banner-1_1.jpg" alt="First slide">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block w-100 img-fluid"
                                    src="https://shopvnb.com/uploads/slider/shopvnb-banner-3_1.jpg" alt="Second slide">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block w-100 img-fluid"
                                    src="https://shopvnb.com/uploads/slider/banner-AX-UNISEX-1-2-3.jpg"
                                    alt="Third slide">
                            </div>
                            ...
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                    <!-- SLIDER END  -->
                </div>
                <!-- ========================================= SECTION – HERO : END ========================================= -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <?php 
                    // public function show($id){
                        
                    // }
                ?>
                <?php 
                while($row_danhmuc = mysqli_fetch_array($data["danhmuc"])){
                ?>
                <section class="section new-arriavls" madanhmuc="<?php echo $row_danhmuc['MANHOM'];?>"
                    tendanhmuc="<?php echo $row_danhmuc['nhomhanghoa_slug'];?>">

                    <h3 class="section-title"><?php echo $row_danhmuc['TENNHOM']?></h3>
                    <div class="row" id="san-pham-cua-danh-muc-<?php echo $row_danhmuc['MANHOM']; ?>">
                    </div>



                </section>
                <?php }?>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#top-banner-and-menu -->
</div>
<!-- /.sidebar-widget -->
</div>
<!-- ============================================== San pham moi: END ============================================== -->
</div>
<!-- /.sidemenu-holder --