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
        
        <title>Insertar | Enfermedad</title>
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
                    <form method="post" id="form_CREARfambotanica" action="recursos/acciones.php?tarea=22">
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Enfermedades</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" onclick=redirigir("insertenfermedad.php") class="btn btn-default boton">Crear Nuevo Elemento +</button>
                            <button type="button" onclick=redirigir("listarenfermedad.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Crear Nuevo Elemento +
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Común</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreComun" name="nombreComun" maxlength="30" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Cientifico</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="nombreCientifico" name="nombreCientifico" maxlength="60" required="required" /></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Nombre Mostrar</div>
                        <div class="col-md-12"><input type="text" class="form-control"  id="mostrar" name="mostrar" maxlength="30" required="required" /></div>
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
                                        echo "<option value='".$organo["idorgano"]."'>".$organo["nombre"]."</option>";
                                    }
                                }
                                mysql_close($con);
                            ?>
                        </select>                                                        
                        </div>
                    </div>                           
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Enfermedad para el catalogo [Maximo 200 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="2" maxlength="200"  id="descripcionCatalogo" name="descripcionCatalogo"></textarea></div>
                    </div>    
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Descripción de la Enfermedad para el Perfil [Maximo 3000 Caracteres]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="descripcionPerfil" name="descripcionPerfil"></textarea></div>
                    </div>
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Causas de la Enfermedad [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="causas" name="causas"></textarea></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Sintomas de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="sintomas" name="sintomas"></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Prevención de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="prevencion" name="prevencion"></textarea></div>
                    </div>   
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Diagnostico de la Enfermedad [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="diagnostico" name="diagnostico"></textarea></div>
                    </div>  
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Tratamiento Ortodoxo [Maximo 3000 Caracteres, cada uno separa por "|"]</div>
                        <div class="col-md-12"><textarea required="required" class="form-control" rows="3" maxlength="3000"  id="ortodoxo" name="ortodoxo"></textarea></div>
                    </div> 
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Recomendaciones para evitar complicaciones [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="recomendaciones" name="recomendaciones"></textarea></div>
                    </div>                        
                    <div class="col-md-12 contiene_entrada">
                        <div class="col-md-12 titulo_entrada">Tipos de [Maximo 3000 Caracteres, cada una separa por "|"]</div>
                        <div class="col-md-12"><textarea class="form-control" rows="3" maxlength="3000"  id="tipos" name="tipos"></textarea></div>
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
