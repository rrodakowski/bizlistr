<?php
    include("templates/MainHeader.php");
?>
 <div id="body">
    <br />
    <h3>Contact Bizlistr.com</h3><br/>
    <form method="post" action="controllers/Contact.php">
        <table>
            <tr>
                <td>First Name:</td><td><input type="text" name="first" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Last Name:</td><td><input type="text" name="last" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Phone Number:</td><td><input type="text" name="phone" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Name:</td><td><input type="text" name="companyName" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Submitter Title:</td><td><input type="text" name="submitterTitle" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Submitter email:</td><td><input type="text" name="submitterEmail" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td></td><td></td>
            </tr>
            <tr>
                <td><h4>Your message:</h4></td><td></td>
            </tr>
            <tr>
                <td>Message (1024 letters):</td><td><textarea type="textarea1" name="message" cols="57" rows="6" maxlength="1024"></textarea></td>
            </tr>
        </table>
        <br />

        <input type='hidden' id='type' name='type' value="0" />
        <input type="submit" name="submit" value="Send" />

    </form>
</div>

<?php
    include("templates/MainFooter.php");
?>