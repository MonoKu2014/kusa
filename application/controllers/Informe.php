<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informe extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('entradasModel', 'entrada');
        $this->load->model('productosModel', 'producto');
        $this->load->model('categoriasModel', 'categorias');
    }


	public function index()
	{
        $data['productos'] = $this->producto->listar();
        $data['categorias'] = $this->categorias->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/informe/inicio', $data);
		$this->load->view('backend/includes/footer');
	}

}
