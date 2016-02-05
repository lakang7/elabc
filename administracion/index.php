<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <link href="../administracion/recursos/administracion.css" rel='stylesheet' type='text/css'>        
        
        <title>Iniciar Sesión Administracion</title>
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>        
        
        <?php
            header('Content-Type: text/html; charset=UTF-8');        
            require_once("../administracion/recursos/funciones.php");
        ?>        
    </head>
    <body>
    <div class="container">
    	<div class="row">
    		<div class="col-md-4" ></div>
    		<div class="col-md-4" style="text-align: center">
    		<div class="row">
    			<div class="col-md-12" style="height: 80px;" ></div>
                        <div class="col-md-12" style="height: 150px; display: table" ><div style="display: table-cell;"><img src="../imagenes/logoelabcnaturista.png" /></div></div>
    		</div>
      		<form class="form-signin formulario" method="post" role="form" style="margin-top: 10px;" action="recursos/acciones.php?tarea=57">
        		<h3 class="form-signin-heading" style="text-align: center">Inicio Sesión Administrador</h2>
        		<input name="email" id="email" type="email" class="form-control" placeholder="Email address" style="margin-bottom: 15px;" required autofocus>
        		<input name="passw" id="passw" type="password" class="form-control" placeholder="Password" style="margin-bottom: 15px;" required>
        		<button type="submit" class="btn btn-success">Iniciar Sesión</button>
      		</form>    			        			    			
    		</div>    		    		
    	</div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="border: 1px solid #CCCCCC">
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
            <div class="col-md-2"></div>
        </div>
    </div> 
    </body>
</html>

