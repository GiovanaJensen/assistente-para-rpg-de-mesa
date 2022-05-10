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

if(isset($_POST['produto'])){
    if(!empty($_POST['produto'])){
        $produto = $_POST['produto'];
        switch($produto){
            case 'I':
                $select = "NM_ITEM FROM TB_ITEM;";
                $name = "item";
                break;
            case 'A':
                $select = "NM_ARMADURA FROM TB_ARMADURA;";
                $name = "armadura";
                break;
            case 'G':
                $select = "NM_ARMA FROM TB_ARMA;";
                $name = "arma";
                break;
            case 'E':
                $select = "NM_ESCUDO FROM TB_ESCUDO;";
                $name = "escudo";
                break;
        }
        $comandoSQL = "SELECT $select;";
        $dados = $conn->query($comandoSQL);
        ?>
    <form method="POST" id="produto">
        <select name="<?php echo $name;?>">
            <option>Selecione um(a) <?php echo $name;?></option>
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
    <a class="meio" href="cadastro-<?php echo $name;?>.php">Não encontrou o(a) <?php echo $name;?> desejado(a)? Clique aqui e adicione.</a>
        <?php
    }
}else{
    ?>
    <section id="produto">
      <form method="POST">
          <select name="produto">
              <option selected>Selecione a compra</option>
              <option value="I">item</option>
              <option value="A">armadura</option>
              <option value="G">arma</option>
              <option value="E">escudo</option>
          </select>      
          <button>Buscar</button>
      </form>
    </section>
    <?php
  if(isset($_POST['item'])){
   
    $dados = " ";
    $item = $_POST['item'];
    $comandoSQL = "SELECT NM_ITEM, VL_PECAS_COBRE, VL_PECAS_PRATA, VL_PECAS_OURO FROM TB_ITEM WHERE NM_ITEM = '$item';";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
    ?>
    <form method="post">
  <div class="container">
    <div class="row">
        <div class="card card-item" style="width: 18rem;height:23rem;">
            <div class="card-body">
                <input type="text" name="item_cv" value="<?php echo $dado[0];?>" class="card-title"></input>
                <p class="card-text">Peças de cobre: <?php echo $dado[1];?></p>
                <p class="card-text">Peças de prata: <?php echo $dado[2];?></p>
                <p class="card-text">Peças de ouro: <?php echo $dado[3];?></p>
                <input type="number" placeholder="qtd" name="qtd">
                <select name="cv">
                    <option selected value="C">Selecione uma opção</option>
                    <option value='C'>Comprar</option>
                    <option value='V'>Vender</option>
                </select>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </div>
    </div>
  </div>        
  </form>
      
    
        
  </div>
              
        
    <?php
    }}
    $dados = "";
}

if(isset($_POST['armadura'])){
   
    $dados = " ";
    $armadura = $_POST['armadura'];
    $comandoSQL = "SELECT NM_ARMADURA, VL_PECAS_COBRE, VL_PECAS_PRATA, VL_PECAS_OURO FROM TB_ARMADURA WHERE NM_ARMADURA = '$armadura';";
    $dados = $conn->query($comandoSQL);
    foreach($dados as $dado){
    ?>
    <form method="post">
  <div class="container">
    <div class="row">
        <div class="card card-item" style="width: 18rem;height:23rem;">
            <div class="card-body">
                <input type="text" name="armadura_cv" value="<?php echo $dado[0];?>" class="card-title"></input>
                <p class="card-text">Peças de cobre: <?php echo $dado[1];?></p>
                <p class="card-text">Peças de prata: <?php echo $dado[2];?></p>
                <p class="card-text">Peças de ouro: <?php echo $dado[3];?></p>
                <select name="cv">
                    <option selected value="C">Selecione uma opção</option>
                    <option value='C'>Comprar</option>
                    <option value='V'>Vender</option>
                </select>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </div>
    </div>
  </div>        
  </form>
      
    
        
  </div>
              
        
    <?php
    }}
    $dados = "";

