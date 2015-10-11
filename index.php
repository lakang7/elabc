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
            
        ?>
        <meta charset="UTF-8">
        <title>@elabcnaturista</title>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $precede; ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="<?php echo $precede; ?>estilos/estiloestrucutra.css" rel='stylesheet' type='text/css'>
    
    </head>
    <body>
<div id="fb-root"></div>        
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3"><img onclick=redirigir("<?php echo trim($precede) ?>") class="img-responsive center-block opmenuprincipal" src="imagenes/logoelabcnaturista.png"></div>
                <div class="col-md-9" style="text-align: right; font-family: 'Open Sans Condensed', sans-serif; font-size: 14px; margin-bottom: 10px">Ciudad de Mexico, 18 de Agosto de 2015</div>                                
                <div class="col-md-9">
                    <div class="row">
                        <?php menu();  ?>                                          
                    </div>                                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                        $sqlConsejo="select * from consejo;";
                        $resutlConsejo=mysql_query($sqlConsejo,$con) or die(mysql_error());
                        $numeroConsejos=mysql_num_rows($resutlConsejo);
                        //echo "El numero de consejos es: ".$numeroConsejos;
                        if($numeroConsejos>0){
                            $seleccionado=rand(0,($numeroConsejos-1));
                            //echo "El numero random es: ".$seleccionado;
                            $cont=0;
                            $band=0;
                            while ($consejo=mysql_fetch_assoc($resutlConsejo)) {
                                if($cont==$seleccionado){                                    
                                    echo "<div class='col-md-12' style='padding: 0px'>";
                                    echo "<img class='img-responsive center-block' src='".trim($precede)."imagenes/consejos/".$consejo["imagen"]."' >";
                                    echo "</div>";
                                    echo "<div class='col-md-12' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; font-size: 19px;text-align: justify; \"><b>".$consejo["titulo"]."</b></div>";
                                    echo "<div class='col-md-12' style=\"padding: 0px; font-family: 'Open Sans Condensed', sans-serif; font-size: 18px;text-align: justify; \">".$consejo["descripcion"]."</div>";                                    
                                }
                                $cont++;
                            }
                        }
                    ?>
                
                </div>
                <div class="col-md-6" >                                                               
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >                    
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                
                            <?php                    
                                $sqlultimos="select * from articulo order by idarticulo desc;";
                                $resultultimos=mysql_query($sqlultimos,$con) or die(mysql_error());
                                if(mysql_num_rows($resultultimos)>0){
                                    $cont=0;
                                    while (($ultimo = mysql_fetch_assoc($resultultimos))and $cont<3) {
                                        if($cont==0){
                                           echo "<div class='item active'>"; 
                                        }else{
                                           echo "<div class='item'>"; 
                                        }    
                                        $dirige = str_replace(" ","-",$ultimo["titulo"]);
                                        echo "<img style='cursor: pointer' src='".trim($precede)."imagenes/blog/resumen/".$ultimo["imaresumen"]."' onclick=redirigir('".trim($precede)."articulo/".$dirige."/".$ultimo["idarticulo"]."')>";
                                        echo "<div class='carousel-caption'>";
                                        echo "<div class='titulo_carousel' style='cursor: pointer' onclick=redirigir('".trim($precede)."articulo/".$dirige."/".$ultimo["idarticulo"]."')>".$ultimo["titulo"]."</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        $cont++;
                                    }   
                                }
                            ?>                                                                                            
                            </div>                                                            
                        </div>                                                                                                                                                       
                </div>
                <div class="col-md-3">
                    <div style="font-family: 'Open Sans Condensed', sans-serif; font-size: 18px; text-align: justify"><img src="imagenes/quimica.png" style="float: left; margin-right: 10px; margin-bottom: 5px;"><b>Las plantas expectorantes</b> tienen la propiedad de provocar o promover la expulsión de las secreciones bronquiales acumuladas. Son el tratamiento de elección para tos productiva. Comúnmente suelen estar compuestos por mucolíticos. Los plantas expectorantes deben administrarse con abundante líquido. Las hierbas expectorantes son ideales para eliminar esas molestas mucosidades que se acumulan en los pulmones durante los resfriados. Por eso mismo, nada mejor que tener unas buenas plantas medicinales. </div>                        
                </div>                 
        </div>
        <div class="row" >
            <div class="col-md-3">
                
                    <?php
                        $sqlSabias="select * from sabiasque;";
                        $resutlSabias=mysql_query($sqlSabias,$con) or die(mysql_error());
                        $numeroSabias=mysql_num_rows($resutlSabias);
                        //echo "El numero de consejos es: ".$numeroConsejos;
                        if($numeroSabias>0){
                            $seleccionado=rand(0,($numeroSabias-1));
                            //echo "El numero random es: ".$seleccionado;
                            $cont=0;
                            $band=0;
                            while ($sabias=mysql_fetch_assoc($resutlSabias)) {
                                if($cont==$seleccionado){                                    
                                    echo "<div class='col-md-12 subtitulo_principal'>¿Sabias que?</div>";
                                    echo "<div class='top4_resumen'>".$sabias["descripcion"]."</div>";
                                    echo "<img class='img-responsive center-block' src='".trim($precede)."imagenes/sabiasque/".$sabias["imagen"]."'>";
                                }
                                $cont++;
                            }
                        }
                    ?>                
                
                
            </div>
            <div class="col-md-9"  >
                <div class="col-md-12 subtitulo_principal">Nuestros Articulos Más Leidos</div>
                <?php                    
                    $sqlmasleidos="select * from articulo order by numerolecturas desc;";
                    $resultmasleidos=mysql_query($sqlmasleidos,$con) or die(mysql_error());
                    if(mysql_num_rows($resultmasleidos)>0){
                        $cont=0;
                        while (($masleido = mysql_fetch_assoc($resultmasleidos))and $cont<4) {
                            $dirige = str_replace(" ","-",$masleido["titulo"]);
                            echo "<div class='col-md-3 opmenuprincipal' style='padding: 5px;' onclick=redirigir('".trim($precede)."articulo/".$dirige."/".$masleido["idarticulo"]."')>";
                            echo "<img class='img-responsive center-block' src='".trim($precede)."imagenes/blog/resumen/".$masleido["imaresumen"]."' >";
                            echo "<div class='top4_titulo' style='margin-top: 5px;text-align: justify'><h4 style='float: left; font-size: 45px; line-height: 15px; margin-right: 5px;'>0".($cont+1)."</h4>".$masleido["titulo"]."</div>";
                            echo "<div class='top4_resumen' style='margin-top: 5px;'>".$masleido["resumen"]."</div>";
                            echo "</div>";                                                                                    
                            $cont++;
                        }   
                    }
                ?>
                                              
            </div>
        </div>
        <?php piepagina();  ?>
   </div>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.carousel-example-generic').carousel();
        });                        
    </script> 
    </body>
</html>
