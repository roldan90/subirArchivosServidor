CREATE TABLE `sistemasweb`.`t_archivos` (
  `id_archivo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `extension` VARCHAR(245) NOT NULL,
  `descripcion` TEXT NOT NULL,
  PRIMARY KEY (`id_archivo`));