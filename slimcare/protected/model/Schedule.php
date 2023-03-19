<?php
class Schedule
{
	public $id;
	public $place_id;
	public $patient_name;
	public $patient_phone;
	public $type_of_surgery;
	public $date_of_surgery;
	public $location_of_surgery;
	public $need_caregiver;
	public $day_start;
	public $day_end;
	public $guidance;
	public $datasheet;
	public $contract;
	public $observation;
	public $amount;
	public $description_pay;

	public $_table = "schedule";
	public $_primarykey = "id";
	public $_fields = array(
		'id', 'place_id', 'patient_name', 'patient_phone', 'type_of_surgery', 'date_of_surgery', 'location_of_surgery', 'need_caregiver', 'day_start', 'day_end', 'guidance', 'datasheet', 'contract', 'observation', 'amount', 'description_pay'
	);
}
