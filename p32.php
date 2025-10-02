<?php
$mail = "admin@example.com";
$mail = str_replace("a","@",$mail);
echo "Contact me at $mail.";
?>

<?php
$names = ["alex", "jean", "emily", "jane"];
$name = preg_grep("/^e/", $names);
print_r($name);
?>
