<?php
require_once "../db/dbConnection.php";
session_start();

$cd_personagem = $_SESSION['cd_personagem'];
$nome_personagem = $_SESSION['nome_personagem'];

if(isset($_POST['exp'])){
   if(!empty($_POST['exp'])){
      $dados=" ";
      $comandoSQL = "CALL SP_EXPERIENCIA_PERSONAGEM ('$nome_personagem');";
      $dados = $conn->query($comandoSQL);
      foreach($dados as $dado){
         $expAnterior = $dado[0];                               
      }
     $exp = $_POST['exp'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_EXPERIENCIA = $expAnterior+$exp  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}


if(isset($_POST['pv_atual'])){
   if(!empty($_POST['pv_atual'])){
   
     $pv_atual = $_POST['pv_atual'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_PONTOS_DE_VIDA_ATUAL = $pv_atual  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}

if(isset($_POST['idade'])){
    if(!empty($_POST['idade'])){
       $dados=" ";
      $idade = $_POST['idade'];
      $dados = " ";
      $comandoSQL = "UPDATE TB_APARENCIA SET NR_IDADE = $idade  WHERE CD_PERSONAGEM = $cd_personagem;";
      $dados = $conn->query($comandoSQL);
      header('Location: ../../ficha.php');
  }
   }    

if(isset($_POST['peso'])){
    if(!empty($_POST['peso'])){
       $dados=" ";
      $peso = $_POST['peso'];
      $dados = " ";
      $comandoSQL = "UPDATE TB_APARENCIA SET NR_PESO_KG = $peso  WHERE CD_PERSONAGEM = $cd_personagem;";
      $dados = $conn->query($comandoSQL);
      header('Location: ../../ficha.php');
  }
}

if(isset($_POST['altura'])){
    if(!empty($_POST['altura'])){
       $dados=" ";
      $altura = $_POST['altura'];
      $dados = " ";
      $comandoSQL = "UPDATE TB_APARENCIA SET NR_ALTURA_CM = $altura  WHERE CD_PERSONAGEM = $cd_personagem;";
      $dados = $conn->query($comandoSQL);
      header('Location: ../../ficha.php');
  }
}  

if(isset($_POST['tendencia'])){
   if(!empty($_POST['tendencia'])){
      $dados=" ";
     $tendencia = $_POST['tendencia'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_TENDENCIA = $tendencia  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}

if(isset($_POST['ouro'])){
   if(!empty($_POST['ouro'])){
      $dados=" ";
     $ouro = $_POST['ouro'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_OURO = $ouro  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}  

if(isset($_POST['prata'])){
   if(!empty($_POST['prata'])){
      $dados=" ";
     $prata = $_POST['prata'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_PRATA = $prata  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}  

if(isset($_POST['cobre'])){
   if(!empty($_POST['cobre'])){
      $dados=" ";
     $cobre = $_POST['cobre'];
     $dados = " ";
     $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_COBRE = $cobre  WHERE CD_PERSONAGEM = $cd_personagem;";
     $dados = $conn->query($comandoSQL);
     header('Location: ../../ficha.php');
 }
}  