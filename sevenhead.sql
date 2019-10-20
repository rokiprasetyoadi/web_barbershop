-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2019 pada 11.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `customers_nama` varchar(255) NOT NULL,
  `customers_email` varchar(128) NOT NULL,
  `customers_password` varchar(255) NOT NULL,
  `customers_alamat` text,
  `customers_kota` varchar(60) DEFAULT NULL,
  `customers_provinsi` varchar(60) DEFAULT NULL,
  `customers_negara` varchar(60) DEFAULT NULL,
  `customers_kodepos` int(11) DEFAULT NULL,
  `customers_nohp` varchar(25) DEFAULT NULL,
  `customers_status` varchar(5) NOT NULL,
  `customers_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_kategori_id` int(11) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `barang_harjul_grosir` double NOT NULL,
  `barang_harjul` double NOT NULL,
  `barang_image` varchar(255) NOT NULL,
  `barang_stok` int(11) NOT NULL DEFAULT '0',
  `barang_min_stok` int(11) NOT NULL DEFAULT '0',
  `barang_tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailbrgmasuk`
--

CREATE TABLE `tbl_detailbrgmasuk` (
  `detailmasuk_brgmasuk_nota` varchar(128) NOT NULL,
  `detailmasuk_barang_id` varchar(20) NOT NULL,
  `detailmasuk_harpok` double NOT NULL,
  `detailmasuk_stok` int(11) NOT NULL,
  `detailmasuk_jumlah` double NOT NULL,
  `detailmasuk_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpenjualan`
--

CREATE TABLE `tbl_detailpenjualan` (
  `detailjual_nofak` int(11) NOT NULL,
  `detailjual_barang_id` varchar(20) NOT NULL,
  `detailjual_qty` int(11) NOT NULL,
  `detailjual_diskon` int(11) DEFAULT '0',
  `detailjual_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_status` varchar(128) NOT NULL,
  `pembayaran_bukti` varchar(255) NOT NULL,
  `pembayaran_customers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `jual_nofak` int(11) NOT NULL,
  `jual_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_admin_id` int(11) NOT NULL,
  `jual_customers_id` int(11) NOT NULL DEFAULT '0',
  `jual_pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indeks untuk tabel `tbl_detailbrgmasuk`
--
ALTER TABLE `tbl_detailbrgmasuk`
  ADD KEY `detailmasuk_barang_id` (`detailmasuk_barang_id`),
  ADD KEY `detailmasuk_brgmasuk_nota` (`detailmasuk_brgmasuk_nota`);

--
-- Indeks untuk tabel `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  ADD KEY `detailjual_nofak` (`detailjual_nofak`),
  ADD KEY `detailjual_barang_id` (`detailjual_barang_id`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayaran_user_id` (`pembayaran_customers_id`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_crew_id` (`jual_admin_id`),
  ADD KEY `jual_user_id` (`jual_customers_id`),
  ADD KEY `jual_pembayaran_id` (`jual_pembayaran_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers_token`
--
ALTER TABLE `customers_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_brgmasuk`
--
ALTER TABLE `tbl_brgmasuk`
  ADD CONSTRAINT `tbl_brgmasuk_ibfk_1` FOREIGN KEY (`brgmasuk_supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_detailbrgmasuk`
--
ALTER TABLE `tbl_detailbrgmasuk`
  ADD CONSTRAINT `tbl_detailbrgmasuk_ibfk_1` FOREIGN KEY (`detailmasuk_barang_id`) REFERENCES `tbl_barang` (`barang_id`),
  ADD CONSTRAINT `tbl_detailbrgmasuk_ibfk_2` FOREIGN KEY (`detailmasuk_brgmasuk_nota`) REFERENCES `tbl_brgmasuk` (`brgmasuk_nota`);

--
-- Ketidakleluasaan untuk tabel `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  ADD CONSTRAINT `tbl_detailpenjualan_ibfk_1` FOREIGN KEY (`detailjual_nofak`) REFERENCES `tbl_penjualan` (`jual_nofak`),
  ADD CONSTRAINT `tbl_detailpenjualan_ibfk_2` FOREIGN KEY (`detailjual_barang_id`) REFERENCES `tbl_barang` (`barang_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`pembayaran_customers_id`) REFERENCES `customers` (`customers_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_ibfk_1` FOREIGN KEY (`jual_admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `tbl_penjualan_ibfk_2` FOREIGN KEY (`jual_pembayaran_id`) REFERENCES `tbl_pembayaran` (`pembayaran_id`),
  ADD CONSTRAINT `tbl_penjualan_ibfk_3` FOREIGN KEY (`jual_customers_id`) REFERENCES `customers` (`customers_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
