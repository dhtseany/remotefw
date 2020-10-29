<?php
/*
# This page will serve as the dev platform for pfSense and OPNSense.

## Based on info from:
## https://github.com/pfsense/pfsense-packages/blob/master/config/siproxd/siproxd_registered_phones.php
*/

/*
pfSense_MODULE:	shell
*/

##|+PRIV
##|*IDENT=page-services-remotefw
##|*NAME=Status: remotefw central management agent
##|*DESCR=Allow access to the 'Status: remotefw management page' page.
##|*MATCH=services_remotefw.php*
##|-PRIV

require_once("guiconfig.inc");

$pgtitle = array(gettext("Services"), gettext("RemoteFW"));
include("head.inc");

$tab_array = array();
$tab_array[] = array(gettext("Settings"), true, "/packages/cron/cron.php");
$tab_array[] = array(gettext("Add"), false, "/packages/cron/cron_edit.php");
display_top_tabs($tab_array);


// if (file_exists("/etc/remotefw/main.cfg")) {
// 	$configRec = file_get_contents("/etc/remotefw/main.cfg");
// 	$config = explode("\n", $configRec);
// }

$pgtitle = array(gettext("Services"), gettext("remoteFw"));

?>

<body link="#0000CC" vlink="#0000CC" alink="#0000CC">

<?php include("fbegin.inc"); ?>

Stuff goes here.

<?php include("fend.inc"); ?>
</body>
</html>
