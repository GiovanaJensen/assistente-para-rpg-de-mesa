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

        $usuario = $_SESSION['usuario'];
        $comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
        $dados = $conn->query($comandoSQL);
        foreach($dados as $dado){
            $cd_usuario = $dado[0];
        }
        $dados = " ";
        ?>
        <!-- Banner -->
           <section id="contato-solovia" style="background: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 contato-titulo">
                        <h2 style="color:#000;">Personagem</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='includes/validacao/ficha.php' method="POST">
                                <div class="row">
                                    <div class="col-lg-4 inputContato1">
                                        <input type="text" name="nome" id="nome" required placeholder="Nome:" maxlength="100">
                                    </div>
                                     <div class="col-lg-4  inputContato1">
                                        <input type="number" name="nivel" required placeholder="Nivel:" maxlength="2">   
                                    </div>
                                    <div class="col-lg-4 inputContato1 ">
                                    <select name="raca" id="raca" >
                                            <option selected value="1">Escolha sua raça</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_RACA, CD_RACA
                                            FROM TB_RACA WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[1];?>"><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_RACA, CD_RACA FROM TB_RACA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                    <div class="col-lg-12 inputContato1" id="descreve_raca">

                                    </div>
                                     <div class="col-lg-4 inputContato1 mt-5" >
                                        <select name="classe" id="classe">
                                            <option selected value="1">Escolha sua classe</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_CLASSE AS 'CLASSE', CD_CLASSE
                                            FROM TB_CLASSE WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_CLASSE, CD_CLASSE FROM TB_CLASSE WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                    <div class="col-lg-12 inputContato1" id="descreve_classe">

                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tendencia">
                                            <option selected value="1">Escolha sua tendência</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_TENDENCIA AS 'TENDÊNCIA', CD_TENDENCIA
                                            FROM TB_TENDENCIA WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option  value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_TENDENCIA, CD_TENDENCIA FROM TB_TENDENCIA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="antecedente" id="antecedente">
                                            <option selected value="1">Escolha sua antecedente</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_ANTECEDENTE AS 'ANTECEDENTE', CD_ANTECEDENTE
                                            FROM TB_ANTECEDENTE WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $comandoSQL = "SELECT NM_ANTECEDENTE, CD_ANTECEDENTE FROM TB_ANTECEDENTE WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                    <div class="col-lg-12 inputContato1" id="descreve_antecedente">

                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="experiencia" placeholder="Experiência">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="idioma1">
                                            <option selected>Escolha seu 1º idioma</option>
                                            <option value='2'>COMUM</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5" >
                                        <select id="idioma1" name="idioma2">
                                            <option selected>Escolha seu 2ºidioma</option>
                                        </select>
                                    </div>  
                                     <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pecas_cobre" placeholder="Peça Cobre">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pecas_prata" placeholder="Peça Prata">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pecas_ouro" placeholder="Peça Ouro">
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pontos_vida" placeholder="Pontos de Vida ">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pontos_vida_total" placeholder="Pontos de vida total">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pontos_vida_atual" placeholder="Pontos de vida atual">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="armadura">
                                            <option selected>Escolha sua armadura</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_ARMADURA AS ARMADURA, CD_ARMADURA
                                            FROM TB_ARMADURA WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[1];?>"><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_ARMADURA, CD_ARMADURA FROM TB_ARMADURA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="escudo">
                                            <option selected>Escolha seu escudo</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_ESCUDO AS ESCUDO, CD_ESCUDO
                                            FROM TB_ESCUDO;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[1];?>"><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_ESCUDO, CD_ESCUDO FROM TB_ESCUDO WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                </div>
                                <button type="submit" class="btnContato mt-5" id="btn1">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
$('#raca').on('change', function() {
        let idioma1 = $('#raca').val();
        
        $.ajax({
            url:'resultado_idioma.php',
            type: 'POST',
            data: {codigo:idioma1},
            success: function(data){
                $('#idioma1').css({'display': "block"});
                $('#idioma1').html(data);
            },
            error: function(data){
                $('#idioma1').html('Houve um erro ao carregar');
            }
        })
    });

    $('#raca').on('change', function() {
        let raca = $('#raca').val();
        
        $.ajax({
            url:'descreve_raca.php',
            type: 'POST',
            data: {codigo:raca},
            success: function(data){
                $('#descreve_raca').css({'display': "block"});
                $('#descreve_raca').html(data);

            },
            error: function(data){
                $('#descreve_raca').html('Houve um erro ao carregar');
            }
        })
    });

    $('#classe').on('change', function() {
        let classe = $('#classe').val();
        
        $.ajax({
            url:'descreve_classe.php',
            type: 'POST',
            data: {codigo:classe},
            success: function(data){
                $('#descreve_classe').css({'display': "block"});
                $('#descreve_classe').html(data);

            },
            error: function(data){
                $('#descreve_classe').html('Houve um erro ao carregar');
            }
        })
    });

    $('#antecedente').on('change', function() {
        let antecedente = $('#antecedente').val();
        
        $.ajax({
            url:'descreve_antecedente.php',
            type: 'POST',
            data: {codigo:antecedente},
            success: function(data){
                $('#descreve_antecedente').css({'display': "block"});
                $('#descreve_antecedente').html(data);

            },
            error: function(data){
                $('#descreve_antecedente').html('Houve um erro ao carregar');
            }
        })
    });

</script>
 <?php
    include_once "includes/footer.php";

?>        
    </body>
</html>
<?php
}