<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: cadastro/login.php");
}else{
    include_once "includes/header.php";
    include_once "includes/db/dbConnection.php";
    include_once "includes/navbar-logado.php";
    include_once "includes/carrossel.php";

    $usuario = $_SESSION['usuario'];
$comandoSQL = "SELECT CD_USUARIO FROM TB_USUARIO WHERE NM_USUARIO = '$usuario';";
$dados = $conn->query($comandoSQL);
foreach($dados as $dado){
    $cd_usuario = $dado[0];
}
$dados = " ";

if(isset($_POST['nome_tamanho'], $_POST['espaco_tamanho'], $_POST['alcance_tamanho'])){
    if(!empty($_POST['nome_tamanho'] && $_POST['espaco_tamanho'] && $_POST['alcance_tamanho'])){
        if( $_POST['espaco_tamanho'] > 0 && $_POST['alcance_tamanho'] > 0){
            $comandoSQL = "SELECT MAX(CD_TAMANHO)+1 FROM TB_TAMANHO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_tamanho = $dado[0];
            }
            $dados = " ";

            $nm_tamanho = $_POST['nome_tamanho'];
            $espaco_tamanho = $_POST['espaco_tamanho'];
            $alcance_tamanho = $_POST['alcance_tamanho'];

            $comandoSQL = "INSERT INTO TB_TAMANHO VALUES ($cd_usuario, $cd_tamanho, '$nm_tamanho', '$espaco_tamanho', '$alcance_tamanho');";
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Tamanho inserido com sucesso</h4>
            </div>
            <?php
        }else{
            echo 'Digite um número positivo';
        }
    }
}
if(isset($_POST['nome_idioma'], $_POST['escrita_idioma'])){
    if(!empty($_POST['nome_idioma'] && $_POST['escrita_idioma'])){
            $comandoSQL = "SELECT MAX(CD_IDIOMA)+1 FROM TB_IDIOMA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_idioma = $dado[0];
            }
            $dados = " ";

            $nm_idioma = $_POST['nome_idioma'];
            $escrita_idioma = $_POST['escrita_idioma'];

            $comandoSQL = "INSERT INTO TB_IDIOMA VALUES ($cd_usuario, $cd_idioma, '$nm_idioma', '$escrita_idioma');";
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Idioma inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_visao'], $_POST['descricao_visao'])){
    if(!empty($_POST['nome_visao'] && $_POST['descricao_visao'])){
            $comandoSQL = "SELECT MAX(CD_VISAO)+1 FROM TB_VISAO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_visao = $dado[0];
            }
            $dados = " ";

            $nm_visao = $_POST['nome_visao'];
            $ds_visao = $_POST['descricao_visao'];

            $comandoSQL = "INSERT INTO TB_VISAO VALUES ($cd_usuario, $cd_visao, '$nm_visao', '$ds_visao');";
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Visão inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_tendencia'])){
    if(!empty($_POST['nome_tendencia'])){
            $comandoSQL = "SELECT MAX(CD_TENDENCIA)+1 FROM TB_TENDENCIA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_tendencia = $dado[0];
            }
            $dados = " ";

            $nm_tendencia = $_POST['nome_tendencia'];

            if(!empty($_POST['descricao_visao'])){
                $ds_visao = $_POST['descricao_visao'];
                $comandoSQL = "INSERT INTO TB_TENDENCIA VALUES ($cd_usuario, $cd_tendencia, '$nm_tendencia', '$ds_tendencia');";
            }else{
                $comandoSQL = "INSERT INTO TB_TENDENCIA VALUES ($cd_usuario, $cd_tendencia, '$nm_tendencia', NULL);";
            }
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Tendência inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_olho'])){
    if(!empty($_POST['nome_olho'])){
            $comandoSQL = "SELECT MAX(CD_OLHO)+1 FROM TB_OLHO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_olho = $dado[0];
            }
            $dados = " ";

            $nm_olho = $_POST['nome_olho'];

            $comandoSQL = "INSERT INTO TB_OLHO VALUES ($cd_usuario, $cd_olho, '$nm_olho');";
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Olho inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_pele'])){
    if(!empty($_POST['nome_pele'])){
            $comandoSQL = "SELECT MAX(CD_PELE)+1 FROM TB_PELE;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_pele = $dado[0];
            }
            $dados = " ";

            $nm_pele = $_POST['nome_pele'];

            $comandoSQL = "INSERT INTO TB_PELE VALUES ($cd_usuario, $cd_pele, '$nm_pele');";
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Pele inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_cabelo'])){
    if(!empty($_POST['nome_cabelo'])){
            $comandoSQL = "SELECT MAX(CD_CABELO)+1 FROM TB_CABELO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_cabelo = $dado[0];
            }
            $dados = " ";

            $nm_cabelo = $_POST['nome_cabelo'];

            $comandoSQL = "INSERT INTO TB_CABELO VALUES ($cd_usuario, $cd_cabelo, '$nm_cabelo');";
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Cabelo inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['codigo_nivel'], $_POST['exp_nivel'], $_POST['bonus_nivel'])){
    if(!empty($_POST['codigo_nivel'] && $_POST['exp_nivel'] && $_POST['bonus_nivel'])){

            $cd_nivel = $_POST['codigo_nivel'];

            $comandoSQL = "SELECT * FROM TB_NIVEL WHERE CD_NIVEL = $cd_nivel;";
            $dados = $conn->query($comandoSQL);
            $count = $dados->rowCount();
            if($count > 0 ){
                ?>
                <div class="container comprado">
                    <h4>Nível já existente</h4>
                </div>
            <?php
            }else{
                $exp_nivel = $_POST['exp_nivel'];
                $bonus_nivel = $_POST['bonus_nivel'];

                $comandoSQL = "INSERT INTO TB_NIVEL VALUES ($cd_usuario, $cd_nivel, $exp_nivel,$bonus_nivel);";
         
                $dados = $conn->query($comandoSQL);
                $dados = " ";

                ?>
                <div class="container comprado">
                 <h4>Nível inserido com sucesso</h4>
                </div>
            <?php
            }
    }
}

