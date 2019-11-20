<?php
require_once('./dal/DB_Connection.php');

class PresentNews {

    function __construct() {
    }

    function getNewsList() {
         $db = new DB_Connection();

        $list = "";
        // ***** Today's News *****
        $today = date('l F jS Y');
        $sqlYesterday = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("y") ));
        $sql2DaysOld = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-2, date("y") ));
        $query = "SELECT * FROM news N ORDER BY N.date DESC limit 35";
        $result = $db->retrieveResults($query);

        //$list .= "<h4>Today, ".$today. " </h4>";
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $title = $r["title"];
                $url = $r["url"];
                $id = $r["news_id"];
                if(isset($_SESSION['loggedIn'])) {
                    $list .= "\r\n<li><a href='".$url."'".' target="_blank">' .$title. "</a> Delete <a href='".Utility::getUrl()."/controllers/ProcessDelete.php?n_id=".$id."'>(x)</a>?</li>";
                }
                else {
                    $list .= "\r\n<li><a href='".$url."'".' target="_blank"><img class="list-image" src="images/list_item_mark.jpg"/>' .$title. "</a></li>";
                }
            }
        }
        else {
            $list .= "\r\n<li>today's headlines are coming soon...</li>";
        }
       // $list .= "<br/>";

        // ***** Yesterday's News *****
       /* $yesterday = date('l F jS Y', mktime(0, 0, 0, date("m"), date("d")-1, date("y")));
        $query = "SELECT * FROM news N WHERE `date` < '".$sqlYesterday."'  AND `date` > '".$sql2DaysOld."' ORDER BY N.date DESC";
        $result = $db->retrieveResults($query);
        $list .= "<h4>Yesterday, ".$yesterday." </h4>";
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {

                $title = $r["title"];
                $url = $r["url"];
                $id = $r["news_id"];
                if(isset($_SESSION['loggedIn'])) {
                    $list .= "\r\n<li><a href='".$url."'".' target="_blank">' .$title. "</a> Delete <a href='".Utility::getUrl()."/controllers/ProcessDelete.php?n_id=".$id."'>(x)</a>?</li>";
                }
                else {
                    $list .= "\r\n<li><a href='".$url."'".' target="_blank">' .$title. "</a></li>";
                }
            }
        }*/

        return $list;
    }
}

?>
