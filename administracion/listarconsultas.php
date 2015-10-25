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
        <title>Listar | Consultas Online</title>        
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
                        <div class="col-md-12 titulopagina" style="margin-top: 125px;">Consultas Online</div>
                    <div class="col-md-12">
                        <div class="btn-group" role="group" aria-label="...">                            
                            <button type="button" onclick=redirigir("listarconsultas.php")  class="btn btn-default boton">Listar Elementos</button>
                        </div>
                    </div>
                    <div class="col-md-12 subtitulopagina">
                        Lista de Elementos
                    </div>
                    <div class="col-md-12">
                    
                        <div class="panel panel-default">
                            <table class="table table-striped" style="font-family: 'Yanone Kaffeesatz', sans-serif; font-size: 16px;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th style="width: 25%">Nombre del paciente</th>
                                        <th style="width: 35%">Titulo de la Consulta</th>
                                        <th style="width: 20%">Fecha de registro</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody style="border-top: 0px;">
                                    <?php
                                        $con=Conexion();
                                        $sql_listaCONSULTAS="select * from consulta order by idconsulta DESC";
					$result_listaCONSULTAS=mysql_query($sql_listaCONSULTAS,$con) or die(mysql_error()); 
                                        
                                        
                                        if(mysql_num_rows($result_listaCONSULTAS)>0){
                                            while ($fila = mysql_fetch_assoc($result_listaCONSULTAS)) { 
                                                $sqlpaciente="select * from paciente where idpaciente='".$fila["idpaciente"]."'";
                                                $resultpaciente=mysql_query($sqlpaciente,$con) or die(mysql_error());
                                                $paciente = mysql_fetch_assoc($resultpaciente);
                                                
                                                echo "<tr>";
                                                echo "<td style='width:  5%'>".$fila["idconsulta"]."</td>";
                                                echo "<td style='width: 25%'>".$paciente["nombre"]."</td>";
                                                echo "<td style='width: 35%'>".$fila["titulo"]."</td>";
                                                echo "<td style='width: 20%'>".$fila["fechacreacion"]."</td>";
                                                echo "<td style='width: 10%'>";
                                                echo "<button type='button' onclick=redirigir('responderconsulta.php?id=".$fila["idconsulta"]."') class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Responder</button>";               
                                                echo "</td>";       
                                                echo "</tr>";                                                    
                                            }
					}	                                                                                
                                    ?>
                                </tbody>    
                            </table>
                        </div>                        
                                            
                    </div>
                </div>
            </div>
        </div>                 
    </body>    
</html>
