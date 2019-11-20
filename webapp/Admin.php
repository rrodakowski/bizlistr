<?php session_start(); 

require_once('./facilities/Redirect.php');

if(isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "Search.php");
} else {
    include("templates/Header.php");
    include("templates/LoginForm.php");
    include("templates/Footer.php");
}
?>

 
