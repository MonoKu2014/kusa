
<div id="main-content">


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
    <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
</div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
        <h1>Detalle Productos</h1>
        <p>Puedes agregar tallas, colores y precios de tu producto: <strong><?= $producto[0]->nombre_producto; ?></strong>
            <a href="<?= base_url();?>productos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
            <div class="clearfix"></div>
        </p>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

        <?= $this->session->flashdata('mensaje');?>
        <div class="clearfix"></div>
        <br>

        <form enctype="multipart/form-data" method="post" action="<?= base_url();?>productos/guarda_tallas">

            <input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto;?>">

            <div class="col-md-3">
                <select name="talla" class="form-control">
                    <option value="">Selecciona la talla</option>
                    <option value="U">Producto único</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="text" name="color" placeholder="Ingresa el color" class="form-control">
            </div>

            <div class="col-md-2">
                <input type="number" name="precio" placeholder="Precio Normal" class="form-control">
            </div>

            <div class="col-md-2">
                <input type="number" name="oferta" placeholder="Precio Oferta" class="form-control">
            </div>

            <div class="col-md-2">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
            </div>

            <div class="clearfix"></div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="submit" name="accion" value="Guardar" class="btn btn-warning">
                <input type="submit" name="accion" value="Finalizar" class="btn btn-success">
            </div>

            <div class="clearfix"></div>
        </form>

        <div class="col-lg-12"><hr></div>



        <p>Detalle de tallas, colores y cantidades de este producto</p>
        <div class="table-responsive">
					<table class="table table-striped table-bordered">
				        <thead>
				            <tr>
								<th>Talla</th>
				                <th>Color</th>
				                <th>Precio</th>
				                <th>Oferta</th>
								<th>Cantidad</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($detalle as $u){ ?>
				            <tr>
                                <?php if($u->talla == 'U'): ?>
                                    <td>Producto único</td>
                                <?php else: ?>
                                    <td><?= $u->talla; ?></td>
                                <?php endif; ?>
				                <td><?= $u->color; ?></td>
				                <td><?= money($u->precio); ?></td>
				                <td><?= money($u->oferta); ?></td>
				                <td><?= $u->cantidad; ?></td>
				                <td>
				                </td>
				            </tr>
				        	<?php } ?>
				        </tbody>
					</table>
				</div>



    </div>

</div>