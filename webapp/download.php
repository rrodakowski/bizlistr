<?php
header('Content-disposition: attachment; filename=BizlistrTopCompanies.tsv');
header('Content-type: text/tab-separated-values');
//readfile('/home/randall/bizlistr/DownloadGenerator/BizlistrTopCompanies.tsv');
readfile('/var/www/php/bizlistr.com/DownloadGenerator/BizlistrTopCompanies.tsv');
?>
