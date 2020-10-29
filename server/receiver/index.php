<?php
$scriptAudit = "yes";

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

// var_dump($decodedData);

parse_str($decodedData, $decodedDataArray);

if ($scriptAudit == "yes"){
    echo "[Audit][cpuArch] ". $decodedDataArray['cpuArch'];
}

?>