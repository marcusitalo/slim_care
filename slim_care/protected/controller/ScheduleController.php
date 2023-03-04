<?php

Doo::loadController('CoreController');

class ScheduleController extends CoreController
{

	private $titulo = "Agendamentos";
	private $table = "agenda";
	private $folder = "schedule";

	public function listarLocalDisponivels()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Agendamentos";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$dti 			= (isset($_POST["dtinicio"]))       ? $_POST["dtinicio"]   : date("Y-m-d");
		$dtf 			= (isset($_POST["dtfim"]))          ? $_POST["dtfim"]      : date("Y-m-d");

		$resultado = Doo::db()->fetchAll(sql::querySql('listadelocaisdisponiveis'), array(':dtini' => $dti, ':dtfim' => $dtf));
		$this->data['form'] = Estruturas::construirSearchAgendamento($this->data['baseurl'] . "admin/agenda/disponivel", $dti, $dtf);
		$this->data['table'] = Estruturas::construirListaDeLocaisDisponiveis($this->data['baseurl'], $resultado, $dti, $dtf);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/table", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}

	public function listarAgedamentos()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Agendamentos";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$dti 			= (isset($_POST["dtinicio"]))       ? $_POST["dtinicio"]   : date("Y-m-d");
		$dtf 			= (isset($_POST["dtfim"]))          ? $_POST["dtfim"]      : date("Y-m-d");

		$resultado = Doo::db()->fetchAll(sql::querySql('listadelocaisagendados'), array(':dtini' => $dti, ':dtfim' => $dtf));
		$this->data['form'] = Estruturas::construirSearchAgendamento($this->data['baseurl'] . "admin/agenda", $dti, $dtf);
		$this->data['table'] = Estruturas::construirListaDeLocaisAgendados($this->data['baseurl'], $resultado, $dti, $dtf);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/table", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function cadastro()
	{

		Doo::loadModel('Schedule');
		Doo::loadModel('Place');
		$place = new Place();
		$place->id 	= $this->params['place_id'];
		$result 	= $this->db()->find($place);
		$place		= $result[0];

		$objeto = new Schedule();
		foreach ($objeto->_fields as $field) {
			$this->data[$field] = "";
		}

		$this->data['place'] = $place->name;
		$this->data['place_id'] = $place->id;
		$this->data['day_start'] = $this->params['dti'];
		$this->data['day_end'] = $this->params['dtf'];

		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Novo Agendamento";
		$this->data['foto'] 	 = "";
		$this->data['acao'] = "finalizar";

		$this->data['action'] = $this->data['baseurl'] . "admin/" . $this->table . "/" . $this->data['acao'];
		$this->data['disabled'] = "";

		$this->data['need_caregiver'] = '0';
		// $this->data['id'] = $this->data['place_id'] = $this->data['patient_name'] = $this->data['patient_phone'] = $this->data['type_of_surgery'] = $this->data['date_of_surgery'] = $this->data['location_of_surgery'] = $this->data['time_of_surgery'] =   $this->data['guidance'] = $this->data['datasheet'] = $this->data['contract'] = $this->data['observation'] = $this->data['amount'] = "";

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function detalhes()
	{
		Doo::loadModel('Schedule');
		Doo::loadModel('Place');
		$schedule 		= new Schedule();
		$schedule->id 	= $this->params['schedule_id'];
		$result 		= $this->db()->find($schedule);
		$schedule		= $result[0];

		$place = new Place();
		$place->id 	= $schedule->place_id;
		$result 	= $this->db()->find($place);
		$place		= $result[0];

		foreach ($schedule->_fields as $field) {
			$this->data[$field] = $schedule->$field;
		}
		$this->data['place'] = $place->name;
		$this->data['place_id'] = $place->id;

		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Agendamento para " . $this->data['place'];
		$this->data['foto'] 	 = "";
		$this->data['acao'] = "finalizar";

		$this->data['disabled'] = "disabled";

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/show", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function remover()
	{
		$this->editar("disabled", "excluir", "Remover");
	}
	public function editar($disabled = "", $acao = "finalizar", $subtitulo = "Editar")
	{
		$id = $this->params['id'];

		Doo::loadModel('Schedule');

		$objeto 								= new Schedule();
		$objeto->id 							= $id;
		$result 								= $this->db()->find($objeto);
		$objeto									= $result[0];

		Doo::loadClass('Cripto');
		$senha = cripto::descriptografar($objeto->senha);

		$this->data['id']						= $id;
		$this->data['name']						= $objeto->name;
		$this->data['login']					= $objeto->login;
		$this->data['senha']					= $senha;
		$this->data['subtitulo']				= $subtitulo;
		$this->data['acao'] 					= $acao;
		$this->data['action']					= $this->data['baseurl'] . "admin/" . $this->table . "/" . $this->data['acao'];
		$this->data['desativar']				= $this->data['baseurl'] . $this->table . "/desativacao/" . $this->data['id'];

		$this->data['disabled'] = $disabled;

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function finalizar()
	{
		try {

			Doo::loadModel('Schedule');
			$objeto 						= new Schedule();
			$id 							= (isset($_POST['id'])) ? $_POST['id'] : '';
			if ($id == '') {
				foreach ($objeto->_fields as $field) {
					$objeto->$field = (isset($_POST[$field])) ? $_POST[$field] : null;
				}
				unset($objeto->id);
				$result = Doo::db()->insert($objeto);
				var_dump(Doo::db()->showSQL());
				$_SESSION['user_system']['report']	= (isset($result)) ? '3|' . $this->titulo . ' inserido com sucesso!' : '0|Falha no cadastro ' . $this->titulo;
			} else {
				$objeto->id					= $id;
				$result 					= $this->db()->find($objeto);
				$objeto						= $result[0];
				$objeto->name				= (isset($_POST['name'])) ? $_POST['name'] : null;
				$objeto->login				= (isset($_POST['login'])) ? $_POST['login'] : null;
				$senha						= (isset($_POST['senha'])) ? $_POST['senha'] : null;
				Doo::loadClass('Cripto');
				$senha = cripto::criptografar($senha);
				$objeto->senha				= $senha;

				$result = Doo::db()->update($objeto);

				$_SESSION['user_system']['report'] = (isset($result)) ? '3|' . $this->titulo . ' alterado com sucesso!' : '0|Falha ao alterar ' . $this->titulo;
				if ($_SESSION['user_system']['identificador'] == $id) {
					$_SESSION['user_system']['usuario']	= $objeto->name;
				}
			}
			return array($this->data['base'] . 'dashboard', 302);
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

			Doo::loadModel('User');
			$objeto 				= new User();
			$objeto->id				= $id;
			$result 				= Doo::db()->delete($objeto);

			$_SESSION['user_system']['report'] = (!isset($result)) ? '3|' . $this->titulo . ' removida com sucesso!' : '0|Falha ao remover ' . $this->titulo;
			return array($this->data['base'] . 'dashboard', 302);
		} catch (PDOException $e) {
			$_SESSION['user_system']['report'] = $e->getMessage();
		}
	}
}
