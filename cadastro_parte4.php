<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: cadastro/login.php");
}else{
    include_once "includes/header.php";
    include_once "includes/db/dbConnection.php";  

    
?>

    <body class="scroll">
        <?php
        include_once "includes/navbar-logado.php";
        include_once "includes/carrossel.php";

        $nome_personagem = $_SESSION['personagem'];
        $raca = $_SESSION['raca'];

        $usuario = $_SESSION['usuario'];
            $comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_usuario = $dado[0];
            }
            $dados = " ";

        $comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
        $dados = $conn->query($comandoSQL);
        foreach($dados as $dado){
            $cd_personagem = $dado[0];
        }
        $dados = " ";

        $comandoSQL = " CALL SP_P4_PERICIA_IN($cd_personagem);";
        $dados = $conn->query($comandoSQL);
        $dados = " ";
        ?>
        <!-- Banner -->
        <section id="contato-solovia" style="background: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 contato-titulo">
                        <h2 style="color: #000;">Personagem</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='includes/validacao/ficha_parte4.php' method="POST">
                                <div class="row">
                                    <div class="col-lg-4 inputContato1">
                                        <input type="text" name="nome" id="nome" placeholder="<?php echo $nome_personagem;?>" maxlength="100">
                                    </div>
                                     <div class="col-lg-4  inputContato1">
                                        <?php
                                        $comandoSQL= "CALL SP_NIVEL_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="nivel" placeholder="<?php echo $dado[0];?>" maxlength="2">  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 ">
                                    <select name="raca" id="raca" >
                                        <?php
                                            $comandoSQL = "SELECT NM_RACA FROM TB_RACA WHERE CD_RACA = $raca;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option selected><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                        ?>        
                                        </select>
                                    </div>
                                     <div class="col-lg-4 inputContato1 mt-5" >
                                        <select name="classe"> 
                                                <?php
                                                    $comandoSQL = "SELECT C.CD_CLASSE, C.NM_CLASSE FROM TB_CLASSE AS C
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_CLASSE = C.CD_CLASSE
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem';";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                ?>
                                            <?php
                                            $comandoSQL = "SELECT NM_CLASSE AS 'CLASSE', CD_CLASSE
                                            FROM TB_CLASSE;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados =  " ";
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tendencia">
                                                <?php
                                                    $comandoSQL = "SELECT A.CD_TENDENCIA, A.NM_TENDENCIA FROM TB_TENDENCIA AS A
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_TENDENCIA= A.CD_TENDENCIA
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem'; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                ?>
                                            <?php
                                            $comandoSQL = "SELECT NM_TENDENCIA AS 'TENDÊNCIA', CD_TENDENCIA
                                            FROM TB_TENDENCIA;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option  value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            ?>
                                        </select>
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="antecedente">
                                            <?php
                                                    $comandoSQL = "SELECT A.CD_ANTECEDENTE, A.NM_ANTECEDENTE FROM TB_ANTECEDENTE AS A
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_ANTECEDENTE= A.CD_ANTECEDENTE
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem'; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                ?>
                                            <?php
                                            $comandoSQL = "SELECT NM_ANTECEDENTE AS 'ANTECEDENTE', CD_ANTECEDENTE
                                            FROM TB_ANTECEDENTE;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            ?>
                                        </select>
                                    </div>  
                                      <div class="col-lg-4 inputContato1 mt-5">
                                      <?php
                                        $comandoSQL= "CALL SP_EXPERIENCIA_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="experiencia" placeholder="<?php echo $dado[0];?>">
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                        
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5" >
                                        <select id="idioma1" name="idioma1">
                                            <option selected value="2">COMUM</option>
                                        </select>
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="idioma2">
                                            <?php
                                                    $comandoSQL = "SELECT A.CD_IDIOMA, A.NM_IDIOMA FROM TB_IDIOMA AS A
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_IDIOMA_2= A.CD_IDIOMA
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem'; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                ?>
                                        </select>
                                    </div>
                                      
                                     <div class="col-lg-4 inputContato1 mt-5">
                                     <?php
                                        $comandoSQL= "CALL SP_COBRE_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="cobre" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $comandoSQL= "CALL SP_PRATA_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="prata" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_OURO_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="ouro" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                      <?php
                                        $comandoSQL= "select nr_pontos_de_Vida from tb_personagem where nm_personagem = '$nome_personagem';";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="pts_vida_total" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "select nr_pontos_de_Vida from tb_personagem where nm_personagem = '$nome_personagem'; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="pts_vida_total2" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_PV_ATUAL_PERSONAGEM ('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="pts_vida_atual" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="armadura">
                                        <?php
                                                    $comandoSQL = "SELECT A.CD_ARMADURA, A.NM_ARMADURA FROM TB_ARMADURA AS A
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_ARMADURA = A.CD_ARMADURA
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem';";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                ?>
                                            <?php
                                            $comandoSQL = "SELECT NM_ARMADURA AS ARMADURA, CD_ARMADURA
                                            FROM TB_ARMADURA;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[1];?>"><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="escudo">
                                        <?php
                                                    $comandoSQL = "SELECT A.CD_ESCUDO, A.NM_ESCUDO FROM TB_ESCUDO AS A
                                                    JOIN TB_PERSONAGEM AS P
                                                        ON P.CD_ESCUDO = A.CD_ESCUDO
                                                            WHERE P.NM_PERSONAGEM = '$nome_personagem'; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                            $comandoSQL = "SELECT NM_ESCUDO AS ESCUDO, CD_ESCUDO
                                            FROM TB_ESCUDO;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[1];?>"><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="def_natural" placeholder="DEF Natural">
                                    </div>

                                     <div class="col-lg-4  msgboxContato">
                                        <textarea  rows="3" name="habilidade" placeholder="Habilidade"></textarea>
                                    </div>
                                     <div class="col-lg-4  msgboxContato">
                                        <textarea  rows="3" name="proficiencia" placeholder="Proficiência"></textarea>
                                    </div>
                                      <div class="col-lg-4  msgboxContato">
                                        <textarea  rows="3" name="biografia" placeholder="Biografia"></textarea>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select id="sub-raca" name="sub-raca">
                                            <?php
                                              $comandoSQL = "SELECT A.CD_SUB_RACA, A.NM_SUB_RACA FROM TB_SUB_RACA AS A
                                              JOIN TB_APARENCIA AS P
                                                  ON P.CD_SUB_RACA = A.CD_SUB_RACA
                                                      WHERE P.CD_PERSONAGEM = $cd_personagem;";
                                              
                                              $dados = $conn->query($comandoSQL);
                                              foreach($dados as $subraca){
                                                  ?>
                                                  <option selected value="<?php echo $subraca[0];?>">
                                                  <?php
                                                  echo $subraca[1];
                                                  ?>
                                                  </option>
                                                  <?php
                                              }
                                              $dados =  " ";
                                              $comandoSQL = "SELECT  A.CD_SUB_RACA, A.NM_SUB_RACA AS 'SUB-RAÇA',
                                              B.NM_RACA AS 'RAÇA'
                                              FROM TB_SUB_RACA AS A
                                              JOIN TB_RACA AS B
                                                  ON A.CD_RACA = B.CD_RACA
                                                      WHERE A.CD_RACA = ";
                                              $comandoSQL .= $_SESSION['raca'] . " ";
                                              $comandoSQL .= "GROUP BY A.CD_SUB_RACA;";
                                              
                                              $dados = $conn->query($comandoSQL);
                                              foreach($dados as $subraca){
                                                  ?>
                                                  <option value="<?php echo $subraca[2];?>">
                                                  <?php
                                                  echo $subraca[1];
                                                  ?>
                                                  </option>
                                                  <?php
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4  inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_IDADE_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="idade" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                           
                                    </div>
                                    <div class="col-lg-4  inputContato1 mt-5">
                                        <select name="sexo">
                                        <?php
                                                    $comandoSQL = "CALL SP_SEXO_PERSONAGEM('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected><?php echo $dado[0];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4  inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_PESO_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="peso" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?>   
                                    </div>
                                    <div class="col-lg-4  inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_ALTURA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="altura" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?>   
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select id="olho" name="olho">
                                        <?php
                                                    $comandoSQL = "SELECT A.CD_OLHO, A.NM_OLHO FROM TB_OLHO AS A
                                                    JOIN TB_APARENCIA AS P
                                                        ON P.CD_OLHO = A.CD_OLHO
                                                            WHERE P.CD_PERSONAGEM = $cd_personagem; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                                    ?>
                                            <option value="1">Verde Claro</option>
                                            <option value="2">Verde</option>
                                            <option value="3">Azul Claro</option>
                                            <option value="4">Azul</option>
                                            <option value="5">Castanho Claro</option>
                                            <option value="6">Castanho Escuro</option>
                                            <option value="7">Mel</option>
                                            <option value="8">Amarelo</option>
                                            <option value="9">Roxo</option>
                                            <option value="10">Vermelho</option>
                                            <option value="11">Rosa</option>
                                            <option value="12">Preto</option>
                                            <option value="13">Turquesa</option>
                                            <option value="14">Branco</option>
                                            <?php
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_OLHO, CD_OLHO FROM TB_OLHO WHERE CD_USUARIO = $cd_usuario;";
                                            
                                            $dados = $conn->query($comandoSQL);
                                            $count = $dados->rowCount();
                                            if($count > 0){
                                                foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                                }  
                                            }
                                            $dados = " ";
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5" >
                                        <select name="pele">
                                        <?php
                                                    $comandoSQL = "SELECT A.CD_PELE, A.NM_PELE FROM TB_PELE AS A
                                                    JOIN TB_APARENCIA AS P
                                                        ON P.CD_PELE = A.CD_PELE
                                                            WHERE P.CD_PERSONAGEM = $cd_personagem; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";
                                            $comandoSQL = "SELECT CD_PELE, NM_PELE FROM TB_PELE;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[0];?>><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            $dados = ' ';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5" >
                                        <select name="cabelo">
                                        <?php
                                                    $comandoSQL = "SELECT A.CD_CABELO, A.NM_CABELO FROM TB_CABELO AS A
                                                    JOIN TB_APARENCIA AS P
                                                        ON P.CD_CABELO = A.CD_CABELO
                                                            WHERE P.CD_PERSONAGEM = $cd_personagem; ";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                         <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                    <?php
                                                    }
                                                    $dados  = " ";

                                            $comandoSQL = "SELECT CD_CABELO, NM_CABELO FROM TB_CABELO;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[0];?>><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            $dados = ' ';
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4  msgboxContato">
                                        <textarea  rows="3" name="caracteristicas" placeholder="Características"></textarea>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_FORCA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="forca" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_FORCA FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_forca" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_forca">
                                            <?php
                                                   $comandoSQL = "CALL SP_RES_FORCA_PERSONAGEM('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php

                                                   }
                                                $dados = " ";
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_DESTREZA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="destreza" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_DESTREZA FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_destreza" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_destreza">
                                        <?php
                                                   $comandoSQL = "CALL SP_RES_DESTREZA('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php
                                                
                                                   }
                                                   $dados = " ";
                                                
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_CONSTITUICAO_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="constituicao" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_CONSTITUICAO FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_constituicao" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_constituicao">
                                        <?php
                                                   $comandoSQL = "CALL SP_RES_CONSTITUICAO('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php
                                                
                                                   }
                                                   $dados = " ";
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_INTELIGENCIA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="inteligencia" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_INTELIGENCIA FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_inteligencia" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_inteligencia">
                                        <?php
                                                   $comandoSQL = "CALL SP_RES_INTELIGENCIA('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php
                                                
                                                   }
                                                   $dados = " ";
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_SABEDORIA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="sabedoria" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_SABEDORIA FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_sabedoria" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_sabedoria">
                                        <?php
                                                   $comandoSQL = "CALL SP_RES_SABEDORIA('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php
                                                
                                                   }
                                                   $dados = " ";
                                                
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "CALL SP_CARISMA_PERSONAGEM('$nome_personagem'); ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="carisma" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <?php
                                        $comandoSQL= "SELECT NR_MODIFICADOR_CARISMA FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem; ";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                                <input type="number" name="modificador_carisma" placeholder="<?php echo $dado[0];?>" >  
                                            <?php
                                        }
                                        $dados = " ";
                                        ?> 
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="resitencia_carisma">
                                        <?php
                                                   $comandoSQL = "CALL SP_RES_CARISMA('$nome_personagem');";
                                                   $dados = $conn->query($comandoSQL);
                                                   foreach($dados as $dado){
                                                       if($dado[0] == "NÃO"){
                                                           $value = 'N';
                                                       }else{
                                                           $value = 'S';
                                                       }
                                                    ?>
                                                        <option selected value="<?php echo $value;?>"><?php echo $dado[0];?></option>
                                                    <?php
                                                
                                                   }
                                                   $dados = " ";
                                                
					                        ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ATLETISMO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de atletismo: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ATLETISMO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de atletismo: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ACROBACIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de acrobacia: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ACROBACIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:  #000">Proficiência de acrobacia: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_FURTIVIDADE FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de furtividade: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_FURTIVIDADE FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:#000">Proficiência de furtividade: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_PRESTIDIGITACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de prestidigitação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_PRESTIDIGITACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de prestidigitação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ARCANISMO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de arcanismo: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ARCANISMO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de arcanismo: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_HISTORIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de história: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_HISTORIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de história: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_INVESTIGACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de investigação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_INVESTIGACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de investigação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_NATUREZA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de natureza: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_NATUREZA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de natureza: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_RELIGIAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de religião: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_RELIGIAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de natureza: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ADESTRAR_ANIMAIS FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de adestrar animais: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ADESTRAR_ANIMAIS FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de adestrar animais: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_INTUICAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de intuição: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_INTUICAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de intuição: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_MEDICINA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:#000">Número de medicina: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_MEDICINA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:#000">Proficiência de medicina: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_PERCEPCAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de percepção: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_PERCEPCAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de percepção: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_SOBREVIVENCIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:#000">Número de sobrevivência: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_SOBREVIVENCIA FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color:#000">Proficiência de sobrevivência: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ATUACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de atuação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ATUACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de atuação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_ENGANACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de enganação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_ENGANACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de enganação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_INTIMIDACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de intimidação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_INTIMIDACAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de intimidação: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT NR_PERSUASAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Número de persuasão: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT DS_PROFICIENCIA_PERSUASAO FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            ?>
                                            <h6 style="color: #000">Proficiência de persuasão: <?php echo $dado[0];?></h6>
                                            <?php
                                        }
                                        ?>     
                                    </div>
                                    <?php
                                        $dados = " ";
                                        $comandoSQL = "SELECT CD_CLASSE FROM TB_PERSONAGEM WHERE CD_PERSONAGEM = $cd_personagem;";
                                        $dados = $conn->query($comandoSQL);
                                        foreach($dados as $dado){
                                            $classe = $dado[0];
                                        }
                                        switch($classe){
                                            case 1:
                                                ?>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof1" id="prof1">
                                                        <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                        <option>Atletismo</option>
                                                        <option>Natureza</option>
                                                        <option>Adestrar Animais</option>
                                                        <option>Percepção</option>
                                                        <option>Sobrevivência</option>
                                                        <option>Intimidação</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof2" id="prof2">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <?php
                                            break;
                                            case 2:
                                                ?>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof1" id="prof1">
                                                        <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                        <option>Atletismo</option>
                                                        <option>Acrobacia</option>
                                                        <option>Furtividade</option>
                                                        <option>Prestidigitação</option>
                                                        <option>Arcanismo</option>
                                                        <option>História</option>
                                                        <option>Investigação</option>
                                                        <option>Natureza</option>
                                                        <option>Religião</option>
                                                        <option>Adestrar animais</option>
                                                        <option>Intuição</option>
                                                        <option>Medicina</option>
                                                        <option>Percepção</option>
                                                        <option>Sobrevivência</option>
                                                        <option>Atuação</option>
                                                        <option>Enganação</option>
                                                        <option>Intimidação</option>
                                                        <option>Persuasão</option>  
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof2" id="prof2">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof3" id="prof3">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <?php
                                            break;
                                            case 3:
                                                ?>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof1" id="prof1">
                                                        <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                        <option>Arcanismo</option>
                                                        <option>História</option>
                                                        <option>Investigação</option>
                                                        <option>Natureza</option>
                                                        <option>Religião</option>
                                                        <option>Enganação</option>
                                                        <option>Intimidação</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof2" id="prof2">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <?php
                                            break;
                                            case 4:
                                                ?>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof1" id="prof1">
                                                        <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                        <option>História</option>
                                                        <option>Religião</option>
                                                        <option>Intuição</option>
                                                        <option>Medicina</option>
                                                        <option>Persuasão</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof2" id="prof2">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <?php
                                            break;
                                            case 5:
                                                ?>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof1" id="prof1">
                                                        <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                        <option>Arcanismo</option>
                                                        <option>Natureza</option>
                                                        <option>Religião</option>
                                                        <option>Adestrar animais</option>
                                                        <option>Intuição</option>
                                                        <option>Medicina</option>
                                                        <option>Percepção</option>
                                                        <option>Sobrevivência</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 inputContato1 mt-5">
                                                    <select name="prof2" id="prof2">
                                                        <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                    </select>
                                                </div>
                                                <?php
                                            break;
                                            case 6:
                                                    ?>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof1" id="prof1">
                                                            <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                            <option>Arcanismo</option>
                                                            <option>Religião</option>
                                                            <option>Intuição</option>
                                                            <option>Enganação</option>
                                                            <option>Intimidação</option>
                                                            <option>Persuasão</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof2" id="prof2">
                                                            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                break;
                                                case 7:
                                                    ?>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof1" id="prof1">
                                                            <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                            <option>Atletismo</option>
                                                            <option>Acrobacia</option>
                                                            <option>História</option>
                                                            <option>Adestrar animais</option>
                                                            <option>Intuição</option>
                                                            <option>Percepção</option>
                                                            <option>Sobrevivência</option>
                                                            <option>Intimidação</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof2" id="prof2">
                                                            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                break;
                                                case 9:
                                                    ?>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof1" id="prof1">
                                                            <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                            <option>Arcanismo</option>
                                                            <option>História</option>
                                                            <option>Investigação</option>
                                                            <option>Religião</option>
                                                            <option>Intuição</option>
                                                            <option>Medicina</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof2" id="prof2">
                                                            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                break;
                                                case 10:
                                                    ?>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof1" id="prof1">
                                                            <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                            <option>Atletismo</option>
                                                            <option>Acrobacia</option>
                                                            <option>Furtividade</option>
                                                            <option>História</option>
                                                            <option>Religião</option>
                                                            <option>Intuição</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof2" id="prof2">
                                                            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                break;
                                                case 11:
                                                    ?>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof1" id="prof1">
                                                            <option selected>ESCOLHA DUAS PROFICIÊNCIA EM PERÍCIA</option>
                                                            <option>Atletismo</option>
                                                            <option>Religião</option>
                                                            <option>Intuição</option>
                                                            <option>Medicina</option>
                                                            <option>Intimidação</option>
                                                            <option>Persuasão</option>  
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 inputContato1 mt-5">
                                                        <select name="prof2" id="prof2">
                                                            <option selected>ESCOLHA UMA PROFICIÊNCIA EM PERÍCIA</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                break;
                                        }
                                        ?>
                                    
                                </div>
                                <button type="submit" class="btnContato mt-5" id="btn1">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script>
    $('#prof1').on('change', function() {
        let prof1 = $('#prof1').val();
        
        $.ajax({
            url:'resultado_prof1.php',
            type: 'POST',
            data: {codigo:prof1},
            success: function(data){
                $('#prof2').html(data);
            },
            error: function(data){
                $('prof2').html('Houve um erro ao carregar');
            }
        })
    });

    $('#prof2').on('change', function() {
        let prof1 = $('#prof1').val();
        let prof2 = $('#prof2').val();
        
        $.ajax({
            url:'resultado_prof2.php',
            type: 'POST',
            data: {codigo:prof2, cd:prof1},
            success: function(data){
                $('#prof3').html(data);
            },
            error: function(data){
                $('prof3').html('Houve um erro ao carregar');
            }
        })
    });
</script>
 <!-- Footer --> 
 <?php
    include_once "includes/footer.php";

?>        
    </body>
</html>
<?php
}