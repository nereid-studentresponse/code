-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2013 a las 16:01:39
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `srs`
--
CREATE DATABASE IF NOT EXISTS `srs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `srs`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creation`
--

CREATE TABLE IF NOT EXISTS `creation` (
  `id_teacher` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  UNIQUE KEY `id_teacher_2` (`id_teacher`,`id_course`),
  KEY `id_teacher` (`id_teacher`),
  KEY `id_course` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enroll`
--

CREATE TABLE IF NOT EXISTS `enroll` (
  `id_student` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  UNIQUE KEY `id_student_2` (`id_student`,`id_course`),
  KEY `id_student` (`id_student`),
  KEY `id_course` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `freeanswer`
--

CREATE TABLE IF NOT EXISTS `freeanswer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id_student`,`id_question`),
  KEY `id_student` (`id_student`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `freequestion`
--

CREATE TABLE IF NOT EXISTS `freequestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `correction` varchar(255),
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`id_lesson`),
  KEY `id_lesson` (`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `document_url` varchar(255),
  `subject` varchar(255) NOT NULL,
  `id_course` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`id_course`),
  KEY `id_course` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `id_lesson` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lesson` (`id_lesson`),
  KEY `id_student` (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selected_options`
--

CREATE TABLE IF NOT EXISTS `selected_options` (
  `id_chanswer` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  UNIQUE KEY `id_chanswer_2` (`id_chanswer`,`id_option`),
  KEY `id_chanswer` (`id_chanswer`),
  KEY `id_option` (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `yearofstudy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentof`
--

CREATE TABLE IF NOT EXISTS `studentof` (
  `id_student` int(11) NOT NULL,
  `id_school` int(11) NOT NULL,
  UNIQUE KEY `id_student_3` (`id_student`,`id_school`),
  KEY `id_student` (`id_student`,`id_school`),
  KEY `id_student_2` (`id_student`,`id_school`),
  KEY `id_school` (`id_school`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherof`
--

CREATE TABLE IF NOT EXISTS `teacherof` (
  `id_teacher` int(11) NOT NULL,
  `id_school` int(11) NOT NULL,
  UNIQUE KEY `id_teacher_3` (`id_teacher`,`id_school`),
  KEY `id_teacher` (`id_teacher`),
  KEY `id_school` (`id_school`),
  KEY `id_teacher_2` (`id_teacher`,`id_school`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choiceanswer`
--

CREATE TABLE IF NOT EXISTS `choiceanswer` (
  `id_choice` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  UNIQUE KEY `id` (`id_choice`,`id_student`),
  KEY `id_choice` (`id_choice`),
  KEY `id_student` (`id_student`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_text` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choicequestion`
--

CREATE TABLE IF NOT EXISTS `choicequestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `id_correct_choice` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_correct_choice` (`id_correct_choice`),
  KEY `id_lesson` (`id_lesson`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------



--
-- Restricciones para tablas volcadas
--


--
-- Filtros para la tabla `creation`
--
ALTER TABLE `creation`
  ADD CONSTRAINT `creation_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `creation_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`);

--
-- Filtros para la tabla `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`);

--
-- Filtros para la tabla `freeanswer`
--
ALTER TABLE `freeanswer`
  ADD CONSTRAINT `freeanswer_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `freeanswer_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `freequestion` (`id`);

 --
-- Filtros para la tabla `freequestion`
--
ALTER TABLE `freequestion`
  ADD CONSTRAINT `freequestion_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

  --
-- Filtros para la tabla `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`);

--
-- Filtros para la tabla `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

--
-- Filtros para la tabla `studentof`
--
ALTER TABLE `studentof`
  ADD CONSTRAINT `studentof_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `studentof_ibfk_2` FOREIGN KEY (`id_school`) REFERENCES `school` (`id`);
  
--
-- Filtros para la tabla `choiceanswer`
--
ALTER TABLE `choiceanswer`
  ADD CONSTRAINT `choiceanswer_ibfk_1` FOREIGN KEY (`id_choice`) REFERENCES `choice` (`id`),
  ADD CONSTRAINT `choiceanswer_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`);
  
--
-- Filtros para la tabla `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `choicequestion` (`id`);

  
--
-- Filtros para la tabla `choiceanswer`
--
ALTER TABLE `choicequestion`
  ADD CONSTRAINT `choicequestion_ibfk_1` FOREIGN KEY (`id_correct_choice`) REFERENCES `choice` (`id`),
  ADD CONSTRAINT `choicequestion_ibfk_2` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

--
-- Filtros para la tabla `teacherof`
--
ALTER TABLE `teacherof`
  ADD CONSTRAINT `teacherof_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `teacherof_ibfk_2` FOREIGN KEY (`id_school`) REFERENCES `school` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
