-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 เม.ย. 2020 เมื่อ 06:01 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krukiddee`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `footers`
--

CREATE TABLE `footers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2020_03_02_205140_create_students_table', 1),
(32, '2020_03_06_180925_create_donations_table', 1),
(33, '2020_03_06_184109_add_status_to_students_table', 1),
(34, '2020_03_06_184747_add_level_to_students_table', 1),
(35, '2020_03_07_150021_add_max_donate_and_close_donate_to_students_table', 1),
(36, '2020_03_10_191406_create_nontifications_table', 1),
(37, '2020_03_10_200748_add_id_card_and_nonti_and_birthday_and_age_and_grade_and_bank_of_to_students_table', 1),
(39, '2020_03_11_162533_add_id_card_and_pic_id_card_to_users_table', 2),
(40, '2020_03_16_185316_create_news_table', 3),
(41, '2020_03_16_185410_create_footers_table', 3),
(43, '2020_03_20_183534_add_status_to_users_table', 3),
(44, '2020_03_20_185430_add_cause_to_users_table', 4),
(45, '2020_03_23_012736_add_cause_to_students_table', 5),
(46, '2020_03_25_153146_add_total_donate_to_students_table', 6),
(48, '2020_03_16_185424_create_slides_table', 7);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `nontifications`
--

