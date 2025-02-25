-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2025 pada 04.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`admin_id`, `nama`, `email`, `password`) VALUES
(1, 'Admin 1', 'admin1@gmail.com', '$2y$10$Ek.VK2E9e5iwDsyuz4S4medk1Ku8tpHaCiwa3eOURI5f03DdlzkKm'),
(9, 'Ilham Perkasa', 'ifanani63@gmail.com', '$2y$10$IoE73NJ3Z0rdjMSH3cERCuK/LM6mLy6NW8tAdaV3ncUS6i6hqOKz.'),
(10, 'iam', 'iam@gmail.com', '$2y$10$onX64YE3WhYsbl8zeF.Pn.filbEwOFs9zfLCYmaEu4QA/CRqd87M6'),
(11, 'Muhammad Ilham Fanani', 'test1@gmail.com', '$2y$10$bA3VrvzqP7J.pOgQ81tSyOe5oe.pG8AIqMmYYxDZrl3iRyOrPJebq'),
(13, 'DKV', 'test3@gmail.com', '$2y$10$0pkex4zdh/9MwMFoadp0Muzp2n3wtIFQsbqm1xK55qDoCcvl1eUOu'),
(14, 'iam', 'admin2@gmail.com', '$2y$10$XaLwccBOUq0Dec95NhNQHuyXyyIBWDocuM9.m6OrdXSZlNmY1GPzu'),
(17, 'john', 'test2@gmail.com', '$2y$10$MD/zbbgDFMw04I1NoTUDTuGV0b.xth8h7PiMnHToNWNTplXbU3QDy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `title`, `subtitle`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pengelolaan Sampah Berbasis Inovasi', 'Menggali Solusi Kreatif dan Teknologi Terbaru dalam Mengurangi Dampak Negatif Sampah ', 'Pengantar\r\n\r\nSampah telah menjadi salah satu masalah lingkungan yang mendesak di seluruh dunia. Dampak negatifnya terhadap lingkungan semakin meningkat seiring dengan pertumbuhan populasi dan gaya hidup modern. Namun, dengan perpaduan inovasi, kreativitas, dan teknologi terbaru, upaya untuk mengurangi dan mengelola sampah telah menjadi fokus utama. Artikel ini akan membahas bagaimana inovasi dan teknologi membantu mengatasi dampak negatif sampah terhadap lingkungan.\r\n\r\nTantangan Lingkungan dari Sampah\r\n\r\nSampah yang berlebihan, terutama plastik, limbah elektronik, dan sampah organik, telah menjadi sumber kontaminasi lingkungan dan berkontribusi pada berbagai masalah seperti polusi udara, air, dan tanah. Tidak hanya itu, sampah juga mengancam keanekaragaman hayati dan keseimbangan ekosistem.\r\n\r\nPendekatan Inovatif dalam Pengelolaan Sampah\r\n\r\nMelalui inovasi dan kreativitas, banyak solusi baru telah ditemukan untuk mengelola sampah. Pengurangan penggunaan plastik sekali pakai, daur ulang yang lebih efektif, teknologi pengolahan limbah, dan pendekatan ramah lingkungan dalam desain produk telah menjadi fokus utama dalam upaya untuk mengurangi dampak negatif sampah.\r\n\r\nPeran Teknologi dalam Mengatasi Masalah Sampah\r\n\r\nTeknologi memainkan peran penting dalam menghadapi masalah sampah. Aplikasi dan platform daring membantu dalam mendidik masyarakat tentang pengelolaan sampah yang lebih baik. Selain itu, inovasi dalam pengolahan sampah, seperti metode daur ulang yang lebih efisien dan teknologi konversi sampah menjadi energi, menjadi solusi yang menjanjikan.\r\n\r\nKolaborasi antara Sektor Publik dan Swasta\r\n\r\nKolaborasi antara pemerintah, sektor swasta, dan masyarakat menjadi kunci dalam menghadapi tantangan pengelolaan sampah. Dukungan dari pemerintah dalam kebijakan yang mendukung daur ulang dan pengelolaan sampah yang bertanggung jawab menjadi landasan penting bagi kesuksesan upaya ini.\r\n\r\nKesimpulan: Mendukung Inovasi dan Teknologi untuk Lingkungan yang Bersih\r\n\r\nPengelolaan sampah yang berbasis inovasi dan teknologi memberikan harapan baru dalam upaya untuk mengurangi dampak negatifnya terhadap lingkungan. Dengan mengadopsi solusi kreatif dan teknologi terbaru, kita dapat mengubah paradigma tentang sampah dari menjadi masalah menjadi sumber daya yang berharga.\r\n\r\nPenutup\r\n\r\nPeningkatan kesadaran akan pentingnya pengelolaan sampah yang bertanggung jawab, dukungan terhadap inovasi dan teknologi, serta kolaborasi antara berbagai pihak merupakan langkah penting dalam menghadapi masalah lingkungan yang disebabkan oleh sampah. Dengan terus menggali solusi kreatif dan teknologi terbaru, kita dapat mewujudkan lingkungan yang lebih bersih dan berkelanjutan bagi generasi mendatang.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'upload/berita/image659256941238d.jpg', '2023-12-11 12:40:13', '2023-12-11 12:40:13'),
(2, 'Membangun Masyarakat Peduli Lingkungan', 'Mengintegrasikan Pendidikan Lingkungan dan Kesadaran Masyarakat dalam Upaya Pelestarian Alam', 'Pendahuluan:\r\nPendidikan dan kesadaran masyarakat memainkan peran penting dalam menjaga kelestarian lingkungan. Artikel ini akan membahas bagaimana integrasi antara pendidikan lingkungan dan kesadaran masyarakat menjadi kunci dalam upaya pelestarian alam.\r\n\r\nPendidikan Lingkungan untuk Generasi Mendatang:\r\nPendidikan lingkungan di sekolah menjadi fondasi penting dalam membentuk pemahaman anak-anak tentang pentingnya menjaga alam. Program-program ini tidak hanya mencakup kurikulum tetapi juga kegiatan ekstrakurikuler dan kunjungan lapangan yang mendukung pemahaman konsep-konsep lingkungan.\r\n\r\nPeran Kesadaran Masyarakat:\r\nKesadaran masyarakat sangat diperlukan untuk menciptakan lingkungan yang bersih dan sehat. Melalui kampanye publik, kerjasama antarwarga, serta kegiatan sosial yang melibatkan masyarakat, kita dapat meningkatkan kesadaran akan pentingnya menjaga lingkungan untuk keberlangsungan hidup.\r\n\r\nKolaborasi antara Pemerintah dan Swasta:\r\nKerjasama antara pemerintah, sektor swasta, dan LSM merupakan kunci dalam menggalang dukungan dan sumber daya untuk menciptakan perubahan yang signifikan dalam upaya pelestarian alam. Melalui kebijakan yang pro-lingkungan dan program-program bersama, kita dapat mencapai tujuan bersama dalam menjaga kelestarian alam.\r\n\r\nKesimpulan:\r\nIntegrasi pendidikan lingkungan yang kuat dengan kesadaran masyarakat adalah fondasi yang dibutuhkan dalam membangun masyarakat peduli lingkungan. Dengan memperkuat kerjasama antarinstansi, kita dapat menciptakan perubahan yang positif dalam menjaga alam untuk masa depan yang berkelanjutan.\r\n\r\n', 'upload/berita/image659256a6a2e84.jpg', '2023-12-11 12:40:13', '2023-12-11 12:40:13'),
(3, 'Sampah Plastik: Tantangan Global yang Memerlukan Solusi Lokal', 'Menyadari Dampak Buruk Plastik dan Langkah-Langkah Tanggap Mengatasi Masalah Sampah', 'Pendahuluan:\r\n\r\nSampah plastik telah menjadi masalah yang mendesak di seluruh dunia. Kebiasaan penggunaan plastik sekali pakai dan kurangnya pengelolaan limbah telah mengarah pada krisis lingkungan yang mempengaruhi keberlanjutan bumi kita. Artikel ini akan mengeksplorasi dampak buruk sampah plastik dan langkah-langkah yang dapat diambil untuk menghadapi tantangan ini secara lokal.\r\n\r\nDampak Buruk Sampah Plastik:\r\n\r\nSampah plastik menyumbang pada pencemaran lingkungan, merusak ekosistem, dan mengancam kehidupan satwa liar. Plastik yang mencemari lautan menyebabkan kerusakan pada kehidupan laut dan berkontribusi pada masalah serius seperti \"pulau sampah\" di tengah samudra.\r\n\r\nPengurangan Penggunaan Plastik:\r\n\r\nLangkah pertama yang dapat diambil adalah mengurangi penggunaan plastik sekali pakai. Mengganti kantong plastik dengan tas kain atau menggunakan botol minum yang dapat diisi ulang adalah langkah sederhana namun signifikan yang dapat dilakukan oleh individu untuk mengurangi limbah plastik.\r\n\r\nPendidikan dan Kesadaran Masyarakat:\r\n\r\nPendidikan publik dan peningkatan kesadaran masyarakat menjadi kunci dalam mengatasi masalah sampah plastik. Program edukasi di sekolah, kampanye sosial, dan informasi yang lebih luas mengenai dampak negatif plastik dapat membantu mengubah perilaku konsumen dan memotivasi perubahan positif.\r\n\r\nInisiatif Daur Ulang dan Daur Ulang Kreatif:\r\n\r\nProgram daur ulang plastik yang efektif sangat penting. Selain itu, inisiatif daur ulang kreatif yang mengubah sampah plastik menjadi barang-barang yang berguna atau seni juga bisa menjadi solusi yang menarik untuk mengelola sampah plastik dengan lebih efisien.\r\n\r\nKolaborasi Antara Pemerintah dan Swasta:\r\n\r\nPenting bagi pemerintah untuk menerapkan kebijakan yang mendukung pengelolaan sampah plastik, serta bekerja sama dengan sektor swasta dalam menciptakan solusi yang lebih berkelanjutan. Insentif bagi inisiatif ramah lingkungan dan peraturan yang membatasi penggunaan plastik sekali pakai dapat membawa perubahan yang positif.\r\n\r\nKesimpulan:\r\n\r\nSampah plastik bukan hanya masalah lokal tetapi juga global. Namun, solusi untuk mengatasi masalah ini dimulai dari tindakan lokal. Dengan kombinasi dari kesadaran masyarakat, edukasi, inovasi, dan dukungan pemerintah, kita bisa merangkul perubahan positif dalam mengelola limbah plastik dan menjaga lingkungan agar tetap bersih dan sehat.\r\n\r\nPenutup:\r\n\r\nSetiap langkah kecil yang diambil oleh individu memiliki dampak besar dalam memerangi masalah sampah plastik. Mari kita bersama-sama berkomitmen untuk mengurangi penggunaan plastik sekali pakai dan mengelola sampah plastik dengan lebih bertanggung jawab agar kita bisa memberikan bumi yang lebih baik bagi generasi mendatang.', 'upload/berita/image659256b8a9734.jpg', '2023-12-11 12:40:13', '2023-12-11 12:40:13'),
(9, 'Peran Penting Pengelolaan Sampah dan Daur Ulang', 'Menyadari Dampak Positif untuk Masa Depan yang Lebih Berkelanjutan', 'Pengelolaan sampah dan praktik daur ulang adalah aspek penting dalam upaya melestarikan lingkungan. Ketika kita berbicara tentang edukasi lingkungan, pemahaman akan pentingnya manajemen sampah menjadi landasan yang tak tergantikan. Dalam masyarakat modern ini, kesadaran akan pentingnya pengelolaan sampah dan daur ulang menjadi kunci untuk menciptakan lingkungan yang bersih dan sehat.\r\n\r\nPeran utama pengelolaan sampah adalah mengurangi dampak negatif yang dihasilkan oleh limbah terhadap lingkungan. Dengan pemilahan sampah yang tepat dan pengelolaan yang efisien, kita dapat mengurangi jumlah sampah yang mencemari lingkungan, seperti plastik yang sulit terurai atau bahan kimia berbahaya yang dapat mencemari tanah dan air.\r\n\r\nDaur ulang adalah langkah penting dalam meminimalkan sampah. Proses ini melibatkan penggunaan kembali material bekas untuk menghasilkan produk baru. Dengan melakukan daur ulang, kita mengurangi kebutuhan akan bahan mentah baru, mengurangi polusi yang dihasilkan oleh pembuatan material baru, dan pada gilirannya mengurangi tekanan terhadap lingkungan.\r\n\r\nMelalui pendidikan dan kesadaran akan pentingnya pengelolaan sampah dan daur ulang, kita tidak hanya menciptakan lingkungan yang lebih bersih, tetapi juga membantu mengurangi masalah sampah global. Mengajarkan generasi masa depan tentang praktik yang bertanggung jawab terhadap sampah adalah investasi dalam pembangunan lingkungan yang berkelanjutan.\r\n\r\nPenting untuk diingat bahwa setiap individu memiliki peran dalam upaya ini. Mulai dari penggunaan produk ramah lingkungan hingga partisipasi aktif dalam program pengelolaan sampah komunitas, setiap tindakan kecil dapat memiliki dampak besar dalam menjaga lingkungan kita tetap bersih dan sehat untuk generasi mendatang.', 'upload/berita/image6592567f49e4b.jpg', '2023-12-26 03:39:42', '2023-12-26 03:39:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edukasi`
--

CREATE TABLE `edukasi` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `edukasi`
--

INSERT INTO `edukasi` (`id`, `title`, `subtitle`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gimana sih... Cara mengolah sampah itu?', 'Mengubah Kebiasaan, Mengubah Bumi: Cara Mengolah Sampah untuk Masa Depan yang Berkelanjutan.', '\"Mengubah Kebiasaan, Mengubah Bumi: Cara Mengolah Sampah untuk Masa Depan yang Berkelanjutan\" adalah sebuah program edukasi yang bertujuan untuk memberikan pemahaman yang mendalam tentang pentingnya mengubah kebiasaan sehari-hari dalam mengelola sampah guna menciptakan masa depan yang lebih berkelanjutan bagi planet kita.\r\n\r\nProgram ini akan membimbing peserta untuk memahami dampak negatif dari perilaku konsumsi dan pembuangan sampah yang tidak berkelanjutan terhadap lingkungan. Peserta akan diajak untuk melihat bahwa setiap tindakan individu dalam mengelola sampah memiliki dampak besar bagi keseimbangan ekosistem Bumi.\r\n\r\nSelain itu, program ini akan memberikan wawasan tentang teknik-teknik daur ulang, pengelolaan limbah organik, dan strategi untuk mengurangi produksi sampah secara keseluruhan. Peserta akan diajarkan tentang pentingnya pemilahan sampah, komposisi sampah, dan bagaimana menjalankan praktik-praktik ramah lingkungan dalam kehidupan sehari-hari.\r\n\r\nSelain aspek teknis, program ini juga akan menggali aspek psikologis dan sosial dari perubahan kebiasaan. Peserta akan dipandu untuk memahami hambatan-hambatan dalam mengubah kebiasaan dan bagaimana membangun motivasi serta dukungan yang diperlukan untuk melakukan perubahan tersebut.\r\n\r\nDengan pengetahuan yang diperoleh dari program ini, diharapkan peserta dapat menjadi agen perubahan dalam komunitas mereka masing-masing. Mereka akan memiliki keterampilan dan pemahaman yang diperlukan untuk menginspirasi orang lain dalam mengubah perilaku konsumsi mereka demi melindungi Bumi kita.\r\n\r\nProgram ini bukan hanya sekadar memberikan informasi, tetapi juga menawarkan solusi praktis dan langkah-langkah nyata yang dapat diimplementasikan oleh setiap individu untuk secara aktif berkontribusi dalam mengelola sampah secara bertanggung jawab demi masa depan yang berkelanjutan bagi generasi mendatang.', 'upload/edukasi/image6592556576ea5.jpg', '2023-12-07 14:44:03', '2023-12-07 14:44:52'),
(2, 'Mari Mengelola Sampah Bersama!', 'Langkah-Langkah Sederhana yang Bisa Kita Lakukan untuk Menjaga Bumi Kita', 'Halo, Sahabat Bumi Kecil! Kamu pasti tahu bahwa Bumi kita butuh bantuan kita untuk tetap bersih dan sehat. Kali ini, mari kita pelajari bersama bagaimana kita bisa mengelola sampah dengan baik untuk menjaga Bumi kita!\r\n\r\nKenali Jenis Sampah: Pertama-tama, mari kita kenali jenis sampah yang kita miliki. Ada sampah plastik, kertas, logam, dan sampah organik (seperti sisa makanan). Dengan mengenali jenis sampah ini, kita bisa memilahnya dengan lebih baik.\r\n\r\nMulai Dari Rumah: Di rumah, kita bisa melakukan langkah sederhana. Misalnya, setelah selesai menggunakan mainan atau alat tulis, jangan lupa untuk menyimpannya kembali di tempatnya. Dengan begitu, kita bisa mencegah sampah menumpuk di sekitar kita.\r\n\r\nPemilahan Sampah: Mari kita bantu orangtua dengan memilah sampah! Kita bisa menggunakan kotak-kotak khusus dengan warna berbeda untuk memisahkan sampah. Kotak hijau untuk plastik, kuning untuk kertas, dan warna lainnya untuk sampah organik. Ini membantu kita dalam mendaur ulang sampah dengan lebih baik.\r\n\r\nBelajar Mendaur Ulang: Mendaur ulang adalah cara bagus untuk membantu Bumi kita. Kita bisa belajar membuat kerajinan dari barang-barang bekas, seperti membuat mainan dari botol plastik atau karya seni dari kertas bekas. Ini akan membuat sampah menjadi barang yang bermanfaat lagi!\r\n\r\nAjak Teman-Teman: Jangan lupa, Sahabat Bumi Kecil, ajak teman-teman kita untuk melakukan hal yang sama! Kita bisa menjadi contoh yang baik bagi mereka dengan mempraktikkan cara menjaga kebersihan lingkungan sehari-hari.\r\n\r\nIngat, setiap langkah kecil yang kita lakukan bisa membawa perubahan besar bagi Bumi kita. Mari kita jaga dan rawat Bumi kita agar tetap indah dan sehat untuk semua makhluk hidup. Bersama, kita bisa membuat perbedaan!', 'upload/edukasi/image65925576a477b.jpg', '2023-12-07 14:44:03', '2023-12-07 14:44:52'),
(3, 'Ayo Menjadi Pahlawan Lingkungan', 'Menyelamatkan Bumi Bersama Anak-anak: Belajar Daur Ulang yang Seru!', 'Hai Sahabat Kecil yang Hebat!\r\n\r\nKita akan memulai petualangan seru kita hari ini dengan belajar tentang daur ulang. Apa sih daur ulang itu? Yuk, kita jelajahi bersama-sama!\r\n 1. Apa Arti Daur Ulang?\r\nDaur ulang adalah cara ajaib untuk membuat barang-barang bekas menjadi berguna lagi. Bayangkan jika botol plastik yang sudah kita pakai bisa berubah menjadi mainan yang menyenangkan atau kertas bekas bisa menjadi karya seni yang cantik!\r\n\r\n2. Permainan Daur Ulang yang Menyenangkan\r\nMari kita mulai dengan permainan sederhana! Ambil barang-barang bekas di sekitar kita dan coba pikirkan apa yang bisa kita buat darinya. Botol plastik bisa jadi mainan, kertas bekas bisa jadi lukisan! Kita bisa jadi kreatif dengan barang-barang yang tidak terpakai.\r\n\r\n3. Mendaur Ulang Bersama Teman-teman\r\nAyo, ajak teman-teman kita untuk ikut bermain dan belajar tentang daur ulang! Kita bisa membangun semangat daur ulang bersama-sama dengan berbagi ide-ide kreatif.\r\n\r\n4. Menjadi Pahlawan Lingkungan\r\nKalian tahu, dengan melakukan daur ulang, kita semua bisa menjadi pahlawan lingkungan! Dengan memilah sampah dan mendaur ulang, kita membantu Bumi kita tetap bersih dan sehat.\r\n\r\n5. Pesan untuk Sahabat Kecil\r\nJangan lupa, setiap tindakan kecil yang kita lakukan sangat berarti. Mari kita jaga lingkungan kita dengan cara yang menyenangkan, ya!\r\n\r\nSahabat Kecil, kalian adalah pahlawan bagi Bumi kita! Yuk, terus berpetualang dalam dunia daur ulang dan jadilah penyelamat lingkungan yang hebat. Sampai jumpa di petualangan berikutnya!', 'upload/edukasi/image6592558966f40.jpg', '2023-12-07 14:44:03', '2023-12-07 14:44:52'),
(26, 'Langkah-Langkah Praktis dalam Pengelolaan Sampah', 'Mengenal, Mengurangi, dan Mendaur Ulang Secara Efektif', 'Sampah adalah salah satu tantangan besar dalam pengelolaan lingkungan saat ini. Namun, dengan pendekatan yang tepat, kita dapat mengubah pandangan kita terhadap sampah menjadi sumber daya yang berharga. Edukasi tentang sampah, daur ulang, dan pengelolaan limbah memiliki peran penting dalam membangun kesadaran lingkungan dan keberlanjutan. Daur ulang adalah proses mengubah barang-barang bekas menjadi produk yang baru, mengurangi jumlah sampah yang akhirnya berakhir di tempat pembuangan akhir. Edukasi tentang daur ulang penting untuk mengajarkan bagaimana kita bisa memanfaatkan kembali material yang sebelumnya dianggap sebagai sampah. Langkah-langkah dalam Pengelolaan Sampah\r\n\r\nPengenalan 3R: Reduksi, Reuse, Recycle\r\n\r\nReduksi: Mengurangi sampah dengan cara menghindari penggunaan produk yang tidak ramah lingkungan.\r\nReuse: Menggunakan kembali barang-barang yang masih layak pakai.\r\nRecycle: Mengumpulkan dan memproses material sampah agar dapat digunakan kembali sebagai produk baru.\r\nPentingnya Pemilahan Sampah\r\n\r\nMengelompokkan sampah berdasarkan jenisnya untuk memudahkan proses daur ulang.\r\nEdukasi masyarakat mengenai cara yang benar dalam memilah sampah organik, anorganik, plastik, kertas, dan lainnya.\r\nPeran Teknologi dalam Pengelolaan Sampah\r\n\r\nPengenalan teknologi ramah lingkungan yang membantu dalam proses daur ulang, seperti mesin pencacah, penghancur, dan alat pemroses sampah organik.\r\n\r\n', 'upload/edukasi/image6592554da9174.jpg', '2023-12-28 13:05:21', '2023-12-28 13:05:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemputsampah`
--

CREATE TABLE `jemputsampah` (
  `id` int(11) NOT NULL,
  `nomorTelepon` varchar(16) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggalPenjemputan` varchar(10) NOT NULL,
  `waktuPenjemputan` varchar(20) NOT NULL,
  `mitra` varchar(255) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `bskertas` varchar(10) NOT NULL,
  `bsplastik` varchar(10) NOT NULL,
  `bskaca` varchar(10) NOT NULL,
  `poin` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `namakurir` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jemputsampah`
--

INSERT INTO `jemputsampah` (`id`, `nomorTelepon`, `alamat`, `tanggalPenjemputan`, `waktuPenjemputan`, `mitra`, `catatan`, `bskertas`, `bsplastik`, `bskaca`, `poin`, `gambar`, `namakurir`) VALUES
(8, '112233445566', 'Jl. Sukabirus Barat', '2023-12-21', '08:00', '', 'vgsevgwwsrvgvgv', '200', '20', '29', 2000, 'upload/foto-bukti/gambar659278d3e4621.jpg', 'Wlee'),
(12, '0851577355555', 'Jakarta Selatan', '2024-04-02', '16:00', '', '-', '20', '-', '20', 1000, 'upload/foto-bukti/gambar659237105ee34.jpg', 'Nani'),
(41, '112233445566', 'Jl. Cikoneng', '2024-10-26', '12:00', '', 'tes', '20', '10', '0', 2000, 'upload/foto-bukti/gambar65923b576c446.jpg', 'Abdul'),
(44, '085157734444', 'Jl. GBA', '2023-10-20', '16:00', '', 'Depan masjid', '20', '0', '20', 10000, 'upload/foto-bukti/gambar65929b81ec2f9.png', 'Krishna'),
(47, '085157734418', 'ahra afk', '2021-01-31', '16:00', '', '-', '10', '10', '10', 555, 'upload/foto-bukti/gambar65929dc227c10.png', 'Krishna'),
(48, '085157734418', 'Jl. Sukabirus ', '2028-01-31', '16:00', '', '-', '11', '10', '-', 0, '', ''),
(49, '085157734418', 'Jl. Sukabirus ', '2024-12-31', '12:00', '', '-', '9', '9', '9', 0, '', ''),
(51, '085157734418', 'Jl. Sukabirus ', '2017-12-30', '12:00', 'test3@gmail.com', '-', '10', '10', '-', 0, '', ''),
(56, '031519928171', 'braga', '2024-12-30', '12:00', 'banksampahasri@gmail.com', '-', '10', '7', '0', 5000, 'upload/foto-bukti/gambar65940f4d23b14.jpg', 'combrol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenissampah`
--

CREATE TABLE `jenissampah` (
  `gambar` varchar(300) NOT NULL,
  `jenissampah` varchar(300) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `poin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenissampah`
--

INSERT INTO `jenissampah` (`gambar`, `jenissampah`, `deskripsi`, `poin`) VALUES
('aset/plastik.webp', 'Kertas', 'Daur ulang kertas melibatkan pengumpulan kertas bekas seperti koran, majalah, dan kardus. Proses ini mengurangi penebangan pohon dan konsumsi air dalam pembuatan kertas baru.', 100),
('aset/plastik.webp', 'Plastik', 'Daur ulang plastik mengubah berbagai jenis bahan plastik menjadi produk yang dapat digunakan kembali. Hal ini membantu mengurangi polusi dan menghemat sumber daya.', 200),
('aset/plastik.webp', 'Kaca', 'Daur ulang kaca melibatkan pengumpulan botol dan wadah kaca yang kemudian dihancurkan menjadi pecahan kecil, dikenal sebagai cullet. Cullet ini dibersihkan dan dilebur untuk membuat kaca baru.', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page`
--

CREATE TABLE `landing_page` (
  `title` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `bg_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `landing_page`
--

INSERT INTO `landing_page` (`title`, `deskripsi`, `bg_img`) VALUES
('Recycle Me', 'Recycle Me adalah website yang dapat membantu mengurangi jumlah sampah yang dibuang ke tempat pembuangan akhir, meningkatkan penggunaan kembali bahan yang masih berguna, serta mengurangi dampak lingkungan dari limbah yang tidak terkendali.', 'aset/bg.webp'),
(NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `our_team`
--

CREATE TABLE `our_team` (
  `id` int(16) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `our_team`
--

INSERT INTO `our_team` (`id`, `nim`, `nama`, `foto`) VALUES
(1, '6701223079', 'Azzahra Dhanindya Yuma Bachtar', 'ahra.jpg'),
(2, '6701220116', 'Krishna Yoga Mahendra', 'krishna.jpg'),
(3, '6701223054', 'Muhammad Ilham Fanani', 'ilham.jpg'),
(4, '6701220122', 'Reihan Mahendra Sulaksono', 'reyhan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `poin`) VALUES
(1, 'user1', '1@example.com', 0),
(2, 'user2', '2@example.com', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poinjenissampah`
--

CREATE TABLE `poinjenissampah` (
  `gambar` varchar(300) NOT NULL,
  `jenissampah` varchar(30) NOT NULL,
  `poin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poinjenissampah`
--

INSERT INTO `poinjenissampah` (`gambar`, `jenissampah`, `poin`) VALUES
('aset/plastik.webp', 'Kertas', 100),
('aset/plastik.webp', 'Plastik', 200),
('aset/plastik.webp', 'Kaca', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rewards`
--

INSERT INTO `rewards` (`id`, `nama`, `deskripsi`, `poin`) VALUES
(1, 'Gopay 5000', 'Saldo Gopay senilai Rp5.000', 1000),
(2, 'Voucher TIX/XXI Buy 1 Get 1', 'Voucher Tiket nonton beli 1 gratis 1 untuk aplikasi TIX dan XXI', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `user_id` int(11) NOT NULL,
  `reward_id` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`user_id`, `reward_id`, `tgl_transaksi`) VALUES
(1, 1, '2023-12-12 16:14:07'),
(1, 1, '2023-12-12 16:15:22'),
(2, 2, '2024-01-02 13:17:31'),
(2, 2, '2024-01-02 13:17:55'),
(2, 1, '2024-01-02 17:02:43'),
(2, 1, '2024-01-02 17:06:34'),
(2, 1, '2024-01-02 17:07:31'),
(2, 1, '2024-01-02 17:07:32'),
(2, 1, '2024-01-02 17:08:09'),
(2, 1, '2024-01-02 17:08:55'),
(2, 1, '2024-01-02 17:08:57'),
(2, 1, '2024-01-02 17:09:17'),
(2, 1, '2024-01-02 17:09:18'),
(2, 1, '2024-01-02 17:09:22'),
(2, 1, '2024-01-02 17:09:24'),
(2, 1, '2024-01-02 17:09:42'),
(2, 1, '2024-01-02 17:09:46'),
(2, 1, '2024-01-02 17:09:47'),
(2, 1, '2024-01-02 17:09:56'),
(2, 1, '2024-01-02 17:10:04'),
(2, 1, '2024-01-02 17:10:05'),
(2, 1, '2024-01-02 17:10:13'),
(2, 1, '2024-01-02 17:10:14'),
(2, 1, '2024-01-02 17:10:15'),
(2, 1, '2024-01-02 17:10:15'),
(2, 1, '2024-01-02 17:10:52'),
(2, 1, '2024-01-02 17:10:53'),
(2, 1, '2024-01-02 17:10:53'),
(2, 1, '2024-01-02 17:20:00'),
(2, 1, '2024-01-02 17:20:23'),
(2, 1, '2024-01-02 17:20:42'),
(2, 1, '2024-01-02 17:20:43'),
(2, 1, '2024-01-02 17:20:59'),
(2, 1, '2024-01-02 17:21:21'),
(2, 1, '2024-01-02 17:21:23'),
(2, 1, '2024-01-02 17:22:10'),
(2, 1, '2024-01-02 17:22:11'),
(2, 1, '2024-01-02 17:22:20'),
(2, 1, '2024-01-02 17:23:03'),
(2, 1, '2024-01-02 17:25:29'),
(2, 1, '2024-01-02 17:27:26'),
(2, 1, '2024-01-02 17:27:50'),
(2, 1, '2024-01-02 17:29:24'),
(2, 2, '2024-01-02 17:30:45'),
(2, 2, '2024-01-02 17:30:50'),
(2, 1, '2024-01-02 17:32:05'),
(2, 1, '2024-01-02 18:35:46'),
(1, 2, '2024-01-02 18:50:43'),
(1, 2, '2024-01-02 20:20:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('konsumen','mitra') DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `foto`, `role`, `nama`, `email`, `password`, `alamat`, `no_hp`, `poin`) VALUES
(1, NULL, 'konsumen', 'combro', 'ifanani60@yahoo.com', '$2y$10$zMXX6dEpQoqGJmZbiEU.huMlKAxJ/dFElvN9cGxsfjTgcAA1XIcNW', 'braga', '031519928171', 4000),
(2, NULL, 'konsumen', 'Fanani', 'ilham@gmail.com', '$2y$10$G60Qq7YrTm7FiDXzqUb9E.pwRlvOxN4ykeFwVLNRVdbyyceaSU9QW', 'braga', '085157734418', 1000),
(9, NULL, 'konsumen', 'iam', 'iam@gmail.com', '$2y$10$Pc2tSZJr89FfSkwEYengte5pMhIne0BqIEPbDEkkvr9uv7IznMS1a', 'sukapura', '031519928171', NULL),
(11, NULL, 'konsumen', 'Fanani', 'admin1@gmail.com', '$2y$10$J6JcDfJLjDExGXUg8ygznecC/2AS0ASleBAeTdzX3StcVYV4xBDwi', 'SDA', '081359185163', NULL),
(12, NULL, 'konsumen', 'Muhammad Ilham Fanani', 'admin2@gmail.com', '$2y$10$ICcvCZatbLsh2tf1OxzQPe27tRX5gg0ntno128XrIpilyLEGMb.fm', 'SDA', '031519928171', NULL),
(13, NULL, 'konsumen', 'Ilham Perkasa', 'admin3@gmail.com', '$2y$10$cXg6LJkzL9sGBM0u0VXnVuLbYmoEq34SnzbDTGExlZUtzzSQShkNm', 'sukapura', '081359185163', NULL),
(18, '1704198255-IMG_20220808_233031_877.jpg', 'mitra', 'Bank Sampah Asri 07', 'banksampahasri@gmail.com', '$2y$10$Oy9HCuZTEJ0Ifv9NMRVBHO6qsjzZacIdQ2JuT6iQVTg.TjPQv3b5e', 'Gg. Parasdi, RT.dalam IV/RW.07, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40234', '087722334455', NULL),
(19, NULL, 'konsumen', 'Ahra', 'ahra@gmail.com', '$2y$10$1d7NwFDeUoUdKiZRlY3ODuzquz.pzeEqBfDzm5eThvwO.Q7O0g2Le', 'Jl. Sukabirus ', '085157734418', NULL),
(20, '1704197879-2020-09-11.jpg', 'mitra', 'Bank Sampah Bersinar', 'banksampahbersinar@gmail.com', '$2y$10$W55rQLzNXLMD3nGPw4MvBub54c6swt1Ok6HpONzXHgyQg5K6./Wmq', 'Jl. Terusan Bojongsoang No.174, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375', '081122334455', NULL),
(21, '1704206263-2023-10-30.jpg', 'mitra', 'Bank Sampah Alamku', 'banksampahalamku@gmail.com', '$2y$10$dPMBXrUToA408RaR9LPWuOuqOXlZYh8.aVlF/WxnK44yEnOI2HU3C', 'l. ASI 2 No.15, Citapen, Cihampelas, Kabupaten Bandung Barat, Jawa Barat 40562', '089922334455', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `edukasi`
--
ALTER TABLE `edukasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jemputsampah`
--
ALTER TABLE `jemputsampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `reward_id` (`reward_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `edukasi`
--
ALTER TABLE `edukasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `jemputsampah`
--
ALTER TABLE `jemputsampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`reward_id`) REFERENCES `rewards` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
