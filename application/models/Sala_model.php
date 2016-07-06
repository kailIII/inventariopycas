<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala_model extends CI_Model {
    var $table = 'sala';
    var $column_order = array('codsala', 'ocupado','horaini','horafin');
    var $column_search = array('codsala', 'ocupado','horaini','horafin');
    var $order = array('codsala' => 'asc');
    
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
        $this->db->where('codsala',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function obtenersalaocupado(){
        $this->db->from($this->table);
        $this->db->where('ocupado','N');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
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
            $this->db->where('codsala', $id);
            $this->db->delete($this->table);
            return 'Si';
        } catch (Exception $ex) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
    
    public function crud($data){
        try {
            $datos = array('ocupado' =>$data['ocupado'],'horaini' =>$data['horaini'],'horafin' =>$data['horafin'],'nomsala' =>$data['nomsala']);
            if($data['codigo'] == 'add'){
                $this->db->insert($this->table , $datos);
            }else{
                $this->db->where('codsala', $data['codigo']);
                $this->db->update($this->table , $datos);
            }
            return 'Si';
        }catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }

    public function updatesala($datos){
        try {
            //echo '<pre>';print_r($datos);exit;
            //var_dump($datos['cbosala'],$datos['horaini'],$datos['horafin']);exit;
            $data = array('codsala'=>$datos['cbosala'],'horaini'=>$datos['horaini'],'horafin'=>$datos['horafin'],'ocupado'=>'S');
            $this->db->where('codsala', $datos['cbosala']);
            $this->db->update($this->table , $data);
            return 'Si';
        }catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
    public function obtenerSalas(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
