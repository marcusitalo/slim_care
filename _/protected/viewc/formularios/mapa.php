<div id="conteudo">
	<div class='container'>
		<div class='formulario'>	
			<div id="mapardil"></div>
			<div id="jMapaModal">
				<div id="jMapaTable">
					<fieldset>
						<legend>Titulo</legend>
						<input type="text" class="jMapaTitle" />
					</fieldset>
					<fieldset class='jMapaFluid'>
						<legend>Informações</legend>
						<textarea  class="jMapaData" ></textarea>
					</fieldset>
					<fieldset class='jMapaFluid'>
						<legend>Personalidades</legend>
						<textarea  class="jMapaPeople" ></textarea>
					</fieldset>
					<fieldset class='jMapaFluid'>
						<legend>Distâncias</legend>
						<textarea  class="jMapaLocation" ></textarea>
					</fieldset>
					<fieldset class='jMapaFluid'>
						<legend>Informações</legend>
						<textarea  class="jMapaMore" ></textarea>
					</fieldset>
					<fieldset>
						<legend>Opções</legend>
						<input type="button" value="Salvar" class="jMapaInput jMapaSalvar"/>
						<input type="button" value="Apagar" class="jMapaInput jMapaDelete"/>
						<input type="button" value="Cancelar" class="jMapaInput jMapaCancelar"/>
					</fieldset>					
				</div>
			</div>		
		</div>							
	</div>
	<?php echo $data['informacoes']; ?>
</div>
<script type="text/javascript" src="<?php echo $data['baseurl']; ?>global/js/mapa.js"></script>