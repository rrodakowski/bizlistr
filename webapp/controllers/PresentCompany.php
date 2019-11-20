<?php
require_once('./dal/DB_Connection.php');
require_once('./controllers/PresentCategory.php');
require_once('./dal/Company.php');

class PresentCompany {

    

    function __construct() {
    }

    function getEmployeeDropdown($e_id) {
        $db = new DB_Connection();

        $emp_drop = "<select name='employee'>";

        $result = $db->getEmployeeRange(); 

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["employee_range_id"];
                $value = $r["range"];
                if ($e_id == $id) {
                    $emp_drop .= "\r\n<option value='".$id."' selected>" .$value. "</option>";
                }
                else {
                    $emp_drop .= "\r\n<option value='".$id."'>" .$value. "</option>";
                }
            }
        }

        $emp_drop .= "\r\n</select>";

        return $emp_drop;
    }

    function getSalesDropdown($s_id) {
        $db = new DB_Connection();

        $sales_drop = "<select name='sales'>";

        $result = $db->getSalesRange();

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $id = $r["sales_range_id"];
                $value = $r["range"];
                if ($s_id == $id) {
                    $sales_drop .= "\r\n<option value='".$id."' selected>" .$value. "</option>";
                }
                else {
                    $sales_drop .= "\r\n<option value='".$id."'>" .$value. "</option>";
                }
            }
        }

        $sales_drop .= "\r\n</select>";

        return $sales_drop;
    }

    private function displayCompanyHtml($comp, $counter) {
        $db = new DB_Connection();

        $name = $comp->__get("name");
        $address = $comp->__get("address");
        $ceo = $comp->__get("exec");
        $phone = $comp->__get("phone");
        $fax = $comp->__get("fax");
        $ticker = $comp->__get("ticker");
        $year = $comp->__get("year");
        $url = $comp->__get("web");
        $hq = $comp->__get("hq");
        $city = $comp->__get("city");
        $state = $comp->__get("state");
        $zip = $comp->__get("zip");
        $sales = $comp->__get("sales");
        $employees = $comp->__get("employees");
        $desc = $comp->__get("desc");
        $sales_range = $db->getSalesRangeForId($sales);
        $emp_range = $db->getEmployeeRangeForId($employees);
        $pubOrPrivate = $comp->__get("publicCompany");

        $desc_counter = "description_".$counter;
        $list = '';
        $list .='<tr>';
        $list .='<td>'.$counter.'</td>';
        $list .='<td>';
        $list .='<ul>';
        $list .='<li>';
        $list .='<table>';
        $list .='<tbody>';
        $list .='<tr>';
        $list .='<td><b>'.$name.'</b></td><td>'.$sales_range.'</td><td>'.$ceo.'</td>';
        $list .='</tr>';
        $list .='<tr>';

        if (strcasecmp($pubOrPrivate, "public") == 0) {
            if ($ticker == null) {
                $list .='<td>'.$address.'</td><td>'.$emp_range.'</td><td> Public </td>';
            }
            else {
                $list .='<td>'.$address.'</td><td>'.$emp_range.'</td><td>Public '.$ticker.'</td>';
            }
        }
        else {
            $list .='<td>'.$address.'</td><td>'.$emp_range.'</td><td> Private </td>';
        }
        $list .='</tr>';
        $list .='<tr>';
       // Set the yearfounded to 'NA' if there is no year.
       if ($year == 0) {
            $list .='<td>'.$phone.', '.$fax.'</td><td> NA </td><td>'.$this->outputHq($hq).'</td>';
        }
        else {
            $list .='<td>'.$phone.', '.$fax.'</td><td>'.$year.'</td><td>'.$this->outputHq($hq).'</td>';
        }

        $list .='</tr>';
        $list .='<td>'.$city.', '.$state.' '.$zip.'</td><td><a href="http://'.$url.'">'.$url.' </a></td><td></td>';
        $list .='<tr>';
        $list .='</tr>';
        $list .='<tr>';
        $list .='<td><a class="toggle" href="#'.$desc_counter.'">Company Profile and Web Links</a></td><td></td><td></td>';
        $list .='</tr>';
        $list .='</tbody>';
        $list .='</table>';
        $list .='</li>';
        $list .='<li class="description hide" id="'.$desc_counter.'">'.$desc. '<a href="#'.$desc_counter.'" class="toggle">(close)</a></li>';
        $list .='</ul>';
        $list .='<hr>';
        $list .='</td>';
        $list .='</tr>';
        
                                              
       /* $list .='<li><a class="toggle" href="#'.$desc_counter.'">';
        $list .= $name."</a>";
        $list .= '<table>
                                    <col width:"250px"></col>
                                     <col width:"125px"></col>
                                       <col width:"125px"></col>
                                  <tr>';
        $list .= "<td>".$address."</td>";
        $list .= "<td>".$sales_range."</td>";
        $list .= "<td>".$ceo."</td></tr><tr>";
        $list .= "<td>p: ".$phone." f: ".$fax."</td>";
        $list .= "<td>mn employees: ".$emp_range."</td>";
        if (strcasecmp($pubOrPrivate, "public") == 0) {
            if ($ticker == null) {
                $list .= "<td> ".$pubOrPrivate." Company</td></tr><tr>";
            }
            else {
                $list .= "<td>Public ".$ticker."</td></tr><tr>";
            }
        }
        else {
            $list .= "<td> Private Company</td></tr><tr>";
        }
        $list .= '<td><a href="'.$url.'"'.$url." </a></td>";
        $list .= "<td>founded: ".$year."</td>";
        $list .= "<td>".$hq."</td></tr><tr>";
        $list .= '<td><a href="#'.$desc_counter.'" class="toggle">Company Description</a></td>';
        $list .= '<td></td>';
        $list .= "     <td></td>
                                   </tr>
                                  </table>
                                </li>";

        $list .= '<li id="'.$desc_counter.'" class="description hide">'.$desc.'<a class="toggle" href="#'.$desc_counter.'">(close)</a></li>';*/
        return $list;
    }

    function outputHq($hq) {
       $retVal = "";
       if (strcasecmp($hq, "branch") == 0) {
            $retVal = "Branch";
       }
       else if (strcasecmp($hq, "hq") == 0) {
            $retVal = "HQ";
       }
       else {
           $retValue ="";
       }
       return $retVal;
    }


    function getCompanyList($category) {
        $db = new DB_Connection();

        $list = '';
        $query = 'select CM.company_id from  company_category_map CM, company C where CM.company_id = C.company_id and CM.company_category_id="'.$category.'" and C.ranking IS NOT NULL and C.ranking <>"" and C.publish="1"';
        $result = $db->retrieveResults($query);
        $counter = 0;

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $c_id = $r["company_id"];

                $company = new Company();
                $company->populate($c_id);
                $a[] = $company;
            }
            
            usort($a, array("Company", "cmp_company"));

            foreach ($a as $comp) {
                $counter++;
               // $desc_counter = "description_".$counter;

                $list .= $this->displayCompanyHtml($comp, $counter);
            }
        }

        $query = 'select * from  company_category_map CM, company C where CM.company_id = C.company_id and CM.company_category_id="'.$category.'" and (C.ranking IS NULL or C.ranking ="") and C.actual_employees IS NOT NULL and C.actual_employees <>"" and C.publish="1"';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $c_id = $r["company_id"];

                $company = new Company();
                $company->populate($c_id);
                $b[] = $company;
            }

            usort($b, array("Company", "cmp_company"));

            foreach ($b as $comp) {
                $counter++;
                //$desc_counter = "description_".$counter;

                $list .= $this->displayCompanyHtml($comp, $counter);
            }
        }

        $list .= '</table>';

        /*
         * AT the end of the list of companies, place some reference data for
         * this category, explaining the sources for this information.
         */
        $query = 'select C.reference_data from company_category C where company_category_id="'.$category.'"';
        $result = $db->retrieveResults($query);

        if (@mysql_num_rows($result)) {
            while ($r3=@mysql_fetch_assoc($result)) {
                 $data = $r3["reference_data"];
                $list .= "<br/><h3> Reference Information </h3> <p> ".$data."</p>";
            }
        }

        return $list;
    }

    function getCompanyForm($id) {
        $db = new DB_Connection();
        $comp = new Company();

        if ($id != 0) {
            // Populate company object;
            $comp->populate($id);
        }

        $form = '<div id="body">
            <br />
        <form method="post" action="controllers/ProcessCompany.php">';

        if ($id != 0) {
            $form .= '<input type="hidden" id="mode" name="mode" value="'.$id.'" />';
        }
        else {
            $form .= '<input type="hidden" id="mode" name="mode" value="add" />';
        }


        $form .='
        <table align="center">
        <tr>
        <td><h3> Published Fields </h3></td>
        <td><h3> Internal Fields </h3></td>
        </tr>
        <tr>
        <td>Company Name<br />
        <input type="text" name="name" size="30" maxlength="64" value="'.$comp->__get("name").'" /><br /></td>
        <td>';
        $var = $comp->__get("publishFlag");
        if (empty($var)) {
           $form .= '<input type="checkbox" name="publishFlag"/>';
        }
        else {
           $form .= '<input type="checkbox" name="publishFlag" checked/>';
        }
         $form .= '
        Published?<br/></td>
        </tr>
        <tr>
        <td>        Company Address<br />
        <input type="text" name="address" size="30" maxlength="255" value="'.$comp->__get("address").'" /><br /></td>
        <td>';
        $var = $comp->__get("researchDone");
        if (empty($var)) {
           $form .= '<input type="checkbox" name="researchDone"/>';
        }
        else {
           $form .= '<input type="checkbox" name="researchDone" checked/>';
        }
        $form .= '

        Research complete?<br/></td>
        </tr>
        <tr>
        <td>        Company City<br/>
        <input type="text" name="city" size="30" maxlength="255" value="'.$comp->__get("city").'" /><br /></td>
        <td>  Exclusion reason<br />
                  <input type="text" name="excReason" size="30" maxlength="64" value="'.$comp->__get("excReason").'" /><br /></td>
        </tr>
        <tr>
        <td>        Company State<br/>
        <input type="text" name="state" size="30" maxlength="255" value="'.$comp->__get("state").'" /><br /></td>
        <td>        Ranking number-- for now what you put in this field will be the rank!<br />
        <input type="text" name="ranking" size="30" maxlength="64" value="'.$comp->__get("ranking").'" /><br />
        </td>
        </tr>
        <tr>
        <td>        Company Zip<br/>
        <input type="text" name="zip" size="30" maxlength="255" value="'.$comp->__get("zip").'" /><br /></td>
        <td> Acutal employee -- may not use, but leaving field here for time being.<br />
        <input type="text" name="numEployee" size="30" maxlength="64" value="'.$comp->__get("numEployee").'" /><br />
        </td>
        </tr>
        <tr>
        <td>        Company Phone<br/>
        <input type="text" name="phone" size="30" maxlength="255" value="'.$comp->__get("phone").'" /><br /></td>
        <td>       HR Site<br />
        <input type="text" name="hrURL" size="30" maxlength="511" value="'.$comp->__get("hrURL").'" /><br />
        </td>
        </tr>
        <tr>
        <td>        Company Fax<br/>
        <input type="text" name="fax" size="30" maxlength="255" value="'.$comp->__get("fax").'" /><br /></td>
        <td> Record Notes (formerly Additional Notes)<br />
            <input type="text" name="addNotes" size="30" maxlength="64" value="'.$comp->__get("addNotes").'" /><br />
        </td>
        </tr>
        <tr>
            <td>        Company Web<br/>
                <input type="text" name="web" size="30" maxlength="255" value="'.$comp->__get("web").'" /><br /></td>
            <td>     Last update -- automatically generated<br />
                <input type="text" name="update" size="30" maxlength="64" value="'.$comp->__get("update").'" readonly/><br />
            </td>
        </tr>
        <tr>
                <td>        Company profile/description<br/>
                    <textarea rows="5" cols="43" name="desc" maxlength="2048">'.$comp->__get("desc").'</textarea><br />
                </td>
            <td>    
            </td>
         </tr>
            <tr>
                <td>        Sales Range<br/>';

                    $Company = new PresentCompany();
                    $dropdown = $Company->getSalesDropdown($comp->__get("sales"));
                    $form .= $dropdown;
                  $form .= '
                </td>
                <td>     Company SIC<br />
                <input type="text" name="SIC" size="30" maxlength="64" value="'.$comp->__get("SIC").'" /><br />
                </td>
            </tr>
            <tr>
                <td>        Employee Range<br/>';

                    $Company = new PresentCompany();
                    $dropdown = $Company->getEmployeeDropdown($comp->__get("employees"));
               $form .= $dropdown;

                $form .= '</td>
                <td>       Company NAIC<br />
                    <input type="text" name="NAIC" size="30" maxlength="64" value="'.$comp->__get("NAIC").'" /><br />
                </td>
            </tr>
            <tr>
                <td>       Year Founded<br/>
        <input type="text" name="year" size="30" maxlength="255" value="'.$comp->__get("year").'" /><br /></td>
                <td>       Company Contact First Name<br />
        <input type="text" name="contactFirst" size="30" maxlength="64" value="'.$comp->__get("contactFirst").'" /><br />
                </td>
            </tr>
            <tr>
                <td>        Top Executive<br/>
        <input type="text" name="exec" size="30" maxlength="255" value="'.$comp->__get("exec").'" /><br /></td>
                <td>        Company Contact Last Name<br />
        <input type="text" name="contactLast" size="30" maxlength="64" value="'.$comp->__get("contactLast").'" /><br />
                </td>
            </tr>
            <tr>
                <td>       Public or private?<br/>';
        $var = $comp->__get("publicCompany");
        if (empty($var)) {
           $form .= '<input type="radio" name="public" value="public" />Public<br />';
           $form .= '<input type="radio" name="public" value="private" />Private<br />';
        }
        else {
           if (strcasecmp($var, "Public") == 0) {
            $form .= '<input type="radio" name="public" value="public" checked=yes/>Public<br />';
            $form .= '<input type="radio" name="public" value="private" />Private<br />';
           }
           else {
            $form .= '<input type="radio" name="public" value="public" />Public<br />';
            $form .= '<input type="radio" name="public" value="private" checked=yes/>Private<br />';
           }
        }
        $form .= '
        </td>
                <td>        Company Contact number<br />
        <input type="text" name="contactNumber" size="30" maxlength="64" value="'.$comp->__get("contactNumber").'" /><br />
                 </td>
            </tr>
            <tr>
                <td>  Public Ticker symbol<br/>
        <input type="text" name="ticker" size="30" maxlength="32" value="'.$comp->__get("ticker").'" /><br /></td>
                <td>   Company Contact Title<br />
        <input type="text" name="contactTitle" size="30" maxlength="64" value="'.$comp->__get("contactTitle").'" /><br />
                </td>
            </tr>
            <tr>
                <td>       Headquarters or Branch?<br/>';
    $var = $comp->__get("hq");
        if (empty($var)) {
           $form .= '<input type="radio" name="hq"  value="hq" />Headquarters<br />';
           $form .= '<input type="radio" name="hq"  value="branch" />Branch<br /></td>';
        }
        else {
           if (strcasecmp($var, "HQ") == 0) {
            $form .= '<input type="radio" name="hq"  value="hq" checked=yes/>Headquarters<br />';
            $form .= '<input type="radio" name="hq"  value="branch" />Branch<br /></td>';
           }
           else {
            $form .= '<input type="radio" name="hq"  value="hq" />Headquarters<br />';
            $form .= '<input type="radio" name="hq"  value="branch" checked=yes/>Branch<br /></td>';
           }
        }
        $form .= '
                <td>        Company Contact Email<br />
        <input type="text" name="contactEmail" size="30" maxlength="64" value="'.$comp->__get("contactEmail").'" /><br />
                 </td>
            </tr>
            <tr>
                <td>
                    Select Company Categories <br/>
                    (Hold down ctrl to select more than one).<br/>';

                    $cat = new PresentCategory();
                    $multiSelect = $cat->presentMultiSelectCategory($comp->__get("categories"));
                    $form .= $multiSelect;

                    $form .='<br/><br/>
                </td>
                <td>     </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
                <td></td>
            </tr>

        </table>

    </form>
</div>';


        return $form;

    }
}

?>
