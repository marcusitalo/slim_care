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

		// $this->_redirect($this->data['baseurl']);

		$this->render("index", $this->data);
	}
	public function logout()
	{
		unset($_SESSION['user_system']);
		$this->data['baseurl'] = Doo::conf()->APP_URL;
		$this->data['group']   = $_SESSION['user_system']['group'] = "Visitante";
		$this->data['report']  = $_SESSION['user_system']['report']  = "1|Tchau, " . $this->data['usuario'] . ".";

		$this->_redirect($this->data['baseurl'], $this->data);
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
		if (empty($_POST['login']) || empty($_POST['senha'])) {
			$this->data['report'] = (isset($this->data['report'])) ? $this->data['report'] : "";
			unset($_SESSION['user_system']);
			$_SESSION['user_system']['baseurl'] = $this->data['baseurl'] = Doo::conf()->APP_URL;
			$_SESSION['user_system']['group'] = $this->data['group'] = "Visitante";

			$this->render("index", $this->data);
		} else {
			if (isset($_POST['login']) && ($_POST['senha'])) {
				$login = $_POST['login'];
				$senha = cripto::criptografar($_POST['senha']);
				$status = Doo::db()->fetchAll(sql::querySql('login'), array(':login' => $login, ':senha' => $senha));
				if ($status) {
					$ativo = $status[0]['ativo'];
					if ($ativo == '1') {
						$_SESSION['user_system']['report'] 	= $this->data['report'];

						$this->data['group']			= $_SESSION['user_system']['group']			= $status[0]['grupo'];
						$this->data['usuario']			= $_SESSION['user_system']['usuario']		= $status[0]['nome'];
						$this->data['identificador']	= $_SESSION['user_system']['identificador']	= $status[0]['id'];
						$this->data['nivel']			= $_SESSION['user_system']['nivel']			= $status[0]['nivel'];
						$this->data['foto']				= $_SESSION['user_system']['foto']			= $status[0]['foto'];

						Doo::loadModel('Usuario');
						$usuario 						= new Usuario();
						$usuario->id 					= $status[0]['id'];
						$result 						= $this->db()->find($usuario);
						$usuario						= $result[0];
						$this->data['ultimoacesso']		= $_SESSION['user_system']['ultimoacesso']	= $usuario->data_ultimo_acesso;

						$usuario->data_ultimo_acesso	= date('Y-m-d H:i:s');

						Doo::db()->update($usuario);

						unset($usuario);

						$this->_redirect($this->data['baseurl'] . 'welcome');
					} else {
						unset($_SESSION['user_system']);
						$_SESSION['user_system']['baseurl']	= $this->data['baseurl'] = Doo::conf()->APP_URL;
						$_SESSION['user_system']['group']	= $this->data['group'] 	 = "Visitante";

						$_SESSION['user_system']['report'] = $this->data['report'] = "0|Seu Usuário, Ainda Não foi Ativado pelo Mestre. Aguarde só mais um pouco. :P";

						$this->render("index", $this->data);
					}
				} else {
					unset($_SESSION['user_system']);
					$_SESSION['user_system']['baseurl']	= $this->data['baseurl'] = Doo::conf()->APP_URL;
					$_SESSION['user_system']['group']	= $this->data['group'] 	 = "Visitante";

					$_SESSION['user_system']['report'] = $this->data['report'] = "0|Usuário e/ou Senha Inválido.";

					$this->render("index", $this->data);
				}
			}
		}
	}
	public function landpage()
	{
		unset($_SESSION['user_system']);
		$_SESSION['user_system']['baseurl'] = $this->data['baseurl'] = Doo::conf()->APP_URL;
		$_SESSION['user_system']['group'] = $this->data['group'] = "Visitante";

		$this->render("index", $this->data);
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
