<?php
    include("templates/MainHeader.php");
?>
 <div id="body">
    <br />
    <h4>Bizlistr.com lists top companies in the Twin Cities. If  you would like your company considered for a top company list, please fill out the form below in its entirety.
 </h4><br/>
    <h3>Submit a company profile to Bizlistr.com</h3><br/>


    <form method="post" action="controllers/Contact.php">
        <?php
            include("templates/SubmitterInfo.php");
        ?>
        
            <tr>
                <td><h4>Company Submission Form:</h4></td><td></td>
            </tr>
            <tr>
                <td>Company Name:</td><td><input type="text" name="companyName" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Address:</td><td><input type="text" name="companyAddress" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company City:</td><td><input type="text" name="companyCity" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company State:</td><td><input type="text" name="companyState" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Zip:</td><td><input type="text" name="companyZip" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Phone:</td><td><input type="text" name="companyPhone" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Fax:</td><td><input type="text" name="companyFax" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Web:</td><td><input type="text" name="companyUrl" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>*Sales (from recently completed fiscal year):</td><td><input type="text" name="companySales" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>*Current number of employees:</td><td><input type="text" name="companyEmployees" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Year Founded:</td><td><input type="text" name="yearFounded" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Top Executive:</td><td><input type="text" name="Ceo" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Public or Private:</td><td><input type="text" name="publicOrPrivate" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Headquarters or Branch:</td><td><input type="text" name="hqOrBranch" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Company Profile Description:</td><td><textarea type="textarea1" name="companyDesc" cols="58" rows="6" maxlength="1024"></textarea></td>
            </tr>
            <tr>
                <td>For which lists do you want to be considered?:</td><td><input type="text" name="lists" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Additional Notes:</td><td><textarea type="textarea1" name="additionalNotes" cols="58" rows="6" maxlength="1024"></textarea></td>
            </tr>
        </table>
        <input type='hidden' id='type' name='type' value="2" />
        <input type="submit" name="submit" value="Send" />

    </form>
    <br/>
    <p> *Exact sales and/or number of employees are used to help rank lists and are therefore required. </p>
    <p> *Exact sales and employee numbers are published in a range and otherwise not released. </p>
    <p> *Bizlistr reserves the right to reject any company profile for any reason. </p>
</div>

<?php
    include("templates/ad.php");
    include("templates/MainFooter.php");
?>
