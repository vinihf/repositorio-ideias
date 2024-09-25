<?php
    require_once("config.php");

    if(isset($_POST("botaoBuscar"))) {
        $entrada_busca = $db->real_scape_string($_POST['botaoBuscar']);
        $sql = "SELECT projetos.titulo, temas.tema, disciplinas.disciplina
                FROM projetos
                JOIN projetos_temas ON projetos.id_projeto = projetos_temas.id_projeto
                JOIN temas ON projetos_temas.id_tema = temas.id_tema
                JOIN projetos_disciplinas ON projetos.id_projeto = projetos_disciplinas.id_projeto
                JOIN disciplinas ON projetos_disciplinas.id_disciplina = disciplinas.id_disciplinas
                WHERE projetos.titulo LIKE '%$entrada_busca%'";

        $result = $db->query($sql);

        if ($result->num_rows > 0){
            $saida = "<ul>";
            while ($row = $result->fetch_assoc()){
                $saida .= "<li>" .$row['titulo']. " - " .$row['tema.descricao']. "<br>" . $row['disciplina.descricao']. "</li>";      
            }

            $saida .= "</ul>";
        }

        else {
            $saida = "Nenhum resultado encontrado.";
        }

        header("Location: busca.php?resultado=" . urlencode($saida));
    }


?>