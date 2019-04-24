

<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>EDITAR CLIENTE</h1>
            <p>
                <a href="<?= base_url();?>clientes" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
                <form method="post" action="<?= base_url();?>clientes/guardar_edicion">
                    <input type="hidden" name="id_cliente" class="form-control" value="<?= $cliente[0]->id_cliente; ?>">
                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Nombre Completo</h5>
                        <input type="text" name="nombre" class="form-control" value="<?= $cliente[0]->nombre_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Rut Cliente (*)</h5>
                        <input type="text" name="rut" class="form-control" required value="<?= $cliente[0]->rut_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">E-mail</h5>
                        <input type="text" name="email" class="form-control" value="<?= $cliente[0]->email_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Clave</h5>
                        <input type="password" name="password" class="form-control" required value="<?= $cliente[0]->password_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Fono</h5>
                        <input type="text" name="fono" class="form-control" value="<?= $cliente[0]->fono_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Región</h5>
                        <select name="region" class="form-control" required id="region">
                            <option value="">Selecciona región</option>
                            <?php foreach ($this->functions->listarRegiones() as $r) { ?>
                                <option <?php if($cliente[0]->region_cliente == $r->nombre_region){echo 'selected';} ?> value="<?= $r->nombre_region;?>" data-id="<?= $r->id_region;?>"><?= $r->nombre_region;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Comuna</h5>
                        <select name="comuna" class="form-control" required id="comuna">
                            <option value="<?= $cliente[0]->comuna_cliente; ?>"><?= $cliente[0]->comuna_cliente; ?></option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Calle</h5>
                        <input type="text" name="calle" class="form-control" value="<?= $cliente[0]->calle_cliente; ?>">
                    </div>

                    <div class="col-lg-6">
                        <h5 style="font-weight: bold;">Número</h5>
                        <input type="text" name="numero" class="form-control" value="<?= $cliente[0]->numero_cliente; ?>">
                    </div>

                    <div class="col-lg-12">
                        <br>
                        <input type="submit" class="btn btn-success" value="Guardar">
                        <a href="<?= base_url();?>clientes" class="btn btn-default">Volver atrás</a>
                    </div>
                </form>
            </div>

</div>


<script>

$('#region').on('change', function(){

    var ide = $('#region option:selected').data('id');

    $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>clientes/comunasPorRegion',
        data: {
            ide:ide
        },
        success: function(res) {
            $('#comuna').empty().html(res);
        }
    });

});

</script>