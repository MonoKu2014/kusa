 <!-- page content / start-->

         <!-- heading page / .start-->
         <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white">DATOS DE ENVÍO</h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url();?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>web/carro">CARRO</a>
                    </li>

                    <li>
                        <a href="<?= base_url();?>web/datos_envio">DATOS DE ENVÍO</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- Page Content / start-->
        <article class="page-content p-t-70 p-b-100">
            <div class="woo-checkout container">

                <form class="woo-checkout-form" action="<?= base_url();?>web/medios_pago" method="post">
                    <div class="checkout-block checkout-billing">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="checkout-title">Tus datos registrados son</h3>

                                <div class="row-cs">
                                    <div class="col-cs-12 form-group">
                                        <input class="au-input-1" type="text" name="nombre" placeholder="Nombre completo" value="<?= $this->session->full_name; ?>" required>
                                    </div>
                                </div>
                                <div class="row-cs">
                                    <div class="col-cs-6 form-group p-r-5">
                                        <input class="au-input-1" type="text" name="fono" placeholder="Teléfono" value="<?= $this->session->phone; ?>" required>
                                    </div>
                                    <div class="col-cs-6 form-group p-l-5">
                                        <input class="au-input-1" type="text" name="email" placeholder="Email" value="<?= $this->session->email; ?>" required>
                                    </div>
                                </div>

                                <div class="row-cs">
                                    <div class="col-cs-12 form-group p-r-5">
                                        <select class="au-select" name="direccion_final" id="direccion_final" required>
                                            <option value="" data-display="region">Escoja una dirección</option>
                                            <?php foreach(adresses($this->session->id) as $direccion): ?>
                                                <option value="<?= $direccion->id_direccion; ?>">
                                                    <?= $direccion->calle_direccion; ?>,
                                                    <?= $direccion->numero_direccion; ?>,
                                                    <?= $direccion->nombre_region; ?>,
                                                    <?= $direccion->nombre_comuna; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="row-cs">
                                    <div class="col-cs-12 form-group">
                                        <textarea class="au-textarea" name="comentarios" placeholder="Ingrese información adicional (opcional)" style="height: 200px;"></textarea>
                                    </div>
                                </div>

                                <hr>

                                <h3 class="checkout-title">Registrar nueva dirección</h3>


                                <div class="row-cs">
                                    <div class="col-cs-6 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Dirección" id="nueva_direccion">
                                    </div>
                                    <div class="col-cs-6 form-group p-l-5">
                                        <input class="au-input-1" type="text" placeholder="Número" id="nuevo_numero">
                                    </div>
                                </div>
                                <div class="row-cs">
                                    <div class="col-cs-6 form-group p-r-5">
                                        <select class="au-select" id="region_direccion">
                                            <option data-display="region">Región</option>
                                            <?php foreach(regions() as $region): ?>
                                                <option value="<?= $region->id_region; ?>"><?= $region->nombre_region; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-cs-6 form-group p-l-5">
                                        <select class="au-select" id="comuna_direccion">
                                            <option data-display="Comuna">Comuna</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row-cs">
                                    <input class="au-input-1 btn-submit" id="save-new-address" type="submit" value="Guardar Dirección">
                                </div>

                            </div>

                            <div class="col-md-4 pull-right">
                                <div class="checkout-block no-border checkout-payment">
                                    <h3 class="checkout-title">Resumen de tu compra</h3>
                                    <table class="woo-order-content m-b-30">
                                        <thead>
                                            <tr>
                                                <th class="product">PRODUCTO</th>
                                                <th class="total">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $total = 0; ?>
                                        <?php if(count($this->session->carro) > 0): ?>
                                            <?php foreach($this->session->carro as $index => $carro): ?>
                                                <?php
                                                    $subtotal = $carro['precio'] * $carro['cantidad'];
                                                    $total = $total + $subtotal;
                                                ?>

                                                <tr>
                                                    <td class="product"><?= $carro['nombre']; ?></td>
                                                    <td class="total">$ <?= money($carro['precio']); ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                            <tr>
                                                <td class="product">Código de Descuento</td>
                                                <td class="total green"><input class="au-input-1" type="text" name="descuento" placeholder="Ingresar"></td>
                                            </tr>
                                            <tr>
                                                <td class="product">Valor despacho</td>
                                                <td class="total green"><strong>$ <?= money(delivery_value($total)); ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td class="product">Total</td>
                                                <td class="total green"><strong>$ <?= money($total + delivery_value($total)); ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input type="hidden" name="subtotal" value="<?= $total; ?>">
                                    <input type="hidden" name="valor_final" value="<?= $total + delivery_value($total); ?>">
                                    <input type="hidden" name="valor_despacho" value="<?= delivery_value($total); ?>">

                                    <div class="col-cs-5 form-group p-l-5">
                                        <input class="au-input-1 btn-submit" type="submit" value="Ir a Pagar">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </article>
        <!-- Page Content / end-->