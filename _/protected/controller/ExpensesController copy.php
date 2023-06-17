<?php

Doo::loadController('CoreController');

class ExpensesController extends CoreController
{

	private $titulo = "Despesas";
	private $table = "despesas";
	private $folder = "expenses";

	public function listar()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Despesas";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$resultado = Doo::db()->fetchAll(sql::querySql('listadedespesas'));
		$this->data['table'] = Estruturas::construirListaDeDespesas($this->data['baseurl'], $resultado);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/table", $this->data);
		$this->render("admin/globais/footer", $this->data);

		$_SESSION['user_system']['report'] = "";
	}
	public function cadastro()
	{
		Doo::loadModel('Expense');

		$objeto = new Expense();
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Novo";
		$this->data['acao'] = "finalizar";

		$this->data['action'] = $this->data['baseurl']  . "admin/" . $this->table . "/" . $this->data['acao'];

		foreach ($objeto->_fields as $field) {
			$this->data[$field] = "";
		}
		$this->data['disabled'] = $this->data['suppliers'] = "";

		$resultado = Doo::db()->fetchAll(sql::querySql('datalistdespesas'));
		$this->data['datalist'] = Estruturas::construirDatalist($resultado);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function remover()
	{
		$this->editar("disabled", "excluir", "Remover");
	}
	public function editar($disabled = "", $acao = "finalizar", $subtitulo = "Editar")
	{
		$day_expenses = $this->params['day_expenses'];
		$result = Doo::db()->fetchAll(sql::querySql('listadedespesaspordia'), array(":day_expenses" => $day_expenses));
		$this->data['suppliers'] = Estruturas::construirSupplierlist($result);

		$resultado = Doo::db()->fetchAll(sql::querySql('datalistdespesas'));
		$this->data['datalist'] = Estruturas::construirDatalist($resultado);

		$this->data['day_expenses']	    		= $this->params['day_expenses'];
		$this->data['acao'] 					= $acao;
		$this->data['subtitulo'] 				= $subtitulo;
		$this->data['action']					= $this->data['baseurl']  . "admin/" . $this->table . "/" . $this->data['acao'];

		$this->data['disabled'] = $disabled;

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function finalizar()
	{
		try {
			Doo::loadModel('Expense');
			$objeto 			  = new Expense();
			$day_expenses 		  = (isset($_POST['day_expenses'])) ? $_POST['day_expenses'] : '';
			$objeto->day_expenses = $day_expenses;
			Doo::db()->delete($objeto);

			$suppliers = (isset($_POST['supplier'])) ? $_POST['supplier'] : '';
			$amounts   = (isset($_POST['amount'])) ? $_POST['amount'] : '';

			for ($i = 0; $i < count($suppliers); $i++) {
				$objeto = new Expense();
				$objeto->day_expenses = $day_expenses;
				$objeto->supplier = $suppliers[$i];
				$objeto->amount  = $amounts[$i];
				$result = Doo::db()->insert($objeto);
			}

			$_SESSION['user_system']['report']	= (isset($result)) ? '3|' . $this->titulo . ' inserido com sucesso!' : '0|Falha no cadastro ' . $this->titulo;
			return array($this->data['base'] . 'admin/despesas', 302);
		} catch (PDOException $e) {
			$_SESSION['user_system']['report'] = $e->getMessage();
		}
	}
	public function excluir()
	{
		try {
			if (!isset($_POST['id']))
				$this->_redirect('inicio');

			$id = $_POST['id'];

			Doo::loadModel('Expense');
			$objeto 				= new Expense();
			$objeto->day_expenses	= $id;
			$result 				= Doo::db()->deleteAll($objeto);

			$_SESSION['user_system']['report'] = (!isset($result)) ? '3|' . $this->titulo . ' removida com sucesso!' : '0|Falha ao remover ' . $this->titulo;
			return array($this->data['base'] . 'admin/despesas', 302);
		} catch (PDOException $e) {
			$_SESSION['user_system']['report'] = $e->getMessage();
		}
	}
}
