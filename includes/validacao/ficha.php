<?php
require_once "../db/dbConnection.php";
if(isset($_POST['nome'],
    $_POST['nivel'],
    $_POST['raca'],
    $_POST['classe'],
    $_POST['tendencia'],
    $_POST['antecedente'],
    $_POST['experiencia'],
    $_POST['idioma1'],
    $_POST['idioma2'],
    $_POST['pecas_cobre'],
    $_POST['pecas_prata'],
    $_POST['pecas_ouro'],
    $_POST['pontos_vida'],
    $_POST['pontos_vida_total'],
    $_POST['pontos_vida_atual'],
    $_POST['armadura'],
    $_POST['escudo']
    )){
        if(!empty($_POST['nome'] &&
        $_POST['nivel'] &&
        $_POST['raca'] &&
        $_POST['classe'] &&
        $_POST['tendencia'] &&
        $_POST['antecedente'] &&
        $_POST['experiencia'] &&
        $_POST['idioma1'] &&
        $_POST['pecas_cobre'] &&
        $_POST['pecas_prata'] &&
        $_POST['pecas_ouro'] &&
        $_POST['pontos_vida'] &&
        $_POST['pontos_vida_total'] &&
        $_POST['pontos_vida_atual'] &&
        $_POST['armadura'] &&
        $_POST['escudo']) && $_POST['idioma2']){
            if(strlen($_POST['nome']) <= 100){
                $nome = $_POST['nome'];
                $nivel = $_POST['nivel'];
                $codigo_raca = $_POST['raca'];
                $codigo_classe = $_POST['classe'];
                $codigo_tendencia = $_POST['tendencia'];
                $codigo_antecedente = $_POST['antecedente'];
                $experiencia = $_POST['experiencia'];
                $idioma1 = $_POST['idioma1'];
                $pecas_cobre = $_POST['pecas_cobre'];
                $pecas_prata = $_POST['pecas_prata'];
                $pecas_ouro = $_POST['pecas_ouro'];
                $pontos_vida = $_POST['pontos_vida'];
                $pontos_vida_total = $_POST['pontos_vida_total'];
                $pontos_vida_atual = $_POST['pontos_vida_atual'];
                $codigo_armadura = $_POST['armadura'];
                $codigo_escudo = $_POST['escudo'];
                $idioma2 = $_POST['idioma2'];

                if(!empty($_POST['def_natural'])){
                    $def_natural = $_POST['def_natural'];
                }else{
                    $def_natural = "NULL";
                }

                if(!empty($_POST['habilidade'])){
                    $habilidade = $_POST['habilidade'];
                }else{
                    $habilidade = "NULL";
                }

                if(!empty($_POST['proficiencia'])){
                    $proficiencia = $_POST['proficiencia'];
                }else{
                    $proficiencia = "NULL";
                }

                if(!empty($_POST['biografia'])){
                    $biografia = $_POST['biografia'];
                }else{
                    $biografia= "NULL";
                }  

                $comandoSQL = $conn->prepare("SELECT MAX(CD_PERSONAGEM) AS 'CD_PERSONAGEM' FROM TB_PERSONAGEM;");
                $comandoSQL->execute();
                $result = $comandoSQL->fetch(PDO::FETCH_ASSOC);
                $cd_personagem = $result['CD_PERSONAGEM'] + 1;
                session_start();
                $cd_usuario =  $_SESSION['codigo'];
                $_SESSION['personagem'] = $nome;
                $_SESSION['raca'] = $codigo_raca;
                $comandoSQL = "INSERT INTO TB_PERSONAGEM VALUES ($cd_usuario, $cd_personagem, '$nome',$nivel,$codigo_classe,$codigo_tendencia,$codigo_antecedente, $experiencia, $idioma1,$idioma2,NULL,$pecas_cobre,$pecas_prata, $pecas_ouro,$pontos_vida,$pontos_vida_atual,$codigo_armadura, $codigo_escudo,$def_natural,$habilidade,$proficiencia,$biografia);";
                $dados=$conn->query($comandoSQL);
                $dados = " ";
                header('Location: ../../cadastro_parte2.php');
            }else{
                echo "limite de caracteres foi ultrapassado!";
            }
        }else{
            echo "Há campos em branco!";
        }
        
    }else{
        echo "Há campos em branco!";
    }
    

?>