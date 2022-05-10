<?php
    include_once "includes/header.php";
?>

    <body class="scroll">
        <?php
        include_once "includes/navbar.php";
        ?>
         <!-- Banner -->
            <section id="banner" class="owl-carousel">

                <div class="item">
                    <a href="#">
                        <img src="imgs/banner/bgblack.png" class="fundo">
                        
                        <div class="bannertxt container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                         <h3 class="title wrapper" data-aos="fade-up"data-aos-anchor-placement="top-bottom" data-aos-delay="350">
                                           Dynamics
                                        </h3>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </a>
                </div>
            </section>
<!-- Banner -->
<section id="comecar">
           <div class="container">
                <div class="col-lg-12">
                    <h2 data-aos="zoom-in-up" data-aos-delay="100">Como começar</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-1 col-sm-1 " data-aos="flip-left" data-aos-delay="300">
                        <div class="cardsComo">
                            <img src="imgs/icons/dado-1.png"> 
                           <h3>Cadastrar</h3>
                           <p>Crie sua conta de forma rápida e segura e comece agora a trilhar suas aventuras.</p>    
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-1 col-sm-1" data-aos="flip-left" data-aos-delay="600">
                        <div class="cardsComo">
                            <img src="imgs/icons/dado-2.png"> 
                           <h3>Tutorial</h3>
                           <p>Tenha acesso ao guia completo de utilização da plataforma e aproveite.</p>    
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-1 col-sm-1 " data-aos="flip-left" data-aos-delay="900">
                        <div class="cardsComo">
                            <img src="imgs/icons/dado-3.png"> 
                           <h3>Crie sua ficha</h3>
                           <p>Crie e gerencie suas fichas de forma simples com nosso catálogo de itens oficiais.</p>    
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-1 col-sm-1 " data-aos="flip-left" data-aos-delay="1200">
                        <div class="cardsComo">
                            <img src="imgs/icons/dado-5.png"> 
                           <h3>Divirta-se!</h3>
                           <p>Após a criação basta se aventurar sem a preocupação de perder sua evolução.</p>    
                        </div>
                    </div>
                </div>
                <div class="btnCrie">
                   
                    <a href="cadastro/cadastro.php"><button >Crie Conta Gratuita</button></a>
                 
                </div>
           </div>
       </section>

       <section id="infos">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-6 ">
                  <img src="imgs/banner/dragonbg.png" class="descubraImg">
                </div>
                  <div class="col-lg-5">
                    <div class="descubra-bg">
                        <div class="descubra">
                           <h3>Descubra um novo jeito de jogar RPG</h3>
                        <p>Mantendo a essência de jogar uma aventura de forma presencial mas inutilizando o uso de papel, oferecemos uma plataforma para que todos jogadores possam criar, armazenar e transportar sua fichas de forma digital evitando rasuras, percas e gastos com papeis com a possibilidade de acessar estas informações quando e onde quiser.</p> 
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>    
       </section>
       <section id="diagramaDY">
        <div class="container">
            <div class="row align-items-center">
                  <div class="col-lg-5">
                    <div class="descubra-bg">
                        <div class="descubra">
                           <h3 style="color:#fff;">Junte seus amigos e embarque em uma aventura da sua escolha!</h3>
                        <p style="color:#fff;">Reuna-se com seu grupo, definam qual sistema será jogado e tenham acesso a diversos itens oficiais para agilizar a criação de sua ficha.</p> 
                        </div>
                         
                    </div>
                </div>
                 <div class="col-lg-6 offset-lg-1">
                  <img src="imgs/banner/DiagramaSITETCC.png" class="diagrama">
                </div>
            </div>
        </div>    
       </section>
            <div class="col-lg-12" style="text-align: center; size: 50px;">
                        <h2 data-aos="zoom-in-up" data-aos-delay="100 " class="mt-5 mb-5">
                         Jogue com os sistemas mais famosos ou crie o seu próprio!
                        </h2>
            </div>

       <section id="jogos" class="owl-carousel">
                <div class="item">
                    <img  src="imgs/icons/d&d.png" class="img-fluid"> 
                </div> 
                <div class="item">
                    <img  src="imgs/icons/path.png"> 
                </div> 
                  <div class="item">
                    <img  src="imgs/icons/call-of-cthulhu.png"> 
                </div>
                <div class="item">
                    <img  src="imgs/icons/burn-bryte2.png"> 
                </div>
                <div class="item">
                    <img  src="imgs/icons/13-age.png"> 
                </div>
                 <div class="item">
                    <img  src="imgs/icons/kids-on-bikes.png"> 
                </div>
                 <div class="item">
                    <img  src="imgs/icons/cypher-system.png"> 
                </div>
                 <div class="item">
                    <img  src="imgs/icons/dungeon-world.png"> 
                </div>
                <div class="item">
                    <img  src="imgs/icons/fate.png"> 
                </div>
       </section>
   

        <!-- Footer --> 
<?php
    include_once "includes/footer.php";
?>    
    </body>

</html>