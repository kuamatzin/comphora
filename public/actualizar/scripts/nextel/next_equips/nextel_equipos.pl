while(my $fn = shift @ARGV) {
    
    if(!open(INFILE, $fn)) {
        print STDERR "Cannot open $fn: $!\n";
        next;
    }
    
    my $en_table=0;
    my $decide=0;#variable que cambiara entre 1 y 0 para insertar en arreglo de 18meses o 24meses
    my $name="";#variable con el nombre del telefono.
    
    my @mes24;
    my @mes18;
    my @planes;
    
    print "\nfn:".$fn;
    
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
            #planes
            if(index($l,"<td class=\"titulo_tablas_verdeclarodos\"><b>")!=-1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodos\"><b>")+43;
                my $fin=index($l,"</b>");
                $valor=substr($l,$inicio,$fin-$inicio);
                push(@planes,$valor);
            }
            #18 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")!=-1&&$decide==0)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                push(@mes18,$valor);
                $decide=1;
            }
            
            #24 meses
            if(index($l,"<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")!=-1&&$decide==1)
            {
                my $valor;
                my $inicio=index($l, "<td class=\"titulo_tablas_verdeclarodosMiddle\"><center>")+54;
                my $fin=index($l,"</center>");
                $valor=substr($l,$inicio,$fin-$inicio);
                push(@mes24,$valor);
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
    my $n=0;
    my $long=@planes;#length del arreglo
    my $primero=$name;#24 meses
    my $planes_primero="";
    my $segundo=$name;#18 meses
    my $planes_segundo="";
    for($n=0;$n<$long;$n++)
    {
        $planes_primero=$planes_primero.",".@planes[$n];
        $primero=$primero.",".@mes24[$n];
    }
    for($n=0;$n<$long;$n++)
    {
        $planes_segundo=$planes_segundo.",".@planes[$n];
        $segundo=$segundo.",".@mes18[$n];
    }
    
    print $wr $planes_primero;
    print $wr "\n";
    print $wr $primero;
    
    #18meses
    print $wr2 $planes_segundo;
    print $wr2 "\n";
    print $wr2 $segundo;
    
    
    
        close $wr;
     close $wr2;
    

}