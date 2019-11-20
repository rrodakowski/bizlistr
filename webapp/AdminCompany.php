<?php session_start(); 

require_once('./facilities/Redirect.php');
require_once('./controllers/PresentCompany.php');
require_once('./controllers/PresentCategory.php');
if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
   // include("templates/CompanyForm.php");
   $id = $_GET["id"];
    $pc = new PresentCompany();
    $form = $pc->getCompanyForm($id);
    echo $form;
    include("templates/Footer.php");
}
?>
