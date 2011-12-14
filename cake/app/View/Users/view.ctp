<div class="users view">
<h2>Usuario</h2>
	<dl><!--<?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Id</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp; -->
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nombre</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt <?php if($i % 2 == 0) echo $class; ?>>Paterno</dt>
		<dd<?php if($i++ % 2 == 0) echo $class; ?>>
			<?php echo $user['User']['middle_name']; ?>
			&nbsp;
		</dd>
		<dt <?php if($i % 2 == 0) echo $class; ?>>Materno</dt>
		<dd<?php if($i++ % 2 == 0) echo $class; ?>>
			<?php echo $user['User']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nombre/Usuario</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Correo</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		</br><h3>Datos personales</h3>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nacimiento</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['birth_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Estado Civil</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['marital_status_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Ocupaci&oacute;n</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['occupation']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Sexo</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['gender_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Ciudad</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['location_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Situaci&oacute;n Econ&oacute;mica</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['pea_situation_code']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo $current_user['name']; ?></h3>
	<ul>
	    <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
			<li><?php echo $this->Html->link('Datos Personales', array('controller'=>'TbuserInfoMaps', 'action' => 'data', $user['User']['id'])); ?> </li>
		    <li><?php echo $this->Html->link('Editar Perfil', array('action' => 'edit', $user['User']['id'])); ?> </li>
		    <li><?php echo $this->Form->postLink('Borrar Perfil', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Borrar Usuario?')); ?> </li>
		<?php endif; ?>
		
		<li><?php //echo $this->Html->link('Nuevo Usuario', array('action' => 'add')); ?> </li>
	</ul>
</div>
