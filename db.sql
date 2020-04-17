-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 20-04-17 15:31
-- 서버 버전: 5.5.64-MariaDB
-- PHP 버전: 7.4.5RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `admin_default`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `hit` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `writer` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`id`, `title`, `content`, `date`, `hit`, `writer`, `password`) VALUES
(1, '안녕하세요', '[2020-04-18]<br>\r\n안녕하세요. <a href=\"https://winsub.kr\">윈섭</a>을 운영중인 창문입니다. <br>\r\n이 게시판은 아주아주 간단한 코드로만 이루어져있으며, 보안에 많이 취약합니다.<br>\r\n하지만 그 보안을 보완할 방법을 모르고 있기에 저는 이 게시판 소스를 깃허브에 올리기로 정했습니다.<br>\r\n자세한 사용법은 readme를 읽어보셔야 사용하실수 있으실겁니다.<br>\r\n이 글 비밀번호는 1234입니다. 감사합니다.', '2020-04-18 00:08:28', 1, '112.173.144.XXX', '*A4B6157319038724E3560894F7F932C8886EBFCF');

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `postid` int(10) UNSIGNED NOT NULL,
  `depth` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `writer` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
