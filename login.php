<?php
session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Peliculas de Estreno</title>
        <link rel="stylesheet" type="text/css" href="css/general.css">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/jqpagination.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/blitzer/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.jqpagination.js"></script>
        <script src="js/jquery.cookie.js"></script>
        
        <script src="js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script src="js/scripts.js"></script>

    </head>
    <body>
        <div class="header-cont">
            <div class="header">
                <div id="logo">

                </div>
                <?php
                if (isset($_COOKIE["carCompra"])) {
                    $cantItemsCompra = count($_COOKIE["carCompra"]);
                } else {
                    $cantItemsCompra = 0;
                }
                ?>
                <div id="lstItems">
                    <a id="lnkInicio" href="index.php"><i class="fa fa-home fa-fw"></i>Inicio</a>
                    <a id="lnkCarro" href="carro.php"><i class="fa fa-shopping-cart fa-fw"></i>(<span id="numItemsCarro"><?php echo $cantItemsCompra; ?></span>)Carrito</a>
                    <a id="lnkLogin" href="login.php"><i class="fa fa-key fa-fw"></i>Login</a>
                </div>
            </div>
        </div>
        <div class="content" id="showPages">
            <?php
            $errorLogin = array(true, "");
            if(isset($_POST["txtIdUsuario"])){
                $txtIdUser = $_POST["txtIdUsuario"];
                $txtPassword = $_POST["txtPassword"];
                
                $dataUser = $objTienda->Select('vendedores',array('CodVend'=>$txtIdUser));
                if(!count($dataUser)> 0){
                    $errorLogin = array(true, "No existe Usuario");
                    
                } elseif ($dataUser["Password"] != $txtPassword){
                    $errorLogin = array(true, "Password no coincide");
                } else {
                    $errorLogin = array(false, "");
                    ?>

            <table id="tblclientes"></table>
        <div id="paginacion"> </div>
            <?php
                }
            } else {
                $errorLogin = array(true, "");
            }
            
            if ($errorLogin[0] == true){
            ?>
            <div class="login">
                <h1>Login</h1>
                <p>Ingreso de Vendedores o Administradores</p>
                <p><?php echo $errorLogin[1] ?></p>
                <form action="" method="post">
                    <div class="input">
                        <div class="blockinput">
                            <i class="fa fa-users fa-fw"></i></i>
                            <select name="txtIdUsuario" placeholder="Usuario">
                                <?php
                                $lstUsuarios = $objTienda->Select('vendedores');
                                echo var_dump($lstUsuarios);
                                foreach ($lstUsuarios as $vendedor) {
                                    echo '<option value="' . $vendedor["CodVend"] . '">' . $vendedor["NombVen"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="blockinput">
                            <i class="fa fa-key fa-fw"></i>
                            <input type="password" name="txtPassword" placeholder="Contraseña">
                        </div>
                    </div>
                    <button>Iniciar Sesion</button>
                </form>
            </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>
