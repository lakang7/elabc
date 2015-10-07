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
        
        <title>Editar | Enfermedad</title>
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
                    <form method="post" id="form_CREARfambotanica" action="recursos/acciones.php?tarea=23&id=<?php echo $_GET["id"]; ?>">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Enfermedad</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertenfermedad.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarenfermedad.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <?php
                    
                        $con=Conexion();
                        $sql_listaENFERMEDAD="select * from enfermedad where idenfermedad='".$_GET["id"]."'";
			$result_listaENFERMEDAD=mysql_query($sql_listaENFERMEDAD,$con) or die(mysql_error()); 
                        if(mysql_num_rows($result_listaENFERMEDAD)>0){
                           $enfermedad = mysql_fetch_assoc($result_listaENFERMEDAD);                              
                        }                  
                                                
                    ?>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Común</div>
                        <div class="col-md-12"><input  type="text" class="form-control" value="<?php echo $enfermedad["nombrecomun"]; ?>"  id="nombreComun" name="nombreComun" maxlength="30" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Cientifico</div>
                        <div class="col-md-12"><input type="text" class="form-control" value="<?php echo $enfermedad["nombrecientifico"]; ?>" id="nombreCientifico" name="nombreCientifico" maxlength="60" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Mostrar</div>
                        <div class="col-md-12"><input type="text" class="form-control" value="<?php echo $enfermedad["mostrar"]; ?>" id="mostrar" name="mostrar" maxlength="30" required="required" /></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Organo que afecta esta enfermedad</div>
                        <div class="col-md-12">
                        <select id="organo" name="organo" class="selectpicker show-tick" data-live-search="true" data-width="100%" required="required">
                            <?php
                                $con=Conexion();
                                $sql_listaORGANO="select * from organo order by nombre";
                                $result_listaORGANO=mysql_query($sql_listaORGANO,$con) or die(mysql_error());
                                if(mysql_num_rows($result_listaORGANO)>0){
                                    while ($organo = mysql_fetch_assoc($result_listaORGANO)) {
                                        if($enfermedad["idorgano"]==$organo["idorgano"]){
                                            echo "<option selected='selected' value='".$organo["idorgano"]."'>".$organo["nombre"]."</option>";
                                        }else{
                                            echo "<option value='".$organo["idorgano"]."'>".$organo["nombre"]."</option>";
                                        }
                                        
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                           
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Enfermedad para el catalogo [Maximo 200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="2" maxlength="200"  id="descripcionCatalogo" name="descripcionCatalogo"><?php echo $enfermedad["descripcioncatalogo"]; ?></textarea></div>
                    </div>    
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Enfermedad para el Perfil [Maximo 3000 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="descripcionPerfil" name="descripcionPerfil"><?php echo $enfermedad["descripcionperfil"]; ?></textarea></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Causas de la Enfermedad [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="causas" name="causas"><?php echo $enfermedad["causas"]; ?></textarea></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Sintomas de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="sintomas" name="sintomas"><?php echo $enfermedad["sintomas"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Prevención de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="prevencion" name="prevencion"><?php echo $enfermedad["prevencion"]; ?></textarea></div>
                    </div>   
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Diagnostico de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="diagnostico" name="diagnostico"><?php echo $enfermedad["diagnostico"]; ?></textarea></div>
                    </div>  
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Tratamiento Ortodoxo [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="ortodoxo" name="ortodoxo"><?php echo $enfermedad["ortodoxo"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Recomendaciones para evitar complicaciones [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea  class="form-control" rows="3" maxlength="3000"  id="recomendaciones" name="recomendaciones"><?php echo $enfermedad["evitecomplicaciones"]; ?></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Tipos de [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="tipos" name="tipos"><?php echo $enfermedad["tiposde"]; ?></textarea></div>
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
