<?php

class HomeModel extends CI_Model {


        public function __construct()
        {
                parent::__construct();
        }


        public function login($email, $password)
        {
            $this->db->where('password_cliente', $password);
            $this->db->where('email_cliente', $email);
            $query = $this->db->get('clientes');
            return $query->row();
        }

        public function productos_por_categorias($id)
        {
            $this->db->where('p.id_categoria', $id);
            $this->db->where('p.id_estado', 1);
            $this->db->order_by('nombre_producto', 'asc');
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            $query = $this->db->get('productos p');
            return $query->result();
        }

        public function obtener_categoria($id)
        {
            $this->db->where('id_categoria', $id);
            return $this->db->get('categorias')->row();
        }

        public function comunas()
        {
            $this->db->order_by('nombre_comuna', 'asc');
            return $this->db->get('comunas')->result();
        }

        public function detalle_producto($id)
        {
            $this->db->where('id_producto', $id);
            return $this->db->get('productos')->row();
        }

        public function obtener_producto($id)
        {
            $this->db->where('id_producto', $id);
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $this->db->get('productos p')->row();
        }

        public function planes_relacionados($id)
        {
            $this->db->limit(4);
            $this->db->where('tipo_producto', 'plan');
            $this->db->where('id_producto !=', $id);
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $this->db->get('productos p')->result();
        }

        public function productos_relacionados($id)
        {
            $this->db->limit(4);
            $this->db->where('tipo_producto', 'producto');
            $this->db->where('id_producto !=', $id);
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $this->db->get('productos p')->result();
        }

        public function obtener_cliente($id)
        {
            $this->db->where('id_cliente', $id);
            return $this->db->get('clientes')->row();
        }

        public function obtener_direccion_principal($id)
        {
            $this->db->where('id_cliente', $id);
            $this->db->where('tipo_direccion', 1);
            $this->db->where('estado', 1);
            $this->db->join('comunas c', 'cd.comuna_direccion = c.id_comuna');
            $this->db->join('regiones r', 'cd.region_direccion = r.id_region');
            return $this->db->get('clientes_direcciones cd')->row();
        }

        public function obtener_historial_pedidos($id)
        {
            $this->db->order_by('p.id_pedido', 'desc');
            $this->db->where('p.id_cliente', $id);
            $this->db->join('estados e', 'e.id_estado = p.estado_pedido');
            return $this->db->get('pedidos p')->result();
        }

        public function obtener_pedido_actual($id)
        {
            $this->db->where('id_pedido', $id);
            return $this->db->get('pedidos p')->row();
        }

        public function insertar_direccion($data)
        {
            return $this->db->insert('clientes_direcciones', $data);
        }

        public function insertar_pedido($data)
        {
            return $this->db->insert('pedidos', $data);
        }

        public function insertar_productos($data)
        {
            return $this->db->insert('productos_pedido', $data);
        }

        public function eliminar_direccion($id)
        {
            $data = array('estado' => 0);
            $this->db->where('id_direccion', $id);
            return $this->db->update('clientes_direcciones', $data);
        }

        public function cambiar_password($data, $id)
        {
            $this->db->where('id_cliente', $id);
            return $this->db->update('clientes', $data);
        }

        public function insertar_cliente($data)
        {
            return $this->db->insert('clientes', $data);
        }

        public function insertar_direccion_principal($data)
        {
            return $this->db->insert('clientes_direcciones', $data);
        }

        public function obtener_grafica($id)
        {
            $this->db->where('id_grafica', $id);
            return $this->db->get('grafica')->row();
        }

        public function obtener_detalle_pedido($id)
        {
            $this->db->where('id_pedido', $id);
            return $this->db->get('productos_pedido')->result();
        }

        public function ultimo_pedido_no_cerrado($id_cliente)
        {
            $this->db->order_by('id_pedido', 'desc');
            $this->db->limit(1);
            $this->db->where('id_cliente', $id_cliente);
            $this->db->where('estado_pedido !=', 4);
            return $this->db->get('pedidos')->row();
        }


        public function insertar_token_transbank($id_pedido, $data)
        {
            $this->db->where('id_pedido', $id_pedido);
            return $this->db->update('pedidos', $data);
        }

        public function insertar_tracking_inicial($data)
        {
            $this->db->insert('tracking_pedidos', $data);
        }

        public function descuento_cupon($cupon)
        {
            $this->db->where('codigo_cupon', $cupon);
            return $this->db->get('cupon_descuento')->row();
        }

        public function descontar_cantidad($id_producto, $data)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update('productos', $data);
        }


        public function obtener_relacionados($id)
        {
            $this->db->where('r.id_producto_padre', $id);
            $this->db->join('productos p', 'p.id_producto = r.id_producto_relacionado');
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $this->db->get('relacionados r')->result();
        }

        public function detalles($id)
        {
            $this->db->where('id_producto', $id);
            return $this->db->get('productos_detalle')->result();
        }

        public function obtener_producto_detalle($id)
        {
            $this->db->where('pd.id_producto', $id);
            $this->db->join('productos p', 'p.id_producto = pd.id_producto');
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $this->db->get('productos_detalle pd')->row();
        }


}