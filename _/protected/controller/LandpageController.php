<?php

Doo::loadController('CoreController');

class LandpageController extends CoreController
{

	public function landpage()
	{
		unset($_SESSION['user_system']);
		$_SESSION['user_system']['baseurl'] = $this->data['baseurl'] = Doo::conf()->APP_URL;
		$_SESSION['user_system']['group'] = $this->data['group'] = "Visitante";

		$this->render("index", $this->data);
	}
}
