<?php
$receiverURL = 'http://172.16.254.172/receiver';
$scriptAudit = "yes";

// Initial OS Identitfication Checks
if (file_exists("/etc/platform"))
    {
        // Yes, this is a pfSense system
        if ($scriptAudit = "yes");
            {echo "[Audit][Y] /etc/platform \n";}
        $osType = shell_exec('cat /etc/platform');
        $osVersion = shell_exec('cat /etc/version');
    } 
    else
        {    
            if ($scriptAudit = "yes");
            {echo "[Audit][N] /etc/platform \n";}
        }

if (file_exists("/usr/local/sbin/opnsense-version"))
    {
        // Yes, this is an OPNSense system
        if ($scriptAudit = "yes");
            {echo "[Audit][Y] /usr/local/sbin/opnsense-version \n";}
        $osTypeOPNFull = shell_exec('/usr/local/sbin/opnsense-version');
        $osTypeOPNFullArray = explode(' ',trim($osTypeOPNFull));
        $osType = $osTypeOPNFullArray[0];
        $osVersion = $osTypeOPNFullArray[1];
    }
    else
        {    
            if ($scriptAudit = "yes");
                {echo "[Audit][N] /usr/local/sbin/opnsense-version \n";}
        }

$cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");
$wanIp = shell_exec("curl -s http://whatismyip.akamai.com/");

// Audit Checks
if ($scriptAudit = "yes");
    {
    echo "[Audit][cpuArch] " . $cpuArch . "\n";
    echo "[Audit][osType] " . $osType . "\n";
    echo "[Audit][osVersion] " . $osVersion . "\n";
    echo "[Audit][wanIP] " . $wanIp . "\n";
    }

    
$systemDetails = array (
    'cpuArch' =>urlencode($cpuArch),
    'osType' =>urlencode($osType),
    'osVersion' =>urlencode($osVersion),
    'wanIp' =>urlencode($osVersion)
);

foreach ($fields as $key=>$value) { 
    $fields_string .= $key.'='.$value.'&';
}

rtrim($fields_string, '&');

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
$result = curl_exec($ch);
curl_close($ch);
//check the result
var_dump($result);

?>