<!DOCTYPE html>
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
            <table border="0" width="700">
            <?php
            include_once 'class/class.MySQL.php';
            $objTienda = new MySQL("importado", "root", "1234");
            $itemsPage = 12;
            if(isset($_COOKIE["carCompra"])){
                ?>
                <thead>
            <tr>
                <td width="100"></td>
                <th widht="100">Titulo</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Acciones</td>
            </tr>
                </thead>
                <tbody>
                <?php
                foreach ($_COOKIE["carCompra"] as $key => $value) {
                    $dataPelicula = $objTienda->Select("peliculas", array("CodPelicula" => $key));
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
            <tr>
                <td height="100"><img src='<?php echo $urlImg; ?>' width='75' height='104' /></td>
                <td><?php echo $dataPelicula["Titulo"]; ?></td>
                <td><input id="txtCantidad_<?php echo $key; ?>" type="text" value="<?php echo $value; ?>" size="2" maxlength="3" /></td>
                <td class="price"><i class="fa fa-dollar fa-fw"></i><?php echo number_format($dataPelicula["Precio"], 2, '.', ''); ?></td>
                <td class="price"><i class="fa fa-dollar fa-fw"></i><?php echo number_format($dataPelicula["Precio"]*$value, 2, '.', ''); ?></td>
                <td>
                    <input type="button" value="Edit" onclick="anadir_a_cesta(<?php echo $key; ?>)" />
                    <input type="button" value="Elim" onclick="elim_en_carro(<?php echo $key; ?>)" />
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td>CARRITO SIN ITEMS</td></tr>';
            }
            ?>
                </tbody>
</table>
            <input type="button" value="Completar la Compra" />
        </div>
    </body>
</html>
