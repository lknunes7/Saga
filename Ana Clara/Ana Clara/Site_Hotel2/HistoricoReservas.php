<?php
include_once('ConexaoBD/Conexaobd.php');
session_start();

if (!isset($_SESSION['usuario_nome'])) {
    header("Location: Inicio.php");
}

// Pegar o nome do usuário logado
$nome_usuario = $_SESSION['usuario_nome'];

// Consulta para pegar todas as reservas do usuário
$sql = "SELECT * FROM reserva WHERE Nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico - Hotel</title>
    <link rel="stylesheet" href="Principal.css">
    <link rel="icon" href="imagens/logo-pousada-quinta-do-ypua-vmake.png" type="image/jpeg">
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto; /* Margem para afastar do topo */
            background: rgba(255, 255, 255, 0.9); /* Fundo branco semi-transparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); /* Efeito de blur no fundo */
        }
        .reserva-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .reserva-table th, .reserva-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .reserva-table th {
            background-color: #007BFF; /* Cor do cabeçalho */
            color: white;
        }
        .reserva-table tr:hover {
            background-color: #f1f1f1; /* Efeito hover nas linhas */
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="navbar-content">
        <a href="Principal.php" style="background: none" class="menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
        </a>
        <div class="logo">
            <img src="imagens/logo-pousada-quinta-do-ypua-vmake.png" alt="Logo do Hotel">
        </div>
    </div>
</div>

<h1>Minhas Reservas</h1>

<div class="background"></div>

<div class="container">
    <?php
    if ($stmt->execute()) {
        $resultado = $stmt->get_result();

        // Exibir as reservas
        if ($resultado->num_rows > 0) {
            echo "<table class='reserva-table'>"; // Usando a nova classe aqui
            echo "<tr><th>Código</th><th>Tipo de Quarto</th><th>Check-In</th><th>Check-Out</th><th>Nº Adultos</th><th>Nº Crianças</th><th>Nome</th></tr>";

            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha['Codigo'] . "</td>";
                echo "<td>" . $linha['TipoQuarto'] . "</td>";
                echo "<td>" . $linha['CheckIn'] . "</td>";
                echo "<td>" . $linha['CheckOut'] . "</td>";
                echo "<td>" . $linha['NumAdultos'] . "</td>";
                echo "<td>" . $linha['NumCriancas'] . "</td>";
                echo "<td>" . $linha['Nome'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Você ainda não tem reservas.</p>";
        }
    } else {
        echo "Erro ao consultar reservas: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
    ?>
</div>
</body>
</html>
