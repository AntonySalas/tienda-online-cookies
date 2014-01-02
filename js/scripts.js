$(document).ready(function() {
    $('.pagination').jqPagination({
        link_string: '?page={page_number}',
        page_string: 'Página {current_page} de {max_page}',
        paged: function(page) {
            //alert(page);

            $(location).attr('href', 'index.php?pag=' + page);
        }
    });

    jQuery("#tblclientes").jqGrid({
        url: 'ajax/returnPeliculas.php',
        datatype: 'json',
        mtype: 'POST',
        colNames: ['ID', 'NOMBRE', 'DIRECCION', 'TELEFONO', 'EMAIL'],
        colModel: [
            {name: 'idCliente', index: 'idCliente', width: 50, resizable: false, align: "center"},
            {name: 'nombre', index: 'nombre', width: 160, resizable: false, sortable: true},
            {name: 'direccion', index: 'direccion', width: 150},
            {name: 'telefono', index: 'telefono', width: 70},
            {name: 'email', index: 'email', width: 120}
        ],
        pager: '#paginacion',
        rowNum: 10,
        rowList: [15, 30],
        sortname: 'idCliente',
        sortorder: 'asc',
        viewrecords: true,
        caption: 'CLIENTES'
    });

});

function anadir_a_cesta(codPelicula) {
    idCantidad = $("#txtCantidad_" + codPelicula).val();
    $.cookie('carCompra[' + codPelicula + ']', idCantidad);
    $(location).attr('href', 'carro.php');
}
function elim_en_carro(codPelicula) {
    $.removeCookie('carCompra[' + codPelicula + ']');
    $(location).attr('href', 'carro.php');
}
