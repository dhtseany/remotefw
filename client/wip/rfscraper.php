<?php
$opnsense = shell_exec('/usr/local/sbin/opnsense-version'); 
$cpuArch = shell_exec("sysctl -a | egrep -i 'hw.machine_arch' | sed 's/.* //'");

echo "[OPNSENSE] $opnsense";
echo "[ARCH] $cpuArch";

if (file_exists("/etc/platform"))
    {echo "The file exists";} 
    else
    {echo "The file does not exist";}

?>
