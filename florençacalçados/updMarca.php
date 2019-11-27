<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Alterar Marca</title>
 
</head>
 
<body>
          <?php
          require "Marca.class.php";
          if ($_POST) {
              $idMarca = $_POST["idMarca"];
              $nomeMarca = $_POST["marca"];
             
              $marca = new Marca();
                $marca->setMarca($nomeMarca);
                $marca->setIdMarca($idMarca);
                $resultado = $marca->alterar();
    if ($resultado ==0) {
        echo "Marca alterada com sucesso com o código: ". $marca->getIdMarca();
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