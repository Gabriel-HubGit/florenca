<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Alterar Cliente</title>
 
</head>
 
<body>
<?php
require "cliente.class.php";
if ($_GET) {
    $id = $_GET["id"];
    $cliente = new Cliente();
    $calcado ->buscar($id);
?>       
      Atualização de Cliente
        <form method="post" action="updMarca.php">
         
                <label for="cliente">Cliente</label>
                <input type="hidden" name="idMarca" value="<?php echo $calcado->getIdMarca(); ?>"/>
                <input  id="cliente" name="cliente" value="<?php echo $cliente->getCliente(); ?>"  placeholder="Nome do Cliente">
             
          <button class="btn btn-primary btn-block" type="submit">Alterar</button>
        </form>
<?php }
 
?>
</body>
 
</html>