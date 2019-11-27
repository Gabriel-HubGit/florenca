<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cadastrar Cliente</title>
 
</head>
 
<body>
 
          <?php
 
          require "cliente.class.php";
          if ($_POST) {
              $nomeCliente = $_POST["cliente"];
              $cpf = $_POST["cpf"];
              $telefone = $_POST["telefone"];
              $endereco = $_POST["endereco"];
             
              $cliente = new Cliente();
$cliente->setCliente($nomeCliente);
$resultado = $cliente->cadastrar();
    if ($resultado ==0) {
        echo "Cliente cadastrado com sucesso com o código: ". $cliente->getIdMarca();
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