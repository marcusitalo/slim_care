<?php

Doo::loadController('CoreController');

class UsuarioController extends CoreController
{

	private $titulo = "Usuários";
	private $table = "usuarios";

	public function listar()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Lista de Usuários";

		Doo::loadClass("Sql");
		sql::setDado($this->data);

		$resultado = Doo::db()->fetchAll(sql::querySql('listadeusuarios'), array(':id' => $_SESSION['user_system']['identificador']));
		$this->data['table'] = Estruturas::construirListaDeUsuarios($this->data['baseurl'], $resultado);

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/user/table", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function cadastro()
	{
		$this->data['titulo'] = $this->titulo;
		$this->data['subtitulo'] = "Novo";
		$this->data['foto'] 	 = "";
		$this->data['acao'] = "finalizar";

		$this->data['action'] = $this->data['baseurl'] . $this->table . "/" . $this->data['acao'];

		$this->data['name'] = $this->data['login'] = $this->data['senha'] = $this->data['disabled'] = $this->data['id'] = "";

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/user/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function remover()
	{
		$this->editar("disabled", "excluir", "Remover");
	}
	public function editar($disabled = "", $acao = "finalizar", $subtitulo = "Editar")
	{
		$id = $this->params['id'];

		Doo::loadModel('User');

		$objeto 								= new User();
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
		$this->data['action']					= $this->data['baseurl'] . $this->table . "/" . $this->data['acao'];
		$this->data['desativar']				= $this->data['baseurl'] . $this->table . "/desativacao/" . $this->data['id'];

		$this->data['disabled'] = $disabled;

		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/user/form", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}
	public function finalizar()
	{
		try {

			Doo::loadModel('User');
			$objeto 						= new User();
			$id 							= (isset($_POST['id'])) ? $_POST['id'] : '';
			if ($id == '') {
				$objeto->name				= (isset($_POST['name'])) ? $_POST['name'] : null;
				$objeto->login				= (isset($_POST['login'])) ? $_POST['login'] : null;
				$senha						= (isset($_POST['senha'])) ? $_POST['senha'] : null;
				Doo::loadClass('Cripto');
				$senha = cripto::criptografar($senha);
				$objeto->senha				= $senha;
				$objeto->group_user			= "Administrador";
				$objeto->update_at 			= date('Y-m-d H:i:s');
				$result = Doo::db()->insert($objeto);
				// var_dump(Doo::db()->showSQL());
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
