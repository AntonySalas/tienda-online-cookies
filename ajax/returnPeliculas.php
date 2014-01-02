<?php
include_once '../class/class.MySQL.php';
$objTienda = new MySQL("importado", "root", "1234");
$itemsPage = 12;

$option = "numReg";
if (isset($_POST["opt"])) {
    $option = $_POST["opt"];
}
switch ($option) {
    case "pag":
        
        if (isset($_GET["pag"])) {
            $desde = ($_GET["pag"] - 1) * $itemsPage;
            $hasta = $desde + $itemsPage;
        } else {
            $desde = 1;
            $hasta = $itemsPage;
        }
        echo 'Desde:' . $desde . '<br />';
        echo 'Hasta:' . $hasta . '<br />';
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
                    <input id="txtCantidad" type="text" value="0" size="2" maxlength="3" />
                    <input type="button" value="Añadir" />
                </div>
            </div>

            <?php
        }
        ?>
<div class="pagination">
    <a href="#" class="first" data-action="first">&laquo;</a>
    <a href="#" class="previous" data-action="previous">&lsaquo;</a>
    <input type="text" readonly="readonly" data-max-page="150" data-current_page="12" />
    <a href="#" class="next" data-action="next">&rsaquo;</a>
    <a href="#" class="last" data-action="last">&raquo;</a>
</div>
<?php
        break;

    default:
        $cantData = $objTienda->Select("peliculas");
        $cantPaginas = round(count($cantData)/$itemsPage, 0, PHP_ROUND_HALF_UP);
        echo $cantPaginas;
        break;
}

