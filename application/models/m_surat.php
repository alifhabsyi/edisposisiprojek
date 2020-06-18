<?php
class m_surat extends CI_Model{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_surat');
		$this->load->library('session');
	
	}

	function getwhere($table,$where){
		$this->db->where($where);
		return $query = $this->db->get($table)->result();		
	}
	function gettable($table){
		return $query = $this->db->get($table)->result();		
	}
	function get1data($table,$where){
		$this->db->where($where);
		return $query = $this->db->get($table)->result();		
	}
	function update_surat($where,$dataup,$table){
		$this->db->where($where);
		$this->db->update($table,$dataup);
	}
	function insert_surat($table,$datain){
		$result= $this->db->insert($table,$datain);
	    return $result;
	}
	function delete_surat($table,$where){
		$result= $this->db->delete($table,$where);
	    return $result;
	}
	function cekada($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function no_docno($where){
		$hsl=$this->db->query("SELECT * FROM tbl_sett WHERE kd_docno='$where'");
		// var_dump($hsl->result());
		
		return $hsl;
	}
	function tbh_nogen($nogen,$tahunn,$bulann){
		$hasil=$this->db->query("UPDATE tbl_sett set tahun='$tahunn',bulan='$bulann',docno='$nogen' where kd_docno='AG'");
		return $hasil;
	

	}
	
	
}