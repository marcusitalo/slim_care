<div id="conteudo">
	<div class='container'>
		<div class='formulario'>
			<div style='position:relative;display: block;'><img class='imagemPersonagem' src='<?php echo $data['imagem_principal']; ?>' /><?php echo $data['morto']; ?></div>
			<h1 class='titulo'><?php echo $data['nome']; ?></h1>
			<h2 class='descricao'><?php echo $data['descricao']; ?></h2>
			<p class='galeria'><?php echo $data['imagens_carregadas']; ?></p>			
		</div>							
	</div>
</div>