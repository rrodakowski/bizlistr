<?php
    include("templates/MainHeader.php");
?>
 <div id="body">
    <br />
    <h4>Bizlistr.com posts job opportunities in the Twin Cities.  If  you would like to post a job on Bizlistr.com, please fill out the form below in its entirety. </h4><br/>
    <h3>Post your company's jobs on Bizlistr.com</h3><br/>


    <form method="post" action="controllers/Contact.php">
        <?php
            include("templates/SubmitterInfo.php");
        ?>
            <tr>
                <td><h4>Job Submission Form:</h4></td><td></td>
            </tr>
            <tr>
                <td>Company Name:</td><td><input type="text" name="jobCompanyName" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Job Title:</td><td><input type="text" name="jobTitle" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Job City:</td><td><input type="text" name="jobCity" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Job Categories:</td><td><input type="text" name="jobCategories" size="40" maxlength="50" value="" /></td>
            </tr>
            <tr>
                <td>Job Description:</td><td><textarea type="textarea1" name="jobDescription" cols="58" rows="6" maxlength="1024"></textarea></td>
            </tr>
            <tr>
                <td>Link to Job (optional):</td><td><input type="text" name="jobUrl" size="40" maxlength="50" value="" /></td>
            </tr>
        </table>
        <input type='hidden' id='type' name='type' value="1" />
        <input type="submit" name="submit" value="Send" />

    </form>
    <br/>
    <p> Bizlistr.com reserves the right to publish/not publish job links as it sees fit. </p>
</div>

<?php
    include("templates/ad.php");
    include("templates/MainFooter.php");
?>
