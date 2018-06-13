-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `rightway`;

DROP TABLE IF EXISTS `pdo`;
CREATE TABLE `pdo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `hashpass` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pdo` (`id`, `name`, `email`, `password`, `hashpass`) VALUES
(14,	'test1',	'test@test.com',	'1234567890',	'$2y$10$iMXreFTSDUSKm3GcZiY9qulB4TE3CTLb5y5A8a6bsO05x1Ky2pQwu'),
(15,	'test2',	'test2@test.com',	'asdfghjkl',	'$2y$10$vF9qsm2EqEAtcfWAAVJGH.HUgHvRkN4U3qurDZ0U3RRsWxPfaITRG'),
(16,	'test2',	'test2@test.com',	'asdfghjkl',	'$2y$10$AEb5rNHs9EvkH332ZeL5h.DsbkA/U2DMyB8sDwe3ld3Ws5QlPDxWS'),
(17,	'test3',	'test3@test',	'qwertyuiop',	'$2y$10$3wweTfRNY.N3eOqBFT3ymejo0kpxxN4YMg0GzsWTOBxU7SL4apnLW');

-- 2018-06-13 09:52:05
