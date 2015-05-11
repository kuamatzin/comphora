#!/bin/bash

#ls

rm equipos_next18.csv
rm equipos_next24.csv

echo ',iDen 400,iDen 500,iDen 600,iDen 800' > equipos_next18.csv
echo ',iDen 400,iDen 500,iDen 600,iDen 800' > equipos_next24.csv

sh get_next.sh

var="";
dir=${PWD}
for f in "$dir"/*; do
#for f in `ls`; do
#var="$var $f";
perl nextel_equipos.pl "$f"
done

#echo $var

#perl nextel_equipos.pl "$var"