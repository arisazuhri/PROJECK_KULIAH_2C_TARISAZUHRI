-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_elektronik.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Dumping data for table db_elektronik.tb_bayar: ~0 rows (approximately)

-- Dumping structure for table db_elektronik.tb_daftar_barang
CREATE TABLE IF NOT EXISTS `tb_daftar_barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(50) DEFAULT NULL,
  `biaya` varchar(50) DEFAULT NULL,
  `tglservis` datetime DEFAULT CURRENT_TIMESTAMP,
  `tglselesai_servis` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;

-- Dumping data for table db_elektronik.tb_daftar_barang: ~5 rows (approximately)
INSERT INTO `tb_daftar_barang` (`id_barang`, `namabarang`, `biaya`, `tglservis`, `tglselesai_servis`) VALUES
	(4, 'blenderrr', '8000000', '2023-12-21 09:54:25', '2023-12-21 02:54:25'),
	(5, 'kompor', '100000', '2023-12-21 10:01:22', '2023-12-21 03:01:22'),
	(6, 'acc', '500000', '2023-12-22 14:58:08', '2023-12-22 07:58:08'),
	(8, 'tv', '340000', '2023-12-22 15:31:30', '2023-12-22 08:31:30'),
	(9, 'ac', '3000000', '2023-12-24 09:14:43', '2023-12-24 02:14:43'),
	(10, 'komporrrrrrr', '1000000', '2023-12-24 11:39:59', '2023-12-24 04:39:59');

-- Dumping structure for table db_elektronik.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `barang` int DEFAULT NULL,
  `kodebarang` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `riwayat` varchar(50) DEFAULT NULL,
  `catatan` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `barang` (`barang`),
  KEY `kodebarang` (`kodebarang`),
  CONSTRAINT `FK_tb_list_order_tb_daftar_barang` FOREIGN KEY (`barang`) REFERENCES `tb_daftar_barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kodebarang`) REFERENCES `tb_order` (`idpelanggan`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

-- Dumping data for table db_elektronik.tb_list_order: ~0 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `barang`, `kodebarang`, `jumlah`, `riwayat`, `catatan`) VALUES
	(1, 5, 2312191424787, 3, 'belom bayar', NULL),
	(2, 9, 2312191441352, 2, NULL, NULL);

-- Dumping structure for table db_elektronik.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `idpelanggan` bigint NOT NULL AUTO_INCREMENT,
  `namapelanggan` varchar(50) DEFAULT NULL,
  `alamatpelanggan` varchar(50) DEFAULT NULL,
  `nohp_pelanggan` varchar(50) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `riwayat` varchar(50) DEFAULT NULL,
  `waktubayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpelanggan`),
  KEY `harga` (`harga`),
  CONSTRAINT `FK_tb_order_tb_daftar_barang` FOREIGN KEY (`harga`) REFERENCES `tb_daftar_barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2312191618433 DEFAULT CHARSET=utf16;

-- Dumping data for table db_elektronik.tb_order: ~7 rows (approximately)
INSERT INTO `tb_order` (`idpelanggan`, `namapelanggan`, `alamatpelanggan`, `nohp_pelanggan`, `harga`, `riwayat`, `waktubayar`) VALUES
	(2312191424787, 'BJ', 'HUuu', '5', 6, NULL, NULL),
	(2312191441352, 'yaya', 'hsgggd', '9876544', NULL, NULL, NULL),
	(2312191550696, 'yayay', 'lhokseumawe', '987654', NULL, NULL, NULL),
	(2312191615717, 'darerrrr', 'lhokseumawe', '6', NULL, NULL, '2023-12-19 09:15:24'),
	(2312191618432, ' nana', 'lhokseumawe', '67', NULL, NULL, '2023-12-19 09:18:49');

-- Dumping structure for table db_elektronik.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

-- Dumping data for table db_elektronik.tb_user: ~2 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `status`, `nohp`, `alamat`) VALUES
	(1, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '085276894567', 'lhokseumawe'),
	(2, 'abc', 'abc@abc.com', '25d55ad283aa400af464c76d713c07ad', 2, '085378654536', 'cunda'),
	(3, 'Tarisa', 'risa@risa.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '082218752729', 'LHOKSEUMAWE');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
