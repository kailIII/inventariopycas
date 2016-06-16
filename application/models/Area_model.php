<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {
    var $table = 'area';
    var $column_order = array('codigo','nombre');
    var $column_search = array('codigo','nombre');
    var $order = array('codigo' => 'desc');
    
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
        $this->db->where('codigo',$id);
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
            $this->db->where('codigo', $id);
            $this->db->delete($this->table);
            return 'Si';
        } catch (Exception $ex) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
    
    public function crud($data){
        try {
            //echo '<pre>';print_r($data);exit();
            $datos = array('nombre' =>$data['nombres']);
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
