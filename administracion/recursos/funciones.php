<?php

    function Conexion(){
        $fp = fopen("../recursos/precede.txt", "r");
        $precede = fgets($fp);
        $atributos= fgets($fp);        
        $conexion = mysql_connect("localhost", "root", "");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexion);
        mysql_select_db("elabcnaturista", $conexion);	        
	return $conexion;
    }
    
    function Menu(){
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarcomposicionquimica.php')>Composicion Quimica</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarfambotanica.php')>Familia Botanica</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarparplanta.php')>Partes de la Planta</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarprofarmacologica.php')>Propiedad Farmacologica</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarplanta.php')>Plantas Medicinales</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarsistema.php')>Sistemas del Cuerpo Humano</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarorgano.php')>Organos del Cuerpo Humano</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarenfermedad.php')>Enfermedades</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarclasificacionmetodo.php') >Clasificación de los metodos de preparación</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarmetodo.php') >Metodos de Preparación</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listartipometodo.php')>Tipos de Método de Preparación</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarasociacion.php')>Asociaciones Planta-Enfermedad-Metodo</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listardescibeasociacion.php')>Describe Asociacion</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarcategoriablog.php')>Categorias del Blog</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listararticulo.php') >Articulos del Blog</div>";
        echo "<div class='col-md-12 itemMenu' onclick=redirigir('listarconsultas.php') style='border-bottom: 1px solid #CCCCCC' >Consultas On-line</div>";
    }
    
    function calcular_edad($fecha){
        $dias = explode("-", $fecha, 3);
        $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
        $edad = (int)((time()-$dias)/31556926 );
        return $edad;
    }    

?>