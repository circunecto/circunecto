<div class="users form">
<?php echo $this->Form->create('Recover');?>
	<table width="620" cellspacing="20">
		<tr>
			<td valign="top" align="center">
				<p>&nbsp;</p>
				<fieldset>
			 		<legend><span class="infosectiontitle">&nbsp;&nbsp;Recuperaci&oacute;n de contrase&ntilde;a.&nbsp;&nbsp;</span></legend>
				 	<span class="resaltar">
				 		<p>&nbsp;</p>
				 		<?php 
				 		echo $this->Session->flash();
						?>
				 		</span>
				 	<table cellpadding="0" cellspacing="15" width="300">	
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('password_new', array(
								'label'=>'Ingresa tu nueva contrase&ntilde;a',
								'type'=>'password',
								'class' => 'input-text',
								'id' => 'new_password'
								));
								?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<?php
								echo $this->Form->input('password_confirm', array(
								'label'=>'Confirma tu nueva contrase&ntilde;a',
								'type'=>'password',
								'class' => 'input-text',
								'id' => 'new_password_confirm'
								));
								?>
				 			</td>
				 		</tr>
				 	</table>
				 	<p>&nbsp;</p>
				 	<a href="#recover" onClick="javascript:window.document.forms[0].submit();return false;" class="botonrecover">Definir nueva contrase&ntilde;a</a>
            		<p>&nbsp;</p>
            		<p>&nbsp;</p>
				</fieldset>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end(array('label'=>'Recover', 'name'=>'Recover','div'=>array('class'=>'boton-fake')));?>
</div>

