<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('categoriasModel', 'categorias');
        $this->load->model('estadosModel', 'estado');
    }


	public function index()
	{
		$data['categorias'] = $this->categorias->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/categorias/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$data['estados']  = $this->estado->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/categorias/agregar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function guarda_categoria()
	{
		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        //670 x 540
        $file = $_FILES['imagen'];
        $temporal = $file['tmp_name'];
        $nombre = $file['name'];

        if($nombre == ''){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Agrega una imagen'));
            redirect(base_url().'categorias/agregar');
        } else {
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);

            if($width != $height){
                if($ext != 'jpg' || $ext != 'png'){
                    $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('La imagen no cumple con las especificaciones requeridas'));
                    redirect(base_url().'categorias/agregar');
                }
            }

            $directorio = 'assets/manager/categorias/';
            copy($temporal, $directorio.$nombre);
        }


        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_categoria' => $this->input->post('nombre'),
                'id_estado' => $this->input->post('estado'),
                'tipo' => $this->input->post('tipo'),
                'imagen_categoria' => $nombre
            );
        	$insert = $this->categorias->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'categorias/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'categorias');
        }
	}


	public function editar($id_categoria)
	{
		$data['categoria'] = $this->categorias->obtener($id_categoria);
		$data['estados']  = $this->estado->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/categorias/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_categoria()
	{

		$error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');


        //670 x 540
        $file = $_FILES['imagen'];
        $temporal = $file['tmp_name'];
        $nombre = $file['name'];

        if($nombre == ''){
            $nombre = $this->input->post('imagen_actual');
        } else {
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);

            if($width != $height){
                if($ext != 'jpg' || $ext != 'png'){
                    $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('La imagen no cumple con las especificaciones requeridas'));
                    redirect(base_url().'categorias/editar/' . $this->input->post('id_categoria'));
                }
            }

            $directorio = 'assets/manager/categorias/';
            copy($temporal, $directorio.$nombre);
        }


        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_categoria' => $this->input->post('nombre'),
                'id_estado' => $this->input->post('estado'),
                'tipo' => $this->input->post('tipo'),
                'imagen_categoria' => $nombre
            );
        	$insert = $this->categorias->editar($data, $this->input->post('id_categoria'));
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'categorias/editar/' . $this->input->post('id_categoria'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'categorias');
        }

	}


    public function eliminar($id_categoria)
    {
        $delete = $this->categorias->eliminar($id_categoria);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'categorias');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'categorias');
        }
    }

}
