<?php
require "./encode_advanced_rle.php";
require "./decode_advanced_rle.php";

if($argc == 4) {
    if ( strcmp($argv[1], "encode") == 0) {
        if ((encode_advanced_rle($argv[2], $argv[3])) == 0) {
            echo "OK\n";
        }
        else {
            echo "KO\n";
            return "1";
        }
    }
    else if ( strcmp($argv[1], "decode") == 0) {
        if ((decode_advanced_rle($argv[2], $argv[3])) == 0) {
            echo "OK\n";
        }
        else {
            echo "KO\n";
            return "1";
        }
    }
    else {
        echo "KO\n";
        return "1";

    }
}
else {
    echo "KO\n";
    return "1";
}

?>