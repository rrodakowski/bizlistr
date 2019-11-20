<?php
require_once(dirname( __FILE__ ) .'/../facilities/Utility.php');

/**
 * Description of DB_Connection
 *
 * @author Randall Rodakowski
 */
class DB_Connection {

    //db_connect.php
    var $con;
    var $db;

    function __construct() {
        $this->connect();
    }

    function protect($string)
    {
        $string = mysql_real_escape_string($string);
        return $string;
    }

    function encrypt($string)
    {
        $string = md5($string);
        return $string;
    }

    function connect()
    {
        $this->con = mysql_connect(Utility::getDb(),Utility::getUser(),Utility::getPw());

        if (!$this->con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else {
            $this->db = mysql_select_db("bizlistr",$this->con);
        }
    }

    /*
     * Used for authenticating a user, who is trying to login.
     */
    function authenticate($userName, $password)
    {
        // TODO: figure out why session_destroy() bombs
        //   session_destroy();
        unset($_SESSION['loggedIn']);
        $userName = $this->protect($userName);
        $password = $this->encrypt($this->protect($password));

        $query = 'SELECT email, password FROM users WHERE email="'.$userName.'"';

        // execute the query
        $result = mysql_query($query) or die("Failed Query of " . $query);  

        // loop through the results and verify the password
        while($thisrow=mysql_fetch_array($result, MYSQL_ASSOC))
        {
            $numRows = mysql_num_rows($result);
            if ($numRows > 1) {
                // Somehow there are more than one record in the db for
                // this username
                return false;
            }

            if (strcmp($password , $thisrow["password"]) == 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // return here if no records are found for the username
        return false;
    }

    /*
     * Create a new user.
     */
    function addUser($userName, $password) {
        $userName = $this->protect($userName);
        $password = $this->encrypt($this->protect($password));

        // Don't add a user if it already exists
        if ($this->doesUserExist($userName)) {
            return false;
        }

        $query = 'INSERT INTO users (email, password) VALUES ("' . $userName . '","' . $password . '")';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        // TODO: build out error conditions, so this can fail gracefully
        return true;
    }

    /*
    * Check to see if the user is in the database
    */
     function doesUserExist($userName) {
        $userName = $this->protect($userName);

        $query = 'SELECT email FROM users WHERE email="'.$userName.'"';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        $numRows = mysql_num_rows($result);
        
        if ($numRows == 0) {
            return false;
        }

        return true;
    }

    /*
     * get the employee range values from the db
     */
    function getEmployeeRange() {

        //$query = 'SELECT C.email FROM phone C, carrier C WHERE p.number="'.$phoneNumber.' AND p.carrier_id = c.carrier_id"';
        $query = 'SELECT E.employee_range_id, E.range FROM employee_range E';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        $numRows = mysql_num_rows($result);

        if ($numRows == 0) {
            return "";
        }

        return $result;
    }

    /*
     * get the employee range for a given id
     */
    function getEmployeeRangeForId($id) {
        $query = 'SELECT E.range FROM employee_range E WHERE E.employee_range_id="'.$id.'"';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        $numRows = mysql_num_rows($result);

        if ($numRows == 0) {
            return "";
        }

         while ($result=@mysql_fetch_assoc($result)) {
              $range = $result["range"];
         }

        return $range;
    }


    /*
     * get the sales range values from the db
     */
    function getSalesRange() {

        $query = 'SELECT S.sales_range_id, S.range FROM sales_range S';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        $numRows = mysql_num_rows($result);

        if ($numRows == 0) {
            return "";
        }

        return $result;
    }

    /*
     * get the sales range for a given id
     */
    function getSalesRangeForId($id) {
        $query = 'select S.range from sales_range S where S.sales_range_id="'.$id.'"';

        $result = mysql_query($query) or die("Failed Query of " . $query);  

        $numRows = mysql_num_rows($result);

        if ($numRows == 0) {
            return "";
        }

         while ($result=@mysql_fetch_assoc($result)) {
              $range = $result["range"];
         }

        return $range;
    }

    /*
     * get the results from the db for input query
     */
    function retrieveResults($query) {

        //$query = 'SELECT S.sales_range_id, S.range FROM sales_range S';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        $numRows = mysql_num_rows($result);

        if ($numRows == 0) {
            return "";
        }

        return $result;
    }

    function normalizeCheckBox($input) {
        if ($input == "on") {
            return 1;
        }

        return 0;
    }

   /*
    * inserts a company into the database, from the CompanyForm
    */
     function insertCompany($companyValuesName) {

        $query = 'CALL new_company("'.$companyValuesName["name"].'","' // public fields
                                    .$companyValuesName["address"].'","'
                                    .$companyValuesName["city"].'","'
                                    .$companyValuesName["state"].'","'
                                    .$companyValuesName["zip"].'","'
                                    .$companyValuesName["phone"].'","'
                                    .$companyValuesName["fax"].'","'
                                    .$companyValuesName["web"].'","'
                                    .$companyValuesName["desc"].'","'
                                    .$companyValuesName["sales"].'","'
                                    .$companyValuesName["employees"].'","'
                                    .$companyValuesName["year"].'","'
                                    .$companyValuesName["exec"].'","'
                                    .$companyValuesName["publicCompany"].'","'
                                    .$companyValuesName["ticker"].'","'
                                    .$companyValuesName["hq"].'","'
                                    .$this->normalizeCheckBox($companyValuesName["publishFlag"]).'","' // internal fields
                                    .$this->normalizeCheckBox($companyValuesName["researchDone"]).'","'
                                    .$companyValuesName["excReason"].'","'
                                    .$companyValuesName["ranking"].'","'
                                    .$companyValuesName["numEployee"].'","'
                                    .$companyValuesName["hrURL"].'","'
                                    .$companyValuesName["addNotes"].'","'
                                    .$companyValuesName["SIC"].'","'
                                    .$companyValuesName["NAIC"].'","'
                                    .$companyValuesName["contactFirst"].'","'
                                    .$companyValuesName["contactLast"].'","'
                                    .$companyValuesName["contactNumber"].'","'
                                    .$companyValuesName["contactTitle"].'","'
                                    .$companyValuesName["contactEmail"].'","'
                                    .$companyValuesName["categories"].'")';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

       /*
    * inserts a company into the database, from the CompanyForm
    */
     function updateCompany($id, $companyValuesName) {

        $query = 'CALL edit_company("'.$id.'","'
                                    .$companyValuesName["name"].'","' // public fields
                                    .$companyValuesName["address"].'","'
                                    .$companyValuesName["city"].'","'
                                    .$companyValuesName["state"].'","'
                                    .$companyValuesName["zip"].'","'
                                    .$companyValuesName["phone"].'","'
                                    .$companyValuesName["fax"].'","'
                                    .$companyValuesName["web"].'","'
                                    .$companyValuesName["desc"].'","'
                                    .$companyValuesName["sales"].'","'
                                    .$companyValuesName["employees"].'","'
                                    .$companyValuesName["year"].'","'
                                    .$companyValuesName["exec"].'","'
                                    .$companyValuesName["publicCompany"].'","'
                                    .$companyValuesName["ticker"].'","'
                                    .$companyValuesName["hq"].'","'
                                    .$this->normalizeCheckBox($companyValuesName["publishFlag"]).'","' // internal fields
                                    .$this->normalizeCheckBox($companyValuesName["researchDone"]).'","'
                                    .$companyValuesName["excReason"].'","'
                                    .$companyValuesName["ranking"].'","'
                                    .$companyValuesName["numEployee"].'","'
                                    .$companyValuesName["hrURL"].'","'
                                    .$companyValuesName["addNotes"].'","'
                                    .$companyValuesName["SIC"].'","'
                                    .$companyValuesName["NAIC"].'","'
                                    .$companyValuesName["contactFirst"].'","'
                                    .$companyValuesName["contactLast"].'","'
                                    .$companyValuesName["contactNumber"].'","'
                                    .$companyValuesName["contactTitle"].'","'
                                    .$companyValuesName["contactEmail"].'","'
                                    .$companyValuesName["categories"].'")';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

  /*
    * inserts a news into the database
    */
     function insertNews($news) {

        $query = 'INSERT INTO news (title, url, source, date) VALUES ("' . $news["title"] . '","' . $news["link"] .'","' . $news["source"] . '", now())';


        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * inserts a job into the database
    */
     function insertJob($job) {
        $query = 'CALL new_job("'.$job["name"].'","' // public fields
                                 .$job["title"].'","'
                                 .$job["city"].'","'
                                 .$job["description"].'","'
                                 .$job["url"].'","'
                                 .$job["category"].'","'
                                 .$this->normalizeCheckBox($job["type"]).'")';
        //$query = 'INSERT INTO jobs (company, job_title, city, `desc`, job_link, job_category, date)
          //          VALUES ("' . $job["name"] . '","' . $job["title"] . '","' . $job["city"] . '","' . $job["description"] . '","' . $job["url"] .'","' . $job["category"] . '", now())';


        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * inserts a category into the database
    */
     function insertCategory($val) {

        $query = 'INSERT INTO company_category (`desc`) VALUES ("' . $val["category"] . '")';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * delete a category from the database
    */
     function deleteCategory($val) {

        $query = 'DELETE FROM company_category WHERE company_category_id=' .$val["exist"].'';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * update a category into the database
    */
     function updateCategory($val) {

        if ($val[reference] == null) {
            $query = 'UPDATE company_category SET `desc`="'.$val[category].'" WHERE company_category_id="' .$val[id].'"';
        }
        else {
            $query = 'UPDATE company_category SET `reference_data`="'.$val[reference].'" WHERE company_category_id="' .$val[id].'"';
        }

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * inserts a category into the database
    */
     function insertJobCategory($val) {

        $query = 'INSERT INTO job_category (`desc`) VALUES ("' . $val["category"] . '")';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * delete a category from the database
    */
     function deleteJobCategory($val) {

        $query = 'DELETE FROM job_category WHERE job_category_id=' .$val["exist"].'';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }

   /*
    * delete a company from the database
    */
     function deleteCompany($id) {

        $query = 'DELETE FROM company WHERE company_id=' .$id.'';

        $result = mysql_query($query) or die("Failed Query of " . $query);

        $query2 = 'DELETE FROM company_category_map WHERE company_id=' .$id.'';

        $result = mysql_query($query2) or die("Failed Query of " . $query2);

        return $result;
    }

    /*
    * delete a job from the database
    */
     function deleteJob($id) {

        $query = 'DELETE FROM jobs WHERE job_id=' .$id.'';

        $result = mysql_query($query) or die("Failed Query of " . $query);

        $query2 = 'DELETE FROM job_category_map WHERE job_id=' .$id.'';

        $result = mysql_query($query2) or die("Failed Query of " . $query2);

        return $result;
    }

    /*
    * delete a news item from the database
    */
     function deleteNews($id) {

        $query = 'DELETE FROM news WHERE news_id=' .$id.'';

        $result = mysql_query($query) or die("Failed Query of " . $query);

        return $result;
    }

   /*
    * update a category into the database
    */
     function updateJobCategory($val) {
        $query = 'UPDATE job_category SET `desc`="'.$val[category].'" WHERE job_category_id="' .$val[id].'"';

        $result = mysql_query($query) or die("Failed Query of " . $query);  //do the query

        return $result;
    }
}
?>
