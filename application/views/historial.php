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
                      <h3 class="text-block text-black ">MI HISTORIAL DE COMPRAS</h3>

                        <br><br>
                        <?php if(count($pedidos) == 0): ?>
                            <p>Aún no posees historial de compras.</p>
                        <?php else: ?>
                            <br><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Nº Orden</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Tracking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pedidos as $pedido): ?>
                                        <tr>
                                            <th scope="row"><?= $pedido->id_pedido; ?></th>
                                            <td scope="row"><?= $pedido->fecha_pedido; ?></td>
                                            <td scope="row"><?= $pedido->hora_pedido; ?></td>
                                            <td scope="row"><?= $pedido->estado; ?></td>
                                            <td scope="row">
                                                <a href="#" class="ver-detalle-historial" data-id="<?= $pedido->id_pedido; ?>">Ver Detalle</a>
                                            </td>
                                            <td scope="row">
                                                <a href="#" class="ver-tracking-historial" data-id="<?= $pedido->id_pedido; ?>">Ver Tracking</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>


                    </div>


                </div>
            </div>
        </article>
        <!-- section article about us / end-->


<div id="modal-historial-pedidos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="padding-right: 0px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="contenido-modal-historial">
    </div>
  </div>
</div>