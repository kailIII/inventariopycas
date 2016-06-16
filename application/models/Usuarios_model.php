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
        $data = $query->result_array();
        return $data;
    }

    public function obtenerUsuario($id){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('codigo', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    
    public function crud($data){
        try {
            $datos = array('nombres' =>$data['nombres'],'apellidos' =>$data['apellidos'],'sexo' =>$data['cbosexo'],
                'estado' =>$data['cboestado'],'direccion' =>$data['direccion'],'permiso' =>$data['cboepermiso'],'email' =>$data['email'],
                'usuario' =>$data['usuario'],'contrasena' =>$data['contrasena'],'celular' =>$data['celular'],'tipousu' =>$data['cbotipousu'],'dni' =>$data['dni'],);
            if($data['codigo'] == 'add'){
                $this->db->insert($this->table , $datos);
            }else{
                $this->db->where('codigo', $data['codigo']);
                $this->db->update($this->table , $datos);
            }
            return 'Si';
        }catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
}
