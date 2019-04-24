<?php

class DespachoModel extends CI_Model {

        public $table = 'valor_despacho';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->order_by('id_valor_despacho', 'asc');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function editar($data, $id_gasto)
        {
            $this->db->where('id_valor_despacho', $id_gasto);
            return $this->db->update($this->table, $data);
        }


}