-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2015 at 10:04 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- --------------------------------------------------------

--
-- Table structure for table `balas_komentar`
--

DROP TABLE IF EXISTS `balas_komentar`;
CREATE TABLE IF NOT EXISTS `balas_komentar` (
  `id_balas` int(11) NOT NULL AUTO_INCREMENT,
  `id_komentar` int(11) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(15) NOT NULL,
  PRIMARY KEY (`id_balas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `balas_komentar`
--

INSERT INTO `balas_komentar` (`id_balas`, `id_komentar`, `konten`, `tanggal`, `waktu`) VALUES
(1, 1, 'Terima kasih :-)', '2015-01-27', '11:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `alamat`, `gambar`, `keterangan`, `publish`) VALUES
(2, 'http://robotic.com', 'tutorialadvertising.jpg', 'Robotic Masa Depan', 'Y'),
(3, 'http://robotic.com', 'graphicadvertising.jpg', 'Teknologi Masa Depan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `headline` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `reader` int(11) NOT NULL DEFAULT '0',
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `konten`, `tanggal`, `waktu`, `gambar`, `headline`, `id_team`, `reader`, `publish`) VALUES
(3, 2, 'Pengenalan Seputar Robot', '<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Robot</strong>&nbsp;adalah sebuah alat mekanik&nbsp;yang&nbsp;dapat melakukan tugas fisik, baik menggunakan pengawasan dan kontrol manusia, ataupun menggunakan program yang telah didefinisikan terlebih dulu (kecerdasan buatan). Istilah robot berawal bahasa Cheko &ldquo;robota&rdquo; yang berarti pekerja atau kuli yang tidak mengenal lelah atau bosan. Robot biasanya digunakan untuk tugas yang berat, berbahaya, pekerjaan yang berulang dan kotor.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Biasanya kebanyakan&nbsp;robot industri&nbsp;digunakan dalam bidang produksi. Penggunaan robot lainnya termasuk untuk pembersihan&nbsp;limbah beracun, penjelajahan bawah air dan luar angkasa, pertambangan, pekerjaan "cari dan tolong" (<em>search and rescue</em>), dan untuk pencarian tambang. Belakangan ini robot mulai memasuki pasaran konsumen di bidang hiburan, dan alat pembantu rumah tangga, seperti penyedot debu, dan pemotong rumput.</p>\r\n<p>Saat ini hampir tidak ada orang yang tidak mengenal robot, namun pengertian robot tidaklah dipahami secara sama oleh setiap orang. Sebagian membayangkan robot adalah suatu mesin tiruan manusia (humanoid), meski demikian humanoid bukanlah satu-satunya jenis robot.</p>\r\n<p>Pada kamus Webster pengertian robot adalah</p>\r\n<p><em>An automatic device that performs function ordinarily ascribed to human beings</em></p>\r\n<p>(sebuah alat otomatis yang melakukan fungsi berdasarkan kebutuhan manusia)</p>\r\n<p>Dari kamus Oxford diperoleh pengertian robot adalah:</p>\r\n<p><em>A machine capable of carrying out a complex series of actions automatically, especially one programmed by a computer.</em></p>\r\n<p>(Sebuah mesin yang mampu melakukan serangkaian tugas rumit secara otomatis, terutama yang diprogram oleh komputer)</p>\r\n<p>Pengertian dari Webster mengacu pada pemahaman banyak orang bahwa robot melakukan tugas manusia, sedangkan pengertian dari Oxford lebih umum.</p>\r\n<p>Beberapa organisasi di bidang robot membuat definisi tersendiri. Robot Institute of America memberikan definisi robot sebagai:</p>\r\n<p><em>A reprogammable multifunctional manipulator designed to move materials, parts, tools or other specialized devices through variable programmed motions for the performance of a variety of tasks</em></p>\r\n<p>(Sebuah manipulator multifungsi yang mampu diprogram, didesain untuk memindahkan material, komponen, alat, atau benda khusus lainnya melalui serangkaian gerakan terprogram untuk melakukan berbagai tugas)</p>\r\n<p>International Organization for Standardization (ISO 8373) mendefinisikan robot sebagai:</p>\r\n<p><em>An automatically controlled, reprogrammable, multipurpose, manipulator programmable in three or more axes, which may be either fixed in place or mobile for use in industrial automation applications</em></p>\r\n<p>(Sebuah manipulator yang terkendali, multifungsi, dan mampu diprogram untuk bergerak dalam tiga aksis atau lebih, yang tetap berada di tempat atau bergerak untuk digunakan dalam aplikasi&nbsp;otomasi&nbsp;industri)</p>\r\n<p>Dari beberapa definisi di atas, kata kunci yang ada yang dapat menerangkan pengertian robot adalah:</p>\r\n<ul>\r\n<li>Dapat memperoleh informasi dari lingkungan (melalui&nbsp;sensor)</li>\r\n<li>Dapat diprogram</li>\r\n<li>Dapat melaksanakan beberapa tugas yang berbeda</li>\r\n<li>Bekerja secara otomatis</li>\r\n<li>Cerdas (<em>intelligent</em>)</li>\r\n<li>Digunakan di industri</li>\r\n</ul>', '2015-01-26', '02:33:16', '', 0, 1, 18, 'Y'),
(4, 1, 'Pengenalan Kemajuan Robot', '<p>Kemajuan teknologi saat ini berlangsung dengan sangat cepat. Semakin mudahnya masyarakat berkomunikasi dan mendapatkan informasi, semakin mudah teknologi untuk berkembang. Belakangan ini para ilmuwan sedang merancang teknologi robot yang menyerupai manusia. Sehingga pada akhirnya robot akan berpikir seperti manusia dan ditujukan untuk membantu pekerjaan manusia.</p>\r\n<p>Robot humanoid diciptakan untuk memenuhi kebutuhan dunia yang terus meningkat. Robot-robot seperti ini dapat bergerak berdasarkan keinginannya sendiri, menaiki tangga dan bahkan menangai peralatan. Bencana nuklir yang baru saja terjadi di Fukushima, Jepang juga memicu peningkatan pembuatan robot. Sayangnya, bencana tersebut membuktikan bahwa robot yang hanya berspesialisasi dalam melakukan satu jenis tugas, tidaklah cukup.</p>\r\n<p>Dalam situasi dan tempat yang tak bisa dijangkau manusia, robot dituntut untuk dapat mengambil keputusan secara cerdas dan menangani berbagai pekerjaan berbeda sekaligus. Departemen Pertahanan Amerika Serikat telah meluncurkan sebuah proyek pembuatan robot humanoid yang dapat melakukan tugas untuk situasi gawat darurat jika bencana besar terjadi. Sementara itu Honda, perusahaan pembuat ASIMO, salahs atu robot terbaik dunia, telah mendahului proyek tersebut dengan menciptakan robot-robot yang lebih canggih untuk bekerja dalam pembangkit tenaga nuklor di Fukushima. Film ini menyoroti apa yang terjadi di garis depan revolusi robot.</p>', '2015-01-26', '02:34:53', '', 0, 1, 24, 'Y'),
(5, 1, 'Tentang Robotic Programmer', '<p>Robotic Computer Programmer adalah robot yang memiliki kemampuan dan keahlian khusus untuk bisa mengoperasikan komputer, laptop dan sejenisnya. Robotic Programmer diciptakan untuk mampu mengoperasikan komputer ataupun membuat sebuah program aplikasi. Robotic programmer mampu menguasai bahasa pemrogramman tertentu.&nbsp;</p>\r\n<p>Robotic Computer&nbsp;&nbsp;Programmer memiliki macam-macam keahlian, keahlian yang diciptakan untuk Robotic adalah menguasai bahasa pemrogramman berdasarkan tipe program sebuah aplikasi yakni dekstop programming ataupun web programming. Robotic Programmer tidak memiliki keahlian dalam mengatur algoritmanya sendiri melainkan &nbsp;memiliki keahlian mengatur algoritma ketika diberi perintah oleh manusia itu sendiri.</p>\r\n<p>&nbsp;</p>\r\n<p>Setiap Robotic mempunyai type dan karakteristik yang berbeda, contohnya untuk Robotic web programming berbeda dengan Robotic desktop programming. Yang membedakannya adalah sistem yang di setting di dalam Robotic tersebut.&nbsp;Untuk komputernya pun mereka di beri spesipikasi tertentu sesuai dengan keahliannya, itu semua dilakukan untuk meminimalisir terjadinya kesalahan dalam pembuatan suatu program dan menjaga agar Robotic tetap stabil dalam pengerjaan program tersebut.</p>\r\n<p>Cara kerja dari Robotic tersebut adalah dengan cara menginputkan suatu flowchart aplikasi atau program yang akan dibuat, adapun flowchart tersebut di desain oleh manusia menggunakan alat khusus pembuat flowchart yang bisa dibaca atau di terjemahkan oleh masing-masing Robotic. Setiap Robotic mampu menerjemahkan alur flowchart dan mendeskripsikannya menjadi code, baik itu code program berbasis web maupun berbasis desktop.</p>\r\n<p>Setiap Robotic jangan diberi pekerjaan atau project yang berlebihan, hal itu memungkinkan setiap Robotic mudah untuk error ataupun rusak. Dari segi perawatan Robotic harus diperhatikan untuk menjaga kesetabilannya. Robotic tersebut mempunyai jangka waktu tertentu untuk pemeriksaan keadaan sistem yang berjalan di dalam Roboticnya.</p>\r\n<p>&nbsp;</p>', '2015-01-26', '09:30:06', '', 1, 1, 38, 'Y'),
(6, 3, 'Kinerja Robotic Programmer', '<p>Lalu bagaimana tentang kinerja sebuah Robotic Programmer dalam membuat sebuah program aplikasi ? apakah setiap coding dibuat oleh manusia dan robot hanya menerima setiap perintah dari manusia itu sendiri ?</p>\r\n<p><strong>Robotic Programmer&nbsp;</strong>diciptakan khusus untuk membuat sebuah program tanpa perlu manusia itu sendiri memikirkan sintak atau kode bahasa pemrogramman-nya melainkan menggunakan sebuah<strong>flowchart.</strong>&nbsp;Robotic Programmer hanya mengerti dengan flowchart yang diperintahkan oleh manusia, dengan flowchart maka Robotic Programmer akan secara otomatis mengerti yang harus dilakukan yaitu mengimplementasikannya dengan sintak atau code untuk menciptakan sebuah program aplikasi.&nbsp;</p>\r\n<p>Lalu apa yang harus dilakukan manusia yang mengontrol Robotic Programmer tersebut ? yaitu melainkan memberi sebuah flowchart atau alur kinerja sebuah program aplikasi yang akan dibuat. Intruksi Flowchart yang dibuat harus sesuai terhadap Robot itu sendiri, manusia tidak sewenang-wenang dalam memberikan flowchart terhadap robot itu sendiri.</p>\r\n<p>Apakah robotic Programmer juga manusiawi juga, bisa terjadi error ketika menulis codingnya ? tentunya tidak, karena robot yang diciptakan khusus untuk membuat sebuah programming itu sendiri sudah pasti benar karena sudah didesain dan diberi keahlian khusus terhadap bahasa pemrogrammannya itu sendiri, tetapi program aplikasi yang diciptakan bisa tidak berjalan sesuai alur atau bagaimana kinerja sebuah program aplikasi yang akan dibuat jika flowchart atau alur program nya itu sendiri tidak benar.</p>\r\n<p>Dalam pemberian flowchart manusia ditugaskan agar mampu membuat flowchart yang sesuai agar aplikasi yang dibuat oleh Robotic tersebut tidak mengalami kesalahan, untuk penginputannya sendiri flowchart diinputkan melalui flashdisk atau disk tertentu dan di dalam setiap disk tersebut hanya terdapat satu flowchart atau alur pemrograman yang akan dibuat oleh Robotic tersebut.</p>\r\n<p>Setiap Robotic mampu menyelesaikan suatu program sesuai dengan tingkat kerumitan program tersebut, semakin rumit suatu program yang dikerjakan maka semakin lama pula Robotic tersebut menyelesaikan pekerjaannya.</p>\r\n<p>&nbsp;</p>', '2015-01-26', '09:50:09', '', 1, 1, 44, 'Y'),
(7, 5, 'Robotic Web Dan Desktop Programming', '<p><span style="font-size: small; font-family: arial, helvetica, sans-serif;"><strong>Robotic Computer Programmer</strong>memiliki dua jenis type yang berbeda yakni berbasis desktop dan web programming. Jenis Robotic ini sangat berbeda satu sama lain karena setiap robot diciptakan untuk memiliki keahlian yang berbeda dalam menguasai bahasa pemrogramman-nya. Yakni robotic memiliki kemampuan dalam penguasaan bahasa pemrogramman setiap jenis program aplikasinya yaitu desktop dan web. </span></p>\r\n<p><span style="font-size: small; font-family: arial, helvetica, sans-serif;">Satu sama lain robot memiliki kemampuan kompleks atau full, Robotic Web programmer mampu menguasai bahasa pemrogramman yang kompleks misalnya PHP, HTML, CSS, JavaScript dan sebagainya. Begitupun sebaliknya Robotic Desktop Programming juga memiliki keahlian khusus dalam menguasai setiap bahasa pemrogramman nya misalkan Visual Basic, Java Dan sebagainya.&nbsp;</span></p>\r\n<ul>\r\n<li><span style="font-size: small; font-family: arial, helvetica, sans-serif;">Web based berjalan menggunakan&nbsp; basis teknologi web (internet) atau&nbsp;&nbsp; browser sedangkan desktop based&nbsp; application dapat berjalan sendiri atau independen tidak menggunakan browser dan biasanya telah&nbsp; ditentukan dapat berjalan di platform atau operating system tertentu</span></li>\r\n</ul>\r\n<p><span style="font-size: small; font-family: arial, helvetica, sans-serif;">&nbsp;</span></p>\r\n<ul>\r\n<li><span style="font-size: small; font-family: arial, helvetica, sans-serif;">Web based tidak banyak memerlukan program yang akan diinstal di sisi client sedangkan desktop based&nbsp; harus melakukan instalasi program sesuai aplikasi yang dijalankan.</span></li>\r\n</ul>', '2015-01-26', '19:22:53', '', 1, 1, 6, 'Y'),
(8, 3, 'Penggunaan Sistem Flowchart', '<p>Perintah yang digunakan untuk membuat sebuah program aplikasi pada computer dengan Robotic Computer Programmer itu menggunakan sebuah sistem yang akan diciptakan khusus dimana robot hanya mengerti dengan intruksi pada penggunaan alur atau yang dikenal dengan Flowchart. Apa itu Flowchart ?</p>\r\n<p><strong>Flowchart</strong> merupakan gambar atau bagan yang memperlihatkan urutan dan hubungan antar proses beserta instruksinya. Gambaran ini dinyatakan dengan simbol. Dengan demikian setiap simbol menggambarkan proses tertentu. Sedangkan hubungan antar proses digambarkan dengan garis penghubung.<br /> Flowchart ini merupakan langkah awal pembuatan program. Dengan adanya flowchart urutan poses kegiatan menjadi lebih jelas. Jika ada penambahan proses maka dapat dilakukan lebih mudah. Setelah flowchart selesai disusun, selanjutnya pemrogram (programmer) menerjemahkannya ke bentuk program dengan bahsa pemrograman.<br /> <br /> Simbol-simbol flowchart<br /> Flowchart disusun dengan simbol-simbol. Simbol ini dipakai sebagai alat bantu menggambarkan proses di dalam program.<br /> <br /> Kaidah-kaidah pembuatan Flowchart<br /> Dalam pembuatan flowchart tidak ada rumus atau patokan yang bersifat mutlak. Karena flowchart merupakan gambaran hasil pemikiran dalam menganalisa suatu masalah dengan komputer. Sehingga flowchart yang dihasilkan dapat bervariasi antara satu pemrogram dengan pemrogram lainnya</p>\r\n<p><strong>Tujuan Membuat Flowchart</strong><em>&nbsp;</em><br /> 1. Menggambarkan suatu tahapan penyelesaian masalah<br /> 2. Secara sederhana, terurai, rapi dan jelas<br />3. Menggunakan simbol-simbol standar</p>\r\n<p>Dengan sistem ini manusia tidak perlu lagi memikirkan sintak-sintak atau kumpulan kode untuk membuat sebuah sistem program aplikasi pada sebuah komputer. Manusia hanya cukup membuat sistem alur kerja atau bagan sebagai bahan untuk kinerja program aplikasi yang diinginkan.&nbsp;</p>\r\n<p>Flowchart yang dibuat oleh manusia sama saja seperti flowchart pada umumnya namun ada yang berbeda yaitu pembuatan flowchart tidak sembarang artinya pembuatan flowchart itu sendiri bisa dibuat pada program aplikasi khusus. Ketika flowchart sudah selesai dibuat, akan disimpan di USB Khusus untuk Robotic Computer Programmer. Setelah data alur kerja sistem selesai dibuat, hal yang dilakukan selanjutnya adalah memasukan port USB ke Robotic Maka Robotic ini akan secara otomatis bisa membaca program aplikasi yang akan dibuat.</p>', '2015-01-26', '20:07:00', '', 1, 1, 30, 'Y'),
(9, 2, 'Manfaat Robotic Computer Programmer', '<p>Lalu apa manfaat Robotic Computer Programmer ? Efektif dan efisien kah ? Robotic Computer Programmer adalah sebuah alat masa depan yang akan digunakan sebagai solusi bagi dunia programming. Seiring adanya kemajuan teknologi dunia robotic semakin memudahkan pekerjaan manusia didunia ini.&nbsp;</p>\r\n<p>Biasanya robotic identik atau dominan dikendalikan oleh sebuah program komputer, kami ingin berpandangan jauh ke depan yaitu Robotic bukan hanya dikendalikan oleh komputer dan robotic hanya digunakan untuk kepentingan pekerjaan rumah namun akan digunakan juga sebagai solusi dalam dunia programming yaitu pembuatan program aplikasi yang berkualitas, efektif dan efisien.&nbsp;</p>\r\n<p>Kadang para programmer didunia ini mengalami sebuah kesultian ketika membuat sebuah program aplikasi yang diinginkan karena faktor pengimplementasian antara alur kerja dengan struktur bahasa pemrogrammannya. Ketika programmer sudah tahu bagaimana proses sistem alur kerja aplikasi yang diinginkan nya seperti ini misalkan, tetapi progarmmer juga bingung akibat ketidak tahuan coding-nya.</p>\r\n<p>Robotic Computer Programmer akan diciptakan khusus untuk digunakan oleh manusia dalam pembutan sebuah program aplikasi dan akan menjadi sebuah solusi Rekayasa Perangkat Lunak. Manfaat yang didapat dengan teknologi ini yaitu menciptakan robot cerdas. Bisa menyaingi penguasaan bahasa pemrogramman para programmer, Robotic Computer Programmer tidak memili sifat manusiawi dalam hal lupa sintak, karena biasanya para programmer pun tidak luput dari ingatan code-code yang terhilangkan. Nah, dengan Robotic ini akan menjadi sebuah solusi masa depan karena sifat robotic ini tidak akan pernah lupa terhadap code yang dikuasainya.</p>', '2015-01-27', '11:03:10', '', 1, 1, 38, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

DROP TABLE IF EXISTS `buku_tamu`;
CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `situs` varchar(200) NOT NULL,
  `subjek` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `di_baca` int(11) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

DROP TABLE IF EXISTS `draft`;
CREATE TABLE IF NOT EXISTS `draft` (
  `id_draft` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `headline` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  PRIMARY KEY (`id_draft`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

DROP TABLE IF EXISTS `general_setting`;
CREATE TABLE IF NOT EXISTS `general_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_web` varchar(190) NOT NULL,
  `email_web` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` text NOT NULL,
  `domain` varchar(150) NOT NULL,
  `favicon` varchar(150) NOT NULL,
  `filter_komentar` enum('Y','N') NOT NULL,
  `batas_paging_admin` int(11) NOT NULL,
  `batas_paging_homepage` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id_setting`, `nama_web`, `email_web`, `phone_number`, `meta_deskripsi`, `meta_keyword`, `domain`, `favicon`, `filter_komentar`, `batas_paging_admin`, `batas_paging_homepage`) VALUES
(1, 'Robotic Programmer', 'ibeesnay@yahoo.com', '0852-9015-6462', 'Teknologi pencipta program aplikasi dengan robotic', 'Programmer Masa Depan', 'http://localhost/web/lcw-upi', 'MemberQuarter-large.gif', 'N', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `info_sekolah`
--

DROP TABLE IF EXISTS `info_sekolah`;
CREATE TABLE IF NOT EXISTS `info_sekolah` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `nama_info` varchar(50) NOT NULL,
  `isi_info` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `posisi_menu` int(11) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `info_sekolah`
--

INSERT INTO `info_sekolah` (`id_info`, `nama_info`, `isi_info`, `gambar`, `posisi_menu`, `publish`) VALUES
(3, 'Visi Dan Misi', '<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>VISI</strong></span></p>\r\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Menjadi SMK Negeri yang membina anak didik menjadi teknokrat yang berkarakter dan berbukti pekerti</span></p>\r\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>MISI</strong></span></p>\r\n<ol start="1">\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Mencerdaskan peserta didik diatas kepribadian dan kehalusan budi pekerti.</span></li>\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Membina peserta didik melalui pembiasaan ilmiah, rasional dan bermartabat.</span></li>\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Mempertajam persepsi agama dengan bingkai akal dan naluri ilmuwan.</span></li>\r\n</ol>\r\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>TUJUAN</strong></span></p>\r\n<ol start="1">\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Menyiapkan peserta didik agar menjadi manusia produktif yang mampu bekerja mandiri dan kompeten di bidangnya.</span></li>\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Membekali peserta didik dengan ilmu pengetahuan teknologi dan agama agar menjadi insan&nbsp; yang berakhlak mulia.</span></li>\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Melakukan pembiasaan dalam rangka pengembangan diri untuk membentuk karakter manusia yang handal dan religius.</span></li>\r\n</ol>\r\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">&nbsp;</span></p>', '', 2, 'Y'),
(4, 'Profil Sekolah', '<p style="text-align: left;"><strong style="text-align: justify;"><strong><img style="border-radius: 10px;" src="adminweb/kcfinder/upload/image/muka.jpg" alt="" width="450" height="388" /></strong><br /></strong></p>\r\n<p style="text-align: left;"><strong style="text-align: justify;"><br />A.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong style="text-align: justify;">IDENTITAS SEKOLAH</strong></p>\r\n<p>Nama Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SMKN 1 Lemahsugih</p>\r\n<p>Status Sekolah &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;Negeri</p>\r\n<p>NSS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 341021617039</p>\r\n<p>&nbsp;</p>\r\n<p>Akreditasi *)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p>\r\n<p>Program yang diakreditasi RPL dan TKR</p>\r\n<p>Nomor dan tanggal SK akreditasi 02.00/445/BAP-SM/X/2009.17-10-2009</p>\r\n<p>Peringkat akreditasi B</p>\r\n<p>Mulai berlaku dari tahun 2009 s.d 2014</p>\r\n<p><strong>Alamat Sekolah</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p>\r\n<p>Jalan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Raya Padarek-Lemahsugih</p>\r\n<p>Desa/ Kelurahan &nbsp; &nbsp; &nbsp; &nbsp; : Padarek</p>\r\n<p>Kecamatan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Lemahsugih</p>\r\n<p>Kabupaten&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Majalengka</p>\r\n<p>Provinsi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Jawa Barat</p>\r\n<p>Kode Pos &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 45465</p>\r\n<p>Telepon &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 0233 3395622</p>\r\n<p>e-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : smknlemahsugih@ymail.com</p>\r\n<p>Website&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : http://smkn_lemahsugih.100webspace.net</p>\r\n<p>Kurikulum &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: KTSP</p>\r\n<p>&nbsp;</p>\r\n<p><strong>B.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>SK PENDIRIAN *)</strong></p>\r\n<p>Nomor, Tanggal SK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 421.3 / 3107-disdik, 15 Agustus 2006</p>\r\n<p>Penerbit Sk &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Dinas Pendidikan Kab.&nbsp; Majalengka</p>\r\n<p>Tahun Pendirian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Tanggal 15 Bulan 8 Tahun 2006</p>\r\n<p>Tahun Perubahan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Tanggal 08 Bulan Maret Tahun 2011</p>\r\n<p>&nbsp;</p>\r\n<p><strong>C.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>TANAH *)</strong></p>\r\n<p>Luas Tanah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10.512 M<sup>2</sup></p>\r\n<p>Status Kepemilikan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pemda Kabupaten DT. II Majalengka /SMKN&nbsp;&nbsp; Lemahsugih</p>\r\n<p>&nbsp;</p>\r\n<p><strong>D.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>BANGUNAN</strong></p>\r\n<p>Luas Bangunan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 700 M<sup>2</sup></p>\r\n<p>Stattus Kepemilikan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Pemda Kabupaten DT. II Majalengka /SMKN &nbsp;Lemahsugih</p>\r\n<p><strong>E.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>PROGRAM&nbsp;</strong></p>\r\n<ol>\r\n<li>Teknik Komputer dan Informatika</li>\r\n<li>Teknik Otomotif</li>\r\n<li>Teknik Sepeda Motor</li>\r\n<li>Farmasi&nbsp;</li>\r\n</ol>\r\n<p><strong>F.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>PROGRAM KOMPETENSI</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>\r\n<ol>\r\n<li>Rekayasa Perangkat Lunak</li>\r\n<li>Teknik Kendaraan Ringan</li>\r\n<li>Teknik Sepeda Motor</li>\r\n<li>Farmasi</li>\r\n</ol>\r\n<p><strong>G.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>IDENTITAS KEPALA SEKOLAH</strong></p>\r\n<p>Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Drs. &nbsp;Ahdin, S.Pd.,M.Pd.</p>\r\n<p>NIP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 19601010 197912 1 002</p>\r\n<p>Pangkat, Gol. Ruang &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Pembina tk 1, IV B &nbsp;TMT 01 Oktober 2005</p>\r\n<p>Nomor, Tanggal SK Kepala Sekolah &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 820/1256-Disdik&nbsp; TMT 15 April 2011</p>\r\n<p>Penerbit SK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Dinas Pendidikan Kab. Majalengka</p>\r\n<p><strong>Alamat Rumah</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jalan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Raya Kalapadua No. 24 Rt 01/Rw 09</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Desa/ Kelurahan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Desa Kalapadua</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kecamatan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Lemahsugih</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kabupaten &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Majalengka</p>\r\n<div><strong style="text-align: justify;">&nbsp;</strong></div>', '', 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `keterangan`) VALUES
(1, 'Revolusi Dan Pengembangan', '-'),
(2, 'Latar Belakang', '-'),
(3, 'Sistem Alur Robot', '-'),
(4, 'Flowchart Program', '-'),
(5, 'Jenis Program', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_forum`
--

DROP TABLE IF EXISTS `kategori_forum`;
CREATE TABLE IF NOT EXISTS `kategori_forum` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori_forum`
--

INSERT INTO `kategori_forum` (`id_kategori`, `nama`, `keterangan`) VALUES
(1, 'Type Robotic', '-'),
(2, 'Flowchart', '-'),
(3, 'System Computer', '-');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_berita` int(11) NOT NULL,
  `komentator` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `komentator`, `email`, `isi`, `tanggal`, `waktu`, `publish`) VALUES
(1, 9, 'Ali Akbar', 'ali@yahoo.com', 'Wow dahsyat buanget :-0', '2015-01-27', '11:46:17', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `log_team`
--

DROP TABLE IF EXISTS `log_team`;
CREATE TABLE IF NOT EXISTS `log_team` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_team` int(11) NOT NULL,
  `aktifitas` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(15) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `log_team`
--

INSERT INTO `log_team` (`id_log`, `id_team`, `aktifitas`, `tanggal`, `waktu`) VALUES
(56, 1, 'Mengubah data berita', '2015-01-25', '16:44:13'),
(57, 1, 'Menghapus data slide gambar', '2015-01-25', '16:48:17'),
(58, 1, 'Login control panel', '2015-01-25', '23:00:41'),
(59, 1, 'Mengubah data slide gambar', '2015-01-25', '23:04:30'),
(60, 1, 'Mengubah data slide gambar', '2015-01-25', '23:06:46'),
(61, 1, 'Mengubah data slide gambar', '2015-01-25', '23:10:13'),
(62, 1, 'Mengubah data slide gambar', '2015-01-25', '23:10:36'),
(63, 1, 'Mengubah data slide gambar', '2015-01-25', '23:11:35'),
(64, 1, 'Mengubah data slide gambar', '2015-01-25', '23:12:18'),
(65, 1, 'Mengubah data slide gambar', '2015-01-25', '23:12:42'),
(66, 1, 'Menambahkan data slide gambar', '2015-01-25', '23:17:25'),
(67, 1, 'Mengubah data slide gambar', '2015-01-25', '23:18:23'),
(68, 1, 'Mengubah data slide gambar', '2015-01-25', '23:20:39'),
(69, 1, 'Menghapus 2 data berita', '2015-01-26', '02:28:55'),
(70, 1, 'Menghapus 2 data berita', '2015-01-26', '02:28:55'),
(71, 1, 'Menambah data berita baru', '2015-01-26', '02:33:16'),
(72, 1, 'Menambah data berita baru', '2015-01-26', '02:34:53'),
(73, 1, 'Login control panel', '2015-01-26', '07:48:01'),
(74, 1, 'Menambahkan banner web', '2015-01-26', '08:54:33'),
(75, 1, 'Menghapus data banner web', '2015-01-26', '09:03:50'),
(76, 1, 'Menambahkan banner web', '2015-01-26', '09:04:35'),
(77, 1, 'Mengubah banner web', '2015-01-26', '09:11:39'),
(78, 1, 'Mengubah banner web', '2015-01-26', '09:11:49'),
(79, 1, 'Mengubah banner web', '2015-01-26', '09:11:57'),
(80, 1, 'Mengubah data informasi sekolah', '2015-01-26', '09:19:10'),
(81, 1, 'Menambah data berita baru', '2015-01-26', '09:30:06'),
(82, 1, 'Mengubah data berita', '2015-01-26', '09:31:00'),
(83, 1, 'Menambah data berita baru', '2015-01-26', '09:50:09'),
(84, 1, 'Memperbaharui pengaturan umum web', '2015-01-26', '09:51:47'),
(85, 1, 'Mengubah data berita', '2015-01-26', '09:58:41'),
(86, 1, 'Memperbaharui pengaturan umum web', '2015-01-26', '10:00:19'),
(87, 1, 'Mengubah data slide gambar', '2015-01-26', '10:01:04'),
(88, 1, 'Mengubah data slide gambar', '2015-01-26', '10:02:07'),
(89, 1, 'Mengubah data slide gambar', '2015-01-26', '10:02:48'),
(90, 1, 'Mengubah data slide gambar', '2015-01-26', '10:10:39'),
(91, 1, 'Mengubah data slide gambar', '2015-01-26', '10:12:31'),
(92, 1, 'Mengubah data slide gambar', '2015-01-26', '10:16:35'),
(93, 1, 'Mengubah data slide gambar', '2015-01-26', '10:17:23'),
(94, 1, 'Mengubah data kategori berita', '2015-01-26', '10:40:01'),
(95, 1, 'Mengubah data kategori berita', '2015-01-26', '10:40:01'),
(96, 1, 'Mengubah data kategori berita', '2015-01-26', '10:40:01'),
(97, 1, 'Mengubah data kategori berita', '2015-01-26', '10:40:01'),
(98, 1, 'Mengubah data kategori berita', '2015-01-26', '10:40:01'),
(99, 1, 'Mengubah data berita', '2015-01-26', '10:40:58'),
(100, 1, 'Mengubah data berita', '2015-01-26', '10:41:14'),
(101, 1, 'Mengubah data berita', '2015-01-26', '10:41:37'),
(102, 1, 'Mengubah data berita', '2015-01-26', '10:42:20'),
(103, 1, 'Mengubah data kategori berita', '2015-01-26', '10:43:11'),
(104, 1, 'Mengubah data berita', '2015-01-26', '11:15:00'),
(105, 1, 'Mengubah data berita', '2015-01-26', '11:15:40'),
(106, 1, 'Mengubah data berita', '2015-01-26', '11:16:37'),
(107, 1, 'Mengubah data berita', '2015-01-26', '11:45:50'),
(108, 1, 'Mengubah data berita', '2015-01-26', '11:50:29'),
(109, 1, 'Mengubah data berita', '2015-01-26', '11:51:08'),
(110, 1, 'Menambahkan banner web', '2015-01-26', '11:52:51'),
(111, 1, 'Mengubah data slide gambar', '2015-01-26', '12:13:02'),
(112, 1, 'Mengubah data slide gambar', '2015-01-26', '12:17:07'),
(113, 1, 'Mengubah data slide gambar', '2015-01-26', '12:17:47'),
(114, 1, 'Mengubah data slide gambar', '2015-01-26', '12:19:01'),
(115, 1, 'Mengubah template web', '2015-01-26', '12:25:44'),
(116, 1, 'Mengubah data berita', '2015-01-26', '12:38:34'),
(117, 1, 'Mengubah data berita', '2015-01-26', '12:38:49'),
(118, 1, 'Login control panel', '2015-01-26', '12:47:05'),
(119, 1, 'Keluar sistem control panel', '2015-01-26', '12:49:31'),
(120, 1, 'Login control panel', '2015-01-26', '12:49:37'),
(121, 1, 'Keluar sistem control panel', '2015-01-26', '12:51:34'),
(122, 1, 'Login control panel', '2015-01-26', '12:51:41'),
(123, 1, 'Keluar sistem control panel', '2015-01-26', '12:53:25'),
(124, 1, 'Login control panel', '2015-01-26', '12:53:32'),
(125, 1, 'Menghapus data member forum', '2015-01-26', '14:18:13'),
(126, 1, 'Menambah data berita baru', '2015-01-26', '19:22:53'),
(127, 1, 'menambahkan 3 kategori topik forum', '2015-01-26', '19:41:49'),
(128, 1, 'Mengubah data berita', '2015-01-26', '20:00:38'),
(129, 1, 'Mengubah data berita', '2015-01-26', '20:01:27'),
(130, 1, 'Mengubah data berita', '2015-01-26', '20:02:13'),
(131, 1, 'Mengubah data berita', '2015-01-26', '20:02:34'),
(132, 1, 'Mengubah data berita', '2015-01-26', '20:03:22'),
(133, 1, 'Mengubah data berita', '2015-01-26', '20:04:37'),
(134, 1, 'Mengubah data berita', '2015-01-26', '20:05:38'),
(135, 1, 'Menambah data berita baru', '2015-01-26', '20:07:00'),
(136, 1, 'Mengubah data berita', '2015-01-26', '20:10:44'),
(137, 1, 'Menghapus data informasi sekolah', '2015-01-26', '20:10:57'),
(138, 1, 'Mengubah data informasi sekolah', '2015-01-26', '20:11:38'),
(139, 1, 'Mengubah data slide gambar', '2015-01-26', '20:13:45'),
(140, 1, 'Mengubah data slide gambar', '2015-01-26', '20:15:47'),
(141, 1, 'Mengubah data slide gambar', '2015-01-26', '20:16:57'),
(142, 1, 'Mengubah data berita', '2015-01-26', '20:40:08'),
(143, 1, 'Login control panel', '2015-01-27', '09:48:30'),
(144, 1, 'Mengubah data informasi sekolah', '2015-01-27', '09:53:29'),
(145, 1, 'Mengubah data informasi sekolah', '2015-01-27', '09:54:13'),
(146, 1, 'Mengubah data informasi sekolah', '2015-01-27', '09:54:39'),
(147, 1, 'Mengubah data berita', '2015-01-27', '10:23:06'),
(148, 1, 'Mengubah data berita', '2015-01-27', '10:26:22'),
(149, 1, 'Mengubah data berita', '2015-01-27', '10:32:54'),
(150, 1, 'Mengubah data berita', '2015-01-27', '10:33:23'),
(151, 1, 'Mengubah data berita', '2015-01-27', '10:34:44'),
(152, 1, 'Menambah data berita baru', '2015-01-27', '11:03:10'),
(153, 1, 'Login control panel', '2015-01-27', '11:46:55'),
(154, 1, 'Membalas komentar pengunjung', '2015-01-27', '11:47:16'),
(155, 6, 'Login control panel', '2015-01-27', '21:05:33'),
(156, 6, 'Keluar sistem control panel', '2015-01-27', '21:06:49'),
(157, 7, 'Login control panel', '2015-01-27', '21:07:40'),
(158, 7, 'Keluar sistem control panel', '2015-01-27', '21:07:59'),
(159, 5, 'Login control panel', '2015-01-27', '21:08:15'),
(160, 5, 'Keluar sistem control panel', '2015-01-27', '21:08:24'),
(161, 3, 'Login control panel', '2015-01-27', '21:08:39'),
(162, 3, 'Keluar sistem control panel', '2015-01-27', '21:13:01'),
(163, 3, 'Login control panel', '2015-01-27', '21:15:33'),
(164, 3, 'Keluar sistem control panel', '2015-01-27', '21:26:10'),
(165, 3, 'Keluar sistem control panel', '2015-01-27', '21:26:13'),
(166, 1, 'Login control panel', '2015-01-27', '21:27:17'),
(167, 1, 'Login control panel', '2015-02-08', '10:47:28'),
(168, 1, 'Memperbaharui pengaturan umum web', '2015-02-08', '10:49:18'),
(169, 0, 'Membackup data (database)', '2015-02-08', '10:54:42'),
(170, 1, 'Mengubah data kategori berita', '2015-02-08', '13:13:05'),
(171, 1, 'Mengubah data kategori berita', '2015-02-08', '13:13:05'),
(172, 1, 'Mengubah data kategori berita', '2015-02-08', '13:13:05'),
(173, 1, 'Mengubah data kategori berita', '2015-02-08', '13:13:05'),
(174, 1, 'Mengubah data kategori berita', '2015-02-08', '13:13:05'),
(175, 1, 'Login control panel', '2015-02-09', '10:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `member_forum`
--

DROP TABLE IF EXISTS `member_forum`;
CREATE TABLE IF NOT EXISTS `member_forum` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `bergabung` date NOT NULL,
  `last_login` datetime NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_forum`
--

INSERT INTO `member_forum` (`id_member`, `first_name`, `last_name`, `username`, `password`, `image`, `email`, `no_hp`, `alamat`, `bergabung`, `last_login`, `aktif`) VALUES
(2, 'admin', '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'bapa.jpg', 'ibeesnay@yahoo.com', '082218869439', 'ibs', '2015-01-26', '2015-02-08 13:20:13', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `profesi`
--

DROP TABLE IF EXISTS `profesi`;
CREATE TABLE IF NOT EXISTS `profesi` (
  `id_profesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_profesi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profesi`
--

INSERT INTO `profesi` (`id_profesi`, `nama`, `keterangan`) VALUES
(1, 'Administrator', 'Bertugas untuk memaintenance suatu server, mengerti akan Sistem Operasi Server, baik itu mulai dari instalasi sampai kepada masalah (troubleshooting).'),
(2, 'Web Designer', 'orang yang bertanggung jawab untuk menentukan tampilan sebuah website. Tugasnya adalah pendisainan tampilan situs (web) mulai dari pengolahan gambar, tata letak, warna, dan semua aspek visual situs.\r\n'),
(3, 'Web Programming', 'bertugas dalam melakukan pengcodingan atau pemograman sebuah website agar dinamis. dimana agar sebuah web tersebut dapat telihat mudah bagi seorang web admin.\r\n'),
(4, 'Database Designer', 'seseorang yang bertugas untuk mendesain database dam memiliki dua tugas yaitu Merancang Desain Conceptual / Logical Database dan Merancang desain database secara fisik.\r\n'),
(5, 'Web Develover', 'Bertugas memberi bantuan seperti konsultasi web, konsep web yang akan di buat, membangun sebuah website.');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_kata`
--

DROP TABLE IF EXISTS `sensor_kata`;
CREATE TABLE IF NOT EXISTS `sensor_kata` (
  `id_sensor` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(30) NOT NULL,
  `replacer` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sensor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sensor_kata`
--

INSERT INTO `sensor_kata` (`id_sensor`, `word`, `replacer`) VALUES
(1, 'anjing', 'a*****'),
(3, 'bajingan', 'b*******'),
(4, 'bangsat', 'b******'),
(6, 'bodoh', 'b****'),
(7, 'babi', 'b***'),
(8, 'tai', 't**');

-- --------------------------------------------------------

--
-- Table structure for table `slide_image`
--

DROP TABLE IF EXISTS `slide_image`;
CREATE TABLE IF NOT EXISTS `slide_image` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `type_slide` varchar(20) NOT NULL,
  `data_x` varchar(10) NOT NULL,
  `data_y` varchar(10) NOT NULL,
  `data_scale` varchar(5) NOT NULL,
  `data_rotate` varchar(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slide_image`
--

INSERT INTO `slide_image` (`id_slide`, `keterangan`, `filename`, `type_slide`, `data_x`, `data_y`, `data_scale`, `data_rotate`, `aktif`) VALUES
(1, 'Tanpa Perlu Memikirkan Code', '1.png', 'intro', '0', '0', '', '', 'Y'),
(2, 'Sintak Pemrogramman Tidak Akan Terjadi  Error', '4.png', 'capture', '0', '1200', '0.1', '360', 'Y'),
(3, 'Alat Teknologi untuk Dunia Programming', '3.png', 'view', '-300', '1400', '0.1', '270', 'Y'),
(4, 'Pekerjaan Program Menjadi Efektif Dan Efisien', 'slider-3.png', 'view', '-2200', '9000', '1.0', '360', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sosial_media`
--

DROP TABLE IF EXISTS `sosial_media`;
CREATE TABLE IF NOT EXISTS `sosial_media` (
  `id_sosmed` int(11) NOT NULL AUTO_INCREMENT,
  `nama_situs` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_sosmed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

DROP TABLE IF EXISTS `statistik`;
CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `bulan`, `tahun`, `hits`, `online`) VALUES
('127.0.0.1', '2015-01-27', '2015-01', '2015', 129, '1422369232'),
('127.0.0.1', '2015-01-26', '2015-01', '2015', 384, '1422290305'),
('127.0.0.1', '2015-01-28', '2015-01', '2015', 48, '1422454226'),
('127.0.0.1', '2015-01-30', '2015-01', '2015', 18, '1422636355'),
('127.0.0.1', '2015-02-01', '2015-02', '2015', 23, '1422780210'),
('127.0.0.1', '2015-02-04', '2015-02', '2015', 12, '1423055324'),
('127.0.0.1', '2015-02-06', '2015-02', '2015', 9, '1423223491'),
('127.0.0.1', '2015-02-08', '2015-02', '2015', 39, '1423413062'),
('127.0.0.1', '2015-02-09', '2015-02', '2015', 14, '1423471702');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_forum`
--

DROP TABLE IF EXISTS `tanggapan_forum`;
CREATE TABLE IF NOT EXISTS `tanggapan_forum` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_topik` int(11) NOT NULL,
  `id_member` int(50) NOT NULL,
  `tanggapan` text NOT NULL,
  `tanggal_tanggapan` date NOT NULL,
  `hari` varchar(15) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tanggapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_profesi` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(11) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `aktif` enum('Y','N') NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `first_name`, `last_name`, `username`, `password`, `id_profesi`, `image`, `email`, `gender`, `tgl_lahir`, `alamat`, `no_hp`, `level`, `last_login`, `aktif`, `online`) VALUES
(1, 'Administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'naytea.jpg', 'ibeesnay@yahoo.com', 'L', '1996-09-13', 'Tarikolot', '082218869439', 'admin', '2015-02-09 10:08:01', 'Y', 1),
(3, 'Sunardi', '', 'Ibeesnay', '7ad569fe16541f453dd83717ce04ee81', 3, 'kaca.jpg', 'ibeesnay@yahoo.com', 'L', '1996-09-13', 'Tarikolot', '082218869439', 'user', '2015-01-27 21:15:33', 'Y', 0),
(5, 'Lukiyanto', ' ', 'lukiyanto', '05ceebd9bc79dc7cc42463927c2bced4', 4, 'smoke.jpg', 'lukiyanto@yahoo.com', 'L', '1996-01-04', 'Lukiyanto', '082218869439', 'user', '2015-01-27 21:08:15', 'Y', 0),
(6, 'Dede', 'Supriadi', 'dede', 'b4be1c568a6dc02dcaf2849852bdb13e', 2, 'nay1.jpg', 'dede@yahoo.com', 'L', '1996-01-04', 'Mananti', '082218869439', 'user', '2015-01-27 21:05:33', 'Y', 0),
(7, 'Agis Rahma', 'Herdiana', 'agis', 'ea97c1040f4405b9c9466b60fdd9fdf4', 5, 'naydi.jpg', 'ibees@yahoo.com', 'L', '1996-01-04', 'Godabaya', '082218869439', 'user', '2015-01-27 21:07:40', 'Y', 0);


-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `keterangan`, `gambar`, `aktif`) VALUES
(1, 'Standar Template', 'IBeESNay', 'templates/default', 'Responsive web dengan desain elegan dan kombinasi yang sangat cocok', 'untitled.PNG', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `topik_forum`
--

DROP TABLE IF EXISTS `topik_forum`;
CREATE TABLE IF NOT EXISTS `topik_forum` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `pembaca` int(11) NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `topik_forum`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

