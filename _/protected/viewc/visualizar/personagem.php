<div id="conteudo">
	<div class='container'>
		<div class='formulario'>
			<div id="tabs">
				<ul>
				  <li><a href="#tabs-1">Personagem</a></li>
				  <li><a href="#tabs-2">Vantagens</a></li>
				  <li><a href="#tabs-3">Poderes</a></li>
				  <li><a href="#tabs-4">Extras</a></li>
				</ul>
				<div id="tabs-1">
					<div style='position:relative;display: block;'><img class='imagemPersonagem' src='<?php echo $data['imagem_principal']; ?>' /><?php echo $data['morto']; ?></div>
					<h1 class='titulo'><?php echo $data['nome']; ?></h1>
					<h2 class='descricao'><?php echo $data['descricao']; ?></h2>
					<p class='galeria'><?php echo $data['imagens_carregadas']; ?></p>
					<p><?php echo $data['ficha2']; ?></p>
				</div>
				<div id="tabs-2">
				    <p><?php echo $data['vantagens']; ?></p>
				</div>
				<div id="tabs-3">
				  <p>Em desenvolvimento</p>
				</div>
				<div id="tabs-4">
				  <p>Em desenvolvimento</p>
				</div>
			  </div>
		</div>							
	</div>
</div>