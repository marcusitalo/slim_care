<?php

Doo::loadController('CoreController');

class ReportController extends CoreController
{

	private $titulo = "Relatório";
	private $folder = "report";

	public function report()
	{
		Doo::loadClass('Funcoes');
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Agendamentos";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$dti 			= (isset($_POST["dtinicio"]))       ? $_POST["dtinicio"]   : Funcoes::primeiroDiaMes();
		$dtf 			= (isset($_POST["dtfim"]))          ? $_POST["dtfim"]      : Funcoes::ultimoDiaMes();

		$this->data['form'] = Estruturas::construirSearchAgendamento($this->data['baseurl'] . "admin/relatorios", $dti, $dtf);

		$soma = Doo::db()->fetchAll(sql::querySql('totaisreceitadespesa'), array(':dtini' => $dti, ':dtfim' => $dtf));

		$resultado = Doo::db()->fetchAll(sql::querySql('receita'), array(':dtini' => $dti, ':dtfim' => $dtf));
		$this->data['tableReceita'] = Estruturas::construirReceita($soma, $resultado);

		$resultado = Doo::db()->fetchAll(sql::querySql('despesa'), array(':dtini' => $dti, ':dtfim' => $dtf));
		$this->data['tableDespesa'] = Estruturas::construirDespesa($soma, $resultado);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/table", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
}
