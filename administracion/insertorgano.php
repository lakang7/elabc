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
        
        <title>Insertar | Organo</title>
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
                    <form method="post" id="form_CREARfambotanica" action="recursos/acciones.php?tarea=19">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Organos</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertorgano.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarorgano.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Sistema al que pertenece el Organo</div>
                        <div class="col-md-12">
                        <select id="sistema" name="sistema" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaSISTEMA="select * from sistema order by nombre";
                                $result_listaSISTEMA=mysql_query($sql_listaSISTEMA,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaSISTEMA)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaSISTEMA)) {
                                        echo "<option value='".$fila["idsistema"]."'>".$fila["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                         
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre del Organo</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombre" name="nombre" maxlength="20" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre del Organo para mostrar en el catalogo</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="mostrar" name="mostrar" maxlength="20" required="required" /></div>
                    </div>   
                       
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción del Organo</div>
                        <div class="col-md-12"><textarea maxlength="1200" class="form-control" rows="3"  id="descripcion" name="descripcion" required="required"></textarea></div>
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
