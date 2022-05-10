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

    if(isset($_POST['nome'], $_POST['peso'], $_POST['qtd_maos'])){
        if(!empty($_POST['nome'] && $_POST['peca_ouro'] && $_POST['peso'] &&  $_POST['qtd_maos'])){
            $nome_arma = $_POST['nome'];
            $peca_cobre = $_POST['peca_cobre'];
            $peca_prata = $_POST['peca_prata'];
            $peca_ouro = $_POST['peca_ouro'];
            $peso = $_POST['peso'];
            $qtd_maos =  $_POST['qtd_maos'];

            if(!empty($_POST['tipo_arma'])){
                $tipo = $_POST['tipo_arma'];
            }else{
                $tipo = 'NULL';
            }

            if(!empty($_POST['tipo_dado'])){
                $tipo_dado = $_POST['tipo_dado'];
            }else{
                $tipo_dado = 'NULL';
            }

            if(!empty($_POST['qtd_dados'])){
                $qtd_dados = $_POST['qtd_dados'];
            }else{
                $qtd_dados = 'NULL';
            }

            if(!empty($_POST['tipo_dano'])){
                $tipo_dano = $_POST['tipo_dano'];
            }else{
                $tipo_dano = 'NULL';
            }

            if(!empty($_POST['propriedade'])){
                $propriedade = $_POST['propriedade'];
            }else{
                $propriedade = 'NULL';
            }

            if(!empty($_POST['descricao'])){
                $descricao = $_POST['descricao'];
                $comandoSQL = "CALL SP_CRIA_ARMA($cd_usuario,'$nome_arma', $tipo,'$descricao',$qtd_maos, $tipo_dado,$qtd_dados,$tipo_dano,$peca_cobre, $peca_prata,$peca_ouro, $peso,NULL, NULL);";
            }else{
                $descricao = "NULL";
                $comandoSQL = "CALL SP_CRIA_ARMA($cd_usuario,'$nome_arma',$tipo, $descricao,$qtd_maos,$tipo_dado, $qtd_dados,$tipo_dano,$peca_cobre, $peca_prata,$peca_ouro, $peso, NULL,NULL);";
            }

            
            $dados = $conn->query($comandoSQL);
            header('Location: ../../produtos.php');
        }else{
            echo "há dados em branco";
        }}