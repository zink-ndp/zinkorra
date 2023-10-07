-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 02:24 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `interior`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `B_ID` int(11) NOT NULL,
  `ST_ID` int(11) NOT NULL,
  `PM_ID` int(11) NOT NULL,
  `STF_ID` int(11) DEFAULT NULL,
  `CTM_ID` int(11) DEFAULT NULL,
  `SL_CODE` char(20) DEFAULT NULL,
  `B_DATE` date NOT NULL,
  `B_ADDRESS` char(200) NOT NULL,
  `B_TOTAL` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`B_ID`, `ST_ID`, `PM_ID`, `STF_ID`, `CTM_ID`, `SL_CODE`, `B_DATE`, `B_ADDRESS`, `B_TOTAL`) VALUES
(1, 1, 1, NULL, 9, 'COUPONTEST', '2023-09-13', 'G53, Huyện Năm Căn, Cà Mau', 63081000),
(2, 3, 2, 1, 9, NULL, '2023-09-13', 'G63, Huyện Năm Căn, Cà Mau', 87790000),
(3, 1, 4, NULL, 7, NULL, '2023-09-13', 'H35, Quận Liên Chiểu, Cà Mau', 181250000),
(4, 1, 4, NULL, 1, 'COUPONTEST', '2023-09-13', 'FS24, Huyện Bảo Lâm, Cao Bằng', 58392000),
(5, 1, 2, NULL, 9, NULL, '2023-09-14', 'G53, Huyện Bảo Lâm, Cao Bằng', 57180000),
(6, 1, 3, NULL, 1, 'COUPONTEST', '2023-09-28', 'G53, Huyện Bảo Lâm, Cao Bằng', 48690000),
(7, 1, 1, NULL, 7, 'COUPONTEST', '2023-09-30', 'FA122, Huyện Bù Đăng, Bình Phước', 14391000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `B_ID` int(11) NOT NULL,
  `PD_ID` int(11) NOT NULL,
  `PD_QUANT` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`B_ID`, `PD_ID`, `PD_QUANT`) VALUES
(1, 1, 1),
(1, 3, 1),
(2, 11, 1),
(2, 30, 1),
(2, 36, 1),
(3, 3, 2),
(3, 11, 1),
(4, 1, 2),
(4, 2, 1),
(5, 13, 4),
(5, 15, 1),
(6, 3, 1),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `CTM_ID` int(11) NOT NULL,
  `PD_ID` int(11) NOT NULL,
  `PD_QUANT` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`CTM_ID`, `PD_ID`, `PD_QUANT`) VALUES
