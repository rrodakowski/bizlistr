<?php session_start();
require_once('./controllers/PresentCompany.php');
require_once('./controllers/PresentCategory.php');
require_once('./controllers/PresentNews.php');
include("templates/MainHeader.php");

?>
    <div id="columns-holder">
        <ul class="newsColumn">
             <div class="column-title">
		     <h2>Daily News</h2>
		     <img class="column-title-img" src='images/column_sash.jpg'/>
	     </div>
             <?php
             $news = new PresentNews();
             $list = $news->getNewsList();
             echo $list;
            ?>
    
        </ul>
       <ul class="companiesColumn">
             <div class="column-title">
             	     <h2>Top Companies</h2>
		     <img class="column-title-img" src='images/column_sash.jpg'/>
	     </div>
            <?php
             $Category = new PresentCategory();
             $list = $Category->getCompanyCategoryList();
             echo $list;
            ?>
            
        </ul>
        <ul class="employmentColumn">
             <div class="column-title">
            	     <h2>Employment</h2>
		     <img class="column-title-img" src='images/column_sash.jpg'/>
	     </div>
            <?php
             $Category = new PresentCategory();
             $list = $Category->getJobCategoryList();
             echo $list;
            ?>
            <li>&nbsp;</li>
         <!--   <div class="column-title">
            	<h2>Who's Who</h2>
	    	<img class="column-title-img" src='images/column_sash.jpg'/>
	    </div> --!>
        </ul>
     </div>
	<?php require_once('templates/ad.php');?>
	<div class="clear"></div>
<?php
include("templates/MainFooter.php");
?>
