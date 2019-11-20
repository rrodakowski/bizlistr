<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$values = array(
    mode => $_POST["mode"],
    category => $_POST["category"],
    exist => $_POST["existCategory"]
);

$db = new DB_Connection();
$Redirect = new Redirect();

if ($values["mode"] == "add") {
    $success = $db->insertCategory($values);
    if ($success) {
        $Redirect->goToPage("", "AdminCategory.php");
    }
    else {
        $Redirect->goToPage("", "AdminError.php");
    }
}
else if ($values["mode"] == "delete") {
    $success = $db->deleteCategory($values);
    if ($success) {
        $Redirect->goToPage("", "AdminCategory.php");
    }
    else {
        $Redirect->goToPage("", "AdminError.php");
    }
}
else if ($values["mode"] == "edit") {
    $Redirect->goToPage("", "EditCategory.php?id=".$values["exist"]);
}
else if ($values["mode"] == "reference") {
    $Redirect->goToPage("", "EditReference.php?id=".$values["exist"]);
}
?>
