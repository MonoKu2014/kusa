<?php

class FunctionsModel extends CI_Model {


        public function __construct()
        {

                parent::__construct();

        }


/*===============================================================================================*/
/*===============================================================================================*/

    //FUNCTIONES GLOBALES validar accesos, emails, formatos, sanitizar inputs, fechas, etc...


        public function AccessValidate()
        {
            if(!$user = $this->session->id_usuario){
                redirect(base_url().'panel');
            }
        }


        public function AccessValidateFrontEnd()
        {
            if(!$id = $this->session->id){
                $this->session->set_flashdata('mensaje', self::showAlertWarning('Inicia tu sesión para acceder al contenido'));
                redirect(base_url());
            }
        }


        public function rememberPassword($email)
        {
            $this->db->where('email_cliente', $email);
            $query = $this->db->get('clientes');
            return $query->result();
        }


        public function getActiveNav()
        {

            $full_name = $_SERVER[ 'REQUEST_URI' ];
            $name_array = explode( '/', $full_name );
            $count = count($name_array);
            $page_name = $name_array[$count - 1];
            return $page_name;

        }


        public function activeNav($identify)
        {

            if($identify == self::getActiveNav()) {
                $class = 'class="active"';
            } else {
                $class = '';
            }

            return $class;

        }


        public function validateEmail($email)
        {

           $pattern = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
           if(preg_match($pattern, $email)) {
              return true;
           } else {
             return false;
           }

        }

        public function validateRut($rut)
        {

            if (!preg_match("/^[0-9]+-[0-9kK]{1}/", $rut)) return false;
                $partes = explode('-', $rut);
                return strtolower($partes[1]) == Functions::dv($partes[0]);

        }


        static function dv($dv)
        {

            $m = 0;
            $s = 1;
            for(;$dv;$dv=floor($dv/10))
                $s=($s+$dv%10*(9-$m++%6))%11;
            return $s?$s-1:'k';

        }

        public function createPassword()
        {
            $may  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $cadena = str_shuffle($may);
            $passMay = substr($cadena, 1,1);

            $min = "abcdefghijklmnopqrstuvwxyz";
            $cadena2 = str_shuffle($min);
            $passMin = substr($cadena2, 5,3);

            $passPoint = '.';

            $num = "1234567890";
            $cadena3 = str_shuffle($num);
            $passNum = substr($cadena3, 2,4);

            return $passMay.$passMin.$passPoint.$passNum;
        }


        public function moneda($valor)
        {
            return number_format($valor, 0, ',', '.');
        }


        public function suma_dias($fecha)
        {
            $dia_actual = date('w');

            //VIERNES
            if($dia_actual == 5  && self::pedidos_pagados_hoy() == 30){ $dias = 4; }
            if($dia_actual == 5  && self::pedidos_pagados_hoy() < 30){ $dias = 3; }

            //SÁBADO
            if($dia_actual == 6  && self::pedidos_pagados_hoy() == 30){ $dias = 3; }
            if($dia_actual == 6  && self::pedidos_pagados_hoy() < 30){ $dias = 2; }

            //DOMINGO A JUEVES
            if($dia_actual < 5  && self::pedidos_pagados_hoy() == 30){ $dias = 2; }
            if($dia_actual < 5  && self::pedidos_pagados_hoy() < 30){ $dias = 1; }

            $nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ($fecha)) ;
            $nuevafecha = date ('Y-m-d' , $nuevafecha);
            return $nuevafecha;
        }


        public function suma_despacho($total, $comuna)
        {
            return $total;
        }

        public function mostrar_valor_despacho($subtotal, $comuna)
        {
            return 0;
        }


        function removeSpamHeaders($campo){

            $badHeads = array("Content-Type:",
            "MIME-Version:",
            "Content-Transfer-Encoding:",
            "Return-path:",
            "Subject:",
            "From:",
            "Envelope-to:",
            "To:",
            "bcc:",
            "cc:");

            foreach($badHeads as $valor){
                if(strpos(strtolower($campo), strtolower($valor)) !== false){
                    header( "HTTP/1.0 403 Forbidden");
                    exit;
                }
            }

            return $campo;
        }


//FIN - GENERALES

/*===============================================================================================*/
/*===============================================================================================*/




