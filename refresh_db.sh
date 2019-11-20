USER=${1}
PW=${2}
DB=${3}

mysql -u${USER} -p${PW} ${DB} < /home/randall/hudson/bizlistr/sqlfile