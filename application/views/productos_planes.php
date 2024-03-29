<!-- Heading page / start-->
<div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
    <div class="container">
        <h1 class="text-center text-white">PLANES DE HASTA 100 M2</h1>
        <ul class="breadcrumbs">
            <li>
                <a href="<?= base_url(); ?>">INICIO</a>
            </li>
            <li>
                <a href="<?= base_url(); ?>web/planes">LISTADO PLANES</a>
            </li>
            <li>
                <a href="">PLANES <?= strtoupper($categoria->nombre_categoria);?></a>
            </li>
        </ul>
    </div>
</div>
<!-- Heading page / .end-->

<!-- Page Content / start-->
<div class="page-content p-t-50 p-b-80">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <div class="categories-widget m-b-50">
                    <h3 class="title text-block text-black text-sm m-b-15">
                        <img src="<?= base_url();?>assets/images/icon-hoja.svg"> Planes según metraje
                    </h3>
                    <ul class="vertical-list">
                        <?php foreach($planes as $plan): ?>
                        <li>
                            <a href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>">
                                <img src="<?= base_url();?>assets/images/chevron.svg"> <?= $plan->nombre_categoria; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
            <article class="content-area col-md-9">
                <div class="shop-toolbar m-b-15">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <span class="found"><?= count($productos); ?> Planes disponibles</span>
                        </div>
                    </div>
                </div>
                <div class="shop-content">
                    <ul class="products row">
                        <?php foreach($productos as $producto): ?>
                        <!--plan -->
                        <li class="col-md-4 col-sm-6">
                            <div class="image-box image-box-3">
                                <a href="<?= base_url();?>web/plan/<?= slug_prod($producto->id_producto, $producto->nombre_producto);?>">
                                    <img src="<?= base_url();?>assets/manager/productos/<?= $producto->imagen_1; ?>" alt="titulo del producto" class="grow-shadow" />
                                </a>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="<?= base_url();?>web/plan/<?= slug_prod($producto->id_producto, $producto->nombre_producto);?>"><?= $producto->nombre_producto; ?></a>
                                    </h4>
                                    <div class="info">
                                        <span class="price green">$<?= money($producto->precio_producto); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--fin plan -->
                        <?php endforeach; ?>
                    </ul>


                    <div class="shop-page-paginations text-center">
                        <ul class="paginations">
                            <li class="item active">
                                <a href="#">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span>3</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span>4</span>
                                </a>
                            </li>
                            <li class="next">
                                <a href="#">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<!-- Page Content / end-->