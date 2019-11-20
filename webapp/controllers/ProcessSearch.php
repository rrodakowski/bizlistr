<?php
require_once('../facilities/Redirect.php');

$searchValues = array(
    term => $_POST["search"],
    table => $_POST["table"]
);


//if ($searchValues[table] == company)

$Redirect = new Redirect();

// 3. Did something go wrong?  Send to either success or error page.
//if ($success) {
    $Redirect->goToPage("", "SearchResult.php?term=".$searchValues["term"]);
//}
//else {
//    $Redirect->goToPage("", "AdminError.php");
//}
?>
