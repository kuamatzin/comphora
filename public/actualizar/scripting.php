<?php

$compania = $_GET["compania"];

if(strcmp($compania, "iusacell")==0)
{

	chdir("scripts/iusacell");
	$salida = shell_exec('sh perl_todos.sh');
	



	echo "Fin IUSACELL!!";


}
else{

	chdir("scripts/nextel");
	$salida = shell_exec('sh actualiza_todo.sh');


	echo "Fin NEXTEL!!";

}


#echo phpinfo();






?>