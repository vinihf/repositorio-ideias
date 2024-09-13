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
</head>
<body>
    <h1>Vamos criar sua idéia de ABP?</h1>

    <form action="addProjeto.php" method="post">

        <label for="titulo">Título do projeto:</label>
        <input type=text id="titulo" required name="titulo" >

        <label for="q_motriz">Questão motriz:</label>
        <input type="text" id="q_motriz" required name="q_motriz">

        <br></br>

        <p>Disciplina:</p>
        <?php
            while($row = $disciplinas->fetch_assoc()){
                echo "<input type='checkbox' id=d_".$row['id_disciplina']." name='disciplina[]' value=".$row['id_disciplina'].">";
                echo "<label for=d_".$row['id_disciplina'].">".$row['descricao']."</label>";
            }
        ?>

        <br></br>

        <p>Tema:</p>
        <?php
            while($row = $temas->fetch_assoc()){
                echo "<input type='checkbox' id=t_".$row['id_tema']." name='tema[]' value=".$row['id_tema'].">";
                echo "<label for=t_".$row['id_tema'].">".$row['id_tema']." ".$row['descricao']."</label>";
            }
        ?>
        
        <br></br>

        <p>Âncora:</p>
            <textarea name="ancora" id="ancora" cols="25" rows="5"></textarea>

        <br></br>

        <p>Em grupo:</p>
        <input type="radio" id="sim" name="em_grupo" value=1>
        <label for="sim">Sim</label>
        <input type="radio" id="nao" name="em_grupo" value=0>
        <label for="nao">Não</label>

        <p>Materiais necessários:</p>
        <?php
            while($row = $materiais->fetch_assoc()){
                echo "<input type='checkbox' id=m_".$row['id_material']." name='material[]' value=".$row['id_material'].">";
                echo "<label for=m_".$row['id_material'].">".$row['descricao']."</label>";
            }
        ?>

        <p>Artefatos previstos:</p>
        <?php
            while($row = $artefatos->fetch_assoc()){
                echo "<input type='checkbox' id=a_".$row['id_artefato']." name='artefato[]' value=".$row['id_artefato'].">";
                echo "<label for=a_".$row['id_artefato'].">".$row['descricao']."</label>";
            }
        ?>

        <p>Metodologia:</p>
            <textarea name="metodologia" id="metodologia" cols="50" rows="10"></textarea>

        <p>Avaliacão:</p>
            <textarea name="avaliacao" id="avaliacao" cols="50" rows="6"></textarea>

        <p>Referências:</p>
            <textarea name="referencias" id="referencias" cols="50" rows="9"></textarea>

        <br>

        <button name="botao" id="submit" value="publicar">Publicar ideia</button>
    </form>

</body>
</html>