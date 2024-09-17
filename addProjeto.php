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

        var_dump($tema);
        
        $sql = "SELECT id_projeto FROM projetos ORDER BY 1"
        $result = $db->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $maxId = $row['maxId'];

            $sql = mysqli_query($db, "INSERT INTO projetos_disciplinas (id_projeto, id_disciplina)
            VALUES ($maxId, $disciplina)");

            $sql = mysqli_query($db, "INSERT INTO projetos_temas (id_projeto, id_tema)
            VALUES ($maxId, $tema)");

            $sql = mysqli_query($db, "INSERT INTO projetos_materiais (id_projeto, id_material)
            VALUES ($maxId, $material)");

            $sql = mysqli_query($db, "INSERT INTO projetos_artefatos (id_projeto, id_artefato)
            VALUES ($maxId, $artefato)");
        }

        die;



    }


?>