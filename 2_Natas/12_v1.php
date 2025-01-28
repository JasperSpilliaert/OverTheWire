<?php
function xor_encrypt($in) {
    $cipher = json_encode(array("showpassword"=>"no", "bgcolor"=>"#fffff")); 
    $text = $in;
    $key = '';
    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $key .= $text[$i] ^ $cipher[$i % strlen($cipher)];
    }
    return $key;
}
$cookie = base64_decode('HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg%3D');
echo xor_encrypt($cookie)
?>