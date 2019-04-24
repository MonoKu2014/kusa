<?php

class EntradasModel extends CI_Model {

        public $table = 'entradas';

        public function __construct()
        {
            parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by($this->table.'.id_entrada', 'asc');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener_detalle($id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            $query = $this->db->get('detalle_orden_entrada');
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_entrada)
        {
            $this->db->where('id_entrada', $id_entrada);
            return $this->db->delete($this->table);
        }


        public function insertar_detalle($data)
        {
            return $this->db->insert('detalle_orden_entrada', $data);
        }

        public function ultimo_numero()
        {
            $this->db->select_max('id_entrada');
            return $this->db->get('entradas')->row();
        }



}