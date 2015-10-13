-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2015 at 02:03 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_tmdt2`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Created` datetime NOT NULL,
  `LastEdited` datetime NOT NULL,
  `Published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`ID`, `UserName`, `PassWord`, `Created`, `LastEdited`, `Published`) VALUES
(1, 'Administrator', 'P@ssw0rd??', '2014-05-06 20:50:21', '2014-05-06 20:50:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(255) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `FileName`, `Path`, `Thumb`) VALUES
(1, '1fc88a0b8838db9594c60d9f5335ab52.jpg', 'assets/userpage_gioithieucongty/1/1fc88a0b8838db9594c60d9f5335ab52.jpg', 'assets/userpage_gioithieucongty/1/1fc88a0b8838db9594c60d9f5335ab52_thumb.jpg'),
(2, '25a6a226d9e69a6a3be4d9a8b301556e.jpg', 'assets/userpage_sanpham/13/25a6a226d9e69a6a3be4d9a8b301556e.jpg', 'assets/userpage_sanpham/13/25a6a226d9e69a6a3be4d9a8b301556e_thumb.jpg'),
(3, '32fd6c3bedb268390fde26d372dde2fd.png', 'assets/userpage_sanpham/13/32fd6c3bedb268390fde26d372dde2fd.png', 'assets/userpage_sanpham/13/32fd6c3bedb268390fde26d372dde2fd_thumb.png'),
(4, 'ee502969d12472d2e8539b71e3008142.png', 'assets/userpage_sanpham/13/ee502969d12472d2e8539b71e3008142.png', 'assets/userpage_sanpham/13/ee502969d12472d2e8539b71e3008142_thumb.png'),
(5, '88abcda441aa7b34959b50bb12f03b85.jpg', 'assets/userpage_sanpham/13/88abcda441aa7b34959b50bb12f03b85.jpg', 'assets/userpage_sanpham/13/88abcda441aa7b34959b50bb12f03b85_thumb.jpg'),
(6, '29ce90815698722d1be304461af91412.jpg', 'assets/userpage_sanpham/13/29ce90815698722d1be304461af91412.jpg', 'assets/userpage_sanpham/13/29ce90815698722d1be304461af91412_thumb.jpg'),
(7, 'b5d3b69d25e3dea7085b02dae7fe2a38.png', 'assets/userpage_sanpham/15/b5d3b69d25e3dea7085b02dae7fe2a38.png', 'assets/userpage_sanpham/15/b5d3b69d25e3dea7085b02dae7fe2a38_thumb.png'),
(8, 'b041721d2d13afa8e9fe27cab0307fce.png', 'assets/userpage_sanpham/15/b041721d2d13afa8e9fe27cab0307fce.png', 'assets/userpage_sanpham/15/b041721d2d13afa8e9fe27cab0307fce_thumb.png'),
(9, '98c15ef8f112e3d7b28dede0da903495.png', 'assets/userpage_sanpham/15/98c15ef8f112e3d7b28dede0da903495.png', 'assets/userpage_sanpham/15/98c15ef8f112e3d7b28dede0da903495_thumb.png'),
(11, '62003a674418631ca0d4243799280a1a.png', 'assets//62003a674418631ca0d4243799280a1a.png', 'assets//62003a674418631ca0d4243799280a1a_thumb.png');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_cachcungcap`
--

CREATE TABLE IF NOT EXISTS `gianhang_cachcungcap` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gianhang_cachcungcap`
--

INSERT INTO `gianhang_cachcungcap` (`ID`, `Title`) VALUES
(1, 'Gia công'),
(2, 'Hàng có sẵn'),
(3, 'Dịch vụ thiết kế & phát triển');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_chukymuahang`
--

CREATE TABLE IF NOT EXISTS `gianhang_chukymuahang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gianhang_chukymuahang`
--

INSERT INTO `gianhang_chukymuahang` (`ID`, `Title`) VALUES
(1, 'Nhanh hơn 1 tháng'),
(2, '1 - 3 tháng'),
(3, '3 - 6 tháng'),
(4, '6 tháng - 1 năm'),
(5, 'Trên 1 năm');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_chungnhan_bangsangche`
--

CREATE TABLE IF NOT EXISTS `gianhang_chungnhan_bangsangche` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Masobangsangche` varchar(255) NOT NULL,
  `Tenbangsangche` varchar(255) NOT NULL,
  `LoaibangsangcheID` int(11) NOT NULL,
  `Ngaycap` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gianhang_chungnhan_bangsangche`
--

INSERT INTO `gianhang_chungnhan_bangsangche` (`ID`, `ShopID`, `Masobangsangche`, `Tenbangsangche`, `LoaibangsangcheID`, `Ngaycap`) VALUES
(1, 1, 'MS12456', 'Bằng sangc she A', 1, '1/2/2013');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_chungnhan_chungnhanvabaocaothunghiem`
--

CREATE TABLE IF NOT EXISTS `gianhang_chungnhan_chungnhanvabaocaothunghiem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `LoaichungnhanID` int(11) NOT NULL,
  `Sochungnhan` varchar(255) NOT NULL,
  `Donvicapchungnhan` varchar(255) NOT NULL,
  `TenchungnhanID` int(11) NOT NULL,
  `Ngaycap` varchar(255) NOT NULL,
  `Ngayhethan` varchar(255) NOT NULL,
  `Tomtat` text NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_chungnhan_chungnhanvabaocaothunghiem`
--

