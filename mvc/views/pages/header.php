<?php header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">
  <link rel="stylesheet" href="public/style.css">
  <title>
    <?php 
 
  if(isset($data["SP_Title"])){
    $row = mysqli_fetch_assoc($data["SP_Title"]);
    echo $row['TENHH'];
  }
  else if(isset($data["Title"])){
    echo $data["Title"];
  }
  else{
    echo "Trang chủ";
  }
  
  ?>
  </title>

  <!-- Google Font  -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
    rel="stylesheet">
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->

  <script src="<?php echo URL;?>mvc/views/pages/assets/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="public/simple.money.format.js"></script>

  <script type="text/javascript">

    $(document).ready(function () {



      // $('.money').simpleMoneyFormat();
      $(".soluonghanghoa").keyup(function () {
        var soluong = $(this);
        var soluong_update = parseInt(soluong.val());
        var mahanghoa_update = soluong.attr("mahanghoa");
        // console.log("soluong_update)";
        // alert(mahanghoa_update);
        $.post("./Ajax/CapNhatSoLuong", { soluongcancapnhat: soluong_update, mahanghoa: mahanghoa_update }, 
        function (data) {
          $("#tongcong-"+mahanghoa_update).html(data);
          // alert(data);
        })
        $.post("./Ajax/CapNhatThanhTien", {}, function (data) {
          $(".tongcong").html(data);
          // alert(data);
        })
      })



      $(".tangsoluong").click(function () {

        var soluong = $(this).next().children();
        var mahanghoa_update = soluong.attr("mahanghoa");
        // console.log("#tongcong-"+mahanghoa_update);
        soluong.val(parseInt(soluong.val()) + 1);
        var soluong_update = parseInt(soluong.val());
        $.post("./Ajax/CapNhatSoLuong", { soluongcancapnhat: soluong_update, mahanghoa: mahanghoa_update }, function (data) {
          $("#tongcong-" + mahanghoa_update).html(data);
          // alert(data);
        })
        $.post("./Ajax/CapNhatThanhTien", {}, function (data) {
          $(".tongcong").html(data);
          // alert(data);
        })
      })
      $(".giamsoluong").click(function () {
        var soluong = $(this).prev().children();
        var mahanghoa_update = soluong.attr("mahanghoa");
        soluong.val(parseInt(soluong.val()) - 1);
        if (parseInt(soluong.val()) < 1) {
          soluong.val(1);
        }
        var soluong_update = parseInt(soluong.val());
        
        $.post("./Ajax/CapNhatSoLuong", { soluongcancapnhat: soluong_update, mahanghoa: mahanghoa_update }, function (data) {
          $("#tongcong-" + mahanghoa_update).html(data);
          // alert(data);
        })
        $.post("./Ajax/CapNhatThanhTien", {}, function (data) {
          $(".tongcong").html(data);
          // alert(data);
        })
      })

      //Update cart
//Hien thi so luong
// $.post("./Ajax/HienThiSoLuong", {}, function (data) {
//         $(".cart-number").html(data);
//         // alert(data);
//       })

//Hien thi gia
      // $.post("./Ajax/HienThiGia", {}, function (data) {
      //   $(".gia").html(data);
      //   // alert(data);
      // })



      // swal("Good job!", "You clicked the button!", "success");



      var loaisanpham = $(".sub1");
      // console.log(loaisanpham);

      $(".sub1").on("click", function () {
        var loaisanphamcanlay = $(this).attr('loaisanpham');

        // var str1=str1.concat(loaisanphamcanlay);
        var a = 'noidung-';
        var b = a.concat(loaisanphamcanlay);
        $.post("./Ajax/GetSubMenu", { loaisanpham: loaisanphamcanlay }, function (data) {
          $("." + b).html(data);
          // alert(data);
        })
      });


















      $(".new-arriavls").ready(function () {
        var danhmuc = $(".new-arriavls");
        var myVals = [];
        $(danhmuc).map(function () {
          myVals.push($(this).attr('madanhmuc'));
          var madanhmuc = $(this).attr('madanhmuc');
          var tendanhmuclayduoc = $(this).attr('tendanhmuc');
          var a = 'san-pham-cua-danh-muc-';
          var b = a.concat(madanhmuc);
          console.log(b);
          // Ajax
          $.post("./Ajax/LaySanPhamTheoDanhMuc", { danhmuc: madanhmuc, tendanhmuc: tendanhmuclayduoc }, function (data) {
            $("#" + b).html(data);
            // alert(data);
          })
          // Ajax
        });
        // console.log(myVals);

      })

      //Xu ly don hang
      $(".new-arriavls").ready(function () {
        // $(".addCart").click(function(){
        //   console.log("click");
        // })
        $(document).on("click", '.addCart', function (event) {
          //  console.log("click");
          var masanpham_get = $(this).attr('product_id');
          console.log(masanpham_get);
          $.post("./Ajax/ThemVaoGioHang", { masanpham: masanpham_get }, function (data) {
            $(".ajax").html(data);
            // alert(data);
          })
        });

      })


      //Click mở giỏ hàng
      $(".giohang").click(function () {
        $.post("./Ajax/DiVaoGioHang", {}, function (data) {
          $(".ajax").html(data);
          // alert(data);
        })
      })






      $(".sub1").on("click", function () {
        // var el =$(this).siblings().hide(500);
        $(this).siblings().toggle(300);
        // console.log(el);

      });
      // When the user scrolls the page, execute myFunction
      window.onscroll = function () { myFunction() };

      // Get the header
      var header = document.getElementById("sanphammoi");
      // console.log(header);
      // Get the offset position of the navbar
      var sticky = header.offsetTop;

      // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
      function myFunction() {
        if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      }




    });

  </script>

  <!-- Bootstrap Core CSS -->
  <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->

  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="<?php echo URL;?>mvc\views\pages\assets\css\bootstrap.css">
  <!-- Customizable CSS -->

  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/blue.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/owl.transitions.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/rateit.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="/web_mvc/public/style.css">
  
  <!-- Icons/Glyphs -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>mvc/views/pages/assets/css/font-awesome.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
    rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<!-- ===================================CSS============================================ -->

