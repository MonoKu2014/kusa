
        <!-- Heading page / start-->
        <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
            <div class="container">
            <h1 class="text-center text-white"><?= strtoupper($categoria->nombre_categoria); ?></h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="<?= base_url();?>">INICIO</a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>tienda">TIENDA KUSA</a>
                    </li>
                     <li>
                        <a href="#"><?= strtoupper($categoria->nombre_categoria); ?></a>
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
                                <img src="<?= base_url();?>assets/images/icon-hoja.svg"> Tienda por Categorías
                            </h3>
                            <ul class="vertical-list">
                            <?php foreach($categorias as $categoria): ?>
                                <li>
                                    <a href="<?= base_url();?>web/productos/<?= slug_cat($categoria->id_categoria, $categoria->nombre_categoria); ?>">
                                        <img src="<?= base_url();?>assets/images/chevron.svg">
                                        <?= $categoria->nombre_categoria; ?>
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
                                    <span class="found"><?= count($productos); ?> productos en total</span>
                                </div>
                            </div>
                        </div>
                        <div class="shop-content">
                            <ul class="products row">

                            <?php foreach($productos as $producto): ?>
                              <!--producto -->
                              <li class="col-md-4 col-sm-6">
                                 <div class="image-box image-box-3">
                                <a href="<?= base_url(); ?>web/producto/<?= slug_prod($producto->id_producto, $producto->nombre_producto); ?>">
                                      <img src="<?= base_url(); ?>assets/manager/productos/<?= $producto->imagen_1; ?>" alt="titulo del producto" class="grow-shadow" />
                                    </a>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="<?= base_url(); ?>web/producto/<?= slug_prod($producto->id_producto, $producto->nombre_producto); ?>">Nombre producto</a>
                                    </h4>
                                    <div class="info">
                                        <?php if($producto->precio_oferta > 0): ?>
                                            <span class="gray small tached">$<?= money($producto->precio_producto); ?></span>
                                            <span class="price">$<?= money($producto->precio_oferta); ?></span>
                                        <?php else:?>
                                            <span class="price">$<?= money($producto->precio_producto); ?></span>
                                        <?php endif;?>
                                    </div>
                                </div>
                                 </div>
                             </li>
                            <!--fin producto -->
                            <?php endforeach; ?>

                            </ul>
                            
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <!-- Page Content / end-->