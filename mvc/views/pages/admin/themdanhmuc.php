<?php

?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    
	<div class="main-content">
        
		<div class="container-fluid">
            <!-- OVERVIEW -->
            <?php
                if(isset($_SESSION["thanhcong"])){
                    echo'
                    <div class="alert alert-success" role="alert">
                    '.$_SESSION["thanhcong"].'
                  </div>
                    ';
                    unset($_SESSION['thanhcong']);
                }
                if(isset($_SESSION["thatbai"])){
                    echo'
                    <div class="alert alert-danger" role="alert">
                    '.$_SESSION["thatbai"].'
</div>
                    ';
                    unset($_SESSION['thatbau']);
                }
            ?>
            
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm danh mục</h3>
                    
				</div>
            
			</div>
            <!-- END OVERVIEW -->
            
            <p class="panel-subtitle">Tên danh mục</p>
            <form action="<?php echo URL;?>Admin/AddDanhMuc" method="POST" name="frmThemDanhMuc" id="frmThemDanhMuc">
                <div class="form-group">
                        <input type="text" class="form-control" name="txtTenDanhMuc" id="txtTenDanhMuc" placeholder="Nhập tên danh mục cần thêm">
                        <button type="submit" name="btnThemDanhMuc" class="btn btn-primary">Thêm danh mục</button>
                    </div>
            </form>
            
		</div>
    </div>
    
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script
	src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>
<script>
        
        $(document).ready(function() {
            $("#frmThemDanhMuc").validate({
                rules: {
                    txtTenDanhMuc: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,

                    },
                    
                },
                messages: {
                    txtTenDanhMuc: {
                        required: "Vui lòng nhập tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
                        maxlength: "Tên đăng nhập không được vượt quá 50 ký tự"
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

            
          
        })


            
</script>
</body>

</html>