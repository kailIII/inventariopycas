<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model {
    var $table = 'inventario';
    var $column_order = array('codinventario', 'equipo', 'inventario', 'usuario', 'codarea', 'estado', 'observaciones');
    var $column_search = array('codinventario', 'equipo', 'inventario', 'usuario', 'codarea', 'estado', 'observaciones');
    var $order = array('codinventario' => 'asc');
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query(){
	$this->db->from($this->table);
        $this->db->join('equipo','equipo.equipo = inventario.equipo');
        $this->db->join('usuarios','usuarios.codigo = inventario.codigo');
        $this->db->join('area','area.codarea = inventario.codarea');
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
	}
	if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
	}
    }
    
    public function get_by_id($id){
        $this->db->from($this->table);
        $this->db->where('codinventario',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function delete_by_id($id){
        try {
            $this->db->where('codinventario', $id);
            $this->db->delete($this->table);
            return 'Si';
        } catch (Exception $ex) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
    
    public function crud($data){
        try {
            //echo '<pre>';print_r($data);exit;
            $datos = array('fecha' =>$data['fecha'],'horaini' =>$data['horaini'],'horafin' =>$data['horafin'],
                'cargo' =>$data['cbocargo'],'codaccesorio' =>$data['accesorios'],
                'nombres' =>$data['nomcomp'],'codarea' =>$data['cboarea'],'codsala' =>$data['cbosala']);
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

    public function obtenerInventario(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
