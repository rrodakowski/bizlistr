<div id="body">
    <br />
    <form method="post" action="controllers/ProcessNews.php">

        <h3> News Form </h3>

        Write a title to be displayed (e.g. 3M sells post-it notes to competitor)<br />
        <input type="text" name="title" size="30" maxlength="160" value="" /><br />
        Link to the article (e.g. http://www.startribune.com)<br />
        <input type="text" name="link" size="30" maxlength="160" value="" /><br />
        Source where article found (e.g. Startribune) not published<br />
        <input type="text" name="source" size="30" maxlength="160" value="" /><br />
        Update -- timestamp automatically generated<br />
        <input type="text" name="update" size="30" maxlength="64" value="" readonly/><br /><br />

        <input type="submit" name="submit" value="Submit" />

    </form>
</div>
