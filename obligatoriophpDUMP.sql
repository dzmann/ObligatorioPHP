-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 05:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obligatoriophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE DATABASE IF NOT EXISTS obligatoriophp;

USE obligatoriophp;

CREATE TABLE `alumnos` (
  `ci` int(10) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`ci`, `nombres`, `apellidos`, `direccion`, `telefono`, `foto`, `pin`) VALUES
(5555, 'Alumnillo', 'Zimermann', 'Montevideo', 25412541, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0?\0\0?\0\0\0ȍ??\0\0\0tEXtSoftware\0A', 12456),
(1133557, 'Tommy', 'Araya', 'Soriano 2366', 99965412, '', 123456),
(78451231, 'Maximilian', 'Schwarzmüller', 'Rio Branco 3000', 92587589, '', 654321);

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `materia` varchar(50) CHARACTER SET latin1 NOT NULL,
  `profesor` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `cursos` (`id`, `materia`, `profesor`) VALUES
(1, 'matematica', 1234567);
-- --------------------------------------------------------

--
-- Table structure for table `encargados`
--

CREATE TABLE `encargados` (
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `encargados`
--

INSERT INTO `encargados` (`email`, `nombre`, `contrasenia`) VALUES
('eemail@email.com', 'Pepe', 'Una contraseÃ±a loca'),
('email@email.com', 'Pepe', 'Una contraseÃ±a loca');

-- --------------------------------------------------------

--
-- Table structure for table `inscripciones`
--

CREATE TABLE `inscripciones` (
  `ci_alumno` int(15) NOT NULL,
  `id_curso` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `contenidos` longtext CHARACTER SET latin1 NOT NULL,
  `nivel` enum('Primero','Segundo','Tercero','Cuarto') CHARACTER SET latin1 NOT NULL,
  `carga_horaria` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `materias` (`nombre`, `contenidos`, `nivel`, `carga_horaria`) VALUES
('biologia', 'Celulas, aparato respiratorio, disección de lombrices', 'Primero', 16),
('fisica', 'Leyes de newton, principios de la termodinamica', 'Segundo', 10),
('Matematica', 'Trigonometría, Funciones elementales, Números complejos', 'Tercero', 30);
-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `ci` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`ci`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1122334, 'Washinton', 'Pereira', 'Paso de los mellizos 123', 92369258),
(1234567, 'Danillo', 'Zimermann', 'Montevideo', 1255478),
(4305844, 'Damian', 'Acevedo', 'La palma 2327', 99765140),
(7654321, 'Karl', 'Sanders', 'Bvar. España 1936', 99256256);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`nombre`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
