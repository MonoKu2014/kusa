<?php

class GastosModel extends CI_Model {

        public $table = 'gastos';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by('fecha_gasto', 'asc');
            $this->db->join('tipo_gasto', $this->table.'.tipo_gasto = tipo_gasto.id_tipo_gasto');
            $this->db->join('sucursales', $this->table.'.id_sucursal = sucursales.id_sucursal');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_gasto)
        {
            $this->db->where('id_gasto', $id_gasto);
            $this->db->join('tipo_gasto', $this->table.'.tipo_gasto = tipo_gasto.id_tipo_gasto');
            $this->db->join('sucursales', $this->table.'.id_sucursal = sucursales.id_sucursal');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_gasto)
        {
            $this->db->where('id_gasto', $id_gasto);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_gasto)
        {
            $this->db->where('id_gasto', $id_gasto);
            return $this->db->delete($this->table);
        }


}