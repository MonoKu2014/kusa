

<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>DETALLE DE CLIENTE</h1>
            <p>
                <a href="<?= base_url();?>clientes" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Nombre Completo</span>
                        <?= $cliente[0]->nombre_cliente; ?>
                        <?= $cliente[0]->apellidop_cliente; ?>
                        <?= $cliente[0]->apellidom_cliente; ?>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Rut</span>
                        <?= $cliente[0]->rut_cliente; ?>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">E-mail</span>
                        <?= $cliente[0]->email_cliente; ?>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Password</span>
                        <?= $cliente[0]->password_cliente; ?>
                    </div>

                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Fono</span>
                        <?php if($cliente[0]->fono_cliente == ''){
                            echo 'No registrado';
                        } else {
                            echo $cliente[0]->fono_cliente;
                        }
                        ?>
                    </div>

                    <div class="col-lg-12">
                        <br>
                        <a href="<?= base_url();?>clientes" class="btn btn-default">Volver atrás</a>
                    </div>
                </div>
            </div>

</div>
