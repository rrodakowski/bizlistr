<?php
session_start();
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$userName = $_POST["user"];
$password = $_POST["password"];

$DB_Facility = new DB_Connection();
$success = $DB_Facility->authenticate($userName, $password);

//if (!$success) {
//   $success = $DB_Facility->addUser($userName, $password);
//}

$Redirect = new Redirect();

if ($success) {
    $_SESSION['loggedIn'] = $userName;
    $Redirect->goToPage("", "Search.php");
}
else {
    // for now, a failure to log in re-routes the user to goole
    $Redirect->goToPage("", "LoginError.php");
}

?>
