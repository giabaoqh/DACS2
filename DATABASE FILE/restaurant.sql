-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Sashimi Cá Ngừ Vây Xanh', 'Từng lát sashimi mượt mà, tan chảy như sương mai đầu ngày, mang theo trọn vẹn hương vị tinh khiết của đại dương sâu thẳm.', 63.00, '67480642f087c.jpg'),
(2, 1, 'Gà Đông Tảo Hấp Muối Lá Trúc', 'Hương vị đồng quê truyền thống, kết hợp cùng bí quyết chế biến tinh tế, mang đến sự giao thoa hoàn hảo giữa tự nhiên và nghệ thuật ẩm thực.', 36.00, '6748050156708.jpg'),
(3, 4, 'Tôm Sú Sốt Chanh Dây', 'Mỗi con tôm là một tác phẩm, hòa quyện cùng nước sốt chanh dây chua ngọt dịu dàng, khơi gợi mọi giác quan của thực khách.', 23.00, '6748055254cec.jpg'),
(4, 1, 'Bò Wellington ', 'Lớp vỏ bánh giòn tan bao bọc hương thơm của bò thượng hạng mang đến trải nghiệm vị giác sang trọng và hoàn mỹ.', 104.00, '67480676d6352.jpg'),
(5, 2, 'Cá Hồi Nướng Sốt Cam', 'Thịt cá hồi mềm mại được ướp kỹ lưỡng, phủ sốt cam tươi mát, mang đến sự cân bằng tuyệt đối giữa vị ngọt dịu và chua thanh nhẹ nhàng.', 35.00, '674807252834e.png'),
(6, 2, 'Vịt Quay Sốt Mật Ong', 'Từng miếng vịt quay vàng óng ánh, thấm đẫm hương vị mật ong ngọt ngào và tiêu đỏ cay nồng, là bản giao hưởng tuyệt vời cho mọi bữa tiệc.', 42.00, '67480953104f6.jpg'),
(7, 2, 'Cơm Chiên Trứng', 'Sự hòa quyện giữa hạt cơm thơm dẻo, trứng và hành lá Nhật thanh mát, tạo nên một bản giao hưởng tuyệt vời giữa tinh hoa Á - Âu.', 5.00, '67480d970454a.jpg'),
(8, 2, 'Sườn Cừu Nướng', 'Hương thơm quyến rũ từ rosemary, kết hợp với mật ong rừng nguyên chất, làm nổi bật vị ngọt tự nhiên và sự mềm mại của từng thớ thịt cừu.', 63.00, '67480f99983ac.jpg'),
(9, 3, 'Hàu Sữa Nướng Sốt Phô Mai Truffle', 'Hàu sữa tươi rói từ đại dương, kết hợp cùng sốt phô mai đậm đà và nấm truffle quý hiếm, mang lại trải nghiệm vị giác độc đáo không thể quên.', 5.00, '6748105a6d14f.jpg'),
(10, 3, 'Bánh xèo ', 'Bánh xèo giòn rụm, gói trọn tinh hoa biển cả với vị ngọt từ tôm tít và mực lá tươi, đem đến một trải nghiệm đầy cảm hứng từ miền quê Việt.', 27.00, '674810d1ebdf5.jpg'),
(11, 3, ' Cua Hoàng Đế ', 'Thịt cua hoàng đế chắc nịch, thấm đẫm gia vị muối ớt cay nồng, là món ăn làm bừng tỉnh mọi giác quan.', 120.00, '674815f79a06b.jpg'),
(12, 3, 'Lươn Nướng Lá Lốt', 'Lươn tươi nướng thơm lừng trong lớp lá lốt xanh, kết hợp hoàn hảo giữa vị béo ngậy và mùi hương nồng nàn.', 31.00, '67481952cccba.jpg'),
(13, 4, 'Salad Xoài Xanh Tôm Mật Ong', 'Xoài xanh giòn giòn hòa cùng vị ngọt từ mật ong và tôm tươi, tạo nên sự cân bằng hoàn hảo giữa các tầng vị chua ngọt.', 21.00, '674819fe44feb.jpg'),
(14, 4, 'Tôm Càng Xanh Sốt Me', 'Nước lẩu chua cay đậm đà, kết hợp cùng tôm càng xanh tươi rói, là sự lựa chọn hoàn hảo cho những bữa tiệc ấm cúng.', 90.00, '67481a36ec8a0.jpg'),
(15, 4, 'Súp Cua Tổ Yến', 'Tổ yến cao cấp hòa quyện cùng vị ngọt tự nhiên của cua tươi, là món súp bổ dưỡng, thanh tao cho sức khỏe.', 60.00, '67481a9e7d50e.jpg'),
(16, 4, 'Kem Dừa Lá Nếp', 'Kem dừa mát lạnh kết hợp vị ngọt béo của caramel muối biển và hương thơm thoang thoảng của lá nếp, mang lại trải nghiệm tráng miệng hoàn hảo.', 10.00, '67481b0a2cea1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(18, 17, 'in process', 'Cảm ơn quý khách', '2024-11-29 13:03:36'),
(19, 18, 'closed', 'Cảm ơn quý khách', '2024-11-29 13:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_hr` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Quê Hương Quán', 'quehuongquan@mail.com', '03547854700', 'www.northstreettavern.com', '6am', '8pm', '24hr-x7', '12 Nguyễn Văn Linh, Quận Hải Châu, Đà Nẵng', '674837cc4ab82.jpg', '2024-11-28 09:28:44'),
(2, 3, 'Hương Vị Ba Miền', 'Bamienquan@gmail.com', '00557426406', 'www.eataly.com', '6am', '5pm', 'mon-fri', '45 Trần Hưng Đạo, Phú Cát, Huế', '674838ade4cc8.jpg', '2024-11-28 09:32:29'),
(3, 2, 'Bếp Xưa', 'nanxiangbao45@mail.com', '01458745855', 'www.nanxiangbao45.com', '7am', '7pm', 'mon-sat', '22 Lý Thường Kiệt, Hoàn Kiếm, Hà Nội', '67483e5b57b71.jpg', '2024-11-28 09:56:43'),
(4, 4, 'Chợ quê', 'choque@mail.com', '06545687458', 'www.hbg.com', '8am', '8pm', 'mon-sat', '123 Lê Duẩn, Quận 1, Thành phố Hồ Chí Minh', '6748a894c37c9.jpg', '2024-11-28 17:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Đà Nẵng', '2024-11-26 08:14:17'),
(2, 'Hà Nội', '2024-11-26 08:14:08'),
(3, 'Huế', '2024-11-26 05:58:05'),
(4, 'Hồ Chí Minh', '2024-11-26 08:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(12, 'giabaoqh', 'Bảo', 'Nguyễn', 'baong.23ite@vku.udn.vn', '0817254941', '$2y$10$aGFkSY4XPbsjcxiJhDVomOMTnLC04YFgFCncbJbt5uMRfRGSActBC', 'jdjbbds', 1, '2024-11-29 06:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(17, 12, 'Bánh xèo ', 6, 27.00, 'in process', '2024-11-29 13:03:36'),
(18, 12, 'Salad Xoài Xanh Tôm Mật Ong', 1, 21.00, 'closed', '2024-11-29 13:04:16'),
(19, 12, 'Tôm Sú Sốt Chanh Dây', 1, 23.00, NULL, '2024-11-29 13:03:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
