<!-- email-->
<html>
	<table width="100%">
		<tr>
			<td align="center">	
				<p>&nbsp;</p>
				<p>&nbsp;</p>	
				<span class="infosectiontitle">
					<?php echo 'Hola ' . $name . ' ' . $last_name . ' ' . $middle_name ?>,
				</span>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<span class="infoverification">
					Hemos recibido una solicit&uacute;d para recuperar tu contrase&ntilde;a de acceso.<br> 
					<a href="http://beta.circunecto.com/users/recoverpwd/<?php echo $password ?>/<?php echo $id ?>">haz clic aqu&iacute;</a> para iniciar el proceso de recuperaci&oacute;n.
				</span>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<span class="infoverification">
					Si la liga no funciona copia y pega la direcci&oacute;n aqu&iacute; abajo.
				</span>
				<p>&nbsp;</p>
				<span class="infoverification">
					http://beta.circunecto.com/users/recoverpwd/<?php echo $password ?>/<?php echo $id ?>
				</span>
			</td>
		</tr>
	</table>
</html>