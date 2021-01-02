-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 02:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `MSHS` int(11) NOT NULL,
  `ma_gio_hang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `soluong_conlai` int(11) NOT NULL DEFAULT 1,
  `giohang_gia` int(11) NOT NULL,
  `tinhtrang_donhang` varchar(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `show_in_cart` int(11) NOT NULL DEFAULT 1,
  `hoten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`MSHS`, `ma_gio_hang`, `so_luong`, `soluong_conlai`, `giohang_gia`, `tinhtrang_donhang`, `time`, `show_in_cart`, `hoten`, `diachi`, `sodienthoai`, `ghichu`) VALUES
(28, 6, 140, 419, 2600000, 'Chưa xữ lý', '2021-01-01 19:27:32', 1, '', '', '', ''),
(60, 5, 94, 6, 140000, 'Đang xữ lý', '2021-01-01 19:07:47', 1, '', '', '', ''),
(73, 7, 4, 94, 1680000, 'Đã xữ lý', '2021-01-01 18:27:28', 0, '', '', '', ''),
(73, 10, 2, 94, 1680000, 'Đang xữ lý', '2020-12-31 10:25:35', 1, '', '', '', ''),
(75, 7, 13, 172, 3690000, 'Đang xữ lý', '2021-01-01 18:27:28', 0, '', '', '', ''),
(75, 10, 101, 172, 3690000, 'Đang xữ lý', '2021-01-01 17:57:42', 1, '', '', '', ''),
(80, 12, 1, 1599, 2599000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(83, 7, 1, 99, 3890000, 'Đã xữ lý', '2021-01-01 19:07:50', 0, '', '', '', ''),
(85, 7, 1, 98, 3695000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(85, 12, 1, 98, 3695000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(87, 7, 2, 98, 3399000, 'Đang xữ lý', '2021-01-01 19:07:53', 0, '', '', '', ''),
(89, 7, 15, 34, 3100000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(89, 12, 1, 34, 3100000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(90, 7, 4, 95, 2959000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(90, 12, 1, 95, 2959000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(91, 7, 7, 93, 2670000, 'Chưa xữ lý', '2021-01-01 18:27:28', 0, '', '', '', ''),
(92, 7, 1, 198, 110000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(92, 12, 1, 198, 110000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(93, 12, 1, 199, 124000, 'Chưa xữ lý', '2021-01-01 19:27:32', 0, '', '', '', ''),
(103, 7, 1, 298, 160000, 'Chưa xữ lý', '2021-01-01 19:09:31', 0, '', '', '', '');

--
-- Triggers `chi_tiet_gio_hang`
--
DELIMITER $$
CREATE TRIGGER `KiemTraSoLuong` BEFORE UPDATE ON `chi_tiet_gio_hang` FOR EACH ROW BEGIN
	IF new.soluong_conlai < 0  THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = N'Không đủ số lượng';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
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
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gio_hang`, `USERNAME`) VALUES
(4, '0'),
(5, 'abcd'),
(6, 'user10'),
(7, 'u1'),
(8, 'hoai1'),
(9, 'a1'),
(10, 'a2'),
(11, 'a3'),
(12, 'tlhoai');

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `MSHS` int(5) NOT NULL,
  `MANHOM` int(11) NOT NULL,
  `MATHUONGHIEU` int(11) NOT NULL,
  `TENHH` varchar(128) DEFAULT NULL,
  `GIA` int(2) DEFAULT NULL,
  `SOLUONGHANG` int(4) DEFAULT NULL,
  `SOLUONGNHAP` int(11) NOT NULL,
  `HINH` varchar(128) DEFAULT NULL,
  `MOTAHH` text DEFAULT NULL,
  `MOTA_NGAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`MSHS`, `MANHOM`, `MATHUONGHIEU`, `TENHH`, `GIA`, `SOLUONGHANG`, `SOLUONGNHAP`, `HINH`, `MOTAHH`, `MOTA_NGAN`) VALUES
(28, 192, 4, 'Vợt cầu lông Yonex Arcsaber 11 new chính hãng', 2600000, 419, 559, 'Arcsaber 11 2020.png', '<p><strong>Vợt cầu l&ocirc;ng Yonex Arcsaber 11 new ch&iacute;nh h&atilde;ng - Phi&ecirc;n bản 4U cho lối đ&aacute;nh c&ocirc;ng thủ to&agrave;n diện</strong></p>\r\n\r\n<h2><strong>1. Giới thiệu vợt đ&aacute;nh cầu l&ocirc;ng&nbsp;Yonex Arcsaber 11 new ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p>- Vợt cầu l&ocirc;ng Yonex Arcsaber 11 new ch&iacute;nh h&atilde;ng n&agrave;y ch&iacute;nh l&agrave; phi&ecirc;n bản vợt cầu l&ocirc;ng 4U của si&ecirc;u phẩm vợt cầu l&ocirc;ng c&ocirc;ng thủ to&agrave;n diện Yonex Arcsaber 11 bản cũ d&agrave;nh ri&ecirc;ng cho c&aacute;c bạn mới bắt đầu tập chơi muốn trải nghiệm một c&acirc;y vợt cao cấp đấy nh&eacute; !</p>\r\n\r\n<p>- C&acirc;y vợt đ&aacute;nh&nbsp;cầu l&ocirc;ng Yonex ArcSaber 11 được thiết kế với khung vợt Graphite l&agrave;m cho vợt c&acirc;n bằng, đ&aacute;nh linh hoạt, tr&ecirc;n lưới hay ve cầu tr&aacute;i tay điều rất tốt, tốc độ đi cầu nhanh, kiểm so&aacute;t tốt trong lối chơi tấn c&ocirc;ng lẫn&nbsp;ph&ograve;ng thủ.</p>\r\n\r\n<p>- Với phi&ecirc;n bản mới n&agrave;y, si&ecirc;u phẩm&nbsp;vợt cầu l&ocirc;ng Yonex Arcsaber 11 4U sẽ c&oacute; m&agrave;u đỏ chủ đạo&nbsp;cho một cảm gi&aacute;c tr&agrave;n đầy năng lượng, mạnh mẽ hơn kết hợp c&ugrave;ng&nbsp;những đường nhấn điểm xuyết m&agrave;u xanh lục qu&acirc;n cực hiện đại.</p>\r\n\r\n<p>- Vợt cầu l&ocirc;ng Yonex ch&iacute;nh h&atilde;ng&nbsp;Arcsaber 11 new 2020 cho cảm gi&aacute;c đũa vợt dẻo, đầu vợt c&acirc;n bằng&nbsp;v&agrave;o khoảng 295mm. Nếu như một c&acirc;y vợt dẻo sẽ l&agrave;m bạn tốn sức khi ph&ocirc;ng cầu nhưng được mệnh danh l&agrave; &quot; &ocirc;ng ho&agrave;ng điều cầu &quot; n&ecirc;n hiển&nbsp;nhi&ecirc;n khi Arcsaber 11 cho khả năng xử l&iacute; cầu cao s&acirc;u rất tốt. Người chơi&nbsp;ho&agrave;n to&agrave;n l&agrave;m chủ được đường cầu của m&igrave;nh, điều cầu theo đ&uacute;ng &yacute;.</p>\r\n\r\n<p>- Tốc độ ra vợt rất nhanh, cảm gi&aacute;c l&agrave;m chủ được đường cầu, tốc độ, nhịp độ của pha đ&ocirc;i c&ocirc;ng l&agrave; cực k&igrave; tốt. Nhất l&agrave; với những pha cầu tấn c&ocirc;ng bất ngờ như đập g&otilde;, tạt cầu ch&eacute;o s&acirc;n.</p>\r\n\r\n<p>- L&agrave; một c&acirc;y vợt c&oacute; điểm c&acirc;n bằng 295mm nhưng b&ugrave; lại n&oacute; c&oacute; mặt vợt cực k&igrave; rộng n&ecirc;n cho cảm gi&aacute;c kh&aacute; l&agrave; nặng đầu. Arcsaber 11 4U cho khả năng tấn c&ocirc;ng ch&iacute;nh x&aacute;c, cầu đi theo &yacute;. Th&ecirc;m v&agrave;o đ&oacute; l&agrave; khả năng ph&ograve;ng thủ cũng cực rất cao đến từ vợt cầu l&ocirc;ng Yonex Arcsaber 11 do vợt c&oacute; điểm ngọt&nbsp;rất lớn cộng th&ecirc;m th&acirc;n vợt kh&aacute; ngắn v&agrave; độ cứng trung b&igrave;nh.</p>\r\n\r\n<p>- T&oacute;m lại, vợt cầu l&ocirc;ng Yonex Arcsaber 11 new ch&iacute;nh h&atilde;ng chắc chắn l&agrave; sự đầu tư ho&agrave;n hảo d&agrave;nh cho bất k&igrave; một l&ocirc;ng thủ n&agrave;o bao gồm cả nam v&agrave; nữ lẫn c&aacute;c bạn mới bắt đầu tập chơi đấy nh&eacute; !</p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số&nbsp;vợt cầu l&ocirc;ng Yonex Arcsaber&nbsp;11 4U new 2020</strong></h2>\r\n\r\n<p>- Độ cứng: Trung b&igrave;nh</p>\r\n\r\n<p>- Khung vợt:&nbsp;H.M. Graphite, Neo CS CARBON NANOTUBE, SONIC METAL.</p>\r\n\r\n<p>- Th&acirc;n vợt:&nbsp;H.M. Graphite, Ultra PEF.</p>\r\n\r\n<p>- Điểm c&acirc;n bằng: 295mm</p>\r\n\r\n<p>- Trọng lượng:&nbsp;4U</p>\r\n\r\n<p>- Chu vi c&aacute;n vợt: G5</p>\r\n\r\n<p>- Chiều d&agrave;i tổng thể: 675mm</p>\r\n\r\n<p>- Mức căng tối đa: 24LBS (10.5 KG)</p>\r\n\r\n<p>- M&agrave;u sắc: Đỏ/ Trắng</p>\r\n\r\n<p>- C&acirc;y vợt cầu l&ocirc;ng Yonex Arcsaber 11 4U new 2020 được sản xuất tại Nhật Bản</p>\r\n\r\n<p><img alt=\"Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/gallery/Arcsaber%2011%202020.png\" /></p>\r\n\r\n<h2><strong>3. C&ocirc;ng nghệ &aacute;p dụng tr&ecirc;n vợt cầu l&ocirc;ng Yonex ch&iacute;nh h&atilde;ng&nbsp;Arcsaber 11 new</strong></h2>\r\n\r\n<p><u><strong>- Neo CS CARBON NANOTUBE:</strong></u>&nbsp;Mang đến độ mềm dẻo lớn hơn, độ bền cao, lực đ&aacute;nh tốt hơn với c&ocirc;ng nghệ&nbsp;<strong>Neo CS CARBON NANOTUBE</strong><strong>&nbsp;&nbsp;</strong>&nbsp;thế hệ mới. Với c&ocirc;ng nghệ n&agrave;y gi&uacute;p mang lại những c&ocirc;ng năng nổi trội khi người chơi cần tung ra những c&uacute; đ&aacute;nh uy lực v&agrave; c&oacute; kiểm so&aacute;t. C&ocirc;ng nghệ&nbsp;<strong>Neo CS CARBON NANOTUBE</strong>&nbsp;cũng cho ph&eacute;p khung vợt nhanh ch&oacute;ng lấy lại h&igrave;nh dạng ban đầu sau mỗi c&uacute; đ&aacute;nh đồng thời l&agrave;m tăng lực đẩy cho c&acirc;y vợt. Ngo&agrave;i ra, c&ocirc;ng nghệ n&agrave;y&nbsp;c&ograve;n&nbsp;cung cấp t&iacute;nh linh hoạt cao hơn, độ bền lớn v&agrave; sức đẩy, Neo CS CARBON NANOTUBE mang lại hiệu suất vượt trội khi bạn cần phải bắn những c&uacute; đ&aacute;nh mạnh mẽ, c&oacute; kiểm so&aacute;t. Neo CS CARBON NANOTUBE kết hợp cải thiện hiệu ứng giữ v&agrave; cố định&nbsp;&nbsp;được tạo ra bởi cấu tr&uacute;c xếp chồng nhiều lần. Neo CS CARBON NANOTUBE&nbsp;được đặt ở cả hai b&ecirc;n của đầu vợt, cho ph&eacute;p khung nhanh ch&oacute;ng trở lại h&igrave;nh dạng b&igrave;nh thường của n&oacute; l&agrave;m tăng lực đẩy.</p>\r\n\r\n<p><img alt=\"Neo CS CARBON NANOTUBE - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/Untitled1(2).png\" /></p>\r\n\r\n<p><u><strong>- SONIC METAL:</strong></u>&nbsp;l&agrave; một hợp kim titan mới đặc biệt mạnh mẽ, nhẹ v&agrave; linh hoạt m&agrave; Yonex&nbsp;đặt ở đầu khung. Điều n&agrave;y c&oacute; hai lợi thế. Thứ nhất, n&oacute; mang lại cho bạn sức đẩy cao hơn, đặc biệt l&agrave; trong tấn c&ocirc;ng. Thứ hai, n&oacute; tạo ra một &acirc;m thanh mạnh mẽ r&otilde; r&agrave;ng khi đ&aacute;nh tr&uacute;ng quả cầu. &Acirc;m thanh n&agrave;y, kết hợp với sự gia tăng đ&aacute;ng kể lực đẩy, sẽ khiến đối thủ của bạn chịu &aacute;p lực ngay lập tức.</p>\r\n\r\n<p><img alt=\"SONIC METAL - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/15(16).jpg\" /></p>\r\n\r\n<p><strong><u>-&nbsp;ISOMETRIC:</u>&nbsp;</strong>C&ocirc;ng nghệ thiết kế&nbsp;h&igrave;nh vu&ocirc;ng&nbsp;gi&uacute;p đảm bảo t&iacute;nh&nbsp;tương đồng về độ d&agrave;i v&agrave; g&oacute;c của&nbsp;c&aacute;c d&acirc;y dọc cũng như d&acirc;y ngang, tăng tối đa điểm ngọt&nbsp;theo mọi hướng, khung vợt Yonex Arcsaber 11 new 2020 lớn hơn n&ecirc;n khi cầu chạm mặt vợt ở những điểm kh&aacute;c nhau tr&ecirc;n mặt vợt vẫn&nbsp;mang lại cảm gi&aacute;c đ&aacute;nh tốt nhất.</p>\r\n\r\n<p><img alt=\"ISOMETRIC - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/16(10).jpg\" /></p>\r\n\r\n<p><strong><u>- T-ANCHOR:</u>&nbsp;</strong>Một vật liệu tổng hợp T-ANCHOR mới được sử dụng trong khớp T gi&uacute;p giảm m&ocirc;-men xoắn dư thừa khi cầu đ&aacute;nh v&agrave;o trung t&acirc;m vợt.</p>\r\n\r\n<p><img alt=\"T-ANCHOR - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/t-anchor.jpg\" /></p>\r\n\r\n<p><u><strong>- ULTRA PEF</strong>:</u>&nbsp;Trục được chế tạo bằng c&aacute;ch sử dụng Ultra PEF, sợi si&ecirc;u poly ethylene - đủ nhẹ để nổi tr&ecirc;n mặt nước nhưng vẫn c&oacute; thể chịu được lực rất lớn. Những đặc điểm n&agrave;y cho ph&eacute;p hấp thụ sốc tối đa. Tăng lực ph&aacute;t ra mỗi khi thực hiện một quả cầu.&nbsp;</p>\r\n\r\n<p><img alt=\"ULTRA PEF - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/bad-tech-Ultra-PEF.jpg\" /></p>\r\n\r\n<p><strong><u>-&nbsp;NEW GROMMET PATTERN:</u></strong>&nbsp;C&ocirc;ng nghệ đan d&acirc;y kiểu mới.&nbsp;Cấu tr&uacute;c lỗ grommet một lượt cung cấp nhiều lỗ&nbsp;hơn cho kiểu x&acirc;u chuỗi&nbsp;gi&uacute;p tăng&nbsp;hiệu suất hơn so với cấu tr&uacute;c lỗ th&ocirc;ng thường, độc lập về cấu tr&uacute;c xỏ d&acirc;y ngang v&agrave; dọc. Gi&uacute;p giảm &aacute;p lực l&ecirc;n c&aacute;c ron nhựa, tr&aacute;nh xoắn d&acirc;y v&agrave; giảm ma s&aacute;t cho d&acirc;y, gi&uacute;p bảo vệ d&acirc;y vợt hơn.&nbsp;</p>\r\n\r\n<p><img alt=\"NEW GROMMET PATTERN - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/ca2103348454858f82e24474e122c071.jpg\" /></p>\r\n\r\n<p><strong><u>-&nbsp;SOLID&nbsp;FEEL CORE:</u></strong>&nbsp;C&ocirc;ng nghệ được &aacute;p dụng b&ecirc;n trong l&otilde;i của khung c&acirc;y vợt cầu l&ocirc;ng Yonex Astrox 77 Shine Red&nbsp;New 2020, b&ecirc;n trong l&otilde;i c&oacute; lớp xốp. Lớp xốp n&agrave;y c&oacute; vai tr&ograve; cắt giảm&nbsp; những rung động&nbsp;c&oacute; hại, mục địch ch&iacute;nh l&agrave;&nbsp;&nbsp;gi&uacute;p hấp thụ chấn, chống sốc l&ecirc;n tay khi tay phải chịu &aacute;p lực từ th&acirc;n vợt cứng.&nbsp;<strong>SOLIC FEEL CORE</strong>&nbsp;được &aacute;p dụng trong tất cả c&aacute;c c&acirc;y vợt được sản xuất tại Nhật Bản.</p>\r\n\r\n<p><img alt=\"SOLID FEEL CORE - Vợt cầu lông Yonex Arcsaber 11 new chính hãng\" src=\"https://shopvnb.com/uploads/images/byonex_solidcore_info.jpg\" /></p>\r\n\r\n<p><u><strong>- AERO-BOX FRAME</strong>.</u>&nbsp;Mục đ&iacute;ch của việc thiết kế mặt khung h&igrave;nh oval l&agrave; để khi đ&aacute;nh vợt sẽ lướt gi&oacute; cho kh&ocirc;ng kh&iacute; qua,&nbsp;<strong>BOX FRAME</strong>&nbsp;v&aacute;t 2 b&ecirc;n gi&uacute;p vợt cứng c&aacute;p hơn. Thiết kế gi&uacute;p tăng kh&iacute; động lực học, gi&uacute;p ch&uacute;ng ta vung vợt nhanh hơn, đập cầu mạnh hơn</p>\r\n', '<p>Vợt cầu l&ocirc;ng Yonex Arcsaber 11 new ch&iacute;nh h&atilde;ng n&agrave;y ch&iacute;nh l&agrave; phi&ecirc;n bản vợt cầu l&ocirc;ng 4U của si&ecirc;u phẩm vợt cầu l&ocirc;ng c&ocirc;ng thủ to&agrave;n diện Yonex Arcsaber 11 bản cũ d&agrave;nh ri&ecirc;ng cho c&aacute;c bạn mới bắt đầu tập chơi muốn trải nghiệm một c&acirc;y vợt cao cấp đấy nh&eacute; !</p>\r\n'),
(55, 194, 6, 'Quần cầu lông Mizuno nam trắng', 124000, 0, 100, '259_mizuno_trang_nam.jpg', '', ''),
(60, 195, 2, ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 6, 100, 'Lining 3626 trang.png', '', ''),
(61, 195, 2, ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 95, 100, 'Lining 3626 trang.png', '', ''),
(62, 195, 2, ' Áo cầu lông Lining 3626 Nam Trắng', 140000, 96, 100, 'Lining 3626 trang.png', '', ''),
(72, 205, 4, 'Giày cầu lông Yonex SHB 57 Trắng', 1880000, 98, 100, 'Yonex SHB 57 Trang.png', '', ''),
(73, 205, 6, 'Giày cầu lông Mizuno Dynablitz - Đen xanh chính hãng', 1680000, 94, 100, 'Mizuno Dynablitz - Den xanh.png', '', ''),
(75, 192, 4, 'Vợt cầu lông Yonex Astrox 100 ZZ chính hãng', 3690000, 172, 286, 'AsTrox 100 ZZ 1.jpg', '<p><strong>Vợt cầu l&ocirc;ng Yonex Astrox 100 ZZ&nbsp;- Si&ecirc;u phẩm sắp sửa hạ c&aacute;nh tại Tr&aacute;i Đất.</strong></p>\r\n\r\n<h2><strong>1. Giới thiệu về vợt cầu l&ocirc;ng vợt cầu l&ocirc;ng Yonex Astrox</strong>&nbsp;<strong>100 ZZ</strong>&nbsp;</h2>\r\n\r\n<p>Một trong những sản phẩm đ&aacute;ng chờ nhất trong năm 2020 của Yonex đ&oacute; l&agrave; si&ecirc;u phẩm tiếp theo của Astrox Series - Astrox 100 với 2 phi&ecirc;n bản Astrox 100 ZZ v&agrave; Astrox 100 ZX. Những h&igrave;nh ảnh ban đầu của Astrox 100 ZZ c&ograve;n kh&aacute; &iacute;t v&agrave; được nh&agrave; sản xuất &quot;thả x&iacute;ch&quot; từ từ g&acirc;y nhiều thu h&uacute;t đến người h&acirc;m mộ&nbsp;cầu l&ocirc;ng tr&ecirc;n to&agrave;n thế giới.&nbsp;</p>\r\n\r\n<p>Astrox 100 ZZ c&oacute; 2 phi&ecirc;n bản vợt 3U, 4U với chu vi c&aacute;n vợt nhỏ vừa phải ph&ugrave; hợp với cỡ tay của đa số người chơi.&nbsp;</p>\r\n\r\n<p>Hiện tại những th&ocirc;ng&nbsp;tin về Astrox 100 ZX c&ograve;n kh&aacute; &iacute;t, ch&uacute;ng ta&nbsp;hiện tại đ&atilde; biết về th&ocirc;ng số vợt v&agrave; một số c&ocirc;ng nghệ nổi bật. Ắc hẳn c&ograve;n những c&ocirc;ng nghệ kh&aacute;c, những điểm mạnh v&agrave; chi tiết chỉ Astrox 100 ZX mới c&oacute;.&nbsp;</p>\r\n\r\n<p>Tr&ecirc;n biểu đồ mới nhất về c&aacute;c c&acirc;y vợt Astrox trong Astrox Series,&nbsp;Astrox 100 ZX v&agrave;&nbsp;Astrox 100 ZZ c&oacute; điểm c&acirc;n bằng l&agrave; nặng đầu nhất v&agrave; cứng nhất, gần như những g&igrave; tốt nhất đang được tập trung tr&ecirc;n 2 si&ecirc;u phẩm n&agrave;y.&nbsp;</p>\r\n\r\n<p>Đối với những người chơi n&acirc;ng cao đang t&igrave;m c&aacute;ch n&acirc;ng cấp tr&ograve; chơi của họ với chuyển động nhanh hơn v&agrave; những c&uacute; đ&aacute;nh cầu tinh tế&nbsp;mang đẳng cấp vượt trội th&igrave; Astrox 100 ZX l&agrave; c&acirc;y vợt cực kỳ ph&ugrave;&nbsp;hợp. Đương nhi&ecirc;n đ&ograve;i hỏi người chơi cần c&oacute; kỹ thuật c&aacute; nh&acirc;n cao, lực tay khỏe để ph&aacute;t huy hết c&ocirc;ng năng của vợt.&nbsp;</p>\r\n\r\n<p>Vẻ ngo&agrave;i của&nbsp;Astrox 100 ZX kh&aacute; giống với&nbsp;Astrox 100 ZZ từ bố&nbsp;cục thiết kế tới m&agrave;u sắc, điểm nhận dạng dễ nh&igrave;n nhất nằm ở khung m&agrave;u cam ở gần khớp chữ T của vợt.&nbsp;Tr&ecirc;n&nbsp;Astrox 100 ZX, k&iacute; tự Zx sẽ được thiết kế m&agrave;u đen, tr&ecirc;n&nbsp;Astrox 100 ZZ, k&iacute; tự ZZ sẽ được thiết kế m&agrave;u x&aacute;m nhạt hơn. Đối với phần họa tiết như c&aacute;c gọn sống đậm phong th&aacute;i &quot;Nhật Bản&quot; th&igrave; tr&ecirc;n&nbsp;Astrox 100 ZX l&agrave; m&agrave;u t&iacute;m, trắng v&agrave; m&agrave;u xanh rất giống với m&agrave;u&nbsp;Bluestone (Xanh đ&aacute;), c&ograve;n tr&ecirc;n&nbsp;Astrox 100 ZZ l&agrave; m&agrave;u xanh dương mang cảm gi&aacute;c lạnh - xanh&nbsp;Endeavour v&agrave; trắng</p>\r\n\r\n<p>Dự đo&aacute;n&nbsp;v&agrave;o th&aacute;ng 3, th&aacute;ng 4 năm nay, si&ecirc;u&nbsp;phẩm Astrox 100 ZZ sẽ được tr&igrave;nh l&agrave;ng ra mắt với nhiều điểm ch&uacute; &yacute;. Sau th&agrave;nh c&ocirc;ng từ c&aacute;c sản phẩm trước trong Astrox Series, những thay đổi mới, bổ sung mới dự đo&aacute;n sẽ tạo ra nhiều điểm mới cho một sản phẩm chất lượng hơn. Kh&ocirc;ng những thay đổi trong c&ocirc;ng nghệ hay cải&nbsp;tiến về c&ocirc;ng năng m&agrave; ngoại h&igrave;nh vợt chắc chắn sẽ c&oacute; thiết kế hiện đại v&agrave; bắt mắt hơn.&nbsp;</p>\r\n\r\n<p>* Video review vợt cầu l&ocirc;ng Yonex Astrox 100 ZZ do Cộng đồng cầu l&ocirc;ng Việt Nam - VN Badminton ph&aacute;t h&agrave;nh:</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"400\" src=\"https://www.youtube.com/embed/26cZAbn4dWM\" width=\"700\"></iframe></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"400\" src=\"https://www.youtube.com/embed/yHlGItga2ec\" width=\"700\"></iframe></p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số về vợt cầu l&ocirc;ng vợt cầu l&ocirc;ng Yonex Astrox&nbsp;100 ZZ</strong>&nbsp;</h2>\r\n\r\n<p>- Độ cứng: Cứng</p>\r\n\r\n<p>- Khung vợt:&nbsp;H.M. GRAPHITE + Tungsten</p>\r\n\r\n<p>- Th&acirc;n vợt:&nbsp;GRAPHITE + NANOMESH NEO&nbsp;</p>\r\n\r\n<p>- Trọng lượng: 3U, 4U</p>\r\n\r\n<p>- Chu vi c&aacute;n vợt: 3U G4, 5, 6</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4U G5, 6</p>\r\n\r\n<p>- Sức căng tối đa:&nbsp;&nbsp;20-28 LBS (12.7kg)&nbsp;</p>\r\n\r\n<p>- Điểm c&acirc;n bằng: Nặng đầu.</p>\r\n\r\n<p>- M&agrave;u sắc: Cam/ Đen/ Trắng/&nbsp;xanh&nbsp;Endeavour</p>\r\n\r\n<p>- Sản xuất: Nhật Bản.</p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"https://shopvnb.com/uploads/images/AsTrox%20100%20ZZ%201.jpg\" /></p>\r\n\r\n<p><img src=\"https://shopvnb.com/uploads/images/san_pham/ZX-Image03-1.png\" /></p>\r\n\r\n<p><img src=\"https://shopvnb.com/uploads/images/san_pham/7E00DA43-0120-4FB0-A76B-D94E7C67B336-1.png\" /></p>\r\n\r\n<p><img src=\"https://shopvnb.com/uploads/images/san_pham/ZX-Image02-1.png\" /></p>\r\n\r\n<p><img src=\"https://shopvnb.com/uploads/images/san_pham/5FC9FB09-A3ED-4B1F-A316-A16023694E0F-1.png\" /></p>\r\n\r\n<p><strong>3. C&ocirc;ng nhệ &aacute;p dụng l&ecirc;n&nbsp;vợt&nbsp;cầu l&ocirc;ng Yonex Astrox&nbsp;100 ZZ</strong>&nbsp;</p>\r\n\r\n<p>-<strong>ISOMETRIC:&nbsp;</strong>C&ocirc;ng nghệ thiết kế&nbsp;h&igrave;nh vu&ocirc;ng&nbsp;gi&uacute;p đảm bảo t&iacute;nh&nbsp;tương đồng về độ d&agrave;i v&agrave; g&oacute;c của&nbsp;c&aacute;c d&acirc;y dọc cũng như d&acirc;y ngang, tăng tối đa điểm ngọt&nbsp;theo mọi hướng, khung vợt lớn hơn n&ecirc;n khi cầu chạm mặt vợt ở những điểm kh&aacute;c nhau tr&ecirc;n mặt vợt vẫn&nbsp;mang lại cảm gi&aacute;c đ&aacute;nh tốt nhất.</p>\r\n\r\n<p><img alt=\"Isometric\" src=\"https://shopvnb.com/uploads/images/san_pham/6199.jpg\" /></p>\r\n\r\n<p>-<strong>NEW GROMMET PATTERN</strong>: C&ocirc;ng nghệ đan d&acirc;y kiểu mới.&nbsp;Cấu tr&uacute;c lỗ grommet một lượt cung cấp nhiều lỗ&nbsp;hơn cho kiểu x&acirc;u chuỗi&nbsp;gi&uacute;p tăng&nbsp;hiệu suất hơn so với cấu tr&uacute;c lỗ th&ocirc;ng thường, độc lập về cấu tr&uacute;c xỏ d&acirc;y ngang v&agrave; dọc. Gi&uacute;p giảm &aacute;p lực l&ecirc;n c&aacute;c ron nhựa, tr&aacute;nh xoắn d&acirc;y v&agrave; giảm ma s&aacute;t cho d&acirc;y, gi&uacute;p bảo vệ d&acirc;y vợt hơn.&nbsp;</p>\r\n\r\n<p><img alt=\"New Grommet Pattern 2013 ver\" src=\"https://shopvnb.com/uploads/images/san_pham/3317.jpg\" /></p>\r\n\r\n<p>-&nbsp;<strong>NANOMETRIC</strong>: Cải&nbsp;thiện độ bền li&ecirc;n kết giữ c&aacute;c sợi carbon cho ph&eacute;p đưa cấu tr&uacute;c&nbsp;vợt l&ecirc;n một đẳng cấp kh&aacute;c. Bằng c&aacute;ch giảm lượng carbon trong trục&nbsp;hơn 60% so với một c&acirc;y vợt th&ocirc;ng thường trong khi vẫn giữ được độ cứng gi&uacute;p vung vợt nhanh hơn th&ecirc;m 30km/h.&nbsp;Ngo&agrave;i ra c&ograve;n c&oacute; c&oacute; một số đặc t&iacute;nh kh&aacute;c hỗ trợ người chơi như độ uốn của vợt được tăng l&ecirc;n, khả năng hấp thụ chấn được tăng l&ecirc;n th&ecirc;m 40%,&nbsp;Yonex đ&atilde; tạo ra một c&acirc;y vợt mang t&iacute;nh c&aacute;ch mạng về&nbsp;tốc&nbsp;độ,&nbsp;sự kiểm so&aacute;t cầu v&agrave; khả năng giảm chấn của vợt.</p>\r\n\r\n<p><img alt=\"nanometric image\" src=\"https://shopvnb.com/uploads/images/san_pham/2489.jpg\" /></p>\r\n\r\n<p>-&nbsp;<strong>NAMD</strong>:&nbsp;L&agrave; c&ocirc;ng nghệ phủ vật liệu nano l&ecirc;n trực tiếp v&agrave;o sợi than ch&igrave;&nbsp;cải thiện&nbsp;sự kết d&iacute;nh giữa than ch&igrave; v&agrave; nhựa gi&uacute;p tăng độ đ&agrave;n hồi&nbsp;cho đũa vợt v&agrave; gi&uacute;p đũa&nbsp;vợt quay lại trạng th&aacute;i ổn định nhất. Những cải tiến tr&ecirc;n gi&uacute;p người chơi giảm bớt g&oacute;c vung vợt, kh&ocirc;ng cần dang rộng c&aacute;nh tay qu&aacute; nhiều m&agrave; vẫn c&oacute; những c&uacute; đ&aacute;nh nhanh, ph&aacute;t lực mạnh v&agrave; chuẩn x&aacute;c m&agrave; th&acirc;n vợt nhanh ch&oacute;ng hồi phục về trạng th&aacute;i ban đầu.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://shopvnb.com/uploads/images/NAMD.jpg\" /></p>\r\n\r\n<p>-<strong>ROTATIONAL GENARATOR SYSTEM:</strong>&nbsp;L&agrave; c&ocirc;ng nghệ theo thuyết đối trọng. Trọng lực được ph&acirc;n bổ ở đầu, đoạn nối&nbsp;chữ T v&agrave; phần đầu vợt. Việc ph&acirc;n bổ như vậy gi&uacute;p cho c&acirc;y vợt được đồng đều, hỗ trợ tốt nhất cho vợt sau khi đ&aacute;nh xong quả cầu trước v&agrave; chuẩn bị cho pha đ&aacute;nh cầu tiếp theo dễ d&agrave;ng hơn. Điều n&agrave;y gi&uacute;p cho việc d&ugrave; đang cầm vợt nặng đầu nhưng vẫn mang đến cảm gi&aacute;c c&acirc;n bằng, thoải m&aacute;i.</p>\r\n\r\n<p><img alt=\"\" src=\"https://shopvnb.com/uploads/images/99%20l%E1%BB%B1c.jpg\" /></p>\r\n\r\n<p><strong>4. Những người chơi ph&ugrave; hợp với d&ograve;ng vợt Yonex Astrox&nbsp;100 ZZ</strong></p>\r\n\r\n<p>- Ph&ugrave; hợp cho người c&oacute; lực cổ tay trung b&igrave;nh, khỏe, tr&igrave;nh độ kh&aacute;, vận động vi&ecirc;n chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Ph&ugrave; hợp với người c&oacute; lối chơi c&ocirc;ng, th&iacute;ch đập cầu, th&iacute;ch lối chơi tấn c&ocirc;ng &aacute;p đảo v&agrave; đầy uy lực nhưng nhanh nhẹn.&nbsp;</p>\r\n', '<p>Một trong những sản phẩm đ&aacute;ng chờ nhất trong năm 2020 của Yonex đ&oacute; l&agrave; si&ecirc;u phẩm tiếp theo của Astrox Series - Astrox 100 với 2 phi&ecirc;n bản Astrox 100 ZZ v&agrave; Astrox 100 ZX. Những h&igrave;nh ảnh ban đầu của Astrox 100 ZZ c&ograve;n kh&aacute; &iacute;t v&agrave; được nh&agrave; sản xuất &quot;thả x&iacute;ch&quot; từ từ g&acirc;y nhiều thu h&uacute;t đến người h&acirc;m m&ocirc; cầu l&ocirc;ng tr&ecirc;n to&agrave;n thế giới.&nbsp;</p>\r\n'),
(80, 205, 4, 'Giày cầu lông Yonex SHB Comfort  \'Z2  \\', 2599000, 1599, 1600, 'Yonex SHB Comfort Z2 Trang Cam.png', '<p><strong>Gi&agrave;y cầu l&ocirc;ng Yonex SHB Comfort Z2 Trắng Cam - Si&ecirc;u phẩm đ&aacute;nh đơn với diện mạo 2021 hiện đại hơn</strong></p>\r\n\r\n<h2><strong>1. Giới thiệu về gi&agrave;y cầu l&ocirc;ng Yonex SHB Comfort Z2 V&agrave;ng đen</strong></h2>\r\n\r\n<p>- Nếu bạn đang t&igrave;m kiếm một đ&ocirc;i gi&agrave;y cầu l&ocirc;ng cao cấp, chất lượng d&agrave;nh ri&ecirc;ng cho đ&aacute;nh đơn th&igrave; chắc chắn đ&ocirc;i gi&agrave;y cầu l&ocirc;ng Yonex SHB Comfort Z2 Trắng Cam sẽ l&agrave; sự lựa chọn ho&agrave;n hảo nhất. Kh&ocirc;ng những vậy, t&ocirc;ng m&agrave;u mới 2021 n&agrave;y sẽ c&agrave;ng l&agrave;m c&aacute;c l&ocirc;ng thủ chết m&ecirc; ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n đấy nh&eacute; !</p>\r\n\r\n<p>- Ngo&agrave;i ra, nếu&nbsp;mẫu gi&agrave;y cầu l&ocirc;ng Yonex SHB Comfort Z2 V&agrave;ng đen l&agrave; phi&ecirc;n bản d&agrave;nh cho nam th&igrave; đ&ocirc;i gi&agrave;y chơi cầu l&ocirc;ng&nbsp;Yonex SHB Comfort Z2 Trắng Cam l&agrave; phi&ecirc;n bản d&agrave;nh cho nữ đấy nh&eacute; !</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ mới tr&ecirc;n phần lưỡi g&agrave; tr&ecirc;n đ&ocirc;i gi&agrave;y đ&aacute;nh cầu l&ocirc;ng Yonex&nbsp;SHB Comfort Z2 Trắng Cam:&nbsp;<strong>DOUBLE RACHEL MESH&nbsp;</strong>l&agrave; một lưới si&ecirc;u mịn cực kỳ nhẹ v&agrave; bền.&nbsp;N&oacute; cung cấp trao đổi kh&ocirc;ng kh&iacute; nhiều hơn t&aacute;m lần để giải ph&oacute;ng độ ẩm so với vải lưới th&ocirc;ng thường. Từ đ&oacute; b&ecirc;n trong gi&agrave;y lu&ocirc;n được th&ocirc;ng tho&aacute;ng v&agrave; những động t&aacute;c nh&oacute;n ch&acirc;n hay x&ecirc; dịch nhiều hướng được thực hiện dễ d&agrave;ng hơn.&nbsp;</p>\r\n\r\n<p>- Thiết kế kh&ocirc;ng đối xứng 2 b&ecirc;n gi&agrave;y mui gi&agrave;y cầu l&ocirc;ng Yonex ch&iacute;nh h&atilde;ng&nbsp;SHB Comfort Z2 Trắng Cam&nbsp;vừa tạo một thiết kế mới ấn tượng, vừa gi&uacute;p kh&ocirc;ng gian b&ecirc;n trong gi&agrave;y được vừa vặn với ch&acirc;n người chơi hơn.&nbsp;C&aacute;c chuyển động đa chiều với cường độ li&ecirc;n tục được gi&agrave;y hỗ trợ người chơi giảm lật cổ ch&acirc;n hơn.&nbsp;</p>\r\n\r\n<p>- Từ m&agrave;u sắc đến thiết kế, mẫu gi&agrave;y cầu l&ocirc;ng mới nhất Yonex SHB Comfort Z2 Trắng Cam cho c&aacute;i nh&igrave;n nổi bật v&agrave; ấn tượng, dự đo&aacute;n trong cuối năm nay v&agrave; năm 2021 sắp tới đ&acirc;y sẽ l&agrave; đ&ocirc;i gi&agrave;y được nhiều người ưa chuộng.&nbsp;</p>\r\n\r\n<p>- Với t&ocirc;ng m&agrave;u new 2021 mẫu giầy cầu l&ocirc;ng Yonex&nbsp;SHB Comfort Z2 Trắng Cam được kho&aacute;c l&ecirc;n m&igrave;nh lớp &aacute;o được trau chuốt kh&aacute; tỉ mỉ với t&ocirc;ng m&agrave;u trắng&nbsp;chủ đạo đầy c&aacute; t&iacute;nh&nbsp;tr&ecirc;n phần mặt trước c&ugrave;ng&nbsp;d&acirc;y gi&agrave;y v&agrave; hai đường kẻ b&ecirc;n h&ocirc;ng c&oacute; m&agrave;u cam tươi nổi bật&nbsp;kết hợp ho&agrave;n hảo với t&ocirc;ng m&agrave;u đen mạnh mẽ tr&ecirc;n phần g&oacute;t gi&agrave;y v&agrave; phần l&oacute;t b&ecirc;n trong tạo n&ecirc;n một tổng thể rất ho&agrave;n hảo đảm bảo khi sử dụng tr&ecirc;n s&acirc;n đấu sẽ tăng 200% c&ocirc;ng lực đặc biệt l&agrave; mẫu gi&agrave;y n&agrave;y được thiết kế d&agrave;nh ri&ecirc;ng cho ph&aacute;i nữ&nbsp;nữa đấy.</p>\r\n\r\n<h2><strong>2. Tổng quan&nbsp;mẫu&nbsp;giầy cầu l&ocirc;ng&nbsp;Yonex SHB Comfort Z2 Trắng Cam</strong></h2>\r\n\r\n<p>- M&agrave;u sắc: Trắng/ Cam/ Đen</p>\r\n\r\n<p>- Ph&iacute;a tr&ecirc;n:&nbsp;Double Raschel Mesh</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Durable Skin Light</p>\r\n\r\n<p>- Midsole: Power Cushion</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Power Graphite Sheet</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Power Cushion +</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;Feather Bounce Foam</p>\r\n\r\n<p>- Đế ngo&agrave;i: Cao su</p>\r\n\r\n<p>-&nbsp;Material:&nbsp;POWER CUSHION+, POWER CUSHION, Double Raschel Mesh, Durable Skin Light, Power Graphite Sheet, Feather Bounce Foam</p>\r\n\r\n<p>- Đ&ocirc;i giầy cầu l&ocirc;ng Yonex SHB Comfort Z2 Trắng Cam được sản xuất tại Nhật Bản</p>\r\n\r\n<p><img alt=\"Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/18(8).jpg\" /></p>\r\n\r\n<h3><strong>* Bảng size gi&agrave;y Yonex&nbsp;bao gồm gi&agrave;y cầu l&ocirc;ng&nbsp;Yonex nam SHB Comfort Z2 Trắng Cam</strong></h3>\r\n\r\n<p><img alt=\"Giày cầu lông Yonex SHB Comfort Z2 Vàng đen\" src=\"https://shopvnb.com/uploads/images/Yonex-Shoes-Size-Chart.jpg\" /></p>\r\n\r\n<h2><strong>3. C&ocirc;ng nghệ t&iacute;ch hợp&nbsp;tr&ecirc;n&nbsp;gi&agrave;y cầu l&ocirc;ng&nbsp;Yonex ch&iacute;nh h&atilde;ng&nbsp;SHB Comfort Z2 Trắng Cam</strong></h2>\r\n\r\n<p><strong><u>- POWER CUSHION +:</u>&nbsp;</strong>Bằng c&aacute;ch th&ecirc;m một loại nhựa đ&agrave;n hồi đặc biệt v&agrave;o POWER CUSHION, trong khi vẫn duy tr&igrave; c&aacute;c đặc t&iacute;nh nhẹ th&ocirc;ng thường, khả năng hấp thụ sốc cao được thực hiện.&nbsp;C&aacute;c r&atilde;nh được thiết kế theo m&ocirc; h&igrave;nh mạng tinh thể, với khoảng c&aacute;ch v&agrave; độ s&acirc;u tối ưu, đạt được khả năng phục hồi hơn.&nbsp;So với vật liệu đệm th&ocirc;ng thường, POWER CUSHION mới ＋ tự h&agrave;o về khả năng hấp thụ sốc hơn 28% v&agrave; lực đẩy mạnh hơn 62% tr&ecirc;n đ&ocirc;i gi&agrave;y cầu l&ocirc;ng Yonex ch&iacute;nh h&atilde;ng&nbsp;Comfort Z2 Trắng Cam.</p>\r\n\r\n<p><img alt=\"POWER CUSHION + - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/power_cushion_plus.jpg\" /></p>\r\n\r\n<p>-&nbsp;<strong><u>POWER CUSHION:</u>&nbsp;</strong>Đệm điện YONEX hấp thụ sốc sau đ&oacute; đảo ngược năng lượng t&aacute;c động để chuyển trơn tru sang chuyển động tiếp theo. So với urethane, cấu tr&uacute;c YONEX Power Cushion cung cấp khả năng hấp thụ sốc gấp 3 lần.&nbsp;Khi rơi từ 7m l&ecirc;n tr&ecirc;n tấm đệm, một quả trứng sẽ nảy trở lại 4m m&agrave; kh&ocirc;ng bị hư hại.</p>\r\n\r\n<p><img alt=\"POWER CUSHION - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/14(21).jpg\" /></p>\r\n\r\n<p><strong><u>- TOE ASSIST SHAFE:</u>&nbsp;</strong>Gi&agrave;y cầu l&ocirc;ng cao cấp&nbsp;Yonex&nbsp;SHB Comfort Z2 Trắng Cam<strong>&nbsp;</strong>c&oacute;&nbsp;thiết kế tập trung v&agrave;o ng&oacute;n ch&acirc;n gi&uacute;p giảm &aacute;p lực ở ng&oacute;n ch&acirc;n c&aacute;i, cũng như cung cấp sự hỗ trợ được cải thiện ở giữa b&agrave;n ch&acirc;n v&agrave; g&oacute;t ch&acirc;n cho ph&ugrave; hợp, ổn định.&nbsp;</p>\r\n\r\n<p><img alt=\"TOE ASSIST SHAFE - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/yonex-power-cushion-03-z-men-badminton-shoes05.jpg\" /></p>\r\n\r\n<p><strong>-&nbsp;<u>TOUGHTBRID&nbsp;LIGHT:</u>&nbsp;</strong>ToughBrid Light vẫn duy tr&igrave; hiệu suất ch&iacute;nh x&aacute;c v&igrave; ToughBrid vẫn nhẹ hơn 11% *, tạo ra sự giảm đ&aacute;ng kể căng thẳng ở ch&acirc;n v&agrave; đầu gối.</p>\r\n\r\n<p><strong>-&nbsp;<u>INNER BOOTIE:</u>&nbsp;</strong>Lưỡi g&agrave; kết nối với&nbsp;gi&agrave;y l&agrave;m giảm c&aacute;c lớp chồng ch&eacute;o cho ph&ugrave; hợp hơn gi&uacute;p c&aacute;c l&ocirc;ng thủ thoải m&aacute;i hơn khi mang đ&ocirc;i gi&agrave;y Yonex cầu l&ocirc;ng&nbsp;Comfort Z2 Trắng Cam n&agrave;y.</p>\r\n\r\n<p><img alt=\"INNER BOOTIE - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/Capture11(1).PNG\" /></p>\r\n\r\n<p>-&nbsp;<strong><u>FLEXION UPPER:</u>&nbsp;</strong>Thiết kế kh&ocirc;ng đối xứng với đường d&acirc;y gi&agrave;y&nbsp;cong tạo ra một đường kẻ tự nhi&ecirc;n vừa vặn quanh v&ograve;m b&ecirc;n trong.</p>\r\n\r\n<p><img alt=\"FLEXION UPPER - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/17(10).jpg\" /></p>\r\n\r\n<p><strong><u>- LATERAL SHELL:</u>&nbsp;L</strong>ớp vỏ&nbsp;b&ecirc;n nằm ở b&ecirc;n ngo&agrave;i của b&agrave;n ch&acirc;n trước ngăn trượt ở m&eacute;p đế.&nbsp;N&oacute; l&agrave;m giảm mất năng lượng, tăng phản ứng ch&acirc;n v&agrave; tạo ra c&aacute;c chuyển động ch&acirc;n trơn tru, linh hoạt&nbsp;hơn.</p>\r\n\r\n<p><img alt=\"LATERAL SHELL - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/san_pham/4090.jpg\" /></p>\r\n\r\n<p><strong><u>- SYN CRO FIT INSOLE:</u>&nbsp;</strong>Cấu tr&uacute;c đế YONEX Synchro-Fit Insole tạo ra sự tiếp x&uacute;c an to&agrave;n giữa ch&acirc;n v&agrave; gi&agrave;y, giảm l&atilde;ng ph&iacute; năng lượng th&ocirc;ng qua sự ph&ugrave; hợp được cải thiện.</p>\r\n\r\n<p>H&igrave;nh 1. So với gi&agrave;y cầu l&ocirc;ng th&ocirc;ng thường, phần giữa đến g&oacute;t tr&ecirc;n đế được n&acirc;ng l&ecirc;n để mang lại sự ph&ugrave; hợp được cải thiện giữa b&agrave;n ch&acirc;n v&agrave; gi&agrave;y.</p>\r\n\r\n<p>H&igrave;nh 2. Bằng c&aacute;ch giữ g&oacute;t ch&acirc;n chắc chắn với đế, khoảng c&aacute;ch giữa b&agrave;n ch&acirc;n v&agrave; gi&agrave;y được giảm bớt, cải thiện sự thoải m&aacute;i v&agrave; hiệu suất, đảm bảo b&agrave;n ch&acirc;n c&oacute; độ b&aacute;m tối đa b&ecirc;n trong gi&agrave;y.</p>\r\n\r\n<p><img alt=\"SYN CRO FIT INSOLE - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/16(9).jpg\" /></p>\r\n\r\n<p><strong><u>- POWER GRAPHITE DRIVE:</u>&nbsp;</strong>Một tấm than ch&igrave; được ch&egrave;n dưới phần giữa của b&agrave;n ch&acirc;n để tăng sự ổn định v&agrave; giảm trọng lượng trong gi&agrave;y&nbsp;v&agrave; để đẩy bạn về ph&iacute;a trước cho pha cầu&nbsp;tiếp theo.&nbsp;</p>\r\n\r\n<p><img alt=\"Power Grappite - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/1(36).jpg\" /></p>\r\n\r\n<p><strong><u>- ROUND SOLE:</u>&nbsp;</strong>YONEX Round Sole được thiết kế để cung cấp hỗ trợ to&agrave;n diện cho c&aacute;c bước ch&acirc;n nhanh ch&oacute;ng v&agrave; trơn tru.&nbsp;Round Sole đảm bảo chuyển động trơn tru v&agrave; truyền năng lượng tối đa tr&ecirc;n mẫu gi&agrave;y cầu l&ocirc;ng nữ&nbsp;Yonex&nbsp;Comfort Z2 Trắng Cam.</p>\r\n\r\n<p><img alt=\"ROUND SOLE - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/55.jpg\" /></p>\r\n\r\n<p><strong><u>- HEXAGRIP:</u>&nbsp;</strong>Đối với bước ch&acirc;n nhanh nhẹn v&agrave; ổn định, mẫu hexagrip cung cấp độ b&aacute;m cao hơn 3% v&agrave; nhẹ hơn 20% so với vật liệu đế ti&ecirc;u chuẩn.</p>\r\n\r\n<p><img alt=\"HEXAGRIP - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/Ergoshape-Yones-Badminton-Shoes.jpg\" /></p>\r\n\r\n<p>-&nbsp;<strong><u>DURABLE SKIN LIGHT:</u>&nbsp;</strong>Kết hợp t&iacute;nh linh hoạt giống như cao su với độ cứng của nhựa cứng,&nbsp;<strong>DURABLE SKIN LIGHT&nbsp;</strong>dựa tr&ecirc;n polyurethane cho ph&eacute;p bạn chơi một c&aacute;ch nhẹ nh&agrave;ng&nbsp;tr&ecirc;n&nbsp;đ&ocirc;i ch&acirc;n của bạn trong khi vẫn giữ được sự chắc chắn.&nbsp;</p>\r\n\r\n<p><img alt=\"Durable Skin Light - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/san_pham/9369.jpg\" /></p>\r\n\r\n<p><strong><u>- DOUBLE RASCHEL:</u>&nbsp;</strong>Double Raschel Lưới l&agrave; một lưới si&ecirc;u mịn cực kỳ nhẹ v&agrave; bền.&nbsp;N&oacute; cung cấp trao đổi kh&ocirc;ng kh&iacute; nhiều hơn t&aacute;m lần để giải ph&oacute;ng độ ẩm so với vải lưới th&ocirc;ng thường.</p>\r\n\r\n<p><img alt=\"DOUBLE RASCHEL - Giày cầu lông Yonex SHB Comfort Z2 Trắng Cam\" src=\"https://shopvnb.com/uploads/images/unnamed%20(1)(1).jpg\" /></p>\r\n\r\n<h2><strong>4. Ưu điểm của gi&agrave;y đ&aacute;nh cầu l&ocirc;ng&nbsp;Yonex SHB Comfort Z2 Trắng Cam</strong></h2>\r\n\r\n<p>- Gi&agrave;y đ&aacute;nh&nbsp;cầu l&ocirc;ng Yonex SHB Comfort&nbsp;Z2 Trắng Cam được đ&aacute;nh gi&aacute; l&agrave; đ&ocirc;i gi&agrave;y c&oacute; t&iacute;nh bền bỉ cao, mọi đường chỉ may, vết d&aacute;n keo đều v&ocirc; c&ugrave;ng chắc chắn kh&ocirc;ng c&oacute; lỗi.</p>\r\n\r\n<p>- Giầy cầu l&ocirc;ng Yonex nữ&nbsp;SHB Comfort Z2 Trắng Cam&nbsp;&ocirc;m gọn b&agrave;n ch&acirc;n, tho&aacute;ng kh&iacute;, mặt đế cao su tự nhi&ecirc;n rất b&aacute;m s&agrave;n, chống trơn trượt. Gi&uacute;p người chơi cầu l&ocirc;ng linh hoạt tr&ecirc;n s&acirc;n đấu, hạn chế tối đa chấn thương.</p>\r\n\r\n<p>- Gi&agrave;y cầu l&ocirc;ng Z2 Trắng Cam SHB Comfort ph&ugrave; hợp với mọi mặt s&agrave;n từ thảm cầu l&ocirc;ng, thảm thi đấu đa năng, s&acirc;n xi măng, s&acirc;n gạch hay s&acirc;n b&ecirc; t&ocirc;ng&hellip;</p>\r\n\r\n<p>- Ngo&agrave;i lớp đệm kh&iacute; Power Cushion, l&oacute;t gi&agrave;y c&ograve;n th&ecirc;m một lớp đệm kh&iacute; ở phần gan b&agrave;n ch&acirc;n v&agrave; phần g&oacute;t tăng th&ecirc;m độ &ecirc;m &aacute;i cho người d&ugrave;ng.</p>\r\n\r\n<p>-&nbsp;Gi&agrave;y cầu l&ocirc;ng Yonex&nbsp;SHB Comfort Z2&nbsp;Trắng Cam l&agrave; mẫu gi&agrave;y ho&agrave;n hảo, th&agrave;nh c&ocirc;ng nhất cảu Yonex chắc chắn sẽ l&agrave;m bạn h&agrave;i l&ograve;ng về mọi mặt khi sử dụng, l&agrave; sản phẩm ưu việt cho bộ dụng cụ thi đấu cầu l&ocirc;ng của c&aacute;c anh em l&ocirc;ng thủ.</p>\r\n', ''),
(83, 192, 5, 'Vợt cầu lông Victor ARS-80X chính hãng', 3890000, 99, 100, 'auraspeed-80x_1.jpg', '<p><strong>Vợt cầu l&ocirc;ng Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng - &Aacute;p đảo mọi mặt trận tr&ecirc;n s&acirc;n cầu&nbsp;</strong></p>\r\n\r\n<h2><strong>1. Giới thiệu về vợt cầu l&ocirc;ng&nbsp;Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p>- Vợt cầu l&ocirc;ng Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng được x&acirc;y dựng tr&ecirc;n nền tảng c&ocirc;ng nghệ 3D Calibar v&agrave; c&oacute; thiết kế khung vợt kh&iacute; động học&nbsp;c&ocirc;ng nghệ cao, gi&uacute;p giảm đ&aacute;ng kể sức cản của kh&ocirc;ng kh&iacute;,&nbsp;n&oacute; tạo ra tốc độ vung vợt&nbsp;nhanh hơn cho những c&uacute; đập tốc độ cao.</p>\r\n\r\n<p>-<strong>&nbsp;</strong>Đ&acirc;y&nbsp;l&agrave; c&acirc;y vợt thuộc ph&acirc;n kh&uacute;c cao cấp&nbsp;của nh&agrave; sản xuất cầu l&ocirc;ng h&agrave;ng đầu thế giới đến trừ Trung Quốc. Lining 3D Calibar 800 đồng h&agrave;nh c&ugrave;ng c&aacute;c vận động vi&ecirc;n chuy&ecirc;n nghiệp như tay vợt đơn nữ số 1 hiện nay&nbsp;Chen Yufei đ&atilde; từng sử dụng trong một thời gian d&agrave;i, gặt h&aacute;i được rất nhiều th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>-&nbsp;Được sản xuất ri&ecirc;ng cho c&aacute;c tay vợt thi đấu chuy&ecirc;n nghiệp, c&acirc;y vợt&nbsp;được t&iacute;ch hợp rất nhiều c&ocirc;ng nghệ nổi bật để&nbsp;tạo hiệu quả tốt nhất cho người chơi như&nbsp;<strong>3D CALIBAR&nbsp;TECHNOLOGY PLATFORM,&nbsp;DYNAMIC-OPTIMUM FRAME,&nbsp;BIO INNER CONE,...</strong>từng bước khẳng định vị thế của một si&ecirc;u phẩm to&agrave;n diện nhất hiện nay.</p>\r\n\r\n<p>- Chất liệu Carbon Fiber c&oacute; độ dẻo dai tốt, kh&ocirc;ng chỉ chắn chắn m&agrave; khối lượng vật liệu lại nhẹ, cấu tr&uacute;c khung vợt&nbsp;c&oacute; hệ số cản kh&ocirc;ng kh&iacute;&nbsp;cực thấp v&agrave; cường độ cao, tạo n&ecirc;n khả năng to&agrave;n diện&nbsp;cho người chơi trong c&aacute;c pha đ&aacute;nh cầu&nbsp;kh&aacute;c nhau.</p>\r\n\r\n<p>- Th&acirc;n vợt c&oacute; độ cứng nhất định&nbsp;cho cảm gi&aacute;c vung vợt nhanh v&agrave; chắc chắn hơn. Hạn chế được tối đa cảm gi&aacute;c rung lắc hay xoắn vặn vợt sau sau mỗi c&uacute; đ&aacute;nh v&agrave; cảm gi&aacute;c ổn định hơn d&ugrave; điểm tiếp x&uacute;c&nbsp;giữ vợt v&agrave; cầu kh&ocirc;ng nằm trong điểm ngọt của mặt khung.&nbsp;</p>\r\n\r\n<p>- Lining lu&ocirc;n c&oacute; những thiết kế v&ocirc;&nbsp;c&ugrave;ng bắt mắt với những chi tiết hiện đại, m&agrave;u sắc vừa ấn tượng, vừa h&agrave;i h&ograve;a, chất sơn cao cấp c&ugrave;ng thời gian. c&acirc;y vợt cao cấp Lining calibar 800 cũng vậy, nổi bật với m&agrave;u sơn xanh lục, mạnh mẽ v&agrave; mang đến cảm gi&aacute;c chắc chắn, ổn định trong thiết kế c&aacute;c chi tiết c&ugrave;ng m&agrave;u xanh &aacute;nh kim. Đ&acirc;y l&agrave; c&acirc;y vợt thật sự vượt ngo&agrave;i những g&igrave; bạn mong đợi v&agrave; đầu tư v&agrave;o.</p>\r\n\r\n<h2><strong>2. Th&ocirc;ng số về vợt cầu l&ocirc;ng cao cấp Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p>- Độ cứng&nbsp;th&acirc;n: Cứng trung b&igrave;nh</p>\r\n\r\n<p>- Khung vợt:&nbsp;Military Grade Carbon Fiber</p>\r\n\r\n<p>- Th&acirc;n vợt:&nbsp;Military Grade Carbon Fiber</p>\r\n\r\n<p>- Trọng lượng:&nbsp;W3 85-89 gram</p>\r\n\r\n<p>- Chu vi c&aacute;n vợt:&nbsp;S2, Small 3 1/4&quot;/82.6mm</p>\r\n\r\n<p>- Chiều d&agrave;i c&aacute;n vợt: 200mm</p>\r\n\r\n<p>- Chiều d&agrave;i vợt: 675mm</p>\r\n\r\n<p>- Sức căng tối đa:&nbsp;dọc 26-30 lbs, ngang 28-32 lbs</p>\r\n\r\n<p>- Điểm c&acirc;n bằng: 298mm&nbsp;</p>\r\n\r\n<p>- M&agrave;u sắc 3D Calibar&nbsp;800: Xanh lục/ Xanh &aacute;nh kim</p>\r\n\r\n<p>- Sản xuất: Trung Quốc</p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/2(1).PNG\" /></p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/3(1).PNG\" /></p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/4.PNG\" /></p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/5(1).PNG\" /></p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/6(1).PNG\" /></p>\r\n\r\n<p><img alt=\"Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/7.PNG\" /></p>\r\n\r\n<h2><strong>3. C&ocirc;ng nghệ &aacute;p dụng l&ecirc;n c&acirc;y vợt đẳng cấp&nbsp;Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng</strong></h2>\r\n\r\n<p><strong><u>- 3D Calibar Technology Platform:</u></strong>&nbsp;C&acirc;y vợt đẳng cấp&nbsp;Lining 3D Calibar 800 ch&iacute;nh h&atilde;ng<strong>&nbsp;</strong>được x&acirc;y dựng tr&ecirc;n nền tảng c&ocirc;ng nghệ Calibar Li-Ning 3D c&oacute; thiết kế khung vợt cầu l&ocirc;ng h&igrave;nh học c&ocirc;ng nghệ cao, gi&uacute;p giảm đ&aacute;ng kể sức cản của kh&ocirc;ng kh&iacute;.&nbsp;N&oacute; tạo ra tốc độ swing nhanh hơn cho những c&uacute; đập lớn hơn v&agrave; nhận được những đ&aacute;nh gi&aacute; nổi bật từ những người chơi mạnh mẽ đang t&igrave;m kiếm sức mạnh tối đa.</p>\r\n\r\n<p><img alt=\"3D Calibar Technology Platform - Vợt cầu lông Lining 3D Calibar 800 chính hãng\" src=\"https://shopvnb.com/uploads/images/HTB1UwhhXdzvK1RkSnfoq6zMwVXao.jpg\" /></p>\r\n\r\n<p><strong><u>- WING STABILIZER:</u></strong>&nbsp;Giới thiệu thiết kế c&ocirc;ng nghệ h&agrave;ng kh&ocirc;ng giải ph&oacute;ng bộ nhớ hiệu suất kim loại v&agrave; cải thiện kiểm so&aacute;t tr&ecirc;n c&aacute;c n&eacute;t. Lining calibar 800 ứng dụng ch&eacute;o của c&ocirc;ng nghệ h&agrave;ng kh&ocirc;ng tr&ecirc;n c&aacute;c sản phẩm Li Ning l&agrave; cơ chế ổn định c&aacute;nh. N&oacute; sẽ điều khiển phục hồi khung ch&iacute;nh x&aacute;c tại thời điểm biến dạng v&agrave; để hạn chế rung do s&oacute;ng rung từ mỗi c&uacute; đ&aacute;nh. Hiệu suất chống xoắn của vợt được cải thiện trong điều kiện căng thẳng cao v&agrave; mang lại một c&uacute; đ&aacute;nh thứ hai nhanh ch&oacute;ng, ch&iacute;nh x&aacute;c v&agrave; ổn định.</p>\r\n', '<p>M&ocirc; tả ngắn</p>\r\n'),
(85, 192, 5, 'Vợt cầu lông Victor MX 80B chính hãng', 3695000, 98, 100, 'pp_0008403_vot-cau-long-victor-mx-80b_1000.jpeg', '', ''),
(87, 192, 4, 'Vợt cầu lông Yonex Astrox 99 sapphire navy (năm 2020)', 3399000, 98, 100, 'astrox-99.jpg', '', ''),
(89, 192, 5, 'Vợt cầu lông Victor BS12', 3100000, 34, 50, 'pp_0008314_vot-cau-long-victor-bs12-tang-vot-jetspeed-s-011tk9-ao-victor-chinh-hang_1000.jpeg', '', ''),
(90, 192, 4, 'Vợt cầu lông Yonex Astrox 00 chính hãng', 2959000, 95, 100, 'AX00.jpg', '', ''),
(91, 192, 8, 'Vợt cầu lông Adidas Uberschall F3 Xanh chuối Đỏ chính hãng', 2670000, 93, 100, 'Adidas Uberschall F3 Xanh chuoi Do.png', '<p>M&ocirc; tả Adidas</p>\r\n', ''),
(92, 194, 4, 'Quần cầu lông Yonex Q3 nữ - Xám', 110000, 198, 200, 'quan-cau-long-yonex-q3-nu-xam.jpg', '<p>M&ocirc; tả quần cầu l&ocirc;ng</p>\r\n', '<p>M&ocirc; tả&nbsp; ngắn quần</p>\r\n'),
(93, 194, 6, 'Quần cầu lông Mizuno nam đen- Mã 258', 124000, 199, 200, '3_48.jpg', '', ''),
(94, 206, 2, 'Túi cầu lông Lining ABJQ 042-2 chính hãng', 1900000, 200, 200, 'Tui ABJQ 042-2.png', '', '<p>T&uacute;i cầu l&ocirc;ng Lining ABJQ 042-2 ch&iacute;nh h&atilde;ng với thiết kế b&ecirc;n ngo&agrave;i phong c&aacute;ch thể thao, m&agrave;u sắc khỏe khoắn sẽ gi&uacute;p bạn thể hiện sự c&aacute; t&iacute;nh, tinh thần thể thao m&aacute;u lửa trong cuộc chơi.</p>\r\n'),
(95, 206, 2, 'Túi cầu lông Lining ABJQ 072-2 chính hãng', 1530000, 20, 20, 'Tui ABJQ 072-2.png', '', '<p>Những mẫu t&uacute;i cầu l&ocirc;ng Lining đ&atilde; qu&aacute; nổi tiếng tr&ecirc;n thị trường quốc tế. Kh&ocirc;ng những c&oacute; nước sơn cực k&igrave; hiện đại, thiết kế đẹp mắt, thời thượng, gi&aacute; cả lại phải chẳng bao gồm mẫu t&uacute;i cầu l&ocirc;ng Lining ABJQ 072-2 ch&iacute;nh h&atilde;ng.</p>\r\n'),
(96, 206, 4, 'Túi Cầu Lông Yonex BAG01WLD', 1400000, 150, 150, 'pp_0003809_2206_p_1430177361835_1000.jpeg', '', '<p>T&uacute;i Cầu L&ocirc;ng Yonex BAG01WLD l&agrave; mẫu t&uacute;i chất lượng, bền bỉ, phong c&aacute;ch thiết kế thời thượng, hiện đại cộng với m&agrave;u sắc đặc trưng được sản xuất v&agrave;o năm 2019 d&agrave;nh ri&ecirc;ng cho VĐV huyền thoại thế giới Lin Dan.</p>\r\n'),
(97, 206, 4, 'Túi cầu lông Yonex BA26LTDEX Trắng', 1250000, 0, 0, 'Yonex BA26LTDEX_1.png', '', ''),
(98, 206, 5, 'Túi cầu lông Victor BR 9609 RC xanh chính hãng', 900000, 250, 250, 'Yonex BA26LTDEX_1.png', '', '<p>T&uacute;i cầu l&ocirc;ng Victor BR 9609 CR xanh ch&iacute;nh h&atilde;ng l&agrave; mẫu t&uacute;i chuy&ecirc;n dụng d&agrave;nh cho cầu l&ocirc;ng với chất liệu bền bỉ, m&agrave;u sắc bắt mắt, gi&aacute; cả phải chăng.</p>\r\n'),
(101, 207, 4, 'Dây cước căng vợt Yonex BG 66 ULTIMAX', 160000, 200, 200, 'BG 66 U.png', '', '<p>Yonex BG66 ULTIMAX l&agrave; sợi cước ho&agrave;n hảo nhất của nh&agrave; Yonex được đa số vận động vi&ecirc;n thế giới hiện nay sử dụng.</p>\r\n'),
(103, 207, 4, 'Dây cước căng vợt Yonex BG 66 ULTIMAX LD', 160000, 298, 299, 'day-cuoc-cau-long-yonex-bg66-uiltimax-lindan-mau-do.jpg', '', '<p>Yonex BG 66 ULTIMAX LD l&agrave; loại cước căng vợt mới được cải tiếng từ 66U d&agrave;nh cho vận động vi&ecirc;n Huyền thoại Lindan sử dụng. Đ&acirc;y l&agrave; loại d&acirc;y thi&ecirc;n về đ&aacute;nh đơn cho độ nảy cao, mặt vợt cứng hơn đ&ocirc;i ch&uacute;t so với 66 UM.</p>\r\n'),
(104, 207, 4, 'Dây cước căng vợt Yonex BG SKY', 200000, 100, 100, 'Sky Arc.png', '', '<p>D&acirc;y cước căng vợt Yonex BG SKY l&agrave; loại d&acirc;y thi&ecirc;n về kiểm so&aacute;t cầu, c&ocirc;ng thủ to&agrave;n diện với độ hấp thụ shock l&ecirc;n đến 11/10, đ&acirc;y l&agrave; loại d&acirc;y ho&agrave;n hảo d&agrave;nh cho đ&aacute;nh đơn.</p>\r\n'),
(105, 207, 2, 'Dây cước căng vợt Lining No.1 - Nội Địa', 140000, 100, 100, 'no1 noi dia.png', '', '<p>D&acirc;y cước căng vợt Lining No.1 đang g&acirc;y b&atilde;o tr&ecirc;n thị trường hiện nay, hầu như c&aacute;c vận động vi&ecirc;n thi đấu sử dụng vợt Lining đều đan loại d&acirc;y n&agrave;y.</p>\r\n');

--
-- Triggers `hang_hoa`
--
DELIMITER $$
CREATE TRIGGER `KiemTraSoLuong1` BEFORE UPDATE ON `hang_hoa` FOR EACH ROW BEGIN
	IF new.SOLUONGHANG < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = N'Không đủ số lượng';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
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
-- Dumping data for table `khachhang`
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
(15, 'user10', '1', 'user10', 'q', '1', 0),
(16, 'u1', '1', 'u1', '1', '1', 0),
(17, 'hoai1', '1', '1', '1', '1', 0),
(18, 'a1', '1', 'a1', '1', '1', 0),
(19, 'a2', '1', 'a2', '1', '1', 0),
(20, 'a3', '1', 'a3', '1', '1', 0),
(21, 'tlhoai', '1', 'tolehoai', 'Can Tho', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
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
-- Table structure for table `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MANHOM` int(20) NOT NULL,
  `TENNHOM` varchar(128) DEFAULT NULL,
  `nhomhanghoa_slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MANHOM`, `TENNHOM`, `nhomhanghoa_slug`) VALUES
(192, 'Vợt cầu lông', 'vot-cau-long'),
(194, 'Quần cầu lông', 'quan-cau-long'),
(195, 'Áo cầu lông', 'ao-cau-long'),
(205, 'Giày cầu lông', 'giay-cau-long'),
(206, 'Túi Cầu Lông', 'tui-cau-long'),
(207, 'Phụ kiện cầu lông', 'phu-kien-cau-long');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(128) NOT NULL,
  `PASSWORD` varchar(128) DEFAULT NULL,
  `LOAITAIKHOAN` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`USERNAME`, `PASSWORD`, `LOAITAIKHOAN`) VALUES
('admin', 'admin', 1),
('user', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `ma_thuong_hieu` int(11) NOT NULL,
  `ten_thuong_hieu` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`ma_thuong_hieu`, `ten_thuong_hieu`, `slug`) VALUES
(2, 'Lining', 'lining'),
(4, 'Yonex', 'yonex'),
(5, 'Victor', 'victor'),
(6, 'Mizuno', 'mizuno'),
(7, 'Apacs', 'apacs'),
(8, 'Adidas', 'adidas');

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu_nhom_hang_hoa`
--

CREATE TABLE `thuong_hieu_nhom_hang_hoa` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `MANHOM` int(11) NOT NULL,
  `ten_day_du` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuong_hieu_nhom_hang_hoa`
--

INSERT INTO `thuong_hieu_nhom_hang_hoa` (`MATHUONGHIEU`, `MANHOM`, `ten_day_du`) VALUES
(22, 193, 'giay-cau-long-yonex'),
(22, 193, 'giay-cau-long-yonex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`MSHS`,`ma_gio_hang`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SODONDH`),
  ADD KEY `I_FK_DATHANG_KHACHHANG` (`MSKH`),
  ADD KEY `I_FK_DATHANG_NHANVIEN` (`MSNV`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`MSHS`),
  ADD KEY `I_FK_HANG_HOA_NHOMHANGHOA` (`MANHOM`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD KEY `I_FK_KHACHHANG_TAIKHOAN` (`USERNAME`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD KEY `I_FK_NHANVIEN_TAIKHOAN` (`USERNAME`);

--
-- Indexes for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MANHOM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`ma_thuong_hieu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `MSHS` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  MODIFY `MANHOM` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `ma_thuong_hieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`MSHS`) REFERENCES `hang_hoa` (`MSHS`);

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuong_hieu` (`ma_thuong_hieu`),
  ADD CONSTRAINT `hang_hoa_ibfk_2` FOREIGN KEY (`MANHOM`) REFERENCES `nhomhanghoa` (`MANHOM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
