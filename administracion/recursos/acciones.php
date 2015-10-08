<?php

    
    function Conexion(){        
        $conexion = mysql_connect("localhost", "root", "");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexion);
        mysql_select_db("elabcnaturista", $conexion);	        
	return $conexion;
    }       
    
    /*Registro de Composicion Quimica*/
    if($_GET["tarea"]==1){
        $con =  Conexion();
        $sql_insertCOMQUI = "insert into comquimica (nombre,descripcion) values ('".$_POST["nombre"]."','".$_POST["descripcion"]."');";
	$result_insertCOMQUI = mysql_query($sql_insertCOMQUI,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Composicion Quimica");
		location.href="../listarcomposicionquimica.php";
            </script>
	<?php                
    }
    
    /*Edición de Composicion Quimica*/
    if($_GET["tarea"]==2){
        $con =  Conexion();
        $sql_updateCOMQUI="update comquimica set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."' where idcomquimica='".$_GET["id"]."'";
	$result_updateCOMQUI = mysql_query($sql_updateCOMQUI,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Composicion Quimica");
		location.href="../listarcomposicionquimica.php";
            </script>
	<?php                 
    }
     
    /*Eliminación de Composicion Quimica*/
    if($_GET["tarea"]==3){
        $con =  Conexion();
        $sql_eliminaCOMQUI="delete from comquimica where idcomquimica='".$_GET["id"]."';";
	$result_eliminaCOMQUI=mysql_query($sql_eliminaCOMQUI,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Composicion Quimica");
		location.href="../listarcomposicionquimica.php";
            </script>
	<?php            
    }
    
    /*Registro de la Familia Botanica*/
    if($_GET["tarea"]==4){
        $con =  Conexion();
        $sql_insertFAMBOT = "insert into fambotanica (nombre,descripcion) values ('".$_POST["nombre"]."','".$_POST["descripcion"]."');";
	$result_insertFAMBOT = mysql_query($sql_insertFAMBOT,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Familia Botanica");
		location.href="../listarfambotanica.php";
            </script>
	<?php                
    }    
    
    /*Edición de Familia Botanica*/
    if($_GET["tarea"]==5){
        $con =  Conexion();
        $sql_updateFAMBOT="update fambotanica set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."' where idfambotanica='".$_GET["id"]."'";
	$result_updateFAMBOT = mysql_query($sql_updateFAMBOT,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Familia Botanica");
		location.href="../listarfambotanica.php";
            </script>
	<?php                 
    }    
    
    /*Eliminación de Familia Botanica*/
    if($_GET["tarea"]==6){
        $con =  Conexion();
        $sql_eliminaFAMBOT="delete from fambotanica where idfambotanica='".$_GET["id"]."';";
	$result_eliminaFAMBOT=mysql_query($sql_eliminaFAMBOT,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Familia Botanica");
		location.href="../listarfambotanica.php";
            </script>
	<?php            
    }    
    
  
    
    
    
  /*Registro de Parte de la planta*/
    if($_GET["tarea"]==7){
        $con =  Conexion();
        $sql_insertPARPLA = "insert into parplanta (nombre,descripcion) values ('".$_POST["nombre"]."','".$_POST["descripcion"]."');";
	$result_insertPARPLA = mysql_query($sql_insertPARPLA,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Parte de la planta");
		location.href="../listarparplanta.php";
            </script>
	<?php                
    }    
    
    /*Edición de Parte de la planta*/
    if($_GET["tarea"]==8){
        $con =  Conexion();
        $sql_updatePARPLA="update parplanta set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."' where idparplanta='".$_GET["id"]."'";
	$result_updatePARPLA = mysql_query($sql_updatePARPLA,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Parte de la planta");
		location.href="../listarparplanta.php";
            </script>
	<?php                 
    }    
    
    /*Eliminación de Parte de la planta*/
    if($_GET["tarea"]==9){
        $con =  Conexion();
        $sql_eliminaPARPLA="delete from parplanta where idparplanta='".$_GET["id"]."';";
	$result_eliminaPARPLA=mysql_query($sql_eliminaPARPLA,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Parte de la planta");
		location.href="../listarparplanta.php";
            </script>
	<?php            
    }     
                
  /*Registro de Propiedad Farmacologica*/
    if($_GET["tarea"]==10){
        $con =  Conexion();
        $sql_insertPROFAR = "insert into profarmacologica (nombre,descripcion,mostrar) values ('".$_POST["nombre"]."','".$_POST["descripcion"]."','".$_POST["mostrar"]."');";
	$result_insertPROFAR = mysql_query($sql_insertPROFAR,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Propiedad Farmacologica");
		location.href="../listarprofarmacologica.php";
            </script>
	<?php                
    }    
    
    /*Edición de Propiedad Farmacalogica*/
    if($_GET["tarea"]==11){
        $con =  Conexion();
        $sql_updatePROFAR="update profarmacologica set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', mostrar='".$_POST["mostrar"]."' where idprofarmacologica='".$_GET["id"]."'";
	$result_updatePROFAR = mysql_query($sql_updatePROFAR,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Propiedad Farmacologica");
		location.href="../listarprofarmacologica.php";
            </script>
	<?php                 
    }    
    
    /*Eliminación de Propiedad Farmacalogica*/
    if($_GET["tarea"]==12){
        $con =  Conexion();
        $sql_eliminaPROFAR="delete from profarmacologica where idprofarmacologica='".$_GET["id"]."';";
	$result_eliminaPROFAR=mysql_query($sql_eliminaPROFAR,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Propiedad Farmacologica");
		location.href="../listarprofarmacologica.php";
            </script>
	<?php            
    }
    
    
    /*Registro de Planta*/
    if($_GET["tarea"]==13){
        $con =  Conexion();
        $sql_insertPLANTA = "insert into planta (idfambotanica,nombrecomun,nombrecientifico,nombremostrar,organografia,originariode,imagenperfil,imagencatalogo,descripcionperfil,descripcioncatalogo,conocidacomo,precaucionesplanta,propiedadesmagicas,numerolecturas) values ('".$_POST["familiaBotanica"]."','".$_POST["nombreComun"]."','".$_POST["nombreCientifico"]."','".$_POST["nombreMostrar"]."','".$_POST["organografia"]."','".$_POST["originarioDe"]."','a','b','".$_POST["descripcionPerfil"]."','".$_POST["descripcionCatalogo"]."','".$_POST["conocidaComo"]."','".$_POST["precauciones"]."','".$_POST["propiedadesMagicas"]."',0);";	
        $result_insertPLANTA = mysql_query($sql_insertPLANTA,$con) or die(mysql_error());
        $sql_ultimaPLANTA="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'elabcnaturista' AND TABLE_NAME = 'planta';";
	$result_ultimaPLANTA=mysql_query($sql_ultimaPLANTA,$con) or die(mysql_error());	
	$fila = mysql_fetch_assoc($result_ultimaPLANTA);
        $indice=intval($fila["AUTO_INCREMENT"]);
        $indice=($indice-1);
        for($i=0;$i<count($_POST["parteUtilizada"]);$i++){
            $sql_insertPARPLA = "insert into planta_parplanta (idplanta,idparplanta) values ('".$indice."','".$_POST["parteUtilizada"][$i]."');";
            $result_insertPARPLA = mysql_query($sql_insertPARPLA,$con) or die(mysql_error());
        }  
        for($i=0;$i<count($_POST["composicionQuimica"]);$i++){
            $sql_insertCOMQUI = "insert into planta_comquimica (idplanta,idcomquimica) values ('".$indice."','".$_POST["composicionQuimica"][$i]."');";
            $result_insertCOMQUI = mysql_query($sql_insertCOMQUI,$con) or die(mysql_error());
        }  
        for($i=0;$i<count($_POST["propiedadFarmacologica"]);$i++){
            $sql_insertPROFAR = "insert into planta_profarmacologica (idplanta,idprofarmacologica) values ('".$indice."','".$_POST["propiedadFarmacologica"][$i]."');";
            $result_insertPROFAR = mysql_query($sql_insertPROFAR,$con) or die(mysql_error());
        }
                
        $target_path = "../../imagenes/plantas/catalogo/";
        $target_path = $target_path . basename( $_FILES['imagenCatalogo']['name']); 
        if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
        {             
            $sql_updatePLANTA="update planta set imagencatalogo='".$_FILES['imagenCatalogo']['name']."' where idplanta='".$indice."'";
            $result_updatePLANTA = mysql_query($sql_updatePLANTA,$con) or die(mysql_error());            
        }    
        
        $target_path = "../../imagenes/plantas/perfil/";
        $target_path = $target_path . basename( $_FILES['imagenPerfil']['name']); 
        if(move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $target_path)) 
        {             
            $sql_updatePLANTA="update planta set imagenperfil='".$_FILES['imagenPerfil']['name']."' where idplanta='".$indice."'";
            $result_updatePLANTA = mysql_query($sql_updatePLANTA,$con) or die(mysql_error());            
        }         
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Planta");
		location.href="../listarplanta.php";
            </script>
	<?php        
    }  
    
    /*Editar Planta*/
    if($_GET["tarea"]==14){
        $con =  Conexion();
        $sql_updatePLANTA="update planta set idfambotanica='".$_POST["familiaBotanica"]."', nombrecomun='".$_POST["nombreComun"]."', nombrecientifico='".$_POST["nombreCientifico"]."', nombremostrar='".$_POST["nombreMostrar"]."', organografia='".$_POST["organografia"]."', originariode='".$_POST["originarioDe"]."', descripcionperfil='".$_POST["descripcionPerfil"]."', descripcioncatalogo='".$_POST["descripcionCatalogo"]."', conocidacomo='".$_POST["conocidaComo"]."', precaucionesplanta='".$_POST["precauciones"]."', propiedadesmagicas='".$_POST["propiedadesMagicas"]."' where idplanta='".$_GET["id"]."'";
	$result_updatePLANTA = mysql_query($sql_updatePLANTA,$con) or die(mysql_error());	        

        $sql_eliminaPARPLA="delete from planta_parplanta where idplanta='".$_GET["id"]."';";
	$result_eliminaPARPLA=mysql_query($sql_eliminaPARPLA,$con) or die(mysql_error());
        for($i=0;$i<count($_POST["parteUtilizada"]);$i++){
            $sql_insertPARPLA = "insert into planta_parplanta (idplanta,idparplanta) values ('".$_GET["id"]."','".$_POST["parteUtilizada"][$i]."');";
            $result_insertPARPLA = mysql_query($sql_insertPARPLA,$con) or die(mysql_error());
        }  
        
        $sql_eliminaCOMQUI="delete from planta_comquimica where idplanta='".$_GET["id"]."';";
	$result_eliminaCOMQUI=mysql_query($sql_eliminaCOMQUI,$con) or die(mysql_error());        
        for($i=0;$i<count($_POST["composicionQuimica"]);$i++){
            $sql_insertCOMQUI = "insert into planta_comquimica (idplanta,idcomquimica) values ('".$_GET["id"]."','".$_POST["composicionQuimica"][$i]."');";
            $result_insertCOMQUI = mysql_query($sql_insertCOMQUI,$con) or die(mysql_error());
        }  
        
        $sql_eliminaPROFAR="delete from planta_profarmacologica where idplanta='".$_GET["id"]."';";
	$result_eliminaPROFAR=mysql_query($sql_eliminaPROFAR,$con) or die(mysql_error());
        for($i=0;$i<count($_POST["propiedadFarmacologica"]);$i++){
            $sql_insertPROFAR = "insert into planta_profarmacologica (idplanta,idprofarmacologica) values ('".$_GET["id"]."','".$_POST["propiedadFarmacologica"][$i]."');";
            $result_insertPROFAR = mysql_query($sql_insertPROFAR,$con) or die(mysql_error());
        }
        
        if($_FILES['imagenCatalogo']['name']){
            $target_path = "../../imagenes/plantas/catalogo/";
            $target_path = $target_path . basename( $_FILES['imagenCatalogo']['name']); 
            if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
            {             
                $sql_updatePLANTA="update planta set imagencatalogo='".$_FILES['imagenCatalogo']['name']."' where idplanta='".$_GET["id"]."'";
                $result_updatePLANTA = mysql_query($sql_updatePLANTA,$con) or die(mysql_error());            
            }             
        }
        
        if($_FILES['imagenPerfil']['name']){
            $target_path = "../../imagenes/plantas/perfil/";
            $target_path = $target_path . basename( $_FILES['imagenPerfil']['name']); 
            if(move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $target_path)) 
            {             
                $sql_updatePLANTA="update planta set imagenperfil='".$_FILES['imagenPerfil']['name']."' where idplanta='".$_GET["id"]."'";
                $result_updatePLANTA = mysql_query($sql_updatePLANTA,$con) or die(mysql_error());            
            }                     
        }
        
        mysql_close($con);                        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Planta");
		location.href="../listarplanta.php";
            </script>
	<?php         
    }
    
    /*Eliminar Planta*/
    if($_GET["tarea"]==15){
        $con =  Conexion();
        $sql_eliminaPARPLA="delete from planta_parplanta where idplanta='".$_GET["id"]."';";
	$result_eliminaPARPLA=mysql_query($sql_eliminaPARPLA,$con) or die(mysql_error());
        
        $sql_eliminaCOMQUI="delete from planta_comquimica where idplanta='".$_GET["id"]."';";
	$result_eliminaCOMQUI=mysql_query($sql_eliminaCOMQUI,$con) or die(mysql_error());
        
        $sql_eliminaPROFAR="delete from planta_profarmacologica where idplanta='".$_GET["id"]."';";
	$result_eliminaPROFAR=mysql_query($sql_eliminaPROFAR,$con) or die(mysql_error());        
        
        $sql_eliminaPLANTA="delete from planta where idplanta='".$_GET["id"]."';";
	$result_eliminaPLANTA=mysql_query($sql_eliminaPLANTA,$con) or die(mysql_error());        
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Planta");
		location.href="../listarplanta.php";
            </script>
	<?php           
        
        mysql_close($con);        
    }
    
    /*Insertar Sistema*/
    if($_GET["tarea"]==16){
        $con =  Conexion();
        $sql_insertSISTEMA = "insert into sistema(nombre,mostrar,descripcion) values ('".$_POST["nombre"]."','".$_POST["mostrar"]."','".$_POST["descripcion"]."');";
	$result_insertSISTEMA = mysql_query($sql_insertSISTEMA,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Sistema");
		location.href="../listarsistema.php";
            </script>
	<?php              
    } 
    
    /*Edición de Sistema*/
    if($_GET["tarea"]==17){
        $con =  Conexion();
        $sql_updateSISTEMA="update sistema set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', mostrar='".$_POST["mostrar"]."' where idsistema='".$_GET["id"]."'";
	$result_updateSISTEMA = mysql_query($sql_updateSISTEMA,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Sistema");
		location.href="../listarsistema.php";
            </script>
	<?php                 
    } 
    
    /*Eliminación de Composicion Quimica*/
    if($_GET["tarea"]==18){
        $con =  Conexion();
        $sql_eliminaSISTEMA="delete from sistema where idsistema='".$_GET["id"]."';";
	$result_eliminaSISTEMA=mysql_query($sql_eliminaSISTEMA,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Sistema");
		location.href="../listarsistema.php";
            </script>
	<?php            
    }    
    
    
    /*Insertar Organo*/
    if($_GET["tarea"]==19){
        $con =  Conexion();
        $sql_insertORGANO = "insert into organo(idsistema,nombre,mostrar,descripcion) values ('".$_POST["sistema"]."','".$_POST["nombre"]."','".$_POST["mostrar"]."','".$_POST["descripcion"]."');";
        $result_insertORGANO = mysql_query($sql_insertORGANO,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Organo");
		location.href="../listarorgano.php";
            </script>
	<?php              
    } 
    
    /*Edición de Organo*/
    if($_GET["tarea"]==20){
        $con =  Conexion();
        $sql_updateORGANO="update organo set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', mostrar='".$_POST["mostrar"]."', idsistema='".$_POST["sistema"]."' where idorgano='".$_GET["id"]."'";	
        $result_updateORGANO = mysql_query($sql_updateORGANO,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactorio de Organo");
		location.href="../listarorgano.php";
            </script>
	<?php                 
    } 
    
    /*Eliminación de Organo*/
    if($_GET["tarea"]==21){
        $con =  Conexion();
        $sql_eliminaORGANO="delete from organo where idorgano='".$_GET["id"]."';";
	$result_eliminaORGANO=mysql_query($sql_eliminaORGANO,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Organo");
		location.href="../listarorgano.php";
            </script>
	<?php            
    }
    
    /*Insertar Enfermedad*/
    if($_GET["tarea"]==22){
        $con =  Conexion();
        $sql_insertENFERMEDAD = "insert into enfermedad(idorgano,nombrecomun,nombrecientifico,mostrar,descripcioncatalogo,descripcionperfil,causas,sintomas,prevencion,diagnostico,ortodoxo,evitecomplicaciones,tiposde) values ('".$_POST["organo"]."','".$_POST["nombreComun"]."','".$_POST["nombreCientifico"]."','".$_POST["mostrar"]."','".$_POST["descripcionCatalogo"]."','".$_POST["descripcionPerfil"]."','".$_POST["causas"]."','".$_POST["sintomas"]."','".$_POST["prevencion"]."','".$_POST["diagnostico"]."','".$_POST["ortodoxo"]."','".$_POST["recomendaciones"]."','".$_POST["tipos"]."');";
        $result_insertENFERMEDAD = mysql_query($sql_insertENFERMEDAD,$con) or die(mysql_error());	        
        mysql_close($con);  
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Enfermedad");
		location.href="../listarenfermedad.php";
            </script>
	<?php                     
    }  
    
    /*Editar Enfermedad*/
    if($_GET["tarea"]==23){
        $con =  Conexion();
        $sql_updateENFERMEDAD = "update enfermedad set idorgano='".$_POST["organo"]."',nombrecomun='".$_POST["nombreComun"]."',nombrecientifico='".$_POST["nombreCientifico"]."',mostrar='".$_POST["mostrar"]."',descripcioncatalogo='".$_POST["descripcionCatalogo"]."',descripcionperfil='".$_POST["descripcionPerfil"]."',causas='".$_POST["causas"]."',sintomas='".$_POST["sintomas"]."',prevencion='".$_POST["prevencion"]."',diagnostico='".$_POST["diagnostico"]."',ortodoxo='".$_POST["ortodoxo"]."',evitecomplicaciones='".$_POST["recomendaciones"]."',tiposde='".$_POST["tipos"]."' where idenfermedad='".$_GET["id"]."';";
        $result_updateENFERMEDAD = mysql_query($sql_updateENFERMEDAD,$con) or die(mysql_error());	        
        mysql_close($con);  
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactorio de Enfermedad");
		location.href="../listarenfermedad.php";
            </script>
	<?php                     
    }    
    
    /*Eliminación de Enfermedad*/
    if($_GET["tarea"]==24){
        $con =  Conexion();
        $sql_eliminaENFERMEDAD="delete from enfermedad where idenfermedad='".$_GET["id"]."';";
	$result_eliminaENFERMEDAD=mysql_query($sql_eliminaENFERMEDAD,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Enfermedad");
		location.href="../listarenfermedad.php";
            </script>
	<?php            
    }
    
    /*Registro de Clasificación de metodo de preparación*/
    if($_GET["tarea"]==25){
        $con =  Conexion();
        $sql_insertCLAMET = "insert into clasificacionmetodo (nombre,mostrar,descripcion) values ('".$_POST["nombre"]."','".$_POST["mostrar"]."','".$_POST["descripcion"]."');";
	$result_insertCLAMET = mysql_query($sql_insertCLAMET,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Clasificacion de Metodo de Preparacion");
		location.href="../listarclasificacionmetodo.php";
            </script>
	<?php                
    }    
    
    
    /*Edición de Clasificación de metodo de preparación*/
    if($_GET["tarea"]==26){
        $con =  Conexion();
        $sql_updateCLAMET="update clasificacionmetodo set nombre='".$_POST["nombre"]."', mostrar='".$_POST["mostrar"]."' ,descripcion='".$_POST["descripcion"]."' where idclasificacionmetodo='".$_GET["id"]."'";
	$result_updateCLAMET = mysql_query($sql_updateCLAMET,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Clasificacion de Metodo de Preparacion");
		location.href="../listarclasificacionmetodo.php";
            </script>
	<?php                 
    }  
    
    /*Eliminación de Clasificación de metodo de preparación*/
    if($_GET["tarea"]==27){
        $con =  Conexion();
        $sql_eliminaCLAMET="delete from clasificacionmetodo where idclasificacionmetodo='".$_GET["id"]."';";
	$result_eliminaCLAMET=mysql_query($sql_eliminaCLAMET,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Clasificacion de Metodo de Preparacion");
		location.href="../listarclasificacionmetodo.php";
            </script>
	<?php            
    } 
    
    /*Registro de Metodo de preparación*/
    if($_GET["tarea"]==28){
        $con =  Conexion();
        $sql_insertMETODO = "insert into metodo (idclasificacionmetodo,nombre,mostrar,descripcioncatalogo,descripcionperfil,imagenperfil,imagencatalogo,ingredientes,procedimiento) values ('".$_POST["tipodemetodo"]."','".$_POST["nombre"]."','".$_POST["mostrar"]."','".$_POST["descripcionCatalogo"]."','".$_POST["descripcionPerfil"]."','','','".$_POST["ingredientes"]."','".$_POST["procedimiento"]."');";
	$result_insertMETODO = mysql_query($sql_insertMETODO,$con) or die(mysql_error());
        $sql_ultimoMETODO="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'elabcnaturista' AND TABLE_NAME = 'metodo';";
	$result_ultimoMETODO=mysql_query($sql_ultimoMETODO,$con) or die(mysql_error());	
	$fila = mysql_fetch_assoc($result_ultimoMETODO);
        $indice=intval($fila["AUTO_INCREMENT"]);
        $indice=($indice-1);
        
        $target_path = "../../imagenes/metodos/catalogo/";
        $target_path = $target_path . basename( $_FILES['imagenCatalogo']['name']); 
        if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
        {             
            $sql_updateMETODO="update metodo set imagencatalogo='".$_FILES['imagenCatalogo']['name']."' where idmetodo='".$indice."'";
            $result_updateMETODO = mysql_query($sql_updateMETODO,$con) or die(mysql_error());            
        }    
        
        $target_path = "../../imagenes/metodos/perfil/";
        $target_path = $target_path . basename( $_FILES['imagenPerfil']['name']); 
        if(move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $target_path)) 
        {             
            $sql_updateMETODO="update metodo set imagenperfil='".$_FILES['imagenPerfil']['name']."' where idmetodo='".$indice."'";
            $result_updateMETODO = mysql_query($sql_updateMETODO,$con) or die(mysql_error());            
        }          
        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Metodo de Preparacion");
		location.href="../listarmetodo.php";
            </script>
	<?php                
    }  
    
    /*Edición de Metodo de preparación*/
    if($_GET["tarea"]==29){
        $con =  Conexion();
        $sql_updateMETODO="update metodo set nombre='".$_POST["nombre"]."', mostrar='".$_POST["mostrar"]."' , descripcioncatalogo='".$_POST["descripcionCatalogo"]."', descripcionperfil='".$_POST["descripcionPerfil"]."', idclasificacionmetodo='".$_POST["tipodemetodo"]."', ingredientes='".$_POST["ingredientes"]."', procedimiento='".$_POST["procedimiento"]."' where idmetodo='".$_GET["id"]."'";
	$result_updateMETODO = mysql_query($sql_updateMETODO,$con) or die(mysql_error());	        
        
        if($_FILES['imagenCatalogo']['name']){
            $target_path = "../../imagenes/metodos/catalogo/";
            $target_path = $target_path . basename( $_FILES['imagenCatalogo']['name']); 
            if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
            {             
                $sql_updateMETODO="update metodo set imagencatalogo='".$_FILES['imagenCatalogo']['name']."' where idmetodo='".$_GET["id"]."'";
                $result_updateMETODO = mysql_query($sql_updateMETODO,$con) or die(mysql_error());            
            }             
        }
        
        if($_FILES['imagenPerfil']['name']){
            $target_path = "../../imagenes/metodos/perfil/";
            $target_path = $target_path . basename( $_FILES['imagenPerfil']['name']); 
            if(move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $target_path)) 
            {             
                $sql_updateMETODO="update metodo set imagenperfil='".$_FILES['imagenPerfil']['name']."' where idmetodo='".$_GET["id"]."'";
                $result_updateMETODO = mysql_query($sql_updateMETODO,$con) or die(mysql_error());            
            }                     
        }        
                
        mysql_close($con);        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Metodo de Preparacion");
		location.href="../listarmetodo.php";
            </script>
	<?php     
    } 
    
    /*Eliminación de metodo de preparación*/
    if($_GET["tarea"]==30){        
        $con =  Conexion();
        $sql_eliminaTMETODO="delete from tiposmetodo where idmetodo='".$_GET["id"]."';";
	$result_eliminaTMETODO=mysql_query($sql_eliminaTMETODO,$con) or die(mysql_error());        
        $sql_eliminaMETODO="delete from metodo where idmetodo='".$_GET["id"]."';";
	$result_eliminaMETODO=mysql_query($sql_eliminaMETODO,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Metodo de Preparacion");
		location.href="../listarmetodo.php";
            </script>
	<?php            
    }
    
    /*Registro de Tipo de metodo de preparación*/
    if($_GET["tarea"]==31){
        $con =  Conexion();
        $sql_insertTMETODO = "insert into tiposmetodo (idmetodo,nombre,descripcion,ingredientes,procedimientos) values ('".$_POST["metodo"]."','".$_POST["nombre"]."','".$_POST["descripcion"]."','".$_POST["ingredientes"]."','".$_POST["procedimiento"]."');";
	$result_insertTMETODO = mysql_query($sql_insertTMETODO,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Tipo de Metodo de Preparacion");
		location.href="../listartipometodo.php";
            </script>
	<?php                
    } 
    
    /*Edición de Tipo de metodo de preparación*/
    if($_GET["tarea"]==32){
        $con =  Conexion();
        $sql_updateTMETODO="update tiposmetodo set idmetodo='".$_POST["metodo"]."', nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', ingredientes='".$_POST["ingredientes"]."', procedimientos='".$_POST["procedimiento"]."' where idtiposmetodo='".$_GET["id"]."'";
	$result_updateTMETODO = mysql_query($sql_updateTMETODO,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Tipo de Metodo de Preparacion");
		location.href="../listartipometodo.php";
            </script>
	<?php                 
    }  
    
    /*Eliminación de tipo de metodo de preparación*/
    if($_GET["tarea"]==33){
        $con =  Conexion();
        $sql_eliminaTMETODO="delete from tiposmetodo where idtiposmetodo='".$_GET["id"]."';";
	$result_eliminaTMETODO=mysql_query($sql_eliminaTMETODO,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de tipo de Metodo de Preparacion");
		location.href="../listartipometodo.php";
            </script>
	<?php            
    } 
    
    /*Registro de asociación*/
    if($_GET["tarea"]==34){
        $con =  Conexion();
        $sql_insertASOCIACION = "insert into asociacion (idplanta,idmetodo,descripcion) values ('".$_POST["planta"]."','".$_POST["metodo"]."','".$_POST["descripcion"]."');";
	$result_insertASOCIACION = mysql_query($sql_insertASOCIACION,$con) or die(mysql_error());	        
        
        $sql_ultimaAsociacion="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'elabcnaturista' AND TABLE_NAME = 'asociacion';";
	$result_ultimaAsociacion=mysql_query($sql_ultimaAsociacion,$con) or die(mysql_error());	
	$fila = mysql_fetch_assoc($result_ultimaAsociacion);
        $indice=intval($fila["AUTO_INCREMENT"]);
        $indice=($indice-1);
        for($i=0;$i<count($_POST["enfermedad"]);$i++){
            $sql_insertASOENF = "insert into asociacion_enf (idasociacion,idenfermedad,descripcion) values ('".$indice."','".$_POST["enfermedad"][$i]."','');";
            $result_insertASOENF = mysql_query($sql_insertASOENF,$con) or die(mysql_error());
        }                        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Asociacion");
		location.href="../listarasociacion.php";
            </script>
	<?php                
    }
    
    /*Edición de asociacion*/
    if($_GET["tarea"]==35){
        $con =  Conexion();
        $sql_updateASOCIACION="update asociacion set idplanta='".$_POST["planta"]."', idmetodo='".$_POST["metodo"]."', descripcion='".$_POST["descripcion"]."' where idasociacion='".$_GET["id"]."'";
	$result_updateASOCIACION = mysql_query($sql_updateASOCIACION,$con) or die(mysql_error());	        
               
        for($i=0;$i<count($_POST["enfermedad"]);$i++){
            $sqlExiste="select * from asociacion_enf where idasociacion='".$_GET["id"]."' and idenfermedad='".$_POST["enfermedad"][$i]."'";
            $resultExiste=mysql_query($sqlExiste,$con) or die(mysql_error());
            if(mysql_num_rows($resultExiste)==0){                            
                $sql_insertASOENF = "insert into asociacion_enf (idasociacion,idenfermedad,descripcion) values ('".$_GET["id"]."','".$_POST["enfermedad"][$i]."','');";
                $result_insertASOENF = mysql_query($sql_insertASOENF,$con) or die(mysql_error());
            }
            
        }
        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Asociacion");
		location.href="../listarasociacion.php";
            </script>
	<?php                 
    }
    
    /*Eliminación de asociacion*/
    if($_GET["tarea"]==36){
        $con =  Conexion();
        
        $sql_eliminaASOENF="delete from asociacion_enf where idasociacion='".$_GET["id"]."';";
	$result_eliminaASOENF=mysql_query($sql_eliminaASOENF,$con) or die(mysql_error());        
        
        $sql_eliminaASOCIACION="delete from asociacion where idasociacion='".$_GET["id"]."';";
	$result_eliminaASOCIACION=mysql_query($sql_eliminaASOCIACION,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Asociacion");
		location.href="../listarasociacion.php";
            </script>
	<?php            
    }  
    
    /*Edición de describe asociacion*/
    if($_GET["tarea"]==37){
        $con =  Conexion();
        $sql_updateDESCRIBE="update asociacion_enf set descripcion='".$_POST["descripcion"]."' where idasociacion_enf='".$_GET["id"]."'";
	$result_updateDESCRIBE = mysql_query($sql_updateDESCRIBE,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Descripcion de Asociacion");
		location.href="../listardescibeasociacion.php";
            </script>
	<?php                 
    }   
    
    /*Eliminación de describe asociacion*/
    if($_GET["tarea"]==38){
        $con =  Conexion();
        $sql_eliminaDESCRIBE="delete from asociacion_enf where idasociacion_enf='".$_GET["id"]."';";
	$result_eliminaDESCRIBE=mysql_query($sql_eliminaDESCRIBE,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Descripcion de Asociacion");
		location.href="../listardescibeasociacion.php";
            </script>
	<?php            
    }
    
    /*Registro de Categoria de Blog*/
    if($_GET["tarea"]==39){
        $con =  Conexion();
        $sql_insertCATBLOG = "insert into catblog (nombre,descripcion) values ('".$_POST["nombre"]."','".$_POST["descripcion"]."');";
	$result_insertCATBLOG = mysql_query($sql_insertCATBLOG,$con) or die(mysql_error());	        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Categoria de blog");
		location.href="../listarcategoriablog.php";
            </script>
	<?php                
    }    
    
    /*Edición de Categoria de Blog*/
    if($_GET["tarea"]==40){
        $con =  Conexion();
        $sql_updateCATBLOG="update catblog set nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."' where idcatblog='".$_GET["id"]."'";
	$result_updateCATBLOG = mysql_query($sql_updateCATBLOG,$con) or die(mysql_error());	        
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Categoria de blog");
		location.href="../listarcategoriablog.php";
            </script>
	<?php                 
    }  
    
    /*Eliminación de Categoria de Blog*/
    if($_GET["tarea"]==41){
        $con =  Conexion();
        $sql_eliminaCATBLOG="delete from catblog where idcatblog='".$_GET["id"]."';";
	$result_eliminaCATBLOG=mysql_query($sql_eliminaCATBLOG,$con) or die(mysql_error());
        mysql_close($con);
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Categoria de blog");
		location.href="../listarcategoriablog.php";
            </script>
	<?php            
    }  
    
    /*Registro de Articulo de Blog*/
    if($_GET["tarea"]==42){
        $con =  Conexion();
        $sql_insertARTICULO = "insert into articulo (idadministrador,titulo,fechacreacion,fechapublicacion,resumen,catalogo,contenido,imaresumen,imacatalogo,imacontenido,numerolecturas) values (1,'".$_POST["titulo"]."',now(),now(),'".$_POST["resumen"]."','".$_POST["catalogo"]."','".$_POST["contenido"]."','','','',0);";
	$result_insertARTICULO = mysql_query($sql_insertARTICULO,$con) or die(mysql_error());	
        
        $sql_ultimoArticulo="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'elabcnaturista' AND TABLE_NAME = 'articulo';";
	$result_ultimoArticulo=mysql_query($sql_ultimoArticulo,$con) or die(mysql_error());	
	$fila = mysql_fetch_assoc($result_ultimoArticulo);
        $indice=intval($fila["AUTO_INCREMENT"]);
        $indice=($indice-1);
        for($i=0;$i<count($_POST["categorias"]);$i++){
            $sql_insertCATEGORIA = "insert into articulo_cat (idarticulo,idcatblog) values ('".$indice."','".$_POST["categorias"][$i]."');";
            $result_insertCATEGORIA = mysql_query($sql_insertCATEGORIA,$con) or die(mysql_error());
        }          
        
        if($_FILES['imagenResumen']['name']){
            $target_path = "../../imagenes/blog/resumen/";
            $target_path = $target_path . basename($_FILES['imagenResumen']['name']); 
            if(move_uploaded_file($_FILES['imagenResumen']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imaresumen='".$_FILES['imagenResumen']['name']."' where idarticulo='".$indice."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }
        
        if($_FILES['imagenCatalogo']['name']){
            $target_path = "../../imagenes/blog/catalogo/";
            $target_path = $target_path . basename($_FILES['imagenCatalogo']['name']); 
            if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imacatalogo='".$_FILES['imagenCatalogo']['name']."' where idarticulo='".$indice."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }        
        
        if($_FILES['imagenContenido']['name']){
            $target_path = "../../imagenes/blog/contenido/";
            $target_path = $target_path . basename($_FILES['imagenContenido']['name']); 
            if(move_uploaded_file($_FILES['imagenContenido']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imacontenido='".$_FILES['imagenContenido']['name']."' where idarticulo='".$indice."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }        
        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Registro Satisfactorio de Articulo en el Blog");
		location.href="../listararticulo.php";
            </script>
	<?php                
    } 
    
    /*Edicion de Articulo de Blog*/
    if($_GET["tarea"]==43){
        $con =  Conexion();
        $sql_updateARTICULO="update articulo set titulo='".$_POST["titulo"]."', resumen='".$_POST["resumen"]."', catalogo='".$_POST["catalogo"]."', contenido='".$_POST["contenido"]."' where idarticulo='".$_GET["id"]."'";
	$result_updateARTICULO = mysql_query($sql_updateARTICULO,$con) or die(mysql_error());	        

        $sql_eliminaARTCAT="delete from articulo_cat where idarticulo='".$_GET["id"]."';";
	$result_eliminaARTCAT=mysql_query($sql_eliminaARTCAT,$con) or die(mysql_error());
        for($i=0;$i<count($_POST["categorias"]);$i++){
            $sql_insertCATEGORIA = "insert into articulo_cat (idarticulo,idcatblog) values ('".$_GET["id"]."','".$_POST["categorias"][$i]."');";
            $result_insertCATEGORIA = mysql_query($sql_insertCATEGORIA,$con) or die(mysql_error());
        } 
        
        if($_FILES['imagenResumen']['name']){
            $target_path = "../../imagenes/blog/resumen/";
            $target_path = $target_path . basename($_FILES['imagenResumen']['name']); 
            if(move_uploaded_file($_FILES['imagenResumen']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imaresumen='".$_FILES['imagenResumen']['name']."' where idarticulo='".$_GET["id"]."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }
        
        if($_FILES['imagenCatalogo']['name']){
            $target_path = "../../imagenes/blog/catalogo/";
            $target_path = $target_path . basename($_FILES['imagenCatalogo']['name']); 
            if(move_uploaded_file($_FILES['imagenCatalogo']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imacatalogo='".$_FILES['imagenCatalogo']['name']."' where idarticulo='".$_GET["id"]."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }        
        
        if($_FILES['imagenContenido']['name']){
            $target_path = "../../imagenes/blog/contenido/";
            $target_path = $target_path . basename($_FILES['imagenContenido']['name']); 
            if(move_uploaded_file($_FILES['imagenContenido']['tmp_name'], $target_path)) 
            {             
                $sql_updateArticulo="update articulo set imacontenido='".$_FILES['imagenContenido']['name']."' where idarticulo='".$_GET["id"]."'";
                $result_updateArticulo = mysql_query($sql_updateArticulo,$con) or die(mysql_error());            
            }             
        }
        
        mysql_close($con);  
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Edicion Satisfactoria de Articulo en el Blog");
		location.href="../listararticulo.php";
            </script>
	<?php         
    
    } 
    
    /*Eliminacion de Articulo de Blog*/
    if($_GET["tarea"]==44){        
        $con =  Conexion();
        $sql_eliminaARTICULOcat="delete from articulo_cat where idarticulo='".$_GET["id"]."';";
	$result_eliminaARTICULOcat=mysql_query($sql_eliminaARTICULOcat,$con) or die(mysql_error());                
        $sql_eliminaARTICULO="delete from articulo where idarticulo='".$_GET["id"]."';";
	$result_eliminaARTICULO=mysql_query($sql_eliminaARTICULO,$con) or die(mysql_error());        
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Eliminacion Satisfactoria de Articulo");
		location.href="../listararticulo.php";
            </script>
	<?php                     
    }
    
    /*Registro de paciente*/
    if($_GET["tarea"]==45){ 
        
        $letras= array();
        $letras[0]="A";
        $letras[1]="B";
        $letras[2]="C";
        $letras[3]="D";
        $letras[4]="E";
        $letras[5]="F";
        $letras[6]="G";
        $letras[7]="H";
        $letras[8]="I";
        $letras[9]="J";
        $letras[10]="K";
        $letras[11]="L";
        $letras[12]="M";
        $letras[13]="N";
        $letras[14]="O";
        $letras[15]="P";
        $letras[16]="Q";
        $letras[17]="R";
        $letras[18]="S";
        $letras[19]="T";
        $letras[20]="U";
        $letras[21]="V";
        $letras[22]="W";
        $letras[23]="X";
        $letras[24]="Y";
        $letras[25]="Z";
        $letras[26]="0";
        $letras[27]="1";
        $letras[28]="2";
        $letras[29]="3";
        $letras[30]="4";
        $letras[31]="5";
        $letras[32]="6";
        $letras[33]="7";
        $letras[34]="8";
        $letras[35]="9";
        
        $codigo="";
        for($i=0;$i<20;$i++){
            $codigo=$codigo.$letras[rand(0,34)];
        }
        
        $con =  Conexion();
        $sql_insertPACIENTE = "insert into paciente (nombre,fechanacimiento,sexo,email,contra,ocupacion,pais,direccion,fecharegistro,codigoconfirmacion,estatuconfirmacion) values ('".$_POST["nombre"]."','".$_POST["fechanacimiento"]."','".$_POST["sexo"]."','".$_POST["correo"]."','".$_POST["contra01"]."','".$_POST["ocupacion"]."','".$_POST["pais"]."','".$_POST["direccion"]."',now(),'".$codigo."',0);";
	$result_insertPACIENTE = mysql_query($sql_insertPACIENTE,$con) or die(mysql_error());        
        
	?>
            <script type="text/javascript" language="JavaScript" >
		alert("Su registro ha sido satisfactorio, por favor confirma tu correo haciendo click en el enlace que fue le fue enviado al mail que registro.");
		location.href="../../";
            </script>
	<?php        
    }    
    
?>
