<?php
session_start();
$nome_personagem = $_SESSION['personagem'];
$raca = $_SESSION['raca'];

require_once "../db/dbConnection.php";

                $comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
               $dados = $conn->query($comandoSQL);
               foreach($dados as $dado){
                   $codigo_personagem = $dado[0];
               }
               $dados = " ";

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

                if(!empty($_POST['sub-raca'])){
                    $sub_raca = $_POST['sub-raca'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET CD_SUB_RACA = $sub_raca
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['sexo'])){
                    $sexo = $_POST['sexo'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET DS_SEXO = '$sexo'
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['peso'])){
                    $peso = $_POST['peso'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET NR_PESO_KG = $peso
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['altura'])){
                    $altura = $_POST['altura'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET NR_ALTURA_CM = $altura
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['idade'])){
                    $idade = $_POST['idade'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET NM_IDADE = $idade
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['olho'])){
                    $olho = $_POST['olho'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET CD_OLHO = $olho
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['pele'])){
                    $pele = $_POST['pele'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET CD_PELE = $pele
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }

                if(!empty($_POST['cabelo'])){
                    $cabelo = $_POST['cabelo'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET CD_CABELO = $cabelo
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                    $dados = $conn->query($comandoSQL);
                    $dados = " ";
                }else{
                   
                }
                
                if(!empty($_POST['caracteristicas'])){
                    $caracteristicas = $_POST['caracteristicas'];
                    $comandoSQL = "UPDATE TB_APARENCIA SET DS_CARACTERISTICAS = '$caracteristicas'
                     WHERE CD_PERSONAGEM = $codigo_personagem;";
                     $dados = $conn->query($comandoSQL);
                     $dados = " ";
                }else{

                }

                $dados = " ";
                $comandoSQL = "SELECT CD_CLASSE FROM TB_PERSONAGEM WHERE CD_PERSONAGEM = $codigo_personagem;";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                     $classe = $dado[0];
                }

                if($classe == 2 || $classe == 12){
                    $prof3 = $_POST['prof3'];
                }elseif($classe == 8){
                    $prof3 = $_POST['prof3'];
                    $prof4 = $_POST['prof4'];
                }else{
                    $prof3 = NULL;
                    $prof4 = NULL;
                }
                
                $comandoSQL = "CALL SP_INSERT_PROF_PERICIA($codigo_personagem,'$prof1','$prof2','$prof3','$prof4');";

               $dados = $conn->query($comandoSQL);
               $dados = " ";
               
                header('Location: ../../ficha.php');
    

?>