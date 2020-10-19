#!/bin/bash

# System Variables
DATE=$(date)
DOW=$(date +%u)
WEEK=$(date +%V)
MONTH=$(date +"%m")
YEAR=$(date +"%y")
runCommand=$1
runOption=$2

# Misc Variables
InstallDir=/srv/http

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
        cp ./index.php $InstallDir/index.php
fi

if [ $runCommand = "remove" ]
	then
        rm $InstallDir/index.php
fi
