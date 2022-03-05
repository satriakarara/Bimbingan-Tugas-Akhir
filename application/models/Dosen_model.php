<?php

    class Dosen_model extends CI_model{
        public function getAllDosen(){

                $query= $this->db->get_where('user',['userlevel'=> 2]);
            return $query->result_array();
        }
        public function tambahDataDosen(){
            $data = [
                "userlevel" => 2,
                "ni" => $this->input->post('ni', true),
                "nama" => $this->input->post('nama', true),
                "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT) ,
                "nohp" => $this->input->post('nohp', true),
                "alamat" => $this->input->post('alamat', true),
                "email" => $this->input->post('email', true),
                "image" => 'default.jpg'                  
            ];
            $this->db->insert('user', $data);
        }

        public function terima($id){
            $data = [
                "ta_accepted" => 2                
            ];   
            $this->db->where('ta_id', $id);
            $this->db->update('tugasakhir', $data);

        }

        public function tolak($id){
            $data = [
                "ta_accepted" => 0                
            ];   
            $this->db->where('ta_id', $id);
            $this->db->update('tugasakhir', $data);

        }

        
        public function getPengajuanTugasAkhir2($id){
                
            $this->db->select('tugasakhir.*, u1.nama as nama_mhs, u2.nama as nama_dospem1');
            $this->db->from('tugasakhir');
            $this->db->where('ta_accepted', 1 );
            $this->db->where('id2', $id );
            $this->db->join('user u1', 'u1.id=tugasakhir.id1');
            $this->db->join('user u2', 'u2.id=tugasakhir.id2', 'left');
            return $this->db->get()->result_array();
        }

        public function setujuiPengajuan($id){
            $data = [
                "ta_accepted" => 2                
            ];   
            $this->db->where('ta_id', $id);
            $this->db->update('tugasakhir', $data);

        }

        public function hapusDataDosen($id){
            $this->db->where('id', $id);
            $this->db->delete('user');
        }

        public function getDosenById($id){

            $query= $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
        }
        public function getMahasiswaById($id){

            $query= $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
         }
        public function profill($id){
            // untuk nampilin data tugas akhir di page profil
            $query= $this->db->get_where('tugasakhir', ['id1' => $id]);
        return $query->row_array();
        }

        public function getBimbinganById($id){
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $query= $this->db->get_where('bimbingan', ['id1' => $id, 'id2' => $data['user']['id']]);
        return $query->result_array();
        }
       
        
        public function profil($id){
            $this->db->select('*');
            $this->db->from('tugasakhir');
            $this->db->where('id2', $id);
            $this->db->where('ta_accepted', 2);
            $this->db->or_where('id3', $id);
            $q = $this->db->get();

            // $query= $this->db->get_where('tugasakhir', ['id2' => $id]);        
            return $q->result_array();          
        }

        // public function mahasiswaForProfil(){
        //     $query = $this->db->get_where('user',[id => $id1])->row_array('nama');
        // }

        public function editDosenById($id){

            $data = [
                "ni" => $this->input->post('ni', true),
                "nama" => $this->input->post('nama', true),
                "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT) ,
                "nohp" => $this->input->post('nohp', true),
                "alamat" => $this->input->post('alamat', true),
                "email" => $this->input->post('email', true)                
            ];
            
            $this->db->where('id', $id);
            $this->db->update('dosen', $data);
        }

        // ngambil id bimbingan untuk ngirim komentar
        public function getIdBimbingan($id){
            $query= $this->db->get_where('bimbingan', ['bimb_id' => $id]);
            return $query->row_array();
        }

        public function kirimkomentar($id){
            // ngambil upload
            $file= $_FILES['file'];
            if($file=''){}else{
                $config['upload_path'] = './assets/file/bimbingan';
                $config['allowed_types'] = 'docx|pdf';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                } else {
                     $file= $this->upload->data('file_name');
                }
            }

            if ($file == '') {
                $data = [
                    "bimb_komentar" => $this->input->post('komentar', true)   
                ];
            } else {
                $data = [
                    "bimb_komentar" => $this->input->post('komentar', true),                
                    "bimb_file2" => $file    
                ];
            }
            
            
            $this->db->where('bimb_id', $id);
            $this->db->update('bimbingan', $data);
        }
        
    }

?>