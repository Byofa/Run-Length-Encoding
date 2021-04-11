<?php
require "./error.php";
function decode_rle(string $str)
{
    $c = 0;
    $dest = "";
    $letter = "";
    $count = 0;
    if (ctype_alnum($str) && error($str) == 1) {
        while (!empty($str[$c]) || isset($str[$c])) {
            $i = 0;
            if (ctype_digit($str[$c])) {
                $count .= $str[$c];
            } else {
                $letter = $str[$c];
                while ($count > $i) {
                    $dest .= $letter;
                    $i++;
                }
                $count = 0;
            }
            $c++;
        }
        return $dest;
    } 
    else if (empty($str)) {
        return;
    }
    else {
        return "$$$";
    }
}