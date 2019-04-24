<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('cuponesModel', 'cupones');
        $this->load->model('estadosModel', 'estado');
        $this->load->model('vendedoresModel', 'vendedor');
    }


	public function index()
	{
		$data['cupones'] = $this->cupones->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/cupones/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
        $data['estados'] = $this->estado->listar();
        $data['vendedores'] = $this->vendedor->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/cupones/agregar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function guarda_cupon()
	{
		$error = 0;
        $this->form_validation->set_rules('codigo', 'Codigo', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'codigo_cupon' => $this->input->post('codigo'),
                'descuento_cupon' => $this->input->post('descuento'),
                'fecha_vigencia' => format_date_db($this->input->post('fecha')),
                'estado_cupon' => $this->input->post('estado'),
                'id_vendedor' => $this->input->post('vendedor')
            );
        	$insert = $this->cupones->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'cupones/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'cupones');
        }
	}


	public function editar($id_cupon)
	{
		$data['cupon'] = $this->cupones->obtener($id_cupon);
        $data['estados']  = $this->estado->listar();
        $data['vendedores'] = $this->vendedor->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/cupones/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_cupon()
	{

		$error = 0;
        $this->form_validation->set_rules('codigo', 'Codigo', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'codigo_cupon' => $this->input->post('codigo'),
                'descuento_cupon' => $this->input->post('descuento'),
                'fecha_vigencia' => format_date_db($this->input->post('fecha')),
                'estado_cupon' => $this->input->post('estado'),
                'id_vendedor' => $this->input->post('vendedor')
            );
        	$insert = $this->cupones->editar($data, $this->input->post('id_cupon'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'cupones/editar/' . $this->input->post('id_cupon'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'cupones');
        }

	}


    public function eliminar($id_cupon)
    {
        $delete = $this->cupones->eliminar($id_cupon);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'cupones');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'cupones');
        }
    }



    public function revisar_cupones()
    {
        $fecha = date('d-m-Y');
        $hora = date('H:i');

        $cupones = $this->cupones->listar();



    }


}
