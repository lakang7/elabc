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
            $sql_listaENFERMEDAD="select * from enfermedad where idenfermedad='".$_GET["clave"]."'";
            $result_listaENFERMEDAD=mysql_query($sql_listaENFERMEDAD,$con) or die(mysql_error());
            if(mysql_num_rows($result_listaENFERMEDAD)>0){
                $enfermedad = mysql_fetch_assoc($result_listaENFERMEDAD);
            }            
            
        ?>
        <meta charset="UTF-8">
        <title><?php echo $enfermedad["mostrar"]; ?> Causas, síntomas, prevención, diagnostico y tratamiento | elabcnaturista</title>    
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
            <div class="col-md-5">  
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; font-weight: bold"><?php echo $enfermedad["nombrecomun"]; ?></div>
                <div class="col-md-12 subtitulo_principal" style="font-size: 18px; font-weight: bold"><?php echo $enfermedad["nombrecientifico"]; ?></div>                
                <img style="margin-bottom: 10px;" class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/enfermedad/perfil/<?php echo $enfermedad["imagenperfil"] ?>">                                
                
                <div class="fb-like" data-href="<?php echo trim($precede); ?>causas-sintomas-prevencion-diagnostico-tratamiento/<?php echo str_replace(" ","-",trim($enfermedad["mostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-layout="button_count" ></div>
                <div style="margin-left: 5px;" class="fb-share-button" data-href="<?php echo trim($precede); ?>causas-sintomas-prevencion-diagnostico-tratamiento/<?php echo str_replace(" ","-",trim($enfermedad["mostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-layout="button_count"></div>
                <div style="margin-left: 5px; margin-right: 5px;" class="fb-send" data-href="<?php echo trim($precede); ?>causas-sintomas-prevencion-diagnostico-tratamiento/<?php echo str_replace(" ","-",trim($enfermedad["mostrar"])) ?>/<?php echo $_GET["clave"]; ?>" ></div>                
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="elabcnaturista" data-lang="es">Twittear</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                
                <p><?php echo $enfermedad["descripcionperfil"]; ?></p>                                 
                <?php 
                $listaClasificacion=explode("|",$enfermedad["tiposde"]);
                if($enfermedad["tiposde"]!=""){
                ?>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/enfermedad.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Clasificación</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               
                               for($i=0;$i<count($listaClasificacion);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaClasificacion[$i]."</div>";
                               }                            
                            ?>                                                                                    
                        </div>
                    </div> 
                </div>  
                
                <?php
                }
                ?>
                
                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/causas.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Causas</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               $listaCausas=explode("|",$enfermedad["causas"]);
                               for($i=0;$i<count($listaCausas);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaCausas[$i]."</div>";
                               }                            
                            ?>                                                                                    
                        </div>
                    </div> 
                </div>                                
                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/sintomas.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Sintomas</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               $listaSintomas=explode("|",$enfermedad["sintomas"]);
                               for($i=0;$i<count($listaSintomas);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaSintomas[$i]."</div>";
                               }                            
                            ?>                                                                                                                 
                        </div>
                    </div> 
                </div>
                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/prevencion.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Prevencion</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               $listaPrevenciones=explode("|",$enfermedad["prevencion"]);
                               for($i=0;$i<count($listaPrevenciones);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaPrevenciones[$i]."</div>";
                               }                            
                            ?>                                                         
                        </div>
                    </div> 
                </div>                 
                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/diagnostico.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Diagnostico</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               $listaDiagnostico=explode("|",$enfermedad["diagnostico"]);
                               for($i=0;$i<count($listaDiagnostico);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaDiagnostico[$i]."</div>";
                               }                            
                            ?>                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/tratamiento.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Tratamiento Ortodoxo</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               $listaOrtodoxo=explode("|",$enfermedad["ortodoxo"]);
                               for($i=0;$i<count($listaOrtodoxo);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaOrtodoxo[$i]."</div>";
                               }                            
                            ?>                            
                        </div>
                    </div>
                </div>   
                
                <?php
                    $listaComplicaciones=explode("|",$enfermedad["evitecomplicaciones"]);
                    if($enfermedad["evitecomplicaciones"]!=""){
                ?>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/precaucion.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 16px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Evite Complicaciones</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 16px; color: #000">
                            <?php
                               
                               for($i=0;$i<count($listaComplicaciones);$i++){
                                   echo "<div style='font-weight: normal; text-align: justify; margin-bottom: 5px;'>".$listaComplicaciones[$i]."</div>";
                               }                            
                            ?>                            
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
            <div class="col-md-7" style="">
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; font-weight: bold">Plantas Medicinales para <?php echo $enfermedad["mostrar"] ?></div>
                <?php
                $sqlaux01 = "select planta.idplanta as idplanta, planta.nombrecomun as planta, metodo.nombre as metodo, metodo.idmetodo as idmetodo, enfermedad.nombrecomun as enfermedad from planta, metodo, enfermedad, asociacion, asociacion_enf where asociacion.idasociacion = asociacion_enf.idasociacion and planta.idplanta = asociacion.idplanta and metodo.idmetodo = asociacion.idmetodo and enfermedad.idenfermedad = asociacion_enf.idenfermedad and enfermedad.idenfermedad='".$_GET["clave"]."' order by planta.nombrecomun, metodo.nombre, enfermedad.nombrecomun";
                $resultaux01 = mysql_query($sqlaux01,$con) or die(mysql_error());
                $listaPlantas = array();
                if(mysql_num_rows($resultaux01)>0){
                    while($aux01 = mysql_fetch_assoc($resultaux01)){
                        $band=0;
                        for($i=0;$i<count($listaPlantas);$i++){
                            if($aux01["planta"]==$listaPlantas[$i]){
                                $band=1;   
                            }
                        }
                        if($band==0){
                            $listaPlantas[count($listaPlantas)]=$aux01["planta"];
                        }
                    }
                }
                
                for($i=0;$i<count($listaPlantas);$i++){
                    //echo $listaPlantas[$i]."</br>";
                    
                    $sqlPlanta="select * from planta where nombrecomun='".$listaPlantas[$i]."'";
                    $resultPlanta = mysql_query($sqlPlanta,$con) or die(mysql_error());
                    $planta=mysql_fetch_assoc($resultPlanta);
                    echo "<div class='col-md-12 planta_titpre'>".$listaPlantas[$i]."</div>";
                    echo "<div class='col-md-12 plata_preparacion'>".$planta["descripcionperfil"]."</div>";
                    echo "<div class='col-md-1' style='padding: 0px;'><img src='".$precede."imagenes/preparacion.png' class='img-responsive center-block' ></div>";
                    echo "<div class='col-md-11' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; font-size: 17px; font-weight: bold; border-bottom: 1px solid #CCCCCC\">Metodo de preparación</div>";
                    
                    $resultaux01 = mysql_query($sqlaux01,$con) or die(mysql_error());
                    while($aux01 = mysql_fetch_assoc($resultaux01)){
                        if($listaPlantas[$i]==$aux01["planta"]){ 
                           $sqlDes="select planta.idplanta as idplanta, planta.nombrecomun as planta, metodo.idmetodo as idmetodo ,metodo.nombre as metodo, enfermedad.nombrecomun as enfermedad, asociacion_enf.descripcion as descripcion from planta, metodo, enfermedad, asociacion, asociacion_enf where asociacion.idasociacion = asociacion_enf.idasociacion and planta.idplanta = asociacion.idplanta and metodo.idmetodo = asociacion.idmetodo and enfermedad.idenfermedad = asociacion_enf.idenfermedad and asociacion_enf.idenfermedad ='".$_GET["clave"]."' and planta.idplanta='".$planta["idplanta"]."' and metodo.idmetodo='".$aux01["idmetodo"]."' order by planta.nombrecomun, metodo.nombre, enfermedad.nombrecomun";
                           $resultDes = mysql_query($sqlDes,$con) or die(mysql_error());
                           $aux02 = mysql_fetch_assoc($resultDes);
                           echo "<div class='col-md-1' style='padding: 0px;'></div>";
                           echo "<div class='col-md-11' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; font-size: 17px;\">";
                           echo "<b>".$aux01["metodo"]."</b> ".$aux02["descripcion"];
                           echo "</div>";
                        }
                    }
                    
                }
                
                ?>
                
                <div class="fb-comments" data-href="<?php echo trim($precede); ?>causas-sintomas-prevencion-diagnostico-tratamiento/<?php echo str_replace(" ","-",trim($enfermedad["mostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-numposts="5" width="100%"></div>                
                                                                                      
            </div>
        </div>
        <?php piepagina(); ?>    
        </div>
    </body>
        <?php
            if (!isset($_SESSION['enfermedad'][$_GET["clave"]])) { 
                $_SESSION['enfermedad'][$_GET["clave"]]=1;
                $visitasActuales=$enfermedad["numerolecturas"];
                $visitasActuales++;
                $sqlCuenta="update enfermedad set numerolecturas='".$visitasActuales."' where idenfermedad='".$_GET["clave"]."'";
                $resultCuenta=mysql_query($sqlCuenta,$con) or die(mysql_error());
            }              
        ?>    
        <?php mysql_close($con); ?>
</html>