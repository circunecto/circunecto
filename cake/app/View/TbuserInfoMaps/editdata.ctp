<div class="tbuserinfomaps	 form">
<?php echo $this->Form->create('TbuserInfoMap');?>
	<fieldset>
 		<legend>Editar Datos Personales</legend>
	<?php
		echo $this->Form->input('birth_date', array('label'=>'nacimiento'));
		echo $this->Form->input('marital_status_code', array('label'=>'Estado Civil', 'tipe'));
		echo $this->Form->input('occupation', array('label'=>'Ocupaci&oacute;n'));
		echo $this->Form->input('gender_code', array('label'=>'Sexo'));
		echo $this->Form->input('location_id', array('label'=>'Ciudad'));
		echo $this->Form->input('pea_situation_code', array('label'=>'Situaci&oacute;n Econo')); ?>
	
	</fieldset>
<?php echo $this->Form->end('Listo');?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
			<?php //$id = $current_user['id']; ?>
		<li><?php echo $this->Html->link('Perfil', array('controller'=>'Users', 'action' => 'view/'.$current_user['id'])); ?> </li>
		
	</ul>
</div>
