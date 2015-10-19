<?php
 
   function menu(){
       $fp = fopen("recursos/precede.txt", "r");
       $precede = fgets($fp);
       ?>
                        <div class="col-md-2 opmenuprincipal" title="Catálogo de Plantas Medicinales" onclick=redirigir("<?php echo trim($precede)."plantas-medicinales" ?>") style="padding-left: 0px; border-bottom: 3px solid #9DEB00">
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/plantasmedicinales.png">
                            </div>
                            <div class="col-md-12">
                                <label class="texto_menu center-block">Plantas Medicinales</label>
                            </div>
                        </div>  
                
                        <div class="col-md-2 opmenuprincipal" title="Lista de Enfermedades" onclick=redirigir("<?php echo trim($precede)."lista-enfermedades" ?>") style="padding-left: 0px; border-bottom: 3px solid #9DEB00">
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/listadeenfermedades.png">
                            </div>
                            <div class="col-md-12">
                                <label class="texto_menu center-block">Lista de Enfermedades</label>
                            </div>
                        </div> 
                
                        <div class="col-md-2 opmenuprincipal" title="Métodos de Preparación de las Plantas Medicinales" onclick=redirigir("<?php echo trim($precede)."metodos-preparacion-plantas-medicinales" ?>") style="padding-left: 0px; border-bottom: 3px solid #9DEB00">
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/metodosdepreparacion.png">
                            </div>
                            <div class="col-md-12">
                                <label class="texto_menu center-block">Metodos de Preparación</label>
                            </div>
                        </div>   
                
                        <div class="col-md-2 opmenuprincipal" title="Terapias Alternativas" onclick=redirigir("<?php echo trim($precede)."terapias-alternativas" ?>") style="padding-left: 0px; border-bottom: 3px solid #9DEB00">
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/terapiasalternativas.png">
                            </div>
                            <div class="col-md-12">
                                <label class="texto_menu center-block">Terapias Alternativas</label>
                            </div>
                        </div>
                
                        <div class="col-md-2 opmenuprincipal" title="Consulta un Naturopata Online" onclick=redirigir("<?php echo trim($precede)."consulta-naturista-online" ?>") style="padding-left: 0px; border-bottom: 3px solid #9DEB00">
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/consultaunnaturopata.png">
                            </div>
                            <div class="col-md-12">
                                <label class="texto_menu center-block">Consuta un Naturopata</label>
                            </div>
                        </div> 
                
                        <div class="col-md-2 opmenuprincipal" style="padding-left: 0px; border-bottom: 3px solid #9DEB00" title="Blog @elabcnaturista" onclick=redirigir("<?php echo trim($precede)."blog-medicina-natural" ?>")>
                            <div class="col-md-12">
                                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/nuestroblog.png">
                            </div>
                            <div class="col-md-12 ">
                                <label class="texto_menu center-block">Nuestras Publicaciones</label>
                            </div>
                        </div> 
<?php
   }
   
   function piepagina(){ 
       $fp = fopen("recursos/precede.txt", "r");
       $precede = fgets($fp);       
    ?>
        <div class="row" style="border-top: 5px solid #88C425; margin-top: 20px; padding-top: 0px; padding-bottom: 0px;">
            <div class="col-md-12" >
                <img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/logopiepagina.png">                               
            </div>             
        </div>
        <div class="row" style="border-bottom: 1px solid #CCCCCC; color: #000; padding-bottom: 5px;">
            <div class="col-md-12" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 16px; text-align: center" >Orientación Naturista y Dietética de Calidad</div>             
        </div>
        <div class="row" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 16px; color: #000; border-bottom: 1px solid #CCCCCC; padding-top: 3px; padding-bottom: 3px;">
            <div class="col-md-12">
                <div class="col-md-4" >
                    <div class="col-md-12"><img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/localizacion.png"></div>
                    <div class="col-md-12" style="text-align: center">Calle 2-17, La Grita Edo. Táchira Venezuela</div>
                </div>
                <div class="col-md-4" >
                    <div class="col-md-12"><img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/telefono.png"></div>
                    <div class="col-md-12" style="text-align: center">04167760764 / 02778811207</div>                                        
                </div>
                <div class="col-md-4" >
                    <div class="col-md-12"><img class="img-responsive center-block" src="<?php echo $precede;?>imagenes/arroba.png"></div>
                    <div class="col-md-12" style="text-align: center">contacto@elabcnaturista.com</div>                                         
                </div>
            </div>
        </div>
        <div class="row" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 18px; color: #000; text-align: center">
            <div class="col-md-2 opcpiepagina1" onclick=redirigir("<?php echo trim($precede)."plantas-medicinales" ?>")>Plantas Medicinales</div>
            <div class="col-md-2 opcpiepagina2" onclick=redirigir("<?php echo trim($precede)."lista-enfermedades" ?>")>Lista de Enfermedad</div>
            <div class="col-md-2 opcpiepagina3" onclick=redirigir("<?php echo trim($precede)."metodos-preparacion-plantas-medicinales" ?>")>Metodos de Preparación</div>
            <div class="col-md-2 opcpiepagina4" onclick=redirigir("<?php echo trim($precede)."terapias-alternativas" ?>")>Terapias Alternativas</div>
            <div class="col-md-2 opcpiepagina5" onclick=redirigir("<?php echo trim($precede)."consulta-naturista-online" ?>")>Consulta un Naturopara</div>
            <div class="col-md-2 opcpiepagina6" onclick=redirigir("<?php echo trim($precede)."blog-medicina-natural" ?>")>Nuestras Publicaciones</div>
        </div>
        <div class="row" style="border-top: 1px solid #CCCCCC; color: #000; padding-bottom: 30px;">
            <div class="col-md-12" style="font-family: 'Open Sans Condensed', sans-serif; font-size: 16px; text-align: center" >© 2015 @elabcnaturista. Todos los derechos reservados</div>             
        </div>


    <?php
   }

?>