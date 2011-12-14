<div class="users view">
<h2>Datos Personales</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
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
		<dt <?php if($i % 2 == 0) echo $class; ?>>Ocupacion</dt>
		<dd<?php if($i++ % 2 == 0) echo $class; ?>>
			<?php echo $user['TbuserInfoMap']['occupation']; ?>
			&nbsp;
		</dd>
		<dt <?php if($i % 2 == 0) echo $class; ?>>Sexo</dt>
		<dd<?php if($i++ % 2 == 0) echo $class; ?>>
			<?php echo $user['TbuserInfoMap']['gender_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Ciudad</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['location_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Situacion/econo</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['TbuserInfoMap']['pea_situation_code']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
	    <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
		    <li><?php echo $this->Html->link('Editar', array('controller'=>'TbuserInfoMaps', 'action' => 'editdata', $user['User']['id'])); ?> </li>
		    <li><?php echo $this->Form->postLink('Borrar Perfil', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Borrar Usuario?')); ?> </li>
		<?php endif; ?>
		<?php $id = $user['User']['id'] ?>
		<li><?php echo $this->Html->link('Mi Perfil', array('action' => "view/$id")); ?> </li>
		<li><?php //echo $this->Html->link('Nuevo Usuario', array('action' => 'add')); ?> </li>
	</ul>
</div>
