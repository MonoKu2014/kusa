<?php

class ProveedoresModel extends CI_Model {




        public $table = 'proveedores';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_proveedor)
        {
            $this->db->where('id_proveedor', $id_proveedor);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_proveedor)
        {
            $this->db->where('id_proveedor', $id_proveedor);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_proveedor)
        {
            $this->db->where('id_proveedor', $id_proveedor);
            return $this->db->delete($this->table);
        }




}