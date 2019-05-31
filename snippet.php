<?php
// Automatically clear Autoptimize cache if it goes beyond 2GB
if (class_exists('autoptimizeCache')) {
    $myMaxSize = 2000000; # You may change this value to lower like 500000 for 500MB if you have limited server space
    $statArr=autoptimizeCache::stats();
    $cacheSize=round($statArr[1]/1024);

    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
    }
}
?>
