<?php
function diff_multi($a1,$a2){
  return array_diff_assoc_recursive($a1,$a2);
}
function array_diff_assoc_recursive($a1,$a2){
  $diff = [];
  foreach($a1 as $k=>$v){
    if(is_array($v)){
      if(!isset($a2[$k]) || !is_array($a2[$k]) || ($d = array_diff_assoc_recursive($v,$a2[$k]))) {
        $diff[$k] = $v;
      }
    } elseif(!isset($a2[$k]) || $a2[$k] !== $v){
      $diff[$k] = $v;
    }
  }
  return $diff;
}
?>
