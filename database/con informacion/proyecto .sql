-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 16, 2020 at 05:17 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `precio` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `asistencia` varchar(25) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nombre`, `apellido`, `descripcion`, `precio`, `telefono`, `fecha`, `hora`, `asistencia`, `estatus`) VALUES
(1, 'Paula', 'hernandez', 'corte de pelo', 75, 12340987, '2020-10-16', '14:04:00', 'finalizado', 0),
(2, 'María', 'perez', 'manicura', 125, 87651234, '2020-10-31', '14:00:00', 'ausente', 1),
(3, 'Sara', 'sarai', 'pedicura, manicura', 175, 78652501, '2020-10-24', '11:00:00', 'ausente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dpi` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `dpi`, `telefono`, `direccion`, `estatus`) VALUES
(7, 'Dayana', 'Velasquez', '1234123412345', 98765423, 'valle maria, esquipulas', 1),
(8, 'Valeria', 'sanchez', '8746090861524', 878634, 'residenciales del valle, esquipulas', 1),
(9, 'faviola', 'hernandez', '2910629602983', 98303984, 'los pinos, esquipulas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deuda`
--

DROP TABLE IF EXISTS `deuda`;
CREATE TABLE IF NOT EXISTS `deuda` (
  `id_deuda` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(256) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_deuda`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deuda`
--

INSERT INTO `deuda` (`id_deuda`, `descripcion`, `precio`, `fecha`, `id_cliente`) VALUES
(1, 'corte de pelo', 75, '2020-10-16', 7);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `producto`, `precio`, `cantidad`) VALUES
(1, 'Tinte rojo ', 45, 10),
(2, 'tinte negro', 45, 10),
(3, 'tinte cafe', 45, 10),
(4, 'splash lavanda', 75, 5),
(5, 'splash fresa', 75, 10),
(6, 'perfume victoria secret', 125, 7);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(3, 'empleado');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `dpi` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int(45) NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `salario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `usuario_rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dpi`, `nombre`, `apellido`, `fechadenacimiento`, `correo`, `telefono`, `direccion`, `user`, `pass`, `rol`, `estatus`, `salario`) VALUES
(1, '3383404832007', 'danny', 'alarcon', '2020-01-04', 'dannyalarcon417@gmail.com', 3098659, 'esquipulas', 'danny', '202cb962ac59075b964b07152d234b70', 1, 1, 0),
(2, '0', 'mayra', 'alarcon', '2020-01-01', 'admin@gmail.com', 44383066, 'residenciales del valle', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, 0),
(3, '0989738719234', 'andrea', 'marroqui', '1990-06-25', 'andreamarroqui25@gmail.com', 88664309, 'villas de santiago, esquipulas', 'andrea', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1, 800);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deuda`
--
ALTER TABLE `deuda`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
