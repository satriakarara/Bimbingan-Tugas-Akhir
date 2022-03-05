<?php

    class Bimbingan_model extends CI_model{
        public function getAllBimbingan(){

            // // $query = $this->db->get('mahasiswa');
            //     $query= $this->db->get('bimbingan');
            // return $query->result_array();

            $this->db->select('*');
                $this->db->from('bimbingan');
                $this->db->join('mahasiswa', 'mahasiswa.mhs_id=bimbingan.mhs_id');
                $this->db->join('dosen', 'dosen.dsn_id=bimbingan.dsn_id');
                return $this->db->get()->result_array();
        }
        public function kirimBimbingan(){
            $data = [
                "bimb_file" => $this->input->post('file', true),
                "bimb_komentar" => $this->input->post('komentar', true),
                "dsn_id" => $this->input->post('dosen1', true),
                "mhs_id" => $this->input->post('mahasiswa', true),  
                           
            ];
            $this->db->set('bimb_waktu', 'NOW()', FALSE);
            $this->db->insert('bimbingan', $data);
        }

        public function hapusDataMahasiswa($id){
            $this->db->where('mhs_id', $id);
            $this->db->delete('mahasiswa');
        }
        
        public function getMahasiswaById($id){

                $query= $this->db->get_where('mahasiswa', ['mhs_id' => $id]);
            return $query->row_array();
        }

        public function editMahasiswaById($id){

            // // $query = $this->db->get('mahasiswa');
            //     $query= $this->db->get_where('mahasiswa', ['mhs_id' => $id]);
            // return $query->row_array();

            $data = [
                "mhs_nim" => $this->input->post('nim', true),
                "mhs_nama" => $this->input->post('nama', true),
                "mhs_password" => $this->input->post('password', true),
                "mhs_nohp" => $this->input->post('nohp', true),
                "mhs_alamat" => $this->input->post('alamat', true),
                "mhs_email" => $this->input->post('email', true)                
            ];
            
            $this->db->where('mhs_id', $id);
            $this->db->update('mahasiswa', $data);
        }
    }

?>