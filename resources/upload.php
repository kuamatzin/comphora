<?php

include 'con.php';

$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$GLOBALS['planes'] =  "";
$GLOBALS['planes_ids'] =  "";
$GLOBALS['smartphones'] =  "";
$GLOBALS['companias']=$_GET['comp']; 


//echo "111name:".$GLOBALS['companias']."!!---meses:".$_GET['meses']."!".$_FILES["fileToUpload"];

// Check if image file is a actual image or fake image
if(isset($_FILES["fileToUpload"])) {
    
    //echo "name!!!";
	
	//if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //read($target_file);
        read($_FILES["fileToUpload"]["tmp_name"],$_GET['meses']);

    //} else {
    //    echo "Sorry, there was an error uploading your file.";
    //}

}

function read($file_name,$mes){

$meses=$mes;



	if(strcmp(valida_comas($file_name),"cool")==0)
	{
		valida_repetidos($file_name);
		//if(strcmp(get_planes(),"cool")==0)
		//{
		get_planes();
		insert_costo_agregado($meses);
			//update_costo_agregado($meses);
		/*}
		else
		{
			echo "Error: VERIFICA que los planes esten en la base de dato con el mismo nombre";
		}*/
	}

		///echo "<br>Error:"."lineas repetidas"."<br>";
	else{
		echo valida_comas($file_name);
		
	}

}

function valida_comas($file_name){

ini_set('auto_detect_line_endings',true);
$myfile = fopen($file_name, "r") or die("Unable to open file!");
		// Output one line until end-of-file
	$comas=0;
	$comas1=0;
	$cont=0;
	$return="cool";
	$line=$line2="";
	while(!feof($myfile)) {
			
			
			$line=fgets($myfile);
			$comas= substr_count($line, ",");
			//echo $line." : ";//.$line[0];
			//echo strcmp($line[0],"\n");
			//echo "| comas:".$comas." - comas1:".$comas."<br>";
			if(strlen($line)>1&&strcmp($line[0],"\n")!=0&&strlen($line2)>1&&strcmp($line2[0],"\n")!=0)
			{
				if($cont>0){
				if($comas1!=$comas){$return= "<br> Error: en la linea ".$cont; echo $return;}
				}
			}
			$comas1=$comas;
			$line2=$line;
		  $cont++;
		}
	fclose($myfile);

return $return;

}

function valida_repetidos($file_name)
{
	ini_set('auto_detect_line_endings',true);
	$myfile = fopen($file_name, "r") or die("Unable to open file!");
		// Output one line until end-of-file
	$cont=0;
	$lineas=array();
	while(!feof($myfile)) {
			
			$line=fgets($myfile);
			//echo $line."<br>";
			//echo "--------------------------------------------------------------------------------------<br>";
			if(strlen($line)>1&&strcmp($line[0],"\n")!=0)
			{
				array_push($lineas,$line);
				
			}
			
		  $cont++;
		}
	fclose($myfile);
	$GLOBALS["planes"]=$lineas[0];
	$equipos= array();
	for($i=1;$i<count($lineas);$i++)
	{
		array_push($equipos,$lineas[$i]);
	}
	$GLOBALS["smartphones"]=$equipos;
	//print_r($lineas);

	return count($lineas) !== count(array_unique($lineas));
}

function get_planes()
{
	$result="cool";
    include 'con.php';
		//echo "get_planes:".$planes."\n";

		//echo "enlace:".$enlace."<br>";
		$names= array();
    	$names=explode(",",$GLOBALS["planes"]);
    	$GLOBALS["planes"]=$names;
    	$planes= array();
    	//echo "names0:".$GLOBALS["planes"]."\n";
    	//echo "names:".print_r($names)."\n";
    	//echo "names1:".$names[1]."\n";
    	for($i=1;$i<count($names);$i++){

    		$names[$i]=trim($names[$i]);
    		$query="Select id From planes Where get_nombre_plan(t_plan)='".$names[$i]."';";
    		//echo "query:".$query."<br>";
    		
    		$data=pg_query($enlace,$query) or die("error en query planes");
    		//echo "data:".$data."<br>";
	    	$info=pg_fetch_assoc($data);
			//echo "info:".$info["id"]."<br>";
			//$names[i]=$info[0];
			//print_r($info);
			//echo "inf:".$info;
			if($info["id"])
			array_push($planes, $info["id"]);
			else
				$result="not";

    	}
    	//unset($names[3]);
    	$GLOBALS["planes_ids"] = $planes;
    	//echo "<br>planes_";print_r($planes);echo "<br>";
    	//falta eliminar el 1.
    	return $result;

}

