<div class="users form">
<?php echo $this->Form->create('User');?>
	<table width="620" cellspacing="20">
		<tr>
			<td valign="top">
				<fieldset>
			 		<legend><span class="infosectiontitle">&nbsp;&nbsp;Informaci&oacute;n b&aacute;sica&nbsp;&nbsp;</span></legend>
				 	<table cellpadding="0" cellspacing="15" width="300">	
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('name', array(
								'label'=>'Nombre',
								'class' => 'input-text',
								'id' => 'add_nombre'
								));
								?>
				 			</td>
				 		</tr>
						<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('last_name', array(
								'label'=>'Apellido Paterno',
								'class' => 'input-text',
								'id' => 'add_lname'
								));
								?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('middle_name', array(
								'label'=>'Apellido Materno',
								'class' => 'input-text',
								'id' => 'add_mname'
								));
								?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('email', array(
								'label'=>'Correo electr&oacute;nico',
								'class' => 'input-text',
								'id' => 'add_email'
								));
								?>
				 			</td>
				 		</tr>
					</table>
				</fieldset>
			</td>
			<td valign="top">
				<fieldset>
			 		<legend><span class="infosectiontitle">&nbsp;&nbsp;Informaci&oacute;n de acceso&nbsp;&nbsp;</span></legend>
				 	<table cellpadding="0" cellspacing="15" width="300">	
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('username', array(
								'label'=>'Nombre de usuario',
								'class' => 'input-text',
								'id' => 'add_username'
								));
								?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('password', array(
								'label'=>'Contrase&ntilde;a',
								'class' => 'input-text',
								'id' => 'add_password'
								));
								?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('password_confirmation', array(
								'label'=>'Confirmar Contrase&ntilde;a', 
								'type'=>'password',
								'class' => 'input-text',
								'id' => 'add_password_confirm'
								));
								?>
				 			</td>
				 		</tr>
					</table>
				</fieldset>
				<ledgend class="infoseccionfooter">* Datos obligatorios</ledgend>
			</td>
		</tr>
		<tr>
			<td colspan="2" valign="bottom" align="center">
				<p>&nbsp;</p>
            	<a href="#login" onClick="javascript:window.document.forms[0].submit();return false;" class="boton">Crear cuenta</a>
            </td>
		</tr>
	</table>
	<?php echo $this->Form->end(array('label'=>'Crear', 'name'=>'Crear','div'=>array('class'=>'boton-fake')));?>
</div>

