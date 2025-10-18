<?php

if (isset($_POST['tamanho'])) {
    $tamanho = intval($_POST['tamanho']);
    $letraminuscula = isset($_POST['letraminuscula']);
    $letraMaiuscula = isset($_POST['letramaiuscula']);
    $simbolos = isset($_POST['simbolos']);
    $numeros = isset($_POST['numeros']);

    if (!$letraminuscula && !$letraMaiuscula && !$simbolos && !$numeros) {
        echo "Voce precisa selecionar 1 tipo para a senha ser gerada!";
    }

    $letraminuscula_chars = "abcdefghijklmnopqrstuvwxyz";
    $letraMaiuscula_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $simbolos_chars = "!@#$%&*()_+=";
    $numeros_chars = "0123456789";

    $password = "";

    $opcoes_validas = "";

    if ($letraminuscula) {
        $opcoes_validas .= $letraminuscula_chars;
    }

    if ($letraMaiuscula) {
        $opcoes_validas .= $letraMaiuscula_chars;
    }

    if ($simbolos) {
        $opcoes_validas .= $simbolos_chars;
    }

    if ($numeros) {
        $opcoes_validas .= $numeros_chars;
    }

    for ($x = 0; $x < $tamanho; $x++) {
        $numero_aleatorio = rand(0, strlen($opcoes_validas) - 1);
        $password .= $opcoes_validas[$numero_aleatorio];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gerador de Senhas Fortes</title>
</head>

<body>
    <div id="card">
        <h4>Gerador de Senhas Fortes</h4>
        <form method="POST" action="" class="um-form">
            <p>
                <label for="tamanho">Tamanho da Senha:</label>
                <input type="number" id="tamanho" name="tamanho" min="8" required value="16">
            </p>

            <p>
                <label for="letraminuscula">Incluir letras minúsculas:</label>
                <input type="checkbox" id="letraminuscula" name="letraminuscula" value="1" checked>
            </p>

            <p>
                <label for="letramaiuscula">Incluir letras maiúsculas:</label>
                <input type="checkbox" id="letramaiuscula" name="letramaiuscula" value="1" checked>
            </p>

            <p>
                <label for="simbolos">Incluir símbolos:</label>
                <input type="checkbox" id="simbolos" name="simbolos" value="1" checked>
            </p>

            <p>
                <label for="numeros">Incluir números:</label>
                <input type="checkbox" id="numeros" name="numeros" value="1" checked>
            </p>

            <p>
                <button type="submit">Gerar!</button>
            </p>
        </form>
    </div>
    <div id="card">
        <?php if (!empty($password)) { ?>
            <h4>Essa é sua senha gerada!</h4>
            <form action="" method="POST" class="dois-form">
                <input type="text" name="senha" readonly value="<?php echo $password; ?>">
            </form>
        <?php } ?>
    </div>



</body>

</html>