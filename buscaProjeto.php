<?php
    require_once("config.php");

    /*"SELECT projetos.titulo, GROUP_CONCAT(temas.id_tema, temas.descricao SEPARATOR ', ') AS temas, GROUP_CONCAT(disciplinas.descricao SEPARATOR ', ') AS disciplinas
    FROM projetos
    JOIN projetos_temas ON projetos.id_projeto = projetos_temas.id_projeto
    JOIN temas ON projetos_temas.id_tema = temas.id_tema
    JOIN projetos_disciplinas ON projetos.id_projeto = projetos_disciplinas.id_projeto
    JOIN disciplinas ON projetos_disciplinas.id_disciplina = disciplinas.id_disciplina
    WHERE projetos.titulo LIKE '%{$entrada_busca}%'";*/

    if(isset($_POST['botaoBuscar'])) {
        $entrada_busca = $_POST['titulo'];
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
                        p.titulo LIKE '%Titulo%'
                    GROUP BY 
                        p.id_projeto";



        $result = $db->query($sql);

        if ($result->num_rows > 0){
            $saida = "<ul>";
            while ($row = $result->fetch_assoc()){
                $saida .= "<li>" .$row['titulo']. " - " .$row['temas']. "<br>" . $row['disciplinas']. "</li>";      
            }

            $saida .= "</ul>";
        }

        else {
            $saida = "Nenhum resultado encontrado.";
        }

        header("Location: busca.php?resultado=" . urlencode($saida));
    }


?>