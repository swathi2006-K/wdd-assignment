<?php
$str = "Mail me at test@abc.com and hello@xyz.com";
preg_match_all("/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}/", $str, $emails);
print_r($emails[0]);
?>
