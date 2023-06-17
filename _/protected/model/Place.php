<?php
class Place
{

	public $id;
	public $name;
	public $location;

	public $_table = "place";
	public $_primarykey = "id";
	public $_fields = array('id', 'name', 'location');
}
