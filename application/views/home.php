
        <!-- section product banner / .start-->
        <section class="section p-t-70 p-b-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <?php if($uno->imagen_grafica != ''):?>
                        <a class="product-banner product-banner-large m-b-30" href="<?= $uno->link_grafica; ?>">
                            <img class="img-responsive" src="<?= base_url();?>assets/manager/web/<?= $uno->imagen_grafica; ?>" alt="product banner">
                            <div class="bg-overlay"></div>
                        </a>
                    <?php else:?>
                        <iframe width="100%" height="450" src="<?= $uno->video_grafica;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php endif;?>
                    </div>
                    <div class="col-md-4">
                        <a class="product-banner m-b-30" href="<?= $dos->link_grafica; ?>">
                            <img class="img-responsive" src="<?= base_url();?>assets/manager/web/<?= $dos->imagen_grafica; ?>" alt="product banner">
                            <div class="bg-overlay"></div>
                        </a>
                        <a class="product-banner m-b-30" href="<?= $tres->link_grafica; ?>">
                            <img class="img-responsive" src="<?= base_url();?>assets/manager/web/<?= $tres->imagen_grafica; ?>" alt="product banner">
                            <div class="bg-overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a class="product-banner product-banner-fullwidth" href="<?= $cuatro->link_grafica; ?>">
                            <img class="img-responsive" src="<?= base_url();?>assets/manager/web/<?= $cuatro->imagen_grafica; ?>" alt="product banner">
                            <div class="bg-overlay"></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- section product banner / .end-->

        <!-- section product featured /  .start-->
        <section class="section p-b-40 bg-white">
            <div class="container">
                <div class="block-relative">
                    <!--<div class="heading-section">
                        <h3>Featured products</h3>
                    </div> -->
                    <ul class="list-reset product-list owl-carousel owl-style-1" data-carousel-margin="30" data-carousel-nav="true" data-carousel-loop="true" data-carousel-items="4" data-carousel-lg="3" data-carousel-md="3">
                        <?php foreach(planes(4) as $plan): ?>
                            <li>
                                <div class="image-box image-box-3">
                                    <div class="image">
                                        <a class="bg-overlay" href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>"></a>
                                        <img src="<?= base_url();?>assets/manager/categorias/<?= $plan->imagen_categoria; ?>" alt="Planes de jardinaría" />
                                        <a class="btn-quickview" href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>">
                                            <i class="fa fa-search-plus"></i>
                                            <span>Ver más</span>
                                        </a>
                                    </div>

                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- section product featured /  .end-->