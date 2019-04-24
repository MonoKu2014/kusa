
<div class="modal-header">
    <h4>Tracking de pedido N° <?= $pedido->id_pedido; ?></h4>
</div>
<div class="modal-body">
    <div class="clearfix"></div><br><br>
    <div class="col-md-3 <?= ($pedido->estado_pedido == 1) ? 'box-active' : ''; ?>">
        <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 1) ? 'green' : 'gray'; ?>">1</strong></h4>
        <p class="text-center <?= ($pedido->estado_pedido == 1) ? 'green' : 'gray'; ?>"><strong>Compra Aprobada</strong></p>
        <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 1); ?></p>
    </div>

    <div class="col-md-3 <?= ($pedido->estado_pedido == 2) ? 'box-active' : ''; ?>">
        <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 2) ? 'green' : 'gray'; ?>">2</strong></h4>
        <p class="text-center <?= ($pedido->estado_pedido == 2) ? 'green' : 'gray'; ?>">Preparando producto</p>
        <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 2); ?></p>
    </div>

    <div class="col-md-3 <?= ($pedido->estado_pedido == 3) ? 'box-active' : ''; ?>">
        <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 3) ? 'green' : 'gray'; ?>">3</strong></h4>
        <p class="text-center <?= ($pedido->estado_pedido == 3) ? 'green' : 'gray'; ?>">Producto Despachado</p>
        <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 3); ?></p>
    </div>

    <div class="col-md-3 <?= ($pedido->estado_pedido == 4) ? 'box-active' : ''; ?>">
        <h4 class="text-center"><strong class="<?= ($pedido->estado_pedido == 4) ? 'green' : 'gray'; ?>">4</strong></h4>
        <p class="text-center <?= ($pedido->estado_pedido == 4) ? 'green' : 'gray'; ?>">Producto Entregado</p>
        <p class="text-center small gray">Fecha: <?= tracking_realize($pedido->id_pedido, 4); ?></p>
    </div>
    <div class="clearfix"></div><br><br>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
