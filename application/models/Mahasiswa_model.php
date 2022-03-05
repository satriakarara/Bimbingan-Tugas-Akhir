<?php

    class Mahasiswa_model extends CI_model{
        public function getAllMahasiswa(){

            // $query = $this->db->get('mahasiswa');
            $query= $this->db->get_where('user',['userlevel'=> 3]);
            return $query->result_array();
        }
        public function checkTugasAkhir(){
            // $query= $this->db->get_where('tugasakhir',['id1'=>$mahasiswa[$i]['id']]);
            // return $query->result_array();
        }

        public function tambahDataMahasiswa(){
            $data = [
                "userlevel" => 3,
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

        public function hapusDataMahasiswa($id){
            $this->db->where('id', $id);
            $this->db->delete('user');
        }
        
        public function getMahasiswaById($id){

                $query= $this->db->get_where('user', ['id' => $id]);
            return $query->row_array();
        }

        public function getBimbinganById($id){
            $query= $this->db->get_where('bimbingan', ['id1' => $id]);
        return $query->result_array();
        }

        public function profil($id){
            // untuk nampilin data tugas akhir di page profil
            $query= $this->db->get_where('tugasakhir', ['id1' => $id]);
        return $query->row_array();
        }

        public function userId($id){
            // ngambil id untuk akses profil

            $idUser = $id;
            return $idUser;
        }
        

        public function kirimBimbingan($id){
            // ngambil ta_id
            $query= $this->db->get_where('tugasakhir', ['id1' => $id])->row_array();
            $query = $query['ta_id'];
            // ngambil upload
            $file= $_FILES['file'];
            if($file=''){}else{
                $config['upload_path'] = './assets/file/bimbingan';
                $config['allowed_types'] = 'docx';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    echo "Upload Gagal";die;
                } else {
                     $file= $this->upload->data('file_name');
                }
            }
            $data = [
                "id2" => $this->input->post('dospem1', true),
                "bimb_file" => $file,
                'id1' => $id,
                'bimb_komentar' => 'Belum Ada Komentar',
                'ta_id' => $query

            ];
            $this->db->set('bimb_waktu', 'NOW()', FALSE);            
            $this->db->insert('bimbingan', $data);
        }
        public function kirimEmail($id){
            $mahasiswa = $this->db->get_where('user',['id' => $id])->row_array();
            $mahasiswa = $mahasiswa['nama'];
            $tugasakhir = $this->db->get_where('tugasakhir',['id1' => $id])->row_array();
            $dosen = $this->db->get_where('user',['id'=>$tugasakhir['id2']])->row_array();
            $dosenEmail = $dosen['email'];
            
            $subject = 'Bimbingan Tugas Akhir Online';
            $pesan = 'Anda Mendapatkan kiriman bimbingan dari '.$mahasiswa;

            $config = [
                'mailtype' => 'html',
                'protocol' => 'smtp',
                'smtp_host' =>'ssl://smtp.gmail.com',
                'smtp_user' => 'kararasatria2@gmail.com',
                'smtp_pass' => 'vipcassiopeia',
                'smtp_port' => 465,
                'charset' => 'iso-8859-1'
                
            ];
            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('kararasatria2@gmail.com','Sistem Bimbingan Online');
            $this->email->to($dosenEmail);
            $this->email->subject($subject);
            $this->email->message($pesan);
            if($this->email->send()){
                echo"email berhasil dikirim";   
            }else{show_error($this->email->print_debugger());}
        }
        public function editMahasiswaById($id){

            // ambil foto awal
            $fotoAwal = $this->db->get_where('user', ['id'=>$id])->row_array();
            $fotoAwal = $fotoAwal['image'];
            $foto= $_FILES['foto'];
            if(empty($foto['name'])){$foto = $fotoAwal;}else{
                $config['upload_path'] = './assets/img/profpic';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')){
                    echo "Upload Gagal";die;
                } else {
                     $foto= $this->upload->data('file_name');
                }
            }
        
            $data = [
                "ni" => $this->input->post('ni', true),
                "nama" => $this->input->post('nama', true),
                "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                "nohp" => $this->input->post('nohp', true),
                "alamat" => $this->input->post('alamat', true),
                "email" => $this->input->post('email', true),
                "image" => $foto           
            ];
            
            $this->db->where('id', $id);
            $this->db->update('user', $data);
        }
    }

?>