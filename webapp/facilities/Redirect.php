<?php
require_once('Utility.php');

class Redirect {

    function __construct() {
    }

    function goToPage($from, $to) {
       header('Location: '.Utility::getUrl().'/'.$to);
    }
}
?>