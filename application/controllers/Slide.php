<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class slide extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('slideModel', 'slide');
    }


    public function index()
    {
        $data['slide'] = $this->slide->listar();
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/slide/inicio', $data);
        $this->load->view('backend/includes/footer');
    }


    public function agregar()
    {
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/slide/agregar');
        $this->load->view('backend/includes/footer');
    }


    public function guarda_slide()
    {
        $error = 0;


        $copia    = $_FILES['archivo'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        $image_info = getimagesize($temporal);
        $image_width = $image_info[0];
        $image_height = $image_info[1];

        if($imagen != ''){
            if($image_width == 960 && $image_height == 450){
                $directorio = 'assets/slide/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'slide/agregar');
            }
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen es obligatorio'));
            redirect(base_url().'slide/agregar');
        }


        $data = array(
            'imagen_slide' => $imagen,
            'estado' => 1
        );
        $insert = $this->slide->insertar($data);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'slide/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'slide');
        }
    }


    public function editar($id_slide)
    {
        $id_slide = $id_slide;

        $data['slide'] = $this->slide->obtener($id_slide);

        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/slide/editar', $data);
        $this->load->view('backend/includes/footer');
    }


    public function editar_slide()
    {

        $error = 0;


        $copia    = $_FILES['archivo'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        $image_info = getimagesize($temporal);
        $image_width = $image_info[0];
        $image_height = $image_info[1];

        if($imagen != ''){
            if($image_width == 960 && $image_height == 450){
                $directorio = 'assets/slide/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'slide/agregar');
            }
        } else {
            $imagen = $this->input->post('imagen_actual');
        }



        $data = array(
            'imagen_slide' => $imagen,
            'estado' => $this->input->post('estado')
        );
        $insert = $this->slide->editar($data, $_POST['id_slide']);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'slide/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'slide');
        }

    }


    public function eliminar($id_slide)
    {
        $delete = $this->slide->eliminar($id_slide);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'slide');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'slide');
        }
    }


}
