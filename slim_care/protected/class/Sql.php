<?php

class sql
{

	static public $dados = array();

	static function setDado($d)
	{
		sql::$dados = $d;
	}

	static function querySql($key, $offset = '10')
	{
		switch ($key) {
			case 'login':
				$sql = "SELECT u.id,u.name,u.group_user,u.update_at FROM user u WHERE u.login = :login AND u.senha = :senha";
				break;
			case 'listadeusuarios':
				$sql = "SELECT * FROM user where id <> :id ORDER BY name";
				break;
			case 'listadelocais':
				$sql = "SELECT * FROM place ORDER BY name";
				break;
			case 'listadelocaisdisponiveis':
				$sql = "SELECT * FROM place WHERE id not in (select place_id from schedule WHERE (
					day_start between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
					OR
					day_end between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
					OR
					STR_TO_DATE(:dtini,'%Y-%m-%d') between day_start AND day_end
					OR
					STR_TO_DATE(:dtfim,'%Y-%m-%d') between day_start AND day_end
				)
			) ORDER BY name";
				break;
			case 'listadelocaisagendados':
				$sql = "SELECT s.*,p.name as local_agendado FROM schedule s
						INNER JOIN place p 
						ON p.id = s.place_id 
						and p.id in (select place_id from schedule WHERE (
						day_start between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
						OR
						day_end between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
						OR
						STR_TO_DATE(:dtini,'%Y-%m-%d') between day_start AND day_end
						OR
						STR_TO_DATE(:dtfim,'%Y-%m-%d') between day_start AND day_end
					)
				) ORDER BY name";
				break;
			case 'usuarioexistes':
				$sql = "SELECT u.id FROM usuarios u WHERE u.login = :login AND u.id <> :id";
				break;
			default:
				$sql = '';
		}
		return $sql;
	}
}
