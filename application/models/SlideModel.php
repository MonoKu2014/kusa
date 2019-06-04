<?php

class SlideModel extends CI_Model {




        public $table = 'slide';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_slide)
        {
            $this->db->where('id_slide', $id_slide);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_slide)
        {
            $this->db->where('id_slide', $id_slide);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_slide)
        {
            $this->db->where('id_slide', $id_slide);
            return $this->db->delete($this->table);
        }




}