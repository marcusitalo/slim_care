<?php

Doo::loadController('CoreController');

class AjaxController extends CoreController
{

	public function verificarexistenciadeusuario()
	{
		Doo::loadModel("Usuario");
		Doo::loadClass("Sql");

		sql::setDado($this->data);

		$login 	= $_POST['login'];
		$id 	= (isset($_POST['id'])) ? ($_POST['id'] == "") ? 0 : $_POST['id'] : 0;
		$existe = Doo::db()->fetchOne(sql::querySql('usuarioexistes'), array(':login' => $login, ':id' => $id));
		if (($existe > 0)) {
			echo "<span class='falha'></span>
				<p style='font-style: italic;color: red;font-size: 12px;font-weight: 900;position: absolute; margin: -25px 230px;width: 200px;'>Este login já está sendo utilizado</p>";
		} else {
			echo "<span class='ok'></span>";
		}
	}
}
