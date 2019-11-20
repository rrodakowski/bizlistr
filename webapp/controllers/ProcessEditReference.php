<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$values = array(
    id => $_POST["id"],
    reference => $_POST["reference"],
);

$db = new DB_Connection();
$Redirect = new Redirect();

$success = $db->updateCategory($values);

if ($success) {
    $Redirect->goToPage("", "AdminCategory.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
