<?php
class Main extends CI_Controller{
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
        $data=array();
        $data['sm'] = $this->m_main->countsm();
        $data['ds'] = $this->m_main->countds();
        $data['dm'] = $this->m_main->countdm();
        $kd_div=$this->session->userdata('kd_div');
        if($kd_div==0){
            $data['ars'] = $this->m_main->countars();
        }else{
            $data['ars'] = $this->m_main->countarsw();
        }
        
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        
        // var_dump($data['sm']);
        $this->load->view('v_main',$data); //menampilkan file -list_surat.php dimana file ini untuk menampilkan surat yang masuk
    }
    //add_dis.php untuk menambah disposisi
    function countsm(){
        $data=array();
        $data['sm'] = $this->m_main->countsm();
        $data['ds'] = $this->m_main->countds();
        $data['dm'] = $this->m_main->countdm();
        $data['ars'] = $this->m_main->countars();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        // var_dump($data['sm']);
        $this->load->view('v_main',$data); //menampilkan file -list_surat.php dimana file ini untuk menampilkan surat yang masuk

    }
    function listsm(){
        $data=array();
        $data['surat'] = $this->m_main->pagesur('tbl_surat_masuk');
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $data['surat'] = $this->m_main->pagesur('tbl_surat_masuk');
        $this->load->view('surat_masuk',$data); //menampilkan file -list_surat.php dimana file ini untuk menampilkan surat yang masuk

    }
    function addsm(){
        $data=array();
        
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }else{
        $data['surat'] = $this->m_main->pagesur('tbl_surat_masuk');
        }
        $this->load->view('tambah_surat',$data); //menampilkan file -add_surat.php dimana file ini untuk menambahkan surat
    }
    function adddis(){
        
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $table='tbl_surat_masuk';
        $where=array(
            'sts_surat'=>'1',
        );
        $data['surat'] = $this->m_main->joinsmdis($table);
        $this->load->view('tambah_disposisi',$data); //menampilkan file -list_dis.php dimana file ini untuk menambahkan disposisi
    }
    function listdis(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $data['surat'] = $this->m_main->pagesur('tbl_disposisi');
        $this->load->view('surat_listdisposisi',$data);//menampilkan file -list_smdis.php dimana file ini untuk menampilkan data disposisi
    }
    function timeline(){
    if($this->input->get('n')){
        $data=array();
        $no_surat=$this->input->get('n');
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $whereone=array(
            'tbl_disposisi.no_surat'=> $no_surat,
            
        );
        $data['surat'] = $this->m_main->timeline('tbl_disposisi',$whereone);
        
        $this->load->view('surat_timeline',$data);//menampilkan file -list_smdis.php dimana file ini untuk menampilkan data disposisi
    }
    }
    function arsip(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        if($kd_jabatan<1){
            $data['surat'] = $this->m_main->joinars('tbl_arsip');
        }else{
            $where=array(
                'kd_div'=> $kd_div,
            );
            $data['surat'] = $this->m_main->joinarsw('tbl_arsip',$where);
            
        }
        $this->load->view('surat_arsip',$data);//menampilkan file -list_smdis.php dimana file ini untuk menampilkan data disposisi
    }
    function userlistdis(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        
        $table='tbl_disposisi';
        $where=array(
            'kd_div'=>$kd_div,
            'kd_jabatan'=>$kd_jabatan,
            'nama_sub'=>$nama_sub,
            'sts_disposisi' => '1',
        );
        $data['surat'] = $this->m_main->joinprint($table,$where);
        // var_dump($where);
        $this->load->view('surat_listdisuser',$data); //list_userdis
    }
    function userprint(){ //menampilkan disposisi selesai 
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $table='tbl_disposisi';
        $where=array(
            'sts_disposisi' => '4',
        );
        $data['surat'] = $this->m_main->joinprint($table,$where);
        // var_dump($data['surat']);
        $this->load->view('surat_print',$data); //list_print
    }
    function insdis(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $data['namadiv'] = $this->m_main->getdiv();
        $data['namasub'] = $this->m_main->getsub();
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        if($this->input->get('ns')!=""){
            $ns=$this->input->get('ns');
            $id=$this->input->get('id');
            $table="tbl_surat_masuk";
            $where=array(
                'no_surat'=> $ns,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $data['disp']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        $this->load->view('tambahkan_disposisi',$data); //menampilkan file -add_dis.php dimana file ini untuk menambahkan disposisi
    }
    function inssubdis(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $data['namadiv'] = $this->m_main->getdiv();
        $data['namasub'] = $this->m_main->getsub();
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        if($this->input->get('ns')!=""){
            $ns=$this->input->get('ns');
            $id=$this->input->get('id');
            $table="tbl_surat_masuk";
            $where=array(
                'no_surat'=> $ns,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $data['disp']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        $this->load->view('tambahkan_subdis',$data); //menampilkan file -add_subdis.php dimana file ini untuk menambahkan disposisi
    }
    function editdis(){
        $data=array();
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $nama_sub=$this->session->userdata('nama_sub');
        $where=array(
            'kd_div'=> $kd_div,
            'kd_jabatan'=> $kd_jabatan,
            'nama_sub'=> $nama_sub,
        );
        $data['notif'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $data['namadiv'] = $this->m_main->getdiv();
        $data['namasub'] = $this->m_main->getsub();
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        if($this->input->get('ns')!=""){
            $ns=$this->input->get('ns');
            $id=$this->input->get('id');
            $table="tbl_surat_masuk";
            $where=array(
                'no_surat'=> $ns,
            );
            $data['surat']=$this->m_main->get1data($table,$where);
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $data['disp']=$this->m_main->get1data($table,$where);
            // var_dump($data['surat']);
        }
        $this->load->view('edit_subdis',$data); //menampilkan file -edit_dis.php dimana file ini untuk menambahkan disposisi
    }
    function cetak(){
        $data=array();
        $iddis=$this->input->get('n');
        $no_surat=$this->input->get('ns');
        $where=array(
            'id_disposisi'=> $iddis,
            'sts_disposisi'=> '4',
            
        );
        $data['disp'] = $this->m_main->getwhere('tbl_disposisi',$where);
        $where=array(
            'no_surat'=> $no_surat,
            
        );
        $data['surat'] = $this->m_main->getwhere('tbl_surat_masuk',$where);
        $where=array(
            'no_surat'=> $no_surat,
            
        );
        $data['terus'] = $this->m_main->getdis('tbl_disposisi',$where);
        // var_dump($data['terus']);exit;
        $this->load->view('print',$data); //print disposisi selesai
    }
    function cetakadm(){ //UNTUK LANGSUNG CETAK DARI LIST SURAT
        $data=array();
        $no_surat=$this->input->get('ns');
        $where=array(
            'no_surat'=> $no_surat,
            
        );
        $data['surat'] = $this->m_main->getwhere('tbl_surat_masuk',$where);
        $no_surat = $this->input->get('ns');
            $wheree=array(
                'no_surat'=> $no_surat,
            );
            $ambils=$this->m_main->get1data('tbl_surat_masuk',$wheree);
            foreach($ambils as $sur):
                $isi=$sur->isi;
            endforeach;
            $datauu=array(
                'sts_surat'=>'2',
            );
            $hsl=$this->m_main->update_surat($wheree,$datauu,'tbl_surat_masuk');
                    $no_surat = $this->input->get('ns');
                    $kd_div=$this->session->userdata('kd_div');
                    $kd_jabatan=$this->session->userdata('kd_jabatan');
                   
                    $created_by=$this->session->userdata('nama_sub');
                    $created_time = date('Y-m-d H:i:s');
        
                    $table="tbl_arsip";
                    $datauup=array(
                        
                        'no_surat' =>$no_surat,
                        'kd_div' =>$kd_div,
                        'kd_jabatan' =>$kd_jabatan,
                        'isi' =>$isi,
                        'finished_by'=>$created_by,
                        'created_time'=>$created_time,

                    );
                    $this->m_main->insert_surat($table,$datauup);
            
                    // redirect('main/listsm', 'refresh');
        // $no_surat = $this->input->post('no_surat');
        $kd_jabat = '2'; //statik 
        $isi_disposisi = $isi;
        $created_by=$this->session->userdata('nama_sub');
        $created_time = date('Y-m-d H:i:s');
        $divisi="HUBUNGAN HUKUM PERTANAHAN";
        $nama_sub="KEPALA BIDANG HUBUNGAN HUKUM PERTANAHAN";
        
        $table="tbl_disposisi";
        $dataup=array(
            'no_surat' =>$no_surat,
            'kd_div' => $kd_div,
            'kd_jabatan' => $kd_jabat,
            'divisi' => $divisi,
            'nama_sub' => $nama_sub,
            'isi_disposisi' =>$isi_disposisi,
            // 'sifat' =>$sifat,
            'sts_disposisi'=>'4',
            'created_by'=>$created_by,
            'created_time'=>$created_time,
        );
        $this->m_main->insert_surat($table,$dataup);
        // var_dump($data['terus']);exit;
        $this->load->view('printadm',$data); //print disposisi selesai
    }
    
}
 
   
