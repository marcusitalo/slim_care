<?php
class Estruturas
{
	static function construirListaDeUsuarios($base, $dados)
	{
		$retorno = '<table class="table" id="dataTable">
						<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col"></th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td>' . $v1['name'] . '</td>
							<td><a href="' . $base . 'admin/usuarios/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'admin/usuarios/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirListaDeLocais($base, $dados)
	{
		$retorno = '<table class="table" id="dataTable">
						<thead>
							<tr>
							<th scope="col">Nome</th>
							<th scope="col">Local</th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td>' . $v1['name'] . '</td>
							<td>' . $v1['location'] . '</td>
							<td><a href="' . $base . 'admin/locais/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'admin/locais/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirSearchAgendamento($base, $dti, $dtf)
	{
		return  "<form action='" . $base . "' method='post' id='filter_form'>
					<div style='display: inline-flex;'><p>Data Inicial :<input type='date' id='from' size='20' class='dtinicio' name='dtinicio' maxlength='20' value='" . $dti . "'/></p></div>
					<div style='display: inline-flex;'><p>Data Final :  <input type='date' id='to' size='20' class='dtfim' name='dtfim' maxlength='20' value='" . $dtf . "'/></p></div>
					<div style='display: inline-flex;'><button type='submit' class='btn btn-primary m-2'>Buscar</button></div>     				
				</form>";
	}

	static function construirListaDeLocaisDisponiveis($base, $dados, $dti, $dtf)
	{
		$retorno = '<table class="table" id="dataTable">
						<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Data</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td data-label="Local">' . $v1['name'] . '</td>
							<td data-label="Data">' . $dti . ' à ' . $dtf . '</td>
							<td><a href="' . $base . 'admin/agenda/local/' . $v1['id'] . '/' . $dti . '/' . $dtf . '">Agendar</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}
	static function construirListaDeLocaisAgendados($base, $dados)
	{
		$retorno = '<table class="table" id="dataTable">
						<thead>
							<tr>
								<th scope="col">Local</th>
								<th scope="col">Paciente</th>
								<th scope="col">Telefone</th>
								<th scope="col">Data entrada</th>
								<th scope="col">Data saida</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td data-label="Local">' . $v1['local_agendado'] . '</td>
							<td data-label="Paciente">' . $v1['patient_name'] . '</td>
							<td data-label="Telefone">' . $v1['patient_phone'] . '</td>
							<td data-label="Data Entrada">' . $v1['day_start'] . '</td>
							<td data-label="Data Saída">' . $v1['day_end'] . '</td>
							<td><a href="' . $base . 'admin/agenda/local/' . $v1['id'] . '/show">Detalhes</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}
}
