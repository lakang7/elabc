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
            
        ?>
        <meta charset="UTF-8">
        <title>Mi Perfil de Consultas Naturistas Online | @elabcnaturista</title>    
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
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="<?php echo trim($precede); ?>imagenes/logoelabcnaturista.png"></div>
                <!--<div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                -->
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
                            <button type="button" onclick=redirigir("<?php echo trim($precede); ?>cerrar-sesion")  class="btn btn-default boton">Cerrar Sesión</button>
                        </div>                        
                    </div>                    
                    <div class="col-md-12 tituloconsulta">Historico de Mis Consultas</div>
                    <div class="col-md-12">
                            <table class="table table-hover" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 16px; color: #000">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Titulo</th>
                                        <th style="width: 20%">Fecha de Registro</th>
                                        <th style="width: 20%">Estatus</th>
                                    </tr>
                                </thead>
    
                                <tbody style="border-top: 0px;">
                                    <?php
                                        $sql_listaMETODO="select * from consulta where idpaciente='".$_SESSION["paciente"]."' order by idconsulta";
					$result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error()); 
                                                                                
                                        
                                        if(mysql_num_rows($result_listaMETODO)>0){
                                            while ($fila = mysql_fetch_assoc($result_listaMETODO)) {
                                                $test = new DateTime($fila["fechacreacion"]); 
                                                $est="";
                                                if($fila["estatus"]==0){
                                                    $est="En espera de respuesta";
                                                }
                                                if($fila["estatus"]==1){
                                                    $est="Respondida";
                                                }                                                
                                                echo "<tr style='cursor: pointer' onclick=redirigir('".trim($precede)."mi-consulta/".trim($fila["idconsulta"])."')>";
                                                echo "<td style='width: 60%'>".$fila["titulo"]."</td>"; 
                                                echo "<td style='width: 20%'>".$test->format('d M Y H:i')."</td>";
                                                echo "<td style='width: 20%'>".$est."</td>";
                                                echo "</tr>";                                                    
                                            }
					}	                                                                                
                                    ?>
                                </tbody>    
                            </table>  
                        </div>
                        
                </div>
                <div class="col-md-4">                                                               

                </div>                
            </div>

        <?php piepagina();  ?>
   </div>         
    </body>
</html>
