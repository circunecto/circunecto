<!-- Layout-->
<html>	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style>
			<!--
				*{
				  margin: 0px;
				  padding: 0px;
				}
				
				body{
				  background: #bccecf;
				  font-family: 'Ubuntu', Arial, Helvetica, sans-serif;
				}
				
				.hidden{
				  display: none;
				}
				
				#wrapper{
				  width: 680px;
				  margin:0px auto;
				}
				
				/* -- HEADER -- */
				#header{
				  position:relative;
				}
				
				.logo{
				  background: url(http://beta.circunecto.com/img/logo-icono-080.png) no-repeat left top;
				  width: 80px;
				  height: 80px;
				  text-indent: -9999px;
				  position: absolute;
				  z-index: 1000;
				  top: 5px;
				  left: 10px;
				}
				
				#content{
				  min-height:400px;
				  background: url(http://beta.circunecto.com/img/img-division.png) no-repeat center top #fff;
				  margin-top: 20px;
				  margin-bottom: 20px;
				  position: relative;
				}
				
				.infosectiontitle{
				  color: #2D6324;
				  font-size: 17px;
				  font-weight: normal;
				  width: 265px;
				}
				
				.infoverification{
				  color: #505050;
				  font-size: 14px;
				  font-weight: normal;
				  margin-left: auto;   
				  margin-right: auto;
				}
				
				.noreply{
				  color: #5b754a;
				  font-size: 12px;
				  font-weight: normal;
				  margin-left: auto;   
				  margin-right: auto;
				}
			//-->
		</style>
	</head>
	<body>
		
		<div id="wrapper">
			<div id="content">
				<div class="logo">Circunecto</div>
				<table width="650" height="80%">
					<tr>
						<td valign="top">
							<?php echo $content_for_layout; ?><br>
						</td>
					</tr>
					<tr>
						<td valign="top" align="center">
							<p>&nbsp;</p>
							<span class="noreply">
							Este correo es enviado de manera autom&aacute;tica, por favor no responda a la cuenta, ya que el correo no ser&aacute; atendido.
							<br>
							Si desea ponerse en contacto con nosotros, env&iacute;enos un correo a <a href="mailto:contact©circunecto.com">contact@circunecto.com</a>
							</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>