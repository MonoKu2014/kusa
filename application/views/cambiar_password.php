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
                      <h3 class="text-block text-black ">CAMBIAR CONTRASEÑA</h3>


                        <form class="woo-checkout-form" action="<?= base_url();?>web/guarda_cambio_password" method="post">
                    <div class="checkout-block checkout-billing">
                        <div class="row">




                                 <div class="row-cs">
                                    <div class="col-sm-12">
                                        <?= $this->session->flashdata('mensaje'); ?>
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="password" placeholder="Contraseña Actual" name="password_actual" required>
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="password" placeholder="Nueva Contraseña" name="password_uno" required>
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="password" placeholder="Confirma tu nueva contraseña" name="password_dos" required>
                                    </div>
                                </div>



                                <div class="clearfix"></div>

                                <div class="col-md-3 form-group p-r-5">
                                <input class="au-input-1 btn-submit" type="submit" value="Guardar cambios">
                                </div>



                                </div>










                        </div>
                    </div>

                </form>
                    </div>


                </div>
            </div>
        </article>
        <!-- section article about us / end-->