function get_smartphones($nombre,$compania)
{
	$result="";
	include 'con.php';
	$nombre = utf8_encode($nombre);
	$query="Select id From smartphones Where nombre_$compania='$nombre';";
	//echo "$query"."<br>";
	$data=pg_query($enlace,$query) or die("error en query smartphones:".$query);
	$info=pg_fetch_assoc($data);

	//echo "id_smartphones:";print_r($info);echo "<br>";
	$result=$result.$info["id"];
	return $result;
}


function get_costo_agregado($plan,$smartphone)
{
	include ('con.php');
	$result="NO";

	$query="Select id,\"Activo\" From costo_agregado Where id_plan=$plan and id_equipo=$smartphone;";
	//echo "$query"."<br>";
	$data=pg_query($enlace,$query) or die("error en query costo_agregado:".$query);
	$info=pg_fetch_assoc($data);
	//print_r($info); echo "<br>";
	$result=$result.$info["id"]."|".$info["Activo"];

	return $result;
}



function Decide($plan, $smartphone, $meses, $valor)
{
	//echo "DECIDE:PLAN:".$plan."<br>";
	$activo=get_costo_agregado($plan,$smartphone);
		include 'con.php';
	if(strcmp($activo,"NO")==0){
		$activo[0]="NO";

	}else{
		$activo=explode("|", $activo);
	}

	
	//echo "DECIDE:ACTIVO:".$activo."<br>";

	if(strcmp($activo[0],"NO")==0){
		//insert status 1 activo 0
		$query="INSERT INTO costo_agregado(id_plan,id_equipo,\"".$meses."_meses\") VALUES(".$plan.",".$smartphone.",".$valor.")";
		pg_query($enlace,$query) or die("error en query insert:".$query);
	
	}
	else{//update porque ya existe.
		
		if(strcmp($activo[1],"1")==0){// esta en proceso de compra se crea uno nuevo.
			$query="INSERT INTO costo_agregado(id_plan,id_equipo,\"".$meses."_meses\") VALUES(".$plan.",".$smartphone.",".$valor.")";
			pg_query($enlace,$query) or die("error en query insert por activo:".$query);
		}
		else{// se hace update porque el plan no esta activo y obvio ya existe.
			$query="UPDATE costo_agregado set \"".$meses."_meses\"=$valor Where id_plan=".$plan." AND id_equipo=".$smartphone.";";
		pg_query($enlace,$query) or die("error en query update:".$query);
		}

		
		/*
		if (activo == "activo") INSERT;
		if (activo == "inactivo") UPDATE;

		*/
	}

//echo "$query <br>";


}


