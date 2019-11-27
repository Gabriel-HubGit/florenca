<?php
 
    //variaveis para conexão        
    $SERVER = 'localhost'; //servidor
    $USER = 'root'; //usuario
    $PASS = ''; //senha
    $DATABASE = 'pw1_2019'; //nome da base
    $conn = new mysqli($SERVER, $USER, $PASS, $DATABASE);
            // Caso algo tenha dado errado, exibe uma mensagem de erro
            if (mysqli_connect_errno())
                trigger_error(mysqli_connect_error());
 
 
?>