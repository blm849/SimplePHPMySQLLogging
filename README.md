# SimplePHPMySQLLogging

This repo has two folders.

The client folder contains code that should run on the node doing the tests.
The client node does a bunch of pings and then sends the information to a central
server.
To set up the client node, do the following:
create directory /home/bernie/networktesting
create XXXhosts.txt file
add files:
callphpapi.py
pingtest.py

step1.sh
step2.sh

modify step1.sh AND step2.sh so it refers to the proper location and environment

chmod +x *.sh
crontab -e

