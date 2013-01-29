SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE SCHEMA IF NOT EXISTS `skillico` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `skillico` ;

CREATE  TABLE IF NOT EXISTS `skillico`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `adress` VARCHAR(45) NULL ,
  `phone` VARCHAR(14) NULL ,
  `date_creation` TIMESTAMP NULL ,
  `last_connection` TIMESTAMP NULL ,
  `level` SMALLINT UNSIGNED NULL ,
  `fk_id_image` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_users_image1_idx` (`fk_id_image` ASC) ,
  CONSTRAINT `fk_users_image1`
    FOREIGN KEY (`fk_id_image` )
    REFERENCES `skillico`.`image` (`id_image` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `skillico`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `adress` VARCHAR(45) NULL ,
  `phone` VARCHAR(14) NULL ,
  `date_creation` TIMESTAMP NULL ,
  `last_connection` TIMESTAMP NULL ,
  `level` SMALLINT UNSIGNED NULL ,
  `fk_id_image` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_users_image1_idx` (`fk_id_image` ASC) ,
  CONSTRAINT `fk_users_image1`
    FOREIGN KEY (`fk_id_image` )
    REFERENCES `skillico`.`image` (`id_image` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `skillico`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `adress` VARCHAR(45) NULL ,
  `phone` VARCHAR(14) NULL ,
  `date_creation` TIMESTAMP NULL ,
  `last_connection` TIMESTAMP NULL ,
  `level` SMALLINT UNSIGNED NULL ,
  `fk_id_image` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_users_image1_idx` (`fk_id_image` ASC) ,
  CONSTRAINT `fk_users_image1`
    FOREIGN KEY (`fk_id_image` )
    REFERENCES `skillico`.`image` (`id_image` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `skillico`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `adress` VARCHAR(45) NULL ,
  `phone` VARCHAR(14) NULL ,
  `date_creation` TIMESTAMP NULL ,
  `last_connection` TIMESTAMP NULL ,
  `level` SMALLINT UNSIGNED NULL ,
  `fk_id_image` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_users_image1_idx` (`fk_id_image` ASC) ,
  CONSTRAINT `fk_users_image1`
    FOREIGN KEY (`fk_id_image` )
    REFERENCES `skillico`.`image` (`id_image` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `skillico`.`image` (
  `id_image` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `extension` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_image`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `skillico`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `adress` VARCHAR(45) NULL ,
  `phone` VARCHAR(14) NULL ,
  `date_creation` TIMESTAMP NULL ,
  `last_connection` TIMESTAMP NULL ,
  `level` SMALLINT UNSIGNED NULL ,
  `fk_id_image` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,

  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,

  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,

  INDEX `fk_users_image1_idx` (`fk_id_image` ASC) ,

  CONSTRAINT `fk_users_image1`

    FOREIGN KEY (`fk_id_image` )

    REFERENCES `skillico`.`image` (`id_image` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `skillico`.`offer_duration`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `skillico`.`offer_duration` (

  `id_offer_duration` INT NOT NULL AUTO_INCREMENT ,

  `title` VARCHAR(45) NOT NULL ,

  `description` VARCHAR(45) NOT NULL ,

  PRIMARY KEY (`id_offer_duration`) )

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `skillico`.`offer_cat`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `skillico`.`offer_cat` (

  `id_offer_cat` INT NOT NULL AUTO_INCREMENT ,

  `title` VARCHAR(45) NOT NULL ,

  `description` VARCHAR(45) NOT NULL ,

  `fk_id_image` INT NOT NULL ,

  PRIMARY KEY (`id_offer_cat`) ,

  INDEX `fk_offer_cat_image1_idx` (`fk_id_image` ASC) ,

  CONSTRAINT `fk_offer_cat_image1`

    FOREIGN KEY (`fk_id_image` )

    REFERENCES `skillico`.`image` (`id_image` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `skillico`.`offer`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `skillico`.`offer` (

  `id_offer` INT UNSIGNED NOT NULL AUTO_INCREMENT ,

  `title` VARCHAR(45) NOT NULL ,

  `desciption` TEXT NOT NULL ,

  `beginning` DATETIME NOT NULL ,

  `ending` DATETIME NULL ,

  `price` VARCHAR(45) NULL ,

  `lat` DOUBLE NOT NULL ,

  `lng` DOUBLE NOT NULL ,

  `bid` TINYINT NULL ,

  `fk_id_offer_duration` INT NOT NULL ,

  `fk_id_offer_cat` INT NOT NULL ,

  `fk_id_users_post` INT NOT NULL ,

  `fk_id_users_respond` INT NULL ,

  PRIMARY KEY (`id_offer`) ,

  INDEX `fk_offer_offer_duration_idx` (`fk_id_offer_duration` ASC) ,

  INDEX `fk_offer_offer_cat1_idx` (`fk_id_offer_cat` ASC) ,

  INDEX `fk_offer_users1_idx` (`fk_id_users_post` ASC) ,

  INDEX `fk_offer_users2_idx` (`fk_id_users_respond` ASC) ,

  CONSTRAINT `fk_offer_offer_duration`

    FOREIGN KEY (`fk_id_offer_duration` )

    REFERENCES `skillico`.`offer_duration` (`id_offer_duration` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_offer_offer_cat1`

    FOREIGN KEY (`fk_id_offer_cat` )

    REFERENCES `skillico`.`offer_cat` (`id_offer_cat` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_offer_users1`

    FOREIGN KEY (`fk_id_users_post` )

    REFERENCES `skillico`.`users` (`id_users` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_offer_users2`

    FOREIGN KEY (`fk_id_users_respond` )

    REFERENCES `skillico`.`users` (`id_users` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;








-- -----------------------------------------------------

-- Table `skillico`.`avis`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `skillico`.`avis` (

  `id_avis` INT NOT NULL AUTO_INCREMENT ,

  `note` INT NULL ,

  `description` VARCHAR(254) NULL ,

  `fk_id_users` INT NOT NULL ,

  PRIMARY KEY (`id_avis`) ,

  INDEX `fk_avis_users1_idx` (`fk_id_users` ASC) ,

  CONSTRAINT `fk_avis_users1`

    FOREIGN KEY (`fk_id_users` )

    REFERENCES `skillico`.`users` (`id_users` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `skillico`.`offer_bid`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `skillico`.`offer_bid` (

  `id_offer_bid` INT NOT NULL AUTO_INCREMENT ,

  `fk_id_offer` INT UNSIGNED NOT NULL ,

  `fk_id_users` INT NOT NULL ,

  `step` DECIMAL NOT NULL ,

  PRIMARY KEY (`id_offer_bid`) ,

  INDEX `fk_offer_bid_offer1_idx` (`fk_id_offer` ASC) ,

  INDEX `fk_offer_bid_1_idx` (`fk_id_users` ASC) ,

  CONSTRAINT `fk_offer_bid_offer1`

    FOREIGN KEY (`fk_id_offer` )

    REFERENCES `skillico`.`offer` (`id_offer` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_offer_bid_1`

    FOREIGN KEY (`fk_id_users` )

    REFERENCES `skillico`.`users` (`id_users` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;



USE `skillico` ;





SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

