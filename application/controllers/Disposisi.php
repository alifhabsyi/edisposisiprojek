<?php
class Disposisi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_main');
        $this->load->library('session');
        // $this->load->library('curl');
        $this->load->library('pagination');
        // $this->load->library('template');
        $this->load->helper('form');
        $this->load->helper('url');
		
    }
    function index(){
        $this->load->view('disposisi');
    }
    function suratmd(){
        $data=array();
        // $data['surat']=$this->m_main->surat_list();
        $data['jumlah'] = $this->m_main->tot_suratd();
        // var_dump($data['jumlah']);exit;
        $this->load->library('pagination');
		$config['base_url'] = base_url('disposisi/suratmd');
		$config['total_rows'] = $data['jumlah'];
		$config['per_page'] = 3;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['surat'] = $this->m_main->pagesurd($config['per_page'],$from);
        // var_dump($data['surat']);
        // foreach($data['surat'] as $u){
        //     $cekdiv=$this->m_main->cekdiv($u->no_surat);
        //     var_dump($cekdiv->result());exit;
        // }
        $this->load->view('disposisi',$data);
    }
    function action(){
        $data=array();
        // $data['surat']=$this->m_main->surat_list();
        $data['jumlah'] = $this->m_main->tot_listdis();
        // var_dump($data['jumlah']);exit;
        $this->load->library('pagination');
		$config['base_url'] = base_url('disposisi/listdis');
		$config['total_rows'] = $data['jumlah'];
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['surat'] = $this->m_main->pagelistdis($config['per_page'],$from);
        // var_dump($data['surat']);
        // foreach($data['surat'] as $u){
        //     $cekdiv=$this->m_main->cekdiv($u->no_surat);
        //     var_dump($cekdiv->result());exit;
        // }
        $this->load->view('action',$data);
    }
    function listdis(){
        $data=array();
        // $data['surat']=$this->m_main->surat_list();
        $data['jumlah'] = $this->m_main->tot_listdis();
        // var_dump($data['jumlah']);exit;
        $this->load->library('pagination');
		$config['base_url'] = base_url('disposisi/listdis');
		$config['total_rows'] = $data['jumlah'];
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['surat'] = $this->m_main->pagelistdis($config['per_page'],$from);
        // var_dump($data['surat']);
        // foreach($data['surat'] as $u){
        //     $cekdiv=$this->m_main->cekdiv($u->no_surat);
        //     var_dump($cekdiv->result());exit;
        // }
        $this->load->view('list_disposisi',$data);
    }
    function delete_dis(){
        $no_agenda=$this->input->post('kode');
        $where= array(
            'id_disposisi' => $no_agenda,
        );
		$data=$this->m_main->delete_surat($where,'tbl_disposisi');
		echo json_encode($data);
    }
    function getdis(){
        $no_dis=$this->input->get('id');
        var_dump($no_dis);
		$surat=$this->m_main->getdis($no_dis);
        echo json_encode($surat);
    }
    function get_surat(){
		$no_agenda=$this->input->get('id');
		$surat=$this->m_main->get_surat($no_agenda);
        echo json_encode($surat);
    }
    function simpan_surat(){
        $kd_div = $this->input->post('divisi');
        $no_surat = $this->input->post('no_surat');
        //Mulai inisiasi cek no agenda atau reset per tahun
        $where            = array(
            'no_surat' => $no_surat,
            'kd_div' => $kd_div,
		);
        $cek              = $this->m_main->cekada("tbl_disposisi",$where)->num_rows();
    if($cek==0){    
        $bulann = date('m');
        $tahunn = date('Y');
        $noagena= $this->m_main->no_docno('DP');
        if($noagena->num_rows()>0){
			foreach ($noagena->result() as $data) {

					$kd_docno = $data->kd_docno;
					$docno = $data->docno;
					$tahuna = $data->tahun;
					$bulana = $data->bulan;
					
			}
		}
        // var_dump($docno+1);exit;
        if($tahuna<$tahunn){
            $tbhno= $this->m_main->tbh_nogen('1',$tahunn,$bulann);
        }else{
            $tbhno= $this->m_main->tbh_nogen($docno+1,$tahunn,$bulann);
        }
        //selesai update docno
        //insert ke tabel surat masuk
        $id_disposisi = $docno+1;
        $no_surat = $this->input->post('no_surat');
        $kd_div = $this->input->post('divisi'); //dummy
        if($kd_div=="1"){
            $kd_jabatan = "Kabag. Tata Usaha";    
        }else if($kd_div=="2"){
            $kd_jabatan = "Kabid Infratruktur Pertanahan";    
        }else if($kd_div=="3"){
            $kd_jabatan = "Kabid Hubungan Hukum Pertanahan";    
        }else if($kd_div=="4"){
            $kd_jabatan = "Kabid Penataan Pertanahan";    
        }else if($kd_div=="5"){
            $kd_jabatan = "Kabid Pengadaan Tanah";    
        }else if($kd_div=="6"){
            $kd_jabatan = "Kabid Penangann Masalah dan Pengendalian Pertanahan";    
        }
        $disposisi = $this->input->post('disposisi');
        $sifat = $this->input->post('sifat');
        $created_by=$this->session->userdata('nama');
        $created_time = date('d-m-Y H:i:s');
            if( $no_surat=="" || $kd_jabatan=="" || $disposisi=="" || $sifat =="" )
            {
                echo "<script>redirect(base_url('/disposisi'));</script>";
            } 
            // 
        //end
        $data=$this->m_main->simpan_dis($id_disposisi,$no_surat,$kd_div,$kd_jabatan,$disposisi,$sifat,$created_by,$created_time);
        echo json_encode($data);
        }
    else{
        var_dump("data sudahada");
    }
	}

    
   
}
