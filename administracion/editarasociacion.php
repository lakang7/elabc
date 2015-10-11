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
        
        <title>Editar | Asociación</title>
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
                    <form method="post" id="form_CREARfambotanica" action="recursos/acciones.php?tarea=35&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Asociación</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertasociacion.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarasociacion.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <?php
                        $con=Conexion();
                        $sql_ASOCIACION="select * from asociacion where idasociacion='".$_GET["id"]."'";
			$result_ASOCIACION=mysql_query($sql_ASOCIACION,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_ASOCIACION)>0){
                            $asociacion = mysql_fetch_assoc($result_ASOCIACION);                                                            
                        }                        
                        
                        
                    ?>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Planta</div>
                        <div class="col-md-12">
                        <select id="planta" name="planta" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaPLANTA="select * from planta order by nombrecomun";
                                $result_listaPLANTA=mysql_query($sql_listaPLANTA,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaPLANTA)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaPLANTA)) {
                                        if($asociacion["idplanta"]==$fila["idplanta"]){
                                            echo "<option selected='selected' value='".$fila["idplanta"]."'>".$fila["nombrecomun"]."</option>";
                                        }else{
                                            echo "<option value='".$fila["idplanta"]."'>".$fila["nombrecomun"]."</option>";
                                        }                                        
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div> 

                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Metodo de Preparación</div>
                        <div class="col-md-12">
                        <select id="metodo" name="metodo" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaMETODO="select * from metodo order by nombre";
                                $result_listaMETODO=mysql_query($sql_listaMETODO,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaMETODO)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaMETODO)) {
                                        if($asociacion["idmetodo"]==$fila["idmetodo"]){
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
                        <div class="col-md-12 titulo_entrada">Enfermedad</div>
                        <div class="col-md-12">
                        <select multiple title="Escoja las enfermedades.." id="enfermedad" name="enfermedad[]" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaENFERMEDAD="select * from enfermedad order by nombrecomun";
                                $result_listaENFERMEDAD=mysql_query($sql_listaENFERMEDAD,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaENFERMEDAD)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaENFERMEDAD)) {
                                        $sqlValida="select * from asociacion_enf where idasociacion='".$_GET["id"]."' and idenfermedad='".$fila["idenfermedad"]."'";
                                        $resultValida=mysql_query($sqlValida,$con) or die(mysql_error());
                                        if(mysql_num_rows($resultValida)>0){
                                            echo "<option selected='selected' value='".$fila["idenfermedad"]."'>".$fila["nombrecomun"]."</option>";
                                        }else{
                                            echo "<option value='".$fila["idenfermedad"]."'>".$fila["nombrecomun"]."</option>";
                                        }                                                                         
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Asociación</div>
                        <div class="col-md-12"><textarea maxlength="2000" class="form-control" rows="3"  id="descripcion" name="descripcion" required="required"><?php echo $asociacion["descripcion"]; ?></textarea></div>
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
