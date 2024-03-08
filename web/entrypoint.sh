#!/bin/sh

. /etc/apache2/envvars

# clean up the pid file
rm -f $APACHE_PID_FILE

exec apache2 -D FOREGROUND
