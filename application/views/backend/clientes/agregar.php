

<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>AGREGAR CLIENTE</h1>
            <p>
                <a href="<?= base_url();?>clientes" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
                <form method="post" action="<?= base_url();?>clientes/guardar">

                <?= $this->session->flashdata('mensaje'); ?>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Nombres(*):</span>
                        <input type="text" required id="nombre" name="nombre" placeholder="Nombres" class="form-control required" pattern="[a-zA-Z][a-zA-Z0-9\s]*" maxlength="35">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Apellido Paterno(*):</span>
                        <input class="form-control required" type="text" required placeholder="Apellido Paterno" name="paterno" pattern="[a-zA-Z][a-zA-Z0-9\s]*" maxlength="35">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Apellido Materno(*):</span>
                        <input class="form-control required" type="text" required placeholder="Apellido Materno" name="materno" pattern="[a-zA-Z][a-zA-Z0-9\s]*" maxlength="35">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Rut(*):</span>
                        <input class="form-control required" type="text" required id="rut" placeholder="Rut (9999999-9)" name="rut">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Celular(*):</span>
                        <input class="form-control required" type="text" required placeholder="Celular ej:569xxxxxxxx" name="fono" pattern="^(0|[1-9][0-9]*)$" maxlength="11">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Email(*):</span>
                        <input type="email" id="email" required name="email" class="form-control required" placeholder="ejemplo@ejemplo.cl">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <span>Password(*):</span>
                        <input type="text" required id="password" name="password" class="form-control required">
                    </div>


                    <div class="col-md-12 form-group"><span>Fecha de Nacimiento</span></div>
                    <div class="col-md-2 form-group">
                        <select class="form-control required" name="dia" required>
                            <option value="" data-display="dia">Dia</option>
                            <?php for($x = 1; $x <= 31; $x++): ?>
                                <option value="<?= $x; ?>"><?= $x; ?></option>
                            <?php endfor;?>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <select class="form-control required" name="mes" required>
                            <option value="" data-display="mes">Mes</option>
                            <?php for($x = 1; $x <= 12; $x++): ?>
                                <option value="<?= $x; ?>"><?= $x; ?></option>
                            <?php endfor;?>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <select class="form-control required" name="anio" required>
                            <option value="" data-display="anio">Año</option>
                            <?php for($x = 1900; $x <= date('Y'); $x++): ?>
                                <option value="<?= $x; ?>"><?= $x; ?></option>
                            <?php endfor;?>
                        </select>
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