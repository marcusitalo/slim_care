<?php

Doo::loadController('CoreController');

class LoginController extends CoreController
{

	public function erro()
	{
		unset($_SESSION['user_system']);
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['group']   = $_SESSION['user_system']['group'] = "Visitante";
		$this->data['report']  = $_SESSION['user_system']['report']  = "1|Sessão Expirou.";
		$this->render("index", $this->data);
	}
	public function logout()
	{
		unset($_SESSION['user_system']);
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['group']   = $_SESSION['user_system']['group'] = "Visitante";
		$this->data['report']  = $_SESSION['user_system']['report']  = "1|Tchau, " . $this->data['usuario'] . ".";

		$this->_redirect($this->data['baseurl'] . 'admin', $this->data);
	}
	public function habilitarjavascript()
	{
		unset($_SESSION['user_system']);
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['group']   = $_SESSION['user_system']['group'] = "Visitante";
		$this->data['report']  = $_SESSION['user_system']['report']  = "0|JavaScript Desabilitado.";

		$this->_redirect($this->data['baseurl']);
	}

	public function login()
	{
		if (empty($_POST['x-client']) || empty($_POST['x-secret'])) {
			$this->data['report'] = (isset($this->data['report'])) ? $this->data['report'] : "";
			unset($_SESSION['user_system']);
			$_SESSION['user_system']['baseurl'] = $this->data['baseurl'] = Doo::conf()->APP_URL;
			$_SESSION['user_system']['group'] = $this->data['group'] = "Visitante";

			$this->render("admin/globais/header", $this->data);
			$this->render("admin/signin", $this->data);
			$this->render("admin/globais/footer", $this->data);
		} else {
			if (isset($_POST['x-client']) && ($_POST['x-secret'])) {
				$login = $_POST['x-client'];
				$senha = cripto::criptografar($_POST['x-secret']);
				$status = Doo::db()->fetchAll(sql::querySql('login'), array(':login' => $login, ':senha' => $senha));

				if ($status) {
					$_SESSION['user_system']['report'] 	= $this->data['report'];

					$this->data['group']			= $_SESSION['user_system']['group']			= $status[0]['group_user'];
					$this->data['usuario']			= $_SESSION['user_system']['usuario']		= $status[0]['name'];
					$this->data['identificador']	= $_SESSION['user_system']['identificador']	= $status[0]['id'];

					Doo::loadModel('User');
					$usuario 						= new User();
					$usuario->id 					= $status[0]['id'];
					$result 						= $this->db()->find($usuario);
					$usuario						= $result[0];
					$this->data['ultimoacesso']		= $_SESSION['user_system']['ultimoacesso']	= $usuario->update_at;

					$usuario->update_at	= date('Y-m-d H:i:s');

					Doo::db()->update($usuario);

					unset($usuario);

					$this->data['report'] = (isset($this->data['report'])) ? $this->data['report'] : "";

					$this->_redirect($this->data['baseurl'] . 'admin/dashboard');
				} else {

					unset($_SESSION['user_system']);
					$_SESSION['user_system']['baseurl']	= $this->data['baseurl'] = Doo::conf()->APP_URL;
					$_SESSION['user_system']['group']	= $this->data['group'] 	 = "Visitante";

					$_SESSION['user_system']['report'] = $this->data['report'] = "0|Usuário e/ou Senha Inválido...";

					$this->render("admin/globais/header", $this->data);
					$this->render("admin/signin", $this->data);
					$this->render("admin/globais/footer", $this->data);
					$this->appendFile($this->data, $this->jsPath . 'feedback.js', 'text/javascript');
				}
			}
		}
	}
	public function dashboard()
	{
		$resultado = Doo::db()->fetchAll(sql::querySql('dashboard'));
		$this->data['dados'] = $resultado;

		$resultado = Doo::db()->fetchAll(sql::querySql('listaagendadashboard'));
		$this->data['table'] = Estruturas::construirDashboard($resultado);

		$_SESSION['user_system']['report'] = '';
		$this->render("admin/globais/header", $this->data);
		$this->render("admin/globais/menu", $this->data);
		$this->render("admin/index", $this->data);
		$this->render("admin/globais/footer", $this->data);
	}

	public function redirecionar()
	{
		if ($this->data['group'] != trim('Visitante')) {
			$_SESSION['user_system']['report'] = "";
			$this->render("index", $this->data);
		} else {
			$this->erro();
		}
	}
}
