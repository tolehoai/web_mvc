<script type="text/javascript">

    $(document).ready(function () {
      $(".sub1").on("click", function () {
        // var el =$(this).siblings().hide(500);
        $(this).siblings().toggle(300);
      });
     
    });

  </script>

<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav" id="nav1">
						<li><a href="./Admin" class="active"><i class="lnr lnr-home"></i> <span>Trang quản trị</span></a></li>
					    
                        
                        <li>
							<ul class="category-sub1">
								<!-- dùng php để thay thế sub1 và sub2 thành id-1 và id-2 để toggle  -->
								<li class="categogy-sub1-item">
								<a class="sub1" id="sub1"><span class="fa fa-paper-plane-o"></span>Quản lý danh mục</a>
									<ul class="category-sub-2 " id="sub1-1">
										<li class="category-sub2-item"> <a href="/web_mvc/Admin/Danhmuc">Danh sách danh mục</a></li>
										<li class="category-sub2-item"> <a href="<?php echo URL;?>Admin/AddDanhMuc">Thêm danh mục</a></li>
									</ul>
								</li>
								<li class="categogy-sub1-item">
								<a class="sub1" id="sub1"><span class="fa fa-paper-plane-o"></span>Quản lý sản phẩm</a>
									<ul class="category-sub-2 " id="sub1-1">
										<li class="category-sub2-item"> <a href="<?php echo URL;?>Admin/SanPham/TatCa"> Danh sách sản phẩm</a></li>
										<li class="category-sub2-item"> <a href="<?php echo URL ?>Admin/ThemSanPham"> Thêm sản phẩm</a></li>
										
									</ul>
								</li>
								<li class="categogy-sub1-item">
								<a class="sub1" id="sub1"><span class="fa fa-paper-plane-o"></span>Quản lý thương hiệu</a>
									<ul class="category-sub-2 " id="sub1-1">
									<li class="category-sub2-item"> <a href="<?php echo URL;?>Admin/Thuonghieu"> Danh sách thương hiệu</a></li>
										<li class="category-sub2-item"> <a href="<?php echo URL ?>Admin/ThemThuongHieu"> Thêm thương hiệu</a></li>
									</ul>
								</li>
								<li class="categogy-sub1-item">
								<a class="sub1" id="sub1"><span class="fa fa-paper-plane-o"></span>Vợt cầu lông</a>
									<ul class="category-sub-2 " id="sub1-1">
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Yonex</a></li>
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Lining</a></li>
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Victor</a></li>
									</ul>
								</li>
								<li class="categogy-sub1-item">
								<a class="sub1" id="sub1"><span class="fa fa-paper-plane-o"></span>Vợt cầu lông</a>
									<ul class="category-sub-2 " id="sub1-1">
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Yonex</a></li>
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Lining</a></li>
										<li class="category-sub2-item"> <a href=""> Vợt cầu lông Victor</a></li>
									</ul>
								</li>
							</ul>
                        </li>
                        </ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->