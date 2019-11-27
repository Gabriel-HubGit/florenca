<?php
Class Calcado{
	private $calcado;
	private $idMarca;
	private $preco;
	private $custo;
	private $fornecedor;
	private $unidade;

	public function getUnidade(){
		return $this -> unidade;
	}

	public function setUnidade($unidade){
		$this -> unidade = $unidade
	}


	public function getCalcado(){
		return $this -> calcado;
	}

	public function setCalcado($calcado){
		$this -> calcado = $calcado;
	}

	public function getIdMarca(){
		return $this -> idMarca;
	}

	public function setIdMarca($idMarca){
		$this -> idMarca = $idMarca;
	}

	public function getPreco(){
		return $this -> preco;
	}

	public function setPreco($preco){
		$this -> preco = $preco;
	}

	public function getCusto(){
		return $this -> custo;
	}

	public function setCusto($custo){
		$this -> custo = $custo;
	}

	public function getFornecedor(){
		return $this -> fornecedor;
	}

	public function setFornecedor($fornecedor){
		$this -> fornecedor = $fornecedor;
	}

	public function cadastrar(){
		include "Acessa.class.php";
		$nomeCalcado = $this -> calcado;
		$stmt = $conn -> prepare("INSERT INTO calcado (idMarca, calcado, preco, custo, fornecedor, unidade) VALUES ('',?,'','','','')");
		$stmt -> bind_param("siisi", $nomeCalcado, $preco, $custo, $fornecedor, $unidade);
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
		$nome = $this -> calcado;
		$idMarca = $this -> idMarca;
		$stmt = $conn -> prepare("Update calcado set calcado=? where idMarca = ?");
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
	public function excluir(){
		include "Acessa.class.php";
		$idMarca = $this -> idMarca;

		$sql = "Delete from calcado where idMarca= ". idMarca;

		if($conn -> query($sql)){
			return 0;
		}

		else{
			return 1;
		}
public function listar($ordem = "calcado", $qt = 10){
		include "Acessa.class.php";
		$sql = "Select * from calcado order by $ordem limit $qt";
		$resultado = $conn -> query($sql);

		if($resultado -> num_rows > 0){
			while($linha = $resultado -> fetch_assoc()){
				$dados[] = array ("idMarca" => $linha["idMarca"], "calcado" => $linha["calcado"], "unidade" => $linha["unidade"],  "custo" => $linha["custo","preco" => $linha["preco"], "forncedor" => $linha["forncedor"]);
			}
			return $dados;
		}
		else{
			return 1;
		}
		$conn -> close();
	}




}