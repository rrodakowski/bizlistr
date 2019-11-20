<?php session_start();
require_once('./facilities/Redirect.php');
if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
?>
    <div id="body">
    <br />
    <h3> My Account </h3>
    <p>
    This page will probably allow the user to see what text messages are scheduled.
    Also perhaps contain some billing information.
    </p>
    </div>

<?php
    include("templates/Footer.php");
}
?>

