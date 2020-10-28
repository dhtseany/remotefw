<?php
function decodeURL($encodedVariables) {
    $decodedURL = convert_uudecode (base64_decode ($encodedVariables));
    return $decodedURL;
}

if (isset($_GET['test'])) {
    $testVar = $_GET['test'];
}


?>