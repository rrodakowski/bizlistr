<?php session_start(); 
require_once('./controllers/PresentCategory.php');
require_once('./facilities/Redirect.php');
if(!isset($_SESSION['loggedIn'])) {
    $Redirect = new Redirect();
    $Redirect->goToPage("", "LoginError.php");
} else {
    include("templates/Header.php");
?>
     <form method="post" action="controllers/ProcessEditJobCategory.php">
       Job Category to Edit <br/>
       <?php
            $id= $_GET["id"];
            $Categorgy = new PresentCategory();
            $html = $Categorgy->presentEditJobCategory($id);
            echo $html;
       ?>

       <input type="submit" name="submit" value="Submit" />
     </form>
<?php
    include("templates/Footer.php");
}
?>
