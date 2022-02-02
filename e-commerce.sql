-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 01:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(9) NOT NULL,
  `Kd_Customer` varchar(12) NOT NULL,
  `Customer` varchar(25) NOT NULL,
  `Alamat` text NOT NULL,
  `Kd_Kota` int(5) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Gabung` date NOT NULL,
  `Jenkel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `Kd_Customer`, `Customer`, `Alamat`, `Kd_Kota`, `Telp`, `Email`, `Gabung`, `Jenkel`) VALUES
(1, 'CST001', 'Ester Asmelita Sitio', 'Jl.Raya perumnas No 12, Karawaci', 2, '0895322377425', 'esterasmelita@gmail.com', '2020-08-12', 'Wanita'),
(2, 'CST002', 'Alfiyyah Munawaroh', 'Jl. Raya Dewi Sartika No 22, Cempaka Putih', 1, '0895322377420', 'widhi@gmail.com', '2020-08-12', 'Wanita'),
(3, 'CST003', 'Angga Dwitama Putra', 'Jl. Raya Serpong No 35, Perumahan Anggrek', 2, '0895322377450', 'angga@gmail.com', '2020-08-25', 'Pria'),
(4, 'CST004', 'Diaz Eka Renata Putra', 'Jl Raya Dago No12, Cileungsi', 1, '0895322377412', 'diazrenata@gmail.com', '2020-08-25', 'Pria'),
(5, 'CST005', 'Widhityas Aprilia', 'Jl. Raya Cilegon No 105, Perumahan PCI', 4, '0878722377421', 'widhityas@gmail.com', '2020-08-25', 'Wanita'),
(6, 'CST006', 'Makmur raya', 'Jl. Raya Dewi Sartika No 50, Perumahan Santika', 3, '0895322377321', 'makmurraaya05@gmail.com', '2020-08-25', 'Pria'),
(7, 'CST007', 'Tomy Fajar Anshory', 'Jl. Raya Sepatan No 100, Perumahan Bukit Tiara', 2, '0895322377460', 'Tomyfajar@gmail.com', '2020-08-25', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jasakirim`
--

CREATE TABLE `tbl_jasakirim` (
  `id_jasa` int(9) NOT NULL,
  `Kd_Jasa` varchar(9) NOT NULL,
  `Nama_Jasa` varchar(25) NOT NULL,
  `Durasi` varchar(25) NOT NULL,
  `Ongkir` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jasakirim`
--

INSERT INTO `tbl_jasakirim` (`id_jasa`, `Kd_Jasa`, `Nama_Jasa`, `Durasi`, `Ongkir`) VALUES
(1, '01', 'JNE (OKE)', '3-4 hari', 5000),
(2, '02', 'JNE (REG)', '2-3 hari', 7000),
(3, '03', 'JNE (YES)', '1-2 Hari', 10000),
(4, '04', 'JNE (Super Speed)', '1 Hari', 12000),
(5, '05', 'TIKI (ECO)', '6-7 Hari', 8000),
(6, '06', 'TIKI (REG)', '5-6 Hari', 10000),
(7, '07', 'TIKI (ONS)', '2-3 Hari', 15000),
(8, '08', 'TIKI (Same Day Service)', '1 Hari', 20000),
(9, '09', 'SICEPAT (ECO)', '3-4 Hari', 10000),
(10, '010', 'SICEPAT (REG)', '2-3 Hari', 12000),
(11, '011', 'SICEPAT (BEST)', '1-2 HARI', 15000),
(12, '012', 'SICEPAT (SUPER EXPRESS)', '1 HARI', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(9) NOT NULL,
  `Kd_Kategori` varchar(9) NOT NULL,
  `Kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `Kd_Kategori`, `Kategori`) VALUES
(1, '01', 'Perawatan Wajah'),
(2, '02', 'Perawatan Tubuh'),
(3, '03', 'Suplemen Tubuh'),
(4, '04', 'Kosmetik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kirim`
--

CREATE TABLE `tbl_kirim` (
  `id_kirim` int(9) NOT NULL,
  `Kd_Customer` varchar(15) NOT NULL,
  `Kd_Invoice` varchar(25) NOT NULL,
  `Penyedia_Jasa` varchar(25) NOT NULL,
  `Status_Kirim` varchar(15) NOT NULL,
  `Estimasi_Waktu` varchar(15) NOT NULL,
  `Bukti_Kirim` varchar(15) NOT NULL,
  `Tanggal_Kirim` date NOT NULL,
  `Total_Fee` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kirim`
--

INSERT INTO `tbl_kirim` (`id_kirim`, `Kd_Customer`, `Kd_Invoice`, `Penyedia_Jasa`, `Status_Kirim`, `Estimasi_Waktu`, `Bukti_Kirim`, `Tanggal_Kirim`, `Total_Fee`) VALUES
(2, 'CST001', 'INV/BRG/1/2020', 'JNE (Super Speed)', 'Done', '1 Hari', 'SICEPAT 2.png', '2020-08-26', 177000),
(3, 'CST002', 'INV/BRG/2/2020', 'SICEPAT (SUPER EXPRESS)', 'Done', '1 HARI', 'SICEPAT 3.jpg', '2020-08-26', 280000),
(4, 'CST003', 'INV/BRG/3/2020', 'TIKI (Same Day Service)', 'Done', '1 Hari', 'TIKI 2.jpg', '2020-08-26', 225000),
(5, 'CST004', 'INV/BRG/4/2020', 'SICEPAT (BEST)', 'Pending', '1-2 HARI', 'SICEPAT.jpg', '2020-08-27', 225000),
(6, 'CST005', 'INV/BRG/5/2020', 'JNE (REG)', 'Done', '2-3 hari', 'JNE1.jpg', '2020-08-28', 477000),
(7, 'CST006', 'INV/BRG/6/2020', 'TIKI (ONS)', 'Done', '2-3 Hari', 'TIKI 3.jpg', '2020-08-28', 240000),
(8, 'CST007', 'INV/BRG/7/2020', 'SICEPAT (BEST)', 'Done', '1-2 HARI', 'JNE3.jpg', '2020-08-27', 305000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id_kota` int(5) NOT NULL,
  `Kd_Kota` int(5) NOT NULL,
  `Kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `Kd_Kota`, `Kota`) VALUES
(1, 1, 'Bandung'),
(2, 2, 'Tangerang'),
(3, 3, 'Jakarta'),
(4, 4, 'Serang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_beli` int(10) NOT NULL,
  `Kd_Barang` varchar(12) NOT NULL,
  `Kd_Customer` varchar(12) NOT NULL,
  `Jumlah_Barang` int(8) NOT NULL,
  `Harga_Jual` int(12) NOT NULL,
  `Total_Bayar` int(12) NOT NULL,
  `Kd_Invoice` varchar(25) NOT NULL,
  `Status_Beli` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_beli`, `Kd_Barang`, `Kd_Customer`, `Jumlah_Barang`, `Harga_Jual`, `Total_Bayar`, `Kd_Invoice`, `Status_Beli`) VALUES
(3, '01', 'CST001', 1, 45000, 45000, 'INV/BRG/1/2020', 'Proses Beli'),
(4, '020', 'CST001', 1, 50000, 50000, 'INV/BRG/1/2020', 'Proses Beli'),
(5, '09', 'CST001', 2, 70000, 70000, 'INV/BRG/1/2020', 'Proses Beli'),
(6, '08', 'CST002', 1, 200000, 200000, 'INV/BRG/2/2020', 'Proses Beli'),
(7, '07', 'CST002', 1, 60000, 60000, 'INV/BRG/2/2020', 'Proses Beli'),
(8, '020', 'CST003', 2, 100000, 100000, 'INV/BRG/3/2020', 'Proses Beli'),
(9, '01', 'CST003', 1, 45000, 45000, 'INV/BRG/3/2020', 'Proses Beli'),
(10, '06', 'CST003', 1, 60000, 60000, 'INV/BRG/3/2020', 'Proses Beli'),
(11, '02', 'CST004', 1, 50000, 50000, 'INV/BRG/4/2020', 'Proses Beli'),
(12, '020', 'CST004', 1, 50000, 50000, 'INV/BRG/4/2020', 'Proses Beli'),
(13, '018', 'CST004', 1, 50000, 50000, 'INV/BRG/4/2020', 'Proses Beli'),
(14, '015', 'CST004', 1, 60000, 60000, 'INV/BRG/4/2020', 'Proses Beli'),
(15, '010', 'CST005', 1, 105000, 105000, 'INV/BRG/5/2020', 'Proses Beli'),
(16, '03', 'CST005', 1, 105000, 105000, 'INV/BRG/5/2020', 'Proses Beli'),
(17, '011', 'CST005', 1, 60000, 60000, 'INV/BRG/5/2020', 'Proses Beli'),
(18, '012', 'CST005', 1, 200000, 200000, 'INV/BRG/5/2020', 'Proses Beli'),
(19, '011', 'CST006', 1, 60000, 60000, 'INV/BRG/6/2020', 'Proses Beli'),
(20, '016', 'CST006', 1, 75000, 75000, 'INV/BRG/6/2020', 'Proses Beli'),
(21, '01', 'CST006', 2, 90000, 90000, 'INV/BRG/6/2020', 'Proses Beli'),
(22, '018', 'CST007', 1, 50000, 50000, 'INV/BRG/7/2020', 'Proses Beli'),
(23, '017', 'CST007', 3, 180000, 180000, 'INV/BRG/7/2020', 'Proses Beli'),
(24, '04', 'CST007', 1, 60000, 60000, 'INV/BRG/7/2020', 'Proses Beli');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesan` int(9) NOT NULL,
  `Kd_Barang` varchar(10) NOT NULL,
  `Kd_Customer` varchar(10) NOT NULL,
  `Jumlah` int(7) NOT NULL,
  `Harga_Jual` int(12) NOT NULL,
  `Tanggal_Pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_barang` int(10) NOT NULL,
  `Kd_Barang` varchar(8) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Kd_Kategori` varchar(4) NOT NULL,
  `Kd_Supplier` varchar(4) NOT NULL,
  `Tanggal_Beli` date NOT NULL,
  `Stok` int(4) NOT NULL,
  `Harga_Beli` int(12) NOT NULL,
  `Harga_Jual` int(20) NOT NULL,
  `Foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_barang`, `Kd_Barang`, `Nama`, `Deskripsi`, `Kd_Kategori`, `Kd_Supplier`, `Tanggal_Beli`, `Stok`, `Harga_Beli`, `Harga_Jual`, `Foto`) VALUES
(1, '01', 'Deodorant Spray', 'Dapat mengetasi bau badan, serta dapat mencerahkan kulit ketiak tanpa meninggalkan noda kuning pada baju ', '02', '01', '2020-05-01', 32, 40000, 45000, 'SR12G.jpg'),
(2, '02', 'Cofee Lulur Scrub', 'Dapat mengangkat kotoran dan sel kulit mati, melembabkan, mencerahkan, mengahaluskan, serta menghilangkan noda hitam pada kulit tubuh', '02', '01', '2020-05-01', 63, 45000, 50000, 'lulur.jpg'),
(4, '04', 'Suncare White Lotion', 'Melindungi wajah dari paparan langsung sinar matahari, menjaga kulit tetap cerah dan sehat, menjaga kelembaban kulit, serta mencegah kanker kulit', '01', '01', '2020-05-01', 90, 55000, 60000, 'suncare2.jpg'),
(5, '05', 'Micellar Water', 'Membersihkan sisa make up dan kotoran pada wajah, melembabkan, menjadikan wajah bersih tanpa meninggalkan rasa berminyak pada wajah', '01', '01', '2020-05-01', 59, 40000, 45000, 'SR12N.jpg'),
(6, '06', 'Vico Capsule', 'Mengatasi gangguan kulit akibat jamur dan bekteri, membantu menstimulus sistem kekebalan tubuh, serta menyehatkan pencernaan', '03', '02', '2020-05-05', 73, 55000, 60000, 'vico2.jpg'),
(7, '07', 'Salimah Slim', 'Melangsingkan dan mengurangi lemak pada tubuh, menurunkan kolestrol dan asam urat, membersihkan racun didalam tubuh, serta melancarkan pencernaan', '03', '02', '2020-05-05', 82, 55000, 60000, 'SR12L.jpg'),
(9, '09', 'Lipcare Natural', 'Mengatasi bibir kering dan pecah-pecah, mengembalikan warna asal bibir, mengangkat sel kulit mati, serta sebagai pelembab bibir alami', '04', '02', '2020-05-05', 66, 30000, 35000, 'lip2.jpg'),
(10, '010', 'Lipcream Matte', 'Mudah diaplikasikan dengan menggunakan aplikator, longlasting dengan tekstur  yang creamy, mencegah  bibir kering , memberikan warna yang natural,  serta tahan lama dibandingkan lipstik yang lainnya', '04', '02', '2020-05-05', 47, 100000, 105000, 'SR12Q.jpg'),
(11, '011', 'Acne Totol', 'Dengan bahan utama sulfur ,mampu mengobati jerawat, mengempeskan jerawat, serta mengeringkan jerawat secara alami', '01', '01', '2020-06-01', 92, 55000, 60000, 'creamacne.jpg'),
(12, '012', 'Acne Serum Collagen', 'Dengan kandungan collagen dapat menyamarkan bekas jerawat, mencegah adanya jerawat, serta membuat wajah lebih glowing dan cerah', '01', '01', '2020-06-01', 94, 150000, 200000, 'serumjerawat.jpg'),
(14, '014', 'Milk Cleanser', 'Dapat membersihkan wajah, sisa-sisa make up, serta minyak yang menemel pada wajah', '01', '01', '2020-06-01', 94, 30000, 35000, 'milkcleanser.jpg'),
(15, '015', 'Sunblock Gold', 'Melindungi kulit dari sinar UV A dan UV B, melembabkan, mencerahkan, serta mengencangkan kulit wajah', '01', '01', '2020-06-01', 31, 55000, 60000, 'sunblock.jpg'),
(16, '016', 'Manjakani White', 'Dapat mengatasi keputihan, nyeri haid, haid tidak lancar, merepatkan organ intim, serta menghialngkan bau tidak sedap', '03', '02', '2020-06-20', 95, 70000, 75000, 'manjakani.jpg'),
(17, '017', 'Body Wash Aloevera', 'menjadikan kulit tubuh bersih dan segar, membantu meningkatkan kekencangan kulit , melembabkan, serta mencerahkan kulit tubuh', '02', '01', '2020-06-20', 40, 55000, 60000, 'body2.jpg'),
(18, '018', 'Facial Wash Greentea', 'Membantu mengindari kulit dari radikal bebas, menutrisi kulit, membersihkan kulit secara menyeluruh, serta , membuat kuit tampak lebih cerah', '01', '02', '2020-06-20', 49, 45000, 50000, 'facialwash.jpg'),
(19, '019', 'Revitalizing Serum', 'membantu Mencerahkan dan membuat kulit wajah lebih glowing, mencegah timbulnya jerawat, serta mengatasi bopeng pada kulit wajah', '01', '02', '2020-06-20', 94, 85000, 90000, 'serum.jpg'),
(20, '020', 'Honey Body Lotion', 'Membuat kulit tampak lebih cerah dan halus, serta dapat mengetasi noda-noda hitam pada kulit tubuh, serta melembabkan kulit tubuh', '02', '02', '2020-06-20', 21, 45000, 50000, 'bodylotion.jpg'),
(22, '03', 'Exclusive Compact Powder', 'Membuat make up lebih tahan lama, melembabbkan kulit, serta menutupi flek dan noda hitam pada kulit wajah', '04', '01', '2020-05-01', 47, 100000, 105000, 'SR12P.jpg'),
(23, '08', 'Cream Krasny Day & Night', 'Mencerahkan Kulit, membuat kulit lebih glowwing, melembabkan kulit, serta sebagai anti aging, dan mengencangkan kulit wajah', '01', '02', '2020-06-01', 61, 150000, 200000, 'krasnycream.jpg'),
(24, '013', 'Toner Chemomille Extract', 'Memberikan nutrisi untuk kulit, menyegarkan,  melembabkan kulit, serta mencerahkan kulit wajah', '04', '02', '2020-06-20', 48, 30000, 35000, 'toner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(9) NOT NULL,
  `Kd_Supplier` varchar(9) NOT NULL,
  `Nama_Supplier` varchar(25) NOT NULL,
  `Telp` varchar(25) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `Kd_Supplier`, `Nama_Supplier`, `Telp`, `Alamat`) VALUES
(1, '01', 'SR12 IMIKA SKINCARE', '082125778219', 'JL. Pulau Gebang Raya No 100 Jakarta Pusat'),
(2, '02', 'SR12 CANTIKA SKINCARE', '021665735612', 'JL. Raya Cengkareng Raya No 125 Jakarta Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `Tanggal_Bayar` date NOT NULL,
  `Jumlah_Barang` int(8) NOT NULL,
  `Total_Beli` int(12) NOT NULL,
  `Fee_Kirim` int(25) NOT NULL,
  `Total_Bayar` int(25) NOT NULL,
  `Bukti_Bayar` varchar(25) NOT NULL,
  `Status_Bayar` varchar(10) NOT NULL,
  `Kd_Invoice` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `Tanggal_Bayar`, `Jumlah_Barang`, `Total_Beli`, `Fee_Kirim`, `Total_Bayar`, `Bukti_Bayar`, `Status_Bayar`, `Kd_Invoice`) VALUES
(2, '2020-08-25', 4, 165000, 12000, 177000, 'A1.png', 'Konfirmasi', 'INV/BRG/1/2020'),
(3, '2020-08-25', 2, 260000, 20000, 280000, 'A2.png', 'Konfirmasi', 'INV/BRG/2/2020'),
(4, '2020-08-25', 4, 205000, 20000, 225000, 'A3.png', 'Konfirmasi', 'INV/BRG/3/2020'),
(5, '2020-08-25', 4, 210000, 15000, 225000, 'B1.png', 'Konfirmasi', 'INV/BRG/4/2020'),
(6, '2020-08-25', 4, 470000, 7000, 477000, 'B2.png', 'Konfirmasi', 'INV/BRG/5/2020'),
(7, '2020-08-25', 4, 225000, 15000, 240000, 'B3.png', 'Konfirmasi', 'INV/BRG/6/2020'),
(8, '2020-08-25', 5, 290000, 15000, 305000, 'C1.png', 'Konfirmasi', 'INV/BRG/7/2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '12345', 'Administrator'),
(2, 'CST001', '12345', 'Ester Asmelita Sitio'),
(3, 'CST002', '12345', 'Alfiyyah Munawaroh'),
(4, 'CST003', '54321', 'Angga Dwitama Putra'),
(5, 'CST004', '12345', 'Diaz Eka Renata Putra'),
(6, 'CST005', '12345', 'Widhityas Aprilia'),
(7, 'CST006', '12345', 'Makmur raya'),
(8, 'CST007', '12345', 'Tomy Fajar Anshory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_jasakirim`
--
ALTER TABLE `tbl_jasakirim`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kirim`
--
ALTER TABLE `tbl_kirim`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_jasakirim`
--
ALTER TABLE `tbl_jasakirim`
  MODIFY `id_jasa` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_kirim`
--
ALTER TABLE `tbl_kirim`
  MODIFY `id_kirim` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesan` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;