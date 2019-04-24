<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-default text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="card red-card">
						<h4>Vendedores</h4>
						<h4><?= count_registers('vendedores'); ?></h4>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="card blue-card">
						<h4>Productos/Planes</h4>
						<h4><?= count_registers('productos'); ?></h4>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="card green-card">
						<h4>Cupones</h4>
						<h4><?= count_registers('cupon_descuento'); ?></h4>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="card yellow-card">
						<h4>Pedidos</h4>
						<h4><?= count_registers('pedidos'); ?></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<div class="row">
				<div class="col-md-4">
					<div class="col-lg-12" style="border:1px solid #ccc;padding:10px;">
					<span>Selecciona el Mes que quieres ver:</span>
					<p></p>
					<select id="month-graphic" class="form-control" style="margin-bottom:20px;">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12" id="load-graphic">
					<canvas id="myChart" width="400" height="100"></canvas>
				</div>
			</div>

		</div>


</div>

<script>

var vendedores = [];
var colores = [];
var cantidades = [];

<?php foreach($vendedores as $vendedor): ?>
	vendedores.push('<?php echo $vendedor->nombre_vendedor; ?>');
	colores.push(dynamicColors());
<?php endforeach; ?>

$('#month-graphic').on('change', function(){
	$('#load-graphic').empty().html('<canvas id="myChart" width="400" height="100"></canvas>');
	cargar_grafico();
});


function dynamicColors() {
	var r = Math.floor(Math.random() * 255);
	var g = Math.floor(Math.random() * 255);
	var b = Math.floor(Math.random() * 255);
	return "rgba(" + r + "," + g + "," + b + ", 1)";
};

cargar_grafico();

function cargar_grafico(){
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: vendedores,
			datasets: [{
				label: 'Cantidad de Ventas',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: colores,
				borderColor: colores,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
}

</script>