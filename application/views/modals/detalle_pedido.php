<div class="modal-header">
    <h4>Detalle de pedido N° <?= $pedido->id_pedido; ?></h4>
</div>
<div class="modal-body">
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th class="product-name">PRODUCTO</th>
                <th class="product-price">PRECIO</th>
                <th class="product-quantity">CANTIDAD</th>
                <th class="product-subtotal">TOTAL</th>
            </tr>
        </thead>
        <tbody>

        <?php $total = 0; ?>
        <?php if(count($detalle) > 0): ?>
            <?php foreach($detalle as $index => $carro): ?>
                <?php
                    $subtotal = $carro->precio * $carro->cantidad;
                    $total = $total + $subtotal;
                ?>
                <!--producto -->
                <tr class="woo-cart-form-cart-item">
                    <td class="product-name">
                        <?= $carro->nombre; ?>
                    </td>
                    <td class="product-price">
                        <span class="woocommerce-Price-amount">
                        <span class="woocommerce-Price-currencySymbol">$</span><?= money($carro->precio); ?></span>
                    </td>
                    <td class="product-quantity">
                        <span class="woocommerce-Price-currencySymbol"></span><?= $carro->cantidad; ?></span>
                    </td>
                    <td class="product-subtotal">
                        <span class="woocommerce-Price-amount">
                        <span class="woocommerce-Price-currencySymbol">$</span><?= money($subtotal); ?></span>
                    </td>
                </tr>
                <!--fin producto -->
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>


    <div class="woo-cart-form-bottom block-contain">
        <div class="block-right"><br>
            <p class="totals">
                <span>Total:</span>
                <span class="woocommerce-Price-currencySymbol">$</span><?= money($total); ?>
            </p>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
