

<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>Cambiar Gráfica</h1>
            <p>Los campos marcados con (*) son obligatorios
                <a href="<?= base_url();?>grafica" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

            <?= $this->session->flashdata('mensaje');?>

            <form id="add-user" method="post" action="<?= base_url();?>grafica/editar_grafica" enctype="multipart/form-data">

                <p>La imagen debe tener un tamaño de 960 x 450 pixeles</p>
                <p>Tu Imagen actual es:
                    <a target="_blank" href="<?= base_url();?>assets/grafica/<?= $grafica[0]->imagen_grafica;?>">
                        <?= $grafica[0]->imagen_grafica;?>
                    </a>
                    para cambiarla sólo sube otra imagen
                </p>
                <input type="hidden" name="imagen_actual" value="<?= $grafica[0]->imagen_grafica;?>">
                <input type="hidden" name="id_grafica" value="<?= $grafica[0]->id_grafica;?>">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <span>Imagen:</span>
                    <input type="file" id="archivo" name="archivo" class="form-control required">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <span>Vídeo:</span>
                    <input type="file" id="archivo" name="archivo" class="form-control required">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <span>Estado(*):</span>
                    <select name="estado" id="estado" class="form-control required">
                        <option selected value="1" <?php if($grafica[0]->estado == 1){echo 'selected';} ?>>Activo</option>
                        <option value="2" <?php if($grafica[0]->estado == 2){echo 'selected';} ?>>Inactivo</option>
                    </select>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" id="save-button" class="btn btn-success">Guardar</button>
                    <a href="<?=base_url();?>grafica" type="button" class="btn btn-danger">Cancelar</a>
                </div>

                <div class="clearfix"></div>
            </form>


        </div>

</div>