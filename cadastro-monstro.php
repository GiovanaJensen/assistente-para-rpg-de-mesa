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

        if(isset($_POST['nivel']) < 0 || isset($_POST['experiencia']) < 0 || isset($_POST['tamanho'])  < 0 || isset($_POST['pv_vida']) < 0 || isset($_POST['armadura']) < 0 || isset($_POST['deslocamento']) < 0 || isset($_POST['forca']) < 0 || isset($_POST['mod_forca']) < 0 || isset($_POST['destreza']) < 0 || isset($_POST['mod_destreza']) < 0 || isset($_POST['constituicao']) < 0 || isset($_POST['mod_constituicao']) < 0 || isset($_POST['inteligencia']) < 0 || isset($_POST['mod_inteligencia']) < 0 || isset($_POST['sabedoria']) < 0 || isset($_POST['mod_sabedoria']) < 0 || isset($_POST['carisma']) < 0 || isset($_POST['mod_carisma']) < 0 ){
            echo "Não são permitidos valores negativos!";
        }else if(isset($_POST['nome'], $_POST['nivel'], $_POST['experiencia'], $_POST['tamanho'], $_POST['pv_vida'], $_POST['armadura'], $_POST['deslocamento'],  $_POST['forca'],$_POST['mod_forca'],$_POST['destreza'], $_POST['mod_destreza'],$_POST['constituicao'], $_POST['mod_constituicao'], $_POST['inteligencia'], $_POST['mod_inteligencia'], $_POST['sabedoria'], $_POST['mod_sabedoria'], $_POST['carisma'], $_POST['mod_carisma'])){
            $comandoSQL = "SELECT MAX(CD_MONSTRO)+1 FROM TB_MONSTRO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_monstro = $dado[0];
            }
            $dados = " ";
            $nome = $_POST['nome'];
            $nivel = $_POST['nivel'];
            $exp = $_POST['experiencia'];
            $tamanho = $_POST['tamanho'];
            $pv = $_POST['pv_vida'];
            $armadura = $_POST['armadura'];
            $deslocamento = $_POST['deslocamento'];
            $forca = $_POST['forca'];
            $mod_forca = $_POST['mod_forca'];
            $destreza = $_POST['destreza'];
            $mod_destreza = $_POST['mod_destreza'];
            $constituicao = $_POST['constituicao'];
            $mod_constituicao = $_POST['mod_constituicao'];
            $inteligencia = $_POST['inteligencia'];
            $mod_inteligencia = $_POST['mod_inteligencia'];
            $sabedoria = $_POST['sabedoria'];
            $mod_sabedoria = $_POST['mod_sabedoria'];
            $carisma = $_POST['carisma'];
            $mod_carisma = $_POST['mod_carisma'];

            if(!empty($_POST['tendencia'])){
                $tend = $_POST['tendencia'];
            }else{
                $tend = NULL;
            }

            $comandoSQL = "INSERT INTO TB_MONSTRO VALUES($cd_usuario, $cd_monstro, '$nome', $nivel, $exp, $tend, $tamanho, NULL, $pv, $armadura, $deslocamento, $forca,$mod_forca, $destreza, $mod_destreza, $constituicao, $mod_constituicao, $inteligencia, $mod_inteligencia, $sabedoria, $mod_sabedoria, $carisma, $mod_carisma, NULL, NULL);";
            $dados = $conn->query($comandoSQL);

            ?>
            <div class="container comprado">
                <h4>Monstro inserido com sucesso</h4>
            </div>
    
            <?php
        }
        ?>
        <!-- Banner -->
           <section id="contato-solovia" style="background: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 contato-titulo">
                        <h2 style="color: #000">Monstro</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='' method="POST">
                                <div class="row">
                                    <div class="col-lg-4 inputContato1">
                                        <input type="text" name="nome" id="nome" required placeholder="Nome:" maxlength="100">
                                    </div>
                                     <div class="col-lg-4  inputContato1">
                                        <input type="text" name="nivel" placeholder="Nível:">   
                                    </div>
                                    <div class="col-lg-4 inputContato1 ">
                                        <input type="number" name="experiencia" required placeholder="Experiência:">
                                    </div>
                                     <div class="col-lg-4 inputContato1 mt-5" >
                                     <select name="tendencia">
                                            <option selected value="1">Escolha a tendência</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_TENDENCIA AS 'TENDÊNCIA', CD_TENDENCIA
                                            FROM TB_TENDENCIA;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option  value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <select name="tamanho">
                                            <option selected value="1">Escolha o tamanho</option>
                                            <?php
                                            $comandoSQL = "SELECT NM_TAMANHO AS 'TENDÊNCIA', CD_TAMANHO
                                            FROM TB_TAMANHO WHERE CD_USUARIO IS NULL;";
                                            $dados = $conn->query($comandoSQL);
                                            foreach($dados as $dado){
                                                ?>
                                                <option  value=<?php echo $dado[1]?>><?php echo $dado[0];?></option>
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
                                      <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="pv_vida" required placeholder="Pontos de vida:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="armadura" required placeholder="Número da armadura:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="deslocamento" required placeholder="Número do deslocamento:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="forca" required placeholder="Força:">
                                    </div> 
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_forca" required placeholder="Modificador de força:">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="destreza" required placeholder="Destreza:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_destreza" required placeholder="Modificador de destreza:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="constituicao" required placeholder="Constituição:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_constituicao" required placeholder="Modificador de Constituição:">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="inteligencia" required placeholder="Inteligência:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_inteligencia" required placeholder="Modificador de inteligência:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="sabedoria" required placeholder="Sabedoria:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_sabedoria" required placeholder="Modificador de sabedoria:">
                                    </div>
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="carisma" required placeholder="Carisma:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="number" name="mod_carisma" required placeholder="Modificador de carisma:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5">
                                        <input type="text" name="ataque" placeholder="Ataque:">
                                    </div>  
                                    <div class="col-lg-4 inputContato1 mt-5 mb-5">
                                        <input type="text" name="habilidade" placeholder="Habilidade:">
                                    </div>
                                    <button type="submit" class="btnContato mt-5">Enviar</button>
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