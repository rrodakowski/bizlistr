<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
        <title>Bizlistr.com -- Admin Site</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id="wrap">
       <div id="header">
                <div id="logo">
                    <a href="index.php"><img src="images/biz_logo.png" alt="Main Site"></img></a>
                </div>
                <div id="header-divider"></div>
                <div id="navigation">
                    <ul>
                        <li><a href="Search.php">SEARCH</a></li>
                        <li><a href="AdminCompany.php">COMPANY</a></li>
                        <li><a href="AdminJob.php">JOB</a></li>
                        <li><a href="AdminNews.php">NEWS</a></li>
                        <li><a href="AdminCategory.php">CATEGORIES</a></li>
                        <?php
                        if(isset($_SESSION['loggedIn'])) {
                         echo '<li><a href="download.php">DOWNLOAD</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div id="header-body-divider"></div>
            </div>
