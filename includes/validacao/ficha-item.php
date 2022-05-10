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

    if(isset($_POST['nome'],  $_POST['peso'])){
        if(!empty($_POST['nome'] || $_POST['peca_cobre'] || $_POST['peca_prata'] || $_POST['peca_ouro'] && $_POST['peso'])){
            $nome_item = $_POST['nome'];
            $peca_cobre = $_POST['peca_cobre'];
            $peca_prata = $_POST['peca_prata'];
            $peca_ouro = $_POST['peca_ouro'];
            $peso = $_POST['peso'];

            $comandoSQL = "SELECT MAX(CD_ITEM)+1 FROM TB_ITEM;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_item = $dado[0];
            }
            $dados = " ";

            if(!empty($_POST['descricao'])){
                $descricao = $_POST['descricao'];
                $comandoSQL ="INSERT INTO TB_ITEM VALUES($cd_usuario,$cd_item,'$nome_item', 1,'$descricao', $peca_cobre, $peca_prata,$peca_ouro, $peso, NULL);";
            }else{
                $descricao = "NULL";
                $comandoSQL = "INSERT INTO TB_ITEM VALUES($cd_usuario,$cd_item,'$nome_item',1, $descricao, $peca_cobre, $peca_prata,$peca_ouro, $peso, NULL);";
            }


            $dados = $conn->query($comandoSQL);
           
            header('Location: ../../produtos.php');
        }else{
            echo "há dados em branco";
        }}