<?php

//exec("wget http://www.iusacell.com.mx/iphone5/precios_detalle.php?id_equipo=117",$output);

$file=file_get_contents("http://www.iusacell.com.mx/iphone5/precios_detalle.php?id_equipo=117");


$file=str_replace("[", "", $file);
$file=str_replace("]", "", $file);
$file=str_replace("{", "", $file);
$file=str_replace("}", "", $file);

$file=str_replace("1,", "1", $file);
$file=str_replace("2,", "2", $file);
$file=str_replace("3,", "3", $file);
$file=str_replace("4,", "4", $file);
$file=str_replace("5,", "5", $file);
$file=str_replace("6,", "6", $file);
$file=str_replace("7,", "7", $file);
$file=str_replace("8,", "8", $file);
$file=str_replace("9,", "9", $file);
$file=str_replace("0,", "0", $file);
/*
$file=str_replace("1\"", "1,", $file);
$file=str_replace("2\"", "2,", $file);
$file=str_replace("3\"", "3,", $file);
$file=str_replace("4\"", "4,", $file);
$file=str_replace("5\"", "5,", $file);
$file=str_replace("6\"", "6,", $file);
$file=str_replace("7\"", "7,", $file);
$file=str_replace("8\"", "8,", $file);
$file=str_replace("9\"", "9,", $file);
$file=str_replace("0\"", "0,", $file);
*/

$file=str_replace("1,:", "1:", $file);
$file=str_replace("2,:", "2:", $file);
$file=str_replace("3,:", "3:", $file);
$file=str_replace("4,:", "4:", $file);
$file=str_replace("5,:", "5:", $file);
$file=str_replace("6,:", "6:", $file);
$file=str_replace("7,:", "7:", $file);
$file=str_replace("8,:", "8:", $file);
$file=str_replace("9,:", "9:", $file);
$file=str_replace("0,:", "0:", $file);
$file=str_replace("\n", "", $file);
$file=str_replace("								", "", $file);
$file=str_replace("				", "", $file);
$file=str_replace("	", "", $file);





$file=str_replace("\"", "", $file);


echo $file."\n";

$array = explode(',', $file);
$new_array = array();
#array_walk($array,'walk', $new_array));
print_r($array);
#print_r($new_array);

for ($i=0; $i < count($array) ; $i++) { 
	$valores=explode(":", $array[$i]);
	$new_array[$valores[0]]=$valores[1];

}
print_r($new_array);

//$file = fopen("test.csv","w");

$valors= $new_array["dilo_facil_12"].",".$new_array["dilo_practico_12"].",".$new_array["dilo_audaz_12"].",".$new_array["dilo_seguro_12"].",".$new_array["dilo_fuerte_12"].",".$new_array["dilo_siempre_12"].",".$new_array["dilo_todo_12"];

file_put_contents("test.csv", "\n".$valors, FILE_APPEND);

//echo fwrite($file,$valors);
//fclose($file);








?>