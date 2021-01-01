<div class="container-fluid">
<div class="ajax"></div>
    <div class="sanpham" style="background-color: white;">

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"><?php 
                    echo $row['TENNHOM'];
                ?>
                </h3>

            </div>
        </div>
        <div class="row">
            <?php 	while($row_sanpham = mysqli_fetch_array($data["sanpham"])){ 
                if($row_sanpham['SOLUONGHANG']==0){
                    echo '<a href="./SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">
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
                        echo '<a href="./SanPham/ChiTietSanPham/' . $row_sanpham['nhomhanghoa_slug'] . '/' . $row_sanpham['MSHS'] . '">
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







        <nav aria-label="Page navigation example ">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item"><a class="page-link"
                        href="/web_mvc/SanPham/DanhMuc/<?php echo $data["loai"] ?>/<?php echo $data["page_no"]-1?>">Previous</a>
                </li>
                <?php 
        $row_sl=mysqli_fetch_assoc($data["sl"]);
        $kq = $row_sl['sl'];
        $sotrang= ceil( $kq/sosanpham_hienthi);
        $second_last=$sotrang-1;
        $i=0;
        $adjacents = "2";
        ?>



                <?php 
	if ($sotrang <= 10){  	 
		for ($counter = 1; $counter <= $sotrang; $counter++){
			if ($counter == $data["page_no"]) {
                echo '
                <li class="page-item active">
                    <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
                    </a>
                </li>
                ';
                }
                else{
                    echo '
                    <li class="page-item">
                    <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
                    </a>
                </li>
                    ';
				}
        }
	}
	elseif($sotrang > 10){
		
	if($data["page_no"] <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $data["page_no"]) {
           echo '
           <li class="page-item active">
                    <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
                    </a>
                </li>
           
           ';	
				}else{
           echo '<li class="page-item">
           <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
           </a>
       </li>';
				}
        }
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';
		echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$second_last.'">'.$second_last.'
        </a>
    </li>';
		echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$sotrang.'">'.$sotrang.'
        </a>
    </li>';
		}

	 elseif($data["page_no"] > 4 && $data["page_no"] < $sotrang - 4) {		 
		echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/1">1
        </a>
    </li>';
		echo ' <li class="page-item "> <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/2">2
        </a>';
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';
        for ($counter = $data["page_no"] - $adjacents; $counter <= $data["page_no"] + $adjacents; $counter++) {			
           if ($counter == $data["page_no"]) {
		   echo ' <li class="page-item active">
           <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
           </a>
       </li>
  ';	
				}else{
           echo ' <li class="page-item">
           <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
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
       <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$second_last.'">'.$second_last.'
       </a>
   </li>';
	   echo '<li class="page-item">
       <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$sotrang.'">'.$sotrang.'
       </a>
   </li>';      
            }
		
		else {
        echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/1">1
        </a>
    </li>';
		echo '<li class="page-item">
        <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/2">2
        </a>
    </li>';
        echo '<li class="page-item">
        <a class="page-link"">...
        </a>
    </li>';

        for ($counter = $sotrang - 6; $counter <= $sotrang; $counter++) {
          if ($counter == $data["page_no"]) {
		   echo '<li class="page-item active">
           <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
           </a>
       </li>';	
				}else{
           echo '<li class="page-item">
           <a class="page-link" href="/web_mvc/SanPham/DanhMuc/'.$data["loai"].'/'.$counter.'">'.$counter.'
           </a>
       </li>';
				}                   
                }
            }
	}
?>

















                <li class="page-item"><a class="page-link"
                        href="/web_mvc/SanPham/DanhMuc/<?php echo $data["loai"] ?>/<?php echo $data["page_no"]+1?>">Next</a>
                </li>

            </ul>
            <div style='padding: 10px 20px 0px;' class="d-flex justify-content-center">
                <strong>Trang <?php echo $data["page_no"]." của ".$sotrang; ?></strong>
            </div>

        </nav>

    </div>


</div>