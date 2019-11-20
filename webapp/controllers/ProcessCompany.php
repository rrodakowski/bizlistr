<?php
require_once('../dal/DB_Connection.php');
require_once('../facilities/Redirect.php');

// change the cattegories array into a pipe delimited list that can be processed
// by the stored procedure
$delimitedString = "";
foreach ($_POST["categories"] as $value) {
    $delimitedString .= $value;
    $delimitedString .= "|";
}
$delimitedString = substr_replace($delimitedString ,"",-1);

$companyValues = array(
    publishFlag => $_POST["publishFlag"],
    researchDone => $_POST["researchDone"],
    excReason => $_POST["excReason"],
    ranking => $_POST["ranking"],
    numEployee => $_POST["numEployee"],
    hrURL => $_POST["hrURL"],
    addNotes => $_POST["addNotes"],
    text => $_POST["text"],
    SIC => $_POST["SIC"],
    NAIC => $_POST["NAIC"],
    contactFirst => $_POST["contactFirst"],
    contactLast => $_POST["contactLast"],
    contactNumber => $_POST["contactNumber"],
    contactTitle => $_POST["contactTitle"],
    contactEmail => $_POST["contactEmail"],
    name => $_POST["name"],
    address => $_POST["address"],
    city => $_POST["city"],
    state => $_POST["state"],
    zip => $_POST["zip"],
    phone => $_POST["phone"],
    fax => $_POST["fax"],
    web => $_POST["web"],
    desc => $_POST["desc"],
    sales => $_POST["sales"],
    employees => $_POST["employee"],
    year => $_POST["year"],
    exec => $_POST["exec"],
    publicCompany => $_POST["public"],
    ticker => $_POST["ticker"],
    hq => $_POST["hq"],
    categories => $delimitedString
);

$db = new DB_Connection();

$mode = $_POST["mode"]; // value for mode is hidden field on company form
if ($mode == "add") {
    $success = $db->insertCompany($companyValues);
}
else {
    $success = $db->updateCompany($mode, $companyValues);
}

$Redirect = new Redirect();

// 3. Did something go wrong?  Send to either success or error page.
if ($success) {
    $Redirect->goToPage("", "AdminCompany.php");
}
else {
    $Redirect->goToPage("", "AdminError.php");
}
?>
