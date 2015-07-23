CREATE DATABASE IF NOT EXISTS `example`;

USE `example`;

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `apellido` varchar(50) NOT NULL DEFAULT '0',
  `sexo` tinyint(4) NOT NULL DEFAULT '0',
  `fechaNacimiento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `sexo`, `fechaNacimiento`) VALUES
  (1, 'Jose L.', 'Damian Saavedra', 1, '1989-10-16'),
  (3, 'Rolando K.', 'Tigres Sipion', 1, '1985-04-11'),
  (4, 'Armando E.', 'Pisfil Puemape', 1, '1985-08-17'),
  (5, 'Karina E.', 'Huiman Diaz', 2, '1985-08-17'),
  (6, 'Marlon', 'Tirado Angulo', 1, '1985-03-15');

