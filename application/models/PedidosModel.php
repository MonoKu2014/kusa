<?php

class PedidosModel extends CI_Model {




        public $table = 'pedidos';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            return $this->db->get('pedidos p')->result();
        }

        //lista los que estan con estado pago confirmado
        public function listar_entregados()
        {
            $this->db->where_in('p.estado_pedido', [1,2,3,4]);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            return $this->db->get('pedidos p')->result();
        }


        public function listar_pedidos_escogidos($array)
        {
            $arreglo = implode(',', $array);
            return $this->db->query('
                SELECT *, sum(cantidad_producto) as cantidad FROM pedidos p JOIN productos_pedido pp ON pp.id_pedido = p.id_pedido
                JOIN productos pro ON pp.id_producto = pro.id_producto WHERE p.id_pedido in ('.$arreglo.') AND p.estado_pedido = 2 GROUP BY pp.id_producto')->result();

        }


        public function obtener($id_pedido)
        {
            $this->db->where('p.id_pedido', $id_pedido);
            $this->db->join('clientes_direcciones cd', 'cd.id_cliente = p.id_cliente');
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('productos_pedido pp', 'pp.id_pedido = p.id_pedido');
            $this->db->join('productos pro', 'pro.id_producto = pp.id_producto');
            return $this->db->get('pedidos p')->result();
        }

        public function insertar_tracking_inicial($data)
        {
            $this->db->insert('tracking_pedidos', $data);
        }

        public function obtener_productos_pedido($id_pedido)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->get('productos_pedido')->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_pedido)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->update($this->table, $data);
        }


        public function editar_direccion($data, $id_pedido)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->update('datos_pedido', $data);
        }

        public function editar_cantidad($data, $id_producto_pedido)
        {
            $this->db->where('id_producto_pedido', $id_producto_pedido);
            return $this->db->update('productos_pedido', $data);
        }


        public function ingresar_valores_unitarios($data, $id)
        {
            $this->db->where('id_producto_pedido', $id);
            return $this->db->update('productos_pedido', $data);
        }

        public function eliminar($id_pedido)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->delete($this->table);
        }


        public function eliminar_producto($id_producto_pedido)
        {
            $this->db->where('id_producto_pedido', $id_producto_pedido);
            return $this->db->delete('productos_pedido');
        }


        public function reporte_diario($fecha)
        {
            return $this->db->query('
                SELECT *, sum(cantidad_producto) as cantidad FROM pedidos p JOIN productos_pedido pp ON pp.id_pedido = p.id_pedido
                JOIN productos pro ON pp.id_producto = pro.id_producto WHERE p.fecha_pedido = "'.$fecha.'" AND p.estado_pedido = 2 GROUP BY pp.id_producto')->result();
        }

        public function numeros_reporte($fecha)
        {
            return $this->db->query('SELECT DISTINCT(id_pedido) FROM pedidos WHERE fecha_pedido = "'.$fecha.'" AND estado_pedido = 2')->result();
        }


        public function reporte_mensual($fecha_inicio, $fecha_termino)
        {
            $this->db->where('fecha_despacho >=', $fecha_inicio);
            $this->db->where('fecha_despacho <=', $fecha_termino);
            $this->db->where('estado_pedido', 3);
            $this->db->group_by('fecha_despacho');
            return $this->db->get('pedidos')->result();
        }


        public function listar_temporales()
        {
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido_temporales dp', 'dp.id_pedido = p.id_pedido');
            return $this->db->get('pedidos_temporales p')->result();
        }


        public function listar_temporales_pendientes()
        {
            $this->db->where('p.avisado', 0);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido_temporales dp', 'dp.id_pedido = p.id_pedido');
            return $this->db->get('pedidos_temporales p')->result();
        }


        public function obtener_pedido_temporal($id_pedido)
        {
            $this->db->where('p.id_pedido', $id_pedido);
            $this->db->join('clientes c', 'p.id_cliente = c.id_cliente');
            $this->db->join('datos_pedido_temporales dp', 'dp.id_pedido = p.id_pedido');
            $this->db->join('productos_pedido_temporales pp', 'pp.id_pedido = p.id_pedido');
            $this->db->join('productos pro', 'pro.id_producto = pp.id_producto');
            return $this->db->get('pedidos_temporales p')->result();
        }


        public function avisar_correo($data, $id_pedido)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->update('pedidos_temporales', $data);
        }


}