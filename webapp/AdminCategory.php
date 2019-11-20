<?php session_start(); 
require_once('./controllers/PresentCategory.php');
require_once('./facilities/Redirect.php');
if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
    include("templates/CategoryForm.php");
    include("templates/Footer.php");
}
?>
