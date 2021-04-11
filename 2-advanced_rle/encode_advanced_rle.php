<?php
function encode_advanced_rle(string $input_path, string $output_path)
{
    $ok = file_get_contents($input_path);
    $nb = strlen($ok);
    $c = 0;
    $tmp = '';
    $tmp2 = '';
    $ere = true;
    $count = 1;
    $dest = '';
    $solo = 0;
    $solochar = '';
    if (empty($ok)) {
        file_put_contents($output_path, $dest);
        return 0;
    }
    while (!empty($ok[$c]) || isset($ok[$c])) {
        if ($ere) {
            $tmp = $ok[$c];
            $ere = false;
        } else {
            $tmp2 = $ok[$c];
            if (strcmp($tmp, $tmp2) == 0  && $count < 255) {
                $count++;
            } else {
                if ($count == 1) {
                    $solo += 1;
                    $solochar .= $tmp;
                    $ere = true;
                    $c -= 1;
                } else if ($solo > 0) {
                    $dest .= chr(0) . chr($solo) . $solochar;
                    $solo = 0;
                    $solochar = '';
                }
                if ($count > 1) {
                    $dest .= chr($count) . $tmp;
                    $ere = true;
                    $c -= 1;
                    $count = 1;
                }
            }
        }
        $c++;
    }
    if ($count == 1) {
        $solo += 1;
        $solochar .= $tmp;
    }
    if ($solo > 0) {
        $dest .= chr(0) . chr($solo) . $solochar;
    }
    if ($count > 1) {
        $dest .= chr($count) . $tmp;
    }
    file_put_contents($output_path, $dest);
    return 0;
}
