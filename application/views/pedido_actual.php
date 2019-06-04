  <!-- heading page / .start-->
  <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white">MI CUENTA</h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url();?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>web/cuenta">MI CUENTA</a>
                    </li>
                     <li>
                        <a href="<?= base_url();?>web/pedido_actual">ESTADO DE MI PEDIDO</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- section article about us / start
        la clase es green para dar activo
        -->
        <article class="section about-post bg-white p-t-90 p-b-100">
            <div class="container">
                <div class="row">

                <img src="<?= base_url();?>assets/images/icons/ic-decor.png" class="center-block">

                <?php if($pedido === null): ?>
                    <h3 class="text-center"><strong>No tienes ningún pedido actual</strong></h3>
                <?php else: ?>
                    <h3 class="text-center"><strong>Tracking Pedido N°: <?= $pedido->id_pedido; ?></strong></h3>
                    <p class="text-center">Fecha de compra: <?= format_custom_date($pedido->fecha_pedido); ?></p>
                    <p class="text-center"><strong>Tu pedido actualmente esta en estado:
                    <?= strtoupper(state($pedido->estado_pedido)->estado); ?></strong></p>





                    <div class="clearfix"></div><br><br>
                    <div class="col-md-3 <?= ($pedido->estado_pedido == 1) ? 'box-active' : ''; ?>">
                    <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 1) ? 'green' : 'gray'; ?>">1</strong></h4>
                    <p class="text-center <?= ($pedido->estado_pedido == 1) ? 'green' : 'gray'; ?>"><strong>Compra Aprobada</strong></p>
                    <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 1); ?></p>
                    </div>
                    <div class="col-md-3 <?= ($pedido->estado_pedido == 2) ? 'box-active' : ''; ?>">
                    <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 2) ? 'green' : 'gray'; ?>">2</strong></h4>
                    <p class="text-center <?= ($pedido->estado_pedido == 2) ? 'green' : 'gray'; ?>">Preparando producto</p>
                    <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 2); ?></p>
                    </div>
                    <div class="col-md-3 <?= ($pedido->estado_pedido == 3) ? 'box-active' : ''; ?>">
                    <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 3) ? 'green' : 'gray'; ?>">3</strong></h4>
                    <p class="text-center <?= ($pedido->estado_pedido == 3) ? 'green' : 'gray'; ?>">Producto Despachado</p>
                    <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 3); ?></p>
                    </div>
                    <div class="col-md-3 <?= ($pedido->estado_pedido == 4) ? 'box-active' : ''; ?>">
                    <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 4) ? 'green' : 'gray'; ?>">4</strong></h4>
                    <p class="text-center <?= ($pedido->estado_pedido == 4) ? 'green' : 'gray'; ?>">Producto Entregado</p>
                    <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 4); ?></p>
                    </div>

                    <div class="clearfix"></div><br><br>
                <?php endif; ?>

                    <div class="block-left" style="margin-top:50px;">
                        <input type="button" value="Volver atrás" id="back_cuenta" class="btn btn-block" />
                    </div>


                    </div>
            </div>
        </article>
        <!-- section article about us / end-->
