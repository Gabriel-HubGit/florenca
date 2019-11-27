<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Excluir Cliente</title>
 
</head>
 
<body>
<?php
 require "cliente.class.php";
if ($_GET) {
    $id = $_GET["id"];
    $cliente = new Cliente();
    $cliente ->buscar($id);
?>       
      Excluir Calçado
              <form method="post" action="delMarca.php">
                <label for="cliente">Cliente</label>
                <input type="hidden" name="idMarca" value="<?php echo $cliente->getIdMarca(); ?>"/>
                <input  id="cliente" name="cliente" value="<?php echo $cliente->getCliente(); ?>" type="text" placeholder="Nome do Cliente" disabled>
             
         
          <button class="btn btn-primary btn-block" type="submit">Excluir</button>
        </form>
<?php }
 
?>
     
</body>
 
</html>