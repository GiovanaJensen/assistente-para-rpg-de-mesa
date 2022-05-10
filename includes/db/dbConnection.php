<?php
    require_once 'dbConfig.php';
    
    try{
        //mysql:host=localhost;port=3306;dbname=lojaodobras;charset=utf8, root, usbw
        $conn = new PDO(DBDRIVER . ':host=' . DBHOSTNAME .';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        //--------------------------------------
        // PONTE ENTRE O PHP EO BANCO DE DADOS
        //--------------------------------------
        //Instancia un novo objeto do tipo PDO
        //Indica que este objeto se conectará ao banco utilizando o drive mysql
        //Acessando a base de dados chamada lojaodobras, no servidor indicado como localhost e utilizando as credenciais (user = root, password = usbw)
        //Todas as configurações e parâmetros foram definidas no arquivo dbConfig.php

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Modificando atributos / propriedades do objeto conexão
        //Informando que os erros devem ser tratados utilizando / enviando EXCEPTION
    }
    catch(PDOException $Exception){
        echo "Erro: " . $Exception->getMessage() . " - Código: " . $Exception->getCode();
    }