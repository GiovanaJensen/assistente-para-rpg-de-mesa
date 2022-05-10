<?php

require_once "../db/dbConnection.php";

$usuario = $_SESSION['usuario'];
$comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $cd_usuario = $dado[0];
}
$dados = " ";

if(isset($_POST['nome_tamanho'], $_POST['espaco_tamanho'], $_POST['alcance_tamanho'])){
    if(!empty($_POST['nome_tamanho'] && $_POST['espaco_tamanho'] && $_POST['alcance_tamanho'])){
        if( $_POST['espaco_tamanho'] > 0 && $_POST['alcance_tamanho'] > 0){
            $comandoSQL = "SELECT MAX(CD_TAMANHO)+1 FROM TB_TAMANHO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_tamanho = $dado[0];
            }
            $dados = " ";

            $nm_tamanho = $_POST['nome_tamanho'];
            $espaco_tamanho = $_POST['espaco_tamanho'];
            $alcance_tamanho = $_POST['alcance_tamanho'];

            $comandoSQL = "INSERT INTO TB_TAMANHO VALUES ($cd_usuario, $cd_tamanho, '$nm_tamanho', '$espaco_tamanho', '$alcance_tamanho');";
            $dados = $conn->query($comandoSQL);
            $dados = " ";
        }
    }else{
        echo "Há dados em branco";
    }
}
?>