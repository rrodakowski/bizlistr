<?php
require_once('../facilities/Email.php');
require_once('../facilities/Redirect.php');
require_once('../facilities/ContactTypes.php');

// What type of form is being submitted?
$type = $_POST["type"];

// Generic submitter information (present on all contact forms)
$first = $_POST["first"];
$last = $_POST["last"];
$phone = $_POST["phone"];
$companyName = $_POST["companyName"];
$submitterTitle = $_POST["submitterTitle"];
$emailAddress = $_POST["submitterEmail"];

if ($emailAddress == null) {
    echo "Must enter an email address";
}
else {
    // build generic header of email, based on submitter info
    $messageText = "Submitted by ".$first." ".$last." who is ".$submitterTitle." at ".$companyName." and can be reached at ".$submitterEmail. " or phone ".$phone."\n\n";
    $Redirect = new Redirect();
    $emailFacility = new Email();

    if ($type == ContactTypes::Contact) {
        $subject = "Contact Submission from Bizlistr.com";
        
        $messageText .= $_POST["message"];
        
        $success = $emailFacility->sendEmail($emailAddress, $subject, $messageText);
        if ($success) {
            $Redirect->goToPage("", "Contact.php");
        }
        else {
        // TODO: for now, just go to index page, what should I do though?
            $Redirect->goToPage("", "index.php");
        }
    }
    if ($type == ContactTypes::SubmitJob) {
        $subject = "External Job Submission from Bizlistr";

        $jobCompanyName = $_POST["jobCompanyName"];
        $jobTitle = $_POST["jobTitle"];
        $jobCity = $_POST["jobCity"];
        $jobCategories = $_POST["jobCategories"];
        $jobDescription = $_POST["jobDescription"];
        $jobUrl = $_POST["jobUrl"];

        $messageText .= "Job Information: \n\n";
        $messageText .= "JobTitle: ".$jobTitle." at ".$jobCompanyName."\n\n";
        $messageText .= "Located in city: ".$jobCity."\n\n";
        $messageText .= "Should be posted in categories: ".$jobCategories."\n\n";
        $messageText .= "Job Description: ".$jobDescription."\n\n";
        $messageText .= "Job Url, if given: ".$jobUrl."\n\n";
      
        $success = $emailFacility->sendEmail($emailAddress, $subject, $messageText);
        if ($success) {
            $Redirect->goToPage("", "Contact.php");
        }
        else {
        // TODO: for now, just go to index page, what should I do though?
            $Redirect->goToPage("", "index.php");
        }
    }
    if ($type == ContactTypes::SubmitCompany) {
        $subject = "External Company Submission from Bizlistr";

        $companyName = $_POST["companyName"];
        $companyAddress = $_POST["companyAddress"];
        $companyCity = $_POST["companyCity"];
        $companyState = $_POST["companyState"];
        $companyZip = $_POST["companyZip"];
        $companyPhone = $_POST["companyPhone"];
        $companyFax = $_POST["companyFax"];
        $companyUrl = $_POST["companyUrl"];

        $companySales = $_POST["companySales"];
        $companyEmployees = $_POST["companyEmployees"];
        $yearFounded = $_POST["yearFounded"];
        $companyCeo = $_POST["Ceo"];
        $publicCompany = $_POST["publicOrPrivate"];
        $hqOrBranch = $_POST["hqOrBranch"];
        $companyDesc = $_POST["companyDesc"];
        $lists = $_POST["lists"];
        $additionalNotes = $_POST["additionalNotes"];

        $messageText .= "Company Information: \n\n";
        $messageText .= "CompanyName: ".$companyName." at ".$companyAddress."\n\n";
        $messageText .= "Located in: ".$companyCity. ", ".$companyState."\n\n";
        $messageText .= "".$companyZip."\n\n";
        $messageText .= "Phone: ".$companyPhone."\n\n";
        $messageText .= "Fax: ".$companyFax."\n\n";
        $messageText .= "Company Url, if given: ".$companyUrl."\n\n";
        $messageText .= "Sales: ".$companySales."\n\n";
        $messageText .= "Employees: ".$companyEmployees."\n\n";
        $messageText .= "YearFounded: ".$yearFounded."\n\n";
        $messageText .= "Top Executive: ".$companyCeo."\n\n";
        $messageText .= "Public?: ".$publicCompany."\n\n";
        $messageText .= "Headquarters?: ".$hqOrBranch."\n\n";
        $messageText .= "Description: ".$companyDesc."\n\n";
        $messageText .= "Lists: ".$lists."\n\n";
        $messageText .= "Notes: ".$additionalNotes."\n\n";

        $success = $emailFacility->sendEmail($emailAddress, $subject, $messageText);
        if ($success) {
            $Redirect->goToPage("", "Contact.php");
        }
        else {
        // TODO: for now, just go to index page, what should I do though?
            $Redirect->goToPage("", "index.php");
        }
    }
}
?>

