<?php

class EstadosModel extends CI_Model {




        public $table = 'estados_usuarios';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $query = $this->db->get($this->table);
            return $query->result();
        }




}