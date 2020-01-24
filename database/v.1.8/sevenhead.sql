-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jan 2020 pada 15.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sevenhead`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(80) NOT NULL,
  `admin_alamat` varchar(100) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_telpon` varchar(15) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_alamat`, `admin_email`, `admin_telpon`, `admin_image`, `admin_password`) VALUES
(1, 'Roki Prasetyo Adi', 'Jember', 'rokiprasetyoadi@gmail.com', '089608560667', '1.png', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `customers_nama` varchar(255) NOT NULL,
  `customers_email` varchar(128) NOT NULL,
  `customers_password` varchar(255) NOT NULL,
  `customers_alamat` text DEFAULT NULL,
  `provinsi_id` int(2) NOT NULL,
  `customers_provinsi` varchar(60) DEFAULT NULL,
  `kota_id` int(2) NOT NULL,
  `customers_kota` varchar(60) DEFAULT NULL,
  `customers_kodepos` int(11) DEFAULT NULL,
  `customers_nohp` varchar(25) DEFAULT NULL,
  `customers_status` int(1) NOT NULL,
  `customers_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customers_id`, `customers_nama`, `customers_email`, `customers_password`, `customers_alamat`, `provinsi_id`, `customers_provinsi`, `kota_id`, `customers_kota`, `customers_kodepos`, `customers_nohp`, `customers_status`, `customers_created`) VALUES
(15, 'Rizmawan Widi Wiranata', 'jackhoppus666@gmail.com', '$2y$10$/HVCuHKSEpVeR8YE4hIsveXTauZyaU7PHYFYcYSEwEe2v0W3KE9Ye', NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2020-01-12 13:22:38'),
(16, 'Alfarezha Diaz Mahendra', 'alfarezhadiaz@gmail.com', '$2y$10$6BkAEaO3cytqc9PyZjvXOONleNA4Q/wrViu84/W73MVrOG9saQS.G', NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2020-01-12 13:24:33'),
(17, 'Ferdian Nada', 'ferdian.nadda@gmail.com', '$2y$10$B4sAKcPuK6a4P1WKlE32ZeBYkjJ/emZy9wgpmRplUwJ2fcCIYHvaW', 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02', 11, 'Jawa Timur', 42, 'Kabupaten Banyuwangi', 68468, '082230270872', 1, '2020-01-12 13:26:22'),
(18, 'Moch Zainur Rofan', 'Sasajeen@gmai.com', '$2y$10$Do4paiNcJFTvP99cUppy6uLO5VbuOBh.kzHVvJ/d7olhnW5dUN34i', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '2020-01-12 13:27:30'),
(19, 'Aditya Ramadhan', 'Leahalrick@gmail.com', '$2y$10$GR/VxWHg0lBhcTSWk8iYNeDqf94n5MUG1Ub6Wiz.YZFyJOEmVLiMC', NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2020-01-12 13:28:15'),
(20, 'Roki Prasetyo Adi', 'rokiprasetyoadi@gmail.com', '$2y$10$ttgNIrEGHLu0b9CqG9pPx.VXEgf5w6hXAipWxBc/D28CfP89Y/tnq', NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2020-01-12 13:29:23'),
(21, 'ropan', 'ropan@gmail.com', '$2y$10$J/va.NKzeDZWK9BsZ8fMIevlfeTjIqXwgCIYMkqNprgSVSzzz7F8a', NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2020-01-13 09:48:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers_token`
--

CREATE TABLE `customers_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers_token`
--

