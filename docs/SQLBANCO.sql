SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `db_tomato` ;
CREATE SCHEMA IF NOT EXISTS `db_tomato` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `db_tomato` ;

-- -----------------------------------------------------
-- Table `db_tomato`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tomato`.`tb_usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `empresa` VARCHAR(100) NULL,
  `user` VARCHAR(30) NOT NULL,
  `senha` VARCHAR(35) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_tomato`.`tb_atividade_tomato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tomato`.`tb_atividade_tomato` (
  `id_atividade_tomato` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NULL,
  `tb_usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_atividade_tomato`),
  INDEX `fk_tb_atividade_tomato_tb_usuario_idx` (`tb_usuario_id_usuario` ASC),
  CONSTRAINT `fk_tb_atividade_tomato_tb_usuario`
    FOREIGN KEY (`tb_usuario_id_usuario`)
    REFERENCES `db_tomato`.`tb_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_tomato`.`tb_reg_tomato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tomato`.`tb_reg_tomato` (
  `id_tomato` INT NOT NULL AUTO_INCREMENT,
  `dt_inicio` DATETIME NOT NULL,
  `dt_fim` DATETIME NULL,
  `status` VARCHAR(1) NULL,
  `tb_atividade_tomato_id_atividade_tomato` INT NOT NULL,
  PRIMARY KEY (`id_tomato`),
  INDEX `fk_tb_reg_tomato_tb_atividade_tomato1_idx` (`tb_atividade_tomato_id_atividade_tomato` ASC),
  CONSTRAINT `fk_tb_reg_tomato_tb_atividade_tomato1`
    FOREIGN KEY (`tb_atividade_tomato_id_atividade_tomato`)
    REFERENCES `db_tomato`.`tb_atividade_tomato` (`id_atividade_tomato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