/*===============================================================================================*/
/*===============================================================================================*/

    //ALERTAS PARA EL SITIO! son los mensajes que se muestra al usuario que realiza interacciones con el sitio

        public function showAlertSuccess($texto)
        {
            return '<div class="alert alert-success">'.$texto.'</div>';
        }

        public function showAlertdanger($texto)
        {
            return '<div class="alert alert-danger">'.$texto.'</div>';
        }

        public function showAlertWarning($texto)
        {
            return '<div class="alert alert-danger">'.$texto.'</div>';
        }

        public function showAlertInfo($texto)
        {
            return '<div class="alert alert-info">'.$texto.'</div>';
        }

//FIN MENSAJES - ALERTAS

/*===============================================================================================*/
/*===============================================================================================*/


/*===============================================================================================*/
/*===============================================================================================*/

    //LISTADO DE GLOBALES (Regiones, Comunas, Perfiles, ETC....)


        public function listarCategorias()
        {
            $this->db->limit(5);
            $this->db->order_by('nombre_categoria', 'asc');
            $this->db->where('listar', 1);
            return $query = $this->db->get('categorias')->result();
        }

        //sólo las de la región metropolitana
        public function listarComunas()
        {
            $this->db->where('id_region', 17);
            $this->db->order_by('nombre_comuna', 'asc');
            return $query = $this->db->get('comunas')->result();
        }


        public function listarRegiones()
        {
            $this->db->order_by('nombre_region', 'asc');
            return $query = $this->db->get('regiones')->result();
        }



        public function comunasPorRegion($id)
        {
            $this->db->where('id_region', $id);
            $this->db->order_by('nombre_comuna', 'asc');
            return $query = $this->db->get('comunas')->result();
        }


        //FIN FUNCIONES GLOBALES
/*===============================================================================================*/
/*===============================================================================================*/


/*===============================================================================================*/
/*===============================================================================================*/


        /*
            para la tabla generales
            la función recibe el id del dato y retorna el valor asociado
        */

        public function textoGeneral($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('generales');
            $result = $query->row();
            return $result->texto;
        }


        public function nuevoNombre()
        {

            $this->load->library('encryption');
            $name = bin2hex($this->encryption->create_key(10));
            $date = date('YmdHis');
            return $date.$name;

        }


        public function ultimosProductosColumnaUno()
        {
            $this->db->order_by('id_producto', 'desc');
            $this->db->limit(4, 0);
            $this->db->where('id_estado', 1);
            $this->db->where('destacado', 1);
            return $query = $this->db->get('productos')->result();
        }


        public function ultimosProductosColumnaDos()
        {
            $this->db->order_by('id_producto', 'desc');
            $this->db->limit(4, 4);
            $this->db->where('id_estado', 1);
            $this->db->where('destacado', 1);
            return $query = $this->db->get('productos')->result();
        }

        public function productosPorCategoria($id)
        {
            $this->db->order_by('id_producto', 'desc');
            $this->db->where('id_categoria', $id);
            $this->db->where('id_estado', 1);
            return $query = $this->db->get('productos')->result();
        }


        public function categoriaPorID($id)
        {
            $this->db->where('id_categoria', $id);
            return $query = $this->db->get('categorias')->result();
        }

        public function obtenerLogin($email, $password)
        {
            $this->db->where('id_estado', 1);
            $this->db->where('email_cliente', $email);
            $this->db->where('password_cliente', $password);
            $query = $this->db->get('clientes');
            return $query->row();
        }

        public function obtenerProductoPorID($id)
        {
            $this->db->where('id_producto', $id);
            return $query = $this->db->get('productos')->result();
        }

        public function listadoProductos()
        {
            $this->db->order_by('nombre_producto', 'asc');
            return $query = $this->db->get('productos')->result();
        }

        public function registro($data)
        {
            return $this->db->insert('clientes', $data);
        }

        public function editar_registro($data, $id_cliente)
        {
            $this->db->where('id_cliente', $id_cliente);
            return $this->db->update('clientes', $data);
        }

        public function insertar_pedido($data)
        {
            return $this->db->insert('pedidos', $data);
        }

        public function insertar_producto_pedido($data)
        {
            return $this->db->insert('productos_pedido', $data);
        }

        public function insertar_datos_pedido($data)
        {
            return $this->db->insert('datos_pedido', $data);
        }

        public function obtener_pedido($id_pedido)
        {
            $this->db->where('p.id_pedido', $id_pedido);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido dp', 'dp.id_pedido = p.id_pedido');
            $this->db->join('productos_pedido pp', 'pp.id_pedido = p.id_pedido');
            $this->db->join('productos pro', 'pro.id_producto = pp.id_producto');
            return $this->db->get('pedidos p')->result();
        }


        public function pedidos_pagados_hoy()
        {
            $this->db->where('fecha_pedido', date('Y-m-d'));
            return $this->db->count_all_results('pedidos');
        }


        public function numero_pedido()
        {
            $this->db->select_max('id_pedido', 'numero_pedido');
            $query = $this->db->get('pedidos')->result();
            return $query;
        }


        public function estado_pedido($id_estado)
        {

            if($id_estado == 0){
                return '<span class="label label-default">Pendiente</span>';
            }

            if($id_estado == 1){
                return '<span class="label label-info">Pagado</span>';
            }

            if($id_estado == 2){
                return '<span class="label label-warning">Preparando Productos</span>';
            }

            if($id_estado == 3){
                return '<span class="label label-success">Productos Despachados</span>';
            }

            if($id_estado == 4){
                return '<span class="label label-primary">Productos Entregados</span>';
            }

            if($id_estado == 5){
                return '<span class="label label-danger">Pedido cancelado</span>';
            }

        }


        public function fechas_pedidos()
        {
            $this->db->order_by('fecha_pedido', 'desc');
            $this->db->distinct();
            $this->db->select('fecha_pedido');
            $query = $this->db->get('pedidos')->result();
            return $query;
        }


        public function obtenerCliente($id)
        {
            $this->db->where('id_estado', 1);
            $this->db->where('id_cliente', $id);
            $query = $this->db->get('clientes');
            return $query->row();
        }

        public function mis_pedidos($id)
        {
            $this->db->where('p.id_cliente', $id);
            $this->db->join('datos_pedido dp', 'dp.id_pedido = p.id_pedido');
            return $this->db->get('pedidos p')->result();
        }


        public function pedido($id)
        {
            $this->db->where('p.id_pedido', $id);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido dp', 'dp.id_pedido = p.id_pedido');
            $this->db->join('productos_pedido pp', 'pp.id_pedido = p.id_pedido');
            $this->db->join('productos pro', 'pro.id_producto = pp.id_producto');
            return $this->db->get('pedidos p')->result();
        }






