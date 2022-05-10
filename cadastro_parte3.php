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
                            <form action='includes/validacao/ficha_parte3.php' method="POST">
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
                                                  if($subraca[2] == NULL){
                                                    ?>
                                                    <option selected value="NULL">NÃO POSSUI SUB-RAÇA</option>
                                                    <?php  
                                                  }
                                                  ?>
                                                  <option value="<?php echo $subraca[0];?>">
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
                                            $comandoSQL = "SELECT CD_PELE, NM_PELE FROM TB_PELE WHERE CD_USUARIO IS NULL;";
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

                                            $comandoSQL = "SELECT CD_CABELO, NM_CABELO FROM TB_CABELO WHERE CD_USUARIO IS NULL;";
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
                                       <select name="opcao_atributo">
                                           <?php
                                           $opcao = $_SESSION['opcao_atributo'];
                                           ?>
                                           <option selected><?php echo $opcao;?></option>
                                       </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="forca" id="forca">
                                            <option selected>Selecione o atributo de força</option>
                                            <?php
                                                $comandoSQL = "SELECT * FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem;";
                                                $dados = $conn->query($comandoSQL);
                                                foreach($dados as $dado){
                                                    ?>
                                                    <option><?php echo $dado[1];?></option>
                                                    <option><?php echo $dado[2];?></option>
                                                    <option><?php echo $dado[3];?></option>
                                                    <option><?php echo $dado[4];?></option>
                                                    <option><?php echo $dado[5];?></option>
                                                    <option><?php echo $dado[6];?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="destreza" id="destreza">
                                            <option selected>Selecione o atributo de destreza</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="constituicao" id="constituicao">
                                            <option selected>Selecione o atributo de constituição</option>
                                        
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="inteligencia" id="inteligencia">
                                            <option selected>Selecione o atributo de inteligência</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="sabedoria" id="sabedoria">
                                            <option selected>Selecione o atributo de sabedoria</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="carisma" id="carisma">
                                            <option selected>Selecione o atributo de carisma</option>
                                        </select>
                                    </div>
                                    <?php
                                    $dados = " ";
                                    $comandoSQL = "SELECT CD_RACA FROM TB_APARENCIA WHERE CD_PERSONAGEM = $cd_personagem;";
                                    $dados = $conn->query($comandoSQL);
                                    foreach($dados as $dado){
                                        $raca = $dado[0];
                                    }
                                    if($raca == 7){ 
                                    ?>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="combobox1" id="combobox1">
                                            <option selected>Selecione um atributo para receber +1</option>
                                            <option value="F">Força</option>
                                            <option value="D">Destreza</option>
                                            <option value="C">Constituição</option>
                                            <option value="I">Inteligência</option>
                                            <option value="S">Sabedoria</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                    <select name="combobox2" id="combobox2">
                                            <option selected>Selecione um atributo para receber +1</option>
                                        </select>
                                    </div>
                                    <?php
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
$('#forca').on('change', function() {
        let forca = $('#forca').val();
        
        $.ajax({
            url:'resultado_forca.php',
            type: 'POST',
            data: {codigo:forca},
            success: function(data){
                $('#destreza').html(data);
            },
            error: function(data){
                $('#destreza').html('Houve um erro ao carregar');
            }
        })
    });

    $('#destreza').on('change', function() {
        let destreza = $('#destreza').val();
        let forca = $('#forca').val();
        
        $.ajax({
            url:'resultado_destreza.php',
            type: 'POST',
            data: {codigo:destreza, cd: forca},
            success: function(data){
                $('#constituicao').html(data);
            },
            error: function(data){
                $('#constituicao').html('Houve um erro ao carregar');
            }
        })
    });

    $('#constituicao').on('change', function() {
        let destreza = $('#destreza').val();
        let forca = $('#forca').val();
        let constituicao = $('#constituicao').val();
        
        $.ajax({
            url:'resultado_constituicao.php',
            type: 'POST',
            data: {forca: forca, destreza: destreza, constituicao: constituicao},
            success: function(data){
                $('#inteligencia').html(data);
            },
            error: function(data){
                $('#inteligencia').html('Houve um erro ao carregar');
            }
        })
    });

    $('#inteligencia').on('change', function() {
        let destreza = $('#destreza').val();
        let forca = $('#forca').val();
        let constituicao = $('#constituicao').val();
        let inteligencia = $('#inteligencia').val();
        
        $.ajax({
            url:'resultado_inteligencia.php',
            type: 'POST',
            data: {forca: forca, destreza: destreza, constituicao: constituicao, inteligencia: inteligencia},
            success: function(data){
                $('#sabedoria').html(data);
            },
            error: function(data){
                $('#sabedoria').html('Houve um erro ao carregar');
            }
        })
    });

    $('#sabedoria').on('change', function() {
        let destreza = $('#destreza').val();
        let forca = $('#forca').val();
        let constituicao = $('#constituicao').val();
        let inteligencia = $('#inteligencia').val();
        let sabedoria = $('#sabedoria').val();
        
        $.ajax({
            url:'resultado_sabedoria.php',
            type: 'POST',
            data: {forca: forca, destreza: destreza, constituicao: constituicao, inteligencia: inteligencia, sabedoria:sabedoria},
            success: function(data){
                $('#carisma').html(data);
            },
            error: function(data){
                $('#carisma').html('Houve um erro ao carregar');
            }
        })
    });

    $('#combobox1').on('change', function() {
        let atributo = $('#combobox1').val();
        
        $.ajax({
            url:'resultado_atributo.php',
            type: 'POST',
            data: {atributo: atributo},
            success: function(data){
                $('#combobox2').html(data);
            },
            error: function(data){
                $('#combobox2').html('Houve um erro ao carregar');
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