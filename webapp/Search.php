<?php session_start(); 

require_once('./facilities/Redirect.php');
require_once('./controllers/PresentCompany.php');
require_once('./controllers/PresentCategory.php');
if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
?>

    <form method="post" action="controllers/ProcessSearch.php">
        <p> Search by Company Name (e.g. companies or Calhoun): </p>
        <input type="text" name="search" size="30" maxlength="64" value="" /><br />
        <input type="submit" name="submit" value="Search" />
    </form>

<?php
    include("templates/Footer.php");
}
?>
