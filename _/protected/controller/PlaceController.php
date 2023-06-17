<?php

Doo::loadController('CoreController');

class PlaceController extends CoreController
{

	private $titulo = "Locais";
	private $table = "locais";
	private $folder = "place";

	public function listar()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Locais";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$resultado = Doo::db()->fetchAll(sql::querySql('listadelocais'));
		$this->data['table'] = Estruturas::construirListaDeLocais($this->data['baseurl'], $resultado);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/" . $this->folder . "/table", $this->data);
		$this->render("admin/globais/footer", $this->data);

		$_SESSION['user_system']['report'] = "";
	}
	public function cadastro()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Novo";
		$this->data['acao'] = "finalizar";

		$this->data['action'] = $this->data['baseurl']  . "admin/" . $this->table . "/" . $this->data['acao'];

		$this->data['name'] = $this->data['location'] = $this->data['disabled'] = $this->data['id'] = "";

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
		$id = $this->params['id'];

		Doo::loadModel('Place');

		$objeto 								= new Place();
		$objeto->id 							= $id;
		$result 								= $this->db()->find($objeto);
		$objeto									= $result[0];

		$this->data['id']						= $id;
		$this->data['name']						= $objeto->name;
		$this->data['location']					= $objeto->location;
		$this->data['subtitulo']				= $subtitulo;
		$this->data['acao'] 					= $acao;
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

			Doo::loadModel('Place');
			$objeto 						= new Place();
			$id 							= (isset($_POST['id'])) ? $_POST['id'] : '';
			if ($id == '') {
				$objeto->name				= (isset($_POST['name'])) ? $_POST['name'] : null;
				$objeto->location				= (isset($_POST['location'])) ? $_POST['location'] : null;
				$result = Doo::db()->insert($objeto);
				// var_dump(Doo::db()->showSQL());
				$_SESSION['user_system']['report']	= (isset($result)) ? '3|' . $this->titulo . ' inserido com sucesso!' : '0|Falha no cadastro ' . $this->titulo;
			} else {
				$objeto->id					= $id;
				$result 					= $this->db()->find($objeto);
				$objeto						= $result[0];
				$objeto->name				= (isset($_POST['name'])) ? $_POST['name'] : null;
				$objeto->location				= (isset($_POST['location'])) ? $_POST['location'] : null;

				$result = Doo::db()->update($objeto);

				$_SESSION['user_system']['report'] = (isset($result)) ? '3|' . $this->titulo . ' alterado com sucesso!' : '0|Falha ao alterar ' . $this->titulo;
			}
			return array($this->data['base'] . 'admin/locais', 302);
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

			Doo::loadModel('Place');
			$objeto 				= new Place();
			$objeto->id				= $id;
			$result 				= Doo::db()->delete($objeto);

			$_SESSION['user_system']['report'] = (!isset($result)) ? '3|' . $this->titulo . ' removida com sucesso!' : '0|Falha ao remover ' . $this->titulo;
			return array($this->data['base'] . 'admin/locais', 302);
		} catch (PDOException $e) {
			$_SESSION['user_system']['report'] = $e->getMessage();
		}
	}
}
