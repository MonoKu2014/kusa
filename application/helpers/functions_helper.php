<?php defined('BASEPATH') OR exit('No direct script access allowed');


//si no hay sesion, lo redirijo al inicio donde esta el login
function validate_session()
{
	$ci =& get_instance();
    if($ci->session->id == ''){
    	$message = 'Debe iniciar sesión para acceder a este contenido';
    	$ci->session->set_flashdata('message', alert_danger($message));
        redirect(base_url().'panel');
    }
}


//validar si es admin
function validate_session_admin()
{
	$ci =& get_instance();
    if($ci->session->perfil == 0){
    	$message = 'No puedes acceder a este contenido';
    	$ci->session->set_flashdata('message', alert_danger($message));
        redirect(base_url().'panel');
    }
}


//validar si es vendedor
function validate_session_seller()
{
	$ci =& get_instance();
    if($ci->session->id > 0){
    	$message = 'No puedes acceder a este contenido';
    	$ci->session->set_flashdata('message', alert_danger($message));
        redirect(base_url().'panel');
    }
}


//para imprimir la última consulta que se realiza a la base de datos y poder depurar bien una query
function query_logger()
{
	$ci =& get_instance();
	dd($ci->db->last_query());
}


//funciona igual que el dd de laravel
function dd($var)
{
	var_dump($var);
	die();
}


function alert_success($text)
{
	return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
}

function alert_danger($text)
{
	return '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> '.$text.'</div>';
}

function alert_info($text)
{
	return '<div class="alert alert-info"><i class="fa fa-info-circle"></i> '.$text.'</div>';
}


function money($price)
{
    return number_format($price, 0, ',', '.');
}

function verificar_disponibilidad($producto)
{
	$stock_total = $producto->stock_huerfanos + $producto->stock_marin + $producto->stock_providencia;
	if($stock_total < $producto->cantidad_producto){
		return 0;
	}
	return 1;
}

function planes($limit = null)
{
	$ci =& get_instance();
	if($limit != null){
		$ci->db->limit($limit);
	}
	$ci->db->order_by('orden', 'asc');
	$ci->db->where('tipo', 'plan');
	return $ci->db->get('categorias')->result();
}

function categorias_tienda()
{
	$ci =& get_instance();
	$ci->db->order_by('orden', 'asc');
	$ci->db->where('tipo', 'producto');
	return $ci->db->get('categorias')->result();
}

function slug_cat($id, $text)
{
	$slug_url = '';
	$parts = explode(' ', $text);
	foreach($parts as $part){
		if ($part === end($parts)) {
			$slug_url .= $part;
		} else {
			$slug_url .= $part . '-';
		}
	}
	return $id .'-'.$slug_url;
}

function slug_prod($id, $text)
{
	$slug_url = '';
	$parts = explode(' ', $text);
	foreach($parts as $part){
		if ($part === end($parts)) {
			$slug_url .= $part;
		} else {
			$slug_url .= $part . '-';
		}
	}
	return $id .'-'.$slug_url;
}


function slug_back($text)
{
	$parts = explode('-', $text);
	return $parts[0];
}

function regions()
{
	$ci =& get_instance();
	return $ci->db->get('regiones')->result();
}

function communes_for_region($id)
{
	$ci =& get_instance();
	$ci->db->order_by('nombre_comuna', 'asc');
	$ci->db->where('id_region', $id);
	return $ci->db->get('comunas')->result();
}

function adresses($id)
{
	$ci =& get_instance();
	$ci->db->where('id_cliente', $id);
	$ci->db->where('estado', 1);
	$ci->db->join('comunas c', 'cd.comuna_direccion = c.id_comuna');
	$ci->db->join('regiones r', 'cd.region_direccion = r.id_region');
	return $ci->db->get('clientes_direcciones cd')->result();
}

function format_custom_date($date)
{
	$parts = explode('-', $date);
	return $parts[0] . ' | ' . $parts[1] . ' | ' . $parts[2];
}

function format_date_db($date)
{
	$parts = explode('-', $date);
	return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
}


function tracking_realize($id_pedido, $etapa)
{
	$ci =& get_instance();
	$ci->db->where('id_pedido', $id_pedido);
	$ci->db->where('etapa_tracking', $etapa);
	$datos = $ci->db->get('tracking_pedidos')->row();
	if(!$datos){
		return '';
	}
	return $datos->fecha_tracking . ' ' . $datos->hora_tracking;
}


function state($etapa)
{
	$ci =& get_instance();
	$ci->db->where('id_estado', $etapa);
	return $ci->db->get('estados')->row();
}


function seller_name($id_vendedor)
{
	if($id_vendedor == 0){
		return 'Venta Libre';
	}

	$ci =& get_instance();
	$ci->db->where('id_vendedor', $id_vendedor);
	$datos = $ci->db->get('vendedores')->row();

	return $datos->nombre_vendedor;
}

function region($id)
{
	$ci =& get_instance();
	$ci->db->where('id_region', $id);
	return $ci->db->get('regiones')->row()->nombre_region;
}

function commune($id)
{
	$ci =& get_instance();
	$ci->db->where('id_comuna', $id);
	return $ci->db->get('comunas')->row()->nombre_comuna;
}

function count_registers($tabla)
{
	$ci =& get_instance();
	return $ci->db->count_all_results($tabla);
}

function random_password() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function embed_video($video){
    if($video == ''){
        return '';
    }

    $video = str_replace(array('watch?v='), array('embed/'), $video);
    return $video;
}

function desembed_video($video){
    if($video == ''){
        return '';
    }

    $video = str_replace(array('embed/'), array('watch?v='), $video);
    return $video;
}

function cantidad_ventas($id_vendedor)
{
	$ci =& get_instance();
	$ci->db->where('id_vendedor', $id_vendedor);
	$ci->db->where('estado_pedido >', 0);
	return $ci->db->count_all_results('pedidos');
}

function actual_cantity($id_prod)
{
	$ci =& get_instance();
	$ci->db->where('id_producto', $id_prod);
	return $ci->db->get('productos')->row()->stock_real;
}

function delivery_value($total)
{
	$ci =& get_instance();
	$ci->db->where('desde_valor_despacho <=', $total);
	$ci->db->where('hasta_valor_despacho >=', $total);
	$delivery = $ci->db->get('valor_despacho')->row()->cobro_despacho;
	if($delivery){
		return $delivery;
	}
	return '';
}


function total_cantity($id_prod)
{
	$sum = 0;
	$ci =& get_instance();
	$ci->db->where('id_producto', $id_prod);
	$cantidades = $ci->db->get('productos_detalle')->result();
	foreach ($cantidades as $cant) {
		$sum = $sum + $cant->cantidad;
	}
	return $sum;
}