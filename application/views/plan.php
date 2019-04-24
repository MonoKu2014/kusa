 <!-- heading page / .start-->
 <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white"><?= strtoupper($producto->nombre_producto); ?></h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url(); ?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/planes">LISTADO PLANES </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/productos_planes/<?= slug_cat($producto->id_categoria, $producto->nombre_categoria); ?>">LISTADO PLANES </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>web/plan/<?= slug_cat($producto->id_categoria, $producto->nombre_producto); ?>">DETALLE PLAN</a>
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
                                        <img data-dot="&lt;img src='<?= base_url();?>assets/images/hasta100-1.jpg'&gt;" src="<?= base_url();?>assets/images/hasta100-1.jpg" alt="que aqui vaya el titulo del producto">
                                        <img data-dot="&lt;img src='<?= base_url();?>assets/images/ejemplo-plan.jpg'&gt;" src="<?= base_url();?>assets/images/ejemplo-plan.jpg" alt="que aqui vaya el titulo del producto">
                                        <img data-dot="&lt;img src='<?= base_url();?>assets/images/ejemplo-plan2.jpg'&gt;" src="<?= base_url();?>assets/images/ejemplo-plan2.jpg" alt="que aqui vaya el titulo del producto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-summary">
                                    <h2 class="product-title text-block m-b-10"> <?= strtoupper($producto->nombre_producto); ?> </h2>
                                    <p><small>SKU: <?= $producto->codigo_producto; ?></small></p>

                                    <h4>Características</h4>
                                    <p class="product-short-description m-b-15">
                                    <?= $producto->descripcion_producto; ?>
                                    </p>

                                    <!-- AGREGAR FICHA PDF -->
                                    <a href="#" class="btn btn-buynow green"> <img src="<?= base_url();?>assets/images/icon-descargar.svg"> Descargar Ficha</a>
                                    <!-- AGREGAR FICHA PDF -->

                                    <hr>

                                    <span class="product-price m-b-15">Precio: <span class="green">$<?= money($producto->precio_producto); ?></span></span>
                                    <small>
                                        Todos los planes incluyen IVA<br>
                                        10% descuento para contratos con Pago Automático PAC<br>
                                        (*) Aplicación de Mulching según evaluación de zona.
                                    </small>
                                    <hr>
                                    <a class="au-btn add-to-cart btn-block m-b-30" href="https://api.whatsapp.com/send?phone=56994284344&text=Hola%2C%20me%20gustaria%20saber%20mas%20información%20de%20sus%20planes">
                                        <img src="<?= base_url();?>assets/images/wp.svg"> Quiero información de este plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--fin detalles plan -->

                    <!--detalles del servicio -->
                    <div class="col-md-12">

 <h3>Detalles del Servicio</h3>
<p class="product-short-description m-b-15">


<strong>Detalle de servicio:</strong><br>
Nuestra formula es  entregar un servicio profesional de alto estándar con conocimiento en manejo de especies ornamentales, cuidado por el paisaje y reflejar el cariño y respeto por el entorno en cada acción. <br>
<br>


<strong>Verano / PERIODO DE 8 MESES |SEPTIEMBRE-ABRIL:</strong> Corte con sistema Mulching* para optimizar la permanencia de humedad del suelo. Incluye un servicio de aireado por periodo, para contribuir a la descompactación del suelo en temporada estival. Delineado de bordes y poda de contención. Asesoría en paisajismo con registro de cada acción y generación de informe histórico, recomendaciones técnicas y estéticas para sacar el mayor partido a tu jardín.<br>
<br>


<strong>Invierno / PERIODO DE 4 MESES | MAYO-AGOSTO:</strong> Corte y mantención incluye un servicio de drenaje antiencharcado, desmalezado de zonas arbustivas, corte según características del suelo y el tipo de césped, para evitar la pudrición y desarrollo de hongos por exceso de humedad. Delineado de bordes y poda de contención. Asesoría en paisajismo con registro de cada acción y generación de informe histórico, recomendaciones técnicas y estéticas para sacar el mayor partido a tu jardín.
</p>

                    </div>
                    <!--fin detalles del servicio -->

                </div>
            </div>
            <section class="section p-t-50">
                <div class="container">
                    <div class="heading-section text-center">

                    <img src="<?= base_url();?>assets/images/icon-kusa.svg" class="center-block">
                        <h4>Otros Planes que te pueden interesar</h4>
                    </div>
                    <ul class="list-reset product-list row">

                    <?php foreach($relacionados as $relacion): ?>
                    <!--plan -->
                        <li class="col-md-3 col-sm-6">
                            <div class="image-box image-box-3">
                                <a href="<?= base_url();?>web/plan/<?= slug_cat($relacion->id_categoria, $relacion->nombre_producto); ?>">
                                      <img src="<?= base_url();?>assets/manager/productos/<?= $relacion->imagen_1; ?>" alt="titulo del producto" class="grow-shadow" />
                                    </a>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="<?= base_url();?>web/plan/<?= slug_cat($relacion->id_categoria, $relacion->nombre_producto); ?>"><?= $relacion->nombre_producto; ?></a>
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