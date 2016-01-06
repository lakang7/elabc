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
            $titulopagina="";
            if($_GET["clave"]=="0"){            
                $titulopagina="Catálogo de Métodos de preparación de las plantas medicinales | elabcnaturista ";                
            }  else {
                $sql_listaClAMET="select * from catmetodo where idcatmetodo='".$_GET["clave"]."'";
                $result_listaClAMET=mysql_query($sql_listaClAMET,$con) or die(mysql_error());   
                $clasifica = mysql_fetch_assoc($result_listaClAMET); 
                
                $titulopagina="Catálogo Métodos de preparación ".$clasifica["nombre"]." de las plantas medicinales | elabcnaturista ";
            }
        ?>
        <meta charset="UTF-8">
        <title><?php echo $titulopagina; ?></title>    
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
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px;">Clasificación</div>                
                <?php
                    $sql_listacatterapia="select * from catmetodo order by nombre";
                    $result_listacatterapia=mysql_query($sql_listacatterapia,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listacatterapia)>0){
                        while ($fila = mysql_fetch_assoc($result_listacatterapia)) {
                            $apunta=trim($precede)."metodos-preparacion-plantas-medicinales/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idcatmetodo"];                           
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$fila["descripcion"]."'>".$fila["mostrar"]."</div>";
                        }
                    }
                ?>                                               
            </div>
            <div class="col-md-9" style="padding: 0px;"> 
                <?php
                
                    if($_GET["clave"]=="0"){
                        $sql_listaMETODO="select * from metodopre order by titulo";
                        $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                        $numeroElmentos=mysql_num_rows($result_listaMETODO);                      
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 10px;'>Catálogo de Métodos de preparación de las plantas medicinales <small>[".$numeroElmentos." Métodos]</small></div>";
                    }else{
                        $sql_listaMETODO="select * from metodopre where idcatmetodo='".$_GET["clave"]."' order by titulo";
                        $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                        $numeroElmentos=mysql_num_rows($result_listaMETODO);
                        $sql_listaClAMET="select * from catmetodo where idcatmetodo='".$_GET["clave"]."'";
                        $result_listaClAMET=mysql_query($sql_listaClAMET,$con) or die(mysql_error());   
                        $clasifica = mysql_fetch_assoc($result_listaClAMET);
                        echo "<div class='col-md-12 subtitulo_principal' style='border-bottom: 1px solid #CCCCCC; margin-bottom: 10px;'>Catálogo Métodos de preparación ".$clasifica["nombre"]." de las plantas medicinales  <small>[".$numeroElmentos." Métodos]</small></div>";                        
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
                            $sql_listaMETODO="select * from metodopre where titulo like '".$letras[$i]."%' order by titulo";
                            $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                            if(mysql_num_rows($result_listaMETODO)>0){
                                echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                                $cuentafila=0;
                                while ($fila = mysql_fetch_assoc($result_listaMETODO)) {
                                    $apunta=trim($precede)."metodo-de-preparacion/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idmetodopre"];
                                    if($cuentafila==0){
                                        echo "<div class='col-md-12'>";
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
                                        echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                        echo "</div>";
                                        $cuentafila++;
                                    }
                                    else if($cuentafila==3){
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
                                        echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        $cuentafila=0;
                                    }else{
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
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
                    }else{
                        for($i=0;$i<count($letras);$i++){
                            $sql_listaMETODO="select * from metodopre where titulo like '".$letras[$i]."%' and idcatmetodo='".$_GET["clave"]."' order by titulo";
                            $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                            if(mysql_num_rows($result_listaMETODO)>0){
                                echo "<div class='col-md-12 letra'>".strtoupper($letras[$i])."</div>";
                                $cuentafila=0;
                                while ($fila = mysql_fetch_assoc($result_listaMETODO)) {
                                    $apunta=trim($precede)."metodo-de-preparacion/".str_replace(" ","-",trim($fila["mostrar"]))."/".$fila["idmetodopre"];
                                    if($cuentafila==0){
                                        echo "<div class='col-md-12'>";
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
                                        echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                        echo "</div>";
                                        $cuentafila++;
                                    }
                                    else if($cuentafila==3){
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
                                        echo "<div class='top4_resumen'>".$fila["descripcioncatalogo"]."</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        $cuentafila=0;
                                    }else{
                                        echo "<div class='col-md-3 planta' onclick=redirigir('".$apunta."') style='padding: 5px;' >";
                                        echo "<img class='img-responsive center-block' src='".$precede."imagenes/metodos/catalogo/".$fila["imagencatalogo"]."'>";
                                        echo "<div class='top4_titulo' style='margin-top: 7px; margin-bottom:5px;'>".$fila["titulo"]."</div>";
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
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.carousel-example-generic').carousel();
        });                        
    </script>            
    </body>
    <?php mysql_close($con); ?>
</html>
