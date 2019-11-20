<?php session_start(); 
require_once('./controllers/PresentCompany.php');
require_once('./dal/DB_Connection.php');

if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
    $searchTerm= $_GET["term"];


    $db = new DB_Connection();

    $query = "SELECT C.company_name, C.company_id FROM company C WHERE C.company_name like '%". $searchTerm ."%'";

    $results = $db->retrieveResults($query);

    $output = "<h3> Search Results: </h3>";

    $resultCounter = 0;
    if (@mysql_num_rows($results)) {
        $resultCounter++;
        $output .= "<table>";
        $output .="<ol>";
        while ($r=@mysql_fetch_assoc($results)) {

            $id = $r["company_id"];
            $name = $r["company_name"];
            $output .= "<tr>";
            $output .= "<td>\r\n<li><a href='".Utility::getUrl()."/AdminCompany.php?id=".$id."'>" .$name. "</a></li></td><td> ---- Delete this entry <a href='".Utility::getUrl()."/controllers/ProcessDelete.php?c_id=".$id."'>(x)</a>?</td>";
            $output .= "</tr>";
        }
        $output .= "</ol>";
        $output .= "</table>";
    }

    

    echo $output;

}
include("templates/Footer.php");
?>


