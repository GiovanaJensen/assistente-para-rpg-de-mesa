<?php
    require_once "db/dbConnection.php";
    session_start();
     $usuario = $_SESSION['usuario'];
     $comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
     $dados = $conn->query($comandoSQL);
     foreach($dados as $dado){
         $cd_usuario = $dado[0];
     }
     $dados = " ";

if(isset($_POST['nome_aventura'], $_POST['mensagem'], $_POST['data_aventura'])){
    if(!empty($_POST['nome_aventura'] && $_POST['mensagem'] && $_POST['data_aventura'])){
        $nome = $_POST['nome_aventura'];
        $mensagem = $_POST['mensagem'];

        $comandoSQL = "SELECT MAX(CD_AVENTURA)+1 FROM TB_AVENTURA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_aventura = $dado[0];
            }
            $dados = " ";


        $data = $_POST['data_aventura'];
        $validacao  = explode('-', $data);
        if (checkdate($validacao[1], $validacao[2], $validacao[0])) {
            $comandoSQL = "INSERT INTO TB_AVENTURA VALUES($cd_usuario,$cd_aventura, '$nome', '$mensagem', '$data');";
            $dados = $conn->query($comandoSQL);
            $dados = " ";
            header('Location: ../aventura.php');
        }else{
            echo "data inválida";
        }

    }
}
?>