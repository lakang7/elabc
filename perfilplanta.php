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
            $sql_listaPLANTA="select * from planta where idplanta='".$_GET["clave"]."'";
            $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
            if(mysql_num_rows($result_listaPLANTA)>0){
                $planta = mysql_fetch_assoc($result_listaPLANTA);
            }
            
            $sql_FAMBOT="select * from fambotanica where idfambotanica='".$planta["idfambotanica"]."'";
            $result_FAMBOT=mysql_query($sql_FAMBOT,$con) or die(mysql_error());
            if(mysql_num_rows($result_FAMBOT)>0){
                $familiabotanica = mysql_fetch_assoc($result_FAMBOT);
            }
            
            $sql_PARUTI="select parplanta.nombre, parplanta.descripcion from planta_parplanta, parplanta where planta_parplanta.idplanta='".$_GET["clave"]."' and parplanta.idparplanta = planta_parplanta.idparplanta ";
            $result_PARUTI=mysql_query($sql_PARUTI,$con) or die(mysql_error());
            
            $sql_CMQUTI="select comquimica.nombre, comquimica.descripcion from planta_comquimica, comquimica where planta_comquimica.idplanta='".$_GET["clave"]."' and comquimica.idcomquimica = planta_comquimica.idcomquimica order by comquimica.nombre ";
            $result_CMQUTI=mysql_query($sql_CMQUTI,$con) or die(mysql_error());     
            
            $sql_PFAUTI="select profarmacologica.nombre, profarmacologica.descripcion from planta_profarmacologica, profarmacologica where planta_profarmacologica.idplanta='".$_GET["clave"]."' and profarmacologica.idprofarmacologica = planta_profarmacologica.idprofarmacologica order by profarmacologica.nombre ";
            $result_PFAUTI=mysql_query($sql_PFAUTI,$con) or die(mysql_error());            
           
            
        ?>
        <meta charset="UTF-8">
        <title>Propiedades Terapeúticas y Medicinales de <?php echo $planta["nombremostrar"]; ?> | elabcnaturista</title>    
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
            <div class="col-md-5">  
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; font-weight: bold"><?php echo $planta["nombremostrar"] ?></div>
                <div class="col-md-12 subtitulo_principal" style="font-size: 18px;"><?php echo $planta["nombrecientifico"] ?></div>
                <img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/plantas/perfil/<?php echo $planta["imagenperfil"] ?>">                
               
                <div class="fb-like" data-href="<?php echo trim($precede); ?>propiedades-terapeuticas-y-medicinales/<?php echo str_replace(" ","-",trim($planta["nombremostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-layout="button_count" ></div>
                <div style="margin-left: 5px;" class="fb-share-button" data-href="<?php echo trim($precede); ?>propiedades-terapeuticas-y-medicinales/<?php echo str_replace(" ","-",trim($planta["nombremostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-layout="button_count"></div>
                <div style="margin-left: 5px; margin-right: 5px;" class="fb-send" data-href="<?php echo trim($precede); ?>propiedades-terapeuticas-y-medicinales/<?php echo str_replace(" ","-",trim($planta["nombremostrar"])) ?>/<?php echo $_GET["clave"]; ?>" ></div>                
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="elabcnaturista" data-lang="es">Twittear</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>                
                    
                <?php echo "<p>".$planta["descripcionperfil"]."</p>"; ?>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/familiabotanica.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Familia Botanica</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;"><?php echo $familiabotanica["nombre"] ?></div>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/organografia.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Organografia</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;"><?php echo $planta["organografia"] ?></div>
                    </div> 
                </div>
                <?php
                if(mysql_num_rows($result_PARUTI)>0){
                  ?>
                    <div class="col-md-12" style="padding: 0px;" >
                        <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/parte.png" ></div>
                        <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                            <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Parte Utilizada</div>
                            <div class="col-md-12" style="padding-left: 0px; font-size: 17px;">
                                <?php
                                    while ($parte = mysql_fetch_assoc($result_PARUTI)) {
                                        echo "<div title='".$parte["descripcion"]."'>".$parte["nombre"]."</div>";
                                    }
                                ?>                                
                            </div>
                        </div> 
                    </div>                                 
                  <?php
                }
                
                ?>
 
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/ubicacionpla.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Originario de</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;"><?php echo $planta["originariode"] ?></div>
                    </div> 
                </div>  
                
                <?php
                if($planta["conocidacomo"]!=""){
                    ?>
                    <div class="col-md-12" style="padding: 0px;">
                        <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/sinonimos.png" ></div>
                        <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                            <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Tambien conocido como</div>
                            <div class="col-md-12" style="padding-left: 0px; font-size: 17px;"><?php echo str_replace("|",", ",$planta["conocidacomo"]) ?></div>
                        </div> 
                    </div> 
                <?php
                }
                if(mysql_num_rows($result_CMQUTI)>0){
                ?>                
                <div class="col-md-12" style="padding: 0px; ">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/composicion.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Composición Quimica</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;">
                                <?php
                                    while ($compo = mysql_fetch_assoc($result_CMQUTI)) {
                                        echo "<div title='".$compo["descripcion"]."'>".$compo["nombre"]."</div>";
                                    }
                                ?>                             
                        </div>
                    </div> 
                </div>                 
                <?php
                }  
                
                if(mysql_num_rows($result_PFAUTI)>0){
                ?>                
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/farmacologia.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Propiedades Farmacologicas</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;">
                                <?php
                                    while ($farma = mysql_fetch_assoc($result_PFAUTI)) {
                                        echo "<div title='".$farma["descripcion"]."'>".$farma["nombre"]."</div>";
                                    }
                                ?>                                                        
                        </div>
                    </div> 
                </div> 
                <?php
                }
                 
                if($planta["precaucionesplanta"]!=""){
                    $precauciones=explode("|",$planta["precaucionesplanta"]);
                ?>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/precaucion.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Precauciones</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;">
                            <?php                                                          
                                for($j=0;$j<count($precauciones);$j++){
                                    echo "<div style='font-weight: normal; text-align: justify;'>".$precauciones[$j]."</div>";
                                }                                                        
                            ?>                                                                                    
                        </div>
                    </div> 
                </div> 
                <?php
                }
                if($planta["propiedadesmagicas"]!=""){
                    $propiedadesmagicas=explode("|",$planta["propiedadesmagicas"]);
                ?>
                <div class="col-md-12" style="padding: 0px; ">
                    <div class="col-md-3" style="padding: 0px"><img class="img-responsive center-block" src="<?php echo $precede; ?>imagenes/magicas.png" ></div>
                    <div class="col-md-9" style="padding: 0px;font-family: 'Open Sans Condensed', sans-serif; font-size: 18px">
                        <div class="col-md-12" style="border-bottom: 1px solid #CCCCCC; padding: 0px; font-weight: bold">Propiedades Magicas</div>
                        <div class="col-md-12" style="padding-left: 0px; font-size: 17px;">
                            <?php                                                          
                                for($j=0;$j<count($precauciones);$j++){
                                    echo "<div style='font-weight: normal; text-align: justify;'>".$propiedadesmagicas[$j]."</div>";
                                }                                                        
                            ?>                                                                                     
                        </div>
                    </div> 
                </div> 
                <?php
                }
                ?>

                
            </div>
            <div class="col-md-7"  >                    
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; font-weight: bold">Aplicaciones Medicinales para <?php echo $planta["nombremostrar"]; ?></div>                                      
                
                <?php
                    $sql_listaASOCIACION="SELECT asociacion.idasociacion, asociacion.descripcion, planta.idplanta, planta.nombrecomun as planta, metodopre.idmetodopre, metodopre.titulo as metodo FROM asociacion, planta, metodopre WHERE asociacion.idmetodopre= metodopre.idmetodopre and asociacion.idplanta = planta.idplanta and asociacion.idplanta='".$_GET["clave"]."' order by metodo";
                    $result_listaASOCIACION=mysql_query($sql_listaASOCIACION,$con) or die(mysql_error());
                    $cont=0;
                    if(mysql_num_rows($result_listaASOCIACION)>0){
                        while ($asociacion = mysql_fetch_assoc($result_listaASOCIACION)) {
                            $sqlMetodo="select * from metodopre where idmetodopre='".$asociacion["idmetodopre"]."'";
                            $resultMetodo=mysql_query($sqlMetodo,$con) or die(mysql_error());
                            $Metodo = mysql_fetch_assoc($resultMetodo);
                            
                            if($cont==0){
                                echo "<div class='col-md-12 planta_titpre'>".$Metodo["titulo"]."</div>";
                            }else{
                                echo "<div class='col-md-12 planta_titpre' style='margin-top: 15px'>".$Metodo["titulo"]."</div>";
                            }
                            
                            echo "<div class='col-md-12 plata_preparacion'>".$asociacion["descripcion"]."</div>";
                            echo "<div class='col-md-1' style='padding: 0px;'>";
                            echo "<img src='".$precede."imagenes/enfermedad.png' class='img-responsive center-block' >";
                            echo "</div>";
                            echo "<div class='col-md-11' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; font-size: 17px; font-weight: bold; border-bottom: 1px solid #CCCCCC\">Enfermedades</div>";
                            $sqlENFASO="select * from asociacion_enf where idasociacion='".$asociacion["idasociacion"]."'";
                            $resultENFASO=mysql_query($sqlENFASO,$con) or die(mysql_error());                           
                            if(mysql_num_rows($resultENFASO)>0){
                                while ($enfasociada = mysql_fetch_assoc($resultENFASO)) {
                                    $sqlEnfermedad="select * from enfermedad where idenfermedad='".$enfasociada["idenfermedad"]."'";
                                    $resultEnfermedad=mysql_query($sqlEnfermedad,$con) or die(mysql_error());
                                    $enfermedad = mysql_fetch_assoc($resultEnfermedad);
                                    echo "<div class='col-md-1' style='padding: 0px;'></div>";
                                    echo "<div class='col-md-11' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; margin-bottom: 0px;\"><p style='font-size:17px; margin-bottom:0px'><b>".$enfermedad["nombrecomun"]."</b> ".$enfasociada["descripcion"]."</p></div>";
                                }
                            }
                            $cont++;
                        }
                    }
                        
                
                ?>

                <div class="fb-comments" data-href="<?php echo trim($precede); ?>propiedades-terapeuticas-y-medicinales/<?php echo str_replace(" ","-",trim($planta["nombremostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-numposts="5" width="100%"></div>                

            </div>
        </div>
        <?php piepagina(); ?>
        </div>
    </body>
        <?php
            if (!isset($_SESSION['planta'][$_GET["clave"]])) { 
                $_SESSION['planta'][$_GET["clave"]]=1;
                $visitasActuales=$planta["numerolecturas"];
                $visitasActuales++;
                $sqlCuenta="update planta set numerolecturas='".$visitasActuales."' where idplanta='".$_GET["clave"]."'";
                $resultCuenta=mysql_query($sqlCuenta,$con) or die(mysql_error());
            }              
        ?>    
        <?php mysql_close($con); ?>
</html>