(9, 11, 1),
(9, 30, 1),
(9, 36, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommer`
--

CREATE TABLE `custommer` (
  `CTM_ID` int(11) NOT NULL,
  `CTM_NAME` char(50) NOT NULL,
  `CTM_PHONE` char(10) NOT NULL,
  `CTM_EMAIL` char(50) NOT NULL,
  `CTM_PASS` char(50) NOT NULL,
  `CTM_AVT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `custommer`
--

INSERT INTO `custommer` (`CTM_ID`, `CTM_NAME`, `CTM_PHONE`, `CTM_EMAIL`, `CTM_PASS`, `CTM_AVT`) VALUES
(1, 'Trần Ngọc Duy', '0472817772', 'tnduy@gmail.com', 'tnduy', NULL),
(2, 'Lương Lưu Minh Tân', '0472264472', 'llmtan@gmail.com', 'llmtan', NULL),
(3, 'Trần Ngọc Tín', '0472817955', 'tntin@gmail.com', 'tntin', NULL),
(4, 'Huỳnh Thị Mỹ Ái', '0472817726', 'htmai@gmail.com', 'htmai', NULL),
(5, 'Nguyễn Trần Minh Quân', '0464331772', 'ntmquan@gmail.com', 'ntmqquan', NULL),
(7, 'Hà Tấn Thạnh', '0378847637', 'htthanh@gmail.com', 'htthanh', NULL),
(8, 'Hà Tấn Thạnh', '0378847637', 'htthanh@gmail.com', 'htthanh', NULL),
(9, 'Chung Hoàng Phúc', '0298874885', 'chphuc@gmail.com', 'chphuc', NULL),
(10, 'Enthuw', '0928837746', 'enthuw@gmail.com', 'enthuw', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ib_detail`
--

CREATE TABLE `ib_detail` (
  `PD_ID` int(11) NOT NULL,
  `IB_ID` int(11) NOT NULL,
  `PD_QUANT` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ib_detail`
--

INSERT INTO `ib_detail` (`PD_ID`, `IB_ID`, `PD_QUANT`) VALUES
(1, 1, 10),
(2, 1, 10),
(3, 1, 10),
(4, 1, 10),
(5, 1, 10),
(6, 1, 10),
(7, 1, 10),
(8, 1, 10),
(9, 1, 10),
(10, 1, 10),
(11, 1, 10),
(12, 1, 10),
(13, 1, 10),
(14, 1, 10),
(15, 1, 10),
(16, 1, 10),
(17, 1, 10),
(18, 1, 10),
(19, 1, 10),
(20, 1, 10),
(21, 1, 10),
(22, 1, 10),
(23, 1, 10),
(24, 1, 10),
(25, 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_bill`
--

CREATE TABLE `import_bill` (
  `IB_ID` int(11) NOT NULL,
  `STF_ID` int(11) NOT NULL,
  `IB_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `import_bill`
--

INSERT INTO `import_bill` (`IB_ID`, `STF_ID`, `IB_DATE`) VALUES
(1, 1, '2023-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `interior`
--

CREATE TABLE `interior` (
  `ITR_ID` int(11) NOT NULL,
  `ITR_NAME` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `interior`
--

INSERT INTO `interior` (`ITR_ID`, `ITR_NAME`) VALUES
(1, 'Phòng khách'),
(2, 'Phòng ngủ'),
(3, 'Nhà bếp'),
(4, 'Nhà WC'),
(5, 'Sân vườn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `PM_ID` int(11) NOT NULL,
  `PM_NAME` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`PM_ID`, `PM_NAME`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Chuyển khoản ngân hàng'),
(3, 'Paypal'),
(4, 'Visa/Mastercard');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `PD_ID` int(11) NOT NULL,
  `ITR_ID` int(11) NOT NULL,
  `TY_ID` int(11) NOT NULL,
  `PD_NAME` char(50) NOT NULL,
  `PD_PRICE` int(11) NOT NULL,
  `PD_DESCRI` text NOT NULL,
  `PD_PIC` text DEFAULT NULL,
  `PD_QUANT` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`PD_ID`, `ITR_ID`, `TY_ID`, `PD_NAME`, `PD_PRICE`, `PD_DESCRI`, `PD_PIC`, `PD_QUANT`) VALUES
(1, 1, 2, 'Sofa Coastal 1 chỗ KD1085-18 xanh M2', 15990000, 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, cân mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.', '1.png', 10),
(2, 1, 2, 'Sofa Coastal 2 chỗ KD1085-18 xanh M2', 32900000, 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, cân mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.', '2.png', 10),
(3, 1, 2, 'Sofa Chicago 3 chỗ', 54100000, 'Sofa Chicago 3 chô gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, cân mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.', '3.png', 10),
(4, 1, 2, 'Sofa 3 chỗ Osaka mẫu 1 vải 29', 28380000, 'Sofa 3 chỗ từ bộ sưu tập Osaka mang nét hiện đại và thơ mộng của Nhật Bản, tạo nên một không gian sống độc đáo đầy sang trọng. Sản phẩm có phần chân bằng inox màu gold chắc chắn, phần nệm được bọc vải và có thể tháo rời được. Sofa 3 chỗ Osaka mẫu 1 vải 29 không chỉ mang đến thiết kế tinh tế, sang trọng mà còn tạo cho người ngồi cảm giác thoải mái, dễ chịu.', '4.png', 10),
(5, 1, 2, 'Sofa 3 chỗ Elegance màu tự nhiên, da xanh', 122750000, 'Sofa 3 chỗ trong bộ sưu tập mới Elegance, bộ sưu tập được lấy cảm hứng từ nội thất tinh xảo, nhẹ nhàng, nền nã nhưng đơn giản Elegance là sự kết hợp tuyệt hảo giữa sự bền chắc và trọng lượng tối giản. Sofa 3 chỗ da xanh có phần khung bằng gỗ tần bì đặc, tự nhiên được nhập khẩu từ Mỹ, phần nệm được bọc da bò S4 nhập khẩu Italy.', '5.png', 10),
(6, 2, 4, 'Giường Coastal KD1058-18 1m8', 31900000, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.', '6.png', 10),
(7, 2, 5, 'Nệm lò xo túi 1m8 Isabelle IT180-4S', 16850000, 'Với cấu trúc lưới của sợi cây tre làm cho vải thông thoáng, hút ẩm tốt. 2.Lớp đệm làm từ tơ tằm thiên nhiên, mềm mại, êm ái, với tính năng hút ẩm cao giúp mát mẻ vào mùa hè và ấm áp vào mùa đông. Là sản phẩm ít gây kính ứng da nên rất tốt cho sức khoẻ, đặt biệt là những ai mắc bệnh dị ứng, hen suyễn. 3.Kết cấu con lò xo túi giúp nâng đỡ cơ thể hoàn hảo, khớp với mọi góc cạnh của cơ thể, giúp cho phần đầu, vai, lưng, hông, đùi, chân và bàn chân được thư giãn hoàn toàn. Giúp cho xương sống luôn thẳng trong lúc ngủ mang đến sự sảng khoái cao nhất. 4.Khả năng giảm sự truyền động trên bề mặt nệm, tránh được những lay động khi người nằm bên cạnh trở mình, mang lại giấc ngủ ngon suốt đêm. 5.Lớp mousse lót tỷ trọng cao giúp nâng đỡ cơ thể hoàn hảo, tạo cảm giác êm ái khi tiếp xúc. 6.Lớp vải nỉ có tác dụng hút ẩm, chống xẹp lún cho tấm nệm.', '7.png', 10),
(8, 2, 1, 'Bàn đầu giường City CS576A P201', 14370000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '8.png', 10),
(9, 2, 1, 'Bàn trang điểm Skagen', 12700000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '9.png', 10),
(10, 2, 3, 'Tủ Hộc Kéo Universal Ceramic P9C', 82540000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '10.png', 10),
(11, 3, 3, 'Tủ bếp Jolie', 73050000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '11.png', 10),
(12, 3, 3, 'Tủ bếp Classy', 68580000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '12.png', 10),
(13, 3, 2, 'Ghế bar Jenny – 96364J', 9720000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '13.png', 10),
(14, 3, 2, 'Ghế bar Palm', 20190000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '14.png', 10),
(15, 3, 1, 'Bàn ăn Jazz 2m', 18300000, 'Bàn ăn Jazz được ghép từ những thanh gỗ sồi già tự nhiên. Bề mặt đặc trưng với những đường nứt tét gỗ tự nhiên được xử lý khéo léo, kết hợp với chân sắt sơn tĩnh điện đầy mạnh mẽ sẽ mang lại nét cá tính độc đáo cho gia chủ.', '15.png', 10),
(16, 4, 6, 'Bồn cầu thông minh Enic Smart G5', 19500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '16.png', 10),
(17, 4, 6, 'Bộ vòi sen cao cấp Enic MD06', 8600000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '17.png', 10),
(18, 4, 6, 'Lavabo để bàn Enic S', 13000000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '18.png', 10),
(19, 4, 6, 'Lavabo để bàn Enic D', 8000000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '19.png', 10),
(20, 4, 6, 'Bồn tắm masage Enic G02', 19500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '20.png', 10),
(21, 5, 1, 'Bàn ngoài trời YO!', 1300000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '21.png', 10),
(22, 5, 2, 'Ghế ngoài trời Puyi Alu H78x56x59 ADS004', 7610000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '22.png', 10),
(23, 5, 2, 'Bộ ghế ngoài trời Bench Sixties cactus 170582', 21420000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '23.png', 10),
(24, 5, 2, 'Ghế ngoài trời Fermob Plein air nutmeg', 1400000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '24.png', 10),
(25, 5, 2, 'Ghế dài 3 chỗ', 5750000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '25.png', 10),
(26, 1, 1, 'Bộ Bàn Coffee Cẩm Thạch LC-080-1 + LC-080-2', 12990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '26.png', 10),
(27, 1, 1, 'Bộ Bàn Coffee 291', 2890000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '27.png', 10),
(28, 1, 2, 'Bộ Sofa 1 Chỗ Dominika H20S02 + Sofa 3 Chỗ Dominik', 19990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '28.png', 10),
(29, 1, 2, 'Bộ Ghế Sofa 1 Chỗ YC-12B + 3 Chỗ YC-12BD Yoko', 3990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '29.png', 10),
(30, 2, 3, 'Tủ Áo 4 cửa Lisa A3003', 13990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '30.png', 10),
(31, 2, 4, 'Giường Sunday 5317 1M6 Đen', 8890000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '31.png', 10),
(32, 2, 4, 'Giường 1.8M NOVARA L14Z-NZ', 32590000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '32.png', 10),
(33, 2, 5, 'Nệm Gausmann Aurich K', 39990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '33.png', 10),
(34, 3, 2, 'Ghế Ăn Cino CPMK020 Sồi Đậm', 3390000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '34.png', 10),
(35, 3, 1, 'Bàn Ăn (Mở Rộng) Cẩm Thạch Grand T171039B-A 1.3M(1', 14990000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '35.png', 10),
(36, 3, 3, 'Kệ Xoay Tròn Kim Loại ECORS01A 3 Tầng', 750000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '36.png', 10),
(37, 3, 2, 'Ghế Bar Balance BC154C Nâu', 3290000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '37.png', 10),
(38, 4, 6, 'Máy Nước Nóng Trực Tiếp Ariston AURES PREMIUM 4.5P', 3790000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '38.png', 10),
(39, 5, 7, 'Đèn Thả Tròn ECODL8 Đen', 669000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '39.png', 10),
(40, 5, 7, 'Đèn Thả ECODL3 Trắng', 499000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '40.png', 10),
(41, 1, 1, 'Bàn tròn KDHV645 (trắng)', 3500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '41.png', 10),
(42, 1, 1, 'BÀN SOFA gỗ 2 tầng để phòng khách', 3850000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '42.png', 10),
(43, 1, 1, 'Bàn trà, bàn sofa mặt đá mẫu hoa mai trang trí', 4700000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '43.png', 10),
(44, 1, 2, 'Ghế văn phòng hội trường hội nghị gấp gọn YiCun', 665000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '44.png', 10),
(45, 1, 2, 'Ghế văn phòng hội trường hội nghị gấp gọn', 345000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '45.png', 10),
(46, 1, 2, 'Ghế Sofa Giường Gấp Gọn Có Khóa Kéo Vệ Sinh, Sofa', 3100000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '46.png', 10),
(47, 1, 2, 'Ghế Sofa Giường Đa Năng GỖ XANH - Sofa Bed Chính H', 2300000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '47.png', 10),
(48, 1, 2, 'Bộ ghế KHB211', 12580000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '48.png', 10),
(49, 2, 3, 'Tủ áo cánh lùa, tủ gỗ đa năng TG243', 14560000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '49.png', 5),
(50, 2, 3, 'Tủ treo quần áo decor, tủ gỗ lắp ráp 2 cánh', 995000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '50.png', 10),
(51, 2, 3, 'Tủ Gỗ Đa Năng Tủ Đựng Quần Áo Chất Liệu MDF Phong', 450000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '51.png', 10),
(52, 2, 3, 'Tủ nhựa 2 cánh 4 ngăn Happy Family SUNHOUSE KS-', 1550000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '52.png', 10),
(53, 2, 4, 'Giường ngủ ZAKO cao cấp kiểu Nhật OHAHA001- Gỗ côn', 6750000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '53.png', 5),
(54, 2, 4, 'Giường ngủ gỗ Công Nghiệp Cao Cấp OHAHA 002 - Màu', 6550000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '54.png', 7),
(55, 2, 4, 'Giường Ngủ Cao Cấp 2 Tủ Ngăn Kéo Yapi -506', 7520000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '55.png', 10),
(56, 2, 4, 'Giường ngủ thông minh ngăn kéo chứa đồ tiết kiệm d', 3500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '56.png', 5),
(57, 2, 5, 'Nệm Topper Đệm Bông Trải Sàn FUKOJI ', 750000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '57.png', 15),
(58, 2, 5, 'Nệm Foam Nooz Home Goods Mattress Tiêu Chuẩn Certi', 6350000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '58.png', 10),
(59, 3, 1, 'Bộ bàn ăn FUNHOUSE 4 ghế thông minh kết hợp với bế', 11500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '59.png', 5),
(60, 3, 3, 'Tủ bếp công nghiệp hiện đại KIT_014', 24500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '60.png', 4),
(61, 3, 3, 'Tủ Bếp Nhựa Đài Loan Và Vincoplast', 2150000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '61.png', 4),
(62, 3, 3, 'Tủ Bếp Hiện Đại Nhựa Đài Loan ENC', 1950000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '62.png', 5),
(63, 3, 2, 'Ghế quầy bar đẹp nhập khẩu hiện đại TM292', 1100000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '63.png', 5),
(64, 3, 2, 'Ghế đôn chân sắt mặt đệm màu xám - GM78', 730000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '64.png', 7),
(65, 3, 3, 'Tủ bếp Đặt Sàn Cánh Kính ,Tủ đựng đồ Đa Năng - Gỗ', 4550000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '65.png', 5),
(66, 3, 3, 'Tủ bếp để sàn ,Tủ đựng đồ Đa Năng - Gỗ MDF KIKO TB', 3550000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '66.png', 7),
(67, 4, 6, 'Bộ Nhả Kem Tự Động, Kệ Để Cốc Bàn Chải Đánh Răng N', 269000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '67.png', 10),
(68, 4, 6, 'Tủ Đựng Mỹ Phẩm Đa Năng Dán Tường Phòng Tắm 3635', 175000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '68.png', 10),
(69, 5, 2, 'Ghế dã ngoại gấp gọn, ghế xếp camping, cắm trại', 195000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '69.png', 15),
(70, 5, 7, 'Thảm Đi Picnic Họa Tiết Hoa Chống Thấm Nước Tiện L', 125000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s', '70.png', 15),
(71, 3, 3, 'Tủ bếp gỗ phong cách châu Âu', 25500000, 'Tủ bếp gỗ phong cách châu Âu Tủ bếp gỗ phong cách châu Âu', '71.png', 5),
(72, 2, 1, 'Bàn học xếp PV01', 550000, 'Bàn học xếp PV01 Bàn học xếp PV01 Bàn học xếp PV01 Bàn học xếp PV01', '72.png', 10),
(73, 2, 2, 'Ghế nệm bàn làm việc KGA899', 8500000, 'Ghế nệm bàn làm việc KGA899 Ghế nệm bàn làm việc KGA899 Ghế nệm bàn làm việc KGA899 Ghế nệm bàn làm việc KGA899', '73.png', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `R_ID` int(11) NOT NULL,
  `CTM_ID` int(11) NOT NULL,
  `PD_ID` int(11) NOT NULL,
  `R_TITLE` char(50) NOT NULL,
  `R_STAR` decimal(8,0) NOT NULL,
  `R_COMMENT` text NOT NULL,
  `R_DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`R_ID`, `CTM_ID`, `PD_ID`, `R_TITLE`, `R_STAR`, `R_COMMENT`, `R_DATE`) VALUES
(1, 9, 29, 'Dùng tốt', 5, 'Ok ok ok ok ok Ok ok ok ok ok Ok ok ok ok ok', '2023-09-28'),
(2, 9, 11, 'Chất lượng tạm ổn', 4, 'Có chút sứt mẻ ', '2023-09-30'),
(5, 9, 11, 'Không ổn', 3, 'Lần này sứt mẻ khá nhiều', '2023-09-30'),
(6, 9, 30, 'test again', 2, '112344qsdasd', '2023-09-30'),
(7, 9, 36, '5s', 5, '5s5s5s5s', '2023-09-30'),
(8, 9, 36, 'bad', 2, 'badddddd', '2023-09-30'),
(9, 9, 11, '???', 4, 'danh gia', '2023-10-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `RO_ID` int(11) NOT NULL,
  `RO_NAME` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`RO_ID`, `RO_NAME`) VALUES
(1, 'Quản lý'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `SL_CODE` char(20) NOT NULL,
  `SL_PERCENT` decimal(8,0) NOT NULL,
  `SL_START_DATE` date NOT NULL,
  `SL_END_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`SL_CODE`, `SL_PERCENT`, `SL_START_DATE`, `SL_END_DATE`) VALUES
('COUPONTEST', 10, '2023-07-01', '2024-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `STF_ID` int(11) NOT NULL,
  `RO_ID` int(11) NOT NULL,
  `STF_NAME` char(50) NOT NULL,
  `STF_GENDER` char(1) NOT NULL,
  `STF_PHONE` char(10) NOT NULL,
  `STF_EMAIL` char(50) DEFAULT NULL,
  `STF_PASS` char(50) DEFAULT NULL,
  `STF_AVT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`STF_ID`, `RO_ID`, `STF_NAME`, `STF_GENDER`, `STF_PHONE`, `STF_EMAIL`, `STF_PASS`, `STF_AVT`) VALUES
(1, 1, 'Nguyễn Đỗ Phúc Vinh', 'm', '0377899959', 'ndpvinh@gmail.com', 'ndpvinh', NULL),
(2, 2, 'Nguyễn Thị Xinh', 'm', '0377235359', 'ntxinh@gmail.com', 'ntxinh', NULL),
(3, 2, 'Đỗ Vĩnh Phúc', 'm', '0377346259', 'dvphuc@gmail.com', 'dvphuc', NULL),
(4, 2, 'Nguyễn Thị Linh', 'f', '0377899913', 'ntlinh@gmail.com', 'ntlinh', NULL),
(5, 2, 'Nguyễn Hoàng Quốc Vinh', 'm', '0334259959', 'nhqvinh@gmail.com', 'nhqvinh', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `ST_ID` int(11) NOT NULL,
  `ST_NAME` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`ST_ID`, `ST_NAME`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Hoàn thành'),
(4, 'Đã huỷ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `TY_ID` int(11) NOT NULL,
  `TY_NAME` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`TY_ID`, `TY_NAME`) VALUES
(1, 'Bàn'),
(2, 'Ghế'),
(3, 'Tủ'),
(4, 'Giường'),
(5, 'Nệm'),
(6, 'Thiết bị nhà WC'),
(7, 'Khác');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `FK_APDUNG` (`SL_CODE`),
  ADD KEY `FK_COMFIRM` (`STF_ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`CTM_ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`ST_ID`),
  ADD KEY `FK_RELATIONSHIP_7` (`PM_ID`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`B_ID`,`PD_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`PD_ID`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`CTM_ID`,`PD_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`PD_ID`);

--
-- Chỉ mục cho bảng `custommer`
--
ALTER TABLE `custommer`
  ADD PRIMARY KEY (`CTM_ID`);

--
-- Chỉ mục cho bảng `ib_detail`
--
ALTER TABLE `ib_detail`
  ADD PRIMARY KEY (`PD_ID`,`IB_ID`),
  ADD KEY `FK_RELATIONSHIP_17` (`IB_ID`);

--
-- Chỉ mục cho bảng `import_bill`
--
ALTER TABLE `import_bill`
  ADD PRIMARY KEY (`IB_ID`),
  ADD KEY `FK_RELATIONSHIP_16` (`STF_ID`);

--
-- Chỉ mục cho bảng `interior`
--
ALTER TABLE `interior`
  ADD PRIMARY KEY (`ITR_ID`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PM_ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PD_ID`),
  ADD KEY `FK_RELATIONSHIP_14` (`ITR_ID`),
  ADD KEY `FK_RELATIONSHIP_15` (`TY_ID`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `FK_RATE` (`CTM_ID`),
  ADD KEY `FK_RATED` (`PD_ID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RO_ID`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SL_CODE`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STF_ID`),
  ADD KEY `FK_RELATIONSHIP_9` (`RO_ID`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ST_ID`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TY_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_APDUNG` FOREIGN KEY (`SL_CODE`) REFERENCES `sale` (`SL_CODE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_COMFIRM` FOREIGN KEY (`STF_ID`) REFERENCES `staff` (`STF_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`CTM_ID`) REFERENCES `custommer` (`CTM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ST_ID`) REFERENCES `status` (`ST_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`PM_ID`) REFERENCES `payment` (`PM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`PD_ID`) REFERENCES `products` (`PD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`B_ID`) REFERENCES `bill` (`B_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`PD_ID`) REFERENCES `products` (`PD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`CTM_ID`) REFERENCES `custommer` (`CTM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `ib_detail`
--
ALTER TABLE `ib_detail`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`IB_ID`) REFERENCES `import_bill` (`IB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`PD_ID`) REFERENCES `products` (`PD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `import_bill`
--
ALTER TABLE `import_bill`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`STF_ID`) REFERENCES `staff` (`STF_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ITR_ID`) REFERENCES `interior` (`ITR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`TY_ID`) REFERENCES `type` (`TY_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_RATE` FOREIGN KEY (`CTM_ID`) REFERENCES `custommer` (`CTM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RATED` FOREIGN KEY (`PD_ID`) REFERENCES `products` (`PD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`RO_ID`) REFERENCES `role` (`RO_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
