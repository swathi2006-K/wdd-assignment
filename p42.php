<?php
$marks1 = [360,310,310,330,313,375,456,111,256];
$marks2 = [350,340,356,330,321];
$marks3 = [630,340,570,635,434,255,298];
$all = array_merge($marks1,$marks2,$marks3);
echo "Max: ".max($all)."\nMin: ".min($all);
?>
