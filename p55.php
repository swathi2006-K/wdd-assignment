?php
$str = "hello";
$stack = str_split($str);
$rev = "";
while($stack) $rev .= array_pop($stack);
echo $rev;
?>
