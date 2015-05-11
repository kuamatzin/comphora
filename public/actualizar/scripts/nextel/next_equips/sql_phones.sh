#!/bin/bash

sh get_next.sh

dir="/Users/francisco_idolo/Documents/equipos/nextel/next_equips"
for f in "$dir"/*; do
perl nextel_equipos.pl "$f"

done