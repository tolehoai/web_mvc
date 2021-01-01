<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
        
    }
    .card1{
 
    }
    
    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }
    
    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
        
    }
    
    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }
    
    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }
    
    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }
    
    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }
    
    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 20px;
        display: block;
    }
    
    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
    
    .action {
        margin: 20px;
    }
</style>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Trang quản trị</h3>
                    <p class="panel-subtitle">Chào <b><?php echo $_SESSION['AdminLogin']?></b></p>

                </div>

            </div>
            <!-- END OVERVIEW -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Bảng sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 card1">
                            <!-- Truyền theo ID -->
                            <a href="/web_mvc/Admin/DanhMuc">
                                <div class="card-counter primary">
                                    <span class="count-numbers">Quản lý danh mục</span>

                                </div>
                            </a>

                        </div>

                        <div class="col-md-3 card1">
                            <!-- Truyền theo ID -->
                            <a href="/web_mvc/Admin/SanPham/TatCa">
                                <div class="card-counter danger">
                                    <span class="count-numbers">Quản lý sản phẩm</span>

                                </div>
                            </a>

                        </div>

                        <div class="col-md-3 card1">
                            <!-- Truyền theo ID -->
                            <a href="/web_mvc/Admin/ThuongHieu">
                                <div class="card-counter success">
                                    <span class="count-numbers">Quản lý thương hiệu</span>

                                </div>
                            </a>

                        </div>

                        <div class="col-md-3 card1">
                            <!-- Truyền theo ID -->
                            <a href="/web_mvc/Admin/DonHang/1">
                                <div class="card-counter info">
                                    <span class="count-numbers">Quản lý đơn hàng</span>

                                </div>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
    </div>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js">
</script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo URL;?>mvc/views/pages/admin/assets/scripts/klorofil-common.js"></script>

</body>

</html>