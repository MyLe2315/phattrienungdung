-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2022 at 11:19 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web11`
--

-- --------------------------------------------------------

--
-- Table structure for table `baikiemtra`
--

CREATE TABLE `baikiemtra` (
  `idbaikiemtra` int(10) unsigned NOT NULL auto_increment,
  `made` int(11) NOT NULL,
  `ngayrade` date NOT NULL,
  `tieude` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `loaibaikiemtra` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `kythi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idmonhoc` int(11) NOT NULL,
  `idgiaovien` int(11) NOT NULL,
  `tenhocsinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idbaikiemtra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `baikiemtra`
--


-- --------------------------------------------------------

--
-- Table structure for table `diemvadanhgia`
--

CREATE TABLE `diemvadanhgia` (
  `iddiemso` int(10) unsigned NOT NULL auto_increment,
  `diemso` int(11) NOT NULL,
  `malop` int(11) NOT NULL,
  `tenhocsinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idbaikiemtra` int(11) NOT NULL,
  `trangthai` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`iddiemso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `diemvadanhgia`
--


-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `idgiaovien` int(10) unsigned NOT NULL auto_increment,
  `magiaovien` int(11) NOT NULL,
  `diachi` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `hodem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tengiaovien` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `idmonhoc` int(11) NOT NULL,
  PRIMARY KEY  (`idgiaovien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`idgiaovien`, `magiaovien`, `diachi`, `email`, `sdt`, `hodem`, `tengiaovien`, `ngaysinh`, `idmonhoc`) VALUES
