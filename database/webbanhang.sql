-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2020 lúc 11:56 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `MSHS` int(11) NOT NULL,
  `ma_gio_hang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`MSHS`, `ma_gio_hang`, `so_luong`, `gia`, `time`) VALUES
(22, 5, 2, 0, '2020-12-18 08:46:29'),
(26, 5, 3, 0, '2020-12-18 08:46:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SODONDH` char(5) NOT NULL,
  `MSKH` char(5) NOT NULL,
  `MSNV` char(5) NOT NULL,
  `NGAYDH` date DEFAULT NULL,
  `TRANGTHAI` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gio_hang`, `USERNAME`) VALUES
(4, '0'),
(5, 'abcd'),
(6, 'user10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `MSHS` int(5) NOT NULL,
  `MANHOM` char(5) NOT NULL,
  `MATHUONGHIEU` varchar(15) DEFAULT NULL,
  `TENHH` varchar(128) DEFAULT NULL,
  `GIA` int(2) DEFAULT NULL,
  `SOLUONGHANG` int(4) DEFAULT NULL,
  `HINH` varchar(128) DEFAULT NULL,
  `MOTAHH` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`MSHS`, `MANHOM`, `MATHUONGHIEU`, `TENHH`, `GIA`, `SOLUONGHANG`, `HINH`, `MOTAHH`) VALUES
(22, '193', '2', 'Vợt cầu lông Lining mới sửa 1', 2500000, 100, 'calculator.png', ''),
(26, '192', '2', 'Giày nè 1', 123456, 123456, 'despicable_me_2_laughing_minions-wallpaper-2880x1620.jpg', '<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: center;\'><span style=\"box-sizing: border-box; font-size: 20px;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">Gi&agrave;y cầu l&ocirc;ng Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ - Đậm chất phong c&aacute;ch thể thao</span></strong></span></p>\r\n<h2 style=\'box-sizing: border-box; font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.4; color: rgb(50, 60, 63); margin-top: 20px; margin-bottom: 10px; font-size: 2em; letter-spacing: 0.01em; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 20px;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">Giới thiệu gi&agrave;y cầu l&ocirc;ng Thunder Blade 2 Mid - Xanh trắng đỏ</span></strong></span></h2>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Gi&agrave;y cầu l&ocirc;ng Thunder Blade 2 Mid - Xanh trắng đỏ l&agrave; sản phẩm của thương hiệu dụng cụ thể thao h&agrave;ng đầu Nhật Bản Mizuno. Tuy thuộc ph&acirc;n kh&uacute;c tầm trung so với c&aacute;c sản phẩm thuộc h&agrave;ng cao cấp. Tuy&nbsp;đ&ocirc;i gi&agrave;y n&agrave;y c&oacute; phần &iacute;t t&iacute;nh năng hơn tuy nhi&ecirc;n vẫn thể hiện được sự đa năng của n&oacute;. Đặc biệt với trọng lượng kh&aacute; nhẹ, đ&acirc;y l&agrave; đ&ocirc;i gi&agrave;y ph&ugrave; hợp với nhiều người chơi, với người chuy&ecirc;n nghiệp việc sử dụng đ&ocirc;i gi&agrave;y &iacute;t t&iacute;nh năng như&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ<em style=\"box-sizing: border-box; font-style: italic;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">&nbsp;</strong></em>vẫn kh&ocirc;ng th&agrave;nh vấn đề.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Gi&agrave;y cầu l&ocirc;ng Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ -&nbsp;Đậm chất phong c&aacute;ch thể thao l&agrave; mẫu gi&agrave;y cổ cao gi&uacute;p c&aacute;c bạn chống lật cổ ch&acirc;n sau những c&uacute; bật nhảy li&ecirc;n tục. Ngo&agrave;i ra với thiết kế kh&aacute; hiện đại v&agrave; đẳng cấp đảm bảo khi l&ecirc;n ch&acirc;n c&aacute;c l&ocirc;ng thủ sẽ rất nổi bật đấy !</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Về m&agrave;u sắc đ&ocirc;i gi&agrave;y với t&ocirc;ng xanh dương chủ đạo kết hợp phần giữa m&agrave;u trắng c&ugrave;ng phần cao su non b&aacute;m s&acirc;n m&agrave;u đỏ b&ecirc;n dưới kết hợp c&ugrave;ng logo Mizuno trắng b&ecirc;n h&ocirc;ng m&aacute; đ&ocirc;i gi&agrave;y tr&ocirc;ng rất hiện đại, ho&agrave;n hảo tr&ecirc;n từng bước chạy.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Gi&agrave;y c&oacute; Form d&agrave;i, ph&ugrave; hợp hơn với người c&oacute; b&agrave;n ch&acirc;n d&agrave;i, tuy nhi&ecirc;n với thiết kế cổ cao khắc hẳn với phi&ecirc;n bản thường sẽ ăn điểm th&ecirc;m về sự phong c&aacute;ch v&agrave; năng động.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Với thiết kế si&ecirc;u nhẹ với&nbsp;trọng lượng trung b&igrave;nh 330g, c&aacute;c m&uacute;t đệm c&oacute; t&iacute;nh tho&aacute;t mồ h&ocirc;i tốt, cho đ&ocirc;i ch&acirc;n th&ocirc;ng tho&aacute;ng kể cả khi phải hoạt động nhiều, đ&ocirc;i gi&agrave;y n&agrave;y sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những người chơi cần cải thiện tốc độ, gi&uacute;p bạn chạy nhảy linh hoạt hơn m&agrave; vẫn tạo sự thoải m&aacute;i nhất.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Vải l&oacute;t&nbsp;b&ecirc;n trong đ&ocirc;i gi&agrave;y cầu l&ocirc;ng ch&iacute;nh h&atilde;ng Thunder Blade 2 Mid - Xanh trắng đỏ cực &ecirc;m v&agrave; tho&aacute;ng kh&iacute;, h&uacute;t mồ h&ocirc;i cực tốt trong vận động k&eacute;o d&agrave;i.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Mũi gi&agrave;y được kh&acirc;u chắc chắn để n&acirc;ng cao độ bền gi&agrave;y, m&aacute; trong gi&agrave;y cũng được gia cố bằng lớp nh&aacute;m chống m&agrave;i m&ograve;n cho c&aacute;c bước di chuyển l&ecirc;n lưới v&agrave; cho&agrave;ng người cứu cầu.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><img alt=\"Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/gallery/Mizuno%20Thunder%20Blade%202%20Mid%20-%20Xanh%20trang%20do.png\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 700px; width: 700px;\"></p>\r\n<h2 style=\'box-sizing: border-box; font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.4; color: rgb(50, 60, 63); margin-top: 20px; margin-bottom: 10px; font-size: 2em; letter-spacing: 0.01em; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 20px;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">C&aacute;c c&ocirc;ng nghệ được t&iacute;ch hợp tr&ecirc;n&nbsp;gi&agrave;y cầu l&ocirc;ng ch&iacute;nh h&atilde;ng&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ</span></strong></span></h2>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- <u style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">3D-Solid:</strong></u> Phần lưỡi g&agrave; cung cấp sự mềm mại v&agrave; độ bền cao nhất cho đ&ocirc;i gi&agrave;y cầu l&ocirc;ng ch&iacute;nh h&atilde;ng Thunder Blade 2 Mid - Xanh trắng đỏ</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><img alt=\"3D-Solid - Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/images/11(1).PNG\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 583px; width: 700px;\"></span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- <u style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">AP+:</strong></u> Một hợp chất midsole nhẹ cung cấp độ bền v&agrave; độ bền đệm, cung cấp mức độ thoải m&aacute;i cao nhất cho người sử dụng.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><img alt=\"AP+ - Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/images/12(4).jpg\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 700px; width: 700px;\"></span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- <u style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">AirMesh:</strong></u> hai b&ecirc;n h&ocirc;ng m&aacute; gi&agrave;y cầu l&ocirc;ng Thunder Blade 2 Mid - Xanh trắng đỏ c&oacute; c&aacute;c lỗ nhỏ gi&uacute;p tho&aacute;ng kh&iacute; v&agrave; l&agrave;m m&aacute;t.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><img alt=\"AirMesh - Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/images/9e99882f326493e54e388fb33cbef920.jpg\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 700px; width: 700px;\"></span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- <u style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">Dynamotion Groove:</strong></u> gi&uacute;p tăng t&iacute;nh linh hoạt v&agrave; cải thiện tốc độ.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><img alt=\"Dynamotion Groove - Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/images/d8e6cb9d6d96c48d2db1764cdbbf849c.jpg\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 700px; width: 700px;\"></span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- <u style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">Removable:</strong></u> lớp l&oacute;t tr&ecirc;n đ&ocirc;i gi&agrave;y ho&agrave;n hảo Mizuno Thunder Blade 2 Mid được đ&uacute;c theo khu&ocirc;n b&agrave;n ch&acirc;n đem đến sự &ecirc;m &aacute;i, thoải m&aacute;i.&nbsp;</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><img alt=\"Removable - Giày cầu lông Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ\" src=\"https://shopvnb.com/uploads/images/3724ff2e19447b3f0d3516905d9c9273.jpg\" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: 700px; width: 700px;\"></span></span></p>\r\n<h2 style=\'box-sizing: border-box; font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.4; color: rgb(50, 60, 63); margin-top: 20px; margin-bottom: 10px; font-size: 2em; letter-spacing: 0.01em; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 20px;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">Cảm nhận sau khi sử dụng&nbsp;gi&agrave;y Mizuno cầu l&ocirc;ng&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ</span></strong></span></h2>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Mẫu gi&agrave;y&nbsp;Mizuno cầu l&ocirc;ng&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ cho cảm gi&aacute;c đi cực &ecirc;m ch&acirc;n, kh&ocirc;ng g&acirc;y đau nhức l&ograve;ng b&agrave;n ch&acirc;n sau những c&uacute; jump smash.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Với phi&ecirc;n bản Mid ( cổ cao ) đ&ocirc;i giầy Mizuno cầu l&ocirc;ng&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ kh&ocirc;ng những &ecirc;m &aacute;i cả phần mắt c&aacute; v&agrave; cổ ch&acirc;n, kh&ocirc;ng những vậy&nbsp;mẫu gi&agrave;y c&ograve;n c&oacute;&nbsp;độ ổn định&nbsp;cũng cực k&igrave; cao.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Phần đế gi&agrave;y cho độ b&aacute;m tốt, khả năng chống trượt cao, lớp đế cao su với chất liệu nhựa si&ecirc;u bền để c&aacute;c bạn y&ecirc;n t&acirc;m về độ bền của gi&agrave;y sau một thời gian sử dụng.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Đ&ocirc;i gi&agrave;y c&ograve;n c&oacute; độ bền bỉ cực k&igrave; cao, so với c&aacute;c mẫu gi&agrave;y cầu l&ocirc;ng Yonex tr&ecirc;n thị trường th&igrave;&nbsp;Mizuno cầu l&ocirc;ng&nbsp;Thunder Blade 2 Mid - Xanh trắng đỏ cho thời gian sử dụng l&acirc;u hơn từ nửa năm đến tận một năm đấy nh&eacute; !</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- Ngo&agrave;i ra, d&ograve;ng n&agrave;y c&ograve;n rất th&iacute;ch hợp cho c&aacute;c anh em chơi thể thao&nbsp;indoor kh&aacute;c như b&oacute;ng chuyền, b&oacute;ng rổ bởi độ b&aacute;m tuyệt vời</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\">- T&oacute;m lại,&nbsp;gi&agrave;y cầu l&ocirc;ng Mizuno Thunder Blade 2 Mid - Xanh trắng đỏ sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho bộ dụng cụ thi đấu cầu l&ocirc;ng của bạn.</span></span></p>\r\n<p style=\'box-sizing: border-box; margin: 0px 0px 15px; color: rgb(51, 51, 51); font-family: HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.25px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(245, 245, 245); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\'><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; font-family: arial, helvetica, sans-serif;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">X&ecirc;m th&ecirc;m</strong>: Những mẫu <a href=\"https://shopvnb.com/giay-cau-long.html\" style=\"box-sizing: border-box; background: transparent; color: rgb(51, 122, 183); text-decoration: none; transition: all 150ms ease-in-out 0s;\">gi&agrave;y cầu l&ocirc;ng</a> mới nhất tại ShopVNB.</span></span></p>'),
(28, '192', '2', 'test123', 123456, 0, 'minions_2015_movie-wallpaper-2560x1440.jpg', ''),
(29, '192', '2', 'đsfdsfgfdg', 0, 0, 'minions_2015_movie-wallpaper-2560x1440.jpg', ''),
(30, '192', '2', 'hìnhdemo', 0, 0, 'despicable_me_2_laughing_minions-wallpaper-2880x1620.jpg', ''),
(31, '192', '2', 'sp02', 0, 0, '6.png', ''),
(36, '192', '2', '', 0, 0, '8.jpeg', ''),
(44, '192', '2', 'sq', 0, 0, 'minions_2015_movie-wallpaper-2560x1440.jpg', ''),
(46, '192', '2', '', 0, 0, '8.jpeg', ''),
(47, '192', '2', '', 0, 0, '8.jpeg', ''),
(48, '192', '2', 'sản phẩm số 1', 0, 0, 'minions_2015_movie-wallpaper-2560x1440.jpg', ''),
(49, '192', '2', 'có tên', 0, 0, 'kung_fu_panda-wallpaper-3840x2160.jpg', ''),
(50, '192', '2', '', 0, 0, '6.png', ''),
(51, '192', '2', 'Giày mới mua của Nike', 900000, 120, 'Screenshot (21).png', ''),
(52, '192', '4', 'Giày yonex', 456, 123, 'Screenshot (36).png', ''),
(53, '192', '5', 'Giày victor', 456, 789, 'calculator.png', ''),
(55, '194', '5', 'Quần cầu lông', 123, 123, '20-10 card.png', ''),
(56, '193', '2', 'Vợt test trang chu', 0, 0, '', ''),
(58, '193', '4', 'Vợt cầu lông Yonex Astrox 100 ZZ chính hãng', 3690000, 100, 'AsTrox 100 ZZ 1.jpg', ''),
(59, '192', '2', '', 0, 0, '', ''),
(60, '195', '2', ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 100, 'Lining 3626 trang.png', ''),
(61, '195', '2', ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 100, 'Lining 3626 trang.png', ''),
(62, '195', '2', ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 100, 'Lining 3626 trang.png', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `USERNAME` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `HOTENKH` varchar(128) DEFAULT NULL,
  `DIACHI` varchar(128) DEFAULT NULL,
  `SODIENTHOAI` varchar(128) DEFAULT NULL,
  `ma_gio_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `USERNAME`, `password`, `HOTENKH`, `DIACHI`, `SODIENTHOAI`, `ma_gio_hang`) VALUES
