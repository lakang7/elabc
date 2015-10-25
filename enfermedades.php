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
            if($_GET["clave"]=="0"){
                $complementaTitulo="Lista de Enfermedades | elabcnaturista";
            }else{
                if($tipoElemento=="sh"){
                    $sql_auxSISTEMA="select * from sistema where idsistema='".$idElemento."'";
                    $result_auxSISTEMA=mysql_query($sql_auxSISTEMA,$con) or die(mysql_error());                                            
                    $auxsistema = mysql_fetch_assoc($result_auxSISTEMA);
                    $complementaTitulo="Lista de Enfermedades del ".$auxsistema["mostrar"]." | elabcnaturista";
                }else if($tipoElemento=="oh"){
                    $sql_auxORGANO="select * from organo where idorgano='".$idElemento."'";
                    $result_auxORGANO=mysql_query($sql_auxORGANO,$con) or die(mysql_error());                                            
                    $auxorgano = mysql_fetch_assoc($result_auxORGANO);
                    $complementaTitulo="Lista de Enfermedades de ".$auxorgano["mostrar"]." | elabcnaturista";                    
                }                
            }
        ?>
        <meta charset="UTF-8">
        <title><?php echo $complementaTitulo; ?></title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $precede; ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69008521-1', 'auto');
  ga('send', 'pageview');

