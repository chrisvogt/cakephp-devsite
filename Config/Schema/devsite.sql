SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `clients`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(150) NOT NULL ,
  `website_url` VARCHAR(1500) NULL DEFAULT NULL ,
  `address` VARCHAR(255) NULL DEFAULT NULL ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `state` CHAR(2) NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projects` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `client_id` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `name` VARCHAR(150) NOT NULL ,
  `content` TEXT NULL DEFAULT NULL ,
  `is_active` TINYINT(1) NOT NULL DEFAULT 0 ,
  `is_private` TINYINT(1) NOT NULL DEFAULT 0 ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `client_id` (`client_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `groups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `group_id` INT(11) UNSIGNED NOT NULL DEFAULT 1 ,
  `client_id` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `pass` VARCHAR(64) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `gravatar_url` VARCHAR(255) NULL DEFAULT NULL ,
  `is_active` TINYINT(1) NOT NULL DEFAULT 0 ,
  `activation_key` CHAR(36) NULL DEFAULT NULL ,
  `last_seen` DATETIME NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `group_id` (`group_id` ASC) ,
  INDEX `client_id` (`client_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_metas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `user_metas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `key` VARCHAR(255) NOT NULL ,
  `value` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `user_id` (`user_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_metas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_metas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `project_id` INT(11) UNSIGNED NOT NULL ,
  `key` VARCHAR(255) NOT NULL ,
  `value` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `project_id` (`project_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tags` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `lft` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `rght` INT(11) UNSIGNED NULL DEFAULT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `parent_id` (`parent_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projects_tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projects_tags` (
  `id` INT(11) UNSIGNED NOT NULL ,
  `project_id` INT(11) UNSIGNED NOT NULL ,
  `tag_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `project_id` (`project_id` ASC) ,
  INDEX `tag_id` (`tag_id` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `groups`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `groups` (`id`, `name`) VALUES (1, 'user');
INSERT INTO `groups` (`id`, `name`) VALUES (2, 'recruiter');
INSERT INTO `groups` (`id`, `name`) VALUES (3, 'admin');

COMMIT;
