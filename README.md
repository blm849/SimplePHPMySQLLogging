# SimplePHPMySQLLogging

## Purpose of this repo

I wanted to set up a client-server repo where one or more Linux machines could report on itself (e.g. query network status) using client code and send the results to a central PHP server running the server code.

To do that, I create two sets of code: the client files and the server files. The client files are a number of shell scripts that call Python programs. One specific file is the callphpapi.py that sends information to the central PHP server.

The server files run on a PHP server. I ran this code in a PaaS environment under IBM Bluemix.

_Note:_ This repo has been set up mostly for my own records. I'm happy to share it, but you will need to do some work to figure out the code and make it work.

## Setup guidance

To set up the client files, do the following (assuming your userid is "bernie" :)):

create directory /home/bernie/networktesting
create XXXhosts.txt file in that directory and add the following files into that directory:

* callphpapi.py
* pingtest.py
* step1.sh
* step2.sh

Then run this command: chmod +x *.sh

Once the files are place, modify step1.sh AND step2.sh so it refers to the proper location and environment.

From there, use the crontab.entry files to set up the crontab for this user using this command:
* crontab -e

To set up the server files, it is assumed the server is using a LAMP stack. To set up the database, use the setupDB.php file. It calls some other code, like db_login.php.

Once the database is set up, the callphpapi.py file should be able to send data to the server. To see that data, index.php should work.
