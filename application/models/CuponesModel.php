<?php

class CuponesModel extends CI_Model {


        public $table = 'cupon_descuento';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by('id_cupon', 'asc');
            $this->db->join('estados_cupones', $this->table.'.estado_cupon = estados_cupones.id_estado');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_cupon)
        {
            $this->db->join('estados_cupones', $this->table.'.estado_cupon = estados_cupones.id_estado');
            $this->db->where('id_cupon', $id_cupon);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_cupon)
        {
            $this->db->where('id_cupon', $id_cupon);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_cupon)
        {
            $this->db->where('id_cupon', $id_cupon);
            return $this->db->delete($this->table);
        }





}