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
$prof = $_POST['codigo'];

$comandoSQL = "SELECT CD_CLASSE FROM TB_PERSONAGEM WHERE CD_PERSONAGEM = $cd_personagem;";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $classe = $dado[0];
}
switch($classe){
    case 1:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "Atletismo"){
           ?>
           <option>Natureza</option>
           <option>Adestrar Animais</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <option>Intimidação</option>
           <?php
       }else if($prof == "Natureza"){
        ?>
        <option>Atletismo</option>
           <option>Adestrar Animais</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Adestrar Animais"){
        ?>
        <option>Natureza</option>
           <option>Atltetismo</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Percepção"){
        ?>
        <option>Natureza</option>
           <option>Adestrar Animais</option>
           <option>Atletismo</option>
           <option>Sobrevivência</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Sobrevivência"){
        ?>
        <option>Natureza</option>
           <option>Adestrar Animais</option>
           <option>Percepção</option>
           <option>Atletismo</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Intimidação"){
        ?>
        <option>Natureza</option>
           <option>Adestrar Animais</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <option>Atletismo</option>
        <?php
       }
       break;
       case 2:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "Atletismo"){
           ?>
           <option>Acrobacia</option>
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
       }else if($prof == "Acrobacia"){
        ?>
        <option>Atletismo</option>
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
       }else if($prof == "Furtividade"){
        ?>
        <option>Acrobacia</option>
           <option>Atletismo</option>
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
       }else if($prof == "Prestidigitação"){
        ?>
        <option>Acrobacia</option>
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
       }else if($prof == "Arcanismo"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Atletismo</option>
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
       }else if($prof == "História"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Investigação"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Natureza"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Religião"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Adestrar animais"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Intuição"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Medicina"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Percepção"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Sobrevivência"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Atuação"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Enganação"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Intimidação"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }else if($prof == "Persuasão"){
        ?>
        <option>Acrobacia</option>
           <option>Furtividade</option>
           <option>Prestidigitação</option>
           <option>Arcanismo</option>
           <option>Atletismo</option>
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
       }
       break;
       case 3:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "Arcanismo"){
           ?>
           <option>História</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Enganação</option>
           <option>Intimidação</option>
           <?php
       }else if($prof == "História"){
        ?>
        <option>Arcanismo</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Enganação</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Investigação"){
        ?>
        <option>História</option>
           <option>Arcanismo</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Enganação</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Natureza"){
        ?>
        <option>História</option>
           <option>Investigação</option>
           <option>Arcanismo</option>
           <option>Religião</option>
           <option>Enganação</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Religião"){
        ?>
        <option>História</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Arcanismo</option>
           <option>Enganação</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Enganação"){
        ?>
        <option>História</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Arcanismo</option>
           <option>Intimidação</option>
        <?php
       }else if($prof == "Intimidação"){
        ?>
        <option>História</option>
           <option>Investigação</option>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Arcanismo</option>
           <option>Enganação</option>
        <?php
       }
       break;
       case 4:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "História"){
           ?>
           <option>Religião</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Persuasão</option>
           <?php
       }else if($prof == "Religião"){
        ?>
        <option>História</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Persuasão</option>
        <?php
       }else if($prof == "Intuição"){
        ?>
        <option>Religião</option>
           <option>História</option>
           <option>Medicina</option>
           <option>Persuasão</option>
        <?php
       }else if($prof == "Medicina"){
        ?>
        <option>Religião</option>
           <option>Intuição</option>
           <option>História</option>
           <option>Persuasão</option>
        <?php
       }else if($prof == "Persuasão"){
        ?>
        <option>Religião</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>História</option>
        <?php
       }
       break;
       case 5:
        ?>
            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
       <?php
       if($prof == "Arcanismo"){
           ?>
           <option>Natureza</option>
           <option>Religião</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
           <?php
       }else if($prof == "Natureza"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Religião"){
        ?>
        <option>Arcanismo</option>
           <option>Natureza</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Adestrar animais"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Natureza</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Intuição"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Natureza</option>
           <option>Adestrar animais</option>
           <option>Medicina</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Medicina"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Natureza</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Percepção</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Percepção"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Natureza</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Medicina</option>
           <option>Sobrevivência</option>
        <?php
       }else if($prof == "Sobrevivência"){
        ?>
        <option>Arcanismo</option>
           <option>Religião</option>
           <option>Natureza</option>
           <option>Adestrar animais</option>
           <option>Intuição</option>
           <option>Percepção</option>
           <option>Medicina</option>
        <?php
       }
       break;
    case 6:
    ?>
        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
   <?php
   if($prof == "Arcanismo"){
       ?>
       <option>Religião</option>
       <option>Intuição</option>
       <option>Enganação</option>
       <option>Intimidação</option>
       <option>Persuasão</option>
       <?php
   }else if($prof == "Religião"){
    ?>
    <option>Arcanismo</option>
    <option>Intuição</option>
    <option>Enganação</option>
    <option>Intimidação</option>
    <option>Persuasão</option>
    <?php
   }else if($prof == "Intuição"){
    ?>
    <option>Arcanismo</option>
    <option>Religião</option>
    <option>Enganação</option>
    <option>Intimidação</option>
    <option>Persuasão</option>
    <?php
   }else if($prof == "Enganação"){
    ?>
    <option>Arcanismo</option>
    <option>Intuição</option>
    <option>Religião</option>
    <option>Intimidação</option>
    <option>Persuasão</option>
    <?php
   }else if($prof == "Intimidação"){
    ?>
    <option>Arcanismo</option>
    <option>Intuição</option>
    <option>Enganação</option>
    <option>Religião</option>
    <option>Persuasão</option>
    <?php
   }else if($prof == "Persuasão"){
    ?>
    <option>Arcanismo</option>
    <option>Intuição</option>
    <option>Enganação</option>
    <option>Intimidação</option>
    <option>Religião</option>
    <?php
   }
   break;
   case 7:
    ?>
        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
   <?php
   if($prof == "Atletismo"){
       ?>
       <option>Acrobacia</option>
       <option>História</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
       <?php
   }else if($prof == "Acrobacia"){
    ?>
    <option>Atletismo</option>
       <option>História</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "História"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "Adestrar animais"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>História</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "Intuição"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Adestrar animais</option>
       <option>História</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "Percepção"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>História</option>
       <option>Sobrevivência</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "Sobrevivência"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>História</option>
       <option>Intimidação</option>
    <?php
   }else if($prof == "Intimidação"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Adestrar animais</option>
       <option>Intuição</option>
       <option>Percepção</option>
       <option>Sobrevivência</option>
       <option>História</option>
    <?php
   }
   break;
   case 9:
    ?>
        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
   <?php
   if($prof == "Arcanismo"){
       ?>
       <option>História</option>
       <option>Investigação</option>
       <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
       <?php
   }else if($prof == "História"){
    ?>
        <option>Arcanismo</option>
       <option>Investigação</option>
       <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
    <?php
   }else if($prof == "Investigação"){
    ?>
       <option>Arcanismo</option>
       <option>História</option>
       <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
    <?php
   }else if($prof == "Religião"){
    ?>
        <option>Arcanismo</option>
       <option>História</option>
       <option>Investigação</option>
       <option>Intuição</option>
       <option>Medicina</option>
    <?php
   }else if($prof == "Intuição"){
    ?>
       <option>Arcanismo</option>
       <option>História</option>
       <option>Investigação</option>
       <option>Religião</option>
       <option>Medicina</option>
    <?php
   }else if($prof == "Medicina"){
    ?>
       <option>Arcanismo</option>
       <option>História</option>
       <option>Investigação</option>
       <option>Religião</option>
       <option>Intuição</option>
    <?php
   }
   break;
   case 10:
    ?>
        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
   <?php
   if($prof == "Atletismo"){
       ?>
       <option>Acrobacia</option>
       <option>Furtividade</option>
       <option>História</option>
       <option>Religião</option>
       <option>Intuição</option>
       <?php
   }else if($prof == "Acrobacia"){
    ?>
    <option>Atletismo</option>
       <option>Furtividade</option>
       <option>História</option>
       <option>Religião</option>
       <option>Intuição</option>
    <?php
   }else if($prof == "Furtividade"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>História</option>
       <option>Religião</option>
       <option>Intuição</option>
    <?php
   }else if($prof == "História"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Furtividade</option>
       <option>Religião</option>
       <option>Intuição</option>
    <?php
   }else if($prof == "Religião"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Furtividade</option>
       <option>História</option>
       <option>Intuição</option>
    <?php
   }else if($prof == "Intuição"){
    ?>
    <option>Atletismo</option>
       <option>Acrobacia</option>
       <option>Furtividade</option>
       <option>História</option>
       <option>Religião</option>
    <?php
   }
   break;
   case 11:
    ?>
        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
   <?php
   if($prof == "Atletismo"){
       ?>
       <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
       <option>Intimidação</option>
       <option>Persuasão</option>  
       <?php
   }else if($prof == "Religião"){
    ?>
    <option>Atletismo</option>
       <option>Intuição</option>
       <option>Medicina</option>
       <option>Intimidação</option>
       <option>Persuasão</option>  
    <?php
   }else if($prof == "Intuição"){
    ?>
    <option>Religião</option>
       <option>Atletismo</option>
       <option>Medicina</option>
       <option>Intimidação</option>
       <option>Persuasão</option>  
    <?php
   }else if($prof == "Medicina"){
    ?>
    <option>Religião</option>
       <option>Intuição</option>
       <option>Atletismo</option>
       <option>Intimidação</option>
       <option>Persuasão</option>  
    <?php
   }else if($prof == "Intimidação"){
    ?>
    <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
       <option>Atletismo</option>
       <option>Persuasão</option>  
    <?php
   }else if($prof == "Persuasão"){
    ?>
    <option>Religião</option>
       <option>Intuição</option>
       <option>Medicina</option>
       <option>Intimidação</option>
       <option>Atletismo</option>  
    <?php
   }
   break;
}
?>