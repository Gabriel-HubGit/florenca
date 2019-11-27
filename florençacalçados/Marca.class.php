<?php 
class Marca{
	private $idMarca;
	private $marca;

	public function getIdMarca(){
		return $this -> idMarca;
	}

	public function setIdMarca($idMarca){
		$this -> idMarca = $idMarca;
	}

	public function getMarca(){
		return $this -> marca;
	}

	public function setMarca($marca){
		$this -> marca = $marca;
	}

	public function cadastrar(){
		include "Acessa.class.php";
		$nomeMarca = $this -> marca;
		$stmt = $conn -> prepare("INSERT INTO marca (idMarca, marca) VALUES ('',?)");
		$stmt -> bind_param("s", $nomeMarca);
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
		$nome = $this -> marca;
		$idMarca = $this -> idMarca;
		$stmt = $conn -> prepare("Update marca set marca=? where idMarca = ?");
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

	public function listar($ordem = "marca", $qt = 10){
		include "Acessa.class.php";
		$sql = "Select * from marca order by $ordem limit $qt";
		$resultado = $conn -> query($sql);

		if($resultado -> num_rows > 0){
			while($linha = $resultado -> fetch_assoc()){
				$dados[] = array ("idMarca" => $linha["idMarca"], "nome" => $linha["nome"]);
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

		$sql = "Delete from marca where idMarca= ". idMarca;

		if($conn -> query($sql)){
			return 0;
		}

		else{
			return 1;
		}


	}

	public function contagem(){
		include "Acessa.class.php";
		$sql = "Select count(idMarca) as total from marca";
		$resultado = $conn -> query($sql);
		while($liha = $resultado -> fetch_assoc()){
			return $linha["total"]; 
		}

		$conn -> close();
	}

	public function buscar($idMarca){
		include "Acessa.class.php";
		$sql = "Select * from marca";
		$sql = " where idMarca = ". $idMarca;

		$resultado = $conn -> query($sql);

		while($linha = $resultado -> fetch_assoc()){
			self::setIdMarca($linha["idMarca"]);

			self::setMarca($linha["marca"]);


		}

		$conn -> close();
	}


}
?>