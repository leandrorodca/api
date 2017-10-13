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

	//lista todas as tarefas do banco
	public function listar(){
		$array = array();

		$array = $this->tarefa->listar();
		header("Content-Type: application/json");

		echo json_encode($array);
		
	}

	//adciona uma nova tarefa no banco, mediante um título e uma descrição
	public function add(){

		$titulo= $this->temValor($_POST['titulo']);

		$descricao = $this->temValor($_POST['descricao']);
			
		
		if ($titulo !=null && $descricao != null) {
				
			echo 'Tarefa '. ($this->tarefa->addTarefa($titulo,$descricao) ? " salva com sucesso." : " não adicionada!");
		
		}
				
	}

	//deleta uma tarefa pelo se id
	public function del(){

		$id = $this->temValor($_POST['id']);

		if ($id!= null) {
				
			echo 'Tarefa '.($this->tarefa->delTarefa($id) ?  ' deletada com sucesso' : 'não encontrada!');
		}
	}

	// atualiza o status da tarefa
	public function update(){
		
		$id = $this->temValor($_POST['id']);
		
		$status = $this->temValor($_POST['status']);
		
		if ($id != null && $status != null) {
				
			echo 'Tarefa '.($this->tarefa->updateStatus($status, $id) ?  ' alterada com sucesso' : 'não encontrada!');
		}
	}

}