if(isset($_POST['nome_tipo'])){
    if(!empty($_POST['nome_tipo'])){
            $comandoSQL = "SELECT MAX(CD_TIPO)+1 FROM TB_TIPO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_tipo = $dado[0];
            }
            $dados = " ";

            $nm_tipo = $_POST['nome_tipo'];

            if(!empty($_POST['descricao_tipo'])){
                $ds_tipo = $_POST['descricao_tipo'];
                $comandoSQL = "INSERT INTO TB_TIPO VALUES ($cd_usuario, $cd_tipo, '$nm_tipo', '$ds_tipo');";
            }else{
                $comandoSQL = "INSERT INTO TB_TIPO VALUES ($cd_usuario, $cd_tipo, '$nm_tipo', NULL);";
            }
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Tipo inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_categoria'])){
    if(!empty($_POST['nome_categoria'])){
            $comandoSQL = "SELECT MAX(CD_CATEGORIA)+1 FROM TB_CATEGORIA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_categoria = $dado[0];
            }
            $dados = " ";

            $nm_categoria = $_POST['nome_categoria'];

            if(!empty($_POST['descricao_categoria'])){
                $ds_categoria = $_POST['descricao_categoria'];
                $comandoSQL = "INSERT INTO TB_CATEGORIA VALUES ($cd_usuario, $cd_categoria, '$nm_categoria', '$ds_categoria');";
            }else{
                $comandoSQL = "INSERT INTO TB_CATEGORIA VALUES ($cd_usuario, $cd_categoria, '$nm_categoria', NULL);";
            }
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Categoria inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_grupo'])){
    if(!empty($_POST['nome_grupo'])){
            $comandoSQL = "SELECT MAX(CD_GRUPO)+1 FROM TB_GRUPO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_grupo = $dado[0];
            }
            $dados = " ";

            $nm_grupo = $_POST['nome_grupo'];

            if(!empty($_POST['descricao_grupo'])){
                $ds_grupo = $_POST['descricao_grupo'];
                $comandoSQL = "INSERT INTO TB_GRUPO VALUES ($cd_usuario, $cd_grupo, '$nm_grupo', '$ds_grupo');";
            }else{
                $comandoSQL = "INSERT INTO TB_GRUPO VALUES ($cd_usuario, $cd_grupo, '$nm_grupo', NULL);";
            }
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Grupo inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_dano'])){
    if(!empty($_POST['nome_dano'])){
            $comandoSQL = "SELECT MAX(CD_DANO)+1 FROM TB_DANO;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_dano = $dado[0];
            }
            $dados = " ";

            $nm_dano = $_POST['nome_dano'];

            $comandoSQL = "INSERT INTO TB_DANO VALUES ($cd_usuario, $cd_dano, '$nm_dano');";
         
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Dano inserido com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_classe'], $_POST['dado_classe'])){
    if(!empty($_POST['nome_classe'] && $_POST['dado_classe'])){

            $nm_classe = $_POST['nome_classe'];
            $dado = $_POST['dado_classe'];

            if(!empty($_POST['descricao_classe'])){
                $ds_classe = $_POST['descricao_classe'];
            }else{
                $ds_classe = 'NULL';
            }

            if(!empty($_POST['defNatural_classe'])){
                $defNatural_classe = $_POST['defNatural_classe'];
            }else{
                $defNatural_classe = 'NULL';
            }

            if(!empty($_POST['pvVida_classe'])){
                $pvVida_classe = $_POST['pvVida_classe'];
            }else{
                $pvVida_classe = 'NULL';
            }

            if(!empty($_POST['riqueza_classe'])){
                $riqueza_classe= $_POST['riqueza_classe'];
            }else{
                $riqueza_classe= 'NULL';
            }

            if(!empty($_POST['equipamento_classe'])){
                $equipamento_classe = $_POST['equipamento_classe'];
            }else{
                $equipamento_classe = 'NULL';
            }

            if(!empty($_POST['profEquipamento_classe'])){
                $profEquipamento_classe = $_POST['profEquipamento_classe'];
            }else{
                $profEquipamento_classe = 'NULL';
            }

            if(!empty($_POST['profFerramentas_classe'])){
                $profFerramentas_classe = $_POST['profEquipamento_classe'];
            }else{
                $profFerramentas_classe = 'NULL';
            }

            if(!empty($_POST['profResistencias_classe'])){
                $profResistencias_classe = $_POST['profResistencias_classe'];
            }else{
                $profResistencias_classe = 'NULL';
            }

            if(!empty($_POST['pericia_classe'])){
                $pericia_classe = $_POST['pericia_classe'];
            }else{
                $pericia_classe = 'NULL';
            }

            if(!empty($_POST['habilidade_classe'])){
                $habilidade_classe = $_POST['habilidade_classe'];
            }else{
                $habilidade_classe = 'NULL';
            }

            /*CALL SP_CRIA_CLASSE(COD_USUARIO,'NOME_CLASSE','DESCRICAO',COD_DADO,'PTS_VIDA','DEF_NAT','RIQUESA','EQUIPAMENTO',
					'PROF_EQUI','PROF_FERR','PROF_RES','PERICIA','HABILIDADE');*/
            $comandoSQL = "CALL SP_CRIA_CLASSE($cd_usuario,'$nm_classe', $ds_classe,$dado,'$pvVida_classe',$defNatural_classe, '$riqueza_classe',$equipamento_classe,$profEquipamento_classe, $profFerramentas_classe,$profResistencias_classe,$pericia_classe,$habilidade_classe)";
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Classe inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_raca'], $_POST['visao_raca'], $_POST['tamanho_raca'], $_POST['deslocamento_raca'], $_POST['idioma1_raca'])){
    if(!empty($_POST['nome_raca'] &&  $_POST['visao_raca'] && $_POST['tamanho_raca'] && $_POST['deslocamento_raca'] && $_POST['idioma1_raca'])){

        $comandoSQL = "SELECT MAX(CD_RACA)+1 FROM TB_RACA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_raca = $dado[0];
            }
            $dados = " ";

            $nm_raca = $_POST['nome_raca'];
            $visao_raca = $_POST['visao_raca'];
            $tamanho_raca = $_POST['tamanho_raca'];
            $deslocamento_raca = $_POST['deslocamento_raca'];
            $idioma1_raca = $_POST['idioma1_raca'];

            if(!empty($_POST['caracteristica_raca'])){
                $caracteristica_raca = $_POST['caracteristica_raca'];
            }else{
                $caracteristica_raca = 'NULL';
            }

            if(!empty($_POST['idioma2_raca'])){
                $idioma2_raca = $_POST['idioma2_raca'];
            }else{
                $idioma2_raca = 'NULL';
            }

            if(!empty($_POST['proficiencia_raca'])){
                $proficiencia_raca = $_POST['proficiencia_raca'];
            }else{
                $proficiencia_raca = 'NULL';
            }

            if(!empty($_POST['habilidade_raca'])){
                $habilidade_raca= $_POST['habilidade_raca'];
            }else{
                $habilidade_raca= 'NULL';
            }

            /*CALL SP_CRIA_RACA(COD_USUARIO,'NOME_RACA',COD_VISAO,COD_TAMANHO,DESLOCAMENTO,COD_IDIOMA_1,COD_IDIOMA_2,'HABILIDADE','PROFICIENCIA','CARACTERISTICA');*/ 
            $comandoSQL = "INSERT INTO TB_RACA VALUES($cd_usuario,$cd_raca,'$nm_raca',$visao_raca,$tamanho_raca,$deslocamento_raca,$idioma1_raca,$idioma2_raca,$habilidade_raca,$proficiencia_raca,$caracteristica_raca);"; 
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Raça inserida com sucesso</h4>
            </div>
            <?php
    }
}

