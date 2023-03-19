<div id="conteudo">
	<h1 class="titulo_conteudo"><?php echo $data['titulo']; ?></h1>
	<div class='container'>
		<div class='formulario'>
			<form action="<?php echo $data['action']; ?>" method="POST" enctype="multipart/form-data">
				<h3><?php echo $data['subtitulo']; ?></h3>
				<table class="novo_usuario">
							<tr>
								<td><p>Publíco</p><p><input type="checkbox" id="ativo" name="publico" value="1" <?php echo $data['publico']; ?> <?php echo $data['disabled']; ?>/></p></td>
								<td></td>
							</tr>
							<tr>
								<td><p>Nome</p></td>
								<td><input type="text" size="35" id="nome" name="nome" maxlength="50" value="<?php echo $data['nome']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>
							<tr>
								<td><p>Cenário</p></td>
								<td><?php echo $data['cenarios']; ?></td>
							</tr>
							<tr>
								<td><p>História / Características</p></td>
								<td><textarea  name="descricao" id="descricao" <?php echo $data['disabled']; ?>><?php echo $data['descricao']; ?></textarea></td>
							</tr>
							<tr>
								<td><p>Imagem Principal</p></td>
								<td><input id="oneprodimg" type="file" name="imagem[]"  <?php echo $data['disabled']; ?>/><span id="onepreview"><?php echo $data['imagem_principal']; ?></span></td>										
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