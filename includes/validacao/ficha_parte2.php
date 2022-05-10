<?php
session_start();
$nome_personagem = $_SESSION['personagem'];
$raca = $_SESSION['raca'];

require_once "../db/dbConnection.php";
include_once "../variaveis/ficha_parte2.php";
if(isset(
    $_POST['idade'],
    $_POST['sexo'],
    $_POST['peso'],
    $_POST['altura'],
    $_POST['olho'],
    $_POST['pele'],
    $_POST['cabelo'],
    $_POST['armadura'],
    $_POST['escudo']
    )){
        if(
        $_POST['idade'] &&
        $_POST['sexo'] &&
        $_POST['peso'] &&
        $_POST['altura'] &&
        $_POST['olho'] &&
        $_POST['pele'] &&
        $_POST['cabelo'] &&
        $_POST['armadura'] &&
        $_POST['escudo']
        ){
            
               

                $comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
               $dados = $conn->query($comandoSQL);
               foreach($dados as $dado){
                   $codigo_personagem = $dado[0];
               }
               $dados = " ";

               if($raca == 4 || $raca == 7 || $raca == 8 || $raca == 9 || $raca == 12){
                   $subraca = 'NULL';
                   echo $subraca;
               }

                if(!empty($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET NM_PERSONAGEM = '$nome'
                     WHERE NM_PERSONAGEM = '$nome_personagem';";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                    $_SESSION['personagem'] = $nome;
                }else{
                   
                }

                if(!empty($_POST['nivel'])){
                    $nivel = $_POST['nivel'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_NIVEL = $nivel
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['classe'])){
                    $classe = $_POST['classe'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_CLASSE = $classe
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['tendencia'])){
                    $tendencia= $_POST['tendencia'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_TENDENCIA = $tendencia
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['antecedente'])){
                    $antecedente = $_POST['antecedente'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_ANTECEDENTE = $antecedente
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['experiencia'])){
                    $experiencia = $_POST['experiencia'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_EXPERIENCIA = $experiencia
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['cobre'])){
                    $cobre = $_POST['cobre'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_COBRE = $cobre
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['prata'])){
                    $prata = $_POST['prata'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_PRATA = $prata
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['ouro'])){
                    $ouro = $_POST['ouro'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET VL_PECAS_OURO = $ouro
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['pts_vida_total'])){
                    $pts_vida_total = $_POST['pts_vida_total'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_PONTOS_DE_VIDA = $pts_vida_total 
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['pts_vida_atual'])){
                    $pts_vida_atual = $_POST['pts_vida_atual'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_PONTOS_DE_VIDA_ATUAL = $pts_vida_atual 
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                

                if(!empty($_POST['def_natural'])){
                    $def_natural = $_POST['def_natural'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET NR_DEFESA_NATURAL = $def_natural
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['habilidade'])){
                    $habilidade = $_POST['habilidade'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET DS_HABILIDADE = $habilidade
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['proficiencia'])){
                    $proficiencia = $_POST['proficiencia'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET DS_PROFICIENCIAS = $proficiencia
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['biografia'])){
                    $biografia = $_POST['biografia'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET DS_BIOGRAFIA = $biografia
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }


                if(!empty($_POST['armadura'])){
                    $armadura = $_POST['armadura'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_ARMADURA = $armadura
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['escudo'])){
                    $escudo= $_POST['escudo'];
                    $comandoSQL = "UPDATE TB_PERSONAGEM SET CD_ESCUDO = $escudo
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['caracteristicas'])){
                    $caracteristicas = $_POST['caracteristicas'];
                    $comandoSQL = "INSERT INTO TB_APARENCIA VALUES($codigo_personagem,$raca,$subraca, $idade, '$sexo',$peso, $altura, $olho,$pele, $cabelo, '$caracteristicas',NULL);";
                }else{
                    $caracteristicas = "NULL";
                    $comandoSQL = "INSERT INTO TB_APARENCIA VALUES($codigo_personagem,$raca,$subraca, $idade, '$sexo',$peso, $altura, $olho,$pele, $cabelo, $caracteristicas, NULL);";
                }

               $dados = $conn->query($comandoSQL);
               $dados = " ";

               $opcao = $_POST['opcao_atributo'];
               if($opcao == "A"){
                   $_SESSION['opcao_atributo'] = 'Aleatório';
               }else{
                    $_SESSION['opcao_atributo'] ='Fixo';
               }
               $comandoSQL = "CALL SP_OPCAO_ATRIBUTOS ('$opcao',@A1,@A2,@A3,@A4,@A5,@A6);";
               $dados = $conn->query($comandoSQL);
               foreach($dados as $dado){
                 $a1 = $dado[0];
                 $a2 = $dado[1];
                 $a3 = $dado[2];
                 $a4 = $dado[3];
                 $a5 = $dado[4];
                 $a6 = $dado[5];
                }

                 $dados = " ";
                 $comandoSQL = "INSERT INTO TB_OPCAO_ATRIBUTO VALUES($codigo_personagem,$a1,$a2,$a3,$a4,$a5,$a6);";
                 $dados = $conn->query($comandoSQL);
               
                header('Location: ../../cadastro_parte3.php');
            
        }else{
            echo "Há campos em branco!";
        }
        
    }else{
        echo "Há campos em branco!";
    }
    

?>