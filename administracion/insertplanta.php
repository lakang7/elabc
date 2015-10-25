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
                
        <title>Insertar | Plantas</title>
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
    <body style="padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="border-right: 0px solid #CCCCCC">                    
                    <div class="col-md-12" style="margin-bottom: 20px;"><img class="img-responsive center-block" src="../imagenes/logoelabcnaturista.png"></div>
                    <?php Menu(); ?>
                </div>
                <div class="col-md-9">
                    <form method="post" enctype="multipart/form-data" id="form_CREARplanta" action="recursos/acciones.php?tarea=13">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Plantas</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertplanta.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarplanta.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Común</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreComun" name="nombreComun" maxlength="40" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Científico</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreCientifico" name="nombreCientifico" maxlength="40" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Para Mostrar</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreMostrar" name="nombreMostrar" maxlength="40" required="required" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Esta planta es tambien conocida como [Separe cada nombre de otro con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="1" maxlength="250"  id="conocidaComo" name="conocidaComo"></textarea></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Organografia</div>
                        <div class="col-md-12"><textarea class="form-control" rows="2" maxlength="600"  id="organografia" name="organografia"></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Originario de</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="originarioDe" name="originarioDe" maxlength="40" required="required" /></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Familia Botanica</div>
                        <div class="col-md-12">
                        <select id="familiaBotanica" name="familiaBotanica" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaFAMBOT="select * from fambotanica order by nombre";
                                $result_listaFAMBOT=mysql_query($sql_listaFAMBOT,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaFAMBOT)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaFAMBOT)) {
                                        echo "<option value='".$fila["idfambotanica"]."'>".$fila["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>  
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Partes Utilizables de la planta</div>
                        <div class="col-md-12">
                        <select multiple title="Escoja las partes utilizables de esta planta.." id="parteUtilizada" name="parteUtilizada[]" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaPARPLA="select * from parplanta order by nombre";
                                $result_listaPARPLA=mysql_query($sql_listaPARPLA,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaPARPLA)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaPARPLA)) {
                                        echo "<option value='".$fila["idparplanta"]."'>".$fila["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>   
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Composición Quimica de la Planta</div>
                        <div class="col-md-12">
                        <select multiple title="Escoja la composición quimica de la planta.." id="composicionQuimica" name="composicionQuimica[]" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaCOMQUI="select * from comquimica order by nombre";
                                $result_listaCOMQUI=mysql_query($sql_listaCOMQUI,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaCOMQUI)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaCOMQUI)) {
                                        echo "<option value='".$fila["idcomquimica"]."'>".$fila["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Propiedades Farmacologicas</div>
                        <div class="col-md-12">
                        <select multiple title="Escoja las propiedades farmacologicas de la planta.." id="propiedadFarmacologica" name="propiedadFarmacologica[]" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaPROFAR="select * from profarmacologica order by nombre";
                                $result_listaPROFAR=mysql_query($sql_listaPROFAR,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaPROFAR)>0){
                                    while ($fila = mysql_fetch_assoc($result_listaPROFAR)) {
                                        echo "<option value='".$fila["idprofarmacologica"]."'>".$fila["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la planta para el catalogo [Maximo 200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="2" maxlength="200"  id="descripcionCatalogo" name="descripcionCatalogo"></textarea></div>
                    </div>    
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la planta para el Perfil [Maximo 1200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="200"  id="descripcionPerfil" name="descripcionPerfil"></textarea></div>
                    </div>  
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Precauciones en el uso de esta planta [Separe cada precaución de otra con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="precauciones" name="precauciones"></textarea></div>
                    </div> 
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Propiedades Magicas de esta planta [Separe cada propiedad de otra con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="propiedadesMagicas" name="propiedadesMagicas"></textarea></div>
                    </div>  
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Catalogo [Tamaño recomendado 600x450px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenCatalogo" type="file" required="required"/></div>
                    </div> 
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Perfil [Tamaño recomendado 600x600px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenPerfil" type="file" required="required"/></div>
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
