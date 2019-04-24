<div id="wrapper">
	<div id="sidebar-wrapper">
	    <ul class="sidebar-nav">

			<li class="navigation-li" id="1"><a href="<?= base_url();?>cuenta"><i class="fa fa-user"></i> Mi Cuenta</a></li>
	    <li class="navigation-li" id="2"><a href="<?= base_url();?>main"><i class="fa fa-dashboard"></i> Dashboard</a></li>

			<!-- solo pueden acceder los administradores -->
			<?php if($this->session->perfil > 0): ?>
				<li class="navigation-li" id="3"><a href="<?= base_url();?>grafica"><i class="fa fa-image"></i> Home Sitio Web</a></li>
				<li class="navigation-li" id="4"><a href="<?= base_url();?>informe"><i class="fa fa-download"></i> Informe stock</a></li>
				<li class="navigation-li" id="5"><a href="<?= base_url();?>pedidos"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>
				<li class="navigation-li" id="6"><a href="<?= base_url();?>vendedores"><i class="fa fa-money"></i> Vendedores</a></li>
				<li class="navigation-li" id="7"><a href="<?= base_url();?>usuarios"><i class="fa fa-user"></i> Usuarios Panel</a></li>
				<li class="navigation-li" id="8"><a href="<?= base_url();?>categorias"><i class="fa fa-paperclip"></i> Categorías</a></li>
				<li class="navigation-li" id="13"><a href="<?= base_url();?>despacho"><i class="fa fa-money"></i> Valores de Despacho</a></li>
			<?php endif; ?>
			<!-- fin solo pueden acceder los administradores -->

			<li class="navigation-li" id="9"><a href="<?= base_url();?>clientes"><i class="fa fa-users"></i> Clientes</a></li>
			<li class="navigation-li" id="10"><a href="<?= base_url();?>productos"><i class="fa fa-tasks"></i> Productos</a></li>
			<li class="navigation-li" id="11"><a href="<?= base_url();?>cupones"><i class="fa fa-clipboard"></i> Cupones</a></li>
			<li class="navigation-li" id="12"><a href="<?= base_url();?>login/cerrar_sesion"><i class="fa fa-remove"></i> Cerrar sesión</a></li>

			<!--<li><a href="<?= base_url();?>tipogastos"><i class="fa fa-usd"></i> Tipos de Gastos</a></li>
			<li><a href="<?= base_url();?>entrada"><i class="fa fa-sign-in"></i> Ordenes Entrada</a></li>
			<li><a href="<?= base_url();?>salida"><i class="fa fa-sign-out"></i> Ordenes Salida</a></li>-->
			<!--<li><a href="<?= base_url();?>proveedores"><i class="fa fa-users"></i> Proveedores</a></li>-->
			<!--<li><a href="<?= base_url();?>slide"><i class="fa fa-image"></i> Slide Principal</a></li>-->

	    </ul>
	</div>

<script>

if(localStorage.getItem('nav') === null){
	localStorage.setItem('nav', 2);
}

$('.navigation-li').on('click', function(){
	localStorage.setItem('nav', $(this).attr('id'));
	if($(this).attr('id') == 12){
		localStorage.clear();
	}
});

$('.navigation-li').removeClass('active');
$('#' + localStorage.getItem('nav')).addClass('active');

</script>