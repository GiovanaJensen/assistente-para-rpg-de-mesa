<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: cadastro/login.php");
}else{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DYNAMICS</title>
    <link rel="icon" href="imgs/logo_icon.png">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
  require_once "includes/db/dbConnection.php";
  include_once "includes/navbar-logado.php";

  $usuario = $_SESSION['usuario'];
$comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $cd_usuario = $dado[0];
}
$dados = " ";

  if(isset($_POST['nome_mapa'])){
    $nome = $_POST['nome_mapa'];
    $comandoSQL = "SELECT IM_MAPA FROM TB_MAPA WHERE NM_MAPA = '$nome';";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
      $im = $dado[0];
    }
    $dados = " ";

    $comandoSQL = "SELECT MAX(CD_MAPA)+1 FROM TB_MAPA;";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
      $cd_mapa = $dado[0];
    }
    $dados = " ";

    $comandoSQL = "INSERT INTO TB_MAPA VALUES($cd_usuario, $cd_mapa, '$nome', NULL, '$im');";
    $dados = $conn->query($comandoSQL);
    $dados = " "; 
  }
?>
  <section id="mapa">
          <?php 
            $comandoSQL = " SELECT NM_MAPA FROM TB_MAPA GROUP BY NM_MAPA;";
            $dados= $conn->query($comandoSQL);
          ?>
          <form  method="post">
          <label>Mapa: </label>
          <select class="combobox" name="mapa">
            <option selected>Selecione o mapa..</option>
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
  <div class="row ">
  <?php
if(isset($_POST['mapa'])){
 
$dados = " ";
$mapa = $_POST['mapa'];
  $comandoSQL = "SELECT NM_MAPA, IM_MAPA FROM TB_MAPA WHERE NM_MAPA = '$mapa' GROUP BY NM_MAPA;";
  $dados = $conn->query($comandoSQL);
  foreach($dados as $dado){
  ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 mapas">
    <form method="post">
        <!--<img class="card-img-top" src="img_avatar1.png" alt="Card image">-->
              <img src="imgs/mapas/<?php echo $dado[1];?>" style="width:400px; height: 400px">         
    </div>
    <div class="col-lg-12 mapas">
          <input name="nome_mapa" value="<?php echo $dado[0];?>"></input>
          <button class="btn btn-danger" type="submit">Adicionar</button>
    </div>
          
      </form>
    
  </div>
      
</div>
            
      
  <?php
  }}
  $dados = "";
?>
  </div>
</div>

</body>
</html>
<?php
}