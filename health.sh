#!/bin/sh

curl localhost:8080/health.php | grep OK
# Comment
if [ $? -ne 0 ]
then
	exit 254
fi
