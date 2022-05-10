<?php
$raca = $_POST['codigo'];

require_once "includes/db/dbConnection.php";

$comandoSQL = "CALL SP_DESCREVE_RACA($raca);";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    ?>
    
    <p style="color: #000000">Tipo de visão: <?php echo $dado[0];?></p>
    <p style="color: #000000">Descrição da visão: <?php echo $dado[1];?></p>
    <p style="color: #000000">Tamanho: <?php echo $dado[2];?></p>
    <p style="color: #000000">Espaço ocupado: <?php echo $dado[3];?></p>
    <p style="color: #000000">Alcance: <?php echo $dado[4];?></p>
    <p style="color: #000000">Deslocamento: <?php echo $dado[5];?></p>
    <p style="color: #000000">Idioma primário: <?php echo $dado[6];?></p>
    <p style="color: #000000">Idioma secundário: <?php echo $dado[7];?></p>
    <p style="color: #000000">Habilidade: <?php echo $dado[8];?></p>
    <p style="color: #000000">Proficiência: <?php echo $dado[9];?></p>
    <p style="color: #000000">Característica: <?php echo $dado[10];?></p>

    
    <?php
}
$dados = " ";