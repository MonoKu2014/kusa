<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('categoriasModel', 'categorias');
        $this->load->model('usuariosModel', 'usuario');
        $this->load->model('vendedoresModel', 'vendedor');
    }


	public function index()
	{
        $data['vendedores'] = $this->vendedor->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/main/inicio', $data);
		$this->load->view('backend/includes/footer');
	}
}
