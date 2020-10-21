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
InstallDir=/srv/http

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
        echo "[COPY] Installing /index.php to $InstallDir"
        cp ./index.php $InstallDir/index.php
        echo "[DIR] Creating $InstallDir/config"
        mkdir -p $InstallDir/config
        echo "[COPY] Installing /config/database.php to $InstallDir"
        cp config/database.php $InstallDir/config/database.php
        echo "[COPY] Installing /demogui to $InstallDir/demogui"
        cp -R demogui/ $InstallDir/demogui
        echo "[PERM] Correcting file permissions"
        chown -R $httpUser:$httpGroup $InstallDir
fi

if [ $runCommand = "remove" ]
	then
        echo "[NOTICE] User invoked removal script."
        echo "[DEL] Removing /index.php from $InstallDir"
        rm $InstallDir/index.php
        echo "[DEL] Removing config folder"
        rm -rf $InstallDir/config
        echo "[DEL] Removing demogui folder"
        rm -rf $InstallDir/demogui
fi
