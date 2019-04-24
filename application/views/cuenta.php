
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
                      <h3 class="text-block text-black ">MIS DATOS</h3>

                        <br>
                        <?= $this->session->flashdata('mensaje'); ?>

                        <form class="woo-checkout-form">
                    <div class="checkout-block checkout-billing">
                        <div class="row">

                                <div class="row-cs">
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Nombre" value="<?= $this->session->name; ?>">
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Apellido Paterno" value="<?= $this->session->last_name; ?>">
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Apellido Materno" value="<?= $this->session->second_name; ?>">
                                    </div>
                                </div>
                                <div class="row-cs">
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Rut" value="<?= $this->session->rut; ?>">
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="E-mail" value="<?= $this->session->email; ?>">
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Confirma tu E-mail" value="<?= $this->session->email; ?>">
                                    </div>
                                </div>

                                 <div class="row-cs">
                                    <div class="col-md-4 form-group p-r-5">
                                      <input class="au-input-1 pull-right" type="text" placeholder="Celular ej:+569 xxxx xxxx " value="<?= $this->session->phone; ?>">
                                    </div>
                                </div>

                                <div class="row-cs">
                                <div class="col-md-12 form-group p-r-5">Fecha de Nacimiento</div>
                                    <div class="col-md-2 form-group p-r-5">
                                        <select class="au-select" name="dia">
                                            <option>Dia</option>
                                            <?php for($x = 1; $x <= 31; $x++): ?>
                                                <?php ($x == $dia) ? $sel = 'selected' : $sel = ''; ?>
                                                <option value="<?= $x; ?>" <?= $sel; ?>><?= $x; ?></option>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group p-r-5">
                                        <select class="au-select" name="mes">
                                            <option>Mes</option>
                                            <?php for($x = 1; $x <= 12; $x++): ?>
                                                <?php ($x == $mes) ? $sel = 'selected' : $sel = ''; ?>
                                                <option value="<?= $x; ?>" <?= $sel; ?>><?= $x; ?></option>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group p-r-5">
                                        <select class="au-select" name="anio">
                                            <option>Año</option>
                                            <?php for($x = 1900; $x <= date('Y'); $x++): ?>
                                                <?php ($x == $anio) ? $sel = 'selected' : $sel = ''; ?>
                                                <option value="<?= $x; ?>" <?= $sel; ?>><?= $x; ?></option>
                                            <?php endfor;?>
                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix"></div><br><br>


                                <div class="col-md-12 form-group p-r-5">
                                     <h3 class="text-block text-black ">DIRECCIÓN PRINCIPAL / INFORMACIÓN DE DESPACHO</h3>
                                </div>


                                <div class="row-cs">
                                    <div class="col-md-8 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Dirección" value="<?= $direccion->calle_direccion; ?>">
                                    </div>
                                    <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1" type="text" placeholder="Número" value="<?= $direccion->numero_direccion; ?>">
                                    </div>
                                </div>
                                <div class="row-cs">
                                    <div class="col-md-6 form-group p-r-5">
                                        <select class="au-select" name="region" id="region_direccion">
                                            <option data-display="region">Región</option>
                                            <?php foreach(regions() as $region): ?>
                                                <?php ($region->id_region == $direccion->region_direccion) ? $sel = 'selected' : $sel = ''; ?>
                                                <option <?= $sel; ?> value="<?= $region->id_region; ?>"><?= $region->nombre_region; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group p-r-5">
                                        <select class="au-select" name="comuna" id="comuna_direccion">
                                            <option data-display="<?= $direccion->comuna_direccion; ?>"><?= $direccion->nombre_comuna; ?></option>
                                        </select>
                                    </div>
                                </div>






                          <!--<div class="col-md-3 form-group p-r-5">
                                <input class="au-input-1 btn-submit" type="submit" value="Guardar cambios">
                          </div>-->



                        </div>
                    </div>

                </form>
                    </div>


                </div>
            </div>
        </article>
        <!-- section article about us / end-->
