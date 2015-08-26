<?php
//REGEX TIME!
    $siteRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
    preg_match_all($siteRegex, $output, $allLinks);
   
    $links = array_unique($allLinks[0]);