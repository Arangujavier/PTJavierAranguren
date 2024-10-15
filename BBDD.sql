CREATE DATABASE PT_Tesicnor;

USE PT_Tesicnor;

CREATE TABLE `movie` (
  `Id` varchar(10) NOT NULL COMMENT 'Id de la película',
  `Year` int(4) UNSIGNED NOT NULL COMMENT 'Año estreno de la película',
  `Plot` varchar(1000) NOT NULL COMMENT 'Trama de la película',
  `Title` varchar(100) NOT NULL COMMENT 'Título de la película'
);  -- El punto y coma está correctamente después del paréntesis de cierre

ALTER TABLE `movie`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Title` (`Title`);
