$(document).ready(function() {
    $('.pagination').jqPagination({
        link_string	: '?page={page_number}',
        page_string     : 'Página {current_page} de {max_page}',
        paged: function(page) {
           //alert(page);
           
            $(location).attr('href','index.php?pag=' + page);
        }
    });

    
});

    function anadir_a_cesta(codPelicula){
        idCantidad =  $("#txtCantidad_"+codPelicula).val();
        $.cookie('carCompra['+codPelicula+']', idCantidad);
        $(location).attr('href','carro.php');
    }
    function elim_en_carro(codPelicula){
        $.removeCookie('carCompra['+codPelicula+']');
        $(location).attr('href','carro.php');
    }