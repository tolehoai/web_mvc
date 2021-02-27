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
            <form class="register-form outer-top-xs" role="form" id="frmDangNhap" name="frmDangNhap" method="POST"
                action="<?php echo URL;?>TaiKhoan/DangNhap">
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Tên người dùng <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangNhapUsername"
                        name="txtDangNhapUsername">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangNhapPass"
                        name="txtDangNhapPass">
                </div>

                <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="btnDangNhap">Đăng
                    nhập</button>
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




            <form class="register-form outer-top-xs" role="form" id="frmDangKy" name="frmDangKy" method="POST"
                action="<?php echo URL;?>TaiKhoan/DangKy">
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Tên người dùng <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyUsername"
                        name="txtDangKyUsername">
                </div>
                <div id="txtDangKyUsernameErr"></div>
               
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangkyPass"
                        name="txtDangKyPass">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Nhập lại mật khẩu <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" id="txtDangKyRePass"
                        name="txtDangKyRePass">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail2">Họ và tên <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyFullname"
                        name="txtDangKyFullname">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Địa chỉ <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKyDiaChi"
                        name="txtDangKyDiaChi">
                </div>
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Số điện thoại <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="txtDangKySDT"
                        name="txtDangKySDT">
                </div>


                <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="btnDangKy">Đăng
                    ký</button>
            </form>
           

        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
          // Validation Form Đăng nhập 
            $("#frmDangNhap").validate({
                rules: {
                    txtDangNhapUsername: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,

                    },
                    txtDangNhapPass: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    txtDangNhapUsername: {
                        required: "Vui lòng nhập tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
                        maxlength: "Tên đăng nhập không được vượt quá 50 ký tự"
                    },
                    txtDangNhapPass: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 3 ký tự",
                        maxlength: "Mật khẩu không được vượt quá 255 ký tự"
                    },
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Thêm class `invalid-feedback` cho field đang có lỗi
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                success: function(label, element) {},
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });



            // Validation Form Đăng ký 
              $("#frmDangKy").validate({
                rules: {
                  txtDangKyUsername: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,

                    },
                    txtDangkyPass: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    txtDangKyRePass: {
                        required: true,
                        // minlength: 3,
                        // maxlength: 255,
                        equalTo : '#txtDangkyPass'
                    },
                    txtDangKyFullname: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    txtDangKyDiaChi: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    txtDangKySDT: {
                        required: true,
                        minlength: 10,
                        maxlength: 15
                    },
                },
                messages: {
                  txtDangKyUsername: {
                        required: "Vui lòng nhập tên đăng ký",
                        minlength: "Tên đăng ký phải có ít nhất 3 ký tự",
                        maxlength: "Tên đăng ký không được vượt quá 50 ký tự"
                    },
                    txtDangkyPass: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 3 ký tự",
                        maxlength: "Mật khẩu không được vượt quá 255 ký tự"
                    },
                    txtDangkyRePass: {
                        required: "Vui lòng nhập lại mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 3 ký tự",
                        maxlength: "Mật khẩu không được vượt quá 255 ký tự",
                        equalTo: "Mật khẩu không khóp",
                    },
                    txtDangKyFullname: {
                        required: "Vui lòng nhập Họ tên",
                        minlength: "Họ tên phải có ít nhất 3 ký tự",
                        maxlength: "Họ tên không được vượt quá 255 ký tự"
                    },
                    txtDangKyDiaChi: {
                        required: "Vui lòng nhập Địa chỉ",
                        minlength: "Địa chỉ phải có ít nhất 3 ký tự",
                        maxlength: "Địa chỉ không được vượt quá 255 ký tự"
                    },
                    txtDangKySDT: {
                        required: "Vui lòng nhập Số điện thoại",
                        minlength: "Số điện thoại phải có ít nhất 10 ký tự",
                        maxlength: "Số điện thoại không được vượt quá 15 ký tự"
                    },
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Thêm class `invalid-feedback` cho field đang có lỗi
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                success: function(label, element) {},
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
            
            
        });

        // Xữ lý Ajax trùng tên đăng nhập
        $("#txtDangKyUsername").keyup(function(){
          var un= $(this).val();
          // console.log(un);
          $.post("<?php echo URL;?>/Ajax/CheckEmail", {
                un_post: un,
               
            }, function(data) {
                $("#txtDangKyUsernameErr").html(data);
                // alert(data);
            })
          
        })
        </script>