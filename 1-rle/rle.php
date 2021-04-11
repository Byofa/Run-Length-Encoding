<?php
require "./encode_rle.php";
require "./decode_rle.php";

if($argc == 3) {
    if ( strcmp($argv[1], "encode") == 0) {
        echo encode_rle($argv[2])."\n";
    }
    else if ( strcmp($argv[1], "decode") == 0) {
        echo decode_rle($argv[2])."\n";
    }
    else {
        echo "$$$\n";
        return "$$$";

    }
}
else {
    echo "$$$\n";
    return "$$$";
   
}

?>