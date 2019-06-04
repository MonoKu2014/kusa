<!-- heading page / .start-->
<div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url(); ?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/medios_pago">PAGAR</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- section article about us / start-->
        <article class="section about-post bg-white p-t-90 p-b-100">
            <div class="container">
                <div class="row">


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

                    <div class="col-md-8">
                        <div class="about-post-content">
                            <h3 class="text-block text-black text-med text-bold">MEDIOS DE PAGO</h3>
                                TRANSFERENCIA BANCARIA/  INDICA TU NÚMERO DE PEDIDO EN EL ASUNTO (NÚMERO <?= $this->session->id_pedido; ?>).<br>
                                Datos de Transferencia Kusa<br><br>
                                Nombre: Lugh SpA<br>

                                R.U.T: 76.626.665-7<br>

                                Banco: Scotiabank<br>

                                Tipo de Cuenta: Cuenta Corriente<br>

                                Número de Cuenta: 973949616<br>

                                E-Mail para confirmación: pagos@kusa.cl<br>

                                Asunto: Pago pedido número <?= $this->session->id_pedido; ?><br>
                                <br>
                                Cualquier duda o consulta llámanos al FONO ASISTENCIA o también vía Whatsapp

                                (+569)9 428 43 44
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">


                        <div class="checkout-block no-border checkout-payment">
                            <table class="woo-order-content m-b-30">
                                <thead>
                                    <tr>
                                        <th class="product">DETALLE</th>
                                        <th class="total">VALOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product">NÚMERO DE PEDIDO</td>
                                        <td class="total green"><strong><?= $this->session->id_pedido; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="product">Valor despacho</td>
                                        <td class="total green"><strong>$ <?= money($this->session->despacho); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="product">Sub-Total</td>
                                        <td class="total green"><strong>$ <?= money($this->session->subtotal); ?></strong></td>
                                    </tr>
                                    <?php if($this->session->descuento !== null): ?>
                                        <tr>
                                            <td class="product">Cupon de Descuento</td>
                                            <td class="total green"><strong><?= $this->session->descuento; ?>%</strong></td>
                                        </tr>
                                    <?php endif;?>
                                    <tr>
                                        <td class="product">Total</td>
                                        <td class="total green"><strong>$ <?= money($this->session->total); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <a href="<?= base_url();?>web/pagar">
                            <img src="<?= base_url();?>assets/images/pagar-webpay.jpg" class="img-responsive" alt="paga con webpay">
                        </a>
                    </div>
                </div>
            </div>
        </article>
        <!-- section article about us / end-->