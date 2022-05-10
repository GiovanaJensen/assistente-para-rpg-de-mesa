<?php
    $atributo = $_POST['atributo'];

    switch($atributo){
        case "F":
            ?>
            <option selected>Selecione um atributo para receber +1</option>
            <option value="D">Destreza</option>
            <option value="C">Constituição</option>
            <option value="I">Inteligência</option>
            <option value="S">Sabedoria</option>
            <?php
            break;
        case "D":
            ?>
            <option selected>Selecione um atributo para receber +1</option>
            <option value="F">Força</option>
            <option value="C">Constituição</option>
            <option value="I">Inteligência</option>
            <option value="S">Sabedoria</option>
            <?php
            break;
        case "C":
            ?>
            <option selected>Selecione um atributo para receber +1</option>
            <option value="F">Força</option>
            <option value="D">Destreza</option>
            <option value="I">Inteligência</option>
            <option value="S">Sabedoria</option>
            <?php
            break;
        case "I":
            ?>
            <option selected>Selecione um atributo para receber +1</option>
            <option value="F">Força</option>
            <option value="D">Destreza</option>
            <option value="C">Constituição</option>
            <option value="S">Sabedoria</option>
            <?php
            break;
        case "S":
            ?>
            <option selected>Selecione um atributo para receber +1</option>
            <option value="F">Força</option>
            <option value="D">Destreza</option>
            <option value="C">Constituição</option>
            <option value="I">Inteligência</option>
            <?php
            break;
    }