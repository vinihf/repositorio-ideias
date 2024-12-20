<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>


<?php

require_once("config.php");

if (isset($_GET['id'])){
    $projeto_id = intval($_GET['id']);

    //echo $projeto_id;

    $sql = "SELECT 
                p.id_projeto, 
                    p.titulo, 
                    p.ancora, 
                    p.questao_motriz, 
                    p.metodologia, 
                    p.avaliacao, 
                    p.referencias, 
                    p.organizacao, 
                    GROUP_CONCAT(DISTINCT a.descricao SEPARATOR ', ') AS artefatos, 
                    GROUP_CONCAT(DISTINCT d.descricao SEPARATOR ', ') AS disciplinas, 
                    GROUP_CONCAT(DISTINCT m.descricao SEPARATOR ', ') AS materiais, 
                    GROUP_CONCAT(DISTINCT t.img SEPARATOR ' ') AS temas
                FROM 
                    projetos p
                LEFT JOIN 
                    projetos_artefatos pa ON p.id_projeto = pa.id_projeto
                LEFT JOIN 
                    artefatos a ON pa.id_artefato = a.id_artefato
                LEFT JOIN 
                    projetos_disciplinas pd ON p.id_projeto = pd.id_projeto
                LEFT JOIN 
                    disciplinas d ON pd.id_disciplina = d.id_disciplina
                LEFT JOIN 
                    projetos_materiais pm ON p.id_projeto = pm.id_projeto
                LEFT JOIN 
                    materiais m ON pm.id_material = m.id_material
                LEFT JOIN 
                    projetos_temas pt ON p.id_projeto = pt.id_projeto
                LEFT JOIN 
                    temas t ON pt.id_tema = t.id_tema
                WHERE 
                    p.id_projeto = $projeto_id";

    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()){
        if ($projeto_id == $row['id_projeto']){
            ?>
            <body>
                <?php

                $titulo = "<h1 class='text-primary' style='font-weight: bold'>".$row['titulo']."</h1>";
                if ($row['organizacao']==1){
                    $em_grupo = "<h4 style='font-weight: 400'>Em grupo</h4>";
                }
                else {
                    $em_grupo = "<h4>Individual</h4>";
                }
                $questao_motriz = "<h4>Questão motriz:</h4><p>".$row['questao_motriz']."</p>";
                $ancora = "<h4>Âncora:</h4><p>".$row['ancora']."</p>";
                $disciplinas = "<h4>Disciplinas:</h4><p>".$row['disciplinas']."</p>";
                $temas = "<h4>Temas:</h4><img src=".$row['temas']." alt='temas' style='width: 100px; height: 100px'>";
                $metodologia = "<h4>Metodologia:</h4><p>".$row['metodologia']."</p>";
                $avaliacao = "<h4>Avaliação:</h4><p>".$row['avaliacao']."</p>";
                $materiais = "<h4>Materiais:</h4><p>".$row['materiais']."</p>";
                $artefatos = "<h4>Artefatos:</h4><p>".$row['artefatos']."</p>";
                $referencias = "<h4>Referências:</h4><p>".$row['referencias']."</p>";

            }
        }
    
    }
                ?>
            <div class="container">
                <br></br>
                <div class="row">
                    <div class="col d-flex text-center"><?php echo $titulo ?></div><!--col-titulo--> 
                </div><!--row-titulo-->
                <div class="row justify-content-center">
                    <div class="col-4 d-flex justify-content-right"></div>
                    <div class="col-4 d-flex justify-content-center"><?php echo $em_grupo ?></div>
                </div>
                <br></br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col"><?php echo $questao_motriz ?></div>
                    <div class="col-2"></div>
                </div>
                <br>
                <div class="row justify-text-center">
                    <div class="col-1"></div>
                    <div class="col"><?php echo $ancora ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col"><?php echo $disciplinas ?></div>
                    <div class="col"><?php echo $temas ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col justify-text-center"><?php echo $metodologia ?></div>
                    <div class="col justify-text-center"><?php echo $avaliacao ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col justify-content-center"><?php echo $materiais ?></div>
                    <div class="col justify-content-center"><?php echo $artefatos ?></div>
                </div>
                <br>
                <div class="row justify-text-center">
                    <div class="col-1"></div>
                    <div class="col"><?php echo $referencias ?></div>
                    <div class="col-1"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 d-grid gap-2">
                    <a href="busca.php" class="btn btn-outline-secondary btn-lg">Voltar</a>
                </div>
            </div>

            </body>