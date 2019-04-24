<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('entradasModel', 'entrada');
    }


	public function index()
	{
        $data['entradas'] = $this->entrada->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/entrada/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
        $data['numero'] = $this->entrada->ultimo_numero();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/entrada/agregar', $data);
		$this->load->view('backend/includes/footer');
	}


    public function productos($id)
    {
        $data['entrada'] = $this->entrada->obtener($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/entrada/productos', $data);
        $this->load->view('backend/includes/footer');
    }


	public function guarda_entrada()
	{
		$error = 0;
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'fecha_entrada' => $this->input->post('fecha'),
                'id_proveedor' => 0,
                'id_tipo_orden' => 1
            );
        	$insert = $this->entrada->insertar($data);
            $id_entrada = $this->db->insert_id();
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'entrada/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'entrada/productos/' . $id_entrada);
        }
	}


	public function ver($id_entrada)
	{
		$data['entrada'] = $this->entrada->obtener($id_entrada);
        $data['detalle'] = $this->entrada->obtener_detalle($id_entrada);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/entrada/ver', $data);
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
        	$insert = $this->entrada->editar($data, $this->input->post('id_entrada'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'entrada/editar/' . $this->input->post('id_entrada'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'entrada');
        }

	}


    public function eliminar($id_entrada)
    {
        $delete = $this->entrada->eliminar($id_entrada);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'entrada');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'entrada');
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
                <span>Producto(*):</span>
                <select name="producto[]" class="form-control selector" required id="producto_'.$aux.'" data-id="'.$aux.'">
                    <option value="">Seleccione...</option>
                    '.$options.'
                </select>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <span>Cantidad(*):</span>
                <input type="number" id="cantidad_'.$aux.'" name="cantidad[]" class="form-control required cantidad" required data-id="'.$aux.'">
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
                    'id_entrada' => $this->input->post('id_entrada'),
                    'id_sucursal' => $this->input->post('sucursal')
                );

                $this->entrada->insertar_detalle($data);
                $aux++;
            }

        }

        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
        redirect(base_url().'entrada');

    }

}
