<?php
    include_once("conexaobd/ConexaoBD.php");
    session_start();
if(!isset($_SESSION['id'])){
    header("Location: Inicio.php");
}



    //receber os dados que vieram do form via POST
    $nome = $_POST["txtNome"];
    $email = $_POST["txtEmail"];
    $senha = $_POST["txtSenha"];
    $telefone = $_POST["txtTelefone"];
    $datanascimento = $_POST["txtNascimento"];
    

    //define o sql de inserção
    $SQL = "INSERT INTO usuario (Nome, Email, Senha, Telefone, DataNascimento)";
    $SQL .= " VALUES('" . $nome . "', '$email', '". md5($senha) ."', '$telefone', '$datanascimento')";

    //excecutar o comando sql

    //
    //echo($SQL); die();
    if ($conn->query($SQL) == TRUE) {
        ?>
        
        <?php header("location: Login.php"); ?>

        <script>
            alert("Registro salvo com sucesso!");
        </script>

        <?php
    } else {
        ?>
        <script>
            alert("Erro ao inserir o registro" . $conn->connect_error);
            window.history.back(); //simula o voltar do navegador
        </script>
        <?php
    }
    
?>
