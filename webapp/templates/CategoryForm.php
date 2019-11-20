<div id="body">
    <br />
    <form method="post" action="controllers/ProcessListCategory.php">

       <table align="center">
            <tr>
                <td>  <h3> Company Categories </h3></td>
                <td></td>
            </tr>
            <tr><td> 
                    <input type="radio" name="mode" value="add" checked/>Add<br />
                </td>
                <td>
                    New Company Cateogry to Add <br/>
                    <input type="text" name="category" size="30" maxlength="255" value="" />
                </td>
            </tr>
            <tr>
                <td><hr/></td>
                <td><hr/></td>
            </tr>
            <tr><td><input type="radio" name="mode" value="edit" />Edit<br />
                    <input type="radio" name="mode" value="delete" />Delete<br />
                    <input type="radio" name="mode" value="reference" />Reference Data<br /></td>
                <td>    Existing Company Categories to Edit or Delete<br/>
                    <?php
                    $Categorgy = new PresentCategory();
                    $dropdown = $Categorgy->getCompanyCategoryDropdown();
                    echo $dropdown;
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
                <td></td>
            </tr>
        </table>
    </form>
    <br/><br/><hr><br/><br/>
    <form method="post" action="controllers/ProcessJobCategory.php">
        <table align="center">
            <tr>
                <td><h3> Job List Categories  </h3></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="mode" value="add" checked/>Add<br />
                </td>
                <td>
                    New Job Category to Add <br/>
                    <input type="text" name="category" size="30" maxlength="255" value="" />
                </td>
            </tr>
            <tr>
                <td><hr/></td>
                <td><hr/></td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="mode" value="edit" />Edit<br />
                    <input type="radio" name="mode" value="delete" />Delete<br />
                </td>
                <td>
                    Existing Job Categories to Edit or Delete<br/>
                    <?php
                    $Categorgy = new PresentCategory();
                    $dropdown = $Categorgy->getJobCategoryDropdown();
                    echo $dropdown;
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>
