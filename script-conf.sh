#!/bin/bash

SERVERNAME=/home/web/iconeo.fr

chown -R www-data.ftpgroup $SERVERNAME
chmod -R 555 $SERVERNAME
chmod -R 555 $SERVERNAME/.*
chmod -R 777 $SERVERNAME/admin/FileUpload/server/php/files
chmod -R 755 $SERVERNAME/admin/uploads
chmod -R 755 $SERVERNAME/admin/photos