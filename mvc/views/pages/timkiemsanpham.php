<div class="container-fluid">

    <div class="ajax"></div>
    <div class="sanpham" style="background-color: white;">

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center p-5">Kết quả tìm kiếm
                </h3>


            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <label class="dropdown  p-2">

                    <div class="dd-button">
                        Sắp xếp
                    </div>

                    <input type="checkbox" class="dd-input" id="test">

                    <ul class="dd-menu">
                        <li id="tangdan_az">Sắp xếp theo A-Z</li>
                        <li id="tangdan_za">Sắp xếp theo Z-A</li>
                        <li id="giatangdan">Sắp xếp theo giá tăng dần</li>
                        <li id="giagiamdan">Sắp xếp theo giá giảm dần</li>
                       
                    </ul>

                </label>
            </div>
        </div> -->

        <div class="row">
            <?php 	while($row_sanpham = mysqli_fetch_array($data["sanpham_timkiem"])){ 
                if($row_sanpham['SOLUONGHANG']==0){
                    echo '<a href="/web_mvc/SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">
                    <div class="col-md-3 product">
                                        <div class="sanpham item1">
                                            <img src="/web_mvc/uploads/' . $row_sanpham['HINH'] . '"
                                                class="img-fluid" alt="Responsive image">
                                            <div class="product-info text-left m-t-20 new-product-info">
                                                <h6 class="name"><a href="./SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">' . $row_sanpham['TENHH'] . '</a></h6>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price item1">
                                                    <h5 class="price text-danger"> ' . number_format($row_sanpham['GIA'], 0, '', ',') . ' đ</h5>
                                                    <br>
                                                    <form action="">
                                                    <!-- ' . URL . 'GioHang/ThemVaoGioHang -->
                                                    <button class="btn btn-danger w-100" disabled  type="button"> 
                                                      
                                                     HẾT HÀNG </button>
                                                        <!-- <button class="btn btn-warning" type="button">Mua hàng</button> -->
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </a>
                    
                    ';}
                    else{
                        echo '<a href="/web_mvc/SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">
                <div class="col-md-3 product">
                                    <div class="sanpham item1">
                                        <img src="/web_mvc/uploads/' . $row_sanpham['HINH'] . '"
                                            class="img-fluid" alt="Responsive image">
                                        <div class="product-info text-left m-t-20 new-product-info">
                                            <h6 class="name"><a href="./SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">' . $row_sanpham['TENHH'] . '</a></h6>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price item1">
                                                <h5 class="price text-danger"> ' . number_format($row_sanpham['GIA'], 0, '', ',') . ' đ</h5>
                                                <br>
                                                <form action="">
                                                <!-- ' . URL . 'GioHang/ThemVaoGioHang -->
                                                <!-- <a href="' . URL . 'GioHang/ThemVaoGioHang/' . $row_sanpham['MSHS'] . '"> -->
                                                    
                                                    <button class="btn btn-primary icon addCart" product_Id="'.$row_sanpham['MSHS'].'" data-toggle="dropdown"
                                                      type="button" name="addCart"> 
                                                        <i class="fa fa-shopping-cart"></i> 
                                                       Thêm vào giỏ hàng </button>
                                                      
                                                
                                                <!--</a>-->
                                                    <!-- <button class="btn btn-warning" type="button">Mua hàng</button> -->
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </a>
                
                ';
                    }
                
           
                
              } ?>
        </div>
       






        

    </div>


</div>