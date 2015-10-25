<?php session_start(); ?>
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
            
            $sqlARTICULO="select * from articulo where idarticulo='".$_GET["clave"]."'";
            $resultARTICULO=mysql_query($sqlARTICULO,$con) or die(mysql_error());
            if(mysql_num_rows($resultARTICULO)>0){
                $articulo = mysql_fetch_assoc($resultARTICULO);
            }  
            
            $sqlAUTOR="select * from administrador where idadministrador='".$articulo["idadministrador"]."'";
            $resultAUTOR=mysql_query($sqlAUTOR,$con) or die(mysql_error());
            $autor = mysql_fetch_assoc($resultAUTOR);            
                        
            
        ?>            
        <meta charset="UTF-8">
        <title>Blog @elabcnaturista | <?php echo $articulo["titulo"]; ?></title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
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
                    <?php
                        $url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
                    ?>    
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
                <!--<div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>-->
                <div class="col-md-9">
                    <div class="row">
                        <?php menu(); ?>                                             
                    </div>                                        
                </div>
            </div>
        <div class="row" style="margin-bottom: 100px;">

            <div class="col-md-9" style="">                    
                               
                <div class="col-md-12" style="padding: 0px;">
                    <img src="<?php echo trim($precede); ?>imagenes/blog/contenido/<?php echo $articulo["imacontenido"] ?>" class="img-responsive center-block" >
                </div>
                <div class="col-md-12" style="padding: 0px;">                    
                    <div class="col-md-12 blog_titulo"  >
                        <div class="col-md-12">
                            <?php echo $articulo["titulo"]."</br>"; ?>
                        </div>
                        <div class="col-md-12" style="margin-top: -15px;">
                        
                            <div class="fb-like" data-href="<?php echo $url; ?>" data-layout="button_count" ></div>
                            <div style="margin-left: 5px;" class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count"></div>
                            <div style="margin-left: 5px; margin-right: 5px;" class="fb-send" data-href="<?php echo $url; ?>" ></div>
                            <a href="https://twitter.com/share" class="twitter-share-button" data-via="elabcnaturista" data-lang="es">Twittear</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>                            
                            
                        </div>
                    </div>
                                        
                </div>
                <div class="col-md-12" style="padding: 0px; margin-top: 10px;">                
                    <div class="col-md-4" style="padding: 0px;">
                        <div class="col-md-2" style="padding: 0px;">
                            <img src="<?php echo trim($precede); ?>imagenes/calendario.png" class="img-responsive center-block" />
                        </div>
                        <?php $test = new DateTime($articulo["fechapublicacion"]); ?>
                        <div class="col-md-10 blog_titicono center-block"><?php echo $test->format('d M Y H:i'); ?></div>
                    </div>
                    <div class="col-md-4" style="padding: 0px;">
                        <div class="col-md-2" style="padding: 0px;">
                            <img src="<?php echo trim($precede); ?>imagenes/lapiz.png" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-10 blog_titicono"><?php echo $autor["nombre"]; ?></div>
                    </div>
                    <div class="col-md-4" style="padding: 0px;">
                        <div class="col-md-2" style="padding: 0px;">
                            <img src="<?php echo trim($precede); ?>imagenes/ojo.png" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-10 blog_titicono"><?php echo $articulo["numerolecturas"]  ?> Visitas</div>
                    </div>                                    
                </div>
                <div class="col-md-12 blog_resumen" ><?php echo $articulo["contenido"]; ?></div>
                
                <div class="fb-comments" data-href="<?php echo $url; ?>" data-numposts="5" width="100%"></div>
                    
                
                                               
            </div>
            <div class="col-md-3">                
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px;">Categorias</div>
                <?php                                
                    $sql_listaCATEGORIA="select * from catblog order by nombre";
                    $result_listaCATEGORIA=mysql_query($sql_listaCATEGORIA,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaCATEGORIA)>0){
                        while ($fila = mysql_fetch_assoc($result_listaCATEGORIA)) {
                            $apunta=trim($precede)."blog-medicina-natural/".str_replace(" ","-",trim($fila["nombre"]))."/".$fila["idcatblog"];
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$fila["descripcion"]."'>".$fila["nombre"]."</div>";
                        }
                    }                                                                                     
                ?>
                
                
            <!--<div class="col-md-12" style="background-color: #eae6e7; padding-top: 10px; padding-bottom: 15px; margin-top: 15px;">
                <div class="col-md-1"></div>
                <div class="col-md-10 subscribete_tit">¡Subscribete y recibe notificaciones en tu correo cada vez que publiquemos un nuevo articulo!</div>                
                <div class="col-md-12 subscribete_tit" style="margin-top: 10px; padding: 0px;"><input type="email" class="form-control" id="email" placeholder="Ingresa tú email"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6 subscribete_boton" style="margin-top: 10px; background-color: #CCCCCC; padding-top: 5px; padding-bottom: 5px;">Suscribirse</div>                
            </div> -->               
            </div>            
        </div>
            <?php piepagina();  ?> 
        </div>      
        <?php
            if (!isset($_SESSION['articulo'][$_GET["clave"]])) { 
                $_SESSION['articulo'][$_GET["clave"]]=1;
                $visitasActuales=$articulo["numerolecturas"];
                $visitasActuales++;
                $sqlCuenta="update articulo set numerolecturas='".$visitasActuales."' where idarticulo='".$_GET["clave"]."'";
                $resultCuenta=mysql_query($sqlCuenta,$con) or die(mysql_error());
            }              
        ?>
        <?php mysql_close($con); ?>
    </body>
</html>