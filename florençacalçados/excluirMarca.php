<!DOCTYPE html>
<html lang="br">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Excluir Calçado</title>
 
</head>
 
<body>
<?php
 require "calcado.class.php";
if ($_GET) {
    $id = $_GET["id"];
    $calcado = new Calcado();
    $calcado ->buscar($id);
?>       
      Excluir Calçado
              <form method="post" action="delMarca.php">
                <label for="calcado">Calçado</label>
                <input type="hidden" name="idMarca" value="<?php echo $calcado->getIdMarca(); ?>"/>
                <input  id="calcado" name="calcado" value="<?php echo $calcado->getCalcado(); ?>" type="text" placeholder="Nome do Calçado" disabled>
             
         
          <button class="btn btn-primary btn-block" type="submit">Excluir</button>
        </form>
<?php }
 
?>
     
</body>
 
</html>