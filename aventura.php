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
          <!-- Banner -->
          <?php
           $usuario = $_SESSION['usuario'];
           $comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
           $dados = $conn->query($comandoSQL);
           foreach($dados as $dado){
               $cd_usuario = $dado[0];
           }
           $dados = " ";
          $comandoSQL = "SELECT NM_AVENTURA FROM TB_AVENTURA WHERE CD_USUARIO =  $cd_usuario GROUP BY NM_AVENTURA;";
          $dados = $conn->query($comandoSQL);
          $count = $dados->rowCount();
          if($count > 0){
            ?>
            <section id="personagem_ficha" style="display: flex; justify-content: center;">
          <form  method="post">
          <label>Aventura: </label>
          <select class="combobox" name="nome_aventura">
            <option selected>Selecione a aventura..</option>
            <?php
            foreach($dados as $dado){
              ?>
              <option><?php echo $dado[0];?></option>
              <?php
            }
            ?>
          </select>
          <?php
          $dados = " ";
          $comandoSQL = "SELECT DT_AVENTURA FROM TB_AVENTURA WHERE CD_USUARIO =  $cd_usuario;";
          $dados = $conn->query($comandoSQL);
          ?>
          <select class="combobox" name="data_aventura">
            <option selected>Selecione a data..</option>
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
        </section>
        <form method="POST">
            <div class="container"> 
              <div class="row">
                <div class="col-lg-12 diario">
             <?php
             if(isset($_POST['nome_aventura'], $_POST['data_aventura'])){
                $nome = $_POST['nome_aventura'];
                $data = $_POST['data_aventura'];
                $_SESSION['nome_aventura'] = $nome;
                $_SESSION['data_aventura'] = $data;
                $comandoSQL = "SELECT DS_AVENTURA FROM TB_AVENTURA WHERE NM_AVENTURA = '$nome' AND DT_AVENTURA = '$data';";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                  ?>
                  <textarea name="mensagem" style="border: solid #8A0808;" placeholder="<?php echo $dado[0];?>"></textarea>
                  <button type="submit" class="btnContato mt-5 mb-5" id="btn1">Editar</button>
                  <?php
                $dados= ' ';
              }
            }
            if(isset($_POST['mensagem'])){
              $mensagem = $_POST['mensagem'];
              $nome = $_SESSION['nome_aventura'];
              $data = $_SESSION['data_aventura'];
              $comandoSQL = "SET SQL_SAFE_UPDATES = 0;";
              $dados = $conn->query($comandoSQL);
              $dados = " ";
              $comandoSQL = "UPDATE TB_AVENTURA SET DS_AVENTURA = '$mensagem' WHERE NM_AVENTURA = '$nome' AND DT_AVENTURA = '$data';";
              $dados = $conn->query($comandoSQL);
              ?>
            <div class="container comprado">
                <h4>Aventura editada com sucesso</h4>
            </div>
            <?php
            }
             ?>
                
              </div>
              </div>
              
            </div>
          </form>
            
            <section id="cursos">

           <div class="container">

              <div class="row mx-auto">

              </div>

              </form>
            <?php
          }else{
            ?>
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
            <?php
            }
            ?>
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