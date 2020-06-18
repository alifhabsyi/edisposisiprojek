<?php
class Surat extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_surat');
        $this->load->library('session');
        // $this->load->library('curl');
        $this->load->library('pagination');
        // $this->load->library('template');
        $this->load->helper('form');
        $this->load->helper('url');
		
    }
    function index(){
        $this->load->view('surat/listsm');
    }
    function suratm(){
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_surat->get1data($table,$where);
        }
        // var_dump($data['surat']);
        $this->load->view('surat/add_surat',$data);
    }
    function dlt_surat(){
        
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $data['surat']=$this->m_surat->delete_surat($table,$where);
        }
        
        redirect('main/listsm', 'refresh');
    }
    function dlt_dis(){
        
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $data['surat']=$this->m_surat->delete_surat($table,$where);
        }
        
        redirect('main/listdis', 'refresh');
    }
    function app_surat(){
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_surat_masuk";
            $where=array(
                'id_surat'=> $id,
            );
            $dataup=array(
                'sts_surat'=>'1',
            );
            $this->m_surat->update_surat($where,$dataup,'tbl_surat_masuk');
                    
        }
        redirect('main/listsm', 'refresh');
        
    }
    function app_dis(){
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $id=$this->input->get('n');
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $dataup=array(
                'sts_read'=>'1',
                'sts_dokumen'=>'1',
            );
            $this->m_surat->update_surat($where,$dataup,'tbl_disposisi');
                    
        }
        redirect('main/userlistdis', 'refresh');
        
    
    }
    function appsubdis(){ //untuk merubah status surat menjadi 2 dan telah didisposisikan
        $id = $this->input->get('n');
        $wheree=array(
            'id_disposisi'=> $id,
        );
        $datauu=array(
            'sts_disposisi'=>'2',
        );
        $hsl=$this->m_surat->update_surat($wheree,$datauu,'tbl_disposisi');
        

        redirect('main/userlistdis', 'refresh');
    }
    function appdis(){ //untuk merubah status surat menjadi 2 dan telah didisposisikan
            $no_surat = $this->input->get('n');
            $wheree=array(
                'no_surat'=> $no_surat,
            );
            $datauu=array(
                'sts_surat'=>'2',
            );
            $hsl=$this->m_surat->update_surat($wheree,$datauu,'tbl_surat_masuk');
            

            redirect('main/adddis', 'refresh');
    }
    function editdis(){ //untuk merubah status surat menjadi 2 dan telah didisposisikan
        $iddis = $this->input->post('iddis');
        $isidis = $this->input->post('isi_disposisi');
        $wheree=array(
            'id_disposisi'=> $iddis,
        );
        $datauu=array(
            'isi_disposisi'=>$isidis,
        );
        $hsl=$this->m_surat->update_surat($wheree,$datauu,'tbl_disposisi');
        

        redirect('main/listdis', 'refresh');
}
    function finish(){
        $data=array();
        // var_dump($this->input->get('n'));exit;
        if($this->input->get('n')!=""){
            $created_time = date('Y-m-d H:i:s');
            $id=$this->input->get('n');
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $dataup=array(
                'sts_disposisi'=>'4',
                'tgl_selesai'=> $created_time,
            );
            $hsl=$this->m_surat->update_surat($where,$dataup,'tbl_disposisi');
            $no_surat = $this->input->get('ns');
            $wheree=array(
                'no_surat'=> $no_surat,
            );
            $datauu=array(
                'sts_surat'=>'2',
            );
            $hsl=$this->m_surat->update_surat($wheree,$datauu,'tbl_surat_masuk');
                    $no_surat = $this->input->get('ns');
                    $kd_div=$this->session->userdata('kd_div');
                    $kd_jabatan=$this->session->userdata('kd_jabatan');
                    $isi = $this->input->get('isi');
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
                    $this->m_surat->insert_surat($table,$datauup);
            // var_dump($dataup);var_dump($hsl);
        }
        redirect('main/userlistdis', 'refresh');
        
    }
    function teruskan(){
        //insert ke tabel disposisi
        if($this->input->get('n')){
        $no_surat = $this->input->get('n');
        $kd_div = $this->session->userdata('kd_div');
        if ($kd_div==1){
            $divisi="TATA USAHA";
        }
        if ($kd_div==2){
            $divisi="INFRASTRUKTUR PERTANAHAN";
        }
        if ($kd_div==3){
            $divisi="HUBUNGAN HUKUM PERTANAHAN";
        }
        if ($kd_div==4){
            $divisi="PENATAAN PERTANAHAN";
        }
        if ($kd_div==5){
            $divisi="PENGADAAN TANAH";
        }
        if ($kd_div==6){
            $divisi="PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN";
        }

        //Mulai inisiasi cek no agenda atau reset per tahun
        $kd_jab = $this->session->userdata('kd_jabatan');
        $kd_jabatan=$kd_jab+1;
        $where            = array(
            'no_surat' => $no_surat,
            'kd_div' => $kd_div,
            'kd_jabatan' => $kd_jabatan,
		);
        $cek              = $this->m_surat->cekada("tbl_disposisi",$where)->num_rows();
        // var_dump($cek);
        if($cek==0){    
        $no_surat = $this->input->get('n');
        
        $isi_disposisi = $this->input->get('isi');
        $sifat = $this->input->get('sif');
        $created_by=$this->session->userdata('nama_sub');
        $created_time = date('Y-m-d H:i:s');

        
        
        $table="tbl_disposisi";
        $dataup=array(
            'no_surat' =>$no_surat,
            'kd_div' => $kd_div,
            'kd_jabatan' => $kd_jabatan,
            'divisi' => $divisi,
            'isi_disposisi' =>$isi_disposisi,
            'sifat' =>$sifat,
            'sts_disposisi'=>'1',
            'created_by'=>$created_by,
            'created_time'=>$created_time,
        );
        $this->m_surat->insert_surat($table,$dataup);
        $id=$this->input->get('id');
            $table="tbl_disposisi";
            $where=array(
                'id_disposisi'=> $id,
            );
            $dataup=array(
                'sts_disposisi'=>'2',
            );
            $this->m_surat->update_surat($where,$dataup,'tbl_disposisi');
        redirect('main/userlistdis');
        }else{
            echo "<script> alert('data sudah pernah ada') </script>";
            // redirect('main/adddis');
        }
        // var_dump($dataup);exit;
                       
    }
 
    }
    function add_disp(){
        //insert ke tabel disposisi
        $no_surat = $this->input->post('no_surat');
        $kd_div = $this->input->post('div');
        if ($kd_div==1){
            $divisi="TATA USAHA";
            $nama_sub="KEPALA BAGIAN TATA USAHA";
        }
        if ($kd_div==2){
            $divisi="INFRASTRUKTUR PERTANAHAN";
            $nama_sub="KEPALA BIDANG INFRASTRUKTUR PERTANAHAN";
        }
        if ($kd_div==3){
            $divisi="HUBUNGAN HUKUM PERTANAHAN";
            $nama_sub="KEPALA BIDANG HUBUNGAN HUKUM PERTANAHAN";
        }
        if ($kd_div==4){
            $divisi="PENATAAN PERTANAHAN";
            $nama_sub="KEPALA BIDANG PENATAAN PERTANAHAN";
        }
        if ($kd_div==5){
            $divisi="PENGADAAN TANAH";
            $nama_sub="KEPALA BIDANG PENGADAAN TANAH";
        }
        if ($kd_div==6){
            $divisi="PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN";
            $nama_sub="KEPALA BIDANG PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN";
        }

        //Mulai inisiasi cek no agenda atau reset per tahun
        $where            = array(
            'no_surat' => $no_surat,
            'kd_div' => $kd_div,
		);
        $cek              = $this->m_surat->cekada("tbl_disposisi",$where)->num_rows();
        // var_dump($cek);
        if($cek==0){    
        $no_surat = $this->input->post('no_surat');
        $kd_jabatan = '2'; //statik 
        $isi_disposisi = $this->input->post('isi_disposisi');
        $sifat = $this->input->post('sifat');
        $created_by=$this->session->userdata('nama_sub');
        $created_time = date('Y-m-d H:i:s');

        
        
        $table="tbl_disposisi";
        $dataup=array(
            'no_surat' =>$no_surat,
            'kd_div' => $kd_div,
            'kd_jabatan' => $kd_jabatan,
            'divisi' => $divisi,
            'nama_sub' => $nama_sub,
            'isi_disposisi' =>$isi_disposisi,
            'sifat' =>$sifat,
            'sts_disposisi'=>'1',
            'created_by'=>$created_by,
            'created_time'=>$created_time,
        );
        $this->m_surat->insert_surat($table,$dataup);
        ?>
        <script languange='javascript'>
                window.alert('Disposisi Ditambahkan!');
                window.history.back();
        </script>
        <?php 
        }else{
            ?>
            <script languange='javascript'>
                    window.alert('Disposisi sudah pernah ada');
                    window.history.back();
            </script>
            <?php 
        }
        // var_dump($dataup);exit;
                       
        
 
    }
    function add_subdisp(){
        //insert ke tabel disposisi
        $kd_div=$this->session->userdata('kd_div');
        $kd_jabatan=$this->session->userdata('kd_jabatan');
        $kd_cekjab=$kd_jabatan+1;
        $nama_sub=$this->input->post('sub');
        $no_surat = $this->input->post('no_surat');
        if ($kd_div==1){
            $divisi="TATA USAHA";
        }
        if ($kd_div==2){
            $divisi="INFRASTRUKTUR PERTANAHAN";
        }
        if ($kd_div==3){
            $divisi="HUBUNGAN HUKUM PERTANAHAN";
        }
        if ($kd_div==4){
            $divisi="PENATAAN PERTANAHAN";
        }
        if ($kd_div==5){
            $divisi="PENGADAAN TANAH";
        }
        if ($kd_div==6){
            $divisi="PENANGANAN MASALAH DAN PENGENDALIAN PERTANAHAN";
        }

        //Mulai inisiasi cek no agenda atau reset per tahun
        $where            = array(
            'no_surat' => $no_surat,
            'kd_div' => $kd_div,
            'kd_jabatan' => $kd_cekjab,
            'nama_sub' => $nama_sub,
		);
        $cek              = $this->m_surat->cekada("tbl_disposisi",$where)->num_rows();
        // var_dump($cek);
        if($cek==0){    
        $no_surat = $this->input->post('no_surat');
        $isi_disposisi = $this->input->post('isi_disposisi');
        $sifat = $this->input->post('sifat');
        $created_by=$this->session->userdata('nama_sub');
        $created_time = date('Y-m-d H:i:s');
        if($kd_jabatan==2){
            $kd_jabatan = $kd_jabatan+1;  
            $cat1=$this->input->post('cat1');
            $table="tbl_disposisi";
            $dataup=array(
                'no_surat' =>$no_surat,
                'kd_div' => $kd_div,
                'kd_jabatan' => $kd_jabatan,
                'divisi' => $divisi,
                'nama_sub' => $nama_sub,
                'isi_disposisi' =>$isi_disposisi,
                'cat1' =>$cat1,
                'sifat' =>$sifat,
                'sts_disposisi'=>'1',
                'created_by'=>$created_by,
                'created_time'=>$created_time,
            );
            $this->m_surat->insert_surat($table,$dataup);
        }else if($kd_jabatan==3){
            $kd_jabatan = $kd_jabatan+1;  
            $cat1=$this->input->post('cat1');
            $cat2=$this->input->post('cat2');
            $table="tbl_disposisi";
            $dataup=array(
                'no_surat' =>$no_surat,
                'kd_div' => $kd_div,
                'kd_jabatan' => $kd_jabatan,
                'divisi' => $divisi,
                'nama_sub' => $nama_sub,
                'isi_disposisi' =>$isi_disposisi,
                'cat1' =>$cat1,
                'cat2' =>$cat2,
                'sifat' =>$sifat,
                'sts_disposisi'=>'1',
                'created_by'=>$created_by,
                'created_time'=>$created_time,
            );
            $this->m_surat->insert_surat($table,$dataup);
        }
        ?>
        <script languange='javascript'>
                window.alert('Disposisi Ditambahkan!');
                window.history.back();
        </script>
        <?php 
        }else{
            ?>
            <script languange='javascript'>
                    window.alert('Disposisi sudah pernah ada');
                    window.history.back();
            </script>
            <?php 
        }
        // var_dump($dataup);exit;
                       
        
 
    }
    function add_surat(){
        
        $no_surat = $this->input->post('no_surat');
        // var_dump($no_surat);
        //Mulai inisiasi cek no agenda atau reset per tahun
        $where            = array(
			'no_surat' => $no_surat,
		);
        $cek              = $this->m_surat->cekada("tbl_surat_masuk",$where)->num_rows();
        // var_dump($cek);
        if($cek==0){    
            $config['upload_path']="./assets/documents";
            $config['allowed_types']='doc|docx|pdf|jpeg|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            if($this->upload->do_upload("file")){
                 $data = array('upload_data' => $this->upload->data());
                 $file= $data['upload_data']['file_name'];
                    //Mulai inisiasi cek no agenda atau reset per tahun
                    $bulann = date('m');
                    $tahunn = date('Y');
                    $noagena= $this->m_surat->no_docno('AG');
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
                        $tbhno= $this->m_surat->tbh_nogen('1',$tahunn,$bulann);
                    }else{
                        $tbhno= $this->m_surat->tbh_nogen($docno+1,$tahunn,$bulann);
                    }
                    //selesai update docno
                    //insert ke tabel surat masuk
                    $no_agenda = $docno+1;
                    $no_surat = $this->input->post('no_surat');
                    $asal_surat = $this->input->post('asal_surat');
                    $tgl_surat = $this->input->post('tgl_surat');
                    $tgl_terima = $this->input->post('tgl_terima');
                    $isi = $this->input->post('isi');
                    $lampiran = $this->input->post('lampiran');
                    $sifat = $this->input->post('sifat');
                    $created_by=$this->session->userdata('nama_sub');
                    $created_time = date('Y-m-d H:i:s');
                    
                    $table="tbl_surat_masuk";
                    $dataup=array(
                        'no_agenda' =>$no_agenda,
                        'no_surat' =>$no_surat,
                        'asal_surat' =>$asal_surat,
                        'tgl_surat' =>$tgl_surat,
                        'tgl_terima' =>$tgl_terima,
                        'isi' =>$isi,
                        'lampiran' =>$lampiran,
                        'sifat' =>$sifat,
                        'file'=>$file,
                        'created_by'=>$created_by,
                        'created_time'=>$created_time,

                    );
                    $this->m_surat->insert_surat($table,$dataup);
                    redirect('main/listsm', 'refresh');
                    // var_dump($dataup);exit;
            }           
        }else{
            ?>
            <script languange='javascript'>
                    window.alert('No surat sudah pernah ada');
                    window.history.back();
            </script> 
            <?php
        }
 
    }
    function upload(){
        $config['upload_path']="./assets/documents";
            $config['allowed_types']='doc|docx|pdf';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            // var_dump($file);
            // var_dump($this->upload->do_upload("file"));
            if ( ! $this->upload->do_upload('file'))
                {
                        echo "gagal";

                }
                else
                {
                       echo "vargasil upload";
                       $data = array('upload_data' => $this->upload->data());
                       $file= $data['upload_data']['file_name'];
                       return $file;
                }
    }
    function edit_surat(){
       
          
               
                   
                    //update ke tabel surat masuk
                    $no_agenda = $this->input->post('no_agenda');
                    $no_surat = $this->input->post('no_surat');
                    $asal_surat = $this->input->post('asal_surat');
                    $tgl_surat = $this->input->post('tgl_surat');
                    $tgl_terima = $this->input->post('tgl_terima');
                    $isi = $this->input->post('isi');
                    $lampiran = $this->input->post('lampiran');
                    $sifat = $this->input->post('sifat');
                    $where=array(
                        'no_agenda'=> $no_agenda,
                    );
                    $dataup=array(
                        'no_agenda' =>$no_agenda,
                        'no_surat' =>$no_surat,
                        'asal_surat' =>$asal_surat,
                        'tgl_surat' =>$tgl_surat,
                        'tgl_terima' =>$tgl_terima,
                        'isi' =>$isi,
                        'lampiran' =>$lampiran,
                        'sifat' =>$sifat,

                    );
                    $this->m_surat->update_surat($where,$dataup,'tbl_surat_masuk');
                    // var_dump($data);exit;
                    redirect('main/listsm', 'refresh');
 
                // }
   
    }
}
