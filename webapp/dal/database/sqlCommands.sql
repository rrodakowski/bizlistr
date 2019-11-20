/***** User Configuration *****/

INSERT INTO users (email, password)
VALUES ('admin', 'Just4Fun');

/***** Range Configuration *****/

INSERT INTO employee_range (`range`)
VALUES ('5-25');
INSERT INTO employee_range (`range`)
VALUES ('26-50');
INSERT INTO employee_range (`range`)
VALUES ('51-100');
INSERT INTO employee_range (`range`)
VALUES ('101-250');
INSERT INTO employee_range (`range`)
VALUES ('251-500');
INSERT INTO employee_range (`range`)
VALUES ('501-1,000');
INSERT INTO employee_range (`range`)
VALUES ('1,001-5,000');
INSERT INTO employee_range (`range`)
VALUES ('5,001+');
INSERT INTO employee_range (`range`)
VALUES ('NA');

INSERT INTO sales_range (`range`)
VALUES ('0-$5m');
INSERT INTO sales_range (`range`)
VALUES ('5-$10m');
INSERT INTO sales_range (`range`)
VALUES ('10-$25m');
INSERT INTO sales_range (`range`)
VALUES ('25-$50m');
INSERT INTO sales_range (`range`)
VALUES ('50-$100m');
INSERT INTO sales_range (`range`)
VALUES ('$100m+');
INSERT INTO sales_range (`range`)
VALUES ('NA');

/**** Category configuration *****/

INSERT INTO company_category (`desc`)
VALUES ('accounting firms');
INSERT INTO company_category (`desc`)
VALUES ('advertising agencies');
INSERT INTO company_category (`desc`)
VALUES ('architectural firms');
INSERT INTO company_category (`desc`)
VALUES ('asset management firms');
INSERT INTO company_category (`desc`)
VALUES ('banks');
INSERT INTO company_category (`desc`)
VALUES ('biotech companies');
INSERT INTO company_category (`desc`)
VALUES ('chambers of commerce');
INSERT INTO company_category (`desc`)
VALUES ('colleges & universities');
INSERT INTO company_category (`desc`)
VALUES ('commercial mortgage companies');
INSERT INTO company_category (`desc`)
VALUES ('commercial printing companies');
INSERT INTO company_category (`desc`)
VALUES ('commercial property management firms');
INSERT INTO company_category (`desc`)
VALUES ('Residential Property Management Firms');
INSERT INTO company_category (`desc`)
VALUES ('commercial real estate brokerage firms');
INSERT INTO company_category (`desc`)
VALUES ('commercial real estate developers');
INSERT INTO company_category (`desc`)
VALUES ('community colleges & technical schools');
INSERT INTO company_category (`desc`)
VALUES ('computer consulting companies');
INSERT INTO company_category (`desc`)
VALUES ('computer repair firms');
INSERT INTO company_category (`desc`)
VALUES ('credit unions');
INSERT INTO company_category (`desc`)
VALUES ('customized training companies');
INSERT INTO company_category (`desc`)
VALUES ('data management and security');
    
INSERT INTO job_category (`desc`)
VALUES ('admin');
INSERT INTO job_category (`desc`)
VALUES ('business mgmt');
INSERT INTO job_category (`desc`)
VALUES ('consulting bus dev');
INSERT INTO job_category (`desc`)
VALUES ('customer service');
INSERT INTO job_category (`desc`)
VALUES ('education');
INSERT INTO job_category (`desc`)
VALUES ('engineering sci');
INSERT INTO job_category (`desc`)
VALUES ('finance');
INSERT INTO job_category (`desc`)
VALUES ('health medical');
INSERT INTO job_category (`desc`)
VALUES ('hospitality');
INSERT INTO job_category (`desc`)
VALUES ('hr');
INSERT INTO job_category (`desc`)
VALUES ('labor manufacturing');
INSERT INTO job_category (`desc`)
VALUES ('legal');
INSERT INTO job_category (`desc`)
VALUES ('marketing ad pr');
INSERT INTO job_category (`desc`)
VALUES ('media');
INSERT INTO job_category (`desc`)
VALUES ('np gov');
INSERT INTO job_category (`desc`)
VALUES ('real estate');
INSERT INTO job_category (`desc`)
VALUES ('sales');
INSERT INTO job_category (`desc`)
VALUES ('information tech');
INSERT INTO job_category (`desc`)
VALUES ('trades crafts');
INSERT INTO job_category (`desc`)
VALUES ('transportation');

/***** Test Company and Job Data *****/

INSERT INTO `company` (`company_id`, `company_name`, `address`, `city`, `state`, `zip`, `phone`, `fax`, `web`, `desc`, `sales_range_id`, `employee_range_id`, `reference_data`, `publish`, `year_founded`, `ticker`, `executive`, `public`, `headquarters`, `hr_url`, `notes`, `sic`, `naic`, `update`) VALUES ( 1,'test company' ,'test address' ,'test city' ,'ST' ,'10016' ,'555-555-5555' ,'555-555-4444' ,'bizlistr.com' ,'this is a test company' ,1 ,2 ,0 ,0 ,'1999' ,'XYZ' ,'mr. exec' ,1 ,'HQ at Mars', 'xyz.com' ,'notes about company' ,1234 ,2345 , now());

/***** Sample Queries *****/

SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons P, Orders P
ON Persons.P_Id=Orders.P_Id
ORDER BY Persons.LastName
