<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
$valor1 = 0;

$opcoesCargo = array(
    "analista_sis" => array("label" => "Analista de Sistemas", "valorHora" => 20),
    "programador" => array("label" => "Programador", "valorHora" => 35),
    "gerente" => array("label" => "Gerente", "valorHora" => 45),
    "estagiario" => array("label" => "Estagiário", "valorHora" => 10)
);

if (isset($_POST['cargo'])) {
    $cargo = $_POST['cargo'];

    if (array_key_exists($cargo, $opcoesCargo)) {
        $valor1 = $opcoesCargo[$cargo]['valorHora'];
    }
}
?>

<main>
    <h1>Salario dos Funcionários</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nome">Nome do Funcionário
            <input type="text" id="nome" name="nome" required>
        </label>
        <label for="cargo">Cargo
            <select id="cargo" name="cargo" required>
                <option value="">Selecione...</option>
                <?php foreach ($opcoesCargo as $value => $cargoInfo) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $cargoInfo['label']; ?></option>
                <?php } ?>
            </select>
        </label>
        <label for="qtde">Quantidade de horas trabalhadas
            <input type="number" id="qtde" name="qtde" required>
        </label>
        <input type="submit" value="calcular">
    </form>
</main>
<section id="resultado">
    <h2>Resultado</h2>
    <?php if ($valor1 > 0 && isset($_POST['qtde'])) { ?>
        <p>Salário a receber: <strong>R$ <?= number_format($valor1 * $_POST['qtde'], 2, ',', '.') ?></strong></p>
    <?php } else { ?>
        <p>Nenhum cálculo de salário a ser exibido.</p>
    <?php } ?>
	<a href="index.php"><input type="button" value="Voltar"></a>
</section>

</body>
</html>
