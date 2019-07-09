-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 10:52 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obligatoriophp`
--
CREATE DATABASE IF NOT EXISTS `obligatoriophp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `obligatoriophp`;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `ci` int(10) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pin` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`ci`, `nombres`, `apellidos`, `direccion`, `telefono`, `foto`, `pin`, `status`) VALUES
(2323, 'Juance', 'Pepelolo', '18 y ejido', 1321311, 'Captura.PNG', 1234, 0),
(5555, 'Alumnillo', 'Zimermann', 'Montevideo 2332', 123456789, 'avatar13.jpg', 12456, 0),
(12314, 'Pepe', 'Martinez', 'Blanes 366', 234234211, 'avatar12.jpg', 2222, 1),
(234234, 'Alfredo', 'Casero', 'Yaguarón 3333', 1321311, 'avatar14.jpg', 1234, 1),
(5555555, 'Lidia', 'Labuela', 'Obligado 1369', 1321311, 'avatar15.png', 1111, 1),
(12345678, 'Gabriel', 'Pereira', 'Yoquese 322', 1231231, 'avatar11.jpg', 123123, 1),
(234245345, 'Juan', 'Sartori', '18 de Julio 1234', 1321311, 'avatar13.jpg', 1234, 1),
(345345345, 'Juance', 'Pepelolo', '18 de Julio 1234', 1321311, 'avatar13.jpg', 222222, 0),
(1232134234, 'Juance', 'Pepelolo', '18 de Julio 1234', 1321311, 'avatar12.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `materia` varchar(50) CHARACTER SET latin1 NOT NULL,
  `profesor` int(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `materia`, `profesor`, `status`) VALUES
(1, 'Matematica', 4305844, 1),
(2, 'programacion', 4305844, 1),
(3, 'biologia', 7654321, 1),
(4, 'Bases de datos', 1234567, 1),
(5, 'ConducciÃ³n', 1247841, 1),
(6, 'SexologÃ­a', 546782, 1);

-- --------------------------------------------------------

--
-- Table structure for table `encargados`
--

CREATE TABLE `encargados` (
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `encargados`
--

INSERT INTO `encargados` (`email`, `nombre`, `contrasenia`, `status`) VALUES
('admin', 'admin', 'MTIzNA==', 0),
('admin@admin.com', 'admin', 'MTIzNA==', 1),
('email@email.com', 'Pepe', 'MTIzNA==', 1);

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
  `carga_horaria` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`nombre`, `contenidos`, `nivel`, `carga_horaria`, `status`) VALUES
('Bases de datos', 'Bases de datos MYSQL ', 'Segundo', 5, 1),
('biologia', 'Celulas, aparato respiratorio, disecciÃ³n de lombrices, podologÃ­a de garrapatas', 'Tercero', 8, 1),
('ConducciÃ³n', 'Clases de manejo para principiantes', 'Tercero', 5, 1),
('fisica', 'Leyes de newton, principios de la termodinamica', 'Primero', 22, 0),
('Matematica', 'Trigonometrï¿½a, Funciones elementales, NÃºmeros complejos', 'Segundo', 44, 1),
('programacion', 'ProgramaciÃ³n php orientado a objetos', 'Tercero', 10, 1),
('SexologÃ­a', 'ExploraciÃ³n del aparato reproductor masculino.', 'Primero', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `ci` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`ci`, `nombre`, `apellido`, `direccion`, `telefono`, `status`) VALUES
(546782, 'Hans', 'Kurtzschennfleischerlahm', 'Cerro norte', 4125896, 1),
(1122334, 'Washinton', 'Pereira', 'Paso de los mellizos 123', 92369258, 0),
(1234567, 'Danillo', 'Zimermann', 'Leguizamon', 1255478, 1),
(1247841, 'Michael', 'Schumacher', 'Av. Libertador 5478', 98145236, 1),
(4305844, 'Damian', 'Acevedo', 'La palma 2327', 99765140, 1),
(7654321, 'Karl', 'Sanders', 'Wilson Aldunate 1936', 99256256, 1),
(55889966, 'Enrique', 'AbellÃ¡', '40 Semanas', 256366667, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
