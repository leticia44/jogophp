<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Verificador de Signo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$opcoes = array("pedra", "papel", "tesoura");


function escolhaComputador($opcoes)
{
    $indice = rand(0, 2);
    return $opcoes[$indice];
}


function verificarResultado($escolhaJogador, $escolhaComputador)
{
    if ($escolhaJogador === $escolhaComputador) {
        return "Empate!";
    } elseif (
        ($escolhaJogador === "pedra" && $escolhaComputador === "tesoura") ||
        ($escolhaJogador === "papel" && $escolhaComputador === "pedra") ||
        ($escolhaJogador === "tesoura" && $escolhaComputador === "papel")
    ) {
        return "Você ganhou!";
    } else {
        return "Você perdeu!";
    }
}


if (isset($_POST['jogada'])) {
    $escolhaJogador = $_POST['jogada'];
    $escolhaComputador = escolhaComputador($opcoes);
    $resultado = verificarResultado($escolhaJogador, $escolhaComputador);

    // Define o caminho das imagens do jogador e do computador
    $caminhoImagemJogador = "img/" . $escolhaJogador . ".png";
    $caminhoImagemComputador = "img/" . $escolhaComputador . ".png";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Pedra, Papel e Tesoura </title>
</head>

<body>
    <h1> Pedra, Papel e Tesoura </h1>
    <form method="post">
        <label>Escolha a sua jogada:</label>
        <select name="jogada">
            <option value="pedra">Pedra</option>
            <option value="papel">Papel</option>
            <option value="tesoura">Tesoura</option>
        </select>
        <input type="submit" value="Jogar">
    </form>
    <?php
    // Exibir o resultado após a jogada do jogador
    if (isset($resultado)) {
        echo "<p> Você escolheu: $escolhaJogador </p>";
        echo "<img src='$caminhoImagemJogador' alt='$escolhaJogador'>";
        echo "<p> Computador escolheu: $escolhaComputador </p>";
        echo "<img src='$caminhoImagemComputador' alt='$escolhaComputador'>";
        echo "<p> Resultado: $resultado </p>";
    }
    ?>
</body>

</html>