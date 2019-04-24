        <!-- Heading page / start-->
        <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white">PLANES DE JARDINERÍA</h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url();?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>web/planes">LISTADO PLANES</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / end-->

        <!-- Page Content / start-->
        <article class="page-content p-t-50 p-b-80">
            <div class="container">
                <div class="content-area">
                    <div class="clearfix"></div>
                    <div class="shop-content shop-content-full-width">
                        <ul class="products row">

                            <?php foreach($planes as $plan): ?>
                            <li class="product col-md-4 col-sm-6 matchHeigh">
                                <div class="image-box image-box-5">
                                    <div class="image">
                                        <a class="bg-overlay" href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>"></a>
                                        <img src="<?= base_url();?>assets/manager/categorias/<?= $plan->imagen_categoria; ?>" alt="planes de jardineria" />
                                        <a class="btn-quickview" href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>">
                                            <i class="fa fa-search-plus"></i>
                                            <span>Ver detalles </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>

                        </ul>

                    </div>
                </div>
            </div>
        </article>
        <!-- Page Content / end-->