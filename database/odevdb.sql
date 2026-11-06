-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Oca 2023, 22:45:13
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odevdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dtarih` date NOT NULL,
  `sifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `mail`, `dtarih`, `sifre`) VALUES
(17, 'admin', 'admin', 'admin@admin.com', '2023-01-13', '123'),
(19, 'Murat', 'Şahin', 'murat@gmail.com', '2023-01-25', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `resim_ad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim_turu` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aciklama` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `resim_ad`, `resim_turu`, `resim_tarih`, `aciklama`, `fiyat`) VALUES
(1, 'resimler/641.jpg', 'bilgisayar', '2023-01-11 21:16:23', 'Temel Bilgisayar Teknolojileri | XP Donanım Office İnternet', '60'),
(2, 'resimler/ls9082m.jpg', 'bilgisayar', '2023-01-11 21:17:18', 'SQL Uygulamaları ve Soru Bankası', '100'),
(3, 'resimler/ls68154.jpg', 'akademik', '2023-01-11 21:19:02', 'Anayasa Hukuku', '75'),
(4, 'resimler/77678.jpg', 'sınav', '2023-01-11 21:22:25', 'TYT Tek Kitap | Tüm Dersler Soru Bankası', '100'),
(5, 'resimler/ls7010K.jpg', 'bilgisayar', '2023-01-11 21:24:03', 'Flutter ile Mobil Uygulama Geliştirme', '250'),
(6, 'resimler/ls5937m.jpg', 'bilgisayar', '2023-01-11 21:40:38', 'Python ile Programlamaya giriş |Kavram Uygulama Çözümlü Sorular', '200'),
(7, 'resimler/kx63871.jpg', 'akademik', '2023-01-11 21:42:32', 'Bilimde kanıt ve doğrulama', '110'),
(8, 'resimler/nl8279c.jpg', 'akademik', '2023-01-11 21:43:02', 'Yönetim ve Organizasyon', '250'),
(9, 'resimler/kx57054.jpg', 'bilgisayar', '2023-01-11 21:47:02', 'Bilgisayar Ağlarında Saldırı ve Savunma | Kavramlar - Güvenlik - Uygulama', '130'),
(10, 'resimler/cp7359b.jpg', 'sınav', '2023-01-11 21:51:21', '9. Sınıf Tarih | Konu Anlatımlı Soru bankası', '200'),
(11, 'resimler/kx30101.jpg', 'çocuk', '2023-01-11 21:54:57', 'Mustafa Kemal ATATÜRK ve Çocuk', '75'),
(12, 'resimler/nl2490.jfif', 'akademik', '2023-01-11 22:04:50', 'Yabancılar için Türkçe diksiyon', '125'),
(13, 'resimler/cp6932.jfif', 'çocuk', '2023-01-24 19:42:45', 'Kitap Okuyan Çocuk Yetiştirmek', '100'),
(14, 'resimler/nl9739.jpeg', 'roman', '2023-01-11 22:13:30', 'Ahmet ÜMİT | Kayıp Tanrılar Ülkesi', '140'),
(15, 'resimler/nl9947.jfif', 'roman', '2023-01-11 22:14:44', 'KAPLANIN SIRTINDA | İstihbarat ve Hürriyet', '100'),
(16, 'resimler/ls3461.jpeg', 'akademik', '2023-01-11 22:16:36', 'Özel Eğitimde Temel Akademik Çalışmalar', '120'),
(17, 'resimler/cp3524.jpeg', 'çocuk', '2023-01-11 22:33:43', 'Satıcı Çocuk', '50'),
(18, 'resimler/ls1604.jpeg', 'roman', '2023-01-11 22:35:28', 'Karantina', '130'),
(19, 'resimler/ls4028.jpeg', 'roman', '2023-01-11 22:36:02', 'CHARLES DICKENS | Büyük Umutlar', '100'),
(20, 'resimler/ls3785.jfif', 'sınav', '2023-01-11 22:37:35', 'ALİ ERKAN KAVAKLI | Sınav Stresini Yenme Sanatı', '80'),
(21, 'resimler/kx335.jpeg', 'roman', '2023-01-11 22:38:11', 'METİN KAÇAN | Ağır Roman', '75'),
(23, 'resimler/cp5593.jpeg', 'sınav', '2023-01-11 22:40:14', '10. Sınıf | LGS Deneme Sınavı ', '100'),
(24, 'resimler/cp595.jfif', 'sınav', '2023-01-11 22:40:48', 'Sınav Kazandıran Muhteşem Üçlü', '300'),
(25, 'resimler/kx2768.jpeg', 'çocuk', '2023-01-11 22:42:07', 'Filozof Çocuk', '100'),
(27, 'resimler/ls6309.jfif', 'çocuk', '2023-01-11 23:44:48', 'Çocuklar için bilgisayar', '75');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
