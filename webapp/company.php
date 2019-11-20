<?php session_start(); 
require_once('./controllers/PresentCompany.php');
require_once('./dal/DB_Connection.php');
include("templates/MainHeader.php");
?>
<div id="body">
    <?php
        $id= $_GET["id"];
        $query = 'SELECT C.desc FROM company_category C WHERE C.company_category_id='.$id;
        $dao = new DB_Connection();
        $r=@mysql_fetch_assoc($dao->retrieveResults($query));
        $header = '<h1>Twin Cities Top '. $r["desc"].'</h1>';
        echo $header;
    ?>
            <table>
               <tr>
                <td>
                    <b>Rank</b>
                </td>
                <td>
                    <ul class="jobListing">
                        <li class="first">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>Company Name</b></td>
                                        <td>Sales Range</td>
                                        <td>Executive</td>
                                    </tr>
                                    <tr><td>Address</td>
                                        <td>Employee Range</td>
                                        <td>Private/Public</td>
                                    </tr>
                                    <tr>
                                        <td>Phone/Fax</td>
                                        <td>Year Founded</td>
                                        <td>HQ/Branch</td>
                                    </tr>
                                    <tr>
                                        <td>City, State, Zip</td>
                                        <td>Website</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </td>
            </tr>
     
           <?php    
             $company = new PresentCompany();
             $list = $company->getCompanyList($id);
             echo $list;
            ?>
       
</div>
<?php 
require_once('templates/ad.php');
include("templates/MainFooter.php");
?>

 
