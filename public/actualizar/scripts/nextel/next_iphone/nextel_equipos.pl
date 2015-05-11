while(my $fn = shift @ARGV) {
    
    if(!open(INFILE, $fn)) {
        print STDERR "Cannot open $fn: $!\n";
        next;
    }
    
    my $en_table=0;
    my $decide=-1;#variable que cambiara entre 1 y 0 para insertar en arreglo de 18meses o 24meses y -1 para la cantidad de gb del iphone.
    my $name="";#variable con el nombre del telefono.
    my $decide_pasado=-1;# checa si $decide acaba de cambiar.

    my @mes24=();
    my @mes18=();
    my @GBs=();
    my @planes=();
    
    # print "\nfn:".$fn;
    
    while(my $l = <INFILE>) {
        
        
        #<h1 class="H1-GENERAL">
        if(index($l,"<h1 class=\"H1-GENERAL\">")!=-1)
        {
            my $inicio=index($l, "<h1 class=\"H1-GENERAL\">")+23;
            my $fin=index($l,"</h1>");
            $name=substr($l,$inicio,$fin-$inicio);
        }
        
     
        if(index($l,"<table border=\"0\" cellspacing=\"0\" width=\"550\" align=\"center\">")!=-1)
        {
            $en_table=1;
        }
        if($en_table==1)
        {

            $decide_pasado=$decide;
            #print "decide:$decide"."\n";

            #planes
            if(index($l,"<td class=\"titulo_tablas_verdeclarodos\" rowspan=\"3\"><b>")!=-1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodos\" rowspan=\"3\"><b>")+55;
                my $fin=index($l,"</b>");
                $valor=substr($l,$inicio,$fin-$inicio);
                push(@planes,$valor);
            }
            #planes
            if(index($l,"<td class=\"titulo_tablas_verdeclarouno\" rowspan=\"3\"><b>")!=-1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarouno\" rowspan=\"3\"><b>")+55;
                my $fin=index($l,"</b>");
                $valor=substr($l,$inicio,$fin-$inicio);
                push(@planes,$valor);
            }
            #24 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")!=-1&&$decide==1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                push(@mes24,$valor);
                $decide=-1;
            }

            #18 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")!=-1&&$decide==0)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                push(@mes18,$valor);
                $decide=1;
            }
            
            
            #GBs
            if(index($l,"<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")!=-1&&$decide==-1&&$decide==$decide_pasado)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                $valor=$name." ".$valor;
                #print $valor."\n";
                push(@GBs,$valor);
                $decide=0;
                #print "decide_:$decide"."\n";
            }

            

            #24 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")!=-1&&$decide==1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                push(@mes24,$valor);
                $decide=-1;
            }

            #18 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")!=-1&&$decide==0)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                push(@mes18,$valor);
                $decide=1;
            }

            #GBs
            if(index($l,"<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")!=-1&&$decide==-1&&$decide==$decide_pasado)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarounoMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                $valor=~s/,//g;
                $valor=$name." ".$valor;
                #print $valor."\n";
                push(@GBs,$valor);
                $decide=0;
            }

            
            
        }
        
        
    }
    
    
    
    
    
    
    
    open (my $wr2, '>>','equipos_next18.csv');
    open (my $wr, '>>','equipos_next24.csv');
    #print $wr $nombre_equipo;
    #print $wr "\n";
    
    #my $line=@size_weight[$n].','.@size_weight_values[$n];
    #print $wr $line;
    my $m=0;
    my $long=@planes;#length del arreglo
    my $equipos=@GBs;#length de cuantos tipos de iphone
    my $primero=@GBs[0];#$name;#24 meses
    my $primero2=@GBs[1];#$name;#24 meses
     my $primero3=@GBs[2];#$name;#24 meses
    my $planes_primero="";
    my $segundo=$name;#18 meses
    my $planes_segundo="";


    for($m=0;$m<$long;$m++)
    {
        #for(my $m=0;$m<3;$m++)
        #{
            $planes_primero=$planes_primero.",".@planes[$m];


            $primero=$primero.",".@mes24[$m*3];
            $primero2=$primero2.",".@mes24[($m*3)+1];
            $primero3=$primero3.",".@mes24[($m*3)+2];
            
            #print @planes[$n]."\n";
            #print @GBs[$m]." | ".@mes24[($n*3)+$m]."\n";

        #}
        #$planes_primero="";
        #$primero="";
        #print "----------------------\n";
        #$primero=$primero."\n";
        #$planes_primero=$planes_primero."\n";

    }
    #24 meses
            print $wr $planes_primero."\n";
            print $wr $primero."\n";
            print $wr $primero2."\n";
            print $wr $primero3."\n";

$planes_primero="";
 $primero=@GBs[0];#$name;#24 meses
 $primero2=@GBs[1];#$name;#24 meses
 $primero3=@GBs[2];#$name;#24 meses

    for($m=0;$m<$long;$m++)
    {
        
         $planes_primero=$planes_primero.",".@planes[$m];
            $primero=$primero.",".@mes18[$m*3];
            $primero2=$primero2.",".@mes18[($m*3)+1];
            $primero3=$primero3.",".@mes18[($m*3)+2];
    }
    
    
    #18meses
            print $wr2 $planes_primero."\n";
            print $wr2 $primero."\n";
            print $wr2 $primero2."\n";
            print $wr2 $primero3."\n";
    
    
    
        close $wr;
     close $wr2;
    

}