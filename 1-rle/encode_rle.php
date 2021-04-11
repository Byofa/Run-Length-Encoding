<?php
function encode_rle(string $str)
{
    $c = 1;
    $count = 1;
    $dest = "";
    if (empty($str)) {
        return;
    }
    else {
        $letter = $str[0];
    }
    if (ctype_alpha($str)) {
        while (!empty($str[$c])) {
            if (strcmp($letter, $str[$c]) == 0) {
                $count++;
            } else {
                $dest .= $count . $letter;
                $count = 1;
                $letter = $str[$c];
            }
            $c++;
        }
        $dest .= $count . $letter;
        return $dest;
    }
    
    else {
        return "$$$";
    }
}
