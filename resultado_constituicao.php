<?php
    $atributo = $_POST['forca'];
    $atributo2 = $_POST['destreza'];
    $atributo3 = $_POST['constituicao'];
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
    #ATRIBUTO 1 = A1 E ATRIBUTO2 = A2
    if($atributo == $a2 && $atributo2 == $a1 && $atributo3 == $a3 || $atributo == $a1 && $atributo2 == $a3 && $atributo3 == $a2 || $atributo == $a1 && $atributo2 == $a2 && $atributo3 == $a3 || $atributo == $a1 && $atributo2 == $a2 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a2 && $atributo3 == $a4 || $atributo == $a1 && $atributo2 == $a4 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a2 && $atributo3 == $a6 || $atributo == $a1 && $atributo2 == $a6 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A1 E ATRIBUTO2 = A3
    else if($atributo == $a1 && $atributo2 == $a3 && $atributo3 == $a4 || $atributo == $a1 && $atributo2 == $a4 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a3 && $atributo3 == $a5 || $atributo == $a1 && $atributo2 == $a5 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a3 && $atributo3 == $a6 || $atributo == $a1 && $atributo2 == $a6 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A1 E ATRIBUTO2 = A4
    else if($atributo == $a1 && $atributo2 == $a4 && $atributo3 == $a5 || $atributo == $a1 && $atributo2 == $a5 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a4 && $atributo3 == $a6 || $atributo == $a1 && $atributo2 == $a6 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A1 E ATRIBUTO2 = A5
    else if($atributo == $a1 && $atributo2 == $a5 && $atributo3 == $a2 || $atributo == $a2 && $atributo2 == $a1 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a5 && $atributo3 == $a6 || $atributo == $a1 && $atributo2 == $a6 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A2 E ATRIBUTO2 = A1
    else if($atributo == $a2 && $atributo2 == $a1 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    } if($atributo == $a2 && $atributo2 == $a1 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A2 E ATRIBUTO2 = A3
    else if($atributo == $a2 && $atributo2 == $a3 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a3 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a3 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a3 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A2 E ATRIBUTO2 = A4
    else if($atributo == $a2 && $atributo2 == $a4 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a4 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a4 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a4 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A2 E ATRIBUTO2 = A5
    else if($atributo == $a2 && $atributo2 == $a5 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a5 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a5 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a5 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A2 E ATRIBUTO2 = A6
    else if($atributo == $a2 && $atributo2 == $a6 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a2 && $atributo2 == $a6 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a2 && $atributo2 == $a6 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a2 && $atributo2 == $a6 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A3 E ATRIBUTO2 = A1
    else if($atributo == $a3 && $atributo2 == $a1 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a1 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a1 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a1 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A3 E ATRIBUTO2 = A2
    else if($atributo == $a3 && $atributo2 == $a2 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a2 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a2 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a2 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A3 E ATRIBUTO2 = A4
    else if($atributo == $a3 && $atributo2 == $a4 && $atributo3 == $a2 || $atributo == $a4 && $atributo2 == $a2 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a4 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a4 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A3 E ATRIBUTO2 = A5
    else if($atributo == $a3 && $atributo2 == $a5 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a5 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a5 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a5 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A3 E ATRIBUTO2 = A6
    else if($atributo == $a3 && $atributo2 == $a6 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a3 && $atributo2 == $a6 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a3 && $atributo2 == $a6 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }else if($atributo == $a3 && $atributo2 == $a6 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A4 E ATRIBUTO2 = A1
    else if($atributo == $a4 && $atributo2 == $a1 && $atributo3 == $a2 || $atributo == $a4 && $atributo2 == $a2 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a1 && $atributo3 == $a3 || $atributo == $a3 && $atributo2 == $a4 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a1 && $atributo3 == $a5 || $atributo == $a4 && $atributo2 == $a2 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a1 && $atributo3 == $a6 || $atributo == $a4 && $atributo2 == $a2 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A4 E ATRIBUTO 2 = A3
    else if($atributo == $a4 && $atributo2 == $a3 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a3 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a3 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a3 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A4 E ATRIBUTO 2 = A5
    else if($atributo == $a4 && $atributo2 == $a5 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a5 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a5 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a5 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }
    #ATRIBUTO 1 = A4 E ATRIBUTO 2 = A6
    else if($atributo == $a4 && $atributo2 == $a6 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a4 && $atributo2 == $a6 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a4 && $atributo2 == $a6 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }else if($atributo == $a4 && $atributo2 == $a6 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }
    #ATRIBUTO 1 = A5 E ATRIBUTO 2 = A2
    else if($atributo == $a5 && $atributo2 == $a2 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a2 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a2 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a2 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A5 E ATRIBUTO 2 = A3
    else if($atributo == $a5 && $atributo2 == $a3 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a3 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a3 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a3 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A5 E ATRIBUTO 2 = A4
    else if($atributo == $a5 && $atributo2 == $a4 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a4 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a4 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a4 && $atributo3 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }
    #ATRIBUTO 1 = A5 E ATRIBUTO 2 = A6
    else if($atributo == $a5 && $atributo2 == $a6 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }else if($atributo == $a5 && $atributo2 == $a6 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }else if($atributo == $a5 && $atributo2 == $a6 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }else if($atributo == $a5 && $atributo2 == $a6 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A6 E ATRIBUTO 2 = A1
    else if($atributo == $a6 && $atributo2 == $a1 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a1 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a1 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a1 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A6 E ATRIBUTO 2 = A2
    else if($atributo == $a6 && $atributo2 == $a2 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a2 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a2 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a2 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A6 E ATRIBUTO 2 = A3
    else if($atributo == $a6 && $atributo2 == $a3 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a3 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a3 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a3 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }
    #ATRIBUTO 1 = A6 E ATRIBUTO 2 = A4
    else if($atributo == $a6 && $atributo2 == $a4 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a4 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a4 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a4 && $atributo3 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }
    #ATRIBUTO 1 = A6 E ATRIBUTO 2 = A5
    else if($atributo == $a6 && $atributo2 == $a5 && $atributo3 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }else if($atributo == $a6 && $atributo2 == $a5 && $atributo3 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }else if($atributo == $a6 && $atributo2 == $a5 && $atributo3 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4';
    }else if($atributo == $a6 && $atributo2 == $a5 && $atributo3 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3';
    }
    

    $comandoSQL = "SELECT $select FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem;";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        ?>
        <option selected>Selecione o atributo de inteligência</option>
        <option><?php echo $dado[0];?></option>
        <option><?php echo $dado[1];?></option>
        <option><?php echo $dado[2];?></option>
        <?php
    }
    $dados =  " ";
?>