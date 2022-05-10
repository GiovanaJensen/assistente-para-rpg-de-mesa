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

        $nome_usuario = $_SESSION['usuario'];
        $comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$nome_usuario';";
        $dados = $conn->query($comandoSQL);
        foreach($dados as $dado){
            $cd_usuario = $dado[0];
        }
        $dados = " ";
        ?>
        <!-- Banner -->
        <section id="personagem_ficha">
          <?php 

            $comandoSQL = " CALL SP_PERSONAGEM_USUARIO ('$nome_usuario');";
            $dados= $conn->query($comandoSQL);
          ?>
          <form  method="post">
          <label>Personagem: </label>
          <select class="combobox" name="nome_personagem">
            <option selected>Selecione o personagem..</option>
            <?php
            foreach($dados as $dado){
              ?>
              <option><?php echo $dado[0];?></option>
              <?php
            }
            ?>
          </select>
          <button>Buscar</button>
          </form>
          <a href="#janela" rel="Modal"><button class="ml-2">EXCLUIR</button></a>
            <div class="window" id="janela">
                <h4>Personagem: <?php echo $_POST['nome_personagem'];?></h4>
                <p>Deseja excluir o personagem?</p>
            <form method="POST">
                <input value="<?php echo $_POST['nome_personagem'];?>" name="personagem_excluir" style="display: none"> 
                <button class="btn btn-success">SIM</button>
            </form>
            </div>
            <div id="mascara">

            </div>
        </section>
        
        <?php
          $dados = " ";
          if(isset($_POST['nome_personagem'])){
            $nome_personagem = $_POST['nome_personagem'];
            $_SESSION['nome_personagem'] = $nome_personagem;
            $dados = " ";
          $comandoSQL = "SELECT CD_PERSONAGEM FROM TB_PERSONAGEM WHERE NM_PERSONAGEM = '$nome_personagem';";
          $dados = $conn->query($comandoSQL);
          foreach($dados as $dado){
            $cd_personagem = $dado[0];              
          }
            $_SESSION['cd_personagem'] = $cd_personagem;
          }
          ?>
          <?php
        if(isset($_POST['nome_personagem'])){
        ?>
        <section>
            
        </section>
        <?php
        }
        if(isset($_POST['personagem_excluir'])){
            $nome_excluir = $_POST['personagem_excluir'];
            $cd_personagem = $_SESSION['cd_personagem'];
            $comandoSQL = "DELETE FROM TB_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_APARENCIA WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_PERICIA WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_OPCAO_ATRIBUTO WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_ARSENAL WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_INVENTARIO WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
            $comandoSQL = "DELETE FROM TB_PERSONAGEM WHERE CD_PERSONAGEM = $cd_personagem";
            $dados = $conn->query($comandoSQL);
            $dados  = " ";
        }
        ?>
           <section id="valores" class="mb-5 mt-5">
            <div class="valoresTxt container" style="border: 1px solid #8a0808;padding: 20px; background: #fff;">
                <div class="row">
                    <div class="col-lg-4">
                        <form method="post" action="includes/validacao/ficha_personagem.php">
                        <div id="missao" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#missao">
                                    Status <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nivel</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_NIVEL_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="nivel"placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Exp</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                            $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_EXPERIENCIA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="exp" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="exp"placeholder="">
                                                    <?php
                                                }
                                                ?>
                                          </div> 
                                           <div class="inputTitulo col-8">
                                              <h5>Pontos de vida</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                            $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PV_TOTAL_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="pv_total"placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Pontos de vida atual</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                            $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PV_ATUAL_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="pv_atual" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="pv_atual"placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                              <div class="inputTitulo col-8">
                                              <h5>Defesa total</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                            $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_DEFESA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="def_total"placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <button class="btn btn-danger ml-3">Alterar</button>
                                    
                                        </div>   
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="visao" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#visao">Características 
                                    <b class="mais">+</b><b class="menos"></b>
                                </h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                            <div class="inputTitulo col-8">
                                              <h5>Raça</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                              <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RACA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <!--é fixo-->
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="raca" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Sub-Raça</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_SUB_RACA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="sub_raca" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Idioma 1</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_IDIOMA_PERSONAGEM1 ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="idioma1" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>   
                                            <div class="inputTitulo col-8">
                                              <h5>Idioma 2</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_IDIOMA_PERSONAGEM2 ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="idioma2" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Idade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_IDADE_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="idade" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="idade" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Gênero</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_SEXO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="genero" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PESO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="peso" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="peso" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Altura</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ALTURA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="altura" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="altura" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Cor dos olhos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_OLHO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="olho" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Cor da pele</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PELE_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                       <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="pele" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                              <h5>Cor do cabelo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_CABELO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="cabelo" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-12">
                                              <h5>Características</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_CARACTERISTICAS_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input name="caracteristicas" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="caracteristicas" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                 <button class="btn btn-danger ml-3">Alterar</button>
                                            </div>
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="valor" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#valor">Personalidade <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;">
                                    <!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                            <div class="inputTitulo col-8">
                                                <h5>Classe</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                 <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_CLASSE_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="classe" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                             <div class="inputTitulo col-12">
                                                <h5>Tendência</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <select name="tendencia">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "SELECT A.CD_TENDENCIA, A.NM_TENDENCIA FROM TB_TENDENCIA AS A
                                                    JOIN TB_PERSONAGEM AS B
                                                        ON A.CD_TENDENCIA = B.CD_TENDENCIA
                                                        WHERE CD_PERSONAGEM =  $cd_personagem;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option selected value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_TENDENCIA, NM_TENDENCIA FROM TB_TENDENCIA WHERE CD_USUARIO IS NULL OR CD_USUARIO = $cd_usuario;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    } 
                                                    $dados =  " ";
                                                }else{
                                                    ?>
                                                    <input type="text" name="tendencia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Antecedente</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ANTECEDENTE_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="antecedente" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-12">
                                                <h5>Biografia</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input name="biografia" placeholder=" ">
                                            </div>                    
                                            <button class="btn btn-danger ml-3">Alterar</button>                               
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div>  
                        <div id="habilidades" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#habilidades">
                                    Habilidades <b class="mais">+</b><b class="menos"></b></h5>
                                    <div class="conteudoHabilidades" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                             <div class="inputTitulo col-12">
                                                    <h5>Habilidade</h5>
                                                </div> 
                                                <div class="inputForm col-12">
                                                    <input type="text" name="habilidade" placeholder="  ">
                                                </div> 
                                                 <div class="inputTitulo col-8">
                                                    <h5>Força</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_FORCA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="forca" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="forca" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div>  
                                                <div class="inputTitulo col-8">
                                                    <h5>Destreza</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_DESTREZA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="destreza" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="destreza" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div>   
                                                <div class="inputTitulo col-8">
                                                    <h5>Constituição</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_CONSTITUICAO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="constituicao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="constituicao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div>     
                                                <div class="inputTitulo col-8">
                                                    <h5>Inteligência</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_INTELIGENCIA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="inteligencia" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="inteligencia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div>    
                                                <div class="inputTitulo col-8">
                                                    <h5>Sabedoria</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_SABEDORIA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="sabedoria" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="sabedoria" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div> 
                                                <div class="inputTitulo col-8">
                                                    <h5>Carisma</h5>
                                                </div> 
                                                <div class="inputForm col-4">
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_CARISMA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="carisma" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="carisma" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                                </div>           
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                    </div>
                    <!--aqui-->
                     <div class="col-lg-4">
                        <div id="resistencia" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#resistencia">Resistências 
                                    <b class="mais">+</b><b class="menos"></b>
                                </h5>
                                <div class="conteudoResistencia" style="display: none;"><!--conteudo-->
                                    <div class="row">
                                      <div class="inputTitulo col-8">
                                            <h5>Força</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_FORCA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_forca" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_forca" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div> 
                                         <div class="inputTitulo col-8">
                                            <h5>Destreza</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_DESTREZA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_destreza" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_destreza" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div>  
                                        <div class="inputTitulo col-8">
                                            <h5>Constituição</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_CONSTITUICAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_constituicao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_constituicao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div> 
                                        <div class="inputTitulo col-8">
                                            <h5>Inteligência</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_INTELIGENCIA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_inteligencia" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_inteligencia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div> 
                                        <div class="inputTitulo col-8">
                                            <h5>Sabedoria</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_SABEDORIA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_sabedoria" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_sabedoria" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div> 
                                        <div class="inputTitulo col-8">
                                            <h5>Carisma</h5>
                                        </div> 
                                        <div class="inputForm col-4">
                                        <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RES_CARISMA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="text" name="resistencia_carisma" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="resistencia_carisma" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                        </div> 
                                    </div> 
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="pericias" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#pericias">
                                    Proficiência <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoPericia" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                       <div class="inputTitulo col-8">
                                                <h5>Atletismo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                             $dados =  " ";
                                             if(isset($_POST['nome_personagem'])){
                                                 $comandoSQL = "CALL SP_PROF_ATLETISMO('$nome_personagem');";
                                                 $dados = $conn->query($comandoSQL);
                                                 foreach($dados as $dado){
                                                     if($dado[0] == "SIM"){
                                                         ?>
                                                         <p><?php echo $dado[0];?></p>
                                                         <?php
                                                     }else{
                                                     ?>
                                                     <input type="text" name="prof_atletismo" placeholder="<?php echo $dado[0]; ?>">
                                                     <?php
                                                 }}}
                                                else{
                                                    ?>
                                                    <input type="text" name="prof_atletismo" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                             <div class="inputTitulo col-8">
                                                <h5>Acrobacia</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                             $dados =  " ";
                                             if(isset($_POST['nome_personagem'])){
                                                 $comandoSQL = "CALL SP_PROF_ACROBACIA('$nome_personagem');";
                                                 $dados = $conn->query($comandoSQL);
                                                 foreach($dados as $dado){
                                                     if($dado[0] == "SIM"){
                                                         ?>
                                                         <p><?php echo $dado[0];?></p>
                                                         <?php
                                                     }else{
                                                     ?>
                                                     <input type="text" name="prof_acrobacia" placeholder="<?php echo $dado[0]; ?>">
                                                     <?php
                                                 }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="acrobacia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Furtividade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_FURTIVIDADE('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_furtividade" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_furtividade" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Prestidigitação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_PRESTIDIGITACAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_prestidigitacao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_prestidigitacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Arcanismo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_ARCANISMO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_arcanismo" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_arcanismo" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>História</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_HISTORIA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_historia" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_historia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Investigação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_INVESTIGACAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_investigacao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_investigacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Natureza</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_NATUREZA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_natureza" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_natureza" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Religião</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_RELIGIAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_religiao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_religiao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Adestrar</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_ADESTRAR('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_adestrar" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_adestrar" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Intuição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_INTUICAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_intuicao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_intuicao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Medicina</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_MEDICINA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_medicina" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_medicina" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Percepção</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_PERCEPCAO   ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_percepcao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_percepcao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Sobrevivência</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_SOBREVIVENCIA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_sobrevivencia" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_sobrevivencia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Atuação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_ATUACAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_atuacao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_atuacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Enganação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_ENGANACAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_enganacao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_enganacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Intimidação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_INTIMIDACAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_intimidacao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_intimidacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Persuasão</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PROF_PERSUASAO('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        if($dado[0] == "SIM"){
                                                            ?>
                                                            <p><?php echo $dado[0];?></p>
                                                            <?php
                                                        }else{
                                                        ?>
                                                        <input type="text" name="prof_persuasao" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }}
                                                }else{
                                                    ?>
                                                    <input type="text" name="prof_persuasao" placeholder="">
                                                    <?php
                                                }
                                                ?>  
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="proficiencia" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#proficiencia">
                                    Perícias <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoPericia" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                       <div class="inputTitulo col-8">
                                                <h5>Atletismo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ATLETISMO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="atletismo" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                             <div class="inputTitulo col-8">
                                                <h5>Acrobacia</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ACROBACIA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="acrobacia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Furtividade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_FURTIVIDADE ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="furtividade" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Prestidigitação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PRESTIDIGITACAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="prestidigitacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Arcanismo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ARCANISMO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="arcanismo" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>História</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_HISTORIA('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="historia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Investigação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_INVESTIGACAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="investigacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Natureza</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_NATUREZA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="natureza" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Religião</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_RELIGIAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="religiao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Adestrar</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ADESTRAR('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="adestrar" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Intuição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_INTUICAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="intuicao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Medicina</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_MEDICINA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="medicina" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Percepção</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PERCEPCAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="percepcao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Sobrevivência</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_SOBREVIVENCIA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="sobrevivencia" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Atuação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ATUACAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="atuacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Enganação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_ENGANACAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="enganacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>intimidação</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_INTIMIDACAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="intimidacao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Persuasão</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PERSUASAO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <p><?php echo $dado[0];?></p>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="text" name="persuasao" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="moedas" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#moedas">
                                    Moedas <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoPericia" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                          <div class="inputTitulo col-8">
                                                <h5>Peças de ouro</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_OURO_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="ouro" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="ouro" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div> 
                                             <div class="inputTitulo col-8">
                                                <h5>Peças de prata</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_PRATA_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="prata" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="prata" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Peças de cobre</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_COBRE_PERSONAGEM ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <input type="number" name="cobre" placeholder="<?php echo $dado[0]; ?>">
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <input type="number" name="cobre" placeholder="">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <button class="btn btn-danger ml-3">Alterar</button>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                    </div>
                    <!--aqui-->
                     <div class="col-lg-4">
                        
                        <div id="arsenal" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#arsenal">Arsenal 
                                    <b class="mais">+</b><b class="menos"></b>
                                </h5>
                                <div class="conteudoArsenal" style="display: none;"><!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                           <?php
                                           $dados =  " ";
                                           if(isset($_POST['nome_personagem'])){
                                            $comandoSQL = "CALL SP_MOSTRA_ARSENAL ('$nome_personagem');";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                           ?>
                                             <div class="inputTitulo col-8">
                                                <h5>Arma</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[1];?> ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[0];?> ">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[2];?> ">
                                            </div>
                                            <div class="inputTitulo col-12">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[3];?> ">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade de mãos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[4];?> ">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                                <h5>Dano</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[5];?> ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[6];?> ">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[7];?> ">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                                <h5>Propriedade</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[8];?> ">
                                            </div> 
                                            <hr>
                                            
                                            <?php
                                           }
                                           ?>
                                           <button class="mb-2"><a href="produtos.php">Comprar</a></button>
                                           <?php
                                        }else{
                                               ?>
                                               <div class="inputTitulo col-8">
                                                <h5>Arma</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade de mãos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Dano</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Propriedade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                               <?php
                                           }
                                            ?>
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="armadura" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#armadura">Armadura 
                                    <b class="mais">+</b><b class="menos"></b>
                                </h5>
                                <div class="conteudoArsenal" style="display: none;"><!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                             <div class="inputTitulo col-12">
                                                <h5>Armadura</h5>
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_MOSTRA_ARMADURA ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="armadura" placeholder="<?php echo $dado[0]; ?>">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="tipo_armadura" placeholder="<?php echo $dado[1]; ?>">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="descricao_armadura" placeholder="<?php echo $dado[2]; ?>">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Defesa</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="defesa_armadura" placeholder="<?php echo $dado[3]; ?>">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Furtividade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="furtividade_armadura" placeholder="<?php echo $dado[5]; ?>">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="peso_armadura" placeholder="<?php echo $dado[6]; ?>">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="valor_armadura" placeholder="<?php echo $dado[7]; ?>">
                                            </div> 
                                            <hr>
                                            <button class="mb-2"><a href="produtos.php">Comprar</a></button>
                                            <?php
                                            }
                                        }else{
                                            ?>
                                            <div class="inputForm col-4">
                                                <input type="text" name="armadura" placeholder="">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="tipo_armadura" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="descricao_armadura" placeholder="">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Defesa</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="defesa_armadura" placeholder="">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Furtividade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="furtividade_armadura" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="peso_armadura" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="valor_armadura" placeholder="">
                                            </div> 
                                            <?php
                                        }
                                        ?>
                                            
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="escudo" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#escudo">Escudo 
                                    <b class="mais">+</b><b class="menos"></b>
                                </h5>
                                <div class="conteudoArsenal" style="display: none;"><!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                             <div class="inputTitulo col-12">
                                                <h5>Escudo</h5>
                                                <?php
                                                $dados =  " ";
                                                if(isset($_POST['nome_personagem'])){
                                                    $comandoSQL = "CALL SP_MOSTRA_ESCUDO ('$nome_personagem');";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder="<?php echo $dado[0]; ?>">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[1]; ?>">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[2]; ?> ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Defesa</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[3]; ?> ">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[5]; ?>">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[6]; ?>">
                                            </div>
                                            <hr>
                                            <button class="mb-2"><a href="produtos.php">Comprar</a></button>
                                            <?php
                                            }
                                        }else{
                                            ?>
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Tipo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Defesa</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" ">
                                            </div>
                                            <?PHP
                                        }
                                            ?> 
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div> 
                        <div id="inventario" class="valores">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#inventario">Inventário <b class="mais">+</b><b class="menos">-</b></h5>
                                <div class="conteudoInventario" style="display: none;">
                                    <!--conteudo-->
                                    <div class="bloco2">
                                       <div class="row">
                                           <?php
                                           $dados =  " ";
                                           if(isset($_POST['nome_personagem'])){
                                            $comandoSQL = "CALL SP_MOSTRA_INVENTARIO ('$nome_personagem');";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                         <div class="inputTitulo col-8">
                                                <h5>Item</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[1];?> ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[0];?> ">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[2];?> ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder=" <?php echo $dado[3];?> ">
                                            </div>  
                                            <div class="inputTitulo col-12">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                <input type="text" name="" placeholder=" <?php echo $dado[4];?> ">
                                            </div> 
                                            <hr>
                                            
                                            <?php
                                            }
                                            ?>
                                            <button class="mb-2"><a href="produtos.php">Comprar</a></button>
                                            <?php
                                        }else{
                                                ?>
                                                <div class="inputTitulo col-8">
                                                <h5>Item</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Quantidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                                <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>
                                            <div class="inputTitulo col-8">
                                                <h5>Peso</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                                <h5>Valor</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <input type="text" name="" placeholder="  ">
                                            </div> 
                                            <?php
                                            }
                                            ?>
                                            <hr>
                                            
                                            </form>
                                        </div>
                                      </div>     
                                 </div><!--conteudo-->
                            </div>
                        </div>   
                    </div>
                 </div>  
            </div>
            <!--</form>-->
        </section>
              <!-- Footer --> 
        <script>
            $(document).ready(function(){
                $("a[rel=modal]").click(function(ev){
                    ev.preventDefault();

                    let id = $(this).attr("href");

                    let alturaTela = $(document).height();
                    let larguraTela = $(window).width();

                    $("#mascara").css({"width": larguraTela, "height":alturaTela});
                    $("#mascara").fadeIn(1000);
                    $("#mascara").fadeTo("slow", 0.8);

                    let left = ($(window).width() / 2) - ($(id).width() / 2);
                    let top = ($(window).height() / 2) - ($(id).height() / 2);
                    let height = ($(id).height() /3);
                
                    $(id).css({"left":left, "top":top, "height": height});
                    $(id).show();
                });

                $("#mascara").click(function(){
                    $(this).fadeOut("slow");
                    $('.window').fadeOut("slow");
                });

                $("#nao").click(function(){
                    $("#mascara").fadeOut(1000, "linear");
                    $('.window').fadeOut(1000, "linear");
                });
            });
        </script>

<?php
    include_once "includes/footer.php";
?>     
    </body>
</html>
<?php
}