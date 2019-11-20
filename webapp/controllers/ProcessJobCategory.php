<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$values = array(
    mode => $_POST["mode"],
    category => $_POST["category"],
    exist => $_POST["existJobCategory"]
);

$db = new DB_Connection();
$Redirect = new Redirect();

if ($values["mode"] == "add") {
    $success = $db->insertJobCategory($values);
    if ($success) {
        $Redirect->goToPage("", "AdminCategory.php");
    }
    else {
        $Redirect->goToPage("", "AdminError.php");
    }
}
else if ($values["mode"] == "delete") {
    $success = $db->deleteJobCategory($values);
    if ($success) {
        $Redirect->goToPage("", "AdminCategory.php");
    }
    else {
        $Redirect->goToPage("", "AdminError.php");
    }
}
else if ($values["mode"] == "edit") {
    $Redirect->goToPage("", "EditJobCategory.php?id=".$values["exist"]);
}
?>
