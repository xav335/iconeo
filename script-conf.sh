#!/bin/bash

SERVERNAME=/home/web/iconeo.fr

chown -R www-data.ftpgroup $SERVERNAME
chmod -R 555 $SERVERNAME
chmod -R 555 $SERVERNAME/.*
