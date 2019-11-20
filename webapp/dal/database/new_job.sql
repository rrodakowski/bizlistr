-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_job`(
	IN company VARCHAR(160),
        IN job_title VARCHAR(255),
        IN city VARCHAR(255),
        IN description VARCHAR(1024),
        IN job_link VARCHAR(255),
        IN category INT(11),
        IN isInternal TINYINT)
BEGIN
	-- all variables for this procedure --
	DECLARE CityList varchar(8000);
	DECLARE Delimeter char(1);
	DECLARE City2 VARCHAR(50);
	DECLARE StartPos int;
	DECLARE Length int;
	DECLARE companyID int;

   INSERT INTO jobs (`company`,
                        `job_title`,
                        `city`,
                        `desc`,
                        `job_link`,
                        `date`,
                        `isInternal`)
     VALUES(company,
            job_title,
            city,
            description,
            job_link,
            now(),
            isInternal);

SET @companyID = LAST_INSERT_ID();

SET @CityList = category; -- '1|3|5'

-- declare the delimeter between each City
SET @Delimeter = '|';

-- Parse the string and insert each category into the @tblCity table

	WHILE LENGTH(@CityList) > 0 DO
		SET @StartPos = INSTR(@CityList, @Delimeter);
		IF @StartPos < 0 THEN SET @StartPos = 0;
		END IF;
		SET @Length = LENGTH(@CityList) - @StartPos - 1;
		IF @Length < 0 THEN SET @Length = 0;
		END IF;
		IF @StartPos > 0 THEN
			SET @City2 = SUBSTRING(@CityList, 1, @StartPos - 1);
			SET @CityList = SUBSTRING(@CityList, @StartPos + 1, LENGTH(@CityList) - @StartPos);
		ELSE
			SET @City2 = @CityList;
			SET @CityList = '';
		END IF;
		-- INSERT @tblCity (City) VALUES(@City)
			INSERT INTO job_category_map (`job_id`, `job_category_id`)
				VALUES(@companyID, @City2);

	END WHILE;


END
