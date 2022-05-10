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
                        <h2 style="color: #000;">Arma</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='includes/validacao/ficha-arma.php' method="POST">
                                <div class="row">
                                    <div class="col-lg-4 inputContato1">
                                        <input type="text" name="nome" id="nome" required placeholder="Nome:" maxlength="100">
                                    </div>
                                     <div class="col-lg-4  inputContato1">
                                        <input type="text" name="descricao" placeholder="Descrição:">   
                                    </div>
                                    <div class="col-lg-4 inputContato1 ">
                                        <input type="number" name="peca_cobre" required placeholder="Peças de cobre">
                                    </div>
                                     <div class="col-lg-4 inputContato1 mt-5" >
                                        <input type="number" name="peca_prata" required placeholder="Peças de prata">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="peca_ouro" required placeholder="Peças de ouro">
                                    </div>
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="peso" required placeholder="peso">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="qtd_maos" required placeholder="Quantidade de mãos">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="qtd_dados" placeholder="Quantidade de dados">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="text" name="propriedade" placeholder="Propriedade">
                                    </div> 
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tipo_arma">
                                            <option selected>
                                                Selecione o tipo de arma...
                                            </option>
                                            <?php
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_GRUPO, NM_GRUPO FROM TB_GRUPO  WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_DANO, NM_DANO FROM TB_DANO WHERE CD_USUARIO = $cd_usuario;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tipo_dano">
                                            <option selected>
                                                Selecione o tipo de dano...
                                            </option>
                                            <?php
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_DANO, NM_DANO FROM TB_DANO WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_DANO, NM_DANO FROM TB_DANO WHERE CD_USUARIO = $cd_usuario;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tipo_dado">
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
                                    <button type="submit" class="btnContato mt-3">Enviar</button>
                            </form>
                </div>
            </div>
        </section>
 <!-- Footer --> 
 <?php
    include_once "includes/footer.php";
?>        
    </body>
</html>
<?php
}