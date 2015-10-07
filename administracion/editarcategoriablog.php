<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <link href="../administracion/recursos/administracion.css" rel='stylesheet' type='text/css'>
        <title>Editar | Categoria Blog</title> 
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
                    <form method="post" id="form_CREARcomposicionquimica" action="recursos/acciones.php?tarea=40&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Categoria Blog</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertcategoriablog.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarcategoriablog.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Editar Elemento
                    </div>
                    <?php
                        $con=Conexion();
                        $sql_CATBLOG="select * from catblog where idcatblog='".$_GET["id"]."'";
			$result_CATBLOG=mysql_query($sql_CATBLOG,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_CATBLOG)>0){
                            $fila = mysql_fetch_assoc($result_CATBLOG);                                                            
                        }                    
                    ?>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre de la Parte de la Planta</div>
                        <div class="col-md-12"><input type="text" value="<?php echo $fila["nombre"]; ?>" class="form-control"  id="nombre" name="nombre" maxlength="25" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Parte de la Planta</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3"  id="descripcion" name="descripcion" required="required"><?php echo $fila["descripcion"]; ?></textarea></div>
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
