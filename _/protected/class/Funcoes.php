<?php
include "SBDatetime.php";
class Funcoes
{
	static function ultimoDiaMes()
	{
		$dt =  new SBDateTime(date('Y-m-d'));
		$dt->setDia('01');
		$dt->passaMes();
		$dt->voltaDia();
		return $dt->toString();
	}

	static function primeiroDiaMes()
	{
		$dt =  new SBDateTime(date('Y-m-d'));
		$dt->setDia('01');
		return $dt->toString();
	}

	static function tempoData($dataini, $datafim)
	{

		if ($dataini == '0') {
			return '0';
		}

		# Split para dia, mes, ano, hora, minuto e segundo da data inicial
		$_split_datehour = explode(' ', $dataini);
		$_split_data = explode("/", $_split_datehour[0]);
		$_split_hour = explode(":", $_split_datehour[1]);
		# Coloquei o parse (integer) caso o timestamp nao tenha os segundos, dai ele fica como 0
		$dtini = mktime($_split_hour[0], $_split_hour[1], (int)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);

		# Split para dia, mes, ano, hora, minuto e segundo da data final
		$_split_datehour = explode(' ', $datafim);
		$_split_data = explode("/", $_split_datehour[0]);
		$_split_hour = explode(":", $_split_datehour[1]);
		$dtfim = mktime($_split_hour[0], $_split_hour[1], (int)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);

		# Diminui a datafim que é a maior com a dataini
		$time = ($dtfim - $dtini);

		# Recupera os dias
		$days  = floor($time / 86400);
		# Recupera as horas
		$hours = floor(($time - ($days * 86400)) / 3600);
		# Recupera os minutos
		$mins  = floor(($time - ($days * 86400) - ($hours * 3600)) / 60);
		# Recupera os segundos
		$secs  = floor($time - ($days * 86400) - ($hours * 3600) - ($mins * 60));

		# Monta o retorno no formato
		# 5d 10h 15m 20s
		# somente se os itens forem maior que zero
		$retorno  = "";
		$retorno .= ($days > 0)  ?  $days . 'd ' : "";
		$retorno .= ($hours > 0) ?  $hours . 'h ' : "";
		$retorno .= ($mins > 0)  ?  $mins . 'm ' : "";
		$retorno .= ($secs > 0)  ?  $secs . 's ' : "";

		return $retorno;
	}

	static function tempoDia($dataini, $datafim)
	{

		if ($dataini == '0') {
			return '0';
		}

		$_split_data = explode("/", $dataini);
		$dtini = mktime(0, 0, 0, $_split_data[1], $_split_data[0], $_split_data[2]);

		$_split_data = explode("/", $datafim);
		$dtfim = mktime(0, 0, 0, $_split_data[1], $_split_data[0], $_split_data[2]);

		$time = ($dtfim - $dtini);

		$days  = floor($time / 86400);

		$retorno = ($days > 0) ? $days : 0;

		return $retorno;
	}

	static function distanciaPontosGPS($p1LA, $p1LO, $p2LA, $p2LO)
	{

		$r = 6371.0;

		$p1LA = $p1LA * pi() / 180.0;
		$p1LO = $p1LO * pi() / 180.0;
		$p2LA = $p2LA * pi() / 180.0;
		$p2LO = $p2LO * pi() / 180.0;

		$dLat = $p2LA - $p1LA;
		$dLong = $p2LO - $p1LO;

		$a = sin($dLat / 2) * sin($dLat / 2) + cos($p1LA) * cos($p2LA) * sin($dLong / 2) * sin($dLong / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

		return round($r * $c * 1000); // resultado em metros.
	}

	static function meses($mes)
	{
		$meses = array(
			"01" => "Janeiro",
			"02" => "Feverreiro",
			"03" => "Março",
			"04" => "Abril",
			"05" => "Maio",
			"06" => "Junho",
			"07" => "Julho",
			"08" => "Agosto",
			"09" => "Setembro",
			"10" => "Outubro",
			"11" => "Novembro",
			"12" => "Dezembro"
		);
		if (isset($mes)) {
			return $meses[$mes];
		}
		return $meses;
	}
}