/**********************************************************************************************/



        /*
            para la tabla generales
            2 = email contacto
            1 = email pago
            3 = fono empresa
            4 = cuenta corriente
            se pueden ir agregando datos generales que de acuerdo al país vayan cambiando

            la función recibe el id del dato y retorna el valor asociado
        */

        public function texto_general($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('generales');
            $result = $query->row();
            return $result->texto;
        }


        public function editar_general($data, $id)
        {
            $this->db->where('id', $id);
            return $this->db->update('generales', $data);
        }


        public function video()
        {
            $query = $this->db->get('video');
            return $result = $query->row();
        }

        public function editar_video($data, $id)
        {
            $this->db->where('id_video', $id);
            return $this->db->update('video', $data);
        }


        public function formatear_comunas($data)
        {
            return $this->db->update('comunas', $data);
        }


        public function mostrar_comuna($data, $id)
        {
            $this->db->where('id_comuna', $id);
            return $this->db->update('comunas', $data);
        }


        public function busqueda($termino)
        {
            $query = "select * from productos where id_estado = 1 and nombre_producto like '%".strtolower($termino)."%'";
            return $this->db->query($query)->result();
        }



        public function descuento()
        {
            $query = $this->db->get('descuento');
            return $result = $query->row();
        }


        public function editar_descuento($data)
        {
            $this->db->where('id_descuento', 1);
            return $this->db->update('descuento', $data);
        }


        public function embed_youtube($video)
        {
            $embed = str_replace('watch?v=', 'embed/', $video);
            return $embed;
        }


        public function comunas_activas()
        {
            $this->db->where('mostrar_comuna', 1);
            $this->db->order_by('nombre_comuna', 'asc');
            return $this->db->get('comunas')->result();
        }

        public function valores_ingresados($id)
        {
            $respuesta = '<span class="label label-danger">No</span>';
            $this->db->where('id_pedido', $id);
            $res = $this->db->get('productos_pedido')->result();
            foreach ($res as $key => $value) {
                if($value->valor_unitario != ''){
                    $respuesta = '<span class="label label-success">Si</label>';
                    continue;
                }
            }

            return $respuesta;
        }


        public function agregar_editar($id)
        {
            $respuesta = 0;
            $this->db->where('id_pedido', $id);
            $res = $this->db->get('productos_pedido')->result();
            foreach ($res as $key => $value) {
                if($value->valor_unitario != ''){
                    $respuesta = 1;
                    continue;
                }
            }

            return $respuesta;
        }

        public function inicio_final_mes($id_mes, $anio)
        {
            $array = [];

            if($id_mes == 1){
                $array['inicio'] = $anio.'-01-01';
                $array['final']  = $anio.'-01-31';
            } elseif ($id_mes == 2){
                $array['inicio'] = $anio.'-02-01';
                $array['final']  = $anio.'-02-31';
            } elseif ($id_mes == 3){
                $array['inicio'] = $anio.'-03-01';
                $array['final']  = $anio.'-03-31';
            } elseif ($id_mes == 4){
                $array['inicio'] = $anio.'-04-01';
                $array['final']  = $anio.'-04-31';
            } elseif ($id_mes == 5){
                $array['inicio'] = $anio.'-05-01';
                $array['final']  = $anio.'-05-31';
            } elseif ($id_mes == 6){
                $array['inicio'] = $anio.'-06-01';
                $array['final']  = $anio.'-06-31';
            } elseif ($id_mes == 7){
                $array['inicio'] = $anio.'-07-01';
                $array['final']  = $anio.'-07-31';
            } elseif ($id_mes == 8){
                $array['inicio'] = $anio.'-08-01';
                $array['final']  = $anio.'-08-31';
            } elseif ($id_mes == 9){
                $array['inicio'] = $anio.'-09-01';
                $array['final']  = $anio.'-09-31';
            } elseif ($id_mes == 10){
                $array['inicio'] = $anio.'-10-01';
                $array['final']  = $anio.'-10-31';
            } elseif ($id_mes == 11){
                $array['inicio'] = $anio.'-11-01';
                $array['final']  = $anio.'-11-31';
            } else {
                $array['inicio'] = $anio.'-12-01';
                $array['final']  = $anio.'-12-31';
            }

            return $array;

        }


        public function cantidad_pedidos($fecha_despacho)
        {
            $this->db->where('estado_pedido', 3);
            $this->db->where('fecha_despacho', $fecha_despacho);
            return $this->db->count_all_results('pedidos');
        }

        public function compra($fecha_despacho)
        {
            $this->db->where('estado_pedido', 3);
            $this->db->where('fecha_despacho', $fecha_despacho);
            $this->db->join('productos_pedido pp', 'pp.id_pedido = p.id_pedido');
            $data = $this->db->get('pedidos p')->result();
            $total = 0;
            foreach ($data as $d){
                $total = $total + $d->valor_unitario;
            }

            return $total;
        }


        public function venta($fecha_despacho)
        {
            $this->db->where('estado_pedido', 3);
            $this->db->where('fecha_despacho', $fecha_despacho);
            $this->db->join('productos_pedido pp', 'pp.id_pedido = p.id_pedido');
            $data = $this->db->get('pedidos p')->result();
            $total = 0;

            foreach ($data as $d){
                $total = $total + ($d->valor_venta * $d->cantidad_producto);
            }

            if($data[0]->descuento_pedido != 0){
                $resta =  ($total * $data[0]->descuento_pedido) / 100;
                $total = $total - $resta;
            }

            if($data[0]->canasta != 0 && $data[0]->descuento_canasta){
                $total = $total - $data[0]->descuento_canasta;
            }

            return $total;


        }


        public function gastos($fecha_despacho)
        {
            $this->db->where('estado_pedido', 3);
            $this->db->where('fecha_despacho', $fecha_despacho);
            $data = $this->db->get('pedidos p')->result();
            $total = 0;

            foreach ($data as $d){
                $total = $total + $d->gastos_varios;
            }

            return $total;


        }


        public function utilidad($venta, $compra)
        {
            return $compra - $venta;
        }

        public function hay_despacho_comuna($comuna)
        {
            $this->db->where('nombre_comuna', $comuna);
            $this->db->where('mostrar_comuna', 1);
            return $this->db->count_all_results('comunas');
        }

        public function ultimas_canastas()
        {
            $this->db->order_by('id_canasta', 'desc');
            $this->db->limit(4, 0);
            $this->db->where('id_estado', 1);
            $this->db->where('destacado', 1);
            return $query = $this->db->get('canastas')->result();
        }


        public function canasta($id_canasta)
        {
            $this->db->join('estados', 'canastas.id_estado = estados.id_estado');
            $this->db->where('id_canasta', $id_canasta);
            $query = $this->db->get('canastas');
            return $query->result();
        }

        public function productos_canasta($id_canasta)
        {
            $this->db->where('c.id_canasta', $id_canasta);
            $this->db->join('productos p', 'p.id_producto = c.id_producto');
            $query = $this->db->get('productos_canasta c');
            return $query->result();
        }


        public function nombre_canasta($id_canasta)
        {
            $this->db->where('id_canasta', $id_canasta);
            $query = $this->db->get('canastas');
            return $query->row()->nombre_canasta;
        }

        public function producto_canasta($id_canasta, $id_producto)
        {
            $this->db->where('c.id_canasta', $id_canasta);
            $this->db->where('c.id_producto', $id_producto);
            $query = $this->db->get('productos_canasta c');
            return $query->row();
        }





        //INSERTAR PEDIDOS TEMPORALES

        public function insertar_pedido_temporal($data)
        {
            return $this->db->insert('pedidos_temporales', $data);
        }

        public function insertar_producto_pedido_temporal($data)
        {
            return $this->db->insert('productos_pedido_temporales', $data);
        }

        public function insertar_datos_pedido_temporal($data)
        {
            return $this->db->insert('datos_pedido_temporales', $data);
        }


        public function mis_pedidos_temporales($id)
        {
            $this->db->where('p.id_cliente', $id);
            $this->db->join('datos_pedido_temporales dp', 'dp.id_pedido = p.id_pedido');
            return $this->db->get('pedidos_temporales p')->result();
        }


        public function pedido_temporal($id)
        {
            $this->db->where('p.id_pedido', $id);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido_temporales dp', 'dp.id_pedido = p.id_pedido');
            $this->db->join('productos_pedido_temporales pp', 'pp.id_pedido = p.id_pedido');
            $this->db->join('productos pro', 'pro.id_producto = pp.id_producto');
            return $this->db->get('pedidos_temporales p')->result();
        }


        public function eliminar_pedido_temporal($id)
        {

            $this->db->where('id_pedido', $id);
            $this->db->delete('datos_pedido_temporales');

            $this->db->where('id_pedido', $id);
            $this->db->delete('productos_pedido_temporales');

            $this->db->where('id_pedido', $id);
            return $this->db->delete('pedidos_temporales');
        }


        public function facturas($id_empresa)
        {
            $this->db->where('id_empresa', $id_empresa);
            return $this->db->count_all_results('facturas');
        }


        public function listarCategoriasDos()
        {
            $this->db->order_by('nombre_categoria', 'asc');
            return $query = $this->db->get('categorias')->result();
        }


        public function sucursales()
        {
            $this->db->order_by('nombre_sucursal', 'asc');
            return $query = $this->db->get('sucursales')->result();
        }


        public function tipos_gastos()
        {
            $this->db->order_by('id_tipo_gasto', 'asc');
            return $query = $this->db->get('tipo_gasto')->result();
        }


        public function proveedores()
        {
            $this->db->order_by('nombre_proveedor', 'asc');
            return $query = $this->db->get('proveedores')->result();
        }


        public function clientes()
        {
            $this->db->order_by('nombre_cliente', 'asc');
            return $query = $this->db->get('clientes')->result();
        }


        public function productos()
        {
            $this->db->order_by('nombre_producto', 'asc');
            return $query = $this->db->get('productos')->result();
        }

        public function valor_producto($id)
        {
            $this->db->where('id_producto', $id);
            return $query = $this->db->get('productos')->row()->precio_producto;
        }

        public function cantidad_productos($id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            return $this->db->count_all_results('detalle_orden_entrada');
        }

        public function cantidad_productos_salida($id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            return $this->db->count_all_results('detalle_orden_salida');
        }


        public function monto_entrada($id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            $data = $this->db->get('detalle_orden_entrada')->result();
            $total = 0;
            foreach ($data as $key => $value) {
                $total = $total + $value->monto_detalle;
            }
            return $total;
        }

        public function datos_producto($id)
        {
            $this->db->where('id_producto', $id);
            return $query = $this->db->get('productos')->row();
        }


        public function monto_salida($id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            $data = $this->db->get('detalle_orden_salida')->result();
            $total = 0;
            foreach ($data as $key => $value) {
                $total = $total + $value->monto_detalle;
            }
            return $total;
        }


}