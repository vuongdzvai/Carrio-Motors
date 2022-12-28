-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2022 lúc 09:20 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webcar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `form_tuvan`
--

CREATE TABLE `form_tuvan` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ho` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngay_gui` date NOT NULL,
  `noidung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `form_tuvan`
--

INSERT INTO `form_tuvan` (`id`, `ten`, `ho`, `sdt`, `email`, `ngay_gui`, `noidung`) VALUES
(24, 'ADSADsad', '123', 'assssssss', '12314@gmail.com', '2022-12-27', 'assssss'),
(25, 'ADSADsad', '123', 'assssssss', '12314@gmail.com', '2022-12-27', 'assssss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `chuc_vu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`, `tuoi`, `sdt`, `chuc_vu`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'khang', 0, '', ''),
(2, 'admin1@gmail.com', 'e333725246f79bad2b8034df9d071276', 'hhji', 6, '0987999', 'ceo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL DEFAULT current_timestamp(),
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` varchar(250) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL DEFAULT current_timestamp(),
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(500) NOT NULL,
  `slider_caption` varchar(255) NOT NULL,
  `slider_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'anen12.jpg', '123330', 2),
(2, 'anen1.jpg', '12312', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_xe`
--

CREATE TABLE `tbl_xe` (
  `Car_id` int(11) NOT NULL,
  `ten_xe` varchar(255) NOT NULL,
  `thuong_hieu` int(11) NOT NULL,
  `gia_xe` float NOT NULL,
  `dong_co` varchar(100) NOT NULL,
  `mau_xe` varchar(100) NOT NULL,
  `nam_sanxuat` int(11) NOT NULL,
  `sanpham_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_xe`
--

INSERT INTO `tbl_xe` (`Car_id`, `ten_xe`, `thuong_hieu`, `gia_xe`, `dong_co`, `mau_xe`, `nam_sanxuat`, `sanpham_image`) VALUES
(1, '2023 ROLLS-ROYCE CULLINAN BLACK BADGE', 1, 500000, '-CULL', 'Sport Utility', 2023, 'rr1.jpg'),
(2, '2021 ROLLS-ROYCE CULLINAN BLACK BADGE', 1, 400000, '-CULL', 'Sport Utility', 2021, 'rr2.jpg'),
(3, '2010 ROLLS-ROYCE CULLINAN BLACK BADGE', 1, 300000, '-CULL', 'Sport Utility', 2010, 'rr3.jpg'),
(4, '2023 BMW M8 COMPETITION', 2, 500000, '238K', 'Convertible', 2023, 'bmw1.jpg'),
(5, '2021 BMW M8 COMPETITION', 2, 400000, '238K', 'Convertible', 2021, 'bmw2.jpg'),
(6, '2010 BMW M8 COMPETITION', 2, 300000, '238K', 'Convertible', 2010, 'bmw3.jpg'),
(7, '2022 FERRARI SF90 STRADALE FIORANO PACKAGE', 3, 500000, 'SF90STRADALE', 'Coupe', 2022, 'ff1.jpg'),
(8, '2021 FERRARI SF90 STRADALE FIORANO PACKAGE', 3, 400000, 'SF90STRADALE', 'Coupe', 2021, 'ff2.jpg'),
(9, '2010 FERRARI SF90 STRADALE FIORANO PACKAGE', 3, 300000, 'SF90STRADALE', 'Coupe', 2010, 'ff3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testdrive`
--

CREATE TABLE `testdrive` (
  `id` int(11) NOT NULL,
  `year_car` int(11) NOT NULL,
  `make_carID` int(11) NOT NULL,
  `model_car` varchar(100) NOT NULL,
  `ho_td` varchar(100) NOT NULL,
  `ten_td` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nd` varchar(500) NOT NULL,
  `ngay_thangtd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `testdrive`
--

INSERT INTO `testdrive` (`id`, `year_car`, `make_carID`, `model_car`, `ho_td`, `ten_td`, `email`, `phone`, `nd`, `ngay_thangtd`) VALUES
(3, 2021, 3, '21333', '12321', '123213d', '12314@gmail.com', '123121', '12333333333', '2022-12-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu_xe`
--

CREATE TABLE `thuong_hieu_xe` (
  `id` int(11) NOT NULL,
  `thuong_hieu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu_xe`
--

INSERT INTO `thuong_hieu_xe` (`id`, `thuong_hieu`) VALUES
(1, 'ROLLSROYCE'),
(2, 'BMW'),
(3, 'FERRARI');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `form_tuvan`
--
ALTER TABLE `form_tuvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`),
  ADD KEY `danhmuctin_id` (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_xe`
--
ALTER TABLE `tbl_xe`
  ADD PRIMARY KEY (`Car_id`),
  ADD KEY `thuong_hieu` (`thuong_hieu`);

--
-- Chỉ mục cho bảng `testdrive`
--
ALTER TABLE `testdrive`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuong_hieu_xe`
--
ALTER TABLE `thuong_hieu_xe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `form_tuvan`
--
ALTER TABLE `form_tuvan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_xe`
--
ALTER TABLE `tbl_xe`
  MODIFY `Car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `testdrive`
--
ALTER TABLE `testdrive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu_xe`
--
ALTER TABLE `thuong_hieu_xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD CONSTRAINT `tbl_baiviet_ibfk_1` FOREIGN KEY (`danhmuctin_id`) REFERENCES `tbl_danhmuc_tin` (`danhmuctin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
