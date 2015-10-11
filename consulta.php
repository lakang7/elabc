<?php session_start(); 
    if (!isset($_SESSION['paciente'])){
        ?>
            <script type="text/javascript" language="JavaScript" >                
                location.href="index.php";
            </script>
        <?php        
    }
?>
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
            
            $sqlconsulta="select * from consulta where idconsulta='".$_GET["id"]."'";
            $resultconsulta=mysql_query($sqlconsulta,$con) or die(mysql_error());
            if(mysql_num_rows($resultconsulta)>0){
                $consulta = mysql_fetch_assoc($resultconsulta);
                $test = new DateTime($consulta["fechacreacion"]);
            } 
            
        ?>
        <meta charset="UTF-8">
        <title>Detalle de Consulta | @elabcnaturista</title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="<?php echo trim($precede); ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="<?php echo trim($precede); ?>administracion/recursos/dist/css/bootstrap-select.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="<?php echo trim($precede); ?>administracion/recursos/dist/js/bootstrap-select.js"></script>         
        <script src="http://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>            
        
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="<?php echo trim($precede); ?>imagenes/logoelabcnaturista.png"></div>
                <div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                
                <div class="col-md-9">
                    <div class="row">
                        <?php menu();  ?>                                          
                    </div>                                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">                    
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("<?php echo trim($precede); ?>crear-consulta-online") class="btn btn-default boton">Registrar una nueva consulta +</button>
                            <button type="button" onclick=redirigir("<?php echo trim($precede); ?>mis-consultas-online")  class="btn btn-default boton">Ver mis consultas</button>
                        </div>                        
                    </div>                    
                    <div class="col-md-12 tituloconsulta">Detalle de Consulta</div>
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Titulo</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["titulo"] ?></div>
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Fecha de Creación</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $test->format('d M Y H:i'); ?></div> 
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">01.- ¿Cuál es el problema de salud que quiere consultar?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta01"] ?></div>                    
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">02.- ¿Cuándo inició su problema de salud?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta02"] ?></div>  
                   
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">03.- ¿Cuáles son los signos y síntomas que más le afectan?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta03"] ?></div>  
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">04.- ¿En qué situación se encuentra ahora su problema?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta04"] ?></div>  
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">05.- ¿Sobre el problema, le han realizado análisis clínicos?¿Si afirmativo, ¿cuáles y qué resultado?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta05"] ?></div>  
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">06.- En cualquiera de los casos  ¿cuál fue el diagnóstico y tratamiento?</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $consulta["pregunta06"] ?></div>                      
                    
                    <div class="col-md-12 tituloconsulta">Respuesta a la consulta</div>     
                    
                    
                </div>
                <div class="col-md-4">                                                               

                </div>                
            </div>

        <?php piepagina();  ?>
   </div>         
    </body>
</html>