CREATE TABLE `nontifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `titleBig` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlesmall1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlesmall2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `slides`
--

INSERT INTO `slides` (`id`, `titleBig`, `titlesmall1`, `titlesmall2`, `picture`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Krukiddee.com', 'ช่วยเหลือเด็กยากจน ไร้โอกาส', 'โดยมีครูเป็นนำร่องผู้ดูแลเด็ก', '5e8c9b8a0e5c7.jpg', 2, '2020-04-07 15:26:02', '2020-04-07 15:26:02');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `id_card` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankAccountName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closeDonate` date NOT NULL,
  `maxDonate` double NOT NULL,
  `totalDonate` double DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `cause` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonti` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `students`
--

INSERT INTO `students` (`id`, `name`, `lastname`, `address`, `district`, `province`, `grade`, `age`, `birthday`, `id_card`, `tel`, `bank_of`, `bankAccountName`, `bankName`, `bankNumber`, `description1`, `description2`, `picture`, `level`, `closeDonate`, `maxDonate`, `totalDonate`, `status`, `cause`, `nonti`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'เด็กหญิงสุนิษา', 'สิทธิแก้ว', '371 หมู่ 20 บ้านขามเรียง ต.ขามเรียง', 'กันทรวิชัย', 'มหาสารคาม', 'ป.1', 7, '2020-04-07', '0000000000000', '0619703808', 'ยาย', 'นางลักคณา ช่างเหลา', 'ธนาคารเพื่อการเกษตรและสหกรณ์', '020087486889', '<div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><span style=\"background-color: rgb(255, 255, 255);\"><b>KruKidDee</b> ได้ประสานกับทางครูที่โรงเรียน และได้ลงพื้นที่ไปยังครอบครัวของ<b> เด็กหญิงสุนิษา สิทธิแก้ว </b></span></div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><span style=\"background-color: rgb(255, 255, 255);\">ที่ บ้านขามเรียง ต.ขามเรียง อ.กันทรวิชัย จ.มหาสารคาม ได้มีการสอบถามเกี่ยวกับความเป็นอยู่ของครอบครัว เด็กหญิงสุนิษา สิทธิแก้ว น้องกำลังเรียนอยู่ชั้น ป.1 เป็นเด็กน่ารัก ร่าเริง แจ่มใส </span></div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><span style=\"background-color: rgb(255, 255, 255);\"><br></span></div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><span style=\"background-color: rgb(255, 255, 255);\">ส่วนพ่อแม่ของน้องแยกทางกัน แม่ของน้องไปทำงานที่กรุงเทพฯ เลยทำให้น้องต้องพักอาศัยอยู่กับตากับยายตั้งแต่เด็ก </span></div>', '<div dir=\"auto\" style=\"\">ปัจจุบันแม่ของน้องก็ขาดการติดต่อจากทางบ้านนานๆทีแม่ส่งเงินมาให้สัปดาห์ละ 300-500 ซึ่งเป็นจำนวนเงินที่น้อยมากๆเลยก็ว่าได้ บางครั้งก็ไม่ได้ส่งมาให้ทางบ้านได้ใช้เลย</div><div dir=\"auto\" style=\"\"><br></div><div dir=\"auto\" style=\"\"> </div><div dir=\"auto\" style=\"\">ส่วนตากับยายมีอาชีพทำนาและรับจ้างทั่วไป เช่น ก่อสร้าง ตัดไม้ เผาถ่าน ช่วงทำนาก็ทำนา แต่ผลผลิตจากการทำนาปีนี้ได้น้อย เพราะ เกิดจากปัญหาภัยแล้ง และรายได้ส่วนมากก็มาจากคุณตา ซึ่งยายของน้องก็ป่วยไม่ค่อยสบายต้องไปหาหมออยู่เป็นประจำ</div><h4 style=\"\"><br><ul><li>ส่งของบริจาคได้ที่</li></ul></h4><div dir=\"auto\" style=\"\"><div dir=\"auto\">นางลักคณา ช่างเหลา</div><div dir=\"auto\">371 หมู่ 20 บ้านขามเรียง ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม 44150 โทร 061-9703808</div><div dir=\"auto\">**เลขที่บัญชีของยาย** (คนที่ดูแลเด็ก)&nbsp;</div><div dir=\"auto\">020087486889</div><div dir=\"auto\">นางลักคณา ช่างเหลา</div><div dir=\"auto\">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</div><div dir=\"auto\">เบอร์โทรยาย (ที่ดูแลเด็ก)&nbsp; 061-9703808</div><div dir=\"auto\"><br></div><h4><ul><li>ติดต่อได้ที่</li></ul></h4><div dir=\"auto\">Facebook : krukiddee</div><div dir=\"auto\">IG : k.krukiddee</div><div dir=\"auto\">Line : k.krukiddee</div><div dir=\"auto\">E-mail : krukiddee@gmail.com</div><div dir=\"auto\">#ช่วยเหลือเด็ก</div><div dir=\"auto\">#สานต่อความฝัน</div><div dir=\"auto\">#ครูคิดดี</div></div>', '5e8c9cc35209e.jpg', '4', '2020-04-25', 5000, NULL, 'open', NULL, 'null', 13, '2020-04-07 15:31:15', '2020-04-07 15:47:14'),
(2, 'เด็กหญิงเกวลิน', 'ชินโฮง', '90 หมู่ 22 บ้านเขียบ ตำบลขามเรียง 44150', 'อำเภอกันทรวิชัย', 'มหาสารคาม', 'ป.1', 7, '2020-04-07', '0000000000001', '0870276735', 'ย่า', 'นางสมร มณีนก', 'ธนาคารเพื่อการเกษตรและสหกรณ์', '018462942785', '<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"font-family: Nunito, sans-serif; font-size: 14.4px; white-space: normal; overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\"><b>KruKidDee </b>ได้ประสานกับทางครูที่โรงเรียน และได้ลงพื้นที่ไปยังครอบครัวของ <b>เด็กหญิงเกวลิน ชินโฮง และ เด็กชายกรวิชญ์ ชินโฮง</b></div><div dir=\"auto\">อาศัยอยู่ร่วมกัน 5 คน มี ปู่ ย่า แม่ของเด็ก และเด็กอีก 2 คน เด็ก 2 คนนี้มีนิสัยร่าเริงแจ่มใส เป็นเด็กน่ารัก ร่าเริงและยังช่วยครอบครัวทำงานบ้านอีกด้วย</div><div dir=\"auto\">พ่อของเด็กทำอาชีพขับรถบรรทุกอ้อยอยู่ที่อำเภอชุมแพ จังหวัดขอนแก่น ส่วนแม่ทำอาชีพรับจ้างเป็นแม่บ้าน จังหวัดมหาสารคาม ที่แม่ได้พาลูกๆมาอาศัยอยู่กับปู่ ย่า นั้นเพราะไม่มีบ้านอยู่อาศัยเลยพาลูกมาพักอาศัยอยู่กับย่า ตอนนี้ยังหาเงินทุนสร้างบ้านใหม่ไม่ได้เลยต้องอาศัยอยู่ที่นี่ไปก่อน</div><div dir=\"auto\"><br></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"font-family: Nunito, sans-serif; font-size: 14.4px; white-space: normal; overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\">ส่วนปู่ทำอาชีพทำนาแต่ไม่ใช่นาของตัวเอง เป็นนาเช่าและนาเช่าก็จะแบ่งผลผลิตกับเจ้าของที่นา ส่วนย่าทำอาชีพขายผักไปรับผักจากตลาดมาขายตามตลาดเล็กๆตามหมู่บ้านอีกที ซึ่งกำไรจากการขายนั้นก็ไม่ได้เยอะ ได้กำไรไม่กี่บาท แต่พอขายได้ก็เอาเงินหมุนเวียนไปซื้อผักมาขายแบบนี้เรื่อยๆ ก็เอากำไรที่ได้นั้นมาซื้อกับข้าวกินในแต่ละวัน ยังเป็นรายได้เสริมให้กับครอบครัวได้อีกส่วนหนึ่ง</div></div></div></div>', '<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\"><span style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\">รายได้หลักๆก็มาจากแม่ที่ทำงานเป็นแม่บ้าน ซึ่งไม่พอใช้กับค่าใช้จ่ายภายในบ้านเพราะอาศัยอยู่ด้วยกันหลายคน ทั้งค่ากับข้าว ค่าน้ำ-ค่าไฟ และค่าใช้จ่ายอื่นๆ อีกมากมาย</span></div><div dir=\"auto\" style=\"\"><span style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><br></span>อยากจะขอเชิญชวนพี่ๆน้องๆที่เห็นโพสต์นี้ช่วยกันกดไลค์กดแชร์เพื่อจะได้ให้คนอื่นๆได้เห็นโพสต์นี้และร่วมกันบริจาคเงิน หรือจะบริจาคเป็นสิ่งของ เสื้อผ้า อุปกรณ์การเรียน ฯ เล็กๆน้อยๆ พอที่จะช่วยให้ครอบครัวนี้ได้และนำเงินที่ได้จากการบริจาคไปเป็นทุนการศึกษาให้น้องๆต่อไปและพอจะช่วยเหลือครอบครัวนี้ได้ครับ</div><div dir=\"auto\" style=\"\"><br></div><div dir=\"auto\" style=\"\"><h4><ul><li>ส่งของบริจาคได้ที่</li></ul></h4><div dir=\"auto\">นางสมร มณีนก</div><div dir=\"auto\">90 หมู่ 22 บ้านเขียบ ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม 44150 โทร 087-0276735</div><div dir=\"auto\">**เลขที่บัญชีของย่า** (คนที่ดูแลเด็ก)</div><div dir=\"auto\">018462942785</div><div dir=\"auto\">นางสมร มณีนก</div><div dir=\"auto\">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</div><div dir=\"auto\">เบอร์โทรย่า (ที่ดูแลเด็ก)&nbsp; 087-0276735</div><h4><ul><li>ติดต่อได้ที่</li></ul></h4><div dir=\"auto\">Facebook : krukiddee</div><div dir=\"auto\">IG : k.krukiddee</div><div dir=\"auto\">Line : k.krukiddee</div><div dir=\"auto\">E-mail : krukiddee@gmail.com</div><div dir=\"auto\">#ช่วยเหลือเด็ก</div><div dir=\"auto\">#สานต่อความฝัน</div><div dir=\"auto\">#ครูคิดดี</div></div></div>', '5e8c9de9c5131.jpg', '4', '2020-04-25', 10000, NULL, 'open', NULL, 'null', 13, '2020-04-07 15:36:09', '2020-04-07 15:47:59'),
(3, 'เด็กหญิงฐาปนี', 'คลังแสง', '91 หมู่ 17 บ้านเขียบ ตำบลขามเรียง 44150', 'กันทรวิชัย', 'มหาสารคาม', 'ป.4', 10, '2020-04-07', '0000000000002', '0621751603', 'แม่', 'นางสำรีย์ ทองขันธ์', 'ธนาคารกรุงไทย', '954-030388-5', '<span style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><b>KruKidDee </b>ได้ประสานกับทางครูที่โรงเรียน และได้ลงพื้นที่บ้านเขียบ บ้านเลขที่ 91 หมู่ 17 ต.ขามเรียง อ.กันทรวิชัย จ.มหาสารคาม ได้มีการสอบถามข้อมูลและความเป็นอยู่ของครอบครัว <b>เด็กหญิงฐาปนี คลังแสง</b> (น้องไข่มุก) อายุ 10 ขวบ เรียนอยู่ชั้น ป. 4 น้องไข่มุกเดินไม่ได้ตั้งแต่เด็ก แต่ได้ทำการบำบัดรักษา ที่โรงพยาบาลศรีนครินทร์ จนสามารถเดินได้เป็นปกติและน้องเป็นผังผืดอยู่ที่คอซึ่งตอนนี้ยังไม่ได้รักษา รอให้โตก่อนค่อยผ่าได้ น้องเป็นเด็กที่ไม่ค่อยสมบูรณ์ผอมมาก ตัวน้องไข่มุกเองก็พัฒนาการได้ช้า ไปโรงเรียนได้แต่น้องเรียนไม่ค่อยรู้เรื่อง ตามไม่ทันเพื่อนๆ</span>', '<div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\">น้องไข่มุกพักอาศัยอยู่กับพ่อแม่และยาย ส่วนอาชีพของพ่อแม่นั้นคือทำนาและรับจ้างทั่วไป ส่วนแม่ก็รับจ้างทั่วไปแต่ว่าช่วงนี้ไม่ค่อยมีงานทำเลยครับ รายได้หลักๆก็ได้มาจากพ่อ พ่อเป็นคนดูแลเรื่องค่าใช้จ่ายซะส่วนมาก งานรับจ้างทั่วไปนั้นก็ไม่ได้มีประจำทุกวัน ซึ่งรายได้ที่ได้มานั้นอาจไม่ได้พอเพียงในการใช้จ่ายภายในบ้าน เพราะตอนนี้พ่อทำงานหาเงินคนเดียว</div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><br></div><div dir=\"auto\" style=\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap;\"><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><h4><ul><li style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">ส่งของบริจาคได้ที่</font></li></ul></h4><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">นางสำรีย์ ทองขันธ์</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">91 หมู่ 17 บ้านเขียบ ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม 44150 โทร 062-1751603</font></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">**เลขที่บัญชีของแม่**</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">954-030388-5</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">นางสำรีย์ ทองขันธ์</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">ธนาคารกรุงไทย</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">เบอร์โทร  062-1751603</font></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><h4><ul><li style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">ติดต่อได้ที่</font></li></ul></h4><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">Facebook : krukiddee</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">IG : k.krukiddee</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">Line : k.krukiddee</font></div><div dir=\"auto\" style=\"font-family: inherit;\"><font style=\"background-color: rgb(255, 255, 255);\">E-mail : krukiddee@gmail.com</font></div></div></div>', '5e8c9eb3c6cab.jpg', '4', '2020-04-25', 5000, NULL, 'open', NULL, 'null', 13, '2020-04-07 15:39:31', '2020-04-07 15:43:55'),
(4, 'หญิงปพิชญา', 'ดวงมาลา', '99 หมู่ 15 บ้านดอนมัน ตำบลขามเรียง  44150', 'อำเภอกันทรวิชัย', 'มหาสารคาม', 'ป.2', 8, '2020-04-07', '0000000000003', '0636107003', 'ตา', 'นายยวน ดวงมาลา', 'ธนาคารกรุงไทย', '678-2-30828-2', '<div><b>KruKidDee </b>ได้ประสานกับทางครูที่โรงเรียน และได้ลงพื้นที่ไปยังครอบครัว<b>เด็กหญิงปพิชญา ดวงมาลา&nbsp;</b></div><div>บ้านเลขที่ 99 หมู่ที่ 15 บ้านดอนมัน ต.ขามเรียง อ.กันทรวิชัย จ.มหาสารคาม ได้สอบถามความเป็นอยู่ของครอบครัวนี้พบว่า เด็กหญิงปพิชญา ดวงมาลา อยู่ชั้น ป.2 อาศัยอยู่กัน 4 คน มี ตา,ยาย,น้า,แล้วก็ตัวน้อง&nbsp;</div><div>พ่อแม่ของน้องได้แยกทางกันตั้งแต่น้องยังเด็ก เลยได้อาศัยอยู่กับตายาย แม่ของน้องน้ำไปทำงานโรงงานอยู่ที่ กทม แต่ไม่ได้ส่งเงินมาเลี้ยงดูเลย</div><div>ส่วนตาก็เก็บของเก่า เก็บขวดขาย เพราะไม่มีนาทำกิน รายได้มาจากการเก็บของเก่าขายของตา และรายได้อีกทางมาจากน้า น้าของน้องน้ำเรียน</div><div>วิทยาลัยดุริยางคศิลป์อยู่ที่มหาวิทยาลัยมหาสารคาม ปี 4 ก็เลยรับงานตอนกลางคืน พอที่จะได้เงินมาช่วยค่าใช้จ่ายภายในครอบครัว แต่งานก็ไม่ได้มีตลอดเลยทำให้เงินไม่เพียงพอ เพราะต้องส่งตัวเองเรียนด้วย</div>', '<div>น้องปพิชญา(น้องน้ำ) เป็นเด็กพิเศษคือ แรกเกิดหมอบอกว่าน้องอาจจะไม่รอด แต่พอน้องเกิดได้ไม่นานน้องก็ได้ผ่าตัดลำไส้ที่ขอนแก่น จากนั้นก็ไปผ่าตัดต่อที่โรงพยาบาลศิริราชที่กรุงเทพฯ ปัจจุบันน้องสุขภาพไม่ค่อยดี น้องผอมมากแต่ท้องน้องโตกว่าปกติ เป็นเด็กที่การเจริญเติบโตช้า ท้องร่วงบ่อยครั้ง กินอะไรนิดหน่อยก็มักจะขับถ่ายตลอด เพราะลำไส้เปื่อย ส่วนตัวน้องเป็นเด็กร่าเริงสนุกสนานครับ&nbsp;</div><div style=\"text-align: left;\"><span style=\"font-size: 0.9rem;\">&nbsp; &nbsp;อยากจะขอเชิญชวนพี่ๆน้องๆที่เห็นโพสต์นี้ช่วยกันกดไลค์กดแชร์เพื่อจะได้ให้คนอื่นๆได้เห็นโพสต์นี้และร่วมกันบริจาคเงิน หรือ สิ่งของ เสื้อผ้า อุปกรณ์การเรียน ฯ เล็กๆน้อยๆ คนละ 5 บาท 10 บาท เพื่อเป็นทุนการศึกษาให้น้องๆต่อไปและพอจะช่วยเหลือครอบครัวนี้ได้ครับ</span></div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\"><span style=\"font-size: 0.9rem;\"><h4><ul><li>ส่งของบริจาคได้ที่</li></ul></h4><div>นายยวน ดวงมาลา (ตาของน้อง)</div><div>99 หมู่ 15 บ้านดอนมัน ตำบลขามเรียง อำเภอกันทรวิชัย จังหวัดมหาสารคาม 44150 โทร 0636107003</div><div>*เลขที่บัญชีของตา*&nbsp;</div><div>เลขที่บัญชี 678-2-30828-2</div><div>นายยวน ดวงมาลา</div><div>ธนาคารกรุงไทย</div><div>เบอร์โทร&nbsp; 0636107003</div><div><br></div><h4><ul><li>ติดต่อได้ที่</li></ul></h4><div>Facebook : krukiddee</div><div>IG : k.krukiddee</div><div>Line : k.krukiddee</div><div>E-mail : krukiddee@gmail.com</div><div>#ช่วยเหลือเด็ก</div><div>#สานต่อความฝัน</div><div>#ครูคิดดี</div></span></div>', '5e8ca126b1e88.jpg', '3', '2020-04-29', 4000, NULL, 'open', NULL, 'null', 13, '2020-04-07 15:49:58', '2020-04-07 15:49:58');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cause` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `tel`, `schoolname`, `Address`, `pic_id_card`, `id_card`, `email_verified_at`, `password`, `type`, `status`, `cause`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'member', 'member', 'member@gmail.com', '1234156123', NULL, '123456', NULL, NULL, NULL, '$2y$10$ZhG31/ucChzroRB1Lsi4R./b8OiVAormU3Yl.DTSQ3VfjI6Ni2H.K', 1, '', NULL, 'sTATQGaL57Xi6AQzykv8F7NHlj7T5yNLamedWlIhy3EXDKnsGT9VOUy9y5uF', '2020-03-11 08:49:58', '2020-03-11 08:49:58'),
(3, 'มาโนช', 'fsdfrer', 'bosssa5558@gmail.com', '0940424511', NULL, '191/7', NULL, NULL, NULL, '$2y$10$PDzhVa2WV7kOdsw.ZrqeF.iFDNCTsUJjDxQPk4ibiVk6iDHgDTWhy', 1, '', NULL, '3h0rBQHXX03haovvcOZWmFzmH8kSJNaHeIJNq0LISFRN6sMYLj1Ohdl6K90L', '2020-03-11 09:46:56', '2020-03-11 09:46:56'),
(12, 'มาโนช', '1212', 'bossersa5558@gmail.com', '0940424511', NULL, '191/7', 'x', 'x', NULL, '$2y$10$bdaz8iATNlQkg6gPO5WqJeMoyy30Yq35xTbgoKDRbo8wvq2McR2ny', 1, NULL, NULL, '6qBcCZtY9KO0vmnRtsErgZnIyxev5BhqIxd3oF2bX62iA8xXWMeZZgexE2PW', '2020-03-11 13:28:41', '2020-03-11 13:28:41'),
(13, 'มาโนช วิริยะ', 'วิริยะ', 'teacher@gmail.com', '0940424511', 'tes', '191/7, ต.เชียงเพ็ง', '5e68e7c07f802.jpeg', '3434434343434', NULL, '$2y$10$pOE55ZdMMTo9ucKyryMrvebaFRi37KGLBF2/4R0a7NHYsX.mA8.4i', 3, '', NULL, 'RvnvzIprTxwx5tSeRXBEtgJ7OhxKaAJo4tkhRlUyB6hk4oFds1jWfPLJZLs3', '2020-03-11 13:29:36', '2020-03-11 13:29:36'),
(14, 'มาโนช', '123', 'member2@gmail.com', '094042451', NULL, '191/7', 'x', 'x', NULL, '$2y$10$DTkyqQQnOvZ2eeRgsBVPVuVTA/CeEyn1PcV/b2gAi5HIyI7de2PS2', 1, NULL, NULL, 'ObcbxsB9TcHOtLwz4LeUWyMedPFLvErYgzltqNqCiuiTYOCaDLQDtCgMfUpR', '2020-03-11 13:56:20', '2020-03-11 13:56:20'),
(15, 'admins', 'admin', 'admin@gmail.com', '1234567891', NULL, '123', 'x', 'x', NULL, '$2y$10$TioFiBtKaI.L9cLvCYfrJeRnilzBGgVo4EhYzrMsmyNWuxoI7facK', 0, NULL, NULL, 'iZiZ3ihv8ICS9GJsMVOpCTAPhhyB6G3wOzZSA5k6Jn8PujeAWOWdgskElHc6', '2020-03-12 09:54:45', '2020-03-12 09:54:45'),
(16, 'มาโนช วิริยะ', 'วิริยะ', '5465456@gmail.com', '0940424511', NULL, 'ต.เชียงเพ็ง', '5e6a457ea0347.jpeg', '1231566545', NULL, '$2y$10$6Y/EL9gm4J77UoQKTjlR6eN0DODI6ZHeGmKOof/s.aDD0navVUnz6', 1, NULL, NULL, '4yz0ztX0GfAwylBSW6YZWGpTW9XVJpv0EeqrdisS9Z3OKLCJhgu7cYkz3Asr', '2020-03-12 14:21:50', '2020-03-12 14:21:50'),
(19, 'มาโนช', 'adasd', 'bosssadf5558@gmail.com', '0940424511', '0', '191/7', '0', '1010101010101', NULL, '$2y$10$2sR8ByQh/0V9CsjK1XRxGOEyR/1LmH1ZZ0i2hUjHr8DHComK/4RZK', 1, NULL, NULL, 'KSKVWL5CZ4DxaYOwLKwDONfDtdupBIom16GLqf8TlGfZeEizbxg1TeOPnjsa', '2020-03-25 16:25:18', '2020-03-25 16:25:18'),
(22, 'กดกดเ', 'ใจดี', 'bosssaaa5558@gmail.com', '0999999999', 'tesss', '191/7', '5e7e46d60fc39.jpeg', '1739900682833', NULL, '$2y$10$z.2B8dXWzWSSnUQM4D0/f.we8OTwRAmC/lRNPQqeM0PnR5aZyGB5e', 3, NULL, NULL, NULL, '2020-03-27 18:32:54', '2020-03-27 18:32:54'),
(23, 'sdfsdf', 'sdfsdf', 'bosssa555asdsad8@gmail.com', '0940424511', 'ssfsdf', 'dsfsdfsdf', '5e887c7d1efee.png', '1234567891231', NULL, '$2y$10$1C.8zWXP6ltS.Hopt9C6LuycciM4aLucsQS9dqfN2S0CYLKFGJ4Ui', 2, NULL, NULL, 'P8pQDaAETX86zNOUGF9N3LIoMVSbO9SOYICJpyYmBqNzDW1AtNi0aLlzystK', '2020-04-04 12:24:29', '2020-04-04 12:24:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_user_id_foreign` (`user_id`),
  ADD KEY `donations_student_id_foreign` (`student_id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nontifications`
--
ALTER TABLE `nontifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nontifications_user_id_foreign` (`user_id`),
  ADD KEY `nontifications_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_id_card_unique` (`id_card`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nontifications`
--
ALTER TABLE `nontifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `nontifications`
--
ALTER TABLE `nontifications`
  ADD CONSTRAINT `nontifications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `nontifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
