<?php
include_once("conexaobd/ConexaoBD.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: Inicio.php");
}

// Receber os dados que vieram do formulário via POST
$tipo_quarto = $_POST["quarto"];
$check_in = $_POST["checkin"];
$check_out = $_POST["checkout"];
$num_adultos = $_POST["adultos"];
$num_criancas = isset($_POST["numero_criancas"]) ? $_POST["numero_criancas"] : 0;
$nome_usuario = $_SESSION['usuario_nome']; // Supondo que o nome do usuário esteja na sessão

// Define o SQL de inserção com os nomes das colunas corretos
$sql = "INSERT INTO reserva (TipoQuarto, CheckIn, CheckOut, NumAdultos, NumCriancas, Nome) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Prepara a consulta
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conn->error);
}

// Vincula os parâmetros e executa a consulta
$stmt->bind_param("ssssss", $tipo_quarto, $check_in, $check_out, $num_adultos, $num_criancas, $nome_usuario);

if ($stmt->execute()) {
    // Exibe uma mensagem de sucesso e redireciona após alguns segundos
    ?>
    <script>
        alert("Reserva realizada com sucesso!");
        window.location.href = "Principal.php"; // Página para onde você quer redirecionar após o sucesso
    </script>
    <?php
    exit();
} else {
    // Exibe uma mensagem de erro e volta para a página anterior
    ?>
    <script>
        alert("Erro ao inserir o registro: <?php echo $stmt->error; ?>");
        window.history.back(); // Simula o voltar do navegador
    </script>
    <?php
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