INSERT INTO `gianhang_chungnhan_chungnhanvabaocaothunghiem` (`ID`, `ShopID`, `LoaichungnhanID`, `Sochungnhan`, `Donvicapchungnhan`, `TenchungnhanID`, `Ngaycap`, `Ngayhethan`, `Tomtat`, `Image1`, `Image2`, `Image3`) VALUES
(6, 1, 1, '10', 'HCM', 4, '3/2/2001', '3/3/2010', 'Chứng nhận này kiểm chứng dây chuyền sản xuất sản phẩm thùng carton...\\r\\n									', '', '', ''),
(7, 1, 1, '', '', 1, 'Ngày/Tháng/Năm', 'Ngày/Tháng/Năm', '\\r\\n									', '', '', ''),
(8, 1, 1, '5', '', 4, 'Ngày/Tháng/Năm', 'Ngày/Tháng/Năm', '\\r\\n									', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_chungnhan_giaithuong`
--

CREATE TABLE IF NOT EXISTS `gianhang_chungnhan_giaithuong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Tengiaithuong` varchar(255) NOT NULL,
  `Donvicapgiaithuong` varchar(255) NOT NULL,
  `Ngaycap` varchar(255) NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  `Tomtat` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gianhang_chungnhan_giaithuong`
--

INSERT INTO `gianhang_chungnhan_giaithuong` (`ID`, `ShopID`, `Tengiaithuong`, `Donvicapgiaithuong`, `Ngaycap`, `Image1`, `Image2`, `Image3`, `Tomtat`) VALUES
(1, 1, 'Giải thưởng 1', 'Ủy ban HCM', '9/2/2011', '', '', '', 'sdddddd						');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_chungnhan_thuonghieu`
--

CREATE TABLE IF NOT EXISTS `gianhang_chungnhan_thuonghieu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Sodangky` varchar(255) NOT NULL,
  `Tenthuonghieu` varchar(255) NOT NULL,
  `Ngaycap` varchar(255) NOT NULL,
  `Ngayhethan` varchar(255) NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  `Tomtat` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gianhang_chungnhan_thuonghieu`
--

INSERT INTO `gianhang_chungnhan_thuonghieu` (`ID`, `ShopID`, `Sodangky`, `Tenthuonghieu`, `Ngaycap`, `Ngayhethan`, `Image1`, `Image2`, `Image3`, `Tomtat`) VALUES
(1, 1, 'DK123456', 'Thương hiệu A', '2/2/2015', '2//', '', '', '', 'ABC'),
(2, 1, 'DK2222', 'Thương hiệu B', '6/3/2013', '3//', '', '', '', 'ABC							'),
(3, 1, 'DK5', 'Thương hiệu C', '1/1/2011', '5//', '', '', '', 'TÓm tắt					'),
(4, 1, 'DK155', 'Thương hiệu F', '2/2/2012', '16/4/2015', '', '', '', 'AAAAA					');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_danhmucsanpham`
--

CREATE TABLE IF NOT EXISTS `gianhang_danhmucsanpham` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaKeywords` varchar(255) NOT NULL,
  `MetaDescription` text NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Published` tinyint(1) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `LastEdited` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_dientichnhamay`
--

CREATE TABLE IF NOT EXISTS `gianhang_dientichnhamay` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_dientichnhamay`
--

INSERT INTO `gianhang_dientichnhamay` (`ID`, `Title`) VALUES
(1, 'Dưới 1000 mét vuông'),
(2, '1000 - 3000 mét vuông'),
(3, '3000 - 5000 mét vuông'),
(4, '5000 - 10.000 mét vuông'),
(5, '10.000 - 30.000 mét vuông'),
(6, '30.000 - 50.000 mét vuông'),
(7, '50.000 - 10.000 mét vuông'),
(8, 'Trên 100.000 mét vuông');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_dientichvanphong`
--

CREATE TABLE IF NOT EXISTS `gianhang_dientichvanphong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gianhang_dientichvanphong`
--

INSERT INTO `gianhang_dientichvanphong` (`ID`, `Title`) VALUES
(1, 'Dưới 100 mét vuông'),
(2, '101 - 500 mét vuông'),
(3, '501 - 1000 mét vuông'),
(4, '1001 - 2000 mét vuông'),
(5, 'Trên 2000 mét vuông');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_donvi`
--

CREATE TABLE IF NOT EXISTS `gianhang_donvi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `gianhang_donvi`
--

INSERT INTO `gianhang_donvi` (`ID`, `Title`) VALUES
(1, 'Mẫu anh'),
(2, 'Am pe/Amp'),
(3, 'Túi'),
(4, 'Thùng'),
(5, 'Lưỡi lam'),
(6, 'Hộp'),
(7, 'Giạ'),
(8, 'Carat'),
(9, 'Thùng Carton'),
(10, 'Bao'),
(11, 'Vỏ'),
(12, 'Centimeter/CM'),
(13, 'Dây xích'),
(14, 'Combo'),
(15, 'cm3'),
(16, 'ft3'),
(17, 'in3'),
(18, 'm3 '),
(19, 'yd3'),
(20, 'Độ C'),
(21, 'Độ F'),
(22, 'Tá'),
(23, 'Fl.oz'),
(24, 'Thước'),
(25, 'Furlong'),
(26, 'Gallon'),
(27, 'Gill/Gin'),
(28, 'Grain'),
(29, 'Gram'),
(30, '12 tá'),
(31, 'Héc ta'),
(32, 'vô tuyến điện/hertz'),
(33, 'Inch'),
(34, 'Kiloampere'),
(35, 'KG'),
(36, 'Kiloohm'),
(37, 'Kilovolt'),
(38, 'Kilowatt'),
(39, 'Lít'),
(40, 'Tấn Anh'),
(41, 'Megahertz'),
(42, 'Tấn'),
(43, 'Dặm'),
(44, 'Miliampere'),
(45, 'mg'),
(46, 'mh'),
(47, 'mm'),
(48, 'Milliohm'),
(49, 'Millivolt'),
(50, 'Milliwatt'),
(51, 'Hải lý'),
(52, 'Ohm'),
(53, 'Oz'),
(54, 'Gói'),
(55, 'Đôi'),
(56, 'Pallet'),
(57, 'Lô'),
(58, 'Pec/Perch'),
(59, 'Cái'),
(60, 'Pt/panh'),
(61, 'Cây'),
(62, 'Cực'),
(63, 'Pound/IP'),
(64, 'Lít anh/qt'),
(65, 'Quarter'),
(66, 'Gậy'),
(67, 'Cuộn'),
(68, 'Bộ'),
(69, 'Tấm'),
(70, 'Tấn Mỹ'),
(71, 'CM2'),
(72, 'Ft2'),
(73, 'Ft2'),
(74, 'In2'),
(75, 'M2'),
(76, 'Mi2'),
(77, 'Yd2'),
(78, 'Đá'),
(79, 'Tấn'),
(80, 'Khay'),
(81, 'Mâm'),
(82, 'Volt'),
(83, 'Watt'),
(84, 'Wp'),
(85, 'Yard'),
(86, 'Ream/Ram');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_giatrimuahangmoinam`
--

CREATE TABLE IF NOT EXISTS `gianhang_giatrimuahangmoinam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gianhang_giatrimuahangmoinam`
--

INSERT INTO `gianhang_giatrimuahangmoinam` (`ID`, `Title`) VALUES
(1, '100 - 200'),
(2, '200 - 500'),
(3, '500 - 1000'),
(4, '1000 - 5000'),
(5, '5000 - 10000'),
(6, '10000 - 30000'),
(7, 'Nhiều hơn 30 tỷ');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_gioithieucongty`
--

CREATE TABLE IF NOT EXISTS `gianhang_gioithieucongty` (
  `ID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Logo` int(11) NOT NULL,
  `Gioithieuchitiet` text NOT NULL,
  `Trangthaithamgiatrienlam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gianhang_gioithieucongty`
--

INSERT INTO `gianhang_gioithieucongty` (`ID`, `ShopID`, `Logo`, `Gioithieuchitiet`, `Trangthaithamgiatrienlam`) VALUES
(0, 1, 1, '																																																																																																																																																																																																																																																																																																																																																																																										sdsd																																																																																																																																																																																																																																																																																																																																																																	', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_hoichotrienlam`
--

CREATE TABLE IF NOT EXISTS `gianhang_hoichotrienlam` (
  `ID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Thoidiem_thang` int(11) NOT NULL,
  `Thoidiem_nam` int(11) NOT NULL,
  `TinhthanhID` int(11) NOT NULL,
  `Gioithieutomtat` text NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  `Tenhoichotrienlam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gianhang_hoichotrienlam`
--

INSERT INTO `gianhang_hoichotrienlam` (`ID`, `ShopID`, `Thoidiem_thang`, `Thoidiem_nam`, `TinhthanhID`, `Gioithieutomtat`, `Image1`, `Image2`, `Image3`, `Tenhoichotrienlam`) VALUES
(0, 1, 4, 2012, 26, '																																																																																																																																																																																																												sdasdas																																																																																																																																																																																																																																																										', 'assets/userpage_gioithieucongty/1/53443841ed7b065c49cea5cd2b55f5a3.jpg', 'assets/userpage_gioithieucongty/1/f3d00445cc9e6566b62ef37007c5c734.png', 'assets/userpage_gioithieucongty/1/0afaa6601b590e0e9fd0c4b1f0b12eb5.png', 'Hội chợ A');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_loaibangsangche`
--

CREATE TABLE IF NOT EXISTS `gianhang_loaibangsangche` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gianhang_loaibangsangche`
--

INSERT INTO `gianhang_loaibangsangche` (`ID`, `Title`) VALUES
(1, 'Bằng phát minh'),
(2, 'Bằng thiết kế'),
(3, 'Bằng độc quyền giải pháp hữu ích');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_loaichungnhan`
--

CREATE TABLE IF NOT EXISTS `gianhang_loaichungnhan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gianhang_loaichungnhan`
--

INSERT INTO `gianhang_loaichungnhan` (`ID`, `Title`) VALUES
(1, 'Chứng nhận hệ thống quản lý'),
(2, 'Chứng nhận / Chứng chỉ chất lượng sản phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_loaihinhkinhdoanh`
--

CREATE TABLE IF NOT EXISTS `gianhang_loaihinhkinhdoanh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gianhang_loaihinhkinhdoanh`
--

INSERT INTO `gianhang_loaihinhkinhdoanh` (`ID`, `Title`, `Published`) VALUES
(1, 'Dịch vụ', 1),
(2, 'Thương mại', 1),
(3, 'Sản xuất', 1),
(4, 'Thương mại / sản xuất', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_nhansudambaochatluong`
--

CREATE TABLE IF NOT EXISTS `gianhang_nhansudambaochatluong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gianhang_nhansudambaochatluong`
--

INSERT INTO `gianhang_nhansudambaochatluong` (`ID`, `Title`) VALUES
(1, 'Ít hơn 5 người'),
(2, '5 - 10 người'),
(3, '11 - 20 người'),
(4, '21 - 30 người'),
(5, '31 - 40 người'),
(6, '41 - 50 người'),
(7, 'Trên 50 người');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_nhansunghiencuuvaphattrien`
--

CREATE TABLE IF NOT EXISTS `gianhang_nhansunghiencuuvaphattrien` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gianhang_nhansunghiencuuvaphattrien`
--

INSERT INTO `gianhang_nhansunghiencuuvaphattrien` (`ID`, `Title`) VALUES
(1, 'Ít hơn 5 người'),
(2, '5 - 10 người'),
(3, '11 - 20 người'),
(4, '21 - 30 người'),
(5, '31 - 40 người'),
(6, '41 - 50 người'),
(7, 'Trên 50 người');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_nhansuphongkinhdoanh`
--

CREATE TABLE IF NOT EXISTS `gianhang_nhansuphongkinhdoanh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gianhang_nhansuphongkinhdoanh`
--

INSERT INTO `gianhang_nhansuphongkinhdoanh` (`ID`, `Title`) VALUES
(1, 'Ít hơn 5 người'),
(2, '5 - 10 người'),
(3, '11 - 20 người'),
(4, '21 - 30 người'),
(5, '31 - 40 người'),
(6, '41 - 50 người'),
(7, 'Trên 50 người');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_permission`
--

CREATE TABLE IF NOT EXISTS `gianhang_permission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Code` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_permission`
--

INSERT INTO `gianhang_permission` (`ID`, `Title`, `Code`) VALUES
(1, 'Gửi báo giá', 1),
(2, 'Gửi yêu cầu báo giá', 2),
(3, 'Gửi & đọc tin nhắn', 3),
(4, 'Quản lý sản phẩm', 4),
(5, 'Đặt hàng', 5),
(6, 'Sửa đổi thông tin công ty & website', 6),
(7, 'Chat trực tuyến với công ty khác', 7),
(8, 'Sửa đổi thông tin nhu cầu mua hàng', 8);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_phuongthucthanhtoanuutien`
--

CREATE TABLE IF NOT EXISTS `gianhang_phuongthucthanhtoanuutien` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gianhang_phuongthucthanhtoanuutien`
--

INSERT INTO `gianhang_phuongthucthanhtoanuutien` (`ID`, `Title`) VALUES
(1, 'Thanh toán tiền mặt khi giao hàng'),
(2, 'Thanh toán bằng chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_sanluongsanphamhangnam`
--

CREATE TABLE IF NOT EXISTS `gianhang_sanluongsanphamhangnam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Tensanpham` varchar(255) NOT NULL,
  `Sanluongtrungbinh` int(11) NOT NULL,
  `Sanluongcaonhat` int(11) NOT NULL,
  `DonvitinhsanluongID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_sanpham`
--

CREATE TABLE IF NOT EXISTS `gianhang_sanpham` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `UserPostID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Image_Url` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `CategoriesID` int(11) NOT NULL,
  `Soluongdonhangtoithieu` varchar(255) NOT NULL,
  `TinhthanhID` int(11) NOT NULL,
  `PhuongthucthanhtoanuutienID` int(11) NOT NULL,
  `Khanangcungung` varchar(255) NOT NULL,
  `Thoigianvanchuyen` varchar(255) NOT NULL,
  `Quycachdonggoi` varchar(255) NOT NULL,
  `Introtext` text NOT NULL,
  `Created` datetime NOT NULL,
  `LastEdited` datetime NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaKeywords` varchar(255) NOT NULL,
  `MetaDescription` text NOT NULL,
  `Published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gianhang_sanpham`
--

INSERT INTO `gianhang_sanpham` (`ID`, `ShopID`, `UserPostID`, `Title`, `Image_Url`, `Price`, `CategoriesID`, `Soluongdonhangtoithieu`, `TinhthanhID`, `PhuongthucthanhtoanuutienID`, `Khanangcungung`, `Thoigianvanchuyen`, `Quycachdonggoi`, `Introtext`, `Created`, `LastEdited`, `MetaTitle`, `MetaKeywords`, `MetaDescription`, `Published`) VALUES
(1, 1, 5, 'Sản phẩm A', 'assets/userpage_sanpham/1/bb463dfe648a07bb93e1246125ed8eba.jpg', '150000-200000', 2, '10 chiếc', 0, 1, '11/chiếc/tháng', '1 ngày', 'Thùng 30 cái', '', '2015-08-09 10:27:17', '2015-08-09 10:27:17', 'Sản phẩm A', '', '', 1),
(2, 1, 5, 'Sản phẩm', 'assets/userpage_sanpham/2/581d2ead917ba960339973d3205a71e1.jpg', '-', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-09 10:28:40', '2015-08-09 10:28:40', '', '', '', 1),
(3, 1, 5, 'Sản phẩm D', '', '-', 10, ' Đơn vị tính', 100, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-09 10:29:43', '2015-08-09 10:29:43', '', '', '', 1),
(4, 1, 5, 'Sản phẩm D', '', '-', 10, ' Đơn vị tính', 26, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-09 10:30:50', '2015-08-09 10:30:50', '', '', '', 1),
(5, 1, 5, 'Áo khoác lao động', 'assets/userpage_sanpham/5/999a40188769dc32ca1445c0a6ae682a.jpg', '150000-300000', 1, '2 chiếc', 1, 1, '25/chiếc/ngày', '3 ngày làm việc', 'Gói hộp', '', '2015-08-09 10:37:08', '2015-08-09 10:37:08', 'Áo khoác lao động', '', '', 1),
(6, 1, 5, 'Áo khoác', 'assets/userpage_sanpham/6/81ffcc034159585b94500a4c19b3f650.jpg', '99000-11000VNĐ/chiếc', 6, '15 chiếc', 141, 1, '45/chiếc/ngày', '3 ngày', 'Thùng 30 cái', '', '2015-08-09 10:43:51', '2015-08-09 10:43:51', 'Áo khoác', '', '', 1),
(7, 1, 5, 'sanr pham 1', 'assets/userpage_sanpham/7/1fa132b7e5558808c65f7493c54c8335.jpg', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-11 21:33:07', '2015-08-11 21:33:07', '', '', '', 1),
(8, 1, 5, '', '', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-11 21:41:53', '2015-08-11 21:41:53', '', '', '', 1),
(9, 1, 5, 'San pham c', 'assets/userpage_sanpham/9/0c0845805352371fab437dc66a371380.jpg', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '<p>Hoanga sdhasid</p>\\r\\n\\r\\n<p><img alt=\\"\\" src=\\"/sagohano/assets/images/a(1).jpg\\" style=\\"height:428px; width:640px\\" /></p>\\r\\n', '2015-08-11 21:42:58', '2015-08-11 21:42:58', '', '', '', 1),
(10, 1, 5, '', '', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-11 22:26:22', '2015-08-11 22:26:22', '', '', '', 1),
(11, 1, 5, 'San pham X', '', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-11 22:27:48', '2015-08-11 22:27:48', '', '', '', 1),
(12, 1, 5, 'San pham VNNN', 'assets/userpage_sanpham/12/3c8bfba79d57a4b06d2bd47498404314.jpg', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '', '2015-08-11 22:31:17', '2015-08-11 22:31:17', 'âss', '', '', 1),
(13, 1, 5, 'Quần Áo', 'assets/userpage_sanpham/13/06624d887dfee9915513351d8def4897.jpg', ' -  Đơn vị tính', 1, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '<p>Quần &aacute;o</p><p><img alt="\\" src="/sagohano/assets/images/a(1).jpg" style="height:428px; width:640px" /></p>', '2015-08-14 16:28:09', '2015-08-14 16:28:09', 'Quần Áo', '', '', 1),
(14, 1, 5, 'ssd', '', ' -  Đơn vị tính', 10, ' Đơn vị tính', 0, 0, '/Đơn vị tính/Thời gian', '', '', '<p>&aacute;dadasd</p>\r\n\r\n<p><img alt="" src="/sagohano/assets/images/a(1).jpg" style="height:428px; width:640px" /></p>\r\n', '2015-08-14 17:17:52', '2015-08-14 17:17:52', '', '', '', 1),
(15, 1, 5, 'Giày ABCD', 'assets/userpage_sanpham/15/90e9b13f8b98af60b71341c930fca2b4.png', '150000_200000_Đơn vị tính', 10, '20_Đôi', 1, 2, '750_55_ngày', '3 ngày làm việc', 'Thùng 30 đôi', '<p>Gi&agrave;y ẠHbcjabscjsa</p>\r\n\r\n<p><img alt="" src="/sagohano/assets/images/1.png" style="height:175px; width:400px" /></p>\r\n', '2015-08-14 22:17:09', '2015-08-14 22:17:09', 'Giày ABCD', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_sanphamquantam`
--

CREATE TABLE IF NOT EXISTS `gianhang_sanphamquantam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `CategoriesID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gianhang_sanphamquantam`
--

INSERT INTO `gianhang_sanphamquantam` (`ID`, `ShopID`, `Title`, `CategoriesID`) VALUES
(1, 1, 'Quần Jean', 1),
(2, 1, 'Sữa rửa mặt xmen', 7),
(3, 1, 'Giày lười', 2),
(4, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_sanpham_images`
--

CREATE TABLE IF NOT EXISTS `gianhang_sanpham_images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SanphamID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gianhang_sanpham_images`
--

INSERT INTO `gianhang_sanpham_images` (`ID`, `SanphamID`, `ImageID`) VALUES
(1, 12, 2),
(2, 12, 3),
(3, 12, 4),
(4, 12, 5),
(5, 13, 2),
(6, 13, 3),
(7, 13, 4),
(8, 13, 5),
(9, 13, 6),
(10, 15, 7),
(11, 15, 8),
(12, 15, 9),
(13, 15, 10),
(14, 15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_shop`
--

CREATE TABLE IF NOT EXISTS `gianhang_shop` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL,
  `Title` varchar(255) NOT NULL,
  `CategoriesID` int(11) NOT NULL,
  `LoaihinhkinhdoanhID` int(11) NOT NULL,
  `Masothue` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Fax` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Tencongty` varchar(255) NOT NULL,
  `Published` tinyint(1) NOT NULL,
  `Mabuuchinh` varchar(255) NOT NULL,
  `Duong` varchar(255) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `Linhvuccongnghiep` varchar(255) NOT NULL,
  `ChukymuahangID` int(11) NOT NULL,
  `GiatrimuahangmoinamID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gianhang_shop`
--

INSERT INTO `gianhang_shop` (`ID`, `Created`, `Title`, `CategoriesID`, `LoaihinhkinhdoanhID`, `Masothue`, `Email`, `Fax`, `Phone`, `Tencongty`, `Published`, `Mabuuchinh`, `Duong`, `CityID`, `Website`, `Linhvuccongnghiep`, `ChukymuahangID`, `GiatrimuahangmoinamID`) VALUES
(1, '2015-06-21 15:01:44', '', 0, 2, '0123456789', 'votrunghieu007@gmail.com', '08 1234567', '01214160374', 'CTY CỔ PHẦN TM DP QUANG MINH', 0, '0123456', 'Cộng Hòa', 1, 'webtopone.com', 'Dược phẩm', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_soluongdaychuyensanxuat`
--

CREATE TABLE IF NOT EXISTS `gianhang_soluongdaychuyensanxuat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gianhang_soluongdaychuyensanxuat`
--

INSERT INTO `gianhang_soluongdaychuyensanxuat` (`ID`, `Title`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, 'Trên 10');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_tenchungchichungnhan`
--

CREATE TABLE IF NOT EXISTS `gianhang_tenchungchichungnhan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gianhang_tenchungchichungnhan`
--

INSERT INTO `gianhang_tenchungchichungnhan` (`ID`, `Title`) VALUES
(1, 'BRC'),
(2, 'BSCI'),
(3, 'FSC'),
(4, 'GMP'),
(5, 'GSV'),
(6, 'HACCP'),
(7, 'ISO/TS16949'),
(8, 'ISO10012'),
(9, 'ISO13485'),
(10, 'ISO14001'),
(11, 'ISO17025'),
(12, 'ISO17799'),
(13, 'ISO22000'),
(14, 'ISO9001'),
(15, 'OHSAS18001'),
(16, 'SA8000'),
(17, 'TL9000');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thietlapriengtu`
--

CREATE TABLE IF NOT EXISTS `gianhang_thietlapriengtu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_thietlapriengtu`
--

INSERT INTO `gianhang_thietlapriengtu` (`ID`, `Title`, `Description`) VALUES
(1, 'Thông tin cơ bản', 'Bao gồm tên , hình ảnh đại diện , tên công ty , chức vụ , vùng miền , địa chỉ , website , chatID , số năm hoạt động trên sagohano'),
(2, 'Thông tin liên hệ', 'Bao gồm email , số điện thoại công ty , số fax công ty'),
(3, 'Lịch sử kết quả tra đổi thông tin', 'Tóm tắt số lần bạn được thêm vào danh bạ của công ty khác , số lần bị thông vào danh sách đen , và số lần bảng báo giá gửi đi của bạn bình đánh dấu là thư rác '),
(4, 'Thông tin mua hàng', 'Chu kỳ mua hàng , Địa điểm nhà cung cấp ưu tiên , Loại hình nhà cung cấp ưu tiên , Lời giới thiệu và logo công ty'),
(5, 'Tóm tắt hoạt động trên sagohano', 'Ngày gần nhất bạn truy cập sagohano , Số lần tìm sản phẩm , Số lượng sản phẩm đã xem , Số lượng thư báo giá đã gửi , Địa điểm nơi gửi báo giá .'),
(6, 'Ngành nghề quan tâm', 'Danh sách các ngành nghề bạn quan tâm nhất . Kết quả thu nhập dựa trên lịch sử truy cập , sản phẩm bạn tìm , Yêu cầu báo giá bạn gửi & nhận trong vòng 365 ngày trước .'),
(7, 'Từ khóa tìm kiếm nhiều nhất', 'Danh sách từ khóa bạn  tìm nhiều nhất trong vòng 365 ngày trước'),
(8, 'Từ khóa tìm kiếm và sản phẩm đã xem gần đây', 'Danh sách từ khóa bạn tìm nhiều nhất và thông tin sơ lược về những sản phẩm bạn đã xem trong vòng 48 tiếng trước');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thoigiansanxuatcungcaptrungbinh`
--

CREATE TABLE IF NOT EXISTS `gianhang_thoigiansanxuatcungcaptrungbinh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gianhang_thoigiansanxuatcungcaptrungbinh`
--

INSERT INTO `gianhang_thoigiansanxuatcungcaptrungbinh` (`ID`, `Title`) VALUES
(1, 'Dưới 1 ngày'),
(2, 'Từ 1 - 2 ngày'),
(3, 'Từ 2 - 3 ngày'),
(4, 'Từ 3 - 4 ngày'),
(5, 'Từ 4 - 5 ngày'),
(6, 'Từ 5 - 6 ngày'),
(7, 'Từ 6 - 7 ngày'),
(8, 'Từ 7 - 8 ngày'),
(9, 'Từ 8 - 9 ngày'),
(10, 'Từ 9- 10 ngày'),
(11, 'Từ 10 - 15 ngày'),
(12, 'Từ 15 - 30 ngày'),
(13, 'Trên 1 tháng'),
(14, '');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thongtincoban`
--

CREATE TABLE IF NOT EXISTS `gianhang_thongtincoban` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Tencongty` varchar(255) NOT NULL,
  `TinhthanhID` int(11) NOT NULL,
  `Duong` varchar(255) NOT NULL,
  `QuanHuyen` varchar(255) NOT NULL,
  `Mabuuchinh` varchar(255) NOT NULL,
  `SiteCategoriesID` int(11) NOT NULL,
  `LoaihinhkinhdoanhID` int(11) NOT NULL,
  `Sanphamchinh` text NOT NULL,
  `Masothue` varchar(255) NOT NULL,
  `Namthanhlap` int(11) NOT NULL,
  `TongnhanlucID` int(11) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `Chusohuu` varchar(255) NOT NULL,
  `DientichvanphongID` int(11) NOT NULL,
  `Themanhcongty` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gianhang_thongtincoban`
--

INSERT INTO `gianhang_thongtincoban` (`ID`, `ShopID`, `Tencongty`, `TinhthanhID`, `Duong`, `QuanHuyen`, `Mabuuchinh`, `SiteCategoriesID`, `LoaihinhkinhdoanhID`, `Sanphamchinh`, `Masothue`, `Namthanhlap`, `TongnhanlucID`, `Website`, `Chusohuu`, `DientichvanphongID`, `Themanhcongty`) VALUES
(5, 1, 'CTY CỔ PHẦN TM DP QUANG MINH ', 1, 'Cộng Hòa ', '', '0123456', 1, 1, 'san pham 1/san pham 2/san pham 3/san pham 4/san pham 5/san pham 6', '0123456789 ', 1984, 4, 'webtopone.com', '', 3, '						Hãy mô tả ngắn gọn về thế mạnh của công ty bạn. Ví dụ: Công ty chúng tôi đã trả qua hơn 20 năm kinh nghiệm trong...																								');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thongtingiaodich`
--

CREATE TABLE IF NOT EXISTS `gianhang_thongtingiaodich` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `TongdoanhthuhangnamID` int(11) NOT NULL,
  `Thitruongchinh` text NOT NULL,
  `NhansuphongkinhdoanhID` int(11) NOT NULL,
  `ThoigiansanxuattrungbinhID` int(11) NOT NULL,
  `PhuongthucthanhtoanuutienID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gianhang_thongtingiaodich`
--

INSERT INTO `gianhang_thongtingiaodich` (`ID`, `ShopID`, `TongdoanhthuhangnamID`, `Thitruongchinh`, `NhansuphongkinhdoanhID`, `ThoigiansanxuattrungbinhID`, `PhuongthucthanhtoanuutienID`) VALUES
(6, 1, 5, '', 4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thongtinkhachhangtieubieu`
--

CREATE TABLE IF NOT EXISTS `gianhang_thongtinkhachhangtieubieu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Tenkhachhang` varchar(255) NOT NULL,
  `TinhthanhID` int(11) NOT NULL,
  `Sanphamcungcap` varchar(255) NOT NULL,
  `Tonggiatricungcaphangnam` float NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_thongtinnhamay`
--

CREATE TABLE IF NOT EXISTS `gianhang_thongtinnhamay` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `Diachinhamay` varchar(255) NOT NULL,
  `DientichnhamayID` int(11) NOT NULL,
  `CachcungcapID` int(11) NOT NULL,
  `Kinhnghiem` int(11) NOT NULL,
  `NhansudambaochatluongID` int(11) NOT NULL,
  `NhansunghiencuuvaphattrienID` int(11) NOT NULL,
  `SoluongdaychuyenID` int(11) NOT NULL,
  `TonggiatrisanxuatID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gianhang_thongtinnhamay`
--

INSERT INTO `gianhang_thongtinnhamay` (`ID`, `ShopID`, `Diachinhamay`, `DientichnhamayID`, `CachcungcapID`, `Kinhnghiem`, `NhansudambaochatluongID`, `NhansunghiencuuvaphattrienID`, `SoluongdaychuyenID`, `TonggiatrisanxuatID`) VALUES
(1, 1, '37 B Lương TRúc đàm', 1, 3, 15, 1, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_tongdoanhthuhangnam`
--

CREATE TABLE IF NOT EXISTS `gianhang_tongdoanhthuhangnam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_tongdoanhthuhangnam`
--

INSERT INTO `gianhang_tongdoanhthuhangnam` (`ID`, `Title`) VALUES
(1, '200 triệu - 1 tỷ VNĐ'),
(2, '1 tỷ - 2 tỷ VNĐ'),
(3, '2 tỷ - 3 tỷ'),
(4, '3 tỷ - 4 tỷ'),
(5, '4 tỷ - 5 tỷ'),
(6, '5 tỷ - 10 tỷ'),
(7, '10 tỷ - 20 tỷ'),
(8, 'Trên 20 tỷ');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_tonggiatrisanxuathangnam`
--

CREATE TABLE IF NOT EXISTS `gianhang_tonggiatrisanxuathangnam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gianhang_tonggiatrisanxuathangnam`
--

INSERT INTO `gianhang_tonggiatrisanxuathangnam` (`ID`, `Title`) VALUES
(1, '200 triệu - 1 tỷ VNĐ'),
(2, '1 tỷ - 2 tỷ VNĐ'),
(3, '2 tỷ - 3 tỷ VNĐ'),
(4, '3 tỷ - 4 tỷ VNĐ'),
(5, '4 tỷ - 5 tỷ VNĐ'),
(6, '5 tỷ - 10 tỷ VNĐ'),
(7, '10 tỷ - 20 tỷ VNĐ'),
(8, 'Trên 20 tỷ VNĐ');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_tongnhanluc`
--

CREATE TABLE IF NOT EXISTS `gianhang_tongnhanluc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gianhang_tongnhanluc`
--

INSERT INTO `gianhang_tongnhanluc` (`ID`, `Title`) VALUES
(1, 'Dưới 5 người'),
(2, '5 - 10 người'),
(3, '11 - 50 người'),
(4, '51 - 100 người'),
(5, '101 - 200 người'),
(6, '201 - 300 người'),
(7, '301 - 500 người'),
(8, '501 - 1000 người'),
(9, 'Trên 1000 người');

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_tukhoatimkiemnhieu`
--

CREATE TABLE IF NOT EXISTS `gianhang_tukhoatimkiemnhieu` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Keywords` varchar(255) NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_uutienloaihinhkinhdoanh`
--

CREATE TABLE IF NOT EXISTS `gianhang_uutienloaihinhkinhdoanh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `LoaihinhkinhdoanhID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gianhang_uutienloaihinhkinhdoanh`
--

INSERT INTO `gianhang_uutienloaihinhkinhdoanh` (`ID`, `ShopID`, `LoaihinhkinhdoanhID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gianhang_uutiennhacungcap`
--

CREATE TABLE IF NOT EXISTS `gianhang_uutiennhacungcap` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShopID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gianhang_uutiennhacungcap`
--

INSERT INTO `gianhang_uutiennhacungcap` (`ID`, `ShopID`, `CityID`) VALUES
(1, 1, 1),
(2, 1, 26),
(3, 1, 57),
(4, 1, 66),
(5, 1, 178);

-- --------------------------------------------------------

--
-- Table structure for table `site_categories`
--

CREATE TABLE IF NOT EXISTS `site_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaKeywords` varchar(255) NOT NULL,
  `MetaDescription` text NOT NULL,
  `Published` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `site_categories`
--

INSERT INTO `site_categories` (`ID`, `Title`, `ParentID`, `Path`, `MetaTitle`, `MetaKeywords`, `MetaDescription`, `Published`) VALUES
(1, 'Quần áo , May mặc , Phụ kiện thời trang', 0, '0/1', 'Quần áo , May mặc , Phụ kiện thời trang', 'Quần áo , May mặc , Phụ kiện thời trang', 'Quần áo , May mặc , Phụ kiện thời trang', 1),
(2, 'Giày dép , Túi xách , Phụ kiện', 0, '0/2', 'Giày dép , Túi xách , Phụ kiện', 'Giày dép , Túi xách , Phụ kiện', 'Giày dép , Túi xách , Phụ kiện', 1),
(3, 'Thực phẩm & Nông nghiệp', 0, '0/3', 'Thực phẩm & Nông nghiệp', 'Thực phẩm & Nông nghiệp', 'Thực phẩm & Nông nghiệp', 1),
(4, 'Bao bì , In ấn , Văn phòng phẩm', 0, '0/4', 'Bao bì , In ấn , Văn phòng phẩm', 'Bao bì , In ấn , Văn phòng phẩm', 'Bao bì , In ấn , Văn phòng phẩm', 1),
(5, 'Điện tử tiêu dùng , Thiết bị văn phòng & dịch vụ', 0, '0/5', 'Điện tử tiêu dùng , Thiết bị văn phòng & dịch vụ', 'Điện tử tiêu dùng , Thiết bị văn phòng & dịch vụ', 'Điện tử tiêu dùng , Thiết bị văn phòng & dịch vụ', 1),
(6, 'Trang thiết bị , Link kiện điện tử & viễn thông', 0, '0/6', 'Trang thiết bị , Link kiện điện tử & viễn thông', 'Trang thiết bị , Link kiện điện tử & viễn thông', 'Trang thiết bị , Link kiện điện tử & viễn thông', 1),
(7, 'Mỹ phẩm & Y tế', 0, '0/7', 'Mỹ phẩm & Y tế', 'Mỹ phẩm & Y tế', 'Mỹ phẩm & Y tế', 1),
(8, 'Đồ chơi , Quà tặng , Thiết bị thể thao', 0, '0/8', 'Đồ chơi , Quà tặng , Thiết bị thể thao', 'Đồ chơi , Quà tặng , Thiết bị thể thao', 'Đồ chơi , Quà tặng , Thiết bị thể thao', 1),
(9, 'Nhà ở , Xây dựng , Đèn trang trí', 0, '0/9', 'Nhà ở , Xây dựng , Đèn trang trí', 'Nhà ở , Xây dựng , Đèn trang trí', 'Nhà ở , Xây dựng , Đèn trang trí', 1),
(10, 'Nhựa , cao su , kim loại & hóa chất', 0, '0/10', 'Nhựa , cao su , kim loại & hóa chất', 'Nhựa , cao su , kim loại & hóa chất', 'Nhựa , cao su , kim loại & hóa chất', 1),
(11, 'Máy móc , linh kiện , dụng cụ cơ khí', 0, '0/11', 'Máy móc , linh kiện , dụng cụ cơ khí', 'Máy móc , linh kiện , dụng cụ cơ khí', 'Máy móc , linh kiện , dụng cụ cơ khí', 1),
(12, 'Phương tiện giao thông , Linh kiện , phụ tùng xe cộ', 0, '0/12', 'Phương tiện giao thông , Linh kiện , phụ tùng xe cộ', 'Phương tiện giao thông , Linh kiện , phụ tùng xe cộ', 'Phương tiện giao thông , Linh kiện , phụ tùng xe cộ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_donvitinhsanluong`
--

CREATE TABLE IF NOT EXISTS `site_donvitinhsanluong` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_shop_thietlapriengtu`
--

CREATE TABLE IF NOT EXISTS `site_shop_thietlapriengtu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PrivateID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Everyone` tinyint(1) NOT NULL,
  `Friends` tinyint(1) NOT NULL,
  `FriendsPlus` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_user`
--

CREATE TABLE IF NOT EXISTS `site_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` tinyint(1) NOT NULL,
  `Published` tinyint(1) NOT NULL,
  `Lastlogin` datetime NOT NULL,
  `ImageID` bigint(20) NOT NULL,
  `NameUser` varchar(255) NOT NULL,
  `Chucvu` varchar(255) NOT NULL,
  `Gioitinh` int(11) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_user`
--

INSERT INTO `site_user` (`ID`, `Created`, `Email`, `Password`, `Level`, `Published`, `Lastlogin`, `ImageID`, `NameUser`, `Chucvu`, `Gioitinh`, `Phone`) VALUES
(5, '2015-06-21 15:01:44', 'votrunghieu007@gmail.com', 'P@ssw0rd??', 2, 0, '2015-08-15 09:01:07', 0, 'Nguyễn Minh Thu', 'Quản lý bán hàng', 0, '01285619099');

-- --------------------------------------------------------

--
-- Table structure for table `site_user_permission`
--

CREATE TABLE IF NOT EXISTS `site_user_permission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `PermissionID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `site_user_permission`
--

INSERT INTO `site_user_permission` (`ID`, `UserID`, `PermissionID`) VALUES
(60, 5, 1),
(61, 5, 7),
(62, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `site_user_shop`
--

CREATE TABLE IF NOT EXISTS `site_user_shop` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_user_shop`
--

INSERT INTO `site_user_shop` (`ID`, `UserID`, `ShopID`) VALUES
(1, 5, 1),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

CREATE TABLE IF NOT EXISTS `tinhthanh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `LastEdited` datetime NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Duongdan` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=763 ;

--
-- Dumping data for table `tinhthanh`
--

INSERT INTO `tinhthanh` (`ID`, `Title`, `ParentID`, `Created`, `LastEdited`, `Path`, `Duongdan`) VALUES
(1, 'Hồ Chí Minh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1', 'ho-chi-minh'),
(2, 'Quận 1', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/2', 'ho-chi-minh-quan-1'),
(3, 'Quận 2', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/3', 'ho-chi-minh-quan-2'),
(4, 'Quận 3', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/4', 'ho-chi-minh-quan-3'),
(5, 'Quận 4', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/5', 'ho-chi-minh-quan-4'),
(6, 'Quận 5', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/6', 'ho-chi-minh-quan-5'),
(7, 'Quận 6', 1, '2015-03-20 09:33:03', '2015-03-20 09:33:03', '0/1/7', 'ho-chi-minh-quan-5'),
(8, 'Quận 7', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/8', 'ho-chi-minh-quan-7'),
(9, 'Quận 8', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/9', 'ho-chi-minh-quan-8'),
(10, 'Quận 9', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/10', 'ho-chi-minh-quan-9'),
(11, 'Quận 10', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/11', 'ho-chi-minh-quan-10'),
(12, 'Quận 11', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/12', 'ho-chi-minh-quan-11'),
(13, 'Quận 12', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/13', 'ho-chi-minh-quan-12'),
(14, 'Quận Gò Vấp', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/14', 'ho-chi-minh-quan-go-vap'),
(15, 'Quận Phú Nhuận', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/15', 'ho-chi-minh-quan-phu-nhuan'),
(16, 'Quận Bình Thạnh', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/16', 'ho-chi-minh-quan-binh-thanh'),
(17, 'Quận Tân Bình', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/17', 'ho-chi-minh-quan-tan-binh'),
(18, 'Quận Thủ Đức', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/18', 'ho-chi-minh-quan-thu-duc'),
(19, 'Huyện Bình Chánh', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/19', 'ho-chi-minh-huyen-binh-chanh'),
(20, 'Huyện Nhà Bè', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/20', 'ho-chi-minh-huyen-nha-be'),
(21, 'Huyện Hóc Môn', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/21', 'ho-chi-minh-huyen-hoc-mon'),
(22, 'Huyện Củ Chi', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/22', 'ho-chi-minh-huyen-cu-chi'),
(23, 'Huyện Cần Giờ', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/23', 'ho-chi-minh-huyen-can-gio'),
(24, 'Quận Tân Phú', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/24', 'ho-chi-minh-quan-tan-phu'),
(25, 'Quận Bình Tân', 1, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/1/25', 'ho-chi-minh-quan-binh-tan'),
(26, 'Hà Nội', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26', 'ha-noi'),
(27, 'Hai Bà Trưng', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/27', 'ha-noi-hai-ba-trung'),
(28, 'Ba Đình', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/28', 'ha-noi-ba-dinh'),
(29, 'Long Biên', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/29', 'ha-noi-long-bien'),
(30, 'Đông Anh', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/30', 'ha-noi-dong-anh'),
(31, 'Quận Cầu Giấy', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/31', 'ha-noi-quan-cau-giay'),
(32, 'Quận Đống Đa', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/32', 'ha-noi-quan-dong-da'),
(33, 'Quận Hoàn Kiếm', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/33', 'ha-noi-quan-hoan-kiem'),
(34, 'Quận Tây Hồ', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/34', 'ha-noi-quan-tay-ho'),
(35, 'Quận Thanh Xuân', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/35', 'ha-noi-quan-thanh-xuan'),
(36, 'Huyện Gia Lâm', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/36', 'ha-noi-huyen-gia-lam'),
(37, 'Huyện Thanh Trì', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/37', 'ha-noi-huyen-thanh-tri'),
(38, 'Quận Nam Từ Liêm', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/38', 'ha-noi-quan-nam-tu-liem'),
(39, 'Huyện Sóc Sơn', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/39', 'ha-noi-huyen-soc-son'),
(40, 'Quận Hoàng Mai', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/40', 'ha-noi-quan-hoang-mai'),
(41, 'Quận Hà Đông', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/41', 'ha-noi-quan-ha-dong'),
(42, 'Huyện Ba Vì', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/42', 'ha-noi-huyen-ba-vi'),
(43, 'Huyện Phúc Thọ', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/43', 'ha-noi-huyen-phuc-tho'),
(44, 'Huyện Đan Phượng', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/44', 'ha-noi-huyen-dan-phuong'),
(45, 'Huyện Thạch Thất', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/45', 'ha-noi-huyen-thach-that'),
(46, 'Huyện Hoài Đức', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/46', 'ha-noi-huyen-hoai-duc'),
(47, 'Huyện Quốc Oai', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/47', 'ha-noi-huyen-quoc-oai'),
(48, 'Huyện Chương Mỹ', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/48', 'ha-noi-huyen-chuong-my'),
(49, 'Huyện Thanh Oai', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/49', 'ha-noi-huyen-thanh-oai'),
(50, 'Huyện Thường Tín', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/50', 'ha-noi-huyen-thuong-tin'),
(51, 'Huyện Mỹ Đức', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/51', 'ha-noi-huyen-my-duc'),
(52, 'Huyện Ứng Hòa', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/52', 'ha-noi-huyen-ung-hoa'),
(53, 'Huyện Phú Xuyên', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/53', 'ha-noi-huyen-phu-xuyen'),
(54, 'Thị Xã Sơn Tây', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/54', 'ha-noi-thi-xa-son-tay'),
(55, 'Huyện Mê Linh', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/55', 'ha-noi-huyen-me-linh'),
(56, 'Quận Bắc Từ Liêm', 26, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/26/56', 'ha-noi-quan-bac-tu-liem'),
(57, 'Bình Dương', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57', 'binh-duong'),
(58, 'Thị Xã Thuận An', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/58', 'binh-duong-thi-xa-thuan-an'),
(59, 'Thị Xã Dĩ An', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/59', 'binh-duong-thi-xa-di-an'),
(60, 'Huyện Dầu Tiếng', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/60', 'binh-duong-huyen-dau-tieng'),
(61, 'Huyện Phú Giáo', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/61', 'binh-duong-huyen-phu-giao'),
(62, 'Huyện Tân Uyên', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/62', 'binh-duong-huyen-tan-uyen'),
(63, 'Huyện Bến Cát', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/63', 'binh-duong-huyen-ben-cat'),
(64, 'Thành Phố Thủ Dầu Một', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/64', 'binh-duong-thanh-pho-thu-dau-mot'),
(65, 'Lái Thiêu', 57, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/57/65', 'binh-duong-lai-thieu'),
(66, 'Hải Phòng', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66', 'hai-phong'),
(67, 'Quận Hồng Bàng', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/67', 'hai-phong-quan-hong-bang'),
(68, 'Quận Ngô Quyền', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/68', 'hai-phong-quan-ngo-quyen'),
(69, 'Quận Lê Chân', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/69', 'hai-phong-quan-le-chan'),
(70, 'Quận Kiến An', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/70', 'hai-phong-quan-kien-an'),
(71, 'Huyện Thủy Nguyên', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/71', 'hai-phong-huyen-thuy-nguyen'),
(72, 'An Dương', 66, '2015-06-02 08:20:06', '2015-06-02 08:20:06', '0/66/72', 'hai-phong-an-duong'),
(73, 'Huyện An Lão', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/73', 'hai-phong-huyen-an-lao'),
(74, 'Kiến Thụy', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/74', 'hai-phong-kien-thuy'),
(75, 'Huyện Tiên Lãng', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/75', 'hai-phong-huyen-tien-lang'),
(76, 'Huyện Vĩnh Bảo', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/76', 'hai-phong-huyen-vinh-bao'),
(77, 'Huyện Cát Hải', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/77', 'hai-phong-huyen-cat-hai'),
(78, 'Huyện Bạch Long Vĩ', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/78', 'hai-phong-huyen-bach-long-vi'),
(79, 'Thĩ Xã Đồ Sơn', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/79', 'hai-phong-thi-xa-do-son'),
(80, 'Quận Hải Anh', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/80', 'hai-phong-quan-hai-anh'),
(81, 'Quận Dương Kinh', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/81', 'hai-phong-quan-duong-kinh'),
(82, 'Thành phố Tuy Hoà', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/82', 'hai-phong-thanh-pho-tuy-hoa'),
(83, 'Huyện Đồng Xuân', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/83', 'hai-phong-huyen-dong-xuan'),
(84, 'Thị xã Sông Cầu', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/84', 'hai-phong-thi-xa-song-cau'),
(85, 'Huyện Tuy An', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/85', 'hai-phong-huyen-tuy-an'),
(86, 'Huyện Sơn Hoà', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/86', 'hai-phong-huyen-son-hoa'),
(87, 'Huyện Sông Hinh', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/87', 'hai-phong-huyen-song-hinh'),
(88, 'Huyện Đông Hoà', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/88', 'hai-phong-huyen-dong-hoa'),
(89, 'Huyện Phú Hoà', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/89', 'hai-phong-huyen-phu-hoa'),
(90, 'Huyện Tây Hoà', 66, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/66/90', 'hai-phong-huyen-tay-hoa'),
(91, 'Đà Nẵng', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91', 'da-nang'),
(92, 'Huyện Đảo Hoàng Sa', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/92', 'da-nang-huyen-dao-hoang-sa'),
(93, 'Huyện Hòa Vang', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/93', 'da-nang-huyen-hoa-vang'),
(94, 'Quận Ngũ Hành Sơn', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/94', 'da-nang-quan-ngu-hanh-son'),
(95, 'Quận Hải Châu', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/95', 'da-nang-quan-hai-chau'),
(96, 'Quận Thanh Khê', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/96', 'da-nang-quan-thanh-khe'),
(97, 'Quận Sơn Trà', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/97', 'da-nang-quan-son-tra'),
(98, 'Quận Liên Chiểu', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/98', 'da-nang-quan-lien-chieu'),
(99, 'Quận Cẩm Lệ', 91, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/91/99', 'da-nang-quan-cam-le'),
(100, 'Cần Thơ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100', 'can-tho'),
(101, 'Quận Ô Môn', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/101', 'can-tho-quan-o-mon'),
(102, 'Vĩnh Thạnh', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/102', 'can-tho-vinh-thanh'),
(103, 'Cái Răng', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/103', 'can-tho-cai-rang'),
(104, 'Quận Thốt Nốt', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/104', 'can-tho-quan-thot-not'),
(105, 'Cờ Đỏ', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/105', 'can-tho-co-do'),
(106, 'Phong Điền', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/106', 'can-tho-phong-dien'),
(107, 'Quận Ninh Kiều', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/107', 'can-tho-quan-ninh-kieu'),
(108, 'Quận Bình Thủy', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/108', 'can-tho-quan-binh-thuy'),
(109, 'Thới Lai', 100, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/100/109', 'can-tho-thoi-lai'),
(110, 'Đồng Nai', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110', 'dong-nai'),
(111, 'Thành phố Biên Hoà', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/111', 'dong-nai-thanh-pho-bien-hoa'),
(112, 'Huyện Vĩnh Cửu', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/112', 'dong-nai-huyen-vinh-cuu'),
(113, 'Huyện Tân Phú', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/113', 'dong-nai-huyen-tan-phu'),
(114, 'Huyện Định Quán', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/114', 'dong-nai-huyen-dinh-quan'),
(115, 'Huyện Thống Nhất', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/115', 'dong-nai-huyen-thong-nhat'),
(116, 'Thị xã Long Khánh', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/116', 'dong-nai-thi-xa-long-khanh'),
(117, 'Huyện Xuân Lộc', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/117', 'dong-nai-huyen-xuan-loc'),
(118, 'Huyện Long Thành', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/118', 'dong-nai-huyen-long-thanh'),
(119, 'Huyện Nhơn Trạch', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/119', 'dong-nai-huyen-nhon-trach'),
(120, 'Huyện Trảng Bom', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/120', 'dong-nai-huyen-trang-bom'),
(121, 'Huyện Cẩm Mỹ', 110, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/110/121', 'dong-nai-huyen-cam-my'),
(122, 'Bà Rịa Vũng Tàu', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122', 'ba-ria-vung-tau'),
(123, 'Thành phố Vũng Tàu', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/123', 'ba-ria-vung-tau-thanh-pho-vung-tau'),
(124, 'Thành phố Bà Rịa', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/124', 'ba-ria-vung-tau-thanh-pho-ba-ria'),
(125, 'Huyện Xuyên Mộc', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/125', 'ba-ria-vung-tau-huyen-xuyen-moc'),
(126, 'Huyện Long Điền', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/126', 'ba-ria-vung-tau-huyen-long-dien'),
(127, 'Huyện Côn Đảo', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/127', 'ba-ria-vung-tau-huyen-con-dao'),
(128, 'Huyện Tân Thành', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/128', 'ba-ria-vung-tau-huyen-tan-thanh'),
(129, 'Huyện Châu Đức', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/129', 'ba-ria-vung-tau-huyen-chau-duc'),
(130, 'Huyện Đất Đỏ', 122, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/122/130', 'ba-ria-vung-tau-huyen-dat-do'),
(131, 'Khánh Hòa', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131', 'khanh-hoa'),
(132, 'Thành phố Nha Trang', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/132', 'khanh-hoa-thanh-pho-nha-trang'),
(133, 'Huyện Vạn Ninh', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/133', 'khanh-hoa-huyen-van-ninh'),
(134, 'Huyện Ninh Hoà', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/134', 'khanh-hoa-huyen-ninh-hoa'),
(135, 'Huyện Diên Khánh', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/135', 'khanh-hoa-huyen-dien-khanh'),
(136, 'Huyện Khánh Vĩnh', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/136', 'khanh-hoa-huyen-khanh-vinh'),
(137, 'Thị xã Cam Ranh', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/137', 'khanh-hoa-thi-xa-cam-ranh'),
(138, 'Huyện Khánh Sơn', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/138', 'khanh-hoa-huyen-khanh-son'),
(139, 'Huyện đảo Trường Sa', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/139', 'khanh-hoa-huyen-dao-truong-sa'),
(140, 'Huyện Cam Lâm', 131, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/131/140', 'khanh-hoa-huyen-cam-lam'),
(141, 'Long An ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141', 'long-an'),
(142, 'Thành phố Tân An', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/142', 'long-an-thanh-pho-tan-an'),
(143, 'Huyện Vĩnh Hưng', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/143', 'long-an-huyen-vinh-hung'),
(144, 'Huyện Mộc Hoá', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/144', 'long-an-huyen-moc-hoa'),
(145, 'Huyện Tân Thạnh', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/145', 'long-an-huyen-tan-thanh'),
(146, 'Huyện Thạnh Hoá', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/146', 'long-an-huyen-thanh-hoa'),
(147, 'Huyện Đức Huệ', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/147', 'long-an-huyen-duc-hue'),
(148, 'Huyện Đức Hoà', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/148', 'long-an-huyen-duc-hoa'),
(149, 'Huyện Bến Lức', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/149', 'long-an-huyen-ben-luc'),
(150, 'Huyện Thủ Thừa', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/150', 'long-an-huyen-thu-thua'),
(151, 'Huyện Châu Thành', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/151', 'long-an-huyen-chau-thanh'),
(152, 'Huyện Tân Trụ', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/152', 'long-an-huyen-tan-tru'),
(153, 'Huyện Cần Đước', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/153', 'long-an-huyen-can-duoc'),
(154, 'Huyện Cần Giuộc', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/154', 'long-an-huyen-can-giuoc'),
(155, 'Huyện Tân Hưng', 141, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/141/155', 'long-an-huyen-tan-hung'),
(156, 'Thừa Thiên Huế', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156', 'thua-thien-hue'),
(157, 'Thành phố Huế', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/157', 'thua-thien-hue-thanh-pho-hue'),
(158, 'Huyện Phong Điền', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/158', 'thua-thien-hue-huyen-phong-dien'),
(159, 'Huyện Quảng Điền', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/159', 'thua-thien-hue-huyen-quang-dien'),
(160, 'Thị xã Hương Trà', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/160', 'thua-thien-hue-thi-xa-huong-tra'),
(161, 'Huyện Phú Vang', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/161', 'thua-thien-hue-huyen-phu-vang'),
(162, 'Thị xã Hương Thủy', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/162', 'thua-thien-hue-thi-xa-huong-thuy'),
(163, 'Huyện Phú Lộc', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/163', 'thua-thien-hue-huyen-phu-loc'),
(164, 'Huyện Nam Đông', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/164', 'thua-thien-hue-huyen-nam-dong'),
(165, 'Huyện A Lưới', 156, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/156/165', 'thua-thien-hue-huyen-a-luoi'),
(166, 'An Giang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166', 'an-giang'),
(167, 'Thành phố Long Xuyên', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/167', 'an-giang-thanh-pho-long-xuyen'),
(168, 'Thị xã Châu Đốc', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/168', 'an-giang-thi-xa-chau-doc'),
(169, 'Huyện An Phú', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/169', 'an-giang-huyen-an-phu'),
(170, 'Huyện Tân Châu', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/170', 'an-giang-huyen-tan-chau'),
(171, 'Huyện Phú Tân', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/171', 'an-giang-huyen-phu-tan'),
(172, 'Huyện Tịnh Biên', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/172', 'an-giang-huyen-tinh-bien'),
(173, 'Huyện Tri Tôn', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/173', 'an-giang-huyen-tri-ton'),
(174, 'Huyện Châu Phú', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/174', 'an-giang-huyen-chau-phu'),
(175, 'Huyện Chợ Mới', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/175', 'an-giang-huyen-cho-moi'),
(176, 'Huyện Châu Thành', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/176', 'an-giang-huyen-chau-thanh'),
(177, 'Huyện Thoại Sơn', 166, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/166/177', 'an-giang-huyen-thoai-son'),
(178, 'Bạc Liêu', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178', 'bac-lieu'),
(179, 'Thành phố Bạc Liêu', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/179', 'bac-lieu-thanh-pho-bac-lieu'),
(180, 'Huyện Vĩnh Lợi', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/180', 'bac-lieu-huyen-vinh-loi'),
(181, 'Huyện Hồng Dân', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/181', 'bac-lieu-huyen-hong-dan'),
(182, 'Huyện Giá Rai', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/182', 'bac-lieu-huyen-gia-rai'),
(183, 'Huyện Phước Long', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/183', 'bac-lieu-huyen-phuoc-long'),
(184, 'Huyện Đông Hải', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/184', 'bac-lieu-huyen-dong-hai'),
(185, 'Huyện Hoà Bình', 178, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/178/185', 'bac-lieu-huyen-hoa-binh'),
(186, 'Bắc Cạn', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186', 'bac-can'),
(187, 'Thị xã Bắc Kạn', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/187', 'bac-can-thi-xa-bac-kan'),
(188, 'Huyện Chợ Đồn', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/188', 'bac-can-huyen-cho-don'),
(189, 'Huyện Bạch Thông', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/189', 'bac-can-huyen-bach-thong'),
(190, 'Huyện Na Rì', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/190', 'bac-can-huyen-na-ri'),
(191, 'Huyện Ngân Sơn', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/191', 'bac-can-huyen-ngan-son'),
(192, 'Huyện Ba Bể', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/192', 'bac-can-huyen-ba-be'),
(193, 'Huyện Chợ Mới', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/193', 'bac-can-huyen-cho-moi'),
(194, 'Huyện Pác Nặm', 186, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/186/194', 'bac-can-huyen-pac-nam'),
(195, 'Bắc Giang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195', 'bac-giang'),
(196, 'Thành phố Bắc Giang', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/196', 'bac-giang-thanh-pho-bac-giang'),
(197, 'Huyện Yên Thế', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/197', 'bac-giang-huyen-yen-the'),
(198, 'Huyện Lục Ngạn', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/198', 'bac-giang-huyen-luc-ngan'),
(199, 'Huyện Sơn Động', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/199', 'bac-giang-huyen-son-dong'),
(200, 'Huyện Lục Nam', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/200', 'bac-giang-huyen-luc-nam'),
(201, 'Huyện Tân Yên', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/201', 'bac-giang-huyen-tan-yen'),
(202, 'Huyện Hiệp Hoà', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/202', 'bac-giang-huyen-hiep-hoa'),
(203, 'Huyện Lạng Giang', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/203', 'bac-giang-huyen-lang-giang'),
(204, 'Huyện Việt Yên', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/204', 'bac-giang-huyen-viet-yen'),
(205, 'Huyện Yên Dũng', 195, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/195/205', 'bac-giang-huyen-yen-dung'),
(206, 'Bắc Ninh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206', 'bac-ninh'),
(207, 'Thành phố Bắc Ninh', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/207', 'bac-ninh-thanh-pho-bac-ninh'),
(208, 'Huyện Yên Phong', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/208', 'bac-ninh-huyen-yen-phong'),
(209, 'Huyện Quế Võ', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/209', 'bac-ninh-huyen-que-vo'),
(210, 'Huyện Tiên Du', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/210', 'bac-ninh-huyen-tien-du'),
(211, 'Thị xã Từ Sơn', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/211', 'bac-ninh-thi-xa-tu-son'),
(212, 'Huyện Thuận Thành', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/212', 'bac-ninh-huyen-thuan-thanh'),
(213, 'Huyện Gia Bình', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/213', 'bac-ninh-huyen-gia-binh'),
(214, 'Huyện Lương Tài', 206, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/206/214', 'bac-ninh-huyen-luong-tai'),
(215, 'Bình Định', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215', 'binh-dinh'),
(216, 'Thành phố Quy Nhơn', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/216', 'binh-dinh-thanh-pho-quy-nhon'),
(217, 'Huyện An Lão', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/217', 'binh-dinh-huyen-an-lao'),
(218, 'Huyện Hoài Ân', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/218', 'binh-dinh-huyen-hoai-an'),
(219, 'Huyện Hoài Nhơn', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/219', 'binh-dinh-huyen-hoai-nhon'),
(220, 'Huyện Phù Mỹ', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/220', 'binh-dinh-huyen-phu-my'),
(221, 'Huyện Phù Cát', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/221', 'binh-dinh-huyen-phu-cat'),
(222, 'Huyện Vĩnh Thạnh', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/222', 'binh-dinh-huyen-vinh-thanh'),
(223, 'Huyện Tây Sơn', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/223', 'binh-dinh-huyen-tay-son'),
(224, 'Huyện Vân Canh', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/224', 'binh-dinh-huyen-van-canh'),
(225, 'Huyện An Nhơn', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/225', 'binh-dinh-huyen-an-nhon'),
(226, 'Huyện Tuy Phước', 215, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/215/226', 'binh-dinh-huyen-tuy-phuoc'),
(227, 'Bình Phước', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227', 'binh-phuoc'),
(228, 'Thị xã Đồng Xoài', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/228', 'binh-phuoc-thi-xa-dong-xoai'),
(229, 'Huyện Đồng Phú', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/229', 'binh-phuoc-huyen-dong-phu'),
(230, 'Huyện Chơn Thành', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/230', 'binh-phuoc-huyen-chon-thanh'),
(231, 'Huyện Bình Long', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/231', 'binh-phuoc-huyen-binh-long'),
(232, 'Huyện Lộc Ninh', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/232', 'binh-phuoc-huyen-loc-ninh'),
(233, 'Huyện Bù Đốp', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/233', 'binh-phuoc-huyen-bu-dop'),
(234, 'Huyện Phước Long', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/234', 'binh-phuoc-huyen-phuoc-long'),
(235, 'Huyện Bù Đăng', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/235', 'binh-phuoc-huyen-bu-dang'),
(236, 'Huyện Hớn Quản', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/236', 'binh-phuoc-huyen-hon-quan'),
(237, 'Huyện Bù Gia Mập', 227, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/227/237', 'binh-phuoc-huyen-bu-gia-map'),
(238, 'Bình Thuận', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238', 'binh-thuan'),
(239, 'Thành phố Phan Thiết', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/239', 'binh-thuan-thanh-pho-phan-thiet'),
(240, 'Huyện Tuy Phong', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/240', 'binh-thuan-huyen-tuy-phong'),
(241, 'Huyện Bắc Bình', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/241', 'binh-thuan-huyen-bac-binh'),
(242, 'Huyện Hàm Thuận Bắc', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/242', 'binh-thuan-huyen-ham-thuan-bac'),
(243, 'Huyện Hàm Thuận Nam', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/243', 'binh-thuan-huyen-ham-thuan-nam'),
(244, 'Huyện Hàm Tân', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/244', 'binh-thuan-huyen-ham-tan'),
(245, 'Huyện Đức Linh', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/245', 'binh-thuan-huyen-duc-linh'),
(246, 'Huyện Tánh Linh', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/246', 'binh-thuan-huyen-tanh-linh'),
(247, 'Huyện đảo Phú Quý', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/247', 'binh-thuan-huyen-dao-phu-quy'),
(248, 'Thị xã La Gi', 238, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/238/248', 'binh-thuan-thi-xa-la-gi'),
(249, 'Cà Mau', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249', 'ca-mau'),
(250, 'Thành phố Cà Mau', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/250', 'ca-mau-thanh-pho-ca-mau'),
(251, 'Huyện Thới Bình', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/251', 'ca-mau-huyen-thoi-binh'),
(252, 'Huyện U Minh', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/252', 'ca-mau-huyen-u-minh'),
(253, 'Huyện Trần Văn Thời', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/253', 'ca-mau-huyen-tran-van-thoi'),
(254, 'Huyện Cái Nước', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/254', 'ca-mau-huyen-cai-nuoc'),
(255, 'Huyện Đầm Dơi', 249, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/249/255', 'ca-mau-huyen-dam-doi'),
(256, 'Cao Bằng', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256', 'cao-bang'),
(257, 'Thành phố Cao Bằng', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/257', 'cao-bang-thanh-pho-cao-bang'),
(258, 'Huyện Bảo Lạc', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/258', 'cao-bang-huyen-bao-lac'),
(259, 'Huyện Thông Nông', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/259', 'cao-bang-huyen-thong-nong'),
(260, 'Huyện Hà Quảng', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/260', 'cao-bang-huyen-ha-quang'),
(261, 'Huyện Trà Lĩnh', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/261', 'cao-bang-huyen-tra-linh'),
(262, 'Huyện Trùng Khánh', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/262', 'cao-bang-huyen-trung-khanh'),
(263, 'Huyện Nguyên Bình', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/263', 'cao-bang-huyen-nguyen-binh'),
(264, 'Huyện Hoà An', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/264', 'cao-bang-huyen-hoa-an'),
(265, 'Huyện Quảng Uyên', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/265', 'cao-bang-huyen-quang-uyen'),
(266, 'Huyện Thạch An', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/266', 'cao-bang-huyen-thach-an'),
(267, 'Huyện Hạ Lang', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/267', 'cao-bang-huyen-ha-lang'),
(268, 'Huyện Bảo Lâm', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/268', 'cao-bang-huyen-bao-lam'),
(269, 'Huyện Phục Hoà', 256, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/256/269', 'cao-bang-huyen-phuc-hoa'),
(270, 'Đăk Lăk', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270', 'dak-lak'),
(271, 'Thành phố Buôn Ma Thuột', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/271', 'dak-lak-thanh-pho-buon-ma-thuot'),
(272, 'Huyện Ea H Leo', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/272', 'dak-lak-huyen-ea-h-leo'),
(273, 'Huyện Krông Buk', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/273', 'dak-lak-huyen-krong-buk'),
(274, 'Huyện Krông Năng', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/274', 'dak-lak-huyen-krong-nang'),
(275, 'Huyện Ea Súp', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/275', 'dak-lak-huyen-ea-sup'),
(276, 'Huyện Cư M’gar', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/276', 'dak-lak-huyen-cu-mgar'),
(277, 'Huyện Krông Pắc', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/277', 'dak-lak-huyen-krong-pac'),
(278, 'Huyện Ea Kar', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/278', 'dak-lak-huyen-ea-kar'),
(279, 'Huyện M Đrăk', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/279', 'dak-lak-huyen-m-drak'),
(280, 'Huyện Krông Ana', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/280', 'dak-lak-huyen-krong-ana'),
(281, 'Huyện Krông Bông', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/281', 'dak-lak-huyen-krong-bong'),
(282, 'Huyện Lăk', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/282', 'dak-lak-huyen-lak'),
(283, 'Huyện Buôn Đôn', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/283', 'dak-lak-huyen-buon-don'),
(284, 'Huyện Cư Kuin', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/284', 'dak-lak-huyen-cu-kuin'),
(285, 'Thị xã Buôn Hồ', 270, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/270/285', 'dak-lak-thi-xa-buon-ho'),
(286, 'Đồng Tháp', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286', 'dong-thap'),
(287, 'Thành phố Cao Lãnh', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/287', 'dong-thap-thanh-pho-cao-lanh'),
(288, 'Thị xã Sa Đéc', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/288', 'dong-thap-thi-xa-sa-dec'),
(289, 'Huyện Tân Hồng', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/289', 'dong-thap-huyen-tan-hong'),
(290, 'Huyện Hồng Ngự', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/290', 'dong-thap-huyen-hong-ngu'),
(291, 'Huyện Tam Nông', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/291', 'dong-thap-huyen-tam-nong'),
(292, 'Huyện Thanh Bình', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/292', 'dong-thap-huyen-thanh-binh'),
(293, 'Huyện Cao Lãnh', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/293', 'dong-thap-huyen-cao-lanh'),
(294, 'Huyện Lấp Vò', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/294', 'dong-thap-huyen-lap-vo'),
(295, 'Huyện Tháp Mười', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/295', 'dong-thap-huyen-thap-muoi'),
(296, 'Huyện Lai Vung', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/296', 'dong-thap-huyen-lai-vung'),
(297, 'Huyện Châu Thành', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/297', 'dong-thap-huyen-chau-thanh'),
(298, 'Thị xã Hồng Ngự', 286, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/286/298', 'dong-thap-thi-xa-hong-ngu'),
(299, 'Gia Lai', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299', 'gia-lai'),
(300, 'Thành phố Pleiku', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/300', 'gia-lai-thanh-pho-pleiku'),
(301, 'Huyện Chư Păh', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/301', 'gia-lai-huyen-chu-pah'),
(302, 'Huyện Mang Yang', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/302', 'gia-lai-huyen-mang-yang'),
(303, 'Huyện Kbang', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/303', 'gia-lai-huyen-kbang'),
(304, 'Thị xã An Khê', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/304', 'gia-lai-thi-xa-an-khe'),
(305, 'Huyện Kông Chro', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/305', 'gia-lai-huyen-kong-chro'),
(306, 'Huyện Đức Cơ', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/306', 'gia-lai-huyen-duc-co'),
(307, 'Huyện Chư Prông', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/307', 'gia-lai-huyen-chu-prong'),
(308, 'Huyện Chư Sê', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/308', 'gia-lai-huyen-chu-se'),
(309, 'Thị xã Ayunpa', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/309', 'gia-lai-thi-xa-ayunpa'),
(310, 'Huyện Krông Pa', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/310', 'gia-lai-huyen-krong-pa'),
(311, 'Huyện Ia Grai', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/311', 'gia-lai-huyen-ia-grai'),
(312, 'Huyện Đăk Đoa', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/312', 'gia-lai-huyen-dak-doa'),
(313, 'Huyện Ia Pa', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/313', 'gia-lai-huyen-ia-pa'),
(314, 'Huyện Đăk Pơ', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/314', 'gia-lai-huyen-dak-po'),
(315, 'Huyện Phú Thiện', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/315', 'gia-lai-huyen-phu-thien'),
(316, 'Huyện Chư Pưh', 299, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/299/316', 'gia-lai-huyen-chu-puh'),
(317, 'Hà Giang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317', 'ha-giang'),
(318, 'Thành phố Hà Giang', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/318', 'ha-giang-thanh-pho-ha-giang'),
(319, 'Huyện Đồng Văn', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/319', 'ha-giang-huyen-dong-van'),
(320, 'Huyện Mèo Vạc', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/320', 'ha-giang-huyen-meo-vac'),
(321, 'Huyện Yên Minh', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/321', 'ha-giang-huyen-yen-minh'),
(322, 'Huyện Quản Bạ', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/322', 'ha-giang-huyen-quan-ba'),
(323, 'Huyện Vị Xuyên', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/323', 'ha-giang-huyen-vi-xuyen'),
(324, 'Huyện Bắc Mê', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/324', 'ha-giang-huyen-bac-me'),
(325, 'Huyện Hoàng Su Phì', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/325', 'ha-giang-huyen-hoang-su-phi'),
(326, 'Huyện Xín Mần', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/326', 'ha-giang-huyen-xin-man'),
(327, 'Huyện Bắc Quang', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/327', 'ha-giang-huyen-bac-quang'),
(328, 'Huyện Quang Bình', 317, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/317/328', 'ha-giang-huyen-quang-binh'),
(329, 'Hà Nam', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329', 'ha-nam'),
(330, 'Thành phố Phủ Lý', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/330', 'ha-nam-thanh-pho-phu-ly'),
(331, 'Huyện Duy Tiên', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/331', 'ha-nam-huyen-duy-tien'),
(332, 'Huyện Kim Bảng', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/332', 'ha-nam-huyen-kim-bang'),
(333, 'Huyện Lý Nhân', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/333', 'ha-nam-huyen-ly-nhan'),
(334, 'Huyện Thanh Liêm', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/334', 'ha-nam-huyen-thanh-liem'),
(335, 'Huyện Bình Lục', 329, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/329/335', 'ha-nam-huyen-binh-luc'),
(336, 'Hà Tĩnh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336', 'ha-tinh'),
(337, 'Thành phố Hà Tĩnh', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/337', 'ha-tinh-thanh-pho-ha-tinh'),
(338, 'Thị xã Hồng Lĩnh', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/338', 'ha-tinh-thi-xa-hong-linh'),
(339, 'Huyện Hương Sơn', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/339', 'ha-tinh-huyen-huong-son'),
(340, 'Huyện Đức Thọ', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/340', 'ha-tinh-huyen-duc-tho'),
(341, 'Huyện Nghi Xuân', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/341', 'ha-tinh-huyen-nghi-xuan'),
(342, 'Huyện Can Lộc', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/342', 'ha-tinh-huyen-can-loc'),
(343, 'Huyện Hương Khê', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/343', 'ha-tinh-huyen-huong-khe'),
(344, 'Huyện Thạch Hà', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/344', 'ha-tinh-huyen-thach-ha'),
(345, 'Huyện Cẩm Xuyên', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/345', 'ha-tinh-huyen-cam-xuyen'),
(346, 'Huyện Kỳ Anh', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/346', 'ha-tinh-huyen-ky-anh'),
(347, 'Huyện Vũ Quang', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/347', 'ha-tinh-huyen-vu-quang'),
(348, 'Huyện Lộc Hà', 336, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/336/348', 'ha-tinh-huyen-loc-ha'),
(349, 'Hải Dương', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349', 'hai-duong'),
(350, 'Thành phố Hải Dương', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/350', 'hai-duong-thanh-pho-hai-duong'),
(351, 'Thị xã Chí Linh', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/351', 'hai-duong-thi-xa-chi-linh'),
(352, 'Huyện Nam Sách', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/352', 'hai-duong-huyen-nam-sach'),
(353, 'Huyện Kinh Môn', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/353', 'hai-duong-huyen-kinh-mon'),
(354, 'Huyện Gia Lộc', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/354', 'hai-duong-huyen-gia-loc'),
(355, 'Huyện Tứ Kỳ', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/355', 'hai-duong-huyen-tu-ky'),
(356, 'Huyện Thanh Miện', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/356', 'hai-duong-huyen-thanh-mien'),
(357, 'Huyện Ninh Giang', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/357', 'hai-duong-huyen-ninh-giang'),
(358, 'Huyện Cẩm Giàng', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/358', 'hai-duong-huyen-cam-giang'),
(359, 'Huyện Thanh Hà', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/359', 'hai-duong-huyen-thanh-ha'),
(360, 'Huyện Kim Thành', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/360', 'hai-duong-huyen-kim-thanh'),
(361, 'Huyện Bình Giang', 349, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/349/361', 'hai-duong-huyen-binh-giang'),
(362, 'Hòa Bình', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362', 'hoa-binh'),
(363, 'Thành phố Hoà Bình', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/363', 'hoa-binh-thanh-pho-hoa-binh'),
(364, 'Huyện Đà Bắc', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/364', 'hoa-binh-huyen-da-bac'),
(365, 'Huyện Mai Châu', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/365', 'hoa-binh-huyen-mai-chau'),
(366, 'Huyện Tân Lạc', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/366', 'hoa-binh-huyen-tan-lac'),
(367, 'Huyện Lạc Sơn', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/367', 'hoa-binh-huyen-lac-son'),
(368, 'Huyện Kỳ Sơn', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/368', 'hoa-binh-huyen-ky-son'),
(369, 'Huyện Lư­ơng Sơn', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/369', 'hoa-binh-huyen-luong-son'),
(370, 'Huyện Kim Bôi', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/370', 'hoa-binh-huyen-kim-boi'),
(371, 'Huyện Lạc Thuỷ', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/371', 'hoa-binh-huyen-lac-thuy'),
(372, 'Huyện Yên Thuỷ', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/372', 'hoa-binh-huyen-yen-thuy'),
(373, 'Huyện Cao Phong', 362, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/362/373', 'hoa-binh-huyen-cao-phong'),
(374, 'Hưng Yên', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374', 'hung-yen'),
(375, 'Thành phố Hưng Yên', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/375', 'hung-yen-thanh-pho-hung-yen'),
(376, 'Huyện Kim Động', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/376', 'hung-yen-huyen-kim-dong'),
(377, 'Huyện Ân Thi', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/377', 'hung-yen-huyen-an-thi'),
(378, 'Huyện Khoái Châu', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/378', 'hung-yen-huyen-khoai-chau'),
(379, 'Huyện Yên Mỹ', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/379', 'hung-yen-huyen-yen-my'),
(380, 'Huyện Tiên Lữ', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/380', 'hung-yen-huyen-tien-lu'),
(381, 'Huyện Phù Cừ', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/381', 'hung-yen-huyen-phu-cu'),
(382, 'Huyện Mỹ Hào', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/382', 'hung-yen-huyen-my-hao'),
(383, 'Huyện Văn Lâm', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/383', 'hung-yen-huyen-van-lam'),
(384, 'Huyện Văn Giang', 374, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/374/384', 'hung-yen-huyen-van-giang'),
(385, 'Kiên Giang ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385', 'kien-giang'),
(386, 'Thành phố Rạch Giá', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/386', 'kien-giang-thanh-pho-rach-gia'),
(387, 'Thị xã Hà Tiên', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/387', 'kien-giang-thi-xa-ha-tien'),
(388, 'Huyện Kiên Lương', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/388', 'kien-giang-huyen-kien-luong'),
(389, 'Huyện Hòn Đất', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/389', 'kien-giang-huyen-hon-dat'),
(390, 'Huyện Tân Hiệp', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/390', 'kien-giang-huyen-tan-hiep'),
(391, 'Huyện Châu Thành', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/391', 'kien-giang-huyen-chau-thanh'),
(392, 'Huyện Giồng Riềng', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/392', 'kien-giang-huyen-giong-rieng'),
(393, 'Huyện Gò Quao', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/393', 'kien-giang-huyen-go-quao'),
(394, 'Huyện An Biên', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/394', 'kien-giang-huyen-an-bien'),
(395, 'Huyện An Minh', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/395', 'kien-giang-huyen-an-minh'),
(396, 'Huyện Vĩnh Thuận', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/396', 'kien-giang-huyen-vinh-thuan'),
(397, 'Huyện đảo Phú Quốc', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/397', 'kien-giang-huyen-dao-phu-quoc'),
(398, 'Huyện Kiên Hải', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/398', 'kien-giang-huyen-kien-hai'),
(399, 'Huyện U Minh Thượng', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/399', 'kien-giang-huyen-u-minh-thuong'),
(400, 'Huyện Giang Thành', 385, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/385/400', 'kien-giang-huyen-giang-thanh'),
(401, 'Kon Tum', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401', 'kon-tum'),
(402, 'Thành phố KonTum', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/402', 'kon-tum-thanh-pho-kontum'),
(403, 'Huyện Đăk Glei', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/403', 'kon-tum-huyen-dak-glei'),
(404, 'Huyện Ngọc Hồi', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/404', 'kon-tum-huyen-ngoc-hoi'),
(405, 'Huyện Đăk Tô', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/405', 'kon-tum-huyen-dak-to'),
(406, 'Huyện Sa Thầy', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/406', 'kon-tum-huyen-sa-thay'),
(407, 'Huyện Kon Plong', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/407', 'kon-tum-huyen-kon-plong'),
(408, 'Huyện Đăk Hà', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/408', 'kon-tum-huyen-dak-ha'),
(409, 'Huyện Kon Rẫy', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/409', 'kon-tum-huyen-kon-ray'),
(410, 'Huyện Tu Mơ Rông', 401, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/401/410', 'kon-tum-huyen-tu-mo-rong'),
(411, 'Lai Châu', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411', 'lai-chau'),
(412, 'Thị xã Lai Châu', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/412', 'lai-chau-thi-xa-lai-chau'),
(413, 'Huyện Tam Đường', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/413', 'lai-chau-huyen-tam-duong'),
(414, 'Huyện Phong Thổ', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/414', 'lai-chau-huyen-phong-tho'),
(415, 'Huyện Sìn Hồ', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/415', 'lai-chau-huyen-sin-ho'),
(416, 'Huyện Mường Tè', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/416', 'lai-chau-huyen-muong-te'),
(417, 'Huyện Than Uyên', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/417', 'lai-chau-huyen-than-uyen'),
(418, 'Huyện Tân Uyên', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/418', 'lai-chau-huyen-tan-uyen'),
(419, 'Huyện Nậm Nhùn', 411, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/411/419', 'lai-chau-huyen-nam-nhun'),
(420, 'Lạng Sơn', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420', 'lang-son'),
(421, 'Thành phố Lạng Sơn', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/421', 'lang-son-thanh-pho-lang-son'),
(422, 'Huyện Tràng Định', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/422', 'lang-son-huyen-trang-dinh'),
(423, 'Huyện Bình Gia', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/423', 'lang-son-huyen-binh-gia'),
(424, 'Huyện Văn Lãng', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/424', 'lang-son-huyen-van-lang'),
(425, 'Huyện Bắc Sơn', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/425', 'lang-son-huyen-bac-son'),
(426, 'Huyện Văn Quan', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/426', 'lang-son-huyen-van-quan'),
(427, 'Huyện Cao Lộc', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/427', 'lang-son-huyen-cao-loc'),
(428, 'Huyện Lộc Bình', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/428', 'lang-son-huyen-loc-binh'),
(429, 'Huyện Chi Lăng', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/429', 'lang-son-huyen-chi-lang'),
(430, 'Huyện Đình Lập', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/430', 'lang-son-huyen-dinh-lap'),
(431, 'Huyện Hữu Lũng', 420, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/420/431', 'lang-son-huyen-huu-lung'),
(432, 'Lào Cai', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432', 'lao-cai');
INSERT INTO `tinhthanh` (`ID`, `Title`, `ParentID`, `Created`, `LastEdited`, `Path`, `Duongdan`) VALUES
(433, 'Thành phố Lào Cai', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/433', 'lao-cai-thanh-pho-lao-cai'),
(434, 'Huyện Xi Ma Cai', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/434', 'lao-cai-huyen-xi-ma-cai'),
(435, 'Huyện Bát Xát', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/435', 'lao-cai-huyen-bat-xat'),
(436, 'Huyện Bảo Thắng', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/436', 'lao-cai-huyen-bao-thang'),
(437, 'Huyện Sa Pa', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/437', 'lao-cai-huyen-sa-pa'),
(438, 'Huyện Văn Bàn', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/438', 'lao-cai-huyen-van-ban'),
(439, 'Huyện Bảo Yên', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/439', 'lao-cai-huyen-bao-yen'),
(440, 'Huyện Bắc Hà', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/440', 'lao-cai-huyen-bac-ha'),
(441, 'Huyện Mường Khương', 432, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/432/441', 'lao-cai-huyen-muong-khuong'),
(442, 'Lâm Đồng', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442', 'lam-dong'),
(443, 'Thành phố Đà Lạt', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/443', 'lam-dong-thanh-pho-da-lat'),
(444, 'Thị xã Bảo Lộc', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/444', 'lam-dong-thi-xa-bao-loc'),
(445, 'Huyện Đức Trọng', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/445', 'lam-dong-huyen-duc-trong'),
(446, 'Huyện Di Linh', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/446', 'lam-dong-huyen-di-linh'),
(447, 'Huyện Đơn Dương', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/447', 'lam-dong-huyen-don-duong'),
(448, 'Huyện Lạc Dương', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/448', 'lam-dong-huyen-lac-duong'),
(449, 'Huyện Đạ Huoai', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/449', 'lam-dong-huyen-da-huoai'),
(450, 'Huyện Đạ Tẻh', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/450', 'lam-dong-huyen-da-teh'),
(451, 'Huyện Cát Tiên', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/451', 'lam-dong-huyen-cat-tien'),
(452, 'Huyện Lâm Hà', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/452', 'lam-dong-huyen-lam-ha'),
(453, 'Huyện Bảo Lâm', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/453', 'lam-dong-huyen-bao-lam'),
(454, 'Huyện Đam Rông', 442, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/442/454', 'lam-dong-huyen-dam-rong'),
(455, 'Nam Định ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455', 'nam-dinh'),
(456, 'Thành phố Nam Định', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/456', 'nam-dinh-thanh-pho-nam-dinh'),
(457, 'Huyện Mỹ Lộc', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/457', 'nam-dinh-huyen-my-loc'),
(458, 'Huyện Xuân Trường', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/458', 'nam-dinh-huyen-xuan-truong'),
(459, 'Huyện Giao Thủy', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/459', 'nam-dinh-huyen-giao-thuy'),
(460, 'Huyện Ý Yên', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/460', 'nam-dinh-huyen-y-yen'),
(461, 'Huyện Vụ Bản', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/461', 'nam-dinh-huyen-vu-ban'),
(462, 'Huyện Nam Trực', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/462', 'nam-dinh-huyen-nam-truc'),
(463, 'Huyện Trực Ninh', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/463', 'nam-dinh-huyen-truc-ninh'),
(464, 'Huyện Nghĩa Hưng', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/464', 'nam-dinh-huyen-nghia-hung'),
(465, 'Huyện Hải Hậu', 455, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/455/465', 'nam-dinh-huyen-hai-hau'),
(466, 'Nghệ An', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466', 'nghe-an'),
(467, 'Thành phố Vinh', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/467', 'nghe-an-thanh-pho-vinh'),
(468, 'Thị xã Cửa Lò', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/468', 'nghe-an-thi-xa-cua-lo'),
(469, 'Huyện Quỳ Châu', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/469', 'nghe-an-huyen-quy-chau'),
(470, 'Huyện Quỳ Hợp', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/470', 'nghe-an-huyen-quy-hop'),
(471, 'Huyện Nghĩa Đàn', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/471', 'nghe-an-huyen-nghia-dan'),
(472, 'Huyện Quỳnh Lưu', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/472', 'nghe-an-huyen-quynh-luu'),
(473, 'Huyện Kỳ Sơn', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/473', 'nghe-an-huyen-ky-son'),
(474, 'Huyện Tương Dương', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/474', 'nghe-an-huyen-tuong-duong'),
(475, 'Huyện Con Cuông', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/475', 'nghe-an-huyen-con-cuong'),
(476, 'Huyện Tân Kỳ', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/476', 'nghe-an-huyen-tan-ky'),
(477, 'Huyện Yên Thành', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/477', 'nghe-an-huyen-yen-thanh'),
(478, 'Huyện Diễn Châu', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/478', 'nghe-an-huyen-dien-chau'),
(479, 'Huyện Anh Sơn', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/479', 'nghe-an-huyen-anh-son'),
(480, 'Huyện Đô Lương', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/480', 'nghe-an-huyen-do-luong'),
(481, 'Huyện Thanh Chương', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/481', 'nghe-an-huyen-thanh-chuong'),
(482, 'Huyện Nghi Lộc', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/482', 'nghe-an-huyen-nghi-loc'),
(483, 'Huyện Nam Đàn', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/483', 'nghe-an-huyen-nam-dan'),
(484, 'Huyện Hưng Nguyên', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/484', 'nghe-an-huyen-hung-nguyen'),
(485, 'Huyện Quế Phong', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/485', 'nghe-an-huyen-que-phong'),
(486, 'Thị xã Thái Hòa', 466, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/466/486', 'nghe-an-thi-xa-thai-hoa'),
(487, 'Ninh Bình', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487', 'ninh-binh'),
(488, 'Thành phố Ninh Bình', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/488', 'ninh-binh-thanh-pho-ninh-binh'),
(489, 'Thị xã Tam Điệp', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/489', 'ninh-binh-thi-xa-tam-diep'),
(490, 'Huyện Nho Quan', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/490', 'ninh-binh-huyen-nho-quan'),
(491, 'Huyện Gia Viễn', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/491', 'ninh-binh-huyen-gia-vien'),
(492, 'Huyện Hoa Lư', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/492', 'ninh-binh-huyen-hoa-lu'),
(493, 'Huyện Yên Mô', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/493', 'ninh-binh-huyen-yen-mo'),
(494, 'Huyện Kim Sơn', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/494', 'ninh-binh-huyen-kim-son'),
(495, 'Huyện Yên Khánh', 487, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/487/495', 'ninh-binh-huyen-yen-khanh'),
(496, 'Ninh Thuận ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496', 'ninh-thuan'),
(497, 'Thành phố Phan Rang -Tháp Chàm', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/497', 'ninh-thuan-thanh-pho-phan-rang-thap-cham'),
(498, 'Huyện Ninh Sơn', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/498', 'ninh-thuan-huyen-ninh-son'),
(499, 'Huyện Ninh Hải', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/499', 'ninh-thuan-huyen-ninh-hai'),
(500, 'Huyện Ninh Phước', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/500', 'ninh-thuan-huyen-ninh-phuoc'),
(501, 'Huyện Bác Ái', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/501', 'ninh-thuan-huyen-bac-ai'),
(502, 'Huyện Thuận Bắc', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/502', 'ninh-thuan-huyen-thuan-bac'),
(503, 'Huyện Thuận Nam', 496, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/496/503', 'ninh-thuan-huyen-thuan-nam'),
(504, 'Phú Thọ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504', 'phu-tho'),
(505, 'TP. Việt Trì', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/505', 'phu-tho-tp-viet-tri'),
(506, 'Thị xã Phú Thọ', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/506', 'phu-tho-thi-xa-phu-tho'),
(507, 'Huyện Đoan Hùng', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/507', 'phu-tho-huyen-doan-hung'),
(508, 'Huyện Thanh Ba', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/508', 'phu-tho-huyen-thanh-ba'),
(509, 'Huyện Hạ Hoà', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/509', 'phu-tho-huyen-ha-hoa'),
(510, 'Huyện Cẩm Khê', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/510', 'phu-tho-huyen-cam-khe'),
(511, 'Huyện Yên Lập', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/511', 'phu-tho-huyen-yen-lap'),
(512, 'Huyện Thanh Sơn', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/512', 'phu-tho-huyen-thanh-son'),
(513, 'Huyện Phù Ninh', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/513', 'phu-tho-huyen-phu-ninh'),
(514, 'Huyện Lâm Thao', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/514', 'phu-tho-huyen-lam-thao'),
(515, 'Huyện Tam Nông', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/515', 'phu-tho-huyen-tam-nong'),
(516, 'Huyện Thanh Thủy', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/516', 'phu-tho-huyen-thanh-thuy'),
(517, 'Huyện Tân Sơn', 504, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/504/517', 'phu-tho-huyen-tan-son'),
(518, 'Phú Yên', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/518', 'phu-yen'),
(519, 'Quảng Bình', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519', 'quang-binh'),
(520, 'Thành phố Đồng Hới', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/520', 'quang-binh-thanh-pho-dong-hoi'),
(521, 'Huyện Tuyên Hoá', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/521', 'quang-binh-huyen-tuyen-hoa'),
(522, 'Huyện Minh Hoá', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/522', 'quang-binh-huyen-minh-hoa'),
(523, 'Huyện Quảng Trạch', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/523', 'quang-binh-huyen-quang-trach'),
(524, 'Huyện Bố Trạch', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/524', 'quang-binh-huyen-bo-trach'),
(525, 'Huyện Quảng Ninh', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/525', 'quang-binh-huyen-quang-ninh'),
(526, 'Huyện Lệ Thuỷ', 519, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/519/526', 'quang-binh-huyen-le-thuy'),
(527, 'Quảng Nam', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527', 'quang-nam'),
(528, 'Thành phố Tam Kỳ', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/528', 'quang-nam-thanh-pho-tam-ky'),
(529, 'Thành phố Hội An', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/529', 'quang-nam-thanh-pho-hoi-an'),
(530, 'Huyện Duy Xuyên', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/530', 'quang-nam-huyen-duy-xuyen'),
(531, 'Huyện Điện Bàn', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/531', 'quang-nam-huyen-dien-ban'),
(532, 'Huyện Đại Lộc', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/532', 'quang-nam-huyen-dai-loc'),
(533, 'Huyện Quế Sơn', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/533', 'quang-nam-huyen-que-son'),
(534, 'Huyện Hiệp Đức', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/534', 'quang-nam-huyen-hiep-duc'),
(535, 'Huyện Thăng Bình', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/535', 'quang-nam-huyen-thang-binh'),
(536, 'Huyện Núi Thành', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/536', 'quang-nam-huyen-nui-thanh'),
(537, 'Huyện Tiên Phước', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/537', 'quang-nam-huyen-tien-phuoc'),
(538, 'Huyện Bắc Trà My', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/538', 'quang-nam-huyen-bac-tra-my'),
(539, 'Huyện Đông Giang', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/539', 'quang-nam-huyen-dong-giang'),
(540, 'Huyện Nam Giang', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/540', 'quang-nam-huyen-nam-giang'),
(541, 'Huyện Phước Sơn', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/541', 'quang-nam-huyen-phuoc-son'),
(542, 'Huyện Nam Trà My', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/542', 'quang-nam-huyen-nam-tra-my'),
(543, 'Huyện Tây Giang', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/543', 'quang-nam-huyen-tay-giang'),
(544, 'Huyện Phú Ninh', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/544', 'quang-nam-huyen-phu-ninh'),
(545, 'Huyện Nông Sơn', 527, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/527/545', 'quang-nam-huyen-nong-son'),
(546, 'Quảng Nghãi', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546', 'quang-nghai'),
(547, 'Thành phố Quảng Ngãi', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/547', 'quang-nghai-thanh-pho-quang-ngai'),
(548, 'Huyện Lý Sơn', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/548', 'quang-nghai-huyen-ly-son'),
(549, 'Huyện Bình Sơn', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/549', 'quang-nghai-huyen-binh-son'),
(550, 'Huyện Trà Bồng', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/550', 'quang-nghai-huyen-tra-bong'),
(551, 'Huyện Sơn Tịnh', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/551', 'quang-nghai-huyen-son-tinh'),
(552, 'Huyện Sơn Hà', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/552', 'quang-nghai-huyen-son-ha'),
(553, 'Huyện Tư Nghĩa', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/553', 'quang-nghai-huyen-tu-nghia'),
(554, 'Huyện Nghĩa Hành', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/554', 'quang-nghai-huyen-nghia-hanh'),
(555, 'Huyện Minh Long', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/555', 'quang-nghai-huyen-minh-long'),
(556, 'Huyện Mộ Đức', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/556', 'quang-nghai-huyen-mo-duc'),
(557, 'Huyện Đức Phổ', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/557', 'quang-nghai-huyen-duc-pho'),
(558, 'Huyện Ba Tơ', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/558', 'quang-nghai-huyen-ba-to'),
(559, 'Huyện Sơn Tây', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/559', 'quang-nghai-huyen-son-tay'),
(560, 'Huyện Tây Trà', 546, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/546/560', 'quang-nghai-huyen-tay-tra'),
(561, 'Quảng Ninh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561', 'quang-ninh'),
(562, 'Thành phố Hạ Long', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/562', 'quang-ninh-thanh-pho-ha-long'),
(563, 'Thành phố Cẩm Phả', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/563', 'quang-ninh-thanh-pho-cam-pha'),
(564, 'Thành phố Uông Bí', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/564', 'quang-ninh-thanh-pho-uong-bi'),
(565, 'Thành phố Móng Cái', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/565', 'quang-ninh-thanh-pho-mong-cai'),
(566, 'Huyện Bình Liêu', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/566', 'quang-ninh-huyen-binh-lieu'),
(567, 'Huyện Đầm Hà', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/567', 'quang-ninh-huyen-dam-ha'),
(568, 'Huyện Hải Hà', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/568', 'quang-ninh-huyen-hai-ha'),
(569, 'Huyện Tiên Yên', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/569', 'quang-ninh-huyen-tien-yen'),
(570, 'Huyện Ba Chẽ', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/570', 'quang-ninh-huyen-ba-che'),
(571, 'Huyện Đông Triều', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/571', 'quang-ninh-huyen-dong-trieu'),
(572, 'Thị xã Quảng Yên', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/572', 'quang-ninh-thi-xa-quang-yen'),
(573, 'Huyện Hoành Bồ', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/573', 'quang-ninh-huyen-hoanh-bo'),
(574, 'Huyện Vân Đồn', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/574', 'quang-ninh-huyen-van-don'),
(575, 'Huyện Cô Tô', 561, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/561/575', 'quang-ninh-huyen-co-to'),
(576, 'Quảng Trị', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576', 'quang-tri'),
(577, 'Thành phố Đông Hà', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/577', 'quang-tri-thanh-pho-dong-ha'),
(578, 'Thị xã Quảng Trị', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/578', 'quang-tri-thi-xa-quang-tri'),
(579, 'Huyện Vĩnh Linh', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/579', 'quang-tri-huyen-vinh-linh'),
(580, 'Huyện Gio Linh', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/580', 'quang-tri-huyen-gio-linh'),
(581, 'Huyện Cam Lộ', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/581', 'quang-tri-huyen-cam-lo'),
(582, 'Huyện Triệu Phong', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/582', 'quang-tri-huyen-trieu-phong'),
(583, 'Huyện Hải Lăng', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/583', 'quang-tri-huyen-hai-lang'),
(584, 'Huyện Hướng Hóa', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/584', 'quang-tri-huyen-huong-hoa'),
(585, 'Huyện Đăk Rông', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/585', 'quang-tri-huyen-dak-rong'),
(586, 'Huyện đảo Cồn Cỏ', 576, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/576/586', 'quang-tri-huyen-dao-con-co'),
(587, 'Sơn La', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/587', 'son-la'),
(588, 'Sơn La', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/588', 'son-la'),
(589, 'Tây Ninh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589', 'tay-ninh'),
(590, 'Thị xã Tây Ninh', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/590', 'tay-ninh-thi-xa-tay-ninh'),
(591, 'Huyện Tân Biên', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/591', 'tay-ninh-huyen-tan-bien'),
(592, 'Huyện Tân Châu', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/592', 'tay-ninh-huyen-tan-chau'),
(593, 'Huyện Dương Minh Châu', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/593', 'tay-ninh-huyen-duong-minh-chau'),
(594, 'Huyện Châu Thành', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/594', 'tay-ninh-huyen-chau-thanh'),
(595, 'Huyện Hòa Thành', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/595', 'tay-ninh-huyen-hoa-thanh'),
(596, 'Huyện Bến Cầu', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/596', 'tay-ninh-huyen-ben-cau'),
(597, 'Huyện Gò Dầu', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/597', 'tay-ninh-huyen-go-dau'),
(598, 'Huyện Trảng Bàng', 589, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/589/598', 'tay-ninh-huyen-trang-bang'),
(599, 'Thái Bình', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599', 'thai-binh'),
(600, 'Thành phố Thái Bình', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/600', 'thai-binh-thanh-pho-thai-binh'),
(601, 'Huyện Quỳnh Phụ', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/601', 'thai-binh-huyen-quynh-phu'),
(602, 'Huyện Hưng Hà', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/602', 'thai-binh-huyen-hung-ha'),
(603, 'Huyện Đông Hưng', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/603', 'thai-binh-huyen-dong-hung'),
(604, 'Huyện Vũ Thư', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/604', 'thai-binh-huyen-vu-thu'),
(605, 'Huyện Kiến Xương', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/605', 'thai-binh-huyen-kien-xuong'),
(606, 'Huyện Tiền Hải', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/606', 'thai-binh-huyen-tien-hai'),
(607, 'Huyện Thái Thuỵ', 599, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/599/607', 'thai-binh-huyen-thai-thuy'),
(608, 'Thái Nguyên ', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608', 'thai-nguyen'),
(609, 'TP.Thái Nguyên', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/609', 'thai-nguyen-tpthai-nguyen'),
(610, 'Thị xã Sông Công', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/610', 'thai-nguyen-thi-xa-song-cong'),
(611, 'Huyện Định Hoá', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/611', 'thai-nguyen-huyen-dinh-hoa'),
(612, 'Huyện Phú Lương', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/612', 'thai-nguyen-huyen-phu-luong'),
(613, 'Huyện Võ Nhai', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/613', 'thai-nguyen-huyen-vo-nhai'),
(614, 'Huyện Đại Từ', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/614', 'thai-nguyen-huyen-dai-tu'),
(615, 'Huyện Đồng Hỷ', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/615', 'thai-nguyen-huyen-dong-hy'),
(616, 'Huyện Phú Bình', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/616', 'thai-nguyen-huyen-phu-binh'),
(617, 'Huyện Phổ Yên', 608, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/608/617', 'thai-nguyen-huyen-pho-yen'),
(618, 'Thanh Hóa', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618', 'thanh-hoa'),
(619, 'Thành phố Thanh Hoá', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/619', 'thanh-hoa-thanh-pho-thanh-hoa'),
(620, 'Thị xã Bỉm Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/620', 'thanh-hoa-thi-xa-bim-son'),
(621, 'Thị xã Sầm Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/621', 'thanh-hoa-thi-xa-sam-son'),
(622, 'Huyện Quan Hoá', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/622', 'thanh-hoa-huyen-quan-hoa'),
(623, 'Huyện Quan Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/623', 'thanh-hoa-huyen-quan-son'),
(624, 'Huyện Mường Lát', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/624', 'thanh-hoa-huyen-muong-lat'),
(625, 'Huyện Bá Thước', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/625', 'thanh-hoa-huyen-ba-thuoc'),
(626, 'Huyện Thường Xuân', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/626', 'thanh-hoa-huyen-thuong-xuan'),
(627, 'Huyện Như Xuân', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/627', 'thanh-hoa-huyen-nhu-xuan'),
(628, 'Huyện Như Thanh', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/628', 'thanh-hoa-huyen-nhu-thanh'),
(629, 'Huyện Lang Chánh', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/629', 'thanh-hoa-huyen-lang-chanh'),
(630, 'Huyện Ngọc Lặc', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/630', 'thanh-hoa-huyen-ngoc-lac'),
(631, 'Huyện Thạch Thành', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/631', 'thanh-hoa-huyen-thach-thanh'),
(632, 'Huyện Cẩm Thủy', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/632', 'thanh-hoa-huyen-cam-thuy'),
(633, 'Huyện Thọ Xuân', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/633', 'thanh-hoa-huyen-tho-xuan'),
(634, 'Huyện Vĩnh Lộc', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/634', 'thanh-hoa-huyen-vinh-loc'),
(635, 'Huyện Thiệu Hoá', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/635', 'thanh-hoa-huyen-thieu-hoa'),
(636, 'Huyện Triệu Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/636', 'thanh-hoa-huyen-trieu-son'),
(637, 'Huyện Nông Cống', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/637', 'thanh-hoa-huyen-nong-cong'),
(638, 'Huyện Đông Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/638', 'thanh-hoa-huyen-dong-son'),
(639, 'Huyện Hà Trung', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/639', 'thanh-hoa-huyen-ha-trung'),
(640, 'Huyện Hoằng Hoá', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/640', 'thanh-hoa-huyen-hoang-hoa'),
(641, 'Huyện Nga Sơn', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/641', 'thanh-hoa-huyen-nga-son'),
(642, 'Huyện Hậu Lộc', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/642', 'thanh-hoa-huyen-hau-loc'),
(643, 'Huyện Quảng Xương', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/643', 'thanh-hoa-huyen-quang-xuong'),
(644, 'Huyện Tĩnh Gia', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/644', 'thanh-hoa-huyen-tinh-gia'),
(645, 'Huyện Yên Định', 618, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/618/645', 'thanh-hoa-huyen-yen-dinh'),
(646, 'Tiền Giang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646', 'tien-giang'),
(647, 'Thành Phố Mỹ Tho', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/647', 'tien-giang-thanh-pho-my-tho'),
(648, 'Thị xã Gò Công', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/648', 'tien-giang-thi-xa-go-cong'),
(649, 'Huyện Cái Bè', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/649', 'tien-giang-huyen-cai-be'),
(650, 'Huyện Cai Lậy', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/650', 'tien-giang-huyen-cai-lay'),
(651, 'Huyyện Châu Thành', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/651', 'tien-giang-huyyen-chau-thanh'),
(652, 'Huyện Chợ Gạo', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/652', 'tien-giang-huyen-cho-gao'),
(653, 'Huyện Gò Công Tây', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/653', 'tien-giang-huyen-go-cong-tay'),
(654, 'Huyện Gò Công Đông', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/654', 'tien-giang-huyen-go-cong-dong'),
(655, 'Huyện Tân Phước', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/655', 'tien-giang-huyen-tan-phuoc'),
(656, 'Huyện Tân Phú Đông', 646, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/646/656', 'tien-giang-huyen-tan-phu-dong'),
(657, 'Trà Vinh', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657', 'tra-vinh'),
(658, 'Thành phố Trà Vinh', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/658', 'tra-vinh-thanh-pho-tra-vinh'),
(659, 'Huyện Càng Long', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/659', 'tra-vinh-huyen-cang-long'),
(660, 'Huyện Cầu Kè', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/660', 'tra-vinh-huyen-cau-ke'),
(661, 'Huyện Tiểu Cần', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/661', 'tra-vinh-huyen-tieu-can'),
(662, 'Huyện Châu Thành', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/662', 'tra-vinh-huyen-chau-thanh'),
(663, 'Huyện Trà Cú', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/663', 'tra-vinh-huyen-tra-cu'),
(664, 'Huyện Cầu Ngang', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/664', 'tra-vinh-huyen-cau-ngang'),
(665, 'Huyện Duyên Hải', 657, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/657/665', 'tra-vinh-huyen-duyen-hai'),
(666, 'Tuyên Quang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666', 'tuyen-quang'),
(667, 'Th. phố Tuyên Quang', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/667', 'tuyen-quang-th-pho-tuyen-quang'),
(668, 'Huyện Lâm Bình', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/668', 'tuyen-quang-huyen-lam-binh'),
(669, 'Huyện Na Hang', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/669', 'tuyen-quang-huyen-na-hang'),
(670, 'Huyện Chiêm Hoá', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/670', 'tuyen-quang-huyen-chiem-hoa'),
(671, 'Huyện Hàm Yên', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/671', 'tuyen-quang-huyen-ham-yen'),
(672, 'Huyện Yên Sơn', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/672', 'tuyen-quang-huyen-yen-son'),
(673, 'Huyện Sơn Dương', 666, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/666/673', 'tuyen-quang-huyen-son-duong'),
(674, 'Vĩnh Long', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674', 'vinh-long'),
(675, 'Thành phố Vĩnh Long', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/675', 'vinh-long-thanh-pho-vinh-long'),
(676, 'Huyện Long Hồ', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/676', 'vinh-long-huyen-long-ho'),
(677, 'Huyện Mang Thít', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/677', 'vinh-long-huyen-mang-thit'),
(678, 'Thị xã Bình Minh', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/678', 'vinh-long-thi-xa-binh-minh'),
(679, 'Huyện Tam Bình', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/679', 'vinh-long-huyen-tam-binh'),
(680, 'Huyện Trà Ôn', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/680', 'vinh-long-huyen-tra-on'),
(681, 'Huyện Vũng Liêm', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/681', 'vinh-long-huyen-vung-liem'),
(682, 'Huyện Bình Tân', 674, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/674/682', 'vinh-long-huyen-binh-tan'),
(683, 'Vĩnh Phúc', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683', 'vinh-phuc'),
(684, 'Thành phố Vĩnh Yên', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/684', 'vinh-phuc-thanh-pho-vinh-yen'),
(685, 'Huyện Tam Dương', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/685', 'vinh-phuc-huyen-tam-duong'),
(686, 'Huyện Lập Thạch', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/686', 'vinh-phuc-huyen-lap-thach'),
(687, 'Huyện Vĩnh Tường', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/687', 'vinh-phuc-huyen-vinh-tuong'),
(688, 'Huyện Yên Lạc', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/688', 'vinh-phuc-huyen-yen-lac'),
(689, 'Huyện Bình Xuyên', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/689', 'vinh-phuc-huyen-binh-xuyen'),
(690, 'Huyện Sông Lô', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/690', 'vinh-phuc-huyen-song-lo'),
(691, 'Thị xã Phúc Yên', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/691', 'vinh-phuc-thi-xa-phuc-yen'),
(692, 'Huyện Tam Đảo', 683, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/683/692', 'vinh-phuc-huyen-tam-dao'),
(693, 'Yên Bái', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693', 'yen-bai'),
(694, 'Thành phố Yên Bái', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/694', 'yen-bai-thanh-pho-yen-bai'),
(695, 'Thị xã Nghĩa Lộ', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/695', 'yen-bai-thi-xa-nghia-lo'),
(696, 'Huyện Văn Yên', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/696', 'yen-bai-huyen-van-yen'),
(697, 'Huyện Yên Bình', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/697', 'yen-bai-huyen-yen-binh'),
(698, 'Huyện Mù Cang Chải', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/698', 'yen-bai-huyen-mu-cang-chai'),
(699, 'Huyện Văn Chấn', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/699', 'yen-bai-huyen-van-chan'),
(700, 'Huyện Trấn Yên', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/700', 'yen-bai-huyen-tran-yen'),
(701, 'Huyện Trạm Tấu', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/701', 'yen-bai-huyen-tram-tau'),
(702, 'Huyện Lục Yên', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/702', 'yen-bai-huyen-luc-yen'),
(703, 'Thành phố Sơn La', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/703', 'yen-bai-thanh-pho-son-la'),
(704, 'Huyện Quỳnh Nhai', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/704', 'yen-bai-huyen-quynh-nhai'),
(705, 'Huyện Mường La', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/705', 'yen-bai-huyen-muong-la'),
(706, 'Huyện Thuận Châu', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/706', 'yen-bai-huyen-thuan-chau'),
(707, 'Huyện Bắc Yên', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/707', 'yen-bai-huyen-bac-yen'),
(708, 'Huyện Phù Yên', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/708', 'yen-bai-huyen-phu-yen'),
(709, 'Huyện Mai Sơn', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/709', 'yen-bai-huyen-mai-son'),
(710, 'Huyện Yên Châu', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/710', 'yen-bai-huyen-yen-chau'),
(711, 'Huyện Sông Mã', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/711', 'yen-bai-huyen-song-ma'),
(712, 'Huyện Mộc Châu', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/712', 'yen-bai-huyen-moc-chau'),
(713, 'Huyện Sốp Cộp', 693, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/693/713', 'yen-bai-huyen-sop-cop'),
(714, 'Điện Biên', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714', 'dien-bien'),
(715, 'TP. Điện Biên Phủ', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/715', 'dien-bien-tp-dien-bien-phu'),
(716, 'Thị xã Mường Lay', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/716', 'dien-bien-thi-xa-muong-lay'),
(717, 'Huyện Điện Biên', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/717', 'dien-bien-huyen-dien-bien'),
(718, 'Huyện Tuần Giáo', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/718', 'dien-bien-huyen-tuan-giao'),
(719, 'Huyện Mường Chà', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/719', 'dien-bien-huyen-muong-cha'),
(720, 'Huyện Tủa Chùa', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/720', 'dien-bien-huyen-tua-chua'),
(721, 'Huyện Điện Biên Đông', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/721', 'dien-bien-huyen-dien-bien-dong'),
(722, 'Huyện Mường Nhé', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/722', 'dien-bien-huyen-muong-nhe'),
(723, 'Huyện Mường Ảng', 714, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/714/723', 'dien-bien-huyen-muong-ang'),
(724, 'Đăk Nông', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724', 'dak-nong'),
(725, 'Thị xã Gia Nghĩa', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/725', 'dak-nong-thi-xa-gia-nghia'),
(726, 'Huyện Đắk R’Lấp', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/726', 'dak-nong-huyen-dak-rlap'),
(727, 'Huyện Đắk Mil', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/727', 'dak-nong-huyen-dak-mil'),
(728, 'Huyện Cư Jút', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/728', 'dak-nong-huyen-cu-jut'),
(729, 'Huyện Đắk Song', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/729', 'dak-nong-huyen-dak-song'),
(730, 'Huyện Krông Nô', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/730', 'dak-nong-huyen-krong-no'),
(731, 'Huyện Đắk GLong', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/731', 'dak-nong-huyen-dak-glong'),
(732, 'Huyện Tuy Đức', 724, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/724/732', 'dak-nong-huyen-tuy-duc'),
(733, 'Hậu Giang', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733', 'hau-giang'),
(734, 'Thành phố Vị Thanh', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/734', 'hau-giang-thanh-pho-vi-thanh'),
(735, 'Huyện Vị Thuỷ', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/735', 'hau-giang-huyen-vi-thuy'),
(736, 'Huyện Long Mỹ', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/736', 'hau-giang-huyen-long-my'),
(737, 'Huyện Phụng Hiệp', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/737', 'hau-giang-huyen-phung-hiep'),
(738, 'Huyện Châu Thành', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/738', 'hau-giang-huyen-chau-thanh'),
(739, 'Huyện Châu Thành A', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/739', 'hau-giang-huyen-chau-thanh-a'),
(740, 'Thị xã Ngã Bảy', 733, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/733/740', 'hau-giang-thi-xa-nga-bay'),
(741, 'Bến Tre', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741', 'ben-tre'),
(742, 'Thành phố Bến Tre', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/742', 'ben-tre-thanh-pho-ben-tre'),
(743, 'Huyện Châu Thành', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/743', 'ben-tre-huyen-chau-thanh'),
(744, 'Huyện Chợ Lách', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/744', 'ben-tre-huyen-cho-lach'),
(745, 'Huyện Mỏ Cày Bắc', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/745', 'ben-tre-huyen-mo-cay-bac'),
(746, 'Huyện Giồng Trôm', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/746', 'ben-tre-huyen-giong-trom'),
(747, 'Huyện Bình Đại', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/747', 'ben-tre-huyen-binh-dai'),
(748, 'Huyện Ba Tri', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/748', 'ben-tre-huyen-ba-tri'),
(749, 'Huyện Thạnh Phú', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/749', 'ben-tre-huyen-thanh-phu'),
(750, 'Huyện Mỏ Cày Nam', 741, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/741/750', 'ben-tre-huyen-mo-cay-nam'),
(751, 'Sóc Trăng', 0, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751', 'soc-trang'),
(752, 'Thành phố Sóc Trăng', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/752', 'soc-trang-thanh-pho-soc-trang'),
(753, 'Huyện Kế Sách', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/753', 'soc-trang-huyen-ke-sach'),
(754, 'Huyện Mỹ Tú', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/754', 'soc-trang-huyen-my-tu'),
(755, 'Huyện Mỹ Xuyên', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/755', 'soc-trang-huyen-my-xuyen'),
(756, 'Huyện Thạnh Trị', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/756', 'soc-trang-huyen-thanh-tri'),
(757, 'Huyện Long Phú', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/757', 'soc-trang-huyen-long-phu'),
(758, 'Thị xã Vĩnh Châu', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/758', 'soc-trang-thi-xa-vinh-chau'),
(759, 'Huyện Cù Lao Dung', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/759', 'soc-trang-huyen-cu-lao-dung'),
(760, 'Huyện Ngã Năm', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/760', 'soc-trang-huyen-nga-nam'),
(761, 'Huyện Châu Thành', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/761', 'soc-trang-huyen-chau-thanh'),
(762, 'Huyện Trần Đề', 751, '2014-11-02 16:46:11', '2014-11-02 16:46:11', '0/751/762', 'soc-trang-huyen-tran-de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
