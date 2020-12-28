<!doctype html>
<html lang="en">

<head>
	<title>
	<?php
	if(isset($data["Title"])){
		echo $data["Title"];
	}
	else if(isset($data["TitleSP"])){
		$row = mysqli_fetch_assoc($data["TitleSP"]);
		echo $row['TENNHOM'];
	}
	else{
		echo "Trang quản trị";
	}
	?>
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo URL;?>mvc/views/pages/admin/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo URL;?>mvc/views/pages/admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL;?>mvc/views/pages/admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo URL;?>mvc/views/pages/admin/assets/img/favicon.png">
	<!--JQUERY-->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<style>
	body {
		overflow-x: hidden;
	}
	.logo{
		width:150px;
	}
	.brand{
		padding:5px 5px !important;
	}
	.category-sub-2{
		display:none;
		color:#AEB7C2;
	}
	.sub1{
		background-color:transparent;
		color:#AEB7C2;
		cursor: pointer;
	}
	.categogy-sub1-item{
		padding: 10px 0;
		color:white;
	}
	.category-sub-2 {
		padding:10px 30px;
	}
	.category-sub2-item{
		padding: 10px 5px;
		color:#AEB7C2;
	}
	.fa-paper-plane-o{
		padding:0 10px;
	}
	ul{
		list-style:none;
	}
	.modal1{
		display:none;
		position:relative;
		left:-200px;
	}
	.xoa{
		background-color: #d9534f;
    border-color: #d43f3a;
	color:white;
	}



</style>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?php echo URL?>Admin/TrangChu"><img src="<?php echo URL;?>mvc/views/pages/images/logo.PNG" alt="Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo URL;?>mvc/views/pages/admin/assets/img/user.jpg" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['AdminLogin']?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin</span></a></li>
								<li><a href="<?php echo URL;?>Admin/DangXuat"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->