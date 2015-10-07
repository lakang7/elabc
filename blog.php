<?php session_start(); ?>
<html>
    <head>
        <script type="text/javascript" language="JavaScript" >
            function redirigir(direccion){
                location.href=direccion;
            }		
        </script>
        <?php        
            require_once("recursos/funciones.php");
            $fp = fopen("recursos/precede.txt", "r");
            $precede = fgets($fp);
            $atributos= fgets($fp);
            $conecta=explode("|",$atributos);
            $con = mysql_connect($conecta[0],$conecta[1],$conecta[2]);
            mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);
            mysql_select_db($conecta[3], $con);
            
            $titulo="Blog @elabcnaturista Consejos de Medicina Natural, Nutrición y Dietetica";
            if($_GET["clave"]!="0"){
                $sqlcate="select * from catblog where idcatblog='".$_GET["clave"]."'";
                $resultcate=mysql_query($sqlcate,$con) or die(mysql_error()); 
                $cate = mysql_fetch_assoc($resultcate);
                $titulo="Blog @elabcnaturista Consejos de Medicina Natural, Nutrición y Dietetica | ".$cate["nombre"];
            }
            
            
        ?>
        <meta charset="UTF-8">
        <title><?php echo $titulo ?></title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $precede; ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
        
        <script type="text/javascript" src="recursos/jquery-2.1.4.js"></script>
                        
    </head>
    <body>
        <div class="container">
            
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="<?php echo $precede; ?>imagenes/logoelabcnaturista.png"></div>
                <div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                
                <div class="col-md-9">
                    <div class="row">
                        <?php menu(); ?>                                              
                    </div>                                        
                </div>
            </div>
        <div class="row" style="margin-bottom: 100px;">

            <div class="col-md-9" id="articulos">                    
                <input type="hidden" name="paginaactual" id="paginaactual" value="1" />
                <input type="hidden" name="categoactual" id="categoactual" value="<?php echo $_GET["clave"]; ?>" />
                <?php 
                    if($_GET["clave"]==="0"){
                        $sql_listaArticulos="select * from articulo order by idarticulo DESC";
                        $result_listaArticulos=mysql_query($sql_listaArticulos,$con) or die(mysql_error());
                        if(mysql_num_rows($result_listaArticulos)>0){
                            $cont=0;
                            while ($articulo = mysql_fetch_assoc($result_listaArticulos)) {
                                if($cont<2){
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
                                if($cont<2){
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
                
                ?>
                
            </div>
            <div class="col-md-3">  
                <div class="col-md-12 subtitulo_principal" style="border-bottom: 1px solid #CCCCCC; margin-bottom: 0px;">Categorias</div>               
                <?php
                    $sql_listaCATEGORIA="select * from catblog order by nombre";
                    $result_listaCATEGORIA=mysql_query($sql_listaCATEGORIA,$con) or die(mysql_error());
                    if(mysql_num_rows($result_listaCATEGORIA)>0){
                        while ($fila = mysql_fetch_assoc($result_listaCATEGORIA)) {
                            $apunta=trim($precede)."blog-medicina-natural/".str_replace(" ","-",trim($fila["nombre"]))."/".$fila["idcatblog"];
                            echo "<div onclick=redirigir('".$apunta."') class='col-md-12 opcion_menu_lateral'  title='".$fila["descripcion"]."'>".$fila["nombre"]."</div>";
                        }
                    }                     
                ?>
                
            <div class="col-md-12" style="background-color: #eae6e7; padding-top: 10px; padding-bottom: 15px; margin-top: 15px;">
                <div class="col-md-1"></div>
                <div class="col-md-10 subscribete_tit">¡Subscribete y recibe notificaciones en tu correo cada vez que publiquemos un nuevo articulo!</div>                
                <div class="col-md-12 subscribete_tit" style="margin-top: 10px; padding: 0px;"><input type="email" class="form-control" id="email" placeholder="Ingresa tú email"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6 subscribete_boton" style="margin-top: 10px; background-color: #CCCCCC; padding-top: 5px; padding-bottom: 5px;">Suscribirse</div>                
            </div>                
                
            </div>            
            <!--<div class="col-md-3" style="background-color: #eae6e7; padding-top: 10px; padding-bottom: 15px">
                <div class="col-md-1"></div>
                <div class="col-md-10 subscribete_tit">¡Subscribete y recibe notificaciones en tu correo cada vez que publiquemos un nuevo articulo!</div>                
                <div class="col-md-12 subscribete_tit" style="margin-top: 10px; padding: 0px;"><input type="email" class="form-control" id="email" placeholder="Ingresa tú email"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6 subscribete_boton" style="margin-top: 10px; background-color: #CCCCCC; padding-top: 5px; padding-bottom: 5px;">Suscribirse</div>
                
            </div>-->
        </div>      
            <?php piepagina(); ?>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            
            function cargardatos(){
                $.get("//127.0.0.1:8080/elabc/recursos/acciones.php?tarea=1&clave="+document.getElementById("categoactual").value+"&pagina="+document.getElementById("paginaactual").value,
                function(data){
                   if (data != "") {
                        $(".artencatalogo:last").after(data);
                        document.getElementById("paginaactual").value=parseInt(document.getElementById("paginaactual").value)+1;
                    }
                });
            }            
            
            $(window).scroll(function(){
                if(($(window).scrollTop()+window.innerHeight)===$(document).height()){
                    cargardatos();
                }           
            }); 
            
        });
        </script>
    </body>
    
    
    
</html>