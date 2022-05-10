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

    if(isset($_POST['nome'], $_POST['tipo'], $_POST['defesa'],$_POST['requisito'], $_POST['peso'])){
        if(!empty($_POST['nome'] || $_POST['peca_cobre'] || $_POST['peca_prata'] || $_POST['peca_ouro'] && $_POST['peso'] && $_POST['tipo'] && $_POST['defesa'] && $_POST['requisito'])){
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $defesa = $_POST['defesa'];
            $requisito = $_POST['requisito'];
            $peca_cobre = $_POST['peca_cobre'];
            $peca_prata = $_POST['peca_prata'];
            $peca_ouro = $_POST['peca_ouro'];
            $peso = $_POST['peso'];

            if(!empty($_POST['descricao'])){
                $descricao = $_POST['descricao'];
                $comandoSQL = "CALL SP_CRIA_ESCUDO($cd_usuario,'$nome', '$descricao', $tipo, $defesa, $requisito, $peca_cobre, $peca_prata,$peca_ouro, $peso, NULL);";
            }else{  
                $descricao = "NULL";
                $comandoSQL = "CALL SP_CRIA_ESCUDO($cd_usuario,'$nome',$descricao,$tipo, $defesa, $requisito,  $peca_cobre, $peca_prata,$peca_ouro, $peso, NULL);";
            }

            
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                echo $dado[0];
            }
            header('Location: ../../produtos.php');
        }else{
            echo "há dados em branco";
        }}