<?php
function mask($value, $format) {
    $return = '';
    $position = 0;
    for($i = 0; $i<=strlen($format)-1; $i++) {
        if($format[$i] == '#') {
            if(isset($value[$position])) {
 $return .= $value[$position++];
 }
        } else {
            $return .= $format[$i];
        }
    }
    return $return;
}


?>