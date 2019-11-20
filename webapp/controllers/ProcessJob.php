<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');
// change the cattegories array into a pipe delimited list that can be processed
// by the stored procedure
$delimitedString = "";
foreach ($_POST["jobCategories"] as $value) {
    $delimitedString .= $value;
    $delimitedString .= "|";
}
$delimitedString = substr_replace($delimitedString ,"",-1);


$values = array(
    name => $_POST["name"],
    title => $_POST["title"],
    city => $_POST["city"],
    description => $_POST["job_description"],
    url => $_POST["job_url"],
    category => $delimitedString,
    lastUpdate => $_POST["update"],
    type => $_POST["type"]
);

$db = new DB_Connection();

$success = $db->insertJob($values);

$Redirect = new Redirect();

// 3. Did something go wrong?  Send to either success or error page.
if ($success) {
    $Redirect->goToPage("", "AdminJob.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
