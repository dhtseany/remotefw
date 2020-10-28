<?php
if (isset($_GET['d'])) {
    $encodedVariables = $_GET['d'];
}

function decodeURL($encodedVariables) {
    $decodeURL = convert_uudecode (base64_decode ($encodedVariables));
    return $decodeURL;
}



$decodedURL = decodeURL($encodedVariables);

echo '[data]' .$decodedURL;
?>