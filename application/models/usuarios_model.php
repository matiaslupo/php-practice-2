<?php

class usuarios_model extends CI_Model{

    private $tabla= "usuarios";
    private $pk= "usuario_id";

    public function login($datos= array('nick' => '', 'password' => '')){
        if ($datos['nick'] == '' || $datos['clave'] == '')
            return false;        
        $this->db->select('usuario_id, nick');
        $this->db->where('nick', $datos['nick']);
        $this->db->where('password', $datos['password']);
        $this->db->limit(1);
        $res= $this->db->get($this->tabla);
        if ($res->num_rows()){
            return $res->row_array();
        }
        return false;
    }

}

?>