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
        
        <title>Editar | Terapia Alternativa</title>
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
                    <?php
                        $con=Conexion();
                        $sql_TERAPIA="select * from terapia where idterapia='".$_GET["id"]."'";
			$result_TERAPIA=mysql_query($sql_TERAPIA,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_TERAPIA)>0){
                            $terapia = mysql_fetch_assoc($result_TERAPIA);                                                            
                        }                                             
                    ?>                     
                    <form method="post" enctype="multipart/form-data" id="form_CREARcomposicionquimica" action="recursos/acciones.php?tarea=63&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Terapia Alternativa</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertterapiaalternativa.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarterapiaalternativa.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre de La terapia alternativa</div>
                        <div class="col-md-12"><input value="<?php echo $terapia["titulo"]; ?>" type="text" class="form-control"  id="nombre" name="nombre" maxlength="120" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre para mostrar de la terapia alternativa</div>
                        <div class="col-md-12"><input value="<?php echo $terapia["mostrar"]; ?>" type="text" class="form-control"  id="mostrar" name="mostrar" maxlength="120" required="required" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Categorias para la terapia alternatica</div>
                        <div class="col-md-12">
                        <select id="categoria" name="categoria" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaFAMBOT="select * from catterapia order by nombre";
                                $result_listaFAMBOT=mysql_query($sql_listaFAMBOT,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaFAMBOT)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaFAMBOT)) {
                                        if($terapia["idcatterapia"]==$fila["idcatterapia"]){
                                            echo "<option selected='selected' value='".$fila["idcatterapia"]."'>".$fila["nombre"]."</option>";
                                        }  else {
                                            echo "<option value='".$fila["idcatterapia"]."'>".$fila["nombre"]."</option>";
                                        }
                                        
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Catalogo [Max 200 Caracteres]</div>
                        <div class="col-md-12"><textarea  rows="3" maxlength="1200"  id="catalogo" name="catalogo" ><?php echo $terapia["descripcioncatalogo"]; ?></textarea></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Contenido [Max 25000 Caracteres]</div>
                        <div class="col-md-12"><textarea  rows="7" maxlength="20000"  id="contenido" name="contenido" ><?php echo $terapia["descripcionperfil"]; ?></textarea></div>
                    </div> 

                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Catalogo [Tamaño recomendado 900x525px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenCatalogo" type="file" /></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Contenido [Tamaño recomendado 1200x700px]</div>
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
                CKEDITOR.replace( 'catalogo' );
                CKEDITOR.replace( 'contenido' );
            </script>    

</html>
