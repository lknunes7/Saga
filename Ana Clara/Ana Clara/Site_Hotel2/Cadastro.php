<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro - Hotel</title>
<link rel="stylesheet" href="index.css">
<link rel="icon" href="imagens/logo-pousada-quinta-do-ypua-vmake.png" type="image/jpeg">
</head>

<body>
<div class="background"></div>
<div class="content">
    <form action="InserirUsuario.php" method="post" class="formHotel">
        <h1>Cadastro</h1>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="txtNome" placeholder="Digite seu nome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="txtTelefone" placeholder="Digite seu telefone" required><br><br>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" id="nascimento" name="txtNascimento" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="txtEmail" placeholder="Digite seu email" autofocus="true" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="txtSenha" placeholder="Digite sua senha" required><br><br>

        <label for="password">Confirma a senha:</label>
        <input type="password" id="txtConfirmaSenha" name="txtConfirmaSenha" placeholder="Confirme sua senha"  required>

        <input type="submit" name ="btnCadastrar" value="Cadastrar" class="btn" onclick="validarSenha()" />

        <div class="signup-link">
            <p>Já possui uma conta?</p><a href="Login.php">Fazer Login</a>
        </div>
    </form>


</div>

<script>
function validarSenha() {
    var txtSenha = document.getElementById("senha");
    var txtConfirmaSenha = document.getElementById("txtConfirmaSenha");

    // Verifica se as senhas são diferentes
    if (txtSenha.value != txtConfirmaSenha.value) {
        txtConfirmaSenha.setCustomValidity("As senhas não coincidem!");
        return false; // Retorna falso para interromper o envio do formulário
    } else {
        txtConfirmaSenha.setCustomValidity("");
        alert('Cadastro realizado com sucesso!')
        return true; // Retorna verdadeiro para permitir o envio do formulário
    }
}

    document.getElementById('telefone').addEventListener('input', function (e) {
                let x = e.target.value.replace(/\D/g, '');
                x = x.match(/^(\d{0,2})(\d{0,5})(\d{0,4})$/);
                e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        </script>

</body>
</html>


