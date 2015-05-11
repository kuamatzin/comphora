while(my $fn = shift @ARGV) {
    
    if(!open(INFILE, $fn)) {
        print STDERR "Cannot open $fn: $!\n";
        next;
    }
    
    @title;
    @value;
    
    @CPU;
    @CPU_values;
    @Casing;
    @Display;
    @Display_values;
    @Memory;
    @Memory_values;
    @Other;
    @Other_values;
    @Battery;
    @Battery_values;
    @Camera;
    @Camera_values;
    @Connectivity_D;
    @Connectivity_D_values;
    @General;
    @General_values;
    @Operation_Systems;
    @Operation_Systems_values;
    @size_weight;
    @size_weight_values;
    
    my $marca_equipo="";
    my $nombre_equipo="";
    my $imagen="";
    my $divs=0;#
    my $dentro=0;#
    my $fin=0;
    my $primera_imagen=0;
    my $valor="";
    my $mem_cont=0;
    my $carac_cont=0;
    my $os=0;
    my $bat_cont=0;
    my $in=0;
    my $nfin=0;
    my $img_bool=0;

 

    @CPU_values[0]="";@CPU_values[1]="";
    @Display_values[0]=@Display_values[1]="";@Display_values[2]="";
    @Memory_values[0]="";@Memory_values[1]=@Memory_values[2]="";
    @Other_values[0]="";
    @Connectivity_D_values[0]=@Connectivity_D_values[1]=@Connectivity_D_values[2]=@Connectivity_D_values[3]="";
    @General_values[0]=@General_values[1]=@General_values[2]="";
    @Operation_Systems_values[0]="";
    @size_weight_values[0]=@size_weight_values[1]=@size_weight_values[2]=@size_weight_values[3]="";
    @Camera_values[0]=@Camera_values[1]=@Camera_values[2]="";
    @Battery_values[0]="";@Battery_values[1]=@Battery_values[2]=@Battery_values[3]="";
    @Operation_Systems_values[0]=@Operation_Systems_values[1]="";
    
    while(my $l = <INFILE>) {
        
        
        #<!-- END DETAILED SPECIFICATIONS -->
        if(index($l, "<div id=\"specs-list\">") != -1){
            $in=1;
        }
        
        #if($fin!=1)
        #{
            
            if($dentro==1)
            {
                #print "REDS1:".$dentro."_".$valor."\n";
                @arr;

                # red 2g 3g 4g
                if (index($valor, "GSM") != -1) {
                   # print "REDS:".$valor."\n";
                   @arr=split(/-/,$valor);
                

                my $long=@arr;
                for(my $n=0;$n<$long;$n++)
                {
                   # print @arr[$n]."\n";
                    if (index(@arr[$n], "GSM") != -1) 
                    {
                        @General_values[0]=@arr[$n].@General_values[0];
                    }
                    if (index(@arr[$n], "HSDPA") != -1) 
                    {
                        @General_values[1]=@arr[$n].@General_values[1];
                    }
                    if (index(@arr[$n], "LTE") != -1) 
                    {
                        @General_values[2]=@arr[$n].@General_values[2];
                    }
                    

                }

                }
                
            }
            
            if($dentro==2)
            {
                #print "dentro2:".$valor."\n";
                @arr;
                #dimensiones
                if (index($valor, "x") != -1) {
                    
                    @arr1=split(/mm/,$valor);
                   @arr=split(/x/,@arr1[0]);#solo se toma la parte antes de mm: [12 x 22 x 11 ]mm
                   #print @arr[0]." ".@arr[1]." ".@arr[2]."\n";
                   @size_weight_values[0]=@arr[0];
                   @size_weight_values[1]=@arr[1];
                   @size_weight_values[2]=@arr[2];
                   #@size_weight_values[2] =~ s/mm//; 
                }
                if (index($valor, "g") != -1) {
                    
                   @arr=split(/g/,$valor);

                   @size_weight_values[3]=@arr[0];
                }

            }
            if($dentro==3||$dentro==3.1)
            {
                
               @arr;
                #display
                if (index($valor, "pixels") != -1) {
                    #resolucion, tamaño

                    #print "pixels";

                    @arr=split(/,/,$valor);

                     @arr[0] =~ s/pixels//;
                        @arr[1] =~ s/pulgadas//;


                   @Display_values[1]=@arr[0];
                   @Display_values[2]=@arr[1];
                   $dentro+=.1;
                   
                }
                else
                {
                    #tipo
                    if(length($valor)>0){
                        
                    @Display_values[0]=$valor;
                    @Display_values[0]=~ s/,//g; 
                    $dentro+=.1;   
                    }
                    
                }

            }
            if($dentro==5.3&& length($valor)>0)
            {
               
                @arr;
                my $val="";
                #memoria
                if ($mem_cont==0) {
                    #slot
                    @Memory_values[0]=$valor;
                   
                }

                if ($mem_cont==1) {
                    #interna, Ram

                     @arr=split(/,/,$valor);

                #interna
                my $inicio=index(@arr[0], "- ")+2;
                my $fin=index(@arr[0],"GB");
                if($fin==-1){$fin=index(@arr[0],"MB");}
                $val=substr(@arr[0],$inicio,$fin-$inicio);
                if(index(@arr[0],"GB")!=-1&&index($nombre_equipo,"Apple")==-1){$val=$val*1024;}
                @Memory_values[1]=$val;

                #reinicia val
                $val="";
                #ram
                my $inicio=index(@arr[1], " ")+1;
                my $fin=index(@arr[1],"GB");
                if($fin==-1){$fin=index(@arr[1],"MB");}
                #verifica por ultimo si si hay datos de RAM
                if($fin!=-1){
                $val=substr(@arr[1],$inicio,$fin-$inicio);
                #convierta a MB si es el caso.
                if(index(@arr[1],"GB")!=-1){$val=$val*1024;}
                }
                @Memory_values[2]=$val;
                



                }
               # print "Valor:".$valor." \n"." len:".length($valor);
                if ($mem_cont==2) {
                    #tipo procesador, velocidad procesador

                    my $en_mhz=0;#Boolean de si esta en mhz o ghz
                     if (index($valor, "GHz") != -1||index($valor, "MHz") != -1) {


                        if(index($valor, " GHz") != -1){@arr=split(/ GHz/,$valor);}
                        else{

                        if(index($valor, " MHz") != -1){@arr=split(/ MHz/,$valor);$en_mhz=1;}
                            else{
                                if(index($valor, "GHz") != -1){@arr=split(/GHz/,$valor);}
                                else
                                {

                                    if(index($valor, "MHz") != -1){@arr=split(/MHz/,$valor);$en_mhz=1;
                                    }
                                }       

                            }   
                        }
                        #arreglo que tendra todas las palabras antes de GHz o MHz el ultimo elemento sera un int con el valor double de la velocidad del procesador
                        my $info;
                        @arr2=split(/ /,@arr[0]);
                        my $long=@arr2;
                        $long=$long-1;
                        $info=@arr2[$long];
                        if(index(@arr2[$long], "@") != -1){

                            @arrr3=split(/@/,@arr2[$long]);
                            $long=@arrr3;
                            $long=$long-1;
                            $info=@arrr3[$long];
                        }
                        
                        #checa si son MHz o GHz si son MHz los convierte a GHz
                        if($en_mhz==1){$info=$info/1000;}


                        #@CPU_values[0]="";
                        #velocidad
                        @CPU_values[1]=$info;

                        #for(my $n=0;$n<$long;$n++)
                        #{   #tipo de procesador
                         #   @CPU_values[0]=@CPU_values[0]." ".@arr2[$n];
                        #}
                        @CPU_values[0]=$valor;
                        @CPU_values[0]=~s/- Procesador//;


                     }
                     else
                     {#solo el tipo de procesador

                        @CPU_values[0]=$valor;
                        @CPU_values[0]=~s/- Procesador//;
                     }

                    $dentro=$dentro-0.3; 
                }

                $mem_cont++;
            }
           
            if($os==1&&length($valor)>0)
            {
               
                @arr;
                my $long;
                if(index($valor,"Windows")!=-1)
                {
                    @arr=split(/ /,$valor);
                    $long=@arr;
                    $long--;
                    @Operation_Systems_values[1]=@arr[$long];
                }
                if(index($valor,"Android")!=-1)
                {
                    @arr=split(/,/,$valor);
                    $long=@arr;
                    $long--;
                    @Operation_Systems_values[1]=@arr[$long];
                    
                }
                if(index($valor,"iOS")!=-1)
                {
                    @arr=split(/ /,$valor);
                    $long=@arr;
                    $long--;
                    @Operation_Systems_values[1]=@arr[$long];
                    #print "Long:".$long."\n";
                    
                }
                for( my $n=0;$n<$long;$n++)
                {
                    @Operation_Systems_values[0]=@Operation_Systems_values[0]." ".@arr[$n];
                }
                @Operation_Systems_values[0]=~s/ OS//;
                @Operation_Systems_values[0]=~s/  //;
                @Operation_Systems_values[0]=~s/ i/i/;
                @Operation_Systems_values[0]=~s/ A/A/;
                @Operation_Systems_values[0]=~s/ Microsoft //;
                $os=0;
            }

            if($dentro==6.1&&length($valor)>0)
            {
                # "dentro:".$dentro." valor:".$valor."\n";
                @arr;
                if($carac_cont==0)
                {#color
                    @Casing[0]=$valor;
                }
                if ($carac_cont==1) {
                   #camara

                   #trasera
                   @arr=split(/MP/,$valor);
                   @Camera_values[0]=@arr[0];
                   if(index(@Camera_values[0],"VGA")!=-1){@Camera_values[0]=0.3;}

                   #cámara frontal
                   @arr=();
                   @arr=split(/cámara frontal/,$valor);
                   @Camera_values[1]=@arr[1];


                   #video
                   @arr=();
                   @arr=split(/video/,$valor);
                my $inicio=0;
                my $fin=index(@arr[1],",");
                if($fin==-1){$fin=1;}
                $val=substr(@arr[1],$inicio,$fin-$inicio);
                @Camera_values[2]=$val;


                }
                if($carac_cont>1)
                {
                    #gps
                    if (index($valor, "GPS") != -1) {
                        @Connectivity_D_values[0]=$valor
                    }
                    #wireless
                    if (index($valor, "Wi-Fi") != -1) {
                        @Connectivity_D_values[1]=$valor
                    }
                    #bluetooth
                    if (index($valor, "Bluetooth") != -1) {
                        @Connectivity_D_values[2]=$valor
                    }
                    #USB
                    if (index($valor, "USB") != -1) {
                        @Connectivity_D_values[3]=$valor
                    }
                    #SIM tipo
                    if (index($valor, "SIM") != -1) {
                        @Other_values[0]=$valor
                    }
                }


                $carac_cont++;

            }
            if($dentro>=7&&length($valor)>0)
            {
                
                # print "dentro".$dentro." ".$valor."\n";
                @arr;
                #bateria
                #tipo, capacidad
                if($bat_cont==0)
                {
                    $valor=~ s/(\d)mAh/$1 mAh/;
                    #print "valor_bat:".$valor."\n";
                    @arr=split(/ mAh/,$valor);
                    @arr2;
                    @arr2=split(/ /,@arr[0]);
                    my $long=@arr2;
                    $long--;
                    my $val="";
                    #tipo
                    for(my $n=0;$n<$long;$n++)
                    {
                        $val=$val." ".@arr2[$n];
                    }
                    @Battery_values[0]=$val;
                     
                    #capacidad
                    #print  "@Battery_values[1]=".$valor."\n";
                    if(index($valor,"mAh")!=-1){
                    @Battery_values[1]=@arr2[$long];
                    }
                    else
                    {
                       # print  "@Battery_values=".@Battery_values[1]."\n";
                        @Battery_values[1]="";
                    };


                }

                if($bat_cont==1)
                {#en espera
                    my $num=0;
                    $valor=~ s/3G//;
                    $valor=~ s/2G//;
                    $valor=~ s/4G//;
                    my @all_nums    = $valor =~ /(\d+)/g; 
                    my $long=@all_nums;

                    #print "en espera:".@all_nums[0]." ".@all_nums[1]."long:$long \n";


                    if($long>1){$num=(@all_nums[0]+@all_nums[1])/2;}
                    else {$num=@all_nums[0];}
                    #checa si si hay info de en espera
                    if($long==0){
                        @Battery_values[2]="";
                    }
                    else{
                        @Battery_values[2]=$num;   
                    }
                }
                if($bat_cont==2)
                {# en conversacion
                    my $num="";

                    $valor=~ s/3G//;
                    $valor=~ s/2G//;
                    $valor=~ s/4G//;
                    my @all_nums    = $valor =~ /(\d+)/g; 
                    my $long=@all_nums;


                    #print "en conversacion:".@all_nums[0]." ".@all_nums[1]."\n";

                    if($long==2){
                        $num=(@all_nums[0]+@all_nums[1])/2;
                    }
                    if($long==4){
                        $num=(@all_nums[0]+@all_nums[2])/2;
                    }
                    if($long==1){
                        $num=@all_nums[0];
                    }
                    @Battery_values[3]=$num;

                }

                $bat_cont++;
            }
           
            
        #}
         
         #reinicia el valor;
         $valor="";
        #valor de nfo.

        if($dentro>5 && $nfin==1)#el valor esta en varias filas.
        {
            if(index($l,"</td>")!=-1&&index($l,"<td class=\"nfo\">")==-1){
                $nfin=0;
                $valor=$l;
                $valor=~s/< br>//g;
                $valor=~s/<\/td>//g;
                $valor=~s/<\/tr>//g;
                $valor=~s/\n//g;
                # print "Cerodentro".$l." ".$valor."\n";
            }
            else
            {
                if(length($l)>0){

               $valor=$l;
               $valor=~s/<br \/>//g;
               $valor=~s/\n//g;
               $valor=~ s/[\r\n]+$//;
               # print "unodentro".$l." ".$valor."\n";
                   
                }
            }

                  
        }  
            if (index($l, "<td class=\"nfo\">") != -1) {
                
                my $inicio=index($l, "<td class=\"nfo\">")+16;
                my $fin;
                $fin=index($l,"</td>",$inicio);
                if($fin==-1){$fin=index($l,"<br />",$inicio); $nfin=1;}
                if($fin==-1){$fin=length($l)-1; $nfin=1;}
                $valor=substr($l,$inicio,$fin-$inicio);

                #print "L:".$valor." nfin:".$nfin." dentro:$dentro \n";
            }
            
            if (index($l, "<img itemprop=\"image\" src=\"") != -1&&$primera_imagen==0) {
                
                my $inicio=index($l, "<img itemprop=\"image\" src=\"")+27;
                my $fin=index($l,"\"  alt=\"");
                $imagen=substr($l,$inicio,$fin-$inicio);
                $primera_imagen=1;
                
            }
            
            
                if (index($l, "<table cellspacing=\"0\">") != -1 && $in==1) {
                    
                    $dentro++;
                } 
      

        if (index($l, "<a href=#>Slot de tarjeta</a>") != -1) {
                    
                    $dentro=$dentro+.1;
                    #print "dentro".$dentro." ".$valor."\n";
                }
                #<a href="#">Colores</a>
        if (index($l, "<a href=#>Colores</a>") != -1) {
                    
                    if($dentro==6.3){$dentro=6;}

                    $dentro=$dentro+.1;
                }  

        #<a href="#">OS</a>
        if (index($l, "<a href=\"#\">OS</a>") != -1) {
                    
                    $os=1;
                    #print "Valor:".$valor." \n";
                } 
        if(index($l,"<div class=\"col-md-3 col-sm-4\">")!=-1)
        {
            
            $img_bool=1;
        }
        if($img_bool==1&&index($l,"<img src")!=-1)
        {
            my $inicio=index($l, "<img src=\"")+10;
            my $fin=index($l,"\"",$inicio);
            $imagen=substr($l,$inicio,$fin-$inicio);

            my $inicio=index($l, "alt=\"")+5;
            my $fin=index($l,"\"",$inicio);
            my $aux=substr($l,$inicio,$fin-$inicio);

            @arr=split(/ /,$aux);
            $marca_equipo=@arr[0];
            #nombre sin marca
           # my $long=@arr;
           # for(my $n=1;$n<$long;$n++)
           # {
           #     $nombre_equipo=$nombre_equipo." ".@arr[$n];
           # }

           #nombre con marca
           $nombre_equipo=$aux;

            $img_bool=0;
        }

    }
    
my $query="";

    #2g 3g 4g
    $query=@General_values[0].",".@General_values[1].",".@General_values[2].",";
    #ancho alto grosor peso
    $query=$query.@size_weight_values[0].",".@size_weight_values[1].",".@size_weight_values[2].",".@size_weight_values[3].",";
    #tipo resolucion tamaño
    $query=$query.@Display_values[0].",".@Display_values[1].",".@Display_values[2].",";
    #slot interna ram
    $query=$query.@Memory_values[0].",".@Memory_values[1].",".@Memory_values[2].",'";
    #tipo velocidad
    $query=$query.@CPU_values[0]."',".@CPU_values[1].",'";
    #color
    $query=$query.@Casing[0]."',";
    #trasera frontal video
    $query=$query.@Camera_values[0].",".@Camera_values[1].",".@Camera_values[2].",";
    #GPS WIFI Bluetooth USB
    $query=$query.@Connectivity_D_values[0].",".@Connectivity_D_values[1].",".@Connectivity_D_values[2].",".@Connectivity_D_values[3].",";
    #sim tipo
    $query=$query.@Other_values[0].",";
    #tipo capacidad en espera en conversacion;
    $query=$query.@Battery_values[0].",".@Battery_values[1].",".@Battery_values[2].",".@Battery_values[3];
    
    #print $query."\n";

if(index($nombre_equipo,"Apple")!=-1)
{

    #if(index(@Memory_values[2],"")==-1){
        #checa si esta en GB
    #    if(length(@Memory_values[2])==1)@Memory_values[2]=@Memory_values[2]*1024;
    #}
    
    @arr=split(/\//,@Memory_values[1]);
    my $long=@arr;
    for(my $n=0;$n<$long;$n++)
    {
        @Memory_values[1]=@arr[$n]*1024;

        #id serial NOT NULL,, nombre_telcel, nombre_movistar, nombre_iusacell, nombre_nextel, nucelos,
        my $titulos=" nombre, velocidad, tipo_procesador, pantalla_resolucion, pantalla_tamano, tipo_pantalla, memoria_interna, memoria_ram, memoria_tarjeta, bateria_conversacion, bateria_espera, bateria_capacidad, bateria_tipo, camara_trasera, camara_frontal, camara_video, bluetooth, gps, usb, wireless, \"2g\", \"3g\", \"4g\", os, version, ancho, alto, grosor, peso, slot_sim, tipo_sim, carac_extras, colores, imagen, marca";
        my $orden="'".$nombre_equipo." ".@arr[$n]."GB',".@CPU_values[1].",'".@CPU_values[0]."','".@Display_values[1]."',".@Display_values[2].",'".@Display_values[0]."',".@Memory_values[1].",".@Memory_values[2].",'".@Memory_values[0]."',".@Battery_values[3].",".@Battery_values[2].",".@Battery_values[1].",'".@Battery_values[0]."',".@Camera_values[0].",'".@Camera_values[1]."','".@Camera_values[2]."','".@Connectivity_D_values[2]."','".@Connectivity_D_values[0]."','".@Connectivity_D_values[3]."','".@Connectivity_D_values[1]."','".@General_values[0]."','".@General_values[1]."','".@General_values[2]."','".@Operation_Systems_values[0]."','".@Operation_Systems_values[1]."',".@size_weight_values[0].",".@size_weight_values[1].",".@size_weight_values[2].",".@size_weight_values[3].",NULL,'".@Other_values[0]."',NULL,'".@Casing[0]."','".$imagen."','".$marca_equipo."'";
        my $Lquery="Insert Into smartphones(".$titulos.")VALUES(".$orden.");";
        #print $Lquery."\n";

            open (my $wr, '>>','new.sql');
            #print $wr $Lquery;
            #print $wr "\n";

    }

}
else
{

    #id serial NOT NULL,, nombre_telcel, nombre_movistar, nombre_iusacell, nombre_nextel, nucelos,
my $titulos=" nombre, velocidad, tipo_procesador, pantalla_resolucion, pantalla_tamano, tipo_pantalla, memoria_interna, memoria_ram, memoria_tarjeta, bateria_conversacion, bateria_espera, bateria_capacidad, bateria_tipo, camara_trasera, camara_frontal, camara_video, bluetooth, gps, usb, wireless, \"2g\", \"3g\", \"4g\", os, version, ancho, alto, grosor, peso, slot_sim, tipo_sim, carac_extras, colores, imagen, marca";
#@Battery_values[0] =~ s/,//;

my $orden=$nombre_equipo.",sep".@CPU_values[1].",sep".@CPU_values[0].",sep".@Display_values[1].",sep".@Display_values[2].",sep".@Display_values[0].",sep".@Memory_values[1].",sep".@Memory_values[2].",sep".@Memory_values[0].",sep".@Battery_values[3].",sep".@Battery_values[2].",sep".@Battery_values[1].",sep".@Battery_values[0].",sep".@Camera_values[0].",sep".@Camera_values[1].",sep".@Camera_values[2].",sep".@Connectivity_D_values[2].",sep".@Connectivity_D_values[0].",sep".@Connectivity_D_values[3].",sep".@Connectivity_D_values[1].",sep".@General_values[0].",sep".@General_values[1].",sep".@General_values[2].",sep".@Operation_Systems_values[0].",sep".@Operation_Systems_values[1].",sep".@size_weight_values[0].",sep".@size_weight_values[1].",sep".@size_weight_values[2].",sep".@size_weight_values[3].",sep,sep".@Other_values[0].",sep,sep".@Casing[0].",sep".$imagen.",sep".$marca_equipo;

#print $titulos."\n";

print $orden;

#my $Lquery="Insert Into smartphones(".$titulos.")VALUES(".$orden.");";
#print $Lquery."\n";
    
    #open (my $wr,sep '>>,'new.sql');
    #print $wr $Lquery;
    #print $wr "\n";
    
    #my $line=@size_weight[$n].,'.@size_weight_values[$n];
#    print $wr "Insert Into smartphones(nombre".$Columns.",imagen,marca)VALUES('".$nombre_equipo."'".$Values.",'".$imagen."','".$marca_equipo."');";
    #print $wr $line;

}



    
    
       #close $wr;
    
    

}