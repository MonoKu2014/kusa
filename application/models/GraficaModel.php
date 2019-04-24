<?php

class GraficaModel extends CI_Model {




        public $table = 'grafica';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_grafica)
        {
            $this->db->where('id_grafica', $id_grafica);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_grafica)
        {
            $this->db->where('id_grafica', $id_grafica);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_grafica)
        {
            $this->db->where('id_grafica', $id_grafica);
            return $this->db->delete($this->table);
        }




}