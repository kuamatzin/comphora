while(my $fn = shift @ARGV) {
    
    if(!open(INFILE, $fn)) {
        print STDERR "Cannot open $fn: $!\n";
        next;
    }
    
    my $en_table=0;
    my $tiene_datos=0;
    my $decide=0;#variable que cambiara entre 1 y 0 para insertar en arreglo de 18meses o 24meses
    my $name="";#variable con el nombre del telefono.
    my $decide2=0;


    my @mes12=();
    my @mes18=();
    my @mes24=();
    my @planes=();
    
    my $ronda=@ARGV;#variable que ayudara a solo escribir los nombres de los planes una vez.
    
    while(my $l = <INFILE>) {
        
        

        #<h1 class="H1-GENERAL">
        #<title>..:: Iusacell ::.. Huawei Y320</title>
         if(index($l,'<title>..:: Iusacell ::.. ')!=-1)
            {
                my $valor;
                my $inicio=index($l, '<title>..:: Iusacell ::.. ')+26;
                my $fin=index($l,"</title>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                #push(@mes18,$valor);
                $name=$valor;
                
            }
     
        if(index($l,'</table>')!=-1&&$en_table==1)
        {
            $en_table=0;
        }
        if(index($l,'<table border="0" cellpadding="0" cellspacing="0" class="precios_planes_equipos_2">')!=-1)
        {
            $en_table=1;
            $tiene_datos=1;
        }
        if($en_table==1)
        {
            
            my $val="";


            #12,18,24 meses
            if(index($l,'<td class="precio">')!=-1)
            {
                my $valor;
                my $inicio=index($l, '<td class="precio">')+19;
                my $fin=index($l,"</td>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                #push(@mes18,$valor);
                $val=$valor;
                $decide++;
            }
             if(index($l,"<span class='texto_rojo_V14'>")!=-1)
            {
                my $valor;
                my $inicio=index($l, "<span class='texto_rojo_V14'>")+29;
                my $fin=index($l,"</span>");
                $valor=substr($l,$inicio,$fin-$inicio);
               # $valor=~s/,//g;
               $val=$valor;
                
            }

            if($decide>0){
            #print "valor:".$val."  decide:".length($val)." \n";    
            }
            
            if($decide==1&&length($val)>0){
                push(@mes12,$val);
                #print "doce".$val."\n";
            }
            if($decide==2&&length($val)>0){
                push(@mes18,$val);
                #print "dieciocho".$val."\n";
            }
            if($decide==3&&length($val)>0){
                push(@mes24,$val);
                $decide=0;
               # print "veinticuatro".$val."\n";
            }

            
            
            
            
        }
        
        
    }
    
    
    
    
    
    
if($tiene_datos==1)
{

    
    #print $wr $nombre_equipo;
    #print $wr "\n";
    
    #my $line=@size_weight[$n].','.@size_weight_values[$n];
    #print $wr $line;
    #my $planes1=",DILO FACIL,DILO PRACTICO,DILO AUDAZ,DILO SEGURO,DILO FUERTE,DILO SIEMPRE,DILO TODO \n";
    my $n=0;
    my $long=@mes12;#length del arreglo
    my $doce_meses=$name;
  
    for($n=0;$n<$long;$n++)
        {
            $doce_meses=$doce_meses.",".@mes12[$n];
        }

    $long=@mes18;#length del arreglo
    my $dieciocho_meses=$name;
    
    for($n=0;$n<$long;$n++)
        {
            $dieciocho_meses=$dieciocho_meses.",".@mes18[$n];
        }

   $long=@mes24;#length del arreglo
    my $veinticuatro_meses=$name;
    
    for($n=0;$n<$long;$n++)
        {
            $veinticuatro_meses=$veinticuatro_meses.",".@mes24[$n];
        }

    # no controlados
    open (my $wr, '>>','equipos_iusa12.csv');
    open (my $wr1, '>>','equipos_iusa18.csv');
    open (my $wr2, '>>','equipos_iusa24.csv');

    #12meses
    print $wr "\n";
    print $wr $doce_meses;
    
    #18meses
    print $wr1 "\n";
    print $wr1 $dieciocho_meses;

    #24meses
    print $wr2 "\n";
    print $wr2 $veinticuatro_meses;
    
    close $wr;
    close $wr1;
    close $wr2;


    # no controlados
    open (my $wr, '>>','equipos_iusa12_controlado.csv');
    open (my $wr1, '>>','equipos_iusa18_controlado.csv');
    open (my $wr2, '>>','equipos_iusa24_controlado.csv');

    #12meses
    print $wr "\n";
    print $wr $doce_meses;
    
    #18meses
    print $wr1 "\n";
    print $wr1 $dieciocho_meses;

    #24meses
    print $wr2 "\n";
    print $wr2 $veinticuatro_meses;
    
    close $wr;
    close $wr1;
    close $wr2;


    
    }

}