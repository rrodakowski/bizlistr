<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$values = array(
    id => $_POST["id"],
    category => $_POST["category"],
);

$db = new DB_Connection();
$Redirect = new Redirect();

$success = $db->updateJobCategory($values);

if ($success) {
    $Redirect->goToPage("", "AdminCategory.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
