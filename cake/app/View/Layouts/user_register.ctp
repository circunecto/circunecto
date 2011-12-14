<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $title_for_layout; ?>                                                                                                                
  </title>
  <?php
  echo $this->Html->meta('icon');
  echo $this->Html->css('circunecto_user_register', 'stylesheet', array('media' => 'screen'));
  echo $this->Html->css('http://fonts.googleapis.com/css?family=Ubuntu:400,500,700', 'stylesheet');
  echo $this->Html->css('jquery-ui/smoothness/jquery-ui-1.8.14.custom');
  echo $this->Html->script('jquery/jquery-1.6.1.min');
  echo $this->Html->script('jquery-ui/jquery-ui-1.8.14.custom.min');
  echo $this->Html->script('jquery.watermark/watermarkinput');
  echo $scripts_for_layout;
  ?>
  <script>
  	<!--
	  	jQuery(function($){
		   //$("#add_nombre").Watermark("Ingresa tu Nombre");
		   //$("#add_lname").Watermark("Ingresa tu Apellido Paterno");
		   //$("#add_mname").Watermark("Ingresa tu Apellido Materno");
		   //$("#add_username").Watermark("Ingresa tu Usuario");
		   //$("#add_email").Watermark("Ingresa tu Correo Electrónico");
		   //$("#add_password").Watermark("Ingresa tu Contraseña;");
		   //$("#add_password_confirm").Watermark("Ingresa tu Confirmación de Contraseña");
		});	
	//-->
  </script>
</head>
<body>

<div class="logo">Circunecto</div>

<div id="wrapper">
	<div id="content">
        <table cellspaging="0" cellpadding="0" width="100%">
            <tr>
                <td>
                	<?php echo $content_for_layout; ?>
                </td>
            </tr>
        </table>
    </div>
	<!-- content ........................................................................................................................END -->
   	<!-- End Content -->
   
    <!-- end footer -->
    <?php //echo $this->js->writeBuffer(); ?>
    <?php // echo $this->element('sql_dump'); ?> 
</div>
</body>
</html>