</script>  
    <?php header('Content-Type: text/html; charset=UTF-8'); ?>
    </head>
    <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>        
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="<?php echo $precede; ?>imagenes/logoelabcnaturista.png"></div>
                <!--<div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                -->
                <div class="col-md-9">
                    <div class="row">
                        <?php menu(); ?>                                              
                    </div>                                        
                </div>
            </div>
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-3">  
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px;">Sistemas del Cuerpo Humano</div>
                <?php
                    $sistemaMostrado="";
                    $nombreMostrado="";
                    $sql_listaSISTEMA="select * from sistema order by nombre";
                    $result_listaSISTEMA=mysql_query($sql_listaSISTEMA,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaSISTEMA)>0){
                        $cont=0;
                        while ($sistema = mysql_fetch_assoc($result_listaSISTEMA)) {
                            if($cont==0){
                                if($_GET["clave"]=="0"){
                                    $sistemaMostrado=$sistema["idsistema"]; 
                                }                                                             
                            }
                            $apunta=trim($precede)."lista-enfermedades/".str_replace(" ","-",trim($sistema["mostrar"]))."/sh".$sistema["idsistema"];                           
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$sistema["descripcion"]."'>".$sistema["mostrar"]."</div>";
                            $cont++;
                        }
                    }
                ?> 
                
                
                    <?php                                     
                        if($sistemaMostrado==""){
                            if($tipoElemento=="sh"){
                                $sistemaMostrado=$idElemento;
                            }else if($tipoElemento=="oh"){
                                $sql_listaauxorgano="select * from organo where idorgano='".$idElemento."'";
                                $result_listaauxorgano=mysql_query($sql_listaauxorgano,$con) or die(mysql_error());
                                $organoaux = mysql_fetch_assoc($result_listaauxorgano);
                                $sistemaMostrado=$organoaux["idsistema"];
                            }
                        }
                        
                        if($_GET["clave"]!="0"){
                        $sql_auxsis="select * from sistema where idsistema='".$sistemaMostrado."'";
                        $result_auxsis=mysql_query($sql_auxsis,$con) or die(mysql_error());
                        $auxsis=mysql_fetch_assoc($result_auxsis);                        
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-top: 20px;'>Organos del ".$auxsis["mostrar"]." </div>";
                        echo "<div id='submenu'>";

                        $sql_listaORGANOS="select * from organo where idsistema='".$sistemaMostrado."' order by nombre";
                        $result_listaORGANOS=mysql_query($sql_listaORGANOS,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaORGANOS)>0){
                            while ($organo = mysql_fetch_assoc($result_listaORGANOS)) {
                                $apunta=trim($precede)."lista-enfermedades/".str_replace(" ","-",trim($organo["nombre"]))."/oh".$organo["idorgano"];
                                echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$organo["descripcion"]."'>".$organo["nombre"]."</div>";
                            }
                        }
                        echo "</div>";
                        }
                    ?>                  
                                                                                
            </div>
            <div class="col-md-9">            
            <?php
                
            if($_GET["clave"]=="0"){
                $sql_listaENFERMEDAD="select * from planta order by nombrecomun";
                $result_listaENFERMEDAD=mysql_query($sql_listaENFERMEDAD,$con) or die(mysql_error());
                $numeroElmentos=mysql_num_rows($result_listaENFERMEDAD);                        
                echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 10px;'>Catálogo de Enfermedades <small>[".$numeroElmentos." Enfermedades]</small></div>";
            }else if($tipoElemento=="sh"){
                $sql_listaENFERMEDADES="select enfermedad.idenfermedad, enfermedad.nombrecomun, enfermedad.mostrar, enfermedad.descripcioncatalogo, organo.idorgano, sistema.idsistema from enfermedad,organo,sistema where enfermedad.idorgano = organo.idorgano and organo.idsistema = sistema.idsistema and sistema.idsistema='".$idElemento."'";
                $result_listaENFERMEDADES=mysql_query($sql_listaENFERMEDADES,$con) or die(mysql_error());                        
                $numeroElmentos=mysql_num_rows($result_listaENFERMEDADES);                        
                echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 10px;'>Catálogo de Enfermedades del ".$auxsistema["mostrar"]." <small>[".$numeroElmentos." Enfermedades]</small></div>";
            }else if($tipoElemento=="oh"){
                $sql_listaENFERMEDADES="select enfermedad.idenfermedad, enfermedad.nombrecomun, enfermedad.mostrar, enfermedad.descripcioncatalogo from enfermedad where idorgano='".$idElemento."' order by nombrecomun";
                $result_listaENFERMEDADES=mysql_query($sql_listaENFERMEDADES,$con) or die(mysql_error()); 
                $numeroElmentos=mysql_num_rows($result_listaENFERMEDADES);
                echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 10px;'>Catálogo de Enfermededades de  ".$auxorgano["mostrar"]." <small>[".$numeroElmentos." Enfermedades]</small></div>";
            } 
            
                    $url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
                    //echo $url."</br>";
                    
                ?>                 
                <div class="fb-like" data-href="<?php echo $url; ?>" data-layout="button_count" ></div>
                <div style="margin-left: 5px;" class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count"></div>
                <div style="margin-left: 5px; margin-right: 5px;" class="fb-send" data-href="<?php echo $url; ?>" ></div>                
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="elabcnaturista" data-lang="es">Twittear</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>                                                    
                <?php            
            
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
                    $sql_listaENFERMEDADES="select * from enfermedad where nombrecomun like '".$letras[$i]."%' order by nombrecomun";
                    $result_listaENFERMEDADES=mysql_query($sql_listaENFERMEDADES,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaENFERMEDADES)>0){
                        echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                        $cuentafila=0;
                        while ($fila = mysql_fetch_assoc($result_listaENFERMEDADES)) {
                            $apunta=trim($precede)."causas-sintomas-prevencion-diagnostico-tratamiento/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idenfermedad"];
                            if($cuentafila==0){
                                echo "<div class='col-md-12'>";
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";  
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                $cuentafila++;
                            }
                            else if($cuentafila==3){
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                echo "</div>";
                                $cuentafila=0;
                            }else{
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
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
            }else if($tipoElemento=="sh"){
                for($i=0;$i<count($letras);$i++){                                                
                    $sql_listaENFERMEDADES="select enfermedad.idenfermedad, enfermedad.nombrecomun, enfermedad.mostrar, enfermedad.descripcioncatalogo, enfermedad.imagencatalogo, organo.idorgano, sistema.idsistema from enfermedad,organo,sistema where enfermedad.idorgano = organo.idorgano and organo.idsistema = sistema.idsistema and sistema.idsistema='".$idElemento."' and enfermedad.nombrecomun like '".$letras[$i]."%'";
                    $result_listaENFERMEDADES=mysql_query($sql_listaENFERMEDADES,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaENFERMEDADES)>0){
                        echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                        $cuentafila=0;
                        while ($fila = mysql_fetch_assoc($result_listaENFERMEDADES)) {
                        $apunta=trim($precede)."causas-sintomas-prevencion-diagnostico-tratamiento/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idenfermedad"];                                
                            if($cuentafila==0){
                                echo "<div class='col-md-12'>";
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                $cuentafila++;
                            }
                            else if($cuentafila==3){
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                echo "</div>";
                                $cuentafila=0;
                            }else{
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
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
            }else if($tipoElemento=="oh"){
                for($i=0;$i<count($letras);$i++){                        
                    $sql_listaENFERMEDADES="select enfermedad.idenfermedad, enfermedad.nombrecomun, enfermedad.mostrar, enfermedad.descripcioncatalogo, enfermedad.imagencatalogo from enfermedad where idorgano='".$idElemento."' and nombrecomun like '".$letras[$i]."%' order by nombrecomun";
                    $result_listaENFERMEDADES=mysql_query($sql_listaENFERMEDADES,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaENFERMEDADES)>0){
                        echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                        $cuentafila=0;
                        while ($fila = mysql_fetch_assoc($result_listaENFERMEDADES)) {
                        $apunta=trim($precede)."causas-sintomas-prevencion-diagnostico-tratamiento/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idenfermedad"];                                
                            if($cuentafila==0){
                                echo "<div class='col-md-12'>";
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                $cuentafila++;
                            }
                            else if($cuentafila==3){
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                               
                                echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["nombrecomun"]."</div>";
                                echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                echo "</div>";
                                echo "</div>";
                                $cuentafila=0;
                            }else{
                                echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;'>";                                    
                                echo "<img class='img-responsive center-block' src='".$precede."imagenes/enfermedad/catalogo/".$fila["imagencatalogo"]."'>";                                                                
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