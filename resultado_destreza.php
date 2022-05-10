<?php
    $atributo = $_POST['codigo'];
    $atributo2 = $_POST['cd'];
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
    #ATRIBUTO 1 = A1
    if($atributo == $a1 && $atributo2 == $a2){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a3){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a4){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a5){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a1 && $atributo2 == $a6){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO 1 = A2
    else if($atributo == $a2 && $atributo2 == $a1){
        $select = 'NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a2 && $atributo2 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO1 = A3
    else if($atributo == $a3 && $atributo2 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO4, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a3 && $atributo2 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }
    #ATRIBUTO1 = A4
    else if($atributo == $a4 && $atributo2 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO5, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a4 && $atributo2 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }
    #atributo1 = a5
    else if($atributo == $a5 && $atributo2 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO6';
    }else if($atributo == $a5 && $atributo2 == $a6){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }
    #ATRIBUTO1 = A6
    else if($atributo == $a6 && $atributo2 == $a1){
        $select = 'NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a2){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO3, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a3){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO4, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a4){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO5';
    }else if($atributo == $a6 && $atributo2 == $a5){
        $select = 'NR_ATRIBUTO1, NR_ATRIBUTO2, NR_ATRIBUTO3, NR_ATRIBUTO4';
    }

    $comandoSQL = "SELECT $select FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem;";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        ?>
        <option selected>Selecione o atributo de constituição</option>
        <option><?php echo $dado[0];?></option>
        <option><?php echo $dado[1];?></option>
        <option><?php echo $dado[2];?></option>
        <option><?php echo $dado[3];?></option>
        <?php
    }
    $dados =  " ";
?>