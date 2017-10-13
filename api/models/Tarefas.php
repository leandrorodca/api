<?php


class Tarefas extends model{

public function listar(){
	$array = array();
	$sql = $this->db->query("SELECT * FROM tarefas");
	if ($sql->rowCount()>0) {
		$array = $sql->fetchAll();
	}
	return $array;
}
public function addTarefa($titulo,$descricao){

		$sql = $this->db->prepare("INSERT INTO tarefas SET titulo = :titulo, descricao = :descricao");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);
		$sql->execute();

		return ($sql->rowCount()>0 ? true : false);
			
}
public function delTarefa($id){
		
		$sql = $this->db->prepare("DELETE FROM tarefas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		return ($sql->rowCount()>0 ? true : false);
}
public function updateStatus($status , $id){
		
		$sql = $this->db->prepare("UPDATE tarefas SET status = :status WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":status", $status);			
		$sql->execute();

		return ($sql->rowCount()>0 ? true : false);
		
}



}