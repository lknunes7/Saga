<?php
    //parâmetros de conexão com BD
    define('HOST', 'localhost');//define o nome do servidor
    define('USER', 'sitehotel_bd'); //nome do usuário
    define('PASSWORD', '1234'); //define a senha de acesso ao BD
    define('DB', 'sitehotel_bd'); //define o nome do Bando de Dados

    //criar um objeto de conexão
    $conn = new mysqli(HOST, USER, PASSWORD, DB);

    //checar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>