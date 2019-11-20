<?php

require_once('./dal/DB_Connection.php');
require_once('./facilities/Utility.php');

class PresentCategory {

    function __construct() {
    }

    function getCompanyCategoryDropdown() {
        $db = new DB_Connection();

        $emp_drop = "<select name='existCategory'>";

        $query = 'SELECT C.company_category_id, C.desc FROM company_category C ORDER BY C.desc';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["company_category_id"];
                $value = $r["desc"];
                $emp_drop .= "\r\n<option value='".$id."'>" .$value. "</option>";
            }
        }

        $emp_drop .= "\r\n</select>";

        return $emp_drop;
    }

        /* getCompanyCategoryList() returns in format
         * <li><a href="#">Listing Item</a></li>
         */
        function getCompanyCategoryList() {
        $db = new DB_Connection();

        $list = "";

        $query = 'SELECT C.company_category_id, C.desc FROM company_category C ORDER BY C.desc';

        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["company_category_id"];
                $value = $r["desc"];
                $topQuery = 'select CM.company_id, C.publish from company_category_map CM, company C where CM.company_id = C.company_id and CM.company_category_id="'.$id.'" and C.publish="1"';
                
                $topResult = $db->retrieveResults($topQuery);
                if ($topResult != null) {
                    $topCompanies = mysql_num_rows($topResult);
                }
                else {
                    $topCompanies = 0;
                }

                $list .= "\r\n<li><a href='".Utility::getUrl()."/company.php?id=".$id."'><img class='list-image' src='images/list_item_mark.jpg'/>Top ".$topCompanies." " .$value. "</a></li>";
            }
        }

        return $list;
    }

    function getJobCategoryDropdown() {
        $db = new DB_Connection();
        $query = 'SELECT J.job_category_id, J.desc FROM job_category J ORDER BY J.desc';
        $result = $db->retrieveResults($query);

        $sales_drop = "<select name='existJobCategory'>";

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["job_category_id"];
                $value = $r["desc"];
                $sales_drop .= "\r\n<option value='".$id."'>" .$value. "</option>";
            }
        }

        $sales_drop .= "\r\n</select>";

        return $sales_drop;
    }

    function presentEditPage($id) {
        $db = new DB_Connection();
        $query = 'SELECT C.company_category_id, C.desc FROM company_category C WHERE company_category_id='.$id;
        $result = $db->retrieveResults($query);

        $sales_drop = "<input type='hidden' id='id' name='id' value='".$id."' /><br/>";

        $sales_drop .= "<input type='text' name='category' size='30' maxlength='255' ";

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $value = $r["desc"];
                $sales_drop .= "value='" .$value. "'/>";
            }
        }

        return $sales_drop;
    }

    /* getJobCategoryList() returns in format
     * <li><a href="#">Listing Item</a></li>
     */
    function getJobCategoryList() {
        $db = new DB_Connection();

        $list = "";

        $query = 'SELECT J.job_category_id, J.desc FROM job_category J ORDER BY J.desc';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["job_category_id"];
                $value = $r["desc"];
                
                $topQuery = 'select J.job_id from job_category_map J where J.job_category_id="'.$id.'"';
                $topResult = $db->retrieveResults($topQuery);
                if ($topResult != null) {
                    $topJobs = mysql_num_rows($topResult);
                }
                else {
                    $topJobs = 0;
                }

                 $list .= "\r\n<li><a href='".Utility::getUrl()."/jobs.php?id=".$id."'><img class='list-image' src='images/list_item_mark.jpg'/>" .$value. " (".$topJobs.")</a></li>";

                 //$list .= "\r\n<li><a href='".Utility::getUrl()."/jobs.php?id=".$id."'>" .$value. "</a></li>";
            }
        }

        return $list;
    }

    function presentEditJobCategory($id) {
        $db = new DB_Connection();
        $query = 'SELECT J.job_category_id, J.desc FROM job_category J WHERE job_category_id='.$id;
        $result = $db->retrieveResults($query);

        $sales_drop = "<input type='hidden' id='id' name='id' value='".$id."' /><br/>";

        $sales_drop .= "<input type='text' name='category' size='30' maxlength='255' ";

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $value = $r["desc"];
                $sales_drop .= "value='" .$value. "'/>";
            }
        }

        return $sales_drop;
    }

        function presentEditCompanyRefPage($id) {
        $db = new DB_Connection();
        $query = 'SELECT C.company_category_id, C.reference_data FROM company_category C WHERE company_category_id='.$id;
        $result = $db->retrieveResults($query);

        $output = "<input type='hidden' id='id' name='id' value='".$id."' /><br/>";

        $output .= '<textarea rows="5" cols="43" name="reference" maxlength="1024" ';

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $value = $r["reference_data"];
                $output .= ">" .$value. "</textarea>";
            }
        }

        return $output;
    }
    /**
     *  <SELECT NAME="categories[]" MULTIPLE SIZE=5>
     *     <OPTION VALUE="1">admin
     *     <OPTION VALUE="2">tech
     *     <OPTION VALUE="3">health
     *     <OPTION VALUE="4">advertising
     *     <OPTION VALUE="5">construction
     *  </SELECT>
     */
    function presentMultiSelectCategory($categories) {
        $db = new DB_Connection();
        $cat_array = Utility::separate($categories, "|");

        $list = '<SELECT NAME="categories[]" MULTIPLE SIZE=7>';

        $query = 'SELECT C.company_category_id, C.desc FROM company_category C ORDER BY C.desc';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["company_category_id"];
                $value = $r["desc"];
                if (in_array($id, $cat_array)) {
                    $list .= '\r\n<OPTION VALUE="'.$id.'" selected>'.$value."</OPTION>";
                }
                else {
                    $list .= '\r\n<OPTION VALUE="'.$id.'">'.$value."</OPTION>";
                }
            }
        }

        $list .= "\r\n</SELECT>";

        return $list;
    }

        /**
     *  <SELECT NAME="categories[]" MULTIPLE SIZE=5>
     *     <OPTION VALUE="1">admin
     *     <OPTION VALUE="2">tech
     *     <OPTION VALUE="3">health
     *     <OPTION VALUE="4">advertising
     *     <OPTION VALUE="5">construction
     *  </SELECT>
     */
    function presentJobMultiSelectCategory() {
      $db = new DB_Connection();

        $list = '<SELECT NAME="jobCategories[]" MULTIPLE SIZE=7>';

        $query = 'SELECT J.job_category_id, J.desc FROM job_category J ORDER BY J.desc';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["job_category_id"];
                $value = $r["desc"];
                $list .= '\r\n<OPTION VALUE="'.$id.'">'.$value."</OPTION>";
            }
        }

        $list .= "\r\n</SELECT>";

        return $list;
    }
}

?>
