<?php session_start(); 
    if (!isset($_SESSION['administrador'])){
        ?>
            <script type="text/javascript" language="JavaScript" >                
                location.href="index.php";
            </script>
        <?php        
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <link href="../administracion/recursos/administracion.css" rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="recursos/dist/css/bootstrap-select.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="recursos/dist/js/bootstrap-select.js"></script>
        <script src="../recursos/ckeditor/ckeditor.js"></script>
        
        <title>Editar | Articulo Blog</title>
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
                <div class="col-md-3" style="border-right: 0px solid #CCCCCC">                    
                    <div class="col-md-12" style="margin-bottom: 20px;"><img class="img-responsive center-block" src="../imagenes/logoelabcnaturista.png"></div>
                    <?php Menu(); ?>
                </div>
                <div class="col-md-9">
                    <form method="post" enctype="multipart/form-data" id="form_CREARcomposicionquimica" action="recursos/acciones.php?tarea=43&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Articulo Blog</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertarticulo.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listararticulo.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <?php
                        $con=Conexion();
                        $sql_ARTICULO="select * from articulo where idarticulo='".$_GET["id"]."'";
			$result_ARTICULO=mysql_query($sql_ARTICULO,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_ARTICULO)>0){
                            $articulo = mysql_fetch_assoc($result_ARTICULO);                                                            
                        }                         
                        
                    ?>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Titulo del Articulo</div>
                        <div class="col-md-12"><input type="text" value="<?php echo $articulo["titulo"]; ?>" class="form-control"  id="titulo" name="titulo" maxlength="200" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Categorias para el articulo</div>
                        <div class="col-md-12">
                        <select multiple title="Escoja las categorias para el articulo.." id="categorias" name="categorias[]" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">                               
                            <?php
                                $con=Conexion();                               
                                $sql_listaCATBLOG="select * from catblog order by nombre";
                                $result_listaCATBLOG=mysql_query($sql_listaCATBLOG,$con) or die(mysql_error());                                
                                if(mysql_num_rows($result_listaCATBLOG)>0){
                                    while ($fila01 = mysql_fetch_assoc($result_listaCATBLOG)) {
                                        $sql_listacategoria="select * from articulo_cat where idarticulo='".$_GET["id"]."' and idcatblog='".$fila01["idcatblog"]."'";
                                        $result_listacategoria=mysql_query($sql_listacategoria,$con) or die(mysql_error());                                        
                                        if(mysql_num_rows($result_listacategoria)>0){
                                            echo "<option selected='selected' value='".$fila01["idcatblog"]."'>".$fila01["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila01["idcatblog"]."'>".$fila01["nombre"]."</option>";
                                        }
                                    }
                                }
                                mysql_close($con);
                            ?>                                
                            
                        </select>                                                        
                        </div>
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Resumen [Max 200 Caracteres]</div>
                        <div class="col-md-12"><textarea  rows="3" maxlength="200"  id="resumen" name="resumen" ><?php echo $articulo["resumen"]; ?></textarea></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Catalogo [Max 1200 Caracteres]</div>
                        <div class="col-md-12"><textarea  rows="3" maxlength="1200"  id="resumen" name="catalogo" ><?php echo $articulo["catalogo"]; ?></textarea></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Contenido [Max 20000 Caracteres]</div>
                        <div class="col-md-12"><textarea  rows="6" maxlength="20000"  id="resumen" name="contenido" ><?php echo $articulo["contenido"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Resumen [Tamaño recomendado 400x200px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenResumen" type="file" /></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Catalogo [Tamaño recomendado 825x555px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenCatalogo" type="file" /></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Contenido [Tamaño recomendado 1060x710px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenContenido" type="file" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12"><button type="submit" class="btn btn-default">Submit</button></div>                        
                    </div>
                    </form>
                </div>
            </div>
        </div>                 
    </body>
            <script>
                CKEDITOR.replace( 'resumen' );
                CKEDITOR.replace( 'catalogo' );
                CKEDITOR.replace( 'contenido' );
            </script>  
</html>
