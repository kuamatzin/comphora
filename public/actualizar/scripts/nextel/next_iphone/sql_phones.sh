#!/bin/bash

rm equipos_next18.csv
rm equipos_next24.csv

echo ",Plan 300,Plan 400,Plan 500,Plan 600,Plan 800,Plan 1000,Plan 1500" > equipos_next18.csv
echo ",Plan 300,Plan 400,Plan 500,Plan 600,Plan 800,Plan 1000,Plan 1500" > equipos_next24.csv

sh get_next.sh

dir=${PWD}
for f in "$dir"/*; do
perl nextel_equipos.pl "$f"

done