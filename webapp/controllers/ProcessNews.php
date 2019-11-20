<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

$newsValues = array(
    title => $_POST["title"],
    link => $_POST["link"],
    source => $_POST["source"]
);

$db = new DB_Connection();

$success = $db->insertNews($newsValues);

$Redirect = new Redirect();

// 3. Did something go wrong?  Send to either success or error page.
if ($success) {
    $Redirect->goToPage("", "AdminNews.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