function insert_costo_agregado($meses){

	//include 'con.php';

	$smartphones_faltan=array();
	$planes_faltan=array();
	$planes_faltan_info=array();
	$smartphones_faltan_info=array();


	//echo "smartphones:".$GLOBALS["smartphones"]."<br>";

	for ($i=0; $i < count($GLOBALS["smartphones"]); $i++) { 
		
		$info=explode(",", $GLOBALS["smartphones"][$i]);
		//echo "info_".$info[0];
		$phone=get_smartphones($info[0],$GLOBALS["companias"]);
		$aux_array2=array();

		if(strcmp($phone, "")!=0){
			
			$aux_array=array();
			$plan_aux=array();
			$cont=0;			
			for ($j=1; $j < count($info); $j++) {
			
				if(strcmp($GLOBALS["planes_ids"][$j-1], "")!=0){

					$info[$j]=str_replace("$","",$info[$j]); 
					$info[$j]=str_replace("SIN PAGO INICIAL","0",$info[$j]); //SIN PAGO INICIAL
					$info[$j]=str_replace("GRATIS","0",$info[$j]);//GRATIS
					$info[$j]=str_replace("-","0",$info[$j]);//GRATIS
					$info[$j]=str_replace("NA","0",$info[$j]);//GRATIS

					//echo "DECIDE";
					Decide($GLOBALS["planes_ids"][$j-1],$phone,$meses,$info[$j]);
					//$query="INSERT INTO costo_agregado(id_plan,id_equipo,\"".$meses."_meses\") VALUES(".$GLOBALS["planes_ids"][$j-1].",".$phone.",".$info[$j].")";

					//echo "$query"."<br>";
				}
				else
				{
					//echo "el Plan:".$GLOBALS["planes"][$j]." no se encontro por favor agregalo a la base de datos, el costo agregado de estos planes no se agrego"."<br>";
					
					array_push($planes_faltan, $GLOBALS["planes"][$j]);

					if($cont==0){
						//echo "info_name".$info[0];
						//array_push($aux_array,$info[0]);//telefono
						$aux_array["smartphone"]=utf8_encode($info[0]);
					}
					$aux_array[$GLOBALS["planes"][$j]]=$info[$j];
					$cont++;
				}
			}
			if(count($aux_array)>0)
			array_push($planes_faltan_info, $aux_array);
		}
		else{
				array_push($smartphones_faltan, utf8_encode($info[0]));
				//echo "info_name".$info[0];
						//array_push($aux_array,$info[0]);//telefono
				$aux_array2["smartphone"]=utf8_encode($info[0]);
				for ($j=1; $j < count($info); $j++) {
					$aux_array2[$GLOBALS["planes"][$j]]=$info[$j];
				}
				array_push($smartphones_faltan_info, $aux_array2);
			//echo "el smartphone:".$info[0]." no se encontro por favor encuentra el link o agregalo manual mente."."<br>";
			
		}
		

	}

//	 echo "falta los siguientes planes: <br>";print_r(array_unique($planes_faltan));echo "<br>";
//	 echo "falta los siguientes smartphones:<br>";print_r(array_unique($smartphones_faltan));echo "<br>";
//	 echo "info que falta:<br>";print_r($planes_faltan_info);echo "<br>";
//	 echo "info de smartphones que faltan:<br>";print_r($smartphones_faltan_info);echo "<br>";


	 	$return=array();
	 $return["falta_planes"]=array_unique($planes_faltan);
	 $return["falta_smartphones"]=array_unique($smartphones_faltan);
	 $return["planes_faltan_info"]=$planes_faltan_info;
	 $return["smartphones_faltan_info"]=$smartphones_faltan_info;

	 echo json_encode($return);


}




function update_costo_agregado($meses){

	include 'con.php';


	//echo "smartphones:".$GLOBALS["smartphones"]."<br>";

	for ($i=0; $i < count($GLOBALS["smartphones"]); $i++) { 
		
		$info=explode(",", $GLOBALS["smartphones"][$i]);
		//echo "info_".$info[0];
		$phone=get_smartphones($info[0],"nextel");
		if(strcmp($phone, "")!=0){

			for ($j=1; $j < count($info); $j++) {
			$info[$j]=str_replace("$","",$info[$j]); 
			$query="UPDATE costo_agregado set \"".$meses."_meses\"=$info[$j] Where id_plan=".$GLOBALS["planes"][$j-1]." AND id_equipo=".$phone.";";
			echo "$query"."<br>";
			//$data=pg_query($enlace,$query) or die("error en query");
			}
		}
		else{

			echo "el smartphone:".$info[0]." no se encontro por favor encuentra el link o agregalo manual mente."."<br>";
		}
		

	}


}




	


?>