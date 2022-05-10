<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: cadastro/login.php");
}else{
include_once "includes/header.php";
require_once "includes/db/dbConnection.php";
?>
<body class="scroll">
  <?php
include_once "includes/navbar-logado.php";
?>

<div class="spac"></div>
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
            <div class="col-lg-12" style="text-align: center; size: 50px;">
                <h2 data-aos="zoom-in-up" data-aos-delay="100 " class="mt-5 mb-5">
                 DIÁRIO DE AVENTURA
                </h2>
            </div>
<section style='display: flex; justify-content: center; align-items:Center;'>
              <form  method="post" action="includes/aventura_naoCriada.php">
                <label>Nome da aventura:</label>
                <input type="text" name="nome_aventura">
                <label>Data:</label>
                <input type="date" name="data_aventura">
          </section>
            <?php
          
          ?>
            
            <div class="container"> 
              <div class="row">
                <div class="col-lg-12 diario">
             
                <textarea name="mensagem" style="border: solid #8A0808;"></textarea>
              </div>
              </div>
              
            </div>
            
            <section id="cursos">

           <div class="container">

              <div class="row mx-auto">
  
              </div>
              <button type="submit" class="btnContato mt-5 mb-5" id="btn1">Enviar</button>
          
              </form>
        </section>


       

   
    <!-- Footer --> 
    <footer id="footer">
          <!-- Grid container -->
          <div class="container-fluid">
            <!--Grid row-->
            <div class="row " >
              <!--Grid column-->
              <div class="col-lg-2 col-md-12 col-sm-12 mx-auto">

                <div id="logoFooter" class="footerm1">
                 <img src="imgs/logo/solovialogo.png" alt="logo" >

                </div>
                
              </div>
         
                  </div>
                  <!--Grid column-->

                </div>
                <!--Grid row-->
              </div>
              <!-- Grid container -->          
                    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>   
                    <script src="js/jquery/jquery-2.2.4.min.js"></script>
                    <script src="js/popper.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/plugins.js"></script>
                    <script src="js/owl.carousel.min.js"></script>
                    <script src="js/instagramfeed.js"></script>
                    <script src="js/function.js"></script>            
    </footer>
          <!-- Footer -->  
          <div id="copyr">
            <div class="container">
                <div class="row ">
                    <div class="copy col-12 ">
                        <p>Direitos Autorais © </p>
                    </div>
                </div>
            </div>
         </div>      
    </body>
</html>
<?php
}