-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 02:04 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `ID_ABSENSI` varchar(5) NOT NULL,
  `ID_APOTEKER` varchar(5) DEFAULT NULL,
  `ID_DOKTER` varchar(5) DEFAULT NULL,
  `ID_KARYAWAN` varchar(5) DEFAULT NULL,
  `TGL_ABSENSI` date DEFAULT NULL,
  `JAM_DATANG` time DEFAULT NULL,
  `JAM_PULANG` time DEFAULT NULL,
  `LEMBUR` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_ABSENSI`),
  KEY `FK_38` (`ID_KARYAWAN`),
  KEY `FK_39` (`ID_DOKTER`),
  KEY `FK_40` (`ID_APOTEKER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE IF NOT EXISTS `apoteker` (
  `ID_APOTEKER` varchar(5) NOT NULL,
  `NO_INDUK_APOTEKER` varchar(18) DEFAULT NULL,
  `NAMA_APOTEKER` varchar(25) DEFAULT NULL,
  `TTL_APOTEKER` varchar(10) DEFAULT NULL,
  `ALAMAT_APOTEKER` varchar(25) DEFAULT NULL,
  `NO_TLP_APOTEKER` varchar(13) DEFAULT NULL,
  `JK_APOTEKER` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`ID_APOTEKER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat_keluar`
--

CREATE TABLE IF NOT EXISTS `detail_obat_keluar` (
  `ID_DETAIL_OBAT_KELUAR` varchar(5) NOT NULL,
  `ID_OBAT_KELUAR` varchar(5) DEFAULT NULL,
  `ID_OBAT` varchar(5) DEFAULT NULL,
  `SUBTOTAL_OBAT_KELUAR` float DEFAULT NULL,
  `JUMLAH_TOTAL_OBAT` float DEFAULT NULL,
  PRIMARY KEY (`ID_DETAIL_OBAT_KELUAR`),
  KEY `FK_21` (`ID_OBAT`),
  KEY `FK_27` (`ID_OBAT_KELUAR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat_masuk`
--

CREATE TABLE IF NOT EXISTS `detail_obat_masuk` (
  `ID_DETAIL_OBAT_MASUK` varchar(5) NOT NULL,
  `ID_OBAT` varchar(5) NOT NULL,
  `ID_OBAT_MASUK` varchar(5) NOT NULL,
  `SUBTOTAL_OBAT_MASUK` float DEFAULT NULL,
  `JUMLAH_OBAT_MASUK` float DEFAULT NULL,
  PRIMARY KEY (`ID_DETAIL_OBAT_MASUK`),
  KEY `FK_18` (`ID_OBAT_MASUK`),
  KEY `FK_20` (`ID_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE IF NOT EXISTS `detail_periksa` (
  `ID_DETAIL_PERIKSA` varchar(5) NOT NULL,
  `ID_PERIKSA` varchar(5) NOT NULL,
  `ID_TINDAKAN` varchar(5) DEFAULT NULL,
  `BIAYA_TINDAKAN` float DEFAULT NULL,
  `KETERANGAN` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_DETAIL_PERIKSA`),
  KEY `FK_3` (`ID_PERIKSA`),
  KEY `FK_8` (`ID_TINDAKAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`ID_DETAIL_PERIKSA`, `ID_PERIKSA`, `ID_TINDAKAN`, `BIAYA_TINDAKAN`, `KETERANGAN`) VALUES
('DP001', 'IPE31', 'T002', 20000, 'LUNAS'),
('DP017', 'IPE97', 'T002', 40000, 'LUNAS'),
('DP087', 'IPE78', 'T002', 30000, 'LUNAS'),
('DPG51', 'IPE78', 'T001', 100000, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `detail_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `detail_rawat_inap` (
  `ID_DETAIL_RAWAT_INAP` varchar(5) NOT NULL,
  `ID_RAWAT_INAP` varchar(5) NOT NULL,
  `ID_PERIKSA` varchar(5) DEFAULT NULL,
  `TGL_RAWAT__INAP` date DEFAULT NULL,
  PRIMARY KEY (`ID_DETAIL_RAWAT_INAP`),
  KEY `FK_30` (`ID_RAWAT_INAP`),
  KEY `FK_42` (`ID_PERIKSA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE IF NOT EXISTS `detail_resep` (
  `ID_DETAIL_RESEP` varchar(5) NOT NULL,
  `ID_OBAT` varchar(5) DEFAULT NULL,
  `ID_RESEP` varchar(5) NOT NULL,
  `KET_RESEP` text,
  PRIMARY KEY (`ID_DETAIL_RESEP`),
  KEY `FK_16` (`ID_RESEP`),
  KEY `FK_17` (`ID_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`ID_DETAIL_RESEP`, `ID_OBAT`, `ID_RESEP`, `KET_RESEP`) VALUES
('DR001', 'O087', 'R009', NULL),
('DR009', 'O009', 'R009', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `ID_DOKTER` varchar(5) NOT NULL,
  `ID_JENIS_DOKTER` varchar(5) NOT NULL,
  `NO_INDUK_DOKTER` varchar(18) DEFAULT NULL,
  `NAMA_DOKTER` varchar(25) DEFAULT NULL,
  `TTL_DOKTER` varchar(10) DEFAULT NULL,
  `ALAMAT_DOKTER` varchar(50) DEFAULT NULL,
  `NO_TELP_DOKTER` varchar(15) DEFAULT NULL,
  `JNS_KELAMIN_DOKTER` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID_DOKTER`),
  KEY `FK_9` (`ID_JENIS_DOKTER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID_DOKTER`, `ID_JENIS_DOKTER`, `NO_INDUK_DOKTER`, `NAMA_DOKTER`, `TTL_DOKTER`, `ALAMAT_DOKTER`, `NO_TELP_DOKTER`, `JNS_KELAMIN_DOKTER`) VALUES
('DG091', 'JD05G', '098654128963', 'Dr. Hendra', '17/07/1987', 'JL. CEMPAKA No.09', '085678432679', 'L'),
('DS009', 'JD02S', '198654312099', 'Dr. Natasya', '07/09/1989', 'Jl.Arjuna', '085234765909', 'P'),
('DU004', 'JD07U', '198707865986', 'Dr. Boyke', '14/09/1987', 'JL. CEMPAKA', '087654123990', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `ID_JABATAN` varchar(5) NOT NULL,
  `NAMA_JABATAN` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_JABATAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_apoteker`
--

CREATE TABLE IF NOT EXISTS `jadwal_apoteker` (
  `ID_JDWAL_APOTKR` varchar(5) NOT NULL,
  `ID_APOTEKER` varchar(5) DEFAULT NULL,
  `HARI_A` varchar(7) DEFAULT NULL,
  `JAM_KERJA_A` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`ID_JDWAL_APOTKR`),
  KEY `FK_28` (`ID_APOTEKER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE IF NOT EXISTS `jadwal_dokter` (
  `ID_JADWAL_DOKTER` varchar(5) NOT NULL,
  `ID_DOKTER` varchar(5) DEFAULT NULL,
  `HARI_D` varchar(7) DEFAULT NULL,
  `JAM_D` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_JADWAL_DOKTER`),
  KEY `FK_10` (`ID_DOKTER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_karyawan`
--

CREATE TABLE IF NOT EXISTS `jadwal_karyawan` (
  `ID_JADWAL_KRYN` varchar(5) NOT NULL,
  `ID_KARYAWAN` varchar(5) DEFAULT NULL,
  `JAM_K` varchar(9) DEFAULT NULL,
  `HARI_K` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`ID_JADWAL_KRYN`),
  KEY `FK_33` (`ID_KARYAWAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dokter`
--

CREATE TABLE IF NOT EXISTS `jenis_dokter` (
  `ID_JENIS_DOKTER` varchar(5) NOT NULL,
  `JENIS_DOKTER` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS_DOKTER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dokter`
--

INSERT INTO `jenis_dokter` (`ID_JENIS_DOKTER`, `JENIS_DOKTER`) VALUES
('JD02S', 'SPESIALIS'),
('JD05G', 'DOKTER GIGI'),
('JD07U', 'DOKTER UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `ID_KAMAR_INAP` varchar(5) NOT NULL,
  `NAMA_KAMAR_INAP` varchar(25) DEFAULT NULL,
  `KAPASITAS_KMR` int(11) DEFAULT NULL,
  `TARIF_KMR` float DEFAULT NULL,
  PRIMARY KEY (`ID_KAMAR_INAP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `ID_KARYAWAN` varchar(5) NOT NULL,
  `ID_JABATAN` varchar(5) NOT NULL,
  `NAMA_K` varchar(25) DEFAULT NULL,
  `TTL_K` varchar(10) DEFAULT NULL,
  `ALAMAT_K` varchar(10) DEFAULT NULL,
  `NO_TELP_K` varchar(15) DEFAULT NULL,
  `JENIS_KELAMIN_K` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID_KARYAWAN`),
  KEY `FK_34` (`ID_JABATAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `ID_OBAT` varchar(5) NOT NULL,
  `NAMA_OBAT` varchar(25) DEFAULT NULL,
  `KATEGORI_OBAT` varchar(25) DEFAULT NULL,
  `HARGA` float DEFAULT NULL,
  `OBAT_KRITIS` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`ID_OBAT`, `NAMA_OBAT`, `KATEGORI_OBAT`, `HARGA`, `OBAT_KRITIS`) VALUES
('O009', 'OBAT Sakit Gigi', 'Generik', 20000, '10'),
('O087', 'OBAT Sakit Kepala', 'Generik', 30000, '10');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE IF NOT EXISTS `obat_keluar` (
  `ID_OBAT_KELUAR` varchar(5) NOT NULL,
  `ID_APOTEKER` varchar(5) DEFAULT NULL,
  `JMLH_STOK_KELUAR` float DEFAULT NULL,
  `TOTAL_HARGA_OBAT` float DEFAULT NULL,
  PRIMARY KEY (`ID_OBAT_KELUAR`),
  KEY `FK_25` (`ID_APOTEKER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE IF NOT EXISTS `obat_masuk` (
  `ID_OBAT_MASUK` varchar(5) NOT NULL,
  `ID_APOTEKER` varchar(5) NOT NULL,
  `STOK_MASUK` float DEFAULT NULL,
  `TGL_MASUK` date DEFAULT NULL,
  PRIMARY KEY (`ID_OBAT_MASUK`),
  KEY `FK_23` (`ID_APOTEKER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `ID_PASIEN` varchar(5) NOT NULL,
  `NAMA_PASIEN` varchar(25) DEFAULT NULL,
  `TTL_PASIEN` varchar(10) DEFAULT NULL,
  `NO_TLP_PAS_` varchar(15) DEFAULT NULL,
  `GOL_DARAH_PASIEN` varchar(3) DEFAULT NULL,
  `JENIS_KELAMIN_PASIEN` varchar(3) DEFAULT NULL,
  `PEKERJAAN_` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `NAMA_PASIEN`, `TTL_PASIEN`, `NO_TLP_PAS_`, `GOL_DARAH_PASIEN`, `JENIS_KELAMIN_PASIEN`, `PEKERJAAN_`) VALUES
('P001', 'JOKO IRIANTO', '02/04/1994', '081211631088', 'A', 'L', 'PENGUSAHA'),
('P002', 'NI MADE KARINA W', '19/06/1993', '085607234190', 'B', 'P', 'DOSEN');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `ID_BAYAR` varchar(5) NOT NULL,
  `ID_RAWAT_INAP` varchar(5) DEFAULT NULL,
  `ID_OBAT_KELUAR` varchar(5) DEFAULT NULL,
  `ID_PERIKSA` varchar(5) DEFAULT NULL,
  `TGL_BAYAR` date DEFAULT NULL,
  `TOTAL_BAYAR` float DEFAULT NULL,
  PRIMARY KEY (`ID_BAYAR`),
  KEY `FK_35` (`ID_RAWAT_INAP`),
  KEY `FK_36` (`ID_OBAT_KELUAR`),
  KEY `FK_43` (`ID_PERIKSA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `ID_PERIKSA` varchar(5) NOT NULL,
  `ID_DOKTER` varchar(5) NOT NULL,
  `ID_PENYAKIT` varchar(5) NOT NULL,
  `ID_PASIEN` varchar(5) NOT NULL,
  `TANGGAL_PERIKSA` date DEFAULT NULL,
  `BIAYA_DOKTER` float DEFAULT NULL,
  `TOTAL_BIAYA_PERIKSA` float DEFAULT NULL,
  `KELUHAN` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_PERIKSA`),
  KEY `FK_2` (`ID_PASIEN`),
  KEY `FK_41` (`ID_DOKTER`),
  KEY `FK_7` (`ID_PENYAKIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`ID_PERIKSA`, `ID_DOKTER`, `ID_PENYAKIT`, `ID_PASIEN`, `TANGGAL_PERIKSA`, `BIAYA_DOKTER`, `TOTAL_BIAYA_PERIKSA`, `KELUHAN`) VALUES
('IPE31', 'DU004', 'IPU09', 'P001', '2015-01-12', 30000, 70000, 'Demam Tinggi, Sakit Kepala'),
('IPE78', 'DU004', 'IPU09', 'P001', '2015-03-01', 30000, 50000, 'Sakit Gigi'),
('IPE97', 'DU004', 'IPU09', 'P002', '2015-03-30', 30000, 50000, 'Demam Tinggi'),
('IPE98', 'DG091', 'IPG98', 'P001', '2015-03-10', 60000, 100000, 'Gusi Bengkak');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `ID_PENYAKIT` varchar(5) NOT NULL,
  `NAMA_PENYAKIT` varchar(25) DEFAULT NULL,
  `KET_PENYAKIT` text,
  PRIMARY KEY (`ID_PENYAKIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`ID_PENYAKIT`, `NAMA_PENYAKIT`, `KET_PENYAKIT`) VALUES
('IPG98', 'Sakit Gigi', 'Kerusakan Pada Gigi graham kanan bawah'),
('IPU09', 'Demam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE IF NOT EXISTS `rawat_inap` (
  `ID_RAWAT_INAP` varchar(5) NOT NULL,
  `ID_KAMAR_INAP` varchar(5) NOT NULL,
  `ID_PASIEN` varchar(5) NOT NULL,
  `ID_DOKTER` varchar(5) DEFAULT NULL,
  `TGL_MASK` date DEFAULT NULL,
  `TGL_KELUAR` date DEFAULT NULL,
  `TOTAL_BIAYA_RWT` float DEFAULT NULL,
  PRIMARY KEY (`ID_RAWAT_INAP`),
  KEY `FK_29` (`ID_PASIEN`),
  KEY `FK_31` (`ID_DOKTER`),
  KEY `FK_32` (`ID_KAMAR_INAP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `ID_REKAM_MEDIS` varchar(5) NOT NULL,
  `ID_PASIEN` varchar(5) NOT NULL,
  `ID_DETAIL_PERIKSA` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`ID_REKAM_MEDIS`),
  KEY `FK_4` (`ID_PASIEN`),
  KEY `FK_5` (`ID_DETAIL_PERIKSA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`ID_REKAM_MEDIS`, `ID_PASIEN`, `ID_DETAIL_PERIKSA`) VALUES
('RM01A', 'P001', 'DP001'),
('RM01J', 'P001', 'DP087'),
('RM039', 'P002', 'DP017'),
('RM03G', 'P001', 'DP087');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `ID_RESEP` varchar(5) NOT NULL,
  `ID_PASIEN` varchar(5) NOT NULL,
  `ID_DOKTER` varchar(5) NOT NULL,
  `ID_PERIKSA` varchar(5) NOT NULL,
  `TGL_RESEP` date DEFAULT NULL,
  PRIMARY KEY (`ID_RESEP`),
  KEY `FK_12` (`ID_DOKTER`),
  KEY `FK_13` (`ID_PASIEN`),
  KEY `FK_15` (`ID_PERIKSA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`ID_RESEP`, `ID_PASIEN`, `ID_DOKTER`, `ID_PERIKSA`, `TGL_RESEP`) VALUES
('R008', 'P001', 'DU004', 'IPE31', '2015-04-01'),
('R009', 'P001', 'DG091', 'IPE78', '2015-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `ID_SUPPLIER` varchar(5) NOT NULL,
  `ID_OBAT` varchar(5) DEFAULT NULL,
  `NAMA_SUPPLIER` varchar(25) DEFAULT NULL,
  `ALAMAT_SUPPLIER` varchar(50) DEFAULT NULL,
  `NO_TELP_SUPPLIER` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`ID_SUPPLIER`),
  KEY `FK_22` (`ID_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `ID_TINDAKAN` varchar(5) NOT NULL,
  `NAMA_TINDAKAN` varchar(30) DEFAULT NULL,
  `TARIF_TINDAKAN` float DEFAULT NULL,
  PRIMARY KEY (`ID_TINDAKAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`ID_TINDAKAN`, `NAMA_TINDAKAN`, `TARIF_TINDAKAN`) VALUES
('T001', 'Penambalan Gigi', 100000),
('T002', 'Pemeriksaan Umum', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `waiting_list`
--

CREATE TABLE IF NOT EXISTS `waiting_list` (
  `ID_ANTRI` varchar(5) NOT NULL,
  `ID_PASIEN` varchar(5) NOT NULL,
  `ID_DOKTER` varchar(5) DEFAULT NULL,
  `NO_ANTRI` varchar(5) DEFAULT NULL,
  `TGL_ANTRI` date DEFAULT NULL,
  PRIMARY KEY (`ID_ANTRI`),
  KEY `FK_1` (`ID_PASIEN`),
  KEY `FK_11` (`ID_DOKTER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `FK_38` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`),
  ADD CONSTRAINT `FK_39` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `FK_40` FOREIGN KEY (`ID_APOTEKER`) REFERENCES `apoteker` (`ID_APOTEKER`);

--
-- Constraints for table `detail_obat_keluar`
--
ALTER TABLE `detail_obat_keluar`
  ADD CONSTRAINT `FK_21` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`),
  ADD CONSTRAINT `FK_27` FOREIGN KEY (`ID_OBAT_KELUAR`) REFERENCES `obat_keluar` (`ID_OBAT_KELUAR`);

--
-- Constraints for table `detail_obat_masuk`
--
ALTER TABLE `detail_obat_masuk`
  ADD CONSTRAINT `FK_18` FOREIGN KEY (`ID_OBAT_MASUK`) REFERENCES `obat_masuk` (`ID_OBAT_MASUK`),
  ADD CONSTRAINT `FK_20` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `pemeriksaan` (`ID_PERIKSA`),
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`ID_TINDAKAN`) REFERENCES `tindakan` (`ID_TINDAKAN`);

--
-- Constraints for table `detail_rawat_inap`
--
ALTER TABLE `detail_rawat_inap`
  ADD CONSTRAINT `FK_30` FOREIGN KEY (`ID_RAWAT_INAP`) REFERENCES `rawat_inap` (`ID_RAWAT_INAP`),
  ADD CONSTRAINT `FK_42` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `pemeriksaan` (`ID_PERIKSA`);

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `FK_16` FOREIGN KEY (`ID_RESEP`) REFERENCES `resep` (`ID_RESEP`),
  ADD CONSTRAINT `FK_17` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`ID_JENIS_DOKTER`) REFERENCES `jenis_dokter` (`ID_JENIS_DOKTER`);

--
-- Constraints for table `jadwal_apoteker`
--
ALTER TABLE `jadwal_apoteker`
  ADD CONSTRAINT `FK_28` FOREIGN KEY (`ID_APOTEKER`) REFERENCES `apoteker` (`ID_APOTEKER`);

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

--
-- Constraints for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  ADD CONSTRAINT `FK_33` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_34` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`);

--
-- Constraints for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD CONSTRAINT `FK_25` FOREIGN KEY (`ID_APOTEKER`) REFERENCES `apoteker` (`ID_APOTEKER`);

--
-- Constraints for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD CONSTRAINT `FK_23` FOREIGN KEY (`ID_APOTEKER`) REFERENCES `apoteker` (`ID_APOTEKER`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_35` FOREIGN KEY (`ID_RAWAT_INAP`) REFERENCES `rawat_inap` (`ID_RAWAT_INAP`),
  ADD CONSTRAINT `FK_36` FOREIGN KEY (`ID_OBAT_KELUAR`) REFERENCES `obat_keluar` (`ID_OBAT_KELUAR`),
  ADD CONSTRAINT `FK_43` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `pemeriksaan` (`ID_PERIKSA`);

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_41` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`ID_PENYAKIT`) REFERENCES `penyakit` (`ID_PENYAKIT`);

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `FK_29` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_31` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `FK_32` FOREIGN KEY (`ID_KAMAR_INAP`) REFERENCES `kamar` (`ID_KAMAR_INAP`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`ID_DETAIL_PERIKSA`) REFERENCES `detail_periksa` (`ID_DETAIL_PERIKSA`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `FK_13` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_15` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `pemeriksaan` (`ID_PERIKSA`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `FK_22` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`);

--
-- Constraints for table `waiting_list`
--
ALTER TABLE `waiting_list`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