<style>
  .slider-img {
    width: 1200px;
  }

  .search-button {
    padding: 29px 25px 19px !important;
  }
  .gia{
   position: relative !important;
   right: 20px;
   font-weight: 600;
   color: white;
   font-size: 14px;
 }
 .cart-number {
  position: relative !important;
   right: 20px ;
   top: -15px;
 }
</style>




<!-- ===================================CSS============================================ -->



<body class="cnt-home">
  <div class="ajax"></div>
  <!-- ============================================== HEADER ============================================== -->
  <header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container-fluid-fluid">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <?php
              if(isset($_SESSION["userNameLogin"])){
                echo '<li><a href="">Chào <b>'.$_SESSION["userNameLogin"].'</b></a></li>
                      <li><a href="'.URL.'TaiKhoan/DangXuat">Đăng xuất</a></li>                      
                ';

              }
              else{
                echo '<li class="myaccount"><a href="'.URL.'TaiKhoan"><span>Đăng ký</span></a></li>

                <li class="header_cart hidden-xs"><a href="'.URL.'TaiKhoan"><span>Đăng nhập</span></a></li>';
              }
              ?>




            </ul>
          </div>
          <!-- /.cnt-account -->


          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
      </div>
      <!-- /.container-fluid-fluid -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header p-0">
      <div class="container-fluid-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="<?php echo URL?>" class="w-100"> <img
                  src="<?php echo URL;?>mvc/views/pages/images/logo.PNG" class="logo-img" alt="Logo"></a> </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->
          </div>
          <!-- /.logo-holder -->

          <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">

                  <input class="search-field" placeholder="Tìm kiếm sản phẩm" />
                  <a class="search-button" href="#"></a>
                </div>
              </form>
            </div>
            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->
          </div>
          <!-- /.top-search-holder -->
          
          


        </div>


        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
      </div>
      <!-- /.top-cart-row -->
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid-fluid -->

    </div>
    <!-- /.main-header -->


    <!-- ============================================== NAVBAR ============================================== -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white py-1 shadow-sm"> <a href="#"
        class="navbar-brand font-weight-bold d-block d-lg-none">MegaMenu</a> <button type="button"
        data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false"
        aria-label="Toggle navigation" class="navbar-toggler"> <span class="navbar-toggler-icon"></span> </button>
      <div id="navbarContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown" aria-haspopup="true"
             
            
              
            </div>
      </div>
      </li>
      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">Giới thiệu</a></li>
      <li class="nav-item"><a href="" class="nav-link font-weight-bold text-uppercase">TÌNH TRẠNG ĐƠN HÀNG</a></li>
      <li class="nav-item"><a href="/web_mvc/GioHang" class="nav-link font-weight-bold text-uppercase">Giỏ hàng</a></li>
      </ul>
      </div>
    </nav>

    </div>
    <!-- ============================================== NAVBAR : END ============================================== -->


  </header>