(1, 'tolehoai', '123456', 'ToLeHoai', '123CT', '', 0),
(2, 'tolehoai1', '1', 'To Le Hoai', 'Can Tho', '123456789', 0),
(3, 'user1', '123', 'username', 'ct', '123', 0),
(4, 'tolehoai123', '123', 'To Le Hoai', 'Can Tho', '1234', 0),
(5, 'user2', '123', 'user2', '123', '123', 0),
(6, 'thaoduyen', '1', 'Thảo Duyên', 'Cần Thơ', '123456789', 0),
(7, 'user3', '1', 'User 3', 'CT', '123', 0),
(8, 'user4', '1', 'user 4', 'ct', '123', 0),
(9, 'user5', '1', 'user5', '123', '123', 0),
(10, 'user6', '1', 'user6', '1', '1', 0),
(11, 'user7', '1', 'user7', 'ct', 'ct', 0),
(12, 'user8', '1', 'user8', '', '', 0),
(13, 'abc', '1', 'abc', '1', '1', 0),
(14, 'abcd', '1', 'abcd', '1', '1', 0),
(15, 'user10', '1', 'user10', 'q', '1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` char(5) NOT NULL,
  `USERNAME` varchar(128) NOT NULL,
  `HOTENNV` varchar(128) DEFAULT NULL,
  `CHUCVU` varchar(128) DEFAULT NULL,
  `DIACHI` varchar(128) DEFAULT NULL,
  `SODIENTHOAI` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MANHOM` bigint(20) NOT NULL,
  `TENNHOM` varchar(128) DEFAULT NULL,
  `nhomhanghoa_slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MANHOM`, `TENNHOM`, `nhomhanghoa_slug`) VALUES
(192, 'Vợt cầu lông', 'vot-cau-long'),
(194, 'Quần cầu lông update', 'quan-cau-long-update'),
(195, 'Áo cầu lông', 'ao-cau-long'),
(196, 'Phụ Kiện Cầu Lông', 'phu-kien-cau-long');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(128) NOT NULL,
  `PASSWORD` varchar(128) DEFAULT NULL,
  `LOAITAIKHOAN` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`USERNAME`, `PASSWORD`, `LOAITAIKHOAN`) VALUES
('admin', 'admin', 1),
('user', 'user', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `ma_thuong_hieu` int(11) NOT NULL,
  `ten_thuong_hieu` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`ma_thuong_hieu`, `ten_thuong_hieu`, `slug`) VALUES
(2, 'Lining', 'lining'),
(4, 'Yonex', 'yonex'),
(5, 'Victor', NULL),
(6, 'Mizuno', NULL),
(7, 'Apacs', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu_nhom_hang_hoa`
--

CREATE TABLE `thuong_hieu_nhom_hang_hoa` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `MANHOM` int(11) NOT NULL,
  `ten_day_du` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu_nhom_hang_hoa`
--

INSERT INTO `thuong_hieu_nhom_hang_hoa` (`MATHUONGHIEU`, `MANHOM`, `ten_day_du`) VALUES
(22, 193, 'giay-cau-long-yonex'),
(22, 193, 'giay-cau-long-yonex');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`MSHS`,`ma_gio_hang`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SODONDH`),
  ADD KEY `I_FK_DATHANG_KHACHHANG` (`MSKH`),
  ADD KEY `I_FK_DATHANG_NHANVIEN` (`MSNV`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`MSHS`),
  ADD KEY `I_FK_HANG_HOA_NHOMHANGHOA` (`MANHOM`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD KEY `I_FK_KHACHHANG_TAIKHOAN` (`USERNAME`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD KEY `I_FK_NHANVIEN_TAIKHOAN` (`USERNAME`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MANHOM`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`ma_thuong_hieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `MSHS` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  MODIFY `MANHOM` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `ma_thuong_hieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
