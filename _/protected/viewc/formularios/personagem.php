<div id="conteudo">
	<h1 class="titulo_conteudo"><?php echo $data['titulo']; ?></h1>
	<div class='container'>
		<div class='formulario'>
			<form action="<?php echo $data['action']; ?>" method="POST" enctype="multipart/form-data">
				<h3><?php echo $data['subtitulo']; ?></h3>
				<div id="tabs">
					<ul>
					  <li><a href="#tabs-1">Personagem</a></li>
					  <li><a href="#tabs-2">Ficha</a></li>
					  <li><a href="#tabs-3">Imagens</a></li>
					  <li><a href="#tabs-4">Vantagens</a></li>
					</ul>
					<div id="tabs-1">
						<table class="novo_usuario">
							<tr>
								<td><p>Publíco</p></td>
								<td><p style="text-align: start;"><input type="checkbox" id="ativo" name="publico" value="1" checked="" style="width: 21px;"></p></td>
							</tr>
							<tr>
								<td><p>Nome</p></td>
								<td><input type="text" size="35" id="nome" name="nome" maxlength="50" value="<?php echo $data['nome']; ?>" <?php echo $data['disabled']; ?>/></td>
							</tr>							
							<tr>
								<td><p>História / Características</p></td>
								<td><textarea  name="descricao" id="descricao" <?php echo $data['disabled']; ?>><?php echo $data['descricao']; ?></textarea></td>
							</tr>
							<tr>
								<td><p>Cenário</p></td>
								<td><?php echo $data['cenarios']; ?></td>
							</tr>
						</table>
					</div>
					<div id="tabs-2">
						<table class="novo_usuario">
							<tr>
								<td><p>Ficha Publíca</p><p><input type="checkbox" id="ficha_publica" name="ficha_publica" value="0" <?php echo $data['ficha_publica']; ?> <?php echo $data['disabled']; ?>/></p></td>
								<td></td>
							</tr>
							<tr>
								<td><p>Ficha do Personagem</p></td>
								<td><input id="ficha" type="file" name="ficha[]"  <?php echo $data['disabled']; ?>/><span id="fichaview"><?php echo $data['ficha']; ?></span></td>										
							</tr>
						</table>
					</div>
					<div id="tabs-3">
						<table class="novo_usuario">
							<tr>
								<td><p>Imagem Principal</p></td>
								<td><input id="oneprodimg" type="file" name="imagem[]"  <?php echo $data['disabled']; ?>/><span id="onepreview"><?php echo $data['imagem_principal']; ?></span></td>										
							</tr>
							<tr>
								<td><p>Imagens</p></td>
								<td><input id="prodimg" type="file" name="foto[]" multiple="multiple" <?php echo $data['disabled']; ?>/><span id="preview"><?php echo $data['imagens_carregadas']; ?></span></td>										
							</tr>
						</table>
					</div>
					<div id="tabs-4">
						<td><p>Vantagens</p></td>
						<td><p><?php echo $data['vantagens']; ?></p></td>
					  </div>
					</div>
					<table class="novo_usuario">
						<tr>
							<td><input name="id" type="hidden" value="<?php echo $data['id']; ?>"/><input class='botoes' type="submit" value="<?php echo $data['acao']; ?>"/><input class='botoes' type="button" value="Cancelar" onclick="window.location.href ='<?php echo $data['baseurl']; ?>redirecionar';"/></td>							
						</tr>						
					</table>
					
			</form>
		</div>							
	</div>
</div>