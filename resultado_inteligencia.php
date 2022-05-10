<?php
    $atributo = $_POST['forca'];
    $atributo2 = $_POST['destreza'];
    $atributo3 = $_POST['constituicao'];
    $atributo4 = $_POST['inteligencia'];
    include_once "includes/db/dbConnection.php";

    session_start();
    $nome_personagem = $_SESSION['personagem'];
    require_once "includes/db/dbConnection.php";
    $comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
        $dados = $conn->query($comandoSQL);
        foreach($dados as $dado){
            $cd_personagem = $dado[0];
        }
        $dados = " ";

    $comandoSQL = "SELECT * FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem ;";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        $a1 = $dado[1];
        $a2 = $dado[2];
        $a3 = $dado[3];
        $a4 = $dado[4];
        $a5 = $dado[5];
        $a6 = $dado[6];
    }
    $dados = " ";
    #ATRIBUTO = A1, ATRIBUTO2 = A2, ATRIBUTO3 = A3, ATRIBUTO4 = A4; 
    if($atributo == $a1 && $atributo2 == $a2 && $atributo3 == $a3 && $atributo4 == $a4){
        $comandoSQL = "SELECT NR_ATRIBUTO5, NR_ATRIBUTO6 FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem;";
    }
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        ?>
       <option selected>Selecione o atributo de sabedoria</option>
        <option><?php echo $dado[0];?></option>
        <option><?php echo $dado[1];?></option>
        <?php
    }
    
?>