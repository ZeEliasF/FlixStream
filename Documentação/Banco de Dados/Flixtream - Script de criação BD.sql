-- MySQL Script generated by MySQL Workbench
-- 06/06/16 14:37:07
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema flixtream
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema flixtream
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `flixtream` DEFAULT CHARACTER SET utf8 ;
USE `flixtream` ;

-- -----------------------------------------------------
-- Table `flixtream`.`Titulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Titulo` (
  `idTitulo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeTitulo` VARCHAR(100) NOT NULL,
  `sinopseTitulo` TEXT(500) NULL,
  `capaTitulo` VARCHAR(100) NULL,
  PRIMARY KEY (`idTitulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Idioma` (
  `idIdioma` INT UNSIGNED NOT NULL,
  `nomeIdioma` VARCHAR(45) NOT NULL,
  `regiaoIdioma` VARCHAR(45) NULL,
  `siglaIdioma` VARCHAR(5) NULL,
  PRIMARY KEY (`idIdioma`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Audio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Audio` (
  `idAudio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_audio_video` INT UNSIGNED NOT NULL,
  `descricaoAudio` VARCHAR(45) NOT NULL,
  `caminhoAudio` VARCHAR(45) NOT NULL,
  `FK_audio_idioma` INT UNSIGNED NULL,
  PRIMARY KEY (`idAudio`, `FK_audio_video`),
  INDEX `FK_video_idx` (`FK_audio_video` ASC),
  INDEX `FK_idioma_idx` (`FK_audio_idioma` ASC),
  CONSTRAINT `FK_audio_video`
    FOREIGN KEY (`FK_audio_video`)
    REFERENCES `flixtream`.`Video` (`idVideo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_audio_idioma`
    FOREIGN KEY (`FK_audio_idioma`)
    REFERENCES `flixtream`.`Idioma` (`idIdioma`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Video` (
  `idVideo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `caminhoVideo` VARCHAR(45) NOT NULL,
  `FK_video_audioOriginal` INT UNSIGNED NULL,
  PRIMARY KEY (`idVideo`),
  INDEX `FK_audio_idx` (`FK_video_audioOriginal` ASC),
  CONSTRAINT `FK_video_audio`
    FOREIGN KEY (`FK_video_audioOriginal`)
    REFERENCES `flixtream`.`Audio` (`idAudio`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Filme` (
  `FK_filme_titulo` INT UNSIGNED NOT NULL,
  `FK_filme_video` INT UNSIGNED NULL,
  PRIMARY KEY (`FK_filme_titulo`),
  INDEX `FK_video_idx` (`FK_filme_video` ASC),
  CONSTRAINT `FK_filme_titulo`
    FOREIGN KEY (`FK_filme_titulo`)
    REFERENCES `flixtream`.`Titulo` (`idTitulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_filme_video`
    FOREIGN KEY (`FK_filme_video`)
    REFERENCES `flixtream`.`Video` (`idVideo`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Serie` (
  `FK_serie_titulo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`FK_serie_titulo`),
  UNIQUE INDEX `FK_titulo_UNIQUE` (`FK_serie_titulo` ASC),
  CONSTRAINT `FK_serie_titulo`
    FOREIGN KEY (`FK_serie_titulo`)
    REFERENCES `flixtream`.`Titulo` (`idTitulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
KEY_BLOCK_SIZE = 1;


-- -----------------------------------------------------
-- Table `flixtream`.`Temporada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Temporada` (
  `FK_temporada_serie` INT UNSIGNED NOT NULL,
  `idTemporada` INT UNSIGNED NOT NULL,
  `nomeTemporada` VARCHAR(45) NULL,
  `sinopseTemporada` TEXT(500) NULL,
  PRIMARY KEY (`FK_temporada_serie`, `idTemporada`),
  CONSTRAINT `FK_temporada_serie`
    FOREIGN KEY (`FK_temporada_serie`)
    REFERENCES `flixtream`.`Serie` (`FK_serie_titulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Episodio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Episodio` (
  `FK_episodio_temporada_serie` INT UNSIGNED NOT NULL,
  `FK_temporada` INT UNSIGNED NOT NULL,
  `idEpisodio` INT UNSIGNED NOT NULL,
  `nomeEpisodio` VARCHAR(45) NULL,
  `sinopseEpisodio` TEXT(500) NULL,
  `FK_episodio_video` INT UNSIGNED NULL,
  PRIMARY KEY (`FK_episodio_temporada_serie`, `FK_temporada`, `idEpisodio`),
  INDEX `FK_video_idx` (`FK_episodio_video` ASC),
  INDEX `fk_Episodio_Temporada1_idx` (`FK_episodio_temporada_serie` ASC, `FK_temporada` ASC),
  CONSTRAINT `FK_episodio_video`
    FOREIGN KEY (`FK_episodio_video`)
    REFERENCES `flixtream`.`Video` (`idVideo`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `FK_episodio_temporada`
    FOREIGN KEY (`FK_episodio_temporada_serie` , `FK_temporada`)
    REFERENCES `flixtream`.`Temporada` (`FK_temporada_serie` , `idTemporada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Legenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Legenda` (
  `idLegenda` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_legenda_video` INT UNSIGNED NOT NULL,
  `descricaoLegenda` VARCHAR(45) NOT NULL,
  `caminhoLegenda` VARCHAR(45) NOT NULL,
  `FK_legenda_idioma` INT UNSIGNED NULL,
  PRIMARY KEY (`idLegenda`, `FK_legenda_video`),
  INDEX `FK_video_idx` (`FK_legenda_video` ASC),
  INDEX `FK_idioma_idx` (`FK_legenda_idioma` ASC),
  CONSTRAINT `FK_legenda_video`
    FOREIGN KEY (`FK_legenda_video`)
    REFERENCES `flixtream`.`Video` (`idVideo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_legenda_idioma`
    FOREIGN KEY (`FK_legenda_idioma`)
    REFERENCES `flixtream`.`Idioma` (`idIdioma`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Usuario` (
  `idUsuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(45) NOT NULL,
  `emailUsuario` VARCHAR(45) NOT NULL,
  `loginUsuario` VARCHAR(45) NOT NULL,
  `senhaUsuario` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `emailUsuario_UNIQUE` (`emailUsuario` ASC),
  UNIQUE INDEX `loginUsuario_UNIQUE` (`loginUsuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Preferencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Preferencias` (
  `FK_preferencias_usuario` INT UNSIGNED NOT NULL,
  `preferirAudioOriginal` TINYINT(1) NOT NULL,
  PRIMARY KEY (`FK_preferencias_usuario`),
  CONSTRAINT `FK_preferencias_usuario`
    FOREIGN KEY (`FK_preferencias_usuario`)
    REFERENCES `flixtream`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Idiomas_Conhecidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Idiomas_Conhecidos` (
  `FK_idiomasConhecidos_preferencias` INT UNSIGNED NOT NULL,
  `FK_idiomasConhecidos_idioma` INT UNSIGNED NOT NULL,
  `ordemPreferenciaIdioma` INT NOT NULL,
  PRIMARY KEY (`FK_idiomasConhecidos_preferencias`, `FK_idiomasConhecidos_idioma`),
  INDEX `FK_idioma_idx` (`FK_idiomasConhecidos_idioma` ASC),
  CONSTRAINT `FK_idiomasConhecidos_preferencias`
    FOREIGN KEY (`FK_idiomasConhecidos_preferencias`)
    REFERENCES `flixtream`.`Preferencias` (`FK_preferencias_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_idiomasConhecidos_idioma`
    FOREIGN KEY (`FK_idiomasConhecidos_idioma`)
    REFERENCES `flixtream`.`Idioma` (`idIdioma`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Historico` (
  `FK_historico_usuario` INT UNSIGNED NOT NULL,
  `FK_historico_titulo` INT UNSIGNED NOT NULL,
  `horaHistorico` DATETIME NOT NULL,
  PRIMARY KEY (`FK_historico_usuario`, `FK_historico_titulo`),
  INDEX `FK_titulo_idx` (`FK_historico_titulo` ASC),
  CONSTRAINT `FK_historico_usuario`
    FOREIGN KEY (`FK_historico_usuario`)
    REFERENCES `flixtream`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_historico_titulo`
    FOREIGN KEY (`FK_historico_titulo`)
    REFERENCES `flixtream`.`Titulo` (`idTitulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Historico_Reproducao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Historico_Reproducao` (
  `FK_historicoReproducao_historico_usuario` INT UNSIGNED NOT NULL,
  `FK_historicoReproducao_historico_titulo` INT UNSIGNED NOT NULL,
  `FK_historicoReproducao_video` INT UNSIGNED NOT NULL,
  `FK_historicoReproducao_configAudio` INT UNSIGNED NULL,
  `FK_historicoReproducao_configLegenda` INT UNSIGNED NULL,
  `posicaoArquivo` TIME NOT NULL,
  PRIMARY KEY (`FK_historicoReproducao_historico_usuario`, `FK_historicoReproducao_historico_titulo`, `FK_historicoReproducao_video`),
  INDEX `FK_video_idx` (`FK_historicoReproducao_video` ASC),
  INDEX `FK_idioma_idx` (`FK_historicoReproducao_configAudio` ASC),
  INDEX `FK_historicoReproducao_idioma_legenda_idx` (`FK_historicoReproducao_configLegenda` ASC),
  CONSTRAINT `FK_historicoReproducao_historico`
    FOREIGN KEY (`FK_historicoReproducao_historico_usuario` , `FK_historicoReproducao_historico_titulo`)
    REFERENCES `flixtream`.`Historico` (`FK_historico_usuario` , `FK_historico_titulo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_historicoReproducao_video`
    FOREIGN KEY (`FK_historicoReproducao_video`)
    REFERENCES `flixtream`.`Video` (`idVideo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_historicoReproducao_idioma_audio`
    FOREIGN KEY (`FK_historicoReproducao_configAudio`)
    REFERENCES `flixtream`.`Idioma` (`idIdioma`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `FK_historicoReproducao_idioma_legenda`
    FOREIGN KEY (`FK_historicoReproducao_configLegenda`)
    REFERENCES `flixtream`.`Idioma` (`idIdioma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flixtream`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `flixtream`.`Administrador` (
  `FK_admin_usuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`FK_admin_usuario`),
  CONSTRAINT `FK_admin_usuario`
    FOREIGN KEY (`FK_admin_usuario`)
    REFERENCES `flixtream`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
