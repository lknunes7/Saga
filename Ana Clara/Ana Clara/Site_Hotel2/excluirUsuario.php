<?php
    include_once("conexaobd/ConexaoBD.php");
    session_start();
if(!isset($_SESSION['id'])){
    header("Location: Inicio.php");
}

// Receber o código do registro a ser excluído da consulta GET
if (isset($_GET["id"])) {
    // Captura o valor do "id" da consulta GET
    $Codigo = $_GET["id"];
    // Cria o comando de exclusão
    $sql = "DELETE FROM usuario WHERE Codigo = '$Codigo'";
    // Executa o comando
    if ($conn->query($sql) == TRUE) {
?>
        <script>
            alert("Registro excluído com sucesso.");
            window.location = "Inicio.php";
        </script>
<?php
    } else { // Caso de erro
?>
        <script>
            alert("Erro ao excluir o registro.");
            window.location = "Perfil.php";
        </script>
<?php
    }
}
?>