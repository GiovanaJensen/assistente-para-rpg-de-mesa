<?php
session_start();
require_once "../db/dbConnection.php";

$usuario = $_SESSION['usuario'];
$comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $cd_usuario = $dado[0];
}
$dados = " ";

    if(isset($_POST['nome'], $_POST['peca_ouro'], $_POST['peso'], $_POST['defesa'], $_POST['requisito_minimo'],$_POST['tipo_armadura'], $_POST['tipo_furtividade'])){
        if(!empty($_POST['nome'] && $_POST['peca_ouro'] && $_POST['peso'] &&  $_POST['defesa'] && $_POST['requisito_minimo'] && $_POST['tipo_armadura'] && $_POST['tipo_furtividade'])){
            $nome_armadura = $_POST['nome'];
            $peca_cobre = $_POST['peca_cobre'];
            $peca_prata = $_POST['peca_prata'];
            $peca_ouro = $_POST['peca_ouro'];
            $peso = $_POST['peso'];
            $defesa =  $_POST['defesa'];
            $requisito_minimo = $_POST['requisito_minimo'];
            $tipo_armadura = $_POST['tipo_armadura'];
            $tipo_furtividade = $_POST['tipo_furtividade'];

            if(!empty($_POST['descricao'])){
                $descricao = $_POST['descricao'];
                $comandoSQL = "CALL SP_CRIA_ARMADURA($cd_usuario,'$nome_armadura', $tipo_armadura,'$descricao',$defesa, $requisito_minimo,$tipo_furtividade,$peca_cobre, $peca_prata,$peca_ouro, $peso,NULL);";
            }else{
                $descricao = "NULL";
                $comandoSQL = "CALL SP_CRIA_ARMADURA($cd_usuario,'$nome_armadura',$tipo_armadura, $descricao,$defesa, $requisito_minimo,$tipo_furtividade,$peca_cobre, $peca_prata,$peca_ouro, $peso,NULL);";
            }

            
            $dados = $conn->query($comandoSQL);
            header('Location: ../../produtos.php');
        }else{
            echo "há dados em branco";
        }}