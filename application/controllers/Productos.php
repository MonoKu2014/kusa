<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        validate_session();
        $this->load->model('estadosModel', 'estado');
        $this->load->model('productosModel', 'producto');
    }


	public function index()
	{
		$data['productos'] = $this->producto->listar();
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/productos/inicio', $data);
		$this->load->view('backend/includes/footer');
	}


	public function agregar()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/productos/agregar');
		$this->load->view('backend/includes/footer');
	}


    public function exportar()
    {
        $this->load->view('backend/includes/header');
        $this->load->view('backend/includes/nav');
        $this->load->view('backend/productos/exportar');
        $this->load->view('backend/includes/footer');
    }


	public function guarda_producto()
	{

		$error = 0;
        $imagenes = [];
        $directorio = 'assets/manager/productos/';

        if($_FILES['imagen_uno']['name'] == ''){
            $this->session->set_flashdata('mensaje', alert_danger('Agrega mínimo una imagen'));
            redirect(base_url().'productos/agregar');
        }

        if($_FILES['imagen_uno']['name'] != ''){
            $temporal = $_FILES['imagen_uno']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_uno = $_FILES['imagen_uno']['name'];
                    copy($_FILES['imagen_uno']['tmp_name'], $directorio.$_FILES['imagen_uno']['name']);
                }
            }
        }

        if($_FILES['imagen_dos']['name'] != ''){
            $temporal = $_FILES['imagen_dos']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_dos = $_FILES['imagen_dos']['name'];
                    copy($_FILES['imagen_dos']['tmp_name'], $directorio.$_FILES['imagen_dos']['name']);
                }
            }
        } else {
            $imagen_dos = '';
        }

        if($_FILES['imagen_tres']['name'] != ''){
            $temporal = $_FILES['imagen_tres']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_tres = $_FILES['imagen_tres']['name'];
                    copy($_FILES['imagen_tres']['tmp_name'], $directorio.$_FILES['imagen_tres']['name']);
                }
            }
        } else {
            $imagen_tres = '';
        }

        if($_FILES['imagen_cuatro']['name'] != ''){
            $temporal = $_FILES['imagen_cuatro']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_cuatro = $_FILES['imagen_cuatro']['name'];
                    copy($_FILES['imagen_cuatro']['tmp_name'], $directorio.$_FILES['imagen_cuatro']['name']);
                }
            }
        } else {
            $imagen_cuatro = '';
        }


        $directorio_fichas = 'assets/manager/fichas/';
        if($_FILES['ficha']['name'] != ''){
            copy($_FILES['ficha']['tmp_name'], $directorio_fichas.$_FILES['ficha']['name']);
            $ficha = $_FILES['ficha']['name'];
        } else {
            $ficha = '';
        }

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_producto' => $this->input->post('nombre'),
                'codigo_producto' => $this->input->post('codigo'),
        		'id_categoria' => $this->input->post('categoria'),
				'precio_producto' => $this->input->post('precio'),
				'id_estado' => $this->input->post('estado'),
                'descripcion_producto' => $this->input->post('descripcion'),
                'stock_real' => $this->input->post('stock'),
                'precio_oferta' => $this->input->post('precio_oferta'),
                'imagen_1' => $imagen_uno,
                'imagen_2' => $imagen_dos,
                'imagen_3' => $imagen_tres,
                'imagen_4' => $imagen_cuatro,
                'ficha_producto' => $ficha
            );
        	$insert = $this->producto->insertar($data);
        	if ($insert === false){
        		$error = 1;
        	}
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'productos/agregar');
        } else {
            $this->session->set_flashdata('mensaje', alert_success('Registro creado con éxito'));
            redirect(base_url().'productos');
        }
	}


	public function editar($id_producto)
	{
        $data['producto'] = $this->producto->obtener($id_producto);
        $data['cantidad'] = 0;
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/productos/editar', $data);
		$this->load->view('backend/includes/footer');
	}


	public function editar_producto()
	{

        $error = 0;
        $imagenes = [];
        $directorio = 'assets/manager/productos/';

        if($_FILES['imagen_uno']['name'] != ''){
            $temporal = $_FILES['imagen_uno']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_uno = $_FILES['imagen_uno']['name'];
                    copy($_FILES['imagen_uno']['tmp_name'], $directorio.$_FILES['imagen_uno']['name']);
                }
            }
        } else {
            $imagen_uno = $this->input->post('imagen_actual_1');
        }

        if($_FILES['imagen_dos']['name'] != ''){
            $temporal = $_FILES['imagen_dos']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_dos = $_FILES['imagen_dos']['name'];
                    copy($_FILES['imagen_dos']['tmp_name'], $directorio.$_FILES['imagen_dos']['name']);
                }
            }
        } else {
            $imagen_dos = $this->input->post('imagen_actual_2');
        }

        if($_FILES['imagen_tres']['name'] != ''){
            $temporal = $_FILES['imagen_tres']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_tres = $_FILES['imagen_tres']['name'];
                    copy($_FILES['imagen_tres']['tmp_name'], $directorio.$_FILES['imagen_tres']['name']);
                }
            }
        } else {
            $imagen_tres = $this->input->post('imagen_actual_3');
        }

        if($_FILES['imagen_cuatro']['name'] != ''){
            $temporal = $_FILES['imagen_cuatro']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($temporal);
            if($width == $height){
                if($type == 2 || $type == 3){
                    $imagen_cuatro = $_FILES['imagen_cuatro']['name'];
                    copy($_FILES['imagen_cuatro']['tmp_name'], $directorio.$_FILES['imagen_cuatro']['name']);
                }
            }
        } else {
            $imagen_cuatro = $this->input->post('imagen_actual_4');
        }

        $directorio_fichas = 'assets/manager/fichas/';
        if($_FILES['ficha']['name'] != ''){
            copy($_FILES['ficha']['tmp_name'], $directorio_fichas.$_FILES['ficha']['name']);
            $ficha = $_FILES['ficha']['name'];
        } else {
            $ficha = '';
        }

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');

        if($this->form_validation->run() === FALSE){
            $error = 1;
        } else {
        	$data = array(
        		'nombre_producto' => $this->input->post('nombre'),
                'codigo_producto' => $this->input->post('codigo'),
        		'id_categoria' => $this->input->post('categoria'),
				'precio_producto' => $this->input->post('precio'),
				'id_estado' => $this->input->post('estado'),
                'descripcion_producto' => $this->input->post('descripcion'),
                'stock_real' => $this->input->post('stock'),
                'precio_oferta' => $this->input->post('precio_oferta'),
                'imagen_1' => $imagen_uno,
                'imagen_2' => $imagen_dos,
                'imagen_3' => $imagen_tres,
                'imagen_4' => $imagen_cuatro,
                'ficha_producto' => $ficha
            );
            $insert = $this->producto->editar($data, $this->input->post('id_producto'));
            if ($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('mensaje', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'productos/editar/'.$this->input->post('id_producto'));
        } else {
            $this->session->set_flashdata('mensaje', alert_success('Registro editado con éxito'));
            redirect(base_url().'productos');
        }

	}


    public function eliminar($id_producto)
    {
        $proccess = $this->producto->eliminar($id_producto);
        if($proccess === true){
            $this->session->set_flashdata('mensaje', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'productos');
        } else {
            $this->session->set_flashdata('mensaje', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'productos');
        }
    }



    public function activar($id_producto)
    {
        $data = array('id_estado' => 1);
        $proccess = $this->producto->activar($data, $id_producto);
        if($proccess === true){
            $this->session->set_flashdata('mensaje', alert_success('Registro activado con éxito'));
            redirect(base_url().'productos');
        } else {
            $this->session->set_flashdata('mensaje', alert_danger('No se ha podido activar el registro'));
            redirect(base_url().'productos');
        }
    }


    public function desactivar($id_producto)
    {
        $data = array('id_estado' => 0);
        $proccess = $this->producto->desactivar($data, $id_producto);
        if($proccess === true){
            $this->session->set_flashdata('mensaje', alert_success('Registro desactivado con éxito'));
            redirect(base_url().'productos');
        } else {
            $this->session->set_flashdata('mensaje', alert_danger('No se ha podido desactivar el registro'));
            redirect(base_url().'productos');
        }
    }


    public function bajar_excel($tipo)
    {
        $usuarios = $this->producto->consulta_exportar($tipo)->result();

        $cabeceras = $this->producto->consulta_exportar($tipo)->list_fields();

        $nombre_archivo = 'Productos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $usuarios, $cabeceras);
    }


	public function relacionar($id_producto)
	{
        $data['producto'] = $this->producto->obtener($id_producto);
        $data['posibles'] = $this->producto->listar_para_relaciones($id_producto);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/productos/relacionar', $data);
		$this->load->view('backend/includes/footer');
    }

    public function guarda_relaciones()
    {
        $producto = $this->input->post('id_producto');
        $relaciones = $this->input->post('relacion');

        foreach ($relaciones as $key => $value) {
            $data = array(
                'id_producto_padre' => $producto,
                'id_producto_relacionado' => $key
            );
            $this->producto->insertar_relacion($data);
            unset($data);
        }

        $this->session->set_flashdata('mensaje', alert_success('Relaciones guardadas con éxito'));
        redirect(base_url().'productos');
    }

    public function tallas($id_producto)
    {
        $data['producto'] = $this->producto->obtener($id_producto);
        $data['detalle'] = $this->producto->detalle_tallas($id_producto);
		$this->load->view('backend/includes/header');
		$this->load->view('backend/includes/nav');
		$this->load->view('backend/productos/tallas', $data);
		$this->load->view('backend/includes/footer');
    }


    public function guarda_tallas()
    {
        $id_producto = $this->input->post('id_producto');
        $accion = $this->input->post('accion');

        $talla = $this->input->post('talla');
        $color = $this->input->post('color');
        $precio = $this->input->post('precio');
        $oferta = $this->input->post('oferta');
        $cantidad = $this->input->post('cantidad');

        if($talla == '' || $precio == '' || $cantidad == ''){
            $this->session->set_flashdata('mensaje', alert_danger('Debes llenar los campos obligatorios, que son talla, precio y cantidad'));
            redirect(base_url().'productos/tallas/' . $id_producto);
        }

        $data = array(
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'color' => $color,
            'talla' => $talla,
            'precio' => $precio,
            'oferta' => $oferta
        );

        $this->producto->insertar_talla($data);
        if($accion == 'Guardar'){
            $this->session->set_flashdata('mensaje', alert_success('Detalle guardado con éxito'));
            redirect(base_url().'productos/tallas/' . $id_producto);
        } else {
            $this->session->set_flashdata('mensaje', alert_success('Detalle finalizado con éxito'));
            redirect(base_url().'productos');
        }
    }


}
