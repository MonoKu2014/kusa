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

        if($_FILES['imagenes']['name'][0] == ''){
            $this->session->set_flashdata('mensaje', alert_danger('Agrega mínimo una imagen'));
            redirect(base_url().'productos/agregar');
        }

        for ($x = 0; $x < 4; $x++) {

            $imagenes[$x] = '';

            if(isset($_FILES['imagenes']['name'][$x])){

                $temporal = $_FILES['imagenes']['tmp_name'][$x];

                list($width, $height, $type, $attr) = getimagesize($temporal);
                $ext = pathinfo($nombre, PATHINFO_EXTENSION);

                if($width == $height){
                    if($ext == 'jpg' || $ext == 'png'){
                        $imagenes[$x] = $_FILES['imagenes']['name'][$x];
                        copy($_FILES['imagenes']['tmp_name'][$x], $directorio.$_FILES['imagenes']['name'][$x]);
                    }
                }
            }
        }

        $directorio_fichas = 'assets/manager/fichas/';
        if($_FILES['ficha']['name'] == ''){
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
                'imagen_1' => $imagenes[0],
                'imagen_2' => $imagenes[1],
                'imagen_3' => $imagenes[2],
                'imagen_4' => $imagenes[3],
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

            $file = $_FILES['imagen'];
            $temporal = $file['tmp_name'];
            $nombre = $file['name'];

            if($nombre == ''){
                $imagen = $this->input->post('imagen_actual');
            } else {
                $imagen = $nombre;
                $directorio = 'assets/manager/productos/';
                copy($temporal, $directorio.$nombre);
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
                'imagen_producto' => $imagen,
                'id_estado' => $this->input->post('estado'),
                'destacado' => $this->input->post('destacado'),
                'descripcion_producto' => $this->input->post('descripcion'),
                'stock_real' => $this->input->post('stock'),
                'precio_oferta' => $this->input->post('precio_oferta')
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
            $this->session->set_flashdata('mensaje', alert_success('No se ha podido eliminar el registro'));
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
            $this->session->set_flashdata('mensaje', alert_success('No se ha podido activar el registro'));
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
            $this->session->set_flashdata('mensaje', alert_success('No se ha podido desactivar el registro'));
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


}
