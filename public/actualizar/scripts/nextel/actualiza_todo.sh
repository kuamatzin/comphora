
#echo "****************** ACTUALIZANDO CONEXION ******************\n"
#cd next_conexion
#sh sql_phones.sh
#cd ..

echo "****************** ACTUALIZANDO IDEN ******************\n"
cd next_iden
sh sql_phones.sh
cd ..

echo "****************** ACTUALIZANDO Navegacion ******************\n"
cd next_navegacion
sh sql_phones.sh
cd ..
#echo "****************** ACTUALIZANDO PRIP ******************\n"
#cd next_prip
#sh sql_phones.sh

echo "****************** ACTUALIZANDO IPHONE ******************\n"
cd next_iphone
sh sql_phones.sh
