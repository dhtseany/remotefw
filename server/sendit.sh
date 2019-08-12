#!/bin/bash

## SendIt... An easy to use ssh/scp based tool uesd to push files to the remote hosts.
## Usage:
## ./sendit.sh <serverip or DNS> <what-to-send>

CURRENT_USER="ssnell"
SERVER_OPTION=$1
WHAT_TO_SEND=$2
TMP_DIR="/home/$CURRENT_USER/stage"
SEND_TO_DIR="/srv/httpd"
DATE=$(date)

# if [[ ! -d $TMP_DIR ]] then mkdir -p $TMP_DIR fi

if [[ -z $SERVER_OPTION ]]
    # Empty
    then
        echo "Error: You first need to specify which server you want to work with."
        echo "$ ./sendit.sh <serverip or DNS> <what-to-send>"
        exit 1
fi

if [[ -z $WHAT_TO_SEND ]]
    # Empty
    then
        echo "Error: You need to specify what you're trying to send (Usually all, upgrade or conf)."
        echo "$ ./sendit.sh <serverip or DNS> <what-to-send>"
        exit 1
fi

if [[ ("$WHAT_TO_SEND" == "all" || "$WHAT_TO_SEND" == "ALL") ]]
    # Matches
    then
        clear
        echo "Transfer started at $DATE"
        ssh -q -t $CURRENT_USER@$SERVER_OPTION "rm -rf /home/$CURRENT_USER/stage"
        ssh -q -t $CURRENT_USER@$SERVER_OPTION "mkdir /home/$CURRENT_USER/stage"
        files=( * )
        for filename in "${files[@]}"; do
            scp ./$filename $CURRENT_USER@$SERVER_OPTION:$SEND_TO_DIR/$filename
        done
        exit 0
fi