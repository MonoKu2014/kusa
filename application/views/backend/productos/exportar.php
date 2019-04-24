

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Exportar Productos</h1>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
			<div class="row">
				<div class="col-md-6">
					Selecciona que productos quieres exportar
					<select id="tipo" class="form-control">
						<option value="0">Todos</option>
						<option value="1">Activos</option>
						<option value="2">Inactivos</option>
					</select>
					<br>
					<button class="btn btn-success" id="exportar">Exportar</button>
				</div>
			</div>
		</div>

</div>

<script>

$('#exportar').on('click', function(){

	window.location.href = '<?php echo base_url();?>productos/bajar_excel/' + $('#tipo').val();

});

</script>