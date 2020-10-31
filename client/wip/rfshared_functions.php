<?php

function encodeURL($assembledVars) {
    $encodedURL = base64_encode (convert_uuencode ($assembledVars));
    return $encodedURL;
}

function osCheck() {
    // Is this pfSense?
    if (file_exists("/etc/platform")) {
        // Yes, this is a pfSense system
        if ($scriptAudit == "yes"){
            echo "[Audit][Y] /etc/platform \n";
        }
    
        $osType = shell_exec('cat /etc/platform');
        return $osType;
        exit;
    }
    else {
        //No, this is not pfSense
        if ($scriptAudit == "yes"){
            echo "[Audit][N] /etc/platform \n";
        }
    }

    if (file_exists("/usr/local/sbin/opnsense-version")) {
            // Yes, this is an OPNSense system
            if ($scriptAudit == "yes"){
                echo "[Audit][Y] /usr/local/sbin/opnsense-version \n";
            }
            $osTypeOPNFull = shell_exec('/usr/local/sbin/opnsense-version');
            $osTypeOPNFullArray = explode(' ',trim($osTypeOPNFull));
            $osType = $osTypeOPNFullArray[0];
            $osVersion = $osTypeOPNFullArray[1];
    }
    else {    
        if ($scriptAudit == "yes"){
            echo "[Audit][N] /usr/local/sbin/opnsense-version \n";
        }
    }
}

function pfClientChecks(){
    require_once("config.inc");


    $osVersion = shell_exec('cat /etc/version');
    $uid = $config['remotefw']['uid'];
    $cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");
    $wanIp = shell_exec("curl -s http://whatismyip.akamai.com/");
    $systemDetails = array (
        'uid' =>urlencode($uid),
        'cpuArch' =>urlencode($cpuArch),
        'osType' =>urlencode($osType),
        'osVersion' =>urlencode($osVersion),
        'wanIp' =>urlencode($wanIp)
    );

    if ($scriptAudit == "yes"){
        if(isset($config)){
            echo "[Audit][configset] yes \n";
        }
        else {
            echo "[Audit][configset] no \n";
        }
    }
}

function opClientChecks(){

}

?>