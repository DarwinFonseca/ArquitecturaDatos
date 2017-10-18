-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema unimonito
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema unimonito
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `unimonito` DEFAULT CHARACTER SET utf8 ;
USE `unimonito` ;

-- -----------------------------------------------------
-- Table `unimonito`.`Franquicias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Franquicias` (
  `Codigo_Franquicia` INT NOT NULL AUTO_INCREMENT,
  `Localidad` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Director` INT NOT NULL,
  PRIMARY KEY (`Codigo_Franquicia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Empleados` (
  `Codigo_Empleado` INT NOT NULL AUTO_INCREMENT,
  `Cedula` INT NOT NULL,
  `Nombre` VARCHAR(99) NOT NULL,
  `Fecha_Comienzo_Contrato` DATE NOT NULL,
  `Salario` DOUBLE NOT NULL,
  `Franquicia_Asignada` INT NOT NULL,
  PRIMARY KEY (`Codigo_Empleado`, `Franquicia_Asignada`),
  INDEX `fk_Empleados_Franquicias1_idx` (`Franquicia_Asignada` ASC),
  CONSTRAINT `fk_Empleados_Franquicias1`
    FOREIGN KEY (`Franquicia_Asignada`)
    REFERENCES `unimonito`.`Franquicias` (`Codigo_Franquicia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Telefonos_Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Telefonos_Empleado` (
  `Codigo_Empleado` INT NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Codigo_Empleado`),
  CONSTRAINT `fk_Telefonos_Empleado_Empleados`
    FOREIGN KEY (`Codigo_Empleado`)
    REFERENCES `unimonito`.`Empleados` (`Codigo_Empleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Vehiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Vehiculos` (
  `Numero_Matricula` VARCHAR(45) NOT NULL,
  `Fecha_Compra` DATE NOT NULL,
  PRIMARY KEY (`Numero_Matricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Reparaciones_Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Reparaciones_Vehiculo` (
  `Numero_Matricula` VARCHAR(45) NOT NULL,
  `Fecha_Reparacion` DATE NOT NULL,
  `Tipo_Reparacion` VARCHAR(45) NOT NULL,
  `Observaciones` VARCHAR(45) NOT NULL,
  `Precio` DOUBLE NOT NULL,
  PRIMARY KEY (`Numero_Matricula`),
  CONSTRAINT `fk_Reparaciones_Vehiculo_Vehiculos1`
    FOREIGN KEY (`Numero_Matricula`)
    REFERENCES `unimonito`.`Vehiculos` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Vehiculo_Frecuenta_Franquicia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Vehiculo_Frecuenta_Franquicia` (
  `Codigo_Franquicia` INT NOT NULL,
  `Numero_Matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Codigo_Franquicia`, `Numero_Matricula`),
  INDEX `fk_Vehiculo_Frecuenta_Franquicia_Vehiculos1_idx` (`Numero_Matricula` ASC),
  CONSTRAINT `fk_Vehiculo_Frecuenta_Franquicia_Franquicias1`
    FOREIGN KEY (`Codigo_Franquicia`)
    REFERENCES `unimonito`.`Franquicias` (`Codigo_Franquicia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Frecuenta_Franquicia_Vehiculos1`
    FOREIGN KEY (`Numero_Matricula`)
    REFERENCES `unimonito`.`Vehiculos` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Clientes` (
  `Codigo_Cliente` INT NOT NULL AUTO_INCREMENT,
  `Cedula` INT NOT NULL,
  `Nombre` VARCHAR(99) NOT NULL,
  PRIMARY KEY (`Codigo_Cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Direcciones_Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Direcciones_Cliente` (
  `Codigo_Cliente` INT NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  `Direccion` VARCHAR(45) NOT NULL,
  `Cuidad` VARCHAR(45) NOT NULL )
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Vehiculos_Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Vehiculos_Cliente` (
  `Codigo_Cliente` INT NOT NULL,
  `Numero_Matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Codigo_Cliente`, `Numero_Matricula`),
  INDEX `fk_Vehiculos_Cliente_Vehiculos1_idx` (`Numero_Matricula` ASC),
  CONSTRAINT `fk_Vehiculos_Cliente_Clientes1`
    FOREIGN KEY (`Codigo_Cliente`)
    REFERENCES `unimonito`.`Clientes` (`Codigo_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculos_Cliente_Vehiculos1`
    FOREIGN KEY (`Numero_Matricula`)
    REFERENCES `unimonito`.`Vehiculos` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Tipo_Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Tipo_Vehiculo` (
  `Numero_Matricula` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  INDEX `fk_Tipo_Vehiculo_Vehiculos1_idx` (`Numero_Matricula` ASC),
  PRIMARY KEY (`Numero_Matricula`),
  CONSTRAINT `fk_Tipo_Vehiculo_Vehiculos1`
    FOREIGN KEY (`Numero_Matricula`)
    REFERENCES `unimonito`.`Vehiculos` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Tipo_Utilitario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Tipo_Utilitario` (
  `Numero_Puertas` INT NOT NULL,
  `Tipo_Vehiculo_Numero_Matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Numero_Puertas`, `Tipo_Vehiculo_Numero_Matricula`),
  INDEX `fk_Tipo_Utilitario_Tipo_Vehiculo1_idx` (`Tipo_Vehiculo_Numero_Matricula` ASC),
  CONSTRAINT `fk_Tipo_Utilitario_Tipo_Vehiculo1`
    FOREIGN KEY (`Tipo_Vehiculo_Numero_Matricula`)
    REFERENCES `unimonito`.`Tipo_Vehiculo` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Tipo_TodoTerreno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Tipo_TodoTerreno` (
  `Numero_Defensas` INT NOT NULL,
  `Tipo_Vehiculo_Numero_Matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Numero_Defensas`, `Tipo_Vehiculo_Numero_Matricula`),
  INDEX `fk_Tipo_TodoTerreno_Tipo_Vehiculo1_idx` (`Tipo_Vehiculo_Numero_Matricula` ASC),
  CONSTRAINT `fk_Tipo_TodoTerreno_Tipo_Vehiculo1`
    FOREIGN KEY (`Tipo_Vehiculo_Numero_Matricula`)
    REFERENCES `unimonito`.`Tipo_Vehiculo` (`Numero_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unimonito`.`Clientes_Frecuentan_Franquicias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unimonito`.`Clientes_Frecuentan_Franquicias` (
  `Franquicias_Codigo_Franquicia` INT NOT NULL,
  `Clientes_Codigo_Cliente` INT NOT NULL,
  PRIMARY KEY (`Franquicias_Codigo_Franquicia`, `Clientes_Codigo_Cliente`),
  INDEX `fk_Franquicias_has_Clientes_Clientes1_idx` (`Clientes_Codigo_Cliente` ASC),
  INDEX `fk_Franquicias_has_Clientes_Franquicias1_idx` (`Franquicias_Codigo_Franquicia` ASC),
  CONSTRAINT `fk_Franquicias_has_Clientes_Franquicias1`
    FOREIGN KEY (`Franquicias_Codigo_Franquicia`)
    REFERENCES `unimonito`.`Franquicias` (`Codigo_Franquicia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Franquicias_has_Clientes_Clientes1`
    FOREIGN KEY (`Clientes_Codigo_Cliente`)
    REFERENCES `unimonito`.`Clientes` (`Codigo_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `franquicias` (`Codigo_Franquicia`, `Localidad`, `Nombre`, `Director`) VALUES ('100', 'Antioquia', 'Antioquia', '111'), ('101', 'Antioquia', 'Choco', '112');
INSERT INTO `empleados` (`Codigo_Empleado`, `Cedula`, `Nombre`, `Fecha_Comienzo_Contrato`, `Salario`, `Franquicia_Asignada`) VALUES ('111', '1234567890', 'Oscar Mora', '2016-08-10', '2000000', '100'), ('112', '1231231231', 'Maria Lopez', '2017-05-31', '2300000', '101')
