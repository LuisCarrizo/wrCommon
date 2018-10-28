<?php

function _now($pNewLine = false , $short = false){
    $return = $short ? date("j/n/y G:i:s")  : date("Y-m-d H:i:s");
    $return .= ($pNewLine ) ? _ff : '';
    return $return ;
}



function _ff($breakLine = false){
    if ($breakLine) { echo _hr ;  } else { echo _ff ; }
}
