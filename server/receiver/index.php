<?php
if (isset($_GET['d'])) {
    $encodedVariables = $_GET['d'];
}

function decodeURL($encodedVariables) {
    $decodeURL = convert_uudecode (base64_decode ($encodedVariables));
    return $decodeURL;
}

$decodedURL = decodeURL($encodedVariables);

echo '[rawdata]' .$encodedVariables .'<br />';
echo '[decodedData]' .$decodedURL .'<br />';

$decodedData = urldecode($decodedURL);

echo '[DD0] '. $decodedData[0];
?>