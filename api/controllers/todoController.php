<?php
	
class todoController extends controller {

	private $tarefa;

	public function __construct(){
		parent::__construct();

		$this->tarefa = new Tarefas();
	}



	public function index() {
		
		echo "API restful para gerenciar tarefas: <br/>
			meusite.com/todo/<br/>
			seguido pelos seguintes métodos<br/>
			listar (:requisição GET)<br/>add (:requisição POST, parâmetros 'titulo' e 'descricao')<br/>del (:requisição POST, parâmetro 'id')<br/>
			update (:requisição POST parâmetros 'id' e 'status')";	

	}

	public function listar(){
		$array = array();

		$array = $this->tarefa->listar();
		header("Content-Type: application/json");

		echo json_encode($array);
		
	}

	public function add(){
		if (isset($_POST['titulo'])&& !empty($_POST['titulo'])) {
			
			$titulo = addslashes($_POST['titulo']);
		
			if (isset($_POST['descricao'])&& !empty($_POST['descricao'])) {
				$descricao = addslashes($_POST['descricao']);
				echo 'Tarefa '. ($this->tarefa->addTarefa($titulo,$descricao) ? " salva com sucesso." : " não adicionada!");
			}
		}
		
			
	}

	public function del(){

		if (isset($_POST['id'])&& !empty($_POST['id'])) {
				
				$id = addslashes($_POST['id']);
				
				echo 'Tarefa '.($this->tarefa->delTarefa($id) ?  ' deletada com sucesso' : 'não encontrada!');
		}
	}

	public function update(){
		
		if (isset($_POST['id'])&& !empty($_POST['id'])) {
		
		$id = addslashes($_POST['id']);
	
			if (isset($_POST['status'])&& !empty($_POST['status'])) {
				$status = addslashes($_POST['status']);
				echo 'Tarefa '.($this->tarefa->updateStatus($status, $id) ?  ' alterada com sucesso' : 'não encontrada!');
			}
		}
		

	}
}