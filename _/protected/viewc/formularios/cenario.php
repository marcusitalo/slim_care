<div id="conteudo">
	<h1 class="titulo_conteudo"><?php echo $data['titulo']; ?></h1>
	<div class='container'>
		<div class='formulario'>
			<form action="<?php echo $data['action']; ?>" method="POST" enctype="multipart/form-data">
				<h3><?php echo $data['subtitulo']; ?></h3>
				<table class="novo_usuario">
							<tr>
								<td><p>Ativo</p><p><input type="checkbox" id="ativo" name="ativo" value="1" <?php echo $data['ativo']; ?> <?php echo $data['disabled']; ?>/></p></td>
								<td></td>
							</tr>
							<tr>
								<td><p>Titulo</p></td>
								<td><input type="text" size="35" id="titulo" name="ctitulo" maxlength="50" value="<?php echo $data['ctitulo']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr>
								<td><p>Descrição do Cenário</p></td>
								<td><textarea  name="cenario" id="cenario" <?php echo $data['disabled']; ?>><?php echo $data['cenario']; ?></textarea></td>
							</tr>
							<tr>
								<td><p>Imagens</p></td>
								<td><input id="prodimg" type="file" name="foto[]" multiple="multiple" <?php echo $data['disabled']; ?>/><span id="preview"><?php echo $data['imagens_carregadas']; ?></span></td>										
							</tr>
							<tr>
								<td><input name="id" type="hidden" value="<?php echo $data['id']; ?>"/></td>
								<td><input class='botoes' type="submit" value="<?php echo $data['acao']; ?>"/><input class='botoes' type="button" value="Cancelar" onclick="window.location.href ='<?php echo $data['baseurl']; ?>redirecionar';"/></td>
							</tr>	
						</table>		
			</form>
		</div>							
	</div>
</div>