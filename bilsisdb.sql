-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 28 Tem 2021, 09:51:48
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bilsisdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alici`
--

DROP TABLE IF EXISTS `alici`;
CREATE TABLE IF NOT EXISTS `alici` (
  `al_ID` int(11) NOT NULL AUTO_INCREMENT,
  `isletme_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(455) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`al_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `alici`
--

INSERT INTO `alici` (`al_ID`, `isletme_ad`, `email`, `password`, `adres`, `sehir`) VALUES
(1, 'Candan Aş', 'candanas@example.com', '0000', 'orman sokak ağaç mah. no:24 BUCA', 'izmir'),
(2, 'Arslanoğlu', 'arslanoglu@example.com', '0000', 'kuyu mah. 24 sok  no: 1 Karşıyaka', 'izmir'),
(3, 'Haldun Holding', 'haldunhol@example.com', '0000', 'karşıyaka mah.', 'Gaziantep'),
(4, 'Samet LTD ŞTİ', 'samet@example.com', '0000', 'Bornova atatürk mah.', 'İzmir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan`
--

DROP TABLE IF EXISTS `ilan`;
CREATE TABLE IF NOT EXISTS `ilan` (
  `ilan_ID` int(11) NOT NULL AUTO_INCREMENT,
  `al_ID` int(11) NOT NULL,
  `urun_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urun_miktar` int(11) NOT NULL,
  `istenilen_tarih` date NOT NULL,
  `sehir` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `notlar` varchar(2000) COLLATE utf8_turkish_ci NOT NULL,
  `numune` tinyint(1) NOT NULL,
  PRIMARY KEY (`ilan_ID`),
  KEY `al_ID` (`al_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilan`
--

INSERT INTO `ilan` (`ilan_ID`, `al_ID`, `urun_ad`, `urun_miktar`, `istenilen_tarih`, `sehir`, `notlar`, `numune`) VALUES
(1, 1, 'Patates', 1000, '2021-01-29', 'Bursa', 'ikinci deneme', 1),
(2, 1, 'Lahana', 350, '2021-01-23', 'Bursa', 'taze olsun', 1),
(3, 1, 'Patlıcan', 250, '2021-01-22', 'Antalya', 'büyük olsunlar', 1),
(4, 2, 'Kuru Soğan', 2000, '2021-01-11', 'Antalya', 'çok acil', 0),
(5, 2, 'Sivri Biber', 5000, '2021-01-21', 'İzmir', 'sivri olsun', 0),
(6, 1, 'Sivri Biber', 1500, '2021-01-29', 'İzmir', 'taze olsun', 0),
(7, 1, 'Patlıcan', 2000, '2021-01-30', 'Bursa', 'büyük olsun', 0),
(8, 2, 'Kuru Soğan', 4500, '2021-01-28', 'İzmir', 'acil', 1),
(9, 2, 'Patlıcan', 5000, '2021-04-07', 'İzmir', 'acil!!', 0),
(10, 1, 'Domates', 3000, '2021-04-22', 'Ankara', 'sea', 1),
(11, 2, 'Patlıcan', 5000, '2021-06-01', 'Bursa', 'hızlı olsun', 1),
(12, 1, 'Patates', 3500, '2021-06-03', 'Mersin', 'sea', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

DROP TABLE IF EXISTS `stok`;
CREATE TABLE IF NOT EXISTS `stok` (
  `stok_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ur_ID` int(11) NOT NULL,
  `urun_ad` varchar(255) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `urun_miktar` int(11) NOT NULL,
  PRIMARY KEY (`stok_ID`),
  KEY `ur_ID` (`ur_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`stok_ID`, `ur_ID`, `urun_ad`, `urun_miktar`) VALUES
(1, 1, 'Patates', 10000),
(2, 1, 'Kuru Soğan', 20000),
(3, 1, 'Lahana', 3000),
(4, 1, 'Sivri Biber', 3000),
(5, 2, 'Patlıcan', 5000),
(6, 1, 'Patlıcan', 4500),
(7, 1, 'Patates', 56000),
(8, 1, 'Kuru Soğan', 50000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teklif`
--

DROP TABLE IF EXISTS `teklif`;
CREATE TABLE IF NOT EXISTS `teklif` (
  `teklif_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ur_ID` int(11) NOT NULL,
  `ilan_ID` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  PRIMARY KEY (`teklif_ID`),
  KEY `ur_ID_2` (`ur_ID`),
  KEY `ilan_ID_2` (`ilan_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teklif`
--

INSERT INTO `teklif` (`teklif_ID`, `ur_ID`, `ilan_ID`, `fiyat`) VALUES
(1, 2, 1, 1600),
(20, 1, 1, 1500),
(21, 1, 2, 2000),
(22, 1, 4, 4000),
(25, 2, 5, 1000),
(26, 1, 3, 2500),
(27, 1, 7, 2500),
(28, 2, 7, 3000),
(29, 2, 8, 2500),
(30, 2, 3, 1000),
(31, 1, 6, 5000),
(32, 1, 9, 50),
(33, 2, 9, 60),
(34, 1, 10, 2000),
(35, 1, 11, 2000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teklif_kabul`
--

DROP TABLE IF EXISTS `teklif_kabul`;
CREATE TABLE IF NOT EXISTS `teklif_kabul` (
  `tekkabul_ID` int(11) NOT NULL AUTO_INCREMENT,
  `teklif_ID` int(11) NOT NULL,
  `al_ID` int(11) NOT NULL,
  `kabul` tinyint(1) NOT NULL,
  PRIMARY KEY (`tekkabul_ID`),
  KEY `teklif_ID` (`teklif_ID`),
  KEY `al_ID` (`al_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teklif_kabul`
--

INSERT INTO `teklif_kabul` (`tekkabul_ID`, `teklif_ID`, `al_ID`, `kabul`) VALUES
(1, 20, 1, 1),
(2, 22, 2, 1),
(27, 21, 1, 1),
(28, 28, 1, 0),
(29, 27, 1, 1),
(30, 25, 2, 0),
(31, 29, 2, 1),
(32, 31, 1, 0),
(33, 26, 1, 1),
(34, 32, 2, 0),
(35, 33, 2, 1),
(36, 34, 1, 0),
(37, 35, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uretici`
--

DROP TABLE IF EXISTS `uretici`;
CREATE TABLE IF NOT EXISTS `uretici` (
  `ur_ID` int(11) NOT NULL AUTO_INCREMENT,
  `isletme_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ur_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uretici`
--

INSERT INTO `uretici` (`ur_ID`, `isletme_ad`, `email`, `password`, `adres`, `sehir`) VALUES
(1, 'Akkurtlar', 'Akkurtlar@example.com', '0000', 'dere mah. ağaç sok. no 3 Manavgat', 'antalya'),
(2, 'Emir Efe Meram', 'emirefe@example.com', '0000', 'beşevler mah. cephanelik sok. no 24/2 Nilüfer', 'bursa'),
(3, 'abc', 'abc@example.com', '0000', 'buca adatepe mah.', 'İzmir'),
(4, 'Aliveli', 'aliveli@example.com', '0000', 'manavgat kasaplar mah.', 'Antalya');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ilan`
--
ALTER TABLE `ilan`
  ADD CONSTRAINT `ilan_ibfk_1` FOREIGN KEY (`al_ID`) REFERENCES `alici` (`al_ID`);

--
-- Tablo kısıtlamaları `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`ur_ID`) REFERENCES `uretici` (`ur_ID`);

--
-- Tablo kısıtlamaları `teklif`
--
ALTER TABLE `teklif`
  ADD CONSTRAINT `teklif_ibfk_1` FOREIGN KEY (`ur_ID`) REFERENCES `uretici` (`ur_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teklif_ibfk_2` FOREIGN KEY (`ilan_ID`) REFERENCES `ilan` (`ilan_ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `teklif_kabul`
--
ALTER TABLE `teklif_kabul`
  ADD CONSTRAINT `teklif_kabul_ibfk_1` FOREIGN KEY (`al_ID`) REFERENCES `alici` (`al_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teklif_kabul_ibfk_2` FOREIGN KEY (`teklif_ID`) REFERENCES `teklif` (`teklif_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
