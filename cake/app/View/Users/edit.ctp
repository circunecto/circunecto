<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend>Editar Usuario</legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('middle_name', array('label'=>'Apellido Paterno'));
		echo $this->Form->input('last_name', array('label'=>'Apellido Materno'));
		echo $this->Form->input('username', array('label'=>'Numbre/Usuario'));
		echo $this->Form->input('email', array('label'=>'Correo')); ?>
	<h3 align="center"> Datos Personales </h3>
	<?php
		echo $this->Form->input('birth_date', array('label'=>'Fecha de nacimiento'));
		echo $this->Form->input('marital_status_code', array('label'=>'Estado Civil'));
		echo $this->Form->input('occupation', array('label'=>'Ocupacion'));
		echo $this->Form->input('gender_code', array('label'=>'Sexo'));
		echo $this->Form->input('location_id', array('label'=>'Ciudad'));
		echo $this->Form->input('pea_situation_code', array('label'=>'Situaci&oacute;n econ&oacute;mica'));
	?>
	</fieldset>
<?php echo $this->Form->end('Listo');?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php //echo $this->Html->link('Editar Perfil', array('action' => 'profile', $user['User']['id'])); ?> </li>
		
	</ul>
</div>
