<?php
require_once('DB_Connection.php');

class Company {
    private $data = array();
    private $id;


    function __construct() {
        $this->data["name"]="";
        $this->data["address"]="";
        $this->data["city"]="";
        $this->data["state"]="";
        $this->data["zip"]="";
        $this->data["phone"]="";
        $this->data["fax"]="";
        $this->data["web"]="";
        $this->data["desc"]="";
        $this->data["sales"]="";
        $this->data["employees"]="";
        $this->data["year"]="";
        $this->data["exec"]="";
        $this->data["publicCompany"]="";
        $this->data["ticker"]="";
        $this->data["hq"]="";
        $this->data["publishFlag"]="";
        $this->data["researchDone"]="";
        $this->data["excReason"]="";
        $this->data["ranking"]="";
        $this->data["numEployee"]="";
        $this->data["hrURL"]="";
        $this->data["addNotes"]="";
        $this->data["SIC"]="";
        $this->data["NAIC"]="";
        $this->data["update"]="";
        $this->data["contactFirst"]="";
        $this->data["contactLast"]="";
        $this->data["contactNumber"]="";
        $this->data["contactTitle"]="";
        $this->data["contactEmail"]="";
        $this->data["categories"]="";
    }

/*
 *  to to database and fill data array with results
 */
    public function populate($id) {
        $this->id = $id;
        $query = "SELECT * FROM company WHERE company_id=".$id;

        $db = new DB_Connection();

        $result = $db->retrieveResults($query);
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $this->data["name"]=$r["company_name"];
                $this->data["address"]=$r["address"];
                $this->data["city"]=$r["city"];
                $this->data["state"]=$r["state"];
                $this->data["zip"]=$r["zip"];
                $this->data["phone"]=$r["phone"];
                $this->data["fax"]=$r["fax"];
                $this->data["web"]=$r["web"];
                $this->data["desc"]=$r["desc"];
                $this->data["sales"]=$r["sales_range_id"];
                $this->data["employees"]=$r["employee_range_id"];
                $this->data["year"]=$r["year_founded"];
                $this->data["exec"]=$r["executive"];
                $this->data["publicCompany"]=$r["public"];
                $this->data["ticker"]=$r["ticker"];
                $this->data["hq"]=$r["headquarters"];
                $this->data["publishFlag"]=$r["publish"];
                $this->data["researchDone"]=$r["researchDone"];
                $this->data["excReason"]=$r["exclusion_reason"];
                $this->data["ranking"]=$r["ranking"];
                $this->data["numEployee"]=$r["actual_employees"];
                $this->data["hrURL"]=$r["hr_url"];
                $this->data["addNotes"]=$r["notes"];
                $this->data["SIC"]=$r["sic"];
                $this->data["NAIC"]=$r["naic"];
                $this->data["update"]=$r["update"];
            }
        }

        $query = "SELECT * FROM company_contact WHERE company_id=".$id;
        $result = $db->retrieveResults($query);
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $this->data["contactFirst"]=$r["first_name"];
                $this->data["contactLast"]=$r["last_name"];
                $this->data["contactNumber"]=$r["phone"];
                $this->data["contactTitle"]=$r["title"];
                $this->data["contactEmail"]=$r["email"];
            }
        }

        $query = "SELECT * FROM company_category_map WHERE company_id=".$id;
        $result = $db->retrieveResults($query);
        $categories = "";
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $categories .= $r["company_category_id"];
                $categories .="|";
                
            }
            
            $this->data["categories"]= $categories;
        }   
    }

    /* This is the static comparing function:
     * For bizlistr, sort first by ranking
     * then sort by actual number of employees
     */
    static function cmp_company($a, $b)
    {
        $al = number_format($a->ranking);
        $bl = number_format($b->ranking);
        if ($al == $bl) {
            $a2 = number_format($a->numEployee);
            $b2 = number_format($b->numEployee);

            if ($a2 == $b2) {
                return 0;
            }
            else {
                return ($a2 < $b2) ? +1 : -1;
            } 
        }

        return ($al > $bl) ? +1 : -1;
    }
    
    public function __set($name, $value) {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name) {
        //echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return "";
    }

    public function getId() {
        return $this->id;
    }

    public function setId($c_id) {
        return $this->id = $c_id;
    }

}
?>