INSERT INTO `customers_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'asjdh@gml.c', 'Zap+Khsd00Fl0Odb1hsEzvOWw6GEvILq3V2SGA8xz2g=', 1576512426),
(4, 'nun@nun.com', 'ZGECMlUvKXm1/Y+0hO7JtXZM2vhs/f2FpJOrI60E+9w=', 1576664991),
(5, 'sudi@gmail.com', '8Z1HYS1zqYya17hdhlASUg9BekBxf/r6JC7cQR5YsnE=', 1576839274),
(6, 'ferdian.nadda@gmail.com', '+xylGKi7uV7mrBZiydrq47jEfwYgaeof7hitwb3U6JU=', 1578835582),
(7, 'Sasajeen@gmai.com', 'nEHJwKjTbX8ae7Mf2uDv2SzWcGHQSC9znMjPbfcNaDE=', 1578835650),
(8, 'Leahalrick@gmail.com', 'momv2KjkTfSm5OzOUpkCEg8Vrj/PKIcuLqdI8Ma/m24=', 1578835695),
(9, 'rokiprasetyoadi@gmail.com', 'iQ1XGjCPaWiZuEFXwquLaaWd20Aaccga77xdB6H/FsM=', 1578835763),
(10, 'ropan@gmail.com', 'OEtgXtstPzcU7VSeVyVrlOmTfeEPGAhg9yxGoLy7bTw=', 1578908902),
(11, 'ferdian.nadda@gmail.com', 'vjCkD9p1DbhpfnsWC3hwpCm2EaTIaycM1QNvt2b4PHI=', 1579581350),
(12, 'ferdian.nadda@gmail.com', 'ObEUKOgRrg3aEHeFNPir3P7ZyRebvtDSBXoZrbS5+LA=', 1579592226);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` varchar(12) NOT NULL,
  `galeri_nama` text NOT NULL,
  `galeri_image` varchar(255) NOT NULL,
  `galeri_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_nama`, `galeri_image`, `galeri_keterangan`) VALUES
('G12012020001', 'Style 1', 'G12012020001.jpg', ''),
('G12012020002', 'Style 2', 'G12012020002.jpg', ''),
('G12012020003', 'Style 3', 'G12012020003.jpg', ''),
('G12012020005', 'Style 5', 'G12012020005.jpg', ''),
('G12012020007', 'Style 4', 'G12012020007.jpg', ''),
('G12012020008', 'Style 6', 'G12012020008.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` varchar(12) NOT NULL,
  `karyawan_nama` text NOT NULL,
  `karyawan_image` varchar(255) NOT NULL,
  `karyawan_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `karyawan_nama`, `karyawan_image`, `karyawan_keterangan`) VALUES
('K12012020002', 'Firli Firdaus', 'K12012020002.jpg', 'Barbershop is not a hobby, it\'s a lifestyle.'),
('K12012020003', 'Bustomy Alamsyah', 'K12012020003.jpg', 'Jangan Lupa Bercukur !!!'),
('K12012020004', 'Roy Sucipto', 'K12012020004.jpg', 'Good Look Bring Luck'),
('K12012020005', 'Benny Firmansyah', 'K12012020005.jpg', '100% Asli Tukang Cukur'),
('K12012020006', 'Rinanda Dwi Prayoga', 'K12012020006.jpg', 'Ndassmuu Weeleek!! Ayo Cukur'),
('K12012020007', 'Anugrah Ali ', 'K12012020007.jpg', 'Shear ! Shave ! Shine !'),
('K12012020008', 'Ahmad Soleh', 'K12012020008.jpg', 'Cukur, Sisiran, Cek Ganteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Pomade'),
(2, 'Spray'),
(5, 'Scissor'),
(6, 'Brush');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(128) NOT NULL,
  `supplier_email` varchar(80) NOT NULL,
  `supplier_nohp` varchar(50) NOT NULL,
  `supplier_alamat` varchar(255) NOT NULL,
  `supplier_keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_email`, `supplier_nohp`, `supplier_alamat`, `supplier_keterangan`) VALUES
(9, 'Yunan', 'yunan12@gmail.com', '08113717299', 'Jember', 'Pomade'),
(11, 'Anugrah Ganda', 'NugrahGg@gmail.com', '08113717255', 'Lumajang', 'Pomade'),
(12, 'Raditya Arif', 'Radit16@gmail.com', '08117527966', 'Jember', 'Shampo'),
(13, 'Sauqie', 'MSauqie@gmail.com', '08114586544', 'Jember', 'Vitamin Hair'),
(15, 'Novan doajung', 'Novanganker@gmail.com', '08912671577', 'Jember', 'Sisir dan Pomade');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_kategori_id` int(11) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `barang_desc` text NOT NULL,
  `barang_harjul_grosir` double NOT NULL,
  `barang_harjul` double NOT NULL,
  `barang_image` varchar(255) NOT NULL,
  `barang_stok` int(11) NOT NULL DEFAULT 0,
  `barang_min_stok` int(11) NOT NULL DEFAULT 0,
  `barang_tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `barang_tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_kategori_id`, `barang_nama`, `barang_desc`, `barang_harjul_grosir`, `barang_harjul`, `barang_image`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_update`) VALUES
