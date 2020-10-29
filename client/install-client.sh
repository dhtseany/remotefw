#!/bin/bash

# System Variables
DATE=$(date)
DOW=$(date +%u)
WEEK=$(date +%V)
MONTH=$(date +"%m")
YEAR=$(date +"%y")
httpUser=http
httpGroup=http
runCommand=$1
runOption=$2

# Misc Variables
#InstallDir=/srv/http

clear

# Command input checks
if [ -z $runCommand ]
	then
		echo "[ERROR] You must specific a run option to proceed."
		echo "Currently supported run options:"
		echo "install"
		echo "remove"
		exit 1
fi

if [ $runCommand = "install" ]
	then
        echo "[NOTICE] User invoked Installation script."
        echo "[COPY] Installing remotefw-client.xml to /usr/local/pkg/remotefw-client.xml"
        cp ./pfSense-pkg-remotefw-client/files/usr/local/pkg/remotefw-client.xml /usr/local/pkg/remotefw-client.xml
        
        echo "[COPY] Installing remotefw-client.xml to /usr/local/share/pfSense-pkg-remotefw-client/info.xml"
        cp ./pfSense-pkg-remotefw-client/files/usr/local/share/pfSense-pkg-remotefw-client/info.xml /usr/local/share/pfSense-pkg-remotefw-client/info.xml
        
        echo "[COPY] Installing services_remotefw.php to /usr/local/www/services_remotefw.php"
        cp ./pfSense-pkg-remotefw-client/files/usr/local/www/services_remotefw.php /usr/local/www/services_remotefw.php
fi

if [ $runCommand = "remove" ]
	then
        echo "[NOTICE] User invoked removal script."
        echo "[DEL] Removing /usr/local/pkg/remotefw-client.xml"
        rm /usr/local/pkg/remotefw-client.xml
        
        echo "[DEL] Removing /usr/local/share/pfSense-pkg-remotefw-client/info.xml"
        rm /usr/local/share/pfSense-pkg-remotefw-client/info.xml
        
        echo "[DEL] Removing /usr/local/www/services_remotefw.php"
        rm /usr/local/www/services_remotefw.php
fi
