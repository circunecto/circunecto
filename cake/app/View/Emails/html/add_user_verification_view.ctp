<!-- email-->
<html>
	<table width="100%">
		<tr>
			<td align="center">	
				<p>&nbsp;</p>
				<p>&nbsp;</p>	
				<span class="infosectiontitle">
					<?php echo 'Bienvenid@' . $name . ' ' . $last_name . ' ' . $middle_name ?>,
				</span>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<span class="infoverification">
					Hemos identificado que creaste una cuenta en nuestro sitio, <br>para poder finalizar el proceso de activaci&oacute;n, 
					<a href="http://beta.circunecto.com/users/confirm/<?php echo $password ?>/<?php echo $id ?>">haz clic aqu&iacute;</a>.
				</span>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<span class="infoverification">
					Si la liga no funciona copia y pega la direcci&oacute;n aqu&iacute; abajo.
				</span>
				<p>&nbsp;</p>
				<span class="infoverification">
					http://beta.circunecto.com/users/confirm/<?php echo $password ?>/<?php echo $id ?>
				</span>
			</td>
		</tr>
	</table>
</html>