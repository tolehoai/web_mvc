






    <div class="container">

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

</div>

        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li class="duong-dan"><a href="home.html">Home /</a></li>
                        <li class="active duong-dan">Login</li>
                    </ul>
                </div>
            </div>

           
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 sign-in">
                <h4 class="">Đăng nhập</h4>
                <?php
                 
              if(isset($_SESSION["DangNhapThatBai"])){
                  echo '
                  <div class="alert alert-danger" role="alert">
                    Đăng nhập tài khoản thất bại!
                  </div>

                  ';
                  unset($_SESSION['DangNhapThatBai']);
              }
          ?>
              
                <div class="social-sign-in outer-top-xs">
                 
                </div>
                <form class="register-form outer-top-xs" role="form" name="frmDangNhap" method="POST" action="<?php echo URL;?>TaiKhoan/DangNhap">
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Tên người dùng <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangNhapUsername" name="txtDangNhapUsername">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangNhapPass" name="txtDangNhapPass">
                  </div>
                 
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="btnDangNhap">Đăng nhập</button>
                </form>
              </div>
              <!-- Sign-in -->
    
              <!-- create a new account -->
              <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="checkout-subtitle">Đăng ký tài khoản</h4>
                <?php
                 if(isset($_SESSION["DangKyThanhCong"])){
                  echo '
                  <div class="alert alert-success" role="alert">
                    Đăng ký tài khoản thành công!
                  </div>
                  ';
                  unset($_SESSION['DangKyThanhCong']);
              }
              if(isset($_SESSION["DangKyThatBai"])){
                  echo '
                  <div class="alert alert-danger" role="alert">
                    Đăng ký tài khoản thất bại!
                  </div>

                  ';
                  unset($_SESSION['DangKyThatBai']);
              }
          ?>
           
                
              
                
                <form class="register-form outer-top-xs" role="form" name="frmDangKy" method="POST" action="<?php echo URL;?>TaiKhoan/DangKy">
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Tên người dùng <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyUsername" name="txtDangKyUsername">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangkyPass" name="txtDangKyPass">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Nhập lại mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangKyRePass" name="txtDangKyRePass">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Họ và tên <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyFullname" name="txtDangKyFullname">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Địa chỉ <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyDiaChi" name="txtDangKyDiaChi">
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Số điện thoại <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKySDT" name="txtDangKySDT">
                  </div>
                  
                 
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="btnDangKy">Đăng ký</button>
                </form>
    
    
              </div>    
        </div>
    </div>










