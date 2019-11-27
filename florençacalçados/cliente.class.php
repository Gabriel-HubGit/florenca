<?php

Class Cliente(){
	private $nome;
	private $cpf;
	private $endereco;
	private $telefone;
	private $idMarca;

	public function getIdMarca(){
		return $this -> idMarca;
	}
	public function setIdMarca($idMarca){
		$this -> idMarca = $idMarca
	}


	public function getNome(){
		return $this -> nome;
	}

	public function setNome($nome){
		$this -> nome = $nome;
	} 

	public function getCpf(){
		return $this -> cpf;
	}

	public function setCpf($cpf){
		$this -> cpf = $cpf;
	}

	public function getEndereco(){
		return $this -> endereco;
	}

	public function setEndereco($endereco){
		$this -> endereco = $endereco;
	}

	public function getTelefone(){
		return $this -> telefone;
	}

	public function setTelefone($telefone){
		$this -> telefone = $telefone;
	}

	public function cadastrar(){
		include "Acessa.class.php";
		$nomeCliente = $this -> nome;
		$stmt = $conn -> prepare("INSERT INTO cliente (nome, cpf, telefone, endereco) VALUES ('','','','')");
		$stmt -> bind_param("siiss", $nomeCliente, $cpf, $telefone, $endereco, $idMarca);
		if($stmt -> execute()){
			$this -> idMarca = $stmt -> insert_id;
			return 0;
		}
		else{
			return 1;
		}

		$stmt -> close();
		$conn -> close();
	}

	public function alterar(){
		include "Acessa.class.php";
		$nome = $this -> nome;
		$idMarca = $this -> idMarca;
		$stmt = $conn -> prepare("Update clente set cliente=? where idMarca = ?");
		$stmt -> bind_param("si", $nome, $idMarca);
		$stmt -> execute();

		if(!$stmt -> errno){
			return 0;
		}

		else{
			return 1;
		}

		$stmt -> close();
		$conn -> close();
	}

	public function listar($ordem = "cliente", $qt = 10){
		include "Acessa.class.php";
		$sql = "Select * from cliente order by $ordem limit $qt";
		$resultado = $conn -> query($sql);

		if($resultado -> num_rows > 0){
			while($linha = $resultado -> fetch_assoc()){
				 $dados[] = array ("idMarca" => $linha["idMarca"], "nome" => $linha["nome"], "cpf" => $linha["cpf"], "endereco" => $linha["endereco"], "telefone" => $linha["telefone"]);
			}
			return $dados;
		}
		else{
			return 1;
		}
		$conn -> close();
	}

	public function excluir(){
		include "Acessa.class.php";
		$idMarca = $this -> idMarca;

		$sql = "Delete from cliente where idMarca= ". idMarca;

		if($conn -> query($sql)){
			return 0;
		}

		else{
			return 1;
		}
		$conn -> close();
}