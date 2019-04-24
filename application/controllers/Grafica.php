<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grafica extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        validate_session_admin();
        $this->load->model('graficaModel', 'grafica');
    }


    public function index()
    {
        $data['grafica'] = $this->grafica->listar();
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/grafica/inicio', $data);
        $this->load->view('backend/includes/footer');
    }


    public function agregar()
    {
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/grafica/agregar');
        $this->load->view('backend/includes/footer');
    }


    public function guardar_primera_caluga()
    {
        $error = 0;

        $copia    = $_FILES['imagen_uno'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        if($imagen != ''){
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);
            if($image_width == 1200 && $image_height == 811){
                $directorio = 'assets/manager/web/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'grafica');
            }
        } else {
            if($this->input->post('video_uno') != ''){
                $imagen = '';
            } else {
                $imagen = $this->input->post('imagen_actual_uno');
            }
        }

        $data = array(
            'imagen_grafica' => $imagen,
            'video_grafica' => embed_video($this->input->post('video_uno')),
            'link_grafica' => $this->input->post('link_uno')
        );
        $insert = $this->grafica->editar($data, 1);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'grafica');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'grafica');
        }
    }





    public function guardar_segunda_caluga()
    {
        $error = 0;

        $copia    = $_FILES['imagen_dos'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        if($imagen != ''){
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);
            if($image_width == 1200 && $image_height == 811){
                $directorio = 'assets/manager/web/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'grafica');
            }
        } else {
            $imagen = $this->input->post('imagen_actual_dos');
        }

        $data = array(
            'imagen_grafica' => $imagen,
            'video_grafica' => '',
            'link_grafica' => $this->input->post('link_dos')
        );
        $insert = $this->grafica->editar($data, 2);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'grafica');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'grafica');
        }
    }







    public function guardar_tercera_caluga()
    {
        $error = 0;

        $copia    = $_FILES['imagen_tres'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        if($imagen != ''){
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);
            if($image_width == 1200 && $image_height == 811){
                $directorio = 'assets/manager/web/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'grafica');
            }
        } else {
            $imagen = $this->input->post('imagen_actual_tres');
        }

        $data = array(
            'imagen_grafica' => $imagen,
            'video_grafica' => '',
            'link_grafica' => $this->input->post('link_tres')
        );
        $insert = $this->grafica->editar($data, 3);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'grafica');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'grafica');
        }
    }




    public function guardar_cuarta_caluga()
    {
        $error = 0;

        $copia    = $_FILES['imagen_cuatro'];
        $temporal = $copia['tmp_name'];
        $imagen   = $copia['name'];

        if($imagen != ''){
            list($width, $height, $type, $attr) = getimagesize($temporal);
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);
            if($image_width == 1200 && $image_height == 811){
                $directorio = 'assets/manager/web/';
                copy($temporal, $directorio.$imagen);
            } else {
                $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Imagen no cumple con el tamaño'));
                redirect(base_url().'grafica');
            }
        } else {
            $imagen = $this->input->post('imagen_actual_cuatro');
        }

        $data = array(
            'imagen_grafica' => $imagen,
            'video_grafica' => '',
            'link_grafica' => $this->input->post('link_cuatro')
        );
        $insert = $this->grafica->editar($data, 4);
        if ($insert === false){
            $error = 1;
        }


        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'grafica');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'grafica');
        }
    }




}
