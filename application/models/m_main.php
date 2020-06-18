<?php
class M_main extends CI_Model{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_main');
		$this->load->library('session');
	
	}
	function getsub(){
		$kd_div=$this->session->userdata('kd_div');
		if($kd_div==0){
			$this->db->where('kd_jabatan =3');
		}else{
			$this->db->where('kd_jabatan =3');
			$this->db->where("kd_div= '$kd_div'");
		}
		$this->db->select('kd_div,kd_jabatan,nama_div,nama_sub');
		return $query = $this->db->get('tbl_user')->result();		
		
	}
	function getdiv(){
		$this->db->distinct();
		$this->db->select('kd_div,nama_div');
		return $query = $this->db->get('tbl_user')->result();		
		
	}
	function getdis($table,$where){
		$this->db->select('nama_sub');
		$this->db->where($where);
		return $query = $this->db->get('tbl_disposisi')->result();		
		
	}
	function joinsmdis($table){
		$this->db->select('tbl_surat_masuk.id_surat,tbl_surat_masuk.no_agenda,tbl_surat_masuk.no_surat,tbl_surat_masuk.asal_surat,tbl_surat_masuk.sifat,tbl_surat_masuk.isi,tbl_surat_masuk.tgl_surat,tbl_surat_masuk.tgl_terima,tbl_surat_masuk.file,tbl_surat_masuk.sts_surat,tbl_surat_masuk.created_by,tbl_surat_masuk.created_time');
		$this->db->join('tbl_disposisi as d', 'tbl_surat_masuk.no_surat = d.no_surat','left');
		$this->db->where('tbl_surat_masuk.sts_surat =1');
		return $query = $this->db->get($table)->result();		
		
	}
	function joinars($table){
		$this->db->select('*');
		$this->db->join('tbl_surat_masuk as sm', 'sm.no_surat = tbl_arsip.no_surat','left');
		return $query = $this->db->get($table)->result();		
		
	}
	function joinarsw($table,$where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('tbl_surat_masuk as sm', 'sm.no_surat = tbl_arsip.no_surat','left');
		return $query = $this->db->get($table)->result();		
		
	}
	function joinprint($table,$where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('tbl_surat_masuk as sm', 'sm.no_surat = tbl_disposisi.no_surat','left');
		return $query = $this->db->get($table)->result();		
		
	}
	function pagesur($table){
		
		return $query = $this->db->get($table)->result();		
		
	}
	function timeline($table,$where){
		$this->db->select('sts_disposisi,max(tbl_disposisi.kd_jabatan) as kd_jabatan,finished_by,tbl_disposisi.kd_div,id_disposisi,tbl_disposisi.no_surat,divisi,isi_disposisi,sifat,sts_read,sts_disposisi,sts_dokumen,created_by,tbl_disposisi.created_time');
		$this->db->join('tbl_arsip as ars', 'ars.no_surat = tbl_disposisi.no_surat','left');
		$this->db->where($where);
		return $query = $this->db->get($table)->result();		
		
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
	function cekada($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function countsm(){		
		$hsl=$this->db->query("SELECT COUNT(no_surat) as jum from tbl_surat_masuk where year(created_time)=year(CURRENT_DATE)");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$ctsm=$data->jum;
					
			}
		}
		return $ctsm;
	}
	function countdm(){		
		$hsl=$this->db->query("SELECT COUNT(no_surat) as jum from tbl_surat_masuk where year(created_time)=year(CURRENT_DATE) and sts_surat='1'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$ctsm=$data->jum;
					
			}
		}
		return $ctsm;
	}
	function countds(){
		$kd_div=$this->session->userdata('kd_div');
		$kd_jabatan=$this->session->userdata('kd_jabatan');
		$nama_sub=$this->session->userdata('nama_sub');
				
		$hsl=$this->db->query("SELECT COUNT(no_surat) as jum from tbl_disposisi where sts_disposisi='1' and kd_div='$kd_div' and kd_jabatan='$kd_jabatan' and nama_sub='$nama_sub'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$ctds=$data->jum;
					
			}
		}
		return $ctds;
	}
	function countars(){		
		// $kd_div=$this->session->userdata('kd_div');
		$hsl=$this->db->query("SELECT COUNT(no_surat) as jum from tbl_arsip where year(created_time)=year(CURRENT_DATE)");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$ctds=$data->jum;
					
			}
		}
		return $ctds;
	}
	function countarsw(){		
		$kd_div=$this->session->userdata('kd_div');
		$hsl=$this->db->query("SELECT COUNT(no_surat) as jum from tbl_arsip where kd_div='$kd_div'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$ctds=$data->jum;
					
			}
		}
		return $ctds;
	}
	function userdis($table,$where){		
		$this->db->where('sts_disposisi <', '4');
		return $this->db->get_where($table,$where);
	}
	
}