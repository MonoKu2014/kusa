<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

include 'vendor/autoload.php';

class Web extends CI_Controller {

	const ACTIVO = 1;
	const DIRECCION_PRINCIPAL = 1;
	const PENDIENTE = 0;
	const EMPTY_TOKEN = '';
	const ETAPA_PENDIENTE = 0;
	const ETAPA_INICIAL = 1;
	const PEDIDO_PAGADO = 1;

    public function __construct()
    {
        parent::__construct();
		$this->load->model('homeModel', 'home');
    }

	public function index()
	{
		$data['uno'] = $this->home->obtener_grafica(1);
		$data['dos'] = $this->home->obtener_grafica(2);
		$data['tres'] = $this->home->obtener_grafica(3);
		$data['cuatro'] = $this->home->obtener_grafica(4);
		$data['planes'] = planes();
		$this->load->view('layout/header');
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}

	public function planes()
	{
		$data['planes'] = planes();
		$this->load->view('layout/header');
		$this->load->view('planes', $data);
		$this->load->view('layout/footer');
	}

	public function como_funciona()
	{
		$this->load->view('layout/header');
		$this->load->view('como_funciona');
		$this->load->view('layout/footer');
	}


	public function metodos_pago()
	{
		$this->load->view('layout/header');
		$this->load->view('metodos_pago');
		$this->load->view('layout/footer');
	}

	public function login_registro()
	{
		$this->load->view('layout/header');
		$this->load->view('login_registro');
		$this->load->view('layout/footer');
	}


	public function tienda()
	{
		$data['categorias'] = categorias_tienda();
		$this->load->view('layout/header');
		$this->load->view('tienda', $data);
		$this->load->view('layout/footer');
	}


	public function productos_planes($plan)
	{
		$id_categoria = slug_back($plan);
		$data['categoria'] = $this->home->obtener_categoria($id_categoria);
		$data['planes'] = planes();
		$data['productos'] = $this->home->productos_por_categorias($id_categoria);
		$this->load->view('layout/header');
		$this->load->view('productos_planes', $data);
		$this->load->view('layout/footer');
	}

	public function plan($plan)
	{
		$id_plan = slug_back($plan);
		$data['producto'] = $this->home->obtener_producto($id_plan);
		$data['relacionados'] = $this->home->obtener_relacionados($id_plan);
		$this->load->view('layout/header');
		$this->load->view('plan', $data);
		$this->load->view('layout/footer');
	}


	public function productos($categoria)
	{
		$id_categoria = slug_back($categoria);
		$data['categoria'] = $this->home->obtener_categoria($id_categoria);
		$data['productos'] = $this->home->productos_por_categorias($id_categoria);
		$data['categorias'] = categorias_tienda();
		$this->load->view('layout/header');
		$this->load->view('productos', $data);
		$this->load->view('layout/footer');
	}

	public function producto($producto)
	{
		$id_producto = slug_back($producto);
		$data['producto'] = $this->home->obtener_producto($id_producto);
		$data['relacionados'] = $this->home->obtener_relacionados($id_producto);
		$data['detalles'] = $this->home->detalles($id_producto);
		$this->load->view('layout/header');
		$this->load->view('producto', $data);
		$this->load->view('layout/footer');
	}


	public function ingresar()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$acceso = $this->home->login($email, $password);

