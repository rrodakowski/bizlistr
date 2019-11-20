<?php

require_once('./dal/DB_Connection.php');
require_once('./dal/Job.php');

class PresentJob {  

    function __construct() {
    }

    function getJobList($category) {
        $db = new DB_Connection();

        $list = '';
        $query = 'SELECT J.job_id FROM job_category_map J WHERE job_category_id="'.$category.'"';
        $result = $db->retrieveResults($query);
        $counter = 0;

        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $j_id = $r["job_id"];

                $job = new Job();
                $job->populate($j_id);
                $a[] = $job;
            }
            usort($a, array("Job", "cmp_jobs"));

            foreach ($a as $item) {
                $counter++;
                $desc_counter = "description_".$counter;
                
                $j_id = $item->getJobId();
                $name = $item->getCompany();
                $title = $item->getJobTitle();
                $city = $item->getCity();
                $url = $item->getJobLink();
                $desc = $item->getDescription();
                
                $list .='<li><a class="toggle" href="#'.$desc_counter.'">';
                $list .= $title."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$city."</li>";
                $list .= '<li id="'.$desc_counter.'" class="description hide">';
                $list .= $desc."<br>";
                $list .= 'Go to <a href="'.$url.'">Link</a><br>';
                if(isset($_SESSION['loggedIn'])) {
                    $list .= "Delete Job <a href='".Utility::getUrl()."/controllers/ProcessDelete.php?j_id=".$j_id."'>(x)</a>?</br>";
                }
                $list .= '<a class="toggle" href="#'.$desc_counter.'">(close)</a></li>';
            }
        }

        return $list;
    }
}

?>
