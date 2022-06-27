-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2022 lúc 07:03 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `level` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent_id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Nước hoa', 'nuoc-hoa', 0, 1, '2021-06-26 15:11:59', '2022-06-26 15:35:56'),
(2, 'Son môi', 'son-moi', 0, 1, '2021-06-26 15:12:07', '2022-06-26 15:35:56'),
(3, 'Make up', 'make-up', 0, 1, '2021-06-26 15:12:14', '2022-06-26 15:35:56'),
(4, 'Skincare', NULL, 0, 1, '2021-06-26 15:15:50', '2022-06-26 15:35:56'),
(5, 'Chăm sóc tóc', NULL, 0, 1, '2021-06-26 15:16:10', '2022-06-26 15:35:56'),
(6, 'Kem, phấn', NULL, 0, 1, '2021-06-26 15:16:29', '2022-06-26 15:35:56'),
(7, 'Cọ trang điểm', NULL, 0, 1, '2021-06-26 15:16:53', '2022-06-26 15:35:56'),
(8, 'Sữa tắm', NULL, 0, 1, '2021-06-26 15:17:01', '2022-06-26 15:35:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_origin` decimal(16,2) NOT NULL,
  `price_sell` decimal(16,2) NOT NULL,
  `sale` int(11) DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` int(11) DEFAULT 2,
  `sort_describe` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price_origin`, `price_sell`, `sale`, `avatar`, `hot`, `sort_describe`, `created_at`, `updated_at`) VALUES
