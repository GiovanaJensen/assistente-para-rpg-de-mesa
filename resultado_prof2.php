<?php
session_start();
$nome_personagem = $_SESSION['personagem'];
require_once "includes/db/dbConnection.php";
$comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        $cd_personagem = $dado[0];
    }
    $dados = " ";
$prof2 = $_POST['codigo'];
$prof = $_POST['codigo'];

$comandoSQL = "SELECT CD_CLASSE FROM TB_PERSONAGEM WHERE CD_PERSONAGEM = $cd_personagem;";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $classe = $dado[0];
}
switch($classe){
       case 2:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "Atletismo" && $prof2 == "Acrobacia"){
           ?>
            <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>História</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option> 
           <?php
       }else if($prof == "Atletismo" && $prof2 == "Furtividade"){
        ?>
        <option>Acrobacia</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>História</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <option>Atuação</option>
           <option>Enganação</option>
           <option>Intimidação</option>
           <option>Persuasão</option>  
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Furtividade"){
        ?>  
            <option>Acrobacia</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>História</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Prestidigitação"){
        ?>
            <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Arcanismo</option>
            <option>História</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Arcanismo"){
        ?>
            <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>História</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "História"){
        ?>
            <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Investigação"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>História</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Natureza"){
        ?>
         <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>História</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Religião"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>História</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Adestrar animais"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>História</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Intuição"){
        ?>
         <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>História</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Medicina"){
        ?>
         <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>História</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Percepção"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>História</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Sobrevivência"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>História</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Atuação"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>História</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Enganação"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>História</option>
            <option>Intimidação</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Intimidação"){
        ?>
         <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>História</option>
            <option>Persuasão</option>
        <?php
       }else if($prof == "Atletismo" && $prof2 == "Persuasão"){
        ?>
        <option>Acrobacia</option>
         <option>Furtividade</option>
            <option>Prestidigitação</option>
            <option>Arcanismo</option>
            <option>Investigação</option>
            <option>Natureza</option>
            <option>Religião</option>
            <option>Adestrar animais</option>
            <option>Intuição</option>
            <option>Medicina</option>
            <option>Percepção</option>
            <option>Sobrevivência</option>
            <option>Atuação</option>
            <option>Enganação</option>
            <option>Intimidação</option>
            <option>História</option>
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Atletismo"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Furtividade"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Prestidigitação"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Arcanismo"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "História"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Investigação"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Natureza"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Religião"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Adestrar animais"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Intuição"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Medicina"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Percepção"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Sobrevivência"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Atuação"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Enganação"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Intimidação"){
        ?>
         
        <?php
       }else if($prof == "Acrobacia" && $prof2 == "Persuasão"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Atletismo"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Acrobacia"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Prestidigitação"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Arcanismo"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "História"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Investigação"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Natureza"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Religião"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Adestrar animais"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Intuição"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Medicina"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Percepção"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Sobrevivência"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Atuação"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Enganação"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Intimidação"){
        ?>
         
        <?php
       }else if($prof == "Furtividade" && $prof2 == "Persuasão"){
        ?>
         
        <?php
       }
       break;
}
?>