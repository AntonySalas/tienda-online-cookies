<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Peliculas de Estreno</title>
        <link rel="stylesheet" type="text/css" href="css/general.css">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/jqpagination.css" rel="stylesheet">
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.jqpagination.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script src="js/scripts.js"></script>
    </head>
    <body>
        <div class="header-cont">
            <div class="header">
                <div id="logo">

                </div>
                <?php
                if(isset($_COOKIE["carCompra"])){
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
            include_once 'config.php';
            $itemsPage = 12;
            $cantData = $objTienda->Select("peliculas");
            $cantPaginas = round(count($cantData) / $itemsPage, 0, PHP_ROUND_HALF_UP);
            if (isset($_GET["pag"])) {
                $desde = ($_GET["pag"] - 1) * $itemsPage;
                $hasta = $desde + $itemsPage;
                $currentPage = $_GET["pag"];
            } else {
                $desde = 0;
                $hasta = $itemsPage;
                $currentPage = 1;
            }
            $lstPeliculas = $objTienda->Select("peliculas", '', '', "{$desde},{$itemsPage}");
            foreach ($lstPeliculas as $dataPelicula) {
                $txtGenero = $objTienda->Select("generos", array("CodGenero" => $dataPelicula["CodGenero"]));
                $targetIMG = "imgPeliculas/" . $dataPelicula["CodPelicula"];
                if (file_exists($targetIMG . ".png")) {
                    $urlImg = $targetIMG . ".png";
                } elseif (file_exists($targetIMG . ".jpg")) {
                    $urlImg = $targetIMG . ".jpg";
                } elseif (file_exists($targetIMG . ".gif")) {
                    $urlImg = $targetIMG . ".gif";
                } else {
                    $urlImg = "imgPeliculas/default.png";
                }
                ?>
                <div class="itemContent">
                    <div class="title"><?php echo $dataPelicula["Titulo"]; ?></div>
                    <div class="img"><img src="<?php echo $urlImg; ?>" width="148" height="207" /></div>
                    <div class="price"><i class="fa fa-dollar fa-fw"></i><?php echo number_format($dataPelicula["Precio"], 2, '.', ''); ?></div>
                    <div class="buy">
                        <input id="txtCantidad_<?php echo $dataPelicula["CodPelicula"]; ?>" type="text" value="0" size="2" maxlength="3" />
                        <input type="button" value="Añadir" onclick="anadir_a_cesta(<?php echo $dataPelicula["CodPelicula"]; ?>);" />
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
        <div class="contentPaginator">
            <div class="pagination">
                <a href="#" class="first" data-action="first">&laquo;</a>
                <a href="#" class="previous" data-action="previous">&lsaquo;</a>
                <input type="text" readonly="readonly" data-max-page="<?php echo $cantPaginas; ?>" data-current-page="<?php echo $currentPage; ?>" />
                <a href="#" class="next" data-action="next">&rsaquo;</a>
                <a href="#" class="last" data-action="last">&raquo;</a>
            </div>
        </div>
    </body>
</html>
