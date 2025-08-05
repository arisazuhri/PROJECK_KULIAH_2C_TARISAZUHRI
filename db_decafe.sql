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

-- Dumping structure for table db_decafe.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Dumping data for table db_decafe.tb_bayar: ~2 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(2311121846314, 700000, 675000, '2023-11-14 04:35:00'),
	(2311132328678, 200000, 200000, '2023-11-14 04:35:02');

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE IF NOT EXISTS `tb_daftar_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `nama_menu` varchar(200) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_daftar_menu_tb_kategori_menu` (`kategori`),
  CONSTRAINT `FK_tb_daftar_menu_tb_kategori_menu` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf16 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~4 rows (approximately)
INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(13, '31931-1.png', 'ayam pedas', 'menu baru', 1, '30000', '67'),
	(14, '56715-15.jpeg', 'sate', 'sate ayam', 8, '15000', '30 '),
	(15, '48368-5.jpg', 'RAMEN', 'dari korea', 8, '25000', '50'),
	(17, '32178-10.jpeg', 'coffe', 'menu baru', 4, '230000', '34'),
	(18, '19334-9.jpg', 'burger', 'special', 8, '25000', '20 ');

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE IF NOT EXISTS `tb_kategori_menu` (
  `id_kat_menu` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16;

-- Dumping data for table db_decafe.tb_kategori_menu: ~7 rows (approximately)
INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
	(1, 2, 'boba'),
	(3, 2, 'juss'),
	(4, 2, 'kopi'),
	(5, 1, 'bakso'),
	(7, 2, 'soda'),
	(8, 1, 'snack'),
	(9, 2, 'Teh');

-- Dumping structure for table db_decafe.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `menu` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `menu` (`menu`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=571 DEFAULT CHARSET=utf16;

-- Dumping data for table db_decafe.tb_list_order: ~5 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
	(123, 13, 2311121813171, 3, 'enak', 2),
	(145, 17, 2311121843806, 6, 'pesanan', 1),
	(567, 15, 2311132328678, 8, 'penasaran', NULL),
	(568, 13, 2311121843806, 88, 'vcghj', 1),
	(569, 14, 2311121846314, 45, 'ffgbgtn', NULL),
	(570, 18, 2311141150142, 50, 'cepat', NULL);

-- Dumping structure for table db_decafe.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL DEFAULT '0',
  `pelanggan` varchar(200) DEFAULT NULL,
  `meja` int DEFAULT NULL,
  `pelayan` int DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `pelayan` (`pelayan`),
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- Dumping data for table db_decafe.tb_order: ~3 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
	(2311121813171, 'adjdhe', 23, 2, '2023-11-12 13:48:41'),
	(2311121843806, 'nabila', 13, 2, '2023-11-13 16:33:38'),
	(2311121846314, 'werert', 3, 3, '2023-11-13 16:33:41'),
	(2311132328678, 'hadi', 23, 3, '2023-11-13 16:33:44'),
	(2311141150142, 'ikram', 5, 5, NULL);

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf16;

-- Dumping data for table db_decafe.tb_user: ~9 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'abc', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789101', 'singapore '),
	(2, 'def', 'def@def.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789102', NULL),
	(3, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '082218752729', NULL),
	(4, 'ght', 'ght@ght.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '123456789103', NULL),
	(5, 'tarisa', 'tarisa@tar.com', '05174e098b69283627cde56d6ad2e99b', 1, '082218752730', '                                                                        '),
	(6, 'nadhifa', 'dhifa@dhif.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '085260515756', NULL),
	(7, 'atarazka', 'azka@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '085377456783', 'lhokseumawe'),
	(8, 'nabila', 'bila@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '12345678902', ' lhokseumawe'),
	(17, 'putrii', 'putri@put', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '098765432112', 'pelayan baru');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
