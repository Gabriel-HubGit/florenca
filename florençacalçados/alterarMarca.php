<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Alterar Calçado</title>
 
</head>
 
<body>
<?php
require "calcado.class.php";
if ($_GET) {
    $id = $_GET["id"];
    $calcado = new Calcado();
    $calcado ->buscar($id);
?>       
      Atualização de Calçado
        <form method="post" action="updMarca.php">
         
                <label for="Calcado">Calçado</label>
                <input type="hidden" name="idMarca" value="<?php echo $calcado->getIdMarca(); ?>"/>
                <input  id="calcado" name="calcado" value="<?php echo $calcado->getCalcado(); ?>"  placeholder="Nome do Calçado">
             
          <button class="btn btn-primary btn-block" type="submit">Alterar</button>
        </form>
<?php }
 
?>
</body>
 
</html>