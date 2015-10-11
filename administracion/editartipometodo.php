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
        
        <title>Editar | Tipo de Método de Preparación</title>
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
                    <form method="post" enctype="multipart/form-data" id="form_CREARfambotanica" action="recursos/acciones.php?tarea=32&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Tipo de Método de Preparación</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("inserttipometodo.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listartipometodo.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Editar Elemento +
                    </div>
                    <?php
                        $con=Conexion();
                        $sql_TMETODO="select * from tiposmetodo where idtiposmetodo='".$_GET["id"]."'";
			$result_TMETODO=mysql_query($sql_TMETODO,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_TMETODO)>0){
                            $tmetodo = mysql_fetch_assoc($result_TMETODO);                                                            
                        }                         
                    
                    ?>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">(*) Método de Preparación</div>
                        <div class="col-md-12">
                        <select id="metodo" name="metodo" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaMETODO="select * from metodo order by nombre";
                                $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaMETODO)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaMETODO)) {
                                        if($tmetodo["idmetodo"]==$fila["idmetodo"]){
                                            echo "<option selected='selected' value='".$fila["idmetodo"]."'>".$fila["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila["idmetodo"]."'>".$fila["nombre"]."</option>";
                                        }
                                        
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">(*) Nombre del Tipo de método de preparación</div>
                        <div class="col-md-12"><input type="text" value="<?php echo $tmetodo["nombre"]; ?>" class="form-control"  id="nombre" name="nombre" maxlength="30" required="required" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">(*) Descripción del Tipo de método para el perfil</div>
                        <div class="col-md-12"><textarea maxlength="3000" class="form-control" rows="3"  id="descripcion" name="descripcion" required="required"><?php echo $tmetodo["descripcion"]; ?></textarea></div>
                    </div>                                                                          
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Ingredientes para el Tipo de método de preparación</div>
                        <div class="col-md-12"><textarea maxlength="3000" class="form-control" rows="3"  id="ingredientes" name="ingredientes"><?php echo $tmetodo["ingredientes"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Procedimiento para el Tipo de método de preparación</div>
                        <div class="col-md-12"><textarea maxlength="3000" class="form-control" rows="3"  id="procedimiento" name="procedimiento"><?php echo $tmetodo["procedimientos"]; ?></textarea></div>
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
