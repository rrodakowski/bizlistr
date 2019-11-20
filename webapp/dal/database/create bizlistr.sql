-- SQL commands for creating the tables in forgetfulNation's database.

CREATE DATABASE bizlistr;

CREATE  TABLE IF NOT EXISTS `bizlistr`.`users` (
`user_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`email` VARCHAR(255) NOT NULL,
`password` VARCHAR(255) NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`news` (
`news_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`title` VARCHAR(160) NOT NULL,
`url` VARCHAR(160) NOT NULL,
`source` VARCHAR(160) NOT NULL,
`date` DATETIME NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`sales_range` (
`sales_range_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`range` VARCHAR(255) NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`employee_range` (
`employee_range_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`range` VARCHAR(255) NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`company` (
`company_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`company_name` VARCHAR(255) NOT NULL,
`address` VARCHAR(255) NOT NULL,
`city` VARCHAR(255) NOT NULL,
`state` VARCHAR(255) NOT NULL,
`zip` VARCHAR(255) NOT NULL,
`phone` VARCHAR(64) NOT NULL,
`fax` VARCHAR(64) NOT NULL,
`web` VARCHAR(255) NOT NULL,
`desc` VARCHAR(2048) NOT NULL,
`sales_range_id` INT(11) NOT NULL,
`employee_range_id` INT(11) NOT NULL,
`year_founded` INT(4) NOT NULL,
`ticker` VARCHAR(32) NOT NULL,
`executive` VARCHAR(255) NOT NULL,
`public` VARCHAR(255) NOT NULL,
`headquarters` VARCHAR(255) NOT NULL,
`publish` INT(1) NOT NULL, /* internal fields */
`researchDone` INT(1) NOT NULL,
`exclusion_reason` VARCHAR(255) NOT NULL,
`ranking` VARCHAR(255) NULL,
`actual_employees` VARCHAR(255) NOT NULL,
`hr_url` VARCHAR(511) NOT NULL,
`notes` VARCHAR(255) NOT NULL,
`sic` INT(11) NOT NULL,
`naic` INT(11) NOT NULL,
`update` DATETIME NOT NULL,
FOREIGN KEY (employee_range_id) REFERENCES employee_range(employee_range_id),
FOREIGN KEY (sales_range_id) REFERENCES sales_range(sales_range_id)
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`company_category` (
  `company_category_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `desc` VARCHAR(255) NOT NULL ,
  `reference_data` VARCHAR(1024) NULL ,
  PRIMARY KEY (`company_category_id`) );

CREATE  TABLE IF NOT EXISTS `bizlistr`.`company_category_map` (
  `company_id` INT(11) NOT NULL ,
  `company_category_id` INT(11) NOT NULL ,
  INDEX `company_category_id` (`company_category_id` ASC) ,
  INDEX `company_id` (`company_id` ASC) ,
  INDEX `fk_company_id_3` (`company_id` ASC) ,
  INDEX `fk_company_category_map_1` (`company_category_id` ASC) ,
  PRIMARY KEY (`company_id`, `company_category_id`) ,
  CONSTRAINT `fk_company_id_3`
    FOREIGN KEY (`company_id` )
    REFERENCES `bizlistr`.`company` (`company_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_category_map_1`
    FOREIGN KEY (`company_category_id` )
    REFERENCES `bizlistr`.`company_category` (`company_category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`jobs` (
`job_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`company` VARCHAR(160) NOT NULL,
`job_title` VARCHAR(255) NOT NULL,
`city` VARCHAR(255) NOT NULL,
`desc` VARCHAR(1024) NOT NULL,
`job_link` VARCHAR(255) NOT NULL,
`date` DATETIME NOT NULL,
`published` TINYINT(1) NOT NULL,
`isInternal` TINYINT(1) NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`job_category` (
`job_category_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`desc` VARCHAR(255) NOT NULL
);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`job_category_map` (
  `job_id` INT(11) NOT NULL ,
  `job_category_id` INT(11) NOT NULL ,
  INDEX `fk_job_id_1` (`job_id` ASC) ,
  INDEX `fk_job_category_map_1` (`job_category_id` ASC) ,
  PRIMARY KEY (`job_id`, `job_category_id`) ,
  CONSTRAINT `fk_job_id_1`
    FOREIGN KEY (`job_id` )
    REFERENCES `bizlistr`.`jobs` (`job_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_job_category_map_1`
    FOREIGN KEY (`job_category_id` )
    REFERENCES `bizlistr`.`job_category` (`job_category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE  TABLE IF NOT EXISTS `bizlistr`.`company_contact` (
`company_contact_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`company_id` INT(11) NOT NULL,
`first_name` VARCHAR(255) NOT NULL,
`last_name` VARCHAR(255) NOT NULL,
`title` VARCHAR(255) NOT NULL,
`email` VARCHAR(255) NOT NULL,
`phone` VARCHAR(64) NOT NULL,
FOREIGN KEY (company_id) REFERENCES company(company_id)
);

show engine innodb status;