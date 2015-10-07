<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <link href="../administracion/recursos/administracion.css" rel='stylesheet' type='text/css'>
        <title>Editar | Describe Asociación</title> 
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>        
        
        <?php
            require_once("../administracion/recursos/funciones.php");
        ?>              
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="border-right: 0px solid #CCCCCC">                    
                    <div class="col-md-12" style="margin-bottom: 20px;"><img class="img-responsive center-block" src="../imagenes/logoelabcnaturista.png"></div>
                    <?php Menu(); ?>
                </div>
                <div class="col-md-9">
                    <form method="post" id="form_CREARcomposicionquimica" action="recursos/acciones.php?tarea=37&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Describe Asociación</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">                            
                            <button type="button" onclick=redirigir("listardescibeasociacion.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Editar Elemento
                    </div>
                    <?php
                        $con=Conexion();
                        $sql_ASOCIACION="SELECT asociacion_enf.idasociacion_enf as id, asociacion_enf.descripcion as descripcion, planta.nombrecomun as planta, metodo.nombre as metodo, enfermedad.nombrecomun as enfermedad from asociacion, asociacion_enf, planta, metodo, enfermedad where asociacion_enf.idasociacion = asociacion.idasociacion and asociacion.idplanta = planta.idplanta and asociacion.idmetodo = metodo.idmetodo and asociacion_enf.idenfermedad = enfermedad.idenfermedad and asociacion_enf.idasociacion_enf='".$_GET["id"]."' order by planta.nombrecomun, metodo.nombre, enfermedad.nombrecomun;";
			$result_ASOCIACION=mysql_query($sql_ASOCIACION,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_ASOCIACION)>0){
                            $asociacion = mysql_fetch_assoc($result_ASOCIACION);                                                            
                        }                    
                    ?>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Planta: <?php echo $asociacion["planta"]; ?></div>                        
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Metodo de Preparacion: <?php echo $asociacion["metodo"]; ?> </div>                        
                    </div>   
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Enfermedad: <?php echo $asociacion["enfermedad"]; ?> </div>                        
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Asociación</div>
                        <div class="col-md-12"><textarea class="form-control" maxlength="3000" rows="3"  id="descripcion" name="descripcion" required="required"><?php echo $asociacion["descripcion"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12"><button type="submit" class="btn btn-default">Submit</button></div>                        
                    </div>
                    </form>
                </div>
            </div>
        </div>                 
    </body>
</html>
