<?php
    require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <h1>Busque sua ideia ABP aqui!</h1>
    <br></br>

    <form action="buscaProjeto.php" method="post">
        <input type="text" placeholder="Digite o título a pesquisar...">
        <button name="botaoBuscar" id="buscar" value="submit">Buscar</button>
    </form>

    <?php if (isset($_GET['resultado'])): ?>
        <h2>Resultados da busca:</h2>
        <div><?php echo $_GET['resultado']; ?></div>
    <?php endif; ?>

</body>
</html>