if(isset($_POST['nome_subraca'], $_POST['raca_subraca'])){
    if(!empty($_POST['nome_subraca'])){
        $comandoSQL = "SELECT MAX(CD_SUB_RACA)+1 FROM TB_SUB_RACA;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_subraca = $dado[0];
            }
            $dados = " ";

            $nm_subraca = $_POST['nome_subraca'];
            $raca_subraca = $_POST['raca_subraca'];

            if(!empty($_POST['caracteristica_subraca'])){
                $caracteristica_subraca = $_POST['caracteristica_subraca'];
            }else{
                $caracteristica_subraca = 'NULL';
            }

            if(!empty($_POST['proficiencia_subraca'])){
                $proficiencia_subraca = $_POST['proficiencia_subraca'];
            }else{
                $proficiencia_subraca = 'NULL';
            }

            if(!empty($_POST['habilidade_subraca'])){
                $habilidade_subraca= $_POST['habilidade_subraca'];
            }else{
                $habilidade_subraca= 'NULL';
            }

            /**/ 
            $comandoSQL = "INSERT INTO TB_SUB_RACA VALUES($cd_usuario,$raca_subraca, $cd_subraca, '$nm_subraca',$habilidade_subraca, $proficiencia_subraca, $caracteristica_subraca);"; 
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Sub-Raça inserida com sucesso</h4>
            </div>
            <?php
    }}

    if(isset($_POST['nome_antecedente'])){
        if(!empty($_POST['nome_antecedente'])){
        $comandoSQL = "SELECT MAX(CD_ANTECEDENTE)+1 FROM TB_ANTECEDENTE;";
            $dados = $conn->query($comandoSQL);
            foreach($dados as $dado){
                $cd_antecedente = $dado[0];
            }
            $dados = " ";

            $nm_antecedente = $_POST['nome_antecedente'];

            if(!empty($_POST['descricao_antecedente'])){
                $ds_antecedente = $_POST['descricao_antecedente'];
            }else{
                $ds_antecedente = 'NULL';
            }

            if(!empty($_POST['personalidade_antecedente'])){
                $personalidade_antecedente= $_POST['personalidade_antecedente'];
            }else{
                $personalidade_antecedente = 'NULL';
            }

            if(!empty($_POST['ideal_antecedente'])){
                $ideal_antecedente= $_POST['ideal_antecedente'];
            }else{
                $ideal_antecedente= 'NULL';
            }

            if(!empty($_POST['vinculo_antecedente'])){
                $vinculo_antecedente= $_POST['vinculo_antecedente'];
            }else{
                $vinculo_antecedente= 'NULL';
            }

            if(!empty($_POST['defeito_antecedente'])){
                $defeito_antecedente= $_POST['defeito_antecedente'];
            }else{
                $defeito_antecedente= 'NULL';
            }

            if(!empty($_POST['pericias_antecedente'])){
                $pericias_antecedente= $_POST['pericias_antecedente'];
            }else{
                $pericias_antecedente= 'NULL';
            }

            if(!empty($_POST['ferramentas_antecedente'])){
                $ferramentas_antecedente= $_POST['ferramentas_antecedente'];
            }else{
                $ferramentas_antecedente= 'NULL';
            }

            if(!empty($_POST['habilidade_antecedente'])){
                $habilidade_antecedente= $_POST['habilidade_antecedente'];
            }else{
                $habilidade_antecedente= 'NULL';
            }

            if(!empty($_POST['equipamento_antecedente'])){
                $equipamento_antecedente= $_POST['equipamento_antecedente'];
            }else{
                $equipamento_antecedente= 'NULL';
            }

            /**/ 
            $comandoSQL = "INSERT INTO TB_ANTECEDENTE VALUES($cd_usuario,$cd_antecedente, '$nm_antecedente',$ds_antecedente,$personalidade_antecedente,$ideal_antecedente,$vinculo_antecedente,$defeito_antecedente,$pericias_antecedente,$ferramentas_antecedente,$habilidade_antecedente,$equipamento_antecedente);"; 
            $dados = $conn->query($comandoSQL);
            $dados = " ";

            ?>
            <div class="container comprado">
                <h4>Antecedente inserido com sucesso</h4>
            </div>
            <?php
    }}
