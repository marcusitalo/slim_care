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
			case 'listadefornecedores':
				$sql = "SELECT * FROM supplier ORDER BY name";
				break;
			case 'listadedespesas':
				$sql = "SELECT day_expenses as id, DATE_FORMAT(day_expenses,'%d/%m/%Y') as name, count(id) as quantidade, sum(amount) as total,GROUP_CONCAT(supplier) as despesas FROM expenses GROUP BY day_expenses ORDER BY day_expenses desc";
				break;
			case 'datalistdespesas':
				$sql = "SELECT distinct supplier FROM expenses ORDER BY supplier";
				break;
			case 'listadedespesaspordia':
				$sql = "SELECT * FROM expenses WHERE day_expenses = STR_TO_DATE(:day_expenses,'%Y-%m-%d') ORDER BY supplier";
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

			case 'estalocado':
				$sql = "SELECT count(place_id) as existe from schedule WHERE (
						day_start between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
						OR
						day_end between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
						OR
						STR_TO_DATE(:dtini,'%Y-%m-%d') between day_start AND day_end
						OR
						STR_TO_DATE(:dtfim,'%Y-%m-%d') between day_start AND day_end
						)
						AND place_id = :place_id
					";
				break;

			case 'usuarioexistes':
				$sql = "SELECT u.id FROM usuarios u WHERE u.login = :login AND u.id <> :id";
				break;
			case 'dashboard':
				$sql = "SELECT 
							(SELECT COALESCE(sum(amount),0) FROM schedule WHERE MONTH(day_start) = MONTH(now()) ) as receita,
							(SELECT COALESCE(sum(amount),0) FROM expenses WHERE MONTH(day_expenses) = MONTH(now()) ) as despesas,
							(SELECT count(distinct p.id) FROM place p WHERE p.id not in (SELECT distinct place_id from schedule where DATE_FORMAT(now(),'%Y-%m-%d') between day_start AND day_end)) as disponivel,
							(SELECT count(distinct p.id) FROM place p WHERE p.id in (SELECT distinct place_id from schedule where DATE_FORMAT(now(),'%Y-%m-%d') between day_start AND day_end)) as ocupado
						";
				break;

			case 'listaagendadashboard':
				$sql = "SELECT s.*,DATE_FORMAT(s.day_start,'%d/%m/%Y') as data_entrada,DATE_FORMAT(s.day_end,'%d/%m/%Y') as data_saida,
							DATE_FORMAT(s.date_of_surgery,'%d/%m/%Y') as data_cirurgia,
							p.name as local_agendado 
							FROM schedule s
							INNER JOIN place p 	ON p.id = s.place_id 
							AND s.day_start between DATE_FORMAT(now(),'%Y-%m-%d') AND DATE_ADD(DATE_FORMAT(now(),'%Y-%m-%d'), INTERVAL 1 WEEK)
							ORDER BY s.day_start";
				break;


			case 'receita':
				$sql = "SELECT s.*,DATE_FORMAT(s.day_start,'%d/%m/%Y') as data_entrada,p.name as local_agendado FROM schedule s
							INNER JOIN place p 
							ON p.id = s.place_id 
							and s.day_start between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d')
							ORDER BY s.day_start
							";
				break;

			case 'despesa':
				$sql = "SELECT *,DATE_FORMAT(day_expenses,'%d/%m/%Y') as data_despesa FROM expenses WHERE day_expenses between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d') ORDER BY supplier";
				break;

			case 'totaisreceitadespesa':
				$sql = "SELECT 
							(SELECT COALESCE(sum(amount),0) FROM schedule WHERE day_start between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d') ) as receita,
							(SELECT COALESCE(sum(amount),0) FROM expenses WHERE day_expenses between STR_TO_DATE(:dtini,'%Y-%m-%d') AND STR_TO_DATE(:dtfim,'%Y-%m-%d') ) as despesa
						";
				break;

			default:
				$sql = '';
		}
		return $sql;
	}
}
