<?php
class Expense
{

	public $id;
	public $supplier;
	public $amount;
	public $day_expenses;

	public $_table = "expenses";
	public $_primarykey = "id";
	public $_fields = array('id', 'supplier', 'amount', 'day_expenses');
}
