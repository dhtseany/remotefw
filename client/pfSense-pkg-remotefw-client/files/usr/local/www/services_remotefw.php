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

$remotefwConfig = &$config['remotefw']['uid'];
require_once("guiconfig.inc");

$pgtitle = array(gettext("Services"), gettext("RemoteFW"));
include("head.inc");

// $tab_array = array();
// $tab_array[] = array(gettext("Settings"), true, "/packages/cron/cron.php");
// $tab_array[] = array(gettext("Add"), false, "/packages/cron/cron_edit.php");
// display_top_tabs($tab_array);


// if (file_exists("/etc/remotefw/main.cfg")) {
// 	$configRec = file_get_contents("/etc/remotefw/main.cfg");
// 	$config = explode("\n", $configRec);
// }

$pgtitle = array(gettext("Services"), gettext("remoteFw"));
echo "Test:<br />";
echo $config['remotefw']['uid'];
echo "<br />";
echo 'Stuff goes here. <br />

[AUDIT] '. $remotefwConfig .'


<div class="infoblock">';

print_info_box('For more information see: <a href="http://www.freebsd.org/doc/en/books/handbook/configtuning-cron.html">FreeBSD Handbook - Configuring cron(8)</a> and <a href="https://www.freebsd.org/cgi/man.cgi?query=crontab&amp;sektion=5">crontab(5) man page</a>.', 'info');
echo '
	</div>
';

include("foot.inc"); ?>