<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
		$this->load->model('usuariosModel', 'usuario');
		$this->load->model('vendedoresModel', 'vendedor');
    }


	public function index()
	{
		$id_usuario = $this->session->id;

		if($this->session->perfil > 0){
			$usuario = $this->usuario->obtener($id_usuario);
			$data['nombre'] = $usuario[0]->nombre_usuario;
			$data['email'] = $usuario[0]->email_usuario;
			$data['perfil'] = 'Administrador';
			$data['estado'] = $usuario[0]->estado;
			$data['password'] = $usuario[0]->password_usuario;
		} else {
			$vendedor = $this->vendedor->obtener($id_usuario);
			$data['nombre'] = $vendedor[0]->nombre_vendedor;
			$data['email'] = $vendedor[0]->email_vendedor;
			$data['perfil'] = 'Vendedor';
			$data['estado'] = $vendedor[0]->estado;
			$data['password'] = $vendedor[0]->password_vendedor;
		}

		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/cuenta/inicio', $data);
		$this->load->view('backend/includes/footer');
	}

}
