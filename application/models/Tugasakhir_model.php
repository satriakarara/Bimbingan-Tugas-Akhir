<?php

    class Tugasakhir_model extends CI_model{
            public function getAllTugasakhir(){
               
                $this->db->select('tugasakhir.*, u1.nama as nama_mhs, u2.nama as nama_dospem1, u3.nama as nama_dospem2');
                $this->db->from('tugasakhir');
                $this->db->where('ta_accepted', 2 );
                $this->db->join('user u1', 'u1.id=tugasakhir.id1');
                $this->db->join('user u2', 'u2.id=tugasakhir.id2', 'left');
                $this->db->join('user u3', 'u3.id=tugasakhir.id3', 'left');
                return $this->db->get()->result_array();
            }

            public function getPengajuanTugasAkhir(){
                
                $this->db->select('tugasakhir.*, u1.nama as nama_mhs, u2.nama as nama_dospem1');
                $this->db->from('tugasakhir');
                $this->db->where('ta_accepted', 0 );
                $this->db->join('user u1', 'u1.id=tugasakhir.id1');
                $this->db->join('user u2', 'u2.id=tugasakhir.id2', 'left');
                return $this->db->get()->result_array();
            }

            public function setujuiPengajuan($id){
                $data = [
                    "ta_accepted" => 1                
                ];   
                $this->db->where('ta_id', $id);
                $this->db->update('tugasakhir', $data);

            }

            public function getNamaDosen(){

                //   $query = $this->db->query("SELECT * FROM user WHERE 'userlevel' = '2' ");
                  $query = $this->db->get_where('user', ['userlevel'=>2]);
                  return $query->result_array();
            }

            
            public function namaDosen(){
                $this->db->select('nama');
                $this->db->from('user');
                $this->db->join('tugasakhir', 'user.id=tugasakhir.id2');
                return $this->db->get()->result_array();

            }

            public function namaDosen2(){
                
                $this->db->select('*');
                $this->db->from('user');
                $this->db->join('tugasakhir', 'user.id=tugasakhir.id3');
                return $this->db->get()->result_array();

            }
            public function getMahasiswaById($id){

                $query= $this->db->get_where('user', ['id' => $id]);
            return $query->row_array();
            }

            public function getTugasAkhirById($id){
                $query= $this->db->get_where('tugasakhir', ['id1' => $id]);
            return $query->row_array();
            }

            public function editDataTugasakhir($id){
                // ngambil nama dan nim mahasiswa dari tabel user
                $idTemp = $this->input->post('ni', true);
                $idTempp = $this->db->get_where('user', ['ni'=>$idTemp])->row_array();
                $id1 = $idTempp['id'];
                $data = [
                    "id1" => $id1,
                    "ta_judul" => $this->input->post('judul', true),
                    "ta_deksripsi" => $this->input->post('deskripsi', true),
                    "id2" => $this->input->post('dospem1', true),
                    "id3" => $this->input->post('dospem2', true),
                    "ta_status" => $this->input->post('status', true)
                ];
                $this->db->where('id1', $id);
                $this->db->update('tugasakhir', $data);
            }

            public function tambahDataTugasakhir(){
                // nyocokin id mahasiswa pada tabel mahasiswa dan tugasakhir melalui atribut nomor induk
                $idTemp = $this->input->post('ni', true);
                $idTempp = $this->db->get_where('user', ['ni'=>$idTemp])->row_array();
                $id1 = $idTempp['id'];
                $data = [
                    "id1" => $id1,
                    "ta_judul" => $this->input->post('judul', true),
                    "ta_deksripsi" => $this->input->post('deskripsi', true),
                    "id2" => $this->input->post('dospem1', true),
                    "ta_status" => $this->input->post('status', true)
                ];
                $this->db->insert('tugasakhir', $data);
            }
    }
?>