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
        ?>
        <!-- Banner -->
           <section id="contato-solovia" style="background: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 contato-titulo">
                        <h2 style="color: #000;">Item</h2>
                    </div>
                    <div class="formContato col-lg-12">
                        <div class="contactForm">
                            <form action='includes/validacao/ficha-item.php' method="POST">
                                <div class="row">
                                    <div class="col-lg-4 inputContato1">
                                        <input type="text" name="nome" id="nome" required placeholder="Nome:" maxlength="100">
                                    </div>
                                     <div class="col-lg-4  inputContato1">
                                        <input type="text" name="descricao" placeholder="Descrição:" >   
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