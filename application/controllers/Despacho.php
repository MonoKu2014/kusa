<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Despacho extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('despachoModel', 'despacho');
    }


	public function index()
	{
        $data['despachos'] = $this->despacho->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/despacho/inicio', $data);
		$this->load->view('backend/includes/footer');
    }


    public function guardar_despachos()
    {

        $rango_desde_uno        = $this->input->post('rango_uno_desde');
        $rango_hasta_uno        = $this->input->post('rango_uno_hasta');
        $cobro_despacho_uno     = $this->input->post('cobro_despacho_uno');

        $rango_desde_dos        = $this->input->post('rango_dos_desde');
        $rango_hasta_dos        = $this->input->post('rango_dos_hasta');
        $cobro_despacho_dos     = $this->input->post('cobro_despacho_dos');

        $rango_desde_tres       = $this->input->post('rango_tres_desde');
        $rango_hasta_tres       = $this->input->post('rango_tres_hasta');
        $cobro_despacho_tres    = $this->input->post('cobro_despacho_tres');

        $rango_desde_cuatro     = $this->input->post('rango_cuatro_desde');
        $rango_hasta_cuatro     = $this->input->post('rango_cuatro_hasta');
        $cobro_despacho_cuatro  = $this->input->post('cobro_despacho_cuatro');


        if ($rango_hasta_uno >= $rango_desde_dos){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Los valores no cumplen'));
            redirect(base_url().'despacho');
        }

        if ($rango_hasta_dos >= $rango_desde_tres){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Los valores no cumplen'));
            redirect(base_url().'despacho');
        }

        if ($rango_hasta_tres >= $rango_desde_cuatro){
            $this->session->set_flashdata('mensaje', $this->functions->showAlertDanger('Los valores no cumplen'));
            redirect(base_url().'despacho');
        }

        $data_uno = array(
            'desde_valor_despacho' => $rango_desde_uno,
            'hasta_valor_despacho' => $rango_hasta_uno,
            'cobro_despacho' => $cobro_despacho_uno
        );
        $this->despacho->editar($data_uno, 1);

        $data_dos = array(
            'desde_valor_despacho' => $rango_desde_dos,
            'hasta_valor_despacho' => $rango_hasta_dos,
            'cobro_despacho' => $cobro_despacho_dos
        );
        $this->despacho->editar($data_dos, 2);

        $data_tres = array(
            'desde_valor_despacho' => $rango_desde_tres,
            'hasta_valor_despacho' => $rango_hasta_tres,
            'cobro_despacho' => $cobro_despacho_tres
        );
        $this->despacho->editar($data_tres, 3);

        $data_cuatro = array(
            'desde_valor_despacho' => $rango_desde_cuatro,
            'hasta_valor_despacho' => $rango_hasta_cuatro,
            'cobro_despacho' => $cobro_despacho_cuatro
        );
        $this->despacho->editar($data_cuatro, 4);

        $this->session->set_flashdata('mensaje', $this->functions->showAlertSuccess('Valores editados correctamente'));
        redirect(base_url().'despacho');

    }


}