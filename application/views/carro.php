
<!-- page content / start-->

    <!-- heading page / .start-->
    <div class="heading-page bg-cover" style="background: url('<?= base_url();?>assets/images/bg-titulos.jpg') center center no-repeat;">
    <div class="container">
    <h1 class="text-center text-white">CARRO DE COMPRAS</h1>
        <ul class="breadcrumbs">
            <li>
                <a href="<?= base_url();?>">INICIO</a>
            </li>
            <li>
                <a href="#">CARRO</a>
            </li>
        </ul>
    </div>
</div>
<!-- Heading page / . end-->

<!-- Page Content / start-->
<article class="page-content p-t-70 p-b-100">
    <div class="woo-shopping-cart container">
        <form class="woo-cart-form">
            <table class="woo-cart-form-content">
                <thead>
                    <tr>
                        <th class="blank"></th>
                        <th class="product-thumbnail">PRODUCTO</th>
                        <th class="product-name">NOMBRE</th>
                        <th class="product-price">PRECIO</th>
                        <th class="product-quantity">CANTIDAD</th>
                        <th class="product-subtotal">TOTAL</th>
                        <th class="product-remove"></th>
                        <th class="blank"></th>
                    </tr>
                </thead>
                <tbody>

                <?php $total = 0; ?>
                <?php if(count($this->session->carro) > 0): ?>
                    <?php foreach($this->session->carro as $index => $carro): ?>
                        <?php
                            $subtotal = $carro['precio'] * $carro['cantidad'];
                            $total = $total + $subtotal;
                        ?>
                        <!--producto -->
                        <tr class="woo-cart-form-cart-item">
                            <td class="blank"></td>
                            <td class="product-thumbnail">
                                <img src="<?= base_url();?>assets/manager/productos/<?= $carro['imagen']; ?>" alt="nombre del producto">
                            </td>
                            <td class="product-name">
                                <a><?= $carro['nombre']; ?></a><br>
                                <small>sku: <?= $carro['codigo']; ?></small>
                            </td>
                            <td class="product-price">
                                <span class="woocommerce-Price-amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span><?= money($carro['precio']); ?></span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity" data-toggle="tooltip" title="Quantity">
                                    <span class="decrease"></span>
                                    <input class="au-input-number" type="number" value="<?= $carro['cantidad']; ?>" min="1" max="100">
                                    <span class="increase"></span>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="woocommerce-Price-amount">
                                <span class="woocommerce-Price-currencySymbol">$</span><?= money($subtotal); ?></span>
                            </td>
                            <td class="product-remove">
                                <a class="fa fa-remove eliminar-producto" href="#" data-toggle="tooltip" data-index="<?= $index; ?>" title="Eliminar producto"></a>
                            </td>
                            <td class="blank"></td>
                        </tr>
                        <!--fin producto -->
                    <?php endforeach;?>
                <?php endif;?>

                </tbody>
            </table>


            <div class="woo-cart-form-bottom block-contain">
                <div class="block-right"><br>
                    <p class="small pull-right">
                        <span>Valor Despacho:</span>
                        <span class="woocommerce-Price-currencySymbol">$</span><?= money(delivery_value($total)); ?>
                    </p>
                    <div class="clearfix"></div>
                    <p class="totals pull-right">
                        <span>Total:</span>
                        <span class="woocommerce-Price-currencySymbol">$</span><?= money($total + delivery_value($total)); ?>
                    </p>
                    <div class="clearfix"></div>
                        <a href="<?= base_url();?>web/tienda"><input class="au-btn" type="submit" value="Seguir comprando"></a>
                        <?php if($total > 0): ?>
                            <a href="<?= base_url();?>web/datos_envio"><input class="au-btn" type="submit" value="Continuar"></a>
                        <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</article>
<!-- Page Content / end-->