if(isset($_POST['arma'])){
        $dados = " ";
        $arma = $_POST['arma'];
        $comandoSQL = "SELECT NM_ARMA, VL_PECAS_COBRE, VL_PECAS_PRATA, VL_PECAS_OURO FROM TB_ARMA WHERE NM_ARMA = '$arma';";
        $dados = $conn->query($comandoSQL);
        foreach($dados as $dado){
        ?>
        <form method="post">
      <div class="container">
        <div class="row">
            <div class="card card-item" style="width: 18rem;height:23rem;">
                <div class="card-body">
                    <input type="text" name="arma_cv" value="<?php echo $dado[0];?>" class="card-title"></input>
                    <p class="card-text">Peças de cobre: <?php echo $dado[1];?></p>
                    <p class="card-text">Peças de prata: <?php echo $dado[2];?></p>
                    <p class="card-text">Peças de ouro: <?php echo $dado[3];?></p>
                    <input type="number" placeholder="qtd" name="qtd">
                    <select name="cv">
                        <option selected value="C">Selecione uma opção</option>
                        <option value='C'>Comprar</option>
                        <option value='V'>Vender</option>
                    </select>
                    <button type="submit" class="btn btn-danger">Enviar</button>
                </div>
            </div>
        </div>
      </div>        
      </form>
          
        
            
      </div>
                  
            
        <?php
        }}
        $dados = "";

        if(isset($_POST['escudo'])){
   
            $dados = " ";
            $escudo = $_POST['escudo'];
            $comandoSQL = "SELECT NM_ESCUDO, VL_PECAS_COBRE, VL_PECAS_PRATA, VL_PECAS_OURO FROM TB_ESCUDO WHERE NM_ESCUDO = '$escudo';";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
            ?>
            <form method="post">
          <div class="container">
            <div class="row">
                <div class="card card-item" style="width: 18rem;height:23rem;">
                    <div class="card-body">
                        <input type="text" name="escudo_cv" value="<?php echo $dado[0];?>" class="card-title"></input>
                        <p class="card-text">Peças de cobre: <?php echo $dado[1];?></p>
                        <p class="card-text">Peças de prata: <?php echo $dado[2];?></p>
                        <p class="card-text">Peças de ouro: <?php echo $dado[3];?></p>
                        <select name="cv">
                            <option selected value="C">Selecione uma opção</option>
                            <option value='C'>Comprar</option>
                            <option value='V'>Vender</option>
                        </select>
                        <button type="submit" class="btn btn-danger">Enviar</button>
                    </div>
                </div>
            </div>
          </div>        
          </form>
              
            
                
          </div>
                      
                
            <?php
            }}
            $dados = "";

if(isset($_POST['item_cv'], $_POST['cv'], $_POST['qtd'])){
    if(!empty($_POST['item_cv'] &&  $_POST['cv'] && $_POST['qtd'])){
        if($_POST['qtd'] > 0){
            $cv = $_POST['cv'];
            $item = $_POST['item_cv'];
            $qtd = $_POST['qtd'];
            $comandoSQL= "SELECT CD_ITEM FROM TB_ITEM WHERE NM_ITEM = '$item';";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_item = $dado[0];
            }
            $dados = " ";
            $cd_personagem = $_SESSION['cd_personagem'];
            $comandoSQL = "CALL SP_MERCADO_NEGOCIA_ITEM($cd_personagem, '$cv', $cd_item,$qtd);";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                ?>
                <div class="container comprado">
                    <h4><?php echo $dado[0];?></h4>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="container comprado">
                <h4>A quantidade precisa ser maior que zero</h4>
            </div>
            <?php
        }
        
    }
}

if(isset($_POST['armadura_cv'], $_POST['cv'])){
    if(!empty($_POST['armadura_cv'] &&  $_POST['cv'])){
            $cv = $_POST['cv'];
            $armadura = $_POST['armadura_cv'];
            $comandoSQL= "SELECT CD_ARMADURA FROM TB_ARMADURA WHERE NM_ARMADURA = '$armadura';";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_armadura = $dado[0];
            }
            $dados = " ";
            $cd_personagem = $_SESSION['cd_personagem'];
            $comandoSQL = "CALL SP_MERCADO_NEGOCIA_ARMADURA($cd_personagem, '$cv', $cd_armadura);";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                ?>
                <div class="container comprado">
                    <h4><?php echo $dado[0];?></h4>
                </div>
                <?php
            }
        }
    }

    if(isset($_POST['arma_cv'], $_POST['cv'], $_POST['qtd'])){
        if(!empty($_POST['arma_cv'] &&  $_POST['cv'] && $_POST['qtd'])){
            if($_POST['qtd'] > 0){
                $cv = $_POST['cv'];
                $arma = $_POST['arma_cv'];
                $qtd = $_POST['qtd'];
                $comandoSQL= "SELECT CD_ARMA FROM TB_ARMA WHERE NM_ARMA = '$arma';";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                    $cd_arma = $dado[0];
                }
                $dados = " ";
                $cd_personagem = $_SESSION['cd_personagem'];
                $comandoSQL = "CALL SP_MERCADO_NEGOCIA_ARMA($cd_personagem, '$cv', $cd_arma,$qtd);";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                    ?>
                    <div class="container comprado">
                        <h4><?php echo $dado[0];?></h4>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="container comprado">
                    <h4>A quantidade precisa ser maior que zero</h4>
                </div>
                <?php
            }
            
        }
    }

    if(isset($_POST['escudo_cv'], $_POST['cv'])){
        if(!empty($_POST['escudo_cv'] &&  $_POST['cv'])){
                $cv = $_POST['cv'];
                $escudo = $_POST['escudo_cv'];
                $comandoSQL= "SELECT CD_ESCUDO FROM TB_ESCUDO WHERE NM_ESCUDO = '$escudo';";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                    $cd_escudo = $dado[0];
                }
                $dados = " ";
                $cd_personagem = $_SESSION['cd_personagem'];
                $comandoSQL = "CALL SP_MERCADO_NEGOCIA_ESCUDO($cd_personagem, '$cv', $cd_escudo);";
                $dados = $conn->query($comandoSQL);
                foreach($dados as $dado){
                    ?>
                    <div class="container comprado">
                        <h4><?php echo $dado[0];?></h4>
                    </div>
                    <?php
                }
            }
        }
?>
</body>
</html>
<?php
}