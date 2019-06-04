<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('clientesModel', 'cliente');
        $this->load->model('estadosModel', 'estado');
    }


	public function index()
	{
		$data['clientes'] = $this->cliente->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/clientes/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


    public function eliminar($id)
    {
        $delete = $this->cliente->eliminar($id);
        if($delete === true){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro eliminado con éxito'));
            redirect(base_url().'clientes');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('No se ha podido eliminar el registro'));
            redirect(base_url().'clientes');
        }
    }


    public function exportar()
    {
        $usuarios = $this->cliente->consulta_exportar()->result();

        $cabeceras = $this->cliente->consulta_exportar()->list_fields();

        $nombre_archivo = 'Clientes_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $usuarios, $cabeceras);
    }


    public function ver($id)
    {
        $data['cliente'] = $this->cliente->obtener($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/clientes/ver', $data);
        $this->load->view('backend/includes/footer');

    }


    public function agregar()
    {
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/clientes/agregar');
        $this->load->view('backend/includes/footer');

    }


    public function editar($id)
    {
        $data['cliente'] = $this->cliente->obtener($id);
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/clientes/editar', $data);
        $this->load->view('backend/includes/footer');

    }


    public function guardar_edicion()
    {
        $error = 0;

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
        $this->form_validation->set_rules('comuna', 'Comuna', 'required');
        $this->form_validation->set_rules('calle', 'Calle', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
            $data = array(
                'nombre_cliente' => $this->input->post('nombre'),
                'rut_cliente' => $this->input->post('rut'),
                'region_cliente' => $this->input->post('region'),
                'comuna_cliente' => $this->input->post('comuna'),
                'calle_cliente' => $this->input->post('calle'),
                'numero_cliente' => $this->input->post('numero'),
                'email_cliente' => $this->input->post('email'),
                'password_cliente' => $this->input->post('password'),
                'fono_cliente' => $this->input->post('fono')
            );
            $update = $this->cliente->editar($data, $this->input->post('id_cliente'));
            if ($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido editar el registro'));
            redirect(base_url().'clientes/editar/'.$this->input->post('id_cliente'));
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro editado con éxito'));
            redirect(base_url().'clientes');
        }


    }


    public function guardar()
    {
        $error = 0;

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('paterno', 'Nombre', 'required');
        $this->form_validation->set_rules('materno', 'Nombre', 'required');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
            $fecha_nacimiento = $this->input->post('dia') . '-' . $this->input->post('mes') . '-' . $this->input->post('anio');
            $data_user = array(
                'nombre_cliente' => $this->input->post('nombre'),
                'apellidop_cliente' => $this->input->post('paterno'),
                'apellidom_cliente' => $this->input->post('materno'),
                'rut_cliente' => $this->input->post('rut'),
                'email_cliente' => $this->input->post('email'),
                'password_cliente' => $this->input->post('password'),
                'fono_cliente' => $this->input->post('fono'),
                'fechan_cliente' => $fecha_nacimiento,
                'id_estado' => 1,
                'recibe_info' => 0
            );
            $this->cliente->insertar($data_user);
            if ($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('No se ha podido crear el registro'));
            redirect(base_url().'clientes/agregar');
        } else {
            $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Registro creado con éxito'));
            redirect(base_url().'clientes');
        }


    }



    public function comunasPorRegion()
    {
        $region = $this->input->post('ide');
        $comunas = $this->functions->comunasPorRegion($region);
        $select = '<option value="">Selecciona comuna</option>';
        foreach ($comunas as $v) {
            $select .= '<option value="'.$v->nombre_comuna.'">'.ucwords($v->nombre_comuna).'</option>';
        }
        echo $select;
    }



}
