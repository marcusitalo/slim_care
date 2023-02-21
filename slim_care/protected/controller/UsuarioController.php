<?php

Doo::loadController('CoreController');

class UsuarioController extends CoreController {
	
	private $titulo="Usuários";	
	private $form = "formularios/usuario";
	private $table = "usuarios";
	
	public function listar(){
	 	$this->appendFile($this->data, $this->jsPath.'ativardesativar.js','text/javascript');
	 	
		$this->data['titulo']=$this->titulo;
		$this->data['subtitulo']="Lista de Usuários";
		
		Doo::loadClass("Sql");
		Doo::loadClass("Estruturas");
		
		sql::setDado($this->data);
		
		$this->data['lateral']   = Estruturas::construirMenuLateral($this->data['baseurl'],$this->data,'title_ucadastro');
				
		$resultado = Doo::db()->fetchAll(sql::querySql('listadeusuarios'),array(':nivel'=>$this->data['nivel']));
		$this->data['informacoes']=Estruturas::construirListaDeUsuarios($this->data['baseurl'],$resultado);		
		
		$this->render("app/cabecalho",$this->data);		
		$this->render("app/menu",$this->data);
		$this->render("formularios/listar",$this->data);
		
	}
	public function cadastro(){
	 	$this->appendFile($this->data, $this->jsPath.'verificacao_usuario.js','text/javascript');
	
		$this->data['titulo']=$this->titulo;
		$this->data['subtitulo']="Novo";
		$this->data['foto'] 	 = "";
		$this->data['acao'] = "finalizar";
		
		$this->data['action']=$this->data['baseurl'].$this->table."/".$this->data['acao'];
		
		$this->data['nome']=$this->data['login']=$this->data['senha']=$this->data['email']=$this->data['disabled']=$this->data['id']="";
		
		$this->data['lateral'] = Estruturas::construirCabecalhoNovoUsuario($this->data['baseurl'],$this->data,'title_ucadastro');
		
		$this->render("app/cabecalho",$this->data);			
		$this->render("app/menu",$this->data);
		$this->render("formularios/novousuario",$this->data);
	}
	public function remover(){
		$this->editar("disabled","excluir","Remover");
	}
	public function editar($disabled="",$acao="finalizar",$subtitulo="Editar"){
	 	$this->appendFile($this->data, $this->jsPath.'verificacao_usuario.js','text/javascript');
	 	$this->appendFile($this->data, $this->jsPath.'previewimage.js','text/javascript');
		$id = $this->params['id'];
		
		Doo::loadModel('Usuario');
		
		$objeto 								= new Usuario();
		$objeto->id 							= $id;
		$result 								= $this->db()->find($objeto);
		$objeto									= $result[0];
		$this->data['id']						= $id;
		$this->data['nome']						= $objeto->nome;
		$this->data['login']					= $objeto->login;
		$this->data['email']					= $objeto->email;
		
		Doo::loadClass('Cripto');
		$senha = cripto::descriptografar($objeto->senha);
		$this->data['senha']					= $senha;
		$this->data['nivel']					= $objeto->nivel_id;
		$this->data['titulo']					= $this->titulo;
		$this->data['subtitulo']				= $subtitulo;		
		$this->data['acao'] 					= $acao;
		$this->data['action']					= $this->data['baseurl'].$this->table."/".$this->data['acao'];
		$this->data['desativar']				= $this->data['baseurl'].$this->table."/desativacao/".$this->data['id'];
		
		$this->data['disabled']=$disabled;
		
		$this->data['lateral']   = Estruturas::construirMenuLateral($this->data['baseurl'],$this->data,'title_ucadastro');
		$this->data['foto'] 	 = '<tr>
										<td rowspan="7" style="width: 18%;"><p>Foto</p><span id="pre-image"><img src="'.$objeto->foto.'" class="foto_usuario2"></span><input id="prodimg" type="file" name="foto[]" '.$disabled.'/></td>										
									</tr>';	
			
		$this->render("app/cabecalho",$this->data);		
		$this->render("app/menu",$this->data);
		$this->render($this->form,$this->data);
	}
	public function finalizar(){
		try{
			
			Doo::loadModel('Usuario');
			Doo::loadClass('Upload');
			$objeto 						= new Usuario();
			$id 							= (isset($_POST['id']))?$_POST['id']:'';
				
			if($id == ''){
				$objeto->nome				= (isset($_POST['nome']))?$_POST['nome']:null;
				$objeto->login				= (isset($_POST['login']))?$_POST['login']:null;
				$objeto->email				= (isset($_POST['email']))?$_POST['email']:null;
				$senha						= (isset($_POST['senha']))?$_POST['senha']:null;
				Doo::loadClass('Cripto');
				$senha = cripto::criptografar($senha);				
				$objeto->senha				= $senha;
		    	$objeto->data_ultimo_acesso = date('d/m/Y H:i:s');
		    	$objeto->ativo 				= '0';
		    	$objeto->nivel_id			= '3000';
				
				$result = Doo::db()->insert($objeto);
							
				$_SESSION['user_system']['report']	= (isset($result))?'1|'.$this->titulo.' inserido com sucesso! <br/> Aguarde a Liberação do Mestre.':'0|Falha no cadastro '.$this->titulo;
			
			}
			else{
				$objeto->id					= $id;
				$result 					= $this->db()->find($objeto);
				$objeto						= $result[0];
				$objeto->nome				= (isset($_POST['nome']))?$_POST['nome']:null;
				$objeto->login				= (isset($_POST['login']))?$_POST['login']:null;
				$objeto->email				= (isset($_POST['email']))?$_POST['email']:null;				
				if ($_FILES['foto']['name'][0]!=''){
					$capa 			= $_FILES['foto'];
					$upload 		= new Upload($this->data['baseurl'],'foto','',$capa,false);
						$upload->uploadCapa($id);
						$foto=$upload->getNome();
					$objeto->foto	= htmlspecialchars('/pictures/foto/'.$foto);
				}
				$senha						= (isset($_POST['senha']))?$_POST['senha']:null;
				Doo::loadClass('Cripto');
				$senha = cripto::criptografar($senha);				
				$objeto->senha				= $senha;
				
				$result = Doo::db()->update($objeto);
				
				$_SESSION['user_system']['report'] = (isset($result))?'1|'.$this->titulo.' alterado com sucesso!':'0|Falha ao alterar '.$this->titulo;
				$_SESSION['user_system']['foto']   = htmlspecialchars('/pictures/foto/'.$foto);
			}
			return array($this->data['base'].'redirecionar', 302);
						
		}
		catch (PDOException $e){
			$_SESSION['user_system']['report'] = $e->getMessage();			
		}			
	}	
	public function excluir(){
		try{
			if(!isset($_POST['id']))
				$this->_redirect('inicio');
			
			$id = $_POST['id'];
			
			Doo::loadModel('Usuario');			
			$objeto 				= new Usuario();
			$objeto->id				= $id;
			$result 				= Doo::db()->delete($objeto);
			
			$_SESSION['user_system']['report'] =(!isset($result))?'1|'.$this->titulo.' removida com sucesso!':'0|Falha ao remover '.$this->titulo;			
			return array($this->data['base'].'redirecionar', 302);
		}
		catch (PDOException $e){
			$_SESSION['user_system']['report'] = $e->getMessage();			
		}
	}
	public function desativacao(){
		$id = $this->params['id'];
		Doo::loadModel('Usuario');
		$objeto 					= new Usuario();
		$objeto->id					= $id;
		$result 					= $this->db()->find($objeto);
		$objeto						= $result[0];
		$objeto->ativo				= '0';		
		$result = Doo::db()->update($objeto);
		
		$_SESSION['user_system']['report'] = (isset($result))?'1|Conta desativada com sucesso!':'0|Falha ao desativar a conta';
		if($this->data['nivel']<3000){	
			echo $_SESSION['user_system']['report'];
		}		
		else{
			return array($this->data['base'], 302);
		}
	}
	public function ativacao(){
		$id = $this->params['id'];
		Doo::loadModel('Usuario');
		$objeto 					= new Usuario();
		$objeto->id					= $id;
		$result 					= $this->db()->find($objeto);
		$objeto						= $result[0];
		$objeto->ativo				= '1';		
		$result = Doo::db()->update($objeto);
		
		$_SESSION['user_system']['report'] = (isset($result))?'1|Conta ativada com sucesso!':'0|Falha ao ativar a conta';
			
		echo $_SESSION['user_system']['report'];		
	}	
	
}
?>