<?php
session_start();
include_once('ConexaoBD/Conexaobd.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: Inicio.php"); // Redireciona se não estiver logado
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Reservas</title>
    <link rel="stylesheet" href="todasReservas.css">
<link rel="icon" href="imagens/logo-pousada-quinta-do-ypua-vmake.png" type="image/jpeg">
</head>
<body>
<div class="reservas-container">
    <h2>Histórico de Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Tipo de Quarto</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Número de Adultos</th>
                <th>Número de Crianças</th>
                <th>Nome do Usuário</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('ConexaoBD/Conexaobd.php');
            
            $sql = "SELECT * FROM reserva";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['Codigo']}</td>
                            <td>{$row['TipoQuarto']}</td>
                            <td>{$row['CheckIn']}</td>
                            <td>{$row['CheckOut']}</td>
                            <td>{$row['NumAdultos']}</td>
                            <td>{$row['NumCriancas']}</td>
                            <td>{$row['Nome']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhuma reserva encontrada.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<div class="background"></div>

</body>
</html>
