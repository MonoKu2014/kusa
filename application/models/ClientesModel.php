<?php

class ClientesModel extends CI_Model {




        public $table = 'clientes';

        public function __construct()
        {
                parent::__construct();
        }

        public function listar()
        {
            $this->db->join('estados_usuarios', $this->table.'.id_estado = estados_usuarios.id_estado');
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function obtener($id_cliente)
        {
            $this->db->join('estados_usuarios', $this->table.'.id_estado = estados_usuarios.id_estado');
            $this->db->where('id_cliente', $id_cliente);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function insertar($data)
        {
            return $this->db->insert($this->table, $data);
        }

        public function editar($data, $id_cliente)
        {
            $this->db->where('id_cliente', $id_cliente);
            return $this->db->update($this->table, $data);
        }

        public function eliminar($id_cliente)
        {
            $this->db->where('id_cliente', $id_cliente);
            return $this->db->delete($this->table);
        }


        public function consulta_exportar()
        {
            $this->db->order_by('c.nombre_cliente', 'asc');
            $this->db->join('estados_usuarios e', 'c.id_estado = e.id_estado');
            $this->db->select('c.nombre_cliente, c.comuna_cliente, c.calle_cliente, c.numero_cliente, c.email_cliente, c.fono_cliente, e.estado');
            return $query = $this->db->get('clientes c');
        }





}