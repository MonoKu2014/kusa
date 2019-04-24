<style>

table td, table th {
    padding: 8px;
}

</style>

<div id="main-content">


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
    <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
</div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
        <h1>Informe de stock</h1>
        <p>
            Filtrar por categoría:
        </p>
        <p>
            <select name="categoria" id="categoria" class="form-control">
                <option value="">MOSTRAR TODOS</option>
                <?php foreach($categorias as $c){ ?>
                    <option value="<?= $c->id_categoria; ?>"><?= $c->nombre_categoria; ?></option>
                <?php } ?>
            </select>
        </p>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

            <?= $this->session->flashdata('mensaje'); ?>

            <div class="clearfix"></div>

            <div class="table-responsive">
                <table class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Código producto</th>
                            <th>Nombre</th>
                            <th>Stock Real</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($productos as $u){ ?>
                        <tr class="all_rows row_<?= $u->id_categoria; ?>">
                            <td><?= $u->nombre_categoria;?></td>
                            <td><?= $u->codigo_producto;?></td>
                            <td><?= $u->nombre_producto;?></td>
                            <td><?= $u->stock_real;?></td>
                            <td><?= $u->precio_producto;?></td>
                        </tr>
				    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>

<script>
$('#categoria').on('change', function(){
    var identificador = $('#categoria option:selected').val();

    if(identificador == ''){
        $('.all_rows').show();
    } else {
        $('.all_rows').hide();
        $('.row_' + identificador).show();
    }

});
</script>