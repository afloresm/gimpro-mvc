-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 30-08-2007 a las 23:44:53
-- Versión del servidor: 5.0.41
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `pruebas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `items`
-- 

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id_item` int(11) NOT NULL auto_increment,
  `item` varchar(40) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `items`
-- 

INSERT INTO `items` (`id_item`, `item`) VALUES 
(1, 'PHP'),
(2, 'Mootools'),
(3, 'Google Maps'),
(4, 'Javascript'),
(5, 'Actionscript'),
(6, 'c#');
