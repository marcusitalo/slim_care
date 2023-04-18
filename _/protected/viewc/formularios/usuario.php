<div id="conteudo">
	<h1 class="titulo_conteudo"><?php echo $data['titulo']; ?></h1>
	<div class='container'>
		<div class='formulario'>
			<form action="<?php echo $data['action']; ?>" method="POST" enctype="multipart/form-data">
				<h3><?php echo $data['subtitulo']; ?></h3>
				<table class="novo_usuario">
							<?php echo $data['foto']; ?>
							<tr colspan='3'>
								<td><p>Nome</p></td>
								<td><input type="text" size="35" id="nome" name="nome" maxlength="50" value="<?php echo $data['nome']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr colspan='3'>
								<td><p>Login</p></td>
								<td><input type="text" size="35" name="login" id="login" maxlength="50" value="<?php echo $data['login']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr colspan='3'>
								<td><p>Senha</p></td>
								<td><input type="password" size="35" name="senha" id="senha" maxlength="50" value="<?php echo $data['senha']; ?>" <?php echo $data['disabled']; ?>/>
								<span class="viewpass" title="Clique para conferir a Senha digitada."></span></td>
							</tr>
							<tr colspan='3'>
								<td><p>Confirma a Senha</p></td>
								<td><input type="password" size="35" name="confirmacaosenha" id="confirmacaosenha" maxlength="50" value="<?php echo $data['senha']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr colspan='3'>
								<td><p>Email</p></td>	
								<td><input type="text" size="35" name="email" maxlength="50" value="<?php echo $data['email']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr>
								<td><input onclick="window.location.href ='<?php echo $data['desativar']; ?>'" type='button' class='botoes' value='Desativar' style="background-color: brown;"/><input name="id" type="hidden" value="<?php echo $data['id']; ?>"/></td>
								<td><input class='botoes' type="submit" value="<?php echo $data['acao']; ?>"/><input class='botoes' type="button" value="Cancelar" onclick="window.location.href ='<?php echo $data['baseurl']; ?>redirecionar';"/></td>					        
							</tr>
						</table>		
			</form>
		</div>							
	</div>
</div>