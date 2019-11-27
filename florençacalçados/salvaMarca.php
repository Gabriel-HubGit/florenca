<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cadastrar Calçado</title>
 
</head>
 
<body>
 
          <?php
 
          require "calcado.class.php";
          if ($_POST) {
              $nomeCalcado = $_POST["calcado"];
              $unidade = $_POST["unidade"];
              $preco = $_POST["preco"];
              $custo = $_POST["custo"];
              $fornecedor = $_POST["fornecedor"];
             
              $calcado = new Calcado();
$calcado->setCalcado($nomeCalcado);
$resultado = $calcado->cadastrar();
    if ($resultado ==0) {
        echo "Calçado cadastrado com sucesso com o código: ". $calcado->getIdMarca();
        echo "<br/>";
    }
    else {
        echo "Erro";
    }
             
          }
          else {
              echo "Dados não preenchidos";
          }
          ?>
       
</body>
 
</html>