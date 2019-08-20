<?php

# This page will serve as the dev platform for pfSense and OPNSense.

## Based on info from:
## https://github.com/pfsense/pfsense-packages/blob/master/config/siproxd/siproxd_registered_phones.php

pfSense_MODULE:	shell
*/
##|+PRIV
##|*IDENT=page-status-remotefw
##|*NAME=Status: remotefw central management agent
##|*DESCR=Allow access to the 'Status: remotefw management page' page.
##|*MATCH=remotefw.php*
##|-PRIV
require_once("guiconfig.inc");

require("head.inc");
?>

<body link="#0000CC" vlink="#0000CC" alink="#0000CC">
<?php include("fbegin.inc"); ?>
Stuff goes here.
<?php include("fend.inc"); ?>
</body>
</html>
