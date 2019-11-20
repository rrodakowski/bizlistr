<div id="body">
    <br />
    <form method="post" action="controllers/ProcessJob.php">

       <table align="center">
            <tr>
                <td><h3> Published Fields </h3></td>
                <td><h3> Internal Fields </h3></td>
            </tr>
            <tr>
                <td>        Company Name<br />
                    <input type="text" name="name" size="30" maxlength="64" value="" /><br />
                </td>
                <td>
                    <input type="checkbox" name="type" CHECKED/>
                    Is Internal?<br/>


                </td>
            </tr>
            <tr>
                <td>        JobTitle<br />
                    <input type="text" name="title" size="30" maxlength="255" value="" /><br />
                </td>
                <td>
                      Last update -- automatically generated<br />
                     <input type="text" name="update" size="30" maxlength="64" value="" readonly/><br />
                </td>
            </tr>
            <tr>
                <td>        City<br/>
                    <input type="text" name="city" size="30" maxlength="255" value="" /><br />
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>        Job Description<br/>
                    <textarea rows="5" cols="43" name="job_description" maxlength="1024" value=""></textarea><br />
                </td>
                <td>
                    Select Job Categories <br/>
                    (Hold down ctrl to select more than one).<br/>
                    <?php
                    $present = new PresentCategory();
                    $multi = $present->presentJobMultiSelectCategory();
                    echo $multi;
                    ?>
                </td>
            </tr>
            <tr>
                <td>        Job Link (URL) <br/>
                    <input type="text" name="job_url" size="30" maxlength="255" value="" /><br />
                </td>
                <td> 
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
                <td></td>
            </tr>

        </table>
        
    </form>
</div>
