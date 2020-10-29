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
$decodedData = urldecode($decodedURL);
parse_str($decodedData, $decodedDataArray);

if ($scriptAudit == "yes"){
    echo "<p>"
    echo "[rawdata]" .$encodedVariables ."<br />";
    echo "[decodedData]" .$decodedURL;
    echo "</p>"

    echo "<p>"
    echo "[Audit][uid] ". $decodedDataArray['uid'] ."<br />";
    echo "[Audit][cpuArch] ". $decodedDataArray['cpuArch'] ."<br />";
    echo "[Audit][osType] ". $decodedDataArray['osType'] ."<br />";
    echo "[Audit][osVersion] ". $decodedDataArray['osVersion'] ."<br />";
    echo "[Audit][wanIp] ". $decodedDataArray['wanIp'] ."<br />";
    echo "</p>"
}

?>