		if(count($acceso) === 0){
			$this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Usuario o clave incorrectas'));
            redirect(base_url().'web/login_registro');
		} else {

            $newdata = array(
				'id'        	=> $acceso->id_cliente,
				'rut'        	=> $acceso->rut_cliente,
				'full_name'    	=> $acceso->nombre_cliente . ' ' . $acceso->apellidop_cliente . ' ' . $acceso->apellidom_cliente,
				'name'    		=> $acceso->nombre_cliente,
				'last_name'    	=> $acceso->apellidop_cliente,
				'second_name'   => $acceso->apellidom_cliente,
				'phone'   		=> $acceso->fono_cliente,
				'email'    	 	=> $acceso->email_cliente,
				'b_date'    	=> $acceso->fechan_cliente,
                'logged_in' 	=> true
            );
            $this->session->set_userdata($newdata);

			$this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Sesión iniciada correctamente'));
            redirect(base_url().'web/cuenta');
		}
	}

	public function cuenta()
	{
		$nacimiento = explode('-', $this->session->b_date);

		if(is_array($nacimiento)){
			$data['dia'] 	= $nacimiento[0];
			$data['mes'] 	= $nacimiento[1];
			$data['anio'] 	= $nacimiento[2];
		} else {
			$data['dia'] 	= '';
			$data['mes'] 	= '';
			$data['anio'] 	= '';
		}

		$data['direccion'] = $this->home->obtener_direccion_principal($this->session->id);

		$this->load->view('layout/header');
		$this->load->view('cuenta', $data);
		$this->load->view('layout/footer');
	}


	public function registro()
	{
		$recibe = 0;
		$fecha_nacimiento = $this->input->post('dia') . '-' . $this->input->post('mes') . '-' . $this->input->post('anio');

		if($this->input->post('recibe') !== null){
			$recibe = 1;
		}

		$data_user = array(
			'nombre_cliente' => $this->input->post('nombre'),
			'apellidop_cliente' => $this->input->post('paterno'),
			'apellidom_cliente' => $this->input->post('materno'),
			'rut_cliente' => $this->input->post('rut'),
			'email_cliente' => $this->input->post('email'),
			'password_cliente' => $this->input->post('password'),
			'fono_cliente' => $this->input->post('fono'),
			'fechan_cliente' => $fecha_nacimiento,
			'id_estado' => self::ACTIVO,
			'recibe_info' => $recibe
		);
		$this->home->insertar_cliente($data_user);
		$id_cliente = $this->db->insert_id();

		$data_address = array(
			'calle_direccion' => $this->input->post('direccion'),
			'numero_direccion' => $this->input->post('numero'),
			'region_direccion' => $this->input->post('region'),
			'comuna_direccion' => $this->input->post('comuna'),
			'tipo_direccion' => self::DIRECCION_PRINCIPAL,
			'id_cliente' => $id_cliente
		);

		$this->home->insertar_direccion_principal($data_address);

		$newdata = array(
			'id'        	=> $id_cliente,
			'rut'        	=> $this->input->post('rut'),
			'full_name'    	=> $this->input->post('nombre') . ' ' . $this->input->post('paterno') . ' ' . $this->input->post('materno'),
			'name'    		=> $this->input->post('nombre'),
			'last_name'    	=> $this->input->post('paterno'),
			'second_name'   => $this->input->post('materno'),
			'phone'   		=> $this->input->post('fono'),
			'email'    	 	=> $this->input->post('email'),
			'b_date'    	=> $fecha_nacimiento,
			'logged_in' 	=> true
		);
		$this->session->set_userdata($newdata);

		$this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Gracias por registrarte en Kusa!'));
		redirect(base_url().'web/cuenta');
	}

	public function cerrar_sesion()
	{
        $newdata = array(
			'id'        	=> null,
			'rut'        	=> null,
			'full_name'    	=> null,
			'name'    		=> null,
			'last_name'    	=> null,
			'second_name'   => null,
			'phone'   		=> null,
			'email'    	 	=> null,
			'b_date'    	=> null,
            'logged_in'     => false
        );
        $this->session->set_userdata($newdata);
        redirect(base_url());
	}

	public function carro()
	{
		$this->load->view('layout/header');
		$this->load->view('carro');
		$this->load->view('layout/footer');
	}

	public function datos_envio()
	{
		if($this->session->id === null){
			$this->session->set_flashdata('error', 1);
            redirect(base_url().'web/login_registro');
		}
		$this->load->view('layout/header');
		$this->load->view('datos');
		$this->load->view('layout/footer');
	}

	public function medios_pago()
	{

		if($this->session->id === null){
			$this->session->set_flashdata('error', 1);
            redirect(base_url().'web/login_registro');
		}

		$data['request'] = $this->input->post();

		$total = $this->input->post('valor_final');
		$despacho = $this->input->post('valor_despacho');
		$subtotal = $this->input->post('subtotal');

		if($this->session->id_pedido === null){

			$data_pedido = array(
				'fecha_pedido' => date('d-m-Y'),
				'hora_pedido' => date('H:i:s'),
				'id_cliente' => $this->session->id,
				'estado_pedido' => self::PENDIENTE,
				'transbank_token' => self::EMPTY_TOKEN,
				'id_direccion' => $this->input->post('direccion_final'),
				'comentarios_pedido' => $this->input->post('comentarios'),
				'cupon' => $this->input->post('descuento')
			);

			$this->home->insertar_pedido($data_pedido);
			$id_pedido = $this->db->insert_id();

			$data_tracking = array(
				'id_pedido' => $id_pedido,
				'etapa_tracking' => self::ETAPA_PENDIENTE,
				'fecha_tracking' => date('d-m-Y'),
				'hora_tracking' => date('H:i')
			);
			$this->home->insertar_tracking_inicial($data_tracking);

			foreach($this->session->carro as $carro){
				$data_productos = array(
					'id_producto' => $carro['id'],
					'id_pedido' => $id_pedido,
					'cantidad' => $carro['cantidad'],
					'precio' => $carro['precio'],
					'nombre' => $carro['nombre'],
					'imagen' => $carro['imagen'],
				);
				$this->home->insertar_productos($data_productos);
				unset($data_productos);
			}

			if($this->input->post('descuento') != ''){
				$descuento_cupon = $this->home->descuento_cupon($this->input->post('descuento'));
				if(count($descuento_cupon) > 0){
					$porcentaje = $descuento_cupon->descuento_cupon;
					$total = $total - ($total * $porcentaje / 100);
					$_SESSION['descuento'] = $porcentaje;
				}

				if($descuento_cupon->id_vendedor > 0){
					$data_vendedor = array('id_vendedor' => $descuento_cupon->id_vendedor);
					$this->home->insertar_token_transbank($id_pedido, $data_vendedor); //lo uso porque actualiza el pedido
				}
			}

			$_SESSION['id_pedido'] = $id_pedido;
			$_SESSION['despacho'] = $despacho;
			$_SESSION['subtotal'] = $subtotal;
			$_SESSION['total'] = $total;
		}

		$this->load->view('layout/header');
		$this->load->view('medios_pago', $data);
		$this->load->view('layout/footer');
	}


	public function pagar()
	{

		if($this->session->id === null){
			$this->session->set_flashdata('error', 1);
            redirect(base_url().'web/login_registro');
		}

		$urlResponse = base_url() . 'web/transbank_response';
		$urlFinal = base_url() . 'web/gracias';
		$monto = $this->session->total;
		$pedido = $this->session->id_pedido;
		$transaction = (new Webpay(Configuration::forProductionWebpayPlusNormal()))->getNormalTransaction();
		$initResult = $transaction->initTransaction($monto, $pedido, $this->session->id, $urlResponse, $urlFinal);

		dd($initResult);

		if(!is_object($initResult)){
			$this->session->set_flashdata('error', 1);
            redirect(base_url().'web/medios_pago');
		}

		$data['actionForm'] = $initResult->url;
		$data['token'] = $initResult->token;
		$this->load->view('webpay/formulario_intermedio', $data);
	}

	public function transbank_response()
	{
		$transaction = (new Webpay(Configuration::forProductionWebpayPlusNormal()))->getNormalTransaction();
		$result = $transaction->getTransactionResult($_POST['token_ws']);
		$_SESSION['output'] = $result;
		$output = $result->detailOutput;
		$_SESSION['resultado'] = $output->responseCode;
		if ($output->responseCode == 0) {
			$data['actionForm'] = $result->urlRedirection;
			$data['token'] = $_POST['token_ws'];
			$this->load->view('webpay/formulario_intermedio', $data);
		} else {
			$this->session->set_flashdata('error', 1);
            redirect(base_url().'web/medios_pago');
		}
	}

	public function gracias()
	{

		if($this->session->resultado === null){
			redirect(base_url().'web/pedido_actual');
		}

		// evitando f5
		if($this->session->id_pedido === null){
			redirect(base_url().'web/pedido_actual');
		}

		if($this->session->resultado != 0){
			$this->session->set_flashdata('error', 1);
			$data['mensaje_final'] = 'HUBO UN ERROR AL PROCESAR SU COMPRA';
		} else {
			$data['carro'] = $this->session->carro;
			$data['mensaje_final'] = 'GRACIAS POR COMPRAR EN KUSA.CL!';
			$data['id_pedido'] = $this->session->id_pedido;
			$data['tarjeta'] = $this->session->output->cardDetail->cardNumber;
			$data['codigoAuth'] = $this->session->output->detailOutput->authorizationCode;
			$data['total'] = $this->session->output->detailOutput->amount;
			$data['fecha'] = date('d-m-Y').' a las '.date('H:m:i');
			$data['despacho'] = $this->session->despacho;
			$data['tipoPago'] = $this->session->output->detailOutput->paymentTypeCode;
			//VN visa sin cuotas SI visa con cuotas VD débito
			if($this->session->output->detailOutput->paymentTypeCode != 'VD'){
				$data['cuotas'] = $this->session->output->detailOutput->sharesNumber;
			}
			if($this->session->output->detailOutput->paymentTypeCode == 'SI'){
				$data['valorCuota'] = $this->session->output->detailOutput->sharesAmount;
			}
			$data_token = array(
				'estado_pedido' => self::PEDIDO_PAGADO,
				'transbank_token' => $this->input->post('token_ws')
			);
			$this->home->insertar_token_transbank($this->session->id_pedido, $data_token);

			// TODO: descontar productos
			$data_tracking = array(
				'id_pedido' => $this->session->id_pedido,
				'etapa_tracking' => self::ETAPA_INICIAL,
				'fecha_tracking' => date('d-m-Y'),
				'hora_tracking' => date('H:i'),
			);
			$this->home->insertar_tracking_inicial($data_tracking);

			foreach($this->session->carro as $carro){
				$cantidad_nueva = actual_cantity($carro['id']) - $carro['cantidad'];
				$data_descuento = array('stock_real' => $cantidad_nueva);
				$this->home->descontar_cantidad($carro['id'], $data_descuento);
				unset($data_descuento);
			}

			$data['carro'] = $this->session->carro;

			$_SESSION['carro'] = [];
			$_SESSION['id_pedido'] = null;
			$_SESSION['total'] = null;
			$_SESSION['resultado'] = null;
			$_SESSION['despacho'] = null;
			$_SESSION['subtotal'] = null;
			$_SESSION['output'] = null;
		}

		$this->load->view('layout/header');
		$this->load->view('gracias', $data);
		$this->load->view('layout/footer');
	}

	public function cambiar_password()
	{
		$this->load->view('layout/header');
		$this->load->view('cambiar_password');
		$this->load->view('layout/footer');
	}

	public function direcciones()
	{
		$data['direcciones'] = adresses($this->session->id);
		$this->load->view('layout/header');
		$this->load->view('direcciones', $data);
		$this->load->view('layout/footer');
	}

	public function pedido_actual()
	{
		if($this->session->id_pedido !== null){
			$data['pedido'] = $this->home->obtener_pedido_actual($this->session->id_pedido);
		} else {
			$data['pedido'] = $this->home->ultimo_pedido_no_cerrado($this->session->id);
		}

		$this->load->view('layout/header');
		$this->load->view('pedido_actual', $data);
		$this->load->view('layout/footer');
	}

	public function historial()
	{
		$data['pedidos'] = $this->home->obtener_historial_pedidos($this->session->id);
		$this->load->view('layout/header');
		$this->load->view('historial', $data);
		$this->load->view('layout/footer');
	}

	public function guarda_cambio_password()
	{
		$actual = $this->input->post('password_actual');
		$password_uno = $this->input->post('password_uno');
		$password_dos = $this->input->post('password_dos');

		if($password_uno != $password_dos){
			$this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Tus nuevas contraseñas no coinciden'));
            redirect(base_url().'web/cambiar_password');
		}

		$datos = $this->home->login($this->session->email, $actual);

		if(count($datos) === 0){
			$this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Tu contraseña actual no coincide'));
            redirect(base_url().'web/cambiar_password');
		} else {
			$data = array(
				'password_cliente' => $password_uno
			);
			$this->home->cambiar_password($data, $this->session->id);
		}
		$this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Perfecto, haz cambiado tu contraseña correctamente'));
		redirect(base_url().'web/cambiar_password');

	}


}