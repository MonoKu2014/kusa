<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipogastos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('tipogastosModel', 'tipogastos');
    }


	public function index()
	{
		$data['tipogastos'] = $this->tipogastos->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/tipogastos/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/tipogastos/agregar');
		$this->load->view('backend/includes/footer');
	}


	public function guarda_gasto()
	{
		$error = 0;
        $this->form_validation->set_rules('tipo_gasto', 'Tipo', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'tipo_gasto' => $this->input->post('tipo_gasto')
            );
        	$insert = $this->tipogastos->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'tipogastos/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'tipogastos');
        }
	}


	public function editar($id_tipo_gasto)
	{
		$data['tipogasto'] = $this->tipogastos->obtener($id_tipo_gasto);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/tipogastos/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_gasto()
	{

		$error = 0;
        $this->form_validation->set_rules('tipo_gasto', 'Tipo', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
            $data = array(
                'tipo_gasto' => $this->input->post('tipo_gasto')
            );
        	$insert = $this->tipogastos->editar($data, $this->input->post('id_tipo_gasto'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'tipogastos/editar/' . $this->input->post('id_tipo_gasto'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'tipogastos');
        }

	}


    public function eliminar($id_tipo_gasto)
    {
        $delete = $this->tipogastos->eliminar($id_tipo_gasto);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'tipogastos');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'tipogastos');
        }
    }

}
