-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 03:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbannoithat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'khang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES
(1, 'Indonesia tài trợ 120 triệu VNĐ cho người dân khi mua ô tô điện', 'Indonesia dự kiến trợ giá cho các sản phẩm xe điện từ năm 2023 để thúc đẩy doanh số bán hàng. Thời gian qua, nhu cầu dùng xe điện tại đất nước này tăng mạnh nhưng doanh số bán ra vẫn thấp do giá thành cao.', 'Theo kế hoạch mà Bộ trưởng Bộ Công nghiệp Indonesia Agus Gumiwang công bố ngày 14/12, Chính phủ Indonesia sẽ cung cấp cho người dân một khoản hỗ trợ trị giá khoảng 80 triệu rupiah (khoảng 120 triệu VNĐ) khi mua ô tô điện, 40 triệu rupiah (tương đương 60 triệu VNĐ) đối với ô tô hybrid và 8 triệu rupiah (khoảng 12 triệu VNĐ) cho xe máy điện.\r\n\r\nNgoài ra, Chính phủ Indonesia cũng hỗ trợ 5 triệu rupiah (khoảng 7,5 triệu VNĐ) cho chi phí chuyển đổi mỗi chiếc xe máy động cơ đốt trong thành xe chạy điện.\r\n\r\nÔng Agus không công bố mốc thời gian triển khai kế hoạch nói trên, cũng như tổng ngân sách mà nhà nước sẽ dành cho chương trình này.\r\n\r\nTrước đó, Bộ trưởng Điều phối các vấn đề Hàng hải và Đầu tư Luhut Pandjaitan cho biết chương trình ưu đãi xe điện có thể bắt đầu thực hiện từ năm 2023.', 1, ''),
(2, 'Lộ diện thiết kế Mazda CX-90 2024, sẵn sàng ra mắt vào tháng 1 năm sau\r\n', 'Mẫu xe thể thao đa dụng cỡ lớn Mazda CX-90 2024 là sự thay thế “xứng đáng” cho CX-9 hiện tại. Mazda CX-90 2024 hứa hẹn sẽ có nhiều tính năng và công nghệ hoàn toàn mới.', 'Theo kế hoạch, Mazda CX-90 2024 sẽ được ra mắt thị trường Mỹ vào tháng 1 năm 2022. Trước thềm ra mắt chính thức, Mazda đã hé lộ một vài hình ảnh của CX-90 2024, cho thấy khái quát thiết kế của mẫu SUV thay thế CX-9 hiện tại.Theo đó, Mazda CX-90 2024 sẽ sở hữu một số chi tiết thiết kế giống với CX-60. Điển hình như cụm đèn pha với dải đèn LED định vị ban ngày kéo dài vào bên trong, ăn sâu vào đến lưới tản nhiệt. Tiếp đến là cụm đèn hậu nằm ngang, tạo hình chữ “L”. Phần đuôi xe của Mazda CX-90 2024 được thiết kế bo tròn, mang đến cảm giác “mềm mại” hơn.', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_danhmuc_tin`
--

INSERT INTO `tbl_danhmuc_tin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(1, 'tin moi'),
(2, 'tin noi bat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1,
  `slider_caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_active`, `slider_caption`) VALUES
(3, 'anhnen3.jpg', 1, ''),
(4, 'anhnen41.jpg', 0, 'Khuyến mại 50%');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_xe`
--

CREATE TABLE `tbl_xe` (
  `Car_id` int(11) NOT NULL,
  `ten_xe` varchar(255) NOT NULL,
  `thuong_hieu` text NOT NULL,
  `gia_xe` text NOT NULL,
  `dong_co` varchar(100) NOT NULL,
  `mau_xe` varchar(100) NOT NULL,
  `nam_sanxuat` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_xe`
--

INSERT INTO `tbl_xe` (`Car_id`, `ten_xe`, `thuong_hieu`, `gia_xe`, `dong_co`, `mau_xe`, `nam_sanxuat`, `sanpham_image`) VALUES
(1, 'roll-royce', 'bmw', '599.888$', '	\r\n12 CYL - 6.7 L', 'trang', 2023, ''),
(3, 'Urus', 'lamborghini', '299,998$', '8 Cyl - 4.0 L', 'do', 2022, ''),
(4, 'x7 m501', 'BMW', '189,998$', '8 Cyl - 4.4 L\r\n', 'trang', 2022, ''),
(22, 'Sf90 stradale', 'ferrari', '1,199,980$', '8 Cyl - 4.0 L', 'den ', 2022, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Indexes for table `tbl_xe`
--
ALTER TABLE `tbl_xe`
  ADD PRIMARY KEY (`Car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
