<?php
require_once('../dal/DB_Connection.php');

class Email {
    /**
     * 10 digit number to send an email/sms to
     */
    // 10 digit number
    var $_number ="123457890";

    /**
     * Contact me email address
     * @var string
     */
    var $_contactEmail = "contactbizlistr.com@gmail.com";

    /**
     * Default constructor, used for real emails
     */
    function __construct() {
    }

    /**
     * Send an SMS Message via Email
     */
    function sendSmsMsg($mobileNumber, $messageText) {
        $retValue = null;
        $to = $mobileNumber;
        $text = urlencode($messageText);
        
        $DBFacility = new DB_Connection();

        $carrierEmail = $DBFaciliy->getCarrierForPhone($mobileNumber);
        if ($carrierEmail == "") {
            // This phone is not on file, so we'll send the Sms using
            // Clickatell's gateway
            return false;
        }

        $emailAddress = $mobileNumber . $carrierEmail;

        $headers = 'From: ' . $this->_contactEmail . "\r\n" .
                    'Reply-To: ' . $this->_contactEmail . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        // Send
        $success = mail($emailAddress, $subject, $messageText, $headers);

        return $success;
    }

     /**
     * Send an Email, probably from ContactForm
     */
    function sendEmail($fromEmail, $subject, $messageText) {
        // In case any of our lines are larger than 70 characters, we should use wordwrap()
        $message = wordwrap($messageText, 70);

        $headers = 'From: ' . $fromEmail . "\r\n" .
                    'Reply-To: ' . $fromEmail . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        // Send
        $success = mail($this->_contactEmail, $subject, $messageText, $headers);

        return $success;
    }
}

