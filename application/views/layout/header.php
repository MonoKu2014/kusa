<?php
header('Cache-Control: no-cache');
if(!isset($_SESSION['carro'])){
  $_SESSION['carro'] = [];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Kusa | Planes de Jardinería </title>

    <meta name="description" content="Kusa">
    <meta name="author" content="Kusa">
    <meta name="keywords" content="Planes de Jardinería">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= base_url();?>assets/css/theme-fonts.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/owl.carousel/owl.carousel.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/remodal/remodal.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/remodal/remodal-default-theme.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/vendor/revolution/css/layers.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/vendor/revolution/css/navigation.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/kusa.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>assets/css/kusa.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="<?= base_url();?>assets/images/favicon.png">
    <link rel="apple-touch-icon" href="<?= base_url();?>assets/images/apple-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>assets/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>assets/images/apple-icon-114x114.png">

    <script>
        var URL = '<?php echo base_url();?>';
    </script>

</head>

<body>

<!-- page load-->
<!--<div class="animsition">-->
<div class="animsition">

<!--header -->
<header>

    <!-- Header desktop-->
    <div class="section section-header section-header-1 pos-absolute bg-white hidden-tablet-landscape js-header" data-scroll-offset="900">
        <div class="container">
            <div class="header-main block-contain">

                <div class="block-left">
                    <div class="logo">
                        <a href="<?= base_url();?>">
                            <img src="<?= base_url();?>assets/images/logo-kusa.svg" alt="kusa">
                        </a>
                    </div>
                </div>

                <div class="header-navbar navbar-dropdow-dark hidden-tablet-landscape js-header-style">
                    <div class="navbar-wrap">
                        <nav class="navbar-horizontal">
                            <ul class="navbar-menu">
                                <li class="drop">
                                    <a href="<?= base_url();?>web/planes"><strong class="green">PLANES</strong></a>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="drop-menu bottom-right">
                                        <?php foreach(planes() as $plan): ?>
                                        <li>
                                            <a href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>">
                                                <img src="<?= base_url();?>assets/images/chevron.svg">
                                                <?= $plan->nombre_categoria; ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>web/como_funciona">Cómo funciona</a>
                                </li>
                                <li> | </li>
                                <li class="drop">
                                    <a href="<?= base_url();?>web/tienda"><strong class="green">TIENDA</strong></a>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="drop-menu bottom-right">
                                        <?php foreach(categorias_tienda() as $categoria): ?>
                                        <li>
                                            <a href="<?= base_url();?>web/productos/<?= slug_cat($categoria->id_categoria, $categoria->nombre_categoria); ?>">
                                                <img src="<?= base_url();?>assets/images/chevron.svg">
                                                <?= $categoria->nombre_categoria; ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li> | </li>
                                <li>
                                    <a href="<?= base_url();?>web/metodos_pago">Paga tu Cuenta</a>
                                </li>
                                <li> | </li>
                                <li>
                                    <?php if($this->session->id): ?>
                                        <a href="<?= base_url();?>web/cuenta">Bienvenido: <?= $this->session->full_name; ?></a>
                                    <?php else: ?>
                                        <a href="<?= base_url();?>web/login_registro" class="gray">Mi cuenta</a>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if($this->session->id): ?>
                                        <a href="<?= base_url();?>web/cerrar_sesion">Cerrar sesión</a>
                                    <?php else: ?>
                                        <a href="<?= base_url();?>web/login_registro" class="gray">Regístrate</a>
                                    <?php endif; ?>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="block-right">
                    <div class="mini-cart">
                        <button class="js-btn-cart btn-cart" data-toggle="tooltip" title="Carro de compras">
                            <span class="totals"><?= count($this->session->carro);?></span>
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <div class="mini-shopcart">
                            <div class="content-mini-shopcart">
                                <?php if(count($this->session->carro) > 0): ?>
                                    <?php foreach($this->session->carro as $carro): ?>
                                    <div class="item-mini-shopcart">
                                        <div class="item-image">
                                            <img src="<?= base_url();?>assets/manager/productos/<?= $carro['imagen']; ?>" alt="shopping cart" />
                                        </div>
                                        <div class="item-content">
                                            <h3 class="name cart-name">
                                                <?= $carro['nombre']; ?>
                                            </h3>
                                            <p class="price">$<?= money($carro['precio']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </div>

                            <div class="foot-mini-shopcart">
                                <div class="mini-shopcart-action pull-left">
                                    <a class="au-btn btn-checkout" href="<?= base_url();?>web/carro">Ver carro</a>
                                </div><br />

                                <div class="mini-shopcart-action pull-left" style="margin:10px 0;">
                                    <a class="au-btn btn-checkout" href="<?= base_url();?>web/carro">Seguir Comprando</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end block right -->
            </div>
        </div>
    </div>
    <!-- end header desktop -->

    <div class="blank-bar p-b-100 hidden-tablet-landscape"></div>


    <!-- Header mobile-->
    <div class="section section-header section-header-mobile section-header-mobile-1 hidden-tablet-landscape-up">
        <div class="header-main block-contain">
            <div class="block-left">
                <div class="logo">
                    <a href="<?= base_url();?>">
                        <img src="<?= base_url();?>assets/images/logo-kusa-xs.svg" alt="kusa">
                    </a>
                </div>
            </div>
            <div class="block-right">
                <div class="mini-cart">
                    <button class="js-btn-cart btn-cart" data-toggle="tooltip" title="Carro de compras">
                        <span class="totals white"><?= count($this->session->carro); ?></span>
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <div class="mini-shopcart">
                        <div class="content-mini-shopcart">

                            <?php if(count($this->session->carro) > 0): ?>
                                <?php foreach($this->session->carro as $carro): ?>
                                <div class="item-mini-shopcart">
                                    <div class="item-image">
                                        <a href="<?= base_url();?>web/producto/uno">
                                            <img src="<?= base_url();?>assets/images/tienda/producto-demo.jpg" alt="shopping cart" />
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="name">
                                            <a href="<?= base_url();?>web/producto/uno"><?= $carro['nombre']; ?> </a>
                                        </h3>
                                        <p class="price">$<?= money($carro['precio']); ?></p>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            <?php endif;?>

                        </div>
                        <div class="foot-mini-shopcart">
                            <div class="mini-shopcart-action">
                            <a class="au-btn btn-checkout" href="<?= base_url();?>web/carro">Ver carro</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="block-right">
            <button class="js-toggle-navbar-mobile hamburger hamburger--elastic">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>


    <div class="header-navbar-mobile">
        <nav class="navbar-mobile js-navbar">
            <ul class="navbar-menu">
                <li class="drop">
                    <a href="<?= base_url();?>web/planes">Planes</a>
                    <i class="fa fa-angle-down"></i>
                    <ul class="drop-menu bottom-right">
                        <?php foreach(planes() as $plan): ?>
                            <li>
                                <a href="<?= base_url();?>web/productos_planes/<?= slug_cat($plan->id_categoria, $plan->nombre_categoria); ?>">
                                    <img src="<?= base_url();?>assets/images/chevron.svg">
                                    <?= $plan->nombre_categoria; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url();?>web/como_funciona">Cómo funciona</a>
                </li>
                <li class="drop">
                    <a href="<?= base_url();?>web/tienda">Tienda</a>
                    <i class="fa fa-angle-down"></i>
                    <ul class="drop-menu bottom-right">
                        <?php foreach(categorias_tienda() as $categoria): ?>
                        <li>
                            <a href="<?= base_url();?>web/productos/<?= slug_cat($categoria->id_categoria, $categoria->nombre_categoria); ?>">
                                <img src="<?= base_url();?>assets/images/chevron.svg">
                                <?= $categoria->nombre_categoria; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url();?>web/metodos_pago">Paga tu Cuenta</a>
                </li>
                <li>
                    <?php if($this->session->id): ?>
                        <a href="<?= base_url();?>web/cuenta">Bienvenido: <?= $this->session->full_name; ?></a>
                    <?php else: ?>
                        <a href="<?= base_url();?>web/login_registro" class="gray">Mi cuenta</a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if($this->session->id): ?>
                        <a href="<?= base_url();?>web/cerrar_sesion">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="<?= base_url();?>web/login_registro" class="gray">Regístrate</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!--fin header -->