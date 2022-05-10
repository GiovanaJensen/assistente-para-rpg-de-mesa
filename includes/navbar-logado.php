
<header class="main_menu transition_on">

<div id="menu-primeiro">
    <div class="container">
        <div class="row">
            <div class="col-12 conteudo">
                <a class="navbar-brand" href="index.php">
                    <!--<img src="imgs/logo/solovialogo.png" alt="logo" class="top">-->
                    <h1>Dynamics</h1>
                </a>

            </div>
        </div>
    </div>
</div>

<div id="menu-segundo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul class="navbar-nav menu-desktop transition_on">
                        <li class="nav-item ">
                            <img src="imgs/logo/logo_icon.png" class="logoNav">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="selecionar.php">Home</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="ficha.php">Personagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="selecionar_aventura.php">Aventura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="selecionar_mapa.php">Mapas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastro-monstro.php">Monstros</a>
                        </li> 
                        <li>
                            <div id="blocoNav">
                                <div class="btnNav ml-6">
                                    <a href='index.php'>
                                        <p><?php echo $_SESSION['usuario'];?></p>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div id="menu-mobile" class=" transition_on">
    <div class="hamburguer-bt">
        <div class="hamburguer-bt__stripe hamburguer-bt__stripe__top"></div>
        <div class="hamburguer-bt__stripe hamburguer-bt__stripe__middle"></div>
        <div class="hamburguer-bt__stripe hamburguer-bt__stripe__bottom"></div>
    </div>


</div>

<div id="opt_menu">
    <nav>
        <ul class="navbar-nav menu-mobile transition_on">
            <li class="nav-item">
                <a class="nav-link" href="selecionar.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ficha.php">Personagem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="selecionar_aventura.php">Aventura</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="selecionar_mapa.php">Mapas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastro-monstro.php">Monstros</a>
            </li>
            <li class="nav-item">
                <a href='index.php'>
                    <p  class="nav-link loginMobile" style="display: flex; justify-content: center;"><?php echo $_SESSION['usuario'];?></p>
                </a>
            </li>    
        </ul>
    </nav>
</div>

</header>

