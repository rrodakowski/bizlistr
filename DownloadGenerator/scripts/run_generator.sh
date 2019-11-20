#!/usr/bin/ksh -p
###########################################################################
# <run_generator.sh> : This is the driver for a java code that            #
#                        generates a csv file that is the deliverable	  #
#	                for a complted sale on bizlistr.com		  #
# Bizlistr Project							  #
###########################################################################

##########################################################
# Functions Definition Section                           #
##########################################################

msg_log()
{
  mn="%M"			
	yr="%Y"     
  msg="`date +${yr}%m%d%H${mn}%S` | prepilot.pl | run_xml_toc.sh"

  if [ "$1" = "STDERR" ]
  then
    shift
    msg="RIAGNetErrorLog | $msg | $1"
    shift
    echo "$msg | $*" >&2
  else
    shift
    msg="RIAGNetEventLog | $msg | $1"
    shift
    echo "$msg | $*"
  fi
}

###############################################################

# What to do if we receive a signal
# This might be usable to track core-dumps, kills, interrupt, etc.
Signal_handling()
{
    msg_log STDERR SIG_ERROR "recieved signal $1, cleaning up"
    exit 2
}

###############################################################

# exiting with a return code
Done_Exit()
{
    msg_log STDOUT Exiting "Return with $1"
    exit $1
}

############################
##	$1 output path
############################

if [ $# -ne 1 ]
then
        echo "USAGE: $0 <path for output file>"
        Done_Exit 2
fi

DEPLOYDIR=/home/randall/bizlistr/DownloadGenerator

CLASSPATH=${DEPLOYDIR}/bin/downloadGenerator.jar:${DEPLOYEDIR}/lib/mysql-connector-java-5.1.13-bin.jar

OUTPUT_PATH=${1}

# make sure the working directory is set properly
cd ${2}

ulimit -s 35848

java -Xms10m -Xmx1000m -Xss256k \
     downloadGenerator.DownloadGenerator ${OUTPUT_PATH}

rc=$?
if [ $rc -ne 0 ]
then
		msg_log STDERR TocRunner "${DATA_FILE} ${META} bombed"
		Done_Exit $rc
fi

