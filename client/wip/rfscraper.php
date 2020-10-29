<?php
$scriptAudit = "yes";
$uid = $config['remotefw']['uid'];

function encodeURL($assembledVars) {
    $encodedURL = base64_encode (convert_uuencode ($assembledVars));
    return $encodedURL;
}

// Initial OS Identitfication Checks
if (file_exists("/etc/platform"))
    {
        // Yes, this is a pfSense system
        if ($scriptAudit == "yes"){
            echo "[Audit][Y] /etc/platform \n";
        }
        $osType = shell_exec('cat /etc/platform');
        $osVersion = shell_exec('cat /etc/version');
    } 
    else
        {    
            if ($scriptAudit == "yes"){
                echo "[Audit][N] /etc/platform \n";
            }
        }

if (file_exists("/usr/local/sbin/opnsense-version"))
    {
        // Yes, this is an OPNSense system
        if ($scriptAudit == "yes"){
            echo "[Audit][Y] /usr/local/sbin/opnsense-version \n";
        }
        $osTypeOPNFull = shell_exec('/usr/local/sbin/opnsense-version');
        $osTypeOPNFullArray = explode(' ',trim($osTypeOPNFull));
        $osType = $osTypeOPNFullArray[0];
        $osVersion = $osTypeOPNFullArray[1];
    }
    else
       {    
            if ($scriptAudit == "yes"){
                echo "[Audit][N] /usr/local/sbin/opnsense-version \n";
            }
        }

$cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");
$wanIp = shell_exec("curl -s http://whatismyip.akamai.com/");

// Audit Checks
if ($scriptAudit = "yes"){
    echo "[Audit][uid] " . $uid . "\n";
    echo "[Audit][cpuArch] " . $cpuArch . "\n";
    echo "[Audit][osType] " . $osType . "\n";
    echo "[Audit][osVersion] " . $osVersion . "\n";
    echo "[Audit][wanIp " . $wanIp . "\n";
}

$systemDetails = array (
    'cpuArch' =>urlencode($cpuArch),
    'osType' =>urlencode($osType),
    'osVersion' =>urlencode($osVersion),
    'wanIp' =>urlencode($wanIp)
);

foreach ($systemDetails as $key=>$value) { 
    $assembledVars .= $key.'='.$value.'&';
}

rtrim($assembledVars, '&');

if ($scriptAudit == "yes"){
    var_dump($assembledVars);
}

$encodedURL = encodeURL($assembledVars);
$receiverURL = 'http://172.16.254.172/receiver/?d='.$encodedURL;

if ($scriptAudit == "yes"){
    echo '[ENCURL]'. $encodedURL;
}

if ($scriptAudit == "yes"){
    echo '[URL4CURL]'. $receiverURL;
}

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $receiverURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

if ($scriptAudit == "yes"){
    echo "[vardump]";
    var_dump($result);
}
?>