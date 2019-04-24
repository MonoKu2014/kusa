<?php

class SalidasModel extends CI_Model {

        public $table = 'salidas';

        public function __construct()
        {
            parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by($this->table.'.id_salida', 'asc');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener_detalle($id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            $query = $this->db->get('detalle_orden_salida');
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_salida)
        {
            $this->db->where('id_salida', $id_salida);
            return $this->db->delete($this->table);
        }


        public function insertar_detalle($data)
        {
            return $this->db->insert('detalle_orden_salida', $data);
        }

        public function ultimo_numero()
        {
            $this->db->select_max('id_salida');
            return $this->db->get('salidas')->row();
        }

}