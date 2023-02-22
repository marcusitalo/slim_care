<?php
class User
{

	public $id;
	public $name;
	public $group_user;
	public $created_at;
	public $login;
	public $senha;
	public $update_at;

	public $_table = "user";
	public $_primarykey = "id";
	public $_fields = array('id', 'name', 'group_user', 'created_at', 'login', 'senha', 'update_at');
}
