<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('homeModel', 'home');
    }


	public function comunas_por_region()
	{
        $id_region = $this->input->post('region');
        $comunas = communes_for_region($id_region);
        $text = '';
        foreach ($comunas as $comuna) {
            $text .= '<option value="'.$comuna->id_comuna.'">'.$comuna->nombre_comuna.'</option>';
        }

        echo $text;
    }


    public function agregar_producto()
    {
        $id_producto = $this->input->post('id');
        $cantidad = $this->input->post('cantidad');
        $existe = 0;
        foreach ($_SESSION['carro'] as $k => $cart) {
            if($cart['id'] == $id_producto){
                $cantidad = $cart['cantidad'] + 1;
                $existe = 1;
                $_SESSION['carro'][$k]['cantidad'] = $cantidad;
            }
        }


        if($existe == 0){
            $producto = $this->home->obtener_producto($id_producto);

            $data = array(
                'id'        => $producto->id_producto,
                'cantidad'  => $cantidad,
                'precio'    => $producto->precio_producto,
                'nombre'    => $producto->nombre_producto,
                'imagen'    => $producto->imagen_1,
                'codigo'    => $producto->codigo_producto
            );
            array_push($_SESSION['carro'], $data);
        }

        echo 0;
    }

	public function eliminar_producto()
	{
		$index = $this->input->post('index');
        unset($_SESSION['carro'][$index]);
        echo 0;
    }

    public function agregar_direccion()
    {
        if($this->session->id != '' || $this->session->id != null){
            $calle  = $this->input->post('calle');
            $numero = $this->input->post('numero');
            $region = $this->input->post('region');
            $comuna = $this->input->post('comuna');

            $data_address = array(
                'calle_direccion' => $calle,
                'numero_direccion' => $numero,
                'region_direccion' => $region,
                'comuna_direccion' => $comuna,
                'tipo_direccion' => 2,
                'id_cliente' => $this->session->id
            );

            $this->home->insertar_direccion($data_address);
            $id = $this->db->insert_id();
            echo 0;
        } else {
            echo 1;
        }
    }

    public function eliminar_direccion()
    {
        $id_direccion = $this->input->post('index');
        $this->home->eliminar_direccion($id_direccion);
        echo 0;
    }



    public function detalle_historial()
    {
        $id_pedido = $this->input->post('id');
        $data['pedido'] = $this->home->obtener_pedido_actual($id_pedido);
        $data['detalle'] = $this->home->obtener_detalle_pedido($id_pedido);
        echo $this->load->view('modals/detalle_pedido', $data, true);
    }

    public function tracking_historial()
    {
        $id_pedido = $this->input->post('id');
        $data['pedido'] = $this->home->obtener_pedido_actual($id_pedido);
        echo $this->load->view('modals/tracking_pedido', $data, true);
    }

}
