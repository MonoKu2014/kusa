<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salida extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('salidasModel', 'salida');
    }


	public function index()
	{
		$data['salidas'] = $this->salida->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/salida/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
        $data['numero'] = $this->salida->ultimo_numero();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/salida/agregar', $data);
		$this->load->view('backend/includes/footer');
	}


    public function productos($id)
    {
        $data['salida'] = $this->salida->obtener($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/salida/productos', $data);
        $this->load->view('backend/includes/footer');
    }


	public function guarda_salida()
	{
		$error = 0;
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'fecha_salida' => $this->input->post('fecha'),
                'id_cliente' => $this->input->post('cliente'),
                'id_tipo_orden' => 2
            );
        	$insert = $this->salida->insertar($data);
            $id_salida = $this->db->insert_id();
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'salida/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'salida/productos/' . $id_salida);
        }
	}


	public function ver($id_salida)
	{
		$data['salida'] = $this->salida->obtener($id_salida);
        $data['detalle'] = $this->salida->obtener_detalle($id_salida);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/salida/ver', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_gasto()
	{

		$error = 0;
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('sucursal', 'Sucursal', 'required');
        $this->form_validation->set_rules('monto', 'Monto', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
            $data = array(
                'tipo_gasto' => $this->input->post('tipo'),
                'id_sucursal' => $this->input->post('sucursal'),
                'fecha_gasto' => $this->input->post('fecha'),
                'monto_gasto' => $this->input->post('monto'),
                'observacion_gasto' => $this->input->post('observacion')
            );
        	$insert = $this->salida->editar($data, $this->input->post('id_salida'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'salida/editar/' . $this->input->post('id_salida'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'salida');
        }

	}


    public function eliminar($id_salida)
    {
        $delete = $this->salida->eliminar($id_salida);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'salida');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'salida');
        }
    }

    public function agregar_fila()
    {

        $aux = $this->input->post('aux');

        $options = '';
        foreach ($this->functions->productos() as $c) {
            $options .= '<option value="'.$c->id_producto.'" data-valor="'.$c->precio_producto.'">'.$c->nombre_producto.'</option>';
        }


        $html = '
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <span>cliente(*):</span>
                <select name="cliente[]" class="form-control" required id="cliente_'.$aux.'">
                    <option value="">Seleccione...</option>
                    '.$options.'
                </select>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <span>Cantidad(*):</span>
                <input type="number" id="cantidad_'.$aux.'" name="cantidad[]" class="form-control required" required>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <span>Monto(*):</span>
                <input type="number" id="monto_'.$aux.'" name="monto[]" class="form-control required disabled" readonly placeholder="cálculo automático">
            </div>
        ';

        echo $html;

    }

    public function guarda_productos()
    {
        $datos = $_POST;
        $aux = 0;

        foreach ($datos as $key => $value) {

            if($aux < count($datos['producto'])){
                $valor_producto = $this->functions->valor_producto($datos['producto'][$aux]);

                $monto = $valor_producto * $datos['cantidad'][$aux];

                $data = array(
                    'id_producto' => $datos['producto'][$aux],
                    'cantidad_detalle' => $datos['cantidad'][$aux],
                    'monto_detalle' => $monto,
                    'id_salida' => $this->input->post('id_salida'),
                );

                $this->salida->insertar_detalle($data);
                $aux++;
            }

        }

        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
        redirect(base_url().'salida');

    }

}