(3, 13, '  12 Nguyễn Văn Bảo , phường 4 , Gò Vấp , HCM', 'phuoclocnguyen2001@gmail.com', '0984651253', 'Nguyễn Văn ', 'B', '2001-10-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `idhocsinh` int(10) unsigned NOT NULL auto_increment,
  `mahocsinh` int(11) NOT NULL,
  `tenhocsinh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hodem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `malop` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `idlophoc` int(11) NOT NULL,
  `idmonhoc` int(11) NOT NULL,
  `idkhoilop` int(11) NOT NULL,
  PRIMARY KEY  (`idhocsinh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hocsinh`
--


-- --------------------------------------------------------

--
-- Table structure for table `khoilop`
--

CREATE TABLE `khoilop` (
  `idkhoilop` int(10) unsigned NOT NULL auto_increment,
  `makhoi` int(11) NOT NULL,
  `tenkhoi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `soluonglop` int(11) NOT NULL,
  PRIMARY KEY  (`idkhoilop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `khoilop`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaibaikiemtra`
--

CREATE TABLE `loaibaikiemtra` (
  `idloai` int(10) unsigned NOT NULL auto_increment,
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loaibaikiemtra`
--


-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `idlophoc` int(11) unsigned NOT NULL auto_increment,
  `malop` int(11) NOT NULL,
  `makhoi` int(11) NOT NULL,
  `tenlop` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idmonhoc` int(11) NOT NULL,
  PRIMARY KEY  (`idlophoc`),
  UNIQUE KEY `malop` (`malop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`idlophoc`, `malop`, `makhoi`, `tenlop`, `idmonhoc`) VALUES
(1, 61, 6, '6A1', 0),
(2, 62, 6, '6A2', 0),
(3, 63, 6, '6A3', 0),
(4, 71, 7, '7A1', 0),
(5, 72, 7, '7A2', 0),
(6, 73, 7, '7A3', 0),
(7, 81, 8, '8A1', 0),
(8, 82, 8, '8A2', 0),
(9, 83, 8, '8A3', 0),
(10, 91, 9, '9A1', 0),
(11, 92, 9, '9A2', 0),
(12, 93, 9, '9A3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mohoc`
--

CREATE TABLE `mohoc` (
  `idmonhoc` int(10) unsigned NOT NULL auto_increment,
  `mamon` int(11) NOT NULL,
  `tenmon` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idlophoc` int(11) NOT NULL,
  `idgiaovien` int(11) NOT NULL,
  PRIMARY KEY  (`idmonhoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mohoc`
--


-- --------------------------------------------------------

--
-- Table structure for table `nganhangcauhoi`
--

CREATE TABLE `nganhangcauhoi` (
  `id` int(11) NOT NULL auto_increment,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `nganhangcauhoi`
--

INSERT INTO `nganhangcauhoi` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Đâu là chương trình trong máy tính?', 'Word', 'Excel', 'Powerpoint', 'Tất cả đáp án trên', 'D'),
(2, 'Chương trình liveshow truyền hình?', 'Ai là triệu phú', 'Hãy chọn giá đúng', 'Vietnam got Talents', 'All', 'D'),
(3, 'Luật Tổ chức chính quyền địa phương được Quốc Hội thông qua ngày tháng năm nào?', 'Ngày 19/06/2016', 'Ngày 19/06/2015', 'Ngày 21/12/2015', 'Ngày 01/07/2016', 'B'),
(4, 'Luật Tổ chức chính quyền địa phương 2015 có hiệu lực từ ngày tháng năm nào?', '01/01/2016', '20/10/2015', '31/12/2015', '01/07/2016', 'A'),
(6, 'Chương I Luật tổ chức chính quyền địa phương có mấy điều?', '15', '20', '25', '30', 'A'),
(7, 'Phạm vi điều chỉnh của Luật Tổ chức chính quyền địa phương có nội dung gì?', 'Quy định về đơn vị hành chính và tổ chức, hoạt động cũng như nguyên tắc vận hành của các đơn vị hành chính.', 'Quy định về đơn vị hành chính và tổ chức, hoạt động của chính quyền địa phương ở các đơn vị hành chính.', 'Quy định về chính quyền địa phương các cấp tại các đơn vị hành chính.', 'Đơn vị hành chính và việc áp dụng đơn vị hành chính ở chính quyền địa phương các cấp.', 'B'),
(8, 'Thành phố Hà Nội và thành phố Hồ Chí Minh là loại đơn vị hành chính nào?', 'Cấp tỉnh loại I.', 'Cấp tỉnh.', 'Cấp thành phố trực thuộc trung ương.', 'Cấp tỉnh loại đặc biệt.', 'D'),
(9, 'Mục đích của việc phân loại đơn vị hành chính là?', 'Cơ sở để hoạch định chính sách phát triển kinh tế - xã hội; xây dựng tổ chức bộ máy, chế độ, chính sách đối với cán bộ, công chức của chính quyền địa phương phù hợp với từng loại đơn vị hành chính.', 'Cơ sở để hoạch định chính sách phát triển kinh tế - xã hội phù hợp với từng địa phương, ngành, lĩnh vực.', 'Cơ sở để quyết định chính sách phát triển cơ sở hạ tầng, ngân sách cho từng địa phương phù hợp với từng loại đơn vị hành chính.', 'Bảo đảm chính sách an sinh xã hội, phát triển các ngành, lĩnh vực trên từng địa bàn.', 'A'),
(10, 'Đơn vị hành chính cấp tỉnh được chia thành mấy loại?', '04 loại.', '03 loại.', '05 loại.', '02 loại.', 'A'),
(11, 'Đâu không phải là tiêu chí để phân loại đơn vị hành chính?', 'Trình độ dân trí, mức độ phát triển các ngành, lĩnh vực.', 'Quy mô dân số.', 'Diện tích tự nhiên.', 'Số đơn vị hành chính trực thuộc.', 'D'),
(12, 'Bạn đã bật Vietkey hoặc Unikey để soạn thảo. Bạn lựa chọn gõ theo kiểu telex và font chữ Unicode. Những font chữ nào sau đây của Word có thể được sử dụng để hiển thị rõ tiếng Việt?', '. Vn Times, . Vn Arial, .Vn Courier', '. Vn Times, Times new roman, Arial', ' .VNI times, Arial, .Vn Avant', 'Tahoma, Verdana, Times new Roman', 'D'),
(13, 'Lệnh Tool/Autocorrect dùng để:', 'Thay thế từ trong văn bản', 'Thay thế từ trong văn bản bằng từ cho trước', 'Tự động thay thế từ khóa tắt trong văn bản từ đã được cài đặt trước', ' Tự động thay thế các từ viết tắt bằng từ đầy đủ', 'D'),
(14, 'Bạn đang soạn văn bản, gõ bằng bộ gõ Unicode, nhưng các chữ cái cứ tự động cách nhau một ký tự trắng. Bạn cần nhấn chuột vào menu nào để có thể giải quyết trường hợp trên', 'Menu Format, chọn Font', 'Menu Tools, chọn Options', 'Menu Edit, chọn Office Clipboard', 'Menu View, chọn Markup', 'B'),
(15, 'Khi tệp congvan012005 đang mở, bạn muốn tạo tệp mới tên là cv-02-05 có cùng nội dung với congvan012005 thì bạn phải:', 'Nhắp chọn thực đơn lệnh FILE và chọn SAVE.', ' Nhắp chọn thực đơn lệnh FILE và chọn SAVE AS.', 'Nhắp chọn thực đơn lệnh FILE và chọn EDIT.', 'Nhắp chọn thực đơn lệnh EDIT và chọn RENAME', 'B'),
(16, 'Để dãn khoảng cách giữa các dòng là 1.5 line chọn', 'Format/paragraph/line spacing', 'Nhấn Ctrl + 5 tại dòng đó', 'Cả hai cách A và B đều đúng', 'Cả 2 cách A và B đều sai', 'C'),
(17, 'Bạn đang gõ văn bản và dưới chân những ký tự bạn đang gõ xuất hiện các dấu xanh đỏ', 'Dấu xanh là biểu hiện của vấn đề chính tả, dấu đỏ là vấn đề ngữ pháp', 'Dấu xanh là do bạn đã dùng sai từ tiếng Anh, dấu đỏ là do bạn dùng sai quy tắc ngữ pháp', 'Dấu xanh là do bạn gõ sai quy tắc ngữ pháp, dấu đỏ là do bạn gõ sai từ tiếng Anh', 'Dấu xanh đỏ là do máy tính bị virus', 'C'),
(18, 'Bạn đang gõ dòng chữ "Cộng hòa xã hội chủ nghĩa Việt Nam" bằng font chữ Times New Roman, Unicode', 'Bạn có thể chuyển sang font .Vn times bằng cách bôi đen dòng chữ trên và lựa chọn .Vntimes trong hộp thoại Font, các chữ đó vẫn đọc bình thường', 'Bạn có thể chuyển sang font .Vn times bằng cách bôi đen dòng chữ trên và lựa chọn .Vntimes trên thanh công cụ, các chữ đó vẫn đọc bình thường', 'Để chuyển font mà vẫn đọc bình thường, bạn chỉ cần nhấn Format chọn Theme', 'Bạn cần sử dụng một phần mềm cho phép thực hiện điều này, ví dụ như Vietkey Office hoăc Unikey', 'D'),
(19, 'Khi bạn đã chọn bộ gõ văn bản là theo chuẩn UNICODE, kiểu gõ là Telex thì phông chữ phải sử dụng là', '.Vntime', 'ABC', 'Times New Roman', 'VNI', 'C'),
(20, 'Cho biết phát biểu nào đưới đây là sai:', 'Bấm Ctrl+C tương đương với nhấn nút Copy trên thanh thực đơn lệnh Standard.', 'Bấm Ctrl+V tương đương với nhấn nút Paste.', 'Bấm Ctrl+X tương đương với nhấn nút Cut.', 'Bấm Ctrl+X tương đương với nhấn nút Cut.', 'D'),
(21, 'Mục HEADER AND FOOTER của MS-Word', 'Cho phép chèn dòng chữ, hình ảnh.', 'Cho phép chèn số trang đánh tự động cho văn bản.', 'Cho phép chèn số trang theo dạng: [trang hiện thời]/[tổng số trang]', 'Cho phép thực hiện cả ba điều trên', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `quantriviencaptruong`
--

CREATE TABLE `quantriviencaptruong` (
  `idqtvct` int(10) unsigned NOT NULL auto_increment,
  `diachi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hodem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `idgiaovien` int(11) NOT NULL,
  `tengiaovien` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `magiaovien` int(11) NOT NULL,
  PRIMARY KEY  (`idqtvct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quantriviencaptruong`
--


-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mataikhoan` varchar(11) character set utf8 collate utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `magiaovien` int(11) default NULL,
  `mahocsinh` int(11) default NULL,
  `tentaikhoan` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `maqtvct` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `maqt` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `mataikhoan`, `matkhau`, `magiaovien`, `mahocsinh`, `tentaikhoan`, `maqtvct`, `maqt`) VALUES
(1, '12345', 'e10adc3949ba59abbe56e057f20f883e', 12345, NULL, 'Nguyễn Văn A', NULL, 0),
(2, '19436041', 'e10adc3949ba59abbe56e057f20f883e', NULL, 19436041, 'Lê Thị Hạnh', NULL, 0),
(3, '100301', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'quản trị ', NULL, 100301),
(4, 'IUH', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'IUH', 'IUH', NULL),
(12, 'THCS-AC', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'THCS-AC', 'THCS-AC', NULL),
(20, 'THCS-AD', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'THCS-AD', 'THCS-AD', NULL),
(21, '19433221', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'Nguyễn Phước Lộc', '19433221', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `totruongchuyenmon`
--

CREATE TABLE `totruongchuyenmon` (
  `magiaovien` int(10) unsigned NOT NULL auto_increment,
  `diachi` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hodem` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `idgiaovien` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `tengiaovien` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idcauhoi` int(11) NOT NULL,
  PRIMARY KEY  (`magiaovien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `totruongchuyenmon`
--

