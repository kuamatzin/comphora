<?php

$name=$_GET["name"];
$compania=$_GET["compania"];


if(strcmp($name, "iusacell")==0){


header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename= scripts/$compania/$name");
header("Content-Transfer-Encoding: binary");    
readfile("scripts/$compania/$name");

}
else
{

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename= scripts/$compania/$name");
header("Content-Transfer-Encoding: binary");    
readfile("scripts/$compania/$name");

}


?>