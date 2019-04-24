<?php

class VendedoresModel extends CI_Model {




        public $table = 'vendedores';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by('nombre_vendedor', 'asc');
            $this->db->join('estados_usuarios', $this->table.'.estado_vendedor = estados_usuarios.id_estado');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_vendedor)
        {
            $this->db->join('estados_usuarios', $this->table.'.estado_vendedor = estados_usuarios.id_estado');
            $this->db->where('id_vendedor', $id_vendedor);
            $query = $this->db->get($this->table);
            return $query->row();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_vendedor)
        {
            $this->db->where('id_vendedor', $id_vendedor);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_vendedor)
        {
            $this->db->where('id_vendedor', $id_vendedor);
            return $this->db->delete($this->table);
        }




}