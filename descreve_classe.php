<?php
$classe = $_POST['codigo'];

require_once "includes/db/dbConnection.php";

$comandoSQL = "CALL SP_DESCREVE_CLASSE($classe);";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    ?>
    
    <p style="color: #000000">Nome: <?php echo $dado[0];?></p>
    <p style="color: #000000">Descrição: <?php echo $dado[1];?></p>
    <p style="color: #000000">Pontos de vida: <?php echo $dado[2];?></p>
    <p style="color: #000000">Defesa Natural: <?php echo $dado[3];?></p>
    <p style="color: #000000">Riqueza inicial: <?php echo $dado[4];?></p>
    <p style="color: #000000">Equipamento: <?php echo $dado[5];?></p>
    <p style="color: #000000">Proficiência em equipamento: <?php echo $dado[6];?></p>
    <p style="color: #000000">Proficiência em ferramenta: <?php echo $dado[7];?></p>
    <p style="color: #000000">Proficiência em resistência: <?php echo $dado[8];?></p>
    <p style="color: #000000">Proficiência em perícia: <?php echo $dado[9];?></p>
    <p style="color: #000000">Habilidade <?php echo $dado[10];?></p>

    
    <?php
}
$dados = " ";