<?php
$scriptAudit = "yes";

$cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");

echo "[ARCH] $cpuArch";

if (file_exists("/etc/platform"))
    {
        if ($scriptAudit = "yes");
            {echo "[Y] /etc/platform \n";}
        $osType = shell_exec('cat /etc/platform');
    } 
    else
        {    
            if ($scriptAudit = "yes");
            {echo "[N] /etc/platform \n";}
        }

if (file_exists("/usr/local/sbin/opnsense-version"))
    {
        if ($scriptAudit = "yes");
            {echo "[Y] /usr/local/sbin/opnsense-version \n";}
        $osTypeOPNFull = shell_exec('/usr/local/sbin/opnsense-version');
        $osTypeOPNFullArray = explode(' ',trim($osTypeOPNFull));
        $osType = $osTypeOPNFullArray[0];
    }
    else
        {    
            if ($scriptAudit = "yes");
                {echo "[N] /usr/local/sbin/opnsense-version";}
        }
// Audit Checks
if ($scriptAudit = "yes");
{echo "[osType] $osType \n";}

?>