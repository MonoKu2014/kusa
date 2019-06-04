
<div id="main-content">


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
    <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
</div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
        <h1>Relacionar Productos</h1>
        <p>Vas a relacionar tu producto <strong><?= $producto[0]->nombre_producto; ?></strong>
            <a href="<?= base_url();?>productos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
            <div class="clearfix"></div>
        </p>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

        <?= $this->session->flashdata('mensaje');?>
        <div class="clearfix"></div>
        <br>

        <form enctype="multipart/form-data" method="post" action="<?= base_url();?>productos/guarda_relaciones">
            
            <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto;?>">
            
        <div class="table-responsive">
					<table class="table-striped table-bordered" style="width:100%;">
				        <thead>
				            <tr>
				                <th style="padding:5px;">ID</th>
				                <th style="padding:5px;">Producto</th>
                                <th style="padding:5px;">Relacionar</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($posibles as $p){ ?>
				            <tr>
				                <td style="padding:5px;"><?= $p->id_producto;?></td>
				                <td style="padding:5px;"><?= $p->nombre_producto;?></td>
				                <td style="padding:5px;"><input name="relacion[<?= $p->id_producto;?>]" type="checkbox"></td>
				            </tr>
				        	<?php } ?>
				        </tbody>
					</table>
				</div>


            <div class="clearfix"></div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" id="save-button" class="btn btn-success">Guardar</button>
                <a href="<?=base_url();?>productos" type="button" class="btn btn-danger">Cancelar</a>
            </div>

            <div class="clearfix"></div>
        </form>


    </div>

</div>