?>

    <body class="scroll">
        <?php
        
        
        ?>
        <!-- Banner -->
           <section id="valores" class="mb-5 mt-5">
               <h2 style="color: #000; text-align: center;">Adicionar</h2>
            <div class="valoresTxt container" style="border: 1px solid #8a0808;padding: 20px; background: #fff;">
                <div class="row">
                    <div class="col-lg-4">
                        <!--dano-->
                        
                        <div id="tamanho" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tamanho">
                                    Tamanho <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_tamanho" placeholder="">
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Espaço</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="espaco_tamanho" placeholder="">
                                          </div> 
                                           <div class="inputTitulo col-8">
                                              <h5>Alcance</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                           
                                                    <input type="text" name="alcance_tamanho"placeholder="">
                                             
                                            </div>
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="idioma" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#idioma">
                                    Idioma <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_idioma" placeholder="">
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Escrita</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="escrita_idioma" placeholder="">
                                          </div> 
                                          <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="cabelo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#cabelo">
                                    Cabelo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_cabelo" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="categoria" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#categoria">
                                    Categoria <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_categoria" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_categoria" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="classe" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#classe">
                                    Classe <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_classe" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="dado_classe">
                                                    <option selected>
                                                     Selecione o tipo de dado...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_DADO, NM_DADO FROM TB_DADO;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Pontos de vida</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="pvVida_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>DEF Natural</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="defNatural_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Riqueza inicial</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="riqueza_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="equipamento_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profEquipamento_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Ferramentas</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profFerramentas_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Prof Resistencias</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="profResistencias_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Pericia</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="pericia_classe" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_classe" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        
                        <div id="antecedente" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#antecedente">
                                    Antecedente <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Personalidade</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="personalidade_antecedente" placeholder="">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Ideal</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="ideal_antecedente" placeholder="">
                                            </div>  
                                            <div class="inputTitulo col-8">
                                              <h5>Vínculo</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="vinculo_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Defeito</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="defeito_antecedente" placeholder="">
                                            </div>   
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências perícias</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="pericias_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências ferramentas</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="ferramentas_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_antecedente" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Equipamentos</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="equipamento_antecedente" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        
                        <div id="visao" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#visao">
                                    Visão <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_visao" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_visao" placeholder="">
                                            </div> 
                                          
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="tendencia" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tendencia">
                                    Tendência <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_tendencia" placeholder="">
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_tendencia" placeholder="">
                                          </div> 
                                          <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="nivel" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#nivel">
                                    Nível <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nível</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="number" name="codigo_nivel" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Experiência mínima</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="number" name="exp_nivel" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Bônus de proficiência</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="number" name="bonus_nivel" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="grupo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#grupo">
                                    Grupo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_grupo" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_grupo" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="raca" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#raca">
                                    Raça <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_raca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Características</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="caracteristica_raca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="visao_raca">
                                                    <option selected>
                                                     Selecione o tipo de visão...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_VISAO, NM_VISAO FROM TB_VISAO WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_VISAO, CD_VISAO FROM TB_VISAO WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="col-lg-12 inputContato1">
                                                <select name="tamanho_raca">
                                                    <option selected>
                                                     Selecione o tipo de tamanho...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_TAMANHO, NM_TAMANHO FROM TB_TAMANHO WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
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
                                            <div class="inputTitulo col-8">
                                              <h5>Deslocamento</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="deslocamento_raca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="idioma1_raca">
                                                    <option selected>
                                                     Selecione o 1° idioma...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_IDIOMA, NM_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_IDIOMA, CD_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="col-lg-12 inputContato1">
                                                <select name="idioma2_raca">
                                                    <option selected>
                                                     Selecione o 2° idioma...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_IDIOMA, NM_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT NM_IDIOMA, CD_IDIOMA FROM TB_IDIOMA WHERE CD_USUARIO = $cd_usuario;";
                                            
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
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="proficiencia_raca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_raca" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        
                        <div id="olho" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#olho">
                                    Olho <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_olho" placeholder="">
                                            </div> 
                                          
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                        <div id="pele" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#pele">
                                    Pele <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_pele" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="tipo" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#tipo">
                                    Tipo <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="nome_tipo" placeholder="">
                                            </div> 
                                          <div class="inputTitulo col-8">
                                              <h5>Descrição</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="descricao_tipo" placeholder="">
                                          </div> 
                                          <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="dano" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#dano">
                                    Dano <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_dano" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>

                        <div id="subraca" class="valores">
                         <form method="post">
                            <div class="texto">
                                <h5 class="valoresMais btn-valores" data-hast="#subraca">
                                    Sub-Raça <b class="mais">+</b><b class="menos"></b></h5>
                                <div class="conteudoValores" style="display: none;"><!--conteudo-->
                                       <div class="row">
                                           <div class="inputTitulo col-8">
                                              <h5>Nome</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                                    <input type="text" name="nome_subraca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-8">
                                              <h5>Características</h5>
                                            </div> 
                                            <div class="inputForm col-4">
                                            
                                                    <input type="text" name="caracteristica_subraca" placeholder="">
                                            </div> 
                                            <div class="col-lg-12 inputContato1">
                                                <select name="raca_subraca">
                                                    <option selected>
                                                     Selecione a raça...
                                                    </option>
                                                    <?php
                                                    $dados = " ";
                                                    $comandoSQL = "SELECT CD_RACA, NM_RACA FROM TB_RACA WHERE CD_USUARIO IS NULL;";
                                                    $dados = $conn->query($comandoSQL);
                                                    foreach($dados as $dado){
                                                        ?>
                                                        <option value="<?php echo $dado[0];?>"><?php echo $dado[1];?></option>
                                                        <?php
                                                    }
                                                    $dados = " ";
                                            $comandoSQL = "SELECT CD_RACA, NM_RACA FROM TB_RACA WHERE CD_USUARIO = $cd_usuario;";
                                            
                                            $dados = $conn->query($comandoSQL);
                                            $count = $dados->rowCount();
                                            if($count > 0){
                                                foreach($dados as $dado){
                                                ?>
                                                <option value=<?php echo $dado[0]?>><?php echo $dado[1];?></option>
                                                <?php
                                                }  
                                            }
                                            $dados = " ";
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="inputTitulo col-12">
                                              <h5>Proficiências</h5>
                                            </div>
                                            <div class="inputForm col-12">
                                                    <input type="text" name="proficiencia_subraca" placeholder="">
                                            </div> 
                                            <div class="inputTitulo col-12">
                                              <h5>Habilidades</h5>
                                            </div> 
                                            <div class="inputForm col-12">
                                                    <input type="text" name="habilidade_subraca" placeholder="">
                                            </div> 
                                            <div class="operacoes">
                                                <button type="submit" class="mb-2 adicionar">Adicionar</button>
                                                <a href='deletar_ficha_zero.php' class="mb-2 editar">Deletar</a>
                                            </div>
                                        
                                        </div>    
                                 </div><!--conteudo-->
                            </div>
                        </div>
                    </div>
                 </div>  
            </div>
            <!--</form>-->
        </section>
              <!-- Footer --> 
<?php
    include_once "includes/footer.php";
?>     
    </body>
</html>
<?php
}