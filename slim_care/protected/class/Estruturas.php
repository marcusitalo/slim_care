<?php
class Estruturas
{

	static function construirListaDeRegras($base, $informacoes, $dados, $cenario = array())
	{

		$retorno = "<div id='lista_exibicao'>";
		$retorno .= "<div class='formview'>";
		$retorno .= "<form action='" . $base . "regras/regras' class='formvatagens' method='POST'>";
		$retorno .= "<table class='formtable'>";
		$retorno .= "<tr><td>Titulo:</td><td><input type='text' name='titulo' value=''/></td></tr>";
		$retorno .= "<tr><td>Pré-Requisito(s):</td><td><input type='text' name='requisitos' value=''/></td></tr>";
		$retorno .= "<tr><td>Descrição</td><td><textarea name='descricao'></textarea></td></tr>";
		$retorno .= "<tr><td>Cenário</td><td>";
		$retorno .= "<select name='cenario_id'>";
		$retorno .= "<option value='0'>Geral</option>";
		foreach ($cenario as $k1 => $v1) {
			$retorno .= "<option value='" . $v1['id'] . "'>" . $v1['titulo'] . "</option>";
		}
		$retorno .= "</select>";
		$retorno .= "</td>";
		$retorno .= "</table>";
		$retorno .= "<input type='reset' class='resetBtn' value='Cancelar'/>";
		$retorno .= "<input type='hidden' name='id' value=''/><input type='submit' name='acao' class='addBtn' value='Salvar'/>";
		$retorno .= "</form>";
		//$retorno.="<img class='imagemCadastro showBtn' src='".$base."global/img/add.png'/>";
		$retorno .= "<span class='newCadastronew showBtn'><img src='$base/global/img/novo.png'/></span>";
		$retorno .= "</div>";
		$retorno .= "<div id='busca'><input type='text' class='search'/></div>";
		foreach ($dados as $k1 => $v1) {
			$retorno .= "<div id='link" . $v1['id'] . "' class='div_vantagem'>";
			$retorno .= "<p class='titulo_principal title_vantagem'>" . $v1['titulo'] . "<input type='hidden' value='" . $v1['id'] . "' class='idVantagem'/><img src='$base/global/img/excluir.png' class='apagarVantagem' title='Apagar'/></p>";
			$retorno .= "<p class='pre_vantagem'>" . $v1['requisitos'] . "</p>";
			$retorno .= "<p class='desc_vantagem'>" . $v1['descricao'] . "</p>";
			$retorno .= "</div>";
		}
		$retorno .= "</div>";
		return $retorno;
	}
}
