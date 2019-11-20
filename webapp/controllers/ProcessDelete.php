<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');


$c_id = $_GET["c_id"];
$j_id = $_GET["j_id"];
$n_id = $_GET["n_id"];

$db = new DB_Connection();
$success = true;

if ($c_id != null) {
    $success = $db->deleteCompany($c_id);
}
if ($j_id != null) {
    $success = $db->deleteJob($j_id);
}
if ($n_id != null) {
    $success = $db->deleteNews($n_id);
}

$Redirect = new Redirect();

// 3. Did something go wrong?  Send to either success or error page.
if ($success) {
    $Redirect->goToPage("", "Search.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
