<?php

class TipogastosModel extends CI_Model {

        public $table = 'tipo_gasto';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by('tipo_gasto', 'asc');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_tipo_gasto)
        {
            $this->db->where('id_tipo_gasto', $id_tipo_gasto);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_tipo_gasto)
        {
            $this->db->where('id_tipo_gasto', $id_tipo_gasto);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_tipo_gasto)
        {
            $this->db->where('id_tipo_gasto', $id_tipo_gasto);
            return $this->db->delete($this->table);
        }


}