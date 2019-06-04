
        <!-- heading page / .start-->
        <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white">INICIAR SESIÓN</h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url(); ?>">INICIO</a>
                    </li>
                    <li>
                        <a href="login.php">INICIAR SESIÓN</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- section article about us / start-->
        <article class="section about-post bg-white p-t-90 p-b-100">
            <div class="container">
                <div class="col-lg-12">
                    <?php if($this->session->flashdata('error')){
                        echo alert_info('Para poder comprar debes iniciar tu sesión o regístrarte');
                    } ?>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="col-lg-12">

                        <?= $this->session->flashdata('mensaje'); ?>
                        
                        <h3 class="text-block text-black ">ACCEDE A TU CUENTA</h3>
                        <form class="woo-checkout-form" action="<?= base_url();?>web/ingresar" method="post">
                            <div class="checkout-block checkout-billing">
                                <div class="row">
                                    <div class="row-cs">
                                        <div class="col-md-12 form-group p-r-5">
                                            <input class="au-input-1" type="text" name="email" placeholder="E-Mail" required>
                                        </div>
                                        <div class="col-md-12 form-group p-r-5">
                                            <input class="au-input-1" type="password" name="password" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group p-r-5">
                                        <button class="au-input-1 btn-submit">Ingresar</button>
                                    </div>
                                    <div class="col-md-12 form-group p-r-5">
                                        <p class="text-center">¿Olvidaste la contraseña?,
                                        <a href="<?= base_url();?>web/recupera" class="green">Recupérala Aquí</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="col-md-6 pull-right">
                      <div class="col-lg-12">
                      <h3 class="text-block text-black ">¿AÚN NO ESTÁS REGISTRADO?</h3>
                        <form class="woo-checkout-form" method="post" action="<?= base_url();?>web/registro">
                            <div class="checkout-block checkout-billing">
                                <div class="row">
                                    <div class="row-cs">
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="text" placeholder="Nombre" name="nombre" required pattern="^[A-Za-z\s]+$" maxlength="35">
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="text" placeholder="Apellido Paterno" name="paterno" required pattern="^[A-Za-z\s]+$" maxlength="35">
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="text" placeholder="Apellido Materno" name="materno" required pattern="^[A-Za-z\s]+$" maxlength="35">
                                        </div>
                                    </div>
                                    <div class="row-cs">
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="text" id="rut" placeholder="Rut (9999999-9)" name="rut" required>
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="email" placeholder="E-mail" name="email" required>
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="email" placeholder="Confirma tu E-mail" name="email_confirm" required>
                                        </div>
                                    </div>
                                    <div class="row-cs">
                                        <div class="col-md-4 form-group p-r-5">
                                        <input class="au-input-1 pull-right" type="text" placeholder="Celular ej:569xxxxxxxx" name="fono" required pattern="^(0|[1-9][0-9]*)$" maxlength="11">
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="password" placeholder="Contraseña" name="password" required>
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="password" placeholder="Confirma tu contraseña" name="password_confirm" required>
                                        </div>
                                    </div>

                                    <div class="row-cs">
                                        <div class="col-md-12 form-group p-r-5">Fecha de Nacimiento</div>
                                        <div class="col-md-3 form-group p-r-5">
                                            <select class="au-select" name="dia" required>
                                                <option value="" data-display="dia">Dia</option>
                                                <?php for($x = 1; $x <= 31; $x++): ?>
                                                    <option value="<?= $x; ?>"><?= $x; ?></option>
                                                <?php endfor;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group p-r-5">
                                            <select class="au-select" name="mes" required>
                                                <option value="" data-display="mes">Mes</option>
                                                <?php for($x = 1; $x <= 12; $x++): ?>
                                                    <option value="<?= $x; ?>"><?= $x; ?></option>
                                                <?php endfor;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group p-r-5">
                                            <select class="au-select" name="anio" required>
                                                <option value="" data-display="anio">Año</option>
                                                <?php for($x = 1900; $x <= date('Y'); $x++): ?>
                                                    <option value="<?= $x; ?>"><?= $x; ?></option>
                                                <?php endfor;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div><br><br>

                                    <div class="col-md-12 form-group p-r-5">
                                        <h3 class="text-block text-black ">DIRECCIÓN / INFORMACIÓN DE DESPACHO</h3>
                                    </div>
                                    <div class="row-cs">
                                        <div class="col-md-8 form-group p-r-5">
                                            <input class="au-input-1" type="text" placeholder="Dirección" name="direccion" required pattern="^[A-Za-z\s]+$" maxlength="100">
                                        </div>
                                        <div class="col-md-4 form-group p-r-5">
                                            <input class="au-input-1" type="text" placeholder="Número" name="numero" required pattern="^(0|[1-9][0-9]*)$" maxlength="8">
                                        </div>
                                    </div>
                                    <div class="row-cs">
                                        <div class="col-md-6 form-group p-r-5">
                                        <select class="au-select" name="region" id="region_direccion" required>
                                            <option value="" data-display="region">Región</option>
                                            <?php foreach(regions() as $region): ?>
                                                <option value="<?= $region->id_region; ?>"><?= $region->nombre_region; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group p-r-5">
                                        <select class="au-select" name="comuna" id="comuna_direccion" required>
                                            <option value="" data-display="Comuna">Comuna</option>
                                        </select>
                                    </div>
                                    <div class="form-check col-md-12">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="recibe" value="Si">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Deseo recibir descuentos y promociones por e-mail
                                        </label><br>
                                    </div>
                                    <div class="col-md-3 form-group p-r-5">
                                        <input class="au-input-1 btn-submit" type="submit" value="Registrarme">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </article>
        <!-- section article about us / end-->
