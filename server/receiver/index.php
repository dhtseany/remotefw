<?php

$encodedVariables = $_GET['d'];

function decodeURL($encodedVariables) {
    $decodeURL = convert_uudecode (base64_decode ($encodedVariables));
    return $decodeURL;
}

if (isset($_GET['test'])) {
    $testVar = $_GET['test'];
}

$decodedURL = decodeURL($encodedVariables);

echo $decodedURL;
?>