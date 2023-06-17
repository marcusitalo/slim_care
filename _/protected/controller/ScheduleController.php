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

		$_SESSION['user_system']['report'] = "";
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

		$_SESSION['user_system']['report'] = "";
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
		Doo::loadModel('Schedule');
		Doo::loadModel('Place');
		$schedule 		= new Schedule();
		$schedule->id 	= $this->params['id'];
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
		$this->data['acao'] 		= $acao;
		$this->data['subtitulo'] 	= $subtitulo;
		$this->data['action']		= $this->data['baseurl']  . "admin/" . $this->table . "/" . $this->data['acao'];
		$this->data['disabled'] 	= $disabled;

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function finalizar()
	{
		try {

			Doo::loadModel('Schedule');
			$schedule 				= new Schedule();
			Doo::loadModel('Schedule');
			$objeto 						= new Schedule();
			$id 							= (isset($_POST['id'])) ? $_POST['id'] : '';
			if ($id == '') {

				$schedule->place_id 	= (isset($_POST['place_id'])) ? $_POST['place_id'] : '';
				$schedule->day_start 	= (isset($_POST['day_start'])) ? $_POST['day_start'] : '';
				$schedule->day_end 		= (isset($_POST['day_end'])) ? $_POST['day_end'] : '';
				$result 				= $this->db()->find($schedule);
				if (isset($result[0])) {
					$objeto	= $result[0];
				}
				foreach ($objeto->_fields as $field) {
					$objeto->$field = (isset($_POST[$field])) ? $_POST[$field] : null;
				}

				if ($objeto->id > 0) {
					$result = Doo::db()->update($objeto);
					$_SESSION['user_system']['report']	= (isset($result)) ? '3|' . $this->titulo . ' alterado com sucesso!' : '0|Falha no cadastro ' . $this->titulo;
				} else {
					unset($objeto->id);
					$result = Doo::db()->insert($objeto);
					$_SESSION['user_system']['report']	= (isset($result)) ? '3|' . $this->titulo . ' inserido com sucesso!' : '0|Falha no cadastro ' . $this->titulo;
				}
			} else {
				$objeto->id					= $id;
				$result 					= $this->db()->find($objeto);
				$objeto						= $result[0];

				foreach ($objeto->_fields as $field) {
					$objeto->$field = (isset($_POST[$field])) ? $_POST[$field] : null;
				}
				$result = Doo::db()->update($objeto);

				$_SESSION['user_system']['report'] = (isset($result)) ? '3|' . $this->titulo . ' alterado com sucesso!' : '0|Falha ao alterar ' . $this->titulo;
			}
			return array($this->data['base'] . 'admin/agenda', 302);
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

			Doo::loadModel('Schedule');
			$objeto 				= new Schedule();
			$objeto->id				= $id;
			$result 				= Doo::db()->delete($objeto);

			$_SESSION['user_system']['report'] = (!isset($result)) ? '3|' . $this->titulo . ' removida com sucesso!' : '0|Falha ao remover ' . $this->titulo;
			return array($this->data['base'] . 'admin/agenda', 302);
		} catch (PDOException $e) {
			$_SESSION['user_system']['report'] = $e->getMessage();
		}
	}
}
