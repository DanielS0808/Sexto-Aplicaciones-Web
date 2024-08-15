-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Eva01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Eva01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Eva01` DEFAULT CHARACTER SET utf8 ;
USE `Eva01` ;

-- -----------------------------------------------------
-- Table `Eva01`.`Clubes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eva01`.`Clubes` (
  `idClubes` INT NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `Deporte` VARCHAR(25) NOT NULL,
  `Ubicacion` VARCHAR(100) NOT NULL,
  `Fecha_fundacion` DATE NOT NULL,
  PRIMARY KEY (`idClubes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eva01`.`Miembros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eva01`.`Miembros` (
  `idMiembros` INT NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `Apellido` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idMiembros`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eva01`.`Registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eva01`.`Registros` (
  `idRegistros` INT NOT NULL AUTO_INCREMENT,
  `Estado` INT NOT NULL,
  `Fecha_Registro` DATE NULL,
  `Clubes_idClubes` INT NOT NULL,
  `Miembros_idMiembros` INT NOT NULL,
  PRIMARY KEY (`idRegistros`),
  INDEX `fk_Registros_Clubes_idx` (`Clubes_idClubes` ASC) ,
  INDEX `fk_Registros_Miembros1_idx` (`Miembros_idMiembros` ASC) ,
  CONSTRAINT `fk_Registros_Clubes`
    FOREIGN KEY (`Clubes_idClubes`)
    REFERENCES `Eva01`.`Clubes` (`idClubes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registros_Miembros1`
    FOREIGN KEY (`Miembros_idMiembros`)
    REFERENCES `Eva01`.`Miembros` (`idMiembros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
