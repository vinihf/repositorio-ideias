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
        
        die;



    }


?>