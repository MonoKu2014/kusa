
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
                        <a href="<?= base_url();?>web/direcciones">MIS DIRECCIONES</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- section article about us / start-->
        <article class="section about-post bg-white p-t-90 p-b-100">
            <div class="container">
                <div class="row">

                <!--lateral -->
                <?php $this->load->view('layout/lateral'); ?>
                <!--fin lateral -->

                    <div class="col-md-8 pull-right">
                      <h3 class="text-block text-black ">MIS DIRECCIONES</h3>


                        <form class="woo-checkout-form">
                    <div class="checkout-block checkout-billing">
                        <div class="row">


                                <div class="row-cs">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Calle/Avenida</th>
                                                <th class="product-name">Número</th>
                                                <th class="product-price">Región</th>
                                                <th class="product-quantity">Comuna</th>
                                                <th class="product-remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $total = 0; ?>
                                        <?php if(count($direcciones) > 0): ?>
                                            <?php foreach($direcciones as $index => $direccion): ?>
                                                <!--producto -->
                                                <tr class="woo-cart-form-cart-item">
                                                    <td class="product-thumbnail">
                                                        <?= $direccion->calle_direccion; ?>
                                                    </td>
                                                    <td class="product-name">
                                                        <?= $direccion->numero_direccion; ?>
                                                    </td>
                                                    <td class="product-price">
                                                        <?= $direccion->nombre_region; ?>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <?= $direccion->nombre_comuna; ?>
                                                    </td>
                                                    <td class="product-remove">
                                                        <?php if($direccion->tipo_direccion != 1): ?>
                                                            <a class="fa fa-remove eliminar-direccion" href="#" data-toggle="tooltip" data-index="<?= $direccion->id_direccion; ?>" title="Eliminar dirección"></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <!--fin producto -->
                                            <?php endforeach;?>
                                        <?php endif;?>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="clearfix"></div><br><br>

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
                    </div>

                </form>
                    </div>


                </div>
            </div>
        </article>
        <!-- section article about us / end-->
