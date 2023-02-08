-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2023 pada 20.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_picture_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'awik',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`account_id`, `role_id`, `gender_id`, `first_name`, `last_name`, `email`, `display_picture_link`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 'Admin', 'Admin', 'muhammadrafif3225@gmail.com', 'account-images/cMviwUF7QJfKZaQPuqBBeUMlZ0gFNMzWnzFLuq3k.jpg', '$2y$10$wRSWrnWYDPOabz6PnBAiuOA1L3bbf3qwF.PmhEiqwWRdP6bcqrxhO', NULL, '2023-02-08 11:31:32', '2023-02-08 11:31:32', NULL),
(4, 1, 1, 'Muhammad', 'Rafif', 'muhammadrafif3225@gmail.com', 'account-images/U7s5CsyjChhwWvspYnmvyRtv16WrsIyOWhFzErwm.jpg', '$2y$10$tTkR2Uk8fkXmo/yd10b50uNezjnTLob/LfOQ03QxWBgF3dtDOjiDq', NULL, '2023-02-08 12:19:43', '2023-02-08 12:26:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gender`
--

CREATE TABLE `gender` (
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `gender_desc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_desc`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image_link',
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `image_link`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Apel', '<div>Apel dapat dikalengkan atau dibuat jus. Buah apel digiling untuk memproduksi sider (non-alkohol dan manis), dan disaring untuk dibuat jus. Apel juga difermentasi untuk menghasilkan sider (alkoholik dan keras), siderkin, dan cuka. Melalui distilasi, berbagai minuman beralkohol dapat dibuat, seperti applejack, Calvados, dan wine apel. Pektin dan minyak biji apel juga dapat dibuat.</div>', 'item-images/lVQUp0Bv9vOVA0OW1K69ZmQIb0SeRjeUo7eKqKDt.jpg', 1100, '2023-02-08 11:28:44', '2023-02-08 12:20:49'),
(2, 'Jeruk', '<div>Dengan mengkonsumsi jeruk secara rutin bisa membuat kesehatan jantung terjaga. Tidak hanya itu, kandungan d-limonene dan polymethoxylated flavones (PMFs) bisa mengaktifkan detoksifikasi di dalam liver yang dapat menurunkan kadar kolesterol jahat dan menjaga kadar gula darah.</div>', 'item-images/4leFcV3rzZgPwJoOFzim1U3mKtQkZao7y3jdjMrc.webp', 1400, '2023-02-08 11:28:44', '2023-02-08 12:20:58'),
(3, 'Mangga', '<div>Mangga kaya antioksidan.Mangga juga memiliki berbagai manfaat bagi tubuh salah satunya yaitu dapat mencegah penyakit kanker, menjaga kekebalan tubuh , menjaga kesehatan mata,meningkatkan kekebalan tubuh, dan menjaga kesehatan kulit dan rambut. Buah mangga pada dasarnya merupakan golongan buah rendah kalori.&nbsp;</div>', 'item-images/9kpCMuBpwCS1YFANpx8cvd7a2vndS65PdAcDzPSJ.jpg', 1200, '2023-02-08 11:28:44', '2023-02-08 12:21:08'),
(4, 'Kol', '<div>Kembang kol merupakan sumber vitamin dan mineral dan lazimnya dimakan dengan dimasak terlebih dahulu, meskipun dapat pula dimakan mentah maupun dijadikan acar.</div>', 'item-images/V0kJkuGPSXkT7HZlIl3WxXJkkyi05DER1QuDJtFG.jpg', 1100, '2023-02-08 11:28:44', '2023-02-08 12:21:22'),
(5, 'Mentimun', '<div>Mentimun memiliki sifat diuretik, efek pendingin, dan pembersih yang bermanfaat bagi kulit. Kandungan air yang tinggi; vitamin A, B, dan C; serta mineral, seperti magnesium, kalium, mangan, dan silika; membuat mentimun menjadi bagian penting dalam perawatan kulit.</div>', 'item-images/PPyXrZGMSE5V4GlInVl9LljYd8JDzlxviEl32AWB.jpg', 1500, '2023-02-08 11:28:44', '2023-02-08 12:21:39'),
(6, 'Broccoli', '<div>Brokoli mengandung vitamin C dan serat makanan dalam jumlah banyak. Brokoli juga mengandung senyawa glukorafanin, yang merupakan bentuk alami senyawa antikanker sulforafana (sulforaphane).</div>', 'item-images/Gm2fo37XtnzglvxUo014FLt6hIHYsjioIrD6s0e6.jpg', 1200, '2023-02-08 11:28:44', '2023-02-08 12:21:49'),
(7, 'Kentang', '<div>Kentang dikenali orang sebagai makanan pokok di luar negeri. Ini karena kentang mengandung karbohidrat. Di Indonesia sendiri, kentang masih dianggap sebagai sayuran yang mewah.</div>', 'item-images/sXwXNSAD472OxExvAHhrGmDihO2bsHcNLOPWrfW9.jpg', 1400, '2023-02-08 11:28:44', '2023-02-08 12:22:00'),
(8, 'Tomat', '<div>omat mengandung antioksidan berupa likopen yang dapat membantu memerangi efek radikal bebas penyebab kanker. Tomat juga memiliki kandungan antioksidan lain yakni polifenol, naringenin, dan chlorogenic acid. Di samping itu, ternyata buah tomat rendah kalori dan lemak, tetapi kaya akan karotenoid, lutein, gula, vitamin A, vitamin C, folat, dan kalium.</div>', 'item-images/DWQDqdjQpzMWur8rvyn9Zdvc6a6ylbnXj3axc8S7.jpg', 1000, '2023-02-08 11:28:44', '2023-02-08 12:22:10'),
(9, 'Belimbing', '<div>Belimbing atau Averrhoa carambola adalah <strong>buah yang populer di iklim tropis</strong>. Buah ini dikenal dengan rasa asam-manisnya yang khas dan menyegarkan. Tak hanya itu, belimbing bahkan merupakan salah satu buah yang sering digunakan sebagai pengobatan ayurveda di India, Cina, dan Brazil.</div>', 'item-images/cdicuZIOrMFrbijL2tEm0qLmshs7bXarvPnRMnyb.jpg', 1500, '2023-02-08 11:28:44', '2023-02-08 12:22:17'),
(10, 'Kale', '<div>Tanaman Kale (Brassica oleracea var. Acephala) merupakan <strong>jenis sayur kelas dunia yang mengandung nilai nutrisi tinggi</strong>. Kale berasal dari golongan Brassica, layaknya kubis, brokoli, dan kailan. Kata kale sendiri berasal dari bahasa Belanda yang artinya kubis petani.</div>', 'item-images/LvKO0Wz3vY2dRi548uVn3ss4gfvZXdmWLKSILw5J.jpg', 1500, '2023-02-08 11:28:44', '2023-02-08 12:23:15'),
(11, 'Lidah Buaya', '<div><strong>Lidah buaya</strong> (<strong>Aloe vera</strong> L.) adalah tumbuhan asli yang berasal dari Afrika, dengan ciri daun berwarna hijau memiliki daging yang tebal, terdapat duri pada dua sisinya, daunnya panjang dan lebar di bagian bawah dan mengecil pada bagian puncaknya, daging daun <strong>lidah buaya</strong> (<strong>Aloe vera</strong> L.) berlendir.</div>', 'item-images/yqA0OQvjAZH9mvrPwumSiKISeEMhJKjWyBNGu5cU.jpg', 1500, '2023-02-08 11:28:44', '2023-02-08 12:22:30'),
(12, 'Alpukat', '<div>&nbsp;Alpukat merupakan <strong>jenis buah yang memiliki kandungan lemak tinggi, sekitar 20 kali lebih tinggi dibanding buah-buahan lain</strong>. Nama latin tanaman alpukat adalah Persea americana, diyakini berasal dari Amerika Tengah.</div>', 'item-images/VmXESQAvs7y4MGILCYOAVLZFX7NYCymgRKL82KEt.jpg', 1400, '2023-02-08 11:28:44', '2023-02-08 12:22:44'),
(13, 'Sawi', '<div>Sawi adalah <strong>tumbuhan dari marga Brassica yang dimanfaatkan daunnya sebagai bahan pangan (sayuran), baik segar ataupun diolah</strong>. Sawi bukan tanaman asli Indonesia, menurut asalnya di Asia, karena Indonesia mempunyai kecocokan terhadap iklim, cuaca dan tanahnya sehingga bisa dikembangkan di Indonesia.</div>', 'item-images/YjruOxWBvIAYYCoQ2mHU93lXiznFSXEPtYIAqvxk.png', 1100, '2023-02-08 11:28:44', '2023-02-08 12:22:57'),
(14, 'Cabai Rawit', '<div>Cabai rawit (Capsicum frutescens) adalah <strong>buah dan tumbuhan anggota genus Capsicum yang buahnya tumbuh menjulang menghadap ke atas</strong> (ngathur, Jw.). Warna buahnya hijau kecil sewaktu muda dan jika telah masak berwarna merah tua. Bila ditekan buahnya terasa keras karena jumlah bijinya sangat banyak.</div>', 'item-images/Qkj4HQ7EC5psCHvLpP579PB9jNCJkru16icvjSq3.jpg', 1200, '2023-02-08 11:28:44', '2023-02-08 12:23:32'),
(15, 'Durian', '<div>Durian merupakan <strong>tanaman buah berupa pohon</strong>. Sebutan durian diduga berasal dari istilah Melayu yaitu dari kata duri yang diberi akhiran -an sehingga menjadi durian. Kata ini terutama dipergunakan untuk menyebut buah yang kulitnya berduri tajam.</div>', 'item-images/qKuzDQ9Oyq8qEvkQHUHO6LVb4zzNYOX0AoMVGO9P.webp', 1200, '2023-02-08 11:28:44', '2023-02-08 12:23:41'),
(16, 'Wortel', '<div><strong>Ini&nbsp;</strong><strong><em>Wortel&nbsp;</em></strong><em>Oren</em></div>', 'item-images/2XlUTWufdBi7fFVV2EdUajF2uqszCoTOcybIfjww.jpg', 2000, '2023-02-08 12:27:00', '2023-02-08 12:27:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_order`
--

CREATE TABLE `item_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_order`
--

INSERT INTO `item_order` (`id`, `item_id`, `account_id`, `order_id`, `quantity`, `paid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 3, 0, NULL, NULL),
(2, 1, 1, NULL, 5, 0, NULL, NULL),
(3, 7, 1, NULL, 6, 0, NULL, NULL),
(5, 8, 5, 1, 5, 1, '2023-02-08 12:24:41', '2023-02-08 12:25:18'),
(6, 2, 5, 1, 3, 1, '2023-02-08 12:25:13', '2023-02-08 12:25:18'),
(7, 16, 6, 2, 4, 1, '2023-02-08 12:28:48', '2023-02-08 12:28:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_02_03_084124_create_roles_table', 1),
(5, '2023_02_03_084141_create_genders_table', 1),
(6, '2023_02_03_084309_create_orders_table', 1),
(7, '2023_02_03_084320_create_items_table', 1),
(8, '2023_02_03_084430_create_accounts_table', 1),
(9, '2023_02_05_224436_item_order', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `account_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 5, 9200, '2023-02-08 12:25:18', '2023-02-08 12:25:18'),
(2, 6, 8000, '2023-02-08 12:28:56', '2023-02-08 12:28:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `account_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
