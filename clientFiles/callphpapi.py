#############################################################################
#
# callphpapi.py
#
# Description:
#
#       This program reads a file and sends it to an API
#
# History:
#
#       2015.11.28      Initial implementation. (BLM)
#
#ibm4you
#
# Examples:
#
#       To call the program, enter:
#                       python callphpapi.py hostname environment code filename
#
#############################################################################

# Initialization of variables, etc.
import sys, subprocess, httplib, urllib
import ConfigParser, datetime
myStatus = ""
myURL = "simplelogging-antirational-spectrophotometry.mybluemix.net"
myAPI = "pinsert.php"
# Get the parameters

if len(sys.argv) != 5:
        print 'To run this program, enter ' + str(sys.argv[0]) + ' hostname environment code filename'
        print 'Argument List:', str(sys.argv)
        sys.exit(0)
else:
        hostName = sys.argv[1]
        envName = sys.argv[2]
        codeName = sys.argv[3]
        inputFilename = sys.argv[4]
#Check to see if the input file exists and it is a text file.
try:
        f = open(inputFilename)
        lines = f.readlines()
        for line in lines:
          myStatus = myStatus + line
        f.close()

except:
        myStatus = "Error reading " + inputFilename

try:
        now = datetime.datetime.now()
        params = urllib.urlencode({'Logdate': now.strftime("%Y-%m-%d"), 'Logtime': now.strftime("%H:%M"), 'Loghost': hostName, 'Logenv': envName, 'Logcode': codeName, 'Logstatus': myStatus})
        headers = {"Content-type": "application/x-www-form-urlencoded", "Accept": "text/plain"}
        conn = httplib.HTTPConnection(myURL)
        conn.request("POST", myAPI, params, headers)
        res = conn.getresponse()
        print res.status, res.reason

except:
        print "Errors trying to connect to the API"

sys.exit(0)