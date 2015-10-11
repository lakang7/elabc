<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="../administracion/recursos/administracion.css" rel='stylesheet' type='text/css'>
        <script src="../recursos/ckeditor/ckeditor.js"></script>        
        
        <title>Editar | Responder Consulta Online</title> 
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>        
        
        <?php
            require_once("../administracion/recursos/funciones.php");
        ?>              
    </head>
    <body style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="border-right: 0px solid #CCCCCC">                    
                    <div class="col-md-12" style="margin-bottom: 20px;"><img class="img-responsive center-block" src="../imagenes/logoelabcnaturista.png"></div>
                    <?php Menu(); ?>
                </div>
                <div class="col-md-9">
                    <form method="post" id="form_CREARcomposicionquimica" action="recursos/acciones.php?tarea=49&id=<?php echo $_GET["id"]."&origen=0"; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Consulta Online</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">                            
                            <button type="button" onclick=redirigir("listarconsultas.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <?php
                        $con=Conexion();
                        $sqlConsulta="select * from consulta where idconsulta='".$_GET["id"]."'";
			$resultConsulta=mysql_query($sqlConsulta,$con) or die(mysql_error()); 
                        if(mysql_num_rows($resultConsulta)>0){
                            $consulta = mysql_fetch_assoc($resultConsulta); 
                            $test = new DateTime($consulta["fechacreacion"]);
                            $sqlpaciente="select * from paciente where idpaciente='".$consulta["idpaciente"]."'";
                            $resultpaciente=mysql_query($sqlpaciente,$con) or die(mysql_error());
                            $paciente = mysql_fetch_assoc($resultpaciente);
                            $test2 = new DateTime($paciente["fechanacimiento"]);
                            $edad = calcular_edad($test2->format('d-m-y'));
                            $genero="";
                            if($paciente["sexo"]==1){
                                $genero="Hombre";
                            }else{
                                $genero="Mujer";
                            }
                        }                    
                    ?>
                        
                        <div class="col-md-12 tituloconsulta" style="border-bottom: 1px solid #CCCCCC; line-height: 35px;">Detalle de Paciente</div>
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Nombre</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $paciente["nombre"]." (".$genero.")" ?></div>

                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Fecha de Nacimiento</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $test2->format('d M Y')." (".$edad." años)" ?></div>                        
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Ocupación</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $paciente["ocupacion"] ?></div>   
                    
                    <div class="col-md-12 consultatitulo" style="margin-top: 10px;">Dirección</div>
                    <div class="col-md-12" style="font-style: italic"><?php echo $paciente["pais"]." (".$paciente["direccion"].")"  ?></div>                    
                        
                    <div class="col-md-12 tituloconsulta" style="border-bottom: 1px solid #CCCCCC; line-height: 35px;" >Detalle de Consulta</div>
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
                    
                    <div class="col-md-12 tituloconsulta" style="border-bottom: 1px solid #CCCCCC; line-height: 35px; margin-bottom: 10px; font-family: 'Open Sans Condensed', sans-serif;">Mensajes</div>
                    
                    <?php
                        $sql_mensajes = "select * from mensaje where idconsulta='".$_GET["id"]."'";
                        $result_mensaje = mysql_query($sql_mensajes,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_mensaje)>0){
                            while ($mensaje = mysql_fetch_assoc($result_mensaje)){
                            echo "<div class='col-md-12' style='margin-top: 10px; font-family: 'Open Sans Condensed', sans-serif;'>";
                            echo "<b>Escrito por:</b> Administrador <b>El: </b> ".$mensaje["fechaemision"];
                            echo "</div>";                            
                            echo "<div class='col-md-12' style='border-bottom: 1px solid #CCCCCC;'>";
                            echo $mensaje["contenido"];
                            echo "</div>";
                            }
                        }
                    ?>
                    
                    <div class="col-md-12" style="margin-top: 15px">
                        <textarea  rows="6" maxlength="12000"  id="contenido" name="contenido" ></textarea>                        
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;"><button type="submit" class="btn btn-default">Enviar Respuesta</button></div>                                        
                    
                    </form>
                </div>
            </div>
        </div>
            <script>
                CKEDITOR.replace( 'contenido' );
            </script>         
    </body>
</html>
