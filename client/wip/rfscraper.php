<?php
$scriptAudit = "yes";

$opnsense = shell_exec('/usr/local/sbin/opnsense-version'); 
$cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");

echo "[OPNSENSE] $opnsense";
echo "[ARCH] $cpuArch";

if (file_exists("/etc/platform"))
    {
        if ($scriptAudit = "yes");
            {echo "[Y] /etc/platform";}
        $osType = shell_exec('cat /etc/platform');
    } 
    else
        {    
            if ($scriptAudit = "yes");
            {echo "[N] /etc/platform";}
        }

if (file_exists("/usr/local/sbin/opnsense-version"))
    {
        if ($scriptAudit = "yes");
            {echo "[Y] /usr/local/sbin/opnsense-version";}
        $osType = shell_exec('cat /usr/local/sbin/opnsense-version');
    }
    else
        {    
            if ($scriptAudit = "yes");
                {echo "[N] /usr/local/sbin/opnsense-version";}
        }

if ($scriptAudit = "yes");
{echo "[osType] $osType";}

?>