-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 11:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eric`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `desc`, `field_name`, `type_media`, `price`, `category_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ut reiciendis consequatur rem et expedita ullam necessitatibus.', 'Sed aut et quis optio fugiat cumque qui. Sapiente fugiat laborum neque cupiditate ut unde qui. Fugiat laboriosam sunt dolor nam.', 'Merritt Crooks', 'Lura Batz', 6768, 'Neil Grimes', 10, '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(2, 'Adipisci qui quia rerum nemo repudiandae itaque quos cum.', 'Incidunt incidunt cum dolore voluptates sint hic. Ut quae omnis iure. Molestiae saepe occaecati et pariatur odio accusamus. Voluptas cum doloremque rerum.', 'Mikel Powlowski', 'Prof. Hermina Rice V', 355, 'Ivory Harris', 8, '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(3, 'Placeat nesciunt assumenda quia a.', 'Numquam ex sit pariatur. Consectetur ipsa iure sequi inventore. Quod id nesciunt molestias at aut mollitia.', 'Miss Kathlyn Legros I', 'Dr. Beatrice Pollich PhD', 7745, 'Furman Hackett', 10, '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(4, 'Consequatur saepe odio similique.', 'Consequatur laborum et nostrum consectetur. Saepe rerum eaque earum ratione dolorum voluptatum consequatur. Illum occaecati minima aut consequuntur quidem debitis quia. Occaecati natus et aperiam nam.', 'Prof. Braeden Abshire DVM', 'Linda Hessel', 3395, 'Ciara Spencer', 14, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(5, 'Eaque voluptatem molestiae aliquam pariatur iure.', 'Blanditiis at veritatis id tenetur. Sint consequatur excepturi laudantium repellat sint non et. Quis distinctio sunt ea architecto nihil quis.', 'Miss Celia Littel', 'Dr. Jamil Weimann', 4288, 'Estella Paucek', 14, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(6, 'Dignissimos natus veniam cupiditate et eveniet deserunt.', 'Earum commodi repellendus deserunt aut. Itaque minus ad explicabo officia eum veritatis. Fugit sed enim cumque eius accusantium.', 'Ms. Keara Oberbrunner I', 'Maximus Cremin', 2295, 'Ally Hartmann', 19, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(7, 'Aperiam officia molestiae dolorem.', 'Ratione aut culpa sequi dolore quibusdam voluptatem. Rerum occaecati dolore qui labore sit enim qui. Ut voluptatem nisi et cum quasi et.', 'Liza Kuhlman', 'Mr. Laverna Grant DDS', 2772, 'Ethel Hammes', 18, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(8, 'Eius aut voluptatem eum distinctio.', 'Eos pariatur iure sint voluptatem est nisi. Consectetur autem praesentium laborum est sint facilis eligendi. Eveniet eos debitis illo cumque. Assumenda temporibus delectus nulla.', 'Miss Alice Wiegand IV', 'Mr. Alec Veum', 5248, 'Gail Walsh', 16, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(9, 'In vitae eos enim facere commodi est.', 'Ut esse esse repudiandae vero qui dolorem autem. Et perferendis mollitia harum facere. Dicta corrupti blanditiis sint accusamus voluptates praesentium. Molestias laboriosam est iure autem tempore inventore.', 'Ms. Viola Padberg IV', 'Pauline Huel', 9668, 'Dr. Lilian O\'Conner V', 1, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(10, 'Consequuntur et dolores laborum non itaque.', 'Dolorem molestiae corporis facilis perferendis dolores aut. Placeat dolor id quia autem sit. Hic earum omnis et veritatis.', 'Alfreda Macejkovic', 'Rolando Lang', 2042, 'Jeff Leannon', 13, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(11, 'Odio id natus consequatur.', 'Expedita et qui tempore ipsa molestiae dolorem. Ut dolorem et eaque fugit vel. Suscipit quia ea qui aliquam similique rerum id. Omnis debitis et maxime. Dolores iste aliquam vero voluptate.', 'Kavon Bechtelar', 'Mrs. Allie Treutel', 1865, 'Emie Satterfield', 9, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(12, 'Iusto voluptatem dicta blanditiis deleniti at aliquam quae.', 'Commodi eum numquam accusamus eos pariatur. Delectus ducimus consequuntur voluptas illum modi sint. Porro reiciendis est repudiandae delectus.', 'Myles Ward Jr.', 'Billie Strosin', 9141, 'Destin Dare', 10, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(13, 'Repellendus possimus et quo ut qui aperiam.', 'Eos recusandae ratione deserunt voluptatem nisi voluptatem quos. Cumque fuga saepe et. Fuga velit rerum corrupti sed aut eligendi.', 'Prof. Carlee Breitenberg', 'Abe Hansen', 2643, 'Dr. Nathan Schumm', 3, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(14, 'Culpa ut rerum officiis voluptas illum.', 'Facere magni similique doloremque incidunt ut. Consequatur modi id modi est inventore voluptas laborum.', 'Casandra McClure', 'Bethany Dicki V', 4746, 'Aryanna Rogahn', 15, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(15, 'Aut vel nulla aut iure deleniti ipsum et.', 'Est eius iusto pariatur sint omnis blanditiis. Ratione sit consequuntur rerum est repellat ratione. Unde hic enim ut doloribus quos.', 'Cleve Carroll', 'Prof. Novella Padberg V', 2442, 'Mr. Ephraim Wintheiser', 2, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(16, 'Iusto et sit repellat aut.', 'Optio quibusdam natus est. Quasi modi ut et harum aut culpa qui. Inventore magni eaque fuga.', 'Justina Cassin', 'Mr. Jaylin Zemlak V', 2480, 'Henderson Waelchi', 3, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(17, 'Quo odit veniam qui quo tenetur ab.', 'Consequatur omnis numquam omnis magni quasi deserunt veniam aut. Voluptate quis aliquam molestiae voluptatem. Reprehenderit quis facilis eum voluptatum.', 'Dr. Eloisa Hodkiewicz', 'Kennith Crooks', 245, 'Prof. Gayle Erdman MD', 10, '2020-08-04 19:57:43', '2020-08-04 19:57:43'),
(18, 'Et expedita autem veniam et debitis est praesentium ipsa.', 'Beatae quis placeat expedita sunt quia. Natus et atque et et sequi reiciendis.', 'Brisa Keebler', 'Mr. Garret Wiegand', 1633, 'Mr. Modesto Hessel Sr.', 4, '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(19, 'Veritatis aut aliquam iusto illo.', 'Aperiam voluptates est et consequuntur rerum sed quo inventore. Id est accusamus laudantium sunt repellat sed. Exercitationem sunt molestias atque asperiores velit officia. Deserunt velit voluptatibus maxime sed eum tempora doloribus.', 'Odie Kautzer', 'Layne Roberts', 8838, 'Dr. Lola O\'Reilly III', 3, '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(20, 'Ut id illum qui doloremque iure dolore.', 'Sed nisi labore et veniam sit recusandae. Enim excepturi maxime qui maxime voluptatem. Ad pariatur quia reiciendis ut sed.', 'Eli Douglas', 'Nichole Schmidt Jr.', 8349, 'Paxton Douglas', 17, '2020-08-04 19:57:44', '2020-08-04 19:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Kasey Kuvalis PhD', 'Dr. Donavon Thiel Jr.', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(2, 'Mr. Kelton Langosh IV', 'Marlin McKenzie', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(3, 'Jayne Donnelly V', 'Brooks Glover', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(4, 'Mrs. Augustine Pacocha V', 'Chet McClure', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(5, 'Miss Aliya Runolfsson III', 'Myrtice Labadie', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(6, 'Keven Spinka', 'Esmeralda Greenholt', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(7, 'Ms. Lelia Williamson II', 'Ms. Jermaine Franecki', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(8, 'Elinor Schaefer', 'Ibrahim Rau', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(9, 'Prof. Lea Bayer', 'Prof. Ferne Hoppe DDS', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(10, 'Leonel Kulas', 'Miss Elouise Lindgren', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(11, 'Jarrod Connelly I', 'Connie Ferry II', '2020-08-04 19:57:44', '2020-08-04 19:57:44'),
(12, 'Shana Corkery', 'Devan Osinski', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(13, 'Miss Sierra Mitchell PhD', 'Emmalee Mueller', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(14, 'Matilda Schuppe', 'Payton Runolfsdottir', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(15, 'Prof. Trey Stroman V', 'Dr. Garrison Batz', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(16, 'Annetta Reilly', 'Casper Ferry', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(17, 'Rudy Braun', 'Ona Romaguera', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(18, 'Janelle Bahringer II', 'Simone Mann', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(19, 'Miss Sydnie Harber V', 'Geoffrey O\'Reilly', '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(20, 'Zackery Kihn', 'Adriel Stokes', '2020-08-04 19:57:45', '2020-08-04 19:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(87, '2014_10_12_000000_create_users_table', 1),
(88, '2014_10_12_100000_create_password_resets_table', 1),
(89, '2019_08_19_000000_create_failed_jobs_table', 1),
(90, '2020_08_04_164406_create_p_users_table', 1),
(91, '2020_08_04_165736_create_courses_table', 1),
(92, '2020_08_04_171651_create_fields_table', 1),
(93, '2020_08_04_171921_create_resources_table', 1),
(94, '2020_08_04_172735_create_prefers_table', 1),
(95, '2020_08_04_172854_create_posts_table', 1),
(96, '2020_08_04_173326_create_subscribe_courses_table', 1),
(97, '2020_08_04_173452_create_comments_table', 1),
(98, '2020_08_04_173706_create_shares_table', 1),
(99, '2020_08_04_173814_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `desc`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Architecto esse nihil quaerat rerum et natus.', 'Qui aspernatur adipisci et sint. Sunt impedit omnis ullam aut eius. Temporibus dolore est eaque libero ipsa architecto voluptate. Veritatis labore perferendis eum ut aut itaque.', 16, '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(2, 'Cupiditate delectus voluptatem possimus vel aut quia voluptatibus delectus.', 'Eum quis velit repellendus voluptatem enim. Recusandae explicabo ipsam molestiae. Sed cum nam sit aut id cupiditate. Dolorum ipsa facilis facilis fugit quia.', 11, '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(3, 'Reiciendis et amet maiores quia doloremque velit et.', 'Cum nisi assumenda et quaerat quae possimus. Et exercitationem adipisci explicabo amet. Esse iste architecto mollitia fugiat qui ut sequi. Maxime in facere mollitia quae rerum molestiae sed.', 15, '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(4, 'Non ut rerum velit voluptas.', 'Dignissimos quasi assumenda modi sunt. Quam dolorem nulla optio quod ab qui voluptate. Qui perferendis fugit ipsa provident placeat. Et sit qui nemo necessitatibus quas ipsam reiciendis nihil.', 6, '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(5, 'Eligendi itaque illo voluptatum dolor.', 'Laudantium rem aperiam aut. Nihil eum amet quae assumenda tempore voluptates dolorem autem. Quaerat quia vitae ratione omnis exercitationem. Velit consequatur officiis eveniet iste voluptas adipisci.', 16, '2020-08-04 19:57:45', '2020-08-04 19:57:45'),
(6, 'Omnis temporibus atque ex nulla porro.', 'Expedita similique sunt nobis voluptatum excepturi blanditiis. Quis eius doloremque molestias est. Modi ut ullam illo veniam sapiente eaque.', 16, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(7, 'Nisi placeat asperiores a laborum sunt illum est.', 'Ut reprehenderit qui provident alias nihil. Voluptates qui quia similique et sit ut. Occaecati corrupti et voluptatem quasi adipisci est. Sed iste at omnis nihil mollitia quia ad.', 19, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(8, 'Illum rem in ut et possimus.', 'Ipsam assumenda quod accusamus. Vitae consequuntur ducimus perspiciatis vel dolorem impedit impedit. Similique est est nemo molestias consequuntur modi.', 6, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(9, 'Quis fugit nostrum molestiae fugiat ipsum reprehenderit velit porro.', 'Ipsa dolor quam in. Commodi numquam omnis rerum expedita laudantium aliquam ea. Fugiat cumque similique veritatis vel blanditiis. Magnam rerum vel unde autem.', 13, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(10, 'Adipisci alias ut reprehenderit.', 'Dolore est consequatur temporibus quo. Laudantium inventore dignissimos quasi quis. Iure iste voluptatem est quaerat in dolores. Impedit non rerum incidunt molestias nobis eos.', 15, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(11, 'Voluptas ea distinctio sed rerum id.', 'Eos et delectus labore autem sint molestiae. Autem qui tempore sunt quis explicabo.', 5, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(12, 'Nostrum et sunt et culpa.', 'Ratione aut asperiores suscipit similique sunt sint. Ut aut labore provident consequuntur qui exercitationem.', 11, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(13, 'Iure eligendi amet nostrum nesciunt.', 'Voluptatem illum totam ullam ut. Voluptates nisi voluptas unde maxime in deserunt. Ab laboriosam sapiente perspiciatis reiciendis ex consequatur. Recusandae corporis minus architecto enim accusantium non maiores.', 17, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(14, 'Nesciunt accusantium inventore voluptatum qui.', 'Beatae voluptatem similique ex veniam. Aut qui inventore officiis ipsum. Nostrum et reprehenderit occaecati sapiente dolorem harum. Libero aut recusandae sed deleniti dolores.', 2, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(15, 'Et provident facere id ut qui esse.', 'Aliquam nostrum error aut ab qui qui. Inventore architecto aut qui sed quasi nam. Rerum aspernatur quas doloremque eos at eos.', 18, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(16, 'Natus cupiditate quas eum et sint et quaerat.', 'Autem laborum sequi magnam sunt. Sed nesciunt incidunt unde nihil mollitia asperiores maiores velit. Modi exercitationem unde inventore animi sed. Corrupti magni repellat provident quod nulla.', 16, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(17, 'Dolorem esse voluptatem et natus harum.', 'Dolor unde et in sequi dolor nesciunt consectetur officia. Laudantium hic dicta asperiores quidem veniam culpa et. Et sint et in. Voluptas doloremque corrupti quo.', 6, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(18, 'Expedita quo eum ipsam veritatis voluptatem qui.', 'Voluptatibus voluptates corrupti quasi. Aut totam fugit qui amet dicta saepe nihil.', 4, '2020-08-04 19:57:46', '2020-08-04 19:57:46'),
(19, 'Amet iste numquam quisquam nesciunt hic qui cum.', 'Consequatur harum aut est aperiam. Aut accusamus aut repellendus ut et. Ipsum sit occaecati voluptatibus et assumenda quos nobis. Quasi voluptate quas qui ut neque quidem quia ratione.', 9, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(20, 'Expedita dignissimos consequatur dolores odio quos hic.', 'Libero et natus dolorum facilis quia aut. Aut ratione et a iste iste ut. Maiores quam possimus eaque et. Nihil perspiciatis quibusdam provident eveniet.', 16, '2020-08-04 19:57:47', '2020-08-04 19:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `prefers`
--

CREATE TABLE `prefers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_users`
--

CREATE TABLE `p_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fields_follow` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_users`
--

INSERT INTO `p_users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `avatar`, `phone`, `skills`, `fields_follow`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Makenzie', 'Stark', 'gianni.denesik@example.com', '2020-08-04 19:57:39', '$2y$10$yeXeJ9WdkJqlK1AfueNMEOBLWaBk5xkuKCA4GIu9HewsdPAu8jnN6', 'https://lorempixel.com/640/480/?27700', '842-266-6900', 'Sint et culpa nulla nihil ducimus vero et.', 'Harum magnam nesciunt non et neque.', 'V8XSppt09P', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(2, 'Quinn', 'Hagenes', 'rosemarie.waters@example.org', '2020-08-04 19:57:39', '$2y$10$hodJcCeTuo08DtCN7ctk8uezJ1jOfI.NQ3VzB5.sBdf2g5HFMFTwi', 'https://lorempixel.com/640/480/?31259', '830.360.1451 x79413', 'Rem ut aut ipsam vel dolor ratione.', 'Aut culpa hic debitis dolorum.', '4m9orHZrTm', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(3, 'Steve', 'Klein', 'mbernier@example.net', '2020-08-04 19:57:39', '$2y$10$BYPBWPvveZct/RVXuzOI4OpM.MH2gjN44LhISdvlUNvZzFANqSpDe', 'https://lorempixel.com/640/480/?85967', '559.673.1461', 'Reiciendis ea et enim recusandae numquam.', 'Ullam impedit deserunt itaque omnis magni error.', 'vOQnH5IF9Q', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(4, 'Anne', 'DuBuque', 'tianna92@example.net', '2020-08-04 19:57:39', '$2y$10$tIrAVoXztIMzXGOFmB.lVOSe2BgaZvDTPvsLBVLXsT8c2AO8q7H7K', 'https://lorempixel.com/640/480/?50150', '+1.779.282.4616', 'Nesciunt est quo et voluptatem et et.', 'Voluptas suscipit ratione placeat iste adipisci tempore.', 'f1cuzFB1Z0', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(5, 'Leanna', 'Farrell', 'modesta.kemmer@example.net', '2020-08-04 19:57:39', '$2y$10$NCuOyQmvsNjJyPkevQMrqeng9pAOKqZlODHO3PiTpoqUGCYlr23ve', 'https://lorempixel.com/640/480/?38641', '1-354-994-4027', 'Quisquam tenetur rem sint beatae natus blanditiis atque provident.', 'Non dignissimos illo quia et.', '9tBc1aN1PG', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(6, 'Carolyne', 'Jaskolski', 'bartoletti.dulce@example.net', '2020-08-04 19:57:39', '$2y$10$QKQ8VW6ifVQDGeDYAO6DSuFKx6DJn7/NaLP2RZCLifAS.Y..MU1sm', 'https://lorempixel.com/640/480/?67241', '847.647.1335', 'Dolores minima et provident fugit quia.', 'Ab voluptas possimus perferendis.', 'ct2pV0c7Pj', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(7, 'Lydia', 'Grimes', 'padberg.max@example.org', '2020-08-04 19:57:40', '$2y$10$.CShsQnx7VOG9ZifmZh8T.cF4L01dUBjqtkz2YUXdfr2/ibAz75r6', 'https://lorempixel.com/640/480/?21922', '(541) 519-0075 x674', 'Libero rem exercitationem consequatur atque.', 'Dolorem optio aliquid quo fuga dignissimos earum et.', 'go681BZmU5', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(8, 'Logan', 'Abbott', 'walter.adriel@example.net', '2020-08-04 19:57:40', '$2y$10$aUfCG5AbVUfzTU6s17tHlenMeqypwNnbOuS8zsTxMFSb9tA/n1b9O', 'https://lorempixel.com/640/480/?78220', '+14872656770', 'Officiis facere ducimus doloremque quia illum.', 'Tempore rerum iusto magnam qui quos eos.', 'FWwcuV0VRj', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(9, 'Green', 'Becker', 'ischowalter@example.com', '2020-08-04 19:57:40', '$2y$10$RmWWmmSaO5OchTC1AaA7HeZkhWbe8.yZRkNcN.vE7yv5uwHtyAj5e', 'https://lorempixel.com/640/480/?21322', '(396) 465-5536 x405', 'Est tenetur vitae voluptate ipsum.', 'Consequatur esse consequuntur labore quo distinctio dolorem quidem.', 'K47O5h4yHz', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(10, 'Pablo', 'Pagac', 'soreilly@example.org', '2020-08-04 19:57:40', '$2y$10$ER4NbkBgBDaK1fsVbwl7YedBh1QLlPKjKv5t8FBQ5YvOzBvLKmXj2', 'https://lorempixel.com/640/480/?23556', '1-621-253-7830 x198', 'Repudiandae et explicabo dolore molestiae perspiciatis est.', 'Maiores inventore reprehenderit ipsa.', 'Xjnxmlx4Fg', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(11, 'Juwan', 'Fadel', 'cormier.kayla@example.net', '2020-08-04 19:57:40', '$2y$10$lNxle5uYz7ITVF2vDMM2DeqDiSTyS6NJ72olBDT2ZjFUu7VgdyJUq', 'https://lorempixel.com/640/480/?43670', '459-732-6080', 'Non laboriosam eius quaerat dolor.', 'Laborum iusto in adipisci voluptas molestiae quibusdam.', 'nfcyTaiVv3', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(12, 'Kirsten', 'Shields', 'kamren.jones@example.org', '2020-08-04 19:57:40', '$2y$10$.vyzGTX44cWXxta/cS.ABuXEwVHo81Q9p3cQ8GX8YTWk0O85vm0X.', 'https://lorempixel.com/640/480/?21515', '709.989.3300', 'Quas consequatur et vel.', 'Aperiam laborum itaque et ducimus.', 'dsix902t2u', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(13, 'Ada', 'Mertz', 'erich.feeney@example.net', '2020-08-04 19:57:40', '$2y$10$TbHxMML3anBQIlKSzAqE1ulcanHbobiqSrGPtsw3wNUyEyri1DU5G', 'https://lorempixel.com/640/480/?86205', '636-560-8183 x21886', 'Illum soluta fugit necessitatibus.', 'Est dignissimos alias est tempora cumque reiciendis deserunt.', 'ovlOZPXTjX', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(14, 'Angie', 'White', 'kcarroll@example.org', '2020-08-04 19:57:40', '$2y$10$yVsooMbtbA78vxlKiza1NOesse1GSYL3g8GTwVv/QdLnIyjLB0Oy6', 'https://lorempixel.com/640/480/?42228', '604-866-7457', 'Officia dicta laboriosam sed magnam deleniti.', 'Ut iusto autem cumque ratione.', 'rk7hhujxp8', '2020-08-04 19:57:41', '2020-08-04 19:57:41'),
(15, 'Christine', 'Cormier', 'rmills@example.com', '2020-08-04 19:57:40', '$2y$10$l/tDt/P63QDGXVKi47LbnO4J53hSJhRnDHE.H3DLUXs9smInaokDS', 'https://lorempixel.com/640/480/?34689', '1-578-973-0143 x28979', 'Deserunt tempora et et blanditiis soluta voluptatem id possimus.', 'Omnis velit nostrum dolores saepe laudantium.', 'P9Os89BWSx', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(16, 'Aubrey', 'Nienow', 'rigoberto73@example.com', '2020-08-04 19:57:40', '$2y$10$K7T95oqaNn4DgdFdEJIiO.bARAegxv/qyStLLm83tokwaWwIDYACy', 'https://lorempixel.com/640/480/?37420', '927-835-6909 x3403', 'Qui voluptatem perferendis ea est autem.', 'Rerum voluptate in voluptas beatae.', 'fNJdcpeuKv', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(17, 'Dillon', 'Harris', 'mmayert@example.org', '2020-08-04 19:57:41', '$2y$10$iyE7UxudAGwahSrogEh05uOcogKQKuzXqIgIDJ0X/k6WTt3rjePsq', 'https://lorempixel.com/640/480/?95230', '268-510-6993', 'Molestiae enim possimus laudantium omnis perspiciatis amet.', 'Ab sit asperiores voluptates qui.', 'TCdM7r4w5Y', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(18, 'Maximillia', 'Schulist', 'kub.remington@example.net', '2020-08-04 19:57:41', '$2y$10$JetNiSvtcc750MuyCSO9Mu.CCYZuCI9qJ1wbdEv.1/sJL/isszsFm', 'https://lorempixel.com/640/480/?15207', '1-539-235-4446 x982', 'Aut nemo illo earum sapiente.', 'Sunt incidunt velit et omnis dolores.', 'guHSBp3dxS', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(19, 'Sadye', 'Kuhn', 'weissnat.brandy@example.net', '2020-08-04 19:57:41', '$2y$10$TlEBEH8RWV53IQVG3D7EWe7cJ8bVxYNP6qwo6vdFNzTXmIZRxiY3O', 'https://lorempixel.com/640/480/?53957', '1-968-522-1189', 'Iure distinctio aut est ut.', 'Inventore velit ut illo.', 'KKTnvdYt7t', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(20, 'Timmy', 'Boyle', 'okon.carlo@example.net', '2020-08-04 19:57:41', '$2y$10$GzCylA.i26R8FjPWGx/ISe5K.92OcG7gpww6iKeqGCFXz2nNKnePu', 'https://lorempixel.com/640/480/?76126', '1-851-642-0822', 'Voluptates inventore consequatur autem nulla.', 'Et deserunt repudiandae iste sint veritatis illo cum optio.', 'mLVRcCBhni', '2020-08-04 19:57:42', '2020-08-04 19:57:42'),
(21, 'ayman', 'elkassas', 'aymanelkassas@gmail.com', NULL, 'admin123', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `file_name`, `file_path`, `field_name`, `size`, `user_id`, `field_id`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Margie Von Sr.', 'https://lorempixel.com/640/480/?76459', 'Ms. Keely Dickens', 50, 8, 8, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(2, 'Janie Connelly', 'https://lorempixel.com/640/480/?18678', 'Shayna Sauer', 92, 1, 15, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(3, 'Judy Jaskolski', 'https://lorempixel.com/640/480/?76602', 'Prof. Kylie Adams II', 12, 9, 4, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(4, 'Mrs. Verda Feeney DDS', 'https://lorempixel.com/640/480/?30088', 'Delia Gleichner', 12, 8, 2, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(5, 'Dr. Bernard Hane PhD', 'https://lorempixel.com/640/480/?70420', 'Ebba Stamm', 10, 17, 14, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(6, 'Royce Lesch DDS', 'https://lorempixel.com/640/480/?95494', 'Alysson Mills', 50, 2, 19, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(7, 'Ola Christiansen', 'https://lorempixel.com/640/480/?80019', 'Yvette Tromp', 84, 8, 1, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(8, 'Belle Borer', 'https://lorempixel.com/640/480/?91039', 'Evelyn Schamberger', 58, 11, 8, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(9, 'Ila Dare', 'https://lorempixel.com/640/480/?52925', 'Prof. Nya Schowalter', 92, 6, 9, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(10, 'Donny Leffler', 'https://lorempixel.com/640/480/?56123', 'Melisa Kerluke', 90, 8, 19, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(11, 'Jarret Schroeder', 'https://lorempixel.com/640/480/?50321', 'Miss Aisha Wilkinson', 81, 7, 20, '2020-08-04 19:57:47', '2020-08-04 19:57:47'),
(12, 'Mr. Kurtis Sipes IV', 'https://lorempixel.com/640/480/?27679', 'Carlos Funk', 83, 17, 1, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(13, 'Kyler Reinger', 'https://lorempixel.com/640/480/?70861', 'Miss Katelyn Ernser', 92, 8, 7, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(14, 'Kole Quitzon', 'https://lorempixel.com/640/480/?62023', 'Mr. Johann Grimes', 22, 18, 18, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(15, 'Dorian Herzog', 'https://lorempixel.com/640/480/?85519', 'Mr. Gordon O\'Reilly DVM', 25, 17, 20, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(16, 'Dr. Alf Mueller I', 'https://lorempixel.com/640/480/?37663', 'Prof. Kimberly Conn', 91, 8, 2, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(17, 'Dr. Ilene Mosciski', 'https://lorempixel.com/640/480/?34342', 'Pearl Erdman III', 23, 5, 9, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(18, 'Dayne Tromp', 'https://lorempixel.com/640/480/?52840', 'Greyson Aufderhar DDS', 95, 6, 13, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(19, 'Joey Williamson', 'https://lorempixel.com/640/480/?99850', 'Amaya Ruecker', 94, 18, 20, '2020-08-04 19:57:48', '2020-08-04 19:57:48'),
(20, 'Sarah Quigley', 'https://lorempixel.com/640/480/?67666', 'Ayana Greenfelder', 91, 11, 18, '2020-08-04 19:57:48', '2020-08-04 19:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_courses`
--

CREATE TABLE `subscribe_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nils Littel', 'qwolff@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'bYYa6SoL0L', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(2, 'Rebecca Wolf', 'gutkowski.freddie@example.org', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'C988alr7s4', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(3, 'Prof. Simeon Mosciski', 'yheidenreich@example.org', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'A1zUyMTK7e', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(4, 'Stefan Shanahan', 'maci.cummerata@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'uQYBsC6oHo', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(5, 'Chelsie Klein', 'felix.gulgowski@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '41uYDZ878d', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(6, 'Kylie Armstrong', 'lorna.parisian@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'P9XojqvkeN', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(7, 'Lesley Harris DVM', 'jwolf@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'XRCQtrXA8b', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(8, 'Jaquelin Lehner Jr.', 'stanton.wiley@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '62mOxA9muP', '2020-08-04 19:57:37', '2020-08-04 19:57:37'),
(9, 'Burnice Anderson', 'dean.little@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'smRQdLLT0L', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(10, 'Mr. Payton Feeney IV', 'zetta.dietrich@example.org', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'sQneZZZIQs', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(11, 'Prof. Khalil Bayer', 'vilma52@example.org', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'EiMEmhWgqm', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(12, 'Gertrude Considine', 'schumm.boyd@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'TvkpX2CiV8', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(13, 'Prof. Nick Herzog I', 'serenity65@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'eiX28J3NKN', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(14, 'Ruben Sipes', 'triston75@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '8PNR5vMWxM', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(15, 'Carolanne Little', 'easton.will@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'KavTx0dNsC', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(16, 'Andy McKenzie', 'wberge@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'GQAgOG5oXk', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(17, 'Dylan Grant MD', 'chelsey.stoltenberg@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'cPDhTbIBmE', '2020-08-04 19:57:38', '2020-08-04 19:57:38'),
(18, 'Prof. Mortimer Crist Jr.', 'tyshawn58@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'AjAxfWXekA', '2020-08-04 19:57:39', '2020-08-04 19:57:39'),
(19, 'Andy Labadie', 'dina.ruecker@example.net', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '6LtZt2V84x', '2020-08-04 19:57:39', '2020-08-04 19:57:39'),
(20, 'Celine Ullrich', 'cormier.jazmin@example.com', '2020-08-04 19:57:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'NWNl9A8Pic', '2020-08-04 19:57:39', '2020-08-04 19:57:39'),
(21, 'Admin', 'admin@admin.com', NULL, '$2y$10$/G6c0K8nhxTdMFWIqI1Ru.fLCXWjiJMyjx6gjNoorALeNZVEwx3KO', NULL, 'jOaMJ7ZejKgrY1Tu98jMwKSedWtNANpvnARjjPLJOZGzYWJaGMO3HnvPzeby', '2020-08-04 20:14:24', '2020-08-04 20:14:24'),
(22, 'SuperUser', 'superuser@gmail.com', NULL, '$2y$10$c9i4y7qxY6T5Zv0g1imBuOKfEb9qtC8mm0VB8l.EdxHT2fNCcFIh2', NULL, NULL, '2020-08-28 10:12:44', '2020-08-28 10:12:44'),
(23, 'Ayman', 'user@user.com', NULL, '$2y$10$PrL3sDVObKQjsn6Z2p77R.WXgsWJcx54p3fIv8o7kHJdvccSPjE.q', NULL, NULL, '2020-08-28 10:22:32', '2020-08-28 10:22:32'),
(24, 'Ali', 'ali@ali.com', NULL, '$2y$10$biyJzQ2oH1a6Z0te7SLCzesI0kYVLeuBUkIpI3zuw1GdFu0Bl2vzi', NULL, NULL, '2020-08-28 10:25:39', '2020-08-28 10:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `prefers`
--
ALTER TABLE `prefers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prefers_user_id_foreign` (`user_id`),
  ADD KEY `prefers_field_id_foreign` (`field_id`);

--
-- Indexes for table `p_users`
--
ALTER TABLE `p_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_users_email_unique` (`email`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_user_id_foreign` (`user_id`),
  ADD KEY `resources_field_id_foreign` (`field_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_post_id_foreign` (`post_id`);

--
-- Indexes for table `subscribe_courses`
--
ALTER TABLE `subscribe_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribe_courses_user_id_foreign` (`user_id`),
  ADD KEY `subscribe_courses_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `prefers`
--
ALTER TABLE `prefers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_users`
--
ALTER TABLE `p_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe_courses`
--
ALTER TABLE `subscribe_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `p_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `p_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prefers`
--
ALTER TABLE `prefers`
  ADD CONSTRAINT `prefers_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prefers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `p_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `p_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribe_courses`
--
ALTER TABLE `subscribe_courses`
  ADD CONSTRAINT `subscribe_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribe_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `p_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
