<?php
    require_once '../includes/db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href="style.css">
    <title>Login</title>
    <Link rel="icon" href="../imgs/logo/logo_icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 px-0">
                <img src='../imgs/banner/bannerDragon.png' alt="imagem da tela de cadastro"class="loginBanner" >
                </div>
     <div class="col-lg-5 login">
                <?php
                if(isset($_POST['email'], $_POST['senha'])){
                    if(!empty($_POST['email'] && $_POST['senha'])){
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $query = $conn->prepare("SELECT * FROM TB_USUARIO WHERE DS_EMAIL = :email");
                        $query->bindParam("email", $email, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        if($result){
                                if(password_verify($senha, $result['NM_SENHA'])){
                                    session_start();
                                    $_SESSION['usuario'] = $result['NM_USUARIO'];
                                    $_SESSION['codigo'] = $result['CD_USUARIO'];
                                    $_SESSION['logged'] = True;
                                    echo $_SESSION['codigo'];
                                    header('Location: ../selecionar.php');
                                }else{
                                    ?>
                                    <div class="container verificacao">
                                        <p>Usuário ou senha incorretos </p>
                                    </div>
                                    <?php
                                }
                            
                        }else{
                            ?>
                            <div class="container verificacao">
                                <p>Usuário ou senha incorretos</p>
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
                        <label>E-mail:</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="email" placeholder="e-mail" type="email"></input>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-4 mt-5'>
                        <label>Senha:</label>
                    </div>
                    <div class='col-lg-6 mt-5'>
                        <input name="senha" placeholder="senha" type="password"></input>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger mt-5">Enviar</button>
             </form>
            </div>
             <div class="col-lg-12 mt-3 p-0">
                 <p>Esqueceu a senha?</p>
                 <a href="cadastro.php">Ainda não tem uma conta? Cadastre-se</a>
             </div>    
        </div>
      </div>   
    </div>     
    </section> 
</body>
</html>           
           
           
            
