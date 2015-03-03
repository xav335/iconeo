#!/bin/bash

SERVERNAME=/home/web/iconeo.fr

chown -R www-data.ftpgroup $SERVERNAME
chmod -R 555 $SERVERNAME
chmod -R 555 $SERVERNAME/.htaccess
chmod -R 777 $SERVERNAME/admin/FileUpload/server/php/files
chmod -R 755 $SERVERNAME/uploads
chmod -R 755 $SERVERNAME/photos
