-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2023 pada 08.41
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
-- Database: `e-certificate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `ID` int(255) NOT NULL,
  `Akses` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`ID`, `Akses`) VALUES
(1, 'Admin'),
(2, 'LnD Team'),
(3, 'Employee'),
(4, 'RM Team');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID` int(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID`, `Kategori`) VALUES
(1, 'Certificate of Attendance'),
(2, 'Certificate of Appreciation'),
(3, 'Professional Certificate'),
(6, 'Certificate of Completion'),
(13, 'XLKM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `ID` int(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `IdUser` varchar(20) NOT NULL,
  `Request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`ID`, `Name`, `IdUser`, `Request`) VALUES
(1, '', '', 'test'),
(2, '', '', 'saya kjndfoinsaoivnioankobniadhbvoinaiovbnoianvonxiocnvkonvionoaibofboifbanionaoivmopamofvinoiadnobadknvkjxcbviahivna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertif`
--

CREATE TABLE `sertif` (
  `ID` int(255) NOT NULL,
  `IdUser` varchar(20) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Directorate` varchar(255) NOT NULL,
  `Division` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `NamaSertif` varchar(255) NOT NULL,
  `IssuedBy` varchar(255) NOT NULL,
  `SertifID` varchar(20) NOT NULL,
  `Filee` varchar(255) NOT NULL,
  `TglTerbit` varchar(11) NOT NULL,
  `TglExp` varchar(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `ApprovalStatus` varchar(50) NOT NULL,
  `ApprovedAt` datetime NOT NULL,
  `ApprovedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sertif`
--

INSERT INTO `sertif` (`ID`, `IdUser`, `Nama`, `Email`, `Directorate`, `Division`, `Department`, `NamaSertif`, `IssuedBy`, `SertifID`, `Filee`, `TglTerbit`, `TglExp`, `Kategori`, `Deskripsi`, `CreatedAt`, `CreatedBy`, `TglEdit`, `ApprovalStatus`, `ApprovedAt`, `ApprovedBy`) VALUES
(1247, '672183', 'Asep', 'asep@gmail.com', 'CEO Office', 'Commerce Budget Planning & Gov', '', 'Sertifikasi Analis Data Bisnis (SADB)', 'HHH', '89274K', 'PSM 1_Yunus Adhimukti.jpg', '2023-12-07', '2023-12-09', 'Professional Certificate', 'agile traning', '2023-12-05 10:15:33', 'lnd', '2023-12-14 10:47:52', 'Approved', '2023-12-19 09:20:26', 'Mochamad Hira Kurnia'),
(1248, '9217893', 'Jarjit', 'jarjit@gmail.com', 'Commercial - Consumer', '', '', 'Speakers on Cyber Era', 'XL Axiata', '983274J', 'sertif naufal_pages-to-jpg-0001.jpg', '2023-12-06', '2023-12-14', 'Certificate of Appreciation', '', '2023-12-05 10:15:33', 'lnd', '2023-12-06 12:46:03', 'Approved', '2023-12-19 09:29:29', 'Vivi Martha'),
(1249, '783798', 'Upin', 'upin@gmail.com', 'Corporate Affairs', '', '', 'Sertifikasi Ahli Jaringan Komputer (SAJK)', 'JJJ', '783264L', 'CloudEngineer.png', '2023-12-07', '2023-12-21', 'Professional Certificate', '', '2023-12-05 10:15:33', 'lnd', '2023-12-06 11:35:41', 'Approved', '2023-12-19 09:15:08', 'lnd'),
(1250, '8726638', 'Ipin', 'ipin@gmail.com', 'Enterprise Business', 'Corporate Strategy', '', 'Peserta Seminar', 'LLL', '8923H8', 'sertif naufal_pages-to-jpg-0001.jpg', '2023-12-16', '2023-12-30', 'Certificate of Appreciation', '', '2023-12-05 10:15:33', 'lnd', '2023-12-06 11:38:07', 'Approved', '2023-12-19 09:40:42', 'Mochamad Hira Kurnia'),
(1251, '892938', 'Fizi', 'fizi@gmail.com', 'Home Business', 'Digital Touchpoint', '', 'Course Keamanan Data', 'MMM', '873264R', '', '2023-06-01', '2023-12-30', 'Certificate of Completion', '', '2023-12-05 10:15:33', 'lnd', '2023-12-06 11:37:16', 'Approved', '2023-12-19 09:42:14', 'Nashrudin Ismail'),
(1252, '77823', 'Naufal Abiy Zayyan', 'xlkm.naufalabiy@xl.co.id', 'Human Capital', 'Employee Relation', 'PSFM', 'Data Analytics', 'Our Best Team', '78234', 'DataAnalytics (2) (2).png', '2023-12-06', '2023-12-09', 'Certificate of Appreciation', '', '2023-12-05 11:48:15', 'lnd', NULL, 'Approved', '2023-12-19 14:36:16', 'Nashrudin Ismail'),
(1253, '7238', 'Japar', 'japar@gmail.com', 'Human Capital', '', '', 'Tes 1', 'HHH', '89274K', '', '2023-12-07', '2023-12-16', 'Professional Certificate', '', '2023-12-06 11:09:19', 'lnd', '2023-12-06 11:39:45', 'Approved', '2023-12-19 09:42:14', 'Nashrudin Ismail'),
(1254, '983246', 'Jopan', 'jopan@gmail.com', 'IT Digital and Analytics', '', '', 'Tes 2', 'KKK', '983274J', '', '2023-12-07', '2023-12-30', 'Certificate of Appreciation', '', '2023-12-06 11:09:19', 'lnd', '2023-12-06 12:46:26', 'Approved', '2023-12-19 09:40:42', 'Mochamad Hira Kurnia'),
(1255, '663823', 'Peter', 'peter@gmail.com', 'Technology', '', '', 'Tes 3', 'JJJ', '783264L', '', '2023-12-14', '2023-12-15', 'Professional Certificate', '', '2023-12-06 11:09:19', 'lnd', '2023-12-06 11:36:30', 'Approved', '2023-12-19 09:38:06', 'Vivi Martha'),
(1256, '738123', 'Kahje', 'kahje@gmail.com', 'Finance', '', '', 'Tes 4', 'LLL', '8923H8', '', '2023-12-14', '2023-12-30', 'Certificate of Appreciation', '', '2023-12-06 11:09:19', 'lnd', '2023-12-06 11:35:24', 'Approved', '2023-12-19 09:38:30', 'Vivi Martha'),
(1257, '426173', 'Farhan', 'farhan@gmail.com', 'Corporate Affairs', '', '', 'Tes 5', 'MMM', '873264R', '', '2023-12-16', '2023-12-23', 'Certificate of Completion', '', '2023-12-06 11:09:19', 'lnd', '2023-12-06 11:37:43', 'Approved', '2023-12-19 09:15:08', 'lnd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertif_del`
--

CREATE TABLE `sertif_del` (
  `ID` int(255) NOT NULL,
  `IdUser` varchar(20) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaSertif` varchar(255) NOT NULL,
  `SertifID` varchar(20) NOT NULL,
  `IssuedBy` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `DeletedBy` varchar(255) NOT NULL,
  `Reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sertif_del`
--

INSERT INTO `sertif_del` (`ID`, `IdUser`, `Nama`, `Email`, `NamaSertif`, `SertifID`, `IssuedBy`, `Kategori`, `DeletedAt`, `DeletedBy`, `Reason`) VALUES
(3, '878787', 'employee', 'sopyan@gmail.com', 'Cloud Engineer', 'S-2', 'Bangkit', 'Professional Certificate', '2023-10-25 11:17:02', 'employee', ''),
(17, '61527', 'Roneey', 'roneeygans@gmail.com', 'MC of XL Movie Pre Event 20th XL Axiata', 'S-13', 'XL Axiata', 'Certificate of Appreciation', '2023-10-17 15:53:08', 'roneeygans', ''),
(47, '878787', 'Sopyan', 'sopyan@gmail.com', 'Data Analytics 2', '', 'Google', 'Professional Certificate', '2023-09-25 13:11:31', 'sopyan', ''),
(50, '878787', 'Sopyan', 'sopyan@gmail.com', 'powr', '', 'jon', 'Certificate of Attendance', '2023-09-25 13:16:00', 'sopyan', ''),
(51, '878787', 'Sopyan', 'sopyan@gmail.com', 'Data Analytics 2', '', 'Google', 'Certificate of Appreciation', '2023-09-26 11:25:05', 'sopyan', ''),
(52, '878787', 'Sopyan', 'sopyan@gmail.com', 'Data Analytics', '', 'Google', 'Certificate of Appreciation', '2023-09-26 13:40:06', 'sopyan', ''),
(53, '61527', 'Roneey', 'roneeygans@gmail.com', 'Data Analytics 2', '', 'Google', 'Professional Certificate', '2023-09-27 11:51:25', 'roneeygans', ''),
(54, '61527', 'Roneey', 'roneeygans@gmail.com', 'MC of XLKM Fourth Development', '', 'XL Axiata', 'Certificate of Appreciation', '2023-09-27 11:51:57', 'roneeygans', ''),
(55, '61527', 'Roneey', 'roneeygans@gmail.com', 'Data Analytics', '', 'Google', 'Professional Certificate', '2023-09-27 13:25:48', 'roneeygans', ''),
(56, '61527', 'Roneey', 'roneeygans@gmail.com', 'lmzc', '', ';aslmc', '-- Pilih Kategori --', '2023-09-27 13:43:48', 'roneeygans', ''),
(57, '61527', 'Roneey', 'roneeygans@gmail.com', 'Cyber Security Fundamental', '', 'Cisco', 'Professional Certificate', '2023-10-12 09:30:39', 'roneeygans', ''),
(58, '61527', 'Roneey', 'roneeygans@gmail.com', 'MC of XLKM Development #4', '', 'XL Axiata', '', '2023-10-12 16:23:13', 'roneeygans', ''),
(59, '61527', 'Roneey', 'roneeygans@gmail.com', 'MC of XLKM Development #8', '', 'XL Axiata', 'Certificate of Appreciation', '2023-10-13 10:50:00', 'roneeygans', ''),
(60, '878787', 'Sopyan', 'sopyan@gmail.com', 'Makan', '', 'Our Best Team', 'Certificate of Attendance', '2023-10-13 10:59:00', 'sopyan', ''),
(203, '61527', 'lnd', 'roneeygans@gmail.com', 'MC of XLKM Development #1', '17', 'XL Axiata', 'Certification of Appreciation', '2023-12-04 16:32:39', 'lnd', ''),
(204, '61527', 'Roneey', 'roneeygans@gmail.com', 'MC of XLKM Development #2', '18', 'XL Axiata', 'Certification of Appreciation', '2023-10-13 14:10:07', 'roneeygans', ''),
(205, '878787', 'Sopyan', 'sopyan@gmail.com', 'MC of XLKM Development #3', '19', 'XL Axiata', 'Certification of Appreciation', '2023-10-13 14:01:44', 'sopyan', ''),
(206, '878787', 'employee', 'sopyan@gmail.com', 'MC of XLKM Development #4', '20', 'XL Axiata', 'Certification of Appreciation', '2023-11-21 15:56:25', 'employee', ''),
(207, '878787', 'Sopyan', 'sopyan@gmail.com', 'MC of XLKM Development #5', '21', 'XL Axiata', 'Certification of Appreciation', '2023-10-13 14:01:07', 'sopyan', ''),
(208, '878787', 'Sopyan', 'sopyan@gmail.com', 'MC of XLKM Development #6', '22', 'XL Axiata', 'Certification of Appreciation', '2023-10-13 14:00:26', 'sopyan', ''),
(213, '61527', 'Roneey', 'roneeygans@gmail.com', 'Sweetest Teammate', '892347JK', 'Pak Hira, Uda, dan Abiy', 'Certificate of Appreciation', '2023-10-13 14:10:35', 'roneeygans', ''),
(217, '878787', 'employee', 'sopyan@gmail.com', 'Contoh 1', '89621JK', 'Google', 'Certificate of Completion', '2023-10-25 08:40:03', 'employee', ''),
(224, '61527', 'lnd', 'roneeygans@gmail.com', 'Data Analytics 8', '827492IK', 'Our Best Team', 'Professional Certificate', '2023-10-25 11:11:31', 'lnd', ''),
(235, '878787', 'employee', 'sopyan@gmail.com', 'tes', 'ioej9999', 'Cisco', 'Certificate of Attendance', '2023-11-21 15:52:59', 'employee', ''),
(236, '2', 'f83cbeac-bba1-414d-9ae7-09d94afa3982', 'Al Jufri', '2023-10-15T00:00:00Z', 'Program Management', 'Technology', '-6.8976866666667', '2023-12-05 09:20:43', 'lnd', ''),
(237, '3', 'c0154ee0-a4ce-4d5b-b64b-94a4975c1403', 'Andung Trijoyo', '2023-10-15T00:00:00Z', 'Program Management', 'Technology', '-6.3726142343', '2023-12-05 09:20:06', 'lnd', ''),
(238, '4', '3d57f11f-797a-448f-8dc0-735270048b2c', 'Yudhanantyo Hanityawan Putra', '2023-10-14T00:00:00Z', 'Regulatory & Governm', 'Corporate Affairs', '-6.99556326', '2023-12-05 09:19:56', 'lnd', ''),
(239, '5', '5151fb32-f4f4-4ac8-a31a-3be408d1da3a', 'Dony Mohammad Iqbal Ramdhani', '2023-10-13T00:00:00Z', 'Customer Contact Cen', 'Commercial - Consumer', '-6.347157', '2023-12-05 09:19:46', 'lnd', ''),
(240, '6', 'ac5a89db-2703-4320-bbd3-74c08e47df5b', 'Shanti Indriastuti', '2023-10-13T00:00:00Z', 'IT PM & Transformati', 'IT Digital and Analytics', '-6.7406239499484', '2023-12-05 09:20:24', 'lnd', ''),
(241, '7', '27e69663-0cdc-46e5-b66a-b89b22a65db5', 'Budiman .', '2023-10-13T00:00:00Z', 'Network Planning & D', 'Technology', '-6.2773768510669', '2023-12-05 09:20:33', 'lnd', ''),
(1258, '77830', 'Desy', 'desy@gmail.com', '', '', '', '', '2023-12-14 10:57:20', 'lnd', ''),
(1259, '88236', 'Rahman', 'rahman@gmail.com', '', '', '', '', '2023-12-14 10:57:29', 'lnd', ''),
(1260, '86243', 'Andrew', 'andrew@gmail.com', '', '', '', '', '2023-12-14 10:57:36', 'lnd', ''),
(1261, '901763', 'Faras', 'faras@gmail.com', '', '', '', '', '2023-12-14 10:57:42', 'lnd', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` int(255) NOT NULL,
  `IdUser` varchar(20) NOT NULL,
  `Nama` varchar(60) NOT NULL,
  `Directorate` varchar(255) NOT NULL,
  `Division` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Akses` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwordu` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `IdUser`, `Nama`, `Directorate`, `Division`, `Department`, `Akses`, `username`, `passwordu`, `Email`, `Telp`) VALUES
(1, '1234', 'Alek', 'HC', 'HCIS', 'sdgfg', 'Employee', 'alek', '1234', 'alek@gmail.com', '08974527372'),
(2, '1345', 'RM', 'IT', 'TechSec', 'dsgfsag', 'RM Team', 'rm', '1234', 'jon@gmail.com', '089632578668'),
(3, '15624', 'Admin', 'IT', 'DevOps', 'dsag', 'Admin', 'admin', '1234', 'admin@gmail.com', '086261378233'),
(4, '61527', 'Vivi Martha', 'HC', 'LnD', 'dsgderag', 'LnD Team', 'lnd', '1234', 'roneeygans@gmail.com', '089512736247'),
(5, '878787', 'Naufal Abiy', 'JK', 'Blabla', 'fdhgh', 'Employee', 'employee', '1234', 'sopyan@gmail.com', '087861263571'),
(6, '86234', 'Nashrudin Ismail', 'Human Capital', 'People Development', '', 'Group Head', 'nashrudinismail', '1234', 'nashrudin@gmail.com', '08789216387'),
(7, '873264', 'Mochamad Hira Kurnia', 'Human Capital', '', '', 'Chief', 'hirakurnia', '1234', 'hirakurnia@gmail.com', '087892367');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `sertif`
--
ALTER TABLE `sertif`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `sertif_del`
--
ALTER TABLE `sertif_del`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sertif`
--
ALTER TABLE `sertif`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;

--
-- AUTO_INCREMENT untuk tabel `sertif_del`
--
ALTER TABLE `sertif_del`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
