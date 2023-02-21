<?php
class Usuario
{

	public $id;
	public $nome;
	public $nivel_id;
	public $data_ultimo_acesso;
	public $login;
	public $senha;


	public $_table = "usuarios";
	public $_primarykey = "id";
	public $_fields = array('id', 'nome', 'nivel_id', 'data_ultimo_acesso', 'login', 'senha');
}
