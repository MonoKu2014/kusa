<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('gastosModel', 'gastos');
    }


	public function index()
	{
		$data['gastos'] = $this->gastos->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/gastos/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/gastos/agregar');
		$this->load->view('backend/includes/footer');
	}


	public function guarda_gasto()
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
        	$insert = $this->gastos->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'gastos/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'gastos');
        }
	}


	public function editar($id_gasto)
	{
		$data['gasto'] = $this->gastos->obtener($id_gasto);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/gastos/editar', $data);
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
        	$insert = $this->gastos->editar($data, $this->input->post('id_gasto'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'gastos/editar/' . $this->input->post('id_gasto'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'gastos');
        }

	}


    public function eliminar($id_gasto)
    {
        $delete = $this->gastos->eliminar($id_gasto);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'gastos');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'gastos');
        }
    }

}
