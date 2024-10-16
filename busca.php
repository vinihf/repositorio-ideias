<?php
    require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h1>Busque sua ideia ABP aqui!</h1>
        </div>
        <div class="col"></div>
    </div>
    <br></br>

    <div class=row>
        <div class="col"></div>
        <div class="col">
            <form action="buscaProjeto.php" method="post">
                <input type="text" name="titulo" placeholder="Digite o título a pesquisar...">
                <button name="botaoBuscar" id="buscar" value="submit">Buscar</button>
            </form>
        </div>
        <div class="col"></div>
    </div>

    <br></br>
    

    <?php if (isset($_GET['resultado'])): ?>
       
        <div class="row">
            <div class="col"></div>
            <div class="col"> <h2>Resultados da busca:</h2>
                <?php echo $_GET['resultado']; ?>
            </div>
            <div class="col"></div>
        <?php endif; ?>
        </div>

</body>
</html>

