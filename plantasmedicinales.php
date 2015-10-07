<html>
    <head>
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>        
        <?php  
            require_once("recursos/funciones.php"); 
            $fp = fopen("recursos/precede.txt", "r");
            $precede = fgets($fp);
            $atributos= fgets($fp);
            $conecta=explode("|",$atributos);
            $con = mysql_connect($conecta[0],$conecta[1],$conecta[2]);
            mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);
            mysql_select_db($conecta[3], $con);
            
            $tipoElemento="";
            $idElemento="";
            for($i=0;$i<strlen($_GET["clave"]);$i++){
                if($i<2){
                    $tipoElemento=$tipoElemento.$_GET["clave"][$i];
                }else{
                    $idElemento=$idElemento.$_GET["clave"][$i];
                }
            } 
            
            $complementaTitulo="";
            if($tipoElemento=="pf"){
                $sql_listaPROFAR="select * from profarmacologica where idprofarmacologica='".$idElemento."'";
                $result_listaPROFAR=mysql_query($sql_listaPROFAR,$con) or die(mysql_error());
                if(mysql_num_rows($result_listaPROFAR)>0){
                   $fila = mysql_fetch_assoc($result_listaPROFAR);
                   $complementaTitulo=$fila["mostrar"];
                }                
            }else if($tipoElemento=="cq"){
                $sql_listaPROFAR="select * from comquimica where idcomquimica='".$idElemento."'";
                $result_listaPROFAR=mysql_query($sql_listaPROFAR,$con) or die(mysql_error());
                if(mysql_num_rows($result_listaPROFAR)>0){
                   $fila = mysql_fetch_assoc($result_listaPROFAR);
                   $complementaTitulo=" que Contienen ".$fila["nombre"];
                }                  
            }
        ?>
        <meta charset="UTF-8">
        <title>Plantas Medicinales <?php echo $complementaTitulo ?> | elabcnaturista</title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $precede; ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
                        
    </head>
    <body>        
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="<?php echo $precede; ?>imagenes/logoelabcnaturista.png"></div>
                <div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                
                <div class="col-md-9">
                    <div class="row">
                       <?php menu(); ?>                                              
                    </div>                                        
                </div>
            </div>
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-3" style="margin-bottom: 30px;">  
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px;">Propiedades Farmacologicas</div>
                <?php
                    $sql_listaPROFAR="select * from profarmacologica order by nombre";
                    $result_listaPROFAR=mysql_query($sql_listaPROFAR,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaPROFAR)>0){
                        while ($fila = mysql_fetch_assoc($result_listaPROFAR)) {
                            $apunta=trim($precede)."plantas-medicinales/".$fila["mostrar"]."/pf".$fila["idprofarmacologica"];                           
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$fila["descripcion"]."'>".$fila["mostrar"]."</div>";
                        }
                    }
                ?>                
                
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; margin-top: 15px;">Composicion Quimica</div>
                <?php
                    $sql_listaCOMQUI="select * from comquimica order by nombre";
                    $result_listaCOMQUI=mysql_query($sql_listaCOMQUI,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaCOMQUI)>0){
                        while ($fila = mysql_fetch_assoc($result_listaCOMQUI)) {
                            $apunta=trim($precede)."plantas-medicinales/que-contienen-".str_replace(" ","-",trim($fila["nombre"]))."/cq".$fila["idcomquimica"];
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$fila["descripcion"]."'>".$fila["nombre"]."</div>";
                        }
                    }                     
                ?>               
            </div>
            <div class="col-md-9" > 
                <?php
                    if($_GET["clave"]=="0"){
                        $sql_listaPLANTA="select * from planta order by nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
                        $numeroElmentos=mysql_num_rows($result_listaPLANTA);                        
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 20px;'>Catálogo de Plantas Medicinales ".$complementaTitulo." <small>[".$numeroElmentos." Plantas]</small></div>";
                    }else if($tipoElemento=="pf"){
                        $sql_listaPLANTA="select planta.idplanta, planta.imagencatalogo, planta.nombrecomun, planta.nombremostrar, planta.descripcioncatalogo from planta, planta_profarmacologica where planta.idplanta = planta_profarmacologica.idplanta and planta_profarmacologica.idprofarmacologica = ".$idElemento." order by planta.nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());                        
                        $numeroElmentos=mysql_num_rows($result_listaPLANTA);                        
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 20px;'>Catálogo de Plantas Medicinales ".$complementaTitulo." <small>[".$numeroElmentos." Plantas]</small></div>";
                    }else if($tipoElemento=="cq"){
                        $sql_listaPLANTA="select planta.idplanta, planta.imagencatalogo, planta.nombrecomun, planta.nombremostrar, planta.descripcioncatalogo from planta, planta_comquimica where planta.idplanta = planta_comquimica.idplanta and planta_comquimica.idcomquimica = ".$idElemento." order by planta.nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error()); 
                        $numeroElmentos=mysql_num_rows($result_listaPLANTA);
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 20px;'>Catálogo de Plantas Medicinales  ".$complementaTitulo." <small>[".$numeroElmentos." Plantas]</small></div>";
                    } 
                
                $letras=array();
                $letras[0]="a"; $letras[11]="l";
                $letras[1]="b"; $letras[12]="m";
                $letras[2]="c"; $letras[13]="n";
                $letras[3]="d"; $letras[14]="o";
                $letras[4]="e"; $letras[15]="p";
                $letras[5]="f"; $letras[16]="q";
                $letras[6]="g"; $letras[17]="r";
                $letras[7]="h"; $letras[18]="s";
                $letras[8]="i"; $letras[19]="t";
                $letras[9]="j"; $letras[20]="u";
                $letras[10]="k";$letras[21]="v";
                $letras[22]="y";$letras[23]="z";                
                
                if($_GET["clave"]=="0"){                                       
                    for($i=0;$i<count($letras);$i++){
                        $sql_listaPLANTA="select * from planta where nombrecomun like '".$letras[$i]."%' order by nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaPLANTA)>0){
                            echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                            $cuentafila=0;
                            while ($fila = mysql_fetch_assoc($result_listaPLANTA)) {
                                $apunta=trim($precede)."propiedades-terapeuticas-y-medicinales/".str_replace(" ","-",trim($fila["nombremostrar"]))."/".$fila["idplanta"];
                                if($cuentafila==0){
                                    echo "<div class='col-md-12'>";
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    $cuentafila++;
                                }
                                else if($cuentafila==3){
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    $cuentafila=0;
                                }else{
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";                                    
                                    $cuentafila++;
                                }
                            }
                            if($cuentafila!=4 && $cuentafila!=0){
                                echo "</div>";
                            }
                        }                                                
                    }                                                                                
                }else if($tipoElemento=="pf"){
                    for($i=0;$i<count($letras);$i++){                        
                        $sql_listaPLANTA="select planta.idplanta, planta.imagencatalogo, planta.nombrecomun, planta.nombremostrar, planta.descripcioncatalogo from planta, planta_profarmacologica where planta.nombrecomun like '".$letras[$i]."%' and planta.idplanta = planta_profarmacologica.idplanta and planta_profarmacologica.idprofarmacologica = ".$idElemento." order by planta.nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaPLANTA)>0){
                            echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                            $cuentafila=0;
                            while ($fila = mysql_fetch_assoc($result_listaPLANTA)) {
                                //echo "Cuenta vale: ".$cuentafila."</br>";
                            $apunta=trim($precede)."propiedades-terapeuticas-y-medicinales/".str_replace(" ","-",trim($fila["nombremostrar"]))."/".$fila["idplanta"];                                
                                if($cuentafila==0){
                                    echo "<div class='col-md-12'>";
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    $cuentafila++;
                                }
                                else if($cuentafila==3){
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    $cuentafila=0;
                                }else{
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";                                    
                                    $cuentafila++;
                                }
                            }
                            //echo "Cuenta quedo en: ".$cuentafila."</br>";
                            if($cuentafila!=4 && $cuentafila!=0){
                               // echo "Entra en cierre de fila</br>";
                                echo "</div>";
                            }
                        }                                                
                    }                                                                                 
                }else if($tipoElemento=="cq"){
                    for($i=0;$i<count($letras);$i++){                        
                        $sql_listaPLANTA="select planta.idplanta, planta.imagencatalogo, planta.nombrecomun, planta.nombremostrar, planta.descripcioncatalogo from planta, planta_comquimica where planta.nombrecomun like '".$letras[$i]."%' and planta.idplanta = planta_comquimica.idplanta and planta_comquimica.idcomquimica = ".$idElemento." order by planta.nombrecomun";
                        $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaPLANTA)>0){
                            echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                            $cuentafila=0;
                            while ($fila = mysql_fetch_assoc($result_listaPLANTA)) {
                                $apunta=trim($precede)."propiedades-terapeuticas-y-medicinales/".str_replace(" ","-",trim($fila["nombremostrar"]))."/".$fila["idplanta"];
                                if($cuentafila==0){
                                    echo "<div class='col-md-12'>";
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' class='planta'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    $cuentafila++;
                                }
                                else if($cuentafila==3){
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    $cuentafila=0;
                                }else{
                                    echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";
                                    echo "<img class='img-responsive center-block' src='".$precede."imagenes/plantas/catalogo/".$fila["imagencatalogo"]."'>";
                                    echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                    echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                    echo "</div>";                                    
                                    $cuentafila++;
                                }
                            }
                            if($cuentafila!=4 && $cuentafila!=0){
                                echo "</div>";
                            }
                        }                                                
                    }                    
                    
                }
                        
                    
                    
                ?>                
                                                      

            </div>
        </div>
        <?php piepagina(); ?>
        </div>
    </body>
    <?php mysql_close($con); ?>
</html>
