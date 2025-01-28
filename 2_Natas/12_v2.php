<?php
function xor_encrypt($in) {
    $cipher = 'eDWo'; 
    $text = $in;
    $key = '';
    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $key .= $text[$i] ^ $cipher[$i % strlen($cipher)];
    }
    return $key;
}
$data = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
print base64_encode(xor_encrypt(json_encode($data)))
?>