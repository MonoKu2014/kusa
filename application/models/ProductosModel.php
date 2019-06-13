<?php

class ProductosModel extends CI_Model {




        public $table = 'productos';

        public function __construct()
        {
            parent::__construct();
        }



        public function listar()
        {
            $this->db->order_by('nombre_producto', 'asc');
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria', 'left');
            $this->db->select('p.*, c.nombre_categoria');
            $query = $this->db->get('productos p');
            return $query->result();
        }


        public function listar_activos()
        {
            $this->db->where('p.id_estado', 1);
            $this->db->order_by('nombre_producto', 'asc');
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            $query = $this->db->get('productos p');
            return $query->result();
        }


        //listado para frutas
        public function listar_para_imagenes($inicio, $final)
        {
            $this->db->limit($final, $inicio);
            $this->db->order_by('nombre_producto', 'asc');
            $this->db->where('id_estado', 1);
            $this->db->where('id_categoria', 1);
            $this->db->select('nombre_producto, precio_producto');
            $query = $this->db->get('productos');
            return $query->result();
        }


        public function obtener($id_producto)
        {
            $this->db->join('categorias', $this->table.'.id_categoria = categorias.id_categoria', 'left');
            $this->db->where('id_producto', $id_producto);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->delete($this->table);
        }


        public function activar($data, $id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update($this->table, $data);
        }


        public function desactivar($data, $id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update($this->table, $data);
        }


        public function destacar($data, $id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update($this->table, $data);
        }

        public function no_destacar($data, $id_producto)
        {
            $this->db->where('id_producto', $id_producto);
            return $this->db->update($this->table, $data);
        }

        public function consulta_exportar($tipo)
        {

            if($tipo == 1){
                $this->db->where('p.id_estado', 1);
            }

            if($tipo == 2){
                $this->db->where('p.id_estado', 0);
            }
            $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
            return $query = $this->db->get('productos p');

        }


        public function listar_para_relaciones($id)
        {
            $this->db->where('id_producto !=', $id);
            $query = $this->db->get('productos');
            return $query->result();
        }

        public function insertar_relacion($data)
        {
            return $this->db->insert('relacionados', $data);
        }

        public function detalle_tallas($id)
        {
            $this->db->where('id_producto', $id);
            $query = $this->db->get('productos_detalle');
            return $query->result();
        }

        public function insertar_talla($data)
        {
            return $this->db->insert('productos_detalle', $data);
        }

}