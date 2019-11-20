-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_company`(IN comp_name VARCHAR(255),
        IN address VARCHAR(255),
        IN city VARCHAR(255),
        IN st VARCHAR(255),
        IN zip VARCHAR(255),
        IN phone VARCHAR(64),
        IN fax VARCHAR(64),
        IN web VARCHAR(255),
        IN description VARCHAR(2048),
        IN sales INT(11),
        IN employee INT(11),
        IN yearFounded INT(4),
        IN executive VARCHAR(255),
        IN publicCompany VARCHAR(255),
	IN ticker VARCHAR(32),
	IN hq VARCHAR(255),
	IN publishFlag TINYINT,
	IN researchDone TINYINT,
	IN excReason VARCHAR(255),
	IN ranking VARCHAR(255),
	IN numEployee VARCHAR(255),
	IN hrURL VARCHAR(511),
	IN addNotes VARCHAR(255),
	IN SIC INT(11),
	IN NAIC INT(11),
	IN contactFirst VARCHAR(255),
	IN contactLast VARCHAR(255),
	IN contactNumber VARCHAR(64),
	IN contactTitle VARCHAR(255),
        IN contactEmail VARCHAR(255),
	IN categories VARCHAR(255))
BEGIN
	-- all variables for this procedure --
	DECLARE CityList varchar(8000);
	DECLARE Delimeter char(1);
	DECLARE City2 VARCHAR(50);
	DECLARE StartPos int;
	DECLARE Length int;
	DECLARE companyID int;


   INSERT INTO company (`company_name`,
                        `address`,
                        `city`,
                        `state`,
                        `zip`,
                        `phone`,
                        `fax`,
                        `web`,
                        `desc`,
                        `sales_range_id`,
                        `employee_range_id`,
                        `year_founded`,
                        `executive`,
                        `public`,
                        `ticker`,
                        `headquarters`,
                        `publish`,  /* internal fields */
                        `researchDone`,
                        `exclusion_reason`,
			`ranking`,
                        `actual_employees`,
                        `hr_url`,
                        `notes`,
                        `sic`,
                        `naic`,
                        `update`)
     VALUES(comp_name,
            address,
            city,
            st,
            zip,
            phone,
            fax,
            web,
            description,
            sales,
            employee,
            yearFounded,
            executive,
            publicCompany,
            ticker,
            hq,
            publishFlag, /* internal fields */
            researchDone,
            excReason,
	    ranking,
            numEployee,
            hrURL,
            addNotes,
            SIC,
            NAIC,
            now());

	SET @companyID = LAST_INSERT_ID();

   INSERT INTO company_contact (`company_id`, `first_name`, `last_name`, `title`, `email`, `phone`)
     VALUES(LAST_INSERT_ID(), contactFirst, contactLast, contactTitle, contactEmail, contactNumber);

SET @CityList = categories; -- '1|3|5'

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
			INSERT INTO company_category_map (`company_id`, `company_category_id`)
				VALUES(@companyID, @City2);

	END WHILE;

END
