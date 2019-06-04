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
                        <a href="<?= base_url();?>web/gracias">RESULTADO DE SU COMPRA</a>
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
                    <div class="col-lg-12">
                        <h3><?= $mensaje_final; ?></h3>
                    </div>


                    <div class="col-md-12">
                        <?php if($this->session->flashdata('error')): ?>
                            <p class="alert alert-warning">
                            <b>Lo sentimos, En estos momentos no es posible realizar el pago a través de Webpay</b><br>
                            La orden de Compra <?= $this->session->id_pedido; ?> fue rechazada<br>
                            Las posibles causas de este rechazo son:<br>
                            - Error en el ingreso de los datos de su tarjeta de Crédito o Débito (fecha y/o código de seguridad).<br>
                            - Su tarjeta de Crédito o Débito no cuenta con saldo suficiente.<br>
                            - Tarjeta aún no habilitada en el sistema financiero.<br><br>

                            <b>Por favor, intente las siguientes opciones:</b><br>
                                - Pagar a través de una transferencia bancaria<br>
                                - Contáctenos a través de alguno de los medios que aparecen acá en el sitio<br>
                                - Intente una vez más en unos segundos.
                            </p>
                        <?php endif; ?>
                    </div>



                    <div class="col-lg-12">
                        <h3>DETALLE DE SU COMPRA</h3>

                        <table class="table">
                            <tr>
                                <td>Número de pedido/OC</td>
                                <td><b><?= $id_pedido; ?></b></td>
                            </tr>
                            <tr>
                                <td>Número de tarjeta</td>
                                <td><b>XXXXXXXXXX<?= $tarjeta; ?></b></td>
                            </tr>
                            <tr>
                                <td>Código de autorización</td>
                                <td><b><?= $codigoAuth; ?></b></td>
                            </tr>

                            <?php if($tipoPago == 'VD'): ?>
                            <tr>
                                <td>Tipo de pago</td>
                                <td><b>Tarjeta Débito</b></td>
                            </tr>
                            <?php endif;?>

                            <?php if($tipoPago == 'VN' || $tipoPago == 'SI'): ?>
                            <tr>
                                <td>Tipo de pago</td>
                                <td><b>Tarjeta Crédito/Mastercard</b></td>
                            </tr>
                            <tr>
                                <td>Número de cuotas</td>
                                <td><b><?= $cuotas; ?></b></td>
                            </tr>
                            <?php endif;?>

                            <?php if($tipoPago == 'SI'): ?>
                            <tr>
                                <td>Valor cuota</td>
                                <td><b><?= money($valorCuota); ?></b></td>
                            </tr>
                            <?php endif;?>

                            <tr>
                                <td>Total</td>
                                <td><b><?= money($total); ?> CLP</b></td>
                            </tr>
                            <tr>
                                <td>Fecha transacción</td>
                                <td><b><?= $fecha; ?></b></td>
                            </tr>
                        </table>
                    </div>


                    <div class="woo-shopping-cart container">
                        <form class="woo-cart-form">
                            <table class="woo-cart-form-content">
                                <thead>
                                    <tr>
                                        <th class="blank"></th>
                                        <th class="product-thumbnail">PRODUCTO</th>
                                        <th class="product-name">NOMBRE</th>
                                        <th class="product-price">PRECIO</th>
                                        <th class="product-quantity">CANTIDAD</th>
                                        <th class="product-subtotal">TOTAL</th>
                                        <th class="blank"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php if(count($carro) > 0): ?>
                                    <?php foreach($carro as $index => $carro): ?>
                                        <?php $subtotal = $carro['precio'] * $carro['cantidad'];?>
                                        <!--producto -->
                                        <tr class="woo-cart-form-cart-item">
                                            <td class="blank"></td>
                                            <td class="product-thumbnail">
                                                <img src="<?= base_url();?>assets/manager/productos/<?= $carro['imagen']; ?>" alt="nombre del producto">
                                            </td>
                                            <td class="product-name">
                                                <a><?= $carro['nombre']; ?></a><br>
                                                <small>sku: <?= $carro['codigo']; ?></small>
                                            </td>
                                            <td class="product-price">
                                                <span class="woocommerce-Price-amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span><?= money($carro['precio']); ?></span>
                                            </td>
                                            <td class="product-quantity">
                                                <span><?= $carro['cantidad']; ?></span>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="woocommerce-Price-amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span><?= money($subtotal); ?></span>
                                            </td>
                                            <td class="blank"></td>
                                        </tr>
                                        <!--fin producto -->
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>


                            <div class="woo-cart-form-bottom block-contain">
                                <div class="block-right"><br>
                                <p class="totals pull-right">
                                        <span>Despacho:</span>
                                        <span class="woocommerce-Price-currencySymbol">$</span><?= money($despacho); ?>
                                    </p><br>
                                    <p class="totals pull-right">
                                        <span>Total:</span>
                                        <span class="woocommerce-Price-currencySymbol">$</span><?= money($subtotal + $despacho); ?>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </article>
        <!-- section article about us / end-->