(1, 1, 'Davidoff Cool Water Woman', '1200000.00', '1104000.00', 8, 'backend/uploads/product/1624721080_davidoff-cool-water-woman.jpg', NULL, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa:  Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:21:32', '2022-06-26 15:35:56'),
(2, 1, 'Gucci Bamboo For Women EDP', '480000.00', '374400.00', 22, 'backend/uploads/product/1624721172_gucci-bamboo-eau-de-parfum-23186-4w0l-rz.jpg', NULL, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:25:58', '2022-06-26 15:35:56'),
(3, 1, 'Chanel Bleu De Chanel EDP', '765000.00', '765000.00', NULL, 'backend/uploads/product/1624721253_chanel-bleu-de-chanel-edp-100ml-huou-il.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nam và Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:27:33', '2022-06-26 15:35:56'),
(4, 1, 'Bvlgari Man In Black Essence Limited Edition', '2080000.00', '2080000.00', NULL, 'backend/uploads/product/1624721280_bvlgari-man-in-black-essence-limited-edition-6.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nam và Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:28:00', '2022-06-26 15:35:56'),
(5, 1, 'Lolita Lempicka For Women', '360000.00', '284400.00', 21, 'backend/uploads/product/1624721313_lolita-lempicka-for-women-edp-1.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa:  Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:28:33', '2022-06-26 15:35:56'),
(6, 1, 'Calvin Klein CK All For Women & Men', '660000.00', '343200.00', 48, 'backend/uploads/product/1624721345_calvin-klein-ck-all-for-women-men.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nam và Nữ \r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:29:05', '2022-06-26 15:35:56'),
(7, 1, 'Giftset Giorgio Armani 2pcs', '1200000.00', '1008000.00', 16, 'backend/uploads/product/1624721375_53226244-560430127700934-2096307046788890624-n.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nữ\r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:29:35', '2022-06-26 15:35:56'),
(8, 1, 'Abercrombie & Fitch Fierce Cologne', '1960000.00', '1960000.00', NULL, 'backend/uploads/product/1624721396_nuoc-hoa-nam-abercrombie-fitch-fierce-men1.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nam\r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:29:56', '2022-06-26 15:35:56'),
(9, 1, 'Kelly Le Sens De Kelly EDP For Men', '2500000.00', '2000000.00', 20, 'backend/uploads/product/1624721429_lesen.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nam\r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:30:29', '2022-06-26 15:35:56'),
(10, 1, 'Kelly La Prédation Le Kelly EDP', '2000000.00', '1480000.00', 26, 'backend/uploads/product/1624721465_11.jpg', 2, 'Nồng độ: Eau de Parfum (EDP)\r\n\r\nPhong cách: Thanh lịch, Tinh tế\r\n\r\nDuch tích: 50ml\r\n\r\nLoại nước hoa: Nữ\r\n\r\nMùi hương chính: Hoa nhài, Quả mơ', '2021-06-26 15:31:05', '2022-06-26 15:35:56'),
(11, 2, 'Chanel Rouge Allure Liquid Powder 956 Invicible', '565000.00', '536750.00', 5, 'backend/uploads/product/1624721583_chanel-rouge-allure-liquid-power-mate-lip-color-effect-956-invicible.jpg', 2, 'Giới tính: Nữ\r\n\r\nXuất Xứ: Ý\r\n\r\nPhon cách: Thanh lịch, Tinh tế\r\n\r\nMàu son: Hồng', '2021-06-26 15:33:03', '2022-06-26 15:35:56'),
(12, 2, 'Chanel Rouge Allure Intense 93', '990000.00', '990000.00', NULL, 'backend/uploads/product/1624721614_8937-large-default.jpg', 2, 'Giới tính: Nữ\r\n\r\nXuất Xứ: Ý\r\n\r\nPhon cách: Thanh lịch, Tinh tế\r\n\r\nMàu son: Hồng', '2021-06-26 15:33:34', '2022-06-26 15:35:56'),
(13, 2, 'MAC Powder Kiss Lipstick 311 My Tweedy', '660000.00', '528000.00', 20, 'backend/uploads/product/1624721640_mac-powder-kiss-lipstick-311-my-tweedy.jpg', 2, 'Giới tính: Nữ\r\n\r\nXuất Xứ: Ý\r\n\r\nPhon cách: Thanh lịch, Tinh tế\r\n\r\nMàu son: Hồng', '2021-06-26 15:34:00', '2022-06-26 15:35:56'),
(14, 2, 'Son M.A.C Patrick Starr Mamastarr Limited Edition', '720000.00', '691200.00', 4, 'backend/uploads/product/1624721673_m-a-c-patrick-starr-mamastarr-limited-edition.jpg', 2, 'Giới tính: Nữ\r\n\r\nXuất Xứ: Ý\r\n\r\nPhon cách: Thanh lịch, Tinh tế\r\n\r\nMàu son: Hồng', '2021-06-26 15:34:33', '2022-06-26 15:35:56'),
(15, 2, 'Son Deborah Milano Red Long Lasting 08', '450000.00', '378000.00', 16, 'backend/uploads/product/1624721700_son-moi-milano-red-long-lasting-tinmp-696-2017-ok.jpg', 2, 'Giới tính: Nữ\r\n\r\nXuất Xứ: Ý\r\n\r\nMàu son: Hồng', '2021-06-26 15:35:00', '2022-06-26 15:35:56'),
(16, 3, 'Phấn nén Deborah Milano La Cipria 29', '280000.00', '229600.00', 18, 'backend/uploads/product/1624721860_786010951-700x700-300x300.jpg', 2, 'Thương hiệu: Deborah\r\n\r\nXuất Xứ: Ý\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:37:40', '2022-06-26 15:35:56'),
(17, 3, 'Chì Chân Mày 24 Ore Long Lasting Eyebrow Pencil 286', '300000.00', '225000.00', 25, 'backend/uploads/product/1624721889_chi-chan-may-24-ore-long-lasting-eyebrow-pencil-286.jpg', 2, 'Thương hiệu: Deborah\r\n\r\nXuất Xứ: Ý\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:38:09', '2022-06-26 15:35:56'),
(18, 4, 'Phấn Nước Sisley Paris Phyto-Blanc Cushion Foundation', '2000000.00', '1600000.00', 20, 'backend/uploads/product/1624721997_895.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:39:57', '2022-06-26 15:35:56'),
(19, 4, 'Sữa Tắm Sisley Soir De Lune Perfumed Bath & Shower Gel', '2000000.00', '1500000.00', 25, 'backend/uploads/product/1624722037_14750583103-2-700.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:40:37', '2022-06-26 15:35:56'),
(20, 4, 'Combo Trị Mụn Chống lão Hóa Paula’s Choice 499k', '699000.00', '496290.00', 29, 'backend/uploads/product/1624722080_54728313-2351104311837517-1458015730543886336-n.png', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:41:20', '2022-06-26 15:35:56'),
(21, 4, 'Sữa Dưỡng Thể Trắng Da Eucerin White Therapy Body Lotion', '260000.00', '260000.00', NULL, 'backend/uploads/product/1624722107_1444122240001-7180234-u4064-d20170526-t071546-263576.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:41:47', '2022-06-26 15:35:56'),
(22, 4, 'Gel Dưỡng Ẩm Bioderma Sensibio Eye', '550000.00', '341000.00', 38, 'backend/uploads/product/1624722295_plus.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:44:55', '2022-06-26 15:35:56'),
(23, 4, 'Kem Chống Nắng Bioderma Photoderm', '330000.00', '254100.00', 23, 'backend/uploads/product/1624722318_kem-chong-nang-bioderma-photoderm-max-spray-spf-50-cho-mat-body.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:45:18', '2022-06-26 15:35:56'),
(24, 4, 'Tẩy Trang Bioderma Sensibio H2O Cho Da Nhạy Cảm', '200000.00', '160000.00', 20, 'backend/uploads/product/1624722346_zb-p.jpg', 2, 'Duch tích: 100ml\r\n\r\nDành cho da: Da khô, Da nhạy cảm\r\n\r\nXuất xứ: Pháp', '2021-06-26 15:45:46', '2022-06-26 15:35:56'),
(25, 4, 'Sữa Rửa Mặt Dịu Nhẹ Eucerin White Therapy Cleansing Foam Làm Sáng Da', '500000.00', '400000.00', 20, 'backend/uploads/product/1624722376_sua-rua-mat-lam-trang-da-eucerin-white-therapy-gentle-cleansing-foam-anh1.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn, da nhạy cảm\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:46:16', '2022-06-26 15:35:56'),
(26, 4, 'Sữa Rửa Mặt Nhập Khẩu Clearasil Daily Clear', '300000.00', '270000.00', 10, 'backend/uploads/product/1624722402_41elniq-wnl-qbsj-jd-sl500.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:46:42', '2022-06-26 15:35:56'),
(27, 4, 'Tinh Chất Thiên Nhiên Tràm Trà Trị Mụn', '450000.00', '450000.00', NULL, 'backend/uploads/product/1624722426_tea-tree-oil-fb1.jpg', 2, 'Dành cho da: Da dầu, da khô, da mụn\r\n\r\nThương hiệu: G&M Consmetics\r\n\r\nXuất Xứ: Úc\r\n\r\nVì sao nên chọn: An toàn, Giá hợp lý', '2021-06-26 15:47:06', '2022-06-26 15:35:56'),
(28, 5, 'Dầu gội Dove phục hồi hư tổn', '186000.00', '186000.00', NULL, 'backend/uploads/product/1624722678_dau-goi-900g.jpg', 2, 'Thực tế dầu gội không chỉ giúp làm sạch tóc và da đầu, mà với Dove, dầu gội còn giúp cho mái tóc có được sự nuôi dưỡng cần thiết, đồng thời êm dịu làm sạch tóc và da đầu.', '2021-06-26 15:51:18', '2022-06-26 15:35:56'),
(29, 5, 'Dầu gội Sunsilk mềm mượt 650g', '98000.00', '98000.00', NULL, 'backend/uploads/product/1624722711_4b069cd0ec62cc27c21ee086aaf77c87.jpg', 2, 'Dầu gội Sunsilk mềm mượt diệu kỳ bổ sung hỗn hợp dưỡng chất độc đáo gồm hỗn hợp 5 tinh dầu tự nhiên (Hạnh nhân, Argan, Dầu cọ, Dầu hoa trà & Dầu dừa).\r\n\r\nCó tác dụng nuôi dưỡng sâu cả những phần tóc khô nhất mà không gây bết dính, cho mái tóc tràn đầy sức', '2021-06-26 15:51:51', '2022-06-26 15:35:56'),
(30, 5, 'Dầu gội bùn khoáng sạch gàu mát lạnh Nivea Men', '79000.00', '79000.00', NULL, 'backend/uploads/product/1624722740_afefaf7524f174d90acd599026857f98.jpg', 2, 'Dầu gội NIVEA MEN lần đầu tiên với công thức Bùn khoáng hoạt động như nam châm, hút sạch nhờn và bụi bẩn. Tóc và da đầu không nhờn ngứa.\r\n\r\nDầu gội Bùn khoáng mát lạnh kết hợp Bạc hà và Tinh chất Trà, giúp:\r\n\r\n- Gội sạch bụi bẩn và nhờn ngứa bám sâu trên da', '2021-06-26 15:52:20', '2022-06-26 15:35:56'),
(31, 5, 'Dầu gội Pantene ngăn rụng tóc - 950G', '190000.00', '190000.00', NULL, 'backend/uploads/product/1624722763_3902955615285-s-01-d20170722-t125002-557146.jpg', 2, 'Pantene được giới thiệu lần đầu tiên vào năm 1947 bởi công ty Thụy Sĩ Hoffman-LaRoche, với định hướng là dòng chăm sóc tóc cao cấp trên khắp châu Âu. Đến năm 1985, Pantene gia nhập tập đoàn đa quốc gia Procter & Gamble (P&G).\r\nChìa khoá thành công của Pan', '2021-06-26 15:52:43', '2022-06-26 15:35:56'),
(32, 5, 'Dầu gội Pantene ngăn rụng tóc', '186000.00', '186000.00', NULL, 'backend/uploads/product/1624722788_3902955615285-s-01-d20170722-t125002-557146.jpg', 2, 'Dầu gội Pantene ngăn rụng tóc 670ml với công thức đặc chế chuyên biệt dành cho các mái tóc yếu sẽ giúp nhẹ nhàng lấy sạch bụi bẩn cũng như chất nhờn trên tóc và da đầu để các dưỡng chất dễ dàng thấm sâu vào tóc, nuôi dưỡng và bảo vệ tóc tránh gãy rụng.', '2021-06-26 15:53:08', '2022-06-26 15:35:56'),
(33, 6, 'Kem dưỡng da tay Olive 3W Clinic Hand Cream', '220000.00', '220000.00', NULL, 'backend/uploads/product/1624779570_kem-duong-am-da-tay-3w-clinic-olive-hand-cream-100ml-1-u2409-d20160408-t100156.jpg', 2, 'Thương hiệu: 3W Clinic\r\n\r\nXuất xứ: Hàn Quốc\r\n\r\nDung tích: 100ml', '2021-06-27 07:39:30', '2022-06-26 15:35:56'),
(34, 6, 'Bộ đôi kem dưỡng đêm và sửa rửa mặt White Perfect Dewy', '196000.00', '196000.00', NULL, 'backend/uploads/product/1624779603_comboz-wp-foam-50-or-100ml-1.jpg', 2, 'Bạn đang cần một liệu pháp chăm sóc da mặt toàn diện nhưng chưa biết sử dụng loại mỹ phẩm nào. Thì hãy chọn lựa ngay bộ Đôi Kem Dưỡng Đêm Và Sửa Rửa Mặt White Perfect Dewy L\'oreal 50ml đang có giá chỉ 99.000đ trên tiki nhé. Bộ sản phẩm này nhận được sự đ', '2021-06-27 07:40:03', '2022-06-26 15:35:56'),
(35, 6, 'Kem dưỡng da AHA', '420000.00', '420000.00', NULL, 'backend/uploads/product/1624779633_3461949333418-s-01-d20170826-t154917-875726.jpg', 2, 'Thành phần\r\n\r\nBổ sung thành phần dưỡng da chống oxy hóa từ mầm hoa hướng dương giúp tăng cường rào chắn bảo vệ da khỏi tác hại của ánh nắng mặt trời và môi trường.\r\n\r\nHướng dẫn sử dụng\r\n\r\n1. Lắc đều trước khi sử dụng.\r\n2. Xoay nắp đến nút “ON”.\r\n3. Bơm 4-5 lần đ', '2021-06-27 07:40:33', '2022-06-26 15:35:56'),
(36, 6, 'Sữa chống nắng hạ nhiệt', '180000.00', '180000.00', NULL, 'backend/uploads/product/1624779658_lcreblo-lover-s-care-body-lotion-aloe-vera-800ml-u2409-d20170901-t193818-613182.jpg', 2, 'Hướng dẫn sử dụng\r\n\r\n1. Lắc đều trước khi sử dụng.\r\n2. Xoay nắp đến nút “ON”.\r\n3. Bơm 4-5 lần để lấy sản phẩm và dặm đều khắp bề mặt da.\r\n4. Sau khi sử dụng xoay nắp đến nút “OFF”.\r\n\r\n**Sản phẩm có 2 mẫu mã bao bì tùy theo nhà sản xuất từ Hàn Quốc**', '2021-06-27 07:40:58', '2022-06-26 15:35:56'),
(37, 7, 'Cọ trang điểm The Face Shop Face It Circle', '240000.00', '240000.00', NULL, 'backend/uploads/product/1624779740_c5fea7f18b158b77b1841f4d2c61f5a7.jpg', 2, NULL, '2021-06-27 07:42:20', '2022-06-26 15:35:56'),
(38, 7, 'Cọ má hồng Etude House My Beauty Tool Brush', '398000.00', '398000.00', NULL, 'backend/uploads/product/1624779762_0-5-68.jpg', 2, 'Cọ má hồng ELF Studio Blush Brush Đây là chiếc cọ siêu yêu thích của mình, được sử dụng hàng ngày luôn. Cọ dùng để tán má hồng, lấy phấn tốt, giúp lớp má hồng được tán dễ dàng,', '2021-06-27 07:42:42', '2022-06-26 15:35:56'),
(39, 7, 'Cọ má hồng Minigood DMCTB21', '120000.00', '120000.00', NULL, 'backend/uploads/product/1624779785_103cd5c6145a153b1746df80dc80c51a.jpg', 2, 'Cọ má hồng ELF Studio Blush Brush Đây là chiếc cọ siêu yêu thích của mình, được sử dụng hàng ngày luôn. Cọ dùng để tán má hồng, lấy phấn tốt, giúp lớp má hồng được tán dễ dàng', '2021-06-27 07:43:05', '2022-06-26 15:35:56'),
(40, 8, 'Sữa tắm An\'s 7Days', '350000.00', '350000.00', NULL, 'backend/uploads/product/1624779939_img-1355-4.jpg', 2, NULL, '2021-06-27 07:45:39', '2022-06-26 15:35:56'),
(41, 8, 'Sữa tắm Victoria’s Secret quyến rũ', '670000.00', '636500.00', 5, 'backend/uploads/product/1624779976_8a6dcb8e287174a7f949119dc28ca2.jpg', 2, 'Sữa tắm Sparkling Citrus Luscious Crush – Victoria’s Secret mang đến sức sống căng tràn và vẻ mịn màng tươi trẻ cho làn da nhờ chiết xuất từ quýt và những loài hoa thơm mê đắm.', '2021-06-27 07:46:16', '2022-06-26 15:35:56'),
(42, 8, 'Kem dưỡng ẩm L\'Occitane Pivoine', '840000.00', '840000.00', NULL, 'backend/uploads/product/1624780015_12.jpg', 2, 'Kem dưỡng ẩm đang trở thành một trong những loại mỹ phẩm chăm sóc da quan trọng, đặc biệt cho làn da khô.', '2021-06-27 07:46:55', '2022-06-26 15:35:56'),
(43, 8, 'Sữa tắm dạng kem Victoria’s Secret', '930000.00', '930000.00', NULL, 'backend/uploads/product/1624780044_863bac1b08b7740789672cdcceaae8.jpg', 2, 'Sữa tắm Sparkling Citrus Luscious Crush – Victoria’s Secret mang đến sức sống căng tràn và vẻ mịn màng tươi trẻ cho làn da nhờ chiết xuất từ quýt và những loài hoa thơm mê đắm', '2021-06-27 07:47:24', '2022-06-26 15:35:56'),
(44, 8, 'Kem dưỡng da AHA', '452000.00', '442960.00', 2, 'backend/uploads/product/1624780072_3461949333418-s-01-d20170826-t154917-875726.jpg', 2, 'Sữa chống nắng duy nhất có khả năng hạ nhiệt 5 độ C ngay lập tức cho làn da, giúp làm dịu da bạn và mang đến cho bạn cảm giác mát lạnh. Khi sử dụng để dặm lại vào giữa ngày, kết cấu mát lạnh của sản phẩm sẽ mang lại cảm giác dễ chịu và thư giãn cho da vừ', '2021-06-27 07:47:52', '2022-06-26 15:35:56'),
(45, 8, 'Sữa chống nắng hạ nhiệt', '180000.00', '180000.00', NULL, 'backend/uploads/product/1624780098_lcreblo-lover-s-care-body-lotion-aloe-vera-800ml-u2409-d20170901-t193818-613182.jpg', 2, 'Công dụng Sữa chống nắng duy nhất có khả năng hạ nhiệt 5 độ C ngay lập tức cho làn da, giúp làm dịu da bạn và mang đến cho bạn cảm giác mát lạnh. Khi sử dụng để dặm lại vào', '2021-06-27 07:48:18', '2022-06-26 15:35:56'),
(46, 8, 'Kem chống nắng AHA', '370000.00', '366300.00', 1, 'backend/uploads/product/1624780119_1.png', 2, 'Công dụng Sản phẩm chống nắng đa chức năng, vừa có khả năng bảo vệ da khỏi tác hại của ánh nắng mặt trời, giúp ngăn ngừa tình trạng sạm đen và lão hóa sớm cho da của bạn', '2021-06-27 07:48:39', '2022-06-26 15:35:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '1234567890', '2021-06-26 15:05:03', '2022-06-26 15:35:56'),
(2, 'test1', 'test@gmail.com', 'ha noi', '0964047698', '2021-06-27 08:06:15', '2022-06-26 15:35:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
