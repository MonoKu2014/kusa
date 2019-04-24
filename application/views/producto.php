
        <!-- heading page / .start-->
        <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white"><?= strtoupper($producto->nombre_producto); ?></h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url(); ?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/productos/<?= slug_cat($producto->id_categoria, $producto->nombre_categoria); ?>">LISTADO PRODUCTOS </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/producto/<?= slug_prod($producto->id_producto, $producto->nombre_producto); ?>">DETALLE PRODUCTO</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Heading page / . end-->

        <!-- Page Content / start-->
        <div class="page-content p-t-50 p-b-50">
            <div class="single-product">
                <div class="container">
                    <div class="single-product-detail m-b-20">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="product-image-content m-b-30">
                                    <div class="owl-carousel" data-carousel-items="1" data-carousel-dotsData="true" data-carousel-nav="true" data-carousel-dots="true" data-carousel-xs="1" data-carousel-sm="1" data-carousel-md="1" data-carousel-lg="1" data-carousel-animateout="fadeOut" data-carousel-animatein="fadeIn">
                                        <?php if($producto->imagen_1 != ''): ?>
                                            <img data-dot="&lt;img src='<?= base_url();?>assets/manager/productos/<?= $producto->imagen_1; ?>'&gt;" src="<?= base_url();?>assets/manager/productos/<?= $producto->imagen_1; ?>" alt="que aqui vaya el titulo del producto">
                                        <?php endif; ?>

                                        <?php if($producto->imagen_2 != ''): ?>
                                            <img data-dot="&lt;img src='<?= base_url();?>assets/manager/productos/<?= $producto->imagen_2; ?>'&gt;" src="<?= base_url();?>assets/manager/productos/<?= $producto->imagen_2; ?>" alt="que aqui vaya el titulo del producto">
                                        <?php endif; ?>

                                        <?php if($producto->imagen_3 != ''): ?>
                                            <img data-dot="&lt;img src='<?= base_url();?>assets/manager/productos/<?= $producto->imagen_3; ?>'&gt;" src="<?= base_url();?>assets/manager/productos/<?= $producto->imagen_3; ?>" alt="que aqui vaya el titulo del producto">
                                        <?php endif; ?>

                                        <?php if($producto->imagen_4 != ''): ?>
                                            <img data-dot="&lt;img src='<?= base_url();?>assets/manager/productos/<?= $producto->imagen_4; ?>'&gt;" src="<?= base_url();?>assets/manager/productos/<?= $producto->imagen_4; ?>" alt="que aqui vaya el titulo del producto">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-summary">
                                    <h2 class="product-title text-block m-b-10"><?= strtoupper($producto->nombre_producto); ?></h2>
                                    <p><small>SKU: <?= $producto->codigo_producto; ?></small></p>


                                    <h4>Características</h4>
                                    <p class="product-short-description m-b-15">
                                        <?= $producto->descripcion_producto; ?>
                                    </p>

                                    <a href="#" class="btn btn-buynow green"> <img src="<?= base_url();?>assets/images/icon-descargar.svg"> Descargar Ficha</a>

                                    <hr>

                                    <span class="product-price m-b-15">Precio: <span class="green">$<?= money($producto->precio_producto); ?></span></span>

                                    <hr>

                                    <div class="product-select row-cs m-b-20">

                                        <div class="col-cs-6 p-l-5">
                                            <div class="quantity" data-toggle="tooltip" title="Cantidad">
                                                <span class="decrease"></span>
                                                <input class="au-input-number cantidad_producto" type="number" value="1" min="1" max="100">
                                                <span class="increase"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <button class="au-btn add-to-cart btn-block m-b-30" data-id="<?= $producto->id_producto; ?>">Agregar al Carro</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <section class="section p-t-50">
                <div class="container">
                    <div class="heading-section text-center">

                    <img src="<?= base_url();?>assets/images/icon-kusa.svg" class="center-block">

                    <h4>Otros Productos que te pueden interesar</h4>
                    </div>
                    <ul class="list-reset product-list row">

                    <?php foreach($relacionados as $relacion): ?>
                    <!--plan -->
                        <li class="col-md-3 col-sm-6">
                            <div class="image-box image-box-3">
                                <a href="<?= base_url();?>web/producto/<?= slug_prod($relacion->id_producto, $relacion->nombre_producto); ?>">
                                      <img src="<?= base_url();?>assets/manager/productos/<?= $relacion->imagen_1; ?>" alt="titulo del producto" class="grow-shadow" />
                                    </a>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="<?= base_url();?>web/producto/<?= slug_prod($relacion->id_producto, $relacion->nombre_producto); ?>"><?= $relacion->nombre_producto; ?></a>
                                    </h4>
                                    <div class="info">
                                        <span class="price">$<?= money($relacion->precio_producto); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <!--fin plan -->
                    <?php endforeach; ?>


                    </ul>
                </div>
            </section>
        </div>
        <!-- Page Content / end-->