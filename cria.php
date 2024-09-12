<?php

include_once "config.php";

$sql = "SELECT * FROM disciplinas";
$disciplinas = $db->query($sql);

$sql = "SELECT * FROM temas";
$temas = $db->query($sql);

$sql = "SELECT * FROM materiais";
$materiais = $db->query($sql);

$sql = "SELECT * FROM artefatos";
$artefatos = $db->query($sql);

$sql = "SELECT * FROM organizacao";
$organizacao = $db->query($sql)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criador</title>
</head>
<body>
    <h1>Vamos criar sua idéia de ABP?</h1>

    <form action="cria.php" method="post">

        <label for="titulo">Título do projeto:</label>
        <input type=text id="titulo" required name="titulo" >

        <label for="q_motriz">Questão motriz:</label>
        <input type="text" id="q_motriz" required name="q_motriz">

        <br></br>

        <label for=disciplina>Disciplina:</label>
        <select name="disciplina">
            <?php
                 while($row = $disciplinas->fetch_assoc()) {
                    echo "<option value=" . $row['id_disciplina'] . ">" . $row['descricao'] . "</option>";
                }
            ?>
        </select>

        <label for="tema">Tema:</label>
        <select name="tema">
            <?php
                while($row = $temas->fetch_assoc()) {
                    echo "<option value=" . $row['id_tema'] . ">" . $row['id_tema'] . "  " . $row['descricao'] . "</option>";
                }
            ?>
        </select>
        
        <br></br>

        <p>Âncora:</p>
            <textarea name="ancora" id="ancora" cols="25" rows="5"></textarea>

        <br></br>

        <p>Em grupo:</p>
        <input type="radio" id="sim" name="organizacao" value="true">
        <label for="sim">Sim</label>
        <input type="radio" id="nao" name="organizacao" value="false">
        <label for="nao">Não</label>

        <p>Materiais necessários:</p>
        <?php
            while($row = $materiais->fetch_assoc()){
                echo "<input type='checkbox' id=".$row['id_material']." name=".$row['descricao']." value=".$row['descricao'].">";
                echo "<label for=".$row['id_material'].">".$row['descricao']."</label>";
            }
        ?>

        <p>Artefatos previstos:</p>
        <?php
            while($row = $artefatos->fetch_assoc()){
                echo "<input type='checkbox' id=".$row['id_artefato']." name=".$row['descricao']." value=".$row['descricao'].">";
                echo "<label for=".$row['id_artefato'].">".$row['descricao']."</label>";
            }
        ?>

        <p>Metodologia:</p>
            <textarea name="metodologia" id="metodologia" cols="50" rows="10"></textarea>

        <p>Organização:</p>
            <textarea name="organizacao" id="organizacao" cols="50" rows="6"></textarea>

        <p>Referências:</p>
            <textarea name="metodologia" id="metodologia" cols="50" rows="9"></textarea>

        <br>

        <button type="submit" name="submit" id="submit">Publicar ideia</button>
    </form>

    <br></br>

    <p>
        <?php
            if(isset($_POST['submit'])){
                print_r($_POST['titulo']);
                print_r($_POST['q_motriz']);
                print_r($_POST['disciplina']);
                print_r($_POST['tema']);
            }
        ?>
    </p>
</body>
</html>