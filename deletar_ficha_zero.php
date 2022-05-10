<?php
    session_start();
    if(!$_SESSION['logged']){
        header("Location: cadastro/login.php");
    }else{
    include_once "includes/header.php";
    include_once "includes/db/dbConnection.php";
    include_once "includes/navbar-logado.php";
    include_once "includes/carrossel.php";

    $usuario = $_SESSION['usuario'];
$comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $cd_usuario = $dado[0];
}
$dados = " ";

if(isset($_POST['tamanho_excluir'])){
    $cd_tamanho = $_POST['tamanho_excluir'];
    $comandoSQL = "DELETE FROM TB_TAMANHO WHERE CD_TAMANHO = $cd_tamanho;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

if(isset($_POST['idioma_excluir'])){
    $cd_idioma = $_POST['idioma_excluir'];
    $comandoSQL = "DELETE FROM TB_IDIOMA WHERE CD_IDIOMA = $cd_idioma;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

if(isset($_POST['cabelo_excluir'])){
    $cd_cabelo = $_POST['cabelo_excluir'];
    $comandoSQL = "DELETE FROM TB_CABELO WHERE CD_CABELO = $cd_cabelo;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

if(isset($_POST['categoria_excluir'])){
    $cd_categoria = $_POST['categoria_excluir'];
    $comandoSQL = "DELETE FROM TB_CATEGORIA WHERE CD_CATEGORIA = $cd_categoria;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

if(isset($_POST['visao_excluir'])){
    $cd_visao = $_POST['visao_excluir'];
    $comandoSQL = "DELETE FROM TB_VISAO WHERE CD_VISAO = $cd_visao;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}


if(isset($_POST['tendencia_excluir'])){
    $cd_tendencia = $_POST['tendencia_excluir'];
    $comandoSQL = "DELETE FROM TB_TENDENCIA WHERE CD_TENDENCIA = $cd_tendencia;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

if(isset($_POST['nivel_excluir'])){
    $cd_nivel = $_POST['nivel_excluir'];
    $comandoSQL = "DELETE FROM TB_NIVEL WHERE CD_NIVEL = $cd_nivel;";
    $dados = $conn->query($comandoSQL);
    $dados = " ";
}

?>

    <body class="scroll">
        <!-- Banner -->
           <section id="valores" class="mb-5 mt-5">
               <h2 style="color: #000; text-align: center;">Deletar</h2>
            <div class="valoresTxt container" style="border: 1px solid #8a0808;padding: 20px; background: #fff;">
                <div class="row">
                    <div class="col-lg-4">
                        <!--dano-->
                        
                        <div id="tamanho" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tamanho">
                                    Tamanho <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php
                                           $comandoSQL = "SELECT * FROM TB_TAMANHO WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <p><?php echo $dado[2];?></p>
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Espaço</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                <p><?php echo $dado[3];?></p>
                                          </div> 
                                           <div class="inputTitulo col-8">
                                              <h5>Alcance</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                           
                                                <p><?php echo $dado[4];?></p>
                                             
                                            </div>
                                            <a href="#janela" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janela">
                                                    <h4>Tamanho: <?php echo $dado[2];?></h4>
                                                    <h5>Espaço: <?php echo $dado[3];?></h5>
                                                    <h5>Alcance: <?php echo $dado[4];?></h5>
                                                    <p>Deseja excluir o tamanho?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="tamanho_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <?php
                                            }
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="idioma" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#idioma">
                                    Idioma <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row"><?php
                                           $comandoSQL = "SELECT * FROM TB_IDIOMA WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>

                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[2];?></p>
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Escrita</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[3];?></p>
                                            </div> 
                                            <a href="#janela" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janela">
                                                    <h4>Idioma: <?php echo $dado[2];?></h4>
                                                    <h5>Escrita: <?php echo $dado[3];?></h5>
                                                    <p>Deseja excluir o idioma?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="idioma_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <?php
                                            }
                                            $dados = " ";
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="cabelo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#cabelo">
                                    Cabelo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php
                                           $comandoSQL = "SELECT * FROM TB_CABELO WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[2];?></p>
                                            </div> 
                                            <a href="#janelaCabelo" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janelaCabelo">
                                                    <h4>Cabelo: <?php echo $dado[2];?></h4>
                                                    <p>Deseja excluir o cabelo?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="cabelo_excluir" style="display: none">
                                                        <button type="submit" class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <?php
                                            }
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="categoria" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#categoria">
                                    Categoria <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php 
                                           $comandoSQL = "SELECT * FROM TB_CATEGORIA WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <p><?php echo $dado[2];?></p>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[3];?></p>
                                            </div> 
                                            <a href="#janelaCategoria" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janelaCategoria">
                                                    <h4>Categoria: <?php echo $dado[2];?></h4>
                                                    <p>Deseja excluir a categoria?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="categoria_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <?php
                                            }
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="classe" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#classe">
                                    Classe <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_classe" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="dado_classe">
                                                    <option selected>
                                                     Selecione o tipo de dado...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_DADO, NM_DADO FROM TB_DADO;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Pontos de vida</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="pvVida_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>DEF Natural</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="defNatural_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Riqueza inicial</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="riqueza_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="equipamento_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profEquipamento_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Ferramentas</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profFerramentas_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Resistencias</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profResistencias_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Pericia</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="pericia_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_classe" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        
                        <div id="antecedente" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#antecedente">
                                    Antecedente <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Personalidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="personalidade_antecedente" placeholder="">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Ideal</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="ideal_antecedente" placeholder="">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Vínculo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="vinculo_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Defeito</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="defeito_antecedente" placeholder="">
                                            </div>   
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências perícias</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="pericias_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências ferramentas</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="ferramentas_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="equipamento_antecedente" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        
                        <div id="visao" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#visao">
                                    Visão <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php
                                           $comandoSQL = "SELECT * FROM TB_VISAO WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <p><?php echo $dado[2];?></p>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[3];?></p>
                                            </div> 
                                            <a href="#janelaVisao" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janelaVisao">
                                                    <h4>Visão: <?php echo $dado[2];?></h4>
                                                    <p>Deseja excluir a visão?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="visao_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <hr>
                                            <?php
                                            }
                                            $dados = " ";
                                            ?>
                                            
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="tendencia" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tendencia">
                                    Tendência <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php
                                           $comandoSQL = "SELECT * FROM TB_TENDENCIA WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[2];?></p>
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[3];?></p>
                                          </div> 
                                          <a href="#janelaTendencia" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janelaTendencia">
                                                    <h4>Tendência: <?php echo $dado[2];?></h4>
                                                    <p>Deseja excluir a tendência?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="tendencia_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                    <button class="btn btn-danger" id="nao">NÃO</button>
                                                </div>
                                            </section>
                                            <hr>
                                            <?php
                                            }
                                            $dados = " ";
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="nivel" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#nivel">
                                    Nível <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <?php
                                           $comandoSQL = "SELECT * FROM TB_NIVEL WHERE CD_USUARIO = $cd_usuario;";
                                           $dados = $conn->query($comandoSQL);
                                           foreach($dados as $dado){
                                           ?>
                                           <div class="inputTitulo col-8">
                                              <h5>Nível</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[1];?></p>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Experiência mínima</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[2];?></p>
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Bônus de proficiência</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                <p><?php echo $dado[3];?></p>
                                            </div> 
                                            <a href="#janelaNivel" rel="Modal"><button class="btn btn-danger">EXCLUIR</button></a>
                                            <section>                                       
                                                <div class="windows" id="janelaNivel">
                                                    <h4>Nível: <?php echo $dado[1];?></h4>
                                                    <h5>Experiência mínima: <?php echo $dado[2];?></h5>
                                                    <p>Deseja excluir o nível?</p>
                                                    <form method="POST">
                                                        <input value="<?php echo $dado[1];?>" name="nivel_excluir" style="display: none">
                                                        <button class="btn btn-success">SIM</button>
                                                    </form>
                                                </div>
                                                <div id="mascara1">

                                                </div>
                                            </section>
                                            <hr>
                                            <?php
                                            }
                                            $dados = " ";
                                            ?>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="grupo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#grupo">
                                    Grupo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_grupo" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_grupo" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="raca" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#raca">
                                    Raça <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_raca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Características</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="caracteristica_raca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="visao_raca">
                                                    <option selected>
                                                     Selecione o tipo de visão...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_VISAO, NM_VISAO FROM TB_VISAO WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_VISAO, CD_VISAO FROM TB_VISAO WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="col-lg-12 inputContato1">
                                                <select name="tamanho_raca">
                                                    <option selected>
                                                     Selecione o tipo de tamanho...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_TAMANHO, NM_TAMANHO FROM TB_TAMANHO WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_TAMANHO, CD_TAMANHO FROM TB_TAMANHO WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="inputTitulo col-8">
                                              <h5>Deslocamento</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="deslocamento_raca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="idioma1_raca">
                                                    <option selected>
                                                     Selecione o 1° idioma...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_IDIOMA, NM_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_IDIOMA, CD_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="col-lg-12 inputContato1">
                                                <select name="idioma2_raca">
                                                    <option selected>
                                                     Selecione o 2° idioma...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_IDIOMA, NM_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_IDIOMA, CD_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="proficiencia_raca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_raca" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        
                        <div id="olho" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#olho">
                                    Olho <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_olho" placeholder="">
                                            </div> 
                                          
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="pele" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#pele">
                                    Pele <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_pele" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="tipo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tipo">
                                    Tipo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_tipo" placeholder="">
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_tipo" placeholder="">
                                          </div> 
                                          <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="dano" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#dano">
                                    Dano <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_dano" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="subraca" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#subraca">
                                    Sub-Raça <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_subraca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Características</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="caracteristica_subraca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="raca_subraca">
                                                    <option selected>
                                                     Selecione a raça...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_RACA, NM_RACA FROM TB_RACA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT CD_RACA, NM_RACA FROM TB_RACA WHERE CD_USUARIO = $cd_usuario;";
                                            
                                            $dados = $conn->query($comandoSQL);
                                            $count = $dados->rowCount();
                                            if($count > 0){
                                                foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[0]?>><?php echo $dado[1];?></option>
                                                <?php
                                                }  
                                            }
                                            $dados = " ";
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="proficiencia_subraca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_subraca" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
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
        <script>
            $(document).ready(function(){
                $("a[rel=modal]").click(function(ev){
                    ev.preventDefault();

                    let id = $(this).attr("href");

                    let alturaTela = $(document).height();
                    let larguraTela = $(window).width();
                
                    $(id).css({"height": alturaTela/6, "width": larguraTela/4});
                    $(id).show();

                    $("#mascara1").css({"width": larguraTela, "height":alturaTela});
                });

                $("#nao").click(function(){
                    $('.windows').fadeOut(1000, "linear");
                });

                $("#mascara").click(function(){
                    $(this).fadeOut("slow");
                    $('.windows').fadeOut("slow");
                });

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