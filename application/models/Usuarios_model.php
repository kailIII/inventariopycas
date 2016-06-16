<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    var $table = 'usuarios';
    var $column_order = array('');
    var $column_search = array('');
    var $order = array('codigo' => 'desc');
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function login($usuario, $contrasena){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get();
        $datos = $query->row();
        $respuesta = count($datos);
        if($respuesta > 0){
            $data = true;
        }else{
            $data = false;
        }
        return $data;
    }
    
}
