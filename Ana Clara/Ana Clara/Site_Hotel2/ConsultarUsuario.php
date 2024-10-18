<?php
include_once("conexaobd/ConexaoBD.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: Inicio.php");
}

// Receber os dados que vieram do form via POST
$email = $_POST["txtEmail"];
$senha = $_POST["txtSenha"];

// Define o SQL de seleção
$SQL = "SELECT * FROM usuario WHERE email = '$email' and Senha = '" . md5($senha) . "'";

// Executar o comando SQL
$r = $conn->query($SQL);
$quant = 0;
if ($r) {
    $quant = $r->num_rows;
}

// Verificar se o usuário foi encontrado
if ($quant > 0) {
    $dados_usuario = $r->fetch_assoc();
    
    // Carregar os dados do usuário na sessão
    $_SESSION['id'] = $dados_usuario['Codigo'];
    $_SESSION['usuario_nome'] = $dados_usuario['Nome']; // Adicionando o nome do usuário

    ?>
    <script>
        alert("Login efetuado com sucesso!");
    </script>
    <?php 
    header("Location: Principal.php"); 
    exit(); // Sempre bom usar exit após redirecionar
} else {
    // Usuário não encontrado
    ?>
    <script>
        alert("Usuário não encontrado. Email e/ou senha estão incorretos.");
        window.history.back(); // Volta para a página anterior
    </script>
    <?php
}
?>
