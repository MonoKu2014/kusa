<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('proveedoresModel', 'proveedor');
    }


	public function index()
	{
		$data['proveedores'] = $this->proveedor->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/proveedores/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/proveedores/agregar');
		$this->load->view('backend/includes/footer');
	}


	public function guarda_proveedor()
	{
		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('rut', 'Rut', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
                'rut_proveedor' => $_POST['rut'],
        		'nombre_proveedor' => $_POST['nombre'],
        		'email_proveedor' => $_POST['email'],
				'fono_proveedor' => $_POST['fono'],
                'direccion_proveedor' => $_POST['direccion'],
                'contacto_proveedor' => $_POST['contacto'],
				'estado_proveedor' => 'Activo');
        	$insert = $this->proveedor->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'proveedores/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'proveedores');
        }
	}


	public function editar($id_proveedor)
	{
		$id_proveedor = $id_proveedor;

		$data['proveedor'] = $this->proveedor->obtener($id_proveedor);

		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/proveedores/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_proveedor()
	{

		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('rut', 'Rut', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
            $data = array(
                'rut_proveedor' => $_POST['rut'],
                'nombre_proveedor' => $_POST['nombre'],
                'email_proveedor' => $_POST['email'],
                'fono_proveedor' => $_POST['fono'],
                'direccion_proveedor' => $_POST['direccion'],
                'contacto_proveedor' => $_POST['contacto'],
                'estado_proveedor' => 'Activo');
        	$insert = $this->proveedor->editar($data, $_POST['id_proveedor']);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'proveedores/editar/'.$_POST['id_proveedor']);
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'proveedores');
        }

	}


    public function eliminar($id_proveedor)
    {
        $delete = $this->proveedor->eliminar($id_proveedor);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'proveedores');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'proveedores');
        }
    }


}
