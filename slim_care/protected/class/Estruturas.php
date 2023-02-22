<?php
class Estruturas
{
	static function construirListaDeUsuarios($base, $dados)
	{
		$retorno = '<table class="table">
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
							<td><a href="' . $base . 'usuarios/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'usuarios/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirListaDeLocais($base, $dados)
	{
		$retorno = '<table class="table">
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
							<td><a href="' . $base . 'locais/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'locais/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}
}
