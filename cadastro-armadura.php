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
                        <h2 style="color: #000;">Armadura</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='includes/validacao/ficha-armadura.php' method="POST">
                                <div class="row">
                                    <div class="col-lg-6 inputContato1">
                                        <input type="text" name="nome" id="nome" required placeholder="Nome:" maxlength="100">
                                    </div>
                                     <div class="col-lg-6  inputContato1">
                                        <input type="text" name="descricao" placeholder="Descrição:">   
                                    </div>
                                    <div class="col-lg-6 inputContato1 mt-5">
                                        <input type="number" name="peca_cobre" required placeholder="Peças de cobre">
                                    </div>
                                     <div class="col-lg-6 inputContato1 mt-5" >
                                        <input type="number" name="peca_prata" required placeholder="Peças de prata">
                                    </div>
                                    <div class="col-lg-6 inputContato1 mt-5">
                                        <input type="number" name="peca_ouro" required placeholder="Peças de ouro">
                                    </div>
                                      <div class="col-lg-6 inputContato1 mt-5">
                                        <input type="number" name="peso" required placeholder="peso">
                                    </div>  
                                    <div class="col-lg-6 inputContato1 mt-5">
                                        <input type="number" name="defesa" required placeholder="Defesa da armadura">
                                    </div>  
                                    <div class="col-lg-6 inputContato1 mt-5">
                                        <input type="number" name="requisito_minimo" placeholder="Requisito mínimo para utilização">
                                    </div>  
                                    <div class="col-lg-6 inputContato1 mt-5">
                                        <select name="tipo_armadura">
                                            <option selected>
                                                Selecione o tipo de armadura...
                                            </option>
                                            <?php
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_TIPO,NM_TIPO FROM TB_TIPO WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            $dados = " ";
                                            $comandoSQL = "SELECT NM_TIPO, CD_TIPO FROM TB_TIPO WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                    <div class="col-lg-6 inputContato1 mt-5 mb-3">
                                        <select name="tipo_furtividade">
                                            <option selected>
                                                Selecione o tipo de furtividade...
                                            </option>
                                            <?php
                                            $dados = " ";
                                            $comandoSQL = "SELECT CD_FURTIVIDADE, NM_FURTIVIDADE FROM TB_FURTIVIDADE;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                    <button type="submit" class="btnContato">Enviar</button>
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