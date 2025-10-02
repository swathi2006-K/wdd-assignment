<?php
$str = "He@llo! 123#";
echo preg_replace("/[^a-zA-Z0-9 ]/", "", $str);
?
