<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Hotel</title>
<link rel="stylesheet" href="index.css">
<link rel="icon" href="imagens/logo-pousada-quinta-do-ypua-vmake.png" type="image/jpeg">
</head>
<body>
<div class="background"></div>
<div class="content">
    <form action="ConsultarUsuario.php" method="post" class="formHotel">
        <h1>Login</h1>

        <label for="email">Email:</label>
        <input type="email" id="email" name="txtEmail" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="txtSenha" required><br>

        <div class="signup-link">
            <p>Não possui uma conta?</p><a href="Cadastro.php">Cadastre-se</a>
        </div>

        <input type="submit" value="Entrar">
    </form>
</div>
                                                                                                                                       
</body>

</html>
