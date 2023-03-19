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

	static function construirListaDeFornecedores($base, $dados)
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
							<td><a href="' . $base . 'admin/fornecedor/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'admin/fornecedor/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirListaDeDespesas($base, $dados)
	{
		$retorno = '<table class="table" id="dataTable">
						<thead>
							<tr>
							<th scope="col">Nome</th>
							<th scope="col">Quantidade</th>
							<th scope="col">Total</th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td>' . $v1['name'] . '</td>
							<td>' . $v1['quantidade'] . '</td>
							<td>R$ ' . $v1['total'] . '</td>
							<td><a href="' . $base . 'admin/despesas/editar/' . $v1['id'] . '">Editar</a></td>
							<td><a href="' . $base . 'admin/despesas/remover/' . $v1['id'] . '">Excluir</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirDashboard($dados)
	{
		$retorno = '<thead>
						<tr class="text-dark">
							<th scope="col">Data de Entrada</th>
							<th scope="col">Paciente</th>
							<th scope="col">Telefone</th>
							<th scope="col">Data da cirurgia</th>
							<th scope="col">Local</th>
							<th scope="col">Cuidador hospitalar</th>
							<th scope="col">Contrato</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td>' . date("d/m/Y", strtotime($v1['data_entrada'])) . '</td>
							<td>' . $v1['patient_name'] . '</td>
							<td>' . $v1['patient_phone'] . '</td>
							<td>' . date("d/m/Y", strtotime($v1['data_cirurgia'])) . '</td>
							<td>' . $v1['location_of_surgery'] . '</td>
							<td>' . ($v1['need_caregiver'] ? "Sim" : "Não") . '</td>
							<td>' . $v1['contract'] . '</td>
						</tr>';
		}
		$retorno .= "</tbody>";
		return $retorno;
	}

	static function construirSupplierlist($dados)
	{
		$retorno = '';
		foreach ($dados as $k1 => $v1) {
			$retorno .= '<div class="row">
							<div class="col-xl-4">
								<label for="exampleInputName" class="form-label">Nome</label>
								<input type="text" class="form-control" id="exampleInputName" list="list_supplier" name="supplier[]" value="' . $v1['supplier'] . '">
							</div>
							<div class="col-xl-4">
								<label for="exampleInputamount" class="form-label required">Valor</label>
								<input type="number" class="form-control" id="exampleInputamount" name="amount[]" value="' . $v1['amount'] . '" step="0.01" value="0.00" placeholder="0.00" required>
							</div>
							<div class="col-xl-3">
								<label class="form-label"></label>
								<button type="button" class="form-control btn btn-primary m-2 btnRemoveExpenses">Remover</button>
							</div>
						</div>';
		}
		return $retorno;
	}


	static function construirDatalist($dados)
	{
		$retorno = '<datalist id="list_supplier">';
		foreach ($dados as $k1 => $v1) {
			$retorno .= '<option value="' . $v1['supplier'] . '"></option>';
		}
		$retorno .= "</datalist>";
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
							<td data-label="Data">' . date("d/m/Y", strtotime($dti)) . ' à ' . date("d/m/Y", strtotime($dtf)) . '</td>
							<td><a href="' . $base . 'admin/agenda/local/' . $v1['id'] . '/' . $dti . '/' . $dtf . '">Agendar</a></td>
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}

	static function construirReceita($soma, $dados)
	{
		$retorno = '<h5>Receita <label>R$ ' . $soma[0]['receita'] . '</label></h5>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Data</th>
								<th scope="col">Local</th>
								<th scope="col">Paciente</th>
								<th scope="col">Valor</th>
								<th scope="col">Descrição pagamento</th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td data-label="Data">' . date("d/m/Y", strtotime($v1['data_entrada'])) . '</td>
							<td data-label="Local">' . $v1['local_agendado'] . '</td>
							<td data-label="Paciente">' . $v1['patient_name'] . '</td>
							<td data-label="Valor">R$ ' . $v1['amount'] . '</td>
							<td data-label="Valor">R$ ' . $v1['description_pay'] . '</td>

						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}
	static function construirDespesa($soma, $dados)
	{
		$retorno = '<h5>Despesa <label>R$ ' . $soma[0]['despesa'] . '</label></h5>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Data</th>
								<th scope="col">Despesa</th>
								<th scope="col">Valor</th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td data-label="Data">' . date("d/m/Y", strtotime($v1['data_despesa'])) . '</td>
							<td data-label="Despesa">' . $v1['supplier'] . '</td>
							<td data-label="Valor">R$ ' . $v1['amount'] . '</td>
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
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>';

		foreach ($dados as $k1 => $v1) {
			$retorno .= '<tr>
							<td data-label="Local">' . $v1['local_agendado'] . '</td>
							<td data-label="Paciente">' . $v1['patient_name'] . '</td>
							<td data-label="Telefone">' . $v1['patient_phone'] . '</td>
							<td data-label="Data Entrada">' . date("d/m/Y", strtotime($v1['day_start'])) . '</td>
							<td data-label="Data Saída">' . date("d/m/Y", strtotime($v1['day_end'])) . '</td>
							<td><a href="' . $base . 'admin/agenda/editar/' . $v1['id'] . '">Editar</a></td>	
							<td><a href="' . $base . 'admin/agenda/remover/' . $v1['id'] . '">Excluir</a></td>							
						</tr>';
		}
		$retorno .= "</tbody>
				</table>
				'";
		return $retorno;
	}
}
