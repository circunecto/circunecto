<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-mx" lang="es-mx">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $title_for_layout; ?>                                                                                                                
  </title>
  <?php
  echo $this->Html->meta('icon');
  echo $this->Html->css('circunecto_login', 'stylesheet', array('media' => 'screen'));
  echo $this->Html->css('http://fonts.googleapis.com/css?family=Ubuntu:400,500,700', 'stylesheet');
  
  /*Jquery - General*/
  echo $this->Html->css('jquery-ui/smoothness/jquery-ui-1.8.14.custom');
  echo $this->Html->script('jquery/jquery-1.6.1.min');
  echo $this->Html->script('jquery-ui/jquery-ui-1.8.14.custom.min');
  
  /*facebook js*/
  echo $this->Html->script('facebook/facebook');
  
  /*fancy box 1.3.4*/
  echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js');
  echo $this->Html->script('jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js');
  echo $this->Html->script('jquery.fancybox-1.3.4/fancybox/jquery.easing-1.3.pack.js');
  echo $this->Html->script('jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js');
  echo $this->Html->css('../js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css');
  
  /*input watermark*/
  echo $this->Html->script('jquery.watermark/watermarkinput');
  echo $scripts_for_layout;
  
  ?>
  <script>
  	<!--
	  	jQuery(function($){
		   $("#UserUsername").Watermark("Ingresar usuario o email");
		   $("#UserPassword").Watermark("password");
		});
		
		$(document).ready(function() {
			$("#boton-registrar").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'width'			: '8',
				'height'		: '5',
		        'autoScale'     : false,
		        'titleShow'     : true,
				'type'			: 'iframe',
				'autoDimensions': false,
			});
			
			$("#login-recover").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'width'			: '8',
				'height'		: '5',
		        'autoScale'     : false,
		        'titleShow'     : true,
				'type'			: 'iframe'
			});
			
		});
		
	//-->
  </script>
</head>
<body>
<div id="wrapper">
	<!-- Begin: Header -->
	<div id="header">
    	<a href="/">
        	<div class="logo">Circunecto</div>
      	</a>
    </div>
    <!-- End: Header -->
     
    <!-- content ........................................................................................................................START -->
    <!-- start content -->
    
    <div id="content">
   		<div id="info-top-wrapper">
            <h2 id="content-top">
                  <!-- span class="text-bold">Circunecto</span -->
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;La brújula impulsada por tu fuerza interior
                  <span class="text-green">
                  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;¡Conócete, Conéctate, Contacta y Consíguelo!</span>
           </h2>
        </div>
      	
        <div id="images-wrapper">
			<?php print $this->Html->image('login-unete-small.png', array('alt' => '&Uacute;nete', 'id' => 'img-unete')); ?>
            <?php print $this->Html->image('login-cuentanos-small.png', array('alt' => 'Cu&eacute;ntanos', 'id' => 'img-cuentanos')); ?>
            <?php print $this->Html->image('login-conectate-small.png', array('alt' => 'Con&eacute;ctate', 'id' => 'img-conectate')); ?>
        </div>
        
        <div id="info-bottom-wrapper">
        	<div class="secciones">
                <h2 class="heading-text">&Uacute;nete</h2>
                    <div class="info-seccion-peq">
						<span class="resaltar"><?php 
							$msg = $this->Session->flash();
							if (empty($msg)){
								echo '&nbsp;'; 
							}else{
								 echo $msg;
							} ?></span>
                    </div>
                    <p class="info-seccion">
                        <table cellspaging="0" cellpadding="0">
                            <tr>
                                <td>
                                	<?php echo $content_for_layout; ?>
                                </td>
                          		<td valign="bottom">
                                	<a href="#login" onClick="javascript:window.document.forms[0].submit();return false;" class="boton-ingresar">Ingresar</a>
                                </td>
                           </tr>
                           <tr>
                           		<td colspan="2">
                                	<br /><div class="info-seccion">No estás registrado aún?</div>
                            	</td>
                            </tr>
                            <tr>
                           		<td>
                                	<a href="add" class="boton-registrar" id="boton-registrar">Crea t&uacute; cuenta</a>
                            	</td>
                                <td valign="bottom">
                                	<div class="info-seccion">&oacute;</div>
                                </td>
                            </tr>
                            <tr>
                           		<td colspan="2">
                           			
                                	<a href="#facebook-login" onClick="javascript:return openOAuthServerFlow();">
										<?php print $this->Html->image('login-facebook.jpg', array('alt' => '&Uacute;nete', 'id' => 'img-facebook', 'border'=>'0')); ?>
                                    </a>
                                   
                                   <!--a href="http://redes.circunecto.com/facebook/authentication_server_flow.php" id="boton-facebook">
                                   		<img src="/img/login-facebook.jpg" border="0"/>
                                   </a -->
                            	</td>
                            </tr>
                            
                            
                            </tr>
                        </table>
                    </p>
             </div>
            
            <div class="secciones">
                <h2 class="heading-text">Con&oacute;cete</h2>
                <p class="info-seccion">
                	Estamos aqu&iacute; para ayudar a conocerte a trav&eacute;s de pruebas que formar&aacute;n formará parte de un <span class="resaltar">análisis competitivo</span> que ayudar&aacute;n a conocerte mejor.
					<br /><br />	
					Si estás dispuesto a colaborar junto con nosotros en <span class="resaltar">tu desarrollo profesional</span>, te invitamos a que crees tu cuenta y participes con <span class="resaltar">total sinceridad.</span>
					</p>
                </p>
            </div>
              
              
              <div class="secciones">
                <h2 class="heading-text">Con&eacute;ctate</h2>
                <p class="info-seccion">
                  Para <span class="resaltar">medir tu nivel de competitividad</span> necesitamos compararlo con <span class="resaltar">un gran grupo de personas</span>, sin importar si son grandes o peque&ntilde;os, directores o reci&eacute;n egresados, estudiantes o profesionistas.<br /><br />
                  Te <span class="resaltar">invitamos</span> a <span class="resaltar">compartirla</span> con quien tengas confianza.
                </p>
              </div>
              
        </div>
        
        <!--  start page-heading -->
        
        <!-- end page-heading -->
        
        <div class="clear">&nbsp;</div>
        
    </div>
	<!-- content ........................................................................................................................END -->
   	<!-- End Content -->
   
       
    <!-- start footer -->
    <div id="footer">
		<?php print $this->Html->link('¿Quienes somos en <span>Circunecto</span>?', '/quienes-somos', array('class' => 'footer-info', 'escape' => false)); ?> 
        | <?php print $this->Html->link('Política de privacidad', '/privacidad', array('class' => 'footer-info')); ?> 
         <?php print $this->Html->link('Circunecto', '/', array('class' => 'footer-logo')); ?> 
    </div>
    <!-- end footer -->
    <?php //echo $this->js->writeBuffer(); ?>
    <?php // echo $this->element('sql_dump'); ?> 
</div>
</body>
</html>
