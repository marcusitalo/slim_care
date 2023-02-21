<?php

class sql{
	
	static public $dados = array();
	
	static function setDado($d){
		sql::$dados = $d;
	}
	
	static function querySql($key,$offset='10'){
		switch ($key){
			case 'login':
					$sql= "SELECT u.id,u.nome,u.nivel_id as nivel,n.descricao as grupo,u.ativo,u.foto,u.data_ultimo_acesso FROM usuarios u INNER JOIN nivel n ON u.nivel_id = n.id AND u.login = :login AND u.senha = :senha";
			break;
			case 'observadores':
					$sql= "SELECT u.nome,u.foto FROM usuarios u WHERE u.nivel_id = 3000 AND u.data_ultimo_acesso >= (SELECT a.data_publicacao FROM acontecimentos a INNER JOIN cenarios c ON c.id = a.cenarios_id AND a.id = :acontecimento ORDER BY a.data_publicacao desc LIMIT 1) ORDER BY u.data_ultimo_acesso desc";
			break;
			case 'usuarioexistes':
					$sql= "SELECT u.id FROM usuarios u WHERE u.login = :login AND u.id <> :id";
			break;
			case 'listadevantagens':
					$sql="SELECT * FROM vantagem WHERE (cenarios_id = ".(sql::$dados['cenario_ativo'])." OR cenarios_id = 0 ) ORDER BY titulo";
			break;
			case 'listadevantagensdopersonagem':
				$sql="SELECT * FROM vantagem WHERE id in (SELECT vantagem_id FROM vantagens_personagem WHERE personagem_id = $offset) ORDER BY titulo";
			break;
			case 'listadehabilidade':
					$sql="SELECT * FROM habilidade WHERE (cenarios_id = ".(sql::$dados['cenario_ativo'])." OR cenarios_id = 0 ) ORDER BY titulo";
			break;
			case 'listadetransmissao':
					$sql="SELECT *,DATE_FORMAT(data_hora_envio,'%d/%m/%Y') as dt FROM narrativa /*WHERE DATE_FORMAT(data_hora_envio,'%d/%m/%Y') = DATE_FORMAT(now(),'%d/%m/%Y')*/ ORDER BY id desc";
			break;
            case 'listaderegras':
					$sql="SELECT * FROM regras WHERE (cenarios_id = ".(sql::$dados['cenario_ativo'])." OR cenarios_id = 0 ) ORDER BY titulo";
			break;
			case 'listadecompilados':
				$sql="SELECT * FROM compilados WHERE (cenarios_id = ".(sql::$dados['cenario_ativo'])." OR cenarios_id = 0 ) ORDER BY titulo";
			break;
			case 'countransmissao':
					$sql="SELECT count(*) FROM narrativa /*WHERE DATE_FORMAT(data_hora_envio,'%d/%m/%Y') = DATE_FORMAT(now(),'%d/%m/%Y')*/";
			break;			
			case 'listadeusuarios':
					$sql="SELECT * FROM usuarios WHERE nivel_id > :nivel ORDER BY nome";
			break;
			case 'listadecenarios':
					$sql="SELECT c.*,(SELECT url_imagem FROM imagens_cenarios WHERE cenarios_id = c.id ORDER BY sequencial LIMIT 1) as foto FROM cenarios c ORDER BY c.titulo";
			break;			
			case 'listadecenariosativos':
					$sql="SELECT c.id, c.titulo FROM cenarios c WHERE (c.id in (".(sql::$dados['cenario_ativo']).")) ORDER BY c.titulo";
			break;
			case 'listademonstros':
					$sql="SELECT p.*,p.url_imagem as foto,'monstros' as classe FROM monstros p WHERE ( p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome";
			break;
			case 'listadenpcs':
					$sql="SELECT p.*,p.url_imagem as foto,'npcs' as classe FROM npcs p WHERE ( p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome";
			break;
			case 'listadepersonagens':
					$sql="SELECT p.*,p.url_imagem as foto,'personagem' as classe FROM personagens p WHERE (p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome";
			break;
			case 'listadelocais':
				$sql="SELECT p.*,p.url_imagem as foto,'locais' as classe FROM locais p WHERE (p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome";
			break;
			case 'listadeextras':
				$sql="SELECT p.*,p.url_imagem as foto,'extras' as classe FROM extras p WHERE (p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome";
			break;
			case 'listadepersonnpcs':
					$sql="(SELECT p.nome,p.url_imagem as foto FROM npcs p WHERE ( p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome) UNION (SELECT p.nome,p.url_imagem as foto FROM personagens p WHERE (p.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR p.cenarios_id = 0 ) ORDER BY p.nome)";
			break;			
			case 'listadecenariosresumida':
					$sql="SELECT id,titulo as descricao FROM cenarios WHERE ativo = '1' ORDER BY titulo";
			break;
			case 'listadeacontecimentos':
					$sql="SELECT a.id,a.titulo,a.descricao,DATE_FORMAT(a.data_publicacao,'%d/%m/%Y %H:%i:%s') data_publicacao,a.data_publicacao as dt,a.cenarios_id,c.titulo cenario,u.foto,u.nome FROM acontecimentos a INNER JOIN cenarios c ON c.id = a.cenarios_id INNER JOIN usuarios u ON u.id = a.usuario_id WHERE (a.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR a.cenarios_id = 0 ) ORDER BY a.data_publicacao desc LIMIT 4 OFFSET $offset";
			break;
			case 'listadecomentarios':
					$sql="SELECT c.id,c.descricao,DATE_FORMAT(c.data_publicacao,'%d/%m/%Y %H:%i:%s') data_publicacao,c.data_publicacao as dt,c.acontecimento_id,u.foto,u.nome,c.usuario_id FROM comentarios_acontecimentos c INNER JOIN usuarios u ON u.id = c.usuario_id AND c.acontecimento_id = :acontecimento WHERE (c.cenarios_id = ".(sql::$dados['cenario_ativo'])." OR c.cenarios_id = 0 ) ORDER BY c.data_publicacao asc";
			break;			
			case 'ficha':
					$sql="SELECT * FROM ficha";
			break;
			default:$sql='';
		}
		return $sql;
	}
}
?>