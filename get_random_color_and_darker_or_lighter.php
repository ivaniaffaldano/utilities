<?php

// create a random color than a darker/lighter one

function adjustBrightness($hex, $steps) {
	// created by Torkil Johnsen http://stackoverflow.com/posts/11951022/revisions
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));
    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }
    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';
    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }
    return $return;
}
function random_color_part($min = 80, $max = 150) {
	// can modify the range min/max as you prefer 
    return str_pad( dechex( mt_rand( $min, $max ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return '#' . random_color_part() . random_color_part() . random_color_part();
}

$color1 = random_color(); 
$color2 = adjustBrightness($color1,50);

?>