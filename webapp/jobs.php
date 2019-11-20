<?php session_start(); 
require_once('./controllers/PresentJob.php');
require_once('./dal/DB_Connection.php');
include("templates/MainHeader.php");
?>
<div id="content">
    <ul class="jobListing">
         <?php
             $id= $_GET["id"];

             $query = 'SELECT J.desc FROM job_category J WHERE J.job_category_id='.$id;
             $dao = new DB_Connection();
             $r=@mysql_fetch_assoc($dao->retrieveResults($query));
             
             $header = '<h3>Twin Cities Employment </h3>';
             $header .= '<li class="header">Category: '. $r["desc"].'</li>';
             echo $header;

             $job = new PresentJob();
             $list = $job->getJobList($id);
             echo $list;
            ?>
       
    </ul>

<?php
include("templates/ad.php");
include("templates/MainFooter.php");
?>

 
