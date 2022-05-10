<?php
$antecedente = $_POST['codigo'];

require_once "includes/db/dbConnection.php";

$comandoSQL = "CALL SP_DESCREVE_ANTECEDENTE($antecedente);";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    ?>
    
    <p style="color: #000000">Nome: <?php echo $dado[0];?></p>
    <p style="color: #000000">Descrição: <?php echo $dado[1];?></p>
    <p style="color: #000000">Personalidade: <?php echo $dado[2];?></p>
    <p style="color: #000000">Ideal: <?php echo $dado[3];?></p>
    <p style="color: #000000">Vínculo: <?php echo $dado[4];?></p>
    <p style="color: #000000">Defeito: <?php echo $dado[5];?></p>
    <p style="color: #000000">Proficiência em perícia: <?php echo $dado[6];?></p>
    <p style="color: #000000">Proficiência em ferramenta: <?php echo $dado[7];?></p>
    <p style="color: #000000">Habilidade: <?php echo $dado[8];?></p>
    <p style="color: #000000">Equipamento: <?php echo $dado[9];?></p>
    <?php
}
$dados = " ";