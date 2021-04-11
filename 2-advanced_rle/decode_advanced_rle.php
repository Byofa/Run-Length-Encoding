<?php
function decode_advanced_rle(string $input_path, string $output_path)
{
    $in = file_get_contents($input_path);
    $c = 0;
    $ere = true;
    $nb = 0;
    $tmp2 = 0;
    $str = '';
    $dest = '';
    $k = 0;
    if (empty($in)) {
        file_put_contents($output_path, $dest);
        return 0;
    }
    if (strlen($in) == 1) {
        return 1;
    }
    while (!empty($in[$c]) || isset($in[$c])) {
        if ($ere) {
            $nb = ord($in[$c]);
            $ere = false;
        } else if ($nb == 0) {
            if ($tmp2 == 0) {
                $tmp2 = ord($in[$c]);
            } else {
                if ($k != $tmp2) {
                    $dest .= $in[$c];
                    $k++;
                    if ($k == $tmp2) {
                        $k = 0;
                        $tmp2 = 0;
                        $ere = true;
                    }
                }
            }
        } else {
            $str = $in[$c];
            for ($i = 0; $i != $nb; $i++) {
                $dest .= $str;
            }
            $ere = true;
        }
        $c++;
    }
    if ($ere) {
        file_put_contents($output_path, $dest);
        return 0;
    }
    else {
        return 1;
    }
}