('BR050120200001', 1, 'Pomade Barber Strong', '', 50000, 53000, 'BR050120200001.jpg', 15, 5, '2020-01-05 13:43:28', '2020-01-12 03:31:53'),
('BR050120200002', 1, 'Wahl Hair Pomade', '', 60000, 65000, 'BR050120200002.jpg', 20, 10, '2020-01-05 13:44:20', '0000-00-00 00:00:00'),
('BR050120200004', 1, 'Pomade Uppercut', '', 60000, 65000, 'BR050120200004.jpg', 10, 5, '2020-01-05 13:45:29', '0000-00-00 00:00:00'),
('BR050120200005', 2, 'Flairosol Water Spray', '', 30000, 33000, 'BR050120200005.jpg', 6, 5, '2020-01-05 13:46:08', '0000-00-00 00:00:00'),
('BR050120200006', 2, 'Water Spray Barbershop', '', 25000, 30000, 'BR050120200006.jpg', 3, 5, '2020-01-05 13:46:47', '0000-00-00 00:00:00'),
('BR050120200007', 2, 'Water Spray Jack Daniel', '', 40000, 43000, 'BR050120200007.jpeg', 11, 5, '2020-01-05 13:47:22', '2020-01-05 14:01:53'),
('BR050120200008', 6, 'Cestomen Brush', '', 15000, 18000, 'BR050120200008.jpg', 7, 5, '2020-01-05 13:48:06', '2020-01-05 14:02:20'),
('BR050120200009', 6, 'Neck Face Duster', '', 12000, 15000, 'BR050120200009.jpg', 10, 5, '2020-01-05 13:49:49', '0000-00-00 00:00:00'),
('BR050120200010', 6, 'Shaving Brush Barbershop', '', 20000, 23000, 'BR050120200010.jpeg', 5, 5, '2020-01-05 13:50:44', '2020-01-05 14:01:22'),
('BR050120200011', 5, 'Knifezer Scissor', '', 43000, 45000, 'BR050120200011.jpg', 8, 5, '2020-01-05 13:51:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_brgmasuk`
--

CREATE TABLE `tbl_brgmasuk` (
  `brgmasuk_nota` varchar(128) NOT NULL,
  `brgmasuk_supplier_id` int(11) NOT NULL,
  `brgmasuk_keterangan` text NOT NULL,
  `brgmasuk_tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_brgmasuk`
--

INSERT INTO `tbl_brgmasuk` (`brgmasuk_nota`, `brgmasuk_supplier_id`, `brgmasuk_keterangan`, `brgmasuk_tgl`) VALUES
('BRM120120200001', 9, 'Pomade', '2020-01-12 20:41:21'),
('BRM120120200002', 11, 'Pomade', '2020-01-12 20:44:36'),
('BRM120120200004', 12, 'pomade', '2020-01-12 20:46:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `customers_id`) VALUES
(14, 10),
(15, 11),
(16, 12),
(17, 13),
(18, 14),
(19, 17),
(20, 18),
(21, 19),
(22, 20),
(23, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `c_detail_id` int(11) NOT NULL,
  `c_cart_id` int(11) NOT NULL,
  `barang_id` varchar(15) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `c_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`c_detail_id`, `c_cart_id`, `barang_id`, `qty`, `c_price`) VALUES
(1, 18, 'BR001', 2, 300000),
(6, 15, 'BR010120200002', 4, 68000),
(8, 15, 'BR010120200001', 3, 36000),
(40, 23, 'BR050120200001', 5, 265000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailbrgmasuk`
--

CREATE TABLE `tbl_detailbrgmasuk` (
  `detailmasuk_brgmasuk_nota` varchar(128) NOT NULL,
  `detailmasuk_barang_id` varchar(20) NOT NULL,
  `detailmasuk_harpok` double NOT NULL,
  `detailmasuk_jumlah` double NOT NULL,
  `detailmasuk_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailbrgmasuk`
--

INSERT INTO `tbl_detailbrgmasuk` (`detailmasuk_brgmasuk_nota`, `detailmasuk_barang_id`, `detailmasuk_harpok`, `detailmasuk_jumlah`, `detailmasuk_subtotal`) VALUES
('BRM010120200001', 'BR010120200001', 6789, 30, 203670),
('BRM010120200001', 'BR010120200002', 223, 10, 2230),
('BRM120120200001', 'BR050120200002', 80000, 5, 400000),
('BRM120120200001', 'BR050120200001', 50000, 5, 250000),
('BRM120120200001', 'BR050120200002', 80000, 5, 400000),
('BRM120120200002', 'BR050120200004', 80000, 2, 160000),
('BRM120120200004', 'BR050120200007', 20000, 2, 40000);

--
-- Trigger `tbl_detailbrgmasuk`
--
DELIMITER $$
CREATE TRIGGER `delete_stok` AFTER DELETE ON `tbl_detailbrgmasuk` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET tbl_barang.barang_stok = tbl_barang.barang_stok - OLD.detailmasuk_jumlah
    WHERE barang_id = OLD.detailmasuk_barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `tbl_detailbrgmasuk` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET barang_stok= barang_stok + NEW.detailmasuk_jumlah
    WHERE barang_id = NEW.detailmasuk_barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER UPDATE ON `tbl_detailbrgmasuk` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET barang_stok = barang_stok + (NEW.detailmasuk_jumlah - OLD.detailmasuk_jumlah)
    WHERE barang_id = NEW.detailmasuk_barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpenjualan`
--

CREATE TABLE `tbl_detailpenjualan` (
  `detailjual_nofak` varchar(30) NOT NULL,
  `detailjual_barang_id` varchar(20) NOT NULL,
  `detailjual_qty` int(11) NOT NULL,
  `detailjual_diskon` int(11) DEFAULT 0,
  `detailjual_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailpenjualan`
--

INSERT INTO `tbl_detailpenjualan` (`detailjual_nofak`, `detailjual_barang_id`, `detailjual_qty`, `detailjual_diskon`, `detailjual_subtotal`) VALUES
('FR2401201028450001', 'BR050120200002', 1, 0, 65000),
('FR2401201234110002', 'BR050120200007', 1, 0, 43000),
('FR2401201234110002', 'BR050120200005', 1, 0, 33000),
('FR2401201240080003', 'BR050120200005', 1, 0, 33000),
('FR2401200230510004', 'BR050120200005', 1, 0, 33000),
('FR2401200327120005', 'BR050120200002', 1, 0, 65000),
('FR2401200632140006', 'BR050120200006', 1, 0, 30000),
('FR2401200649100007', 'BR050120200005', 1, 0, 33000),
('FR2401200912390008', 'BR050120200006', 1, 0, 30000);

--
-- Trigger `tbl_detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `cancel_stok` AFTER DELETE ON `tbl_detailpenjualan` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET tbl_barang.barang_stok = tbl_barang.barang_stok + OLD.detailjual_qty
    WHERE barang_id = OLD.detailjual_barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tbl_detailpenjualan` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET barang_stok= barang_stok - NEW.detailjual_qty
    WHERE barang_id = NEW.detailjual_barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_customers_id` int(11) NOT NULL,
  `pembayaran_jual_id` varchar(30) NOT NULL,
  `pembayaran_norek` varchar(128) NOT NULL,
  `pembayaran_bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`pembayaran_id`, `pembayaran_customers_id`, `pembayaran_jual_id`, `pembayaran_norek`, `pembayaran_bukti`) VALUES
(15, 17, 'FR2401201234110002', '9489137414', 'FR2401201234110002.jpg'),
(18, 17, 'FR2401200327120005', '9489137414', ''),
(19, 17, 'FR2401200632140006', '9489137414', ''),
(20, 17, 'FR2401200649100007', '9489137414', ''),
(21, 17, 'FR2401200912390008', '9489137414', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `jual_nofak` varchar(30) NOT NULL,
  `jual_customers_id` int(11) NOT NULL DEFAULT 0,
  `jual_cart_total` int(11) NOT NULL,
  `jual_total` int(11) NOT NULL,
  `jual_penerima` varchar(128) NOT NULL,
  `jual_tlp` varchar(12) NOT NULL,
  `jual_kurir` varchar(128) NOT NULL,
  `jual_layanan` varchar(128) NOT NULL,
  `jual_biaya` int(11) NOT NULL,
  `jual_alamat` text NOT NULL,
  `jual_status` enum('Waiting for Payment','Process','On The Way','Rejected','Canceled','Arrived') NOT NULL DEFAULT 'Waiting for Payment',
  `jual_resi` varchar(128) NOT NULL,
  `jual_tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `jual_tgl_exp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`jual_nofak`, `jual_customers_id`, `jual_cart_total`, `jual_total`, `jual_penerima`, `jual_tlp`, `jual_kurir`, `jual_layanan`, `jual_biaya`, `jual_alamat`, `jual_status`, `jual_resi`, `jual_tgl`, `jual_tgl_exp`) VALUES
('FR2401200230510004', 17, 33000, 39000, 'Ferdian Nada', '082230270872', 'JNE', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Canceled', '', '2020-01-24 14:49:34', '2020-01-24 09:01:45'),
('FR2401200327120005', 17, 65000, 71000, 'Ferdian Nada', '082230270872', 'JNE', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Waiting for Payment', '', '2020-01-24 15:27:20', '0000-00-00 00:00:00'),
('FR2401200632140006', 17, 30000, 36000, 'Ferdian Nada', '082230270872', 'JNE', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Waiting for Payment', '', '2020-01-24 18:32:23', '0000-00-00 00:00:00'),
('FR2401200649100007', 17, 33000, 39000, 'Ferdian Nada', '082230270872', 'JNE', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Waiting for Payment', '', '2020-01-24 18:49:17', '0000-00-00 00:00:00'),
('FR2401200912390008', 17, 30000, 36000, 'Ferdian Nada', '082230270872', 'JNE', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Waiting for Payment', '', '2020-01-24 21:13:07', '0000-00-00 00:00:00'),
('FR2401201028450001', 17, 65000, 71000, 'Ferdian Nada', '082230270872', 'jne', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Canceled', '', '2020-01-24 04:29:26', '2020-01-24 09:01:48'),
('FR2401201234110002', 17, 76000, 82000, 'Ferdian Nada', '082230270872', 'jne', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Process', '', '2020-01-24 12:34:29', '0000-00-00 00:00:00'),
('FR2401201240080003', 17, 33000, 39000, 'Ferdian Nada', '082230270872', 'TIKI', 'REG', 6000, 'Jl.Sumberwadung - Dsn.Tugung - Ds.Sempu - RT/RW : 01/02, 68468-Kabupaten Banyuwangi-Jawa Timur', 'Canceled', '', '2020-01-24 12:40:26', '2020-01-24 09:01:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indeks untuk tabel `customers_token`
--
ALTER TABLE `customers_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indeks untuk tabel `tbl_brgmasuk`
--
ALTER TABLE `tbl_brgmasuk`
  ADD PRIMARY KEY (`brgmasuk_nota`),
  ADD KEY `brgmasuk_supplier_id` (`brgmasuk_supplier_id`);

--
-- Indeks untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`c_detail_id`);

--
-- Indeks untuk tabel `tbl_detailbrgmasuk`
--
ALTER TABLE `tbl_detailbrgmasuk`
  ADD KEY `detailmasuk_barang_id` (`detailmasuk_barang_id`),
  ADD KEY `detailmasuk_brgmasuk_nota` (`detailmasuk_brgmasuk_nota`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`jual_nofak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `customers_token`
--
ALTER TABLE `customers_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `c_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
