-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2024, 19:52:13
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ci3starterkit`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adcd7048512e64b48da55b027577886ee5a36350');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(254) NOT NULL,
  `date` datetime NOT NULL,
  `tel` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `message` longtext NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `appointments`
--

INSERT INTO `appointments` (`id`, `name_surname`, `date`, `tel`, `email`, `message`, `status`) VALUES
(23154, 'Adam Smith', '2024-05-21 09:00:00', '+123456789', 'mail@mail', 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It\'s not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”\r\n', 0),
(23155, 'John Doe', '2024-05-22 12:00:00', '+12345678', 'mail2@mail', '', 0),
(23156, 'John Doe', '2024-05-23 10:00:00', '+123456789', 'mail3@mail', 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It\'s not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”\r\n', 1),
(23157, 'mehmet eren yaşar', '2024-05-27 10:00:00', '05300538538', 'mehmeteren.yasar00@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cash_registers`
--

CREATE TABLE `cash_registers` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `usd` varchar(254) NOT NULL,
  `try` varchar(254) NOT NULL,
  `eur` varchar(254) NOT NULL,
  `gbp` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cash_registers`
--

INSERT INTO `cash_registers` (`id`, `name`, `usd`, `try`, `eur`, `gbp`) VALUES
(4, 'CASH', '-380', '4000', '650', '-900'),
(6, 'BANK', '-500', '2000', '900', '150');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer` varchar(254) NOT NULL,
  `try` float NOT NULL,
  `eur` float NOT NULL,
  `usd` float NOT NULL,
  `gbp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `customer`, `try`, `eur`, `usd`, `gbp`) VALUES
(2, 'Customer 1', 0, 0, 0, 0),
(3, 'Customer 2', -500, 600, -4000, 1200);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `map_markers`
--

CREATE TABLE `map_markers` (
  `id` int(11) NOT NULL,
  `latitude` varchar(254) NOT NULL,
  `longitude` varchar(254) NOT NULL,
  `header` varchar(254) DEFAULT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `map_markers`
--

INSERT INTO `map_markers` (`id`, `latitude`, `longitude`, `header`, `content`) VALUES
(2, '38.640925423796325', '34.828886373271615', 'Random Marker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis mauris ex. Morbi eleifend placerat tellus, eget hendrerit risus luctus sed. Ut eleifend placerat orci.'),
(3, '38.641214533966306', '34.83034001903617', 'Random Marker - 2 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis mauris ex. Morbi eleifend placerat tellus, eget hendrerit risus luctus sed. Ut eleifend placerat orci, ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tel` varchar(254) DEFAULT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `tel`, `message`, `date`) VALUES
(4, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(8, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(9, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(10, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(11, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-20'),
(12, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(13, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(14, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(15, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-20'),
(16, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(17, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(18, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(19, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(20, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(21, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(22, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(23, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(24, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(25, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(26, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(27, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(28, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(29, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(30, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(31, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(32, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(33, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(34, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(35, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(36, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(37, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(38, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-22'),
(39, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-23'),
(40, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(41, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-25'),
(42, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-21'),
(43, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-25'),
(44, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-25'),
(45, 'John Doe', 'mail@mail', '+123456789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante dui, lacinia eu lorem ut, vehicula rhoncus magna. Phasellus gravida ultricies ligula, ac mollis metus cursus nec.', '2024-05-25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour_08` tinyint(4) DEFAULT NULL,
  `hour_09` tinyint(4) DEFAULT NULL,
  `hour_10` tinyint(4) DEFAULT NULL,
  `hour_11` tinyint(4) DEFAULT NULL,
  `hour_12` tinyint(4) DEFAULT NULL,
  `hour_13` tinyint(4) DEFAULT NULL,
  `hour_14` tinyint(4) DEFAULT NULL,
  `hour_15` tinyint(4) DEFAULT NULL,
  `hour_16` tinyint(4) DEFAULT NULL,
  `hour_17` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `shift`
--

INSERT INTO `shift` (`id`, `date`, `hour_08`, `hour_09`, `hour_10`, `hour_11`, `hour_12`, `hour_13`, `hour_14`, `hour_15`, `hour_16`, `hour_17`) VALUES
(96, '2024-05-20', 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1),
(97, '2024-05-21', NULL, NULL, 1, 1, 1, 1, 1, NULL, NULL, 1),
(98, '2024-05-22', 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, 1),
(99, '2024-05-23', 1, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1),
(100, '2024-05-24', 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1),
(101, '2024-05-27', 1, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1),
(102, '2024-05-28', 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `input` float NOT NULL,
  `output` float NOT NULL,
  `currency` varchar(254) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `date` date NOT NULL,
  `operation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `register_id`, `customer_id`, `input`, `output`, `currency`, `description`, `date`, `operation`) VALUES
(41, 6, 0, 6000, 0, 'TRY', NULL, '2024-05-20', 1),
(42, 6, 0, 0, 4000, 'TRY', '', '2024-05-20', 2),
(43, 6, 0, 0, 500, 'USD', '', '2024-05-20', 2),
(44, 6, 0, 900, 0, 'EUR', NULL, '0000-00-00', 1),
(45, 6, 0, 150, 0, 'GBP', NULL, '0000-00-00', 1),
(51, 4, 0, 4000, 0, 'TRY', NULL, '0000-00-00', 1),
(52, 4, 0, 650, 0, 'EUR', NULL, '0000-00-00', 1),
(53, 4, 0, 0, 380, 'USD', '', '2024-05-22', 2),
(54, 4, 0, 0, 900, 'GBP', '', '2024-05-22', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cash_registers`
--
ALTER TABLE `cash_registers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `map_markers`
--
ALTER TABLE `map_markers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23158;

--
-- Tablo için AUTO_INCREMENT değeri `cash_registers`
--
ALTER TABLE `cash_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `map_markers`
--
ALTER TABLE `map_markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Tablo için AUTO_INCREMENT değeri `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
