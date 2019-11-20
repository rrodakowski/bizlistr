DEST=${1}
FROM=${2}

tar -cvf ${DEST}/bizlistr.tar ${FROM}/webapp/*
