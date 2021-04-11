<?php
function error(string $str)
{
    $c = 0;
    $q = strlen($str) - 1;
    if (ctype_digit($str[$q])) {
        return 0;
    }
    if (ctype_alpha($str[$c])) {
        return 0;
    }
    while (!empty($str[$c]) || isset($str[$c])) {
        if (!empty($str[$c + 1]) && ctype_alpha($str[$c])) {
            if (ctype_alpha($str[$c + 1]) || ctype_alpha($str[0])) {
                return 0;
            }
        }
        
        $c++;
    }
    return 1;
}
