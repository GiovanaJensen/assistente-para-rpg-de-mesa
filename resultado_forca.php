<?php
    $atributo = $_POST['codigo'];
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

    $comandoSQL = "SELECT * FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem;";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
        $a1 = $dado[1];
        $a2 = $dado[2];
        $a3 = $dado[3];
        $a4 = $dado[4];
        $a5 = $dado[5];
        $a6 = $dado[6];
    }
    switch($atributo){
        case $a1:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a2;?></option>
            <option><?php echo $a3;?></option>
            <option><?php echo $a4;?></option>
            <option><?php echo $a5;?></option>
            <option><?php echo $a6;?></option>
            <?php
            break;
        case $a2:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a1;?></option>
            <option><?php echo $a3;?></option>
            <option><?php echo $a4;?></option>
            <option><?php echo $a5;?></option>
            <option><?php echo $a6;?></option>
            <?php
            break;
        case $a3:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a1;?></option>
            <option><?php echo $a2;?></option>
            <option><?php echo $a4;?></option>
            <option><?php echo $a5;?></option>
            <option><?php echo $a6;?></option>
            <?php
            break;
        case $a4:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a1;?></option>
            <option><?php echo $a2;?></option>
            <option><?php echo $a3;?></option>
            <option><?php echo $a5;?></option>
            <option><?php echo $a6;?></option>
            <?php
            break;
        case $a5:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a1;?></option>
            <option><?php echo $a2;?></option>
            <option><?php echo $a3;?></option>
            <option><?php echo $a4;?></option>
            <option><?php echo $a6;?></option>
            <?php
            break;
        case $a6:
            ?>
            <option selected>Selecione o atributo de destreza</option>
            <option><?php echo $a1;?></option>
            <option><?php echo $a2;?></option>
            <option><?php echo $a3;?></option>
            <option><?php echo $a4;?></option>
            <option><?php echo $a5;?></option>
            <?php
            break;
    }
?>