<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href="style.css">
    <title>Cadastro</title>
    <Link rel="icon" href="../imgs/logo/logo_icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<?php
    require_once '../includes/db/dbConnection.php';
?>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 px-0">
                <img src='../imgs/banner/bannerDragon.png' alt="imagem da tela de cadastro"class="loginBanner" >
                </div>
     <div class="col-lg-5 login">
     <?php

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['confirma_senha'])){
    if(!empty(trim($_POST['nome']) && trim($_POST['email']) && trim($_POST['senha']) && trim($_POST['confirma_senha']))){
        if(trim($_POST['senha']) == trim($_POST['confirma_senha'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $select = "SELECT CD_USUARIO FROM TB_USUARIO WHERE DS_EMAIL = '$email';";
            $dados = $conn->query($select);
            $count = $dados->rowCount();
            if($count > 0){
                ?>
                <div class="container verificacao">
                    <p>E-mail já cadastrado</p>
                </div>
                <?php
            }else{
                $dados = " ";
                $comandoSQL = "SELECT MAX(CD_USUARIO)+1 FROM TB_USUARIO;";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                    $cd_usuario = $dado[0];
                }
                $dados = " ";
                $senha = $_POST['senha'];
                $password = password_hash($senha, PASSWORD_BCRYPT);
                $comandoSQL = "INSERT INTO TB_USUARIO(CD_USUARIO,NM_USUARIO, DS_EMAIL, NM_SENHA) VALUES (";
                $comandoSQL .= "$cd_usuario,'$nome', '$email', '$password');";
            

                try{
                    $dados = $conn->query($comandoSQL);
                    header("Location: login.php");
                }catch(PDOException $Exception){
                    ?>
                    <div class="container verificacao">
                        <p>Houve um problema no cadastro! Tente realiza-lo mais tarde</p>
                    </div>
                    <?php
                }
            }
        }else{
            ?>
            <div class="container verificacao">
                <p>As senhas não são iguais</p>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="container verificacao">
            <p>Há dados em branco</p>
        </div>
        <?php
    }
}
?>

      <div class="col-lg-6 offset-lg-6 offset-md-0 offset-sm-0">
        <img class="logo" src="../imgs/logo/solovialogo.png"> 
      </div>
      <div class="col-lg-6 offset-lg-6 offset-md-0 offset-sm-0">
     <div class=" inputs">
      <form method="post">
                <div class="row">
                    <div class='col-lg-4'>
                        <label>Nome:</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="nome" placeholder="nome" type="text"></input>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-4 mt-5'>
                        <label>E-mail:</label>
                    </div>
                    <div class='col-lg-6 mt-5'>
                        <input name="email" placeholder="e-mail" type="email"></input>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-4 mt-5'>
                        <label>Senha:</label>
                    </div>
                    <div class='col-lg-6 mt-5'>
                        <input name="senha" placeholder="senha" type="password">
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-4 mt-5'>
                        <label>Confirma a senha:</label>
                    </div>
                    <div class='col-lg-6 mt-5'>
                        <input name="confirma_senha" placeholder="senha" type="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger mt-5">Enviar</button>
             </form>
            </div>
             <div class="col-lg-12 mt-3 p-0">
                 <a href="login.php">Já possui uma conta? Faça login</a>
             </div>    
        </div>
      </div>   
    </div>     
    </section> 
</body>
</html>           
        