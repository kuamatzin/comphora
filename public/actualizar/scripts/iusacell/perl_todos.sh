#!/bin/bash

sh remove_iusacell.sh
sh get_iusacell.sh

#ls
rm equipos_iusa12.csv
rm equipos_iusa18.csv
rm equipos_iusa24.csv

echo ',DILO FACIL,DILO PRACTICO,DILO AUDAZ,DILO SEGURO,DILO FUERTE,DILO SIEMPRE,DILO TODO' > equipos_iusa12.csv
echo ',DILO FACIL,DILO PRACTICO,DILO AUDAZ,DILO SEGURO,DILO FUERTE,DILO SIEMPRE,DILO TODO' > equipos_iusa18.csv
echo ',DILO FACIL,DILO PRACTICO,DILO AUDAZ,DILO SEGURO,DILO FUERTE,DILO SIEMPRE,DILO TODO' > equipos_iusa24.csv


echo ',DILO FACIL CONTROLADO,DILO PRACTICO CONTROLADO,DILO AUDAZ CONTROLADO,DILO SEGURO CONTROLADO,DILO FUERTE CONTROLADO,DILO SIEMPRE CONTROLADO,DILO TODO CONTROLADO' > equipos_iusa12_controlado.csv
echo ',DILO FACIL CONTROLADO,DILO PRACTICO CONTROLADO,DILO AUDAZ CONTROLADO,DILO SEGURO CONTROLADO,DILO FUERTE CONTROLADO,DILO SIEMPRE CONTROLADO,DILO TODO CONTROLADO' > equipos_iusa18_controlado.csv
echo ',DILO FACIL CONTROLADO,DILO PRACTICO CONTROLADO,DILO AUDAZ CONTROLADO,DILO SEGURO CONTROLADO,DILO FUERTE CONTROLADO,DILO SIEMPRE CONTROLADO,DILO TODO CONTROLADO' > equipos_iusa24_controlado.csv

#sh get_next.sh

var="";
dir=${PWD};
echo $dir;
for f in "$dir"/*; do
#for f in `ls`; do
#var="$var $f";
perl iusacell_equipos.pl "$f"
done

#echo $var

#perl nextel_equipos.pl "$var"