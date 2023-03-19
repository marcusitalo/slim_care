<div id="conteudo">
	<div class='container'>
		<div class='formulario'>			
		<section class="container">
		    <div id="cube" class="show-front">
		      <figure class="front"><span class='a1'></span><span class='a2'></span><span class='a3'></span></figure>
		      <figure class="back"><span class='a4'></span><span class='a5'></span><span class='a6'></span></figure>
		      <figure class="right"><span class='a7'></span><span class='a8'></span></figure>
		      <figure class="left"><span class='a9'>9</span><span class='a10'></span></figure>
		      <figure class="top"><span class='a11'></span></figure>
		      <figure class="bottom"><span class='a12'></span></figure>
		    </div>
		  </section>
		  <section id="options">
		    <p id="show-buttons">
		      <button class="show-front">Lado Esquerdo</button>
		      <button class="show-back">Lado Direito</button>
		      <button class="show-right">Lado da Trás</button>
		      <button class="show-left">Lado de Frente</button>
		      <button class="show-top">Em Cima</button>
		      <button class="show-bottom">Baixo</button>
		    </p>
		    <p>
		      <button id="toggle-backface-visibility">Toggle Backface Visibility</button>
		    </p>
		  </section>
		 <div class="painelArtilheiros">
		  <div class="posicionamento">
		      <div class='posicaoArtilhaeiro' data-class='show-front'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-front'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-front'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-back'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-back'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-back'></div>      
		      <div class='posicaoArtilhaeiro' data-class='show-right'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-right'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-left'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-left'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-top'></div>
		      <div class='posicaoArtilhaeiro' data-class='show-bottom'></div>      
		  </div>
		  </div>					
		</div>							
	</div>
	<?php echo $data['informacoes']; ?>
</div>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/nave.js"></script>