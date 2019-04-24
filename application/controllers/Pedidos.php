<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('pedidosModel', 'pedido');
    }


	public function index()
	{
        $data['pedidos'] = $this->pedido->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/pedidos/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


    public function editar($id)
    {
        $data['pedido'] = $this->pedido->obtener($id);
        $data['productos'] = $this->functions->listadoProductos();
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/pedidos/editar', $data);
        $this->load->view('backend/includes/footer');
    }


    public function guardar_edicion()
    {
        $ids = $this->input->post('id');
        $cantidad = $this->input->post('cantidad');

        foreach ($ids as $key => $value) {
            $data = array('cantidad_producto' => $cantidad[$key]);
            $this->pedido->editar_cantidad($data, $ids[$key]);
            unset($data);
        }

            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Pedido editado!'));
            redirect($_SERVER['HTTP_REFERER']);

    }


    public function entregado($id)
    {
        $data = array('estado_pedido' => 3);
        $entregado = $this->pedido->editar($data, $id);
        if($entregado === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro marcado como ENTREGADO con éxito'));
            redirect(base_url().'pedidos');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido marcar como ENTREGADO'));
            redirect(base_url().'pedidos');
        }
    }


    public function confirmar($id)
    {
        $data = array('estado_pedido' => 2);
        $confirmar = $this->pedido->editar($data, $id);
        if($confirmar === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro marcado como PAGO CONFIRMADO con éxito'));
            redirect(base_url().'pedidos');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido marcar como PAGO CONFIRMADO'));
            redirect(base_url().'pedidos');
        }
    }



    public function cancelar($id)
    {
        $data = array('estado_pedido' => 0);
        $confirmar = $this->pedido->editar($data, $id);
        if($confirmar === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro marcado como CANCELADO con éxito'));
            redirect(base_url().'pedidos');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido marcar como CANCELADO'));
            redirect(base_url().'pedidos');
        }
    }



    public function detalle($id)
    {
        $data['pedido'] = $this->pedido->obtener($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/pedidos/detalle', $data);
        $this->load->view('backend/includes/footer');
    }


    public function imprimir($id)
    {
        $data['pedido'] = $this->pedido->obtener($id);
        $this->load->view('backend/pedidos/imprimir', $data);
    }


    public function imprimir_reporte()
    {
        $data['fecha'] = $this->input->post('fecha');
        $data['pedidos'] = $this->pedido->reporte_diario($this->input->post('fecha'));
        $data['numeros'] = $this->pedido->numeros_reporte($this->input->post('fecha'));
        $this->load->view('backend/pedidos/imprimir_reporte', $data);
    }


    public function eliminar_producto($id)
    {
        $confirmar = $this->pedido->eliminar_producto($id);
        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Producto eliminado correctamente!'));
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function agregar_producto_edicion()
    {

        $producto = $this->functions->obtenerProductoPorID($this->input->post('producto'));

        $data_productos = array(
        'id_producto' => $this->input->post('producto'),
        'id_pedido' => $this->input->post('id_pedido'),
        'cantidad_producto' => $this->input->post('cantidad'),
        'valor_venta' => $producto[0]->precio_producto
        );
        $this->functions->insertar_producto_pedido($data_productos);
        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Producto agregado correctamente!'));
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function guarda_direccion_descuento()
    {
        //solo si es canasta aplicamos un descuento extra
        if($this->input->post('es_canasta') != 0){
            if($this->input->post('descuento') != ''){
                $descuento = array(
                    'descuento_canasta' => $this->input->post('descuento')
                );
                $this->pedido->editar($descuento, $this->input->post('id_pedido'));
            }
        }

        $datos = array(
            'comuna_dato' => $this->input->post('comuna'),
            'direccion_dato' => $this->input->post('direccion')
        );

        $editar_direccion = $this->pedido->editar_direccion($datos, $this->input->post('id_pedido'));

        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Dirección y Descuento correctamente!'));
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function pendientes()
    {
        $data['pedidos'] = $this->pedido->listar_temporales();
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/pedidos/temporales', $data);
        $this->load->view('backend/includes/footer');
    }


    public function enviar_pedido_temporal($id)
    {
        $data['pedido'] = $this->pedido->obtener_pedido_temporal($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/pedidos/enviar_pedido_temporal', $data);
        $this->load->view('backend/includes/footer');
    }


    public function enviar_pendiente($id)
    {

            $detalle_pedido = $this->pedido->obtener_pedido_temporal($id);

            //insertar pedido
            $data_pedido = array(
            'fecha_pedido' => $detalle_pedido[0]->fecha_pedido,
            'hora_pedido' => $detalle_pedido[0]->hora_pedido,
            'id_cliente' => $detalle_pedido[0]->id_cliente,
            'estado_pedido' => 1, //1 es pagado y 2 es pago confirmado por admin, 3 es entregado
            'codigo_transferencia' => $detalle_pedido[0]->codigo_transferencia,
            'fecha_despacho' => $detalle_pedido[0]->fecha_despacho,
            'descuento_pedido' => $detalle_pedido[0]->descuento_pedido,
            'canasta' => $detalle_pedido[0]->canasta
            );
            $this->functions->insertar_pedido($data_pedido);
            $id_pedido = $this->db->insert_id();

            //insertar productos del pedido
            foreach ($detalle_pedido as $value) {
                $data_productos = array(
                'id_producto' => $value->id_producto,
                'id_pedido' => $id_pedido,
                'cantidad_producto' => $value->cantidad_producto,
                'valor_venta' => $value->valor_venta
                );
                $this->functions->insertar_producto_pedido($data_productos);
                unset($data_productos);
            }

            if($detalle_pedido[0]->comentario_dato == ''){
                $comentario_dato = 'Pedido pendiente generado a través de panel de control';
            } else {
                $comentario_dato = $detalle_pedido[0]->comentario_dato;
            }

            //insertar datos del pedido
            $data_pedido = array(
            'id_pedido' => $id_pedido,
            'comuna_dato' => $detalle_pedido[0]->comuna_dato,
            'direccion_dato' => $detalle_pedido[0]->direccion_dato,
            'nombre_dato' => $detalle_pedido[0]->nombre_dato,
            'fono_dato' => $detalle_pedido[0]->fono_dato,
            'comentario_dato' => $comentario_dato
            );
            $this->functions->insertar_datos_pedido($data_pedido);

            $email_guaton = 'pagos@lavegaadomicilio.cl';



            $this->functions->eliminar_pedido_temporal($id);


            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Pedido enviado con éxito, revisa el apartado de pedidos'));
            redirect(base_url().'pedidos/pendientes');
    }


    public function eliminar_pedido_temporal($id)
    {
        $this->functions->eliminar_pedido_temporal($id);
        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Pedido eliminado correctamente!'));
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function enviar_email_pendiente($id)
    {
        $detalle_pedido = $this->pedido->obtener_pedido_temporal($id);
        $data = array('enviado' => 1);
        $entregado = $this->pedido->avisar_correo($data, $id);
        $config = Array(
            'protocol'  => 'mail',
            'smtp_host' => 'mail.lavegaadomicilio.cl',
            'smtp_port' => 465,
            'smtp_user' => 'contacto@lavegaadomicilio.cl',
            'smtp_pass' => 'contacto2017',
            'smtp_timeout' => '4',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('contacto@lavegaadomicilio.cl', 'La Vega a Domicilo');

        $this->email->to($detalle_pedido[0]->email_cliente);
        $this->email->subject($detalle_pedido[0]->nombre_cliente.' Tienes un pedido pendiente');

        $data['nombre'] = $detalle_pedido[0]->nombre_cliente;
        $data['email'] = $detalle_pedido[0]->email_cliente;
        $data['url'] = base_url();

        $body = $this->load->view('frontend/emails/pendiente', $data, TRUE);
        $this->email->message($body);
        $mail = $this->email->send();

        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Correo enviado correctamente!'));
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function avisar_pendientes()
    {
        $pedidos = $this->pedido->listar_temporales_pendientes();

        if(count($pedidos) > 0){

            foreach ($pedidos as $key => $val) {
                $data = array('avisado' => 1);
                $entregado = $this->pedido->avisar_correo($data, $val->id_pedido);
            }

            $config = Array(
                'protocol'  => 'mail',
                'smtp_host' => 'mail.lavegaadomicilio.cl',
                'smtp_port' => 465,
                'smtp_user' => 'contacto@lavegaadomicilio.cl',
                'smtp_pass' => 'contacto2017',
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from('contacto@lavegaadomicilio.cl', 'La Vega a Domicilo');

            $this->email->to('contacto@lavegaadomicilio.cl', 'angelogalazhuerta@gmail.com');
            $this->email->subject('Aviso de pedidos pendientes');

            $data['url'] = base_url();

            $body = $this->load->view('frontend/emails/pendientes', $data, TRUE);
            $this->email->message($body);
            $mail = $this->email->send();

        }

    }



}
