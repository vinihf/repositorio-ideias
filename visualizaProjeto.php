<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização</title>
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
                    GROUP_CONCAT(DISTINCT t.descricao SEPARATOR ', ') AS temas
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

                echo "<h1>".$row['titulo']."</h1>";
                if ($row['organizacao']===TRUE){
                    echo "<h3>Em grupo</h3>";
                }
                else {
                    echo "<h3>Individual</h3>";
                }
                echo "<h3>Questão motriz:</h3><p>".$row['questao_motriz']."</p>";
                echo "<h3>Âncora:</h3><p>".$row['ancora']."</p>";
                echo "<h3>Disciplinas:</h3><p>".$row['disciplinas']."</p>";
                echo "<h3>Temas:</h3><p>".$row['temas']."</p>";
                echo "<h3>Metodologia:</h3><p>".$row['metodologia']."</p>";
                echo "<h3>Avaliação:</h3><p>".$row['avaliacao']."</p>";
                echo "<h3>Materiais:</h3><p>".$row['materiais']."</p>";
                echo "<h3>Artefatos:</h3><p>".$row['artefatos']."</p>";
                echo "<h3>Referências:</h3><p>".$row['referencias']."</p>";

            }
        }
    
    }
                ?>
            </body>