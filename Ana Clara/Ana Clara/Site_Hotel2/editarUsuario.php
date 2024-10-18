<?php
    include_once("conexaobd/ConexaoBD.php");
    session_start();
if(!isset($_SESSION['id'])){
    header("Location: Inicio.php");
}


// Receber os dados do formulário
if (isset($_POST['txtNome'])) {
    $nome = $_POST["txtNome"];
    $descricao = $_POST['txtDesc']; // Nome corrigido para corresponder ao campo do formulário
    $telefone = $_POST["txtTelefone"];
    $datanascimento = $_POST["txtNascimento"];

    // Criar o comando update
    $codigo = $_GET["id"];

    // Corrigir a variável e a sintaxe SQL
    $sql = "UPDATE usuario
        SET Nome = '$nome',
            Descricao = '$descricao',
            DataNascimento = '$datanascimento',
            Telefone = '$telefone'
        WHERE Codigo = $codigo"; // Remover a vírgula extra

    // Executar o comando SQL
    if ($conn->query($sql) === TRUE) {
?>
        <script>
            alert("Registro atualizado com sucesso!");
            window.location = "Perfil.php";
        </script>
<?php
    } else {
?>
        <script>
            alert("Erro ao atualizar o registro");
            window.history.back();
        </script>
<?php
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Hotel</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="imagens/logo-pousada-quinta-do-ypua-vmake.png" type="image/jpeg">
</head>

<body>
    
<div class="background"></div>

<?php
    $id = $_SESSION['id'];
    $SQL = "SELECT * FROM usuario WHERE Codigo = '$id'"; // Corrigir o nome da coluna para 'Codigo'
    $r = $conn->query($SQL);
    $dados_usuario = $r->fetch_assoc();
?>
    
        <form  method="post" class="formHotel">

        <a href="Perfil.php" class="btnVoltar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
        </a>


        <h2>Editar Usuário</h2>

            <label for="txtNome">Nome:</label>
            <input name="txtNome" id="txtNome" type="text" value="<?php echo htmlspecialchars($dados_usuario['Nome']) ; ?>" required><br><br>

            <label for="txtDesc">Descrição:</label>
            <input name="txtDesc" id="txtDesc" type="text" value="<?php echo htmlspecialchars($dados_usuario['Descricao']); ?>"><br><br>

            <label for="txtNascimento">Data de Nascimento:</label>
            <input name="txtNascimento" id="txtNascimento" type="date" value="<?php echo htmlspecialchars($dados_usuario['DataNascimento']); ?>" required><br><br>

            <label for="txtTelefone">Telefone:</label>
            <input name="txtTelefone" id="txtTelefone" type="text" value="<?php echo htmlspecialchars($dados_usuario['Telefone']); ?>" required><br><br>

            <input type="submit" value="Salvar Alterações">
        </form>

</body>
</html>