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
                
        <title>Editar | Plantas</title>
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>        
        
        <?php
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
                    <form method="post" enctype="multipart/form-data" id="form_CREARplanta" action="recursos/acciones.php?tarea=14&id=<?php echo $_GET["id"]; ?>">
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
                    <?php
                        $con=Conexion();
                        $sql_PLANTA="select * from planta where idplanta='".$_GET["id"]."'";
			$result_PLANTA=mysql_query($sql_PLANTA,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_PLANTA)>0){
                            $fila = mysql_fetch_assoc($result_PLANTA);                                                            
                        }                         
                        
                    ?>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Común</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreComun" value="<?php echo $fila["nombrecomun"] ?>" name="nombreComun" maxlength="40" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Científico</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreCientifico" value="<?php echo $fila["nombrecientifico"] ?>" name="nombreCientifico" maxlength="40" required="required" /></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Mostrar</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreMostrar" value="<?php echo $fila["nombremostrar"] ?>" name="nombreMostrar" maxlength="40" required="required" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Esta planta es tambien conocida como [Separe cada nombre de otro con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="1" maxlength="250"  id="conocidaComo" name="conocidaComo"><?php echo $fila["conocidacomo"] ?></textarea></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Organografia</div>
                        <div class="col-md-12"><textarea class="form-control" rows="2" maxlength="600"  id="organografia" name="organografia"><?php echo $fila["organografia"] ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Originario de</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="originarioDe" value="<?php echo $fila["originariode"] ?>" name="originarioDe" maxlength="40" required="required" /></div>
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
                                    while ($fila01 = mysql_fetch_assoc($result_listaFAMBOT)) {
                                        if($fila["idfambotanica"]==$fila01["idfambotanica"]){
                                            echo "<option selected='selected' value='".$fila01["idfambotanica"]."'>".$fila01["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila01["idfambotanica"]."'>".$fila01["nombre"]."</option>";
                                        }                                        
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
                                    while ($fila01 = mysql_fetch_assoc($result_listaPARPLA)) {
                                        $sql_listaUTIPARPLA="select * from planta_parplanta where idplanta='".$_GET["id"]."' and idparplanta='".$fila01["idparplanta"]."'";
                                        $result_listaUTIPARPLA=mysql_query($sql_listaUTIPARPLA,$con) or die(mysql_error());                                        
                                        if(mysql_num_rows($result_listaUTIPARPLA)>0){
                                            echo "<option selected='selected' value='".$fila01["idparplanta"]."'>".$fila01["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila01["idparplanta"]."'>".$fila01["nombre"]."</option>";
                                        }
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
                                    while ($fila01 = mysql_fetch_assoc($result_listaCOMQUI)) {
                                        $sql_listaUTICOMQUI="select * from planta_comquimica where idplanta='".$_GET["id"]."' and idcomquimica='".$fila01["idcomquimica"]."'";
                                        $result_listaUTICOMQUI=mysql_query($sql_listaUTICOMQUI,$con) or die(mysql_error());                                         
                                        if(mysql_num_rows($result_listaUTICOMQUI)>0){
                                            echo "<option selected='selected' value='".$fila01["idcomquimica"]."'>".$fila01["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila01["idcomquimica"]."'>".$fila01["nombre"]."</option>";
                                        }                                                                                                                        
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
                                    while ($fila01 = mysql_fetch_assoc($result_listaPROFAR)) {
                                        $sql_listaUTIPROFAR="select * from planta_profarmacologica where idplanta='".$_GET["id"]."' and idprofarmacologica='".$fila01["idprofarmacologica"]."'";
                                        $result_listaUTIPROFAR=mysql_query($sql_listaUTIPROFAR,$con) or die(mysql_error());                                         
                                        if(mysql_num_rows($result_listaUTIPROFAR)>0){
                                            echo "<option selected='selected' value='".$fila01["idprofarmacologica"]."'>".$fila01["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$fila01["idprofarmacologica"]."'>".$fila01["nombre"]."</option>";
                                        }                                                                                                                         
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la planta para el catalogo [Maximo 200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="2" maxlength="200"  id="descripcionCatalogo" name="descripcionCatalogo"><?php echo $fila["descripcioncatalogo"]; ?></textarea></div>
                    </div>    
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la planta para el Perfil [Maximo 1200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="1200"  id="descripcionPerfil" name="descripcionPerfil"><?php echo $fila["descripcionperfil"]; ?></textarea></div>
                    </div>  
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Precauciones en el uso de esta planta [Separe cada precaución de otra con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="precauciones" name="precauciones"><?php echo $fila["precaucionesplanta"]; ?></textarea></div>
                    </div> 
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Propiedades Magicas de esta planta [Separe cada propiedad de otra con el caracter "|" ]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="propiedadesMagicas" name="propiedadesMagicas"><?php echo $fila["propiedadesmagicas"]; ?></textarea></div>
                    </div>  
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Catalogo [Tamaño recomendado 600x450px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenCatalogo" type="file" /></div>
                    </div> 
                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Imagen para el Perfil [Tamaño recomendado 600x600px]</div>
                        <div class="col-md-12"><input class="form-control" name="imagenPerfil" type="file" /></div>
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
