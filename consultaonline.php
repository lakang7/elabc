<?php session_start(); 
    if (isset($_SESSION['paciente'])){
        ?>
            <script type="text/javascript" language="JavaScript" >                
                location.href="crear-consulta-online";
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
        <title>Consulta Naturista Online | @elabcnaturista</title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $precede; ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="<?php echo trim($precede); ?>administracion/recursos/dist/css/bootstrap-select.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="<?php echo trim($precede); ?>administracion/recursos/dist/js/bootstrap-select.js"></script>         
        <script src="http://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>            
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                <!--<div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>-->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px">                                                    
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Baner Sobre el Menú -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2217467265480616"
     data-ad-slot="2240864283"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>                                                                                     
                        </div>                        
                        <?php menu();  ?>                                          
                    </div>                                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <form method="post" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 19px; color: #000" class="form-horizontal" id="formregistrapaciente" name="formregistrapaciente" action="<?php echo trim($precede) ?>administracion/recursos/acciones.php?tarea=45">
                    <div class="col-md-12" >Registrate en Nuestro Sistema de Consultas Online</div>
                    <div class="col-md-12">Nombre y Apellido</div>
                    <div class="col-md-12"><input type="text" style="font-size: 17px;" class="form-control"  id="nombre" name="nombre" maxlength="40" required="required" /></div>                                        
                    <div class="col-md-12">Indique su Sexo</div>
                    <div class="col-md-12">
                    <select id="sexo" name="sexo" style="font-size: 17px;" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                    </select>
                    </div>
                    <div class="col-md-12">Indique su Fecha de Nacimiento</div>
                    <div class="col-md-12"><input type="date" style="font-size: 17px;" class="form-control" name="fechanacimiento" id="fechanacimiento" required="required" /></div>                    
                    <div class="col-md-12">Ocupación</div>
                    <div class="col-md-12"><input type="text" style="font-size: 17px;" class="form-control"  id="ocupacion" name="ocupacion" maxlength="60" required="required" /></div>
                    <div class="col-md-12">Indique su país de residencia</div>
                    <div class="col-md-12">
                    <select id="pais" name="pais" style="font-size: 17px;" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="España">España</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Otro">No Listado</option>
                    </select>
                    </div>                                        
                    <div class="col-md-12">Indique su dirección de habitación</div>
                    <div class="col-md-12"><input type="text"  class="form-control" style="font-size: 17px;"  id="direccion" name="direccion" maxlength="45" required="required" /></div>                    
                    <div class="col-md-12">Correo Electrónico</div>
                    <div class="col-md-12"><input type="email" class="form-control" style="font-size: 17px;"  id="correo" name="correo" maxlength="60" required="required" /></div>                    
                    <div class="col-md-12">Contraseña</div>
                    <div class="col-md-12"><input type="password" class="form-control" style="font-size: 17px;"  id="contra01" name="contra01" maxlength="12"  required="required" /></div>
                    <div class="col-md-12">Confirme su Contraseña</div>
                    <div class="col-md-12"><input type="password" class="form-control" style="font-size: 17px;"  id="contra02" name="contra02" maxlength="12" required="required" /></div>
                    <div class="col-md-12" style="margin-top: 15px;">
                        <div class="g-recaptcha" data-sitekey="6LcEEA8TAAAAAEtN5v9dWGLQNdXXdvCcvL5yGNfk" required="required" ></div>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;"><button type="submit" class="btn btn-default" style="font-size: 17px;">Registrarme</button></div>                    
                    </form>
                </div>
                <div class="col-md-5">                                                               
                    <form method="post" class="form-horizontal" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 19px; color: #000" id="formregistrapaciente" name="formregistrapaciente" action="<?php echo trim($precede) ?>administracion/recursos/acciones.php?tarea=47">
                        <div class="col-md-12">Si ya estas registrado, Inicia Sesión</div>
                        <div class="col-md-12">Correo Electrónico</div>
                        <div class="col-md-12"><input type="email" class="form-control" style="font-size: 17px;"  id="inicorreo" name="inicorreo" maxlength="60" required="required" /></div>                    
                        <div class="col-md-12">Contraseña</div>
                        <div class="col-md-12"><input type="password" class="form-control" style="font-size: 17px;"  id="inicontra" name="inicontra" maxlength="12"  required="required" /></div>                        
                        <div class="col-md-12" style="margin-top: 10px;"><button type="submit" class="btn btn-default" style="font-size: 17px;" >Iniciar Sesión</button></div>                    
                    </form>
                </div>                
            </div>

        <?php piepagina();  ?>
   </div>  
    <script>
                
        $(document).ready(function() {
            $('#formregistrapaciente').bootstrapValidator({
                    message: 'Este valor no es valido',
                    feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                            contra02: {
                                    validators: {
                                            identical: {
                                                    field: 'contra01',
                                                    message: 'Las contraseñas deben coincidir'
                                            }
                                    }
                            }
                    }
            });                                                            
        });              
    </script>        
    </body>
</html>
