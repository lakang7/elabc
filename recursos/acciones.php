<?php
    
    function Conexion(){        
        $conexion = mysql_connect("localhost", "root", "");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexion);
        mysql_select_db("elabcnaturista", $conexion);	        
	return $conexion;
    }  
    
    if($_GET["tarea"]==1){
                    $indice=$_GET["pagina"]+1;
                    $fp = fopen("precede.txt", "r");
                    $precede = fgets($fp); 
                    $con=Conexion();
                    if($_GET["clave"]==="0"){
                        $sql_listaArticulos="select * from articulo order by idarticulo DESC";
                        $result_listaArticulos=mysql_query($sql_listaArticulos,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaArticulos)>0){
                            $cont=0;
                            while ($articulo = mysql_fetch_assoc($result_listaArticulos)) {
                                if($cont>=(($indice-1)*2) && $cont<($indice*2)){
                                    $sqlAUTOR="select * from administrador where idadministrador='".$articulo["idadministrador"]."'";
                                    $resultAUTOR=mysql_query($sqlAUTOR,$con) or die(mysql_error());
                                    $autor = mysql_fetch_assoc($resultAUTOR);
                                    $dirige = str_replace(" ","-",$articulo["titulo"]);
                                    $dirige = trim($precede)."articulo/".$dirige."/".$articulo["idarticulo"];
                                    echo "<div class='artencatalogo' onclick=redirigir('".$dirige."')>";                                    
                                    echo "<div class='col-md-12' style='padding: 0px;'><img src='".$precede."/imagenes/blog/catalogo/".$articulo["imacatalogo"]."' class='img-responsive center-block' ></div>";
                                    echo "<div class='col-md-12' style='padding: 0px;'><div class='col-md-12 blog_titulo'>".$articulo["titulo"]."</div></div>";                                
                                    echo "<div class='col-md-12' style='padding: 0px; margin-top: 10px;'>";
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/calendario.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    $test = new DateTime($articulo["fechapublicacion"]);
                                    echo "<div class='col-md-10 blog_titicono center-block'>".$test->format('d M Y H:i')."</div>";
                                    echo "</div>";                                
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/lapiz.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    echo "<div class='col-md-10 blog_titicono'>".$autor["nombre"]."</div>";
                                    echo "</div>";                                
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/ojo.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    echo "<div class='col-md-10 blog_titicono'>".$articulo["numerolecturas"]." Visitas</div>";
                                    echo "</div>";                                                                                                
                                    echo "</div>";                                
                                    echo "<div class='col-md-12 blog_resumen' >".$articulo["catalogo"]."</div>";
                                    echo "<div class='col-md-12' style='padding: 0px;'>";
                                    echo "<div class='col-md-8'></div>";
                                    echo "<div class='col-md-4 blog_continuar' >Continuar Leyendo</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                $cont++;
                            }
                        }
                    }else{                    
                        $sql_listaArticulos="select articulo.idarticulo, articulo.idadministrador, articulo.titulo, articulo.fechapublicacion, articulo.catalogo, articulo.imacatalogo, articulo.numerolecturas, articulo_cat.idcatblog from articulo, articulo_cat where articulo.idarticulo = articulo_cat.idarticulo and articulo_cat.idcatblog='".$_GET["clave"]."' order by idarticulo DESC";
                        $result_listaArticulos=mysql_query($sql_listaArticulos,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaArticulos)>0){
                            $cont=0;
                            while ($articulo = mysql_fetch_assoc($result_listaArticulos)) {
                                if($cont>=(($indice-1)*2) && $cont<($indice*2)){
                                    $sqlAUTOR="select * from administrador where idadministrador='".$articulo["idadministrador"]."'";
                                    $resultAUTOR=mysql_query($sqlAUTOR,$con) or die(mysql_error());
                                    $autor = mysql_fetch_assoc($resultAUTOR);
                                    $dirige = str_replace(" ","-",$articulo["titulo"]);
                                    $dirige = trim($precede)."articulo/".$dirige."/".$articulo["idarticulo"];
                                    echo "<div class='artencatalogo' onclick=redirigir('".$dirige."')>";
                                    echo "<div class='col-md-12' style='padding: 0px;'><img src='".$precede."/imagenes/blog/catalogo/".$articulo["imacatalogo"]."' class='img-responsive center-block' ></div>";
                                    echo "<div class='col-md-12' style='padding: 0px;'><div class='col-md-12 blog_titulo'>".$articulo["titulo"]."</div></div>";                                
                                    echo "<div class='col-md-12' style='padding: 0px; margin-top: 10px;'>";
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/calendario.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    $test = new DateTime($articulo["fechapublicacion"]);
                                    echo "<div class='col-md-10 blog_titicono center-block'>".$test->format('d M Y H:i')."</div>";
                                    echo "</div>";                                
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/lapiz.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    echo "<div class='col-md-10 blog_titicono'>".$autor["nombre"]."</div>";
                                    echo "</div>";                                
                                    echo "<div class='col-md-4' style='padding: 0px;'>";
                                    echo "<div class='col-md-2' style='padding: 0px;'>";
                                    echo "<img src='".$precede."/imagenes/ojo.png' class='img-responsive center-block' />";
                                    echo "</div>";
                                    echo "<div class='col-md-10 blog_titicono'>".$articulo["numerolecturas"]." Visitas</div>";
                                    echo "</div>";                                                                                                
                                    echo "</div>";                                
                                    echo "<div class='col-md-12 blog_resumen' >".$articulo["catalogo"]."</div>";
                                    echo "<div class='col-md-12' style='padding: 0px;'>";
                                    echo "<div class='col-md-8'></div>";
                                    echo "<div class='col-md-4 blog_continuar' >Continuar Leyendo</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                $cont++;
                            }
                        }                        
                    }
        
    }    


?>