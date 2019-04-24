<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		validate_session();
		validate_session_admin();
        $this->load->model('perfilesModel', 'perfil');
        $this->load->model('estadosModel', 'estado');
        $this->load->model('vendedoresModel', 'vendedor');
    }


	public function index()
	{
		$data['vendedores'] = $this->vendedor->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/vendedores/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$data['perfiles'] = $this->perfil->listar();
		$data['estados']  = $this->estado->listar();

		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/vendedores/agregar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function guarda_vendedor()
	{
		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		if($this->input->post('password') == ''){
			$password = random_password();
		} else {
			$password = $this->input->post('password');
		}

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_vendedor' => $this->input->post('nombre'),
        		'rut_vendedor' => $this->input->post('rut'),
				'estado_vendedor' => $this->input->post('estado'),
				'fono_vendedor' => $this->input->post('fono'),
				'email_vendedor' => $this->input->post('email'),
				'password_vendedor' => $password,
            );
        	$insert = $this->vendedor->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'vendedores/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'vendedores');
        }
	}


	public function editar($id_vendedor)
	{
		$id_vendedor = $id_vendedor;

		$data['vendedor'] = $this->vendedor->obtener($id_vendedor);
		$data['perfiles'] = $this->perfil->listar();
		$data['estados']  = $this->estado->listar();

		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/vendedores/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_vendedor()
	{

		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		if($this->input->post('password') == ''){
			$password = random_password();
		} else {
			$password = $this->input->post('password');
		}

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_vendedor' => $this->input->post('nombre'),
        		'rut_vendedor' => $this->input->post('rut'),
				'estado_vendedor' => $this->input->post('estado'),
				'fono_vendedor' => $this->input->post('fono'),
				'email_vendedor' => $this->input->post('email'),
				'password_vendedor' => $password,
            );
        	$insert = $this->vendedor->editar($data, $this->input->post('id_vendedor'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'vendedores/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'vendedores');
        }

	}


    public function eliminar($id_vendedor)
    {
        $delete = $this->vendedor->eliminar($id_vendedor);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'vendedores');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'vendedores');
        }
	}


    public function activar($id_vendedor)
    {
		$data = array('estado_vendedor' => 1);
		$activar = $this->vendedor->editar($data, $id_vendedor);
        if($activar === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro activado con éxito'));
            redirect(base_url().'vendedores');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido activar el registro'));
            redirect(base_url().'vendedores');
        }
	}


    public function desactivar($id_vendedor)
    {
		$data = array('estado_vendedor' => 2);
		$desactivar = $this->vendedor->editar($data, $id_vendedor);
        if($desactivar === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro desactivado con éxito'));
            redirect(base_url().'vendedores');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido desactivar el registro'));
            redirect(base_url().'vendedores');
        }
    }


}
