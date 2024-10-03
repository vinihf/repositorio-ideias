<?php

    require_once("config.php");

    if(isset($_POST['botao'])){

        $titulo = $_POST['titulo'];
        $q_motriz = $_POST['q_motriz'];
        $disciplina = $_POST['disciplina'];
        $tema = $_POST['tema'];
        $ancora = $_POST['ancora'];
        $em_grupo = $_POST['em_grupo'];
        $material = $_POST['material'];
        $artefato = $_POST['artefato'];
        $metodologia = $_POST['metodologia'];
        $avaliacao = $_POST['avaliacao'];
        $referencias = $_POST['referencias'];

        $sql = mysqli_query($db, "INSERT INTO projetos (id_projeto, titulo, ancora, questao_motriz, organizacao, metodologia, avaliacao, referencias)
        VALUES ('', '$titulo', '$ancora', '$q_motriz', $em_grupo, '$metodologia', '$avaliacao', '$referencias')");

        
        $sql = "SELECT id_projeto FROM projetos ORDER BY id_projeto DESC LIMIT 1";
        $result = $db->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $maxId = $row['id_projeto'];

            for ($i = 0; $i < sizeof($disciplina); $i++){
                $disciplina[$i] = intval($disciplina[$i]);
            }

            for ($i = 0; $i < sizeof($tema); $i++){
                $tema[$i] = intval($tema[$i]);
            }

            for ($i = 0; $i < sizeof($material); $i++){
                $material[$i] = intval($material[$i]);
            }    

            for ($i = 0; $i < sizeof($artefato); $i++){
                $artefato[$i] = intval($artefato[$i]);
            }


            for ($i = 0; $i < sizeof($disciplina); $i++){
                $sql = mysqli_query($db, "INSERT INTO projetos_disciplinas (id_projeto, id_disciplina)
                VALUES ($maxId, $disciplina[$i])");
            }

            for ($i = 0; $i < sizeof($tema); $i++){
                $sql = mysqli_query($db, "INSERT INTO projetos_temas (id_projeto, id_tema)
                VALUES ($maxId, $tema[$i])");
            }

            for ($i = 0; $i < sizeof($material); $i++){
                $sql = mysqli_query($db, "INSERT INTO projetos_materiais (id_projeto, id_material)
                VALUES ($maxId, $material[$i])"); 
            }       

            for ($i = 0; $i < sizeof($artefato); $i++){
                $sql = mysqli_query($db, "INSERT INTO projetos_artefatos (id_projeto, id_artefato)
                VALUES ($maxId, $artefato[$i])");
            }

        }

        header("location: index.html");
    }


?>