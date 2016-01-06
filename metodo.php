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
                        
            
            $sql_TERAPIA="select * from metodopre where idmetodopre='".$_GET["clave"]."'";
            $result_TERAPIA=mysql_query($sql_TERAPIA,$con) or die(mysql_error());
            if(mysql_num_rows($result_TERAPIA)>0){
                $terapia = mysql_fetch_assoc($result_TERAPIA);
            } 
            
            /*$sql_TMETODO="select * from tiposmetodo where idmetodo='".$_GET["clave"]."'";
            $result_TMETODO=mysql_query($sql_TMETODO,$con) or die(mysql_error());            
            $numeroSubtipos=mysql_num_rows($result_TMETODO);*/
            
        ?>
        <meta charset="UTF-8">
        <title>Terapia Alternativa <?php echo $terapia["titulo"]; ?></title>    
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
            <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px; font-weight: bold"><?php echo $terapia["titulo"]; ?></div>
            <div class="col-md-12" style="margin-top: 10px">
                <?php $url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; ?> 
                <div class="fb-like" data-href="<?php echo $url; ?>" data-layout="button_count" ></div>
                <div style="margin-left: 5px;" class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count"></div>
                <div style="margin-left: 5px; margin-right: 5px;" class="fb-send" data-href="<?php echo $url; ?>" ></div>                
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="elabcnaturista" data-lang="es">Twittear</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>                                    
            </div>            
            <div class="col-md-12" style="margin-top: 10px">  
                <div style="font-family: 'Open Sans Condensed', sans-serif; font-size: 18px; text-align: justify"><img class="img-responsive col-md-5"  src="<?php echo trim($precede) ?>imagenes/metodos/perfil/<?php echo $terapia["imagenperfil"]; ?>" style="float: left; margin-right: 30px; margin-bottom: 10px; padding: 0px"><?php echo $terapia["descripcionperfil"]; ?></div>                 
            </div>

        </div>
            <div class="row">
                <div class="fb-comments" data-href="<?php echo trim($precede); ?>metodo-de-preparacion/<?php echo str_replace(" ","-",trim($metodo["mostrar"])) ?>/<?php echo $_GET["clave"]; ?>" data-numposts="5" width="100%"></div>                            
            </div>
        <?php piepagina();  ?>
        </div>         
    </body>
        <?php
            if (!isset($_SESSION['metodo'][$_GET["clave"]])) { 
               /* $_SESSION['metodo'][$_GET["clave"]]=1;
                $visitasActuales=$metodo["numerolecturas"];
                $visitasActuales++;
                $sqlCuenta="update metodo set numerolecturas='".$visitasActuales."' where idmetodo='".$_GET["clave"]."'";
                $resultCuenta=mysql_query($sqlCuenta,$con) or die(mysql_error());*/
            }              
        ?>     
        <?php mysql_close($con); ?>
</html>
