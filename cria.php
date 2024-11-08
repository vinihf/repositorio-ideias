<?php

require_once("config.php");

$sql = "SELECT * FROM disciplinas";
$disciplinas = $db->query($sql);

$sql = "SELECT * FROM temas";
$temas = $db->query($sql);

$sql = "SELECT * FROM materiais";
$materiais = $db->query($sql);

$sql = "SELECT * FROM artefatos";
$artefatos = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
            .checkbox-container {
            display: inline-block;
        }

        .checkbox-container img {
            width: 200px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .checkbox-container input[type="checkbox"] {
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .checkbox-container input[type="checkbox"]:checked + img {
            border-color: #007BFF;
            border-width: 5px; /* Cor da borda quando selecionada */
            opacity: 3;
        }
    </style>
</head>
</head>
<body>
    <div class="container">
    <h1 class="text-primary">Vamos criar sua idéia de ABP?</h1>

        <div class="row">
            <form action="addProjeto.php" method="post">

                <label for="titulo">Título do projeto:</label>
                <input class="form-control" placeholder="Digite o título do projeto..." type="text" id="titulo" required name="titulo" >
                <br>
                <label for="q_motriz">Questão motriz:</label>
                <textarea  class="form-control" placeholder="Digite a questão motriz do projeto..." id="q_motriz" required name="q_motriz"></textarea>
        </div> <!--row -->

                <br>

                <p>Disciplina:</p>
                <?php
                    while($row = $disciplinas->fetch_assoc()){
                        echo "<div class='form-check form-check-inline'>";
                        echo "<input class='form-check-input' type='checkbox' id=d_".$row['id_disciplina']." name='disciplina[]' value=".$row['id_disciplina'].">";
                        echo "<label class='form-check-label' for=d_".$row['id_disciplina'].">".$row['descricao']."</label>";
                        echo "</div>";
                    }
                ?>

                <br></br>
                

                <div class="checkbox-container">
    <?php
        while ($row = $temas->fetch_assoc()) {
            echo "<label>"; // Envolvendo input e img para permitir o estilo
            echo "<input type='checkbox' id='t_".$row['id_tema']."' name='tema[]' value='".$row['id_tema']."'>";
            echo "<img src='".$row['img']."' alt='Imagem do tema'>";
            echo "</label>";
        }
    ?>
</div>
                <br></br>
                <p>Âncora:</p>
                    <textarea class="form-control" placeholder="Digite a âncora do projeto..." name="ancora" id="ancora" cols="25" rows="5"></textarea>

                <br></br>

                <p>Em grupo:</p>
                <div class="form-check form-check-inline">
                    <input class='form-check-input' type="radio" id="sim" name="em_grupo" value=1>
                    <label class='form-check-label' for="sim">Sim</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class='form-check-input' type="radio" id="nao" name="em_grupo" value=0>
                    <label class='form-check-label' for="nao">Não</label>
                </div>
                

                <br></br>

                <p>Materiais necessários:</p>
                <?php
                    while($row = $materiais->fetch_assoc()){
                        echo "<div class='form-check form-check-inline'>";
                        echo "<input class='form-check-input' type='checkbox' id=m_".$row['id_material']." name='material[]' value=".$row['id_material'].">";
                        echo "<label class='form-check-label' for=m_".$row['id_material'].">".$row['descricao']."</label>";
                        echo "</div>";
                    }
                ?>
                
                <br></br>

                <p>Artefatos previstos:</p>
                <?php
                    while($row = $artefatos->fetch_assoc()){
                        echo "<div class='form-check form-check-inline'>";
                        echo "<input class='form-check-input' type='checkbox' id=a_".$row['id_artefato']." name='artefato[]' value=".$row['id_artefato'].">";
                        echo "<label class='form-check-label' for=a_".$row['id_artefato'].">".$row['descricao']."&nbsp;</label>";
                        echo "</div>";
                    }
                ?>

                <br></br>

                <p>Metodologia:</p>
                    <textarea class='form-control' placeholder="Descreva a metodologia utilizada no projeto..." name="metodologia" id="metodologia" cols="50" rows="10"></textarea>

                <br>

                <p>Avaliacão:</p>
                    <textarea class='form-control' placeholder="Descreva como é feita a avaliação dos envolvidos no projeto..." name="avaliacao" id="avaliacao" cols="50" rows="6"></textarea>

                <br>

                <p>Referências:</p>
                    <textarea class='form-control' placeholder="Digite as refêrencias utilizadas aqui..." name="referencias" id="referencias" cols="50" rows="9"></textarea>

                <br>
                <div class="row">
                    <div class="col-2 d-grid gap-2">
                        <a href="index.html" class="btn btn-outline-secondary btn-lg">Voltar</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-primary btn-lg" name="botao" id="submit" value="publicar">Publicar ideia</button>
                    </div>
                </div>
            </form>
            <br>
    </div>
</body>
</html>